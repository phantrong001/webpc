<?php
    $name_acc = $firm_acc = $kind_acc = "";
    if(!empty($_POST)) {
        if (isset($_POST['name_acc'])) {
            $name_acc = $_POST['name_acc'];
        }
        if (isset($_POST['kind_acc'])) {
            $kind_acc = $_POST['kind_acc'];
        }
        if (isset($_POST['firm_acc'])) {
            $firm_acc = $_POST['firm_acc'];
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
        <div class="panel-heading">Tìm Kiếm Phụ Kiện Máy Tính</div>
        <form method="POST" action="">
            <div class="panel-bodying">
                <label for="name_pro">Tên Sản Phẩm</label>
            </div>
            <div class="panel-bodying">
                <input class="form-control" type="text" name="name_acc" id="name_acc" placeholder="Tìm theo tên">
            </div>
            <div class="panel-bodying">
                <label>Loại Phụ Kiện</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="kind_acc" name="kind_acc">
                    <option value="">--Chọn Loại--</option>
    <?php
        require_once ('dbhelp.php');
        $spl = 'SELECT DISTINCT kind_acc FROM accessories';
        $firm_accList = executeResult($spl);

        foreach ($firm_accList as $item) {
            echo '<option value="'.$item['kind_acc'].'">'.$item['kind_acc'].'</option>';
        }
    ?>
                </select>
            </div>
            <div class="panel-bodying">
                <label>Tìm Theo Hãng</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="firm_acc" name="firm_acc">
                    <option value="">--Chọn Hãng--</option>
    <?php
        require_once ('dbhelp.php');
        $spl = 'SELECT DISTINCT firm_acc FROM accessories';
        $firm_accList = executeResult($spl);

        foreach ($firm_accList as $item) {
            echo '<option value="'.$item['firm_acc'].'">'.$item['firm_acc'].'</option>';
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
                        <th>Mã SP</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Hãng</th>
                        <th>Thông tin Chi Tiết</th>
                        <th></th>
                    </tr>
                    <tbody>
<?php
require_once ('dbhelp.php');
$spl = 'SELECT * FROM web_maytinh.accessories where name_acc like "%'.$name_acc.'%" and firm_acc like "%'.$firm_acc.'%" and kind_acc like "%'.$kind_acc.'%"';
$accList = executeResult($spl);
$index=1;
foreach ($accList as $acc) {
    echo '<tr>
            <th style="font-size: 16px">'.($index++).'</th>
            <th style="font-size: 16px">'.$acc['name_acc'].'</th>
            <th><img src="'.$acc['img_acc'].'" style="max-width: 150px"></th>
            <th style="font-size: 16px">'.number_format($acc['price_acc']).'</th>
            <th style="font-size: 16px">'.$acc['firm_acc'].'</th>
            <th style="font-size: 14px">'.$acc['detail_acc'].'</th>
            <th><button class="btn-save">Mua</button></th>
        </tr>';
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