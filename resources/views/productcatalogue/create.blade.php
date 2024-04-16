@extends('productcatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('productcatalogue.main')
    <div class="main">
        <h4>Thêm mới nhóm sản phẩm</h4>
        <div class="box">
            <form action="{{ route('productcatalogue.create') }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Tên nhóm sản phẩm : </h6></label>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" class="input input_label">
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="description"><h6>Nhập mô tả nhóm sản phẩm : </h6></label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <input type="text" name="description" id="description" placeholder="Nhập mô tả nhóm sản phẩm" class="input">
                </div>

                <div class="input_box">
                    <div class="input_label">
                        <label for="parent_id"><h6>Tùy chọn nhóm cha : </h6></label>
                    </div>
                    <select name="parent_id" id="parent_id">
                        <option value="">-- Tùy chọn nhóm cha --</option>
                        @foreach ($productcatalogue as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Đăng ký nhóm</button>
                </div>
            </form>
        </div>
    </div>
@endsection