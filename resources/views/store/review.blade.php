@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thumnail.css') }}">
    <script src="{{ asset('js/thumnail.js') }}"></script>
    <script src="{{ asset('js/addcart.js') }}"></script>
@endsection
@section('store.main')

{{-- Danh sách thư mục --}}
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
    <ul class="navbar-nav" style="padding-left:2% ">
        @foreach ($productAncestors as $item)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index_by_catalogue',$item->id) }}"><span>{{ $item->name }}   /</span></a>
        </li>
        @endforeach
        <li class="nav-item">
            <a class="nav-link" href="{{ route('store.index_by_catalogue',$productCatalogue->id) }}"><span>{{ $productCatalogue->name }}   /</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><span>{{ $product->name }}</span></a>
        </li>
    </ul>
    </div>
</nav>
{{-- khu vực 1 --}}
<div class="box_1 d-flex">
    {{-- khu vực 1.1 : hiển thị ảnh sản phẩm --}}
    <div class="box1_1">
        @php
            $images = json_decode($product->images, true);
            $i = 1;
        @endphp
        <div class="holder ml-5" style="margin-left:50px">
            <img src="{{ asset("$images[0]") }}" id="image-0" alt="" style="width:420px;height:480px;">
            @foreach ($images as $item)
                <div class="slides">
                    <img src="{{ asset("$item") }}" alt="" style="width:420px;height:480px;">
                </div>
                @php
                    $i++;
                    if ($i>4) {
                    break;
                }
                @endphp
            @endforeach
        </div>
        <div class="row text-center mt-2" style="margin-left:50px">
            @php
                $i = 1;
            @endphp
            @foreach ($images as $item)
            <div class="column">
                <img class="slide-thumbnail" src="{{ asset("$item") }}" onclick="currentSlide({{ $i }})" >
            </div>
            @php
                $i++;
                if ($i>4) {
                    break;
                }
            @endphp
            @endforeach
        </div>

    </div>

    {{-- khu vực 1.2 : hiển thị form mua hàng --}}
    <div class="box_1_2 card">
        {{-- khu vực 1.2.1 : hiển thị thông tin sản phẩm --}}
        <div class="card-body">
            <input type="text" name="product_id" id="product_id" value="{{ $product->id }}" hidden>
            <div class=" card form-group fs-2 p-3">
                <span class="fs-4 multi-line-ellipsis">{{ $product->name }}</span>
                @if ($product->quantity)
                <span class="fs-5">Số lượng còn lại : {{ $product->quantity }}</span>
            @else
                <span class=" alert alert-danger fs-5 h-25">Hết hàng</span>
            @endif
            </div>
            @php
                $formattedValue = number_format($product->price,0,',', ',');
            @endphp
            <p class="text-danger fs-2">{{ $formattedValue }} VND</p>
            <form action="{{ route('store.pay',$product->id) }}" style="font-size:20px">
                <div class="mt-3">
                    <label for="attribute">Kích thước :</label>
                    <select name="attribute" id="attribute" class="form-select">
                        <option value="">Hãy chọn kích thước của bạn</option>
                        @foreach ($attribute_id as $key=>$item)
                            <option value="{{ $item['id'] }}">{{ $item->attribute_value }}</option>
                        @endforeach
                    </select>
                    {{-- Cảnh báo nếu chưa chọn size --}}
                    <span>
                        @if ($errors->has('size'))
                        <span class="text-danger">* {{ $errors->first('size') }}</span>
                        @endif
                    </span>
                </div>
                <div class="mt-3 d-flex">
                    <label for="quantity">Số lượng : </label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="20" width="10px">
                    <span>
                        @if ($errors->has('quantity'))
                        <span class="text-danger">* {{ $errors->first('quantity') }}</span>
                        @endif
                    </span>
                </div >

                <div class="mt-3 d-flex" style="width:100%;height:50px;">
                <button type="button" onclick="addCart()" class=" btn btn-danger block full-width m-b center-block" style="height:100%;">
                    <i class="fas fa-store"></i> Thêm vào giỏ hàng
                </button>
                </div>
            </form>
        </div>
        {{-- khu vực 1.2.2 : hiển thị thông tin cửa hàng --}}
        <div class=" text-exception card-body bg-secondary">
            <div class="mt-1">
                <p> <i class="fa fa-archive"></i>  Nhận đặt hàng theo yêu cầu với số lượng lớn</p>
            </div>
            <div class="mt-1">
                <p> <i class="fa fa-bus"></i>  Giao hàng dự kiến:
                Thứ 2-Thứ 6 từ 9h00 - 17h00</p>
            </div>
            <div class="mt-1">
                <p> <i class="fa fa-phone"></i> Hỗ trợ, tư vấn ngay qua messenger FB hoặc qua sdt 123456789
                </p>

            </div>
        </div>
    </div>
</div>
{{-- khu vực 2 : hiển thị mô tả sản phẩm --}}
<div class="box_2">
    <h3 class="text-center mt-4">Mô tả sản phẩm </h3>
    <div class="fs-6 mt-4">
        @php
            echo $product->description;
        @endphp
    </div>
</div>
{{-- khu vực 3 : hiển thị thêm các sản phẩm khác --}}
<div>
    <h3 class="text-center mt-3">Các sản phẩm tương tự  </h3>
    <div class="row mt-5">
        @foreach ($other as $item)
        <div class="card text-lg-center box" style="width:15rem">
            <a href="{{ route('store.review',$item->id) }}" class="text-decoration-none text-dark">
                @php
                    $images = json_decode($item->images,true);
                @endphp
                <img src="{{ asset("$images[0]")}}" class="card-img-top card_image">
                <div class="card-body">
                    <p class="text-dark fs-5 multi-line-ellipsis">{{ $item->name }}</p>
                    @php
                    $formated_number = number_format($item->price,0,',',',');
                    @endphp
                    <h5 class="text-danger">{{ $formated_number }} VND</h5>
                </div>
            </a>
        </div>
        @endforeach
    </div> 
</div>
@endsection