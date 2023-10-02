<?php


use App\Http\Controllers\Coustomer\HomeController;
use App\Http\Controllers\Coustomer\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->namespace('Coustomer')->group(function() {

    Route::get('', [HomeController::class, 'home'])->name('coustomer.home');


    Route::get('profile', [ProfileController::class, 'index'])->name('coustomer.profile');

    Route::get('editProfile', [ProfileController::class, 'edit'])->name('coustomer.editProfile');
    Route::put('updateProfile/{user}', [ProfileController::class, 'update'])->name('coustomer.updateProfile');

});


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';