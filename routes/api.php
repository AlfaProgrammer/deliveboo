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

// Questo  è il messaggio per provare il migrazione branch

Route::namespace('api')
    ->name('api.')
    ->group(function(){
        Route::resource('plates', 'PlateController')
        ->only('store');
    });

Route::namespace('api')
    ->name('api.')
    ->group(function(){
        Route::resource('restaurants', 'RestaurantController')
        ->only('index', 'show');
    });

Route::namespace('api')
->name('api.')
->group(function(){
    Route::resource('orders', 'OrderController')
    ->only('index', 'store');
});