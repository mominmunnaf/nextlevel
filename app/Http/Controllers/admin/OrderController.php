<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use Illuminate\Http\Request;
use cart;

class OrderController extends Controller
{
    public function all_order(){
        $orders = Order::all();
        return view('admin.allorder', compact('orders'));
    }

    public function pending_order(){
        $orders = Order::where('status', 'pending')->get();
        return view('admin.pendingorder', compact('orders'));
    }

    public function success_order(){
        $orders = Order::where('status', 'success')->get();
        return view('admin.successorder', compact('orders'));
    }

    public function view_order($id){
        $order_id = Order::where('id', $id)->value('id');
        $sub_total = Order::where('id', $id)->value('sub_total');
        $vat = Order::where('id', $id)->value('vat');
        $total = Order::where('id', $id)->value('total');
        $products = Order::where('id', $id)->value('total_product');
        $orderdetails = Orderdetail::where('order_id', $id)->get();
        return view('admin.view_order', compact('orderdetails', 'order_id', 'sub_total', 'vat', 'total', 'products'));
    }

    public function order_success($id){
        $orders = Order::firstWhere('id', $id);
        $orders->status = 'success';
        $orders->save();

        return redirect()->route('pending_order')->with('message', 'Order Success Confirmed Successfully!');
    }
}
