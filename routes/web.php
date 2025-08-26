<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');


Route::post('/login', [LoginController::class, 'handleLogin'])->name('login')->middleware('guest');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('master-data')->as ('master-data.')->group(function () {
        Route::prefix('categories')->as('categories.')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index' )->name('index');
            Route::post('/', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });
});
