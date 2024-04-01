<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function likeToggle(Comment $comment)
    {
      if(!auth()->user()) abort(401);
      if(empty($comment)) abort(404);
      if(empty(auth()->user())) abort(403);
      
      auth()->user()->toggleUpVote($comment);

      $like = auth()->user()->hasUpVoted($comment) ? true : false;

      return response()->json([
        'success' => true,
        'message' => $like ? 'Comment has liked' : 'Comment has unliked',
        'comment' => $comment,
      ]);
    }
}
