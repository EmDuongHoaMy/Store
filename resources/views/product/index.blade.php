@extends('product.bg')
@section('product.main')
<div class="ibox-content m-5">
    <h2 class="text-center mb-4">Quản lý sản phẩm</h2>
    {{-- Các chức năng --}}
    <nav class="navbar navbar-expand-sm mb-4">
        <ul class="navbar-nav">
            {{-- form tìm kiếm --}}
            <li class="nav-item me-2">
                <form class="d-flex" role="search" action="{{ route('product.index') }}">
                    <input class="form-control" type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search" style="width: 250px;">
                    <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.add') }}" class="btn btn-danger"><i class="fa fa-plus"></i> Thêm mới sản phẩm</a>
            </li>
        </ul>
    </nav>
    {{-- Bảng nhóm thành viên --}}
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="checkAll" class="form-check-input">
                </th>
                <th style="width:200px">Hình ảnh</th>
                <th style="width:250px">Tên sản phẩm</th>
                <th  style="width:100px">Giá sản phẩm (VNĐ)</th>
                <th style="width:100px">Số lượng</th>
                <th style="width:100px">Mã nhóm sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
                <td>
                    <input type="checkbox" class="form-check-input checkBoxItem">
                </td>
                @php
                $images = json_decode($item['images'], true);
                @endphp
                <td><img src="{{ $images ? asset("$images[0]") : 'N/A'}}" class="card-img-top" style="height:300px" alt="..."></td>
                <td>{{ $item->name }}</td>
                @php
                    $price = number_format($item->price, 0, 0, ',');
                @endphp
                <td>{{ $price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->products_catalogue_id }}</td>
                <td>
                    <a href="{{ route('product.delete', $item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection