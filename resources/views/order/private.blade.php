@extends('layout.base')
@section('title')
    MyOrders
@endsection
@section('script')
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
@section('main')
<div class="ibox-content m-5">
    <h2 class="text-center mb-4">Đơn hàng của bạn</h2>
    {{-- Bảng nhóm thành viên --}}
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>

                <th>Mã đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Chi tiết đơn hàng</th>

            </tr>
            <tbody>
                @foreach ($order as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->current_status->description() }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                        <a href="{{ route('order.own_detail',$item->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-info"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </thead>

    </table>
</div>
@endsection