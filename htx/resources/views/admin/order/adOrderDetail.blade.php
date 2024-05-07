@extends('admin.admin')
@section('title-ad')
    Chi tiết đơn hàng
@endsection
@section('nav')
    Chi tiết đơn hàng
@endsection
@section('content-admin')
    <form action="./?module=admin&controller=banner&action=searchBannerFull" class="form-inline" method="post">

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
                <th>Status</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>

            </tr>
        </tbody>
    </table>
    <hr>
@endsection
