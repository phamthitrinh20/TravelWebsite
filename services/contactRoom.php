<?php
include "services/DAO.php";
if (isset($_GET['idCR'])) {
    getRoomID();
} else {
    getAllDataRooms();
}
findRoom();
function findRoom()
{
    if (isset($_POST['submitFind'])) {
        global $conn;
        global $dataRooms;
        $dateStart = mysqli_real_escape_string($conn, formatDate($_POST['dateStart']));
        $dateEnd = mysqli_real_escape_string($conn, formatDate($_POST['dateEnd']));
        $countPerson = mysqli_real_escape_string($conn, (int) $_POST['people'] + (int) $_POST['child']);
        $sql = "SELECT
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
    WHERE
        DetailRoon.dateStart < '$dateStart' && DetailRoon.dateEnd > '$dateEnd' && Room.countPerson >= $countPerson";
        $result = mysqli_query($conn, $sql);
        $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        for ($i = 0; $i < count($rooms); $i++) {
            $rooms[$i]['rateRoom'] = (int) $rooms[$i]['rateRoom'];
            $rooms[$i]['infoRoom'] = explode(',', $rooms[$i]['infoRoom']);
        }
        $dataRooms = $rooms;
    }
}
function formatDate($date)
{
    $arr = explode("/", $date);
    return $arr[2] . '-' . $arr[0] . '-' . $arr[1];
}
function getRoomID()
{
    global $dataRooms;
    global $conn;
    $idCR = mysqli_real_escape_string($conn, $_GET['idCR']);
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
    WHERE Room.idCR = $idCR
    ";
    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    for ($i = 0; $i < count($rooms); $i++) {
        $rooms[$i]['rateRoom'] = (int) $rooms[$i]['rateRoom'];
        $rooms[$i]['infoRoom'] = explode(',', $rooms[$i]['infoRoom']);
    }
    $dataRooms = $rooms;
}
function getAllDataRooms()
{
    global $dataRooms;
    global $conn;
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
    JOIN CategoryRoom ON Room.idCR = CategoryRoom.idCR";
    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    for ($i = 0; $i < count($rooms); $i++) {
        $rooms[$i]['rateRoom'] = (int) $rooms[$i]['rateRoom'];
        $rooms[$i]['infoRoom'] = explode(',', $rooms[$i]['infoRoom']);
    }
    $dataRooms = $rooms;
}

function getDataRandomRooms()
{
    global $conn;
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
    ORDER BY RAND()
	LIMIT 6";
    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    for ($i = 0; $i < count($rooms); $i++) {
        $rooms[$i]['rateRoom'] = (int) $rooms[$i]['rateRoom'];
        $rooms[$i]['infoRoom'] = explode(',', $rooms[$i]['infoRoom']);
        // vd : "a,b,c" sau khi explode
        // [a,b,c] -> [0] -> a ,[1] -> b,[2] ->c
    }

    return $rooms;
}
