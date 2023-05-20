-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 04:15 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samadda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(8) NOT NULL,
  `user_admin` varchar(255) NOT NULL,
  `pass_admin` varchar(255) NOT NULL,
  `name_admin` varchar(255) DEFAULT NULL,
  `status_admin` varchar(8) DEFAULT 'yes',
  `address_admin` varchar(255) DEFAULT NULL,
  `tel_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user_admin`, `pass_admin`, `name_admin`, `status_admin`, `address_admin`, `tel_admin`) VALUES
(1, 'admin', 'admin', 'เจ้าของร้าน', 'yes', '                                   \r\nไม่ระบุ            ', '08927183795'),
(2, 'admin2', 'admin2', 'thanawat', 'yes', '              ไม่มี       \r\n                  ', '0987654567'),
(3, 'ceo', 'ceo', 'Chief executive officer', 'yes', '      ไม่มี      ', '0812345678'),
(4, 'เจ้าของร้าน', '1234', 'เจ้าของร้าน', 'yes', '       \r\n      ', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `Id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Text` text NOT NULL,
  `type` varchar(255) DEFAULT 'customer',
  `id_customer` int(8) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`Id`, `Text`, `type`, `id_customer`) VALUES
(00000000001, 'สวัสดีครับ', 'customer', 1),
(00000000002, 'มีข้อสงสัยอยากสอบถามครับ', 'customer', 1),
(00000000003, 'สวัสดีครับ สามารถสอบถามได้ครับ', 'admin', 1),
(00000000004, 'ต้องการเปลี่ยนแปลงการสั่งซื้อสินค้า มีบางตัวไม่ได้ต้องการแล้ว ไม่ทราบยกเลิกได้ทันทีเลยไหมครับ?', 'customer', 1),
(00000000005, 'รายการล่าสุดถูกต้องไหมครับ?', 'admin', 1),
(00000000006, 'ถูกต้องครับ ^^', 'customer', 1),
(00000000007, 'กรุณารอสักครู่นะครับ', 'admin', 1),
(00000000008, 'คุณลูกค้าสามารถยกเลิกรายการนี้ได้ทันทีเลยนะครับ', 'admin', 1),
(00000000009, 'ให้ดำเนินการเลยหรือไม่?', 'admin', 1),
(00000000010, 'ได้ครับ จากนั้นจึงสั่งซื้อสินค้าใหม่นะครับ', 'customer', 1),
(00000000011, 'ใช่ครับ ตอนนี้ยกเลิกการสั่งซื้อเรียบร้อยครับ สามารถตรวจสอบสถานะการสั่งซื้อได้ที่ประวัติการสั่งซื้อสินค้าครับ', 'admin', 1),
(00000000012, 'มีอะไรให้ช่วเหลืออีกหรือไม่ครับ?', 'admin', 1),
(00000000013, 'ไม่มีแล้วครับ ขอบคุณครับ ^^', 'customer', 1),
(00000000014, 'ด้วยความยินดีครับ ^___^', 'admin', 1),
(00000000015, 'สวัสดีค่ะ', 'customer', 3),
(00000000016, 'ต้องการยกเลิกบางรายการได้ไหมคะ', 'customer', 3),
(00000000017, 'สวัสดีค่ะ สินค้าส่งมาถึงหรือยังคะ?', 'customer', 9),
(00000000018, 'ได้ครับ หากสถานะยังไม่ได้ดำเนินการเปลี่ยนแปลงใดๆจากเจ้าหน้าที่', 'admin', 3),
(00000000019, 'ไม่ทราบเป็นรายการไหนครับ?', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_content` int(8) NOT NULL,
  `title_content` varchar(255) NOT NULL,
  `des_content` varchar(255) NOT NULL,
  `keyword_content` varchar(255) NOT NULL,
  `heading_content` varchar(255) NOT NULL,
  `content_content` longtext NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `img5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `title_content`, `des_content`, `keyword_content`, `heading_content`, `content_content`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(8, 'สินค้านาทีทอง', 'ลดราคาตั้งแต่วันที่ 1 - 10 เมษายน 2566', 'ลดครึ่งราคา', 'รองเท้าผ้าลดครึ่งราคา', '\r\n        \r\n         \r\n        \r\n         \r\n        \r\n                  \r\n\r\n         \r\n        <div class=\"c1\" style=\"\"><div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\" style=\"background-color: rgb(255, 255, 255);\"><img src=\"../img/lyPEujxzjn.png\r\n\r\n\r\n\" class=\"myimage\"></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div>         \r\n         \r\n                 \r\n         \r\n        ', '26-04-2023-07-58701632423.jpg', '', '', '', ''),
(10, 'สินค้าลดราคา', 'เสื้้อผู้ชายลายขอ ขนาดหน้าอก 40 ', 'เสื้อลดราคา', 'เสื้อลดราคา', '\r\n        \r\n                  \r\n<div class=\"c1\">\r\n<div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div>\r\n<div class=\"pp\" contenteditable=\"true\" style=\"background-color: rgb(255, 255, 255);\">เสื้อลดราคา ตอนนีี้&nbsp;</div>\r\n<i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i>\r\n</div>\r\n         \r\n        ', '', '', '', '', ''),
(11, '123', '123', '123', '123', '\r\n        \r\n                  \r\n<div class=\"c1\">\r\n<div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div>\r\n<div class=\"pp\" contenteditable=\"true\" style=\"background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullam<img src=\"../img/DLPlviNs5I.png\r\n\r\n\r\n\" class=\"myimage\">co laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>\r\n<i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i>\r\n</div>\r\n         \r\n        ', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(8) UNSIGNED ZEROFILL NOT NULL,
  `user_customer` varchar(255) NOT NULL,
  `pass_customer` varchar(255) NOT NULL,
  `name_customer` varchar(255) DEFAULT NULL,
  `status_customer` varchar(8) DEFAULT 'yes',
  `address_customer` varchar(255) DEFAULT NULL,
  `tel_customer` varchar(20) DEFAULT NULL,
  `read` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `user_customer`, `pass_customer`, `name_customer`, `status_customer`, `address_customer`, `tel_customer`, `read`) VALUES
(00000020, '555', '555', 'Thanawat', 'yes', '45/12', '0808008008', 0),
(00000021, 'ธนาพร', '123', 'ธนาพร', 'yes', '   45/12 บ้านตาล ตำบล โคกสี อำเภอ สว่างแดนดิน จังหวัด สกลนคร     \r\n      ', '0801757885', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(8) UNSIGNED ZEROFILL NOT NULL,
  `id_order` int(8) UNSIGNED ZEROFILL NOT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `type_detail` varchar(255) DEFAULT NULL,
  `price_detail` int(8) DEFAULT '0',
  `qty_detail` int(8) NOT NULL,
  `id_product` int(8) UNSIGNED ZEROFILL DEFAULT '00000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_order`, `product_detail`, `type_detail`, `price_detail`, `qty_detail`, `id_product`) VALUES
(00000001, 00000001, 'small-00000001', '1027', 1, 10000, 00000001),
(00000002, 00000001, 'big-00000002', '3', 1, 20000, 00000002),
(00000003, 00000002, 'small-00000001', 'm', 1, 10000, 00000001),
(00000004, 00000002, 'big-00000002', 'm', 1, 10000, 00000002),
(00000005, 00000003, 'big-00000004', 'm', 1, 10000, 00000004),
(00000006, 00000004, 'big-00000004', 'm', 1, 10000, 00000004),
(00000007, 00000005, 'big-00000002', 'm', 1, 10000, 00000002),
(00000008, 00000006, 'big-00000002', 'm', 1, 10000, 00000002),
(00000009, 00000006, 'big-00000004', 'm', 1, 10000, 00000004),
(00000010, 00000007, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000011, 00000007, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000012, 00000008, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000013, 00000008, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000014, 00000009, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000015, 00000010, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000016, 00000011, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000017, 00000012, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000018, 00000012, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000019, 00000013, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000020, 00000013, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000021, 00000013, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000022, 00000013, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000023, 00000014, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000024, 00000014, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000025, 00000015, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000026, 00000015, 'claybrick-00000002', 'm', 1, 90000, 00000002),
(00000027, 00000016, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000028, 00000016, 'claybrick-00000002', 'm', 1, 90000, 00000002),
(00000029, 00000017, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000030, 00000017, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000031, 00000017, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000032, 00000018, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000033, 00000019, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000034, 00000020, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000035, 00000020, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000036, 00000021, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000037, 00000021, 'claybrick-00000002', 'm', 1, 90000, 00000002),
(00000038, 00000021, 'claybrick-00000005', 'm', 1, 60000, 00000005),
(00000039, 00000022, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000040, 00000023, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000041, 00000024, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000042, 00000025, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000043, 00000025, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000044, 00000026, 'claybrick-00000001', 'm', 1, 70000, 00000001),
(00000045, 00000026, 'claybrick-00000002', 'm', 1, 40000, 00000002),
(00000046, 00000027, 'claybrick-00000005', 'm', 1, 10000, 00000005),
(00000047, 00000028, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000048, 00000029, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000049, 00000030, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000050, 00000031, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000051, 00000032, 'claybrick-00000005', 'm', 1, 10000, 00000005),
(00000052, 00000033, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000053, 00000033, 'claybrick-00000005', 'm', 1, 10000, 00000005),
(00000054, 00000034, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000055, 00000035, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000056, 00000036, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000057, 00000037, 'claybrick-00000001', 'm', 1, 10000, 00000001),
(00000058, 00000038, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000059, 00000039, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000060, 00000040, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000061, 00000041, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000062, 00000042, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000063, 00000042, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000064, 00000043, 'claybrick-00000002', 'm', 1, 10000, 00000002),
(00000065, 00000043, 'ancientbrick-00000003', 'm', 1, 10000, 00000003),
(00000066, 00000043, 'ancientbrick-00000004', 'm', 1, 10000, 00000004),
(00000067, 00000044, 'claybrick-00000010', 'm', 2222, 2, 00000010),
(00000068, 00000045, 'sarong-00000017', 'm', 1200, 2, 00000017),
(00000069, 00000046, 'sarong-00000017', 'm', 1200, 1, 00000017),
(00000070, 00000047, 'sarong-00000017', 'm', 1200, 1, 00000017),
(00000071, 00000048, 'shirt-00000014', 'm', 2500, 1, 00000014),
(00000072, 00000049, 'shirt-00000015', 'm', 2500, 10, 00000015),
(00000073, 00000050, 'sarong-00000017', 'm', 1200, 1, 00000017),
(00000074, 00000051, 'skirt-00000016', 'm', 1500, 1, 00000016),
(00000075, 00000052, 'shirt-00000015', 'm', 2500, 1, 00000015),
(00000076, 00000053, 'sarong-00000018', 'm', 1000, 1, 00000018),
(00000077, 00000054, 'shirt-00000014', 'm', 2500, 1, 00000014),
(00000078, 00000055, 'sarong-00000018', 'm', 1000, 1, 00000018),
(00000079, 00000056, 'shirt-00000014', 'm', 2500, 1, 00000014),
(00000080, 00000057, 'shirt-00000014', 'm', 2500, 1, 00000014),
(00000081, 00000058, 'sabai-00000020', 'm', 1200, 1, 00000020),
(00000082, 00000059, 'shirt-00000014', 'm', 2500, 1, 00000014);

-- --------------------------------------------------------

--
-- Table structure for table `detail_supplier`
--

CREATE TABLE `detail_supplier` (
  `id_detail` int(8) UNSIGNED ZEROFILL NOT NULL,
  `id_order` int(8) UNSIGNED ZEROFILL NOT NULL,
  `product_detail` varchar(255) DEFAULT NULL,
  `type_detail` varchar(255) DEFAULT NULL,
  `price_detail` int(8) DEFAULT '0',
  `qty_detail` int(8) NOT NULL,
  `id_product` int(8) UNSIGNED ZEROFILL DEFAULT '00000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_supplier`
--

INSERT INTO `detail_supplier` (`id_detail`, `id_order`, `product_detail`, `type_detail`, `price_detail`, `qty_detail`, `id_product`) VALUES
(00000001, 00000001, 'clay-00000001', 'm', 500, 1, 00000001),
(00000002, 00000001, 'husk-00000003', 'm', 700, 1, 00000003),
(00000003, 00000001, 'clay-00000006', 'm', 750, 3, 00000006),
(00000004, 00000002, 'clay-00000001', 'm', 500, 1, 00000001),
(00000005, 00000002, 'clay-00000002', 'm', 600, 1, 00000002),
(00000006, 00000003, 'clay-00000001', 'm', 500, 1, 00000001),
(00000007, 00000003, 'clay-00000002', 'm', 600, 1, 00000002),
(00000008, 00000003, 'husk-00000003', 'm', 700, 1, 00000003),
(00000009, 00000004, 'clay-00000001', 'm', 500, 1, 00000001),
(00000010, 00000004, 'clay-00000002', 'm', 600, 1, 00000002),
(00000011, 00000005, 'clay-00000001', 'm', 500, 1, 00000001),
(00000012, 00000005, 'clay-00000002', 'm', 600, 1, 00000002),
(00000013, 00000006, 'clay-00000001', 'm', 500, 1, 00000001),
(00000014, 00000006, 'clay-00000002', 'm', 600, 2, 00000002);

-- --------------------------------------------------------

--
-- Table structure for table `howto`
--

CREATE TABLE `howto` (
  `id_howto` int(8) NOT NULL,
  `title_howto` varchar(255) NOT NULL,
  `des_howto` varchar(255) NOT NULL,
  `keyword_howto` varchar(255) NOT NULL,
  `heading_howto` varchar(255) NOT NULL,
  `content_howto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `howto`
--

INSERT INTO `howto` (`id_howto`, `title_howto`, `des_howto`, `keyword_howto`, `heading_howto`, `content_howto`) VALUES
(1, 'วิธีสั่งซื้อ', 'วิธีสั่งซื้อ', 'วิธีสั่งซื้อ', 'วิธีสั่งซื้อ', '\r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n        <div class=\"c1\" style=\"\"><div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\" style=\"background-color: rgb(255, 255, 255);\">ขั้นตอนที่1 เลือกสินค้าที่ต้องการสั่งซื้อ กดเพิ่มลงในตะกร้าสินค้า<img src=\"http://127.0.0.1/samadda/img/Nt5c8hwAvk.png\" class=\"myimage\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<div>&nbsp;</div></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div>         \r\n         \r\n        <div class=\"c1\" style=\"\"><div class=\"mymove\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">ขั้นตอนที่2&nbsp;เมื่อกดเพิ่มลงในตะกร้าสินค้าแล้ว สังเกตด้าน ล่างมุมขวาจะมีการแจ้งเตือน 1 รายการ ในกดตรง 1 รายการได้เลย<img src=\"http://127.0.0.1/samadda/img/dhzNOH3pVN.png\" class=\"myimage\"></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div><div class=\"c1\" style=\"\"><div class=\"mymove\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">ขั้นตอนที่3 เมื่อกดตรง 1 รายการ เข้ามาแล้วจะเจอหน้ายืนยันการส่งซื้อสินค้า ให้เลือกวิธีการจัดส่ง&nbsp;<div>การจัดส่งจะมี 2 แบบให้เลือก ระหว่างรับเองที่ร้าน กับ รับทางไปรษณย์<img src=\"http://127.0.0.1/samadda/img/RG3EqCVQbd.png\" class=\"myimage\">&nbsp;เรียบร้อยแล้วกดยืนยันการสั่งซื้อสินค้าได้เลย&nbsp;</div></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div><div class=\"c1\" style=\"\"><div class=\"mymove\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">ขั้นตอนที่4 เมื่อกดยืนยันการสั่งซื้อสินค้า จะมีข้อความเราได้รับการยืนยันการสั่งซื้อแล้ว&nbsp;<div>ลูกค้าก็กดปุ่ม คลิก ตรงยืนยันการชำระสินค้าได้เล<img src=\"http://127.0.0.1/samadda/img/S2RqBG37zI.png\" class=\"myimage\">ย</div></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div><div class=\"c1\" style=\"\"><div class=\"mymove\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">ขั้นตอนที่5 เมื่อกดปุ่มยืนยันการชำระสินค้าแล้ว จะเข้ามาหน้าการยืนยันการชำระสินค้า&nbsp;<div>จะมีเลขบัญชีของทางร้าน ถ้าลูกค้า เลือกเป็น รับสินค้าเอง ช่องทางการชำระเงินให้เลือกเป็น&nbsp;<span style=\"text-indent: 4em;\">ชำระเงินหน้าร้าน</span></div><div><span style=\"text-indent: 4em;\">ถ้า ลูกค้าเลือก รับทางไปรษณย์ ให้ลูกค้าเลือกช่องทางการโอนเงิน เลือก เวลาการโอนเงิน และแนบไฟล์รูปภาพ .jpg ด้วย</span></div><div><span style=\"text-indent: 4em;\">เสร็จแล้วกด ยืนยันการชำระวินค้าได้เลยครับ</span></div><div>&nbsp;<img src=\"../img/o9ls95FPhs.png\r\n\r\n\r\n\" class=\"myimage\"></div></div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div>'),
(2, 'ติดต่อเรา', 'ติดต่อเรา', 'ติดต่อเรา', 'ติดต่อเรา', '\r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n         \r\n        \r\n          \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n        <div class=\"c1\" style=\"background-image: none; background-color: rgba(255, 255, 153, 0.51);\"><div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\" style=\"background-color: rgb(255, 255, 255);\">&nbsp;FaceBook : สมัดดาผ้าทอมือ&nbsp;</div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div>         \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n                 \r\n         \r\n        <div class=\"c1\" style=\"\"><div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">Line : ร้านสมัดดาผ้าทอมือ : 0808008008</div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div><div class=\"c1\" style=\"\"><div class=\"mymove ui-sortable-handle\"><img src=\"../icon/exit.png\" onclick=\"return removeme(this)\" class=\"removeme\"></div><div class=\"pp\" contenteditable=\"true\">เบอร์โทร ร้านสมัดดาผ้าทอมือ : 0930694037</div><i class=\"drag\">Drag 1 columns</i> <i class=\"fa fa-chevron-right fa-1\" aria-hidden=\"true\"></i></div>         \r\n         \r\n        ');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturing`
--

CREATE TABLE `manufacturing` (
  `id_manufacturing` int(8) UNSIGNED ZEROFILL NOT NULL,
  `time_manufacturing` date NOT NULL,
  `name_manufacturing` varchar(255) NOT NULL,
  `qty_manufacturing` int(8) DEFAULT '0',
  `status_manufacturing` varchar(255) DEFAULT 'checking'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturing`
--

INSERT INTO `manufacturing` (`id_manufacturing`, `time_manufacturing`, `name_manufacturing`, `qty_manufacturing`, `status_manufacturing`) VALUES
(00000007, '2023-04-21', '5555', 5555, 'checking');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(8) UNSIGNED ZEROFILL NOT NULL,
  `send_order` int(8) DEFAULT NULL,
  `list_order` int(8) NOT NULL,
  `qty_order` int(8) NOT NULL,
  `price_order` int(8) NOT NULL,
  `id_member` int(8) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `address` longtext,
  `tel` varchar(255) DEFAULT NULL,
  `discount` int(8) DEFAULT '0',
  `status_order` varchar(255) DEFAULT 'wait',
  `time_order` varchar(255) DEFAULT NULL,
  `utime_order` varchar(255) DEFAULT NULL,
  `time_paid` varchar(255) DEFAULT NULL,
  `bank_paid` varchar(255) DEFAULT NULL,
  `img_paid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `send_order`, `list_order`, `qty_order`, `price_order`, `id_member`, `name`, `address`, `tel`, `discount`, `status_order`, `time_order`, `utime_order`, `time_paid`, `bank_paid`, `img_paid`) VALUES
(00000044, 500, 1, 2, 4944, 20, '555', '555', '555', 0, 'complete', '19-04-2023', '1681837200', '17-18', 'scb', 'no'),
(00000045, 50, 1, 2, 2450, 20, '555', '555', '555', 0, 'cancel', '22-04-2023', '1682096400', '6-7', 'kbank', 'uploads/22-04-2023_177377.png'),
(00000046, 50, 1, 1, 1250, 20, '555', '555', '555', 0, 'complete', '22-04-2023', '1682096400', '15-16', 'kbank', 'uploads/22-04-2023_417602.jpg'),
(00000047, 50, 1, 1, 1250, 20, '555', '555', '555', 0, 'wait', '22-04-2023', '1682096400', NULL, NULL, NULL),
(00000048, 50, 1, 1, 2550, 20, '555', '555', '555', 0, 'complete', '24-04-2023', '1682269200', '6-7', 'kbank', 'uploads/24-04-2023_444655.jpg'),
(00000049, 50, 1, 10, 25050, 20, '555', '555', '555', 0, 'wait', '25-04-2023', '1682355600', NULL, NULL, NULL),
(00000050, 0, 1, 1, 1200, 20, '555', '555', '555', 0, 'wait', '25-04-2023', '1682355600', NULL, NULL, NULL),
(00000051, 50, 1, 1, 1550, 20, '555', '555', '555', 0, 'complete', '25-04-2023', '1682355600', '17-18', 'kbank', 'uploads/25-04-2023_47687.jpg'),
(00000052, 0, 1, 1, 2500, 20, '555', '45/12', '0808008008', 0, 'complete', '26-04-2023', '1682442000', '10-11', 'scb', 'uploads/26-04-2023_262854.jpg'),
(00000053, 0, 1, 1, 1000, 20, '555', '45/12', '0808008008', 0, 'complete', '26-04-2023', '1682442000', '7-8', 'scb', 'uploads/26-04-2023_494301.jpg'),
(00000054, 50, 1, 1, 2550, 20, 'Thanawat', '45/12', '0808008008', 0, 'wait', '01-05-2023', '1682874000', NULL, NULL, NULL),
(00000055, 50, 1, 1, 1050, 20, 'Thanawat', '45/12', '0808008008', 0, 'wait', '01-05-2023', '1682874000', NULL, NULL, NULL),
(00000056, 50, 1, 1, 2550, 20, 'Thanawat', '45/12', '0808008008', 0, 'wait', '02-05-2023', '1682960400', NULL, NULL, NULL),
(00000057, 50, 1, 1, 2550, 20, 'Thanawat', '45/12', '0808008008', 0, 'checking', '10-05-2023', '1683651600', '4-5', 'scb', 'uploads/10-05-2023_939413.jpg'),
(00000058, 0, 1, 1, 1200, 20, 'Thanawat', '45/12', '0808008008', 0, 'checking', '10-05-2023', '1683651600', '', 'kbank', 'uploads/10-05-2023_26576.jpg'),
(00000059, 50, 1, 1, 2550, 20, 'Thanawat', '45/12', '0808008008', 0, 'complete', '12-05-2023', '1683824400', '', 'no', 'uploads/12-05-2023_365547.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(8) UNSIGNED ZEROFILL NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `des_product` longtext NOT NULL,
  `type_product` varchar(255) NOT NULL,
  `stock_product` int(8) DEFAULT '0',
  `dprice_product` float NOT NULL,
  `price_product` float NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `img5` varchar(255) DEFAULT NULL,
  `status_product` varchar(255) DEFAULT 'yes',
  `size_product` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `des_product`, `type_product`, `stock_product`, `dprice_product`, `price_product`, `img1`, `img2`, `img3`, `img4`, `img5`, `status_product`, `size_product`) VALUES
(00000014, 'เสื้อ สูท ผู้ชาย ลายขอ หน้าอก 40 ', '                                                                    เสื้อลายขอ ผู้ชาย ขนาดหน้าอก 40  555555555555555555555555555555555555555555555555                                                           ', 'shirt', 2, 2600, 2500, '22-04-2023-02-181121145441.jpg', '', '', '', '', 'yes', 0),
(00000015, 'เสื้อสูท ลายขอผู้หญิง ขนาด40', '                                                เสื้อสูทผู้หญิง ขนาดหน้าอก 40                                    ', 'shirt', 3, 2600, 2500, '22-04-2023-02-371974243973.jpg', '', '', '', '', 'yes', 0),
(00000016, 'กระโปรง หางปลา เอว 30', '                            กระโปรง หางปลาลายนกน้อย ขนาด 30                        ', 'skirt', 3, 1600, 1500, '22-04-2023-02-281459474041.jpg', '', '', '', '', 'yes', 0),
(00000017, 'ผ้าซิ่น', '           ผ้าซิ่น ลายตัวเอส ขาด 30        ', 'sarong', 3, 1250, 1200, '22-04-2023-02-32220131614.jpg', '', '', '', '', 'yes', 0),
(00000018, 'รองเท้าผ้า ขนาด 40', '                    สินค้านาทีทอง            ', 'sarong', 5, 2000, 1000, '26-04-2023-13-491785267137.jpg', '26-04-2023-13-49900734714.jpg', '26-04-2023-13-49860563335.jpg', '', '', 'yes', 0),
(00000019, 'ผ้าทอมือ 30*30', '                   ', 'skirt', 0, 0, 1200, '', '', '', '', '', 'no', 0),
(00000020, 'สไบ 40*40', '                                                          ', 'sabai', 2, 1300, 1200, '02-05-2023-12-00558114444.jpg', '', '', '', '', 'yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id_seller` int(8) NOT NULL,
  `user_seller` varchar(255) NOT NULL,
  `pass_seller` varchar(255) NOT NULL,
  `name_seller` varchar(255) DEFAULT NULL,
  `status_seller` varchar(8) DEFAULT 'yes',
  `address_seller` varchar(255) DEFAULT NULL,
  `tel_seller` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id_seller`, `user_seller`, `pass_seller`, `name_seller`, `status_seller`, `address_seller`, `tel_seller`) VALUES
(1, 'seller', '123', 'ธนวัฒน์ จ้อยจีด ', 'yes', '              45/12 บ้านตาล ตำบลโคกสี อำเภอสว่างแดนดิน จังหวัดสกลนคร 47110                     ', '0808008008'),
(2, '5555', '5555', '123456', '', '              \r\n            ', '5555'),
(3, 'test', '123', 'test', 'yes', '                     \r\n    test            ', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `howto`
--
ALTER TABLE `howto`
  ADD PRIMARY KEY (`id_howto`);

--
-- Indexes for table `manufacturing`
--
ALTER TABLE `manufacturing`
  ADD PRIMARY KEY (`id_manufacturing`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `Id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `detail_supplier`
--
ALTER TABLE `detail_supplier`
  MODIFY `id_detail` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `howto`
--
ALTER TABLE `howto`
  MODIFY `id_howto` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturing`
--
ALTER TABLE `manufacturing`
  MODIFY `id_manufacturing` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id_seller` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
