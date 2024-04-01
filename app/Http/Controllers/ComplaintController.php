<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function fetch(Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $complaints = Complaint::with($with)->withCount($with_count)->get();
      return response()->json(['success' => true, 'complaints' => $complaints]);
    }
}
