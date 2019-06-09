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

            <h3>Bạn có chắc chắn xóa nhân viên ?</h3>
            <form name="delete" action="" method="post">
                <div class="form-group">
                    <label>Tên nhân viên: ABC</label>
                </div>
                <button type="submit" class="btn btn-danger">xóa nhân viên</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>