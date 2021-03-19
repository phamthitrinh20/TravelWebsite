<?php
session_start();
include '../services/DAO.php';
onAddRoom();
$roomCart = '';
function onAddRoom()
{
    if (isset($_SESSION['user'])) {
        if (isset($_GET['idR'])) {
            $idU = $_SESSION['userName'];
            $idR = $_GET['idR'];
            $room = getRoomOfId($idR);
            addRoominCart($idU, $room);
        }
    } else {
        header("Location:/travel/login.php");
    }
}
function checkRoomInCart($idR, $idU)
{
    global $conn;
    global $roomCart;
    $idR = mysqli_real_escape_string($conn, $idR);
    $idU = mysqli_real_escape_string($conn, $idU);
    $sql = "SELECT
        *
    FROM
        `DetailCart`
    WHERE
        DetailCart.IdDTC = '$idR' AND DetailCart.IdC = $idU ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $roomCart = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return true;
    } else {
        return false;
    }
}
function addRoominCart($idU, $room)
{
    global $conn;
    global $roomCart;
    $idUser = mysqli_real_escape_string($conn, $idU);
    $idR = mysqli_real_escape_string($conn, $room['idRoom']);
    $nameRoom = mysqli_real_escape_string($conn, $room['nameRoom']);
    $imgRoom = mysqli_real_escape_string($conn, $room['imgRoom']);
    $priceRoom = mysqli_real_escape_string($conn, $room['priceRoom']);
    $infoRoom = mysqli_real_escape_string($conn, $room['infoRoom']);

    if (checkRoomInCart($room['idRoom'], $idU)) {
        $roomCart['Quanlity'] = (int) $roomCart['Quanlity'] + 1;
        $quanlity = mysqli_real_escape_string($conn, $roomCart['Quanlity']);
        $sql = "UPDATE
            `DetailCart`
        SET
            `Quanlity` = $quanlity
        WHERE
            DetailCart.IdDTC = '$idR' AND DetailCart.IdC = $idUser ";
        if (mysqli_query($conn, $sql)) {
            header('Location:/travel/index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO `DetailCart`(
                `IdC`,
                `IdDTC`,
                `Quanlity`,
                `Price`,
                `InfoDTC`,
                `NameDTC`,
                `ImageDTC`
            )
            VALUES($idUser,'$idR',1,$priceRoom,'$infoRoom','$nameRoom','$imgRoom')";
        if (mysqli_query($conn, $sql)) {
            header('Location:/travel/cart.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
function getRoomOfId($idR)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $idR);
    $sql = "SELECT DISTINCT
        Room.idRoom,
        CategoryRoom.idCR,
        Room.nameRoom,
        Room.imgRoom,
        Room.priceRoom,
        Room.countPerson,
        CategoryRoom.nameCR,
        DetailRoon.infoRoom,
        DetailRoon.rateRoom,
        DetailRoon.dateStart,
        DetailRoon.dateEnd
    FROM
        `Room`
    JOIN `DetailRoon` ON Room.idRoom = DetailRoon.idRoom
    JOIN CategoryRoom ON Room.idCR = CategoryRoom.idCR
    WHERE  Room.idRoom = $id
    ";

    $result = mysqli_query($conn, $sql);
    $room = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    $room['idRoom'] = 'R' . $room['idRoom'];
    return $room;
}
