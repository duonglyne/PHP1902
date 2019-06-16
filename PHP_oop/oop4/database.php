<?php
/**
 * Created by PhpStorm.
 * abstract class -> class trừu tượng
 * Date: 6/16/2019
 * Time: 8:37 PM
 */
abstract class Database{
    abstract public function connect();

    abstract public function disconnect();

    public function test() {
        echo "<br>" . __METHOD__;
    }
}

?>