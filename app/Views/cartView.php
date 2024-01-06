<?php
global $BASE_URL;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Giỏ hàng</title>
    <link rel="stylesheet" href="/app/Views/Css/CartPage.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <form method="POST" autocomplete="off" action="http://localhost:3000/index.php?url=cart/order">
    <a href="http://localhost:3000/index.php"><img class="logo" src="/Images_Web/Logo/Logo.svg"></a>
    <div class="heading1">
        CỬA HÀNG TRỰC TUYẾN 24/7 - GIAO HÀNG NHANH CHÓNG
    </div>
    <div class="thanhtimkiem">
        <input class="timkiemsp" type="text" id="mySearch" name='searchBtn' onkeyup="myFunction()" placeholder="Tìm kiếm sản phẩm" title="Type in a category" />
        <button type="button" class="material-symbols-outlined" id="icon-search">
            search
        </button>
    </div>
    <div class="icon2">
        <button class="material-symbols-outlined" id="icon">
            shopping_cart
        </button>
        <div class="accountBtn">
        <button class="material-symbols-outlined" name ="loginBtn" id="icon">
            account_circle
            <div class="dropdown-content" id="content" <?php if (empty($_SESSION['username'])) echo "style ='display: none';" ?>>
                <a href="http://localhost:3000/index.php?url=user/infomanagement">Thay đổi thông tin</a>
                <a href="http://localhost:3000/index.php?url=order/showorderlist">Đơn hàng</a>
                <a href="http://localhost:3000/index.php?url=login/logout">Đăng xuất</a>
            </div>
        </div>      
        </button>
    </div>
    </div>
    <?php include_once './system/libs/nav.php'; ?>

    <div class="frame">
        Trang chủ/Giỏ hàng
    </div>
    <h1>Giỏ hàng</h1>
    <div class="row">
        <div class="column left">

            <div class="title">
                <div class="title-sanpham">Sản phẩm</div>
                <div class="title-giatien">Giá tiền </div>
                <div class="title-soluong">Số lượng</div>
                <div class="title-thanhtien">Thành tiền</div>
            </div>
            
            
            <?php if(isset($_SESSION['login']) && isset($_SESSION['cartid']) && isset($data)) {
                $total =0;
                for($i=0; $i <count($data);$i++){
                     global $BASE_URL;
                
                echo"
            <div class='flex-container'>

                <div class='product'>
                    <img src='".$data[$i]['u_image']."' width='150' height='150'/>
                    <a href='".$BASE_URL."?url=productDetail/loadproduct/".$data[$i]['product_id']."' class='name-product'>".$data[$i]['name']." ".$data[$i]['variant']."</a>
                </div>
                <div class='title-giatien'>
                    <input type='text' class='giatien' value='".$data[$i]['price']."đ' readonly>

                </div>
                <div class='title-soluong'>
                    <input type='number' onchange='status_update(value, ".$data[$i]['ivn_id'].",\"$BASE_URL\")' id='quantity' name='quantity' min='1' max='1000' class='soluong' value='".$data[$i]['quantity']."'>
                </div>
                <div class='title-giatien'>
                    <input type='text' class='giatien' value='".$data[$i]['price'] *$data[$i]['quantity']."' readonly>

                </div>
                <div id='button-xoa' >
                    <input type ='button' id='btxoa' onclick='deleteProduct(".$data[$i]['ivn_id'].", \"$BASE_URL\")' value ='Xóa'>
                </div>
            </div>
            ";
            $total +=$data[$i]['price'] *$data[$i]['quantity'];
            $_SESSION['oldTotal'] =$total;
        }
                }
            ?>
            <div class="giohang-frame2">
                <div class="tamtinh">
                    <p>Tạm tính: <?php if(isset($_SESSION['login']) && isset($_SESSION['cartid']) &&isset($data)){echo $total;} ?></p>
                    <p style="color: #909497">(Đã bao gồm VAT)</p>
                    <button  class="button-dathang" value='dathang' name='btnDatHang'>Tiến hành đặt hàng</button>


                </div>
              
                <a href="#" class="muahang">
                    <span class="material-symbols-rounded">
                        arrow_circle_left
                    </span>
                    Tiếp tục mua hàng
                </a>

            </div>


        </div>
        <div class="column right">
            <h3>Hóa đơn của bạn</h3>
            <div class="hoadon">
                <p>Tạm tính:<?php if(isset($_SESSION['login'])&& isset($_SESSION['cartid']) &&isset($data)){echo " ".$total;} ?></p>
                <p>Giảm giá:</p>
                <p>Khuyến mãi đã nhận được:</p>
            </div>
            <div class="hoadon-frame2">
                <p>Tổng cộng:<?php if(isset($_SESSION['login'])&& isset($_SESSION['cartid']) &&isset($data)){echo " ".$total;} ?></p>
                <p style="color: #909497">(Đã bao gồm VAT)</p>

            </div>

        </div>
        <button  class="button-dathang2" value='dathang' name='btnDatHang'>Tiến hành đặt hàng</button>
    </div>
    <a href="http://localhost:3000/index.php"><img class="logo2" src="/Images/Logo.svg"></a>
    
    <?php include_once './system/libs/footer.php' ?>
</form>
<script type="text/javascript">
    function status_update(value, id, url){
        window.location.href= url+"?url=cart/updatecart/"+id+"/"+value;
    }

    function deleteProduct(id, url){
        //alert(id);
       window.location.href =url+"?url=cart/deleteproduct/"+id;
       //return false;
    }
    
</script>
</body>
</html>