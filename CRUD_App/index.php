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

            <h1>Liệt kê danh sách nhân viên</h1>
            <h1>
                <a href="create.php" class="btn btn-success">Thêm nhân viên mới</a>
            </h1>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Lương</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM employees";
                    $query = mysqli_query($connection,$sql);

                    while ($data = mysqli_fetch_array($query)) {

                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['address']; ?></td>
                            <td><?php echo $data['salary']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-warning">Sửa</a>
                                <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>