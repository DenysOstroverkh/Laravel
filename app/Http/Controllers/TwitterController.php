<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitterController extends Controller
{
    public function __construct()
    {
        $this->apikey = config('scan.twitter.apikey');
        $this->endpoint = 'https://api.twitter.com';
        $this->version = '2';
    }

    public function tweetMetrics(Request $request)
    {
      $endpoint = "{$this->endpoint}/{$this->version}/tweets/{$request->tweet}?tweet.fields=public_metrics";
      $response = Http::withToken($this->apikey)->get($endpoint);
      return $response;
    }
}
