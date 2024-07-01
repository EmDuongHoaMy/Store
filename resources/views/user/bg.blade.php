@extends('layout.base')
@section('title')
    UserManager
@endsection
@section('main')
    <div style="margin-top:70px ">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.manager_sidebar')
                <div class="col ps-md-2 pt-2">
                    @yield('user.main')
                </div>
            </div>
        </div>
    </div>
@endsection