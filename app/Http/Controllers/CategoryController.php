<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backoffice.category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'visible' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:210'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->move(public_path('uploads/categories'), $name);
            $filename = basename($path);
        }
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => isset($filename)?$filename:'default.jpg',
            'visible' => isset($request->visible)?'1':'0'

        ]);

        return redirect()->back()->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backoffice.category.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'visible' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:210'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->move(public_path('uploads/categories'), $name);
            $filename = basename($path);
        }
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => isset($filename)?$filename:'default.jpg',
            'visible' => isset($request->visible)?'1':'0'

        ]);

        return redirect()->back()->with('success', 'Category updated successfully');
    }
    
    public function destroy(Category $category)
    {
        //
    }
}
