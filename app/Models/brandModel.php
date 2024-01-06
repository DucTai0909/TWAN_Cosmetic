<?php
    class brandModel{
        protected $conn;
        public function __construct()
        {
            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();
        }
        public function showBrand(){
            $sql="SELECT * FROM brand;";
            $statement =$this->conn->query($sql);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>