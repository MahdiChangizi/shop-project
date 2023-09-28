<?php

use App\Http\Controllers\Auth\AuthController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Auth Routes
|--------------------------------------------------------------------------

*/

Route::prefix('auth')->namespace('Auth')->middleware('guest')->group(function() {
    // register a user
    Route::get('/registerForm', [AuthController::class, 'registerForm'])
    ->name('auth.registerForm');
    Route::post('/register', [AuthController::class, 'register'])
    ->name('auth.register');

    // login
    Route::get('/loginForm', [AuthController::class, 'loginForm'])
    ->name('auth.loginForm');
    Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login');


    // active code for user
    Route::get('/activationForm', [AuthController::class, 'activationForm'])
    ->name('auth.activationForm');
    
    Route::post('/activation', [AuthController::class, 'activation'])
    ->name('auth.activation');

});

Route::post('auth/logout/', [AuthController::class, 'logout'])
->name('auth.logout')
->middleware('auth');