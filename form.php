<?php session_start(); ?>

<?php 
    
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
        .msg {
            width: 50%;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 40px;
            background-color: tomato;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        require_once ('config.php');
        require_once ('dbhelp.php');
        if(!isset($_SESSION['form'])) {
            $_SESSION['form'] = array();
        }
        // var_dump($_SESSION['form']); exit;
        $error = false;
        $success = false;
        if(isset($_GET['action'])) {
            // var_dump($_GET['action']); exit;
            if($_GET['action'] == 'save') {
                $total_ord = $quantity_ord = 0;
                if(!empty($_GET)) {
                    // var_dump($_GET);
                    if(isset($_GET['total_ord'])) {
                        $_SESSION["form"][0] = $_GET['total_ord'];
                    }
                    if(isset($_GET['quantity_ord'])) {
                        $_SESSION["form"][1] = $_GET['quantity_ord'];
                    }
                }
            } elseif($_GET['action'] == 'submit') {
                if (isset($_POST['save-click'])) {
                    $quantity_ord = (int)$_SESSION["form"][1];
                    $total_ord = (int)$_SESSION["form"][0];
                    // var_dump($quantity_ord); exit;
                    if(empty($_POST['name_cus'])) {
                        $error = "Bạn chưa nhập Tên!";
                    }
                    elseif(empty($_POST['phone_cus'])) {
                        $error = "Bạn chưa nhập Số Điện Thoại!";
                    }
                    elseif(empty($_POST['address_cus'])) {
                        $error = "Bạn chưa nhập Địa Chỉ Giao Hàng!";
                    }elseif($quantity_ord == 0) {
                        $error = "Bạn chưa mua Sản Phẩm nào cả!";
                    }
                    if ($error == false && !empty($quantity_ord)) {
                        // var_dump($quantity_ord); exit;
                        // var_dump($quantity_ord); exit;
                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                        $sql1 = "INSERT INTO customer (name_cus, phone_cus, address_cus) VALUE ('".$_POST['name_cus']."', '".$_POST['phone_cus']."', '".$_POST['address_cus']."')";
                        mysqli_query($conn, $sql1);
                        $id_cus = $conn->insert_id;
                        mysqli_close($conn);
                        // var_dump($id_cus); exit;
                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                        $sql2 = "INSERT INTO web_maytinh.order (date_ord, status_ord, comments, id_cus) VALUE (now(), 'Shipping', ' ',  '$id_cus')";
                        mysqli_query($conn, $sql2);
                        $id_ord = $conn->insert_id;
                        mysqli_close($conn);
                        // var_dump($id_ord); exit;
                        $id_product = time();
                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                        $sql3 = "INSERT INTO web_maytinh.orderdetail (id_ord, id_product, quantity_ord, total_ord) VALUE ('$id_ord', '$id_product', '$quantity_ord', '$total_ord')";
                        mysqli_query($conn, $sql3);
                        mysqli_close($conn);
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    }
                }
            }
        }
    ?>
    <div class="panel">
        <?php if (!empty($error)) { ?> 
                <div id="notify-msg" class="msg">
                    <?= $error ?></br> <a href="javascript:history.back()">Quay lại</a>
                </div>
        <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg" class="msg">
                    <?= $success ?>. <a href="index.php">Tiếp tục mua hàng</a>
                </div>
        <?php } else { ?>
        <div class= "panel-heading">Điền Đầy Đủ Thông Tin Để Hoàn Thành Hóa Đơn</div>
        <form method="POST" action="form.php?action=submit">
            <!-- <div>
            <input id = 'quantity_ord' name = 'quantity_ord' value=<?=$quantity_ord?>>
            <input id = 'total_ord' name = 'total_ord' value=<?=$total_ord?>>
            </div> -->
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
                <input class="btn-save" name="save-click" type="submit" value = "Thanh Toán"/>
            </div>
        </form>
        <div class= "panel-bodying">
            <form action="cart.php">
                <button class="btn-back" style="margin-left: 650px;">Quay lại Giỏ Hàng</button> 
            </form>
        </div>
        <?php } ?>
    </div>
</body>
    <script type="text/javascript">
        // function saveData() {
        //     $quantity_ord = document.getElementById('quantity_ord').value;
        //     $total_ord = document.getElementById('total_ord').value;
        //     echo $quantity_ord;
        // }
    </script>
</html>