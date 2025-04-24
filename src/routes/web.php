<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/register', [ProductController::class, 'register']);
Route::post('/register', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'product']);
Route::patch('/products/update', [ProductController::class, 'update']);
Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');