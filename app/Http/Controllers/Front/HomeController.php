<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $product=Product::inRandomOrder()->take(4)->get();
        return view('front.index',compact('product'));
    }
    public function login(){
        return view('front.singin');

    }

}
