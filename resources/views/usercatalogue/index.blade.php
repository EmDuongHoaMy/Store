@extends('usercatalogue.bg')
@section('usercatalogue.main')
    <div class="ibox-content ">
        <label for=""><h3>Quản lý nhóm thành viên</h3></label>
        {{-- Các chức năng --}}
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                {{-- form tìm kiếm --}}
                <li class="nav-item me-2">
                    <form class="d-flex" role="search" action="{{ route('usercatalogue.index') }}">
                        <input class="form-control " type="search" name="keyword" value="{{ $request->input('keyword') ?? old('keyword') }}" placeholder="Nhập từ khoá muốn tìm kiếm" aria-label="Search"style="width: 250px">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('usercatalogue.add') }}" class="btn btn-success bg-danger"><i class="fa fa-plus"></i>Thêm mới nhóm thành viên</a>
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
                <th>Tên nhóm</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr> 
            </th>
            @foreach ($usercatalogue as $item)
            <tr>
                <td>
                    <input type="checkbox" class="input-checkbox checkBoxItem">
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('usercatalogue.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                    <a href="{{ route('usercatalogue.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $usercatalogue->links('pagination::bootstrap-4') }}
    </div>
@endsection