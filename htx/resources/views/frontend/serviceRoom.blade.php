@extends('layout')
@section('title-user')
    Dịch vụ
@endsection
@section('content-layout')
    <div class="container">
        <div class="room-title">
            <div class="name-room">
                <h3>Phòng ngủ 2 giường nằm rộng rãi thoáng mát </h3>
            </div>
            <div class="room-contact">
                <button type="submit" class="btn-room-contact">Liên hệ tư vấn</button>
            </div>
        </div>
        <div class="room-img" style="margin: 20px;">
            <div class="row animate__fadeIn animate__animated">
                <div class="col-lg-7 col-md-12 col-sm-12 left">
                    <div class="">
                        <img src="{{ asset('source/assets/frontend/images/DELASOL_PHAT_LINH_SAPA.jpg') }}" class="img-room"
                            alt="img" style="width: 100%;height: 500px;">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 right">
                    <div class="row gy-4">
                        <div class="col-md-12 col-12 small">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="">
                                        <img src="{{ asset('source/assets/frontend/images/DELASOL_PHAT_LINH_SAPA.jpg') }}"
                                            class="img-room" alt="img" style="width: 100%; height: 200px;">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="">
                                        <img src="{{ asset('source/assets/frontend/images/DELASOL_PHAT_LINH_SAPA.jpg') }}"
                                            class="img-room" alt="img" style="width: 100%; height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 big">
                            <div class="image">
                                <img src="{{ asset('source/assets/frontend/images/DELASOL_PHAT_LINH_SAPA.jpg') }}"
                                    class="img-room" alt="image" style="width: 100%; height: 268px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="room-content " style="margin: 20px; display: flex; justify-content: center;">
            <div class="room-reveiw">
                <h4>Giới thiệu phòng</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius assumenda distinctio illo reiciendis maxime
                    culpa, velit aliquid, ipsam neque adipisci provident, vitae enim molestias totam officiis quaerat hic
                    dolor nam voluptas. Cumque ipsam vero expedita non dolorem hic nobis quidem omnis suscipit dicta quam,
                    repellat aut odio perferendis delectus odit earum cupiditate. Sed modi ab dolorum itaque sapiente vero
                    expedita unde, et perspiciatis hic reprehenderit laboriosam doloribus voluptatem tenetur fugiat
                    laudantium exercitationem pariatur eveniet dignissimos soluta accusamus excepturi! Eveniet commodi nisi,
                    quod quia assumenda veritatis laborum aliquam laboriosam, impedit voluptatum facere reprehenderit
                    maxime, minima cumque expedita! Dicta delectus mollitia omnis.</p>
            </div>

        </div>
    </div>
@endsection
