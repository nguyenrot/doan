<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    private $sanpham;
    public function __construct(sanpham $sanpham)
    {
        $this->sanpham = $sanpham;
    }
    public function index(){
        $carts = session()->get('cart');
        return view('users.giohang.index',compact('carts'));
    }
    public function addCart($id,Request $request){
        $sanpham = $this->sanpham->find($id);
        $cart = array();
        $cart = session()->get('cart');
        if (isset($cart[$id])){
            $cart[$id]['soluong'] += $request->soluong;
        } else{
            $cart[$id] = [
                'name'=>$sanpham->tensp,
                'hinhanh'=>$sanpham->hinhanh,
                'dongia'=>$request->dongia,
                'soluong'=>$request->soluong,
            ];
        }
        session()->put('cart',$cart);
        $carts = session()->get('cart');
        return response()->json([
            'code'=>200,
            'message'=>'success',
        ],200);
    }
    public function update(Request $request){
        $carts = session()->get('cart');
        $carts[$request->id]['soluong']=$request->soluong;
        session()->put('cart',$carts);
        $carts = session()->get('cart');
        $cartPartials = view('users.giohang.partials.cart',compact('carts'))->render();
        $tongsoluong = 0;
        foreach ($carts as $cartItem) {
            $tongsoluong+=$cartItem['soluong'];
        }
        return response()->json([
            'cartPartials'=>$cartPartials,
            'soluongCart'=>$tongsoluong,
            'code'=>200,
        ],200);
    }
    public function delete(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
        } else {
            $carts =[];
        }
        session()->put('cart',$carts);
        $carts = session()->get('cart');
        $cartPartials = view('users.giohang.partials.cart',compact('carts'))->render();
        $tongsoluong = 0;
        foreach ($carts as $cartItem) {
            $tongsoluong+=$cartItem['soluong'];
        }
        return response()->json([
            'cartPartials'=>$cartPartials,
            'soluongCart'=>$tongsoluong,
            'code'=>200,
        ],200);
    }
}
