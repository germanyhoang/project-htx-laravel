@extends('layout')
@section('title-user')
    Liên hệ
@endsection
@section('content-layout')
    <div class="container py-4">
        <div class="row">
            {{-- if login --}}
            @if (Auth::check())
                <div class="col-6" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px;border-radius: 10px;">
                    <div class="contact">
                        <h2 class="title--contact">LIÊN HỆ</h2>
                        <p class="mess--contact">Hãy gửi thông tin cho chúng tôi nếu bạn cần tư vấn</p>
                        <form action="{{ route('postContact') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Họ tên" value="{{ Auth::user()->name }}">
                            <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                            <input type="number" name="phone" placeholder="Số điện thoại"
                                value="{{ Auth::user()->phone }}">
                            <input type="text" name="subject" placeholder="Tiêu đề">
                            <textarea name="message" id="message" cols="30" rows="8" placeholder="Nội dung"></textarea>
                            <button type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <br>
                    <br>
                    <div class="info--map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.6808145834884!2d103.8465746753482!3d22.327908079666795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cd41155d1d1e8b%3A0x311cbb29f074e8a8!2zTcaw4budbmcgSG9hLCB0dC4gU2EgUGEsIFNhIFBhLCBMw6BvIENhaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1708934697383!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                {{-- if no login --}}
            @else
                <div class="col-6" style = " box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); padding: 30px;border-radius: 10px;">
                    <div class="contact">
                        <h2 class="title--contact">LIÊN HỆ</h2>
                        <p class="mess--contact">Hãy gửi thông tin cho chúng tôi nếu bạn cần tư vấn</p>
                        <form action="{{ route('postContact') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Họ tên">
                            <input type="email" name="email" placeholder="Email">
                            <input type="number" name="phone" placeholder="Số điện thoại">
                            <input type="text" name="subject" placeholder="Tiêu đề">
                            <textarea name="message" id="message" cols="30" rows="8" placeholder="Nội dung"></textarea>
                            <button type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <br>
                    <br>
                    <div class="info--map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.6808145834884!2d103.8465746753482!3d22.327908079666795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x36cd41155d1d1e8b%3A0x311cbb29f074e8a8!2zTcaw4budbmcgSG9hLCB0dC4gU2EgUGEsIFNhIFBhLCBMw6BvIENhaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1708934697383!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
