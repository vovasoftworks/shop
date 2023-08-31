<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Products\GetProductController;
use App\Http\Controllers\Products\DeleteProductController;
use App\Http\Controllers\Products\UpdateProductController;
use App\Http\Controllers\Products\CreateProductController;
use App\Http\Controllers\Categories\DeleteCategoryController;
use App\Http\Controllers\Categories\CreateCategoryController;

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

Route::prefix('user')->group(function () {
    Route::post('/register', UserRegisterController::class);
    Route::post('/login', UserLoginController::class);
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('category')->group(function () {
        Route::post('/', CreateCategoryController::class);
        Route::delete('/{id}', DeleteCategoryController::class);
    });
    Route::prefix('product')->group(function () {
        Route::post('/', CreateProductController::class);
        Route::get('/{id}', GetProductController::class);
        Route::patch('/{id}', UpdateProductController::class);
        Route::delete('/{id}', DeleteProductController::class);
    });
});

