@extends('attribute.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
@endsection
@section('attribute.main')

    <div class="container row justify-content-center m-5 col-md-8">
        <h2 class="mb-4 text-center">Thêm mới thuộc tính</h2>
        <div class="card p-4">
            <form action="{{ route('attribute.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="attribute_name" class="form-label"><h6>Tên thuộc tính :</h6></label>
                    <input type="text" name="attribute_name" id="attribute_name" placeholder="Nhập tên thuộc tính" class="form-control @error('name') is-invalid @enderror">
                    @if ($errors->has('attribute_name'))
                        <span class="text-danger">{{ $errors->first('attribute_name') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="description" class="form-label"><h6>Nhập mô tả sản phẩm :</h6></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group d-flex justify-content-end">
                    {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                    <button type="submit" class="btn btn-primary">Đăng ký thuộc tính</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
@section('script-2')
<script src="{{ asset('js/description_ckeditor.js') }}"></script>
@endsection
