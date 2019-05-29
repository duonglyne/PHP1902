<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Bổ xung phần vòng lặp break</h1>
<pre>

</pre>
<?php
    for ($i = 1;$i < 10; $i++){
        if ($i == 5){
            echo "<br> dừng vòng lặp tại đây !!";
            break;
            // lệnh break sẽ dừng luôn vòng lặp tại nơi đặt lệnh 
        }

        echo "<br> $i";
    }
?>

</body>
</html>