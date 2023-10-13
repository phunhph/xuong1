<main class="donHang">
    <form action="process.php" method="post">
        <select name="donHang" id="donHangSelect">
            <option value="tat-ca-don-hang">Tất cả đơn hàng</option>
            <option value="da-nhan">Đã nhận</option>
            <option value="dang-giao">Đang giao</option>
            <option value="da-giao">Đã giao</option>
        </select>
        <button type="submit">Chọn</button>
    </form>
    <table>
        <tr class="line">
            <td>ID sản phẩm</td>
            <td>ID người dùng</td>
            <td>Số lượng</td>
            <td>Địa chỉ</td>
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
                <td><?php echo $dk['dia_chi']; ?></td>
                <td><?php echo $dk['tong_gia']; ?></td>
                <td><?php echo $dk['ngay_dat']; ?></td>
                <td><?php echo $dk['ngay_nhan']; ?></td>

                    <?php
                        if ($dk['trang_thai'] == 0){
                            echo '<td class="yellow" style="color: yellow">Đặt hàng</td>';
                        }else if ($dk['trang_thai'] == 1){
                            echo '<td class="green" style="color: green">Đang giao</td>';
                        }else{
                            echo '<td class="red" style="color: red">Đã giao</td>';
                        }
                    ?>

                <td>
                    <a class="them" href="index.php?act=dangKy&nd=dangGiao&id=<?php echo $dk['id_dang_ky']?>">Đang giao</a>
                    <a class="them" href="index.php?act=dangKy&nd=daGiao&id=<?php echo $dk['id_dang_ky']?>">Đã giao</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
