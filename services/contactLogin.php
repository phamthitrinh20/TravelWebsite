<?php
include 'services/DAO.php';
session_start();
$errorLogin = '';
$nameLogin = $passLogin = '';
onLogOut();
function onLoginUser()
{
    global $errorLogin;
    global $nameLogin;
    global $passLogin;
    if (isset($_POST['btnLogin'])) {
        $nameLogin = $_POST['nameLogin'];
        $passLogin = $_POST['passLogin'];
        if (empty($nameLogin) || empty($passLogin)) {
            $errorLogin = "Có một trường đã bị bỏ trống";
        } else {
            $errorLogin = "";
            checkNameAndPassword($nameLogin,$passLogin);
        }
    }
}
function checkNameAndPassword($nameLogin, $passLogin)
{
    global $conn;
    global $errorLogin;
    $name = mysqli_real_escape_string($conn, $nameLogin);
    $pass = mysqli_real_escape_string($conn, md5($passLogin));
    $sql = "SELECT
            *
        FROM
        `User`
            WHERE
        User.nameUser = '$name' AND User.passUser = '$pass'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    $user = mysqli_fetch_assoc($result);
    if($num == 1) {
        $errorLogin = "";
        $_SESSION['user']=$user['nameUser'];
        $_SESSION['userName']=$user['IdU'];
        header('Location:index.php');
        if($nameLogin=='admin') {
            header('Location:/travel/admin/table.php');
        } else {
            header('Location:index.php');
        }
    } else {
        $errorLogin = 'Sai tên đăng nhập hoặc mật khẩu';
    }
}
function onLogOut() {
    if(isset($_SESSION['user'])) {
        session_unset();
        header('Location:index.php');
    }
}
?>