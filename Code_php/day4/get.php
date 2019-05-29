<?php
// isset check xem biến có tồn tại hay không
if (isset($_GET)&& isset($_GET["email"]) && isset($_GET["password"])) {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    $email = $_GET['email'];
    $password = $_GET['password'];
    echo "Xin chào ".$email." mật khẩu của bạn là : $password";
}
?>