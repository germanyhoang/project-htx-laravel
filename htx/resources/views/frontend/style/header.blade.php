 <header>
     <div class="header--info py-2">
         <div class="header--infoLeft pl-4">
             <div class="info-item">
                 <i class="fa fa-map-marker-alt"></i> Mường Hoa,Sa Pa,Lào Cai
             </div>
             <div class="info-item pl-3">
                 <i class="fa-solid fa-phone"></i> 094 345 2345
             </div>
         </div>
         <div class="header--infoRight pr-4">
             @if (!Auth::check())
                 <div class="info-item">
                     <button class="btn__loginUser"><a href="{{ route('getLogin') }}">
                             <i class="fa-solid fa-right-to-bracket "></i>Đăng nhập
                         </a></button>
                 </div>
                 <div class="info--item pl-4">
                     <button class="btn__loginUser"><a href="{{ route('getRegister') }}">
                             <i class="fa-solid fa-right-to-bracket pr-1"></i>Đăng kí
                         </a></button>
                 </div>
             @else
                 @if (Auth::user()->role == 2)
                     {{-- If login as user --}}
                     <div class="info--item d-flex">
                         <a href="#"><i class="fa fa-user-edit mr-1"></i>Chào bạn {{ Auth::user()->name }}</a>
                         <a href="{{ route('getCart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                         <a href="{{ route('logout') }}"><i class="fa-solid fa-right-to-bracket mr-1"></i>Đăng xuất</a>
                     </div>
                 @else
                     {{-- If login as admin --}}
                     <div class="info--item d-flex">
                         <a href="#"><i class="fa fa-user-edit mr-1"></i>Chào bạn {{ Auth::user()->name }}</a>
                         <a href="{{ route('getCart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                         <a href="{{ route('logout') }}"><i class="fa-solid fa-right-to-bracket mr-1"></i>Đăng xuất</a>
                         <a href="{{ route('adminDashboard') }}"><i class="fa fa-user-secret mr-1"></i>Go admin</a>
                     </div>
                 @endif
             @endif
         </div>
     </div>
     <div class="header">
         <nav class="navbar navbar-expand-lg  header">
             <div class="container-fluid">
                 <a class="navbar-brand" href="#">
                     <img src="{{ asset('source/assets/frontend/images/logo.png') }}" alt="Your Logo">
                 </a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarNav" style="display: flex; justify-content: right;">
                     <ul class="navbar-nav " >
                         <li class="nav-item">
                             <a class="nav-link " style ="color:#ffff"  href="{{ route('index') }}">Trang chủ</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" style ="color:#ffff"  href="{{ route('intro') }}">Giới thiệu</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" style ="color:#ffff"  href="{{ route('news') }}">Tin tức</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " style ="color:#ffff"  href="{{ route('product') }}">Dịch vụ </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " style ="color:#ffff"  href="{{ route('getService') }}">Tour</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " style ="color:#ffff"  href="{{ route('tipTravel') }}">Cẩm nang du lịch</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link " style ="color:#ffff"  href="{{ route('contact') }}">Liên hệ</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
