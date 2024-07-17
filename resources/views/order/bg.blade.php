@extends('layout.base')
@section('title')
    OrderManager
@endsection
@section('main')
    <div style="margin-top:50px ">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.manager_sidebar')
                <div class="col ps-md-2 pt-2">
                    @yield('order.main')
                </div>
            </div>
    </div>
@endsection