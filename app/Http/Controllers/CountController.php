<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountController extends Controller
{
    public function users(Request $request)
    {
      return response()->json(['count' => User::count()]);
    }

    public function blacklist(Request $request)
    {
      return response()->json(['count' => Token::withCount('reports')->having('reports_count', '>', 0)->get()->count()]);
    }

    public function reports(Request $request)
    {
      return response()->json(['count' => Report::count()]);
    }

    public function comments(Request $request)
    {
      return response()->json(['count' => Report::whereNotNull('description')->count()]);
    }
}
