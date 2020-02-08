<?php

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

Route::Auth();
Route::middleware('auth')->group(function () {
    Route::get('/', 'Web\OrderController@index');
    Route::get('/order/{id}/detail', 'Web\OrderController@show')->name('orderDetail');
});
