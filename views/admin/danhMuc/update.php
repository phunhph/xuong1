<main class="sach">
    <div class="ttSach-admin">
        <h1>Danh mục</h1>
        <form action="index.php?act=danhMuc&nd=update" method="post">
            <?php foreach ($vlOneDM as $dm) {?>
            <input type="text" name="tenDanhMuc" value="<?php echo $dm['ten_danh_muc']?>">
            <input type="text" name="trangThai" value="<?php echo $dm['trang_thai']?>">
            <input type="hidden" name="id" value="<?php echo $dm['id_danh_muc']?>">

            <input type="submit" value="Thêm" name="them">
            <?php } ?>
        </form>
        <a href="index.php">Trở lại</a>
    </div>
</main>