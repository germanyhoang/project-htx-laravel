@extends('layout')
@section('title-user')
    Chi tiết đơn hàng
@endsection
@section('content-layout')
<style>
    
.success {
    max-width: 900px; 
    margin: 0 auto; 
    padding: 124px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center; 
}


.success h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #007bff; 
}


.success p {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333; 

}
.success i {
    font-style: italic;
    color: #666; 
}

</style>
    <div class="success">
        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
        <p>CẢM ƠN QUÝ KHÁCH ĐÃ MUA HÀNG TẠI ...VN</p>
        <br>
        <p>TƯ VẤN VIÊN SẼ LIÊN HỆ ĐẾN QUÝ KHÁCH TRONG THỜI GIAN SỚM NHẤT (<i>GIỜ LÀM VIỆC 9H-20H</i>) </p>

    </div>
@endsection
