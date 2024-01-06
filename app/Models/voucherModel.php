<?php
    class voucherModel{
        protected $conn;
        public function __construct()
        {
            $model = new DModel();
            $this->conn= $model->connectDB();
        }
        public function findVoucher($voucherCode){
            $sql= "SELECT * FROM voucher WHERE code='$voucherCode'";
            $statement =$this->conn->query($sql);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>
