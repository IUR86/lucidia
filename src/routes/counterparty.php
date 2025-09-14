<?php

use App\Http\Controllers\Counterparty\HomeController;
use App\Http\Controllers\Counterparty\LoginController;
use Illuminate\Support\Facades\Route;

$domain = config('app.domain', 'localhost');

// 契約相手画面
Route::domain("{subdomain}.{$domain}")->prefix('counterparty')->middleware(['counterparty.subdomain'])->name('counterparty.')->group(function () {
    // ログイン画面
    Route::controller(LoginController::class)->name('login.')->group(function () {
        Route::get('/login', 'index')->name('index');
        Route::post('/login', 'login')->name('login');
    });
    // [ログイン状態]
    Route::middleware('counterparty.auth')->group(function () {
        // ホーム画面
        Route::controller(HomeController::class)->name('home.')->group(function () {
            Route::get('/', 'index')->name('index');
        });
    });
});
