@extends('attribute.bg')
@section('attribute.main')
<div class="ibox-content m-5">
    <h2 class="text-center mb-4">Quản lý giá trị thuộc tính</h2>
    {{-- Các chức năng --}}
    <nav class="navbar navbar-expand-sm mb-4">
        <ul class="navbar-nav">
            {{-- form tìm kiếm --}}
            <li class="nav-item me-2">
                <form class="d-flex" role="search" action="{{ route('attribute_value.index') }}">
                    <input class="form-control" type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search" style="width: 250px;">
                    <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item">
                <a href="{{ route('attribute_value.add') }}" class="btn btn-danger"><i class="fa fa-plus"></i> Thêm giá trị thuộc tính mới</a>
            </li>
        </ul>
    </nav>
    {{-- Bảng nhóm thành viên --}}
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>

                <th style="width:250px">Mã thuộc tính</th>
                <th style="width:400px">Giá trị thuộc tính</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attribute as $item)
            <tr>

                <td>{{ $item->attribute_id }}</td>
                <td>{{ $item->attribute_value }}</td>

                <td>
                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection