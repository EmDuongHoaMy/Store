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
        <img src="{{ asset('images/home_logo.jpg') }}" alt="" class="home">
    </a>
</div>
{{-- Danh sách sản phẩm --}}
<h3 style="margin:10px;text-align:center;margin-top:35px;color:brown ">GỢI Ý HÔM NAY</h3>
<div class="row -mt-5" style="margin-top:20px;padding-left:20px">
    @foreach ($product as $item)
    <div class="card text-lg-center box">
        <a href="{{ route('store.review',$item->id) }}">
            <img src="{{ $item->images}}" class="card-img-top card_image" alt="...">
            <div class="card-body" >
                <p class="text-dark text-color">{{ $item->name }}</p>
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