<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::post('product', [ProductController::class, 'store'])->name('products.store');
});
