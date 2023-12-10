<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        return view('admin.allcategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]); 

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = strtolower(str_replace(' ', '-', $request->category_name));

        $category->save();
        return redirect()->route('category.index')->with('message', 'Category Saved Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category_info = Category::find($id);

        return view('admin.editCategory', compact('category_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        $category = Category::firstWhere('id', $request->category_id);
        $category->update([
            $category->category_name = $request->category_name,
            $category->slug = strtolower(str_replace(' ', '-', $request->category_name))
        ]);

        return redirect()->route('category.index')->with('message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfully!');
    }
}
