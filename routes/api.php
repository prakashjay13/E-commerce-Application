<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'api'], function ($router) {

    Route::post('/register', [ApiController::class, 'register']);

    Route::post('/login', [ApiController::class, 'login']);

    Route::post('/contact', [ApiController::class, 'contact']);

    Route::post('/logout', [ApiController::class, 'logout']);

    Route::get('/product', [ProductApiController::class, 'product']);

    Route::get('/catpro/{id}', [ProductApiController::class, 'catpro']);

    Route::get('/banner', [ProductApiController::class, 'banner']);

    Route::get('/category', [ProductApiController::class, 'category']);

    Route::get('/profile', [ApiController::class, 'profile']);
});
