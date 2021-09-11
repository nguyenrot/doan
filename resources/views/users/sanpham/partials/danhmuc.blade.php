@php
    $danhmucs = \App\Models\danhmuc::all();
    $spkm = \App\Models\chitietkhuyenmai::where('active',1)->get();
    $i = $spkm->count();
    $row = 0;
@endphp
<section class="background_category border-bottom">
    <div class="container ">
        <div class="row">
            <nav>
                <ul class="nav nav_responsive">
                    <li>
                        <button type="button" class="btn btn-outline-primary font-18 fw-bold p-2 btn_category"><i class="mdi mdi-menu"></i> Chọn danh mục</button>
                    </li>
                </ul>
                <ul class="nav nav_category">
                    <li class="nav-link">
                        <a href="javascript:void(0);" class="font-20 fw-bolder">Chọn danh mục <i class="uil  uil-angle-double-right"></i></a>
                    </li>
                    @foreach($danhmucs as $danhmuc)
                        <li class="nav-link category border-start border-end li_nav dropdown-toggle">
                            <a href="" class="font-20 fw-bold">{{$danhmuc->name}}</a>
                            <div class="sub_nav rounded-3">
                                @foreach($danhmuc->menu()->distinct()->get() as $menu)
                                    <a class="dropdown-item font-18 fw-bold text-primary " href="#">{{$menu->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <div class="navbar_responsive d-none">
        <div class="">
            @foreach($danhmucs as $danhmuc)
                    <a class="dropdown-item font-18 fw-bold text-primary " href="#"><i class="mdi mdi-menu-right-outline font-18"></i>{{$danhmuc->name}}</a>
            @foreach($danhmuc->menu()->distinct()->get() as $menu)
                    <a class="dropdown-item font-18 fw-bold text-primary " href="#">{{$menu->name}}</a>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
