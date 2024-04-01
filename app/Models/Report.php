<?php

namespace App\Models;

use App\Traits\HasComments;
use Jcc\LaravelVote\Traits\Votable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes, Votable, HasComments;

    protected $fillable = ['user_id', 'token_id', 'complaints', 'description', 'meta'];

    protected $appends = ['comments', 'likes', 'liked_by_authuser', 'dislikes', 'disliked_by_authuser'];

    protected $casts = ['complaints' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function token()
    {
        return $this->belongsTo(Token::class);
    }

    /* ATTRIBUTES */

    public function getCommentsAttribute()
    {
        return $this->comments()->get();
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

    public function getDislikesAttribute()
    {
        return $this->downVoters()->count();
    }

    public function getDislikedByAuthuserAttribute()
    {
        if(!auth()->user()) return false;
        return $this->isDownVotedBy(auth()->user());
    }
}
