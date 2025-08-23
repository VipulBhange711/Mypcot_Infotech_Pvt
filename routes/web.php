<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MyController::class, 'test'])->name('test');
Route::get('/adminDashboard', [MyController::class, 'AdminDash'])->name('ADMdashboard');
Route::get('/CreateProject', [MyController::class, 'CreateProject'])->name('CreateProject');
Route::get('/ViewList', [MyController::class, 'ViewList'])->name('ViewList');
