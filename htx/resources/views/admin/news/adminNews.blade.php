@extends('admin.admin')
@section('title-ad')
    News Management
@endsection
@section('nav')
    News Management
@endsection
@section('content-admin')
    <form action="{{ route('getNews') }}" class="form-inline" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control search-input" name="bannerSearch" placeholder="Search By Name..">
        </div>

        <button style ="height: 38px;" type="submit" class="btn btn-root search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hình ảnh</th>
                <th class="text-right">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($news as $new)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $new->title }}</td>
                    <td>
                        @if ($new->status == 1)
                            <span class="badge badge-success">Visible</span>
                        @else
                            <span class="badge badge-danger">Hidden</span>
                        @endif
                    </td>
                    <td>{{ $new->created_at }}</td>
                    <td>
                        <img src="{{ asset('source/images/news/' . $new->image) }}" style="width: 50px; height: 50px;"
                            alt="img-news">
                    </td>
                    <td class="text-right">
                        <a href="{{ route('editNews', $new->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('deleteNews', $new->id) }}" class="btn btn-sm btn-danger btndelete"
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
