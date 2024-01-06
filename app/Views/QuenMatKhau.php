<?php
    include "../Php/Connect.php";
    if(isset($_POST['forgetPassword'])){
        $checkEmpty =checkEmpty();
        $checkEmail;
    }
    function checkEmpty(){
        if(empty($_POST['email'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập email');</script>";   
            return 1;
        }
        elseif(empty($_POST['password'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa nhập mật khẩu');</script>";   
            return 1;
        }
        elseif(empty($_POST['retypepassword'])){
            echo "<script type = 'text/javascript'>alert('Bạn chưa xác nhận mật khẩu');</script>";   
            return 1;
        }
    }
    function checkEmail(){
        global $con;
        $sql = "SELECT * FROM user WHERE email='".$_POST['email']."'";
        $result =$con->query($sql);
        if($result->num_rows >0){
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu </title>
    <link rel="stylesheet" href="../Css/DangNhap.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">

</head>
<body>
    <div class="flex-container">
        <div class="flex-item-left">
            <img src="..\Images\T_W_A_N-removebg-preview.png"/>
        </div>
        <div >
            <form class="flex-item-right" method ="POST" >
                <p>
                    <span class="dangnhap">Quên mật khẩu</span>
                </p>
                <p>
                <input type="email" id="email" name="email" class="input" placeholder="Email" />

                </p>
                
                <p>
                <input type="text" id="tendn" name="password" class="input" placeholder="Mật khẩu mới" />

                </p>
                <p>
                    <input type="password" id="matkhau" name="retypepassword" class="input" placeholder="Nhập lại mật khẩu" />
                </p>
                <button class="btdangnhap" name ="forgetPassword" value ="Login">Xác nhận</button>
                
                
            </form>
            
        </div>
    </div>
  
</body>
</html>