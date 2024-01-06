<?php
    class nav extends DController{
        public function __construct()
        {
            parent::__construct();
        }
        public function cartcount(){
            $cartModel = $this->load->model('cartModel');
            $countCart = $cartModel->countCart($_SESSION['cartid']);
            return $countCart;
        }
    }
?>
<?php
    global $BASE_URL;
    if(isset($_POST['searchBtn'])){
       $_SESSION['searchProduct'] =$_POST['searchBtn'];
        header("location:".$BASE_URL."?url=product/showsearchproduct/");
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tất cả sản phẩm</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/ProductsPage.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $("#panel").slideDown("slow");
            });
        });

        function login(){
        window.location.href ="http://localhost:3000/index.php?url=login";
    }
    function search(){
        <?php
            global $BASE_URL;
            if(!empty($_POST['searchBtn'])){
            $_SESSION['searchProduct'] =$_POST['searchBtn'];
                header("location:".$BASE_URL."?url=product/showsearchproduct/");
            }
        ?>
    }
    </script>
</head>

<body>
    
        <form method ='POST'>
        <header data-spy="affix" style="background-color:white">   
        <a href="http://localhost:3000/index.php"><img class="logo" src="/Images_Web/Logo/Logo.svg"></a>
    <div class="heading1">
        CỬA HÀNG TRỰC TUYẾN 24/7 - GIAO HÀNG NHANH CHÓNG
    </div>
    <div class="thanhtimkiem">
        <input class="timkiemsp" type="text" name='searchBtn' id="mySearch" onkeyup="myFunction()" placeholder="Tìm kiếm sản phẩm" title="Type in a category" />
        <button  onclick="search()" class="material-symbols-outlined" id="icon-search">
            search
        </button>
    </div>
    <div class="icon2">
        <a href="http://localhost:3000/index.php?url=cart" class="notification">
            <span  class="material-symbols-outlined" id="icon">
            shopping_cart
        </span>
    
            <span class="badge">
            
            <?php
                if(isset($_SESSION['cartid'])){
                    $nav = new nav();
                    $countCart= $nav->cartcount();
                    echo $countCart;
                }
            ?>
            </span>
        </a>

        <div class="accountBtn">
        <button type='button' class="material-symbols-outlined"  name ="loginBtn" id="icon" <?php if(!isset($_SESSION['login'])){echo "onclick='login()'";} ?> >
            account_circle

            <div class="dropdown-content" id="content" <?php if (!isset($_SESSION['login'])) echo "style ='display: none';" ?>>
                <a href="http://localhost:3000/index.php?url=user/infomanagement">Thay đổi thông tin</a>
                <a href="http://localhost:3000/index.php?url=order/showorderlist">Đơn hàng</a>
                <a href="http://localhost:3000/index.php?url=login/logout">Đăng xuất</a>
            </div>
        </div>
        </button>

    </div>          
    <nav >
        <ul>
            <li><a href="http://localhost:3000/index.php" class="active" >Trang chủ</a></li>
            <li>
                <a href="http://localhost:3000/index.php?url=product">Sản phẩm </a>
            </li>
            <li><a href="http://localhost:3000/index.php?url=voucher">Khuyến mãi</a></li>
            <li><a href="#kienthuc">Kiến thức chăm sóc da</a></li>
            <li><a href="#lienhe">Liên hệ </a></li>
        </ul>
    </nav>
    </header>
    </form>
    <form method ='POST' action="http://localhost:3000/index.php?url=product/showproductcondition">
        <div class="frame">
            <ul class="breadcrumb">
            <li><a href="#trangchu">Trang chủ</a></li>
            <li>Sản phẩm</li>
            </ul>
        </div>
        <div class="sapxep">
            Sắp xếp theo
            <?php
                if(isset($data[0]['sort'])){
                    if($data[0]['sort']=="DESC"){
                        echo "<select class='sapxep-select' name='priceSort' onchange='this.form.submit()'>
                                    <option value='DESC'>Giá:Cao đến Thấp</option>
                                    <option value='ASC'>Giá:Thấp đến Cao</option>
                                </select>";
                    }
                    else{
                        echo "<select class='sapxep-select' name='priceSort' onchange='this.form.submit()'>
                                    <option value='ASC'>Giá:Thấp đến Cao</option>
                                    <option value='DESC'>Giá:Cao đến Thấp</option>
                                </select>";
                    }
                }
                else{
                    echo "<select class='sapxep-select' name='priceSort' onchange='this.form.submit()'>
                                    <option value='ASC'>Giá:Thấp đến Cao</option>
                                    <option value='DESC'>Giá:Cao đến Thấp</option>
                                </select>";
                }   
            ?>
            
        </div>
        <section class="row">
            <div class="column left">
                <div id="flip"><h3><u>Danh mục</u></h3></div>
                <div id="panel">
                    <ul>
                        
                        <?php
                            if(isset($data4)){
                                global $BASE_URL;
                                for($i=0; $i<count($data4); $i++){
                                    echo "<li><a href='".$BASE_URL."?url=product/showproduct_category/".$data4[$i]['id']."'>".$data4[$i]['name']." (".$data4[$i]['quantity'].")</a></li>";
                                }
                                echo "<li><a href='".$BASE_URL."?url=product'>Tất cả sản phẩm</a></li>";
                            }
                        ?>
                     
                    </ul>
                </div>
                <div>
                <h3><span class="material-symbols-outlined" id="filter">filter_alt</span><u>Bộ lọc tìm kiếm</u></h3>
                </div>
                <h4>Thương hiệu</h4>
                <?php
                    if(isset($data2)){
                        if(isset($data3)){
                            for($i=0; $i<count($data2); $i++){
                                $check=false;
                                for($j=0; $j<count($data3); $j++){
                                    if($data3[$j] == $data2[$i]['name']){
                                        echo "<input type='checkbox' id='".$data2[$i]['name']."' name='brand[]' value='".$data2[$i]['name']."' checked>
                                                <label for='".$data2[$i]['name']."'> ".$data2[$i]['name']."</label><br>";
                                        $check=true;
                                        break;
                                    }
                                }
                                if($check==false){
                                    echo "<input type='checkbox' id='".$data2[$i]['name']."' name='brand[]' value='".$data2[$i]['name']."'>
                                    <label for='".$data2[$i]['name']."'> ".$data2[$i]['name']."</label><br>";     
                                }
                            }    
                        }
                        else{
                            for($i=0; $i<count($data2); $i++){
                                echo "<input type='checkbox' id='".$data2[$i]['name']."' name='brand[]' value='".$data2[$i]['name']."'>
                                <label for='".$data2[$i]['name']."'> ".$data2[$i]['name']."</label><br>";
                            }     
                        }
                    }
                ?>
                    
                    
                <div>
                    <h3>Giá</h3>
                    <div>
                        <input type="text" placeholder="TỪ" class="khoanggia" id='priceFrom' name="priceFrom" value='<?php if(isset($data[0]['priceFrom'])){echo $data[0]['priceFrom'];}?>'/><span> - </span>
                        <input type="text" placeholder="ĐẾN" class="khoanggia" id='priceTo' name="priceTo" 
                                value='<?php 
                                        if(isset($data[0]['priceTo'])){
                                            if($data[0]['priceTo']!=0){
                                                echo $data[0]['priceTo'];
                                            }
                                        }
                                        ?>'/>
                    </div>
                    <button class="button-apdung" name="apdungBtn">ÁP DỤNG</button>
                </div>
            </div>
            <div class="column right">
                <div class="grid-container">
                    <?php
                        if(isset($data)){
                            for($i=0; $i< count($data); $i++){
                                echo "
                                    <div>
                                    <a href='".$BASE_URL."?url=productDetail/loadproduct/".$data[$i]['product_id']."'>
                                        <img src='".$data[$i]['u_image']."' class='image-product' />
                                        <p class='name-product'>
                                        ".$data[$i]['name']."
                                        </p>                      
                                    </a>
                                    <p class='price-product'>".$data[$i]['price']." đ</p>
                                </div>";
                            }
                        }
                    ?> 
                </div>
            </div>

        </section>
</body>
        </form>

        <div class="pagination">
            <a href="#">❮</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">❯</a>
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
</html>