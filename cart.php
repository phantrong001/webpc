<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng của Bạn</title>
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
            font-weight: bold;
            color: gold ;
            display: block;
            text-align: center;
        }
        .panel-bodying {
            width: 60%;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 25px;
            color: gold ;
        }
        .btn-normal {
            font-size: 25px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            background-color: cyan;
        }
        .btn-next {
            font-size: 24px;
            background-color:indianred;
            font-weight: bold;
        }
        .panel-bodying label {
            font-weight: bold;
            font-size: 25px;
        }
        .form-control {
            width: 60%;
            font-size: 25px;
        }
        .btn-back {
            font-size: 24px;
            background-color: tomato;
            font-weight: bold;
        }
        .table {
            width: 100%;
            border: gold 3px;
            border-style: solid;
        }
        .table th {
            border: solid gold 1px;
        }
        .table td {
            font-size: 20px;
            color: rgb(71, 255, 163);
            border: solid gold 1px;
        }
        .btn-save {
            font-size: 24px;
            background-color: rgb(71, 255, 163);
            font-weight: bold;
        }
        .btn-del {
            font-size: 24px;
            background-color: red;
            font-weight: bold;
            color: black;
            border: solid black 1px;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="panel-heading">Giỏ Hàng Của Bạn</div>
        <form id="cart-form" method = "POST" action = "cart.php?action=submit">
            <div class="panel-bodying">
                <table class="table">
                    <tr>
                            <th>No</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>&nbsp</th>
                    </tr>
<?php
    require_once ('dbhelp.php');
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_GET['action'])) {
        function updateData($add = false) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$id]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$id] += $quantity;
                    } else {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
            }
        }
        switch ($_GET['action']) {
            case "add" :
                updateData(true);
                header('Location: cart.php');
                break;
            case "delete" :
                if(isset($_GET['id_pc'])) {
                    unset($_SESSION["cart"][$_GET['id_pc']]);
                } else if (isset($_GET['id_acc'])) {
                    unset($_SESSION["cart"][$_GET['id_acc']]);
                }
                else if (isset($_GET['id_com'])) {
                    unset($_SESSION["cart"][$_GET['id_com']]);
                }
                header('Location: cart.php');
                break;
            case "submit" :
                if($_POST['update-click']) {
                    updateData();
                }
                header('Location: cart.php');
                break;
        }
    }
    $quantity_ord = 0;
    $total = 0;
    $num = 1;
    // $_SESSION['cart'] = array();
    // var_dump($_SESSION["cart"]); exit;
    foreach($_SESSION["cart"] as $index => $quan) {
        if($index < 100) {
            $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE id_pc = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <td><?=$num++;?></td>
                <td><?=$row['name_pc']?></td>
                <td><?=number_format($row['price_pc'])?></td>
                <td><input type="text" value="<?=$_SESSION["cart"][$row['id_pc']]?>" name = "quantity[<?=$row['id_pc']?>]" size=1></td>
                <td><?=number_format($row['price_pc'] * $_SESSION["cart"][$row['id_pc']])?></td>
                <td>
                    <a class="btn-del" href="cart.php?action=delete&id_pc=<?=$row['id_pc']?>">Xóa</a>
                </td>
            </tr>
<?php
            $total +=  $row['price_pc'] * $_SESSION["cart"][$row['id_pc']];
            $quantity_ord += $_SESSION["cart"][$row['id_pc']];
        }
        if($index > 100 && $index < 200) {
            $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE id_acc = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <td><?=$num++;?></td>
                <td><?=$row['name_acc']?></td>
                <td><?=number_format($row['price_acc'])?></td>
                <td><input type="text" value="<?=$_SESSION["cart"][$row['id_acc']]?>" name = "quantity[<?=$row['id_acc']?>]" size=1></td>
                <td><?=number_format($row['price_acc'] * $_SESSION["cart"][$row['id_acc']])?></td>
                <td>
                    <a class="btn-del" href="cart.php?action=delete&id_acc=<?=$row['id_acc']?>">Xóa</a>
                </td>
            </tr>
<?php
            $total +=  $row['price_acc'] * $_SESSION["cart"][$row['id_acc']];
            $quantity_ord += $_SESSION["cart"][$row['id_acc']];
        }
        if($index > 200) {
            $sql = "SELECT * FROM kDAbiPc3dp.components WHERE id_com = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <td><?=$num++;?></td>
                <td><?=$row['name_com']?></td>
                <td><?=number_format($row['price_com'])?></td>
                <td><input type="text" value="<?=$_SESSION["cart"][$row['id_com']]?>" name = "quantity[<?=$row['id_com']?>]" size=1></td>
                <td><?=number_format($row['price_com'] * $_SESSION["cart"][$row['id_com']])?></td>
                <td>
                    <a class="btn-del" href="cart.php?action=delete&id_com=<?=$row['id_com']?>">Xóa</a>
                </td>
            </tr>
<?php
            $total +=  $row['price_com'] * $_SESSION["cart"][$row['id_com']];
            $quantity_ord += $_SESSION["cart"][$row['id_com']];
        }    
    }
    
?>
                    <tr id="row-total">
                        <td>&nbsp</td>
                        <td>Tổng Chi Phí</td>
                        <td>&nbsp</td>
                        <td><?=number_format($total)?></td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                    </tr>
                </table>
            </div>
            <div class = "panel-end">
                <input class="btn-save" type = "submit" name = "update-click" value = "Cập Nhật" style="margin-left: 1050px; margin-top:20px;"/>
            </div>
        </form>
        <div class="back-form">
            <a href="form.php?action=save&quantity_ord=<?=$quantity_ord?>&total_ord=<?=$total?>">
                <button class="btn-save" type="submit" style="margin-left: 1050px; margin-top:20px;">Tạo Hóa Đơn và Thanh Toán</button>
            </a>
        </div>
        <div class="panel-end">
            <form action="index.php">
                <button class="btn-back" type="submit" style="margin-left: 300px; margin-top:20px;">Quay Lại Trang Chủ</button>
            </form>
        </div>
    </div>
</body>
</html>