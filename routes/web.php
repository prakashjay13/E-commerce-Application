<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('auth.login');
});
Route::get('/checking', function () {
    return view('/auth/login');
});

Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::resource('users', UserController::class);

    Route::resource('coupons', CouponController::class);

    Route::resource('banners', BannerController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);
});
