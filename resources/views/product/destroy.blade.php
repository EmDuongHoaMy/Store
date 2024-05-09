@extends('product.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('product.main')
    <div class="main">
        <h4>Xoá thông tin sản phẩm</h4>
        <div class="box">
            <h6 class="text-danger"> Thông tin đã xoá không thể khôi phục</h6>
            <form action="{{ route('product.destroy',$product->id) }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Tên nhóm sản phẩm : </h6></label>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" value="{{ $product->name }}" class="input input_label" readonly>
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="description"><h6>Nhập mô tả nhóm sản phẩm : </h6></label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <input type="text" name="description" id="description" placeholder="Nhập mô tả sản phẩm" value="{{ $product->description }}" class="input" readonly>
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Xóa sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
