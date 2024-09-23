<?php

use Illuminate\Support\Facades\Route;
use AppUser\User\Http\AuthController;
use AppUser\User\Http\LogController;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => \AppUser\User\Middleware\AuthMiddleware::class], function () {
    Route::get('logs', 'AppUser\User\Http\LogController@index');
});
