<?php
    class admin extends DController{
        public function __construct()
        {
            parent::__construct();
            session_start();
        }
        public function productmangement(){
            global $BASE_URL;
            if(isset($_SESSION['admin'])){
                $productModel = $this->load->model('productModel');
                $productData = $productModel->showAllProduct();
                $this->load->view('admin/AdminProduct', $productData);
            }
            else{
                header("Location:".$BASE_URL."?url=index/notFound");
            }
        }
        public function deleteproduct($productID){
            
            global $BASE_URL;
            if(isset($_SESSION['admin'])){
                $adminModel =$this->load->model('adminModel');
                $result =$adminModel->deleteProduct($productID);
                if($result ==1){
                    echo "<script>
                        alert('Xóa sản phẩm thành công');
                        window.location.href = '".$BASE_URL."?url=admin/productmangement';
                    </script>";
                }
            }
            else{
                header("Location:".$BASE_URL."?url=index/notFound");
            }
        }
    }
?>