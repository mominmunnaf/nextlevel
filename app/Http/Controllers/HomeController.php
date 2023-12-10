<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin_login(){
        return view('admin.login');
    }

    


    Public function Index(){
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.home', compact('products', 'categories'));
    }

    public function category($id){
        $category = Category::findOrFail($id);
        $subcategory = Subcategory::where('category_id', $id)->latest()->get();
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.category', compact('category', 'subcategory', 'products'));
    }

    public function subcategory($id){
        $category = Category::findOrFail($id);
        $subcategory = Subcategory::where('category_id', $id)->latest()->get();
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('frontend.category', compact('category', 'subcategory', 'products'));
    }
    
    public function single_product($id){
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('frontend.single_product', compact('product', 'related_products'));

    }
}
