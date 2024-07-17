@extends('user.login.bg')
@section('title')
    SIGN
@endsection
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/getlocation.js') }}"></script>
    <script src="{{ asset('js/goback.js') }}"></script>
@endsection
@section('user.main')
<div class="main">
    <h3>Đăng ký tài khoản</h3>
    <div class="box mt-3">
        <form action="{{ route('user.postsignin') }}" method="post" class="col-6">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"><h6>Tên đăng nhập (Email) :</h6></label>
                <input type="text" name="email" id="email" placeholder="Nhập email" class="form-control">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><h6>Mật khẩu của bạn :</h6></label>
                <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><h6>Nhập lại mật khẩu :</h6></label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại password" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="name" class="form-label"><h6>Nhập tên của bạn :</h6></label>
                <input type="text" name="name" id="name" placeholder="Nhập tên" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            {{-- <div class="form-group mb-3">
                <label for="user_catalogues_id" class="form-label"><h6>Nhóm thành viên :</h6></label>
                <select name="user_catalogues_id" id="user_catalogues_id" class="form-select">
                    <option value="">Chọn nhóm thành viên</option>
                    @foreach ($user_catalogue as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                    @if ($errors->has('user_catalogues_id'))
                        <span class="text-danger">{{ $errors->first('user_catalogues_id') }}</span>
                    @endif
                </select>
            </div> --}}

            <div class="mb-3">
                <label for="phone_number" class="form-label"><h6>Số điện thoại :</h6></label>
                <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" class="form-control">
            </div>

            <div class="mb-3 d-flex">
                <div style="flex: 1;">
                    <label for="province" class="form-label"><h6>Tỉnh/Thành phố :</h6></label>
                    <select name="province_code" id="province" class="form-control">
                        <option value="">Chọn Tỉnh/Thành phố</option>
                        @foreach ($province as $item)
                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="ms-3" style="flex: 1;">
                    <label for="district" class="form-label"><h6>Quận/Huyện :</h6></label>
                    <select name="district_code" id="district" class="form-control">
                        <option value="">Chọn Quận/Huyện</option>
                    </select>
                </div>
        
                <div class="ms-3" style="flex: 1;">
                    <label for="ward" class="form-label"><h6>Phường/Xã :</h6></label>
                    <select name="ward_code" id="ward" class="form-control">
                        <option value="">Chọn Phường/Xã</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label"><h6>Địa chỉ :</h6></label>
                <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" class="form-control">
            </div>

            <div class="mb-3">
                <button type="button" onclick="goback()" class="btn btn-success">Trở lại</button>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
        </form>
    </div>
</div>


@endsection
