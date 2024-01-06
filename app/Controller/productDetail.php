<?php
    class productDetail extends DController{
        public function __construct()
        {
            parent::__construct();
            session_start();
        }

        public function loadproduct($productID, $ivn_id=NULL){
            $productModel =$this->load->model('productModel');
            $productDetail = $productModel->showProductDetail($productID);


            return $this->load->view('ProductDetail', $productDetail);
        }

        public function loadinventory($productID, $ivn_id){
            if($ivn_id==0){
                return $this->loadproduct($productID);
            }
            $productModel =$this->load->model('productModel');
            $productDetail = $productModel->showProductDetail($productID);

            $ivnDetail =$productModel->showInventory($productID, $ivn_id);
            $ivnDetail[0]['ivn_Choosen']=$ivn_id;
            return $this->load->view('ProductDetail', $productDetail, $ivnDetail);

        }
        public function addtocart(){
           
            if(isset($_POST['addToCartBtn'])|| isset($_POST['orderBtn'])){
                /*
                if user press 1 in 2 button, order or addtocart button
                    if user is not login yet, we not direct the page
                */
                if(isset($_SESSION['login'])){
                    /*
                    If user press button but the quantity of product is 0
                        it mean the user doest choose any option of selected inventory
                        we not direct the page again
                    */
                    if($_POST['ivn_quantity']==0){
                        header("Location:".$_POST['goback']);
                    }
                    else{

                        /*
                        _We will check whether the cart of this user is existed or not
                        when we firt press btn 
                            +case 1: if cart is already exist: we take cartID into Session(cartID);
                            +case 2: if cart doest exist: we insert new cart into DB and take cartID into Session(cartID)
                        */
                        $cartModel = $this->load->model('cartModel');
                        if(!isset($_SESSION['cartid'])){
                            $insertcart =$cartModel->insertCart($_SESSION['userid']);
                            $cartData = $cartModel->checkCart($_SESSION['userid']);
                            $_SESSION['cartid']= $cartData[0]['id'];                        
                        }
                        /*
                        _Problem: if user aldready add an inventory into cart
                                and after that that user want to add that inventory again
                        _normally: we will plus the quantity in cart
                        _Method: we will check in DB whether the inventory of this cart is exist?
                                +case 1: if(exist) it meant the rowCount>0 : we call update method
                                +case 2: if(not): we call insert into cartdetail method
                        */
                        $check_AvaliableIvn_id = $cartModel->checkCartDetail($_SESSION['cartid'], $_POST['ivn_id']);
                        if($check_AvaliableIvn_id >0){
                            $cartModel->updateIvn($_SESSION['cartid'], $_POST['ivn_id'], $_POST['ivn_quantity']);
                        }
                        else{
                            $insertCartDetail= $cartModel->insertCartDetail($_SESSION['cartid'], $_POST['ivn_id'], $_POST['ivn_quantity']);
                        }

                        /*
                        _After all when all the method is call and the problem solve
                            +case 1: the user press orderBtn: we redirect page to cart page
                            +case 2: the user press addToCartBtn: we not redirect page
                        */
                        if(isset($_POST['orderBtn'])){
                            global $BASE_URL;
                            header("Location:$BASE_URL?url=cart");
                        }
                        elseif(isset($_POST['addToCartBtn'])){
                            echo "<script>
                                alert('Thêm sản phẩm vào giỏ hàng thành công!');
                                window.location = '".$_POST['goback']."';
                            </script>";
                        }
                    } 
                }
                else{
                    header("Location:".$_POST['goback']);
                }
            }
        }
    }
?>