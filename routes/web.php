<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

Route::middleware('auth')->group(function () {
    Route::get('/index', [CompanyController::class, 'index'])->name('home');
    Route::get('/index/create', [CompanyController::class, 'create'])->name('index.create');
    Route::get('/index/edit/{company}', [CompanyController::class, 'edit'])->name('index.edit');
    Route::post('/index/create', [CompanyController::class, 'store'])->name('index.store');
    Route::delete('/index/{company}', [CompanyController::class, 'destroy'])->name('index.destroy');
    Route::put('/index/{company}', [CompanyController::class, 'update'])->name('index.update');

    Route::delete('/logout', [AuthController::class, 'destroy']);
});

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'create'])->middleware('guest')->name('login');
    Route::post('/', [AuthController::class, 'store'])->middleware('guest');
});
