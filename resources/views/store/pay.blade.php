@extends('store.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/store/pay') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    {{-- <script src="{{ asset('js/login.js') }}"></script> --}}
@endsection
@section('store.main')
@if (session('cart'))
        {{-- box 1 : Hiển thị thanh toán đơn hàng --}}
        <div class="text-center box_1">
            <h3> THANH TOÁN ĐƠN HÀNG</h3> 
         </div>
         <div class="card">
             <form action="{{ route('store.order') }}" method="POST">
                 @csrf
                 {{-- box 2 : Hiển thị thông tin sản phẩm --}}
                 <table id="cart" class="table table-bordered">
                     <thead>
                         <tr>
                             <th></th>
                             <th style="width:800px">Product</th>
                             <th style="width:120px">Price</th>
                             <th style="width:150px">Attr</th>
                             <th>Quantity</th>
                             <th style="width:150px">Total</th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         @php $total = 0 ;
                              $total_quantity = 0   ;
                         @endphp
                         
                        @foreach(session('cart') as $id => $item)
                                 <tr rowId="{{ $id }}">
                                     <td data-th="Product">
                                         <div class="row">
                                             @php
                                                $images = json_decode($item['images'], true);
                                            @endphp
                                             <div class="col-sm-3 hidden-xs text-center" style="width:200px "><a href="{{ route('store.review',$item['product_id']) }}"><img src="{{ isset($images) ? asset("$images[0]") : 'N/A' }}" class="card-img-top" style="width:100px;height:150px;"/></a></div>
                                         </div>
                                     </td>
                                     <td class="text-center">{{ $item['name'] }}</td>
                                     <td data-th="Price">${{ number_format($item['price'],0,',',',') }}</td>
                                     @php
                                    $attribute = \App\Models\ProductAttribute::find($item['attribute']);
                                    // dd($attribute);
                                    $value = "";
                                    $product_attribute = \App\Models\ProductAttributeValue::where('product_attribute_id','=',$attribute['id'])->get();
                                    foreach ($product_attribute as $attr_value) {
                                    $find = \App\Models\AttributeValue::find($attr_value['attribute_value_id']);
                                    $value .= $find['attribute_value'];
                                    $value .= " ";
                                    }
                                    @endphp
                                     <td class="text-center">{{ $value }}</td>
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
                        <tr>
                            <th>Total</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>${{ number_format($total,0,',',',') }}</th>
                            <td></td>
                        </tr>
                         
                     </tbody>
                 </table>
                 {{-- box 3 : Hiển thị thông tin khách hàng --}}
                 <div class="box_2 card form-group">
                     <h4>THÔNG TIN NHẬN HÀNG</h4>
                         <div class="form-control">
                             {{-- <label for="id_khachhang"> Mã khách hàng : </label> --}}
                             <input type="text" value="{{ $user->id }}" name="id_khachhang" id="id_khachhang" readonly style="width: 100%" hidden>
                         </div>
                         <div class="form-control">
                             <label for="ten_khachhang">Tên người nhận : </label>
                             <input type="text" value="{{ $user->name }}" name="ten_khachhang" id="ten_khachhang" style="width: 100%">
                         </div>
                         <div class="form-control">
                             <label for="diachi_khachhang">Địa chỉ nhận hàng : </label>
                             <input type="text" value="{{ $user->address }}" name="diachi_khachhang" id="diachi_khachhang" style="width: 100%">
                         </div>
                         <div class="form-control">
                             <label for="phone_khachhang">Số điện thoại nhận hàng : </label>
                             <input type="text" value="{{ $user->phone_number }}" name="phone_khachhang" id="phone_khachhang" style="width: 100%">
                         </div>
                         <div class="form-control">
                            <label for="payment_method">Phương thức thanh toán : </label>
                            <select name="payment_method" id="payment_method" class="form-select">
                                <option value="">Chọn phương thức thanh toán</option>
                                <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                            </select>
                        </div>
                         <div class="form-control">
                             <label for="ghi_chu">Ghi chú : </label>
                             <input type="text" value="" name="ghi_chu" id="ghi_chu" style="width: 100%">
                         </div>
                         <div class="form-control">
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
                         <div class="form-control danger" style="font-size:30px;">
                             {{-- @php
                                 $number = number_format($products->price*$quantity,',',0,0);
                             @endphp --}}
                             <span style="margin-right:20%;width:30% ">
                                 Thành tiền : {{ number_format($total + $delivery_cost,0,',',',') }} VND
                             </span>
                             {{-- <input type="text" name="gia_donhang" value="{{ $thanh_tien }}" style="width:20%" readonly hidden> --}}
                             <span class="text-center" style="margin-left:37%;font-size:40px">
                                 <button type="submit" class="btn btn-danger">Xác Nhận Mua Hàng</button>
                                 {{-- <button type="button" onclick="goback()" class="btn btn-danger">Trở lại</button> --}}
                             </span>
                         </div>
                 </div>
             </form>
         </div>
@else
    <div class="text-center ">
        <h2>Không tồn tại sản phẩm trong giỏ hàng </h2>
    </div>
@endif
@endsection
