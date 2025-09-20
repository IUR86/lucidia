<?php

use App\Http\Controllers\User\Api\CartItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ShoppingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ユーザ画面
Route::prefix('/')->name('user.')->group(function () {
    // ログイン
    Route::prefix('/login')->controller(LoginController::class)->name('login.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
    });
    // ホーム
    Route::prefix('/')->controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // 商品
    Route::prefix('/product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // カート
    Route::prefix('/cart')->controller(CartController::class)->name('cart.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // 購入手続き
    Route::prefix('/shopping')->controller(ShoppingController::class)->name('shopping.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/complete', 'complete')->name('complete');
    });
    // API
    Route::prefix('/api')->name('api.')->group(function () {
        // カートアイテム
        Route::prefix('/cart_item')->controller(CartItemController::class)->name('cart_item.')->group(function () {
            Route::post('/add', 'add')->name('add');
        });
    });
});