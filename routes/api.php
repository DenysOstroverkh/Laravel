<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/authuser', function (Request $request) {
//     return $request->user();
// });


// // Route::get('bsc/test', 'BscScanController@test');
// Route::post('bsc/request', 'BscScanController@request');
// Route::get('bsc/balance-bnb/{address}', 'ApiController@balance');
// Route::get('bsc/transactions/{address}', 'ApiController@transactions');
// Route::get('chains', 'ApiController@chains');
// Route::get('tokens/fomo', 'ApiController@fomo');
// Route::get('tokens/search/{search}', 'ApiController@search');

// Route::get('cov/tokens/{token}/holders/{block?}', 'CovalentController@blockHolders');
// Route::get('cov/tokens/search-by-address/{address}', 'CovalentController@tokenByAddress');
// Route::get('cov/wallets/{address}/balances', 'CovalentController@walletBalances');
// Route::get('cov/wallets/search-by-address/{address}', 'CovalentController@walletByAddress');
// Route::get('cov/tokens/{address}/events/{from}/{to}', 'CovalentController@tokenLogEvents');

// Route::get('pancake/sumary', 'PancakeController@sumary');
// Route::get('pancake/tokens', 'PancakeController@tokens');
// Route::get('pancake/tokens/{token}', 'PancakeController@token');
// Route::get('pancake/pairs', 'PancakeController@pairs');

// Route::get('coingecko/tokens/{token}', 'CoingeckoController@token');

// Route::get('livecoinwatch/tokens/{token}/history/{start}/{end}', 'ApiController@history');

// Route::get('scan/minigames/{minigame}/ranking', 'MinigamesApiController@minigameRanking');
// Route::get('scan/minigames/{minigame}/ranking/active', 'MinigamesApiController@minigameActiveRanking');
// Route::get('scan/minigames/{minigame}/ranking/previous', 'MinigamesApiController@minigamePreviousRanking');
// Route::get('scan/minigames/{minigame}/round/active', 'MinigamesApiController@minigameActiveRound');
// Route::get('scan/minigames/{minigame}/round/previous', 'MinigamesApiController@minigamePreviousRound');
// Route::get('scan/minigames/{minigame}/round/next', 'MinigamesApiController@minigameNextRound');
// Route::get('scan/users/{wallet}/minigames/{minigame}/lives', 'MinigamesApiController@userMinigameLives');
// Route::get('scan/users/{wallet}/minigames/{minigame}/ranking', 'MinigamesApiController@userMinigameRanking');
// Route::get('scan/users/{wallet}/minigames/{minigame}/round/{round_name}/ranking', 'MinigamesApiController@userMinigameRoundRanking');
// Route::get('scan/users/{wallet}/minigames/{minigame}/ranking/active', 'MinigamesApiController@userMinigameActiveRoundRanking');
// Route::get('scan/users/{wallet}/minigames/{minigame}/ranking/previous', 'MinigamesApiController@userMinigamePreviousRoundRanking');

// Route::get('tokens/{address}/scanner', 'TokenController@scanner');
// Route::post('tokens/blacklist', 'TokenController@blacklist');

// Route::get('wallets/{address}/scanner', 'WalletController@scanner');
// Route::post('wallets/blacklist', 'WalletController@blacklist');

// Route::get('complaints', 'ComplaintController@fetch');

// Route::get('authuser', 'UserController@authuser');
// Route::post('users/login-or-register', 'UserController@loginOrRegister');
// Route::post('users/logout', 'UserController@logout');
// Route::get('users/referrals/ranking', 'UserController@referralRanking');
// Route::get('wallets/{wallet}/referrals', 'UserController@referrals');

// Route::get('count/users', 'CountController@users');
// Route::get('count/blacklist', 'CountController@blacklist');
// Route::get('count/reports', 'CountController@reports');
// Route::get('count/comments', 'CountController@comments');

// Route::get('languages/fetch', 'LanguageController@fetch');
// Route::get('languages/active', 'LanguageController@active');

// // MINIGAMES TEST
// Route::get('users/{wallet}/minigames/{slug}/lives', 'UserController@lives');
// Route::get('minigames/{slug}/ranking', 'UserController@ranking');
// Route::post('users/{wallet}/minigames/{slug}/score', 'UserController@score');
// Route::get('users/{wallet}/minigames/{slug}/highscore', 'UserController@highscore');

// Route::get('courses/fetch', 'CourseController@fetch');
// Route::get('courses/{course}/get', 'CourseController@get');
// Route::get('courses/{course}/comments', 'CourseController@comments');
// Route::get('courses/{slug}/get-by-slug', 'CourseController@getBySlug');
// Route::get('courses/{slug}/lessons/{lesson}', 'CourseController@lesson');

// Route::get('lessons/{lesson}/comments', 'LessonController@comments');
// Route::get('lessons/{lesson}/authuser-notes', 'LessonController@authuserNotes');

// Route::get('categories/fetch/{used?}', 'CategoryController@fetch');
// Route::get('categories/{course}/get', 'CategoryController@get');
// Route::get('categories/{slug}/get-by-slug', 'CategoryController@getBySlug');

// Route::get('users/{user}/enrolls', 'UserController@enrolls');