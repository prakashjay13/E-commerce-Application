<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;

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

    Route::resource('status', StatusController::class);

    Route::resource('banners', BannerController::class);

    Route::resource('cms', CmsController::class);

    Route::resource('configuration', ConfigController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::get('/checkout', [UserController::class, "checkout"]);



    Route::get('/regusers', [ProductController::class, "regusers"]);

    Route::get('/editstatus/{id}', [StatusController::class, 'editstatus']);
    Route::post('/updatestatus', [StatusController::class, "updatestatus"]);
    Route::get('/order', [StatusController::class, "order"]);
});
