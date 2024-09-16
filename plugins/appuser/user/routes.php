<?php

use Illuminate\Support\Facades\Route;
use AppUser\User\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => \AppUser\User\Middleware\AuthMiddleware::class], function () {
    Route::get('logs', 'AppUser\User\Controllers\LogController@index');
});



