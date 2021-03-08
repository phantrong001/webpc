<?php
    require_once('dbhelp.php');
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
        <div class="panel-heading">Tìm Kiếm Linh Kiện Máy Tính</div>
        <div class="panel-bodying">
            <label for="name_com">Tên Sản Phẩm</label>
        </div>
        <div class="panel-bodying">
            <input class="form-control" type="text" name="name_com" id="name_com" placeholder="Tìm theo tên">
        </div>
        <div class="panel-bodying">
            <label for="firm_com">Tên Hãng của Linh Kiện</label>
        </div>
        <div class="panel-bodying">
            <select class="form-control" id="firm_com" name="firm_com">
                <option value="">--Chọn Hãng--</option>
<?php
    $spl = 'SELECT DISTINCT firm_com FROM components';
    $firm_comList = executeResult($spl);
    foreach ($firm_comList as $item) {
        echo '<option value="'.$item['firm_com'].'">'.$item['firm_com'].'</option>';
    }
?>
            </select>
        </div>
        <div class="panel-bodying">
            <label for="name_pc_com">Tên Máy Tính của Linh Kiện</label>
        </div>
        <div class="panel-bodying">
            <input class="form-control" type="text" name="name_pc_com" id="name_pc_com" placeholder="Tìm Theo Tên của Máy Tính">
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
                        <th>Giá</th>
                        <th>Hãng</th>
                        <th>Sản Xuất</th>
                        <th>Thông tin Chi Tiết</th>
                        <th></th>
                    </tr>
                    <tbody>
<?php
    $spl = 'SELECT * FROM components';
    $comList = executeResult($spl);
    $index = 1;
    foreach ($comList as $com) {
        echo '<tr>
                <th style="font-size: 16px">'.($index++).'</th>
                <th style="font-size: 16px">'.$com['name_com'].'</th>
                <th><img src="'.$com['img_com'].'" style="max-width: 150px"></th>
                <th style="font-size: 16px">'.number_format($com['price_com']).'</th>
                <th style="font-size: 16px">'.$com['firm_com'].'</th>
                <th style="font-size: 16px">'.$com['maker_com'].'</th>
                <th style="font-size: 14px">'.$com['detail_com'].'</th>
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