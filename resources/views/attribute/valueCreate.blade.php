@extends('attribute.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
@endsection
@section('attribute.main')

    <div class="container row justify-content-center m-5 col-md-8">
        <h2 class="mb-4 text-center">Thêm mới giá trị thuộc tính</h2>
        <div class="card p-4">
            <form action="{{ route('attribute_value.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="attribute_id" class="form-label"><h6>Nhóm thuộc tính :</h6></label>
                    <select name="attribute_id" id="attribute_id" class="form-select">
                        <option value="">Chọn nhóm thuộc tính</option>
                        @foreach ($attribute as $item)
                            <option value="{{ $item->id }}">{{ $item->attribute_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group mb-3">
                    <label for="attribute_value" class="form-label"><h6>Nhập giá trị thuộc tính :</h6></label>
                    <input type="text" class="form-control @error('attribute_value') is-invalid @enderror" name="attribute_value" id="attribute_value" placeholder="Nhập mô tả sản phẩm"></input>
                    @if ($errors->has('attribute_value'))
                    <span class="text-danger">{{ $errors->first('attribute_value') }}</span>
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

