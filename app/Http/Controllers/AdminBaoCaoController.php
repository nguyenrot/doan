<?php

namespace App\Http\Controllers;

use App\Models\donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBaoCaoController extends Controller
{
    private $donhang;
    public function __construct(donhang $donhang)
    {
        $this->donhang = $donhang;
    }
    public function index(){
        $donhang_created = $this->donhang->select(DB::raw('DATE(Created_at) as month'))
            ->where('active',3)->distinct()->orderBy('Created_at', 'desc')->pluck("month");
        $data = array();
        foreach ($donhang_created as $key=>$ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $donhang = $this->donhang
                ->where('active',3)
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->get();
            $total = 0;
            $soluong = 0;
            foreach ($donhang as $item){
                $total += $this->doanhthu($item->chitietdonhang);
                $soluong += $this->quality($item->chitietdonhang);
            }
            $data[$key]= [
                'ngay'=>  $ngay,
                'doanhthu'=>$total,
                'soluong'=>$soluong,
            ];
        }
        return view('admins.baocao.index',compact('data'));
    }
    public function dtdk(){
        $donhang_created = $this->donhang->select(DB::raw('DATE(Created_at) as month'))
            ->whereIn('active',[1,2,3])->distinct()->orderBy('Created_at', 'desc')->pluck("month");
        $data = array();
        foreach ($donhang_created as $key=>$ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $donhang = $this->donhang
                ->whereIn('active',[1,2,3])
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->get();
            $total = 0;
            $soluong = 0;
            foreach ($donhang as $item){
                $total += $this->doanhthu($item->chitietdonhang);
                $soluong += $this->quality($item->chitietdonhang);
            }
            $data[$key]= [
                'ngay'=>  $ngay,
                'doanhthu'=>$total,
                'soluong'=>$soluong,
            ];
        }
        return view('admins.baocao.doanhthudukien',compact('data'));
    }
    public function selectdt(Request $request){
        $donhang_created = $this->donhang->select(DB::raw('DATE(Created_at) as month'))
            ->where('active',3)->distinct()->orderBy('Created_at', 'desc')->pluck("month");
        $data = array();
        foreach ($donhang_created as $key=>$ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $donhang = $this->donhang
                ->where('active',3)
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->get();
            $total = 0;
            $soluong = 0;
            foreach ($donhang as $item){
                $total += $this->doanhthu($item->chitietdonhang);
                $soluong += $this->quality($item->chitietdonhang);
            }
            $data[$key]= [
                'ngay'=>  $ngay,
                'doanhthu'=>$total,
                'soluong'=>$soluong,
            ];
        }
        foreach ($data as $key=>$value){
            if ($value['ngay'] < $request->dateStart || $value['ngay'] > $request->dateEnd){
                unset($data[$key]);
            }
        }
        $tableData =  view('admins.baocao.partials.table',compact('data'))->render();
        $load_js =  view('admins.baocao.partials.script')->render();
        return response()->json([
            'code'=>200,
            'tableData'=>$tableData,
            'load_js'=>$load_js,
        ],200);
    }
    private function doanhthu($item){
        $total = 0;
        foreach ($item as $ctdn){
            $total += doubleval($ctdn->soluong*doubleval($ctdn->dongia));
        }
        return $total;
    }
    public function selectdtdk(Request $request){
        $donhang_created = $this->donhang->select(DB::raw('DATE(Created_at) as month'))
            ->whereIn('active',[1,2,3])->distinct()->orderBy('Created_at', 'desc')->pluck("month");
        $data = array();
        foreach ($donhang_created as $key=>$ngay){
            $day = date('d', strtotime($ngay));
            $month = date('m', strtotime($ngay));
            $year = date('Y', strtotime($ngay));
            $donhang = $this->donhang
                ->whereIn('active',[1,2,3])
                ->whereDay('Created_at',$day)
                ->whereMonth('Created_at',$month)
                ->whereYear('Created_at',$year)->get();
            $total = 0;
            $soluong = 0;
            foreach ($donhang as $item){
                $total += $this->doanhthu($item->chitietdonhang);
                $soluong += $this->quality($item->chitietdonhang);
            }
            $data[$key]= [
                'ngay'=>  $ngay,
                'doanhthu'=>$total,
                'soluong'=>$soluong,
            ];
        }
        foreach ($data as $key=>$value){
            if ($value['ngay'] < $request->dateStart || $value['ngay'] > $request->dateEnd){
                unset($data[$key]);
            }
        }
        $tableData =  view('admins.baocao.partials.table',compact('data'))->render();
        $load_js =  view('admins.baocao.partials.script')->render();
        return response()->json([
            'code'=>200,
            'tableData'=>$tableData,
            'load_js'=>$load_js,
        ],200);
    }
    private function quality($item){
        $soluong = 0;
        foreach ($item as $ctdn){
            $soluong += $ctdn->soluong;
        }
        return $soluong;
    }
}
