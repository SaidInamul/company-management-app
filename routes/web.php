<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

// Company
Route::get('/index', [CompanyController::class, 'index']);
Route::get('/index/create', [CompanyController::class, 'create'])->name('index.create');;
Route::get('/index/edit/{company}', [CompanyController::class, 'edit'])->name('index.edit');
Route::post('/index/create', [CompanyController::class, 'store'])->name('index.store');
Route::delete('/index/{company}', [CompanyController::class, 'destroy'])->name('index.destroy');


// Authentication
Route::get('/', [AuthController::class, 'create']);
Route::post('/', [AuthController::class, 'store']);
Route::delete('/logout', [AuthController::class, 'destroy']);
