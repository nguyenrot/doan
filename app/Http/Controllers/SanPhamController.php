<?php

namespace App\Http\Controllers;

use App\Models\chitietkhuyenmai;
use App\Models\danhmuc;
use App\Models\hangsanxuat;
use App\Models\khuyenmai;
use App\Models\sanpham;
use App\Traits\UpdateKhuyenMai;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    use UpdateKhuyenMai;
    private $sanpham;
    private $danhmuc;
    private $hangsanxuat;
    private $chitietkhuyenmai;
    private $khuyenmai;
    public function __construct(sanpham $sanpham,danhmuc $danhmuc,hangsanxuat $hangsanxuat,
        chitietkhuyenmai $chitietkhuyenmai,khuyenmai $khuyenmai)
    {
        $this->sanpham = $sanpham;
        $this->danhmuc = $danhmuc;
        $this->hangsanxuat = $hangsanxuat;
        $this->chitietkhuyenmai = $chitietkhuyenmai;
        $this->khuyenmai = $khuyenmai;
    }
    public function index(){
        Paginator::useBootstrap();
        $sanphams = $this->sanpham->where('active',1)->latest()->paginate(9);
        return view('users.sanpham.index',compact('sanphams'));
    }
    public function chitiet($id){
        $sanpham = $this->sanpham->find($id);
//        $binhluans = $this->danhgia->where('sanpham_id',$id)->latest()->get();
        return view('users.sanpham.chitiet',compact('sanpham'));
    }
}
