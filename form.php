<?php
    $name_cus = $phone_cus = $address_cus = "";
    if(!empty($_POST)) {
        if(isset($_POST['name_cus'])) {
            $name_cus = $_POST['name_cus'];
        }
        if(isset($_POST['phone_cus'])) {
            $phone_cus = $_POST['phone_cus'];
        }
        if(isset($_POST['address_cus'])) {
            $address_cus = $_POST['address_cus'];
        }
    }
    require_once('dbhelp.php');
    $sqltest = "SELECT max(id_cus) FROM customer";
    $index = executeSingleResult($sqltest);
    $sql = "INSERT INTO customer (id_cus, name_cus, phone_cus, address_cus) VALUE ('$index','$name_cus', '$phone_cus', '$address_cus')";
    execute($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Người Dùng</title>
    <style type="text/css">
        .panel {
            min-height: 100vh;
            width: 100%;
            background-image: url('image/background2(1).jpg');
            background-repeat: no-repeat;
            padding: 10px;
            background-position:center top;
            background-attachment:fixed;
            background-size: auto;
        }
        .panel-heading {
            font-size: 50px;
            display: block;
            text-align: center;
            font-weight: bold;
            color: gold ;
        }
        .panel-bodying {
            width: 60%;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 25px;
            color: gold ;
        }
        .panel-bodying label {
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 25px;
            font-weight: bold;
        }
        .form-control {
            width: 98%;
            font-weight: bold;
        }
        .btn-save {
            font-size: 25px;
            font-weight: bold;
            background-color: greenyellow;
        }
        .btn-back {
            font-size: 24px;
            background-color: tomato;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class= "panel-heading">Điền Đầy Đủ Thông Tin Để Hoàn Thành Hóa Đơn</div>
        <form method="POST" action="">
            <div class= "panel-bodying">
                <label for="name_cus">Họ Và Tên</label>
                <input class="form-control" type="text" id="name_cus" name="name_cus" placeholder="Nhập Tên">
            </div>
            <div class= "panel-bodying">
                <label for="phone_cus">Số Điện Thoại</label>
                <input class="form-control" type="text" id="phone_cus" name="phone_cus" placeholder="Nhập Số Điện Thoại">
            </div>
            <div class= "panel-bodying">
                <label for="address_cus">Địa Chỉ</label>
                <input class="form-control" type="text" id="address_cus" name="address_cus" placeholder="Nhập địa chỉ nhận hàng">
            </div>
            <div class= "panel-bodying">
                <form action="index.php">
                    <button class="btn-save" onclick="compeleteSave()">Tạo Hóa Đơn</button>
                </form>
            </div>
        </form>
        <div class= "panel-bodying">
            <form action="cart.php">
                <button class="btn-back" style="margin-left: 650px;">Quay lại Giỏ Hàng</button> 
            </form>
        </div>

    </div>
</body>
    <script type="text/javascript">
        function compeleteSave() {
            alert("Cảm ơn bạn đã mua hàng! Bạn sẽ nhận được cuộc gọi từ shipper!!")
        }
    </script>
</html>