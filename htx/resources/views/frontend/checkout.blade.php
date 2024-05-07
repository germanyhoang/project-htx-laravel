@extends('layout')
@section('title-user')
    Thông tin khách hàng
@endsection
@section('content-layout')
    <style>
        body {
            font-family: Arial, sans-serif;
        }


        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }


        .infor {
            background-color: #f2f2f2cd;
            padding: 20px;
            padding-left: 50px;
        }


        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Định dạng tiêu đề */
        p b {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Định dạng ô chọn giao hàng và thanh toán */
        .vanchuyen,
        .pttt {
            margin-bottom: 20px;
        }

        /* Định dạng nút đặt hàng */
        .btn-checkout {
            display: block;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-items: center;
            margin: 0 auto;
        }

        .btn-checkout:hover {
            background-color: #0056b3;
        }
    </style>
    <h2 style="margin: 20px 80px; text-align: center; ">THÔNG TIN KHÁCH HÀNG</h2>
    <div class="main">
        @guest
            {{--  if no login   --}}
            <div class="infor">
                <div class="infor2">
                    <div class="hoten">
                        <input type="text" name="" id="hoten" placeholder="HỌ TÊN"> <span class="require_1">*</span>
                        <input type="text" name="" id="sdt" placeholder="SỐ ĐIỆN THOẠI"><span
                            class="require_2">*</span>
                    </div>
                    <input type="text" id='email' placeholder="EMAIL"><span class="require_3">*</span>
                    <input type="text" id='diachi' placeholder="ĐỊA CHỈ"><span class="require_4">*</span>
                    <input type="text" id='ghichu' placeholder="GHI CHÚ">
                </div>
                <p><b>ĐƠN VỊ VẬN CHUYỂN</b></p>
                <div class="vanchuyen">
                    <div class="delivery"><input type="radio" name="">GIAO HÀNG TIẾT KIỆM</div>
                    <div class="delivery"><input type="radio" name="">GIAO HÀNG NHANH</div>
                    <div class="delivery"><input type="radio" name="">J&T EXPRESS</div>
                </div>

                <p><b>PHƯƠNG THỨC THANH TOÁN</b></p>
                <div class="pttt">
                    <div class="payment"><input type="radio" name="">THANH TOÁN KHI NHẬN HÀNG</div>
                    <div class="payment"><input value="billpayment" type="radio" name="">CHUYỂN KHOẢN NGÂN HÀNG</div>
                    <div class="payment"><input type="radio" name="">QUA THẺ</div>
                </div>

            </div>
        @else
            {{--  if login   --}}
            <div class="infor row">
                <div class="col-6">
                    <div class="infor2">
                        <div class="hoten">
                            <input type="text" name="name" id="name" placeholder="HỌ TÊN"
                                value="{{ Auth::user()->name }}">
                            <input type="tel" name="phone" id="phone" placeholder="SỐ ĐIỆN THOẠI"
                                value="{{ Auth::user()->phone }}">
                        </div>
                        <input type="email" id='email' name="email" value="{{ Auth::user()->email }}"
                            placeholder="EMAIL">
                        <input type="text" id='address' name="address" placeholder="ĐỊA CHỈ"
                            value="{{ Auth::user()->address }}">
                        {{-- <input type="text" id='note' name="note" placeholder="GHI CHÚ"> --}}
                    </div>
                    <p><b>ĐƠN VỊ VẬN CHUYỂN</b></p>
                    <select name="delivery_id">
                        @foreach ($delivery as $dl)
                            <option value="{{ $dl->id }}">{{ $dl->name }}</option>
                        @endforeach
                    </select>
                    <select name="payment_id">
                        @foreach ($payment as $pm)
                            <option value="{{ $pm->id }}">
                                {{ $pm->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <div class="checkout--title">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="">Sản Phẩm</th>
                                    <th class="">Đơn giá</th>
                                    <th class="">Số lượng</th>
                                    <th class="">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0; // Khởi tạo biến tổng tiền
                                @endphp
                                @foreach ($cart as $productId => $item)
                                    @php
                                        // Tính tổng tiền của từng mặt hàng
                                        $subtotal = $item['total_price'];
                                        // Cộng tổng tiền vào biến tổng tiền
                                        $totalPrice += $subtotal;
                                    @endphp
                                    <tr class="">
                                        <td class="number">{{ $loop->iteration }}</td>
                                        <td class="name">{{ $item['product']->name }}</td>
                                        <td class="price">{{ number_format($item['product']->price) }} đ</td>
                                        <td class="quantity">{{ $item['quantity'] }}</td>
                                        <td class="total-price">{{ number_format($subtotal) }} đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Hiển thị tổng tiền --}}
                        <div class="total">
                            <h4>Tổng Tiền: {{ number_format($totalPrice) }} đ</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  Button to place order --}}
        <form action="{{ route('postCheckout') }}" method="post">
            @csrf
            <button type="submit" class=" btn btn-primary btn-checkout">Đặt Hàng</button>
        </form>
        <br>
        <form action="{{ route('getSuccessVnpay') }}" method="post">
            @csrf
            <button type="submit" name="redirect" class=" btn btn-primary btn-checkout"> Thanh toan VNPAY</button>
        </form>
    @endguest
    </div>
@endsection
