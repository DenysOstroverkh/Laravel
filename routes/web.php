<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['prefix' => 'api'], function(){
  Route::get('bsc/test', 'BscScanController@test');
  Route::post('bsc/request', 'BscScanController@request');
  Route::get('bsc/tokens/{token}/info', 'BscScanController@tokenInfo');
  Route::get('bsc/balance-bnb/{address}', 'ApiController@balance');
  Route::get('bsc/transactions/{address}', 'ApiController@transactions');
  Route::get('bsc/eth-balance/{wallet}', 'BscScanController@getETHBalance');
  Route::get('chains', 'ApiController@chains');
  Route::get('tokens/fomo', 'ApiController@fomo');
  // Route::get('tokens/search/{search}', 'ApiController@search');
  Route::get('tokens/search/{search}', 'ApiController@find');
  Route::get('tokens/{token}/slippage', 'ApiController@slippage');

  Route::get('cov/tokens/{token}/holders/{block?}', 'CovalentController@blockHolders');
  Route::get('cov/tokens/search-by-address/{address}', 'CovalentController@tokenByAddress');
  Route::get('cov/wallets/{address}/balances', 'CovalentController@walletBalances');
  Route::get('cov/wallets/search-by-address/{address}', 'CovalentController@walletByAddress');
  Route::get('cov/tokens/{address}/events/{from}/{to}', 'CovalentController@tokenLogEvents');
  // Route::get('cov/test', 'CovalentController@test');

  Route::get('pancake/sumary', 'PancakeController@sumary');
  Route::get('pancake/tokens', 'PancakeController@tokens');
  Route::get('pancake/tokens/{token}', 'PancakeController@token');
  Route::get('pancake/pairs', 'PancakeController@pairs');

  Route::get('coingecko/tokens/{token}', 'CoingeckoController@token');

  Route::get('livecoinwatch/tokens/{token}/history/{start}/{end}', 'ApiController@history');

  Route::get('twitter/tweets/{tweet}/metrics', 'TwitterController@tweetMetrics');

  Route::get('scan/minigames/{minigame}/ranking', 'MinigamesApiController@minigameRanking');
  Route::get('scan/minigames/{minigame}/ranking/active', 'MinigamesApiController@minigameActiveRanking');
  Route::get('scan/minigames/{minigame}/ranking/previous', 'MinigamesApiController@minigamePreviousRanking');
  Route::get('scan/minigames/{minigame}/round/active', 'MinigamesApiController@minigameActiveRound');
  Route::get('scan/minigames/{minigame}/round/previous', 'MinigamesApiController@minigamePreviousRound');
  Route::get('scan/minigames/{minigame}/round/next', 'MinigamesApiController@minigameNextRound');
  Route::get('scan/users/{wallet}/minigames/{minigame}/lives', 'MinigamesApiController@userMinigameLives');
  Route::get('scan/users/{wallet}/minigames/{minigame}/ranking', 'MinigamesApiController@userMinigameRanking');
  Route::get('scan/users/{wallet}/minigames/{minigame}/round/{round_name}/ranking', 'MinigamesApiController@userMinigameRoundRanking');
  Route::get('scan/users/{wallet}/minigames/{minigame}/ranking/active', 'MinigamesApiController@userMinigameActiveRoundRanking');
  Route::get('scan/users/{wallet}/minigames/{minigame}/ranking/previous', 'MinigamesApiController@userMinigamePreviousRoundRanking');

  Route::get('tokens/{address}/scanner', 'TokenController@scanner');
  Route::get('tokens/{address}/reports', 'TokenController@reports');
  Route::post('tokens/blacklist', 'TokenController@blacklist');
  Route::get('tokens/swappables', 'TokenController@swappables');

  Route::get('wallets/{address}/scanner', 'WalletController@scanner');
  Route::post('wallets/blacklist', 'WalletController@blacklist');

  Route::get('complaints', 'ComplaintController@fetch');

  Route::get('authuser', 'UserController@authuser');
  Route::post('users/login-or-register', 'UserController@loginOrRegister');
  Route::post('users/logout', 'UserController@logout');
  Route::get('users/referrals/ranking', 'UserController@referralRanking');
  Route::get('wallets/{wallet}/referrals', 'UserController@referrals');

  Route::get('count/users', 'CountController@users');
  Route::get('count/blacklist', 'CountController@blacklist');
  Route::get('count/reports', 'CountController@reports');
  Route::get('count/comments', 'CountController@comments');

  Route::get('languages/fetch', 'LanguageController@fetch');
  Route::get('languages/active', 'LanguageController@active');

  // MINIGAMES TEST
  Route::get('users/{wallet}/minigames/{slug}/lives', 'UserController@lives');
  Route::get('minigames/{slug}/ranking', 'UserController@ranking');
  Route::post('users/{wallet}/minigames/{slug}/score', 'UserController@score');
  Route::get('users/{wallet}/minigames/{slug}/highscore', 'UserController@highscore');

  Route::get('courses/fetch', 'CourseController@fetch');
  Route::get('courses/{course}/get', 'CourseController@get');
  Route::get('courses/{course}/comments', 'CourseController@comments');
  Route::get('courses/{slug}/get-by-slug', 'CourseController@getBySlug');
  Route::get('courses/{slug}/lessons/{lesson}', 'CourseController@lesson');

  Route::get('lessons/{lesson}/comments', 'LessonController@comments');
  Route::get('lessons/{lesson}/authuser-notes', 'LessonController@authuserNotes');

  Route::get('categories/fetch/{used?}', 'CategoryController@fetch');
  Route::get('categories/{course}/get', 'CategoryController@get');
  Route::get('categories/{slug}/get-by-slug', 'CategoryController@getBySlug');

  Route::get('users/{user}/enrolls', 'UserController@enrolls');

  Route::post('users/{user}/stakings', 'UserStakingController@create');
  Route::get('users/{user}/stakings/{staking}', 'UserStakingController@get');
  Route::post('users/{user}/stakings/{staking}/update', 'UserStakingController@update');
  Route::delete('users/{user}/stakings/{staking}', 'UserStakingController@delete');

  Route::get('users/{user}/tokens/{token}/staking/amount', 'UserStakingController@amountStakedByToken');

  Route::post('partners', 'PartnerController@create');
  Route::get('partners/{partner}', 'PartnerController@get');
  Route::post('partners/{partner}/update', 'PartnerController@update');
  Route::delete('partners/{partner}', 'PartnerController@delete');

  Route::get('translations/php-to-json-generate', 'TranslationController@phpToJsonGenerate');
});


