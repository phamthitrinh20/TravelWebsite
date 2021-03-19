<?php
ob_start();
session_start();
include "layouts/header.php";
ob_end_flush();
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
                                <h2>Thông tin</h2>
                                <h1>Về chúng tôi</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
<div id="colorlib-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about animate-box">
                    <h2>Chào mừng đến với khách sạn của chúng tôi</h2>
                    <p>Đạt tiêu chuẩn 5 sao với thiết kế theo kiến trúc Pháp và Việt Nam vô cùng cuốn hút.
                     Tại đây có hồ bơi ngoài trời và cả nhà hàng cũng được bố trí ở vị trí ngoài trời.
                      Du khách có thể tận hưởng những món ăn ngon đầy màu sắc và ngắm nhìn phong cảnh ngoài đường phố Đà Nẵng.</p>
                    <p>Bữa ăn gồm các món quốc tế được phục vụ theo kiểu tự chọn bình dân tại nhà hàng Restaurant Nineteen hoặc theo kiểu cao cấp tại nhà hàng Reflections Restaurant.
                    Quý khách có thể thưởng thức cocktail và rượu vang tại 4 quầy bar và sảnh khách của Caravelle.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="assets/images/img_bg_5.jpg"
                    alt="Free HTML5 Bootstrap Template by colorlib.com">
            </div>
        </div>
    </div>
</div>

<div id="colorlib-testimony" class="colorlib-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
                <h2>Khách hàng của chúng tôi hài lòng nói</h2>
                <p>Khách sạn có tất cả 335 phòng và mỗi phòng đều được trang trí trang nhã với tông màu trung tính nhẹ nhàng, các phòng máy lạnh tại đây có cửa sổ kính suốt từ trần đến sàn nhìn ra quang cảnh thành phố hoặc Sông Hàn. Tất cả các phòng đều được trang bị các tiện nghi hiện đại như TV màn hình phẳng, danh sách các loại gối cho khách chọn và dịch vụ phòng 24 giờ.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 animate-box">
                <div class="testimony text-center">
                    <span class="img-user" style="background-image: url(assets/images/person2.jpg);"></span>
                    <span class="user">Brian Doe</span>
                    <small>Satisfied Customer</small>
                    <blockquote>
                        <p></i> Tôi đã có một chuyến công tác rất thuận lợi, phòng ốc khách sạn rất tốt, vị trí nằm ngay trung tâm .</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-4 animate-box">
                <div class="testimony text-center">
                    <span class="img-user" style="background-image: url(assets/images/person1.jpg);"></span>
                    <span class="user">Nathalie Miller</span>
                    <small>Satisfied Customer</small>
                    <blockquote>
                        <p></i> Khách sạn rất tốt, tôi rất hài lòng về chuyến đi này, cũng cảm ơn IVIVU đã đặt khách sạn này cho tôi, mọi thứ hoàn hảo. Lần sau sẽ liên hệ IVIVU. .</p>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-4 animate-box">
                <div class="testimony text-center">
                    <span class="img-user" style="background-image: url(assets/images/person3.jpg);"></span>
                    <span class="user">Shara Jones</span>
                    <small>Satisfied Customer</small>
                    <blockquote>
                        <p></i>Chuyến đi vừa rồi rất vui, mọi thứ đều tốt khách sạn đạt chuẩn 5 sao. Dịch vụ iVIVU cũng tốt, nhân viên hỗ trợ nhiệt tình..</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php"
?>
