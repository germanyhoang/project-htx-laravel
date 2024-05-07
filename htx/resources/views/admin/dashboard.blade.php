@extends('admin.admin')
@section('title-ad')
    Dashboard
@endsection
@section('nav')
    Dashboard
@endsection
@section('content-admin')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3></h3>
                    <p>Tổng đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3></h3>
                    <p>Tổng sản phẩm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3></h3>
                    <p>Tổng khách hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>
                    <p>Tổng bài viết</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <h2>Top sản phẩm</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tên </th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Lượt mua</th>
                    </tr>
                </thead>
                <tbody>
                    {{--  content  --}}
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <h2>Top Khách hàng</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Đơn hàng</th>
                        <th>Số lượt mua</th>
                    </tr>
                </thead>
                <tbody>
                    {{--  content  --}}
                </tbody>
            </table>
        </div>


    </div>
    {{--
    <form action="#" class="form-inline" method="post">

        <div class="form-group">
            <input class="form-control search-input" name="bannerSearch" placeholder="Search By Name..">
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
                <th>Name</th>
                <th>Site</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Image</th>
                <th class="text-right">Actions</th>
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
    <hr>  --}}
@endsection
