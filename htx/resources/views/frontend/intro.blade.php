@extends('layout')
@section('title-user')
    Giới thiệu
@endsection
@section('content-layout')
    {{--  about us   --}}
    <div class="intro pt-5 container pb-5 ">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="intro-body ">
                    <h5 style = "text-align: center">Lịch sử hình thành</h5>
                    <p>Hợp tác xã Mường Hoa là một tổ chức kinh tế cộng đồng nằm ở xã Sapa, huyện Sapa, tỉnh Lào Cai, Việt Nam. Được biết đến với cách tiếp cận bền vững và phát triển kinh tế cộng đồng, hợp tác xã Mường Hoa đã đóng góp không nhỏ vào việc nâng cao chất lượng cuộc sống của người dân địa phương.</p>
                    <p>Lịch sử hình thành của hợp tác xã Mường Hoa bắt đầu vào những năm đầu của thập kỷ 2000. Đầu tiên, một nhóm các nông dân và người dân tộc dân tộc thiểu số tại khu vực Sapa đã nhận thức được tiềm năng du lịch của vùng này, đặc biệt là cảnh đẹp tự nhiên và văn hóa dân tộc độc đáo. Họ đã tổ chức lại cách hoạt động nông nghiệp truyền thống của mình để tạo điều kiện cho việc phát triển du lịch cộng đồng.</p>
                    <p>Qua nhiều năm hoạt động, hợp tác xã Mường Hoa đã không ngừng mở rộng và phát triển. Họ đã xây dựng các cơ sở lưu trú, nhà hàng, và dịch vụ hướng dẫn du lịch địa phương. Đồng thời, hợp tác xã này cũng tập trung vào việc bảo tồn và phát triển văn hóa dân tộc bản địa thông qua việc tổ chức các hoạt động văn hóa truyền thống, giới thiệu nghệ thuật dân gian và các sản phẩm thủ công mỹ nghệ.</p>
                    
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('source/assets/frontend/images/bai_da_co_muong_hoa2.jpg') }}" class="img-intro"
                    style="width: 100%;height: auto;" alt="...">
            </div>
        </div>
        <div class="row g-0 pt-5">
            <div class="col-md-6">
                <img src="{{ asset('source/assets/frontend/images/tau_hoa_leo_nui.jpeg') }}" class="img-intro"
                    style="width: 100%; height: auto;" alt="...">
            </div>
            <div class="col-md-6">
                <div class="intro-body">
                    <h5 style = "text-align: center">Về chúng tôi</h5>
                    <p>Với những nỗ lực này, hợp tác xã Mường Hoa đã thu hút một lượng lớn du khách đến thăm và trải nghiệm cuộc sống của người dân dân tộc địa phương. Điều này không chỉ mang lại thu nhập cho cộng đồng mà còn giúp tăng cường nhận thức về giá trị văn hóa và bảo tồn môi trường ở khu vực này.</p>
                    <p>Về địa lý, khu vực Sapa thuộc vùng núi phía Tây Bắc Việt Nam, gần biên giới với Trung Quốc. Sapa nổi tiếng với khí hậu mát mẻ quanh năm và phong cảnh thiên nhiên hùng vĩ, với những cánh đồng lúa bậc thang, những dãy núi trùng điệp và các thác nước. Dân cư tại đây chủ yếu là các dân tộc thiểu số như H'mong, Dao, Giáy, Xá Phó, và tỉ lệ người dân tộc đạt khoảng 50% tổng dân số.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
