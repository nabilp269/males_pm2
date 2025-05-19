<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController ;

    
// // Auth routes - untuk guest (belum login)
// Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
// });

// Route untuk user yang sudah login
Route::middleware(['auth', 'admin'])->group(function () {
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
    Route::post('admin/prosescheckout/{id}', [ProductController::class, 'processCheckout'])->name('admin.processCheckout');
    Route::get('/history', [ProductController::class, 'history'])->name('admin.history');

    // Parameter routes (diletakkan paling bawah agar tidak konflik)
    Route::get('/admin/{id}', [ProductController::class, 'show'])->name('admin.detail');
    Route::get('/admin/{id}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [ProductController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [ProductController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware(['auth', 'user'])->group(function () {
     // Halaman produk, tentang kami, dan kontak
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/produk', [UserController::class, 'allProduk'])->name('user.allproduk');
    Route::get('/tentang-kami', [UserController::class, 'Tentang'])->name('user.tentang');
    Route::get('/kontak', [UserController::class, 'Kontak'])->name('user.kontak');
    Route::post('/kontak/send', [UserController::class, 'sendContact'])->name('user.kontak.send');

    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.detail');
    // Checkout dan riwayat pesanan
    Route::get('/checkout/{id}', [UserController::class, 'checkout'])->name('user.checkout');
    Route::post('/prosescheckout/{id}', [UserController::class, 'processCheckout'])->name('user.processCheckout');
    Route::get('/riwayat', [UserController::class, 'history'])->name('user.history');
    Route::post('/orders/{order}/upload-bukti', [UserController::class, 'uploadBukti'])->name('orders.uploadBukti');


   });

   // Logout
   Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
   
   