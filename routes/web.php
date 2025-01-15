<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

// Company
Route::get('/index', [CompanyController::class, 'index']);


// Authentication
Route::get('/', [AuthController::class, 'create']);
Route::post('/', [AuthController::class, 'store']);
Route::delete('/logout', [AuthController::class, 'destroy']);
