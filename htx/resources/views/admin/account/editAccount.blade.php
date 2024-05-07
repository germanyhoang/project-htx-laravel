@extends('admin.admin')
@section('title-ad')
    Cập nhật tài khoản
@endsection
@section('nav')
    Cập nhật tài khoản
@endsection
@section('content-admin')
    <form id="accountForm" action="{{ route('updateDemo', $user->id) }}" class="bannerForm" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ad-bn-cr-name">Tên</label>
                    <small id="ad-bn-cr-name-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-name' name="name" placeholder="Input name"
                        value="{{ $user->name }}" onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-email">Email</label>
                    <small id="ad-bn-cr-email-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-email' name="email" placeholder="Input name"
                        value="{{ $user->email }}" onkeyup="validateNotEmpty(this, 'Banner name');">
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-phone">Số điện thoại</label>
                    <small id="ad-bn-cr-phone-err"></small>
                    <input type="tel" class="form-control" id='ad-bn-cr-phone' name="phone" placeholder="Input name"
                        value="{{ $user->phone }}" onkeyup="validateNotEmpty(this, 'Banner name');">
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
                    <label for="ad-bn-cr-password">Mật khẩu</label>
                    <small id="ad-bn-cr-password-err"></small>
                    <input type="password" class="form-control" id='ad-bn-cr-password' name="password"
                        value="{{ $user->password }}" placeholder="Input name">
                </div>
                {{--  <div class="form-group">
                    <label for="ad-bn-cr-repassword">Xác nhận mật khẩu</label>
                    <small id="ad-bn-cr-repassword-err"></small>
                    <input type="password" class="form-control" id='ad-bn-cr-repassword' name="repassword"
                        placeholder="Input name">
                </div>  --}}
                <div class="form-group">
                    <label for="ad-bn-cr-address">Địa chỉ</label>
                    <small id="ad-bn-cr-address-err"></small>
                    <input type="text" class="form-control" id='ad-bn-cr-address' name="address" placeholder="Input name"
                        value="{{ $user->address }}" onkeyup="validateNotEmpty(this, 'Banner name' );">
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-status">Trạng thái</label>
                    <select name="status" class="form-control" id='ad-bn-cr-status'>
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ad-bn-cr-role">Vai trò</label>
                    <select name="role" class="form-control" id='ad-bn-cr-role'>
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>User</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('source/images/account/' . $user->image) }}" alt="no-image"
                style="width:100%; padding: 15px" id="blah">
        </div>
        <button type="submit" class="btn btn-primary btnAddBanner">Save Data</button>
    </form>
    <script>
        document.getElementById('accountForm').onsubmit = function() {
            var password = document.getElementById('ad-bn-cr-password').value;
            var repassword = document.getElementById('ad-bn-cr-repassword').value;

            if (password !== repassword) {
                alert('Mật khẩu và xác nhận mật khẩu không khớp.');
                return false; // Ngăn chặn sự kiện mặc định của nút submit
            }
        };
    </script>
@endsection
