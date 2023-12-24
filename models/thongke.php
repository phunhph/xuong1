<?php
require_once "models/connectdb.php";

// Lấy tất cả đơn đặt hàng
function getAllThongKe()
{
    $sql = "SELECT
    danh_muc.ten_danh_muc,
    COALESCE(SUM(CASE WHEN dang_ky.trang_thai IN (0, 1, 2, 3) THEN 1 ELSE 0 END), 0) AS tong,
    COALESCE(SUM(CASE WHEN dang_ky.trang_thai = 0 THEN 1 ELSE 0 END), 0) AS huy,
    COALESCE(SUM(CASE WHEN dang_ky.trang_thai = 1 THEN 1 ELSE 0 END), 0) AS doi_giao,
    COALESCE(SUM(CASE WHEN dang_ky.trang_thai = 2 THEN 1 ELSE 0 END), 0) AS dang_giao,
    COALESCE(SUM(CASE WHEN dang_ky.trang_thai = 3 THEN 1 ELSE 0 END), 0) AS da_giao
FROM
    danh_muc
LEFT JOIN
    sach ON danh_muc.id_danh_muc = sach.id_danh_muc
LEFT JOIN
    dang_ky ON sach.id_sach = dang_ky.id_sach
GROUP BY
    danh_muc.id_danh_muc, danh_muc.ten_danh_muc;
    ";
    return getData($sql);
}
