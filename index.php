<?php
session_start();
include "layouts/header.php";
include "services/contactRoom.php";
include "services/contactFood.php";
$dataRandomFoods = getDataRandomFoods();
$dataRandomRooms = getDataRandomRooms();
?>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(assets/images/img_bg_5.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Chào mừng đến với </h2>
                                        <h1>Khách sạn của chúng tôi</h1>
                                        <p><a class="btn btn-primary btn-demo" href="#"></i> Xem chi tiết</a> <a
                                                class="btn btn-primary btn-learn">Tìm hiểu thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(assets/images/img_bg_1.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Khám phá và thưởng thức</h2>
                                        <h1>Đáp ứng mọi thứ bạn mong muốn</h1>
                                        <p><a class="btn btn-primary btn-demo" href="#"></i> Xem chi tiết</a> <a
                                                class="btn btn-primary btn-learn">Tìm hiểu thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(assets/images/img_bg_3.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluids">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Bạn luôn được chào đón</h2>
                                        <h1>Chúng tôi biết làm thế nào để làm hài lòng bạn</h1>
                                        <p><a class="btn btn-primary btn-demo" href="#"></i> Xem chi tiết</a> <a
                                                class="btn btn-primary btn-learn">Tìm hiểu thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url(assets/images/img_bg_4.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h2>Hãy đến và tận hưởng những đêm không thể quên</h2>
                                        <h1>Ở khách sạn của chúng tôi</h1>
                                        <p><a class="btn btn-primary btn-demo" href="#"></i> Xem chi tiết</a> <a
                                                class="btn btn-primary btn-learn">Tìm hiểu thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div id="colorlib-reservation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 search-wrap">
                        <form method="post" class="colorlib-form" action='rooms-suites.php'>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Ngày đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-calendar2"></i>
                                            <input name='dateStart' type="text" id="date" class="form-control date"
                                                placeholder="Ngày nhận phòng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">Ngày đi:</label>
                                        <div class="form-field">
                                            <i class="icon icon-calendar2"></i>
                                            <input name='dateEnd' type="text" id="date" class="form-control date"
                                                placeholder="Ngày trả phòng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="adults">Người lớn</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="people" id="people" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="children">Trẻ em</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="child" id="people" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" name="submitFind" id="submit"
                                        class="btn btn-primary btn-block">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 animate-box text-center">
                        <div class="services">
                            <span class="icon">
                                <i class="flaticon-reception"></i>
                            </span>
                            <h3>Phục vụ 24/7</h3>
                            <p>Nằm ở vị trí trung tâm thành phố trên đường Bạch Đằng -
                             con đường đẹp nhất thành phố, gần trung tâm mua sắm, ăn uống , giải trí,
                             cách chợ Hàn khoảng 300m, khách sạn nhìn ra dòng sông Hàn thơ mộng
                              - niềm tự hào của người dân Đà Nẵng.</p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box text-center">
                        <div class="services">
                            <span class="icon">
                                <i class="flaticon-herbs"></i>
                            </span>
                            <h3>Hệ thống Spa</h3>
                            <p>Được hình thành từ việc đam mê làm đẹp mà gây dựng lên, phát triển cùng với nhiều bằng cấp và cúp đoạt được chúng tôi đã dần trở thành địa chỉ uy tín số 1 hiện nay </p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box text-center">
                        <div class="services">
                            <span class="icon">
                                <i class="flaticon-car"></i>
                            </span>
                            <h3>Giao thông</h3>
                            <p>Từ khách sạn quý khách có thể ngắm toàn cảnh Cầu Rồng(cây cầu mới được khánh thành năm 2013) với khoảng cách chỉ khoảng 300 mét và
                            chiêm ngưỡng tận mắt từ vị trí Khách sạn  màn trình diễn Rồng phun lửa và phun nước vào những ngày cuối tuần</p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box text-center">
                        <div class="services">
                            <span class="icon">
                                <i class="flaticon-cheers"></i>
                            </span>
                            <h3>Nhà hàng &amp; Bar</h3>
                            <p>Được chế biến hoàn hảo bởi những đầu bếp chuyên nghiệp đã được tuyển chọn
                             và cho ra nhiều món ăn đặc trưng mang hương vị riêng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-rooms" class="colorlib-light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                        <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i></span>
                        <h2>Phòng &amp; Căn hộ</h2>
                        <p>Phong cách thiết kế chủ đạo hướng về thiên nhiên và đón ánh sáng mặt trời. Tất cả các căn hộ đều có cửa sổ rộng thoáng, tận dụng tối đa ánh sáng tự nhiên và không khí trong lành</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <div class="owl-carousel owl-carousel2">
                            <?php foreach ($dataRandomRooms as $room) {?>
                            <div class="item">
                                <a href=<?php echo $room['imgRoom']; ?> class="room image-popup-link"
                                    style=<?php echo '"background-image: url(' . $room['imgRoom'] . ');"';
    ?>></a>
                                <div class="desc text-center">
                                    <span class="rate-star">
                                    <?php for ($i = 1; $i <= 5; $i++) {?>
                                        <i class="<?php echo $i < $room['rateRoom'] ? "icon-star-full full" : "icon-star-full" ?>"></i>
                                    <?php }?></span>
                                    <h3><a href="rooms-suites.php"><?php echo $room['nameRoom'] ?></a></h3>
                                    <p class="price">
                                        <span class="currency">$</span>
                                        <span class="price-room"><?php echo $room['priceRoom'] ?></span>
                                        <span class="per">/ per night</span>
                                    </p>
                                    <ul>
                                        <?php foreach ($room['infoRoom'] as $info) {?>
                                        <li><i class="icon-check"></i>
                                            <?php echo $info ?>
                                        </li>
                                        <?php }?>
                                    </ul>
                                    <p><a class="btn btn-primary btn-book" href='services/addRoom.php?idR=<?php echo $room['idRoom'] ?>'>Đặt ngay!</a></p>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-12 text-center animate-box">
                        <a href="rooms-suites.php">Xem tất cả <i class="icon-arrow-right3"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div id="colorlib-dining-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                        <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i></span>
                        <h2>Ăn tối &amp; Bar</h2>
                        <p>Món ăn với sự hòa quyện giữa lịch sử,
                        văn hóa cùng nét tinh tế, tài tình của người đầu bếp đã
                        chinh phục vị giác hàng triệu thực khách trong và ngoài nước.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="diningbar-flex">
                        <div class="half animate-box">
                            <ul class="nav nav-tabs text-center" role="tablist">
                                <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab"
                                        data-toggle="tab">Món chính</a></li>
                                <li role="presentation"><a href="#2" aria-controls="2" role="tab"
                                        data-toggle="tab">Tráng miệng</a></li>
                                <li role="presentation"><a href="#3" aria-controls="3" role="tab"
                                        data-toggle="tab">Nước uống</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                            <?php for ($i = 1; $i <= 3; $i++) {?>
                                <div role="tabpanel" class="tab-pane <?php echo $i == 1 ? 'active' : '' ?>" id=<?php echo $i ?>>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="menu-dish">
                                                <?php foreach ($dataRandomFoods[$i] as $food) {?>
                                                <li>
                                                    <figure class="image"><img src=<?php echo $food['imgFood'] ?>
                                                            alt="Image Food"></figure>
                                                    <div class="text">
                                                        <span class="price"><?php echo $food['priceFood'] . '$' ?></span>
                                                        <h3><?php echo $food['nameFood'] ?></h3>
                                                        <p class="cat"><?php echo $food['ingredientFood'] ?></p>
                                                    </div>
                                                </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div><!-- end half -->
                        <div class="half diningbar-img" style="background-image: url(assets/images/img_bg_6.jpg);">
                        </div><!-- end half -->
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                        <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i></span>
                        <h2>Tin tức gần đây</h2>
                        <p>Tin tức về địa điểm du lịch và vui chơi được cập nhật nhanh chóng và sớm nhất
                        .Giúp bạn có được những thông tin cần thiết</p>
                    </div>
                </div>
                <div class="blog-flex">
                    <div class="video colorlib-video" style="background-image: url(assets/images/blog-3.jpg);">
                        <a href="https://vimeo.com/channels/staffpicks/151715092" class="popup-vimeo"><i
                                class="icon-video"></i></a>
                        <div class="overlay"></div>
                    </div>
                    <div class="blog-entry">
                        <div class="row">
                            <div class="col-md-12 animate-box">
                                <a href="blog.html" class="blog-post">
                                    <span class="img" style="background-image: url(assets/images/blog-1.jpg);"></span>
                                    <div class="desc">
                                        <span class="date">Tháng Một 14, 2018</span>
                                        <h3>Hướng dẫn nhanh cho bữa ăn ngon nhất</h3>
                                        <span class="cat">Đọc thêm</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 animate-box">
                                <a href="blog.html" class="blog-post">
                                    <span class="img" style="background-image: url(assets/images/blog-2.jpg);"></span>
                                    <div class="desc">
                                        <span class="date">Tháng Một 14, 2018</span>
                                        <h3>Làm thế nào để tìm thấy con đường đến chuyến đi ước mơ </h3>
                                        <span class="cat">Đọc thêm</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 animate-box">
                                <a href="blog.html" class="blog-post">
                                    <span class="img" style="background-image: url(assets/images/blog-3.jpg);"></span>
                                    <div class="desc">
                                        <span class="date">Tháng Một 14, 2018</span>
                                        <h3>Tour du lịch đảo bí mật của chúng tôi chỉ dành cho bạn</h3>
                                        <span class="cat">Đọc thêm</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12 animate-box text-right">
                                <a href="#">Xem tất cả tin tức <i class="icon-arrow-right3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="colorlib-testimony" class="colorlib-light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                        <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i
                                class="icon-star-full"></i></span>
                        <h2>Khách của chúng tôi hài lòng nói</h2>
                        <p>Sự hài lòng của khách hàng đối với khách sạn là nền móng,
                         là điều kiện cần trong một chiến lược giữ chân khách hàng và
                         xây dựng hệ thống khách hàng trung thành.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 animate-box">
                        <div class="testimony text-center">
                            <span class="img-user" style="background-image: url(assets/images/person2.jpg);"></span>
                            <span class="user">Brian Doe</span>
                            <small>Satisfied Customer</small>
                            <blockquote>
                                <p></i> Nhân viên rất nhiệt tình,
                                 vị trí rất thuận tiện di chuyển câc điểm tham quan và rất gần phố Tây.</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="testimony text-center">
                            <span class="img-user" style="background-image: url(assets/images/person1.jpg);"></span>
                            <span class="user">Nathalie Miller</span>
                            <small>Satisfied Customer</small>
                            <blockquote>
                                <p></i>Tuyệt vời, nhân viên thân thiện và dễ thương, mọi thứ quá tốt, ăn sáng rất ngon!</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-4 animate-box">
                        <div class="testimony text-center">
                            <span class="img-user" style="background-image: url(assets/images/person3.jpg);"></span>
                            <span class="user">Shara Jones</span>
                            <small>Satisfied Customer</small>
                            <blockquote>
                                <p></i> Phòng rất sạch sẽ, đầy đủ tiện nghi và
                                rất gần những địa điểm tham quan cũng như ăn uống.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
include "layouts/footer.php"
?>
