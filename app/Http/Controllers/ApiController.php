<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function balance(Request $request)
    {
      $endpoint = 'https://api.bscscan.com/api?';
      $address  = $request->address;
      $apikey   = config('scan.bsc.apikey');
      $response = Http::get("{$endpoint}module=account&action=balance&address={$address}&tag=latest&apikey={$apikey}");
      return $response->json();
    }

    public function transactions(Request $request)
    {
      // 'https://api.bscscan.com/api?module=account&action=txlist&address=0x03d401dc9362c6C5F5260a80eCE4952Db8e3ff0d&startblock=1&endblock=99999999&sort=asc&apikey=T9DV1G8N5TZYVF1W9FV2Y7QXA5IF1JQR61'
      $endpoint = 'https://api.bscscan.com/api?';
      $address  = $request->address;
      $apikey   = config('scan.bsc.apikey');
      $response = Http::get("{$endpoint}module=account&action=txlist&address={$address}&tag=latest&startblock=8100000&&apikey={$apikey}");
      return $response->json();
    }

    public function chains(Request $request)
    {
      $endpoint = 'https://chainid.network/chains.json';
      $response = Http::get("{$endpoint}");
      return $response->json();
    }

    public function search($search)
    {
      $endpoint = 'https://api1.poocoin.app/tokens';
      $response = Http::get("{$endpoint}?search={$search}");
      return $response->json();
    }

    public function history($token, $start, $end)
    {
      $endpoint = 'https://http-api.livecoinwatch.com/coins/history/range';
      $response = Http::get("{$endpoint}?coin={$token}&start={$start}&end={$end}&currency=USD");
      return $response->json();
    }

    public function slippage($token)
    {
      $endpoint = 'https://slippage.scandefi.workers.dev';
      $response = Http::get("{$endpoint}?token={$token}");
      return $response->json();
    }

    public function find($search)
    {
      // $response = Http::get('https://bscscan.com/searchHandler?term=' . $find .  '&filterby=0');
      // return $response->json();

      $query = urlencode($search);
      $url = "https://bscscan.com/searchHandler?term={$query}&filterby=0";
      $results = file_get_contents($url);
      $results = json_decode($results, true);
      // dd($results);
      $results = collect($results)->map(function ($item) {
          $item = explode("\t", $item);
          $data = explode("~", $item[2]);
          $address = $item[1];
          $contractAddress = $data[0] ?? '';
          $fullname = $item[0];
          $symbolpos = mb_strpos($fullname, ' (');
          $name = substr($fullname, 0, $symbolpos);
          $symbol = substr($fullname, $symbolpos+2, -1);
          if(!empty($item[2]) && mb_strpos($contractAddress, 'Address') === false){
              return [
                  'name' => $name,
                  'fullname' => $fullname,
                  'symbol' => $symbol,
                  'address' => $address,
                  'contractAddress' => $contractAddress,
                  'url' => $data[1] ?? '',
                  'price' => $data[3] ?? '',
                  'validated' => ($item[4] ?? '') != "0"
              ];
          }
          return false;
      });

      return $results;
    }

    public function fomo()
    {
      $endpoint = 'https://tokenfomo.io/api/tokens/bsc';
      $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiZG9zdW5hbW9uZDg3IiwiaWF0IjoxNjI4ODAxNzU3LCJleHAiOjE2Mjk0MDY1NTd9.8QFVejG2kBa0W-wRvKFQx7qXhbf3214Tvl7nvtotcso')->get($endpoint);
      return $response->json();
    }
}
