<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

// ユーザ画面
Route::prefix('/')->name('user.')->group(function () {
    // ホーム
    Route::controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});