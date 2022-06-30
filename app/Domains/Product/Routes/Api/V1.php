<?php

use Illuminate\Support\Facades\Route;

Route::prefix('products')->middleware('auth:merchant')->controller(ProductsController::class)->group(function () {
    Route::post('/', 'store');
});
