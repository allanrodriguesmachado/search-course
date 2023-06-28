<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login.do');

    Route::get('home', [AuthController::class, 'home'])
        ->middleware(['auth', 'verified'])->name('home');

    Route::get('logout', [AuthController::class, 'logout'])
        ->name('logout');
});
