<?php

use App\Http\Controllers\Admin\CounterpartyController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SalonController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->group(function () {
    // [ログイン状態]
    Route::middleware('admin.auth')->group(function () {
        // ホーム
        Route::controller(HomeController::class)->name('home.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        // 管理者
        Route::prefix('/admin_user')->controller(HomeController::class)->name('admin_user.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
        // お知らせ
        Route::prefix('/news')->controller(NewsController::class)->name('news.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}', 'edit')->name('edit');
            Route::post('/{id}', 'update')->name('update');
        });
        // 権限
        Route::prefix('/role')->controller(RoleController::class)->name('role.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
        });
        // 契約相手
        Route::prefix('/counterparty')->controller(CounterpartyController::class)->name('counterparty.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
        });
        // サロン
        Route::prefix('/salon')->controller(SalonController::class)->name('salon.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
        });
        // 商品管理
        Route::prefix('/product')->controller(ProductController::class)->name('product.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
        });
        // ログアウト
        Route::post('/logout', LogoutController::class)->name('logout');
    });
    // [未ログイン状態]
    Route::middleware('admin.gest')->group(function () {
        // ログイン画面
        Route::controller(LoginController::class)->name('login.')->group(function () {
            Route::get('/login', 'index')->name('index');
            Route::post('/login', 'login')->name('login');
        });
    });
});
