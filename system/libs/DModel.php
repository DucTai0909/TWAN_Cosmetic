<?php
    class DModel{
        protected $conn;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        public function connectDB(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=twancosmetics_mvc_edit", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "Connected successfully <br>";
                return $conn;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
    

    
?>
