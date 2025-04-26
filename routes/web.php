<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Auth routes - untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/', [ProductController::class, 'index'])->name('home');

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin routes
    Route::get('/admin', [ProductController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [ProductController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store');
    Route::get('/admin/allproduk', [ProductController::class, 'allProduk'])->name('admin.allproduk');
    Route::get('/admin/tentang-kami', [ProductController::class, 'Tentang'])->name('admin.tentang');
    Route::get('/admin/kontak', [ProductController::class, 'Kontak'])->name('admin.kontak');
    Route::post('/admin/kontak/send', [ProductController::class, 'sendContact'])->name('admin.kontak.send');

    // Checkout dan riwayat
    Route::get('/admin/checkout/{id}', [ProductController::class, 'checkout'])->name('admin.checkout');
    Route::post('/checkout/{id}', [ProductController::class, 'processCheckout'])->name('processCheckout');
    Route::get('/history', [ProductController::class, 'history'])->name('admin.history');

    // Halaman Pesanan
    Route::get('/pesanan/{id}', [ProductController::class, 'pesanan'])->name('pesanan');
    Route::post('/pesanan', [ProductController::class, 'storePesanan'])->name('pesanan.store');

    // Parameter routes (diletakkan paling bawah agar tidak konflik)
    Route::get('/admin/{id}', [ProductController::class, 'show'])->name('admin.detail');
    Route::get('/admin/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [ProductController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [ProductController::class, 'destroy'])->name('admin.destroy');
});