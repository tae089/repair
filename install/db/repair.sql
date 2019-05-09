-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2019 at 11:07 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `autonumber`
--

CREATE TABLE `autonumber` (
  `item_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `finance_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `quotation_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `invoice_number` int(4) UNSIGNED ZEROFILL NOT NULL,
  `year` int(4) UNSIGNED ZEROFILL NOT NULL,
  `month` int(2) UNSIGNED ZEROFILL NOT NULL,
  `day` int(2) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autonumber`
--

INSERT INTO `autonumber` (`item_number`, `finance_number`, `quotation_number`, `invoice_number`, `year`, `month`, `day`) VALUES
(0018, 0001, 0001, 0001, 2019, 05, 07);

-- --------------------------------------------------------

--
-- Table structure for table `backup_logs`
--

CREATE TABLE `backup_logs` (
  `backup_key` varchar(32) NOT NULL,
  `backup_file` varchar(256) NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_key` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `card_key` char(32) NOT NULL,
  `card_code` varchar(16) NOT NULL,
  `card_customer_name` varchar(64) NOT NULL,
  `card_customer_lastname` varchar(64) NOT NULL,
  `card_customer_address` text NOT NULL,
  `card_customer_phone` varchar(128) NOT NULL,
  `card_customer_work_group` tinyint(5) NOT NULL COMMENT 'รหัสกลุ่มงาน',
  `card_note` text NOT NULL,
  `card_done_aprox` date NOT NULL,
  `user_key` varchar(32) NOT NULL,
  `card_status` varchar(32) NOT NULL,
  `card_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`card_key`, `card_code`, `card_customer_name`, `card_customer_lastname`, `card_customer_address`, `card_customer_phone`, `card_customer_work_group`, `card_note`, `card_done_aprox`, `user_key`, `card_status`, `card_insert`) VALUES
('178f19b24562db9b85b5acea0e72e43b', 'CC2AEL0E', 'นางสาวรัตนาลักษณ์', 'โคตะชิมิ', 'โรงพยาบาลโนนสะอาด อ.โนนสะอาด จ.อุดรธานี 41240', '139', 18, 'ปกติ', '2018-11-28', '5c74165778e0a3b6b96f802d1290f005', 'b1f4d8a6d50a01b4211fd877f7ae464f', '2018-11-26 17:03:30'),
('dcde8c7ce3fdfdce13d07adaa317b335', 'CKDAL3J', 'ทดสอบ', 'ทดสอบ', 'โรงพยาบาลโนนสะอาด อ.โนนสะอาด จ.อุดรธานี 41240', '121', 5, 'ปกติ', '2019-05-10', '', '4973069504e1be2a5bdcf7162ade8a16', '2019-05-07 07:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `card_item`
--

CREATE TABLE `card_item` (
  `item_key` char(32) NOT NULL,
  `card_key` varchar(32) NOT NULL,
  `item_number` int(11) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `item_note` text NOT NULL,
  `item_category_type` tinyint(5) NOT NULL COMMENT 'ประเภทอุปกรณ์',
  `item_price_aprox` float NOT NULL,
  `item_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_item`
--

INSERT INTO `card_item` (`item_key`, `card_key`, `item_number`, `item_name`, `item_note`, `item_category_type`, `item_price_aprox`, `item_insert`) VALUES
('0fd2084f0b864154badfe72d62336ead', 'dcde8c7ce3fdfdce13d07adaa317b335', 19050017, 'จอคอม', 'เปิดไม่ติด', 1, 0, '2019-05-07 07:27:36'),
('5515df9fa2d314222cd3f5b3b22c8f61', '178f19b24562db9b85b5acea0e72e43b', 18110001, 'HP LaserJet Pro P1102', 'ปริ้นแล้วกระดาษติดบ่อยๆ', 3, 0, '2018-11-27 05:06:33'),
('e012c57de786758ec93a2a7aeaf1a2fb', '74ecee88bc19fc219b3409eda144bf68', 19050007, 'ทดสอบ', 'พังเสียหาย', 3, 150, '2019-05-03 03:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `card_status`
--

CREATE TABLE `card_status` (
  `cstatus_key` char(32) NOT NULL,
  `card_key` varchar(32) NOT NULL,
  `card_status` varchar(32) NOT NULL,
  `card_status_note` text NOT NULL,
  `user_key` varchar(32) NOT NULL,
  `cstatus_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_status`
--

INSERT INTO `card_status` (`cstatus_key`, `card_key`, `card_status`, `card_status_note`, `user_key`, `cstatus_insert`) VALUES
('13649fb1b6761f8fd7d18b220941acfc', 'dcde8c7ce3fdfdce13d07adaa317b335', 'b090c4112da52d40a08349b9000dab88', '', '', '2019-05-07 08:21:53'),
('19d85072d1988172a86edeb6bd38c1f1', 'dcde8c7ce3fdfdce13d07adaa317b335', '89da7d193f3c67e4310f50cbb5b36b90', '', '', '2019-05-07 07:56:00'),
('22c45953855fedc63371066a1d099570', '178f19b24562db9b85b5acea0e72e43b', '89da7d193f3c67e4310f50cbb5b36b90', 'ด่วน', '5c74165778e0a3b6b96f802d1290f005', '2018-11-26 17:37:35'),
('664e972ddf327c086a909bf8065a5615', 'dcde8c7ce3fdfdce13d07adaa317b335', 'b1f4d8a6d50a01b4211fd877f7ae464f', '', '', '2019-05-07 07:56:41'),
('a6a78c4ee90f1c616a3e2c1b30407a60', 'dcde8c7ce3fdfdce13d07adaa317b335', '4973069504e1be2a5bdcf7162ade8a16', '', '', '2019-05-10 08:47:55'),
('cc5e04535815b198f0a7894fbf36081a', '178f19b24562db9b85b5acea0e72e43b', 'b1f4d8a6d50a01b4211fd877f7ae464f', 'กำลังซ่อม', '', '2018-11-26 17:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `ctype_key` char(32) NOT NULL,
  `ctype_name` varchar(128) NOT NULL,
  `ctype_color` varchar(16) NOT NULL,
  `ctype_status` tinyint(1) NOT NULL,
  `ctype_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`ctype_key`, `ctype_name`, `ctype_color`, `ctype_status`, `ctype_insert`) VALUES
('2fdf411856947d19708cf4da19aa3af3', 'เปลี่ยนสินค้าชิ้นใหม่', '#ff6969', 0, '2016-04-25 13:50:59'),
('31c1891444b8e5734bee09165953bca1', 'ไม่สามารถซ่อมได้', '#9e9806', 0, '2016-04-25 13:49:41'),
('4973069504e1be2a5bdcf7162ade8a16', 'ซ่อม/เคลม เสร็จ', '#06d628', 1, '2016-04-25 13:49:21'),
('58dc6633d9c14d0189efd328fc119591', 'ส่งมอบสินค้าคืนลูกค้าเรียบร้อย', '#2958ff', 0, '2016-04-25 13:52:56'),
('89da7d193f3c67e4310f50cbb5b36b90', 'นำรายการซ่อม/เคลม เข้าระบบ', '#29ccff', 1, '2016-04-25 13:23:50'),
('a5eb0dd1c5065bb9fe0cb05d61f03f4a', 'ยกเลิกการซ่อม/เคลม', '#753709', 1, '2016-04-25 13:51:39'),
('b090c4112da52d40a08349b9000dab88', 'ตรวจสอบรายการซ่อม/เคลม', '#c9c9c9', 1, '2016-04-25 13:11:34'),
('b1f4d8a6d50a01b4211fd877f7ae464f', 'ดำเนินการซ่อม/เคลม', '#120eeb', 1, '2016-04-25 13:48:05'),
('c382e352e2e620a3c60a2cc7c6a7fa35', 'ส่งต่อการซ่อม/เคลม', '#d940ff', 1, '2016-04-25 13:48:42'),
('c9934ed002b3a365088862d85604b765', 'เปลี่ยนอะไหล่', '#9c9c9c', 0, '2016-04-25 13:51:16'),
('da144a84c0660c67f115eeefa93dc56f', 'ชำระเงิน', '#ff5c00', 0, '2016-04-25 13:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name_th` varchar(150) NOT NULL,
  `category_name_en` varchar(150) NOT NULL,
  `category_status` tinyint(5) NOT NULL DEFAULT '1' COMMENT '0:ซ่อน,1:แสดง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name_th`, `category_name_en`, `category_status`) VALUES
(1, 'คอมพิวเตอร์', 'Computer', 1),
(2, 'คอมพิวเตอร์ โน๊ตบุ๊ค', 'Computer Notebook', 1),
(3, 'ปริ้นเตอร์', 'Printer', 1),
(4, 'เครื่องสำรองไฟ', 'UPS', 1),
(5, 'อุปกรณ์ต่อพ่วง', 'Accessories', 1),
(6, 'เครือข่าย', 'Network', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `work_group_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `work_group_id`) VALUES
(1, 'งานบริหารทั่วไป', '1'),
(2, 'งานการเงินและบัญชี', '1'),
(3, 'งานพัสดุ', '1'),
(4, 'งานการเจ้าหน้าที่', '1'),
(5, 'งานผู้ป่วยนอก', '2'),
(6, 'ตึกผู้ป่วยใน', '2'),
(7, 'คลินิกพิเศษ', '2'),
(8, 'งานซักฟอก', '2'),
(9, 'COC ', '2'),
(10, 'ทันตกรรม', '2'),
(11, 'เภสัชกรรม', '2'),
(12, 'ห้องแล็บ', '2'),
(13, 'อุบัติเหตุฉุกเฉิน', '2'),
(14, 'งานประกัน', '2'),
(15, 'งานระบาด', '2'),
(16, 'x-ray', '2'),
(17, 'PCU', '2'),
(18, 'ห้องคลอด', '2'),
(19, 'แพทย์แผนไทย', '2'),
(20, 'DPAC', '2'),
(21, 'กายภาพ', '2'),
(22, 'โภชนาการ', '2'),
(23, 'ซ่อมบำรุง', '1'),
(24, 'ซับพลาย', '2'),
(25, 'งาน it', '1'),
(26, 'งานแผน', '1'),
(27, 'งาน NCD', '2'),
(28, 'งาน TB COPD ASTHMA', '2'),
(29, 'งานผู้สูงอายุ', '2'),
(30, 'ฝ่ายการพยาบาล', '2'),
(31, 'งาน IC', '2');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_code` varchar(16) NOT NULL,
  `language_name` varchar(32) NOT NULL,
  `language_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_code`, `language_name`, `language_status`) VALUES
('en', 'English', 0),
('th', 'ภาษาไทย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `cases` varchar(64) NOT NULL,
  `menu` varchar(64) NOT NULL,
  `pages` varchar(128) NOT NULL,
  `case_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`cases`, `menu`, `pages`, `case_status`) VALUES
('setting', 'setting', 'settings/setting.php', 1),
('member', 'member', 'members/member.php', 1),
('cashier', 'cashier', 'cashier/cashier.php', 1),
('report', 'report', 'report/report.php', 1),
('report_export', 'report', 'report/report_export.php', 1),
('report_movement', 'report', 'report/report_movement.php', 1),
('report_income', 'report', 'report/report_income.php', 1),
('report_income_detail', 'report', 'report/report_income_detail.php', 1),
('report_booking', 'report', 'report/report_booking.php', 1),
('report_logs', 'report', 'report/report_logs.php', 1),
('report_delivery', 'report', 'report/report_delivery.php', 1),
('report_delivery_detail', 'report', 'report/report_delivery_detail.php', 1),
('setting_users', 'setting', 'settings/setting_users.php', 1),
('setting_backup', 'setting', 'settings/setting_backup.php', 1),
('setting_unit', 'setting', 'settings/setting_unit.php', 0),
('setting_categories', 'setting', 'settings/setting_categories.php', 1),
('setting_member_group', 'setting', 'settings/setting_member_group.php', 1),
('setting_promotions', 'setting', 'settings/setting_promotions.php', 1),
('report_debt', 'report', 'report/report_debt.php', 1),
('report_creditor', 'report', 'report/report_creditor.php', 1),
('setting_info', 'setting', 'settings/setting_info.php', 1),
('setting_system', 'setting', 'settings/setting_system.php', 1),
('setting_user_access', 'setting', 'settings/setting_user_access.php', 1),
('administrator_access_list', 'setting', 'administrator/administrator_access_list.php', 1),
('administrator_cases', 'setting', 'administrator/administrator_cases.php', 1),
('administrator_menus', 'setting', 'administrator/administrator_menus.php', 1),
('administrator_modules', 'setting', 'administrator/administrator_modules.php', 1),
('administrator_helper', 'seting', 'administrator/administrator_helper.php', 1),
('cashier_member', 'cashier', 'cashier/cashier_member.php', 1),
('cashier_booking', 'cashier', 'cashier/cashier_booking.php', 1),
('product_detail', 'product', 'products/product_detail.php', 1),
('member_detail', 'member', 'members/member_detail.php', 1),
('new_member', 'member', 'members/new_member.php', 1),
('member_history', 'member', 'members/member_history.php', 1),
('setting_promotion_member', 'setting', 'settings/setting_promotion_member.php', 1),
('report_cancel', 'report', 'report/report_cancel.php', 1),
('card_all_status', 'card', 'card/card_all_status.php', 1),
('search', '', 'main/search.php', 1),
('card', 'card', 'card/card.php', 1),
('setting_card_status', 'setting', 'settings/setting_card_status.php', 1),
('card_create_detail', 'card_create', 'card/card_create_detail.php', 1),
('search_code', '', 'main/search.php', 1),
('card_create', 'card_create', 'card/main.php', 1),
('setting_products', 'setting', 'settings/setting_products.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_key` varchar(16) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ipaddress` varchar(32) NOT NULL,
  `log_text` varchar(256) NOT NULL,
  `log_user` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_key`, `log_date`, `log_ipaddress`, `log_text`, `log_user`) VALUES
('05d348411cbd3f83', '2018-11-06 03:05:39', '::1', 'admin เข้าสู่ระบบ.', ''),
('b575e3965361c5a4', '2018-11-06 03:06:40', '::1', 'admin ออกจากระบบ.', ''),
('4dac6b21c0756d23', '2018-11-06 03:06:47', '::1', 'admin เข้าสู่ระบบ.', ''),
('6858f8e3855e4b68', '2018-11-07 12:52:15', '::1', 'admin ออกจากระบบ.', ''),
('81dfb7c06ce62213', '2018-11-09 06:21:15', '::1', 'admin เข้าสู่ระบบ.', ''),
('5f1985fe8819521b', '2018-11-09 06:33:28', '::1', 'user เข้าสู่ระบบ.', '5087e7c3d2a12b0da6959da954470982'),
('d4c65926242ed6ea', '2018-11-09 11:10:06', '::1', 'admin ออกจากระบบ.', ''),
('028a1d6977235382', '2018-11-09 11:10:15', '::1', 'user ออกจากระบบ.', '5087e7c3d2a12b0da6959da954470982'),
('a962c88eed83cc7c', '2018-11-10 03:30:41', '::1', 'admin เข้าสู่ระบบ.', ''),
('d95e6cf391a98ebc', '2018-11-10 06:54:53', '::1', 'admin ออกจากระบบ.', ''),
('278f5e413e205458', '2018-11-10 06:55:05', '::1', 'admin เข้าสู่ระบบ.', ''),
('f9e44fd8c4acfa65', '2018-11-14 03:16:36', '::1', 'admin เข้าสู่ระบบ.', ''),
('a5774af0cf222981', '2018-11-19 01:35:35', '::1', 'admin เข้าสู่ระบบ.', ''),
('b5f7014b0d82af21', '2018-11-22 06:03:23', '::1', 'admin เข้าสู่ระบบ.', ''),
('4aab2166dc20317b', '2018-11-23 08:23:11', '::1', 'admin เข้าสู่ระบบ.', ''),
('60d9d5f2f9817af2', '2018-11-26 09:31:03', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('1c7456e05ab6d8c2', '2018-11-26 09:32:46', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('b5adf8e0d9a48ece', '2018-11-26 09:32:53', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('7e1b5af4903bb2f9', '2018-11-26 09:36:31', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('b07def915de1f435', '2018-11-26 09:37:36', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('36b07b0e20d5a8f3', '2018-11-26 09:52:47', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('4b1d832dc4482404', '2018-11-26 09:53:03', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('50604577713cb568', '2018-11-26 09:54:15', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('a0b9d634fd4dbad0', '2018-11-26 09:55:14', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('4a12e983ee97eb9c', '2018-11-26 09:55:26', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('eb0b01a39b6ec810', '2018-11-26 09:56:01', '::1', 'admin ออกจากระบบ.', ''),
('520a0550d4b9d4d8', '2018-11-26 09:56:09', '::1', 'admin เข้าสู่ระบบ.', ''),
('c2de3caa132eaf87', '2018-11-26 09:56:37', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('3ccf943654addb75', '2018-11-26 09:56:42', '::1', 'admin ออกจากระบบ.', ''),
('2fedb34a9c155b1d', '2018-11-26 09:56:56', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('58e37ddfc66803e0', '2018-11-26 15:34:09', '::1', 'admin เข้าสู่ระบบ.', ''),
('41b2b54b4ef49887', '2018-11-26 15:37:04', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('54026698cecba15c', '2018-11-26 15:38:03', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('efa0ded6ddb47204', '2018-11-26 16:56:22', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('2ddf5cef1ffb8a4d', '2018-11-26 16:56:35', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('0ae4be84a06e960d', '2018-11-26 16:57:40', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('fdb34c8347fbdbe5', '2018-11-26 17:29:26', '::1', 'admin ออกจากระบบ.', ''),
('47b31564929f8ee5', '2018-11-26 17:29:40', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('0d0b9ba19b44894a', '2018-11-26 17:30:02', '::1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('2a95ec9d7d38b583', '2018-11-26 17:30:11', '::1', 'admin เข้าสู่ระบบ.', ''),
('6aba21dcf049c57b', '2018-11-26 17:41:26', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('e3f08e68b008df82', '2018-11-27 02:09:08', '::1', 'admin เข้าสู่ระบบ.', ''),
('3724ef2fe20f2017', '2018-11-27 02:18:39', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('5a9eeb702ae92ba7', '2018-11-27 04:11:01', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('eb102796914b86b7', '2018-11-27 10:10:45', '::1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('93207f3dff049601', '2018-11-27 10:12:14', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('d13ddf0cafefcf9c', '2018-11-28 07:43:34', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('eb71cb60f30f9601', '2018-11-28 09:18:53', '::1', 'admin ออกจากระบบ.', ''),
('0665c87f85b76932', '2018-11-28 09:19:02', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('f20949e1fb42708d', '2018-11-28 09:26:39', '::1', 'admin เข้าสู่ระบบ.', ''),
('1cbf5aba49e450de', '2018-11-28 09:27:43', '::1', 'admin ออกจากระบบ.', ''),
('e11d361ea0d0616c', '2018-11-28 09:42:18', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('38ee4bd3b6acca35', '2018-11-28 09:42:33', '::1', 'admin เข้าสู่ระบบ.', ''),
('7230d9d593686525', '2018-11-28 10:43:12', '::1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('1043418d2d7f5600', '2018-11-28 11:04:06', '::1', 'admin ออกจากระบบ.', ''),
('170439a6e87512a6', '2019-03-12 08:09:01', '::1', 'admin เข้าสู่ระบบ.', ''),
('8df1d4e2e2601af6', '2019-03-12 08:09:14', '::1', 'admin ออกจากระบบ.', ''),
('94093519ac3c2915', '2019-03-12 08:09:30', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('91187d0ba69d141e', '2019-03-12 08:09:38', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('d795811a259c1b7f', '2019-04-22 07:30:08', '::1', 'admin เข้าสู่ระบบ.', ''),
('7e82327154d1d923', '2019-04-22 10:20:21', '127.0.0.1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('a3738e177ef9ba9d', '2019-04-22 10:31:02', '127.0.0.1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('99063a90f6b9a473', '2019-04-22 10:31:21', '127.0.0.1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('a1df0120adbd4a6b', '2019-04-22 10:31:58', '127.0.0.1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('27e0fc9fe45c6997', '2019-04-22 10:32:06', '127.0.0.1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('083704c86edf2751', '2019-04-22 11:03:16', '127.0.0.1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('a955b6c266f8eec5', '2019-04-22 11:10:57', '::1', 'admin ออกจากระบบ.', ''),
('4048de231a5cc06c', '2019-04-23 07:24:08', '::1', 'admin เข้าสู่ระบบ.', ''),
('6a41d388f6077f8f', '2019-04-23 07:25:45', '127.0.0.1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('39011ec6737de36c', '2019-04-23 07:34:19', '127.0.0.1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('6f5f7f6764bf7926', '2019-04-23 07:34:39', '127.0.0.1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('923faeb566cd6d72', '2019-04-23 07:55:19', '::1', 'admin ออกจากระบบ.', ''),
('35ccc87c6f498ff3', '2019-04-23 07:55:56', '::1', 'lr11017 เข้าสู่ระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('d99fffb442ede54f', '2019-04-23 11:24:55', '127.0.0.1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('509f61adf4c7a00e', '2019-04-23 11:25:01', '::1', 'lr11017 ออกจากระบบ.', '5c74165778e0a3b6b96f802d1290f005'),
('53cc541cec82890a', '2019-04-29 02:42:12', '::1', 'admin เข้าสู่ระบบ.', ''),
('1b10452094bf6db3', '2019-04-29 03:25:50', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('d46d10a8cf4eb8f0', '2019-04-30 03:02:17', '::1', 'admin เข้าสู่ระบบ.', ''),
('2a6b85335112ddb5', '2019-04-30 03:04:05', '127.0.0.1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('9de3a2d4638b146a', '2019-04-30 11:25:45', '127.0.0.1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('51b4616e6cafcfba', '2019-04-30 11:28:25', '::1', 'admin ออกจากระบบ.', ''),
('a7d73dbe6fbf182a', '2019-05-01 02:59:23', '::1', 'admin เข้าสู่ระบบ.', ''),
('b25c4a51f576eff9', '2019-05-01 03:01:07', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('e085967433df9fd1', '2019-05-03 02:32:43', '::1', 'admin เข้าสู่ระบบ.', ''),
('dbcf8deeaf7ccae1', '2019-05-03 02:33:20', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('019caa0e733bff25', '2019-05-03 09:41:02', '::1', 'opd11017 ออกจากระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('c6ee29305faf985b', '2019-05-07 02:49:27', '::1', 'admin เข้าสู่ระบบ.', ''),
('0f99f9b2164c5e9a', '2019-05-07 02:51:16', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0'),
('a84554820aed7078', '2019-05-07 09:43:50', '::1', 'admin ออกจากระบบ.', ''),
('248d4ea7449bdcdf', '2019-05-10 08:38:26', '::1', 'admin เข้าสู่ระบบ.', ''),
('75a772200c3e1193', '2019-05-10 08:39:54', '::1', 'opd11017 เข้าสู่ระบบ.', 'b79dfae9960af1a6b1fa1031d0d57af0');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_key` char(32) NOT NULL,
  `menu_upkey` char(32) NOT NULL,
  `menu_icon` varchar(256) NOT NULL,
  `menu_name` varchar(128) NOT NULL,
  `menu_case` varchar(128) NOT NULL,
  `menu_link` varchar(256) NOT NULL,
  `menu_status` tinyint(1) NOT NULL,
  `menu_sorting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_key`, `menu_upkey`, `menu_icon`, `menu_name`, `menu_case`, `menu_link`, `menu_status`, `menu_sorting`) VALUES
('0a3c8aabc6cdbce67a157ba1701b3fa9', '0a3c8aabc6cdbce67a157ba1701b3fa9', '<i class=\"fa fa-pie-chart fa-fw\"></i>', 'LA_MN_REPORT', 'report', '?p=report', 1, 8),
('2309e0cdb2c541bf7cb8ef0dee7b7eba', '2309e0cdb2c541bf7cb8ef0dee7b7eba', '<i class=\"fa fa-gear  fa-fw\"></i>', 'LA_MN_SETTING', 'setting', '?p=setting', 1, 9),
('26f7e62109e2566eaec8b01fe8e3598d', '26f7e62109e2566eaec8b01fe8e3598d', '<i class=\"fa fa-edit fa-fw\"></i>', 'ส่งซ่อมสินค้า/เคลม', 'card_create', '?p=card_create', 1, 2),
('295744c466c17b46170f88b5c1b9104d', '295744c466c17b46170f88b5c1b9104d', '<i class=\"fa fa-list fa-fw\"></i>', 'รายการส่งซ่อม/เคลม<span class=\"pull-right\"><span class=\"badge hvr-buzz-out\" id=\"card_count\"></span></span>', 'card', '?p=card', 1, 3),
('439c4113b058975e22f776669bb36bf0', 'ff7d5a554f4300b09f2de2e06d523be9', '<i class=\"fa flaticon-stack4 fa-fw\"></i>', 'LA_MN_PRODUCTS_DATA', 'product', '?p=product', 1, 31),
('a16043256ea5ca0ea86995e2b69ec238', 'a16043256ea5ca0ea86995e2b69ec238', '<i class=\"fa fa-home fa-fw\"></i>', 'LA_MN_HOME', '', 'index.php', 1, 1),
('c6c8729b45d1fec563f8453c16ff03b8', 'c6c8729b45d1fec563f8453c16ff03b8', '<i class=\"fa fa-lock fa-fw\"></i>', 'LA_MN_LOGOUT', 'logout', '../core/logout.core.php', 1, 10),
('f1344bc0fb9c5594fa0e3d3f37a56957', 'f1344bc0fb9c5594fa0e3d3f37a56957', '<i class=\"fa fa-users fa-fw\"></i>', 'LA_MN_MEMBERS', 'member', '?p=member', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_font_size`
--

CREATE TABLE `system_font_size` (
  `font_key` char(32) NOT NULL,
  `font_name` varchar(128) NOT NULL,
  `font_size_text` text NOT NULL,
  `font_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_font_size`
--

INSERT INTO `system_font_size` (`font_key`, `font_name`, `font_size_text`, `font_status`) VALUES
('6c3ca25445248c1dff79d51ad9fa4082', '14px', 'font-size:14px;', 1),
('74af75636b4e933684d63b617c97f398', '24px', 'font-size:24px;', 1),
('bffeb9ae0d04ffc7affc3701f9858932', '22px', 'font-size:22px;', 1),
('dd7e28065e654467be0f9c16f3bd987d', '16px', 'font-size:16px;', 1),
('e215155479796a0bdcad2326ffca09c7', '18px', 'font-size:18px;', 1),
('ff9ec5b758824e67edcf5ecc7e635f6f', '20px', 'font-size:20px;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `site_key` char(32) NOT NULL,
  `site_logo` varchar(256) NOT NULL,
  `site_favicon` varchar(256) NOT NULL,
  `time_zone` varchar(128) NOT NULL,
  `year_type` varchar(16) NOT NULL,
  `year_format` varchar(32) NOT NULL,
  `booking_logo_en` varchar(128) NOT NULL,
  `booking_title_en` varchar(128) NOT NULL,
  `booking_note1_en` text NOT NULL,
  `booking_note2_en` text NOT NULL,
  `booking_logo_th` varchar(128) NOT NULL,
  `booking_title_th` varchar(128) NOT NULL,
  `booking_note1_th` text NOT NULL,
  `booking_note2_th` text NOT NULL,
  `reciept_logo_en` varchar(128) NOT NULL,
  `reciept_title_en` varchar(128) NOT NULL,
  `reciept_note1_en` text NOT NULL,
  `reciept_note2_en` text NOT NULL,
  `reciept_logo_th` varchar(128) NOT NULL,
  `reciept_title_th` varchar(128) NOT NULL,
  `reciept_note1_th` text NOT NULL,
  `reciept_note2_th` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`site_key`, `site_logo`, `site_favicon`, `time_zone`, `year_type`, `year_format`, `booking_logo_en`, `booking_title_en`, `booking_note1_en`, `booking_note2_en`, `booking_logo_th`, `booking_title_th`, `booking_note1_th`, `booking_note2_th`, `reciept_logo_en`, `reciept_title_en`, `reciept_note1_en`, `reciept_note2_en`, `reciept_logo_th`, `reciept_title_th`, `reciept_note1_th`, `reciept_note2_th`) VALUES
('8f411b77c389d5de467af8f2c0e91cda', 'logo.png', 'icon.png', 'Asia/Bangkok', 'BE', '3', 'logo.png', 'Booking Slip', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบจองห้องพัก', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '', 'logo.png', 'Reciept', 'Name..............................................<br/>Address..............................................................................<br/>Tel................................................................', '', 'logo.png', 'ใบเสร็จรับเงิน', 'ชื่อ..............................................<br/>ที่อยู่..............................................................................<br/>โทร................................................................', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_key` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_photo` varchar(128) NOT NULL DEFAULT 'noimg.jpg',
  `user_class` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=user,2=admin,3=super admin',
  `bed_view` varchar(64) NOT NULL DEFAULT 'box_view',
  `user_language` varchar(8) NOT NULL DEFAULT 'th',
  `system_font_size` varchar(32) NOT NULL DEFAULT 'dd7e28065e654467be0f9c16f3bd987d',
  `email` varchar(128) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `groups` tinyint(5) NOT NULL COMMENT 'กลุ่มงาน',
  `work_id` tinyint(5) NOT NULL COMMENT 'งาน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_key`, `name`, `lastname`, `username`, `password`, `user_photo`, `user_class`, `bed_view`, `user_language`, `system_font_size`, `email`, `user_status`, `groups`, `work_id`) VALUES
('', 'ธนพันธ์', 'มั่งมูล', 'admin', '21232f297a57a5a743894a0e4a801fc3', '8ae2bc51ce32050f62f3327309a06534.png', 3, 'box_view', 'th', 'e215155479796a0bdcad2326ffca09c7', 'amager084@gmail.com', 1, 1, 25),
('5c74165778e0a3b6b96f802d1290f005', 'LR', 'ห้องคลอด', 'lr11017', '269e8a392a2bdff0ee3b25fef4de8f51', 'noimg.jpg', 2, 'box_view', 'th', 'dd7e28065e654467be0f9c16f3bd987d', 'lr11017@gmail.com', 1, 2, 18),
('b79dfae9960af1a6b1fa1031d0d57af0', 'OPD', '', 'opd11017', '269e8a392a2bdff0ee3b25fef4de8f51', 'noimg.jpg', 2, 'box_view', 'th', 'dd7e28065e654467be0f9c16f3bd987d', 'opd11017@gmail.com', 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `osession` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_key` varchar(32) CHARACTER SET utf8 NOT NULL,
  `otime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`osession`, `user_key`, `otime`) VALUES
('j21eq1gh4u0kkhpj0bl1jbknk0', '', 1557486308);

-- --------------------------------------------------------

--
-- Table structure for table `work_group`
--

CREATE TABLE `work_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_group`
--

INSERT INTO `work_group` (`group_id`, `group_name`) VALUES
(1, 'บริหาร'),
(2, 'การพยาบาล');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autonumber`
--
ALTER TABLE `autonumber`
  ADD PRIMARY KEY (`finance_number`);

--
-- Indexes for table `backup_logs`
--
ALTER TABLE `backup_logs`
  ADD PRIMARY KEY (`backup_key`);

--
-- Indexes for table `card_info`
--
ALTER TABLE `card_info`
  ADD PRIMARY KEY (`card_key`);

--
-- Indexes for table `card_item`
--
ALTER TABLE `card_item`
  ADD PRIMARY KEY (`item_key`);

--
-- Indexes for table `card_status`
--
ALTER TABLE `card_status`
  ADD PRIMARY KEY (`cstatus_key`);

--
-- Indexes for table `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`ctype_key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_code`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`cases`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_key`);

--
-- Indexes for table `work_group`
--
ALTER TABLE `work_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
