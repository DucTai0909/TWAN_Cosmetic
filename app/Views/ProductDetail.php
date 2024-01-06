<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chi tiết sản phẩm</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/Views/Css/ProductDetail.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>

    
    <?php 
      include_once './system/libs/NavigationMenu.php';
    ?>
    <form method='POST' action="http://localhost:3000/index.php?url=productDetail/addtocart">
    <div class="frame">
      <ul class="breadcrumb">
        <?php
          if(isset($data)){
            echo "<li><a href='".$BASE_URL."'>Trang chủ</a></li>
            <li><a href='".$BASE_URL."?url=product'>Sản phẩm</a></li>
            <li>".$data[0]['brand_name']."</li>";
          }
        ?>
        
      </ul>
    </div>
    <div class="main">
        
      <!-- Container for the image gallery -->
      <div class='container'>
          <!-- Full-width images with number text -->
          <?php
            if(isset($data) && !isset($data2)){
              for($i=0; $i<count($data);$i++){
                echo "<div class='mySlides'>
                <img src='".$data[$i]['u_image']."' style='width:100%'>
            </div>";
              }
            }
            elseif(isset($data2)){
              echo "<div class='mySlides'>
                <img src='".$data2[0]['u_image']."' style='width:100%'>
            </div>";
            }
          ?>

          <div class='mySlides'>
              <img src='/Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg' style='width:100%'>
          </div>

          <div class='mySlides'>
            <!-- <div class="numbertext">3 / 3</div> -->
              <img src='/Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg' style='width:100%'>
          </div>
          
        <!-- Next and previous buttons -->
        <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
        <a class='next' onclick='plusSlides(1)'>&#10095;</a>
        <!-- Thumbnail images -->
        <div class='row'>
          
        <?php
            if(isset($data) && !isset($data2)){
              for($i=0; $i<count($data);$i++){
                echo "<div class='column'>
                <img class='demo cursor' src='".$data[$i]['u_image']."' style='width:100%' onclick='currentSlide(2)' alt='Cinque Terre'>
              </div> ";
              }
            }
            elseif(isset($data2)){
              echo "<div class='column'>
                <img class='demo cursor' src='".$data2[0]['u_image']."' style='width:100%' onclick='currentSlide(2)' alt='Cinque Terre'>
              </div> ";
            }
          ?>

          <div class='column'>
            <img class='demo cursor' src='/Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg' style='width:100%' onclick='currentSlide(2)' alt='Cinque Terre'>
          </div>
          <div class='column'>
            <img class='demo cursor' src='/Images_Web/Products/Cocoon/Gel bí đao rửa mặt Cocoon.jpg' style='width:100%' onclick='currentSlide(3)' alt='Mountains and fjords'>
          </div>
        </div>
      </div>
        <div>
          <?php
            if(isset($data)){
              echo "<h2>".$data[0]['name']."</h2>";
            }
          ?>

          <?php
          if(isset($data) && !isset($data2)){
            $priceFrom =$data[0]['price'];
            $priceTo =$data[0]['price'];

            for($i=0; $i<count($data); $i++){
              if($data[$i]['price']< $priceFrom){
                $priceFrom =$data[$i]['price'];
              }
              elseif($data[$i]['price']> $priceTo){
                $priceTo =$data[$i]['price'];
              }
            }
            echo " <div class='giatien'>
            <span>".$priceFrom." đ</span> - <span>".$priceTo." đ</span>
          </div>";
          }
          elseif(isset($data2)){
            echo " <div class='giatien'>
            <span>".$data2[0]['price']." đ</span>
          </div>";
          }
          ?>
          <div>
            <label>Loại</label>
            <select name='ivn_id'<?php echo "onchange='ivn_choosen(value, ".$data[0]['product_id'].")'";?>>
              <option value=0>Chọn một tùy chọn</option>

              <?php
                if(isset($data)){
                  for($i=0; $i<count($data); $i++){
                    if(isset($data2)){
                      if($data[$i]['ivn_id'] == $data2[0]['ivn_Choosen']){
                        echo "<option value='".$data[$i]['ivn_id']."' selected>".$data[$i]['variant']."</option>";
                      }
                      else{
                        echo "<option value='".$data[$i]['ivn_id']."'>".$data[$i]['variant']."</option>";
                      }
                    }
                    else{
                      echo "<option value='".$data[$i]['ivn_id']."'>".$data[$i]['variant']."</option>";
                    }
                  }
                }
              ?>
            </select>
          </div>


          
          <div class="buttons_added">
            <input class="minus is-form" type="button" value="-">
            <?php
          if(isset($data2)){
            echo "<input aria-label='quantity' class='input-quantity' max='".$data2[0]['quantity']."' min='1' name='ivn_quantity' type='number' value='1'>";
          }
          else{
            echo "<input aria-label='quantity' class='input-quantity' max='0' min='0' name='ivn_quantity' type='number' value='0'>";
          }
          ?>

            <input class="plus is-form" type="button" value="+">
          </div>
          <div class="chucnang">
            <button class="btthem" name='addToCartBtn'>
              Thêm vào giỏ hàng
              <span class="material-symbols-outlined" >
              add_shopping_cart
              </span>
            </button>
            <button class="btthem" name='orderBtn'>
              Mua ngay
            </button>
          </div>
        </div>
      
  </div>
  <div class="chitietsp">
    <div class="thongsosp">
    <div>
    <h3 > Thông số sản phẩm</h3>
      <table>      
        <tr>
          <td>Danh mục</td>
          <td>Sắc Đẹp > Chăm sóc da mặt >Tinh chất dưỡng </td>
        </tr>
        <tr>
          <td>Thương hiệu</td>
          <td>Cocoon</td>
        </tr>
        <tr>
          <td>Danh mục</td>
          <td>Sắc Đẹp > Chăm sóc da mặt >Tinh chất dưỡng </td>
        </tr>
      </table>
    </div>
      <div class="thongtinsp">
      <h3 > Thông tin sản phẩm</h3>
      <p>
      Mặt nạ bí đao gồm thành phần chính là bí đao thanh mát, bổ sung thêm rau má và tinh dầu tràm trà giúp giảm nhờn, làm thông thoáng lỗ chân lông, cải thiện nhanh tình trạng mụn, làm dịu vết đỏ, mang lại làn da sạch mụn và mịn màng.
      </p>
      <pre>
