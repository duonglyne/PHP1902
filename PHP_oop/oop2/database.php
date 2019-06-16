<?php
/**
 * Created by PhpStorm.
 * Yêu cầu : Xây dựng class tên là Database
 * có 1 thuộc tính là connection để lưu trữ kết nội đến CSDL
 * và có 4 thuộc tính : ip database ( localhost ) , user db , pass db , tên CSDL
 * Class này có 1 method khởi tạo là __construct() làm nhiệm vụ kết nội đến CSDL
 * constructor này sẽ có 4 tham số dùng để kết nối đến CSDL truyền vào
 * và trong method này sẽ khởi tạo kết nối CSDL và gán kết nối cho thuộc tính connection
 *
 */

class Database {
    // khai báo các thuộc tính của class
    public $connection;
    public $ip_database;
    public $user_database;
    public $pass_database;
    public $database_name;

    // phương thức khởi tạo của class

    public function __construct($ip_db, $user_db, $pass_db, $db_name){
        $this ->ip_database = $ip_db;
        $this ->user_database = $user_db;
        $this ->pass_database = $pass_db;
        $this ->database_name = $db_name;

        // kết nối đến cơ sở dữ liệu

        $this -> connection = new mysqli($this -> ip_database, $this -> user_database, $this -> pass_database, $this -> database_name);

    }

    public function disconnect() {
        mysqli_close($this->connection);
    }

}
?>