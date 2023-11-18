@extends('front.layouts.master')
@section('main-container')
    <style>

        .introduce {
            text-align: center;
            color: #12424d;
            font-weight: 800 !important;
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .content_introduce h3 {
            color: #2fb950;

        }

        .content_introduce h2 {
            margin-top: 40px;
            color: red;

        }

        .content_introduce h4 {
            margin-top: 30px;
            color: #25576e;
            font-weight: 700;

        }

        .content_introduce p:nth-child(2) {
            color: #0000cc;
            font-weight: 700 !important;
            font-size: 20px !important;

        }

        .content_introduce p {
            color: #25576e;
            font-size: 17px;
        }

        .content_introduce p strong {
            font-size: 19px;
        }

        .content_introduce .aa {
            color: #25576e;
            font-size: 20px;
            font-weight: 700 !important;
        }

        .content_introduce p a:hover {
            color: red !important;
        }

        .content_introduce h5 {
            font-size: 25px;
            font-weight: 700;
            color: #0ecdcd;
        }
    </style>
    <div class="container">
        <div class="introduce">
            <h1>THÔNG TIN VỀ CHÚNG TÔI</h1>
        </div>
        <div class="content_introduce">
            <h5>Địa Chỉ Cơ Sở</h5>
            <ul class="dc">
                <li><i class="fa-solid fa-map-location-dot"></i> <strong>Địa chỉ 1:</strong>Cao Đẳng Công Nghệ Thủ Đức
                </li>

            </ul>
            <h3>Chào mừng Quý khách đến với Shop Estore</h3>

            <h2>CHẤT LƯỢNG LÀ NIỀM TIN</h2>
            <p>Chào mừng đến với trang web bán điện thoại của chúng tôi! Chúng tôi tự hào giới thiệu đến bạn một nền
                tảng mua sắm trực tuyến đáng tin cậy và tuyệt vời, nơi bạn có thể tìm thấy các sản phẩm điện thoại di
                động tuyệt vời từ các thương hiệu hàng đầu trên thị trường. Với một ấn tượng và đa dạng các sản phẩm,
                chúng tôi cam kết mang đến cho bạn trải nghiệm mua sắm điện thoại trực tuyến tốt nhất.
                    <br>
                Với tầm nhìn mục tiêu làm hài lòng mọi nhu cầu mua sắm của bạn, chúng tôi đã tập hợp một bộ sưu tập đáng
                kinh ngạc của những chiếc điện thoại thông minh chất lượng cao từ các thương hiệu nổi tiếng như Apple,
                Samsung, Huawei, Xiaomi và nhiều hãng khác. Dù bạn đang tìm kiếm một chiếc điện thoại cao cấp với tính
                năng tối ưu và thiết kế tinh tế, hay một chiếc điện thoại giá rẻ nhưng vẫn đảm bảo chất lượng và hiệu
                năng, chúng tôi đều có những lựa chọn phù hợp cho bạn.
                <br>
                Trang web của chúng tôi cung cấp một giao diện thân thiện và dễ sử dụng, cho phép bạn dễ dàng tìm kiếm
                và so sánh các sản phẩm. Bạn có thể tìm hiểu thông tin chi tiết về từng điện thoại, đọc các đánh giá và
                nhận xét từ khách hàng trước đó, từ đó đưa ra quyết định thông minh và chính xác. Ngoài ra, chúng tôi
                luôn đảm bảo độ an toàn và bảo mật trong quá trình thanh toán trực tuyến, đảm bảo rằng thông tin cá nhân
                của bạn được bảo vệ một cách tốt nhất.
                <br>
                Chúng tôi không chỉ cung cấp các sản phẩm chất lượng cao, mà còn cam kết mang đến cho bạn một dịch vụ
                khách hàng tuyệt vời. Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng giải đáp mọi thắc mắc và hỗ trợ bạn
                trong quá trình mua hàng và sau khi mua hàng. Chúng tôi coi trọng sự hài lòng của khách hàng và luôn cố
                gắng mang đến trải nghiệm mua sắm tốt nhất có thể.</p>
            <p>Chúng tôi luôn đặt niềm tin của khách hàng lên hàng đầu, và với mục tiêu mang đến những giải pháp tối ưu
                cho không gian sống và làm việc của bạn. Hãy liên hệ với chúng tôi ngay hôm nay thông qua số SĐT: <a
                    href="tel:0348971008">0348971008</a> để trải nghiệm dịch vụ
                chuyên nghiệp và sản phẩm chất lượng từ Công ty Giải Pháp Công Nghệ Năng Lượng Xanh!</p>
            <p class="aa">RẤT HÂN HẠNH ĐƯỢC PHỤC VỤ QUÝ KHÁCH,</p>


        </div>

    </div>
@endsection
