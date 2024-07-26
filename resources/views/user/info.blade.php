@extends('layout.base')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/getlocation.js') }}"></script>
    <script src="{{ asset('js/goback.js') }}"></script>
@endsection
@section('main')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Thông tin tài khoản</h2>
    <div class="card p-4">
        <form action="{{ route('user.user_update', $user->id) }}" method="post">
            @csrf
            
            <div class="form-group mb-3">
                <label for="email" class="form-label"><h6>Tên đăng nhập (Email) :</h6></label>
                <input type="text" name="email" id="email" placeholder="Nhập email" value="{{ $user->email }}" class="form-control" readonly>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>


            <div class="form-group mb-3">
                <label for="name" class="form-label"><h6>Tên của bạn :</h6></label>
                <input type="text" name="name" id="name" placeholder="Nhập tên" value="{{ $user->name }}" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="phone_number" class="form-label"><h6>Số điện thoại :</h6></label>
                <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" value="{{ $user->phone_number }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="province" class="form-label"><h6>Tỉnh/Thành phố :</h6></label>
                <select name="province_code" id="province" class="form-select">
                    @if (isset($province[0]))
                        <option value="{{ $province[0]["code"] }}">{{ $province[0]["name"] }}</option>
                    @else
                        <option value=""> Chọn Tỉnh/Thành Phố </option>
                    @endif
                    @foreach ($province_all as $item)
                        <option value="{{ $item->code }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group mb-3">
                <label for="district" class="form-label"><h6>Quận/Huyện :</h6></label>
                <select name="district_code" id="district" class="form-select">
                    @if (isset($district[0]))
                        <option value="{{ $district[0]["code"] }}">{{ $district[0]['name'] }}</option>
                    @else
                        <option value=""> Chọn Quận/Huyện </option>
                    @endif
                </select>
            </div>
{{-- 
            <div class="form-group mb-3">
                <label for="ward" class="form-label"><h6>Phường/Xã :</h6></label>
                <select name="ward_code" id="ward" class="form-select">
                    <option value="">Chọn Phường/Xã</option>
                </select>
            </div> --}}

            <div class="form-group mb-3">
                <label for="address" class="form-label"><h6>Địa chỉ :</h6></label>
                <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" value="{{ $user->address }}" class="form-control">
            </div>

            <div class="form-group d-flex justify-content-end">
                {{-- <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button> --}}
                <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
            </div>
        </form>
    </div>
</div>

@endsection
