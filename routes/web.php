<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Coustomer\HomeController;
use App\Models\Admin\Brand;
use App\Models\Admin\Permission;
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



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->namespace('Admin')->group(function() {

    // categories
    Route::prefix('category')->namespace('Category')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');

        Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/status/{category}', [CategoryController::class, 'status'])->name('admin.category.status');
    });



    // brand
    Route::prefix('brand')->namespace('Brand')->group(function() {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.brand.store');

        Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');

        Route::delete('/delete/{brand}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::get('/status/{brand}', [BrandController::class, 'status'])->name('admin.brand.status');
    });




    // products
    Route::prefix('product')->namespace('Product')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');

        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');

        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/status/{product}', [ProductController::class, 'status'])->name('admin.product.status');

        Route::get('/attributes/{product}', [ProductController::class, 'attribute'])->name('admin.product.attributes');
    });



    // comment
    Route::prefix('comment')->namespace('Comment')->group(function() {
        Route::get('/', [CommentController::class, 'index'])->name('admin.comment.index');
        Route::delete('/delete/{comment}', [CommentController::class, 'delete'])->name('admin.comment.delete');
        Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.comment.status');
        Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.comment.show');
        Route::post('/ShowCreate/{comment}', [CommentController::class, 'ShowCreate'])->name('admin.comment.ShowCreate');

    });




    // users
    Route::prefix('user')->namespace('User')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/admin', [UserController::class, 'indexAdmin'])->name('admin.user.indexAdmin');
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });






    // permissions
    Route::prefix('permission')->namespace('Permission')->group(function() {
        Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('admin.permission.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('admin.permission.store');
        Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
        Route::put('/update/{permission}', [PermissionController::class, 'update'])->name('admin.permission.update');
        Route::delete('/delete/{permission}', [PermissionController::class, 'delete'])->name('admin.permission.delete');
    });



});


/*
|--------------------------------------------------------------------------
| End Admin Routes
|--------------------------------------------------------------------------
*/




/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->namespace('Auth')->group(function() {
    // register a user
    Route::get('/registerForm', [AuthController::class, 'registerForm'])->name('auth.registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    // login
    Route::get('/loginForm', [AuthController::class, 'loginForm'])->name('auth.loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

});


/*
|--------------------------------------------------------------------------
| End Auth Routes
|--------------------------------------------------------------------------
*/





/*
|--------------------------------------------------------------------------
| Coustomer Routes
|--------------------------------------------------------------------------
*/
Route::prefix('')->namespace('Coustomer')->group(function() {

    Route::get('/home', [HomeController::class, 'home'])->name('coustomer.home');




});

/*
|--------------------------------------------------------------------------
| End Coustomer Routes
|--------------------------------------------------------------------------
*/


