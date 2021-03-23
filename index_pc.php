<?php
    $name_pc = $firm_pc = $price_pc = "";
    if(!empty($_POST)) {
        if (isset($_POST['name_pc'])) {
            $name_pc = $_POST['name_pc'];
        }
        if (isset($_POST['firm_pc'])) {
            $firm_pc = $_POST['firm_pc'];
        }
        if (isset($_POST['price_pc'])) {
            $price_pc = $_POST['price_pc'];
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
        <div class="panel-heading">Tìm Kiếm Máy Tính</div>
        <form method="POST" action="">
            <div class="panel-bodying">
                <label for="name_pc" placeholder="Tìm theo tên">Tên Máy Tính</label>
            </div>
            <div class="panel-bodying">
                <input class="form-control" type="text" name="name_pc" id="name_pc" placeholder="Tìm theo tên">
            </div>
            <div class="panel-bodying">
                <label for="firm_pc">Tên Hãng của Máy Tính</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="firm_pc" name="firm_pc">
                    <option value="">--Chọn hãng--</option>
    <?php
        require_once ('dbhelp.php');
        $spl = 'SELECT DISTINCT firm_pc FROM kDAbiPc3dp.computer';
        $firm_pcList = executeResult($spl);
        foreach ($firm_pcList as $item) {
            echo '<option value="'.$item['firm_pc'].'">'.$item['firm_pc'].'</option>';
        }
    ?>
                </select>
            </div>
            <div class="panel-bodying">
                <label for="price_pc">Giá</label>
            </div>
            <div class="panel-bodying">
                <select class="form-control" id="price_pc" name="price_pc">
                    <option value="">--Chọn giá--</option>
                    <option value='1'>0 - 10,000,000</option>
                    <option value='2'>10,000,000 - 20,000,000</option>
                    <option value='3'>20,000,000 - 30,000,000</option>
                    <option value='4'>30,000,000 - 40,000,000</option>
                    <option value='5'>trên 40,000,000</option>
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
                        <th>Số Lượng</th>
                        <th></th>
                    </tr>
                    <tbody>
<?php
require_once ('dbhelp.php');
if(isset($_POST['price_pc']) && $price_pc != "") {
    if (isset($_POST['price_pc']) && $price_pc == 5) {
        $spl = 'SELECT * FROM kDAbiPc3dp.computer where name_pc like "%'.$name_pc.'%" and firm_pc like "%'.$firm_pc.'%" and price_pc > '.$price_pc.'*8000000';
    }
    else $spl = 'SELECT * FROM kDAbiPc3dp.computer where name_pc like "%'.$name_pc.'%" and firm_pc like "%'.$firm_pc.'%" and price_pc <= '.$price_pc.'*10000000 and price_pc >= '.$price_pc.'*10000000-10000000';
}
else $spl = 'SELECT * FROM kDAbiPc3dp.computer where name_pc like "%'.$name_pc.'%" and firm_pc like "%'.$firm_pc.'%"';
$pcList = executeResult($spl);
foreach ($pcList as $pc) { ?>
        <tr>
            <td style="font-size: 16px"><?=$pc['id_pc']?></td>
            <td style="font-size: 16px"><?=$pc['name_pc']?></td>
            <td><img src="<?=$pc['img_pc']?>" style="max-width: 150px"></td>
            <td style="font-size: 16px"><?=number_format($pc['price_pc'])?></td>
            <td style="font-size: 16px"><?=$pc['firm_pc']?></td>
            <td style="font-size: 14px"><?=$pc['detail_pc']?></td>
            <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                <td><input type="text" value="1" name="quantity[<?=$pc['id_pc']?>]" size="1"/></td>
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
    <script type="text/javascript">
    </script>
</body>
</html>