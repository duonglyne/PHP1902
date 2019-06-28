<?php
    $json1 = '["h\u00e0 n\u1ed9i","h\u1ed3 chi m\u00ecnh","\u0111\u00e0 n\u1eb5ng"]';
    $json2 = '{"name":"nguy\u1ec5n v\u0103n an","age":21,"location":"h\u00e0 n\u1ed9i"}';
/**
 * Chuyển đổi chuỗi json code thành mảng hoặc đối tượng trong php
 *
 * dùng hàm: json_decode
 */
    $convert1 = json_decode($json1);
    $convert2 = json_decode($json2);

/**
 * Giá trị của 2 chuối $json1 và $json2 sau khi chuyển đổi là
 *
 * $convert1 : Array
                (
                [0] => hà nội
                [1] => hồ chi mình
                [2] => đà nẵng
                 )
 * $convert2 : stdClass Object
                (
                [name] => nguyễn văn an
                [age] => 21
                [location] => hà nội
                )
 */


    echo "<pre>";
    print_r($convert1);
    echo "</pre>";

    echo "<pre>";
    print_r($convert2);
    echo "</pre>";

    // Chuyển đối thành công oh yeahhhhh !