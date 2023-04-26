<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('backoffice.order.index',[
            'orders' => $orders,
            'products' => $products,
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('backoffice.order.create',[
            'products' => $products,
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pay_status' => 'required',
            'ship_status' => 'required',
            'product_id' => 'required',
            'customer_id' => 'required',
        ]);

        Order::create([
            'pay_status' => $request->pay_status,
            'ship_status' => $request->ship_status,
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id
        ]);

        return redirect()->back()->with('success','order added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
