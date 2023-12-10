<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.allsubcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.addsubcategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category_id = $request->category_id;
        $category_name = Category::Where('id', $category_id)->value('category_name');
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
        $subcategory = new Subcategory;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_name = $category_name;
        $subcategory->category_id = $category_id;
        $subcategory->slug = strtolower(str_replace(' ', '-', $request->subcategory_name));

        $subcategory->save();
        Category::firstWhere('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('subcategory.index')->with('message', 'Subcategory Added Successfully!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
