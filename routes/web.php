<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [ProductController::class, 'index'])->name('home');         
Route::get('/admin', [ProductController::class, 'index'])->name('admin.index');
Route::get('/admin/{id}', [ProductController::class, 'show'])->name('admin.detail');

Route::get('/admin/create', [ProductController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store');

Route::delete('/admin/{id}', [ProductController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [ProductController::class, 'update'])->name('admin.update');

Route::get('/allproduk', [ProductController::class, 'Allproduk'])->name('admin.allproduk');


