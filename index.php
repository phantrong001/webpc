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
            text-align: center;
            font-weight: bold;
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
    </style>
</head>
<body>
    <!-- body sẽ gồm các thẻ div(dòng) để tạo giao diện -->
    <div class="panel">
        <div class="panel-heading">Tìm Kiếm Mặt Hàng</div>
        <div class="panel-bodying">
            <form action="index_pc.php">
                <button class="btn-normal" type="submit" style="margin-right: 200px;">Tìm Kiếm Máy Tính</button>
            </form>
            <form action="index_com.php">
                <button class="btn-normal" type="submit" style="margin-left: 200px;">Tìm Kiếm Linh Kiện</button>
            </form>
            <form action="index_acc.php">
                <button class="btn-normal" type="submit" style="margin-right: 200px;">Tìm Kiếm Phụ Kiện</button>
            </form>
            <form action="cart.php">
                <button class="btn-next" type="submit" style="margin-left: 500px;">Giỏ Hàng</button>
            </form>
        </div>
    </div>
    <script src = "main.js">
    </script>
</body>
</html>