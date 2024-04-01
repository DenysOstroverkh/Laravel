<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Comment;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function comments(Lesson $lesson)
    {
      if(!$lesson) abort(404);
      return response()->json($lesson->comments()->whereType('comment')->orWhereNull('type')->get());
    }

    public function authuserNotes(Lesson $lesson)
    {
      if(!auth()->user()) abort(401);
      if(!$lesson) abort(404);
      return response()->json($lesson->comments()->whereType('note')->whereUserId(auth()->user()->id)->get());
    }

    public function comment(Lesson $lesson, Request $request)
    {
      if(!auth()->user()) abort(401);
      if(!$lesson) abort(404);

      $type = $request->type ?: 'comment';
      if(empty($request->id)):
        $comment = $lesson->comment($request->content, $type);
      else:
        $comment = Comment::find($request->id);
        if($comment) $comment->update([
          'content' => $request->content,
          'type' => $type,
          'meta' => $request->meta ?: null,
        ]);
      endif;

      return response()->json([
        'success' => true,
        'message' => ucfirst($type) . ' stored correctly',
        'comment' => $comment,
      ]);
    }
}
