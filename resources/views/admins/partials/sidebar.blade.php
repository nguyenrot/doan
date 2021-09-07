<div class="leftside-menu">
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('resource/assets/images/logo.png')}}" alt="">
        </span>
        <span class="logo-sm">
            <img src="{{asset('resource/assets/images/logo_sm.png')}}" alt="">
        </span>
    </a>
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('resource/assets/images/logo-dark.png')}}" alt="">
        </span>
        <span class="logo-sm">
            <img src="{{asset('resource/assets/images/logo_sm_dark.png')}}" alt="">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item font-12">Thanh công cụ</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link font-18">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item font-12">Chức năng</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDanhMuc" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link font-18">
                    <i class="uil-store"></i>
                    <span> Danh mục </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDanhMuc">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('categories.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('categories.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMenu" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link font-18">
                    <i class="uil-envelope"></i>
                    <span> Hãng phụ kiện </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMenu">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('menu.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('menu.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link font-18">
                    <i class="uil-briefcase"></i>
                    <span> Sản phẩm </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('product.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('product.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link font-18">
                    <i class="uil-clipboard-alt"></i>
                    <span> Khuyến mãi </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('khuyenmai.index')}}" class="font-16">Xem</a>
                        </li>
                        <li>
                            <a href="{{route('khuyenmai.create')}}" class="font-16">Thêm</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <i class="uil-window"></i>
                    <span> Đơn hàng </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
{{--                    <ul class="side-nav-second-level">--}}
{{--                        <li>--}}
{{--                            <a href="{{route('quanlydonhang')}}">Xem tất cả</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('quanlydonhang.choduyet')}}">Đơn chờ xác nhận</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('quanlydonhang.danggiao')}}">Đơn đang giao</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{route('quanlydonhang.dagiao')}}">Đơn đã giao</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
            </li>
            <li class="side-nav-item">
                <a href="apps-file-manager.html" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Báo cáo thống kê </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item mt-1 font-12">Tài khoản</li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
