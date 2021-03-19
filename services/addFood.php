<?php
session_start();
include '../services/DAO.php';
onAddFood();
$foodCart = '';
function onAddFood()
{
    if (isset($_SESSION['user'])) {
        if (isset($_GET['idF'])) {
            $idU = $_SESSION['userName'];
            $idF = $_GET['idF'];
            $food = getFoodOfId($idF);
            addFoodinCart($idU, $food);
        }
    } else {
        header("Location:/travel/login.php");
    }
}
function checkFoodInCart($idF, $idU)
{
    global $conn;
    global $foodCart;
    $idF = mysqli_real_escape_string($conn, $idF);
    $idU = mysqli_real_escape_string($conn, $idU);
    $sql = "SELECT
        *
    FROM
        `DetailCart`
    WHERE
        DetailCart.IdDTC = '$idF' AND DetailCart.IdC = $idU ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $foodCart = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return true;
    } else {
        return false;
    }
}
function addFoodinCart($idU, $food)
{
    global $conn;
    global $foodCart;
    $idUser = mysqli_real_escape_string($conn, $idU);
    $idF = mysqli_real_escape_string($conn, $food['idFood']);
    $nameFood = mysqli_real_escape_string($conn, $food['nameFood']);
    $imgFood = mysqli_real_escape_string($conn, $food['imgFood']);
    $priceFood = mysqli_real_escape_string($conn, $food['priceFood']);
    $infoFood = mysqli_real_escape_string($conn, $food['ingredientFood']);

    if (checkFoodInCart($food['idFood'], $idU)) {
        $foodCart['Quanlity'] = (int) $foodCart['Quanlity'] + 1;
        $quanlity = mysqli_real_escape_string($conn, $foodCart['Quanlity']);
        $sql = "UPDATE
            `DetailCart`
        SET
            `Quanlity` = $quanlity
        WHERE
            DetailCart.IdDTC = '$idF' AND DetailCart.IdC = $idUser ";
        if (mysqli_query($conn, $sql)) {
            header('Location:/travel/cart.php');
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
            VALUES($idUser,'$idF',1,$priceFood,'$infoFood','$nameFood','$imgFood')";
        if (mysqli_query($conn, $sql)) {
            header('Location:/travel/index.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
function getFoodOfId($idF)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $idF);
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
    WHERE  Food.idFood = $id
    ";

    $result = mysqli_query($conn, $sql);
    $food = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    $food['idFood'] = 'F' . $food['idFood'];
    return $food;
}
