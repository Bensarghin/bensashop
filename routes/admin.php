<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;



Route::middleware('auth')->group(function(){
    
Route::get('/', [DashboardController::class,'index'])->name('home');
Route::get('/admin/edit', [UpdateUserController::class,'edit'])->name('user.edit');
Route::post('/admin/edit', [UpdateUserController::class,'update'])->name('user.update');
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);

});

Auth::routes([
    // 'register' => false,
    'reset' => false,
    'verify' => false,
]);
?>