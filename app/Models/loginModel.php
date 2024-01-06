<?php
    class loginModel{
        protected $conn;
        public function __construct()
        {
            $model = new DModel();
            $this->conn= $model->connectDB();
        }
        public function login($username, $password){
            
            $sql ="SELECT * FROM user WHERE username ='$username' AND password='$password'";
            $statement =$this->conn->query($sql);
            //$statement->execute();
            //$result= $statement->rowCount();
            $result =$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>