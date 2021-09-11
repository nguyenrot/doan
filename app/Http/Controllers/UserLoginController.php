<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function loginPost(UserLoginRequest $request){
        $remember = $request->has('remember_me') ? true:false;
        if (Auth::guard('user')->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            if(Auth::guard('user')->user()->loaitaikhoan!==2){
                Auth::guard('user')->logout();
                $message = "Tài khoản này là tài khoản quản trị viên";
                return view('users.login',compact('message'));
            }
            return redirect()->route('home');
        } else {
            $message = "Email hoặc tài khoản sai";
            return view('users.login',compact('message'));
        }
    }
    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->back();
    }
}
