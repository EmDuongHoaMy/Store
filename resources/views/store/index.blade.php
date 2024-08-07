@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/index.css') }}">
@endsection
@section('store.main')
<div class="ibox-content ml-0 ">
    {{-- Danh sách nhóm sản phẩm --}}
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
        <ul class="navbar-nav">
            @foreach ($product_catalogue as $item)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('store.index_by_catalogue',$item->id) }}">{{ $item->name }}</a>
            </li>
            @endforeach
        </ul>
        </div>
    </nav>
    {{-- Các chức năng --}}
    <nav class="navbar navbar-expand-sm mt-3">
        <ul class="navbar-nav">
            {{-- form tìm kiếm --}}
            <li class="nav-item me-2 ">
                <form class="d-flex" role="search" action="{{ route('store.index') }}">
                    <input class="form-control " type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                    <button class="btn btn-outline-secondary ml-2" type="submit" style="margin-left:10px">Search</button>
                  </form>
            </li>
        </ul>
    </nav>
</div>

{{-- Danh sách sản phẩm --}}
<div class="row pl-1 p-0" style="margin-left:50px">
    @foreach ($product as $id =>$item)

    <div class="card text-lg-center box nav-link ml-auto p-0" style="width:225px">
        <a href="{{ route('store.review',$item['id']) }}" class="text-decoration-none text dark">
            @php
                $images = json_decode($item['images'], true);
            @endphp
            <img src="{{ $images ? asset("$images[0]") : 'N/A'}}" class="card-img-top card_image" alt="...">
            <img src="{{ $images ? asset("$images[1]") : 'N/A'}}" class="card-img-top card_image_2" alt="...">
            <div class="card-body" style="text-decoration:none" >
                <p class="text-dark fs-6 multi-line-ellipsis">{{ $item['name'] }}</p>
                @if ($item['quantity'])
                <h5 class="text-danger mt-auto">{{ number_format($item['price'],0,',',',') }} VND</h5>
                @else
                <span class="alert alert-danger mt-auto">Hết hàng</span>    
                @endif
            </div>
        </a>
    </div>
    @endforeach
</div> 

@endsection