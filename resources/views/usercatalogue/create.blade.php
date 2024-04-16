@extends('usercatalogue.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('usercatalogue.main')
    <div class="main">
        <h4>Thêm mới nhóm thành viên</h4>
        <div class="box">
            <form action="{{ route('usercatalogue.create') }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Tên nhóm thành viên : </h6></label>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên nhóm thành viên" class="input input_label">
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="description"><h6>Nhập mô tả nhóm thành viên : </h6></label>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <input type="text" name="description" id="description" placeholder="Nhập mô tả nhóm" class="input">
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Đăng ký nhóm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
