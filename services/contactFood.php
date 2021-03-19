<?php
include "services/DAO.php";

function splitCategoryFoods($foods)
{
    $categoryFood = array('mainMenu' => [], 'dessertMenu' => [], 'drinkMenu' => []);
    for ($i = 0; $i < count($foods); $i++) {
        switch ($foods[$i]['idCF']) {
            case '1':{
                    $categoryFood['mainMenu'][] = $foods[$i];
                    break;
                }
            case '2':{
                    $categoryFood['dessertMenu'][] = $foods[$i];
                    break;
                }
            case '3':{
                    $categoryFood['drinkMenu'][] = $foods[$i];
                    break;
                }
        }
    }

    return $categoryFood;
}

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
    mysqli_close($conn);

    return splitCategoryFoods($foods);
}

function getDataRandomFoods()
{

    global $conn;
    $randomFood = array();
    unset($conn);

    for ($i = 1; $i <= 3; $i++) {
        $randomFood[$i] = randomFoodOfCategory($i);
    }
    return $randomFood;
}

function randomFoodOfCategory($category)
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
    JOIN `CategoryFood` ON Food.idCF = CategoryFood.idCF
    WHERE
        Food.idCF = {$category}
    ORDER BY
        RAND()
    LIMIT 4";

    $result = mysqli_query($conn, $sql);
    $foods = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    return $foods;
}
