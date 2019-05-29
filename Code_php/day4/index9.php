<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Phạm vi của biến</h1>
<pre>
   - Biến cục bộ : chỉ có ảnh hưởng và chỉ sử dụng được trong 1 không gian nhất định
   - Biến toàn cục : có ảnh hưởng và có thể sử dụng ở mọi nơi
   - Khi tên biến bị trùng thì nếu sử dụng ngoài hàm php sẽ lấy giá trị của
    biến toàn cục
    ****
    Tham số khi khai báo hàm là biến cục bộ và chỉ có tác dụng trong
    hàm, ví dụ như biến $r là biến cục bộ
</pre>
<?php
// biến toàn cục $r
    $r = 100;

    // khai báo hàm tính chu vi với tham số truyền vào là $r
    function cv_hinh_tron($r = 10){
        $cv = $r*2*3.14;
        return $cv;
    }
    // biến $kq bên ngoài hàm là biến toàn cục
    $kq = cv_hinh_tron(15);
    echo "<br> Chu vi hình tròn là: $kq";

    echo "<br> test thử biến r: $r";

?>

</body>
</html>