<?php
session_start();
include "layouts/header.php"
?>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(assets/images/img_bg_5.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                            <div class="slider-text-inner slider-text-inner2 text-center">
                                <h2>Liên lạc</h2>
                                <h1>Liên hệ chúng tôi</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 animate-box">
                <h3>Thông tin liên lạc</h3>
                <div class="row contact-info-wrap">
                    <div class="col-md-3">
                        <p><span><i class="icon-location-2"></i></span>459 Tôn Đức Thắng, <br> Quận Liên Chiểu, TP. Đà Nẵng
                            </p>
                    </div>
                    <div class="col-md-3">
                        <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                    </div>
                    <div class="col-md-3">
                        <p><span><i class="icon-paperplane"></i></span> <a
                                href="mailto:info@yoursite.com">thanduchuyz299@gmail.com</a></p>
                    </div>
                    <div class="col-md-3">
                        <p><span><i class="icon-globe"></i></span> <a href="#">thanduchuyz299@gmail.com</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 animate-box">
                <h3>Liên lạc</h3>
                <form action="#">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="fname">Tên</label>
                            <input type="text" id="fname" class="form-control" placeholder="Tên của bạn">
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Họ</label>
                            <input type="text" id="lname" class="form-control" placeholder="Họ của bạn">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">Tài khoản email</label>
                            <input type="text" id="email" class="form-control" placeholder="email đăng kí">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="subject">Chủ đề</label>
                            <input type="text" id="subject" class="form-control"
                                placeholder="Chủ đề của tin nhắn">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="message">Tin nhắn</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                placeholder="Hãy nhắn tin cho chúng tôi"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Gửi tin nhắn" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php"
?>
