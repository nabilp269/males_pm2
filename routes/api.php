<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('product', [ProductController::class,'index']);
Route::post('product/store', [ProductController::class,'store']);
Route::get('product/{id}',[ProductController::class, 'show']);
Route::delete('product/delete/{id}',[ProductController::class, 'destroy']);
Route::put('product/edit/{id}',[ProductController::class, 'update']);