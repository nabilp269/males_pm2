<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserController;

// Route untuk login
Route::post('/login', [UserController::class, 'login']);

// Route untuk register
Route::post('/register', [UserController::class, 'register']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/produk', [UserController::class, 'allProduk']);
Route::get('/produk', [UserController::class, 'allProduk']);


// Route untuk logout (wajib pakai auth sanctum)
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('product', [ProductController::class,'index']);//->middleware(['auth:sanctum']);
Route::post('product/store', [ProductController::class,'store']);
Route::get('product/{id}',[ProductController::class, 'show']);
Route::delete('product/delete/{id}',[ProductController::class, 'destroy']);
Route::put('product/edit/{id}',[ProductController::class, 'update']);

// Route::get('login/', [AuthController::class, 'login']);
// Route::get('logout/', [AuthController::class, 'logout']);