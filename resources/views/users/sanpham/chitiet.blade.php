@extends('users.layouts.home')
@section('title')
    <title>{{$sanpham->tensp}}</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/sanpham/chitiet/chitiet.css')}}">
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/category/category.js')}}"></script>
    <script src="{{asset('user_resources/sanpham/chitiet/chitiet.js')}}"></script>
    <script src="{{asset('user_resources/sanpham/chitiet/binhluan.js')}}"></script>
    <script src="{{asset('user_resources/giohang/cart.js')}}"></script>
@endsection()
@section('content')

    @include('users.sanpham.partials.danhmuc')

    <section>
        <div class="container">
            <div class="row mt-4 mb-1">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 d-flex">
                                    <div class="sanpham-images ">
                                        <div class="text-center d-block mb-4 active-sp">
                                            <img src="{{asset($sanpham->hinhanh)}}" class="img-fluid hinhanh-chinh" style="max-width: 350px;" alt="Product-img">
                                        </div>
                                        <div class="d-lg-flex d-none justify-content-center hinhanh-chitiet">
                                            <a href="javascript: void(0);" class="p-2 ">
                                                <img src="{{asset($sanpham->hinhanh)}}"
                                                     data-url="{{asset($sanpham->hinhanh)}}"
                                                     class="img-fluid img-thumbnail p-2 active-sp image-sp" style="max-width: 75px;" alt="Product-img">
                                            </a>
                                            @foreach($sanpham->images as $itemImage)
                                                <a href="javascript: void(0);" class="p-2 ">
                                                    <img src="{{asset($itemImage->hinhanhchitiet)}}"
                                                         data-url="{{asset($itemImage->hinhanhchitiet)}}"
                                                         class="img-fluid img-thumbnail p-2 image-sp" style="max-width: 75px;" alt="Product-img">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2 class="mt-0 text-primary">{{$sanpham->tensp}}<a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-shield-star-outline text-danger ms-2"></i></a> </h2>
                                    <p class="mb-1">5 ????nh gi??</p>
                                    <p class="font-16">
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                    </p>

                                    <div class="mt-3 d-flex d-flex justify-content-start">
                                        <h3 class="tag"><span class="badge badge-success-lighten"><a href="{{route('sanpham.danhmuc',['id'=>$sanpham->category->id])}}" class="text-success">{{$sanpham->category->name}}</a></span></h3>
                                        <h3 class="tag"><span class="badge badge-success-lighten"><a href="{{route('sanpham.hangsanxuat',['danhmuc'=>$sanpham->category->id,'id'=>$sanpham->menu->id])}}" class="text-success">{{$sanpham->menu->name}}</a></span></h3>
                                    </div>

                                    @if($sanpham->khuyenmai()->where('active',1)->count()==0)
                                        <div class="mt-4">
                                            <h6 class="font-20"><i class="mdi mdi-star-outline text-danger"></i> ????n gi??:</h6>
                                            <h3 class="dongia-sp" data-dg="{{$sanpham->dongia}}"> {{number_format($sanpham->dongia)}} VN??</h3>
                                        </div>
                                    @else
                                        <div class="mt-4">
                                            <h6 class="font-20"><i class="mdi mdi-star-outline text-danger"></i> ????n gi??: <span class="text-danger">Gi???m {{$sanpham->khuyenmai[0]->tyle}} %</span></h6>
                                            <h3 class="dongia-sp" data-dg="{{doubleval($sanpham->dongia) - (doubleval($sanpham->dongia)*((doubleval($sanpham->khuyenmai[0]->tyle))/100))}}">
                                                <span class="text-warning font-16">Ch??? c??n </span>
                                                {{number_format(doubleval($sanpham->dongia) - (doubleval($sanpham->dongia)*((doubleval($sanpham->khuyenmai[0]->tyle))/100)))}} VN??</h3>
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <h6 class="font-20"><i class="mdi mdi-star-outline text-danger"></i> S??? l?????ng:</h6>
                                        <div class="d-flex">
                                            <input type="number" min="1" value="1" class="form-control soluong-sp" placeholder="Qty" style="width: 90px;">
                                            <button type="button" data-url="{{route('giohang.add',['id'=>$sanpham->id])}}" class="btn btn-danger ms-2 btn-add-cart"><i class="mdi mdi-cart me-1"></i>Th??m v??o gi??? h??ng</button>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <h6 class="font-20 pb-2"><i class="mdi mdi-star-outline text-danger"></i> C???u h??nh:</h6>
                                        <h5 class="cauhinh mt-2">
                                            <div data-simplebar style="max-height: 250px;">
                                                {!! $sanpham->cauhinh !!}
                                            </div>
                                        </h5>
                                    </div>

                                    <div class="mt-1 d-grid">
                                        <button type="button" class="btn btn btn-xs btn-outline-dark btn-rounded btn-mota"><span class="font-20">M?? t??? s???n ph???m</span></button>
                                        <div class="modal-mota-sanpham d-none">
                                            <div class="modal-mota ">
                                                <div class="model-mota-header d-flex justify-content-between">
                                                    <h3 class="modal-title text-success" id="myCenterModalLabel">{{$sanpham->tensp}}</h3>
                                                    <button type="button" class="btn btn-outline-dark btn-rounded btn-mota-close"><i class="mdi mdi-close"></i></button>
                                                </div>
                                                <div class="model-mota-body">
                                                    <div class="model-mota-body-p ">
                                                        {!! $sanpham->mota !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="mb-3 mt-4">????nh gi?? v?? b??nh lu???n</h3>
                                </div>
                            </div>
                            <div class="row" data-plugin="dragula" data-containers='["company-list-left", "company-list-right"]'>
                                <div class="col-md-6">
                                    <div class="bg-dragula p-2 p-lg-4">
                                        <h5 class="font-20 mt-0">B??nh lu???n</h5>
                                        <div data-simplebar style="max-height: 600px;">
                                            <div id="company-list-left" class="py-2">

                                                @include('users.sanpham.partials.binhluan')

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg-dragula p-2 p-lg-4">
                                        <h5 class="font-20 mt-0">H??y ????nh gi?? v?? binh lu???n</h5>
                                        <div id="company-list-left" class="py-2">
                                            @if(auth()->check())
                                                <div class="danhgia-partials">
                                                    @include('users.sanpham.partials.danhgia')
                                                </div>
                                            @else
                                                <a href="{{route('user.login')}}" class="btn btn-danger ms-2">????ng nh???p ????? b??nh lu???n</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection()
