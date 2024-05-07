@extends('admin.admin')
@section('title-ad')
    News Management
@endsection
@section('nav')
    News Management
@endsection
@section('content-admin')
    <form action="{{ route('storeNews') }}" class="bannerForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-name">Tiêu đề</label>
                    <small id="ad-bn-cr-name-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-name' name="name" placeholder="Input name"
                        onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-status">Trạng thái</label>
                    <select name="status" class="form-control" id='ad-bn-cr-status'>
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Ẩn</option>
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

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-description">Nội dung</label>
                    <textarea class="form-control" id="ad-bn-cr-description" name="description" placeholder="Banner description"
                        style="height: 40rem; " cols="50"></textarea>
                </div>
            </div>

            <div class="row">
                <img src="#" alt="no-image" style="width:60px; height: 50px;" id="blah">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btnAddNews">Save Data</button>
    </form>
@endsection
