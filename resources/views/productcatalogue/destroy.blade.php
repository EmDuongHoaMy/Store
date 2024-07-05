@extends('productcatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('productcatalogue.main')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Xoá thông tin sản phẩm</h2>
                </div>
                <div class="card-body">
                    <h6 class=" alert alert-danger">Thông tin đã xoá không thể khôi phục</h6>
                    <form action="{{ route('productcatalogue.destroy', $productcatalogue->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên nhóm sản phẩm:</label>
                            <input type="text" name="name" id="name" placeholder="Nhập tên nhóm sản phẩm" value="{{ $productcatalogue->name }}" class="form-control" readonly>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả nhóm sản phẩm:</label>
                            <input type="text" name="description" id="description" placeholder="Nhập mô tả nhóm" value="{{ $productcatalogue->description }}" class="form-control" readonly>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        @if ($parent)
                            <div class="mb-3">
                                <label class="form-label">Nhóm cha:</label>
                                <p class="form-control-static">{{ $parent->name }}</p>
                            </div>
                        @endif

                        <div class="mb-3 justify-content-end">
                            <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                            <button type="submit" class="btn btn-danger">Xóa nhóm sản phẩm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
