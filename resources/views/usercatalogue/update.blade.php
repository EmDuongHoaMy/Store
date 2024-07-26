@extends('usercatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('usercatalogue.main')
<div class="container row justify-content-center m-5 col-md-8">
    <h2 class="mb-4 text-center">Thay đổi thông tin nhóm thành viên</h2>
    <div class="card p-4">
        <form action="{{ route('usercatalogue.update', $usercatalogue->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label"><h6>Tên nhóm thành viên :</h6></label>
                <input type="text" name="name" id="name" placeholder="Nhập tên nhóm thành viên" value="{{ $usercatalogue->name }}" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
            <div class="form-group mb-3">
                <label for="description" class="form-label"><h6>Nhập mô tả nhóm thành viên :</h6></label>
                <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả nhóm">{{ $usercatalogue->description }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>

            <div class="form-group d-flex justify-content-end">
                {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script-2')
<script src="{{ asset('js/description_ckeditor.js') }}"></script>
@endsection
