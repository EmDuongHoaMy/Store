@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/index.css') }}">
@endsection
@section('store.main')
<div class="ibox-content ">
    <label for=""><h3>Danh sách sản phẩm</h3></label>   

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
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav">
            {{-- form tìm kiếm --}}
            <li class="nav-item me-2">
                <form class="d-flex" role="search" action="{{ route('store.index') }}">
                    <input class="form-control " type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
            </li>
        </ul>
    </nav>
</div>

{{-- Danh sách sản phẩm --}}
<div class="row -mt-5" style="margin-top:20px;padding-left:20px">
    @foreach ($product as $id =>$item)

    <div class="card text-lg-center box nav-link">
        <a href="{{ route('store.review',$item['id']) }}">
            @php
                $imageURL = $item['images'];
            @endphp
            <img src="{{ isset($item['images']) ? asset("$imageURL") : 'N/A'}}" class="card-img-top card_image" alt="...">
            <div class="card-body" style="text-decoration:none" >
                <p class="text-dark text-decoration-none">{{ $item['name'] }}</p>
                <h5 class="text-danger text-decoration-none">{{ number_format($item['price'],0,',',',') }} VND</h5>
            </div>
        </a>
    </div>
    @endforeach
</div> 
{{-- <div style="margin-left:40%;margin-top:20px  " class="text-danger">
    {{ $product->links('pagination::bootstrap-4') }}
</div> --}}
@endsection