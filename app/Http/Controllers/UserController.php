<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function index(){
        $users= User::all();
        return view('admin.users.index',compact('users'));
    }

    public function detail($id){
        $order=Order::with('user','products')->find($id);
        return view('admin.users.details',compact('order'));
        return redirect()->route('user.details');
    }
}
