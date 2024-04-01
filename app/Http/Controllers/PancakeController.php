<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PancakeController extends Controller
{
    protected $apikey, $endpoint, $version;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);

        $this->endpoint = 'https://api.pancakeswap.info/api';
        $this->version = 'v2';
    }

    /**
     * Returns data for the top ~1000 PancakeSwap pairs, sorted by reserves.
     */
    public function sumary(Request $request)
    {
      // $query = http_build_query($request->all());
      $response = Http::get("{$this->endpoint}/{$this->version}/sumary");
      return $response->json();
    }

    /**
     * Returns the tokens in the top ~1000 pairs on PancakeSwap, sorted by reserves.
     */
    public function tokens(Request $request)
    {
      // $query = http_build_query($request->all());
      $response = Http::get("{$this->endpoint}/{$this->version}/tokens");
      return $response->json();
    }

    /**
     * Returns the token information, based on address.
     */
    public function token($token, Request $request)
    {
      // $query = http_build_query($request->all());
      $response = Http::get("{$this->endpoint}/{$this->version}/tokens/{$token}");
      return $response->json();
    }

    /**
     * Returns data for the top ~1000 PancakeSwap pairs, sorted by reserves.
     */
    public function pairs(Request $request)
    {
      // $query = http_build_query($request->all());
      $response = Http::get("{$this->endpoint}/{$this->version}/pairs");
      return $response->json();
    }
}
