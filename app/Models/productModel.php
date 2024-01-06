<?php
class productModel {
    protected $conn;
    public function __construct()
    {
        $model = new DModel();
        $this->conn = $model->connectDB();
    }
    public function showAllProduct(){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.delete_flag <>1
                GROUP BY product.id;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function searchProduct($productName){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.name LIKE '%$productName%' AND product.delete_flag <>1
                GROUP BY product.id;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showAllProductPriceSort($condition){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                GROUP BY product.id ORDER BY price $condition;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showProductPriceFromTo($priceFrom, $priceTo, $priceSort=NULL){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                AND (inventory.price BETWEEN $priceFrom AND $priceTo) 
                GROUP BY product.id";
        if($priceTo ==0){
            $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                    FROM product, inventory, image 
                    WHERE product.id=inventory.product_id AND image.id=inventory.image_id 
                    AND (inventory.price >= $priceFrom) 
                    GROUP BY product.id";
        }

        if($priceSort!= NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function showProductBrand($brand, $priceSort=NULL){
        $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image, brand 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                        AND brand.name IN(";
        for($i=0; $i<count($brand); $i++){
            $sql .="'$brand[$i]'";
            if($i<count($brand)-1){
                $sql .=", ";
            }
        }
        $sql .=") GROUP BY product.id";

        if($priceSort !=NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function showProduct_brand_price($brand, $priceFrom, $priceTo, $priceSort=NULL){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                FROM product, inventory, image, brand
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                AND (inventory.price BETWEEN $priceFrom AND $priceTo) ";

        if($priceTo ==0){
            $sql="SELECT product.id as product_id, inventory.price, product.name, image.u_image 
                    FROM product, inventory, image, brand
                    WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND product.brand_id=brand.id 
                    AND (inventory.price >= $priceFrom) ";
        }
        $sql .=" AND brand.name IN(";
        for($i=0; $i<count($brand); $i++){
            $sql .="'$brand[$i]'";
            if($i<count($brand)-1){
                $sql .=", ";
            }
        }
        $sql .=") GROUP BY product.id";

        if($priceSort !=NULL){
            $sql .= " ORDER BY price $priceSort;";
        }
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showProduct_category($categoryID){
        $sql = "SELECT product.id as product_id, inventory.price, product.name, image.u_image
                FROM product, inventory, image, category
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id AND category.id=product.category_id AND category.id='$categoryID'
                GROUP BY product.id;";
        $statement =$this->conn->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showProductDetail($productID){
        $sql="SELECT product.id as product_id, product.name, brand.name as brand_name, brand_id, inventory.id as ivn_id, 
		                inventory.variant, inventory.quantity, inventory.price, image.u_image
                FROM product, inventory, image, brand 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id
                    AND brand.id = product.brand_id AND product.id='$productID';";
        $statement = $this->conn->query($sql);
        $result =$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showInventory($productID, $ivn_id){
        $sql ="SELECT product.id as product_id, name, brand_id, inventory.id as ivn_id, 
                        inventory.variant, inventory.quantity, inventory.price, image.u_image
                FROM product, inventory, image 
                WHERE product.id=inventory.product_id AND image.id=inventory.image_id
                    AND product.id='$productID' AND inventory.id='$ivn_id';";
        $statement = $this->conn->query($sql);
        $result =$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update_quantity_after_order($cartData){
        for($i=0; $i<count($cartData); $i++){
            $ivn_id= $cartData[$i]['ivn_id'];
            $quantity= $cartData[$i]['quantity'];

            $sql = "UPDATE inventory SET quantity= quantity - '$quantity' WHERE id='$ivn_id'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        }
    }
    public function update_quantity_after_cancel_order($orderDetail){
        for($i=0; $i<count($orderDetail); $i++){
            $ivn_id = $orderDetail[$i]['inventory_id'];
            $quantity = $orderDetail[$i]['quantity'];

            $sql = "UPDATE inventory SET quantity= quantity + '$quantity' WHERE id='$ivn_id'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        }
    }
}
?>