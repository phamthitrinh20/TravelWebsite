<?php
session_start();
include "layouts/header.php";
include "services/contactRoom.php";

$dataRooms;
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
                                <h2>Chất lượng hàng đầu</h2>
                                <h1>Phòng &amp; Căn hộ</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="colorlib-rooms" class="colorlib-light-grey">
    <div class="container">
        <div class="row">
        <?php
foreach ($dataRooms as $dataRoom) {
    ?>
            <div class="col-md-4 room-wrap animate-box">
                <a href=<?php echo $dataRoom['imgRoom']; ?> class="room image-popup-link"
                    style=<?php echo '"background-image: url(' . $dataRoom['imgRoom'] . ');"'; ?>
                    ></a>
                <div class="desc text-center">
                    <span class="rate-star">
                        <?php
for ($i = 0; $i < 5; $i++) {
        if ($i < $dataRoom['rateRoom']) {
            echo '<i class="icon-star-full full"></i>';
        } else {
            echo '<i class="icon-star-full"></i>';
        }
    }
    ?>
                    </span>
                    <h3><a href="rooms-suites.php"><?php echo $dataRoom['nameRoom']; ?></a></h3>
                    <p class="price">
                        <span class="currency">$</span>
                        <span class="price-room"><?php echo $dataRoom['priceRoom']; ?></span>
                        <span class="per">/ một Đêm</span>
                    </p>
                    <ul>
                        <?php foreach ($dataRoom['infoRoom'] as $info) {?>
                            <li><i class="icon-check"></i>
                                <?php echo $info; ?>
                            </li>
                        <?php }?>
                    </ul>
                    <p><a class="btn btn-primary" href='services/addRoom.php?idR=<?php echo $dataRoom['idRoom']?>'>Đặt ngay!</a></p>
                </div>
            </div>

        <?php }?>
        </div>
    </div>
</div>
<?php
include "layouts/footer.php"
?>
