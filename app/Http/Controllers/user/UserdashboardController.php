<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Seller;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class UserdashboardController extends Controller
{
    public function user_login_form(){
        return view('user.login');
    }

    //------------------Login Form Send for processing-------------------------
    public function user_login_process(Request $request){

        $user = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('seller')->attempt($user)){
            $request->session()->regenerate();
            return redirect()->route('user_dashboard');
        } else {
            return back()->with('error', 'Email or Password Wrong!');
        }
    }
    
    //------------------Dashboard----------------------------------
    public function user_dashboard(){
        return view('user.dashboard');
    }


    //------------------User Register Form-------------------------
    public function user_register_process(){
        return view('user.register');
    }


    //------------------Admin Register Create-------------------------
    public function user_register_create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $seller = new Seller;
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = $request->password;

        $seller->save();

        return redirect()->route('user_login_form');
    }

    //------------------User Logout-------------------------
    public function user_logout(){
        Auth::guard('seller')->logout();
        return redirect()->route('Home');
    }


    public function user_product(){
        $products = Product::all();
        return view('user.product', compact('products'));
    }

    public function user_detail_product($id){
        $product = Product::findOrFail($id);
        return view('user.detail_product', compact('product'));
    }

    public function add_to_cart(){
        $products = Product::all();
        $cartItem = Cart::instance('cart')->content();
        return view('user.add_to_cart', compact('products', 'cartItem'));
    }

    public function add_cart(Request $request){
        $product = Product::find($request->id);
        Cart::instance('cart')->add($product->id, $product->product_name, $request->qty, $product->price);
        
        // $cart->save();
        return redirect()->route('add_to_cart')->with('message', 'Product Added to Cart Successfully!');
    }

    public function update_cart(Request $request, $rowId){
        $qty = $request->quantity;
        $rowId = $rowId;
        Cart::instance('cart')->update($rowId, $qty);

        return redirect()->route('add_to_cart')->with('message', 'Product Updated Successfully!');
    }

    public function delete_cart($rowId){
        Cart::instance('cart')->remove($rowId);

        return redirect()->route('add_to_cart')->with('message', 'Product Updated Successfully!');
    }

    public function create_invoice(Request $request){
        $carts = Cart::instance('cart')->content();
        return view('user.create_invoice', compact('carts'));
    }

    public function order_confirm(Request $request){

        //-------Insert into Order Table-----------
        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->date = date('d F Y');
        $order->status = 'Pending';
        $order->total_product = $request->total_product;
        $order->sub_total = $request->sub_total;
        $order->vat = $request->vat;
        $order->total = $request->total;
        $order->save();

        //-------Insert into Order_details Table----------
        $order_id = Order::latest()->first()->id;
        $cart_data = Cart::instance('cart')->content();
       
        foreach($cart_data as $data){
            $order_details = new Orderdetail;
            $order_details->order_id = $order_id;
            $order_details->product_id = $data->id;
            $order_details->qty = $data->qty;
            $order_details->unit_price = $data->price;
            $order_details->total_price = $data->total;

            $order_details->save();
        }
       
        //-------Cart Destroy-----------
        Cart::destroy();


        //----------Redirecting to Add_To_Cart Page----------
        return redirect()->route('add_to_cart')->with('message', 'Order Confirmed Successfully!');
    }

    public function user_pending_order(){
        $orders = Order::where('status', 'pending')->get();
        return view('user.pendingorder', compact('orders'));
    }

    public function user_success_order(){
        $orders = Order::where('status', 'success')->get();
        return view('user.successorder', compact('orders'));
    }
}
