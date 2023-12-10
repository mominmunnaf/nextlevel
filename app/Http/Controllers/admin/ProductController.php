<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.allproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'short_details' => 'required',
            'long_details' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'image' => 'required',
        ]);

        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->short_details = $request->short_details;
        $product->long_details = $request->long_details;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_category_name = $category_name;
        $product->product_category_id = $category_id;
        $product->product_subcategory_name = $subcategory_name;
        $product->product_subcategory_id = $subcategory_id;
        $product->slug = strtolower(str_replace(' ', '-', $request->product_name));

        $image = $request->file('image');
        $image_name = time().'-'.$image->getClientOriginalName();
        $request->file('image')->storeAs('/public/images', $image_name);

        $product->product_image = $image_name;


        $product->save();
        return redirect()->route('product.index')->with('message', 'Product Uploaded Successfully!');

        

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
