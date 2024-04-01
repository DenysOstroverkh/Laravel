<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoingeckoController extends Controller
{
    protected $apikey, $endpoint, $version;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
        $this->endpoint = 'https://api.coingecko.com/api';
        $this->version = 'v3';
    }

    public function token(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/coins/{$request->token}";
      $response = Http::get($endpoint);
      return $response;
    }
}
