<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Câu lệnh điều kiện trong PHP</h1>
<?php
    $age =10;
    if ($age < 18){
        echo "<br> trẻ em";
    } else if($age < 30){
        echo "<br> Tuổi thanh niên";
    } else if ($age < 50){
        echo "<br> Tuổi trung niên";
    } else {
        echo "<br> Tuổi già";
    }

?>
</body>
</html>