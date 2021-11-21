-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2019 lúc 02:43 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `id_ctorder` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngayorder` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`id_ctorder`, `id_order`, `idsp`, `gia`, `soluong`, `ngayorder`) VALUES
(21, 24, 21, 1000000, 1, '2019-11-27 16:45:31'),
(22, 24, 15, 120000, 1, '2019-11-27 16:45:31'),
(23, 25, 15, 120000, 2, '2019-11-28 02:03:30'),
(24, 26, 15, 120000, 2, '2019-11-28 02:30:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `idloaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`idloaisp`, `tenloaisp`) VALUES
(1, 'Giỏ Hoa'),
(2, 'Chậu Hoa'),
(4, 'Bó Hoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `hoten` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `diachi` varchar(256) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `ngayorders` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id_order`, `hoten`, `email`, `dienthoai`, `diachi`, `tongtien`, `ngayorders`) VALUES
(24, 'hong ngoc', 'ngoc@gmail.com', 798989, 'kien giang', 1120000, '2019-11-27 16:45:31'),
(25, 'khoa khoa', 'khoa@gmail.com', 909090, 'hau giang', 240000, '2019-11-28 02:03:30'),
(26, 'pham ngoc', 'ngoc@gmail.com', 9080000, 'kien giang', 240000, '2019-11-28 02:30:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(11) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`id_admin`, `user`, `pass`) VALUES
(2, 'khang', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(256) NOT NULL,
  `hinhanh` varchar(256) NOT NULL,
  `idloaisp` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `noidung` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `hinhanh`, `idloaisp`, `gia`, `noidung`) VALUES
(9, 'Bó Hoa Tuyết', 'bohoa1.jpg', 4, 211000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(11, 'Giỏ Hoa Hồng Vàng', 'chauhoa1.jpg', 1, 410000, 'Giỏ hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(12, 'Giỏ Hoa Tinh Yêu', 'giohoa4.jpg', 1, 425000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(13, 'Gio Hoa Hồng Ngọc', 'giohoa1.jpg', 1, 510000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(14, 'Bó Hoa Hồng Ruby', 'bohoa.jpg', 4, 226000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(15, 'Chậu sen đá tím', 'chau1.jpg', 2, 120000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.\r\n'),
(16, 'Chậu sen đá dể thương', 'chau2.jpg', 2, 140000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(17, 'Chậu sen đá hỗn hợp', 'chau.jpg', 2, 170000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(19, 'Bó Hoa Duyên Duyên', 'dudu.jpg', 4, 1290000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(20, 'Bó Hoa Pi Pi', 'bohoa2.jpg', 4, 125000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.'),
(21, 'Bó hoa Du Pi', 'hah.jpg', 4, 1000000, 'Bó hoa hồng tượng trưng cho tình yêu, bó hoa là sự kết hợp giữa hoa hồng được nhập khẩu từ Anh và bông tuyết nhỏ nhỏ xinh xinh được nhập khẩu từ Hà Lan. Bó hoa là sự kết hợp tuyệt vời nhất dành cho bạn để dành tặng một nữa kia của bạn.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`id_ctorder`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloaisp`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `id_ctorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idloaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `quantri`
--
ALTER TABLE `quantri`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
