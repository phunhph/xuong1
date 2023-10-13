<main class="formdk">


    <?php foreach ($vlAllS as $i => $s) { ?>
        <div class="thongTinSP">
            <div class="">
                <img class=" image" src="<?php echo $s['hinh_anh'] ?>" alt="Sản phẩm" width="20%">
            </div>
            <div class="thongTin">
                <h3><?php echo $s['ten_sach'] ?></h3>
                <p style="text-align: left; color: red; font-size: 12px;"><?php echo $s['gia_ban'] ?></p>
            </div>
        </div>
        <form action="index.php?act=dangKy" method="post">
            <label for="soLuong">Số lượng</label>
            <input type="number" min="1" name="soLuong" required> <br> <br>

            <label for="diaChi">Địa chỉ</label>
            <input type="text" name="diaChi" required> <br> <br>

            <input type="hidden" name="ngayDat" value="<?php echo $currentDateTime;  ?>">

            <input type="hidden" name="gia" value="<?php echo $s['gia_ban'] ?>">

            <input type="hidden" name="idSach" value="<?php echo $s['id_sach'] ?>">

            <input type="hidden" name="idNguoi" value="">
            <button class="dk" type="submit">Đăng ký</button>
        </form>
    <?php } ?>

</main>
<script>
</script>