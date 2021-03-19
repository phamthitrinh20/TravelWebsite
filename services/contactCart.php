<?php 
    session_start();
    include "services/DAO.php";
    $disscount = 0;
    function getCartOfUser() {
        if(isset($_SESSION['userName'])) {
            $idU = $_SESSION['userName'];
            global $conn;
            $id = mysqli_real_escape_string($conn,$idU);
            $sql = "SELECT * FROM `DetailCart` WHERE DetailCart.IdC = $id";
            $result = mysqli_query($conn, $sql);
            $carts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
            mysqli_free_result($result);
            return splitCart($carts);
        }
    }
    function splitCart($carts) {
        $result = array('rooms'=>[],'foods'=>[]);

        foreach($carts as $cart) {
            if(strpos($cart['IdDTC'], 'R') !== false) {
                $result['rooms'][] = $cart;
            } else {
                $result['foods'][] = $cart;
            }
        }
        return $result;
    }
    function deleteCart() {
        if(isset($_POST['delete'])) {
            global $conn;
            $idDelete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
            $idU = $_SESSION['userName'];
            $id = mysqli_real_escape_string($conn,$idU);
            $sql = "DELETE
            FROM
                `DetailCart`
            WHERE
                DetailCart.IdDTC = '$idDelete' AND DetailCart.IdC = $id";
            if(mysqli_query($conn,$sql)) {
                header('Location:cart.php');
            } else {
                echo 'query error:' . mysqli_error();
            }
        }
    }
    function totalMoneyCart($carts) {
        $total = 0;
        foreach($carts as $cart) {
            foreach($cart as $item) {
                $total+=(int)$item['Price']*(int)$item['Quanlity'];
            }
        }
        return $total;
    }
    function inputDiscount() {
        global $disscount;
        if(isset($_POST['btn-discount'])) {
            global $conn;
            $code = $_POST['code-discount'];
            $codeDC = mysqli_real_escape_string($conn,$code);
            $sql = "SELECT
            *
        FROM
            `disscount`
        WHERE
            disscount.codeDC = '$codeDC' ";
            $result = mysqli_query($conn,$sql);
            if($result) {
                $discount = mysqli_fetch_assoc($result);
                $disscount = (int)$discount['priceDC'];
            }
        }
    }
    function checkoutCart() {
        if(isset($_POST['btn-checkout'])) {
            global $conn;
            $total = (int)$_POST['checkout'];
            if(isset($_SESSION['userName'])) {
                addBillOfUser($_SESSION['userName'],$total);
            }
        }
    }
    function addBillOfUser($idU,$total) {
        global $conn;
        $id = mysqli_real_escape_string($conn,$idU);
        $totalBill =mysqli_real_escape_string($conn,$total);
        $date = mysqli_real_escape_string($conn,date("Y-m-d"));
        $sql = "
        INSERT INTO `Bill`(
            `dateBill`,
            `idUser`,
            `TotalBill`
        )
        VALUES('$date',$id,$totalBill)
        ";
        if(mysqli_query($conn,$sql)) {
            addDetailBill($id);
        } else {
            echo 'query error:' . mysqli_error();
        }
    }
    function addDetailBill($id) {
        global $conn;
        $sql = "
        INSERT INTO `DetailBill`(`idBill`, `IdDTC`, `Quanlity`)
        SELECT
        Bill.idBill,
        DetailCart.IdDTC,
        DetailCart.Quanlity
        FROM
        DetailCart
         JOIN Bill ON Bill.idUser = DetailCart.IdC
        WHERE
        Bill.idUser = $id";
        if(mysqli_query($conn,$sql)) {
            clearDetailCart($id);
        } else {
            echo 'query error:' . mysqli_error();
        }
    }
    function clearDetailCart($id) {
        global $conn;
        $sql = "DELETE FROM `DetailCart` WHERE DetailCart.IdC = $id";
        if(mysqli_query($conn,$sql)) {
           header('Location:index.php');
        } else {
            echo 'query error:' . mysqli_error();
        }
    }
?>