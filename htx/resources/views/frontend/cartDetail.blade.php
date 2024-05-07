@extends('layout')
@section('title-user')
    Chi tiết giỏ hàng
@endsection
@section('content-layout')
    <div class="container" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px;border-radius: 10px;margin-top: 10px;margin-bottom: 10px">
        <div class="icon-cart" style="font-size: 20px;font-weight: bold;margin-top: 20px;">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>| Giỏ hàng của bạn</span>
        </div>
        <div class="title-cart">
            <span class="tt0">STT</span>
            <span class="tt1">Sản Phẩm</span>
            <span class="tt2">Đơn giá</span>
            <span class="tt3">Số lượng</span>
            <span class="tt4">Thành tiền</span>
            <span class="tt5">Thao tác</span>
        </div>
        <div class="cart">
            @foreach ($cart as $productId => $item)
                <div class="item-cart">
                    <div class="number">{{ $loop->iteration }}</div>
                    <div class="img-cart">
                        <img src="{{ asset('source/images/product/' . $item['product']->image) }}" style="width: 100%;"
                            alt="">
                    </div>
                    <div class="name">{{ $item['product']->name }}</div>
                    <div class="price">{{ number_format($item['product']->price) }} đ</div>
                    <div class="quantity">
                        <form action="{{ route('updateCart', $productId) }}" method="POST">
                            @csrf
                            <button type="button" class="quantity-btn minus-btn">-</button>
                            <input type="number" name="quantity" class="quantity-num" value="{{ $item['quantity'] }}">
                            <button type="button" class="quantity-btn plus-btn">+</button>
                        </form>
                    </div>
                    <div class="total-price">{{ number_format($item['total_price']) }} đ</div>

                    <input type="hidden" class="product-price" value="{{ $item['product']->price }}">
                    <div class="action">
                        <form action="{{ route('removeFromCart', $productId) }}" method="POST">
                            @csrf
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
        </div>
        <div class="item-order">

            <div class="order--check">
                <button>
                    <a href="{{ route('getCheckout') }}">Đặt mua</a>
                </button>
            </div>

        </div>
    </div>
    {{-- <div class="container">
        <div class="cart">
            @foreach ($cart as $productId => $item)
                <div class="item-cart">
                    <div class="number">{{ $loop->iteration }}</div>
                    <div class="img-cart">
                        <img src="{{ asset('source/images/product/' . $item['product']->image) }}" style="width: 100%;"
                            alt="">
                    </div>
                    <div class="name">{{ $item['product']->name }}</div>
                    <div class="price">{{ number_format($item['product']->price) }} đ</div>
                    <div class="quantity">
                        <form action="{{ route('updateCart', $productId) }}" method="POST">
                            @csrf
                            <button type="button" class="quantity-btn minus-btn">-</button>
                            <input type="number" name="quantity" class="quantity-num" value="{{ $item['quantity'] }}">
                            <button type="button" class="quantity-btn plus-btn">+</button>
                        </form>
                    </div>
                    <div class="total-price">{{ number_format($item['total_price']) }} đ</div>

                    <input type="hidden" class="product-price" value="{{ $item['product']->price }}">
                    <div class="action">
                        <form action="{{ route('removeFromCart', $productId) }}" method="POST">
                            @csrf
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
        </div>
    </div>

    <div class="container">
        <div class="item-order">

            <div class="order--check">
                <button>
                    <a href="{{ route('getCheckout') }}">Đặt mua</a>
                </button>
            </div>

        </div>
    </div> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const plusButtons = document.querySelectorAll('.plus-btn');
            const minusButtons = document.querySelectorAll('.minus-btn');
            const quantityInputs = document.querySelectorAll('.quantity-num');

            plusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = button.parentElement.querySelector('.quantity-num');
                    let value = parseInt(input.value);
                    value = isNaN(value) ? 0 : value;
                    input.value = value + 1;

                    // Gọi hàm cập nhật thành tiền
                    updateTotalPrice(input);
                });
            });

            minusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = button.parentElement.querySelector('.quantity-num');
                    let value = parseInt(input.value);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1) {
                        input.value = value - 1;

                        // Gọi hàm cập nhật thành tiền
                        updateTotalPrice(input);
                    }
                });
            });

            // Hàm cập nhật thành tiền
            function updateTotalPrice(input) {
                const item = input.closest('.item-cart');
                const quantity = parseInt(input.value);
                const price = parseFloat(item.querySelector('.product-price').value);
                const totalPrice = quantity * price;
                item.querySelector('.total-price').textContent = formatCurrency(totalPrice);
            }

            // Hàm định dạng số tiền
            function formatCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }
        });
    </script>
@endsection
