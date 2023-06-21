<?php

namespace App\Http\Controllers\frontoffice;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{

    public function addToCart(Request $request) {
        $product = Product::find($request->product_id);
        \Cart::add([
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()
        ]);
        return response()->json(['message' => 'success added to cart']);
    }

    public function getCart() {
        $cart = \Cart::getcontent();
         return response()->json($cart);
    }

    public function removeFromCart(Request $request) {
        \Cart::remove($request->product_id);
    }
}
