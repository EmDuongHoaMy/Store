@extends('user.login.bg')
@section('title')
    LOGIN
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
@section('user.main')
    <div class="main">
        <div class="login-container">
            <h4 class="login-title">Đăng nhập tài khoản</h4>
            <form action="{{ route('user.postlogin') }}" method="post">
                @csrf
                <div class="form-group">    
                    <label for="email"><h6>Tên đăng nhập ( Email ) : </h6></label>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <input type="text" name="email" id="email" placeholder="Nhập email" class="form-control">
                </div>
                <div class="form-group">
                        <label for="password"><h6>Mật khẩu : </h6></label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control">
                </div>
                <div class=" form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block mt-3 ">Đăng nhập</button>
                </div>
            </form>
        </div>

        
    </div>
@endsection
