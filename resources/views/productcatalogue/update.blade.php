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
                    <h2 class="card-title text-center">Thay đổi thông tin nhóm sản phẩm</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('productcatalogue.update', $productcatalogue->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"><h6>Tên nhóm sản phẩm:</h6></label>
                            <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" value="{{ $productcatalogue->name }}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label"><h6>Nhập mô tả nhóm sản phẩm:</h6></label>
                            <textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả nhóm sản phẩm" rows="4">{{ $productcatalogue->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="parent_id" class="form-label">Tùy chọn nhóm cha:</label>
                            <span id="catalogue_des" class="text-success"></span>
                            <input type="number" name="parent_id" id="parent_id" hidden value="{{ $productcatalogue->parent_id }}">
                            <select class="form-control dynamic-select" id="select-1">
                                <option value="">Chọn nhóm cha</option>
                                <option value="1">Thời trang</option>
                                {{-- Các option khác --}}
                            </select>
                        </div>

                        <div class="mb-3 justify-content-end">
                            {{-- <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button> --}}
                            <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
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
