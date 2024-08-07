@extends('layout.base')
@section('title')
    HOME
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/index.css') }}">
@endsection
@section('main')
<div class="text-center" style="margin-top:70px ">
    <a href="{{ route('store.index') }}">
        <img src="{{ asset('images/home_logo.jpg') }}" alt="" class="home full-width">
    </a>
</div>
{{-- Danh sách sản phẩm --}}
<h3 style="margin:10px;text-align:center;margin-top:35px;color:brown ">GỢI Ý HÔM NAY</h3>
<div class="row p-0 mt-5" style="margin-left:70px;margin-right:10px" >
    @foreach ($product as $item)
    <div class="card text-lg-center box nav-link ml-auto p-0" style="width:225px">
        <a href="{{ route('store.review',$item->id) }}" class="text-decoration-none">
            @php
                $images = json_decode($item->images,true);
            @endphp
            <img src="{{($images)?$images[0]:"N\A"}}" class="card-img-top card_image" alt="...">
            <img src="{{($images)?$images[1]:"N\A"}}" class="card-img-top card_image_2" alt="...">
            <div class="card-body" >
                <p class="text-dark fs-6 multi-line-ellipsis">{{ $item->name }}</p>
                @php
                    $formated_number = number_format($item->price,0,',',',');
                @endphp
                <h5>{{ $formated_number }} VND</h5>
            </div>
        </a>
    </div>
    @endforeach
</div> 

@endsection