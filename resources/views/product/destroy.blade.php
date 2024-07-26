@extends('product.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('product.main')
<div class="container row justify-content-center m-5 col-md-8">
    <h2 class="mb-4 text-center">Xoá thông tin sản phẩm</h2>
    <div class="alert alert-danger">Thông tin đã xoá không thể khôi phục</div>
    <div class="card p-4">
        <form action="{{ route('product.destroy', $product->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label"><h6>Tên nhóm sản phẩm :</h6></label>
                <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" value="{{ $product->name }}" class="form-control" readonly>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
            <div class="form-group mb-3">
                <label for="description" class="form-label"><h6>Nhập mô tả nhóm sản phẩm :</h6></label>
                <input type="text" name="description" id="description" placeholder="Nhập mô tả sản phẩm" value="{{ $product->description }}" class="form-control" readonly>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group d-flex justify-content-end">
                {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                <button type="submit" class="btn btn-danger">Xóa sản phẩm</button>
            </div>
        </form>
    </div>
</div>

@endsection
