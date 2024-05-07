@extends('layout')
@section('title-user')
    Trang chủ
@endsection
@section('content-layout')
<style>
    .btnCart a {
    color: black; 
    text-decoration: none; 
    display: block;
    }
    .btnCart {
        background-color: transparent;  
        transition: background-color 0.3s ease; /* Hiệu ứng chuyển đổi màu nền */
    }
    .btnCart:hover {
        background-color: green; /* Màu nền chuyển sang xanh khi di chuột qua */
    }
</style>
    {{--  PHP CONTENT   --}}
    {{--  CAROUSEL   --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banners as $key => $banner)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" >
                    <img class="d-block w-100" style = "height: 600px" src="{{ asset('source/images/banner/' . $banner->image) }}"
                        alt="{{ $banner->name }}">
                </div>
            @endforeach
        </div>
    </div>
    {{--  CUISION   --}}
    <div class="container my-5" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px 50px;border-radius: 10px;">
        <h3 class="title" style ="color:#000000" >Tận hưởng không gia thư giãn tại mường hoa</h3>
        <div class="row">

            @foreach ($latest_product as $lt)
                <div class="col-3 information_products">
                    <a href="{{ route('detailProduct', $lt->id) }}" style="text-decoration: none;">
                        <img class='picture' src="{{ asset('source/images/product/' . $lt->image) }}"
                            alt="{{ $lt->name }}">
                        <p class="name">{{ $lt->name }}</p>
                        <p class="price"><b>{{ number_format($lt->price) }} VNĐ</b></p>
                    </a>
                    <button class="btnCart">
                        <a href="{{ route('detailProduct', $lt->id) }}"> Thêm giỏ hàng</a>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
    {{--  NEWS  --}}
    <div class="container my-5" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px 50px;border-radius: 10px;">
        <h3 class="title" style ="color:#000000">tin tức mới nhất</h3>
        <div class="news2 row " style=" display: flex; justify-content: space-between;">
            @foreach ($latest_news as $item)
                <div class="card-news2 col-3">
                    <a href="{{ route('getDetailNews', $item->id) }}">
                        <img style="height: 270px; width: 250px;" src="{{ asset('source/images/news/' . $item->image) }}"
                            class="img-news" width="100%" alt="...">
                        <div class="card-body">
                            <h4 class="new2-title" style="text-align: center;">{{ $item->title }}</h4>
                            <p class="new2-text" style="text-align: center;">{{ $item->created_at->format('d.m.Y') }}</p>
                                {{ $item->content }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
