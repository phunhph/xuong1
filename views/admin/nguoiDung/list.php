<main class="sach">
    <div class="ttSach-admin">
        <h1>Admin</h1>
        <table>
            <tr class="line">
                <td>Stt</td>
                <td>Mã admin</td>
                <td>Tên admin</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Cấp Bậc</td>
                <td>Trạng thái</td>
            </tr>
            <?php foreach ($vlAD as $i => $ad) {?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $ad['ma_nguoi_dung']?></td>
                <td><?php echo $ad['ten_nguoi_dung']?></td>
                <td><?php echo $ad['email']?></td>
                <td><?php echo $ad['so_dien_thoai']?></td>
                <td><?php echo $ad['cap_bac']?></td>
                <td><?php echo $ad['trang_thai']?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <div class="ttSach-admin">
        <h1>Người dùng</h1>
        <table>
            <tr class="line">
                <td>Stt</td>
                <td>Mã người dùng</td>
                <td>Tên người dùng</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Mật khẩu</td>
                <td>Cấp bậc</td>
                <td>Trạng thái</td>
            </tr>
            <?php foreach ($vlND as $i => $nd) {?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $nd['ma_nguoi_dung']?></td>
                    <td><?php echo $nd['ten_nguoi_dung']?></td>
                    <td><?php echo $nd['email']?></td>
                    <td><?php echo $nd['so_dien_thoai']?></td>
                    <td><?php echo $nd['mat_khau']?></td>
                    <td><?php echo $nd['cap_bac']?></td>
                    <td><?php echo $nd['trang_thai']?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>