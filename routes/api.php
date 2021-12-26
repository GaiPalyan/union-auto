<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

/*
 * public routs
 */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'logIn']);
Route::get('{code}', [UrlController::class, 'redirect'])->name('redirect');

/*
 * protected routs
 */
Route::group(['middleware' =>'auth:sanctum'], function () {
    Route::resource('urls', UrlController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
