<?php
    require_once ('dbhelp.php');
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
        <div class="panel-bodying">
            <label for="name_pc" placeholder="Tìm theo tên">Tên Máy Tính</label>
        </div>
        <div class="panel-bodying">
            <input class="form-control" type="text" name="name_pro" id="name_pro" placeholder="Tìm theo tên">
        </div>
        <div class="panel-bodying">
            <label for="firm_pc">Tên Hãng của Máy Tính</label>
        </div>
        <div class="panel-bodying">
            <select class="form-control" id="firm_pc" name="firm_pc">
                <option value="">--Chọn hãng--</option>
<?php
    $spl = 'SELECT DISTINCT firm_pc FROM computer';
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
                <option value='1'>5,000,000 - 10,000,000</option>
                <option value='2'>10,000,000 - 20,000,000</option>
                <option value='3'>20,000,000 - 30,000,000</option>
                <option value='4'>trên 30,000,000</option>
            </select>
        </div>
        <div class="panel-bodying">
            <button class="btn-normal" onclick="find()" style="margin-left: 550px;">Tìm</button>
        </div>
        <div class="panel-heading">Danh Sách Tìm Kiếm</div>
        <div class="panel-bodying">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Cấu Hình</th>
                        <th>Giá</th>
                        <th>Hãng</th>
                        <th>Sản Xuất</th>
                        <th>Thông tin Chi Tiết</th>
                        <th></th>
                    </tr>
                    <tbody>
<?php
$spl = 'SELECT * FROM computer';
$pcList = executeResult($spl);
$index = 1;
foreach ($pcList as $pc) {
    echo '<tr>
            <th style="font-size: 16px">'.($index++).'</th>
            <th style="font-size: 16px">'.$pc['name_pc'].'</th>
            <th><img src="'.$pc['img_pc'].'" style="max-width: 200px"></th>
            <th style="font-size: 16px">'.$pc['config_pc'].'</th>
            <th style="font-size: 16px">'.number_format($pc['price_pc']).'</th>
            <th style="font-size: 16px">'.$pc['firm_pc'].'</th>
            <th style="font-size: 16px">'.$pc['maker_pc'].'</th>
            <th style="font-size: 14px">'.$pc['detail_pc'].'</th>
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
    <script type="text/javascript">
    </script>
</body>
</html>