@extends('admin.admin')
@section('title-ad')
    Đơn hàng
@endsection
@section('nav')
    Đơn hàng
@endsection
@section('content-admin')
    <form action="#" class="form-inline" method="post">

        <div class="form-group">
            <input class="form-control search-input" name="bannerSearch" placeholder="Search By Name..">
        </div>

        <button type="submit" class="btn btn-root search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
                <th class="text-right">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($order as $ord)
                <tr>
                    <td> {{ $count++ }}</td>
                    <td>{{ $ord->name }}</td>
                    <td>
                        <span class="badge badge-success">Visible</span>
                    </td>
                    <td>2023-10-23 21:45:57</td>
                    <td>
                        2023-10-23 21:45:57
                    </td>
                    <td>
                        <span class="badge badge-success">Visible</span>
                    </td>
                    <td>{{ $ord->toltal }}</td>
                    <td>
                        {{ $ord->created_at }}
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger btndelete"
                            onclick="return confirm('Are you sure to delete this banner ?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <hr>
@endsection
