<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backoffice.product.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('visible','1')->get();
        return view('backoffice.product.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
            'price' => 'required|numeric',
            'compare_price' => 'required|numeric',
            'description' => 'required',
            'slug' => 'required|unique:products,slug',
            'category' => 'required',
            'visible' => 'nullable',
            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        $product = Product::create([

            'name' => $request->name,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'description' => $request->description,
            'slug' => Str::slug($request->slug,'-'),
            'visible' => isset($request->visible)?'1':'0',
            'category_id' => $request->category

        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $image) {
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('uploads/products'), $name);
                $filename = basename($path);
                Image::create([
                    'product_id' => $product->id,
                    'name' => $filename
                ]);

            }
        }

        return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
