<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin'], function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::get('home', [AuthController::class, 'home'])->name('home');
});
