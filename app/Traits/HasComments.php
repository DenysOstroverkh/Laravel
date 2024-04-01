<?php

namespace App\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

trait HasComments
{
    public static function bootHasComments()
    {
        static::deleting(function (Model $deletedModel) {
            $comments = $deletedModel->comments()->get();

            foreach($comments as $comment):
              $comment->comments()->delete();
            endforeach;

            $deletedModel->comments()->delete();
        });
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    public function commentsWithType(string $type = null)
    {
        return $this->comments->filter(function(Comment $comment) use ($type) {
            return $comment->type === $type;
        });
    }

    public function questions()
    {
        return $this->morphToMany(Comment::class, 'commentable')->whereType('question');
    }

    /* HELPERS */

    public function comment(string $content, string $type = null, User $user = null)
    {
        $user_id = $user ? $user->id : auth()->user()->id;
        return self::comments()->create(['user_id' => $user_id, 'content' => $content, 'type' => $type]);
    }
}