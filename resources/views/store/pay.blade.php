@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/pay') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
@endsection
@section('store.main')
    {{-- box 1 : Hiển thị thanh toán đơn hàng --}}
    <div class="text-center box_1">
       <h3> THANH TOÁN ĐƠN HÀNG</h3> 
    </div>
    <div>
        <form action="{{ route('store.order') }}" method="POST">
            @csrf
            {{-- box 2 : Hiển thị thông tin sản phẩm --}}
            {{-- <div class="box_2">
                <h4>THÔNG TIN SẢN PHẨM</h4>
                <p>Tên sản phẩm : {{ $products->name }} </p>
                <div class="box">
                    <label for="quantity"> Số lượng : </label>
                    <input type="number" value="{{ $quantity }}" name="quantity" id="quantity" readonly style="width: 100%">
                </div>
                <div class="box">
                    <label for="size"> Kích thước : </label>
                    <input type="text" value="{{ $size }}" name="size" id="size" readonly style="width: 100%">
                </div>
            </div> --}}
            <table id="cart" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 ;
                         $total_quantity = 0   ;
                    @endphp

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $item)
                            <tr rowId="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        @php
                                            $imageURL = $item['images']; 
                                        @endphp
                                        <div class="col-sm-3 hidden-xs"><a href="{{ route('store.review',$item['product_id']) }}"><img src="{{ isset($item['images']) ? asset("$imageURL") : 'N/A' }}" class="card-img-top"/></a></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $item['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ number_format($item['price'],0,',',',') }}</td>
                                <td class="text-center">{{ $item['size'] }}</td>
                                <td class="text-center">{{ $item['quantity'] }}</td>
                                @php
                                    $total_price = $item['price'] * $item['quantity'];
                                    $format_total = number_format($total_price,0,',',',');
                                    $total += $total_price; 
                                @endphp
                                <td data-th="Subtotal" class="text-center">${{ $format_total }}</td>
                                <td class="actions">
                                    <a class="btn btn-outline-danger btn-sm delete-item" href="{{ route('store.deleteitem',$id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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
                    <div class="box">
                        <label for="delivery_cost">Chi phí vận chuyển (Miễn phí khi giá trị đơn hàng từ 500,000 trở lên) : </label>
                        @php
                            if ($total < 500000) {
                                $delivery_cost = 30000;
                            } else {
                                $delivery_cost = 0;
                            }
                            
                        @endphp
                        <span>{{ number_format($delivery_cost,0,',',',') }} VND</span>
                    </div>
                    <div class="box danger" style="font-size:30px;">
                        {{-- @php
                            $number = number_format($products->price*$quantity,',',0,0);
                        @endphp --}}
                        <span style="margin-right:20%;width:30% ">
                            Thành tiền : {{ number_format($total + $delivery_cost,0,',',',') }} VND
                        </span>
                        {{-- <input type="text" name="gia_donhang" value="{{ $thanh_tien }}" style="width:20%" readonly hidden> --}}
                        <span class="text-center" style="margin-left:37%;font-size:40px">
                            <button type="submit" class="btn btn-danger">Xác Nhận Mua Hàng</button>
                            <button type="button" onclick="goback()" class="btn btn-danger">Trở lại</button>
                        </span>
                    </div>
            </div>
        </form>
    </div>
@endsection
