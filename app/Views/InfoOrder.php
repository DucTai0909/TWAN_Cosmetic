<?php

    if(isset($data)){
        
        echo "<script type='text/javascript'>alert('".$data."');</script>";
    }
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt hàng</title>
    <link rel="stylesheet" href="/app/Views/Css/InfoOrder.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body>        
        <form method='POST' action="<?php global $BASE_URL; echo $BASE_URL; ?>/?url=order/changeinfoorder">
            <h1>Thông tin đặt hàng</h1>
            <table> 
               
                <tr>
                    <td><label> Họ và tên  </label></td>
                    <td>    
                        <input type="text" name='cusname'>
                    </td>
                </tr>                      
                <tr>
                    <td> <label>  Số điện thoại </label></td>
                    <td>
                        <input type="text" maxlength="10" name='cusphone'>
                    </td>               
                </tr>
                <tr>
                    <td> <label>  Email </label></td>
                    <td>
                        <input type="email" name="cusemail">
                    </td>                    
                </tr>
                <tr>
                    <td> <label>  Địa chỉ </label></td> 
                    <td>
                    <input type="text" name="cusaddress">
                    </td>                                  
                </tr>
                <tr>
                    <td><label>  Tỉnh/Thành phố </label></td>
                    <td>
                        <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                        <option value="" selected >Chọn tỉnh thành</option>
                        </select>
                    </td>                                                                                           
                </tr>
                <tr>
                    <td> <label>  Quận/Huyện </label></td> 
                    <td>                           
                        <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">  
                        <option value="" selected>Chọn quận huyện</option>      
                        </select>  
                        </td>                      
                                                                                       
                </tr>
                <tr>
                    <td> <label>  Phường/Xã </label></td> 
                    <td>
                        <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </td>                                  
                </tr>
                <tr>
                    <td></td>
                    <td><button name='change'>Thay đổi</button></td>
                </tr>
            </table>       
            
        </form>
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
        promise.then(function (result) {
        renderCity(result.data);
        });

        function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != ""){
            const result = data.filter(n => n.Name === this.value);

            for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Name);
            }
            }
        };
        district.onchange = function () {
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
</body>
</html>