<main class="donHang" style="min-height: 463px;">
    <!-- <form action="process.php" method="post">
        <select name="donHang" id="donHangSelect">
            <option value="tat-ca-don-hang">Tất cả đơn hàng</option>
            <option value="da-nhan">Đã nhận</option>
            <option value="dang-giao">Đang giao</option>
            <option value="da-giao">Đã giao</option>
        </select>
    </form> -->
    <table border="1px">
        <tr class="line">
            <td>Tên sách</td>
            <td>Số lượng</td>
            <td>Tổng giá</td>
            <td>Ngày đặt</td>
            <td>Địa chỉ</td>
            <td>Trạng thái</td>
            <td>Hành động</td>
        </tr>
        <?php if (isset($vlAllDK)) {
            foreach ($vlAllDK as $i => $s) { ?>
                <tr>
                    <td><?php echo $s['id_sach'] ?></td>
                    <td><?php echo $s['so_luong'] ?></td>
                    <td><?php echo $s['tong_gia'] ?></td>
                    <td><?php echo $s['ngay_dat'] ?></td>
                    <td><?php echo $s['dia_chi'] ?></td>
                    <td><?php echo $s['trang_thai'] ?></td>
                    <td>
                        <a href="index.php?act=donhang&nd=delete&id_dl=<?php echo $s['id_dang_ky'] ?>">Hủy</a>
                    </td>
                </tr>
        <?php }
        } else echo "trống" ?>
    </table>
</main>