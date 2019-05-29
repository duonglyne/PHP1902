<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Gán giá trị mặc định cho tham số</h1>
<pre>
   nếu không truyền biến hoặc giá trị cho tham số của hàm thì sẽ bị lỗi
    Fatal error: Uncaught ArgumentCountError: Too few arguments to function cv_hinh_tron()

    để tránh điều này trong một số trường hợp người ta sẽ gán giá trị mặc định cho tham số
</pre>
<?php
    function cv_hinh_tron($r = 10){
        $cv = $r*2*3.14;
        return $cv;
    }
    echo "<br> Chu vi hình tròn là: ".cv_hinh_tron(15);

?>

</body>
</html>