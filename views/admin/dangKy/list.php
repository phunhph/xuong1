<main class="donHang">
    <form action="index.php?act=dangKy" method="post">
        <select name="donHang" id="donHangSelect">
            <option value="all">Tất cả đơn hàng</option>
            <option value="duyet">Đợi duyệt</option>
            <option value="dangGiao">Đang giao</option>
            <option value="daGiao">Đã giao</option>
            <option value="huy">Huỷ</option>
        </select>
        <button type="submit">Chọn</button>
    </form>
    <table>
        <tr class="line">
            <td>ID sản phẩm</td>
            <td>ID người dùng</td>
            <td>Số lượng</td>
            <td>Tổng giá</td>
            <td>Ngày đặt</td>
            <td>Ngày nhận</td>
            <td>Trạng thái</td>
            <td>Hành động</td>
        </tr>
        <?php foreach ($vlAllDK as $dk) { ?>
            <tr>
                <td><?php echo $dk['id_sach']; ?></td>
                <td><?php echo $dk['id_nguoi_dung']; ?></td>
                <td><?php echo $dk['so_luong']; ?></td>
                <td><?php echo $dk['tong_gia']; ?></td>
                <td><?php echo $dk['ngay_dat']; ?></td>
                <td><?php echo $dk['ngay_nhan']; ?></td>

                <?php
                if ($dk['trang_thai'] == 0) {
                    echo '<td class="yellow" style="color: red">Đơn hàng đã huỷ</td>';
                } else if ($dk['trang_thai'] == 1) {
                    echo '<td class="green" style="color: yellow">Đợi duyệt đơn</td>';
                } else if ($dk['trang_thai'] == 2) {
                    echo '<td class="green" style="color: green">Đơn đang giao</td>';
                } else {
                    echo '<td class="red" style="color: blue">Đã giao</td>';
                }
                ?>

                <td>
                    <?php
                    if ($dk['trang_thai'] == 0) { ?>
                    <?php
                    } else if ($dk['trang_thai'] == 1) { ?>

                        <a class="them" href="index.php?act=dangKy&nd=daGiao&id=<?php echo $dk["id_dang_ky"] ?>">Xác nhận</a>
                        <a class="them" href="index.php?act=dangKy&nd=huy&id=<?php echo $dk["id_dang_ky"] ?>">Huỷ</a>
                    <?php
                    } else if ($dk['trang_thai'] == 2) { ?>
                        <a class="them" href="index.php?act=dangKy&nd=daGiao&id=<?php echo $dk["id_dang_ky"] ?>">Đã giao</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>