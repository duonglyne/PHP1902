<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Bổ xung phần vòng lặp continue</h1>
<pre>

</pre>
<?php
    for ($i = 1;$i < 10; $i++){
        if ($i == 5){
            echo "<br>( số $i bị bỏ qua )";
            continue;
            // lệnh continue sẽ bỏ qua phần code phía sau của lần lặp này
            // và tiếp tục thực hiện các lần lặp tiếp theo
        }

        echo "<br> $i";
    }
?>

</body>
</html>