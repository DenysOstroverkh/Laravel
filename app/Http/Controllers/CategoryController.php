<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function fetch(Request $request, $used = false)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = Category::with($with)->withCount($with_count);
      if($used) $result = $result->whereHas('courses');
      if(!empty($request->filters['sort_order']) === 'asc') $result = $result->orderByAsc($request->filters['sort_field']);
      if(!empty($request->filters['sort_order']) === 'desc') $result = $result->orderByDesc($request->filters['sort_field']);
      
      if(!empty($request->filters['perpage'])) $result = $result->paginate($request->filters['perpage']);
      else $result = $result->get();

      return response()->json($result);
    }

    public function get(Category $course, Request $request)
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

      $result = Category::whereSlug($slug)->with($with)->withCount($with_count)->first();

      return response()->json($result);
    }
}
