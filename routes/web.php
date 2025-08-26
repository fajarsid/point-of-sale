<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('auth.login');
});


Route::post('/login', [LoginController::class, 'handleLogin'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');