@extends('admin.admin')
@section('title-ad')
    Cập nhật banner
@endsection
@section('nav')
    Cập nhật banner
@endsection
@section('content-admin')
    <form action="{{ route('updateBanner', $banners->id) }}" class="bannerForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-name">Tên banner</label>
                    <small id="ad-bn-cr-name-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-name' name="name" placeholder="Input name"
                        value="{{ $banners->name }}" onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
            </div>
            <div class="form-group">
                <label for="ad-bn-cr-status">Mặt</label>
                <select name="site" class="form-control" id='ad-bn-cr-status'>
                    <option value="1" {{ $banners->site == 1 ? 'selected' : '' }}>Home</option>
                    <option value="0" {{ $banners->site == 0 ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-status">Trạng thái</label>
                    <select name="status" class="form-control" id='ad-bn-cr-status'>
                        <option value="1" {{ $banners->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                        <option value="0" {{ $banners->status == 0 ? 'selected' : '' }}>Ẩn</option>
                    </select>
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
            </div>
            <div class="row">
                <img src="{{ asset('source/images/banner/' . $banners->image) }}" alt="no-image"
                    style="width:100%; padding: 15px" id="blah">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btnAddBanner">Save Data</button>
    </form>
@endsection
