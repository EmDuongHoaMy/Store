@extends('productcatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    <script src="{{ asset('js/parent.js') }}"></script>
@endsection
@section('productcatalogue.main')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Thêm mới nhóm sản phẩm</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('productcatalogue.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên nhóm sản phẩm:</label>
                            <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" class="form-control">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả nhóm sản phẩm:</label>
                            <textarea name="description" id="description" placeholder="Nhập mô tả nhóm sản phẩm" class="form-control"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Tùy chọn nhóm cha:</label>
                            <span id="catalogue_des" class="text-success"></span>
                            <input type="number" name="parent_id" id="parent_id" hidden>
                            <select class="form-control dynamic-select">
                                <option value="">Chọn nhóm cha</option>
                                <option value="1">Thời trang</option>
                                {{-- Các option khác --}}
                            </select>
                        </div>

                        <div class="mb-3 justify-content-end">
                            {{-- <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button> --}}
                            <button type="submit" class="btn btn-danger">Đăng ký nhóm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script-2')
<script src="{{ asset('js/description_ckeditor.js') }}"></script>
@endsection
