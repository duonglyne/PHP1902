<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Các hàm khác trong php: hàm sắp xếp các phần tử của mảng theo thứ tự giảm dần :</h1>
<h2>sử dụng hàm rsort();</h2>
<pre>

</pre>
<?php
    $arr1 = array(24,7,28,100,1,7,9);

    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
    echo "<br>";

    rsort($arr1);

    echo "<pre>";
    print_r($arr1);
    echo "</pre>";


?>

</body>
</html>