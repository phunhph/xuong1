<main class="sach">
    <div class="ttSach-admin">
        <h1>Thêm Sách</h1>
        <form action="index.php?act=dangKy&nd=add" method="post">
            <label for="idNguoiDung">ID Người Dùng:</label>
            <select name="" id="">
                <?php foreach ($vlAllN as $n) {?>
                <option value="<?php echo $n['id_nguoi_dung']?>"><?php echo $n['ten_nguoi_dung']?></option>
                <?php } ?>
            </select>
            <input type="text" id="idNguoiDung" name="idNguoiDung" required><br>

            <label for="idSach">ID Sách:</label>
            <input type="text" id="idSach" name="idSach" required><br>

            <label for="soLuong">Số Lượng:</label>
            <input type="text" id="soLuong" name="soLuong" required><br>

            <label for="loiNhan">Lời Nhắn:</label>
            <input type="text" id="loiNhan" name="loiNhan" required><br>

            <label for="tongGia">Tổng Giá:</label>
            <input type="text" id="tongGia" name="tongGia" required><br>

            <label for="ngayDat">Ngày Đặt:</label>
            <input type="date" id="ngayDat" name="ngayDat" required><br>

            <label for="ngayNhan">Ngày Nhận:</label>
            <input type="date" id="ngayNhan" name="ngayNhan" required><br>

            <label for="trangThai">Trạng Thái:</label>
            <input type="text" id="trangThai" name="trangThai" value="0" required><br>

            <input type="submit" value="Thêm">
        </form>
        <a href="index.php">Trở lại</a>
    </div>
</main>
