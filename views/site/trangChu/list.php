<div class="banner"></div>
<main>
    <div class="container">
        <?php if (isset($vlAllS)) {
            foreach ($vlAllS as $i => $s) { ?>
                <div class="item">
                    <img src="<?php echo $s['hinh_anh'] ?>" alt="loi" width="100%" />
                    <a href="index.php?act=thongTin&id_s=<?php echo $s['id_sach'] ?>&id_d=<?php echo $s['id_danh_muc'] ?>">
                        <h3><?php echo $s['ten_sach'] ?></h3>
                    </a>
                    <p><?php echo $s['gia_ban'] ?></p>
                    <button class="button"><a href="index.php?act=dangKy&id_s=<?php echo $s['id_sach'] ?>"> MUA </a></button>
                </div>
        <?php }
        } else echo "trống" ?>
    </div>
    <div class="trang" style="margin: 10px; text-align: center">
        <?php
        // Tính toán tổng số trang
        $totalProducts = $count['0']['total'];
        $totalPages = ceil($totalProducts / 8);
        // Hiển thị liên kết trang
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<button class='page'><a href='index.php?page=$i'> $i</a></button>";
        }
        ?>
    </div>
</main>