<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 6/9/2019
 * Time: 7:52 PM
 */

    define("DB_SERVER","localhost");
    define("DB_USER","root");
    define("DB_PASSWORD","");
    define("DB_NAME","app_crud");

    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($connection, 'UTF8');

if ($connection->connect_error) {
    /**
     * Ngắt chương trình khi mà kết nối thất bại
     */
    die("Không thể kết nối đến cơ sở dữ liệu");
}
?>