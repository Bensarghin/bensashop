<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontoffice\ProductController;

Route::prefix('product')->name('product.')->group(function(){
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::post('/{product}', [ProductController::class, 'store'])->name('store');
});

Route::get('thank-you/', [ProductController::class, 'OrderConfirmation'])->name('thankyou');

Route::get('/', [HomeController::class, 'index'])->name('home');
