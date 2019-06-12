<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>CRUD App</title>
</head>
<body>
<?php
// nạp file kết nối CSDL
include_once "config.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Cập nhật thông tin nhân viên</h1>
            <?php
                $name = "";
                $address = "";
                $salary = "";

                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM employees WHERE id = $id";

                    $query = mysqli_query($connection,$sql);

                    $data = mysqli_fetch_array($query);
                        $name = $data['name'];
                        $address = $data['address'];
                        $salary = $data['salary'];


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
                            $address = $_POST['address'];
                            $salary = $_POST['salary'];

                            $sqlUpdate = "UPDATE employees SET name = '$name', address = '$address', salary = $salary WHERE id = $id";
                            // thực hiện câu lệnh SQL

                            $result = $connection->query($sqlUpdate);

                            if($result == true) {
                                echo "<div class='alert alert-success'>Cập nhật thông tin thành công ! <a href='index.php'>Trang chủ</a></div>";
                            } else {
                                echo "<div class='alert alert-danger'>Cập nhật thông tin thất bại ! </div>";
                            }
                        } else {
                            /**
                             * chuyển mảng $errors thành chuỗi hàm implode
                             */
                            $error_string = implode("<br>",$errors);
                            echo "<div class='alert alert-danger'>$error_string</div>";
                        }
                    }
                }
            ?>

            <form name="edit" action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="form-group">
                    <label>Tên nhân viên:</label>
                    <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ nhân viên:</label>
                    <input type="text" name="address" value="<?php echo $address;?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Lương nhân viên:</label>
                    <input type="text" name="salary" value="<?php echo $salary?>" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>