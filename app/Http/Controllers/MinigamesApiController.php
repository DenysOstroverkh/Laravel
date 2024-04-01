<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MinigamesApiController extends Controller
{
    protected $apikey, $endpoint, $version;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);

        $this->endpoint = 'https://minigames.scandefi.net/api';
    }

    public function minigameRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/ranking");
      return $response->json();
    }

    public function minigameActiveRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/ranking/active");
      return $response->json();
    }

    public function minigamePreviousRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/ranking/previous");
      return $response->json();
    }

    public function minigameActiveRound(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/round/active");
      return $response->json();
    }

    public function minigamePreviousRound(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/round/previous");
      return $response->json();
    }

    public function minigameNextRound(Request $request)
    {
      $response = Http::get("{$this->endpoint}/minigames/{$request->minigame}/round/next");
      return $response->json();
    }

    public function userMinigameLives(Request $request)
    {
      $response = Http::get("{$this->endpoint}/users/{$request->wallet}/minigames/{$request->minigame}/lives");
      return $response->json();
    }

    public function userMinigameRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/users/{$request->wallet}/minigames/{$request->minigame}/ranking");
      return $response->json();
    }

    public function userMinigameRoundRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/users/{$request->wallet}/minigames/{$request->minigame}/round/{$request->round_name}/ranking");
      return $response->json();
    }

    public function userMinigameActiveRoundRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/users/{$request->wallet}/minigames/{$request->minigame}/ranking/active");
      return $response->json();
    }

    public function userMinigamePreviousRoundRanking(Request $request)
    {
      $response = Http::get("{$this->endpoint}/users/{$request->wallet}/minigames/{$request->minigame}/ranking/previous");
      return $response->json();
    }
}
