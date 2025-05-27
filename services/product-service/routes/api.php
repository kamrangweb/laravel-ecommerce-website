<?php

use ProductService\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Product Service Routes
Route::prefix('api/products')->group(function () {
    Route::get('/featured', [ProductController::class, 'getFeaturedProducts']);
    Route::get('/', [ProductController::class, 'getAllProducts']);
    Route::get('/{id}', [ProductController::class, 'getProduct']);
}); 