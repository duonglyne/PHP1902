<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Nạp một hay nhiều file php vào một file khác</h1>
<pre>
    để nạp file vào một file khác thì sử dụng:
    - cách 1: include("fileName");
    - cách 2: include_once("fileName");
    - cách 3: require("fileName");
    - cách 4: require_once("fileName");
    var_dump($bien) trả về kiểu dữ liệu và giá trị của biến,
    hàm này dùng để debug

    Điểm chung của 4 hàm include, include_once, require, require_once:
        đều dùng để nạp file php vào một file khác
    Điểm khác nhau:

    1 - include : nạp file nếu gặp lỗi thì file vẫn chạy tiếp
    2 - include_once : nạp file nếu gặp lỗi thì file vẫn chạy tiếp
    nhưng nếu gọi include 2 lần thì php sẽ nạp 2 lần nhưng include_once chỉ nạp 1 lần duy nhất.
    3 - require : nếu gặp lỗi trong quá trình nạp file sẽ dừng lại
    4 - require_once : nếu gặp lỗi trong quá trình nạp file thì dừng lại và chỉ nạp một lần duy nhất.

</pre>
<?php
require_once ('function1.php'); // lỗi đường dẫn
    $bk = 4;
    echo "Chu vi hình tròn có bk = $bk là: ".cvHinhTron($bk)."<br>";
    var_dump(cvHinhTron($bk));
?>

</body>
</html>