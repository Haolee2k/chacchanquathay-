-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 01, 2022 lúc 07:46 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahang`
--
CREATE DATABASE IF NOT EXISTS `cuahang` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cuahang`;

DELIMITER $$
--
-- Thủ tục
--
DROP PROCEDURE IF EXISTS `capnhatgia`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `capnhatgia` (IN `ma_sach` VARCHAR(15), IN `gia_moi` INT(10))  BEGIN
UPDATE sach
SET gia=gia_moi
WHERE masach=ma_sach;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `mact` varchar(20) NOT NULL,
  `maDon` varchar(20) NOT NULL,
  `madt` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`mact`),
  KEY `maDon` (`maDon`),
  KEY `madt` (`madt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `mahd` varchar(100) NOT NULL,
  `masach` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `gia` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`mahd`,`masach`),
  KEY `masach` (`masach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`mahd`, `masach`, `soluong`, `gia`) VALUES
('abcd@yahoo.com1541841165', 'td01', 9, 450000),
('abcd@yahoo.com1541841165', 'th03', 2, 76000),
('abcd@yahoo.com1541907522', 'td01', 1, 450000),
('abcd@yahoo.com1541907522', 'td02', 5, 195000),
('abcd@yahoo.com1541909715', 'td02', 5, 195000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coments`
--

DROP TABLE IF EXISTS `coments`;
CREATE TABLE IF NOT EXISTS `coments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` char(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `comment` mediumtext NOT NULL,
  `postingdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `coments`
--

INSERT INTO `coments` (`id`, `post`, `name`, `email`, `comment`, `postingdate`) VALUES
(1, 'th12', 'khoi', 'khoi179@gmail.com', 'good', '2021-12-18 16:22:36'),
(2, 'td03', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:22:45'),
(3, 'td04', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:24:20'),
(4, 'th06', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:24:38'),
(5, 'td01', 'khoi', 'khoi179@gmail.com', 'good\r\n', '2021-12-18 16:25:10'),
(6, 'th12', 'khoi', 'khoi179@gmail.com', '', '2021-12-20 09:59:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienthoai`
--

DROP TABLE IF EXISTS `dienthoai`;
CREATE TABLE IF NOT EXISTS `dienthoai` (
  `madt` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tendt` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotxem` int(10) DEFAULT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  PRIMARY KEY (`madt`),
  KEY `manxb` (`maloai`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dienthoai`
--

INSERT INTO `dienthoai` (`madt`, `tendt`, `mota`, `luotxem`, `hinh`, `maloai`, `gia`) VALUES
('ac1', 'Sangsung A52s', 'Galaxy A52 (8GB/128GB) mẫu smartphone thuộc dòng Galaxy A của Samsung, với nhiều sự thay đổi lớn về thiết kế lẫn cấu hình, thiết lập tiêu chuẩn trải nghiệm mới cho người dùng ở phân khúc tầm trung.', 21, 'a52s.jpg', 'ss', 8800000),
('ac2', 'Samsung A70', 'yyyyyyyyyyyyyy', 50, 'a70.jpg', 'ss', 2300000),
('td01', 'Samsung A72', 'Số 45 Weekly Young Jump năm nay của Shueisha đã tiết lộ vào 07/10/2021 rằng manga Kaguya-sama: Love is War (Kaguya-sama wa Kokurasetai – Tensai-tachi no Renai Zunōsen) của Aka Akasaka đang bước vào Arc cuối cùng. Manga cũng sẽ tạm nghỉ trong số tiếp theo của tạp chí và sẽ trở lại trong số 47 vào ngày 21 tháng 10.\r\n\r\nBộ manga đã tạm ngừng hoạt động vào tháng 5 để Akasaka có thể viết và sáng tác phần hành động mới của manga.', 24589, 'a72.jpg', 'ss', 8800000),
('td03', 'iPhone 12 Purple\r\n', 'Tensei Shitara Slime Datta Ken - Chuyển Sinh Thành Slime 91 dự kiến phát hành ngày 24 tháng 12 năm 2021.', 22356, 'ip12tim.jpg', 'ip', 21200000),
('td04', 'Iphone 13 Black\r\n', 'Ngày 15/12, TOEI tiếp tục nhá hàng với Poster mới. Nhìn sắc thái của Poster thì có vẻ', 17634, 'ip13d.jpg', 'ip', 23500000),
('td05', 'iPhone 13 Pro Max Gold', 'Makoto Shinkai đã tiết lộ tác phẩm mới của mình Suzume no Tojimari vào 15/12/2021 trong một cuộc họp ', 14983, 'ip13promaxv.jpg', 'ip', 32500000),
('td06', 'iPhone 13 Pro Max Blue', 'Tài khoản Twitter chính thức cho series One Piece của Eiichiro Oda đã thông báo vào 31/08/2021 rằng anime đã chọn Saori Hayami vào vai Yamato', 57243, 'ip13promaxx.jpg', 'ip', 30990000),
('th01', 'iPhone 13 White', 'Trang web chính thức của series anime truyền hình Date A Live IV đã bắt đầu phát trực tuyến video quảng cáo', 49687, 'ip13w.jpg', 'ip', 21500000),
('th02', 'iPhone 11 Pro Black', 'Trang web chính thức của anime Attack on Titan The Final Season đã thông báo vào Chủ nhật rằng Phần 2 của mùa sẽ ra mắt với tập 76', 22335, 'iphone11pro.jpg', 'ip', 12990000),
('th03', 'iPhone 13 Pro Max Black', 'Tập thứ 25 và là tập cuối cùng của mùa thứ năm của anime My Hero Academia (tập thứ 113 tổng thể) đã thông báo vào thứ Bảy rằng anime sẽ có mùa thứ sáu', 20147, 'iphone13promax.png', 'ip', 34990000),
('th05', 'iPhone 11 Red', 'Trang web chính thức của anime TONIKAWA: Over The Moon For You', 21004, 'ipxid.jpg', 'ip', 15500000),
('th06', 'iPhone 11 Yellow', 'Kênh YouTube chính thức của khối chương trình phim hoạt hình dành cho người lớn AnimeFesta ', 20486, 'ipxiv.jpg', 'ip', 16500000),
('th07', 'Nokia 22', 'Trang web Comic Natalie đã thông báo thêm về dàn diễn viên và buổi ra mắt ngày 13 tháng 1 ', 13366, 'noki22.jpg', 'nk', 2500000),
('th08', 'Nokia x60', 'Movie nằm trong 4 “đại dự án” kỷ niệm 100 năm ngày sinh của Shigeru Mizuki. Mizuki qua đời năm 2015,', 16322, 'nokix60.jpg', 'nk', 12300000),
('th09', 'Samsung S10', 'Tài khoản Twitter chính thức của nhà xuất bản HJ Bunko thuộc Hobby Japan đã thông báo vào 29/11/2021', 37483, 's10.jpg', 'ss', 8000000),
('th10', 'Oppo A94', 'Trang web chính thức của anime truyền hình chuyển thể từ manga Teasing Master Takagi-san', 13654, 'oppoa94.jpg', 'op', 7300000),
('th11', 'Oppo F9 Red', 'Trang web chính thức của Magia Record: Puella Magi Madoka Magica Side Story đã thông báo', 11845, 'oppof9r.jpg', 'op', 2900000),
('th12', 'Oppo Reno6', 'Trang web chính thức của anime chuyển thể từ tiểu thuyết The Greatest Demon Lord is Reborn as a Typical Nobody', 15903, 'reno6.jpg', 'op', 12990000),
('th13', 'Samsung S9', 'Buổi phát trực tiếp “Hiro Mashima Fan meeting @ Mixalive Tokyo” đã kết thúc vào11/09/2021', 15543, 's9.jpg', 'ss', 4300000),
('th14', 'Samsung Z Fold 3', 'Shukou Murase – đạo diễn của dự án anime Mobile Suit Gundam Hathaway ', 62743, 'zf3.jpg', 'ss', 32889000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `maDon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaylapHD` timestamp NOT NULL DEFAULT current_timestamp(),
  `tenngnhan` varchar(50) NOT NULL,
  `diachinhan` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`maDon`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `idgiohang` int(10) NOT NULL AUTO_INCREMENT,
  `madt` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tendienthoai` varchar(250) CHARACTER SET utf8 NOT NULL,
  `giadienthoai` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhdienthoai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idgiohang`),
  UNIQUE KEY `madt` (`madt`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idgiohang`, `madt`, `tendienthoai`, `giadienthoai`, `soluong`, `hinhdienthoai`) VALUES
(21, 'td06', 'iPhone 13 Pro Max Blue', 30990000, 1, 'ip13promaxx.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `ngayhd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tennguoinhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachinguoinhan` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhan` date NOT NULL DEFAULT '0000-00-00',
  `dienthoainguoinhan` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`mahd`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `email`, `ngayhd`, `tennguoinhan`, `diachinguoinhan`, `ngaynhan`, `dienthoainguoinhan`) VALUES
('abcd@yahoo.com1541840637', 'abcd@yahoo.com', '2018-11-10 16:03:57', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541840769', 'abcd@yahoo.com', '2018-11-10 16:06:09', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841019', 'abcd@yahoo.com', '2018-11-10 16:10:19', 'a', 'b', '2018-11-22', '1234567'),
('abcd@yahoo.com1541841165', 'abcd@yahoo.com', '2018-11-10 16:12:45', 'a', 'g', '2018-11-15', '1234567'),
('abcd@yahoo.com1541907522', 'abcd@yahoo.com', '2018-11-11 10:38:42', 'a', 'v', '2018-11-22', '132546457'),
('abcd@yahoo.com1541909715', 'abcd@yahoo.com', '2018-11-11 11:15:15', 'a', 's', '2018-11-22', '5436546');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `email` varchar(50) NOT NULL DEFAULT '',
  `makh` varchar(10) CHARACTER SET utf8 NOT NULL,
  `matkhau` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email`),
  KEY `makh` (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`email`, `makh`, `matkhau`, `tenkh`, `diachi`, `dienthoai`) VALUES
('abcd@yahoo.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Minh Triết', 'Q1', '99999999'),
('hgnam2411@gmail.com', 'kham2411', '3e0101ecf0d8427cf14f3f6dc2f0282d', 'Phạm Hoàng Nam', 'bbbbbbbbbbbbb', '0977654361'),
('hung.stu@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Đại Ca - Trần văn Hùng', 'Quận 3', '090090999'),
('khoinguyen@gmail.com', 'khinguye', 'e13dd027be0f2152ce387ac0ea83d863', 'Nguyễn Trần Tuấn Khôi', 'ccccccccccc', '0988764521'),
('lahao11062000@gmail.com', 'khao1106', 'e10adc3949ba59abbe56e057f20f883e', 'le anh hao', 'aaaaaaaaaaaaa', '0922834123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `hinhloai`) VALUES
('ip', 'iPhone', 'apple.png'),
('nk', 'Nokia', 'nokia.png'),
('op', 'Oppo', 'oppo.png'),
('ss', 'Samsung', 'samsung.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

DROP TABLE IF EXISTS `quantri`;
CREATE TABLE IF NOT EXISTS `quantri` (
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 NOT NULL,
  `quyen` int(1) NOT NULL COMMENT '1:  supper admin, 2:nhan viên, 3:...',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`username`, `matkhau`, `hoten`, `quyen`) VALUES
('abcd', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyễn văn A', 2),
('hung', 'e10adc3949ba59abbe56e057f20f883e', 'Lên Văn An', 2),
('admin', '123', 'Trần Văn Hùng', 1);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `madon` FOREIGN KEY (`maDon`) REFERENCES `donhang` (`maDon`),
  ADD CONSTRAINT `madt` FOREIGN KEY (`madt`) REFERENCES `dienthoai` (`madt`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `khachhang` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
