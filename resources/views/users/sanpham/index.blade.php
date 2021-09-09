@extends('users.layouts.home')
@section('title')
    <title>New Shop | Sản phẩm</title>
@endsection
@section('link_css')
    <link rel="stylesheet" href="{{asset('user_resources/category/category.css')}}">
@endsection()
@section('link_js')
    <script src="{{asset('user_resources/sanpham/sanpham.js')}}"></script>
@endsection()
@section('content')
    @include('users.sanpham.partials.danhmuc')
    <div style="height: 1000px;"></div>
@endsection()
