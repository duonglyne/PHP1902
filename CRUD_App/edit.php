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

                    while ($data = mysqli_fetch_array($query)){
                        $name = $data['name'];
                        $address = $data['address'];
                        $salary = $data['salary'];
                    }
                }
            ?>

            <form name="edit" action="" method="post">
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