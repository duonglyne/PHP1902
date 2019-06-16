<?php
class productModel extends Database {
    public $table = "products";

    public function __construct($ip_db, $user_db, $pass_db, $db_name)
    {
        parent::__construct($ip_db, $user_db, $pass_db, $db_name);
    }
    /**
     * Lấy ra tất các bản ghi từ bảng products
     */
    public function index() {
        // $this->>connection

        $sqlSelect = "SELECT * FROM $this->table";
        $result = $this->connection->query($sqlSelect);

        return $result;


    }

    public function printDbName(){
        echo $this->database_name;
        /**
         * những thuộc tính hoặc phương thức có giới hạn là protected thì có thể truy cập đc
         * cả ở class con kế thừa từ class đó
         */
    }
    /**
     * $data chính là mảng chứa dữ liệu để tạo 1 bản ghi mới
     * không cần cái key id array('product_name' => 'son môi')
     * Lấy ra tất các bản ghi từ bảng products
     */
    public function create($data) {
        // $this->>connection

        if (isset($data["product_name"]) && isset($data["product_desc"]) && isset($data["created"])) {
            $product_name = $data["product_name"];
            $product_desc = $data["product_desc"];
            $created = $data["created"];
            $sqlInsert = "INSERT INTO ".$this->table." (product_name, product_desc, created) VALUES ('$product_name', '$product_desc', '$created')";

            // thực hiện SQL

            return $this->connection->query($sqlInsert);
        }
    }
    /**
     * $data chính là mảng chứa dữ liệu để tạo 1 bản ghi mới
     * $data cần đủ các cột trong CSDL của bảng products
     * Lấy ra tất các bản ghi từ bảng products
     */
    public function edit($data) {
        // $this->>connection

        if (isset($data["product_name"]) && isset($data["product_desc"]) && isset($data["created"]) && isset($data["id"])) {
            $product_name = $data["product_name"];
            $product_desc = $data["product_desc"];
            $created = $data["created"];
            $id = $data["id"];

            $sqlEdit = "UPDATE $this->table SET product_name = '$product_name', product_desc = '$product_desc', created = $created WHERE id = $id";

            // thực hiện SQL

            return $this->connection->query($sqlEdit);

        }


    }
    /**
     * Xóa
     * @param $prodcut_id
     */


    public function delete($prodcut_id) {
        $sqlDelete = "DELETE FROM $this->table WHERE id = $prodcut_id";
        // Thực hiện SQL
        return $this->connection->query($sqlDelete);

    }
}