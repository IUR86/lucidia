<?php

use App\Http\Controllers\User\Api\CartItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\OrderHistoryController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ShoppingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ユーザ画面
Route::prefix('/')->name('user.')->group(function () {
    // 新規登録
    Route::prefix('/register')->controller(RegisterController::class)->name('register.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/email/verify/{id}/{hash}', 'verificationVerify')->name('verification.verify');
    });
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
    // API
    Route::prefix('/api')->name('api.')->group(function () {
        // カートアイテム
        Route::prefix('/cart_item')->controller(CartItemController::class)->name('cart_item.')->group(function () {
            Route::post('/add', 'add')->name('add');
        });
    });
    Route::middleware(['user.auth'])->group(function () {
        // ログアウト
        Route::prefix('/login')->controller(LogoutController::class)->name('logout.')->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });
        // 購入手続き
        Route::prefix('/shopping')->controller(ShoppingController::class)->name('shopping.')->group(function () {
            Route::post('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/complete', 'complete')->name('complete');
        });
        // 購入
        Route::prefix('/order')->name('order.')->group(function () {
            Route::prefix('/history')->controller(OrderHistoryController::class)->name('history.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
    });
});
