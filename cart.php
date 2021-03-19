<?php
include "services/contactCart.php";
$carts = getCartOfUser();
deleteCart();
inputDiscount();
checkoutCart();
include "layouts/header.php";
?>
	<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(assets/images/img_bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                            <div class="slider-text-inner slider-text-inner2 text-center">
                                <h2>Nơi thanh toán</h2>
                                <h1>Đặt phòng và Đồ ăn</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
	<?php if(isset($_SESSION['userName'])) { ?>
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Thông tin phòng</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng tiền</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php foreach ($carts['rooms'] as $cart): ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

						        <td class="image-prod" width="20%"><div class="img" style="background-image:url(<?php echo $cart['ImageDTC'] ?>);height:150px;width:100%;background-repeat: no-repeat;background-position: center;background-size: cover;"></div></td>

						        <td class="product-name" width="50%">
						        	<h3><?php echo $cart['NameDTC'] ?></h3>
						        	<p><?php echo $cart['InfoDTC'] ?></p>
						        </td>

						        <td class="price">$<?php echo $cart['Price'] ?></td>

						        <td class="quantity">
						        	<?php echo $cart['Quanlity'] ?>
					          	</div>
					          </td>

						        <td class="total">$<?php print_r((int) $cart['Quanlity'] * (int) $cart['Price'])?></td>
								<td class='icon-remove'>
									<form action='cart.php' method = 'POST'> 
										<input type = 'hidden' name='id_to_delete' value ='<?php echo $cart['IdDTC']?>'>
										<button class="btn btn-danger" name='delete'>
          									<span class="glyphicon glyphicon-trash"></span> Xoá
        								</button>
									</form>
								 </td>
							  </tr><!-- END TR-->
							<?php endforeach;?>
						    </tbody>
						  </table>
					  </div>
					  <div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
								<th>Thông tin đồ ăn</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng tiền</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php foreach ($carts['foods'] as $cart): ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

						        <td class="image-prod" width="35%"><div class="img" style="background-image:url(<?php echo $cart['ImageDTC'] ?>);height:200px;width:100%;background-repeat: no-repeat;background-position: center;background-size: cover;"></div></td>

						        <td class="product-name">
						        	<h2><?php echo $cart['NameDTC'] ?></h2>
						        	<p><?php echo $cart['InfoDTC'] ?></p>
						        </td>

						        <td class="price">$<?php echo $cart['Price'] ?></td>

						        <td class="quantity">
						        	<?php echo $cart['Quanlity'] ?>
					          	</div>
					          </td>

						        <td class="total">$<?php print_r((int) $cart['Quanlity'] * (int) $cart['Price'])?></td>
								<td class='icon-remove'>
									<form action='cart.php' method = 'POST'> 
										<input type = 'hidden' name='id_to_delete' value ='<?php echo $cart['IdDTC']?>'>
										<button class="btn btn-danger" name='delete'>
          									<span class="glyphicon glyphicon-trash"></span> Xoá
        								</button>
									</form>
								 </td>
							  </tr><!-- END TR-->
							<?php endforeach;?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Mã giảm giá</h3>
    					<p>Nhập mã giảm giá của bạn để nhận ưu đãi</p>
  				<form method="POST" class="info" action='cart.php'>
	              <div class="form-group">
	              	<label for="">Mã giảm giá</label>
	                <input type="text" class="form-control text-left px-3" placeholder="" name='code-discount'>
	              </div>
    				</div>
    				<button class="btn btn-primary py-3 px-4" name='btn-discount'>Áp dụng mã</button>
					</form>
				</div>
    			<form method='POST' class="col-lg-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng tiền thanh toán</h3>
    					<p class="d-flex">
    						<span>Số tiền:</span>
    						<span><?php echo totalMoneyCart($carts)?>$</span>
    					</p>
    					<p class="d-flex">
    						<span>Giảm giá:</span>
    						<span><?php echo $disscount;?>$</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Thanh toán:</span>
    						<span><?php echo totalMoneyCart($carts)-$disscount?>$</span>
    					</p>
    				</div>
					<input type="hidden" class="form-control text-left px-3" value = '<?php echo totalMoneyCart($carts)-$disscount ?>' placeholder="" name='checkout'>
    				<button class="btn btn-primary py-3 px-4" name='btn-checkout'>Thanh toán ngay</button>
    			</form>
    		</div>
			</div>
		</section>
	<?php } else {?>
		<div class="container">
			<a href='login.php' class="noLogin" style = 'display: block;text-align: center;'>
				<img src="assets/images/noLogin.png" alt="" srcset="" style = 'display:block;margin: 50px auto;'>
				<h3 >Hãy đăng nhập để đặt phòng và mua đồ ăn</h3>
			</a>
		</div>
	<?php }?>
        <?php
			include "layouts/footer.php"
		?>
