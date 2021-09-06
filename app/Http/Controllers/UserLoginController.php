<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function loginPost(Request $request){
        $remember = $request->has('remember_me') ? true:false;
        if (Auth::guard('user')->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            $nguoidung = Auth::guard('user')->user();
            return view('test2',compact('nguoidung'));
        }
        return redirect()->route('user.login');
    }
}
