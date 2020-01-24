<?php

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


Route::post('/login', 'Users\AuthController@login')->name('login');


Route::group(["middleware" => ["auth:api", 'inject.filters.me']], function () {

    Route::post('/logout', 'Users\AuthController@logout')->name('logout');
});





