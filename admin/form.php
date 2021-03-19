<?php
include "./services/ContactForm.php";
include 'templates/header.php';
if(isset($_SESSION['user'])) {
    if($_SESSION['user']!='admin') {
        header("Location:/travel/index.php");
    }
}
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                    <strong>Chỉnh sửa và Thêm</strong>
                                    Phòng</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Thông tin phòng</h3>
                                        </div>
                                        <hr>
                                        <form action="services/actionForm.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                            <input type='hidden' value='<?php echo $action; ?>' name='actionForm'>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên Phòng</label>
                                                <input id="cc-pament" type="text" class="form-control" aria-required="true" aria-invalid="false" name = 'nameRoom' value="<?php echo $nameRoom; ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Giá phòng</label>
                                                <input id="cc-name"  type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" name='priceRoom' value="<?php echo $priceRoom; ?>">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Số người</label>
                                                <input id="cc-pament" name='countPerson' type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $countPerson; ?>">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Loại Phòng</label>
                                                <select id="category" name='category' >
                                                     <option value="1" <?php if ($categoryRoom == '1') {echo 'selected="selected"';} else {echo '';}?>>Phòng đơn</option>
                                                        <option value="2"  <?php if ($categoryRoom == '2') {echo 'selected="selected"';} else {echo '';}?>>Phòng đôi</option>
                                                        <option value="3"  <?php if ($categoryRoom == '3') {echo 'selected="selected"';} else {echo '';}?>>Phòng nhóm</option>
                                                        <option value="4"  <?php if ($categoryRoom == '4') {echo 'selected="selected"';} else {echo '';}?>>Phòng gia đình</option>
                                                    </select>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Thông tin phòng</label>
                                                <input id="cc-pament" name='infoRoom' type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $infoRoom; ?>">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ngày cho thuê</label>
                                                <input id="cc-pament" name ='dateStart' type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $dateStart; ?>">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ngày kết thúc</label>
                                                <input id="cc-pament" name='dateEnd' type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $dateEnd; ?>">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <?php if ($activeRoom) {?>
                                                <div class="form-group">
                                                    <label for="street" class=" form-control-label">Hình Phòng</label>
                                                    <input type="file" name='image' class="form-control" placeholder="Chọn hình ảnh ">
                                                </div>
                                            <?php }?>
                                            <div>
                                                <button name='btn-submit' id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Đồng ý</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Chỉnh sửa và Thêm</strong>
                                        <small>Đồ ăn</small>
                                    </div>
                                    <form class="card-body card-block" action="services/actionForm.php" method='POST' enctype="multipart/form-data">
                                    <input type='hidden' value='<?php echo $action; ?>' name='actionForm'>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Tên đồ ăn</label>
                                            <input name='nameFood' type="text" id="company" placeholder="Nhập tên đồ ăn" class="form-control" value='<?php echo $nameFood ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Giá đồ ăn</label>
                                            <input name='priceFood' type="text" id="vat"  placeholder="Nhập giá đồ ăn" class="form-control" value='<?php echo $priceFood ?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Thành phần</label>
                                            <input type="text" name='ingredientFood' placeholder="Nhập thành phần" class="form-control" value='<?php echo $ingredientFood ?>'>
                                        </div>
                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Loại Đồ ăn</label>
                                                <select id="category" name='category' >
                                                     <option value="1" <?php if ($idCF == '1') {echo 'selected="selected"';} else {echo '';}?>>Món chính</option>
                                                        <option value="2"  <?php if ($idCF == '2') {echo 'selected="selected"';} else {echo '';}?>>Tráng miệng</option>
                                                        <option value="3"  <?php if ($idCF == '3') {echo 'selected="selected"';} else {echo '';}?>>Nước uống</option>
                                                    </select>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                        </div>
                                        <?php if ($activeFood) {?>
                                                <div class="form-group">
                                                    <label for="street" class=" form-control-label">Hình đồ ăn</label>
                                                    <input type="file" name='images' class="form-control" placeholder="Chọn hình ảnh ">
                                                </div>
                                            <?php }?>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name='btn-ok'>
                                            <i class="fa fa-dot-circle-o"></i> Đồng ý
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Huỷ bỏ
                                        </button>
                                    </div>
                                </form>
                            </div>

                        <?php include 'templates/bottom.php';?>