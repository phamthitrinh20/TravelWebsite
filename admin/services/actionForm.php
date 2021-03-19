<?php
include "../services/DAO.php";
actionForm();
function actionForm()
{
    if (isset($_POST['btn-submit'])) {
        if (strpos($_POST['actionForm'], 'editRoom') !== false) {
            if (updateRoom() && updateDetailRoom()) {
                header('Location:/travel/admin/table.php');
            }
        } else {
            if (addRoom()) {
                header('Location:/travel/admin/table.php');
            }
        }
    }
    if (isset($_POST['btn-ok'])) {
        if (strpos($_POST['actionForm'], 'editFood') !== false) {
            if (updateFood()) {
                header('Location:/travel/admin/table.php');
            }
        } else {
            if (addFood()) {
                header('Location:/travel/admin/table.php');
            }
        }
    }
}
function addFood()
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST['nameFood']);
    $image = mysqli_real_escape_string($conn, uploadImage('images'));
    $price = mysqli_real_escape_string($conn, $_POST['priceFood']);
    $ingredient = mysqli_real_escape_string($conn, $_POST['ingredientFood']);
    $idCF = mysqli_real_escape_string($conn, $_POST['category']);
    $sql = "INSERT INTO `Food`(
                `nameFood`,
                `imgFood`,
                `priceFood`,
                `ingredientFood`,
                `idCF`
            )
            VALUES('$name','$image',$price,'$ingredient', $idCF)";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function addRoom()
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST['nameRoom']);
    $image = mysqli_real_escape_string($conn, uploadImage('image'));
    $price = mysqli_real_escape_string($conn, $_POST['priceRoom']);
    $count = mysqli_real_escape_string($conn, $_POST['countPerson']);
    $idCR = mysqli_real_escape_string($conn, $_POST['category']);
    $sql = "INSERT INTO `Room`(
                `nameRoom`,
                `imgRoom`,
                `priceRoom`,
                `countPerson`,
                `idCR`
            )
            VALUES('$name', '$image', $price, $count, $idCR)";
    if (mysqli_query($conn, $sql)) {
        return addDetailRoom();
    } else {
        return false;
    }
}
function addDetailRoom()
{
    global $conn;
    $info = mysqli_real_escape_string($conn, $_POST['infoRoom']);
    $dateStart = mysqli_real_escape_string($conn, $_POST['dateStart']);
    $dateEnd = mysqli_real_escape_string($conn, $_POST['dateEnd']);
    $rate = mysqli_real_escape_string($conn, 5);
    $sql = "INSERT INTO `DetailRoon`(
                `infoRoom`,
                `rateRoom`,
                `dateStart`,
                `dateEnd`
            )
            VALUES('$info',$rate,'$dateStart','$dateStart')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function uploadImage($name)
{
    define('SITE_ROOT', realpath(dirname(__FILE__)));
    $target = SITE_ROOT . "/imageUpload/" . basename($_FILES[$name]['name']);
    if (move_uploaded_file($_FILES[$name]['tmp_name'], $target)) {
        echo 'thanh cong';
    } else {
        echo 'that bai';
    }
    return '/travel/admin/services/imageUpload/' . basename($_FILES[$name]['name']);
}
function updateFood()
{
    global $conn;
    $arr = explode('-', $_POST['actionForm']);
    $id = mysqli_real_escape_string($conn, $arr[1]);
    $name = mysqli_real_escape_string($conn, $_POST['nameFood']);
    $price = mysqli_real_escape_string($conn, $_POST['priceFood']);
    $ingredient = mysqli_real_escape_string($conn, $_POST['ingredientFood']);
    $idCF = mysqli_real_escape_string($conn, $_POST['category']);
    $sql = "UPDATE
                `Food`
            SET
                `nameFood` = '$name',
                `priceFood` = $price,
                `ingredientFood` = '$ingredient',
                `idCF` = $idCF
            WHERE
                Food.idFood = $id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function updateRoom()
{
    global $conn;
    $arr = explode('-', $_POST['actionForm']);
    $id = mysqli_real_escape_string($conn, $arr[1]);
    $name = mysqli_real_escape_string($conn, $_POST['nameRoom']);
    $price = mysqli_real_escape_string($conn, $_POST['priceRoom']);
    $count = mysqli_real_escape_string($conn, $_POST['countPerson']);
    $idCR = mysqli_real_escape_string($conn, $_POST['category']);
    $sql = "UPDATE
                `Room`
            SET
                `nameRoom` = '$name',
                `priceRoom` = $price,
                `countPerson` = $count,
                `idCR` = $idCR
            WHERE
                Room.idRoom = '$id' ";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function updateDetailRoom()
{
    global $conn;
    $arr = explode('-', $_POST['actionForm']);
    $id = mysqli_real_escape_string($conn, $arr[1]);
    $info = mysqli_real_escape_string($conn, $_POST['infoRoom']);
    $dateStart = mysqli_real_escape_string($conn, $_POST['dateStart']);
    $dateEnd = mysqli_real_escape_string($conn, $_POST['dateEnd']);
    $sql = "UPDATE
                `DetailRoon`
            SET
                `infoRoom` = '$info',
                `dateStart` = '$dateStart',
                `dateEnd` = '$dateEnd'
            WHERE
                DetailRoon.idRoom = $id ";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
