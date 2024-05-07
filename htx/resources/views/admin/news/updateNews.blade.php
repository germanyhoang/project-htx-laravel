@extends('admin.admin')
@section('title-ad')
    Update Management
@endsection
@section('nav')
    Update Management
@endsection
@section('content-admin')
    <form action="{{ route('updateNews', $news->id) }}" class="bannerForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-name">Tiêu đề</label>
                    <small id="ad-bn-cr-name-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-name' name="name" placeholder="Input name"
                        value="{{ $news->title }}" onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-description">Nội dung</label>
                    <textarea class="form-control" id="ad-bn-cr-description" name="description" placeholder="Banner description"
                        style="height: 40rem;">{{ $news->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-status">Trạng thái</label>
                    <select name="status" class="form-control" id='ad-bn-cr-status'>
                        <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                        <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>Ẩn</option>
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
                <img src="{{ asset('source/images/news/' . $news->image) }}" alt="no-image"
                    style="width:100%; padding: 15px" id="blah">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btnAddNews">Save Data</button>
    </form>
@endsection
