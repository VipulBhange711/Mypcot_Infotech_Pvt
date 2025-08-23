<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MyController::class, 'test'])->name('test');
Route::get('/adminDashboard', [MyController::class, 'AdminDash'])->name('ADMdashboard');
