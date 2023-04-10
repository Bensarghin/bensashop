<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/product/{product}', function () {
    return view('frontoffice.product.show');
});

Route::get('/thankyou', function () {
    return view('frontoffice.Product.thankyou');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
