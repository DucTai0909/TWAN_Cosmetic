<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/OrderList.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <header data-spy="affix" style="background-color:white">
        <img class="logo" src="/Images_Web/Logo/Logo.svg">
        <div class="heading1">
            CỬA HÀNG TRỰC TUYẾN 24/7 - GIAO HÀNG NHANH CHÓNG
        </div>
        <div class="thanhtimkiem">
            <input class="timkiemsp" type="text" id="mySearch" onkeyup="myFunction()" placeholder="Tìm kiếm sản phẩm" title="Type in a category" />
            <button type="button" class="material-symbols-outlined" id="icon-search">
                search
            </button>
        </div>
        <div class="icon2">
            <button class="material-symbols-outlined" id="icon">
                shopping_cart
            </button>
            <button class="material-symbols-outlined" id="icon">
                account_circle
            </button>
        </div>
        <nav>
            <ul>
                <li><a href="http://localhost:3000/index.php" class="active">Trang chủ</a></li>
                <li>
                    <a href="http://localhost:3000/index.php?url=product">Sản phẩm </a>
                </li>
                <li><a href="http://localhost:3000/index.php?url=voucher">Khuyến mãi</a></li>
                <li><a href="#kienthuc">Kiến thức chăm sóc da</a></li>
                <li><a href="#lienhe">Liên hệ </a></li>
            </ul>
        </nav>
    </header>
    <div class="frame">
        <ul class="breadcrumb">
            <li><a href="#trangchu">Trang chủ</a></li>
            <li>Thông tin đơn hàng</li>
        </ul>
    </div>
    <div class="main">
        <?php
            if(isset($data)){
                for($i=0; $i<count($data);$i++){
                    global $BASE_URL;
                    echo "<div>
                    <a href='".$BASE_URL."?url=order/showorderdetail/".$data[$i]['id']."'>
                        <h3> ".$data[$i]['id']."</h3>
                    </a>
        
                    <div class='tongtien'>
                        <h6>Tổng tiền: </h6>
                        <p>".$data[$i]['total']." đ</p>
                    </div>
                </div>";
                }
            }
        ?>
        
        
        
    </div>
    <img class="logo2" src="/Images_Web/Logo/Logo.svg">
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
</body>

</html>