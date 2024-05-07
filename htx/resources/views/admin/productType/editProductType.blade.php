@extends('admin.admin')
@section('title-ad')
    Cập nhật danh mục
@endsection
@section('nav')
    Cập nhật danh mục
@endsection

@section('content-admin')
    <form action="{{ route('updateCategory', $categories->id) }}" class="bannerForm" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-name">Tên thương hiệu</label>
                    <small id="ad-bn-cr-name-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-name' name="name" placeholder="Input name"
                        value="{{ $categories->name }}" onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
            </div>
            <div class="form-group">
                <label for="ad-bn-cr-status">Trạng thái</label>
                <select name="status" class="form-control" id='ad-bn-cr-status'>
                    <option value="1" {{ $categories->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ $categories->status == 0 ? 'selected' : '' }}>Ẩn</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btnAddBanner">Save Data</button>
    </form>
@endsection
