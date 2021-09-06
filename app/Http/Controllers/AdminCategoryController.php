<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminCategoryController extends Controller
{
    use DeleteModelTrait;
    private $danhmuc;
    public function __construct(danhmuc $danhmuc)
    {
        $this->danhmuc = $danhmuc;
    }

    public function index(){
        Paginator::useBootstrap();
        $danhmucs = $this->danhmuc->paginate(10);
        return view('admins.danhmuc.index',compact('danhmucs'));
    }
}
