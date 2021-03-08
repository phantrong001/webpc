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
            font-weight: bold;
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
        .btn-save {
            font-size: 24px;
            background-color: rgb(71, 255, 163);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="panel-heading">Giỏ Hàng Của Bạn</div>
        <div class="panel-bodying">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                    <th>Chi Phí Tổng</th>
                </thead>
                <tbody id="result">
    
                </tbody>
            </table>
        </div>
        <div class="panel-end">
            <form action="form.php">
                <button class="btn-save" type="submit" style="margin-left: 1050px; margin-top:20px;">Tạo Hóa Đơn và Thanh Toán</button>
            </form>
        </div>
        <div class="panel-end">
            <form action="index.php">
                <button class="btn-back" type="submit" style="margin-left: 300px; margin-top:20px;">Quay Lại Trang Chủ</button>
            </form>
        </div>
    </div>
</body>
</html>