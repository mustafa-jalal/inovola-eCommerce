<?php

use Illuminate\Support\Facades\Route;

Route::prefix('consumer')->controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

Route::prefix('consumer')->middleware('auth:consumer')->controller(CartController::class)->group(function () {
    Route::post('addToCart', 'addTo');
});
