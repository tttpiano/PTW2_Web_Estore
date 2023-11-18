@extends('front.layouts.master')
@section('main-container')

<div class="container text-center" style="color: black; margin-top: 70px; font-size: 50px; font-weight: 600;">Liên Hệ</div>
    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">

            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện Thoại</h4>
                        <p>038.793.1169</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p>Trường Cao Đẳng Công Nghệ Thủ Đức</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>estore@gmail.com</p>
                    </div>
                </div>
            </div>

    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->

    <div class="map" style="height: unset !important;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4749098516377!2d106.7554891751069!3d10.851437757805455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752797e321f8e9%3A0xb3ff69197b10ec4f!2zVHLGsOG7nW5nIGNhbyDEkeG6s25nIEPDtG5nIG5naOG7hyBUaOG7pyDEkOG7qWM!5e0!3m2!1svi!2s!4v1700278381998!5m2!1svi!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

@endsection
