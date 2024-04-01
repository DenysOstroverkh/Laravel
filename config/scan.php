<?php

return [

    'contract' => env('SCAN_CONTRACT'),
    'checksum' => env('SCAN_CHECKSUM'),
    
    'addresses' => [
        'owner' => env('SCAN_OWNER_ADDRESS'),
        'marketing' => env('SCAN_MARKETING_ADDRESS'),
        'burn' => env('SCAN_BURN_ADDRESS'),
    ],

    'bsc' => [
        'apikey' => env('BSC_API_KEY'),
    ],

    'covalent' => [
        'apikey' => env('COVALENT_API_KEY'),
    ],

    'twitter' => [
        'apikey' => env('TWITTER_API_KEY'),
    ],

];
