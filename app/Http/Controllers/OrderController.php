<?php

namespace App\Http\Controllers;

use App\Models\Order;
// use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //order create
    public function index(){
        $order = Order::all();
    return view('admin.orders.index',compact('order'));

    }

    public function confirm($id){
        $order =Order::find($id);
        $order ->update(['status'=>1]);
        return redirect()->back()->with('message','order has been confirm');
    }

    public function pending($id){
       $order = Order::find($id);
       $order->update(['status'=>0]);
       return redirect()->back()->with('message','order has been again into pending');
    }
    public function detail($id){
      $order= Order::find($id);
    //   $product=Product::find($id);
      return view('admin.orders.detail',compact('order'));
    }
}
