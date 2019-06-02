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

</pre>
<?php
include ('function.php');
    $bk = 4;
    echo "Chu vi hình tròn có bk = $bk là: ".cvHinhTron($bk);
?>

</body>
</html>