<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckBearerToken;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComercioController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware([CheckBearerToken::class])->group(function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('/comercios', [ComercioController::class, 'index']);
    Route::get('/comercios/{id}', [ComercioController::class, 'show']);
});
