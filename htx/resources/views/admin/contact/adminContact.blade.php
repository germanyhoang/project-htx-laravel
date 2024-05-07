@extends('admin.admin')
@section('title-ad')
    Contact Management
@endsection
@section('nav')
    Contact Management
@endsection
@section('content-admin')
    <form action="{{ route('getContact') }}" class="form-inline" method="post">
        <div class="form-group">
            <input class="form-control search-input" name="bannerSearch" placeholder="Search By Name..">
        </div>
        <button type="submit" class="btn btn-root search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th class="text-right">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>
                        {{ $contact->email }}
                    </td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->title }}</td>
                    <td>
                        {{ $contact->messeger }}
                    </td>
                    <td>{{ $contact->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('deleteContact', $contact->contact_id) }}" class="btn btn-sm btn-danger btndelete"
                            onclick="return confirm('Are you sure to delete this news?')">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
@endsection
