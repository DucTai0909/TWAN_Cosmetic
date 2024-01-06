<?php
/*
include "Users.php";
include "dbconn.php";
$error = '';
$success = '';
$pattern = '/^(03|05|07|08|09)+[0-9]{8}$/';
$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
if (isset($_POST['btnDK']) && !empty($_POST)) :
    if (!empty($_POST['email'])) :

        $sql = "SELECT * FROM user WHERE email=:email";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            array(
                ':email' => $_POST['email']
            )
        );
        $email = $stmt->fetch(PDO::FETCH_ASSOC);
    endif;
    if (!empty($_POST['tendn'])) :
        $sql = "SELECT * FROM `user` WHERE username=:tendn";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            array(
                ':tendn' => $_POST['tendn']
            )
        );
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    endif;
    if (!empty($_POST['sdt'])) :
        $sql = "SELECT * FROM `user` WHERE phoneNumber=:phonenumber";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            array(
                ':phonenumber' => $_POST['sdt']
            )
        );
        $sdt = $stmt->fetch(PDO::FETCH_ASSOC);
    endif;
    if (isset($_POST['gioitinh']) && !empty($_POST['gioitinh'])) :
        if ($_POST['gioitinh'] == "nam") :
            $gender = 1;
        else :
            $gender = 0;
        endif;
    endif;
    if (empty($_POST['hoten'])) :
        $error = 'Vui lòng điền họ tên';
    elseif (empty($_POST['tendn'])) :
        $error = 'Vui lòng điền tên đăng nhập';
    elseif (!(preg_match('/^[a-zA-Z][0-9a-zA-Z_]{6,23}[0-9a-zA-Z]$/', $_POST['tendn']))) :
        $error = 'Tên đăng nhập không đúng định dạng';
    elseif (isset($user['username']) && !empty($user['username'])) :
        $error = 'Tên đăng nhập đã tồn tài';
    elseif (empty($_POST['email'])) :
        $error = 'Vui lòng điền email';
    elseif (isset($email['email']) && !empty($email['email'])) :
        $error = 'Email đã tồn tại';
    elseif (empty($_POST['matkhau'])) :
        $error = 'Vui lòng điền mật khẩu';
    elseif (empty($_POST['nhaplaimk'])) :
        $error = 'Vui lòng xác nhận lại mật khẩu';
    elseif (empty($_POST['sdt'])) :
        $error = 'Vui lòng điền số điện thoại';
    elseif (isset($sdt['phoneNumber']) && !empty($sdt['phoneNumber'])) :
        $error = 'Số điện thoại đã tồn tại';
    elseif (empty($_POST['gioitinh'])) :
        $error = 'Vui lòng xác nhận giới tính';
    elseif (empty($_POST['diachi'])) :
        $error = 'Vui lòng nhập địa chỉ';
    elseif (empty($_POST['city'])) :
        $error = 'Vui lòng chọn tỉnh/thành phố';
    elseif (empty($_POST['district'])) :
        $error = 'Vui lòng chọn quận/huyện';
    elseif (empty($_POST['ward'])) :
        $error = 'Vui lòng chọn xã/phường';
    elseif ($_POST['matkhau'] != $_POST['nhaplaimk']) :
        $error = 'Mật khẩu nhập lại không khớp';
    elseif (preg_match($regex, $_POST['email'], $match) == 0) :
        $error = 'Email không đúng định dạng';
    elseif (preg_match($pattern, $_POST['sdt'], $match) == 0) :
        $error = 'Số điện thoại không hợp lệ';
    else :
        $address = $_POST['diachi'] . ', ' . $_POST['ward'] . ', ' . $_POST['district'] . ', ' . $_POST['city'];
        $Account = new Users();
        $Check = $Account->Register($_POST['hoten'], $gender, $_POST['email'], $_POST['sdt'], $address, $_POST['city'], $_POST['tendn'], $_POST['matkhau']);

        if ($Check) :
            $success = "<script type = 'text/javascript'>alert('Bạn đã đăng ký thành công');</script>";
        else :
            $error = "<script type = 'text/javascript'>alert('Đăng ký thất bại');</script>";
        endif;
    endif;
endif;
$db = null;
*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản</title>
    <link rel="stylesheet" href="/app/Views/Css/Register.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">


</head>

<body>
    <div class="flex-container">
        <div class="flex-item-left">
            <img src="/Images/Logo.svg">
        </div>
        <div style="background-color: white ">
            <form class="flex-item-right" method="POST" action="http://localhost:3000/index.php?url=login/registersubmit">
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
                <?php header('Location: ../Php/DangNhap.php'); ?>
                <?php  ?>
            <?php endif; ?>
            </p>
            <p>
                <input type="text" id="hoten" name="hoten" value="<?php echo isset($_POST['hoten']) ? $_POST['hoten'] : '' ?>" class="input" placeholder="Họ và tên" />
            </p>
            <p>
                <input type="text" id="tendn" name="tendn" value="<?php echo isset($_POST['tendn']) ? $_POST['tendn'] : '' ?>" class="input" title="Tên đăng nhập bắt dầu bằng chữ cái, có ít nhất 6 ký tự trở lên" placeholder="Tên đăng nhập" />
            </p>
            <p>
                <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="input" title="Email phải có ký tự @" placeholder="Email" />
            </p>
            <p>
                <input type="password" id="matkhau" name="matkhau" value="<?php echo isset($_POST['matkhau']) ? $_POST['matkhau'] : '' ?>" class="input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mật khẩu phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Mật khẩu" />
            <div id="message">
                <h3>Mật khẩu phải đáp ứng:</h3>
                <p id="letter" class="invalid"><b>Có ít nhất 1 chữ cái thường</b></p>
                <p id="capital" class="invalid"><b>Có ít nhất 1 chữ cái in hoa</b></p>
                <p id="number" class="invalid"><b>Có ít nhất 1số</b></p>
                <p id="length" class="invalid"><b>Tối thiểu 8 ký tự</b></p>
            </div>
            </p>
            <p>
                <input type="password" id="nhaplaimk" name="nhaplaimk" value="<?php echo isset($_POST['nhaplaimk']) ? $_POST['nhaplaimk'] : '' ?>" class="input" placeholder="Nhập lại mật khẩu" />
            </p>
            <input type="tel" id="sdt" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : '' ?>" class="input" placeholder="Số điện thoại" />
            <div class="radio">
                <p class="radio-nam">
                    <label for="nam">Nam</label>
                    <input type="radio" id="nam" name="gioitinh" value="1" class="nut-radio" />
                </p>
                <p class="radio-nu">
                    <label for="nu">Nữ</label>
                    <input type="radio" id="nu" name="gioitinh" value="0" class="nut-radio" />
                </p>
            </div>
            <p class="diachi">
                        <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                            <option value="" selected style="margin-right: 0.5cm;">Chọn tỉnh thành</option>
                        </select>
                    </p>
                    <p class="diachi">
                        <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </p>
                    <p class="diachi">
                        <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </p>
                    <p class="diachi">
                        <input type='text' class="region" id="region" name="region" placeholder="Nhập địa chỉ">
                    </p>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                <script>
                    var citis = document.getElementById("city");
                    var districts = document.getElementById("district");
                    var wards = document.getElementById("ward");
                    var Parameter = {
                        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
                        method: "GET",
                        responseType: "application/json",
                    };
                    var promise = axios(Parameter);
                    promise.then(function(result) {
                        renderCity(result.data);
                    });

                    function renderCity(data) {
                        for (const x of data) {
                            citis.options[citis.options.length] = new Option(x.Name, x.Name);
                        }
                        citis.onchange = function() {
                            district.length = 1;
                            ward.length = 1;
                            if (this.value != "") {
                                const result = data.filter(n => n.Name === this.value);

                                for (const k of result[0].Districts) {
                                    district.options[district.options.length] = new Option(k.Name,k.Name);
                                }
                            }
                        };
                        district.onchange = function() {
                            ward.length = 1;
                            const dataCity = data.filter((n) => n.Name === citis.value);
                            if (this.value != "") {
                                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                                for (const w of dataWards) {
                                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                                }
                            }
                        };
                    }
                </script>
            </p>
            <button class="btthoat" >Thoát </button>
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