<?php
include "services/DAO.php";

function getDataFoods()
{

    global $conn;
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
    JOIN `CategoryFood` ON Food.idCF = CategoryFood.idCF";
    $result = mysqli_query($conn, $sql);
    $foods = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $foods;
}
?>