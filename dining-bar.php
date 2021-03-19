<?php
session_start();
include "layouts/header.php";
include "services/contactFood.php";

$foods = getDataFoods();

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
                                <h2>Thức ăn như thế nào</h2>
                                <h1>Thức ăn &amp;Quầy Bar</h1>
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
        <?php foreach ($foods as $food) {?>
            <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
                <h2><?php echo $food[0]['nameCF'] ?></h2>
            </div>
        </div>
        <div class="row">
           <?php foreach ($food as $item) {?>
            <div class="col-md-4 room-wrap animate-box">
                <a href=<?php echo $item['imgFood'] ?> class="room image-popup-link"
                    style=<?php echo '"background-image: url(' . $item['imgFood'] . ');"'; ?>></a>
                <div class="desc text-center">
                    <h3><a href="rooms-suites.html"><?php echo $item['nameFood'] ?></a></h3>
                    <p class="price">
                        <span class="currency currency-menu">$</span>
                        <span class="price-room price-menu"><?php echo $item['priceFood'] ?></span>
                    </p>
                    <p><a class="btn btn-primary btn-book" href='services/addFood.php?idF=<?php echo $item['idFood'] ?>'>Đặt món</a></p>
                </div>
            </div>
           <?php }?>
        </div>
        <?php }?>
    </div>
</div>
<?php
include "layouts/footer.php"
?>
