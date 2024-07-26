@extends('cart.bg')
@section('script')
<script src="{{ asset('js/goback.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>
@endsection
@section('cart.main')
<div class="text-center box_1">
    <h3> THÔNG TIN GIỎ HÀNG</h3> 
 </div>
<table id="cart" class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th style="width:800px">Product</th>
            <th style="width:120px">Price</th>
            <th style="width:150px">Attr(Size-Color)</th>
            <th>Quantity</th>
            <th style="width:140px">Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $item)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            @php
                                $images = json_decode($item['images'], true);
                            @endphp
                            <div class="col-sm-3 hidden-xs text-center" style="width:200px"><a href="{{ route('store.review',$item['product_id']) }}"><img src="{{ isset($images) ? asset("$images[0]") : 'N/A' }}"  class="card-img-top" style="width:100px;height:150px;" /></a></div>
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
                    @endphp
                    <td data-th="Subtotal" class="text-center">${{ $format_total }}</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm delete-item" href="{{ route('store.deleteitem',$id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('store.index') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{ route('store.pay') }}" class="btn btn-danger">Check out</a>
                {{-- <button type="button" onclick="goback()" class="btn btn-danger">Back</button> --}}
            </td>
        </tr>
    </tfoot>
</table>
@endsection