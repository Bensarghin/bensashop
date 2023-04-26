<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
            
            'name' => 'required|string|max:255|unique:products,name',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric',
            'compare_price' => 'required|numeric',
            'description' => 'required',
            'categories' => 'required',
            'visible' => 'nullable',
            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        $product = Product::create([

            'name' => $request->name,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'description' => $request->description,
            'slug' => Str::slug($request->slug,'-'),
            'visible' => isset($request->visible)?'1':'0'

        ]);

        $product->categories()->attach($request->categories);

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

        return redirect()->back()->with('success', 'Product Added');
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
        $categories = Category::all();
        return view('backoffice.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            
            'name' => 'required|string|max:255|unique:products,name,'.$product->id,
            'slug' => 'required|string|max:255|unique:products,slug,'.$product->id,
            'price' => 'required|numeric',
            'compare_price' => 'required|numeric',
            'description' => 'required',
            'categories' => 'required',
            'visible' => 'nullable',
            'files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        $product->update([

            'name' => $request->name,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'description' => $request->description,
            'slug' => Str::slug($request->slug,'-'),
            'visible' => isset($request->visible)?'1':'0'

        ]);

        $product->categories()->sync($request->categories);

        if ($request->hasFile('files')) {
            if($product->images->count() >0 ) {
                Image::where('product_id',  $product->id)->delete();
                foreach ($product->images as $image) {
                    if(File::exists(public_path('uploads/products/').$image->name)) {
                        File::delete(public_path('uploads/products/').$image->name);
                    }
                }
            }
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

        return redirect()->back()->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->images->count() >0 ) {
            foreach ($product->images as $image) {
                if(File::exists(public_path('uploads/products/').$image->name)) {
                    File::delete(public_path('uploads/products/').$image->name);
                }
            }
        }
        $product->delete();
    }
}
