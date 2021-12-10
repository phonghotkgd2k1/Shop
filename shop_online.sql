-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 05:34 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_online`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `add_cart`
--

CREATE TABLE `add_cart` (
  `id_add-cart` int(11) NOT NULL,
  `product_add` int(11) DEFAULT NULL,
  `color_add` int(11) DEFAULT NULL,
  `gb_add` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_product` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT 0,
  `images` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `role`, `username`, `password`, `name`, `address`, `sex`, `images`, `email`, `phone`) VALUES
(6, '2021-09-11 16:24:43', 0, '2021-10-21 14:44:22', 0, 0, 1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', 'superadmin', 'Không rõ', 0, 'account3.gif', 'superadmin@gmail.com', '0857577732'),
(7, '2021-09-13 22:00:14', 0, '2021-10-21 14:44:27', 0, 0, 0, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin1', 'Hà Nam', 0, 'account4.gif', 'admin@gamil.com', '0987654321'),
(8, '2021-09-14 21:43:25', 0, '2021-10-21 14:44:32', 0, 0, 0, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'admin2', 'Hà Nam', 0, 'account5.gif', 'admin2@gmail.com', '0987865357'),
(9, '2021-09-14 21:50:51', 0, '2021-10-21 14:44:37', 0, 0, 0, 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 'admin3', 'Hà Nam', 0, 'account6.gif', 'admin3@gmail.com', '0972621231'),
(10, '2021-09-14 21:52:08', 0, '2021-10-21 14:44:42', 0, 0, 0, 'admin4', 'e10adc3949ba59abbe56e057f20f883e', 'admin4', 'HÀ Nam', 0, 'account7.gif', 'admin4@gmail.com', '098765678'),
(11, '2021-09-14 21:52:42', 0, '2021-10-21 14:44:46', 0, 0, 0, 'admin5', 'e10adc3949ba59abbe56e057f20f883e', 'admin5', 'Hà Nam', 0, 'account9.gif', 'admin5@gmail.com', '098767891');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `bill_status` tinyint(4) DEFAULT 0,
  `id_customer_info` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `id_payment` int(11) DEFAULT NULL,
  `total_price` decimal(15,2) DEFAULT 0.00,
  `id_product` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `bill_status`, `id_customer_info`, `order_date`, `expected_delivery_date`, `id_payment`, `total_price`, `id_product`, `id_admin`) VALUES
(1, '2021-08-29 16:13:23', 0, '2021-09-28 15:20:19', 0, 0, 0, NULL, '2021-08-01', '2021-08-05', NULL, '20000000.00', NULL, 6),
(70, '2021-09-02 15:12:29', 0, '2021-10-02 14:30:12', 0, 0, 0, 1001, '2021-09-03', '2021-09-21', 111, '96000000.00', NULL, 7),
(71, '2021-09-13 22:12:57', 0, '2021-09-28 15:20:25', 0, 0, 0, NULL, '2021-09-09', '2021-09-15', NULL, '200000000.00', NULL, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id_bill` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id_brand`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `name`, `description`) VALUES
(1, '2021-03-04 13:48:53', 0, '2021-09-06 08:25:18', 0, 0, 'Váy cưới Vera Wang', 'Đẹp'),
(2, '2021-03-04 13:48:53', 0, '2021-09-06 08:25:24', 0, 0, 'Váy cưới Oscar De La Renta\n', 'Đẹp'),
(3, '2021-03-04 13:48:53', 0, '2021-09-06 08:25:31', 0, 0, 'Váy cưới Marchesa', 'Đẹp'),
(9, '2021-03-04 13:48:53', 0, '2021-09-06 08:22:00', 0, 0, 'Váy cưới Amsale', ''),
(11, '2021-08-29 23:30:06', 0, '2021-09-06 08:25:41', 0, 0, 'Váy cưới Carolina Herrera', 'Đẹp'),
(12, '2021-08-31 00:40:13', 0, '2021-09-06 08:26:03', 0, 0, 'Váy cưới Monique Lhuillier', 'Đẹp'),
(13, '2021-08-31 23:38:46', 0, '2021-09-06 08:26:14', 0, 0, 'Vest Venesto', 'Quý ông'),
(16, '2021-09-03 05:18:08', 0, '2021-09-06 08:26:20', 0, 0, 'Vest Adam Store', 'Quý ông'),
(18, '2021-09-03 16:42:07', 0, '2021-12-03 23:04:01', 0, 0, 'Vest Remmy', 'Quý ông'),
(19, '2021-09-03 16:42:45', 0, '2021-12-03 23:03:59', 0, 0, 'Vest CAVINO', 'Quý ông'),
(20, '2021-09-03 16:45:11', 0, '2021-09-06 08:26:53', 0, 0, 'Trang sức PNJ', 'Đẹp, lấp lánh'),
(22, '2021-09-03 16:47:56', 0, '2021-12-03 23:03:57', 0, 0, 'Trang sức DOJI', 'Đẹp, lấp lánh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_customer`
--

CREATE TABLE `cart_customer` (
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `id_customer_info` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `isprocessed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `isactive` tinyint(4) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `isactive`, `name`) VALUES
(1, 0, 'Green'),
(2, 0, 'Red'),
(3, 0, 'Violet'),
(4, 0, 'Gold'),
(5, 0, 'Black'),
(6, 0, 'White');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_info`
--

CREATE TABLE `customer_info` (
  `id_customer_info` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `username` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UNIQUE',
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(4) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_void_limit` int(11) DEFAULT NULL,
  `bill_void` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `customer_info`
--

INSERT INTO `customer_info` (`id_customer_info`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `username`, `password`, `name`, `sex`, `email`, `phone`, `address`, `bill_void_limit`, `bill_void`) VALUES
(1001, '2021-08-29 18:14:26', 0, '2021-09-21 15:01:22', 0, 0, 'linhnguyen', 'e10adc3949ba59abbe56e057f20f883e', 'LinhNguyen', 2, 'linhnguyen2021@gmail.com', '0388888888', '69/96/38-Nguyễn Thị Định-Trung Hòa- Cầu Giấy- Hà Nội', 99999999, 0),
(1002, '2021-09-01 23:29:50', 0, '2021-09-08 15:27:14', 0, 0, 'phong', '123456', 'phong', 1, 'phong@gmail.com', '0857577732', '95 Lê Thanh Nghị', NULL, 0),
(1005, '2021-09-15 17:54:32', 0, '2021-09-15 22:00:23', 0, 0, 'PhongHong', '123456', 'phonghong', 1, 'phonghotk11c@gmail.com', '0987654567', 'HN', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `tilte` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `send_date` date NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `is_reply` tinyint(4) NOT NULL,
  `id_customer_info` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_feedback_root` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gb`
--

CREATE TABLE `gb` (
  `id_gb` int(11) NOT NULL,
  `isactive` tinyint(4) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gb`
--

INSERT INTO `gb` (`id_gb`, `isactive`, `name`) VALUES
(2, NULL, 'Váy cưới'),
(3, NULL, 'Vest nam'),
(4, NULL, 'Trang sức'),
(104, NULL, 'Hoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hot_product`
--

CREATE TABLE `hot_product` (
  `id_hot_product` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `id_product` int(11) DEFAULT NULL,
  `id_brand` int(11) NOT NULL,
  `is_advertise` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `hot_product`
--

INSERT INTO `hot_product` (`id_hot_product`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `id_product`, `id_brand`, `is_advertise`) VALUES
(7, '2021-08-16 12:12:35', 0, '2021-08-16 12:12:35', 0, 0, 93, 0, 0),
(8, '2021-08-16 12:12:40', 0, '2021-08-16 12:12:40', 0, 0, 22, 0, 0),
(9, '2021-08-16 12:23:19', 0, '2021-08-16 12:23:19', 0, 0, 11, 0, 0),
(13, '2021-08-16 13:50:06', 0, '2021-08-16 13:50:06', 0, 0, 94, 0, 0),
(14, '2021-08-16 13:52:12', 0, '2021-08-16 13:52:12', 0, 0, 100, 0, 0),
(15, '2021-08-16 13:52:59', 0, '2021-08-16 13:52:59', 0, 0, 96, 0, 0),
(16, '2021-08-16 13:53:23', 0, '2021-08-16 13:53:23', 0, 0, 95, 0, 0),
(25, '2021-08-16 13:54:06', 0, '2021-08-16 13:54:06', 0, 0, 2, 0, 0),
(26, '2021-08-16 13:56:22', 0, '2021-08-16 13:56:22', 0, 0, 1, 0, 0),
(30, '2021-09-04 14:52:58', 0, '2021-09-04 14:52:58', 0, 0, 111, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id_images` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khonhap`
--

CREATE TABLE `khonhap` (
  `ma_khonhap` int(11) NOT NULL,
  `namekho` varchar(100) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_gb` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_product_stock` int(11) DEFAULT NULL,
  `date_nhap` date DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoxuat`
--

CREATE TABLE `khoxuat` (
  `id` int(11) NOT NULL,
  `name_khoxuat` varchar(50) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_product_stock` int(11) DEFAULT NULL,
  `id_bill` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `date_xuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoxuat`
--

INSERT INTO `khoxuat` (`id`, `name_khoxuat`, `id_product`, `id_admin`, `id_product_stock`, `id_bill`, `quantity`, `created_at`, `updated_at`, `date_xuat`) VALUES
(5, 'Asia', 48, 6, NULL, NULL, 5, NULL, NULL, '2021-11-04 17:00:00'),
(6, 'Asia', 26, 6, NULL, NULL, 4, NULL, NULL, '2021-11-04 17:00:00'),
(7, 'Asia', 48, 6, NULL, NULL, 10, NULL, NULL, '2021-11-04 17:00:00'),
(8, 'Phong', 48, 6, NULL, NULL, 15, NULL, NULL, '2021-11-05 17:00:00'),
(9, 'Phong', 48, 6, NULL, NULL, 15, NULL, NULL, '2021-11-05 17:00:00'),
(10, 'đầu bùi', 93, 6, 45, NULL, 40, '2021-11-05 17:46:23', '2021-11-05 17:46:23', '2021-09-14 16:47:34'),
(11, 'Phong', 47, 6, NULL, NULL, 45, NULL, NULL, '2021-01-31 17:00:00'),
(12, 'Phong', 26, 6, NULL, NULL, 10, NULL, NULL, '2021-01-02 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_news_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_type`
--

CREATE TABLE `news_type` (
  `id_news_type` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) DEFAULT 0,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id_payment`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isactive`, `name`, `description`) VALUES
(111, '2021-09-02 15:12:20', 0, '2021-09-02 15:12:20', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `date_nhap` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `discount` double DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_gb` int(11) DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `buy_quantity` int(11) DEFAULT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `is_accessory` tinyint(1) DEFAULT 0,
  `id_bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_admin`, `date_nhap`, `created_at`, `created_by`, `updated_at`, `updated_by`, `name`, `images`, `discount`, `price`, `id_brand`, `id_gb`, `content`, `description`, `quantity`, `buy_quantity`, `isactive`, `is_accessory`, `id_bill`) VALUES
(1, 8, '2021-11-21', '2021-08-16 02:44:01', 0, '2021-11-30 00:18:30', 0, 'Váy cưới Vera Wang 1', 'Verang-1.jpg', 30, '10000000.00', 1, NULL, 'Váy cưới màu trắng làm lễ trễ vai tùng kim sa nổi', 'Váy cưới màu trắng làm lễ trễ vai tùng kim sa nổi\n', 50, 0, 0, 0, NULL),
(2, 7, '2021-11-21', '2021-08-16 02:51:20', 0, '2021-11-30 00:18:35', 0, 'Váy cưới Vera Wang 2', 'Verang-2.jpg', 10, '14500000.00', 1, NULL, 'Váy cưới màu trắng làm lễ thắt nơ ngực tùng kim tuyến', 'Váy cưới màu trắng làm lễ thắt nơ ngực tùng kim tuyến', 5, 0, 0, 0, NULL),
(3, 9, '2021-11-21', '2021-08-16 02:52:37', 0, '2021-11-30 00:18:38', 0, 'Váy cưới Vera Wang 3', 'Verang-3.jpg', 10, '13000000.00', 1, NULL, NULL, NULL, 5, 0, 0, 0, NULL),
(4, 10, '2021-09-15', '2021-08-16 02:54:42', 0, '2021-11-29 18:28:22', 0, 'Váy cưới Oscar De La Renta 1\n', 'Oscar-1.jpg', 10, '10000000.00', 2, NULL, NULL, NULL, 5, 0, 0, 0, NULL),
(5, NULL, '2021-09-09', '2021-08-16 02:57:38', 0, '2021-11-29 18:28:27', 0, 'Váy cưới Oscar De La Renta 2\n', 'Oscar-2.jpg', 1, '12000000.00', 2, NULL, NULL, NULL, 5, 0, 0, 0, NULL),
(6, NULL, '2021-09-04', '2021-08-16 02:59:04', 0, '2021-11-30 00:20:19', 0, 'Váy cưới Oscar De La Renta 3\n', 'Oscar-3.jpg', 10, '14500000.00', 2, NULL, NULL, NULL, 100, 0, 0, 0, NULL),
(10, NULL, '2021-04-20', '2021-08-16 03:07:07', 0, '2021-11-30 00:20:22', 0, 'Váy cưới Marchesa 1', 'Marchesa-1.jpg', 0, '8000000.00', 3, NULL, NULL, NULL, 59, 0, 0, 0, NULL),
(11, NULL, '2021-01-19', '2021-08-16 03:07:50', 0, '2021-11-30 00:20:26', 0, 'Váy cưới Marchesa 2', 'Marchesa-2.jpg', 0, '7800000.00', 3, NULL, NULL, NULL, 60, 0, 0, 0, NULL),
(12, NULL, '2021-10-18', '2021-08-16 03:08:36', 0, '2021-11-30 00:20:29', 0, 'Váy cưới Marchesa 3', 'Marchesa-3.jpg', 30, '9000000.00', 3, NULL, NULL, NULL, 50, 0, 0, 0, NULL),
(13, NULL, '2021-10-18', '2021-08-16 03:09:33', 0, '2021-11-30 00:20:33', 0, 'Váy cưới Amsale 1', 'Amsale-1.jpg', 10, '9000000.00', 9, NULL, NULL, NULL, 75, 0, 0, 0, NULL),
(20, NULL, '2021-10-18', '2021-08-16 03:13:29', 0, '2021-11-30 00:20:38', 0, 'Váy cưới Amsale 2', 'Amsale-2.jpg', 5, '9200000.00', 9, NULL, NULL, NULL, 55, 0, 0, 0, NULL),
(21, NULL, '2021-06-18', '2021-08-16 03:15:16', 0, '2021-11-30 00:20:41', 0, 'Váy cưới Amsale 3', 'Amsale-3.jpg', 5, '8800000.00', 9, NULL, NULL, NULL, 58, 0, 0, 0, NULL),
(22, NULL, '2021-05-18', '2021-08-16 03:15:58', 0, '2021-11-30 00:20:45', 0, 'Váy cưới Carolina Herrera 1', 'Carolina-1.jpg', 5, '7900000.00', 11, NULL, NULL, NULL, 59, 0, 0, 0, NULL),
(23, NULL, '2021-04-18', '2021-08-16 03:16:48', 0, '2021-11-30 00:19:52', 0, 'Váy cưới Carolina Herrera 2', 'Carolina-2.jpg', 10, '6000000.00', 11, NULL, NULL, NULL, 50, 0, 0, 0, NULL),
(26, NULL, '2021-04-18', '2021-08-16 18:12:59', 0, '2021-11-30 00:19:11', 0, 'Váy cưới Carolina Herrera 3', 'Carolina-3.jpg', 10, '1090000.00', 11, NULL, NULL, NULL, 86, 0, 0, 1, NULL),
(40, NULL, '2021-01-18', '2021-08-16 17:21:15', 0, '2021-11-30 00:21:35', 0, 'Váy cưới Monique Lhuillier 1', 'Monique-1.jpg', 10, '350000.00', 12, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(41, NULL, '2021-02-18', '2021-08-16 17:43:53', 0, '2021-11-30 00:21:42', 0, 'Váy cưới Monique Lhuillier 2', 'Monique-2.jpg', 10, '500000.00', 12, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(42, NULL, '2021-05-18', '2021-08-16 17:49:34', 0, '2021-11-30 00:19:28', 0, 'Váy cưới Monique Lhuillier 3', 'Monique-3.jpg', 10, '900000.00', 12, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(44, NULL, '2021-03-20', '2021-08-16 17:50:48', 0, '2021-11-30 00:05:14', 0, 'Vest Venesto 1', 'venesto-1.jpg', 10, '800000.00', 13, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(45, NULL, '2021-01-18', '2021-08-17 00:03:51', 0, '2021-11-30 00:05:09', 0, 'Vest Venesto 2', 'venesto-2.jpg', 10, '320000.00', 13, NULL, NULL, NULL, 89, 0, 0, 1, NULL),
(46, NULL, '2021-02-18', '2021-08-16 17:59:55', 0, '2021-11-30 00:05:04', 0, 'Vest Venesto 3', 'venesto-3.jpg', 10, '360000.00', 13, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(47, NULL, '2021-08-10', '2021-08-16 18:01:23', 0, '2021-11-30 00:04:59', 0, 'Vest Adam Store 1', 'Adam-1.jpg', 10, '580000.00', 16, NULL, NULL, NULL, 55, 0, 0, 1, NULL),
(48, NULL, '2021-08-18', '2021-08-16 18:04:29', 0, '2021-11-30 00:04:55', 0, 'Trang sức PNJ 1', 'pnj-1.png', 10, '800000.00', 20, NULL, NULL, NULL, 55, 0, 0, 1, NULL),
(52, NULL, '2021-08-18', '2021-08-17 00:06:26', 0, '2021-11-29 18:29:52', 0, 'Vest Remmy 1', 'remmy-1.jpg', 10, '320000.00', 18, NULL, NULL, NULL, 100, 0, 0, 1, NULL),
(92, NULL, '2021-10-21', '2021-08-15 17:22:28', 0, '2021-11-30 00:04:47', 0, 'Trang sức DOJi 1', 'doji-1.jpg', 10, '19000000.00', 22, NULL, NULL, NULL, 30, 10, 0, 0, NULL),
(93, NULL, '2021-10-22', '2021-08-15 20:54:27', 0, '2021-11-30 00:21:08', 0, 'Trang sức DOJi 2', 'doji-2.jpg', 10, '22000000.00', 22, NULL, NULL, NULL, 20, 0, 0, 0, NULL),
(94, NULL, '2021-08-22', '2021-08-16 01:23:36', 0, '2021-11-30 00:21:00', 0, 'Trang sức PNJ 2', 'pnj-1.png', 10, '18900000.00', 20, NULL, NULL, NULL, 32, 0, 0, 0, NULL),
(95, NULL, '2021-07-22', '2021-08-16 02:30:06', 0, '2021-11-30 00:20:55', 0, 'Trang sức PNJ 3', 'pnj-3.png', 10, '16000000.00', 20, NULL, NULL, NULL, 102, 0, 0, 0, NULL),
(96, NULL, '2021-05-18', '2021-08-16 02:33:15', 0, '2021-11-30 00:20:52', 0, 'Trang sức PNJ 4', 'pnj-4.png', 10, '12000000.00', 20, NULL, NULL, NULL, 66, 0, 0, 0, NULL),
(100, NULL, '2021-05-22', '2021-08-16 03:01:51', 0, '2021-11-30 00:04:14', 0, 'Trang sức PNJ 4', 'pnj-5.png', 10, '13000000.00', 20, NULL, NULL, NULL, 5, 0, 0, 0, NULL),
(111, NULL, '2021-03-22', '2021-08-19 06:36:53', 0, '2021-11-30 00:04:08', 0, 'Vest Remmy 2', 'remmy-3.jpg', 10, '700000.00', 18, NULL, NULL, NULL, 26, 0, 0, 1, NULL),
(1005, NULL, '2021-03-22', '2021-09-21 16:27:08', 0, '2021-11-30 00:04:00', 0, 'Váy cưới 1', '1632216428866cavino-2.jpg', 0, '100000000.00', 18, NULL, NULL, NULL, 10, NULL, 0, 0, NULL),
(1006, NULL, '2021-09-12', '2021-09-28 15:14:15', 0, '2021-11-29 18:30:51', 0, 'Vest Cưới 1', '1632816854979venesto-3.jpg', 0, '100000000.00', 13, NULL, 'a', 'a', 100, NULL, 0, 0, NULL),
(1007, NULL, '2021-09-19', '2021-09-28 16:57:25', 0, '2021-12-03 23:02:26', 0, ' Vest 1', '1632823045556venesto-3.jpg', 0, '30000000.00', 13, NULL, 'a', 'a', 50, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comment`
--

CREATE TABLE `product_comment` (
  `id_product_comment` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `isactive` tinyint(4) NOT NULL DEFAULT 0,
  `id_product` int(11) NOT NULL,
  `id_customer_info` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_stock`
--

CREATE TABLE `product_stock` (
  `id_product_stock` int(11) NOT NULL,
  `name_product_stock` varchar(100) NOT NULL,
  `isactive` tinyint(4) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `id_gb` int(11) DEFAULT NULL,
  `id_color` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_stock`
--

INSERT INTO `product_stock` (`id_product_stock`, `name_product_stock`, `isactive`, `id_product`, `id_gb`, `id_color`, `quantity`, `id_admin`, `id_brand`) VALUES
(1, 'ala', NULL, 93, 3, 1, 15, NULL, NULL),
(2, '', NULL, 93, 3, 4, 15, NULL, NULL),
(3, '', NULL, 93, 104, 4, 29, NULL, NULL),
(4, '', NULL, 93, 4, 3, 0, NULL, NULL),
(30, '', 0, 95, 2, 3, 15, NULL, NULL),
(31, '', 0, 95, 3, 1, 10, NULL, NULL),
(32, '', 0, 95, 4, 6, 10, NULL, NULL),
(33, '', 0, 95, 2, 2, 20, NULL, NULL),
(34, '', 0, 95, 104, 1, 15, NULL, NULL),
(36, '', NULL, 95, 104, 2, 10, NULL, NULL),
(37, '', 0, 95, 2, 6, 10, NULL, NULL),
(40, '', 0, 92, 104, 4, 10, NULL, NULL),
(41, '', NULL, 92, 2, 4, 10, NULL, NULL),
(42, '', 0, 92, 4, 4, 10, NULL, NULL),
(43, '', NULL, 92, 104, 6, 20, NULL, NULL),
(44, '', 0, 92, 3, 6, 15, NULL, NULL),
(45, '', 0, 92, 4, 6, 10, NULL, NULL),
(111, '', NULL, 92, 4, 4, 100, 9, 22);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE,
  ADD UNIQUE KEY `username_2` (`username`);
ALTER TABLE `admin` ADD FULLTEXT KEY `username` (`email`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`) USING BTREE,
  ADD KEY `id_customer_info` (`id_customer_info`) USING BTREE,
  ADD KEY `id_payment` (`id_payment`) USING BTREE,
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id_bill`,`id_product`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE,
  ADD KEY `id_bill` (`id_bill`) USING BTREE;

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`) USING BTREE;

--
-- Chỉ mục cho bảng `cart_customer`
--
ALTER TABLE `cart_customer`
  ADD PRIMARY KEY (`id_customer_info`,`id_product`) USING BTREE,
  ADD KEY `id_customer_info` (`id_customer_info`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id_customer_info`) USING BTREE;

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`) USING BTREE,
  ADD KEY `id_customer_info` (`id_customer_info`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`) USING BTREE,
  ADD KEY `id_feedback_root` (`id_feedback_root`) USING BTREE;

--
-- Chỉ mục cho bảng `gb`
--
ALTER TABLE `gb`
  ADD PRIMARY KEY (`id_gb`);

--
-- Chỉ mục cho bảng `hot_product`
--
ALTER TABLE `hot_product`
  ADD PRIMARY KEY (`id_hot_product`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE;

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `khonhap`
--
ALTER TABLE `khonhap`
  ADD PRIMARY KEY (`ma_khonhap`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_gb` (`id_gb`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_product_stock` (`id_product_stock`);

--
-- Chỉ mục cho bảng `khoxuat`
--
ALTER TABLE `khoxuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_product_stock` (`id_product_stock`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`) USING BTREE,
  ADD KEY `id_news_type` (`id_news_type`) USING BTREE;

--
-- Chỉ mục cho bảng `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`id_news_type`) USING BTREE;

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`) USING BTREE;

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`) USING BTREE,
  ADD KEY `product_ibfk_2` (`id_brand`),
  ADD KEY `id_gb` (`id_gb`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Chỉ mục cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id_product_comment`) USING BTREE,
  ADD KEY `id_product` (`id_product`) USING BTREE,
  ADD KEY `id_customer_info` (`id_customer_info`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

--
-- Chỉ mục cho bảng `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`id_product_stock`),
  ADD KEY `product_stock_fk1` (`id_color`),
  ADD KEY `product_stock_fk2` (`id_gb`),
  ADD KEY `product_stock_fk3` (`id_product`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_brand` (`id_brand`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id_customer_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hot_product`
--
ALTER TABLE `hot_product`
  MODIFY `id_hot_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khonhap`
--
ALTER TABLE `khonhap`
  MODIFY `ma_khonhap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khoxuat`
--
ALTER TABLE `khoxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `news_type`
--
ALTER TABLE `news_type`
  MODIFY `id_news_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id_product_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `id_product_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`id_customer_info`) REFERENCES `customer_info` (`id_customer_info`),
  ADD CONSTRAINT `bill_ibfk_4` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`),
  ADD CONSTRAINT `bill_ibfk_5` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `bill_ibfk_6` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `cart_customer`
--
ALTER TABLE `cart_customer`
  ADD CONSTRAINT `cart_customer_ibfk_1` FOREIGN KEY (`id_customer_info`) REFERENCES `customer_info` (`id_customer_info`),
  ADD CONSTRAINT `cart_customer_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_customer_info`) REFERENCES `customer_info` (`id_customer_info`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Các ràng buộc cho bảng `hot_product`
--
ALTER TABLE `hot_product`
  ADD CONSTRAINT `hot_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `khonhap`
--
ALTER TABLE `khonhap`
  ADD CONSTRAINT `khonhap_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `khonhap_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `khonhap_ibfk_3` FOREIGN KEY (`id_gb`) REFERENCES `gb` (`id_gb`),
  ADD CONSTRAINT `khonhap_ibfk_4` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `khonhap_ibfk_5` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `khonhap_ibfk_6` FOREIGN KEY (`id_product_stock`) REFERENCES `product_stock` (`id_product_stock`);

--
-- Các ràng buộc cho bảng `khoxuat`
--
ALTER TABLE `khoxuat`
  ADD CONSTRAINT `khoxuat_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `khoxuat_ibfk_2` FOREIGN KEY (`id_product_stock`) REFERENCES `product_stock` (`id_product_stock`),
  ADD CONSTRAINT `khoxuat_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `khoxuat_ibfk_4` FOREIGN KEY (`id_bill`) REFERENCES `bill_detail` (`id_bill`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_news_type`) REFERENCES `news_type` (`id_news_type`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_gb`) REFERENCES `gb` (`id_gb`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Các ràng buộc cho bảng `product_comment`
--
ALTER TABLE `product_comment`
  ADD CONSTRAINT `product_comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `product_comment_ibfk_2` FOREIGN KEY (`id_customer_info`) REFERENCES `customer_info` (`id_customer_info`),
  ADD CONSTRAINT `product_comment_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Các ràng buộc cho bảng `product_stock`
--
ALTER TABLE `product_stock`
  ADD CONSTRAINT `product_stock_fk1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `product_stock_fk2` FOREIGN KEY (`id_gb`) REFERENCES `gb` (`id_gb`),
  ADD CONSTRAINT `product_stock_fk3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `product_stock_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `product_stock_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
