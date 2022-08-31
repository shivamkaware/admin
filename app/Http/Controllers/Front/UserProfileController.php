<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use  Illuminate\Support\Facades\Auth;
class UserProfileController extends Controller
{
    // public function profile(){

    //     return view('front.profile');
    // }

    public function index(){
        $id = auth()->user()->id;
        $user = User::find($id);
        $orders = Order::where('user_id',$id)->get();
        return view('front.profile.profile',compact(['user','orders']));
    }

    public function show($id){
        $order= Order::find($id);
        return view('front.profiledetail',compact('order'));
    }
  public function edit(){
    $user = Auth::user();
    return view('front.profile.edit',compact('user'));
  }
  public function update(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'address' => 'required',
    ]);
    $id = Auth::user()->id;
    $user = User::find($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->address=$request->address;
    $user->save();
    return back()->with('msg','profile update successfully');

  }

  public function detail($id){
    // $id = auth()->user()->id;

    $order = Order::find($id);
    return view('front.profile.details',compact('order'));
 
  }

}

