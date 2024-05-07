@extends('admin.admin')
@section('title-ad')
    Danh mục sản phẩm
@endsection
@section('nav')
    Danh mục sản phẩm
@endsection
@section('content-admin')
    <form action="{{ route('searchProductType') }}" class="form-inline" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control search-input" name="productTypeSearch" placeholder="Search By Name..">
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
                <th>Thương hiệu</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th class="text-right">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if ($category->status == 1)
                            <span class="badge badge-success">Visible</span>
                        @else
                            <span class="badge badge-danger">Hidden</span>
                        @endif
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('editCategory', $category->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('deleteProductType', $category->id) }}" class="btn btn-sm btn-danger btndelete"
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
