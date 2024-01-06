<?php
    class cartModel{
        protected $conn;

        public function __construct()
        {
            //session_start();

            $this->conn = new DModel();
            $this->conn = $this->conn->connectDB();    
        }
        public function insertCart($userid){
            $sql= "INSERT INTO cart (user_id) VALUES ('$userid')";
            return $statement = $this->conn->exec($sql);
        }
        public function insertCartDetail($cartid, $ivn_id, $ivn_quantity){
            $sql= "INSERT INTO cartdetail (cart_id, inventory_id, quantity) VALUES ('$cartid', '$ivn_id', '$ivn_quantity')";
            return $statement = $this->conn->exec($sql);
        }
        public function updateIvn($cartid, $ivn_id, $extra_quantity){
            $sql= "UPDATE cartdetail SET quantity= quantity+ '$extra_quantity' WHERE cart_id ='$cartid' AND inventory_id='$ivn_id'";
            $statement = $this->conn->prepare($sql);
            return $statement->execute();
        }
        public function checkCartDetail($cartid, $ivn_id){
            $sql= "SELECT * FROM cartdetail WHERE cart_id ='$cartid' AND inventory_id='$ivn_id'";
            $statement = $this->conn->query($sql);
            $result = $statement->fetchColumn();
            return $result;
        }
        public function checkCart($userid){
            $sql= "SELECT * FROM cart WHERE user_id='$userid'";
            $statement =$this->conn->query($sql);
            $result =$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function countCart($cartid){
            $sql= "SELECT *
                    FROM cart, cartdetail
                    WHERE cart.id=cartdetail.cart_id AND cart.id ='$cartid'";
            $statement =$this->conn->prepare($sql);
            $statement->execute();
            $result =$statement->rowCount();
            return $result;
        }
        public function showcart($userid){
               
                $sql ="SELECT inventory.id as ivn_id, inventory.variant, cart.id, image.u_image, product.name, 
                                inventory.price, cartdetail.quantity, inventory.product_id
                        FROM cart, cartdetail, product, inventory, image
                        WHERE cart.user_id ='$userid' AND image.id=inventory.image_id AND cart.id=cartdetail.cart_id 
                                AND product.id = inventory.product_id AND cartdetail.inventory_id = inventory.id;";

                $statement =$this->conn->query($sql);
                $result =$statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            
        }
        public function updatecart($inventoryid, $quantity, $cartid){

            $sql ="UPDATE cartdetail SET quantity='$quantity' WHERE inventory_id='$inventoryid' AND cart_id='$cartid'";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
                
        }

        public function deleteproduct($inventoryid, $cartid){
            $sql= "DELETE FROM cartdetail WHERE cart_id='$cartid' AND inventory_id='$inventoryid'";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }

        /*
        this function is used to delete data in table cart
        */
        public function deletecart($cartid){
            $result =$this->deletecartdetail($cartid);

            $sql = "DELETE FROM cart WHERE id='$cartid';";
            $statement =$this->conn->prepare($sql);
            $result= $statement->execute();
            return $result;
        }

        public function deletecartdetail($cartid){
            $sql = "DELETE FROM cartdetail WHERE cart_id='$cartid';";
            $statement =$this->conn->prepare($sql);
            return $statement->execute();
        }
    }
?>