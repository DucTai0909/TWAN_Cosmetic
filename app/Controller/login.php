<?php
    class login extends DController{
        //public $message;
        public $data =array();
        public function __construct()
        {
            parent::__construct();
            session_start();

        }
        public function index(){
            $this->login();
        }
        public function login(){
            if((isset ($_SESSION['login']) && $_SESSION['login']==true) || isset($_SESSION['admin'])){
                global $BASE_URL;
                if(isset($_SESSION['login'])){
                    header("Location:$BASE_URL");
                }
                elseif(isset($_SESSION['admin'])){
                    header("Location:$BASE_URL?url=admin/productmangement");
                }
            }else{
                $this->load->view('login');
            }
        }
        public function authentication(){
            global $BASE_URL;
            if(isset($_POST['registerBtn'])){
                header("location:".$BASE_URL."?url=login/register");
            }
            else{
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $loginModel= $this->load->model('loginModel');
                $result =$loginModel->login($username, $password);
               // echo $count;
                
                if(isset($result[0]['password']) && $result[0]['password'] == $password){
                    if($result[0]['role_id']==10){
                        $_SESSION['admin']=true;
    
                        header("Location:".$BASE_URL."?url=admin/productmangement");  
                    }
                    else{
                        $_SESSION['username'] = $result[0]['username'];
                        $_SESSION['userid'] = $result[0]['id'];
                        $_SESSION['login'] = true;
        
                        $cartModel = $this->load->model('cartModel');
                        $cartData = $cartModel->checkCart($_SESSION['userid']);
                        if(isset($cartData)){
                            $_SESSION['cartid']=$cartData[0]['id'];
                        }
                        //define("BASE_URL", "http://localhost:3000/index.php");
        
                        global $BASE_URL;
                        header("Location:$BASE_URL");
                    }
                    
                }else{
    
                    $message ="Wrong Password/Username";
                    //header("Location:http://localhost:3000/index.php?url=login");
                    $this->load->view('login', $message);
                    //$this->authentication();
                }
            }  
        
        }
        public function register(){
            $this->load->view('Register');
        }

        public function registersubmit(){
            global $BASE_URL;
            $error = '';
            $success = '';
            $pattern = '/^(03|05|07|08|09)+[0-9]{8}$/';
            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
            if (isset($_POST['btnDK'])) {
                $userModel=$this->load->model('userModel');

                if (empty($_POST['hoten'])) {
                    $error = 'Vui lòng điền họ tên';

                }
                elseif (empty($_POST['tendn'])) {
                    $error = 'Vui lòng điền tên đăng nhập';

                }
                elseif (!(preg_match('/^[a-zA-Z][0-9a-zA-Z_]{6,23}[0-9a-zA-Z]$/', $_POST['tendn']))) {
                    $error = 'Tên đăng nhập không đúng định dạng';
                }
                elseif (empty($_POST['email'])) {
                    $error = 'Vui lòng điền email';
                }
                elseif (empty($_POST['matkhau'])) {
                    $error = 'Vui lòng điền mật khẩu';
                }
                elseif (empty($_POST['nhaplaimk'])) {
                    $error = 'Vui lòng xác nhận lại mật khẩu';
                }
                elseif (empty($_POST['sdt'])) {
                    $error = 'Vui lòng điền số điện thoại';
                }
                elseif (empty($_POST['gioitinh'])) {
                    $error = 'Vui lòng xác nhận giới tính';
                }
                elseif (empty($_POST['region'])) {
                    $error = 'Vui lòng nhập địa chỉ';
                }
                elseif (empty($_POST['city'])) {
                    $error = 'Vui lòng chọn tỉnh/thành phố';

                }
                elseif (empty($_POST['district'])) {
                    $error = 'Vui lòng chọn quận/huyện';
                }
                elseif (empty($_POST['ward'])) {
                    $error = 'Vui lòng chọn xã/phường';

                }
                elseif (empty($_POST['region'])) {
                    $error = 'Vui lòng nhập địa chỉ';
                }
                elseif ($_POST['matkhau'] != $_POST['nhaplaimk']) {
                    $error = 'Mật khẩu nhập lại không khớp';
                }
                elseif (preg_match($regex, $_POST['email'], $match) == 0) {
                    $error = 'Email không đúng định dạng';
                }
                elseif (preg_match($pattern, $_POST['sdt'], $match) == 0) {
                    $error = 'Số điện thoại không hợp lệ';
                }
                else {
                    /*
                    $address = $_POST['diachi'] . ', ' . $_POST['ward'] . ', ' . $_POST['district'] . ', ' . $_POST['city'];
                    $Account = new Users();
                    $Check = $Account->Register($_POST['hoten'], $gender, $_POST['email'], $_POST['sdt'], $address, $_POST['city'], $_POST['tendn'], $_POST['matkhau']);

                    if ($Check) :
                        $success = "<script type = 'text/javascript'>alert('Bạn đã đăng ký thành công');</script>";
                    else :
                        $error = "<script type = 'text/javascript'>alert('Đăng ký thất bại');</script>";
                    */
                    $check=$userModel->check_register($_POST['email'],$_POST['tendn'], $_POST['sdt']);
                    if(!empty($check[0]['username'])){
                        if($check[0]['username']==$_POST['tendn']){
                            $error="Tên đăng nhập này đã được sử dụng!";
                        }
                        elseif($check[0]['phoneNumber']==$_POST['sdt']){
                            $error="Số điện thoại này đã được sử dụng!";
                        }
                        elseif($check[0]['email']==$_POST['email']){
                            $error="Email này đã được sử dụng!";
                        }
                    }
                }
                if($error == ''){
                    $register= $userModel->register($_POST['hoten'], $_POST['gioitinh'], $_POST['email'], $_POST['sdt'], $_POST['region'],
                                                    $_POST['ward'], $_POST['district'], $_POST['city'], $_POST['tendn'], $_POST['matkhau']);
                    if($register ==1){
                        echo "<script type = 'text/javascript'>
                                    alert('Bạn đã đăng ký thành công');
                                    window.location.href ='".$BASE_URL."?url=login';
                        </script>";
                    }
                    else{
                        echo "<script type = 'text/javascript'>alert('Đăng ký thất bại');</script>";
                    }
                }
                else{
                    echo "<script type = 'text/javascript'>
                                alert('".$error."');
                                window.location.href ='".$BASE_URL."?url=login/register';
                    </script>";
                   
                }
            }
        }
        
        public function logout(){
            session_destroy();
            global $BASE_URL;
            header("Location:$BASE_URL");        
        }
    }
?>