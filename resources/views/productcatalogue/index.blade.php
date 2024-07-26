@extends('productcatalogue.bg')
@section('productcatalogue.main')
    <div class="ibox-content m-5 ">
        <h2 class="text-center mb-4">Quản lý nhóm sản phẩm</h2>
        {{-- Các chức năng --}}
        <nav class="navbar navbar-expand-sm mb-4">
            <ul class="navbar-nav">
                {{-- form tìm kiếm --}}
                <li class="nav-item me-2">
                    <form class="d-flex" role="search" action="{{ route('productcatalogue.index') }}">
                        <input class="form-control" type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                        <button class="btn btn-outline-success" type="submit" style="margin-left:10px">Search</button>
                      </form>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('productcatalogue.add') }}" class="btn btn-danger"><i class="fa fa-plus"></i>Thêm mới nhóm sản phẩm</a>
                </li>
            </ul>
        </nav>
        {{-- Bảng nhóm thành viên --}}
        <table class="table table-striped table-bordered text-center">
            <th>
            <tr>
                <th>
                    <input type="checkbox" id="checkAll" class="input-checkbox">
                </th>
                <th>ID</th>
                <th>Tên nhóm</th>
                <th style="width:300px">Mô tả</th>
                <th>Mã nhóm cha</th>
                <th>Người tạo</th>
                <th>Thao tác</th>
            </tr> 
            </th>
            @foreach ($productcatalogue as $item)
            <tr>
                <td>
                    <input type="checkbox" class="input-checkbox checkBoxItem">
                </td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->parent_id }}</td>
                <td>{{ $item->user_id }}</td>
                <td>
                    <a href="{{ route('productcatalogue.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                    <a href="{{ route('productcatalogue.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $productcatalogue->links('pagination::bootstrap-4') }}
    </div>
@endsection