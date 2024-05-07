@extends('layout')
@section('title-user')
    Sản phẩm
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
    <div class="wrapper container py-4" >
        {{-- Hiển thị sản phẩm theo từng danh mục --}}
        @foreach ($productsByCategory as $categoryName => $products)
        <br>
        <br>
            <div class="product--category">
                <h3 class="title">{{ $categoryName }}</h3>
                <div class="row" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px 50px;border-radius: 10px;">
                    @foreach ($products as $product)
                        <div class="col-3 information_products">
                            <a href="{{ route('detailProduct', $product->id) }}" style="text-decoration: none;">
                                <img class='picture' src="{{ asset('source/images/product/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                                <p class="name">{{ $product->name }}</p>
                                <p class="price"><b>{{ number_format($product->price) }} VNĐ</b></p>

                            </a>
                            <button class="btnCart">
                                <a href="{{ route('detailProduct', $product->id) }}"> Thêm giỏ hàng</a>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
