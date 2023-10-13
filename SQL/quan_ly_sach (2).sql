-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2023 lúc 06:34 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_sach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ky`
--

CREATE TABLE `dang_ky` (
  `id_dang_ky` int(11) NOT NULL,
  `id_nguoi_dung` int(11) DEFAULT NULL,
  `id_sach` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `tong_gia` int(11) DEFAULT NULL,
  `ngay_dat` date DEFAULT NULL,
  `ngay_nhan` date DEFAULT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dang_ky`
--

INSERT INTO `dang_ky` (`id_dang_ky`, `id_nguoi_dung`, `id_sach`, `so_luong`, `dia_chi`, `tong_gia`, `ngay_dat`, `ngay_nhan`, `trang_thai`) VALUES
(6, 2, 11, 1, 'a', 123456, '2023-10-13', NULL, 0),
(7, 2, 11, 1, 'a', 123456, '2023-10-13', NULL, 0),
(8, 2, 11, 1, 'a', 123456, '2023-10-13', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`, `trang_thai`) VALUES
(2, 'dien thoai', 1),
(3, 'hello', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoi_dung` int(11) NOT NULL,
  `ma_nguoi_dung` varchar(10) NOT NULL,
  `ten_nguoi_dung` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(11) DEFAULT NULL,
  `mat_khau` varchar(255) DEFAULT NULL,
  `cap_bac` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoi_dung`, `ma_nguoi_dung`, `ten_nguoi_dung`, `email`, `so_dien_thoai`, `mat_khau`, `cap_bac`, `trang_thai`) VALUES
(1, 'dsf232', 'fdsfs', 'phune@a.com\r\n', '545435454', '123\r\n', 1, 1),
(2, 'ny phú', 'Nguyễn Thị Hạnh', 'hanhbabe@gmail.com', '4343434', '123', 0, 0),
(3, 'moimoi', 'moi', 'moi@moi.com', '1234567890', '123', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id_sach` int(11) NOT NULL,
  `ky` int(11) NOT NULL,
  `ten_sach` varchar(255) NOT NULL,
  `gia_ban` int(10) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id_sach`, `ky`, `ten_sach`, `gia_ban`, `so_luong`, `hinh_anh`, `mo_ta`, `id_danh_muc`, `trang_thai`) VALUES
(5, 1, 'cntt', 3232, 12, 'models/uploads/img1.jpg', 'mua đi để có thê qua môn', 3, 0),
(6, 1, 'công nghệ thông tin', 67676, 12, 'models/uploads/img0.jpg', 'mua đi để có thê qua môn', 2, 0),
(9, 6, 'maketing', 3232, 2, 'models/uploads/img6.jpg', 'mua đi để có thê qua môn', 3, 0),
(10, 1, 'tạch môn ', 123456, 10000, 'models/uploads/img6.jpg', 'đọc là tạch', 3, 0),
(11, 1, 'tạch môn 2', 123456, 10000, 'models/uploads/img1.jpg', 'đọc là tạch', 2, 0),
(12, 7, 'tạch môn 2', 123456, 10000, 'models/uploads/img0.jpg', 'đọc là tạch', 3, 0),
(13, 5, 'tạch môn 9', 123456, 10000, 'models/uploads/img6.jpg', 'đọc là tạch', 3, 0),
(14, 5, 'tạch môn 2', 123456, 10000, 'models/uploads/img6.jpg', 'đọc là tạch', 2, 0),
(17, 7, 'tạch môn 2', 123456, 10000, 'models/uploads/img1.jpg', 'đọc là tạch', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dang_ky`
--
ALTER TABLE `dang_ky`
  ADD PRIMARY KEY (`id_dang_ky`),
  ADD KEY `fk_s_dk` (`id_sach`),
  ADD KEY `fk_s_nd` (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id_nguoi_dung`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id_sach`),
  ADD KEY `fk_dm_s` (`id_danh_muc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dang_ky`
--
ALTER TABLE `dang_ky`
  MODIFY `id_dang_ky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dang_ky`
--
ALTER TABLE `dang_ky`
  ADD CONSTRAINT `fk_s_dk` FOREIGN KEY (`id_sach`) REFERENCES `sach` (`id_sach`),
  ADD CONSTRAINT `fk_s_nd` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id_nguoi_dung`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_dm_s` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
