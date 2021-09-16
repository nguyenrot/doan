<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBaoCaoController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
        return view('admins.baocao.index');
    }
}
