<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendOrderCompleteMail;

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

// Route::get('/', function () {
//     return view('guest.index');
// });

Auth::routes();

Route::middleware('auth')
        ->prefix('admin')   
        ->namespace('Admin')
        ->name('admin.')
        ->group(function (){
            
            Route::get('/home', 'HomeController@index')->name('home');

            Route::resource('plates', 'PlateController');

            Route::resource('restaurants', 'RestaurantController')->only([
                'create', 'store'
            ]);

            Route::resource('orders', 'OrderController')
                ->only('index');/* ->name('orders'); */

            Route::resource('charts', 'ChartController')
            ->only('index', 'create');
        });

Route::fallback(function() {
    return view('guest.index');
});


Route::get('/loading', 'LoaderController@index')->name('loading');

Route::get('/email', function () {
    return new SendOrderCompleteMail();
});