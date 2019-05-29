<?php
// isset check xem biến có tồn tại hay không
if (isset($_POST)&& isset($_POST["email"]) && isset($_POST["password"])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Xin chào ".$email." mật khẩu của bạn là : $password";
}
?>