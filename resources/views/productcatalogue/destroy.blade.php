@extends('productcatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('productcatalogue.main')
    <div class="main">
        <h4>Xoá thông tin sản phẩm</h4>
        <div class="box">
            <h6 class="text-danger"> Thông tin đã xoá không thể khôi phục</h6>
            <form action="{{ route('productcatalogue.destroy',$productcatalogue->id) }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Tên nhóm sản phẩm : </h6></label>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" value="{{ $productcatalogue->name }}" class="input input_label" readonly>
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="description"><h6>Mô tả nhóm sản phẩm : </h6></label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <input type="text" name="description" id="description" placeholder="Nhập mô tả nhóm" value="{{ $productcatalogue->description }}" class="input" readonly>
                </div>

                <div class="input_box">
                    @if ($parent)
                        <div class="input_label">
                            <h6>Nhóm cha : {{ $parent->name }}</h6>
                        </div>
                    @endif
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Xóa nhóm sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
