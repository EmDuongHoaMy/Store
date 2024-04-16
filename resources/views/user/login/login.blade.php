@extends('user.login.bg')
@section('title')
    LOGIN
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('user.main')
    <div class="main">
        <h4>Đăng nhập tài khoản</h4>
        <div class="box">
            <form action="{{ route('user.postlogin') }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="email"><h6>Tên đăng nhập (Email) : </h6></label>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <input type="text" name="email" id="email" placeholder="Nhập email" class="input input_label">
                </div>
                <div class="input_box">
                    <div class="input_label">
                        <label for="password"><h6>Mật khẩu của bạn : </h6></label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <input type="password" name="password" id="password" placeholder="Nhập password" class="input">
                </div>
                <div class="input_box">
                    <button type="submit" class="button button-green">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
@endsection
