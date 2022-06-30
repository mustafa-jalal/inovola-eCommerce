<?php

use Illuminate\Support\Facades\Route;

Route::prefix('merchant')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

Route::prefix('store')->middleware('auth:merchant')->controller(StoreController::class)->group(function () {
    Route::patch('/', 'update');
});
