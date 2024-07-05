@extends('layout.base')
@section('title')
    ProductsManager
@endsection
@section('main')
    <div style="margin-top:50px ">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.manager_sidebar')
                <div class="col ps-md-2 pt-2">
                    @yield('product.main')
                </div>
            </div>
    </div>
@endsection