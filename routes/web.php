<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontoffice\ProductController;

Route::prefix('product')->name('product.')->group(function(){

    Route::get('/{product}', [ProductController::class, 'show'])->name('show');

});

Route::get('/thankyou', function () {
    return view('frontoffice.product.thankyou');
});

Route::get('/', [HomeController::class, 'index']);
