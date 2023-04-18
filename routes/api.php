<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 Route::post('login',[AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('customer', CustomerController::class);
});
