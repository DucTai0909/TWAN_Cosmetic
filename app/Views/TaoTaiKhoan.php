<?php
/*
include_once '../Php/Connect.php';
$error = '';
$success = '';
$dkmk = '';
if (isset($_POST['btnDK'])) {
    $fullname = $_POST['hoten'];
    $username = $_POST['tendn'];
    $password = $_POST['matkhau'];
    $repass = $_POST['nhaplaimk'];
    $phonenumber = $_POST['sdt'];
    if (isset($_POST['gioitinh'])) {
        $gender = $_POST['gioitinh'];
    } else {
        $gender = false;
    }
    $address = $_POST['diachi'];
    $state = $_POST['tinh'];


    if ($fullname == '') {
        $error = 'Vui lòng điền họ tên';
    } elseif ($username == '') {
        $error = 'Vui lòng điền tên đăng nhập';
    } elseif ($password == '') {
        $error = 'Vui lòng điền mật khẩu';
    } elseif ($repass == '') {
        $error = 'Vui lòng xác nhận lại mật khẩu';
    } elseif ($phonenumber == '') {
        $error = 'Vui lòng điền số điện thoại';
    } elseif ($gender == false) {
        $error = 'Vui lòng xác nhận giới tính';
    } elseif ($address == '') {
        $error = 'Vui lòng nhập địa chỉ';
    } elseif ($state == '') {
        $error = 'Vui lòng chọn thành phố';
    } elseif ($password != $repass) {
        $error = 'Mật khẩu nhập lại không khớp';
    } else {
        $pattern = '#^?[\d]3?-?[\d]2?-[\d]{2}\.[\d]{3}-[\d]{3}$#';
        $sql = "SELECT * FROM `user` WHERE username='$username'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $error = 'Tên đăng nhập đã tồn tại';
        } elseif (preg_match($pattern, $phonenumber, $match)==1) {
            $error = 'Số điện thoại không hợp lệ';
        } else {
            if ($gender == "Nam") {
                $gioitinh = 1;
            } else {
                $gioitinh = 0;
            }
            $query = "INSERT INTO `user`(`fullname`,`gender`,`phoneNumber`,`address`,`city`,`username`,`role_id`,`password`,`created_at`,`modifiled_at`) VALUES ('$fullname',$gioitinh,'$phonenumber','$address','$state','$username',11,'$password',CURDATE(),CURDATE())";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script type = 'text/javascript'>alert('Đăng ký thành công');</script>";
                header("Location: ../Php/DangNhap.php");
            } else {
                $error = 'Đăng ký thất bại';
            }
        }
    }
}
*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản</title>
    <link rel="stylesheet" href="/app/Views/Css/TaoTaiKhoan.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">

</head>

<body>
    <div class="flex-container">
        <div class="flex-item-left">
            <img src="/Images/Logo.svg">
        </div>
        <div style="background-color: white ">
            <form class="flex-item-right" method="POST">
                <p>
                    <span class="taotk">Tạo tài khoản</span>
                    <?php if (isset($error) && !empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success) && !empty($success)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            </p>
            <input type="text" id="hoten" name="hoten" class="input" placeholder="Họ và tên" />
            <p>
                <input type="text" id="tendn" name="tendn" class="input" placeholder="Tên đăng nhập" />
            </p>
            <span>

            </span>
            <p>
                <input type="password" id="matkhau" name="matkhau" class="input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mật khẩu phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Mật khẩu" />
            <div id="message">
                <h3>Mật khẩu phải đáp ứng:</h3>
                <p id="letter" class="invalid"><b>Có ít nhất 1 chữ cái thường</b></p>
                <p id="capital" class="invalid"><b>Có ít nhất 1 chữ cái in hoa</b></p>
                <p id="number" class="invalid"><b>Có ít nhất 1số</b></p>
                <p id="length" class="invalid"><b>Tối thiểu 8 ký tự</b></p>
            </div>
            </p>
            <p>
                <input type="password" id="nhaplaimk" name="nhaplaimk" class="input" placeholder="Nhập lại mật khẩu" />
            </p>
            <input type="tel" id="sdt" name="sdt" class="input" placeholder="Số điện thoại" />
            <div class="radio">
                <p class="radio-nam">
                    <label for="nam">Nam</label>
                    <input type="radio" id="nam" name="gioitinh" value="Nam" class="nut-radio" />
                </p>
                <p class="radio-nu">
                    <label for="nu">Nữ</label>
                    <input type="radio" id="nu" name="gioitinh" value="Nu" class="nut-radio" />
                </p>
            </div>
            <p>
                <input type="text" id="diachi" name="diachi" class="input" placeholder="Địa chỉ" />
            </p>
            <p>
                <input type="text" id="tinh" name="tinh" class="input" placeholder="Tỉnh/Thành phố" />
            </p>
            <button class="btdangki" name="btnDK">Đăng kí </button>
            </form>
        </div>
        <script>
            var myInput = document.getElementById("matkhau");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }

            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }

            myInput.onkeyup = function() {
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }


                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>
    </div>
</body>

</html>