Công dụng
    • Làm thoáng lỗ chân lông
    • Giảm nhanh tình trạng mụn
    • Kiểm soát lượng dầu thừa, ngăn ngừa mụn ẩn hình thành
    • Cấp ẩm cho da, giúp làm da luôn rạng rỡ, căng bóng và mịn màng.
      </pre>
      
      </div>
    </div>

    <div class="goiy">
      <h3>Gợi ý cho bạn</h3>
      <div>
        <img src="/Images_Web/Products/Paula_s Choices/kem_dưỡng_ẩm_giàu_chất_điện_giải-removebg-preview.png" class="image-goiy" />
        <a href="#">
          <p class="name-product">
            Kem dưỡng ẩm giàu chất điện giải water - Infusing Electrolyte Moisturizer (fullsize)
          </p>                      
        </a>            
      </div>

      <div>
          <img src="/Images_Web/Products/Paula_s Choices/kem_dưỡng_ẩm_giàu_chất_điện_giải-removebg-preview.png" class="image-goiy" />
          <a href="#">
          <p class="name-product">
            Kem dưỡng ẩm giàu chất điện giải water - Infusing Electrolyte Moisturizer (fullsize)
          </p>                      
          </a>                    
          <p class="price-product">892.500 đ</p>
      </div>
    </div>
     
    </div>
    <?php
      if(isset($data)){
        global $BASE_URL;
        echo "<input type ='hidden' name='goback' value='".$BASE_URL."?url=productDetail/loadproduct/".$data[0]['product_id']."'";
      }
    ?>
    <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
    </form>

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
    <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
      }
</script>

<script>//<![CDATA[
$('input.input-quantity').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
})
//]]></script>

<script>
  function ivn_choosen(ivn_id, product_id){
    window.location.href ="http://localhost:3000/index.php?url=productDetail/loadinventory/"+product_id+"/"+ivn_id;
  }
</script>
</body>
</html>