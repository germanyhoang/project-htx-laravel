@extends('layout')
@section('title-user')
    Chi tiết bài báo
@endsection
@section('content-layout')
    <div class="new--detail">
        @if ($news)
            <div class="container news--detail py-3">
                <h1>{{ $news->title }}</h1>
                <span>{{ $news->created_at->format('d.m.Y') }}</span>
                <img src="{{ asset('source/images/news/' . $news->image) }}" alt="">
                <p>{{ $news->description }}</p>

            </div>
        @else
            <p>Bài báo không tồn tại.</p>
        @endif
        <style>
            .news--detail span {
                display: block;
                text-align: right;
            }

            .news--detail img {
                width: 100%;
                height: 300px;
                margin-bottom: 5px;
            }

            .news--detail h1 {
                text-align: center;
            }

            .news--detail span {
                text-align: right;
            }
        </style>
    </div>
@endsection
