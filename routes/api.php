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


Route::post('/login', Users\Controllers\LoginController::class)->name('login');

Route::group(["middleware" => ["auth:api", 'inject.filters.me']], function () {

    include 'api/users.php';
    include 'api/tickets.php';


    Route::post('/logout', Users\Controllers\LogoutController::class)->name('logout');
});





