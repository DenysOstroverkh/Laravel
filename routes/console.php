<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('logs:clear', function() {
  exec('echo "" > ' . storage_path('logs/laravel.log'));
  $this->comment('Logs from laravel.log have been cleared!');
  exec('echo "" > ' . storage_path('logs/info.log'));
  $this->comment('Logs from info.log have been cleared!');
})->describe('Clear log files (laravel.log, info.log)');

Artisan::command('admin:clear-cache', function () {
  $this->call('view:clear');
  $this->call('cache:clear');
  $this->call('config:cache');
  $this->comment('Cache is cleared!');
})->describe('Clears cache and store again');

