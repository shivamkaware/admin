<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function singup(){
        return view('front.singup');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);
        $user=new User ();
        $user->name=$request->name;
          $user->email=$request->email;
          $user->password=bcrypt($request->password);
          $user->address=$request->address;
          $user->save();
    }

    
}
