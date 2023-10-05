<?php

use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Auth Routes
|--------------------------------------------------------------------------

*/

Route::prefix('auth')->namespace('Auth')->group(function() {

    Route::middleware('guest')->group(function() {
        // register a user
        Route::get('/registerForm', [RegisterController::class, 'registerForm'])->name('auth.registerForm');
        Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

        // login
        Route::get('/loginForm', [LoginController::class, 'loginForm'])->name('auth.loginForm');
        Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    });

    Route::middleware('auth')->group(function() {
        // active code for user
        Route::get('/activationForm', [ActivationController::class, 'activationForm'])->name('auth.activationForm');
        Route::post('/activation', [ActivationController::class, 'activation'])->name('auth.activation');
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    });

});
