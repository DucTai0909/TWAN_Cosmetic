-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 07:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twancosmetics_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Region` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Ward` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `District` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `Name`, `Phone`, `Region`, `Ward`, `District`, `City`) VALUES
(9000004, 3000003, 'Nguyễn Tô Đức Tài', '0352330676', '583/B, ấp Tân An', 'Xã Tân Huề', 'Huyện Thanh Bình', 'Tỉnh Đồng Tháp'),
(9000005, 3000003, 'Nguyễn Minh Hiếu', '0352330676', '583/B, ấp Tân An', 'Xã Niêm Tòng', 'Huyện Mèo Vạc', 'Tỉnh Hà Giang'),
(9000006, 3000003, 'Nguyễn Tô Đức Tài', '0352330676', '583/B, ấp Tân An', 'Xã Huy Giáp', 'Huyện Bảo Lạc', 'Tỉnh Cao Bằng'),
(9000008, 3000003, 'Nguyễn ', '0352330676', '583/B, ấp Tân An', 'Xã Vần Chải', 'Huyện Đồng Văn', 'Tỉnh Hà Giang'),
(9000009, 3000003, 'Tô', '0352330676', '583/B, ấp Tân An', 'Xã Thượng Nông', 'Huyện Na Hang', 'Tỉnh Tuyên Quang'),
(9000010, 3000026, 'Tô Đức Tài', '0352330678', '583/B, ấp Tân An', 'Thị trấn Đạo Đức', 'Huyện Bình Xuyên', 'Tỉnh Vĩnh Phúc');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(30) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `image_id`, `status`, `delete_flag`, `date_created`) VALUES
(5000, 'Cocoon', 'Câu chuyện thương hiệu COCOON - Mỹ phẩm thuần chay - cho nét đẹp thuần Việt', NULL, 1, 0, '2022-11-06 20:38:27'),
(5001, 'LA ROCHE-POSAY\r\n', NULL, NULL, 1, 0, '2022-12-07 18:50:42'),
(5002, 'Manyo', NULL, NULL, 1, 0, '2022-12-09 12:50:40'),
(5003, 'Klairs', NULL, NULL, 1, 0, '2022-12-09 13:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modifiled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `date_created`, `modifiled_at`) VALUES
(2000009, 3000003, '0000-00-00 00:00:00', NULL),
(2000010, 3000003, '0000-00-00 00:00:00', NULL),
(2000011, 3000026, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cart_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cartdetail`
--

INSERT INTO `cartdetail` (`cart_id`, `inventory_id`, `quantity`) VALUES
(2000009, 6000004, 1),
(2000009, 6000005, 3),
(2000009, 6000011, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(100, 'Tẩy Trang'),
(101, 'Sữa rửa mặt'),
(102, 'Tẩy tế bào chết'),
(103, 'Mặt nạ'),
(104, 'Tonner'),
(105, 'Xịt khoáng'),
(106, 'Serum'),
(107, 'Lotion'),
(108, 'Kem dưỡng'),
(109, 'Kem chống nắng'),
(110, 'Chăm sóc vùng da mắt'),
(111, 'Combo');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `u_image` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `u_image`) VALUES
(1, '\\Images_Web\\Products\\Cocoon\\bí_đao_mask_100ml-removebg-preview.png'),
(2, '\\Images_Web\\Products\\Cocoon\\mặt_nạ_bí_đao_cocoon_50ml-removebg-preview.png'),
(3, '\\Images_Web\\Products\\Cocoon\\Dầu_tẩy_trang_cocoon_hoa_hồng_140ml-removebg-preview.png'),
(2000000, '\\Images_Web\\Products\\Cocoon\\dung_dịch_chấm_mụn_cocoon-removebg-preview.png'),
(2000001, '\\Images_Web\\Products\\Cocoon\\gel_rửa_mặt_cocoon_bí_đao_310ml-removebg-preview.png'),
(2000002, '\\Images_Web\\Products\\Cocoon\\thạch hoa hồng dưỡng ẩm.png'),
(2000003, '\\Images_Web\\Products\\Cocoon\\hoa_hồng_mask_cocoon_100ml-removebg-preview.png'),
(2000004, '\\Images_Web\\Products\\Cocoon\\ntr_cocoon_bí_đao_140ml-removebg-preview.png'),
(2000005, '\\Images_Web\\Products\\Cocoon\\ntr_cocoon_bí_đao_500ml-removebg-preview.png'),
(2000006, '\\Images_Web\\Products\\Cocoon\\bộ_sản_phẩm_bí_đao-removebg-preview.png'),
(2000007, '\\Images_Web\\Products\\La Roche Possay\\srm_la_roche_posay__da_dầu-removebg-preview.png'),
(2000008, '\\Images_Web\\Products\\Manyo\\cleansing_soda_foam-removebg-preview.png'),
(2000009, '\\Images_Web\\Products\\Manyo\\pure_deep_cleansing_foam-removebg-preview.png'),
(2000010, '\\Images_Web\\Products\\Klairs\\nước_hoa_hồng_không_mùi_klairs-removebg-preview.png'),
(2000011, '\\Images_Web\\Products\\Klairs\\Nước_Hoa_Hồng_Klairs_Dành_Cho_Da_Nhạy_Cảm_180ml-removebg-preview.png'),
(2000012, '\\Images_Web\\Products\\Klairs\\tinh-chat-duong-da-klairs-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `variant` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` double NOT NULL,
  `price` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `variant`, `product_id`, `quantity`, `price`, `date_created`, `date_updated`, `image_id`) VALUES
(6000000, '100ml', 1000000, 500, 295000, '2022-11-06 22:15:18', '2022-12-07 15:12:41', 1),
(6000001, '30ml', 1000000, 497, 115000, '2022-11-06 22:18:15', '2022-12-20 23:16:46', 2),
(6000002, '140ml', 1000003, 500, 180000, '2022-11-06 22:20:56', '2022-12-07 15:17:57', 3),
(6000003, '5ml', 1000004, 500, 125000, '2022-11-06 22:21:57', '2022-12-07 15:18:04', 2000000),
(6000004, '310ml', 1000005, 500, 295000, '2022-11-06 22:22:45', '2022-12-07 15:40:40', 2000001),
(6000005, '100ml', 1000007, 500, 300000, '2022-11-06 22:26:30', '2022-12-18 18:33:57', 2000002),
(6000006, '100ml', 1000008, 500, 325000, '2022-11-06 22:27:40', '2022-12-18 18:30:06', 2000003),
(6000007, '140ml', 1000009, 500, 125000, '2022-11-06 22:28:21', '2022-12-20 09:24:12', 2000004),
(6000008, '500ml', 1000009, 500, 275000, '2022-11-06 22:28:53', '2022-12-18 18:34:55', 2000005),
(6000009, 'bộ', 1000002, 500, 584000, '2022-11-06 22:30:06', '2022-12-07 18:46:17', 2000006),
(6000010, '400ml', 1000011, 500, 420000, '2022-12-07 18:54:27', '2022-12-20 09:24:12', 2000007),
(6000011, '150ml', 1000012, 500, 350000, '2022-12-09 12:57:46', '2022-12-18 18:35:08', 2000008),
(6000012, '100ml', 1000013, 500, 278000, '2022-12-09 12:59:50', '2022-12-18 18:35:08', 2000009),
(6000013, '200ml', 1000013, 500, 337000, '2022-12-09 12:59:50', '2022-12-18 18:35:08', 2000009),
(6000014, '180ml', 1000014, 498, 259000, '2022-12-09 13:14:25', '2022-12-20 23:16:46', 2000010),
(6000015, '180ml', 1000015, 500, 259000, '2022-12-09 13:14:25', '2022-12-18 18:35:08', 2000011),
(6000016, '20ml', 1000016, 500, 390000, '2022-12-09 13:14:25', '2022-12-18 18:36:51', 2000012);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `total`, `paid`, `status`, `created_at`, `id_voucher`) VALUES
(5000005, 3000003, 'Nguyễn Tô Đức Tài', NULL, '583/B, ấp Tân An, Xã Tân Huề, Huyện Thanh Bình, Tỉnh Đồng Tháp', '0352330676', '2935000', 0, NULL, '2022-12-05 17:55:10', NULL),
(5000016, 3000003, 'Tô', NULL, '583/B, ấp Tân An, Xã Thượng Nông, Huyện Na Hang, Tỉnh Tuyên Quang', '0352330676', '690400', 0, NULL, '2022-12-20 23:16:46', 60003);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `inventory_id`, `quantity`, `total`) VALUES
(5000005, 6000000, 3, NULL),
(5000005, 6000001, 5, NULL),
(5000005, 6000004, 5, NULL),
(5000016, 6000001, 3, NULL),
(5000016, 6000014, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modifiled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `brand_id`, `category_id`, `status`, `delete_flag`) VALUES
(1000000, 'Mặt nạ bí đao', 'test', 5000, 103, 1, 0),
(1000002, 'Combo làm sạch và chăm sóc da dầu mụn Cocoon', 'test', 5000, 111, 1, 0),
(1000003, 'Dầu tẩy trang hoa hồng', 'test', 5000, 100, 1, 0),
(1000004, 'Dung dịch chấm mụn bí đao', 'test', 5000, 106, 1, 0),
(1000005, 'Gel bí đao rửa mặt', 'test', 5000, 103, 1, 0),
(1000007, 'Thạch hoa hồng dưỡng ẩm Cocoon', 'test', 5000, 103, 1, 0),
(1000008, 'Mặt nạ hoa hồng', 'test', 5000, 103, 1, 0),
(1000009, 'Nước tẩy trang bí đao', 'test', 5000, 100, 1, 0),
(1000011, 'Gel Rửa Mặt La Roche-Posay Dành Cho Da Dầu, Nhạy Cảm', NULL, 5001, 101, 1, 0),
(1000012, 'Sữa rửa mặt tạo bọt Manyo Pore Cleansing Soda Foam', NULL, 5002, 101, 1, 0),
(1000013, 'Manyo Pure & Deep Cleansing Foam\n', NULL, 5002, 101, 1, 0),
(1000014, 'Nước Hoa Hồng Klairs Không Mùi Cho Da Nhạy Cảm', NULL, 5003, 104, 1, 0),
(1000015, 'Nước Hoa Hồng Klairs Dành Cho Da Nhạy Cảm Supple Preparation Facial Toner', NULL, 5003, 104, 1, 0),
(1000016, 'Tinh chất dưỡng da Klairs Midnight BLue Youth Activating Drop', NULL, 5003, 106, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(10, 'admin'),
(11, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gender` bit(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phoneNumber` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiled_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `code` mediumint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `gender`, `email`, `phoneNumber`, `image_id`, `username`, `password`, `role_id`, `created_at`, `modifiled_at`, `code`) VALUES
(3000000, 'Nguyễn Minh Hiếu', b'1', 'hieunguyen31122001@gmail.com', '0328357464', NULL, 'admin', '123456', 10, '2022-11-06 00:00:00', '2022-12-02 17:11:52', NULL),
(3000001, 'Nguyễn An Tín', b'1', 'mytran86@yahoo.com', '0902041237', NULL, 'tinna', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000002, 'Trần Thị Bích', b'0', 'lian27111985@yahoo.com', '0902047524', NULL, 'bichtt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000003, 'Đặng Hoàng Yến', b'0', 'thanhan36@yahoo.com', '0902052681', NULL, 'yendh', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000004, 'Đào Đức Duy', b'1', 'anbody2006@yahoo.com', '0902154845', NULL, 'duydd', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000005, 'Bùi Thị Cẩm Vân', b'0', 'anhparkland@yahoo.com', '0902301050', NULL, 'vanbtc', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000006, 'Quách Thanh Liêm', b'1', 'hoaxuyenchi1802@yahoo.com', '0902351038', NULL, 'liemqt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000007, 'Nguyễn Thị Minh Trang', b'0', 'honganh20002@yahoo.com', '0902367442', NULL, 'trangntm', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000008, 'Nguyễn Hữu Thoại', b'1', 'nguyenbichbich@gmail.com', '0902412347', NULL, 'thoainh', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000009, 'Bùi Thị Lợi', b'0', 'ephamba@gmail.com', '0902446778', NULL, 'loibt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000017, 'Lê Thị Hồng', b'1', 'admin@hethongquanly.org', '0328351324', NULL, 'honglethi', '123456', 11, '2022-11-07 01:31:47', '2022-12-02 17:11:01', NULL),
(3000019, 'Trần Thành Thành', b'1', 'adc897@outlook.com', '0987824173', NULL, 'thanhtt', '123456', 11, '2022-11-07 01:41:44', '2022-12-02 17:11:06', NULL),
(3000020, 'Đào Vinh Hoa', b'1', 'hiavn23@gmail.com', '0327289018', NULL, 'hoadv', '123456', 11, '2022-11-07 01:43:21', '2022-12-02 17:11:10', NULL),
(3000021, 'Hoài Chinh Lê', b'1', 'hiavn24@gmail.com', '0328357897', NULL, 'lehoaiching', '123456', 11, '2022-11-07 01:45:15', '2022-12-02 17:11:52', NULL),
(3000022, 'Nguyễn Ngọc Hiền', b'1', 'Hiennguyen23@gmail.com', '0987265478', NULL, 'hienngngoc', '123456', 11, '2022-11-07 09:49:50', '2022-12-02 17:11:52', NULL),
(3000023, 'Lý Thị Diễm Quyên', b'1', 'hiavn278@gmail.com', '0987654723', NULL, 'quyendiemthi', '123456', 11, '2022-11-07 10:28:49', '2022-12-02 17:11:52', NULL),
(3000024, 'Nguyễn Mạnh Huy', b'1', 'sdha834@gmail.com', '0328928765', NULL, 'Huynmanh', '123456', 11, '2022-11-07 10:44:13', '2022-12-02 17:11:52', NULL),
(3000025, 'Trương Quốc Hùng', b'1', 'hungtrq348@gmail.com', '0938467624', NULL, 'hungtrq123', '123456', 11, '2022-11-12 17:28:57', '2022-12-02 17:11:52', NULL),
(3000026, 'Tô Đức Tài', b'1', 'nguyentoductai@gmail.com', '0352330678', NULL, 'ductai09', 'luckydepchO147', 11, '2022-12-23 00:13:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `code` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `discount_percentage` decimal(10,0) NOT NULL,
  `discount_price` decimal(10,0) NOT NULL,
  `exp` datetime NOT NULL,
  `min_bill` decimal(10,0) NOT NULL,
  `remain` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `code`, `discount_percentage`, `discount_price`, `exp`, `min_bill`, `remain`, `image_id`) VALUES
(60003, 'TWAN20', '20', '0', '2023-01-01 20:31:44', '1', 10, NULL),
(60004, 'TWAN30', '0', '30000', '2023-01-01 20:31:44', '250000', 10, NULL),
(60005, 'TWAN60', '0', '60000', '2023-01-01 20:33:17', '500000', 10, NULL),
(60006, 'TWAN120', '0', '120000', '2023-01-01 20:33:17', '1000000', 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_address_user` (`user_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Brand_Image` (`image_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cart_User` (`user_id`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cart_id`,`inventory_id`),
  ADD KEY `FK_CartDetail_Inventory` (`inventory_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Feedback_User` (`user_id`),
  ADD KEY `FK_Feedback_Product` (`product_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Inventory_Product` (`product_id`),
  ADD KEY `FK_Inventory_Image` (`image_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Order_User` (`user_id`),
  ADD KEY `Fk_Order_Voucher` (`id_voucher`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`inventory_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Post_Image` (`image_id`),
  ADD KEY `FK_Post_User` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Product_Brand` (`brand_id`),
  ADD KEY `FK_Product_Category` (`category_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `description` (`description`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Fk_User_Image` (`image_id`),
  ADD KEY `FK_User_Role` (`role_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Voucher_Image` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9000011;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000012;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000000;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000013;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000017;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000017;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11000;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000017;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000027;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_address_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `Fk_Brand_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `FK_CartDetail_Cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CartDetail_Inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_Feedback_Product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_Feedback_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_Inventory_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `Fk_Inventory_Product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_Order_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Order_Voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Post_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_Post_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Product_Brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_Role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `Fk_User_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `FK_Voucher_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
