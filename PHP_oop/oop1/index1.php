<?php
/*
 * class (lớp)
 * object (đối tượng)
 * instance ( thể hiện của một class) đội tượng cụ thể
 *
 * */

class Student {
    /**
     * thuộc tính trong hướng đối tượng
     * là tính chất của class đó
     */
    public $name;
    public $age;
    public $location;
    public $point;
    /**
     * phương thức đầu tiên của class
     * phương thức khởi tạo __construct()
     * phương thức này sẽ chạy ngay khi tạo đối tượng
     * từ class mà không cần gọi trực tiếp
     * hàm thì nằm ngoài class
     * còn hàm nằm trong class gọi là method
     *
     */
    public function __construct($name_param, $age_param, $location_param)
    {
        // gán tham số truyền vào thuộc tính của class

        /**
         * trong class để gọi đến chính class thì ta dùng từ khóa $this
         * để gọi thuộc tính $this->ten_thuoc_tinh nhưng chú ý là tên thuộc tính không có $
         * $this->name (viết đúng)
         * $this->$name (viết sai)
         */
        $this->name = $name_param;
        $this->age = $age_param;
        $this->location = $location_param;

        /**
         * __METHOD__ là magic method cho ta biết
         * phương thức nào đang được gọi
         */
        echo "<br> __METHOD__". __METHOD__;
    }
    /**
     * Xây dựng phương thức khác
     */
    public function printInfor() {
        echo "<br> __METHOD__". __METHOD__;
        echo "<br> Tên của sinh viên: ".$this->name;
        echo "<br> Tuổi của sinh viên: ".$this->age;
        echo "<br> Quê quán của sinh viên: ".$this->location;
    }
    /**
     * Phương thức tính điểm trung bình
     * @param $point_arr_param
     * @return bool
     */
    public function calculatePoint($point_arr_param) {
        /**
         * is_array() kiểm tra biến có phải 1 mảng hay không
         * !empty() check không rỗng
         * empty() check rỗng
         * ! toán tử ! phủ định người lại
         */
        if (is_array($point_arr_param) && !empty($point_arr_param)) {
            $count = 0;
            $total = 0;
            foreach($point_arr_param as $key => $value) {
                // $total = $total + value;
                $total += $value;
                $count++;
            }
            $point = $total/$count;
            $this->point = $point;
        }
        return false;
    }

} // kết thúc class

/**
 * Khởi tạo đối tượng cụ thể của class
 * sử dụng từ khóa new className()
 */
$duong = new Student("Dưỡng",21,"Bắc Giang");
echo "<br> gọi đến method printInfo()";
$duong->printInfor();
/**
 * gọi một số thuộc tính
 */
echo "<hr>";
echo "<br> In  ra tên sinh viên ngoài class ".$duong->name;
echo "<hr>";
echo "In ra cấu trúc của class<br>";
echo "<pre>";
print_r($duong);
echo "</pre>";

// Gọi đến phương thức calculatePoint()
$point = array(
    'java' => 5,
    'database' => 3,
    'php' => 6,
    'html' => 2,
    'oop' => 7,
    '.net' => 9
);
// gọi đến phương thức của class
$duong->calculatePoint($point);
echo "<br>diem trung binh : " . $duong->point;




?>