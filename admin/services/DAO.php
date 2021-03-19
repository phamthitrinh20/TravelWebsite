<?php
$conn = mysqli_connect('localhost', 'root', '', 'travel');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
?>