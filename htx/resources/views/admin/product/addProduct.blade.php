@extends('admin.admin')
@section('title-ad')
    Thêm sản phẩm
@endsection
@section('nav')
    Thêm sản phẩm
@endsection
@section('content-admin')
    <form action="{{ route('storeProductDemo') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for=""> Hình ảnh</label>
                    <small id="actual-btn-err"></small>
                    <br>
                    <input type="file" name="image" id="actual-btn" hidden onchange="readURL(this);">
                    <div class="input-group">
                        <span class="form-control" id="file-chosen">No file chosen</span>
                        <div class="input-group-append">
                            <label for="actual-btn" id='file-label' class="btn btn-sm btn-danger">
                                <i class="fa fa-folder-open"></i>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="number" class="form-control" id="price" name="price" required min="0">
                </div>
                <div class="form-group">
                    <label for="sale_price">Giá khuyến mãi:</label>
                    <input type="number" class="form-control" id="sale_price" name="sale_price" min="0">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="origin_id">Xuất xứ:</label>
                    <select class="form-control" id="origin_id" name="origin_id" required>
                        <option value="">--Xuất xứ--</option>
                        @foreach ($origins as $origin)
                            <option value="{{ $origin->id }}">{{ $origin->address }}</option>
                        @endforeach
                    </select>
                    {{--  <input type="text" class="form-control" id="origin" name="origin">  --}}
                </div>
                <div class="form-group">
                    <label for="category_id">Mặt hàng:</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">--Chọn một mặt hàng--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea class="form-control" rows="10" id="description" name="description"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btnAddBanner">Thêm sản phẩm</button>
    </form>
@endsection
