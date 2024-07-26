@extends('layout.base')
@section('title')
    MyOrderDetail
@endsection
@section('script')
    <script src="{{ asset('js/goback.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
@section('main')
<div class="ibox-content m-5">
    <h2 class="text-center mb-4">Quản lý chi tiết đơn hàng</h2>
    {{-- Bảng nhóm thành viên --}}
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th></th>
                <th>Tên sản phẩm</th>
                <th>Phân loại</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>

            </tr>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($detail as $item)
                <tr>
                    @php
                        $images = json_decode($item['product_images'], true);
                    @endphp
                    <td><a href="{{ route('store.review',$item['product_id']) }}"><img src="{{ isset($images) ? asset("$images[0]") : 'N/A'}}" class="card-img-top card_image" alt="..." style="width:80px;height:100px"></a></td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_attribute_id }}</td>
                    <td>{{ $item->product_quantity }}</td>
                    @php
                        $price = number_format($item->product_price,0,',',',');
                        $total += $item->product_price * $item->product_quantity ;
                    @endphp
                    <td>{{ $price }}</td>
                </tr>
                @endforeach
                <tr>
                    @php
                        $total = number_format($total,0,',',',');
                    @endphp
                    <td><button type="button" onclick="goback()" class="btn btn-danger">Trở lại</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-danger">{{ $total }}</td>
                </tr>
            </tbody>
        </thead>

    </table>
</div>
@endsection