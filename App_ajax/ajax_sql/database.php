<?php
class Database {
    public static $connection = null;
    public function __construct () {
        if (self::$connection) {
            return self::$connection;
        }
        $this->connect();
        return self::$connection;
    }
    public function connect () {
        $db_server = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'ajax';
        self::$connection = new mysqli($db_server, $db_username, $db_password, $db_name);
        if (self::$connection->connect_error) {
            die("Khong the ket noi den CSDL");
        }
    }
    public function disconnect () {
        if (self::$connection) {
            self::$connection->close();
        }
    }
}