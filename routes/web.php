<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontoffice\ProductsController;
use App\Http\Controllers\frontoffice\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::prefix('product')->name('product.')->group(function(){
    Route::get('/{product}', [ProductsController::class, 'show'])->name('show');
    Route::post('/{product}', [ProductsController::class, 'store'])->name('store');
});

Route::get('/api/cart',[CartController::class, 'getCart']);
Route::post('/api/cart/add',[CartController::class, 'addToCart']);
Route::post('/api/cart/remove/',[CartController::class, 'removeFromCart']);
Route::get('thank-you/', [ProductsController::class, 'OrderConfirmation'])->name('thankyou');

Route::get('/', [HomeController::class, 'index'])->name('home');

// begin backoffice routes
Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('auth')->group(function(){
        Route::get('/', [DashboardController::class,'index'])->name('home');
        Route::get('/edit', [UpdateUserController::class,'edit'])->name('user.edit');
        Route::post('/edit', [UpdateUserController::class,'update'])->name('user.update');
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('order', OrderController::class);  
        });
    
    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]);
});
// end backoffice routes
