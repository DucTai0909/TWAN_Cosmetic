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
        //echo $_POST['searchBtn'];
        $_SESSION['searchProduct'] =$_POST['searchBtn'];
        header("location:".$BASE_URL."?url=product/showsearchproduct/");
    }
    
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Navigation Menu</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/NavigationMenu.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <form method='POST'>
<header data-spy="affix" style="background-color:white">   
    <a href="http://localhost:3000/index.php"><img class="logo" src="/Images_Web/Logo/Logo.svg"></a>
    <div class="heading1">
        CỬA HÀNG TRỰC TUYẾN 24/7 - GIAO HÀNG NHANH CHÓNG
    </div>
    <div class="thanhtimkiem">
        <input class="timkiemsp" type="text" name='searchBtn' id="mySearch" onkeyup="myFunction()" placeholder="Tìm kiếm sản phẩm" title="Type in a category" />
        <button onclick="search()" class="material-symbols-outlined" id="icon-search">
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
    </form>
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
    <
 <script>
    function login(){
        window.location.href ="http://localhost:3000/index.php?url=login";
    }
    function search(){
        <?php
            global $BASE_URL;
            if(isset($_POST['searchBtn'])){
            $_SESSION['searchProduct'] =$_POST['searchBtn'];
                header("location:".$BASE_URL."?url=product/showsearchproduct/");
            }
        ?>
    }
</script>
</body>
</html>