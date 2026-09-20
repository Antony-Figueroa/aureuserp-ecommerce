<?php

use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Vercel Cron: /api/schedule — runs every hour to execute artisan scheduler.
| This is required for Vercel's cron feature to work with Laravel.
|
*/

Route::get('/schedule', function () {
    $exitCode = \Illuminate\Support\Facades\Artisan::call('schedule:run');

    return response()->json([
        'status' => $exitCode === 0 ? 'ok' : 'error',
        'output' => \Illuminate\Support\Facades\Artisan::output(),
    ]);
});
