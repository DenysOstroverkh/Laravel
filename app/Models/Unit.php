<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = ['course_id', 'title', 'subtitle', 'slug', 'priority', 'image', 'preview', 'description', 'translations', 'meta'];

    protected $casts = ['translations' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /* ATTRIBUTES */

    public function getDurationAttribute()
    {
        $duration = (int) $this->lessons()->sum('duration');
        $start = now();
        $end = now()->addMinutes($duration);
        return $end->diffForHumans($start, true, true, 6);
    }

    /* HELPERS */

    public function getSlugOptions()
    {
        return SlugOptions::create()
                          ->generateSlugsFrom('title')
                          ->saveSlugsTo('slug')
                          ->allowDuplicateSlugs();
    }
    
}
