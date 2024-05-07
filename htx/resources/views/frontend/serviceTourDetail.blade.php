@extends('layout')
@section('title-user')
    Chi tiết tour
@endsection
@section('content-layout')
    <style>
        body>div {
            width: 50%;
            margin: auto;
            background-color: #f2f2f2cd;

        }

        .left {
            width: 25px;
        }

        .right {
            font-size: 16px;
        }

        .thongtin input {
            width: 60%;
            padding: 8px;
            margin-bottom: 10px;
            font-size: 18px;
            outline: none;
            border: 1px solid #dac6c6ee;
            border-radius: 5px;
        }

        ::placeholder {
            font-size: 15px;
        }

        #buy-amount {
            display: flex;
        }

        .plus,
        .minus {
            width: 25px;
            height: 25px;
            border: none;
            border-radius: 5px;
        }

        #buy-amount input {
            background-color: rgb(218, 211, 211);
            width: 80px;
            text-align: center;
            border: none;
        }

        .soluongnguoi table td {
            padding: 5px 15px;
        }

        .soluongnguoi div {
            margin-left: 10px;
        }

        .pttt {
            padding: 10px;
            margin-bottom: 30px;
            border: 2px solid rgb(161, 156, 156);
            border: none;
            display: flex;
        }

        .payment {
            margin-right: 22px;
        }

        input[type=radio] {
            margin-right: 10px;
        }

        .button {
            background-color: green;
            color: white;
            padding: 15px 50px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .stt {
            background-color: green;
            text-align: center;
            width: 28px;
            height: 28px;
            display: inline-block;
            border-radius: 50%;
            color: #fff;
            font-size: 16px;
            line-height: 28px;
        }

        .danhmuc {
            font-size: 20px;
        }
    </style>
    <div style="display: flex;padding: 10px 0; margin-bottom: 15px;margin-top: 15px;">
        <div style="padding: 0 10px;margin: auto;">
            <img style="width:250px;height: 85%" class='picture' src="./client/assets/image/thit_trau_gac_bep.jpg"
                alt="">
        </div>
        <div>
            <table>
                <h3 style="color: green;">Tour Hà Giang - Sông Nho Quế hùng vĩ 3 ngày 2 đêm từ HN</h3>

                <tr>
                    <td class="left"><i class="fa-solid fa-pen"></i></td>
                    <td class="right">Mã tour: 001</td>
                </tr>
                <tr>
                    <td class="left"><i class="fa-solid fa-house"></i></td>
                    <td class="right">Khởi hành từ: Hà Nội</td>
                </tr>
                <tr>
                    <td class="left"><i class="fa-solid fa-clock"></i></td>
                    <td class="right">3 ngày 2 đêm</td>
                </tr>
                <tr>
                    <td class="left"><i class="fa-solid fa-map"></i></td>
                    <td class="right">Điểm đến: T.P Hồ Chí Minh</td>
                </tr>
            </table>
        </div>
    </div>

    <div style=" margin-bottom: 15px;">
        <div class="thongtin" style="display: flex;flex-direction: column;margin-left:10px">
            <div style="margin-top: 15px;margin-bottom:20px;">
                <span class="stt">1</span>
                <span class='danhmuc'><b>THÔNG TIN LIÊN HỆ</b></span>
            </div>
            <input type="text" name="" id="" placeholder="Nhập họ tên">
            <input type="text" name="" id="" placeholder="Nhập email">
            <input type="text" name="" id="" placeholder="Số điện thoại">
            <input type="text" name="" id="" placeholder="Địa chỉ">
        </div>
    </div>
    <div class="soluongnguoi" style=" margin-bottom: 15px;">
        <div style="padding:10px 0">
            <span class='stt'>2</span>
            <span class="danhmuc"><b>Chọn số lượng người</b></span>
        </div>
        <div>
            <table style="border: 1px solid #dac6c6ee" cellspacing="0" cellpadding="5">
                <tr>
                    <td rowspan="3" style="border-right: 1px solid #dac6c6ee;">Số lượng</td>
                    <td colspan="2">Người lớn</td>
                    <td><b>2,350,000đ</b></td>
                    <td>
                        <div id="buy-amount">
                            <button class="plus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                            <input type="text" name="" value="1">
                            <button class="minus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Trẻ em 8 đến 11 tuổi</td>
                    <td><b>1,850,000đ</b></td>
                    <td>
                        <div id="buy-amount">
                            <button class="plus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                            <input type="text" name="" value="1">
                            <button class="minus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Em bé</td>
                    <td><b>1,050,000đ</b></td>
                    <td>
                        <div id="buy-amount">
                            <button class="plus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                            <input type="text" name="" value="1">
                            <button class="minus"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="display: flex;justify-content: space-between;width:70%;">
            <p style="font-size: 18px"><b>Chi phí dự kiến</b></p>
            <p style="font-size: 20px;color: red;font-weight: 600;">5.360.000 VNĐ</p>
        </div>
    </div>
    <div style=" margin-bottom: 15px;">
        <div style="padding:10px">
            <span class="stt">3</span>
            <span class="danhmuc"><b>Phương thức thanh toán</b></span>
        </div>
        <div class="pttt" style="margin-bottom: 15px;">
            <div class="payment"><input type="radio" name="">THANH TOÁN TIỀN MẶT</div>
            <div class="payment"><input type="radio" name="">CHUYỂN KHOẢN NGÂN HÀNG</div>
            <div class="payment"><input type="radio" name="">QUA THẺ</div>
        </div>
        <div style="text-align: center">
            <button class="button">Thanh Toán</button>
        </div>
    </div>
@endsection
