<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovalentController extends Controller
{
    protected $apikey, $endpoint, $version;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);

        $this->apikey = config('scan.covalent.apikey');
        $this->endpoint = 'https://api.covalenthq.com';
        $this->version = 'v1';
        $this->chain_id = 56; // BSC
        $this->quote_currency = 'usd';

        $this->WBNB = '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
    }

    public function blockHolders(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/{$this->chain_id}/tokens/{$request->token}/token_holders/?block-height={$request->block}&page-size=10000&key={$this->apikey}";
      $response = Http::get($endpoint);
      return $response;
    }

    public function tokenByAddress(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/pricing/historical_by_addresses_v2/{$this->chain_id}/usd/{$request->address}/?&key={$this->apikey}";
      $response = Http::get($endpoint);
      return $response;
    }

    public function walletByAddress(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/pricing/historical_by_addresses_v2/{$this->chain_id}/{$this->quote_currency}/{$request->address}/?&limit=10&key={$this->apikey}";
      $response = Http::get($endpoint);
      if(isset($response['error']) && $response['error'] == true) return response()->json(['error' => false, 'error_message' => null, 'address' => $request->address, 'wallet' => $request->address]);
      return response()->json(['error' => true, 'error_message' => 'Address provided not found.', 'address' => $request->address, 'wallet' => null]);
    }

    public function walletBalances(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/{$this->chain_id}/address/{$request->address}/balances_v2/?&key={$this->apikey}";
      $response = Http::get($endpoint);
      return $response;
    }

    public function tokenLogEvents(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/{$this->chain_id}/events/address/{$request->address}/?starting-block={$request->from}&ending-block={$request->to}&page-size=10000&key={$this->apikey}";
      $response = Http::get($endpoint);
      return $response;
    }
}
