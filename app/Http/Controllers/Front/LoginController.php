<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        return view('front.singin');

    }
    
    public function stored(Request $request){
        $rules =[
            'email'=> 'required|email',
            'password'=>'required',

        ];
        $request->validate($rules);
        //check if exists
        $data= request(['email','password']);
        if(!auth()->attempt($data)){
            return back()->with(['msg',"wrong details please try again"]);
        }
         return redirect()->route('user.profile');
    }
    public function logout(){
        auth()->logout();
        redirect()->route('front.login')->with('msg','you have logged out successfully');
    }



}
