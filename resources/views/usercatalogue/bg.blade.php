@extends('layout.base')
@section('title')
    UserCatalogueManager
@endsection
@section('main')
    <div style="margin-top:60px ">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.manager_sidebar')
                <div class="col ps-md-2 pt-2">
                    @yield('usercatalogue.main')
                </div>
            </div>
    </div>
@endsection