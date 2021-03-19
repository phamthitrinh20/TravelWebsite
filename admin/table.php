<?php
include "./services/ContactRoom.php";
include "./services/ContactFood.php";
$dataRooms = getAllDataRooms();
$dataFoods = getDataFoods();
include 'templates/header.php';
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Chức năng</th>
                                                <th>Mã phòng</th>
                                                <th>Tên phòng</th>
                                                <th>Giá phòng</th>
                                                <th>Số người</th>
                                                <th>Loại phòng</th>
                                                <th>Thông tin phòng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataRooms as $room): ?>
                                            <tr>
                                                <td>
                                                    <form class="table-data-feature" method='POST' action='form.php'>
                                                        <input type='hidden' value='<?php echo 'R-' . $room['idRoom'] ?>' name='id'>
                                                        <button name='btn-edit' class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button name='btn-delete' class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td><?php echo $room['idRoom'] ?></td>
                                                <td><?php echo $room['nameRoom'] ?></td>
                                                <td>$<?php echo $room['priceRoom'] ?></td>
                                                <td ><?php echo $room['countPerson'] ?></td>
                                                <td ><?php echo $room['nameCR'] ?></td>
                                                <td >
                                                    <?php foreach ($room['infoRoom'] as $info) {
    echo $info . '-';
}?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Chức năng</th>
                                                <th>Mã đồ ăn</th>
                                                <th>Tên đồ ăn</th>
                                                <th>Giá đồ ăn</th>
                                                <th>Loại đồ ăn</th>
                                                <th>Thông tin đồ ăn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataFoods as $food): ?>
                                            <tr>
                                            <td>
                                                    <form class="table-data-feature" method='POST' action='form.php'>
                                                        <input type='hidden' value='<?php echo 'F-' . $food['idFood'] ?>' name='id'>
                                                        <button name='btn-edit' class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button name='btn-delete' class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td><?php echo $food['idFood'] ?></td>
                                                <td><?php echo $food['nameFood'] ?></td>
                                                <td>$<?php echo $food['priceFood'] ?></td>
                                                <td ><?php echo $food['nameCF'] ?></td>
                                                <td ><?php echo $food['ingredientFood'] ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Dữ liệu bảng</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <a href='/travel/admin/form.php' class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Thêm dữ liệu</a>
                                    </div>
                                </div>

                        </div>
<?php include 'templates/bottom.php';?>