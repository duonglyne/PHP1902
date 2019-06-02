<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">

    </style>
</head>
<body>
<h1 style="text-align: center; color: red;margin-top: 100px;">Tình trạng sức khỏe</h1>

<?php
echo "<div class=\"row\"><div class=\"col-md-12\">";
// isset check xem biến có tồn tại hay không
if (isset($_GET)&& isset($_GET["height"]) && isset($_GET["weight"])) {
    $height = (double)$_GET['height'];
    $weight = (double)$_GET['weight'];
    $bMI = $weight / ($height * $height);
    if ($bMI < 18.5) {
        $pLoai = "Gầy";
        $pBenh = "Thấp";
    } elseif ($bMI <= 24.9) {
        $pLoai = "Bình thường";
        $pBenh = "Trung bình";
    } elseif ($bMI <= 29.9) {
        $pLoai = "Hơi béo";
        $pBenh = "Cao";
    } else if ($bMI <= 34.9) {
        $pLoai = "Béo phì cấp độ 1";
        $pBenh = "Cao";
    } else if ($bMI <= 39.9) {
        $pLoai = "Béo phì cấp độ 2";
        $pBenh = "Rất cao";
    } else {
        $pLoai = "Béo phì cấp độ 3";
        $pBenh = "Nguy hiểm";
    }
    echo '<div style=" margin: 100px;">';
    echo '<h2 style=" color: blue; margin-left: 50px;">Chỉ số BMI của bạn là: <span style=" color: red;">'.$bMI.'</span></h2>';
    echo '<h2 style=" color: blue; margin-left: 50px;">Thể hình của bạn thuộc loại: <span style=" color: red;">'.$pLoai.'</span></h2>';
    echo '<h2 style=" color: blue; margin-left: 50px;">Nguy cơ phát triển bệnh của bạn: <span style=" color: red;">'.$pBenh.'</span></h2>';
    echo '</div>';
}
echo "</div></div>";
?>
<pre>

</pre>


</body>
</html>