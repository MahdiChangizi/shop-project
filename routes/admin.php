<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function() {

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



    // banner
    Route::prefix('banner')->namespace('Banner')->group(function() {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');

        Route::get('/create', [BannerController::class, 'create'])->name('admin.banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin.banner.store');

        Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::put('/update/{banner}', [BannerController::class, 'update'])->name('admin.banner.update');

        Route::delete('/delete/{banner}', [BannerController::class, 'delete'])->name('admin.banner.delete');
        Route::get('/status/{banner}', [BannerController::class, 'status'])->name('admin.banner.status');
    });




    // users
    Route::prefix('user')->namespace('User')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/admin', [UserController::class, 'indexAdmin'])->name('admin.user.indexAdmin');
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('admin.user.delete');

        Route::get('/permission/{user}', [UserController::class, 'permission'])->name('admin.user.permission');
        Route::post('/permissionCreate/{user}', [UserController::class, 'permissionCreate'])->name('admin.user.permission.create');

        Route::get('/role/{user}', [UserController::class, 'role'])->name('admin.user.role');
        Route::post('/roleCreate/{user}', [UserController::class, 'roleCreate'])->name('admin.user.role.create');
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





    // roles
    Route::prefix('role')->namespace('Role')->group(function() {
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::delete('/delete/{role}', [RoleController::class, 'delete'])->name('admin.role.delete');
    });





    // Provinces and cities
    Route::prefix('province')->namespace('Province')->group(function() {
        Route::get('/', [ProvinceController::class, 'index'])->name('admin.province.index');
        Route::get('/create', [ProvinceController::class, 'create'])->name('admin.province.create');
        Route::post('/store', [ProvinceController::class, 'store'])->name('admin.province.store');
        Route::get('/edit/{province}', [ProvinceController::class, 'edit'])->name('admin.province.edit');
        Route::put('/update/{province}', [ProvinceController::class, 'update'])->name('admin.province.update');
        Route::delete('/delete/{province}', [ProvinceController::class, 'delete'])->name('admin.province.delete');

        Route::get('/status/{province}', [ProvinceController::class, 'status'])->name('admin.province.status');
    });


    Route::prefix('city')->namespace('City')->group(function() {
        Route::get('/', [CityController::class, 'index'])->name('admin.city.index');
        Route::get('/create', [CityController::class, 'create'])->name('admin.city.create');
        Route::post('/store', [CityController::class, 'store'])->name('admin.city.store');
        Route::get('/edit/{city}', [CityController::class, 'edit'])->name('admin.city.edit');
        Route::put('/update/{city}', [CityController::class, 'update'])->name('admin.city.update');
        Route::delete('/delete/{city}', [CityController::class, 'delete'])->name('admin.city.delete');
        Route::delete('/delete/{city}', [CityController::class, 'delete'])->name('admin.city.delete');

        Route::get('/status/{city}', [CityController::class, 'status'])->name('admin.city.status');
    });
    // Provinces and cities



    // roles
    Route::prefix('profile')->namespace('Role')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
        
        Route::get('/setting', [ProfileController::class, 'setting'])->name('admin.profile.setting');
        Route::put('setting/update/{user}', [ProfileController::class, 'update'])->name('admin.profile.settingUpdate');
    });

});