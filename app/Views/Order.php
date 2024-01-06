<?php
    global $BASE_URL;
    
    if(isset($data[0]['msg'])){
        echo "<script type='text/javascript'>alert('".$data[0]['msg']."');</script>";
    }


?>  
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đặt hàng</title>
    <link rel="stylesheet" href="/app/Views/Css/Order.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <form method='POST' action="http://localhost:3000/index.php?url=order/discount">
    <header>
    <div class="row">
        <div class="column left">        
            <img src="/Images/Logo.svg">
        </div>        
        <div class="column right">
           <h1>   Đặt hàng  </h1>          
        </div>
    </div>
    
    
    </header>
    <section class="main">
        <div class="row2">
        <div class="column2 left">
            
            <h2>
            <span class="material-symbols-outlined" id="icon">
            location_on
            </span>
            Địa chỉ nhận hàng
            </h2>
            <div class="address-details">
                <div>
                <span><?php if(isset($_SESSION['cartid']) && isset($data2)){ echo $data2[0]['Name']; } ?></span> - 
                <span> <?php if(isset($_SESSION['cartid']) && isset($data2)){ echo $data2[0]['Phone']; } ?> </span> - 
                <span><?php ?></span>
                </div>           
            </div>
            <h3><?php if(isset($_SESSION['cartid']) && isset($data2)){ echo $data2[0]['Region'].", ".$data2[0]['Ward'].", ".$data2[0]['District'].", ".$data2[0]['City']; } ?>
            </h3>
           
        </div>
           
        <div class="column2 right">
            <button class="button-thaydoi" name="changeAdress" >Thay đổi </button>
        </div>
        </div>
        <div class="order-details">
            <div class="title">
                <h4 class="title-sanpham">Sản phẩm</h4>
                <h4 class="title-giatien">Giá tiền </h4>
                <h4 class="title-soluong">Số lượng</h4>
                <h4 class="title-thanhtien">Thành tiền</h4>
            </div>

            <?php
            if(isset($_SESSION['login']) && isset($_SESSION['cartid'])){
                for($i=0; $i<count($data); $i++){
                    echo "</div>
                    <div class='flex-container'>
                        <div class='product'>
                            <img src='".$data[$i]['u_image']."' />
                            <a class='name-product' readonly>".$data[$i]['name']." ".$data[$i]['variant']."</a>
                        </div>
                        <div class='title-giatien'>
                            <input type='text' class='giatien' readonly value='".$data[$i]['price']."'>
        
                        </div>
                        <div class='title-soluong'>
                            <input type='number' id='quantity' readonly name='quantity' min='1' max='1000' class='soluong' value='".$data[$i]['quantity']."'>
                        </div>
                        <div class='title-giatien'>
                            <input type='text' class='giatien' readonly value='".$data[$i]['price'] *$data[$i]['quantity']."'>
        
                        </div>
                    </div>
                </div>";

                }
            }
            ?>
            
                
            
        <div class="discount">
            <h2> <span class="material-symbols-outlined" id="icon">
            confirmation_number
            </span> Mã giảm giá</h2>
            <input type="text" class="voucher" name='voucher'>
            <button class="button-apdung" name='discountBtn'>Áp dụng</button>
        </div>
        <div class="total">
        <h5>Tổng tiền</h5>
        <div class="invoice">
            <p>Tạm tính: <?php echo $_SESSION['oldTotal']; ?></p>
            <p>Giảm giá: <?php if(isset($_SESSION['newTotal'])){echo $_SESSION['oldTotal'] - $_SESSION['newTotal']; }?></p>
            <p>Tổng cộng: <?php if(isset($_SESSION['newTotal'])){
                                    echo $_SESSION['newTotal']; 
                                }
                                else{
                                    echo $_SESSION['oldTotal'];  
                                }?>
            </p>
            <p style="color:#909497; font-weight:200">(Đã bao gồm VAT)</p>
        </div>
        <div class="dathang">
        <hr>    
        <input type='button' class="button-dathang" onclick='orderBtn("<?php echo $BASE_URL; ?>")' value='Tiến hành đặt hàng'>
        </div>
        </div>
        
    </section>
    <img class="logo2" src="/Images/Logo.svg">
    <footer>
        <div class="nav2">
            <a href="#info">Về chúng tôi </a>
            <a href="#sanpham">Sản phẩm </a>
            <a> </a>
            <a href="#hotro">Hỗ trợ khách hàng</a>
            <a href="#lienhe">Liên hệ </a>
        </div>
        <p>
            <hr class="line2" />
        </p>

        <pre class="footer-text">
            Địa chỉ: Khu phố 6, Phường Linh Trung, Thành phố Thủ Đức, Thành phố Hồ Chí Minh - Email: cskh@hotro.twancosmestics.vn
                        Chịu Trách Nhiệm Quản Lí Nội Dung: Nguyễn Ngọc Hiền - Điện thoại liên hệ: 0812922218
                                © 2022 Twan Comestics. All rights reserved.
        </pre>
    </footer>
    
    </form>
    <script type="text/javascript">
        function orderBtn(url){
            var flag = confirm("Xác nhận đặt hàng ?");
            if(flag)
                window.location.href =url+"?url=order/addorder";
            else
            window.location.href =url+"?url=order";
        }
        
    </script>
</body>
</html>