@extends('product.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    <script src="{{ asset('js/getdesofcata.js') }}"></script>
@endsection
@section('product.main')
    <div class="main">
        <h4>Thêm mới sản phẩm</h4>
        <div class="box">
            <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Tên sản phẩm : </h6></label>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" class="input input_label">
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="description"><h6>Nhập mô tả sản phẩm : </h6></label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <textarea class="input_text" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea>  
                </div>

                <div class="input_box">
                    <div class="input_label">
                        <label for="products_catalogue_id"><h6>Tùy chọn nhóm sản phẩm : </h6></label>
                        <span id="catalogue_des" class="text-danger"></span>
                    </div>

                    <select class="dynamic-select" >
                        <option value=""> Tùy chọn nhóm sản phẩm </option>
                        <option value="1" class="text-center">Thời trang</option>
                    </select>
                </div>

                <div class="input_box">
                    <div class="input_label">
                        <label for="image"><h6>Nhập hình ảnh sản phẩm : </h6></label>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <input type="file" name="image" id="image" accept="image/*">
                </div>

                <div class="input_box">
                    <div class="input_label">
                        <label for="price"><h6>Nhập giá sản phẩm (VNĐ) : </h6></label>
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    <input type="text" name="price" id="price" placeholder="Nhập giá sản phẩm" class="input">
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Đăng ký sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script-2')
<script src="{{ asset('js/description_ckeditor.js') }}"></script>
@endsection
