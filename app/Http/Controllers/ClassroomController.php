<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function lesson($course, Lesson $lesson)
    {
      if(!auth()->user()) abort(401);
      
      $c = Course::whereSlug($course)->first();
      if(empty($c)) abort(404);
      if($c->comingsoon) abort(403);
      
      if($c->user_id !== auth()->user()->id):
        if(!$c->hasStudent(auth()->user())) return redirect()->to("/academy/courses/{$c->slug}");
        if(!$lesson->opened) return redirect()->to("/academy/courses/{$c->slug}");
      endif;

      return view('classroom.lesson')->with([
        'course' => $c->load('units.lessons','mentor'),
        'lesson' => $lesson,
      ]);
    }
}
