<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua bán máy tính, phụ kiện máy tính các loại</title>
    <style type=text/css>
        .form_control {
            display: block;
        }
    </style>
</head>
<body>
    <!-- body sẽ gồm các thẻ div(dòng) để tạo giao diện -->
    <div class="panel">
        <div class="panel-heading">Tìm Kiếm Máy Tính</div>
        <div class="panel-bodying">
            <label for="name_pc" placeholder="Tìm theo tên">Tên Máy Tính</label>
            <input class="form-control" type="text" name="name_pro" id="name_pro" placeholder="Tìm theo tên">
        </div>
        <div class="panel-bodying">
            <label for="firm_pc">Tên Hãng của Máy Tính</label>
            <select class="form-control" id="firm_pc">
                <option value="">--Chọn hãng--</option>
            </select>
        </div>
        <div class="panel-bodying">
            <label for="price_pc">Giá</label>
            <select class="form-control" id="price_pc">
                <option value="">--Chọn giá--</option>
            </select>
        </div>
        <div class="panel-end">
            <form action="index.php">
                <button class="btn_back" type="submit">Quay Lại Trang Chủ</button>
            </form>
            <form action="cart.php">
                <button class="btn-next" type="submit">Giỏ Hàng</button>
            </form>
        </div>
    </div>
    <script src = "main.js">
    </script>
</body>
</html>