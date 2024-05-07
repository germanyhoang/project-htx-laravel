@extends('layout')
@section('title-user')
    Chi tiết sản phẩm
@endsection
@section('content-layout')
    <div class="detail container  py-4">
        <div class="  picture--product ">
            <img src="{{ asset('source/images/product/' . $product->image) }}" alt="">
        </div>
        <div class=" information_product">
            <h3>{{ $product->name }}</h3>
            <h3></h3>
            <p class="discount--detail"> <span>{{ number_format($product->sale_price) }} VND</span> <span
                    style="text-decoration: line-through;">{{ number_format($product->price) }} VND</span> </p>
            <p>NHÃN HIỆU: <span>{{ $product->category->name }}</span> </p>
            <p>Nguồn gốc <span>{{ $product->origin->address }}</span></p>
            <p>MÔ TẢ: <span> {{ $product->description }}</span>
            </p>
            <div id="buy-amount">
                <button class="plus" type="button" onclick="increaseQuantity()">+</button>
                <input id="quantityInput" type="number" min="1" class="numberCart" name="quantity" value="1">
                <button class="minus " type="button" onclick="decreaseQuantity()">-</button>
                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                    @csrf
                    <!-- Input số lượng sản phẩm -->
                    <input id="quantity" type="hidden" name="quantity" value="1">
                    <button
                        style="margin-left: 20px;border-radius: 10px; background-color: #aef2b2; padding: 5px 10px; outline: none; border:none; cursor: pointer;"
                        type="submit">Thêm vào giỏ
                        hàng</button>
                </form>
            </div>


        </div>
    </div>
    <hr>
    <div class="  container py-4  ">
        <h3 class="title">SẢN PHẨM LIÊN QUAN</h3>
        <div class="row">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="col-3 information_products">
                    <a href="{{ route('detailProduct', $relatedProduct->id) }}" style="text-decoration: none;">
                        <img class='picture' src="{{ asset('source/images/product/' . $relatedProduct->image) }}"
                            alt="">
                        <p class="name">{{ $relatedProduct->name }}</p>
                        <p class="price"><b>{{ number_format($relatedProduct->price) }} VNĐ</b></p>
                    </a>
                    <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">

                        <button type="submit" class="btnCart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            @endforeach
        </div>
        <hr>
    </div>
@endsection

@push('scripts')
    <script>
        function increaseQuantity() {
            let quantityInput = document.getElementById('quantityInput');
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
            document.getElementById('quantity').value = quantity + 1;
        }

        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantityInput');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
                document.getElementById('quantity').value = quantity - 1;
            }
        }
    </script>
@endpush
