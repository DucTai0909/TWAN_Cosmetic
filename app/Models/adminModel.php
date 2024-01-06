<?php
    class adminModel {
        protected $conn;
        public function __construct()
        {
            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();
        }
        public function deleteProduct($productID){
            $sql = "UPDATE product SET delete_flag=1 WHERE id='$productID';";
            $statement = $this->conn->prepare($sql);
            return $statement->execute();
        }
    }
?>