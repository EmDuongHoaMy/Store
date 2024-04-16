@extends('layout.base')
@section('title')
    ProductCatalogueManager
@endsection
@section('main')
    <div style="margin-top:60px ">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.manager_sidebar')
                <div class="col ps-md-2 pt-2">
                    @yield('productcatalogue.main')
                </div>
            </div>
    </div>
@endsection