<main class="tt">
    <div class="container">
        <h1>Chi tiết sản phẩm</h1>

        <div class="book-details">
            <?php foreach ($vlAllS as $i => $s) { ?>
                <div class="book-image">
                    <img src="<?php echo $s['hinh_anh'] ?>" alt="Book Cover" width="200" />
                </div>

                <div class="book-info">
                    <div class="book-title">
                        <h3>Tên sách:</h3> <?php echo $s['ten_sach'] ?>
                    </div>
                    <div class="book-price">
                        <h3>Giá sách:</h3> <?php echo $s['gia_ban'] ?> VND
                    </div>
                    <div class="book-description">
                        <h3>Mô tả:</h3>
                        <?php echo $s['mo_ta'] ?>
                    </div>
                    <div class="book-quantity">Số lượng: 1</div>
                    <a href="index.php?act=dangKy&id_s=<?php echo $s['id_sach'] ?>"><button> MUA </a></button>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="cacSanPhamLienQuan">
        <div>
            <h1>Các sản phẩm liên quan</h1>
        </div>
        <div class="splq">
            <?php foreach ($vlAllLQ as $i => $s) { ?>
                <div class="sanPham">
                    <img src="<?php echo $s['hinh_anh'] ?>" alt="" width="40%">
                    <div>
                        <a href="index.php?act=thongTin&id_s=<?php echo $s['id_sach'] ?>&id_d=<?php echo $s['id_danh_muc'] ?>">
                            <h3><?php echo $s['ten_sach'] ?></h3>
                        </a>
                        <p style="text-align: left; color: red; font-size: 12px;">Giá: <?php echo $s['gia_ban'] ?></p>
                        <button><a href="index.php?act=dangKy&id_s=<?php echo $s['id_sach'] ?>"> MUA </a></button>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</main>