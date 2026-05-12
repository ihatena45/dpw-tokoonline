<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::resource('transactions', TransactionController::class);
});