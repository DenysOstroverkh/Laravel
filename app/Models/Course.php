<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use App\Traits\HasComments;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Jcc\LaravelVote\Traits\Votable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes, HasSlug, HasTags, HasComments, Votable;

    protected $fillable = [
        'user_id', 'category_id', 'level_id',
        'title', 'subtitle', 'slug', 'start_date', 'image', 'preview', 'description',
        'featured', 'nft_certification',
        'price', 'discount', 'discount_type', 'discount_deadline',
        'lang', 'requirements', 'translations', 'meta'
    ];

    protected $appends = ['final_price', 'discount_active', 'duration', 'positive_votes_percentage', 'comingsoon'];

    protected $dates = ['discount_deadline', 'start_date'];

    protected $casts = ['requirements' => 'array', 'meta' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor()
    {
        return $this->user();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function restrictions()
    {
        return $this->hasMany(Restriction::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
    
    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Unit::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'course_id')->wherePivot('deleted_at', null)->wherePivot('status', 'success');
    }

    /* ATTRIBUTES */

    public function getFinalPriceAttribute()
    {
        $final_price = $this->price;

        if(!$this->discount_active) return $final_price;

        if($final_price && $this->discount && $this->discount_type):
            if($this->discount_type === 'amount') $final_price = $final_price - $this->discount;
            if($this->discount_type === 'percentage') $final_price = $final_price * (100 - $this->discount) / 100;
        endif;

        return $final_price;
    }

    public function getImageAttribute()
    {
        if($this->attributes['image']) return asset('storage/images/courses/'.$this->id.'/'.$this->attributes['image']);
        else return asset('storage/images/courses/poster-default.png');
        return null;
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['description'] ? $this->attributes['description'] : '';
    }

    public function getDiscountActiveAttribute()
    {
        if(!$this->discount || !$this->discount_type) return false;
        if(!$this->discount_deadline) return true;
        return $this->discount_deadline && $this->discount_deadline->greaterThan(now());
    }

    public function getDurationAttribute()
    {
        $duration = (int) $this->lessons()->sum('duration');
        $start = now();
        $end = now()->addMinutes($duration);
        return $end->diffForHumans($start, true, true, 6);
    }

    public function getPositiveVotesPercentageAttribute()
    {
        if(!$this->upVoters()->count() || !$this->voters()->count()) return 100;
        return $this->upVoters()->count() / $this->voters()->count() * 100;
    }

    public function getComingsoonAttribute()
    {
        return $this->start_date && $this->start_date->greaterThan(now());
    }

    /* HELPERS */

    public function hasStudent(User $user)
    {
        return $user->enrolls->pluck('id')->contains($this->id);
    }

    public function getSlugOptions()
    {
        return SlugOptions::create()
                          ->generateSlugsFrom('title')
                          ->saveSlugsTo('slug');
    }
}
