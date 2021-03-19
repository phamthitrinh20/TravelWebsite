<?php
ob_start();
include "services/DAO.php";
$action = $nameRoom = $priceRoom = $countPerson = $categoryRoom = $infoRoom = $dateStart = $dateEnd = '';
$nameFood = $priceFood = $ingredientFood = $idCF = '';
$activeRoom = $activeFood = true;
getDataOfID();
deleteEvent();
function deleteEvent()
{
    if (isset($_POST['btn-delete'])) {
        $id = $_POST['id'];
        if (strpos($id, 'R') !== false) {
            $arr = explode('-', $id);
            deleteRoom($arr[1]);
        } else {
            $arr = explode('-', $id);
            deleteFood($arr[1]);
        }
    }
}
function deleteRoom($idR)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $idR);
    $sql = "DELETE
        FROM
            `Room`
        WHERE
            Room.idRoom = $id";
    if (mysqli_query($conn, $sql)) {
        header('Location:/travel/admin/table.php');
    }
}
function deleteFood($idF)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $idF);
    $sql = "DELETE
        FROM
            `Food`
        WHERE
            Food.idFood = $id";
    if (mysqli_query($conn, $sql)) {
        header('Location:/travel/admin/table.php');
    }
}
function getDataOfID()
{
    global $nameRoom;
    global $priceRoom;
    global $countPerson;
    global $categoryRoom;
    global $infoRoom;
    global $dateStart;
    global $dateEnd;
    global $action;
    global $nameFood;
    global $priceFood;
    global $ingredientFood;
    global $idCF;
    global $activeRoom;
    global $activeFood;
    if (isset($_POST['btn-edit'])) {
        $id = $_POST['id'];
        if (strpos($id, 'R') !== false) {
            $arr = explode('-', $id);
            $data = dataRoom($arr[1]);
            $action = 'editRoom-' . $data['idRoom'];
            $nameRoom = $data['nameRoom'];
            $priceRoom = $data['priceRoom'];
            $countPerson = $data['countPerson'];
            $infoRoom = $data['infoRoom'];
            $dateStart = $data['dateStart'];
            $dateEnd = $data['dateEnd'];
            $categoryRoom = $data['idCR'];
            $activeRoom = false;
        }
        if (strpos($id, 'F') !== false) {
            $arr = explode('-', $id);
            $data = dataFood($arr[1]);
            $action = 'editFood-' . $data['idFood'];
            $nameFood = $data['nameFood'];
            $priceFood = $data['priceFood'];
            $ingredientFood = $data['ingredientFood'];
            $idCF = $data['idCF'];
            $activeFood = false;
        }
    } else {
        resetFormRoom();
        resetFormFood();
    }
}
function resetFormRoom()
{
    global $nameRoom;
    global $priceRoom;
    global $countPerson;
    global $categoryRoom;
    global $infoRoom;
    global $dateStart;
    global $dateEnd;
    global $action;
    $nameRoom = '';
    $priceRoom = '';
    $countPerson = '';
    $infoRoom = '';
    $dateStart = '';
    $dateEnd = '';
    $categoryRoom = '';
    $action = 'Add';
}
function resetFormFood()
{
    global $nameFood;
    global $priceFood;
    global $ingredientFood;
    global $idCF;
    global $action;
    $nameFood = '';
    $priceFood = '';
    $ingredientFood = '';
    $idCF = '1';
    $action = 'Add';
}
function dataFood($id)
{
    global $conn;
    $idFood = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT
            Food.idFood,
            Food.nameFood,
            Food.imgFood,
            Food.priceFood,
            Food.ingredientFood,
            Food.idCF,
            CategoryFood.nameCF
        FROM
            `Food`
        JOIN `CategoryFood` ON Food.idCF = CategoryFood.idCF
        WHERE Food.idFood=$idFood
        ";
    $result = mysqli_query($conn, $sql);
    $food = mysqli_fetch_assoc($result);
    return $food;
}
function dataRoom($id)
{
    global $conn;
    $idR = mysqli_real_escape_string($conn, $id);
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
    WHERE Room.idRoom = $id
    ";
    $result = mysqli_query($conn, $sql);
    $room = mysqli_fetch_assoc($result);
    return $room;
}
ob_end_flush();
?>