<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admins.login');
    }
    public function loginPost(Request $request){
        $remember = $request->has('remember_me') ? true:false;
        if (Auth::guard('admin')->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            $nguoidung = Auth::guard('admin')->user();
            return view('test',compact('nguoidung'));
        }
        return redirect()->route('admin.login');
    }

}
