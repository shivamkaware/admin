<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function cartindex(){
        return view('front.cart.index');
    }

    public function store(Request $request){
        Cart::add($request->id,$request->name,$request->price);
        return redirect()->back()->with('msg','Item has been added to cart');
    }
}
