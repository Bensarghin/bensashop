<?php

namespace App\Http\Controllers\frontoffice;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product) {
        return view('frontoffice.product.show',[
            'product' => $product
        ]);
    }
}
