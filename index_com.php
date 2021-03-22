<?php
    $name_com = $firm_com = $kind_com = "";
    if(!empty($_POST)) {
        if (isset($_POST['name_com'])) {
            $name_com = $_POST['name_com'];
        }
        if (isset($_POST['kind_com'])) {
            $kind_com = $_POST['kind_com'];
        }
        if (isset($_POST['firm_com'])) {
            $firm_com = $_POST['firm_com'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua bán máy tính, phụ kiện máy tính các loại</title>
    <style type=text/css>
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
            width: 80%;
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
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 25px;
            font-weight: bold;
        }
        .form-control {
            width: 98%;
            font-size: 25px;
            font-weight: bold;
        }
        .btn-back {
            font-size: 24px;
            background-color: tomato;
            font-weight: bold;
        }
        .table {
            width: 100%;
            border: greenyellow 3px;
            border-style: solid;
            color: greenyellow;
        }
        .table th {
            border: solid greenyellow 1px;
        }
        .table td {
            border: solid greenyellow 1px;
        }
        .btn-save {
            font-size: 25px;
            font-weight: bold;
            background-color: greenyellow;
        }
    </style>
</head>
<body>
    <!-- body sẽ gồm các thẻ div(dòng) để tạo giao diện -->
    <div class="panel">
        <div class="panel-heading">Tìm Kiếm Linh Kiện Máy Tính</div>
        <form method="POST" action="">
            <div class="panel-bodying">
                <label for="name_com">Tên Sản Phẩm</label>
            </div>
            <div class="panel-bodying">
                <input class="form-control" type="text" name="name_com" id="name_com" placeholder="Tìm theo tên">
            </div>
            <div class="panel-bodying">
                <label for="kind_com">Loại Linh Kiện</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="kind_com" name="kind_com">
                    <option value="">--Chọn Loại--</option>
    <?php
        require_once('dbhelp.php');
        $spl = 'SELECT DISTINCT kind_com FROM components';
        $firm_comList = executeResult($spl);
        foreach ($firm_comList as $item) {
            echo '<option value="'.$item['kind_com'].'">'.$item['kind_com'].'</option>';
        }
    ?>
                </select>
            </div>
            <div class="panel-bodying">
                <label for="firm_com">Tên Hãng của Linh Kiện</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="firm_com" name="firm_com">
                    <option value="">--Chọn Hãng--</option>
    <?php
        require_once('dbhelp.php');
        $spl = 'SELECT DISTINCT firm_com FROM components';
        $firm_comList = executeResult($spl);
        foreach ($firm_comList as $item) {
            echo '<option value="'.$item['firm_com'].'">'.$item['firm_com'].'</option>';
        }
    ?>
                </select>
            </div>
            <div class="panel-bodying">
                <button class="btn-normal" onclick="find()" style="margin-left: 550px;">Tìm</button>
            </div>
        </form>
        <div class="panel-heading">Danh Sách Tìm Kiếm</div>
        <div class="panel-bodying">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Hãng</th>
                        <th>Thông tin Chi Tiết</th>
                        <th></th>
                    </tr>
                    <tbody>
<?php
    require_once('dbhelp.php');
    $spl = 'SELECT * FROM web_maytinh.components where name_com like "%'.$name_com.'%" and firm_com like "%'.$firm_com.'%" and kind_com like "%'.$kind_com.'%"';
    $comList = executeResult($spl);
    $index = 1;
    foreach ($comList as $com) {?>
        <tr>
            <td style="font-size: 16px"><?=$com['id_com']?></td>
            <td style="font-size: 16px"><?=$com['name_com']?></td>
            <td><img src="<?=$com['img_com']?>" style="max-width: 150px"></td>
            <td style="font-size: 16px"><?=number_format($com['price_com'])?></td>
            <td style="font-size: 16px"><?=$com['firm_com']?></td>
            <td style="font-size: 14px"><?=$com['detail_com']?></td>
            <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                <td><input type="text" value="1" name="quantity[<?=$com['id_com']?>]" size="1"/></td>
                <td>
                    <a href="cart.php?action=add"><button class="btn-save">Mua</button></a>
                </td>
            </form>
        </tr>
    <?php
    }
    ?>                        
                    </tbody>
                </thead>
            </table>
        </div>
        <div class="panel-end">
            <form action="index.php">
                <button class="btn-back" type="submit" style="margin-left: 150px;">Quay Lại Trang Chủ</button>
            </form>
            <form action="cart.php">
                <button class="btn-next" type="submit" style="margin-left: 1200px;">Giỏ Hàng</button>
            </form>
        </div>
    </div>
    <script src = "main.js">
    </script>
</body>
</html>