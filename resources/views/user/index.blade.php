@extends('user.bg')

@section('script')
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
@endsection

@section('user.main')
    <div class="ibox-content ">
        <label for=""><h3>Quản lý thành viên</h3></label>
        {{-- Các chức năng --}}
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                {{-- form tìm kiếm --}}
                <li class="nav-item me-2">
                    <form class="d-flex" role="search" action="{{ route('user.index') }}">
                        <input class="form-control " type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('user.add') }}" class="btn btn-success bg-danger"><i class="fa fa-plus"></i>Thêm mới thành viên</a>
                </li>
            </ul>
        </nav>
        {{-- Bảng thành viên --}}
        <table class="table table-striped table-bordered text-center">
            <th>
            <tr>
                <th>
                    <input type="checkbox" id="checkAll" class="input-checkbox">
                </th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thao tác</th>
            </tr> 
            </th>
            @foreach ($users as $item)
            <tr>
                <td>
                    <input type="checkbox" class="input-checkbox checkBoxItem">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone_number }}</td>
                <td>{{ $item->address}}</td>
                <td>
                    <a href="{{ route('user.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                    <a href="{{ route('user.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
@endsection