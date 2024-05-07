@extends('admin.admin')
@section('title-ad')
    Tip Management
@endsection
@section('content-admin')
  <form action="./?module=admin&controller=banner&action=searchBannerFull"
                                        class="form-inline" method="post">

                                        <div class="form-group">
                                            <input class="form-control search-input" name="bannerSearch"
                                                placeholder="Search By Name..">
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
                                                <th>Tiêu đề</th>
                                                <th>Nội dung</th>
                                                <th>Hình ảnh</th>
                                                <th>Ngày tạo</th>
                                                <th>Hình ảnh</th>
                                                <th class="text-right">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>home banner-2</td>
                                                <td>Home</td>
                                                <td>
                                                    <span class="badge badge-success">Visible</span>
                                                </td>
                                                <td>2023-10-23 21:45:57</td>
                                                <td>
                                                    <img src="./public/uploads/BN8.jpg" width="60">
                                                </td>
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-sm btn-success">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger btndelete"
                                                        onclick="return confirm('Are you sure to delete this banner ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
@endsection
