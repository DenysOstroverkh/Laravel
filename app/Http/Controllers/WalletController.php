<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Wallet;
use App\Models\WalletReport;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function findOrCreate(Request $request)
    {
      $wallet = Wallet::whereAddress($request->address)->withCount('reports')->first();
      if($wallet) return response()->json(['stored' => false, 'wallet' => $wallet]);

      $wallet = Wallet::create(['address' => $request->address]);

      return response()->json(['stored' => true, 'wallet' => $wallet]);
    }

    public function blacklist(Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = Wallet::with($with)->withCount($with_count)->whereNotNull('firstreport');
      if($request->filters['sort_order'] === 'asc') $result = $result->orderByAsc($request->filters['sort_field']);
      if($request->filters['sort_order'] === 'desc') $result = $result->orderByDesc($request->filters['sort_field']);
      $result = $result->paginate($request->filters['perpage']);
      return response()->json($result);
    }

    public function report(Wallet $wallet, Request $request)
    {
      $token = Token::find($request->token_id);

      $report = WalletReport::create([
        'user_id' => auth()->user()->id,
        'wallet_id' => $wallet->id,
        'token_id' => $token ? $token->id : null,
        'complaints' => $request->complaints,
        'description' => $request->description,
        'meta' => [
          'user' => auth()->user(),
          'wallet' => $request->wallet,
          'token' => $token ? $token : null,
          'complaints' => $request->complaints,
        ],
      ]);

      if(!$wallet->firstreport) $wallet->update(['firstreport' => now()]);
      $wallet->update(['lastreport' => now()]);
      
      return response()->json(['success' => true, 'report' => $report]);
    }

    public function scanner($address)
    {
      $wallet = Wallet::whereAddress($address)->with('reports.token')->first();
      return response()->json(['wallet' => $wallet]);
    }
}
