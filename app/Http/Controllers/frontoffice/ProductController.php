<?php

namespace App\Http\Controllers\frontoffice;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product) {
        return view('frontoffice.product.show',[
            'product' => $product
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|digits:10'
        ]);

        $customer = Customer::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone
        ]);

        $order = Order::create([
            'pay_status' => 'unshiped',
            'ship_status' => 'unpaid',
            'product_id' => $product->id,
            'customer_id' => $customer->id
        ]);
        $request->session()->put('order', $order);
        return redirect()->route('thankyou',[
            'order' => $order
        ]);
    }

    public function OrderConfirmation(Request $request)
    {
        $order = $request->session()->get('order');
        return view('frontoffice.product.thankyou',[
            'order' => $order
        ]);
    }
}
