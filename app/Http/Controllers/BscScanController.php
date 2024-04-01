<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client as GoutteClient;
use Illuminate\Support\Facades\Http;

class BscScanController extends Controller
{
    public function request(Request $request)
    {
      $apikey   = config('scan.bsc.apikey');
      $endpoint = 'https://api.bscscan.com/api';
      $query = http_build_query($request->all());
      $response = Http::get("{$endpoint}?{$query}&apikey={$apikey}");
      return $response->json();
    }

    public function tokenInfo(Request $request)
    {
      $client = new GoutteClient();
      $crawler = $client->request('GET', 'https://bscscan.com/token/'.$request->token.'#balances');

      $holders_selector = '#ContentPlaceHolder1_divSummary.container.space-bottom-2:nth-child(8) > div.row.mb-4:nth-child(1) > div.col-md-6.mb-3.mb-md-0:nth-child(1) > div.card.h-100 > div.card-body:nth-child(2) > div#ContentPlaceHolder1_tr_tokenHolders:nth-child(3) > div.row.align-items-center:nth-child(2) > div.col-md-8:nth-child(2) > div.d-flex.align-items-center > div.mr-3:nth-child(1)';
      
      if(empty($crawler->filter($holders_selector)->getNode(0))) return response()->json(['success' => false, 'message' => 'Invalid BSC token address provided.']);

      $holders_text = $crawler->filter($holders_selector)->first()->text();
      $holders = (int) str_replace(',', '', explode(' ', $holders_text)[0]);

      $total_supply_selector = '#ContentPlaceHolder1_divSummary > div.row.mb-4 > div.col-md-6.mb-3.mb-md-0 > div > div.card-body > div.row.align-items-center > div.col-md-8.font-weight-medium > span.hash-tag.text-truncate';
      $total_supply_text = $crawler->filter($total_supply_selector)->first()->text();
      $total_supply = (int) str_replace(',', '', $total_supply_text);
      
      $decimals_selector = '#ContentPlaceHolder1_trDecimals > div > div.col-md-8';
      $decimals_text = $crawler->filter($decimals_selector)->first()->text();
      $decimals = (int) $decimals_text;
      
      $website_selector = '#ContentPlaceHolder1_tr_officialsite_1 > div > div.col-md-8 > a';
      $website = $crawler->filter($website_selector)->first()->text();

      $social_media = collect();
      $social_media_selector = '#ContentPlaceHolder1_divSummary > div.row.mb-4 > div:nth-child(2) > div > div.card-body > div:nth-child(5) > div > div.col-md-8 > ul > li > a';
      $crawler->filter($social_media_selector)->each(function ($node) use ($social_media) {
        $social_name = strtolower(explode(':', $node->attr('data-original-title'))[0]);
        $social_url = $social_name === 'email' ? strtolower(explode(': ', $node->attr('data-original-title'))[1]) : $node->attr('href');
        $social_media[$social_name] = $social_url;
        //$node->text();
      });
      
      return response()->json([
        'success' => true,
        'holders' => $holders, 
        'total_supply' => $total_supply, 
        'decimals' => $decimals, 
        'website' => $website, 
        'social_media' => $social_media
      ]);
    }

    public function test()
    {
      // $curl = curl_init();

      // curl_setopt_array($curl, array(
      //   CURLOPT_URL => 'https://bsc-dataseed1.binance.org/',
      //   CURLOPT_RETURNTRANSFER => true,
      //   CURLOPT_ENCODING => '',
      //   CURLOPT_MAXREDIRS => 10,
      //   CURLOPT_TIMEOUT => 0,
      //   CURLOPT_FOLLOWLOCATION => true,
      //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      //   CURLOPT_CUSTOMREQUEST => 'POST',
      //   CURLOPT_POSTFIELDS =>'{
      //     "jsonrpc":"2.0",
      //     "method":"eth_getBalance",
      //     "params":[
      //       "0xA07f671C65b3B66728EDffC9bD41839B3876EF69", 
      //       "latest"
      //     ],
      //     "id":1
      //   }',
      //   CURLOPT_HTTPHEADER => array(
      //     'Content-Type: application/json'
      //   ),
      // ));

      // $result = json_decode(curl_exec($curl));

      // curl_close($curl);

      // $balance = hexdec($result->result);
      // $human_balance = $balance / 1e18;

      // dd($human_balance);

      $ch = curl_init('https://api1.poocoin.app/tokens?search=test');
      $result = curl_exec($ch);
      curl_close($ch);

      dd($result);
    }

    public function getETHBalance($wallet)
    {
      $data = array(
        "jsonrpc" => "2.0",
        "method" => "eth_getBalance",
        "params" => [
          $wallet, 
		      "latest"
        ],
        "id" => time()
      );

      $json_encoded_data = json_encode($data);

      $ch = curl_init('https://bsc-dataseed.binance.org');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_encoded_data))
      );

      $result = json_decode(curl_exec($ch));
      curl_close($ch);

      dd(hexdec($result->result)/10**18);
    }
}
