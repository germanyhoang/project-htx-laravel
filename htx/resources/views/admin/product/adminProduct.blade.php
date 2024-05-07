@extends('admin.admin')
@section('title-ad')
    Sản phẩm
@endsection
@section('nav')
    Sản phẩm
@endsection
@section('content-admin')
    <form action="{{ route('searchProduct') }}" class="form-inline" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control search-input" name="productTypeSearch" placeholder="Tìm theo tên..">
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
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th class="text-right">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img style="width: 80px; height: 80px;"
                            src=" {{ asset('source/images/product/' . $product->image) }}" alt="">
                    </td>
                    <td>{{ $product->sale_price }}</td>
                    <td>
                        @if ($product->status == 1)
                            <span class="badge badge-success">Hiển thị</span>
                        @else
                            <span class="badge badge-danger">Ẩn</span>
                        @endif
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('editProduct', $product->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-sm btn-danger btndelete"
                            onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
@endsection
