<?php
    class orderModel{
        protected $conn;
        public function __construct()
        {
            $model = new DModel();
            $this->conn= $model->connectDB();
        }
        public function showOrderList($userid){
            $sql= "SELECT * FROM `order` WHERE user_id='$userid'";
            $statement= $this->conn->query($sql);
            $result= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function show_order_detail($orderID){
            $sql="SELECT orderdetail.order_id, orderdetail.inventory_id, orderdetail.quantity,
                        `order`.total, image.u_image, product.name, inventory.variant,
                        inventory.price, inventory.product_id
                FROM orderdetail, `order`, inventory, image, product
                WHERE `order`.id= orderdetail.order_id AND inventory.id= orderdetail.inventory_id
                        AND product.id= inventory.product_id
                        AND inventory.image_id = image.id AND `order`.id='$orderID';";
            $statement= $this->conn->query($sql);
            $result= $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function changeInfo($cusname, $cusphone, $address, $ward, $district, $city){
            $user_id=  $_SESSION['userid'];
           
            $sql ="INSERT INTO address (user_id, Name, Phone, Region ,Ward, District, City) VALUES ('$user_id', '$cusname', '$cusphone' 
                                            ,'$address', '$ward', '$district', '$city')";
            $statement =$this->conn->prepare($sql);
            //$statement->execute();
            //$result= $statement->rowCount();
            $result =$statement->execute();
            return $result;
        }
        public function shownewaddress(){
            $user_id= $_SESSION['userid'];

            $sql= "SELECT * FROM address WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
            $statement = $this->conn->query($sql);
            $result =$statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function addorder($cartData, $addressData, $total, $voucherID=NULL){
            
            $user_id = $_SESSION['userid'];
            $phone = $addressData[0]['Phone'];
            $name=$addressData[0]['Name'];
            $address= $addressData[0]['Region'].", ".$addressData[0]['Ward'].", ".$addressData[0]['District'].", ".$addressData[0]['City'];

            /*
            Insert into table `order`
            */
            if($voucherID ==NULL){
                $sql = "INSERT INTO `order` (user_id, name, address, phone, total, paid) VALUES ('$user_id', '$name'
                ,'$address', '$phone', '$total', 0)";
            }
            else{
                $sql = "INSERT INTO `order` (user_id, name, address, phone, total, paid, `id_voucher`) VALUES ('$user_id', '$name'
                ,'$address', '$phone', '$total', 0, '$voucherID')";
            }
            
            $statement= $this->conn->prepare($sql);
            $result= $statement->execute();

            // gọi method insert vào table orderdetail
            $result = $this->addorderdetail($cartData);
            return $result;
        }

        public function addorderdetail($cartData){
            /*
            Lấy orderID vừa mới thêm vào table order
            */
            $user_id = $_SESSION['userid'];
            $sql ="SELECT * FROM `order` WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1;";
            $statement =$this->conn->query($sql);
            $orderData =$statement->fetchAll(PDO::FETCH_ASSOC);

            /*
            Insert vào bảng orderdetail
            */
            for($i =0; $i<count($cartData); $i++){
                $orderID = $orderData[0]['id'];
                $ivnID = $cartData[$i]['ivn_id'];
                $quantity = $cartData[$i]['quantity'];

                $sql = "INSERT INTO orderdetail (order_id, inventory_id, quantity) VALUES ('$orderID', '$ivnID', '$quantity')";
                $statement= $this->conn->prepare($sql);
                $result= $statement->execute();
            }
            return $result;
        }
        public function delete_order($orderID){
            $this->delete_orderdetail($orderID);
            $sql= "DELETE FROM `order` WHERE id='$orderID'";
            return $this->conn->exec($sql);
        }
        public function delete_orderdetail($orderID){
            $sql = "DELETE FROM orderdetail WHERE order_id='$orderID'";
            return $this->conn->exec($sql);
        }
        public function check_voucher_is_used($user_id, $voucherID){
            $sql = "SELECT * 
                    FROM voucher, `order`
                    WHERE voucher.id= `order`.id_voucher AND `order`.user_id='$user_id' AND voucher.id='$voucherID'";
            $statement =$this->conn->query($sql);
            $count = $statement->fetchColumn();
            return $count;
        }
    }
?>