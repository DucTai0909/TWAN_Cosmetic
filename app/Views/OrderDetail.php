<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chi tiết đơn hàng</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/OrderDetail.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <form id='myForm' method='POST' action='http://localhost:3000/index.php?url=order/cancelorder'>
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
                <li><a href="#trangchu">Trang chủ</a></li>
                <li>
                    <a href="#sanpham">Sản phẩm </a>
                </li>
                <li><a href="#khuyenmai">Khuyến mãi</a></li>
                <li><a href="#kienthuc">Kiến thức chăm sóc da</a></li>
                <li><a href="#lienhe">Liên hệ </a></li>
            </ul>
        </nav>
    </header>

    <div class="frame">
        <ul class="breadcrumb">
            <li><a href="#trangchu">Trang chủ</a></li>
            <li>Thông tin tài khoản</li>
        </ul>
    </div>
    <div class="main">
        <div class="thongtin">
            <h2>Thông tin đơn hàng</h2>
            <div class="title">
                <h4 class="title-sanpham">Sản phẩm</h4>
                <h4 class="title-giatien">Giá tiền </h4>
                <h4 class="title-soluong">Số lượng</h4>
                <h4 class="title-thanhtien">Thành tiền</h4>
            </div>
            <?php
                if(isset($data)){
                    global $BASE_URL;
                    for($i=0; $i<count($data); $i++){
                        echo "<div class='flex-container'>
                        <div class='product'>
                            <img src='".$data[$i]['u_image']."' id='image-product' />
                            <a href='".$BASE_URL."?url=productDetail/loadproduct/".$data[$i]['product_id']."' class='name-product'>".$data[$i]['name']." ".$data[$i]['variant']."</a>
                        </div>
                        <div class='title-giatien'>
                            <input type='text' class='giatien' value='".$data[$i]['price']." đ' readonly>
        
                        </div>
                        <div class='title-soluong'>
                            <p class='soluong' > ".$data[$i]['quantity']."</p>
                        </div>
                        <div class='title-giatien'>
                            <input type='text' class='giatien' value='".$data[$i]['quantity']* $data[$i]['price']." đ' readonly>
        
                        </div>
                        </div>";
                    }
                    echo "<div class='tongtien'>
                    <span>
                        <h5>Tổng tiền: </h5>
                        <h6>".$data[0]['total']." đ</h6>
                    </span>";
                }
            ?>
            
                <div>
                    <button name='cancelOrderBtn' class="button-dathang" onclick="submitForm()">Hủy đơn hàng</button>

                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($data)){
            echo "<input type='hidden' name='order_id' value='".$data[0]['order_id']."'/>";
        }
    ?>
    </form>
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
    <script>
        function submitForm(){
            if(confirm("Xác nhận hủy đơn hàng?")){
                document.getElementById("myForm").submit();
            }
        }
    </script>
</body>

</html>