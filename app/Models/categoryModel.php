<?php
    class categoryModel{
        protected $conn;
        public function __construct()
        {
            $this->conn = new DModel();
            $this->conn =$this->conn->connectDB();
        }
        public function showCategory(){
            $sql ="SELECT  category.id, category.name, COUNT(category.name) AS quantity
                    FROM product, category
                    WHERE product.category_id= category.id
                    GROUP BY category.id;";
            $statement=$this->conn->query($sql);
            $result= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>