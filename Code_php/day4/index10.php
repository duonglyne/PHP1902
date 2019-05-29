<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Truyền tham chiếu và truyền tham trị cho hàm</h1>
<pre>
   - Truyền tham trị: là chỉ truyền giá trị
   - Truyền tham chiếu : là hai biến sẽ cùng tham chiếu đến 1 ô nhớ, khi một biến thay đổi
    thì biến kia cũng thay đổi.
</pre>
<?php
    $a = 5;
    function truyen_tham_tri($b){
        $b*=2;
        echo "<br>".$b;
    }
    truyen_tham_tri($a);
    echo "<br>".$a;

    // truyền tham chiếu
    $c = 10;
    function truyen_tham_chieu(&$d){
        $d*=2;
        echo "<br>".$d;
    }
    /*
     * hiểu đơn giản là $c và $d cùng tham chiếu đến 1 ô nhớ
     * vây nên khi $c thay đổi thì giá trị của $d cũng thay đổi theo
     * */
    truyen_tham_chieu($c);
    echo "<br>".$c;
?>

</body>
</html>