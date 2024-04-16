@extends('user.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/getlocation.js') }}"></script>
    <script src="{{ asset('js/goback.js') }}"></script>
@endsection
@section('user.main')
    <div class="main">
        <h4>Chỉnh sửa thông tin thành viên</h4>
        <div class="box">
            <form action="{{ route('user.update',$users->id) }}" method="post">
                @csrf
                <div class="input_box">
                    <div class="input_label">
                        <label for="email"><h6>Tên đăng nhập (Email) : </h6></label>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <input type="text" name="email" id="email" placeholder="Nhập email" value="{{ $users->email }}" class="input input_label" readonly>
                </div>
                {{-- <div class="input_box">
                    <div class="input_label">
                        <label for="password"><h6>Mật khẩu của bạn : </h6></label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <input type="password" name="password" id="password" placeholder="Nhập password" class="input">
                </div>
                <div class="input_box">
                    <div class="input_label">
                        <label for="password_confirmation"><h6>Nhập lại mật khẩu : </h6></label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại password" class="input">
                </div> --}}
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Nhập tên của bạn : </h6></label>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên" value="{{ $users->name }}" class="input">
                </div>

                <div class="input_box">
                    <label for="phone_number" class="input_label"><h6>Số điện thoại :</h6></label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" value="{{ $users->phone_number }}" class="input">
                </div>

                <div class="input_box d-flex">
                    <div>
                        <label for="province"> <h6>Tỉnh/Thành phố :</h6></label>
                        <select name="province_code" id="province">
                            {{-- <option value="{{ $province->code }}">{{ $province->name }}</option> --}}
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            @foreach ($province_all as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="" style="margin-left: 10px">
                        <label for="district"><h6>Quận/Huyện :</h6></label>
                        <select name="district_code" id="district">
                            <option value=""> Chọn Quận/Huyện</option>
                        </select>
                    </div>
            
                    <div class="" style="margin-left: 10px">
                        <label for="ward"><h6>Phường/Xã :</h6></label>
                        <select name="ward_code" id="ward">
                            <option value=""> Chọn Phường/Xã</option>
                        </select>
                    </div>
                </div>

                <div class="input_box">
                    <label for="address" class="input_label"><h6>Địa chỉ :</h6></label>
                    <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" value="{{ $users->address }}" class="input">
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>
@endsection
