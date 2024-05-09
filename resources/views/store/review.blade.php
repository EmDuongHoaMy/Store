@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/review.css') }}">
    <script src="{{ asset('js/addcart.js') }}"></script>
@endsection
@section('store.main')
{{-- CSS --}}
{{-- Note:lưu ý --}}
<div class="note bg-secondary text-center">
    <p style="font-size:20px;">Miễn phí ship khi giá trị đơn hàng từ 500,000 trở lên</p>
</div>
{{-- khu vực 1 --}}
<div class="box_1 d-flex">
    {{-- khu vực 1.1 : hiển thị ảnh sản phẩm --}}
    <div class="box1_1">
        <img src="{{ asset("$product->images") }}" alt="" style="width:100%;height:100%;">
    </div>

    {{-- khu vực 1.2 : hiển thị form mua hàng --}}
    <div class="box_1_2">
        {{-- khu vực 1.2.1 : hiển thị thông tin sản phẩm --}}
        <div class="box_1_2_1">
            <input type="text" name="product_id" id="product_id" value="{{ $product->id }}" hidden>
            <p style="font-size:25px">{{ $product->name }}</p>
            @php
                $formattedValue = number_format($product->price,0,',', ',');
            @endphp
            <p class="lead text-danger" style="font-size:40px">{{ $formattedValue }} VND</p>
            <form action="{{ route('store.pay',$product->id) }}" style="font-size:20px">
                <div class="mt-3">
                    <label for="size">Size:</label>
                    <select name="size" id="size">
                        <option value="">--Hãy chọn kích thước của bạn--</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
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
                {{-- <button type="submit" class="btn-danger block full-width m-b center-block" style="width:50%;height:100%;">
                    <i class="fab fa-buysellads"></i> Mua hàng
                </button> --}}

                <button type="button" onclick="addCart()" class="btn-primary block full-width m-b center-block" style="width:50%;height:100%;">
                    <i class="fas fa-store"></i> Thêm vào giỏ hàng
                </button>
                </div>
            </form>
        </div>
        {{-- khu vực 1.2.2 : hiển thị thông tin cửa hàng --}}
        <div class="box_1_2_2 text-exception">
            {{-- <div>
                <p><i class="fa fa-address-card"></i> Cửa hàng WD</p>
            </div> --}}
            <div style="padding-top:10px">
                <p> <i class="fa fa-archive"></i>  Nhận đặt hàng theo yêu cầu với số lượng lớn</p>
            </div>
            <div style="padding-top:10px">
                <p> <i class="fa fa-bus"></i>  Giao hàng dự kiến:
                Thứ 2-Thứ 6 từ 9h00 - 17h00</p>
            </div>
            <div style="padding-top:10px">
                <p> <i class="fa fa-phone"></i> Hỗ trợ, tư vấn ngay qua messenger FB hoặc qua sdt 123456789
                </p>

            </div>
        </div>
    </div>
</div>
{{-- khu vực 2 : hiển thị mô tả sản phẩm --}}
<div class="box_2">
    <h3 style="text-align:center">Mô tả sản phẩm </h3>
    <pre style="font-size:20px;white-space: pre-line">
   <?php
           echo $product->description;
    ?>
    </pre>
</div>
{{-- khu vực 3 : hiển thị thêm các sản phẩm khác --}}
<div>
    <h3 style="text-align:center">Các sản phẩm tương tự  </h3>
    <div class="row -mt-5" style="margin-top: 20px">
        @foreach ($other as $item)
        <div class="card text-lg-center box">
            <a href="{{ route('store.review',$item->id) }}">
                <img src="{{ asset("$item->images")}}" class="card-img-top" alt="...">
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
</div>
@endsection