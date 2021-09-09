@php
    $carts = session()->get('cart');
    $totalSoluong = 0;
    if(isset($carts)){
         foreach ($carts as $cartItem){
            $totalSoluong += $cartItem['soluong'];
        }
    }
@endphp
<nav class="navbar navbar-expand-lg py-lg-2 navbar-dark backgroud-nav">
    <div class="container">

        <!-- logo -->
        <a href="{{route('home')}}" class="navbar-brand me-lg-2">
            <img src="{{asset('resource/assets/images/logo.png')}}" alt="" class="logo-dark" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>
        <!-- menus -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <!-- left menu -->
            <ul class="navbar-nav me-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <h3><a class="nav-link active home_active font-20" href="{{route('home')}}">Home</a></h3>
                </li>
                <li class="nav-item mx-lg-1">
                    <h3><a class="nav-link font-20 sanpham_active" href="{{route('sanpham.index')}}">Sản phẩm</a></h3>
                </li>

                <li class="nav-item mx-lg-1">
                    <form action="" method="get">
                        <div class="search_navbar d-flex justify-content-center" id="hvbtn">
                            <h4><input name="searchsp" type="text" class="input_search text-primary" placeholder="Tìm kiếm" autocomplete="off"></h4>
                            <button type="submit" class="btn_search"><i class="uil uil-search"></i></button>
                        </div>
                    </form>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item mx-lg-1">
                    <h3><a class="nav-link d-none font-20" href=""></a></h3>
                </li>
                <li class="nav-item mx-lg-1">
                    <a href="" target="" class="btn btn-sm btn-dark btn-rounded d-block font-18 fw-bold ">
                        <i class="uil uil-user me-2"></i> Đăng nhập
                    </a>
                </li>
                <li class="nav-item mx-lg-1">
                    <a href="" target="" class="btn btn-sm btn-dark btn-rounded d-none d-lg-inline-flex  font-18 fw-bold">
                        <i class="uil uil-shopping-cart-alt me-2"></i> Giỏ hàng
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
