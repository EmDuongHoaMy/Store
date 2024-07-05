@extends('user.bg')
@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
    <script src="{{ asset('js/getlocation.js') }}"></script>
    <script src="{{ asset('js/goback.js') }}"></script>
    @endsection
@section('user.main')
    {{-- <div class="main">
        <h4>Thêm mới thành viên</h4>
        <div class="box">
            <form action="{{ route('user.create') }}" method="post">
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
                    <div class="input_label">
                        <label for="password_confirmation"><h6>Nhập lại mật khẩu : </h6></label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại password" class="input">
                </div>
                
                <div class="input_box">
                    <div class="input_label">
                        <label for="name"><h6>Nhập tên của bạn : </h6></label>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <input type="text" name="name" id="name" placeholder="Nhập tên" class="input">
                </div>

                <div class="input_box">
                    <label for="phone_number" class="input_label"><h6>Số điện thoại :</h6></label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" class="input">
                </div>

                <div class="input_box d-flex">
                    <div>
                        <label for="province"> <h6>Tỉnh/Thành phố :</h6></label>
                        <select name="province_code" id="province">
                            <option value="">Chọn Tỉnh/Thành phố</option>
                            @foreach ($province as $item)
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
                    <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" class="input">
                </div>

                <div class="input_box">
                    <button type="button" onclick="goback()" class="btn btn-primary">Trở lại</button>
                    <button type="submit" class="btn btn-danger">Đăng ký</button>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="container row justify-content-center m-5 col-md-8">
        <h2 class="mb-4 text-center">Thêm mới thành viên</h2>
        <div class="card p-4">
            <form action="{{ route('user.create') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label"><h6>Tên đăng nhập (Email) :</h6></label>
                    <input type="text" name="email" id="email" placeholder="Nhập email" class="form-control @error('email') is-invalid @enderror">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="password" class="form-label"><h6>Mật khẩu của bạn :</h6></label>
                    <input type="password" name="password" id="password" placeholder="Nhập password" class="form-control @error('password') is-invalid @enderror">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="password_confirmation" class="form-label"><h6>Nhập lại mật khẩu :</h6></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Nhập lại password" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="name" class="form-label"><h6>Nhập tên của bạn :</h6></label>
                    <input type="text" name="name" id="name" placeholder="Nhập tên" class="form-control @error('name') is-invalid @enderror">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
    
                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label"><h6>Số điện thoại :</h6></label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại" class="form-control">
                </div>
    
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="province" class="form-label"><h6>Tỉnh/Thành phố :</h6></label>
                            <select name="province_code" id="province" class="form-select">
                                <option value="">Chọn Tỉnh/Thành phố</option>
                                @foreach ($province as $item)
                                    <option value="{{ $item->code }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-md-4">
                            <label for="district" class="form-label"><h6>Quận/Huyện :</h6></label>
                            <select name="district_code" id="district" class="form-select">
                                <option value="">Chọn Quận/Huyện</option>
                            </select>
                        </div>
    
                        <div class="col-md-4">
                            <label for="ward" class="form-label"><h6>Phường/Xã :</h6></label>
                            <select name="ward_code" id="ward" class="form-select">
                                <option value="">Chọn Phường/Xã</option>
                            </select>
                        </div>
                    </div>
                </div>
    
                <div class="form-group mb-3">
                    <label for="address" class="form-label"><h6>Địa chỉ :</h6></label>
                    <input type="text" name="address" id="address" placeholder="Nhập Địa chỉ" class="form-control">
                </div>
    
                <div class="form-group d-flex justify-content-end">
                    <button type="button" onclick="goback()" class="btn btn-secondary">Trở lại</button>
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
