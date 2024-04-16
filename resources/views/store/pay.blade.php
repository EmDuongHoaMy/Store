@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/pay') }}">
@endsection
@section('store.main')
    {{-- box 1 : Hiển thị thanh toán đơn hàng --}}
    <div class="text-center box_1">
       <h3> THANH TOÁN ĐƠN HÀNG</h3> 
    </div>
    <div>
        <form action="{{ route('bill.add',$products->id) }}" method="POST">
            @csrf
            {{-- box 2 : Hiển thị thông tin sản phẩm --}}
            <div class="box_2">
                <h4>THÔNG TIN SẢN PHẨM</h4>
                <p>Tên sản phẩm : {{ $products->ten_sp }} </p>
                <div class="box">
                    <label for="so_luong"> Số lượng : </label>
                    <input type="number" value="{{ $so_luong }}" name="so_luong" id="so_luong" readonly style="width: 100%">
                </div>
                <div class="box">
                    <label for="size"> Kích thước : </label>
                    <input type="text" value="{{ $size }}" name="size" id="size" readonly style="width: 100%">
                </div>
            </div>
            {{-- box 3 : Hiển thị thông tin khách hàng --}}
            <div class="box_2">
                <h4>THÔNG TIN NHẬN HÀNG</h4>
                    <div class="box">
                        {{-- <label for="id_khachhang"> Mã khách hàng : </label> --}}
                        <input type="text" value="{{ $user->id }}" name="id_khachhang" id="id_khachhang" readonly style="width: 100%" hidden>
                    </div>
                    <div class="box">
                        <label for="ten_khachhang">Tên người nhận : </label>
                        <input type="text" value="{{ $user->name }}" name="ten_khachhang" id="ten_khachhang" style="width: 100%">
                    </div>
                    <div class="box">
                        <label for="diachi_khachhang">Địa chỉ nhận hàng : </label>
                        <input type="text" value="{{ $user->address }}" name="diachi_khachhang" id="diachi_khachhang" style="width: 100%">
                    </div>
                    <div class="box">
                        <label for="phone_khachhang">Số điện thoại nhận hàng : </label>
                        <input type="text" value="{{ $user->phone_number }}" name="phone_khachhang" id="phone_khachhang" style="width: 100%">
                    </div>
                    <div class="box">
                        <label for="ghi_chu">Ghi chú : </label>
                        <input type="text" value="" name="ghi_chu" id="ghi_chu" style="width: 100%">
                    </div>
                    <div class="box danger" style="font-size:30px;">
                        @php
                            $number = number_format($thanh_tien,0,'',',');
                        @endphp
                        <span style="margin-right:20%;width:30% ">
                            Thành tiền : {{ $number }} VND
                        </span>
                        <input type="text" name="gia_donhang" value="{{ $thanh_tien }}" style="width:20%" readonly hidden>
                        <span class="text-center" style="margin-left:24%;font-size:40px">
                            <button type="submit" class="btn btn-danger">Xác Nhận Mua Hàng</button>
                        </span>
                    </div>
            </div>
        </form>
    </div>
@endsection
