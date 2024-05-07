<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  BS CSS   --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{--  TITLE  --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <title>@yield('title-ad')</title>
    {{--  Font Awesome  --}}
    <link rel="stylesheet"
        href="{{ asset('source/assets/admin/for/admin/plugins/fontawesome-free/css/all.min.css') }}">
    {{--  overlayScrollbars   --}}
    <link rel="stylesheet"
        href="{{ asset('source/assets/admin/for/admin/plugins/overlayScrollbars/css/OverlayScrollbars.css') }}">
    {{--  Theme style  --}}
    <link rel="stylesheet" href="{{ asset('source/assets/admin/dist/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/admin/for/site/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/admin/for/site/css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/admin/for/site/css/checkout.component.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/admin/for/admin/dist/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/admin/for/admin/dist/css/adminlte.min.css') }}"/>
    {{--  FAVICON  --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('source/assets/admin/for/site/img/logo.png') }}">
    {{--  CSS  --}}
    <link rel="stylesheet" href="{{ asset('source/assets/frontend/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">@yield('nav')</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt" style="font-size: 14px;"></i>Logout
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./" class="nav-link">
                        <i class="fas fa-home" style="font-size: 14px;"></i>To Customer Page
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #2C8E4D;">
            <a href="{{ route('index') }}" class="brand-link">
                <img src="{{ asset('source/assets/admin/for/site/img/logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">HTX MƯỜNG HOA</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('source/assets/admin/for/site/img/user.png') }}"
                            class="img-circle elevation-2" alt="user Image"
                            style="width: 35px; height: 35px; border-radius: 50%;">
                    </div>
                    <div class="info">
                        <a style="text-align: center; line-height: 20px;" href="#" class="d-block">
                            {{ Auth::user()->name }}</a>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append" style="height: 38px">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('adminDashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('productType') }}" class="nav-link active">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Quản lí danh mục <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('productType') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addProductType') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm danh mục </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getProduct') }}" class="nav-link">
                                <i class="fa fa-gift" style="color: white; margin: 0 5px; "></i>
                                <p>
                                    Quản lí dịch vụ cung cấp <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('getProduct') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addProduct') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getNews') }}" class="nav-link">
                                <i class="fa fa-newspaper " style="color: white; margin: 0 5px; "></i>
                                <p>
                                    Quản lí tin tức <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('getNews') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addNews') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm tin tức</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getContact') }}" class="nav-link">
                                <i class="fa fa-envelope-open" style="color: white; margin: 0 5px; "></i>
                                <p>
                                    Quản lí liên hệ <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('getContact') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('getOrder') }}" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>
                                    Quản lí đơn hàng<i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('getOrder') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listTip') }}" class="nav-link">
                                <i class="fa fa-book" style="color: white; margin: 0 5px; "></i>
                                <p>
                                    Quản lí cẩm nang<i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listTip') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addTip') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm cẩm nang</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listBanner') }}" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Quản lí banner <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listBanner') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addBanner') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm banner</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('listAccount') }}" class="nav-link">
                                <i class="fa fa-user-friends" style="color: white; margin: 0 5px;"></i>
                                <p>
                                    Quản lí tài khoản <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('listAccount') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('addAccount') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm tài khoản</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @yield('content-admin')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="d-none d-sm-block" style="float: right">
                <b>Version</b> 3.0
            </div>
            <strong>Copyright &copy; 2023 <a href="">By nhom 1</a>.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    {{--  BS CSS   --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    {{--  sidebar helper  --}}
    <script src="{{ asset('source/assets/admin/for/admin/plugins/sidebar/sidebar.js') }}"></script>
    {{--  overlayScrollbars  --}}
    <script src="{{ asset('source/assets/admin/for/admin/plugins/overlayScrollbars/js/overlayScrollbars.js') }}">
    </script>
    {{--  AdminLTE App  --}}
    <script src="{{ asset('source/assets/admin/for/admin/dist/js/adminlte.js') }}"></script>
    {{--  Form validation  --}}
    <script src="{{ asset('source/assets/admin/for/site/js/validate.js') }}"></script>

    <script>
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>
