@extends('order.bg')
@section('script')
    <script src="{{ asset('js/confirm.js') }}"></script>
@endsection
@section('order.main')
<div class="ibox-content m-5">
    <h2 class="text-center mb-4">Quản lý đơn hàng</h2>
    {{-- Các chức năng --}}
    <nav class="navbar navbar-expand-sm mb-4">
        <ul class="navbar-nav">
            {{-- form tìm kiếm --}}
            <li class="nav-item me-2">
                <form class="d-flex" role="search" action="{{ route('order.index') }}">
                    <input class="form-control" type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search" style="width: 250px;">
                    <button class="btn btn-outline-success ms-2" type="submit">Search</button>
                </form>
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
                <th>Mã đơn hàng</th>
                <th>Mã khách hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Chi tiết đơn hàng</th>
                <th>Thao tác</th>

            </tr>
            <tbody>
                @foreach ($order as $item)
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input checkBoxItem">
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->customer_id }}</td>
                    <td class="order-status text-success">{{ $item->current_status }}</td>
                    <td>
                        <a href="{{ route('order.detail',$item->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-info"></i></a>
                    </td>
                    <td><button type="button" class="btn btn-warning confirm-button" data-order-id="{{ $item['id'] }}">Xác nhận</button></td>
                </tr>
                @endforeach
            </tbody>
        </thead>

    </table>
</div>
@endsection