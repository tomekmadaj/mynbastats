<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GameController;
use App\Http\controllers\User\NbaStatsController;

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

Route::group([
    'as' => 'home.',
    'namespace' => 'Home'
], function () {
    Route::get('/', 'MainController@home')
        ->name('mainPage');
    Route::get('/standings', 'MainController@standings')
        ->name('standings');
    Route::get('/news', 'NewsController@news')
        ->name('news');
    Route::get('/highlights', 'NewsController@highlights')
        ->name('highlights');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group([
        'prefix' => 'nbaStats',
        'as' => 'nbaStats.',
        'namespace' => 'User'
    ], function () {
        route::get('team', 'NbaStatsController@team')
            ->name('teamDashboard');
        route::get('player', 'NbaStatsController@player')
            ->name('playerDashboard');
        Route::get('teamNews', 'NewsController@teamNews')
            ->name('teamNews');
        Route::get('teamHighlights', 'NewsController@teamHighlights')
            ->name('highlights');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group([
        'prefix' => 'me',
        'as' => 'me.',
        'namespace' => 'User'
    ], function () {
        Route::get('profile', 'UserController@profile')
            ->name('profile');
        Route::get('edit', 'UserController@edit')
            ->name('edit');
        //zmiana metody na post przy update -update danych przez formularz
        Route::post('update', 'UserController@update')
            ->name('update');
    });

    //Admin
    Route::get('users', 'UserController@list')
        ->name('get.users');

    Route::get('users/{userId}', 'UserController@show')
        ->name('get.user.show')
        ->middleware('can:admin-level');
});

Route::get('/updateschedule', function () {
    Artisan::call('nba:update-schedule');
});
Route::get('/updateboxscore', function () {
    Artisan::call('nba:update-games-boxscore');
});


Auth::routes();
