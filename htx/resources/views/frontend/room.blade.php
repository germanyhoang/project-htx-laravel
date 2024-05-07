@extends('layout')
@section('title-user')
    Phòng
@endsection
@section('content-layout')
    <div class="wrapper container py-4">
        {{-- Hiển thị sản phẩm theo từng danh mục --}}
        @foreach 
            <div class="product--category">
                <h3 class="title">Homstay</h3>
                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-3 information_products">
                            <a href="{{ route('detailRoom', $room->id) }}" style="text-decoration: none;">
                                <img class='picture' src="{{ asset('source/images/room/' . $room->image) }}"
                                    alt="{{ $room->name }}">
                                <p class="name">{{ $room->name }}</p>
                                <p class="price"><b>{{ number_format($room->price) }} VNĐ</b></p>

                            </a>
                            <button class="btnCart">
                                <a href="{{ route('detailRoom', $room->id) }}"> Thêm giỏ hàng</a>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection