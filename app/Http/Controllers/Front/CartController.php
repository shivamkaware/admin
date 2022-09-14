<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartindex(){
        return view('front.cart.index');
    }

    public function store(Request $request){
        Cart::add($request->id,$request->name,1,$request->price,0);
        return redirect()->back()->with('msg','Item has been added to cart');
    }

    public function empty(){
        Cart::destroy();

    }

    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('msg', 'Item has been remove from cart !');

    }
}
