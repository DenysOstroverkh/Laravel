<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authuser()
    {
      return response()->json(auth()->user());
    }
    
    public function loginOrRegister(Request $request)
    {
      if(auth()->check()):
        $authuser = auth()->user();
        $authuser->update(['logged_in' => false]);
        auth()->logout();
      endif;
      
      $user = User::whereWallet($request->wallet)->first();

      if(!$user):
        $user = User::create(['wallet' => $request->wallet, 'ip' => request()->ip()]);
        if($request->referrer) $user->setReferrer($request->referrer);
      endif;

      auth()->login($user);
      $user->storeIp(request()->ip());
      $user->update(['logged_in' => true, 'last_login' => now()]);

      return response()->json(['success' => true, 'user' => $user, 'request' => $request->all()]);
    }

    public function logout(Request $request)
    {
      if(auth()->check()):
        $authuser = auth()->user();
        $authuser->update(['logged_in' => false]);
        auth()->logout();
      endif;

      return response()->json(['success' => true, 'user' => null, 'request' => $request->all()]);
    }

    public function referrals($wallet)
    {
      $user = User::whereWallet($wallet)->first();
      return response()->json(['referrals' => $user->referrals]);
    }

    public function referralRanking()
    {
      return response()->json(['ranking' => User::withCount('referrals')->having('referrals_count', '>', 0)->orderBy('referrals_count', 'desc')->get()]);
    }

    // MINIGAMES TEST

    public function lives($wallet, $slug)
    {
      // $user = User::whereWallet($wallet)->first();
      // $minigame = Minigame::whereSlug($slug)->first();

      return response()->json(['user' => $wallet, 'minigame' => $slug, 'lives' => 99]);
    }

    public function ranking($slug)
    {
      return response()->json(['minigame' => $slug, 'ranking' => [
        [
          'ranking' => 1,
          'score' => 9999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 2,
          'score' => 8999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 3,
          'score' => 7999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 4,
          'score' => 6999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 5,
          'score' => 5999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 6,
          'score' => 4999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 7,
          'score' => 3999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 8,
          'score' => 2999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 9,
          'score' => 1999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
        [
          'ranking' => 10,
          'score' => 999,
          'wallet' => '0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
          'signature' => 'SIGNATURE0xbE8fC9ff98CD894141F40c2f995E3C96d12aa1Ce',
        ],
      ]]);
    }

    public function score($wallet, $slug, Request $request)
    {
      return response()->json([
        'success' => true,
        'message' => 'Score stored successfully',
        'user' => $wallet,
        'minigame' => $slug,
        'score' => $request->score
      ]);
    }

    public function highscore($wallet, $slug)
    {
      return response()->json([
        'success' => true,
        'message' => 'User high score',
        'user' => $wallet,
        'minigame' => $slug,
        'score' => 999999
      ]);
    }

    public function enrolls(User $user)
    {
      return response()->json($user->enrolls);
    }
}
