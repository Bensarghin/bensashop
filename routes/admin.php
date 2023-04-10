<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;





Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);

Auth::routes();
?>