Route::post('tokens/find-or-create', 'TokenController@findOrCreate');
Route::post('tokens/update-or-create', 'TokenController@updateOrCreate');
Route::post('tokens/{token}/report', 'TokenController@report');
Route::post('tokens/{token}/quit', 'TokenController@quit');

Route::post('wallets/find-or-create', 'WalletController@findOrCreate');
Route::post('wallets/{wallet}/report', 'WalletController@report');

Route::post('languages', 'LanguageController@store');
Route::post('languages/{language}', 'LanguageController@update');


// Route::group(['middleware' => ['auth']], function(){
  Route::get('classroom/courses/{course}', 'CourseController@classroom');
  Route::get('classroom/courses/{course}/lessons/{lesson}', 'ClassroomController@lesson');

  Route::post('courses/{course}/comment', 'CourseController@comment');
  Route::post('courses/{course}/subscribe', 'CourseController@subscribe');
  Route::post('comments/{comment}/likes/toggle', 'CommentController@likeToggle');

  Route::post('lessons/{lesson}/comment', 'LessonController@comment');

  Route::post('reports/{report}/likes', 'ReportController@like');
  Route::post('reports/{report}/dislikes', 'ReportController@dislike');
  Route::get('reports/{report}/comments', 'ReportController@comments');
  Route::post('reports/{report}/comment', 'ReportController@comment');
// });


Route::get('/{any}', 'WebController@router')->where('any', '.*')->name('router');