<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Hàm trong php</h1>
<pre>
    Hàm là một tập hợp các dòng code để thực hiện 1 chức năng
    ví dụ như hàm tính chu vi hình tròn, tính diện tích hình chữ nhật, xuất file PDF ....

    - thay vì phải viết nhiều dòng code khi thực hiện một chức năng nhiều lần thì người ta sử
    dụng hàm. Để khi cần sử dụng chức năng đó thì chỉ cần gọi tên hàm và sử dụng hàm khai báo
    bằng từ khóa function
    function tên_hàm(ts1, ts2,...){
        //code chạy trong hàm
        //return có thể có hoặc không, kết thúc khi gặp lệnh return

        return giá_trị;
    }
</pre>
<?php
    function cv_hinh_tron($r){
        $cv = $r*2*3.14;
        return $cv;
    }
    function dt_hinh_tron($r){
        $dt = $r*$r*3.14;
        return $dt;
    }
    $bk = 4;
    echo "<br> Chu vi hình tròn có bk là $bk: ".cv_hinh_tron($bk);
    echo "<br> Diện tích hình tròn có bk là $bk: ".dt_hinh_tron($bk);

?>

</body>
</html>