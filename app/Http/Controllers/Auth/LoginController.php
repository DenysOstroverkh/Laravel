<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $user = User::whereWallet($request->wallet)->first();
    //     if($user):
    //         auth()->login($user);
    //         return response()->json($user);
    //     else:
    //         $this->register($request);
    //     endif;
    // }

    // public function register(Request $request)
    // {
    //     $user = User::create(['wallet' => $request->wallet]);
    //     return response()->json($user);
    // }
    
    // public function authenticated(Request $request, $user)
    // {
    //     return response()->json($user);
    // }
}
