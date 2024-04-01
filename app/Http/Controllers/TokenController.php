<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QuitTokenRequestNotification;

class TokenController extends Controller
{
    public function findOrCreate(Request $request)
    {
      $token = Token::whereAddress($request->address)->withCount('reports')->first();
      if($token) return response()->json(['stored' => false, 'token' => $token]);

      $token = Token::create([
        'name' => $request->name,
        'symbol' => $request->symbol,
        'network' => $request->network,
        'address' => $request->address,
        'checksum' => $request->checksum,
        'decimals' => $request->decimals,
        'logo' => $request->logo,
      ]);

      return response()->json(['stored' => true, 'token' => $token]);
    }

    public function updateOrCreate(Request $request)
    {
      if($token = Token::whereAddress($request->address)->withCount('reports')->first()):
        $token->update([
          'name' => $request->name,
          'symbol' => $request->symbol,
          'network' => $request->network,
          'address' => $request->address,
          'checksum' => $request->checksum,
          'decimals' => $request->decimals,
          'logo' => $request->logo,
        ]);
      else:
        $token = Token::create([
          'name' => $request->name,
          'symbol' => $request->symbol,
          'network' => $request->network,
          'address' => $request->address,
          'checksum' => $request->checksum,
          'decimals' => $request->decimals,
          'logo' => $request->logo,
        ]);
      endif;

      return response()->json(['stored' => true, 'token' => $token]);
    }

    public function blacklist(Request $request)
    {
      $with = [];
      $with_count = [];
      if(request()->with) $with = explode(',', request()->with);
      if(request()->with_count) $with_count = explode(',', request()->with_count);

      $result = Token::with($with)->withCount($with_count)->whereNotNull('firstreport');
      if($request->filters['sort_order'] === 'asc') $result = $result->orderByAsc($request->filters['sort_field']);
      if($request->filters['sort_order'] === 'desc') $result = $result->orderByDesc($request->filters['sort_field']);
      $result = $result->paginate($request->filters['perpage']);
      return response()->json($result);
    }

    public function report(Token $token, Request $request)
    {
      if($request->token['address'] === config('scan.address')) abort(403);

      $report = Report::create([
        'user_id' => auth()->user()->id,
        'token_id' => $request->token['id'],
        'complaints' => $request->complaints,
        'description' => $request->description,
        'meta' => [
          'user' => auth()->user(),
          'token' => $request->token,
          'complaints' => $request->complaints,
        ],
      ]);

      if(!$token->firstreport) $token->update(['firstreport' => now()]);
      $token->update(['lastreport' => now()]);

      return response()->json(['success' => true, 'report' => $report]);
    }

    public function scanner($address)
    {
      $token = Token::whereAddress($address)->first();
      return response()->json(['token' => $token, 'reports' => $token->reports]);
    }

    public function reports($address)
    {
      $token = Token::whereAddress($address)->first();
      return response()->json(['token' => $token, 'reports' => $token->reports]);
    }

    public function swappables()
    {
      return response()->json(['tokens' => Token::swappables()]);
    }

    public function quit(Token $token, Request $request)
    {
      $user = User::whereWallet($request->wallet)->first();
      if(empty($user)) abort(404);

      $token = Token::find($request->token['id']);
      if(empty($token)) abort(404);

      $meta = $user->meta;
      $rrss = $meta->rrss ?? collect();
      $rrss['telegram'] = $request->telegram;
      $meta['rrss'] = $rrss;

      $user->update(['meta' => $meta]);
      Notification::route('mail', ['davidosuna1987@gmail.com', 'scandeficontact@gmail.com'])->notify(new QuitTokenRequestNotification($token, $user, $request->message));

      return response()->json(['token' => $token, 'user' => $user, 'request' => $request->all()]);
    }
}
