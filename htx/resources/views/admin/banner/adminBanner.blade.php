@extends('admin.admin')
@section('title-ad')
    Banner Management
@endsection
@section('nav')
    Danh mục
@endsection
@section('content-admin')
    <form action="{{ route('searchBanner') }}" class="form-inline" method="post">
        @csrf
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
                <th>No.</th>
                <th>Tên</th>
                <th>Mặt</th>
                <th>Trạng thái</th>
                <th>Hình ảnh</th>
                <th>Ngày tạo</th>
                <th class="text-right">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $banner->name }}</td>
                    <td>{{ $banner->site }}</td>
                    <td>
                        @if ($banner->status == 1)
                            <span class="badge badge-success">Visible</span>
                        @else
                            <span class="badge badge-danger">Hidden</span>
                        @endif
                    </td>
                    <td>
                        <img src="{{ asset('source/images/banner/' . $banner->image) }}" width="60" alt="img-news">
                    </td>
                    <td>{{ $banner->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('editBanner', $banner->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('deleteBanner', $banner->id) }}" class="btn btn-sm btn-danger btndelete"
                            onclick="return confirm('Are you sure to delete this news?')">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
@endsection
