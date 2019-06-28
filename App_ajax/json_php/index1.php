<?php

$phpArray = array("Bắc Giang", "Bắc Ninh", "Thái Nguyên");

Class Student
{

    public $name;

    public $age;

    public $location;

    public function __construct($name, $age, $location)
    {
        $this->name = $name;
        $this->age = $age;
        $this->location = $location;
    }
}

    $duong = new Student("Lý Văn Dưỡng", 21, "Bắc Giang");

    echo "<pre>";
    print_r($phpArray);
    echo "</pre>";
    echo "<pre>";
    print_r($duong);
    echo "</pre>";

    /**
     * Chuyển đối tượng và mảng trong php sang chuỗi json
     * Cú pháp: json_encode()
     */

    $phpJson1 = json_encode($phpArray);
    $phpJson2 = json_encode($duong);

/**
 * Giá trị trả về của 2 hàm là chuỗi mã json
 * $phpJson1 : ["B\u1eafc Giang","B\u1eafc Ninh","Th\u00e1i Nguy\u00ean"]
 * $phpJson2 : {"name":"L\u00fd V\u0103n D\u01b0\u1ee1ng","age":21,"location":"B\u1eafc Giang"}
 */

    echo "<pre>";
    print_r($phpJson1);
    echo "</pre>";
    echo "<pre>";
    print_r($phpJson2);
    echo "</pre>";
