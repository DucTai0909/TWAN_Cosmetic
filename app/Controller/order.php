<?php

use LDAP\Result;

    class order extends DController{
        //public $message;
        public $data =array();
        public function __construct()
        {
            session_start();
            parent::__construct();
        }
        public function index(){
            if(isset($_SESSION['login'])){
                $this->showorder();
            }
            else{
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
           
        }
        public function showorderlist(){
            if(isset($_SESSION['login'])){
                $orderModel= $this->load->model('orderModel');
                $orderList=$orderModel->showOrderList($_SESSION['userid']);
                if(isset($orderList)){
                    $this->load->view('OrderList', $orderList);
                }
                else{
                    $this->load->view('OrderList');
                }
            }
            else{
                $this->load->view('OrderList');
            }
        }
        public function showorderdetail($orderid){
            if(isset($_SESSION['login'])){
                $orderModel=$this->load->model('orderModel');
                $orderList=$orderModel->showOrderList($_SESSION['userid']);
                if(isset($orderList)){
                    $orderDetail = $orderModel->show_order_detail($orderid);
                    $orderDetail[0]['order_id']= $orderid;
                    $this->load->view('OrderDetail', $orderDetail);
                }
                else{
                    global $BASE_URL;
                    header("Location:".$BASE_URL."?url=index/notFound");
                }
            }
            else{
                global $BASE_URL;
                header("Location:".$BASE_URL."?url=index/notFound");
            }
        }

        public function showorder($msg=NULL){
            $cartModel = $this->load->model('cartModel');
            $dataCart = $cartModel->showcart($_SESSION['userid']);
            if(!isset($_SESSION['order'])|| empty($dataCart)){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
            else{
                $_SESSION['order_complete'] =true;

               
                
                $orderModel = $this->load->model('orderModel');
                $newAddress = $orderModel->shownewaddress();
                if($msg !=NULL){
                    //echo $msg;
                    $dataCart[0]['msg'] = $msg;
                    //echo $dataCart[0]['msg'];   
                }

                $this->load->view('Order',$dataCart, $newAddress);
            } 
        }

        public function changeinfoorder(){
            global $BASE_URL;

            if(!isset($_SESSION['change_address'])){
                header("Location:$BASE_URL?url=index/notFound");

            }
            else{
                unset($_SESSION['change_address']);

                $message='';
                if(empty($_POST['cusname'])){
                    $message= "Bạn chưa nhập tên";
                }
                elseif(empty($_POST['cusphone'])){
                    $message ="Bạn chưa nhập SDT";
                }
                elseif(empty($_POST['cusaddress'])){
                    $message ="Bạn chưa nhập Địa chỉ";
                }
                elseif(empty($_POST['city'])){
                    $message ="Bạn chưa chọn tỉnh";
                }
                elseif(empty($_POST['district'])){
                    $message ="Bạn chưa chọn huyện";
                }
                elseif(empty($_POST['ward'])){
                    $message ="Bạn chưa chọn Xã";
                }
    
                if($message ==''){
                    $orderModel = $this->load->model('orderModel');
                    $result=$orderModel->changeInfo($_POST['cusname'], $_POST['cusphone'], $_POST['cusaddress'],
                                                    $_POST['ward'], $_POST['district'], $_POST['city']);
                    if($result ==1){
                        echo "abc";
                        header("Location:".$BASE_URL."?url=order");
                    }
                }else{
                    $this->load->view('InfoOrder', $message);
                }
            }
           
        }
        public function addorder(){
            if(!isset($_SESSION['order_complete'])){
                global $BASE_URL;
                header("Location:$BASE_URL?url=index/notFound");
            }
            else{
                unset($_SESSION['order_complete']);
                /*
                Load address
                */
                $orderModel=$this->load->model('orderModel');
                $address =$orderModel->shownewaddress();

                /*
                Load product from cart
                */
                $cartModel =$this->load->model('cartModel');
                $cartData =$cartModel->showcart($_SESSION['userid']);

                /*
                If exist session['newTotal'] it meant we have discount apply
                    And if not it meant user dont use voucher
                So:
                +if exist: total=newTotal
                +if not: total=oldTotal
                */
                if(isset($_SESSION['newTotal'])){
                    $total = $_SESSION['newTotal'];
                    $voucherID = $_SESSION['voucherID'];
                }
                else{
                    $total = $_SESSION['oldTotal'];
                    $voucherID =NULL;
                }
                
                //Insert into order and orderdetail
                $result = $orderModel->addorder($cartData, $address, $total, $voucherID);
                
                /*
                After insert we call method to decres the quantity of the product we order
                */
                $productModel = $this->load->model('productModel');
                $productModel->update_quantity_after_order($cartData);
                
                
                /*
                _If insert into table Order and orderdetail success ($result==1)
                    We call method delete everything in 'cart'
                */  
                if($result ==1){
                    global $BASE_URL;
                    header("Location:$BASE_URL?url=cart/deletecart");
                }          
            }
        }

        public function discount(){
            global $BASE_URL;
            if(!isset($_SESSION['order'])){
                header("Location:$BASE_URL?url=index/notFound");

            }
            else{

                if(isset($_POST['changeAdress'])){
                    $_SESSION['change_address']=true;
                    $this->load->view('InfoOrder');
                }

                else if(isset($_POST['discountBtn'])){
                    if(!empty($_POST['voucher'])){
                        $voucherModel =$this->load->model('voucherModel');
                        $result =$voucherModel->findVoucher($_POST['voucher']);
                        
                        
                        if(empty($result)){
                            $this->showorder('Không tìm thấy Voucher!');
                        }
                        else{
                                /*
                            Xử lý datetime của voucher với today
                            */
                            $voucherDate = strtotime($result[0]['exp']);
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $today= date("Y-m-d h:i:sa" );
                            $today =strtotime($today);
                            $_SESSION['voucherID'] = $result[0]['id'];

                            if($result[0]['min_bill']==1){
                                $orderModel = $this->load->model('orderModel');
                                $isThisVoucherUsed= $orderModel->check_voucher_is_used($_SESSION['userid'], $_SESSION['voucherID']);
                                if($isThisVoucherUsed >0){

                                    $this->showorder('Bạn đã sử dụng Voucher này rồi');
                                }
                                else{
                                    $_SESSION['newTotal'] =$_SESSION['oldTotal'] -($_SESSION['oldTotal'] * $result[0]['discount_percentage']/100);
                                    header("Location:$BASE_URL?url=order");
                                }
                            }
                            
                            elseif($result[0]['remain'] <=0){
                                $this->showorder('Voucher này đã hết lượt sử dùng rồi!');
                            }
    
                            elseif($_SESSION['oldTotal'] < $result[0]['min_bill']){
                                $this->showorder('Đơn hàng của bạn không đủ giá trị tối thiểu để sử dụng Voucher này!');
                            }
    
                            elseif($voucherDate <$today){
                                $this->showorder('Voucher này đã hết thời hạn sử dụng!');
                            }
    
                            else{
                                if($result[0]['discount_percentage']==0){
                                    $_SESSION['newTotal'] =$_SESSION['oldTotal'] - $result[0]['discount_price'];
                                    header("Location:$BASE_URL?url=order");
                                }
                                elseif($result[0]['discount_price'] ==0){
                                    $_SESSION['newTotal'] =$_SESSION['oldTotal'] -($_SESSION['oldTotal'] * $result[0]['discount_percentage']/100);
                                    header("Location:$BASE_URL?url=order");
                                }
                            }
                        }
                    }
                    else{
                        global $BASE_URL;
                        header("Location:$BASE_URL?url=order");
                    }
                }
            }   
        }
        public function cancelorder(){
            global $BASE_URL;
            if(isset($_SESSION['login'])){
                /*
                Take the data of the order and orderdetail
                */
                $orderModel= $this->load->model('orderModel');
                $orderDetail = $orderModel->show_order_detail($_POST['order_id']);

                /*
                call method to update quantity of these inventory in the order
                */
                $productModel =$this->load->model('productModel');
                $increaseQuantity = $productModel->update_quantity_after_cancel_order($orderDetail);

                $deleteOrder = $orderModel->delete_order($_POST['order_id']);
                if($deleteOrder ==1){
                    echo "<script>
                        alert('Hủy đơn hàng thành công!');
                        window.location.href = '".$BASE_URL."?url=order/showorderlist';
                    </script>";
                }
                else{
                    echo "<script>
                        alert('Hủy đơn hàng thất bại!');
                        window.location.href = '".$BASE_URL."?url=order/showorderlist';
                    </script>";
                }

            }
            else{
                header("Location:".$BASE_URL."?url=index/notFound");
            }
        }
    }    
?>