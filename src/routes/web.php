<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
Route::post('/products/confirm', [ProductController::class, 'confirm'])->name('products.confirm'); 
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('products.delete');


