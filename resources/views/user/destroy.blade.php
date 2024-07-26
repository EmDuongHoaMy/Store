@extends('user.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/getlocation.js') }}"></script>
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('user.main')
    <div class="container row justify-content-center m-5 col-md-8">
        <h2 class="mb-4 text-center">Xoá thông tin thành viên</h2>
        <div class="card p-4">
            <h6 class="alert alert-danger">Thông tin đã xoá không thể khôi phục</h6>
            <form action="{{ route('user.destroy', $users->id) }}" method="post">
                @csrf    
                <div class="form-group mb-3">
                    <label for="email" class="form-label"><h6>Tên đăng nhập (Email) :</h6></label>
                    <input type="text" name="email" id="email" value="{{ $users->email }}" class="form-control" readonly>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="name" class="form-label"><h6>Nhập tên của bạn :</h6></label>
                    <input type="text" name="name" id="name" value="{{ $users->name }}" class="form-control" readonly>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label"><h6>Số điện thoại :</h6></label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $users->phone_number }}" class="form-control" readonly>
                </div>
    
                <div class="form-group mb-3">
                    <label for="address" class="form-label"><h6>Địa chỉ :</h6></label>
                    <input type="text" name="address" id="address" value="{{ $users->address }}" class="form-control" readonly>
                </div>
    
                <div class="form-group d-flex justify-content-end">
                    {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                    <button type="submit" class="btn btn-danger">Xoá thông tin</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
