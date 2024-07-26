@extends('product.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    <script src="{{ asset('js/getdesofcata.js') }}"></script>
    @endsection
@section('product.main')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Thay đổi thông tin sản phẩm</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm:</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả sản phẩm" rows="4">{{ $product->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="products_catalogue_id" class="form-label"><h6>Tùy chọn nhóm sản phẩm :</h6></label>
                            <span id="catalogue_des" class="text-success"></span>
                            <input type="number" name="products_catalogue_id" id="products_catalogue_id" value="{{ $product->products_catalogue_id }}" hidden>
                            <select class="form-select dynamic-select" >
                                <option value="">Tùy chọn nhóm sản phẩm</option>
                                <option value="1" class="">Thời trang</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh sản phẩm:</label>
                            {{-- <input type="file" name="image[]" id="image" accept="image/*" class="form-control" multiple> --}}
                            <input type="file" class="form-control" id="image" name="images[]" multiple />
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="quantity" class="form-label"><h6>Nhập số lượng sản phẩm :</h6></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" min="0">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá sản phẩm (VNĐ):</label>
                            <input type="text" name="price" id="price" placeholder="Nhập giá sản phẩm" value="{{ $product->price }}" class="form-control">
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
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
