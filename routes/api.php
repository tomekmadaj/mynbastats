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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('games', 'Api\GameController')
    ->only([
        'index', 'show'
    ]);

// na potrzeby testów API
    // Route::get('/games', function (Request $request) {
    //     $size = $request->get('size', 5);
    //     return Game::paginate($size);
    // });