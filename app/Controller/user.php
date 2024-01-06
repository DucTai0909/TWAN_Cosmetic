<?php
    class user extends DController{
        public function __construct()
        {   
            session_start();
            parent::__construct();
        }
        public function infomanagement(){
            if(isset($_SESSION['login'])){
                $userModel = $this->load->model('userModel');  
                $userInfo = $userModel->showUserInfo($_SESSION['userid']);
                $this->load->view('InfoManagement', $userInfo);
            }
            else{
                $this->load->view('InfoManagement');
            }
           

        }
        public function updateinfo(){
            //session_start();
            $checkEmpty ='';
            $checkValid ='';

            $userModel = $this->load->model('userModel');
           
                $checkValid = $userModel->checkUpdate($_SESSION['userid'], $_POST['newUserName'], $_POST['newPhoneNumber']);
                if(empty($_POST['newUserName'])){
                    $checkEmpty= "Bạn chưa nhập tên đăng nhập";   
                }
                elseif(empty($_POST['newFullname'])){
                    $checkEmpty= 'Bạn chưa nhập họ tên!';
    
                }
                elseif(empty($_POST['newPhoneNumber'])){
                    $checkEmpty= "Bạn chưa nhập Số điện thoại!";
                }
                elseif(empty($_POST['newRegion'])){
                    $checkEmpty= "Bạn chưa nhập Địa chỉ!";
            
                }
                elseif(empty($_POST['city'])){
                    $checkEmpty= "Bạn chưa chọn Tỉnh/thành phố!";
                }
                elseif(empty($_POST['district'])){
                    $checkEmpty= "Bạn chưa chọn quận/huyện!";
                }
                elseif(empty($_POST['ward'])){
                    $checkEmpty= "Bạn chưa chọn phường/xã!";
                }
            
            
            $userInfo = $userModel->showUserInfo($_SESSION['userid']);
            if($checkEmpty == '' && $checkValid =='valid'){
                $result =$userModel->updateinfo($_SESSION['userid'], $_POST['newUserName'], $_POST['newFullname'], $_POST['newPhoneNumber'], $_POST['newRegion'], $_POST['ward']
                                                , $_POST['district'], $_POST['city']);
                if($result ==1){
                    header("Location:http://localhost:3000/index.php?url=login/logout");
                }
            }
            elseif($checkEmpty !='' && $checkValid =='valid'){
                $userInfo[0]['checkmsg'] =$checkEmpty;
                $this->load->view('InfoManagement', $userInfo);
            }
            elseif($checkEmpty =='' && $checkValid !='valid'){
                $userInfo[0]['checkmsg'] = $checkValid;
                $this->load->view('InfoManagement', $userInfo);
            }
            elseif($checkEmpty !='' && $checkValid !='valid'){
                $userInfo[0]['checkmsg'] =$checkEmpty;
                $this->load->view('InfoManagement', $userInfo);
            }
    }
}
?>