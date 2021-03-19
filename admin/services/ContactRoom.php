<?php
include "services/DAO.php";
if(isset($_SESSION['user'])) {
    if($_SESSION['user']!='admin') {
        header("Location:/travel/index.php");
    }
}
function getAllDataRooms()
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
    JOIN CategoryRoom ON Room.idCR = CategoryRoom.idCR";
    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    for ($i = 0; $i < count($rooms); $i++) {
        $rooms[$i]['rateRoom'] = (int) $rooms[$i]['rateRoom'];
        $rooms[$i]['infoRoom'] = explode(',', $rooms[$i]['infoRoom']);
    }

    return $rooms;
}
?>