<?php

namespace App\Models;

use App\Traits\HasComments;
use Jcc\LaravelVote\Traits\Votable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes, Votable, HasComments;

    protected $fillable = ['user_id', 'type', 'content', 'translations', 'meta'];

    protected $appends = ['comments', 'avatar', 'wallet', 'likes', 'liked_by_authuser'];

    protected $casts = ['translations' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* ATTRIBUTES */

    public function getCommentsAttribute()
    {
        return $this->comments()->get();
    }

    public function getAvatarAttribute()
    {
        return $this->user()->first()->avatar;
    }

    public function getWalletAttribute()
    {
        return $this->user()->first()->wallet;
    }

    public function getLikesAttribute()
    {
        return $this->upVoters()->count();
    }

    public function getLikedByAuthuserAttribute()
    {
        if(!auth()->user()) return false;
        return $this->isUpVotedBy(auth()->user());
    }

    /* HELPERS */

    public static function getTypes()
    {
        return static::groupBy('type')->pluck('type');
    }

    public function scopeWithType(Builder $query, string $type = null)
    {
        if(is_null($type)) return $query;
        return $query->where('type', $type);
    }

    public function scopeContaining(Builder $query, string $content, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $query->where('content', 'like', '%'.mb_strtolower($content).'%');
    }

    public static function findFromString(string $content, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where('content', 'like', '%'.mb_strtolower($content).'%')
            ->where('type', $type)
            ->get();
    }

    public static function findFromStringOfAnyType(string $content, string $type = null, string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return static::query()
            ->where('content', 'like', '%'.mb_strtolower($content).'%')
            ->get();
    }
}
