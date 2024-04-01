<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function fetch(Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = Course::with($with)->withCount($with_count);
      if(!empty($request->filters['sort_order']) === 'asc') $result = $result->orderByAsc($request->filters['sort_field']);
      if(!empty($request->filters['sort_order']) === 'desc') $result = $result->orderByDesc($request->filters['sort_field']);
      
      if(!empty($request->filters['perpage'])) $result = $result->paginate($request->filters['perpage']);
      else $result = $result->get();

      return response()->json($result);
    }

    public function get(Course $course, Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = $course->with($with)->withCount($with_count)->get();

      return response()->json($result);
    }

    public function getBySlug($slug, Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = Course::whereSlug($slug)->with($with)->withCount($with_count)->first();

      return response()->json($result);
    }

    public function lesson($slug, Lesson $lesson, Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $course = Course::whereSlug($slug)->first();

      return response()->json(['course' => $course, 'lesson' => $lesson]);
    }

    public function comments(Course $course)
    {
      if(!$course) abort(404);
      return response()->json($course->comments);
    }

    public function comment(Course $course, Request $request)
    {
      if(!auth()->user()) abort(401);

      if(!$course) abort(404);

      $type = $request->type ?: 'comment';
      $comment = $course->comment($request->content, $type);

      return response()->json([
        'success' => true,
        'message' => 'Comment stored correctly',
        'comment' => $comment,
      ]);
    }

    public function subscribe(Course $course)
    {
      if(!auth()->user()) abort(401);
      
      $subscription = $course->subscriptions()->create([
        'user_id' => auth()->user()->id,
        'status' => 'success',
        'description' => 'Free course subscription to ' . $course->title . ' course.',
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Subscription created correctly',
        'subscription' => $subscription,
      ]);
    }

    public function classroom($course)
    {
      if(!auth()->user()) abort(401);
      
      if(is_numeric($course)) $c = Course::find($course);
      if(is_string($c)) $c = Course::whereSlug($course)->first();
      if(empty($c)) abort(404);

      return redirect()->to("/classroom/courses/{$c->slug}/lessons/{$c->lessons->first()->id}");
    }
}
