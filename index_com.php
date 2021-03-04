<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua bán máy tính, phụ kiện máy tính các loại</title>
    <style type=text/css>
        /* viết css, màu giao diện */
    </style>
</head>
<body>
    <!-- body sẽ gồm các thẻ div(dòng) để tạo giao diện -->
    <div class="panel">
        <div class="panel-heading">Tìm Kiếm Linh Kiện Máy Tính</div>
        <div class="panel-bodying">
            <label for="name_com">Tên Sản Phẩm</label>
            <input class="form-control" type="text" name="name_com" id="name_com" placeholder="Tìm theo tên">
        </div>
        <div>
            <label for="firm_com">Tên Hãng của Linh Kiện</label>
            <select id="firm_com">
                <option value="">--Chọn Hãng--</option>
            </select>
        </div>
        <div>
            <label for="name_pc_com">Tên Máy Tính của Linh Kiện</label>
            <input class="form-control" type="text" name="name_pc_com" id="name_pc_com" placeholder="Tìm Theo Tên của Máy Tính">
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