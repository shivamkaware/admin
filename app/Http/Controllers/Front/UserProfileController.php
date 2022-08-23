<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserProfileController extends Controller
{
    // public function profile(){

    //     return view('front.profile');
    // }

    public function index(){
        $id = auth()->user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        return view('front.profile',compact(['user','orders']));
    }

    public function show($id){
        $order= Order::find($id);
        return view('front.profiledetail',compact('order'));
    }
    public function edit($id){
        $user=User::find($id);
        return view('front.profile.editprofile');
    }
}
