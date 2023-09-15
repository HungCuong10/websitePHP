-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2021 lúc 03:44 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlykho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `CTN_MaCT` int(10) NOT NULL,
  `CTN_SoLuong` int(10) NOT NULL,
  `CTN_MaSP` int(10) NOT NULL,
  `CTN_MaPN` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieuxuat`
--

CREATE TABLE `chitietphieuxuat` (
  `CTX_MaCT` int(10) NOT NULL,
  `CTX_Soluong` int(10) NOT NULL,
  `CTX_MaSP` int(10) NOT NULL,
  `CTX_MaPX` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `DN_ID` int(50) NOT NULL,
  `DN_Matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`DN_ID`, `DN_Matkhau`) VALUES
(101, '0123'),
(102, '0123'),
(103, '0123'),
(104, '0123'),
(105, '0123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `LSP_MaloaiSP` int(10) NOT NULL,
  `LSP_TenloaiSP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`LSP_MaloaiSP`, `LSP_TenloaiSP`) VALUES
(1001, 'Thực phẩm khô'),
(1002, 'Nước giải khát'),
(1003, 'Thực phẩm đóng hộp'),
(1004, 'Thực phẩm chức năng'),
(1005, 'Thực phẩm đông lạnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `NCC_MaNCC` int(10) NOT NULL,
  `NCC_TenNCC` varchar(100) NOT NULL,
  `NCC_SdtNCC` varchar(20) NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`NCC_MaNCC`, `NCC_TenNCC`, `NCC_SdtNCC`, `TrangThai`) VALUES
(10001, 'Cty Aceecook VN - Cn Can Tho', '123456789', b'1'),
(10002, 'Cty co phan CNTP Tan A', '', b'0'),
(10003, 'Cty Pepsico VN - Cn Can Tho', '', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(10) NOT NULL,
  `NV_HoTen` varchar(100) NOT NULL,
  `NV_Sex` varchar(100) NOT NULL,
  `NV_ChucVu` varchar(100) NOT NULL,
  `NV_NamSinh` date NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `NV_HoTen`, `NV_Sex`, `NV_ChucVu`, `NV_NamSinh`, `TrangThai`) VALUES
(101, 'Nguyễn Dương Thái Ngọc', 'Nam', 'Nhân viên', '2000-10-20', b'1'),
(102, 'Huỳnh Thị Hồng Gấm', 'Nữ', 'Quản lý', '2000-08-07', b'1'),
(103, 'Nguyễn Lưu Ngọc Yến', 'Nam', 'Nhân viên', '2000-10-29', b'1'),
(104, 'Nguyễn Hùng Cường', 'Nam', 'Quản lý', '2000-10-28', b'0'),
(105, 'Phan Hồng Phát', 'Nam', 'Nhân viên', '2000-04-06', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `PN_MaPN` int(10) NOT NULL,
  `PN_Ngaylap` date NOT NULL,
  `PN_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `PX_MaPX` int(10) NOT NULL,
  `PX_Ngaylap` date NOT NULL,
  `PX_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `SP_MaSP` int(10) NOT NULL,
  `SP_TenSP` varchar(100) NOT NULL,
  `SP_Price` double NOT NULL,
  `SP_Donvi` varchar(10) NOT NULL,
  `SP_SLcon` int(10) NOT NULL,
  `SP_MaloaiSP` int(10) NOT NULL,
  `SP_MaNCC` int(10) NOT NULL,
  `TrangThai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`SP_MaSP`, `SP_TenSP`, `SP_Price`, `SP_Donvi`, `SP_SLcon`, `SP_MaloaiSP`, `SP_MaNCC`, `TrangThai`) VALUES
(1801, 'Mì hảo hảo tôm chua cay', 100000, 'Thung', 100, 1001, 10001, b'1'),
(1802, 'Mi Ly CayKay', 199000, 'Thung', 200, 1001, 10001, b'1'),
(1803, 'Mì phở gà', 102000, 'Thung', 50, 1001, 10001, b'1'),
(1804, 'Pepsi Cola chai 1.5 lit', 175000, 'Thung', 50, 1001, 10002, b'1'),
(1805, 'Pepsi lon Vi Chanh', 175000, 'Thung', 0, 1002, 10003, b'1'),
(1806, 'Fanta viet quat', 190000, 'Thung', 0, 1002, 10003, b'0'),
(1807, 'Fanta vi cam', 190000, 'Thung', 100, 1002, 10003, b'1'),
(1808, 'Phở bò KOKOMI', 99000, 'Thung', 100, 1001, 10001, b'0'),
(1809, 'Sữa nước Ensure Original Vani 237ml', 100000, 'Thung', 0, 1004, 10002, b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`CTN_MaCT`),
  ADD KEY `CTN_MaPN` (`CTN_MaPN`),
  ADD KEY `CTN_MaSP` (`CTN_MaSP`);

--
-- Chỉ mục cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD PRIMARY KEY (`CTX_MaCT`),
  ADD KEY `CTX_MaSP` (`CTX_MaSP`),
  ADD KEY `chitietphieuxuat_ibfk_2` (`CTX_MaPX`);

--
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`DN_ID`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`LSP_MaloaiSP`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`NCC_MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`PN_MaPN`),
  ADD KEY `PN_ID` (`PN_ID`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`PX_MaPX`),
  ADD KEY `PN_MaNV` (`PX_ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`SP_MaSP`),
  ADD KEY `SP_MaloaiSP` (`SP_MaloaiSP`),
  ADD KEY `sanpham_ibfk_1` (`SP_MaNCC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  MODIFY `CTN_MaCT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  MODIFY `CTX_MaCT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `PN_MaPN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `PX_MaPX` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`CTN_MaPN`) REFERENCES `phieunhap` (`PN_MaPN`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`CTN_MaSP`) REFERENCES `sanpham` (`SP_MaSP`);

--
-- Các ràng buộc cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD CONSTRAINT `chitietphieuxuat_ibfk_1` FOREIGN KEY (`CTX_MaSP`) REFERENCES `sanpham` (`SP_MaSP`),
  ADD CONSTRAINT `chitietphieuxuat_ibfk_2` FOREIGN KEY (`CTX_MaPX`) REFERENCES `phieuxuat` (`PX_MaPX`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`NV_ID`) REFERENCES `dangnhap` (`DN_ID`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`PN_ID`) REFERENCES `nhanvien` (`NV_ID`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`PX_ID`) REFERENCES `nhanvien` (`NV_ID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `loaisanpham_maloaisp` FOREIGN KEY (`SP_MaloaiSP`) REFERENCES `loaisanpham` (`LSP_MaloaiSP`),
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`SP_MaNCC`) REFERENCES `nhacungcap` (`NCC_MaNCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
