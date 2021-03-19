<?php
$errorRegister = '';
$nameRegis = $passRegis = $passRegisRepeat = '';
include "services/DAO.php";

function onRegisterUser()
{
    global $nameRegis;
    global $passRegis;
    global $passRegisRepeat;
    global $errorRegister;
    if (isset($_POST['submit-register'])) {
        $nameRegis = $_POST['nameRegis'];
        $passRegis = $_POST['passRegis'];
        $passRegisRepeat = $_POST['passRegisRepeat'];
        if (empty($nameRegis) || empty($passRegis) || empty($passRegisRepeat)) {
            $errorRegister = "Có một trường đã bị bỏ trống";
        } else {
            if ($passRegis !== $passRegisRepeat) {
                $errorRegister = "Mật khẩu nhập lại không đúng";
            } else {
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $passRegis)) {
                    $errorRegister = "Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số";
                } elseif (!isset($_POST['checkRegister'])) {
                    $errorRegister = "Vui lòng đồng ý điều khoản";
                } else {
                    $errorRegister = "";
                    addUser($nameRegis, $passRegis);
                }
            }
        }
    }
}
function addUser($nameRegis, $passRegis)
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $nameRegis);
    $pass = mysqli_real_escape_string($conn, md5($passRegis));

    $sql = "INSERT INTO `User`(`nameUser`, `passUser`) VALUES ('$name','$pass')";
    if (mysqli_query($conn, $sql)) {
        header('Location:index.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}