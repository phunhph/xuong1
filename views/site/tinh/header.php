<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="views/content/css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="nav">
            <ul class="menunav">
                <li><a href="index.php">Trang chủ</a></li>
                <li>
                    <a href="" target="out">Ngành học</a>
                    <ul class="conmenu">
                        <?php foreach ($vlAllDM as $i => $s) { ?>
                            <li><a href="index.php?act=danhmuc&id_d=<?php echo $s['id_danh_muc'] ?>" target="out"><?php echo $s['ten_danh_muc']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="index.php?act=donhang">Đơn hàng</a></li>
                <li><a href="index.php?act=dangXuat">Đăng xuất</a></li>
            </ul>
        </div>
        <form action="index.php?act=search" class="search" method="post">
            <input type="search" name="search" placeholder="tìm kiếm sách" />
        </form>
        <div class="user"><a href="index.php?act=user">user</a></div>
    </header>