<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>CRUD App</title>
</head>
<body>
<?php
// nạp file kết nối CSDL
include_once "config.php";
$name = "";
$adress = "";
$salary = "";

/**
 * Kiểm tra xem có dữ liệu submit đi hay không
 * !empty($_POST) có nghĩa là không rỗng tức là có dữ liệu trong mảng này
 * isset($_POST) dùng để kiểm tra biến có tồn tại hay không
 */

if (isset($_POST) && !empty($_POST)){
    /**
     * Tạo ra 1 biến để check lỗi mặc định là rỗng
     */
    $errors = array();

    /**
     * !isset($_POST["name"]) => không tồn tại
     *  empty($_POST["name"]) => rỗng
     */

    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $errors[] = "Tên nhân viên không hợp lệ !";
    }
    if (!isset($_POST["address"]) || empty($_POST["address"])) {
        $errors[] = "Địa chỉ nhân viên không hợp lệ";
    }
    if (!isset($_POST["salary"]) || empty($_POST["salary"])) {
        $errors[] = "Lương nhân viên không hợp lệ";
    }
    /**
     * $errors rỗng tức là không có lỗi
     */
    if (empty($errors)){
        $name = $_POST['name'];
        $adress = $_POST['adress'];
        $salary = $_POST['salary'];

        $sqlInsert = "INSERT INTO employees (name, address, salary) VALUES ('$name', '$address', $salary)";
        // thực hiện câu lệnh SQL

        $result = $sqlInsert;

        if($result == true) {
            echo "<div class='alert alert-success'>Thêm mới nhân viên thành công ! <a href='index.php'>Trang chủ</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Thêm mới nhân viên thất bại ! </div>";
        }
    } else {
        /**
         * chuyển mảng $errors thành chuỗi hàm implode
         */
        $error_string = implode("<br>",$errors);
        echo "<div class='alert alert-danger'>$error_string</div>";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Thêm nhân viên mới</h1>
            <form name="create" action="" method="post">
                <div class="form-group">
                    <label>Tên nhân viên:</label>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ nhân viên:</label>
                    <input type="text" value="<?php echo $adress ?>" name="adress" class="form-control">
                </div>
                <div class="form-group">
                    <label>Lương nhân viên:</label>
                    <input type="text" value="<?php echo $salary ?>" name="salary" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">tạo nhân viên</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>