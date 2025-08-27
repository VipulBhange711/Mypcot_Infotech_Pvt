<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MyController::class, 'test'])->name('test');
Route::get('/adminDashboard', [MyController::class, 'AdminDash'])->name('ADMdashboard');
Route::get('/CreateProject', [MyController::class, 'CreateProject'])->name('CreateProject');
Route::get('/ViewList', [MyController::class, 'ViewList'])->name('ViewList');
Route::post('/PostView', [MyController::class, 'submitProduct'])->name('postProduct');


Route::get('users', [MyController::class, 'index'])->name('users.index');
Route::post('/products/update', [MyController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [MyController::class, 'destroy'])->name('products.destroy');