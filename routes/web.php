<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::resource('users', UserController::class);


    Route::get('users', [UserController::class, 'roles']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



