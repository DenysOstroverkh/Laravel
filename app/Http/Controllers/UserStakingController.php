<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Models\UserStaking;

class UserStakingController extends Controller
{
    public function create(User $user, Request $request) {
        $staking = UserStaking::create(['user_id' => $user->id,
                                        'token_id' => $request->token_id,
                                        'amount' => $request->amount,
                                        'staking_days' => $request->staking_days,
                                        'status' => $request->status,
                                        'transaction_id' => $request->transaction_id]);

        return response()->json(['success' => true, 'staking' => $staking]);
    }

    public function get(User $user, UserStaking $staking, Request $request) {
        $with = [];
        $with_count = [];
        if(request()->with) $with = explode(',', request()->with);
        if(request()->with_count) $with_count = explode(',', request()->with_count);

        $result = $staking->whereUserId($user->id)->with($with)->withCount($with_count)->get();

        return response()->json($result);
    }

    public function update(User $user, UserStaking $staking, Request $request) {
        if ($staking->whereUserId($user->id)->count()):
            $staking->update([
                'amount' => $request->amount,
                'staking_days' => $request->staking_days,
                'status' => $request->status,
                'transaction_id' => $request->transaction_id,
            ]);
    
            return response()->json(['success' => true, 'amount' => $request->amount, 
                                     'staking_days' => $request->staking_days, 
                                     'status' => $request->status, 
                                     'transaction_id' => $request->transaction_id]);
        endif;

        return response()->json(['success' => false]);
    }

    public function delete(User $user, UserStaking $staking) {
        if ($staking->whereUserId($user->id)->count()):
            $staking->delete();

            return response()->json(['success' => true, 'staking' => $staking]);
        endif;

        return response()->json(['success' => false]);
    }

    public function amountStakedByToken(User $user, Token $token) {
        // dd($user->stakings()->whereTokenId($token->id)->sum('amount'));
        return $user->stakings()->whereTokenId($token->id)->sum('amount');
    }
}
