@extends('product.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    <script src="{{ asset('js/getdesofcata.js') }}"></script>
    <script src="{{ asset('js/addAttrButton.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>
@endsection
@section('product.main')

    <div class="container row justify-content-center m-5 col-md-8">
        <h2 class="mb-4 text-center">Thêm mới sản phẩm</h2>
        <div class="card p-4">
            <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label"><h6>Tên sản phẩm :</h6></label>
                    <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" class="form-control @error('name') is-invalid @enderror">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="description" class="form-label"><h6>Nhập mô tả sản phẩm :</h6></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="products_catalogue_id" class="form-label"><h6>Tùy chọn nhóm sản phẩm :</h6></label>
                    <span id="catalogue_des" class="text-success"></span>
                    <input type="number" name="products_catalogue_id" id="products_catalogue_id" hidden>
                    <select class="form-select dynamic-select" >
                        <option value="">Tùy chọn nhóm sản phẩm</option>
                        <option value="1" class="">Thời trang</option>
                    </select>
                </div>
    
                <div class="form-group mb-3">
                    <label for="image" class="form-label"><h6>Nhập hình ảnh sản phẩm :</h6></label>
                    <input type="file" class="form-control" id="image" name="images[]" multiple />
                    @if ($errors->has('images'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label"><h6>Chọn chi tiết cho sản phẩm</h6></label>
                    <div class="" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ($attribute as $item)
                            <input type="checkbox" class="btn-check" id="btncheck{{ $item->id }}" name="option[{{ $item->id }}]" value="{{ $item->id }}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btncheck{{ $item->id }}">{{ $item->attribute_name }}</label>
                        @endforeach
                      </div>
                    <button type="button" class="btn btn-secondary mt-2" onclick="addAttr()">Xác nhận thuộc tính sản phẩm</button>
                </div>

                <div class="form-group mb-3">
                    <label for="attribute" class="form-label"><h6>Chọn chi tiết cho sản phẩm</h6></label>
              
                    <div id="attribute">
                        
                    </div>
                </div>
    
                <div class="form-group mb-3">
                    <label for="price" class="form-label"><h6>Nhập giá sản phẩm (VNĐ) :</h6></label>
                    <input type="number" name="price" id="price" placeholder="Nhập giá sản phẩm" class="form-control @error('price') is-invalid @enderror">
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
    
                <div class="form-group d-flex justify-content-end">
                    {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                    <button type="submit" class="btn btn-primary">Đăng ký sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
@section('script-2')
<script src="{{ asset('js/description_ckeditor.js') }}"></script>
@endsection
