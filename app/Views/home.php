<?php
session_start();

/*
//echo $_SESSION['username'];
if(isset($_POST['loginBtn'])){
    if(empty($_SESSION['username'])){
        header('Location: DangNhap.php');
    }
}
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trang chủ</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/HomePage.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <form method ="POST">
    <?php 
        require_once "./system/libs/NavigationMenu.php";
    ?>
    
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="/Images_Web/Images .svg/Banner/Welcome_Banner1.svg" alt="Banner 1" class="banner">
              </div>
          
              <div class="item">
                <img src="/Images_Web/Images .svg/Banner/Banner2.svg" alt="Banner 2">
              </div>
          
              <div class="item ">
                <img src="/Images_Web/Images .svg/Banner/Flashsale_Banner3.svg" alt="Banner 2">
              </div>
            </div>
          
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


    </div>
    <div class="frame2">
        <h1>SẢN PHẨM MỚI</h1>
        <div class="flex-container">
            <div>
                <img src="../Images_Web/Products/Manyo/cleansing_soda_foam-removebg-preview.png" class="image-product" />
                <p class="name-product"> Manyo Factory Pore Cleansing Soda Foam 150ml</p>
                <pre class="cost-product">475.000 <u>đ</u></pre>
            </div>
            <div>
                <img src="../Images_Web/Products/Manyo/pure_deep_cleansing_foam-removebg-preview.png" class="image-product" />
                <p class="name-product">
                    Manyo Factory Pure & Deep Cleansing Soda Foam 100ml
                </p>
                <pre class="cost-product">327.000 <u>đ</u></pre>

            </div>
            <div>
                <img src="../Images_Web/Products/Manyo/vegan_foam-removebg-preview (1).png" class="image-product" />
                <p class="name-product">  Manyo Our Vegan Heartleaf Cica Cleansing Foam 120ml</p>
                <pre class="cost-product">315.000 <u>đ</u></pre>
            </div>
            <div>
                <img src="../Images_Web/Products/Manyo/serum_manyo-removebg-preview.png" class="image-product" />
                <p class="name-product"> MANYO FACTORY Bifida Biome Complex Ampoule 50ml</p>
                <pre class="cost-product">820.000 <u>đ</u></pre>
            </div>
        </div>
    </div>
    <div class="frame3">
        <hr />
        <h1>BÁN CHẠY NHẤT</h1>
        <img src="../Images_Web/Products/Cocoon/Bộ sản phẩm Cocoon.jpg" class="frame3-1" />
        <div>
            <img src="../Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg" class="frame3-2" />
            <img src="../Images_Web/Products/Cocoon/Tinh chất bí đao Cocoon.jpg" class="frame3-3" />
            <button class="button1">
                TÌM HIỂU THÊM <span class="material-symbols-outlined" id="icon-arrow">
                    trending_flat
                </span>
            </button>

        </div>

        <img src="../Images_Web/Products/Cocoon/Nước bí đao cân bằng Cocoon.jpg" class="frame3-4" />

        <div class="frame3-text">
            <p>
                Bí đao thuộc họ Cucurbitaceae, là một loại thực vật được sử dụng phổ biến ở Việt Nam, Thái Lan, Ấn độ và những nước nhiệt đới khác.
            </p>
            <p>
                Trong quả bí đao có chứa các amino acid, mucins, muối khoáng, vitamin B và C.. Những nghiên cứu về loại quả này xác định có 2 loại triterpenes đó là alunsenol và mutiflorenol có tác dụng chống oxi hóa.
            </p>
            <p>
                Theo sách y học cổ truyền, bí đao có đặc tính làm mát, làm giảm nhiệt, kháng viêm và diệt khuẩn giúp hạn chế mụn trứng cá, mụn viêm và làm giảm vết bỏng.
            </p>
        </div>
    </div>
    <section>
        <hr />
        <h1>BÀI VIẾT</h1>
        <div class="flex-container2">
            <div>
                <img src="../Images_Web/Posters/Bài viết/255851207_4488384907923767_5021908811223513261_n_d1d0829cfb.jpg" class="image-blog" />
                <article>
                    <h6>23.09.2021</h6>
                    <h6>
                        DA DẦU, MỤN SẼ “ĂN CHAY” NHƯ THẾ NÀO?
                    </h6>
                    <p>
                        Vẻ đẹp của làn da được xem như một tấm gương phản chiếu tốt nhất về tình trạng sức khỏe thể chất và tinh thần của chúng ta. Giống như các loại da khác, da dầu cũng sẽ đạt được trạng thái khỏe mạnh ...
                    </p>
                    <button class="button-post">
                        TÌM HIỂU THÊM
                        <span class="material-symbols-outlined" id="icon-arrow">
                            trending_flat
                        </span>
                    </button>
                </article>
            </div>
            <div>
                <img src="../Images_Web/Posters/Bài viết/dewy-skin-insta-jin-4.jpg" class="image-blog" />
                <article>
                    <h6>02.10.2022</h6>
                    <h6>XU HƯỚNG LÀM ĐẸP DEWY SKIN “LÀM MƯA LÀM GIÓ” CỘNG ĐỒNG LÀM ĐẸP</h6>
                    <p>
                        Trong thời gian gần đây, xu hướng làm đẹp dewy skin với làn da sáng bóng như phủ sương đang liên tục được “lăng xê” trên các sàn diễn thời trang và được giới làm đẹp nhiệt liệt ủng hộ.
                    </p>
                    <button class="button-post">
                        TÌM HIỂU THÊM
                        <span class="material-symbols-outlined" id="icon-arrow">
                            trending_flat
                        </span>
                    </button>

                </article>
            </div>
        </div>
    </section>
    <a href="http://localhost:3000/index.php"><img class="logo2" src="/Images/Logo.svg"> </a>
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
</body>
</html>