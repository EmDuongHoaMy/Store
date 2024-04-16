@extends('product.bg')
@section('product.main')
    <div class="ibox-content ">
        <label for=""><h3>Quản lý sản phẩm</h3></label>
        {{-- Các chức năng --}}
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                {{-- form tìm kiếm --}}
                <li class="nav-item me-2">
                    <form class="d-flex" role="search" action="{{ route('product.index') }}">
                        <input class="form-control " type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('product.add') }}" class="btn btn-success bg-danger"><i class="fa fa-plus"></i>Thêm mới sản phẩm</a>
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
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá sản phẩm (VNĐ)</th>
                <th>Số lượng</th>
                <th>Mã nhóm sản phẩm</th>
                <th>Thao tác</th>
            </tr> 
            </th>
            @foreach ($product as $item)
            <tr>
                <td>
                    <input type="checkbox" class="input-checkbox checkBoxItem">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                @php
                    $price = number_format($item->price,0,0,',');
                @endphp
                <td>{{ $price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->products_catalogue_id }}</td>
                <td>
                    <a href="{{ route('product.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                    <a href="{{ route('product.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $product->links('pagination::bootstrap-4') }}
    </div>
@endsection