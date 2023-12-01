-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 01, 2023 lúc 07:10 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `training_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'iPhone (Apple)', NULL, NULL),
(2, 'Samsung', NULL, NULL),
(3, 'OPPO', NULL, NULL),
(4, 'Xiaomi', NULL, NULL),
(5, 'Vivo', NULL, NULL),
(6, 'realme', NULL, NULL),
(7, 'Nokia', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartltem`
--

DROP TABLE IF EXISTS `cartltem`;
CREATE TABLE IF NOT EXISTS `cartltem` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-16 18:45:43', '2023-05-16 18:45:43'),
(2, 3, '2023-05-17 01:59:39', '2023-05-17 01:59:39'),
(3, 4, '2023-10-26 23:26:45', '2023-10-26 23:26:45'),
(4, 5, '2023-10-26 23:51:43', '2023-10-26 23:51:43'),
(5, 7, '2023-11-02 01:26:04', '2023-11-02 01:26:04'),
(6, 9, '2023-11-02 01:54:42', '2023-11-02 01:54:42'),
(7, 10, '2023-11-02 10:43:40', '2023-11-02 10:43:40'),
(8, 44, '2023-11-23 09:11:06', '2023-11-23 09:11:06'),
(9, 42, '2023-11-27 23:24:57', '2023-11-27 23:24:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cartitem_cart_id_foreign` (`cart_id`),
  KEY `cartitem_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `quantity`, `cart_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 8, 1, 5, '2023-05-18 20:45:43', '2023-05-18 20:46:06'),
(3, 3, 1, 2, '2023-05-17 00:49:50', '2023-05-18 19:50:58'),
(10, 3, 2, 8, '2023-05-17 02:30:23', '2023-05-17 04:54:34'),
(9, 5, 2, 17, '2023-05-17 02:05:30', '2023-05-17 04:01:41'),
(11, 2, 1, 3, '2023-05-17 22:48:52', '2023-05-18 19:50:23'),
(18, 4, 6, 1, '2023-11-02 01:54:42', '2023-11-02 02:06:47'),
(14, 2, 3, 4, '2023-10-26 23:27:24', '2023-10-27 00:11:23'),
(15, 1, 4, 5, '2023-10-26 23:51:43', '2023-10-26 23:51:43'),
(16, 1, 4, 7, '2023-10-26 23:53:35', '2023-10-26 23:53:35'),
(19, 1, 6, 3, '2023-11-02 01:55:53', '2023-11-02 01:55:53'),
(24, 1, 7, 1, '2023-11-02 10:46:43', '2023-11-02 10:46:43'),
(23, 1, 7, 2, '2023-11-02 10:46:21', '2023-11-03 00:52:45'),
(25, 1, 7, 5, '2023-11-02 10:46:53', '2023-11-02 10:46:53'),
(26, 1, 8, 6, '2023-11-23 09:11:06', '2023-11-23 09:11:06'),
(28, 1, 9, 1, '2023-11-28 20:42:49', '2023-11-28 20:42:49'),
(29, 1, 9, 58, '2023-11-28 22:00:33', '2023-11-28 22:00:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite_items`
--

DROP TABLE IF EXISTS `favourite_items`;
CREATE TABLE IF NOT EXISTS `favourite_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `do_not` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favourite_items_user_id_foreign` (`user_id`),
  KEY `favourite_items_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite_items`
--

INSERT INTO `favourite_items` (`id`, `user_id`, `product_id`, `do_not`, `created_at`, `updated_at`) VALUES
(22, 44, 31, 0, '2023-11-24 00:13:31', '2023-11-24 00:13:31'),
(20, 44, 6, 0, '2023-11-24 00:12:25', '2023-11-24 00:12:25'),
(19, 44, 18, 0, '2023-11-24 00:01:59', '2023-11-24 00:01:59'),
(18, 44, 2, 0, '2023-11-23 23:48:39', '2023-11-23 23:48:39'),
(24, 42, 2, 0, '2023-11-30 07:40:14', '2023-11-30 07:40:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanpham` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `voucher` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `histories`
--

INSERT INTO `histories` (`id`, `diachi`, `sanpham`, `gia`, `sl`, `voucher`, `total`, `created_at`, `updated_at`) VALUES
(1, 'thu duc', 'Điện thoại Samsung Galaxy S21 FE 5G (6GB/128GB)', 9990000, 3, 30, 29970000, '2023-12-01 16:02:42', NULL),
(2, 'quận 9', 'Điện thoại iPhone 14 Pro 128GB', 24990000, 1, 0, 24990000, '2023-12-02 16:16:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_productid_foreign` (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `url`, `productId`, `created_at`, `updated_at`) VALUES
(1, 'https://cdn.tgdd.vn/Products/Images/42/299034/oppo-find-n2-flip-purple-thumb-1-600x600-1-600x600.jpg', 1, NULL, NULL),
(2, 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-den-thumb-600x600.jpg', 2, NULL, NULL),
(3, 'https://cdn.tgdd.vn/Products/Images/42/247508/iphone-14-pro-vang-thumb-600x600.jpg', 3, NULL, NULL),
(4, 'https://cdn.tgdd.vn/Products/Images/42/267211/Samsung-Galaxy-S21-FE-vang-1-2-600x600.jpg', 4, NULL, NULL),
(5, 'https://cdn.tgdd.vn/Products/Images/42/303575/xiaomi-redmi-12c-grey-thumb-600x600.jpg', 5, NULL, NULL),
(6, 'https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-1-600x600.jpg', 6, NULL, NULL),
(7, 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-den-600x600.jpg', 7, NULL, NULL),
(8, 'https://cdn.tgdd.vn/Products/Images/42/286697/vivo-y35-thumb-den-600x600.jpg', 8, NULL, NULL),
(9, 'https://cdn.tgdd.vn/Products/Images/42/301642/oppo-reno8t-vang1-thumb-600x600.jpg', 9, NULL, NULL),
(10, 'https://cdn.tgdd.vn/Products/Images/42/301603/realme-c35-vang-thumb-600x600.jpg', 10, NULL, NULL),
(11, 'https://cdn.tgdd.vn/Products/Images/42/262650/samsung-galaxy-a23-cam-thumb-600x600.jpg', 11, NULL, NULL),
(12, 'https://cdn.tgdd.vn/Products/Images/42/224859/samsung-galaxy-s20-fan-edition-xanh-la-thumbnew-600x600.jpeg', 12, NULL, NULL),
(13, 'https://cdn.tgdd.vn/Products/Images/42/240259/iPhone-14-thumb-do-600x600.jpg', 13, NULL, NULL),
(14, 'https://cdn.tgdd.vn/Products/Images/42/283148/vivo-v25-5g-vang-thumb-1-1-600x600.jpg', 14, NULL, NULL),
(15, 'https://cdn.tgdd.vn/Products/Images/42/290877/Realme-c30s-xanh-temp-600x600.jpg', 15, NULL, NULL),
(16, 'https://cdn.tgdd.vn/Products/Images/42/290829/samsung-galaxy-s23-plus-600x600.jpg', 16, NULL, NULL),
(17, 'https://cdn.tgdd.vn/Products/Images/42/245545/iPhone-14-plus-thumb-den-600x600.jpg', 17, NULL, NULL),
(18, 'https://cdn.tgdd.vn/Products/Images/42/250625/samsung-galaxy-z-fold4-kem-256gb-600x600.jpg', 18, NULL, NULL),
(19, 'https://cdn.tgdd.vn/Products/Images/42/279065/xiaomi-12t-thumb-600x600.jpg', 19, NULL, NULL),
(20, 'https://cdn.tgdd.vn/Products/Images/42/286702/Xiaomi-Redmi-A1-thumb-xanh-duong-600x600.jpg', 20, NULL, NULL),
(21, 'https://cdn.tgdd.vn/Products/Images/42/291697/vivo-y16-vang-thumb-600x600.jpg', 21, NULL, NULL),
(22, 'https://cdn.tgdd.vn/Products/Images/42/260546/oppo-reno8-pro-thumb-xanh-1-600x600.jpg', 22, NULL, NULL),
(23, 'https://cdn.tgdd.vn/Products/Images/42/249944/oppo-a55-4g-thumb-new-600x600.jpg', 23, NULL, NULL),
(24, 'https://cdn.tgdd.vn/Products/Images/42/236780/iphone-13-mini-pink-1-600x600.jpg', 24, NULL, NULL),
(25, 'https://cdn.tgdd.vn/Products/Images/42/285032/vivo-y02s-thumb-1-2-3-600x600.jpg', 25, NULL, NULL),
(26, 'https://cdn.tgdd.vn/Products/Images/42/292672/realme-10-thumb-1-600x600.jpg', 26, NULL, NULL),
(27, 'https://cdn.tgdd.vn/Products/Images/42/274084/Nokia-C21-Plus-Gray-600x600.jpg', 27, NULL, NULL),
(28, 'https://cdn.tgdd.vn/Products/Images/42/283819/samsung-galaxy-a04s-den-thumb-1-600x600.jpg', 28, NULL, NULL),
(29, 'https://cdn.tgdd.vn/Products/Images/42/115343/vivo-y21-white-01-1-600x600.jpg', 29, NULL, NULL),
(30, 'https://cdn.tgdd.vn/Products/Images/42/273459/tcl-30-se-xanh-thumb-600x600.jpg', 30, NULL, NULL),
(31, 'https://cdn.tgdd.vn/Products/Images/42/250622/oppo-find-x5-pro-den-thumb-600x600.jpg', 31, NULL, NULL),
(32, 'https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg', 32, NULL, NULL),
(33, 'https://cdn.tgdd.vn/Products/Images/42/235838/Galaxy-S22-Ultra-Burgundy-600x600.jpg', 33, NULL, NULL),
(34, 'https://cdn.tgdd.vn/Products/Images/42/242439/Galaxy-S22-Plus-White-600x600.jpg', 34, NULL, NULL),
(35, 'https://cdn.tgdd.vn/Products/Images/42/267984/xiaomi-13-thumb-den-600x600.jpg', 35, NULL, NULL),
(36, 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-blue-1-600x600.jpg', 36, NULL, NULL),
(37, 'https://cdn.tgdd.vn/Products/Images/42/264060/samsung-galaxy-s23-600x600.jpg', 37, NULL, NULL),
(38, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-tim-1-600x600.jpg', 38, NULL, NULL),
(39, 'https://cdn.tgdd.vn/Products/Images/42/236187/oppo-reno6-pro-grey-600x600.jpg', 39, NULL, NULL),
(40, 'https://cdn.tgdd.vn/Products/Images/42/231110/Galaxy-S22-Black-600x600.jpg', 40, NULL, NULL),
(41, 'https://cdn.tgdd.vn/Products/Images/42/282389/vivo-v25-pro-5g-xanh-thumb-1-600x600.jpg', 41, NULL, NULL),
(42, 'https://cdn.tgdd.vn/Products/Images/42/303585/samsung-galaxy-a54-5g-tim-thumb-600x600.jpg', 42, NULL, NULL),
(43, 'https://cdn.tgdd.vn/Products/Images/42/246195/samsung-galaxy-a73-5g-xanh-thumb-600x600.jpg', 43, NULL, NULL),
(44, 'https://cdn.tgdd.vn/Products/Images/42/278886/xiaomi-redmi-note-12-pro-5g-momo-1-600x600.jpg', 44, NULL, NULL),
(45, 'https://cdn.tgdd.vn/Products/Images/42/246196/Samsung-Galaxy-A53-xanh-thumb-600x600.jpg', 45, NULL, NULL),
(46, 'https://cdn.tgdd.vn/Products/Images/42/299248/oppo-reno8t-4g-den1-thumb-600x600.jpg', 46, NULL, NULL),
(47, 'https://cdn.tgdd.vn/Products/Images/42/247364/samsung-galaxy-m53-nau-thumb-600x600.jpg', 47, NULL, NULL),
(48, 'https://cdn.tgdd.vn/Products/Images/42/303583/samsung-galaxy-a34-5g-thumb-600x600.jpg', 48, NULL, NULL),
(49, 'https://cdn.tgdd.vn/Products/Images/42/255513/realme-9-pro-plus-5g-blue-thumb-600x600.jpg', 49, NULL, NULL),
(50, 'https://cdn.tgdd.vn/Products/Images/42/271717/oppo-reno7-z-5g-thumb-2-1-600x600.jpg', 50, NULL, NULL),
(51, 'https://cdn.tgdd.vn/Products/Images/42/246199/samsung-galaxy-a33-5g-thumb-new-1-600x600.jpg', 51, NULL, NULL),
(52, 'https://cdn.tgdd.vn/Products/Images/42/292780/oppo-a77s-den-thumb-1-2-600x600.jpg', 52, NULL, NULL),
(53, 'https://cdn.tgdd.vn/Products/Images/42/274381/oppo-a96-den-thumb-1-600x600.jpg', 53, NULL, NULL),
(54, 'https://cdn.tgdd.vn/Products/Images/42/303298/xiaomi-redmi-note-12-4g-mono-den-600x600.jpg', 54, NULL, NULL),
(55, 'https://cdn.tgdd.vn/Products/Images/42/272016/sam-sung-galaxy-a23-5g-den-thumb-600x600.jpg', 55, NULL, NULL),
(56, 'https://cdn.tgdd.vn/Products/Images/42/251703/oppo-a95-4g-bac-2-600x600.jpg', 56, NULL, NULL),
(57, 'https://cdn.tgdd.vn/Products/Images/42/245607/Vivo-V23e-1-2-600x600.jpg', 57, NULL, NULL),
(58, 'https://cdn.tgdd.vn/Products/Images/42/270471/xiaomi-redmi-note-11-pro-trang-thumb-600x600.jpg', 58, NULL, NULL),
(59, 'cach-dieu-khien-remote-may-lanh-samsung3.jpg', 59, '2023-11-17 11:43:22', '2023-11-17 11:43:22'),
(60, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 60, '2023-11-28 21:33:26', '2023-11-28 21:33:26'),
(61, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 61, '2023-11-28 22:02:59', '2023-11-28 22:02:59'),
(62, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 62, '2023-11-28 22:04:51', '2023-11-28 22:04:51'),
(63, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 63, '2023-11-28 22:19:21', '2023-11-28 22:19:21'),
(64, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 64, '2023-11-28 22:21:50', '2023-11-28 22:21:50'),
(65, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 65, '2023-11-28 22:24:01', '2023-11-28 22:24:01'),
(66, 'http://127.0.0.1:8000/storage/img/Untitled (1).png', 66, '2023-11-28 22:24:44', '2023-11-28 22:24:44'),
(67, 'http://127.0.0.1:8000/storage/img/z4486302434768_02b8a067b6c6d093083e025fb1ddce75.png', 67, '2023-11-28 22:25:55', '2023-11-28 22:59:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `internal_memories`
--

DROP TABLE IF EXISTS `internal_memories`;
CREATE TABLE IF NOT EXISTS `internal_memories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `internal_memories`
--

INSERT INTO `internal_memories` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '32 GB', NULL, NULL),
(2, '64 GB', NULL, NULL),
(3, '128 GB', NULL, NULL),
(4, '256 GB', NULL, NULL),
(5, '512 GB', NULL, NULL),
(6, '1 TB', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_29_065814_create_products_table', 1),
(6, '2023_04_29_070221_create_brands_table', 1),
(7, '2023_04_29_070308_create_ram_sizes_table', 1),
(8, '2023_04_29_070555_create_internal_memories_table', 1),
(9, '2023_04_29_072250_create_images_table', 1),
(10, '2023_04_29_072333_create_cartltem_table', 1),
(11, '2023_04_29_072439_create_cart_item_table', 1),
(12, '2023_04_29_072504_create_carts_table', 1),
(13, '2023_04_29_072532_create_review_table', 1),
(14, '2023_11_21_103748_create_favourite_table', 2),
(15, '2023_11_23_064536_create_favourite_item_table', 2),
(16, '2023_11_23_065732_create_favourite_table', 3),
(17, '2023_11_23_075257_create_favourite_items_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mini_chats`
--

DROP TABLE IF EXISTS `mini_chats`;
CREATE TABLE IF NOT EXISTS `mini_chats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `chat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_chats`
--

INSERT INTO `mini_chats` (`id`, `user_id`, `chat`, `created_at`, `updated_at`) VALUES
(5, 44, 'aa', '2023-12-01 01:10:33', '2023-12-01 01:10:33'),
(2, 44, 'ukm', NULL, NULL),
(3, 33, 'blblblbl', NULL, NULL),
(4, 40, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mini_rep_chats`
--

DROP TABLE IF EXISTS `mini_rep_chats`;
CREATE TABLE IF NOT EXISTS `mini_rep_chats` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `chat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mini_rep_chats`
--

INSERT INTO `mini_rep_chats` (`id`, `user_id`, `admin_id`, `chat`, `created_at`, `updated_at`) VALUES
(1, 44, 40, 'alo alo', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `operating_system`
--

DROP TABLE IF EXISTS `operating_system`;
CREATE TABLE IF NOT EXISTS `operating_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `operating_system`
--

INSERT INTO `operating_system` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Android 10', NULL, NULL),
(2, 'Android 11', NULL, NULL),
(3, 'IOS 16', NULL, NULL),
(4, 'IOS 17', NULL, NULL),
(5, 'Windows Phone ', NULL, NULL),
(7, 'Android 15', NULL, NULL),
(8, ' Android 16', NULL, NULL),
(9, 'IOS 18', NULL, '2023-12-01'),
(6, 'IOS 10', NULL, NULL),
(10, 'IOS 100', '2023-12-01', '2023-12-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`name`, `address`, `phone`, `updated_at`, `created_at`) VALUES
('Thu Hằng', '29', 989304352, '2023-12-01', '2023-12-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_post` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_seo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `author`, `image_post`, `title`, `description`, `content`, `meta_desc`, `meta_keyword`, `status`, `url_seo`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'iphone-15-30-trieu-bang-gia-moi-nhat-1-800x450.jpg', 'iPhone 15 khi nào ra mắt? Sự kiện iPhone 15', 'Review iPhone 15 thường: “Tưởng không ngon mà ngon không tưởng”', '<p>Điểm đ&aacute;nh gi&aacute; iPhone 15 đầu ti&ecirc;n sẽ l&agrave; về sự thay đổi trong thiết kế tổng quan của sản phẩm. Điện thoại iPhone 15 mới của Apple đ&atilde; giữ nguy&ecirc;n&nbsp;<strong>k&iacute;ch thước 147,6 x 71,6 x 7,80mm&nbsp;</strong>v&agrave; chỉ<strong>&nbsp;nặng 171 gram</strong>, nhẹ hơn 1 gram so với phi&ecirc;n bản trước đ&oacute;. Đ&acirc;y l&agrave; phi&ecirc;n bản điện thoại nhẹ nhất trong tất cả c&aacute;c phi&ecirc;n bản từ iPhone 14 series đến nay.&nbsp;</p>\r\n\r\n<p>Với k&iacute;ch thước nhỏ gọn v&agrave; trọng lượng nhẹ, người d&ugrave;ng sẽ dễ d&agrave;ng cầm nắm sử dụng hơn. iPhone 15 c&oacute; Dynamic Island thay thế cho phần notch tr&ecirc;n m&agrave;n h&igrave;nh, tận dụng tối đa kh&ocirc;ng gian hiển thị để th&ocirc;ng b&aacute;o trực tiếp. Điều n&agrave;y gi&uacute;p người d&ugrave;ng kh&ocirc;ng bỏ lỡ th&ocirc;ng tin v&agrave; thao t&aacute;c trực tiếp như điều khiển nhạc, xem cuộc gọi đến, kiểm tra chuyến bay v&agrave; nhiều t&iacute;nh năng kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Đánh giá iPhone 15\" src=\"https://didongviet.vn/dchannel/wp-content/uploads/2023/10/thiet-ke-danh-gia-iphone-15-didongviet.jpg\" style=\"height:520px; width:780px\" title=\"Review iPhone 15 thường: “Tưởng không ngon mà ngon không tưởng” 13\" /></p>\r\n\r\n<p>Thiết kế sang trọng với cụm Dynamic Island ho&agrave;n to&agrave;n mới&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><strong>Xem th&ecirc;m:</strong>&nbsp;<a href=\"https://didongviet.vn/dchannel/iphone-15-co-may-mau-nao-dep-nhat/\" rel=\"noreferrer noopener\" target=\"_blank\"><strong>iPhone 15 c&oacute; mấy m&agrave;u</strong></a></p>\r\n</blockquote>\r\n\r\n<p>Đặc biệt, iPhone 15 được thiết kế với mặt lưng k&iacute;nh pha m&agrave;u sử dụng c&ocirc;ng nghệ trao đổi ion k&eacute;p, đ&aacute;nh b&oacute;ng bằng hạt tinh thể nano v&agrave; khắc axit. Điều n&agrave;y tạo ra một lớp k&iacute;nh nh&aacute;m sang trọng v&agrave; độ bền cao, khiến m&agrave;u sắc h&ograve;a quyện v&agrave;o th&acirc;n m&aacute;y, mang đến vẻ ngo&agrave;i ấn tượng kh&aacute; mới mẻ.</p>\r\n\r\n<p>Mặt trước của iPhone 15 được l&agrave;m từ&nbsp;<strong>k&iacute;nh Ceramic Shield</strong>&nbsp;cực kỳ cứng, gi&uacute;p tăng khả năng chịu lực dưới t&aacute;c động mạnh. Kết hợp với viền bo tr&ograve;n bằng nh&ocirc;m chuẩn h&agrave;ng kh&ocirc;ng vũ trụ, điện thoại mang lại cảm gi&aacute;c thoải m&aacute;i khi cầm v&agrave; dễ d&agrave;ng chuyển đổi giữa mặt trước v&agrave; mặt sau.&nbsp;</p>\r\n\r\n<p><img alt=\"Đánh giá iPhone 15\" src=\"https://didongviet.vn/dchannel/wp-content/uploads/2023/10/thiet-ke-danh-gia-iphone-15-didongviet-2.jpg\" style=\"height:520px; width:780px\" title=\"Review iPhone 15 thường: “Tưởng không ngon mà ngon không tưởng” 14\" /></p>\r\n\r\n<p>Thiết kế sang trọng với mới mẻ, trọng lượng nhẹ hơn bản tiền nhiệm</p>\r\n\r\n<blockquote>\r\n<p><strong>Xem th&ecirc;m:&nbsp;<a href=\"https://didongviet.vn/dchannel/iphone-15-series-co-chong-nuoc-khong/\" rel=\"noreferrer noopener\" target=\"_blank\">iPhone 15 c&oacute; chống nước kh&ocirc;ng</a></strong></p>\r\n</blockquote>\r\n\r\n<h3>2.2. M&agrave;u sắc đa dạng bắt trend với t&ocirc;ng Pastel cực thu h&uacute;t</h3>\r\n\r\n<p>Si&ecirc;u phẩm iPhone 15 năm nay được ra mắt với 5 m&agrave;u pastel dịu mắt để lựa chọn, bao gồm&nbsp;<strong>Đen, Xanh dương, Xanh l&aacute;, V&agrave;ng v&agrave; Hồng</strong>. Trong đ&oacute;, m&agrave;u Xanh L&aacute; v&agrave; Hồng l&agrave; những bản m&agrave;u mới rất thu h&uacute;t, mang đến sự xinh xắn v&agrave; thu h&uacute;t sự quan t&acirc;m từ người d&ugrave;ng, trở th&agrave;nh hai m&agrave;u được ưa chuộng nhất trong năm 2023.</p>\r\n\r\n<p><img alt=\"Đánh giá iPhone 15\" src=\"https://didongviet.vn/dchannel/wp-content/uploads/2023/10/mau-sac-danh-gia-iphone-15-didongviet.jpg\" style=\"height:520px; width:780px\" title=\"Review iPhone 15 thường: “Tưởng không ngon mà ngon không tưởng” 15\" /></p>\r\n\r\n<p>M&agrave;u sắc đa dạng bắt trend với t&ocirc;ng Pastel cực thu h&uacute;t</p>\r\n\r\n<blockquote>\r\n<p><strong>Xem th&ecirc;m:&nbsp;<a href=\"https://didongviet.vn/dchannel/iphone-15-khi-nao-ra-mat-tai-viet-nam-ta/\" rel=\"noreferrer noopener\" target=\"_blank\">iPhone 15 khi n&agrave;o ra mắt tại Việt Nam</a></strong></p>\r\n</blockquote>\r\n\r\n<h3>2.3. M&agrave;n h&igrave;nh</h3>\r\n\r\n<p>Đ&aacute;nh gi&aacute; iPhone 15 về m&agrave;n h&igrave;nh trang bị th&igrave; kh&ocirc;ng c&oacute; sự thay đổi đ&aacute;ng kể về chất lượng hiển thị so với thế hệ trước. Vẫn l&agrave;&nbsp;<strong>c&ocirc;ng nghệ Super Retina XDR OLED 6.1 inch</strong>&nbsp;với&nbsp;<strong>độ ph&acirc;n giải 2556 x 1179 pixel</strong>, mật độ điểm ảnh 460 ppi, mang lại hiển thị sắc n&eacute;t, ch&acirc;n thực v&agrave; m&agrave;u sắc sống động.&nbsp;</p>\r\n\r\n<p>Tuy nhi&ecirc;n, tần số l&agrave;m mới tr&ecirc;n iPhone 15 vẫn giới hạn ở&nbsp;<strong>60Hz&nbsp;</strong>v&agrave; kh&ocirc;ng t&iacute;ch hợp t&iacute;nh năng m&agrave;n h&igrave;nh lu&ocirc;n s&aacute;ng<strong>&nbsp;(<a href=\"https://en.m.wikipedia.org/wiki/Always-on_display\" rel=\"noreferrer noopener nofollow\" target=\"_blank\">Always-On Display</a>)&nbsp;</strong>chỉ c&oacute; tr&ecirc;n bộ đ&ocirc;i iPhone 15 Pro. Thực tế, với độ ph&acirc;n giải Full HD+, m&agrave;n h&igrave;nh iPhone 15 vẫn cung cấp chất lượng hiển thị chi tiết v&agrave; chuyển động mượt m&agrave;.&nbsp;</p>\r\n\r\n<p><strong>Tần số l&agrave;m mới 60Hz&nbsp;</strong>đủ để mang lại trải nghiệm mượt m&agrave; khi duyệt web, xem video v&agrave; chơi game. M&agrave;n h&igrave;nh n&agrave;y vẫn đ&aacute;p ứng tốt nhu cầu sử dụng của người d&ugrave;ng. Tuy nhi&ecirc;n, điểm nổi bật nhất của iPhone 15 l&agrave; độ s&aacute;ng, đạt 1.000 nits trong chế độ ti&ecirc;u chuẩn, 1.600 nits trong&nbsp;<strong>chế độ HDR v&agrave; l&ecirc;n tới 2.000 nits</strong>&nbsp;khi sử dụng ngo&agrave;i trời, n&acirc;ng cấp gấp đ&ocirc;i so với iPhone 14 trước đ&acirc;y.&nbsp;</p>\r\n\r\n<p><img alt=\"Đánh giá iPhone 15\" src=\"https://didongviet.vn/dchannel/wp-content/uploads/2023/10/man-hinh-danh-gia-iphone-15-didongviet.jpg\" style=\"height:520px; width:780px\" title=\"Review iPhone 15 thường: “Tưởng không ngon mà ngon không tưởng” 16\" /></p>\r\n\r\n<p>M&agrave;n h&igrave;nh kh&ocirc;ng c&oacute; n&acirc;ng cấp qu&aacute; nhiều so với bản tiền nhiệm</p>\r\n\r\n<p>Với cải tiến độ s&aacute;ng n&agrave;y, Apple mang đến chất lượng h&igrave;nh ảnh v&agrave; video sắc n&eacute;t hơn bao giờ hết, d&ugrave; ở bất kỳ điều kiện &aacute;nh s&aacute;ng ch&oacute;i n&agrave;o. Người d&ugrave;ng c&oacute; thể thoải m&aacute;i xem phim, chơi game, đọc b&aacute;o hay l&agrave;m việc ngay cả khi &aacute;nh s&aacute;ng mặt trời chiếu trực tiếp.&nbsp;</p>\r\n\r\n<p>Kh&ocirc;ng thể kh&ocirc;ng nhắc đến sư thay đổi trong thiết kế m&agrave;n h&igrave;nh tr&ecirc;n iPhone 15 ti&ecirc;u chuẩn năm nay. Với việc loại bỏ đi chiếc notch tai thỏ cũ v&agrave; thay thế bằng chiếc notch Dynamic Island mới tr&ecirc;n d&ograve;ng 14 Pro/Pro Max năm ngo&aacute;i. Mang đến những trải nghiệm mới mẻ, những t&aacute;c vụ nhanh tr&ecirc;n cụm notch mới n&agrave;y đều được thực hiện tr&ecirc;n iPhone 15 mượt m&agrave;.&nbsp;</p>', 'iphone,iphone_gia_re', 'iphone,iphone_gia_re', 'show', 'iphone-15-khi-nao-ra-mat-su-kien-iphone-15', '2023-12-01 00:13:51', '2023-12-01 00:13:51'),
(2, 'admin', 'So_sanh_i_Phone_15_va_iphone_14_14_7b7f7864c6.jpg', 'Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp?', 'iPhone 15 ra mắt với những cải tiến không mấy đáng kể so với iPhone 14 đã khiến cộng đồng công nghệ đặt ra nhiều câu hỏi sự khác biệt.', '<h2>Thiết kế</h2>\r\n\r\n<p>iPhone 15 v&agrave; iPhone 14 đều giữ nguy&ecirc;n kiểu d&aacute;ng nguy&ecirc;n khối với mặt k&iacute;nh cường lực, nhưng sự kh&aacute;c biệt nằm ở chi tiết. iPhone 15 nổi bật với m&agrave;n h&igrave;nh Dynamic Island, thay v&igrave; m&agrave;n h&igrave;nh tai thỏ của iPhone 14.</p>\r\n\r\n<p><img alt=\"su khac biet giua i phone 15 va i phone 14 co dang nang cap - anh 1\" src=\"https://media.viez.vn/prod/2023/11/30/So_sanh_i_Phone_15_va_iphone_14_3_be660ddcd3.jpg\" style=\"height:459px; width:600px\" title=\"Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp? - ảnh 1\" /></p>\r\n\r\n<p>Điều n&agrave;y tạo ra một thiết kế mặt trước gần như kh&ocirc;ng c&oacute; viền, mang lại vẻ đẹp thời thượng. Đi k&egrave;m với viền Titanium, iPhone 15 kh&ocirc;ng chỉ nhẹ hơn m&agrave; c&ograve;n mạnh mẽ hơn với khả năng chống va đập tốt hơn so với vật liệu nh&ocirc;m tr&ecirc;n iPhone 14.</p>\r\n\r\n<p><img alt=\"su khac biet giua i phone 15 va i phone 14 co dang nang cap - anh 2\" src=\"https://media.viez.vn/prod/2023/11/30/So_sanh_i_Phone_15_va_iphone_14_1_b675b76515.jpg\" style=\"height:450px; width:600px\" title=\"Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp? - ảnh 2\" /></p>\r\n\r\n<p>Phi&ecirc;n bản m&agrave;u sắc cũng l&agrave; một điểm đ&aacute;ng ch&uacute; &yacute;. iPhone 15 mang đến những t&ocirc;ng m&agrave;u mới, như Xanh l&aacute; v&agrave; Hồng, tạo sự đa dạng v&agrave; trẻ trung, trong khi iPhone 14 giữ c&aacute;c m&agrave;u truyền thống như Đen, Xanh dương v&agrave; V&agrave;ng.</p>\r\n\r\n<h2>M&agrave;n H&igrave;nh</h2>\r\n\r\n<p>Cả hai chiếc điện thoại đều sử dụng m&agrave;n h&igrave;nh OLED 6.1 inch, đảm bảo h&igrave;nh ảnh sống động v&agrave; chiều s&acirc;u. Tuy nhi&ecirc;n, iPhone 15 vượt trội với độ ph&acirc;n giải 2556 x 1179 Pixels, tạo ra một trải nghiệm hiển thị sắc n&eacute;t hơn so với iPhone 14 (2532 x 1170 pixel).</p>\r\n\r\n<p><img alt=\"su khac biet giua i phone 15 va i phone 14 co dang nang cap - anh 3\" src=\"https://media.viez.vn/prod/2023/11/30/So_sanh_i_Phone_15_va_iphone_14_14_7b7f7864c6.jpg\" style=\"height:400px; width:600px\" title=\"Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp? - ảnh 3\" /></p>\r\n\r\n<p>C&ocirc;ng nghệ Dynamic Island độc đ&aacute;o chỉ c&oacute; tr&ecirc;n iPhone 15, mang lại trải nghiệm xem h&igrave;nh ảnh v&agrave; video kh&ocirc;ng giới hạn.</p>\r\n\r\n<h2>Hiệu Năng</h2>\r\n\r\n<p>iPhone 15 đ&aacute;nh bại iPhone 14 ở kh&iacute;a cạnh hiệu năng. Với chip A16 Bionic mạnh mẽ, t&iacute;nh năng Neural Engine v&agrave; c&ocirc;ng nghệ AI th&ocirc;ng minh, iPhone 15 c&oacute; khả năng xử l&yacute; t&aacute;c vụ nặng một c&aacute;ch mượt m&agrave; hơn nhiều so với iPhone 14 sử dụng chip A15 Bionic.</p>\r\n\r\n<p><img alt=\"su khac biet giua i phone 15 va i phone 14 co dang nang cap - anh 4\" src=\"https://media.viez.vn/prod/2023/11/30/So_sanh_i_Phone_15_va_iphone_14_12_9df5ddada5.jpg\" style=\"height:399px; width:600px\" title=\"Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp? - ảnh 4\" /></p>\r\n\r\n<p>Sự cải tiến ở RAM LPDDR5 cũng đảm bảo cho trải nghiệm đa nhiệm tốt hơn, l&agrave;m cho việc chuyển đổi giữa ứng dụng trở n&ecirc;n nhanh ch&oacute;ng v&agrave; hiệu quả.</p>\r\n\r\n<h2>Pin v&agrave; Sạc</h2>\r\n\r\n<p>iPhone 15 với dung lượng pin 3349 mAh vượt trội so với iPhone 14 (3.279mAh), cung cấp thời lượng sử dụng l&acirc;u d&agrave;i v&agrave; thoải m&aacute;i.</p>\r\n\r\n<p><img alt=\"su khac biet giua i phone 15 va i phone 14 co dang nang cap - anh 5\" src=\"https://media.viez.vn/prod/2023/11/30/So_sanh_i_Phone_15_va_iphone_14_11_84c06f1e54.jpg\" style=\"height:400px; width:600px\" title=\"Sự khác biệt giữa iPhone 15 và iPhone 14: Có đáng nâng cấp? - ảnh 5\" /></p>', 'iphone,iphone_gia_re', 'iphone,iphone_gia_re', 'show', 'su-khac-biet-giua-iphone-15-va-iphone-14-co-dang-nang-cap', '2023-12-01 00:17:19', '2023-12-01 00:17:19'),
(3, 'admin', 'Samsung_Galaxy_S24_Renders_1_j_3637_9660_1699289864_01c571d209.jpg', 'Thiết kế của Galaxy S24 sắp ra mắt', 'Theo các nguồn tin, Galaxy S24 sẽ mang đến những thay đổi đáng chú ý trong thiết kế, nhưng vẫn duy trì nét đặc trưng của các sản phẩm Samsung.', '<p>Cạnh m&aacute;y dự kiến ​​sẽ được l&agrave;m phẳng thay v&igrave; c&oacute; bo cong, giống với thiết kế của iPhone 15, mang lại một cảm gi&aacute;c tươi mới cho sản phẩm.</p>\r\n\r\n<p><img alt=\"thiet ke cua galaxy s24 sap ra mat - anh 1\" src=\"https://media.viez.vn/prod/2023/11/7/Samsung_Galaxy_S24_Renders_1_j_3637_9660_1699289864_01c571d209.jpg\" style=\"height:383px; width:680px\" title=\"Thiết kế của Galaxy S24 sắp ra mắt - ảnh 1\" /></p>\r\n\r\n<p>Phi&ecirc;n bản Galaxy S24 Plus được dự đo&aacute;n sẽ c&oacute; m&agrave;n h&igrave;nh lớn hơn v&agrave; k&iacute;ch thước l&agrave; 158,5 x 75,9 x 7,75 mm, cao v&agrave; d&agrave;y hơn một ch&uacute;t so với phi&ecirc;n bản S23 Plus. Trong khi đ&oacute;, phi&ecirc;n bản ti&ecirc;u chuẩn Galaxy S24 vẫn sẽ sử dụng m&agrave;n h&igrave;nh 6,1 inch, kh&ocirc;ng c&oacute; sự ch&ecirc;nh lệch k&iacute;ch thước lớn so với thế hệ trước.</p>\r\n\r\n<p>Mẫu cao cấp nhất trong d&ograve;ng, Galaxy S24 Ultra, sẽ nhỏ gọn hơn v&agrave; mỏng hơn với số đo 162,3 x 79 x 8,6 mm so với phi&ecirc;n bản S23 Ultra. M&agrave;n h&igrave;nh của S24 Ultra sẽ vẫn duy tr&igrave; k&iacute;ch thước 6,8 inch, nhưng chỉ c&oacute; mặt k&iacute;nh bảo vệ được bo cong nhẹ, mang lại trải nghiệm sử dụng tốt hơn. Viền bezel được l&agrave;m mỏng, v&agrave; viền tr&ecirc;n v&agrave; dưới m&agrave;n h&igrave;nh được l&agrave;m bằng nhau.</p>\r\n\r\n<p>Dự kiến ​​Galaxy S24 Ultra sẽ c&oacute; khung kim loại giống với iPhone 15 Pro v&agrave; Pro Max, tạo n&ecirc;n một sự sang trọng v&agrave; đẳng cấp. Tuy nhi&ecirc;n, trọng lượng của m&aacute;y c&oacute; thể kh&oacute; để giảm đi, v&igrave; Samsung sử dụng nh&ocirc;m si&ecirc;u nhẹ thay v&igrave; th&eacute;p, như tr&ecirc;n iPhone.</p>\r\n\r\n<p>D&ograve;ng Galaxy S24 c&oacute; thể sẽ được trang bị ăng-ten UWB hoặc 5G mmWave ở dưới n&uacute;t nguồn, giống với iPhone phi&ecirc;n bản Mỹ.</p>\r\n\r\n<p>Samsung sẽ cung cấp c&aacute;c m&agrave;u sắc cơ bản như đen, t&iacute;m, x&aacute;m v&agrave; v&agrave;ng, c&ugrave;ng với một số m&agrave;u đặc biệt như cam, xanh bạc h&agrave; v&agrave; xanh lơ chỉ b&aacute;n tại cửa h&agrave;ng Samsung.</p>\r\n\r\n<p>Ng&agrave;y ra mắt dự kiến sẽ diễn ra v&agrave;o ng&agrave;y 17/1/2024 tại San Francisco.</p>', 'samsung, review công nghệ', 'samsung, review công nghệ', 'show', 'thiet-ke-cua-galaxy-s24-sap-ra-mat', '2023-12-01 00:18:43', '2023-12-01 00:18:43'),
(4, 'admin', 'large_DSCF_1249_1695800655_1698469859_8a87a1c57d.jpg', 'Top 6 mẫu smartphone đắt nhất Việt Nam hiện tại', 'Năm 2023, thị trường smartphone tại Việt Nam đã đón nhận một loạt sản phẩm cao cấp có giá bán vô cùng ấn tượng.', '<h2>Oppo Find N3 - Gi&aacute; 45 triệu đồng</h2>\r\n\r\n<p>Oppo Find N3 được c&ocirc;ng bố v&agrave;o ng&agrave;y 26/10 với mức gi&aacute; cao ngất ngưởng, l&ecirc;n tới 45 triệu đồng. Điều đ&aacute;ng ch&uacute; &yacute; về chiếc điện thoại n&agrave;y l&agrave; thiết kế phẳng v&agrave; vu&ocirc;ng vắn, c&ugrave;ng với một cụm camera sau lớn chiếm gần hết mặt lưng. Find N3 cũng l&agrave; một trong những điện thoại gập si&ecirc;u mỏng nhẹ, với độ d&agrave;y chỉ 11,7 mm khi đ&oacute;ng lại v&agrave; 5,8 mm khi mở ra, đồng thời nặng 239 gram</p>\r\n\r\n<p>. M&agrave;n h&igrave;nh trong v&agrave; ngo&agrave;i của Find N3 đều sử dụng tấm nền LTPO3 OLED với độ ph&acirc;n giải 2K v&agrave; tần số qu&eacute;t 120 Hz. Điện thoại n&agrave;y được trang bị chip Snapdragon 8 Gen 2, RAM l&ecirc;n đến 16 GB v&agrave; bộ nhớ lưu trữ l&ecirc;n đến 512 GB.</p>\r\n\r\n<p>Cụm camera của Find N3 được tinh chỉnh bởi Hasselblad v&agrave; bao gồm một camera ch&iacute;nh v&agrave; một camera g&oacute;c si&ecirc;u rộng, cả hai đều c&oacute; độ ph&acirc;n giải 48 megapixel, c&ugrave;ng với một ống k&iacute;nh tele 64 megapixel c&oacute; khả năng zoom quang 3x. Pin của chiếc điện thoại n&agrave;y c&oacute; dung lượng lớn, l&ecirc;n đến 4.805 mAh, v&agrave; hỗ trợ sạc nhanh 67 W.</p>\r\n\r\n<p><img alt=\"top 6 mau smartphone dat nhat viet nam hien tai - anh 1\" src=\"https://media.viez.vn/prod/2023/10/31/large_DSC_8523_2_1698469753_05e01e3485.jpg\" style=\"height:786px; width:1200px\" title=\"Top 6 mẫu smartphone đắt nhất Việt Nam hiện tại - ảnh 1\" /></p>\r\n\r\n<h2>Samsung Galaxy Z Fold5 - Gi&aacute; từ 40,9 triệu đồng</h2>\r\n\r\n<p>D&ograve;ng smartphone gập cao cấp của Samsung lu&ocirc;n l&agrave; t&acirc;m điểm của sự ch&uacute; &yacute; v&agrave; phi&ecirc;n bản mới, Samsung Galaxy Z Fold5, kh&ocirc;ng phải l&agrave; một ngoại lệ. Mặc d&ugrave; kh&ocirc;ng c&oacute; nhiều thay đổi về thiết kế so với c&aacute;c phi&ecirc;n bản trước đ&oacute;, nhưng Samsung đ&atilde; trang bị cho Z Fold5 một hệ thống bản lề mới dạng giọt nước, gi&uacute;p m&aacute;y mỏng nhẹ hơn v&agrave; loại bỏ khe hở khi gập.</p>\r\n\r\n<p>M&agrave;n h&igrave;nh trong v&agrave; ngo&agrave;i vẫn giữ k&iacute;ch thước ấn tượng, lần lượt l&agrave; 6,2 v&agrave; 7,6 inch, cả hai đều sử dụng tấm nền Dynamic AMOLED 2X với độ ph&acirc;n giải 2K v&agrave; tần số qu&eacute;t 120 Hz. Z Fold5 được trang bị chip Snapdragon 8 Gen 2, RAM l&ecirc;n đến 12 GB v&agrave; c&oacute; ba phi&ecirc;n bản bộ nhớ lưu trữ từ 256 GB, 512 GB đến 1 TB.</p>\r\n\r\n<p>Hệ thống ba camera sau gồm ống k&iacute;nh ch&iacute;nh 50 megapixel, camera si&ecirc;u rộng 12 megapixel v&agrave; camera tele 10 megapixel với khả năng zoom quang 3x. Pin của Z Fold5 c&oacute; dung lượng 4.400 mAh v&agrave; hỗ trợ sạc nhanh 25 W. M&aacute;y n&agrave;y đ&atilde; c&oacute; mặt tr&ecirc;n thị trường từ th&aacute;ng 8 với mức gi&aacute; khởi điểm 40,9 triệu đồng.</p>\r\n\r\n<p><img alt=\"top 6 mau smartphone dat nhat viet nam hien tai - anh 2\" src=\"https://media.viez.vn/prod/2023/10/31/large_DSC_5105_1690299616_1698469767_a602c4dc0d.jpg\" style=\"height:718px; width:1200px\" title=\"Top 6 mẫu smartphone đắt nhất Việt Nam hiện tại - ảnh 2\" /></p>\r\n\r\n<h2>iPhone 15 Pro v&agrave; 15 Pro Max - Gi&aacute; từ 29 triệu đồng v&agrave; 35 triệu đồng</h2>\r\n\r\n<p>Apple tiếp tục đ&aacute;nh dấu sự hiện diện của họ tr&ecirc;n thị trường điện thoại cao cấp tại Việt Nam với iPhone 15 Pro v&agrave; 15 Pro Max. Được ra mắt v&agrave;o th&aacute;ng 9, cả hai chiếc điện thoại n&agrave;y đang được b&aacute;n tr&ecirc;n Apple Store Online tại Việt Nam với mức gi&aacute; khởi điểm lần lượt từ 29 triệu đồng v&agrave; 35 triệu đồng. Điều đ&aacute;ng ch&uacute; &yacute; về iPhone 15 Pro v&agrave; 15 Pro Max l&agrave; thiết kế sang trọng với khung sườn bằng titanium gi&uacute;p giảm trọng lượng.</p>\r\n\r\n<p>Cả hai đều sử dụng m&agrave;n h&igrave;nh OLED k&iacute;ch cỡ 6,1 v&agrave; 6,7 inch với thiết kế Dynamic Island v&agrave; viền si&ecirc;u mỏng. Cổng sạc Lightning truyền thống của Apple đ&atilde; được thay bằng cổng USB-C. Cụm camera sau kh&ocirc;ng c&oacute; nhiều sự kh&aacute;c biệt so với thế hệ trước, nhưng được n&acirc;ng cấp cảm biến tốt hơn.</p>\r\n\r\n<p><img alt=\"top 6 mau smartphone dat nhat viet nam hien tai - anh 3\" src=\"https://media.viez.vn/prod/2023/10/31/large_DSCF_1249_1695800655_1698469859_8a87a1c57d.jpg\" style=\"height:800px; width:1200px\" title=\"Top 6 mẫu smartphone đắt nhất Việt Nam hiện tại - ảnh 3\" /></p>\r\n\r\n<p>15 Pro Max l&agrave; mẫu iPhone đầu ti&ecirc;n được trang bị camera Tetraprism với khả năng zoom quang 5x. Cả hai điện thoại đều sử dụng chip A17 Pro, RAM 6 GB v&agrave; c&oacute; dung lượng pin lần lượt l&agrave; 3.274 mAh v&agrave; 4.441 mAh, hỗ trợ sạc nhanh 25 W.</p>\r\n\r\n<h2>Sony Xperia 1 V - Gi&aacute; 36 triệu đồng</h2>\r\n\r\n<p>Xperia 1 V ra mắt giữa th&aacute;ng 7 v&agrave; tiếp tục giữ thiết kế vu&ocirc;ng vắn đặc trưng của d&ograve;ng Xperia với tỷ lệ hiển thị 21:9. Điều độc đ&aacute;o về chiếc điện thoại n&agrave;y l&agrave; sở hữu pin c&oacute; dung lượng 5.000 mAh m&agrave; chỉ nặng 159 gram. Xperia 1 V sử dụng m&agrave;n h&igrave;nh OLED k&iacute;ch thước 6,5 inch độ ph&acirc;n giải 4K v&agrave; tần số qu&eacute;t 120 Hz.</p>\r\n\r\n<p>Sony vẫn duy tr&igrave; sự độc đ&aacute;o bằng việc kh&ocirc;ng đi theo xu hướng m&agrave;n h&igrave;nh đục lỗ hay tai thỏ. Hệ thống ba camera sau bao gồm camera ch&iacute;nh 52 megapixel, camera si&ecirc;u rộng v&agrave; camera tele c&ugrave;ng 12 megapixel.</p>\r\n\r\n<p>Đặc biệt, camera tele c&oacute; khả năng zoom li&ecirc;n tục từ ti&ecirc;u cự 85-125 mm v&agrave; khẩu độ từ f/2.3 đến f/2.8. Xperia 1 V sử dụng chip Snapdragon 8 Gen 2, RAM 12 GB v&agrave; bộ nhớ lưu trữ 256 GB. Pin của chiếc điện thoại n&agrave;y c&oacute; dung lượng l&ecirc;n đến 5.000 mAh v&agrave; hỗ trợ sạc kh&ocirc;ng d&acirc;y cũng như sạc nhanh 30 W.</p>\r\n\r\n<p><img alt=\"top 6 mau smartphone dat nhat viet nam hien tai - anh 4\" src=\"https://media.viez.vn/prod/2023/10/31/large_DSC_3459_1689521663_1698469773_2bb05813ae.jpg\" style=\"height:720px; width:1200px\" title=\"Top 6 mẫu smartphone đắt nhất Việt Nam hiện tại - ảnh 4\" /></p>\r\n\r\n<h2>Samsung Galaxy S23 Ultra - Gi&aacute; từ 32 triệu đồng</h2>\r\n\r\n<p>Galaxy S23 Ultra ra mắt đầu năm 2023 v&agrave; c&oacute; một thiết kế kh&ocirc;ng kh&aacute;c biệt nhiều so với thế hệ trước, ngoại trừ mặt k&iacute;nh phẳng v&agrave; khung sườn lớn hơn gi&uacute;p m&aacute;y cứng c&aacute;p v&agrave; chống va đập tốt hơn. Chiếc điện thoại n&agrave;y mang phong c&aacute;ch của d&ograve;ng Note v&agrave; t&iacute;ch hợp b&uacute;t S Pen. S23 Ultra sử dụng m&agrave;n h&igrave;nh LTPO k&iacute;ch thước 6,8 inch với độ ph&acirc;n giải 2K v&agrave; độ s&aacute;ng l&ecirc;n đến 1.750 nit.</p>', 'review công nghệ', 'review công nghệ', 'show', 'top-6-mau-smartphone-dat-nhat-viet-nam-hien-tai', '2023-12-01 00:20:26', '2023-12-01 00:20:26'),
(5, 'admin', 'small_1696927959786_260bac000d.jpeg', 'iPhone15 gặp lỗi, Samsung nối dài trải nghiệm cao cấp với bộ FE mới', 'Trong khi iPhone 15 đang chật vật vì lỗi và khiến người dùng thiếu tin tưởng, Samsung chuẩn bị ra mắt bộ sản phẩm dòng FE mang cấu hình gần tương đương dòng flagship, nhưng sở hữu mức giá tốt.', '<h2>Sự bất cập của &quot;iPhone gi&aacute; rẻ&quot;</h2>\r\n\r\n<p>Thế hệ iPhone 15 series ch&iacute;nh thức mở b&aacute;n to&agrave;n cầu từ ng&agrave;y 22/10, nhưng chỉ sau chưa đầy 20 ng&agrave;y ra thị trường, h&agrave;ng loạt lỗi đ&atilde; bị người d&ugrave;ng ph&aacute;t hiện khiến Apple li&ecirc;n tiếp tung ra c&aacute;c bản cập nhật phần mềm nhưng kh&ocirc;ng thể giải quyết triệt để.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, theo&nbsp;<em>Tom&#39;s Guide v&agrave; GSMArena</em>, bộ đ&ocirc;i iPhone 15 v&agrave; 15 Plus năm nay kh&ocirc;ng c&ograve;n được đ&aacute;nh gi&aacute; cao, tiếp tục xem như &quot;vi&ecirc;n gạch l&oacute;t đường&quot; cho đ&ocirc;i m&aacute;y cao cấp d&ograve;ng Pro. Nguy&ecirc;n nh&acirc;n ch&iacute;nh bởi c&aacute;c thiết bị n&agrave;y thiếu nhiều trang bị cần thiết, được xem l&agrave; &quot;tối thiểu&quot; ở trong c&ugrave;ng ph&acirc;n kh&uacute;c gi&aacute;.</p>\r\n\r\n<p><img alt=\"i phone15 gap loi samsung noi dai trai nghiem cao cap voi bo fe moi - anh 1\" src=\"https://media.viez.vn/prod/2023/10/10/image_d5573e62f2.png\" style=\"height:644px; width:975px\" title=\"iPhone15 gặp lỗi, Samsung nối dài trải nghiệm cao cấp với bộ FE mới - ảnh 1\" /></p>\r\n\r\n<p>Thế hệ thứ 15 của nh&agrave; T&aacute;o.</p>\r\n\r\n<p>Trong đ&oacute;, iPhone 15 Plus &ndash; model c&oacute; m&agrave;n h&igrave;nh lớn 6,7 inch v&agrave; gi&aacute; b&aacute;n từ 899 USD tại Mỹ (25,79 triệu đồng tại Việt Nam) vẫn tiếp tục sử dụng m&agrave;n h&igrave;nh c&oacute; tần số qu&eacute;t 60Hz như nhiều thế hệ m&aacute;y trước đ&oacute;, bất chấp c&aacute;c smartphone hiện nay ở ngang ph&acirc;n kh&uacute;c đều trang bị m&agrave;n 120Hz, thậm ch&iacute; một số sản phẩm ở ph&acirc;n kh&uacute;c gi&aacute; thấp hơn đ&atilde; c&oacute; m&agrave;n 120Hz từ l&acirc;u v&agrave; dần n&acirc;ng cấp l&ecirc;n tới 160Hz.</p>\r\n\r\n<p>Nếu chỉ 1 lần trải nghiệm m&agrave;n h&igrave;nh 120Hz, người d&ugrave;ng dễ d&agrave;ng nhận ra sự kh&oacute; chịu khi nội dung bị giật, lag khi vuốt tr&ecirc;n m&agrave;n h&igrave;nh 60Hz.</p>\r\n\r\n<p>Chiếc smartphone thuộc ph&acirc;n kh&uacute;c gi&aacute; tầm trung cận cao cấp của Apple cũng thiếu đi ống k&iacute;nh tele. Khả năng zoom khi chụp h&igrave;nh tr&ecirc;n thiết bị n&agrave;y ho&agrave;n to&agrave;n l&agrave; kỹ thuật số, đồng nghĩa chất lượng v&agrave; chi tiết h&igrave;nh ảnh sẽ giảm do kh&ocirc;ng c&oacute; một cảm biến tele chuy&ecirc;n biệt.</p>\r\n\r\n<p>Tr&ecirc;n nhiều smartphone Android hiện nay, khả năng zoom quang học tối thiểu đ&atilde; đạt 3x, tức tương đương với bộ đ&ocirc;i iPhone 14 Pro/Pro Max hay 15 Pro. D&ugrave; Apple mang con chip của A16 Bionic của iPhone 14 Pro sang iPhone 15 Plus, model n&agrave;y vẫn thiếu đi những yếu tố cần thiết để trở th&agrave;nh cận cao cấp thật sự khi x&eacute;t về mặt t&iacute;nh năng v&agrave; tiện &iacute;ch đi k&egrave;m với gi&aacute; tiền.</p>\r\n\r\n<p>Một thay đổi lớn nhất của bộ 4 iPhone năm nay l&agrave; cổng USB-C thay thế cho cổng Lightning truyền thống, nhưng đ&acirc;y l&agrave; kết quả của sự &eacute;p buộc từ Li&ecirc;n minh ch&acirc;u &Acirc;u m&agrave; Apple buộc phải tu&acirc;n theo nếu muốn tiếp tục b&aacute;n iPhone tại đ&acirc;y.</p>\r\n\r\n<p>Người d&ugrave;ng sẽ c&oacute; một chiếc iPhone 15 Plus tu&acirc;n thủ ti&ecirc;u chuẩn mới, nhưng tốc độ sạc vẫn như thời d&ugrave;ng cổng Lightning, tức tối đa 20W. V&agrave; để lấp đầy vi&ecirc;n pin 4.383 mAh, thời gian sạc cần thiết l&ecirc;n tới 1h34 ph&uacute;t (theo GSMArena).</p>\r\n\r\n<h2>Kh&ocirc;ng đắt đỏ như Iphone 15 &quot;gi&aacute; rẻ&quot; vẫn c&oacute; Android cận cao cấp</h2>\r\n\r\n<p><img alt=\"i phone15 gap loi samsung noi dai trai nghiem cao cap voi bo fe moi - anh 2\" src=\"https://media.viez.vn/prod/2023/10/10/image_45d60b04ec.png\" style=\"height:717px; width:975px\" title=\"iPhone15 gặp lỗi, Samsung nối dài trải nghiệm cao cấp với bộ FE mới - ảnh 2\" /></p>\r\n\r\n<p>Thế hệ Galaxy S FE mới nhất thị trường - Galaxy S23 FE.</p>\r\n\r\n<p>Đối thủ lớn nhất của Apple ở mảng smartphone hiện nay l&agrave; Samsung v&agrave; khi nh&igrave;n c&ugrave;ng ph&acirc;n kh&uacute;c gi&aacute;, nh&agrave; sản xuất H&agrave;n Quốc mang đến những lựa chọn tối ưu hơn cho người d&ugrave;ng. Thay v&igrave; d&ograve;ng Galaxy S cao cấp, người d&ugrave;ng c&oacute; thể chọn một phi&ecirc;n bản tối ưu về gi&aacute; hơn l&agrave; Galaxy S FE, với thế hệ mới nhất sẽ l&agrave; Galaxy S23 FE.</p>\r\n\r\n<p>Thế hệ FE (Fan Edition) l&agrave; d&ograve;ng m&aacute;y cận cao cấp của Samsung được ph&aacute;t triển dựa tr&ecirc;n d&ograve;ng Galaxy S cao cấp, mang gần như to&agrave;n bộ cấu h&igrave;nh v&agrave; t&iacute;nh năng của &quot;đ&agrave;n anh&quot; để đ&oacute;ng g&oacute;i v&agrave;o một phi&ecirc;n bản c&oacute; mức gi&aacute; tối ưu hơn cho những người th&iacute;ch thiết kế Galaxy S nhưng phải t&iacute;nh to&aacute;n về t&agrave;i ch&iacute;nh.</p>', 'review công nghệ', 'review công nghệ', 'show', 'iphone15-gap-loi-samsung-noi-dai-trai-nghiem-cao-cap-voi-bo-fe-moi', '2023-12-01 00:22:30', '2023-12-01 00:22:30'),
(6, 'admin', 'image_f6d3030d22.png', 'Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị', 'Sau hơn 2 tháng phát động, cuộc thi Cùng Cửa Hàng Trải Nghiệm Samsung Nhập Hội Linh Hoạt đã nhận được sự quan tâm đặc biệt từ cộng đồng các bạn trẻ dám “nghĩ ngược”. Nhiều bạn trẻ đã tích lũy điểm số tối đa từ cuộc thi để nhận về nhiều giải thưởng hấp dẫn.', '<p>&quot;C&ugrave;ng Cửa H&agrave;ng Trải Nghiệm Samsung Nhập Hội Linh Hoạt&quot; bắt nguồn từ Tr&ograve; chơi Cờ Tỷ Ph&uacute; th&acirc;n thuộc của tuổi thơ. Nhưng lần n&agrave;y, Cửa H&agrave;ng Trải Nghiệm Samsung cho ra đời phi&ecirc;n bản hiện đại hơn, lấy cảm hứng từ tinh hoa bản sắc v&agrave; khả năng s&aacute;ng tạo của Galaxy Z Flip5 &amp; Z Fold5, nhằm mang tới c&aacute;c hoạt động tương t&aacute;c th&uacute; vị để người trẻ c&oacute; thể chinh phục những thử th&aacute;ch xuy&ecirc;n m&ocirc;i trường trực tuyến v&agrave; cuộc sống thực tại c&aacute;c th&agrave;nh phố họ sinh sống.</p>\r\n\r\n<p><img alt=\"cung samsung nhap hoi linh hoat nhan ve giai thuong gia tri - anh 1\" src=\"https://media.viez.vn/prod/2023/10/16/image_d17997e081.png\" style=\"height:650px; width:975px\" title=\"Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị - ảnh 1\" /></p>\r\n\r\n<p>Tinh hoa bản sắc v&agrave; khả năng s&aacute;ng tạo của Galaxy Z Flip5 &amp; Z Fold5.</p>\r\n\r\n<p>Khởi động từ ngày 13/08/2023, cu&ocirc;̣c thi với quy m&ocirc; t&ocirc;̉ chức lớn đã giới thi&ecirc;̣u và thu hút được hàng trăm bạn trẻ tại các thành ph&ocirc;́ như Thành ph&ocirc;́ H&ocirc;̀ Chí Minh, Hà N&ocirc;̣i, Đà Năng, Hải Phòng, Đ&ocirc;̀ng Nai, Bình Dương &amp; Khánh Hòa đ&ecirc;́n với cửa hàng trải nghi&ecirc;̣m Samsung đ&ecirc;̉ tham gia cu&ocirc;̣c thi và rinh v&ecirc;̀ nhi&ecirc;̀u ph&acirc;̀n quà giá trị.</p>\r\n\r\n<p>Trong đó, đặc bi&ecirc;̣t k&ecirc;̉ đ&ecirc;́n chị Bùi Thị Quỳnh Như, đ&atilde; xu&acirc;́t sắc trở th&agrave;nh người chơi đ&acirc;̀u ti&ecirc;n có t&ocirc;̉ng s&ocirc;́ đi&ecirc;̉m cao nh&acirc;́t trong đợt trao giải thứ 2, đ&ecirc;̉ mang v&ecirc;̀ cho bản th&acirc;n 01 Đồng hồ th&ocirc;ng minh Samsung Galaxy Watch6 40mm.</p>\r\n\r\n<p><img alt=\"cung samsung nhap hoi linh hoat nhan ve giai thuong gia tri - anh 2\" src=\"https://media.viez.vn/prod/2023/10/16/image_60f8f43f44.png\" style=\"height:975px; width:975px\" title=\"Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị - ảnh 2\" /></p>\r\n\r\n<p>C&ugrave;ng Cửa H&agrave;ng Trải Nghiệm Samsung Nhập Hội Linh Hoạt.</p>\r\n\r\n<p>Trở th&agrave;nh chủ nh&acirc;n của giải thưởng, chị Như kh&ocirc;ng giấu được sự vui mừng và cho bi&ecirc;́t cuộc thi đ&atilde; mang đến cho chị v&agrave; nhiều người bạn khác cùng tham dự những trải nghiệm v&ocirc; c&ugrave;ng tuyệt vời dòng đi&ecirc;̣n thoại g&acirc;̣p Galaxy Z Flip5. Đ&ocirc;̀ng thời sự đầu tư v&agrave; t&acirc;m huyết của Samsung trong việc tổ chức cuộc thi với các ph&acirc;̀n hoạt động tương tác được thiết kế s&aacute;ng tạo và chính chu đã giúp chị ph&acirc;̀n nào hiểu th&ecirc;m về cộng đồng c&aacute;c ti&ecirc;̉u văn hóa (subculture) mà Samsung đang đ&ocirc;̀ng hành cùng.</p>\r\n\r\n<p><img alt=\"cung samsung nhap hoi linh hoat nhan ve giai thuong gia tri - anh 3\" src=\"https://media.viez.vn/prod/2023/10/16/image_f6d3030d22.png\" style=\"height:650px; width:975px\" title=\"Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị - ảnh 3\" /></p>\r\n\r\n<p>B&ocirc;̣ phụ ki&ecirc;̣n &ocirc;́p lưng theo chủ đ&ecirc;̀ phong phú, đ&ocirc;̣c đáo.</p>\r\n\r\n<p>Chị chia sẻ th&ecirc;m, trong qu&aacute; tr&igrave;nh trải nghiệm v&agrave; tương t&aacute;c với Galaxy Z Flip5 để tham gia cuộc thi, chị r&acirc;́t &acirc;́n tượng với thiết kế sang trọng và thời trang của sản ph&acirc;̉m, đi kèm với các b&ocirc;̣ phụ ki&ecirc;̣n &ocirc;́p lưng theo chủ đ&ecirc;̀ phong phú, đ&ocirc;̣c đáo như B&ocirc;̣ sưu t&acirc;̣p FLIP SUIT - đánh d&acirc;́u l&acirc;̀n đ&acirc;̀u Samsung hợp t&aacute;c c&aacute;c nghệ sĩ Việt đ&ecirc;̉ thi&ecirc;́t k&ecirc;́ b&ocirc;̣ &ocirc;́p lưng th&ocirc;ng minh đ&acirc;̀y ch&acirc;́t &quot;ngh&ecirc;̣&quot;.</p>\r\n\r\n<p><img alt=\"cung samsung nhap hoi linh hoat nhan ve giai thuong gia tri - anh 4\" src=\"https://media.viez.vn/prod/2023/10/16/image_5d2f47964d.png\" style=\"height:550px; width:975px\" title=\"Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị - ảnh 4\" /></p>\r\n\r\n<p>M&agrave;n h&igrave;nh phụ Flex Window.</p>\r\n\r\n<p>B&ecirc;n cạnh đó, chị Như còn chia sẻ m&agrave;n h&igrave;nh phụ Flex Window l&agrave; yếu tố chị cảm thấy t&acirc;m đắc nhất tr&ecirc;n Galaxy Z Flip5 mới, khi Samsung đ&atilde; bổ sung th&ecirc;m widget, ứng dụng gi&uacute;p chị có th&ecirc;̉ dễ d&agrave;ng sử dụng c&aacute;c t&iacute;nh năng cơ bản m&agrave; kh&ocirc;ng cần mở m&agrave;n h&igrave;nh ch&iacute;nh v&agrave; rất nhiều chủ đề mới để chị c&oacute; thể t&ugrave;y biến, tận dụng tối đa chiếc m&agrave;n h&igrave;nh phụ n&agrave;y.</p>\r\n\r\n<p>Ngo&agrave;i ra, khi đ&ecirc;́n tham gia hoạt đ&ocirc;̣ng đi&ecirc;̀u chi t&acirc;m đắc nh&acirc;́t chính là sự h&ocirc;̃ trợ nhi&ecirc;̣t tình từ nh&acirc;n vi&ecirc;n tại Cửa H&agrave;ng Trải Nghiệm Samsung. &quot;Các anh chị tại cửa h&agrave;ng lu&ocirc;n nở nụ cười ch&agrave;o đ&oacute;n, sẵn s&agrave;ng lắng nghe và hướng d&acirc;̃n mình t&acirc;̣n tình. K&ecirc;́t hợp với kh&ocirc;ng gian trưng b&agrave;y được thiết kế một c&aacute;ch hợp l&yacute; và chuy&ecirc;n bi&ecirc;̣t, gi&uacute;p mình có th&ecirc;̉ dễ d&agrave;ng trải nghiệm sản phẩm trong h&ecirc;̣ sinh thái Galaxy một c&aacute;ch t&ocirc;́i ưu nh&acirc;́t.&quot;</p>\r\n\r\n<p><img alt=\"cung samsung nhap hoi linh hoat nhan ve giai thuong gia tri - anh 5\" src=\"https://media.viez.vn/prod/2023/10/16/image_c22aa3c8d1.png\" style=\"height:650px; width:975px\" title=\"Cùng Samsung \'Nhập Hội Linh Hoạt\' nhận về giải thưởng giá trị - ảnh 5\" /></p>\r\n\r\n<p>Đ&ocirc;̣i ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Trải nghi&ecirc;̣m của chị Như cho th&acirc;́y, Samsung đang thực hi&ecirc;̣n đúng với những gì mà mình đã đ&ecirc;̀ ra với mong muốn mỗi kh&aacute;ch h&agrave;ng khi đến với cửa h&agrave;ng, th&ocirc;ng qua những trải nghiệm thực tế trong m&ocirc;i trường c&ocirc;ng nghệ hiện đại, cùng sự h&ocirc;̃ trợ của đ&ocirc;̣i ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghi&ecirc;̣p sẽ dễ d&agrave;ng lựa chọn được thiết bị ph&ugrave; hợp với đời sống, nhu cầu v&agrave; sở th&iacute;ch của từng c&aacute; nh&acirc;n.</p>', 'review công nghệ', 'review công nghệ', 'show', 'cung-samsung-nhap-hoi-linh-hoat-nhan-ve-giai-thuong-gia-tri', '2023-12-01 00:24:41', '2023-12-01 00:24:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `openratingSystems` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandId` bigint(20) UNSIGNED NOT NULL,
  `ramSizeId` bigint(20) UNSIGNED NOT NULL,
  `operatingSystemId` bigint(20) UNSIGNED NOT NULL,
  `internalMemoryId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_brandid_foreign` (`brandId`),
  KEY `products_ramsizeid_foreign` (`ramSizeId`),
  KEY `products_operatingsystemid_foreign` (`operatingSystemId`),
  KEY `products_internalmemoryid_foreign` (`internalMemoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `openratingSystems`, `brandId`, `ramSizeId`, `operatingSystemId`, `internalMemoryId`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại OPPO Find N2 Flip', 'Về thiết kế của máy, Find N2 Flip sẽ được làm theo cơ chế gập ấn tượng với tỷ lệ khung hình rộng và viền mỏng. Ngoài ra, điện thoại còn được trang bị một màn hình phụ nhỏ ở mặt sau giúp người dùng tiện lợi trong việc chụp ảnh selfie hoặc kiểm tra thông báo. ', 19990000, 'Android 13', 3, 4, 0, 3, NULL, NULL),
(2, 'Điện thoại iPhone 14 Pro Max 128GB', 'iPhone năm nay sẽ được thừa hưởng nét đặc trưng từ người anh iPhone 13 Pro Max, vẫn sẽ là khung thép không gỉ và mặt lưng kính cường lực kết hợp với tạo hình vuông vức hiện đại thông qua cách tạo hình phẳng ở các cạnh và phần mặt lưng.', 27090000, 'iOS 16', 1, 3, 0, 1, NULL, NULL),
(3, 'Điện thoại iPhone 14 Pro 128GB', 'Đến với thiết kế của iPhone 14 Pro năm nay, hãng vẫn giữ lại nét đặc trưng vốn có từ các đời trước, vẫn mang trong mình ngoại hình vuông vức với các cạnh và mặt lưng vát phẳng. Hiện tại thị hiếu của người dùng về kiểu thiết kế này vẫn đang rất cao, vậy nên theo mình thấy thì đây vẫn sẽ là chiếc điện thoại bắt trend cho trong nhiều năm tiếp theo.', 24990000, 'iOS 16', 1, 3, 0, 1, NULL, NULL),
(4, 'Điện thoại Samsung Galaxy S21 FE 5G (6GB/128GB)', 'Galaxy S21 FE 5G thiết kế mỏng nhẹ với độ dày 7.9 mm, khối lượng chỉ 177 gram, các góc cạnh bo tròn cho cảm giác hài hòa, mềm mại, kết hợp các tông màu thời thượng gồm tím, xanh lá, xám và trắng giúp bạn dễ dàng tạo nên phong cách riêng đầy cá tính.', 9990000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(5, 'Điện thoại Xiaomi Redmi 12C 64GB', 'Với thiết kế bo cong mềm mại qua những đường nét tinh xảo và màu sắc hiện đại, Redmi 12C có vẻ ngoài rất sang trọng và thời thượng để mang đến cái nhìn đầy bắt mắt. Điện thoại không chỉ đơn thuần là một thiết bị thông thường mà còn có thể sử dụng như một phụ kiện thời trang giúp bạn tự tin hơn mỗi khi cầm nắm chúng trên tay.', 2990000, 'Android 12', 4, 2, 0, 4, NULL, NULL),
(6, 'Điện thoại Samsung Galaxy S23 Ultra 5G 256GB', 'Về thiết kế thì Samsung Galaxy S23 Ultra sẽ tiếp tục thừa hưởng kiểu dáng sang trọng đến từ thế hệ trước, vẫn là bộ khung kim loại, mặt lưng kính cùng kiểu tạo hình bo cong nhẹ ở cạnh bên và màn hình.', 26090000, 'Android 13', 2, 4, 0, 2, NULL, NULL),
(7, 'Điện thoại iPhone 11 64GB', 'Nói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới.', 10390000, 'iOS 15', 1, 2, 0, 1, NULL, NULL),
(8, 'Điện thoại Vivo Y35', 'Vivo Y35 có kích thước màn hình 6.58 inch đi cùng là tấm nền IPS LCD, độ phân giải Full HD+ với những thông số trên chất lượng hình ảnh hiển thị có chi tiết tốt, góc nhìn rộng và màu sắc trung thực.', 5790000, 'Android 12', 5, 3, 0, 5, NULL, NULL),
(9, 'Điện thoại OPPO Reno8 T 5G 256GB', 'Qua những lần chạm đầu tiên trên chiếc Reno8 T 5G thì mình thấy đây là một chiếc điện thoại có độ hoàn thiện khá tốt, máy mang lại cho mình một cảm giác cầm nắm tương đối là đầm tay, hai bên cạnh cũng được làm bo cong giúp hạn chế tình trạng cấn tay mang đến cho mình một trải nghiệm sử dụng khá là thoải mái.', 10690000, 'Android 13', 3, 4, 0, 3, NULL, NULL),
(10, 'Điện thoại realme C55 6GB', 'realme C55 chiếc smartphone có thiết kế đơn giản với ngôn ngữ thiết kế vuông vắn và màu sắc thanh lịch, khung viền được làm cứng cáp cùng mặt lưng nhựa nhám giúp mang lại cảm giác cầm chắc tay hay hạn chế việc bám dấu vân tay mỗi khi sử dụng.', 4590000, 'Android 13', 6, 3, 0, 6, NULL, NULL),
(11, 'Điện thoại Samsung Galaxy A23 4GB', 'Để máy vận hành một cách ổn định hơn Samsung trang bị cho Galaxy A23 con chip quốc dân dành cho thị trường di động tầm trung hiện nay (04/2022) mang tên Snapdragon 680 8 nhân với hiệu suất tối đa đạt được là 2.4 GHz.', 4690000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(12, 'Điện thoại Samsung Galaxy S20 FE (8GB/256GB)', 'Camera trên S20 FE là 3 cảm biến chất lượng nằm gọn trong mô đun chữ nhật độc đáo ở mặt lưng bao gồm: Camera chính 12 MP cho chất lượng ảnh sắc nét, camera góc siêu rộng 12 MP cung cấp góc chụp tối đa và cuối cùng camera tele 8 MP hỗ trợ zoom quang học 3X.', 8790000, 'Android 12', 2, 4, 0, 2, NULL, NULL),
(13, 'Điện thoại iPhone 14 128GB', 'Với phiên bản tiêu chuẩn thì nhà Apple vẫn giữ nguyên kiểu dáng thiết kế so với thế hệ tiền nhiệm, vẫn là mặt lưng phẳng cùng bộ khung vuông giúp máy trở nên hiện đại hơn.', 19490000, 'iOS 16', 1, 3, 0, 1, NULL, NULL),
(14, 'Điện thoại Vivo V25 5G', 'Vivo V25 sở hữu cho mình những màu sắc hết sức trẻ trung và hiện đại, không chỉ mang đến nhiều sự lựa chọn hơn cho người dùng mà điều này còn đem lại cái nhìn tươi mới năng động hơn khi cầm nắm sử dụng.', 9490000, 'Android 12', 5, 3, 0, 5, NULL, NULL),
(15, 'Điện thoại realme C30s (2GB/32GB)', 'realme C30s có cho mình một thiết kế đẹp mắt nhờ lối tạo hình vuông vức bắt trend, sở hữu hai phiên bản màu sắc trung tính là xanh và đen nên đây được xem là thiết bị có thể phù hợp với mọi lứa tuổi giới tính.', 2190000, 'Android 12 (Go Edition)', 6, 1, 0, 6, NULL, NULL),
(16, 'Điện thoại Samsung Galaxy S23+ 5G 256GB', 'Ấn tượng đầu tiên của mình khi trên tay chiếc Galaxy S23+ là cái nhìn vuông vắn sang trọng, tổng thể máy được hoàn thiện từ các loại chất liệu cao cấp giúp mang đến trải nghiệm cầm nắm đầm tay hơn. ', 22190000, 'Android 13', 2, 4, 0, 2, NULL, NULL),
(17, 'Điện thoại iPhone 14 Plus 128GB', 'Giống như những thế hệ “Plus” trước đây, iPhone 14 Plus vẫn sẽ là phiên bản phóng to từ iPhone 14 với ngôn ngữ thiết kế không đổi, vẫn sẽ là cạnh viền vuông vức đi kèm với mặt lưng phẳng để tạo nên cái nhìn bắt trend và đặc trưng.', 21890000, 'iOS 16', 1, 3, 0, 1, NULL, NULL),
(18, 'Điện thoại Samsung Galaxy Z Fold4 256GB', 'Galaxy Z Fold4 (2022) ra mắt với ngoại hình gần như là không đổi khi so với Galaxy Z Fold3, nếu bạn chỉ nhìn bề ngoài thì bạn sẽ khó lòng phân biệt được 2 sản phẩm này. Máy vẫn sử dụng khung viền Armor Aluminum bền bỉ, mặt kính màn hình phụ là Corning Gorilla Glass Victus+, mặt kính màn hình chính là Ultra Thin Glass.', 35790000, 'Android 12', 2, 4, 0, 2, NULL, NULL),
(19, 'Điện thoại Xiaomi 12T 5G 128GB', 'Xiaomi 12T có thiết kế khá tương đồng với thế hệ tiền nhiệm, mặt lưng được làm bo cong ở hai cạnh kèm theo một dòng chữ “Xiaomi” bố trí ở góc dưới phần thân máy.', 9490000, 'Android 12', 4, 3, 0, 4, NULL, NULL),
(20, 'Điện thoại Xiaomi Redmi A1', 'Sở hữu thiết kế giả da sang trọng mang đến cho thiết bị một diện mạo cuốn hút thời trang, đi kèm với đó sẽ là những màu sắc vô cùng cá tính và trẻ trung.', 1890000, 'Android 12 (Go Edition)', 4, 1, 0, 4, NULL, NULL),
(21, 'Điện thoại Vivo Y16 64GB', 'Vivo Y16 được thiết kế phẳng bởi các cạnh và hai mặt của máy được tạo hình vuông vức, điều này giúp chiếc máy trở nên sang trọng và hợp thời hơn để bạn có thể tự tin sử dụng trên tay.', 3390000, 'Android 12', 5, 2, 0, 5, NULL, NULL),
(22, 'Điện thoại OPPO Reno8 Pro 5G', 'Lần này nhà OPPO mang đến cho chúng ta một chiếc điện thoại có thiết kế đặc biệt, máy sở hữu một diện mạo khác hẳn với những chiếc điện thoại OPPO Reno trước đây, cách thiết kế này đã làm mình liên tưởng đến chiếc OPPO Find X5 Pro được ra mắt trước đó.', 17990000, 'Android 12', 3, 4, 0, 3, NULL, NULL),
(23, 'Điện thoại OPPO A55', 'OPPO A55 4G có 3 phiên bản màu độc đáo là xanh lá, xanh dương và màu đen. Thiết kế cong 3D cùng kích thước mỏng nhẹ, OPPO A55 4G vừa vặn trong tay người cầm, cho từng thao tác trải nghiệm thoải mái và chắc chắn.', 3690000, 'Android 11', 3, 2, 0, 3, NULL, NULL),
(24, 'Điện thoại iPhone 13 mini 128GB', 'iPhone 13 mini được trang bị bộ vi xử lý A15 Bionic sản xuất trên tiến trình 5 nm giúp cải thiện hiệu suất và giảm điện năng tiêu thụ đến 15% so với phiên bản A14 Bionic trước đó, đáp ứng hoàn hảo trong công việc cũng như trong giải trí của người dùng tốt hơn.', 16990000, 'iOS 15', 1, 3, 0, 1, NULL, NULL),
(25, 'Điện thoại Vivo Y02s 32GB', 'Vivo Y02s được hoàn thiện với hai mặt và các cạnh vát phẳng giúp cho thân hình của chiếc máy trở nên vuông vắn và cực kỳ hợp xu hướng hiện nay. Nổi bật hơn hết là cụm camera được Vivo thiết kế với hai cụm tròn to nổi khá ấn tượng.', 2890000, 'Android 12', 5, 1, 0, 5, NULL, NULL),
(26, 'Điện thoại realme 10', 'realme 10 có một ngoại hình vuông vắn nhờ lối tạo hình phẳng ở các mặt và cạnh viền. Tổng khối lượng của máy đạt 178 g, vậy nên khi sử dụng lâu dài sẽ giúp giảm thiểu việc mỏi tay, điều này thực sự hữu ích dành cho những ai thường xuyên phải sử dụng điện thoại trong nhiều giờ liền.', 6490000, 'Android 12', 6, 4, 0, 6, NULL, NULL),
(27, 'Điện thoại Nokia C21 Plus 64GB', 'C21 Plus mang trong mình viên pin có dung lượng 5050 mAh, bạn có thể sử dụng liên tục xuyên suốt cả ngày. Đi kèm với đó là chuẩn sạc Micro USB 10 W cơ bản, với công suất này thì bạn có thể sạc máy trong thời gian nghỉ ngơi để hạn chế thời gian chờ đợi.', 2390000, 'Android 11 (Go Edition)', 7, 2, 0, 7, NULL, NULL),
(28, 'Điện thoại Samsung Galaxy A04s', 'Samsung trang bị cho tân binh Galaxy A04s màn hình IPS LCD kích thước 6.5 inch với độ phân giải HD+ đủ để hiển thị hình ảnh một cách sắc nét, màu sắc thể hiện chân thực mang đến cho người dùng trải nghiệm xem đắm chìm. Đặc biệt màn hình hỗ trợ tần số quét 90 Hz cao hơn hẳn so với 60 Hz thông thường, tạo độ mượt mà khi bạn cuộn, lướt hoặc chơi các tựa game có FPS cao.', 3190000, 'Android 12', 2, 2, 0, 2, NULL, NULL),
(29, 'Điện thoại Vivo Y21', 'Máy có một thiết kế nguyên khối tạo cảm giác bền bỉ, chắc chắn. Vivo Y21 còn mang đến trải nghiệm cầm nắm thoải mái với thân máy mỏng chỉ 8 mm và có các cạnh viền bo tròn mịn màng giúp cho mọi thao tác sử dụng trở nên hoàn hảo.', 3090000, 'Android 11', 5, 2, 0, 5, NULL, NULL),
(30, 'Điện thoại TCL 30 SE', 'TCL 30 SE khoác lên mình một vẻ ngoài khá thời thượng nhờ lối thiết kế phẳng, cạnh viền có hơi bo cong nhẹ để mang đến cảm giác cầm nắm dễ chịu hơn khi sử dụng máy trong khoảng thời gian dài.', 2540000, 'Android 12', 3, 3, 0, 4, NULL, NULL),
(31, 'Điện thoại OPPO Find X5 Pro 5G', 'Điều làm mình mê hoặc ngay từ cái nhìn đầu tiên là mặt lưng hết sức bóng bẩy, trên phiên bản màu đen thì mình hoàn toàn có thể sử dụng máy với công dụng tương tự như một chiếc gương soi tiện ích.', 22990000, 'Android 12', 3, 4, 0, 3, NULL, NULL),
(32, 'Điện thoại Samsung Galaxy Z Flip4 128GB', 'Có lẽ điện thoại gập đã không còn là cái tên quá xa lạ bởi nhiều ông lớn trong ngành sản xuất thiết bị di động đã cho ra mắt khá nhiều sản phẩm có thiết kế tương tự, gần đây nhất thì có sự góp mặt của chiếc flagship đến từ nhà Samsung mang tên Galaxy Z Flip4. ', 19990000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(33, 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB', 'Galaxy S22 Ultra 5G được kế thừa form thiết kế từ những dòng Note trước đây của hãng đem đến cho bạn có cảm giác vừa mới lạ vừa hoài niệm. Khối lượng của máy 228 g cho cảm giác cầm nắm đầm tay, khi cầm máy trần thì hơi có cảm giác dễ trượt.', 18890000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(34, 'Điện thoại Samsung Galaxy S22+ 5G 128GB', 'Galaxy S22+ 5G thiết kế bền bỉ với khung viền từ hợp kim Armor Aluminum cứng cáp, trang bị kính cường lực Gorilla Glass Victus+ giúp hạn chế trầy xước cho bạn thoải mái sử dụng thiết bị.', 17790000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(35, 'Điện thoại Xiaomi 13 5G', 'Năm nay, nhà Xiaomi khoác lên mình sản phẩm mới với một vẻ ngoài hoàn toàn khác so với thế hệ cũ, từ màu sắc cho đến cách bố trí cụm camera trên Xiaomi 13 đều thể hiện lên một điểm độc lạ chưa từng có. ', 17690000, 'Android 13', 4, 4, 0, 4, NULL, NULL),
(36, 'Điện thoại iPhone 13 128GB', 'Con chip Apple A15 Bionic siêu mạnh được sản xuất trên quy trình 5 nm giúp iPhone 13 đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.', 17090000, 'iOS 15', 1, 3, 0, 1, NULL, NULL),
(37, 'Điện thoại Samsung Galaxy S23 5G 128GB', 'Ở phiên bản năm nay, mình rất vui khi biết được rằng Galaxy S23 vẫn giữ nguyên kiểu dáng quen thuộc từ thế hệ trước, nó được xem là một biểu tượng của dòng điện thoại Samsung Galaxy dòng S khi mang trong mình một đặc trưng riêng biệt và đầy đẳng cấp.', 16390000, 'Android 13', 2, 3, 0, 2, NULL, NULL),
(38, 'Điện thoại iPhone 12 64GB', 'Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.', 14990000, 'iOS 15', 1, 2, 0, 1, NULL, NULL),
(39, 'Điện thoại OPPO Reno6 Pro 5G', 'Reno6 Pro 5G trang bị bộ vi xử lý mạnh mẽ Snapdragon 870 đến từ Qualcomm, đạt tốc độ xử lý cao trên xung nhịp lên đến 3.2 GHz, hiệu suất CPU tăng lên 12% và GPU 10% so với thế hệ chipset tiền nhiệm, mang đến trải nghiệm ấn tượng trên từng tác vụ giải trí lẫn công việc.', 13990000, 'Android 11', 3, 4, 0, 3, NULL, NULL),
(40, 'Điện thoại Samsung Galaxy S22 5G 128GB', 'Cảm giác đầu tiên Samsung Galaxy S22 mang lại cho mình khi sử dụng là máy cho cảm giác cầm nắm cực kỳ chắc chắn và đằm tay với thiết kế nhỏ gọn của mình.', 13640000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(41, 'Điện thoại Vivo V25 Pro 5G', 'Giữa vô vàn thiết bị sở hữu lối thiết kế vuông vức trên thị trường thì sự xuất hiện của V25 Pro làm mình cảm thấy rất thích thú bởi điện thoại được tạo hình bo cong ở các cạnh, mang lại cho thiết bị một nét đặc trưng riêng biệt.', 11990000, 'Android 12', 5, 3, 0, 5, NULL, NULL),
(42, 'Điện thoại Samsung Galaxy A54 5G 128GB', 'Galaxy A54 5G có thiết kế khá trẻ trung với kiểu dáng phẳng và nhiều phiên bản màu sắc mới mẻ đầy cuốn hút. Máy được làm từ nhựa, giúp cảm giác cầm nắm trở nên nhẹ nhàng và thoải mái hơn.', 9590000, 'Android 13', 2, 3, 0, 2, NULL, NULL),
(43, 'Điện thoại Samsung Galaxy A73 5G 128GB', 'Điều mà mình ấn tượng nhất trên Galaxy A73 5G đó chính là khả năng chụp ảnh khi máy sở hữu 4 ống kính có độ phân giải lần lượt: Camera chính 108 MP, camera góc siêu rộng 12 MP, cảm biến độ sâu và macro có cùng độ phân giải 5 MP giúp các bức ảnh thu lại trở nên chi tiết hơn.', 9540000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(44, 'Điện thoại Xiaomi Redmi Note 12 Pro 5G', 'Xiaomi Redmi Note 12 Pro 5G có kiểu dáng tổng thể khá hợp thời và trẻ trung với các phiên bản màu sắc lần lượt là: Xanh, Trắng và Đen. Máy sở hữu mặt lưng bằng chất liệu kính và khung viền vuông vức từ nhựa, hơi bo cong nhẹ hứa hẹn sẽ mang đến trải nghiệm cầm nắm dễ chịu, thoải mái trong quá trình sử dụng.', 9490000, 'Android 12', 4, 4, 0, 4, NULL, NULL),
(45, 'Điện thoại Samsung Galaxy A53 5G 128GB', 'Máy trang bị tấm nền Super AMOLED với kích thước màn hình lên đến 6.5 inch mang đến hình ảnh đầy màu sắc, độ tương phản cao, tối ưu năng lượng tiêu hao và không gian hiển thị đầy đủ, bao quát.', 8490000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(46, 'Điện thoại OPPO Reno8 T', 'Chiếc điện thoại OPPO này sở hữu một tấm nền AMOLED với ưu điểm tái hiện màu sắc rực rỡ, nội dung có chiều sâu cùng khả năng tối ưu điện năng cực tốt, nhờ vậy mà máy có thể trở thành một cái tên rất phù hợp cho những ai đang mong muốn tìm mua một thiết bị để phục vụ cho việc giải trí, xem phim thường xuyên cùng mức giá bán hợp lý.', 8490000, 'Android 13', 3, 4, 0, 3, NULL, NULL),
(47, 'Điện thoại Samsung Galaxy M53', 'Samsung đã trình làng Galaxy M53 với ba phiên bản màu vô cùng đẹp mắt như mình đang cầm trên tay, với tone màu có hơi sẫm đi một tí làm toát lên một vẻ huyền bí đầy cuốn hút và thanh lịch.', 8290000, 'Android 12', 2, 4, 0, 2, NULL, NULL),
(48, 'Điện thoại Samsung Galaxy A34 5G 128GB', 'Với thiết kế đẹp và hiện đại, Galaxy A34 5G có mặt lưng nhẵn làm từ nhựa cao cấp và cụm camera được bố trí đối xứng theo một hàng dọc đầy bắt mắt. Nhờ sử dụng vật liệu nhựa giúp máy trở nên nhẹ hơn và cảm thấy thoải mái khi cầm nắm.', 7790000, 'Android 13', 2, 3, 0, 2, NULL, NULL),
(49, 'Điện thoại realme 9 Pro+ 5G', 'realme 9 Pro+ 5G với thiết kế Light Shift trên phiên bản Lam Hừng Đông hoàn toàn mới, có thể thay đổi màu từ xanh lam nhạt sang đỏ khi tiếp xúc với ánh sáng mặt trời đẹp tựa như cảnh bình minh. Còn một phiên bản màu khác là Lục Cực Quang cũng cực kỳ đẹp mắt.', 7690000, 'Android 12', 6, 3, 0, 6, NULL, NULL),
(50, 'Điện thoại OPPO Reno7 Z 5G', 'Điện thoại OPPO Reno7 Z 5G có khung viền vát phẳng, vuông vức trendy làm cho máy toát lên nét hiện đại và năng động. Bốn góc được bo cong mềm mại tạo cảm giác thoải mái và nhẹ nhàng (chỉ 173 g). Với thiết kế nguyên khối làm tổng thể máy trở nên cực kỳ chắc chắn, không chỉ đẹp mà còn tăng độ bền.', 7490000, 'Android 11', 3, 3, 0, 3, NULL, NULL),
(51, 'Điện thoại Samsung Galaxy A33 5G 6GB', 'Galaxy A33 có cạnh viền được chế tạo từ nhựa nhằm tối ưu khối lượng, mang lại cảm giác cầm nắm nhẹ nhàng, các cạnh được bo cong mềm mại giúp mình sử dụng lâu dài mà không thấy xuất hiện tình trạng cấn tay.', 6290000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(52, 'Điện thoại OPPO A77s', 'OPPO A77s là điện thoại RAM 8 GB, với phiên bản phần mềm được cập nhật từ tháng 11/2022 thì máy có khả năng mở rộng RAM lên đến 8 GB (thay vì 5 GB như lúc vừa ra mắt) mang lại dung lượng RAM hàng đầu phân khúc, với thông số này thì máy sẽ mang lại sự ổn định đối với hầu hết các tác vụ đa nhiệm dù là nặng nhất.', 6290000, 'Android 12', 3, 3, 0, 3, NULL, NULL),
(53, 'Điện thoại OPPO A96', 'Ở lần ra mắt này, OPPO đã trình làng A96 với hai phiên bản màu sắc đó chính là đen và hồng. Cả hai màu đều được hoàn thiện phần mặt lưng với vật liệu chính là thủy tinh hữu cơ, cùng với đó là công nghệ OPPO Glow độc quyền giúp thiết bị toát lên một vẻ ngoài sang trọng hơn. Phiên bản trên tay mình chính là màu đen huyền có thể chuyển màu đậm dần theo từng góc độ ánh sáng khác nhau.', 6190000, 'Android 11', 3, 3, 0, 3, NULL, NULL),
(54, 'Điện thoại Xiaomi Redmi Note 12 8GB', 'Redmi Note 12 sở hữu cho mình một dáng vẻ vuông vắn đầy thời thượng, các góc bo tròn cùng mặt lưng và bộ khung vát phẳng tạo nên nên một cái nhìn hiện đại và cực kỳ trẻ trung. Hơn hết, màu sắc cũng chính là điều góp phần làm cho chiếc máy trở nên thu hút với 3 tone màu hiện đại là: Xám, Xanh Dương và Xanh Lá.', 5790000, 'Android 13', 4, 3, 0, 4, NULL, NULL),
(55, 'Điện thoại Samsung Galaxy A23 5G 4GB', 'A23 sở hữu cho mình con chip Snapdragon 695 với xung nhịp tối đa đạt đến 2.2 GHz, kết hợp cùng nền tảng mạng công nghệ 5G tiên tiến mang đến khả năng làm việc tối ưu với mọi tác vụ trong cuộc sống.', 5690000, 'Android 12', 2, 3, 0, 2, NULL, NULL),
(56, 'Điện thoại OPPO A95', 'OPPO A95 có thiết kế trẻ trung hiện đại với công nghệ phủ màu độc quyền OPPO. Nó mềm mại mượt mà, chống mài mòn và chống bám vân tay một cách hiệu quả.', 5490000, 'Android 11', 3, 3, 0, 3, NULL, NULL),
(57, 'Điện thoại Vivo V23e', 'Vivo V23e vẫn giữ đặc điểm nổi bật của Vivo V Series với thiết kế mỏng 7.36 mm ấn tượng (ở phiên bản màu đen). Viền màn hình 2 cạnh bên có độ mỏng ở mức vừa phải, tuy nhiên thì phần cạnh dưới thì có dày hơn một chút.', 5490000, 'Android 11', 5, 3, 0, 5, NULL, NULL),
(58, 'Điện thoại Xiaomi Redmi Note 11 Pro', 'Điểm nổi bật ở phần thiết kế của Redmi Note 11 Pro chính là cụm camera khá lớn và lồi so với mặt lưng, mặt lưng có chất liệu bằng kính đã được làm phẳng đi. Khung viền bằng nhựa cũng được bo tròn và vát phẳng rất liền mạch, mức độ hoàn thiện tốt, không có hiện tượng ọp ẹp khi mình sử dụng chiếc máy này..', 5390000, 'Android 11', 4, 3, 0, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram_sizes`
--

DROP TABLE IF EXISTS `ram_sizes`;
CREATE TABLE IF NOT EXISTS `ram_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ram_sizes`
--

INSERT INTO `ram_sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '2 GB', NULL, NULL),
(2, '3 GB', NULL, NULL),
(3, '4 GB', NULL, NULL),
(4, '6 GB', NULL, NULL),
(5, '8 GB', NULL, NULL),
(7, '12f', '2023-11-17 00:36:14', '2023-11-17 00:36:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `review_product_id_foreign` (`product_id`),
  KEY `review_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `comment`, `rating`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sản phẩm ok', 3, 2, 43, '2023-11-22 23:28:06', '2023-11-22 23:28:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `numberPhone`, `avatar`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Trí', '1234567890', 'training_laravel (1).sql', 'dragonno005@gmail.com', NULL, '$2y$10$U6ooY2vsQrbTCS2kWv/EF.mDpOIg3obGhBq/qU9YZYI8.g27W/zeO', 'user', NULL, '2023-05-04 07:18:25', '2023-05-04 07:18:25'),
(2, 'abcd', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'tri@gmail.com', NULL, '$2y$10$DEJKAu/IVVVnBGUtKiVMqOh1eYhvg2wBl5wYaXzbIzGza8Xpe4/6a', 'user', NULL, '2023-05-15 00:51:36', '2023-05-15 00:51:36'),
(3, 'nguyen van c', '1234657890', 'resgiter.jpg', 'abc@gmail.com', NULL, '$2y$10$IcPcYr5d7ApJQS6hFUTxlubkc/zMupGrP9yA8Tvi/DIcuy/fKFuIS', 'user', NULL, '2023-05-17 01:33:10', '2023-05-17 01:33:10'),
(14, 'user', '0984233242', 'uptoload.jpg', 'quy1f@gmail.com', NULL, '$2y$10$KKtD.E2xJZTf7OvwUE5WPemSbCdTxsE3muIhHStUpaEeSnK/ctHgi', 'user', NULL, '2023-11-17 00:32:53', '2023-11-17 00:32:53'),
(15, 'user4', '0984233242', 'uptoload.jpg', 'quy1@gmail.com', NULL, '$2y$10$U.l4763nxyf8lGGoPZfTWeioEuRd0DOZsmZo2EuFU9h2oJZRw4aLi', 'user', NULL, '2023-11-17 00:34:50', '2023-11-17 00:34:50'),
(13, 'user', '0984233242', 'screencapture-quanquy-id-vn-2023-08-21-11_50_08.jpg', 'quyf1@gmail.com', NULL, '$2y$10$UvmaJZTkQ/IKlCRIV4dd1.vW0Ysg/0BGyElq02WajVfVZhFGz206u', 'user', NULL, '2023-11-17 00:32:12', '2023-11-17 00:32:12'),
(16, 'user123', '0984233242', 'big-data-co-o-dau-maychusaigon.jpg', 'quy@gmail.com', NULL, '$2y$10$QhFmR417ikx3KQfeaYy81e8Nldz6Zi3YTKYK6ocs3o2XuK38PYWy2', 'user', NULL, '2023-11-17 00:35:26', '2023-11-17 00:35:26'),
(17, 'user', '0984233242', 'uptoload.jpg', '1243545@gmail.com', NULL, '$2y$10$dSRpYA6VDxZGChqauPgdEu8wR7rl3Q98WFRQgr/AMb0iab2SY2/T2', 'admin', NULL, '2023-11-17 01:33:19', '2023-11-17 01:33:19'),
(18, 'user123455667', '0984233242', 'big-data-co-o-dau-maychusaigon.jpg', 'quy1212@gmail.com', NULL, '$2y$10$5DgM427N12/6taYn/O4BTOOr7qu.zkTe59kHHG2VrgHt1YUKe/F7W', 'admin', NULL, '2023-11-17 01:34:43', '2023-11-17 01:34:43'),
(27, 'Nguyễn Minh Tâm', '1234567890', 'C:\\Users\\ACER\\AppData\\Local\\Temp\\phpD9B0.tmp', 'dragonno0052121321321@gmail.com', NULL, '$2y$10$GZBJwRRLKW619jJMKSq.OuczTV4fteKTfbs6u96KEcqagJUMAd9US', 'admin', NULL, '2023-11-17 04:59:08', '2023-11-17 04:59:08'),
(28, 'abcd', '1234567890', 'C:\\Users\\ACER\\AppData\\Local\\Temp\\phpB566.tmp', 'dragonno005fvbkfbvdsv@gmail.com', NULL, '$2y$10$vbglIHZVYg225800lmrUz.SJJ4o7JufAFnGmiZMDVZwQhCE06d/ku', 'admin', NULL, '2023-11-17 05:01:10', '2023-11-17 05:01:10'),
(29, 'abcd', '1234567890', 'C:\\Users\\ACER\\AppData\\Local\\Temp\\php1E3E.tmp', 'dragonno005amaaa@gmail.com', NULL, '$2y$10$zKsuL06sgQWuhtX4B0Zxbu/MYF9czhqH56aVFMNI3pbzxLCJhN8M6', 'admin', NULL, '2023-11-17 05:02:42', '2023-11-17 05:02:42'),
(30, 'abc', '1234567890', 'C:\\Users\\ACER\\AppData\\Local\\Temp\\php73DF.tmp', 'dragonno005kjfbdjhbg@gmail.com', NULL, '$2y$10$zRXLPuNFA2r8dmO7b8do6OI47KqlYRa94vL8h0Wvnktkyi.Dixm/G', 'admin', NULL, '2023-11-17 05:10:43', '2023-11-17 05:10:43'),
(31, 'abcd', '1234567890', 'C:\\Users\\ACER\\AppData\\Local\\Temp\\php5F2A.tmp', 'dragonno005dkvbjv@gmail.com', NULL, '$2y$10$Rm9kH4pqcA7RzKMTgWrknup/2Cc2cf8KhrEB3xTF15ttljBwUKnUG', 'user', NULL, '2023-11-17 05:22:38', '2023-11-17 05:22:38'),
(32, 'abcd', '1234567890', 'dieu-hoa-wf-09-1.jpg', 'dragonno005cdnvkdsvs@gmail.com', NULL, '$2y$10$1BWEeGHE.3MAQhaPSLvkuOHAW/uwa1IFSxa.7wpznrMWMjUF9YitC', 'user', NULL, '2023-11-17 05:25:02', '2023-11-17 05:25:02'),
(33, 'abcd', '1234567890', '5-scaled.jpg', 'dragonno005123456@gmail.com', NULL, '$2y$10$lG64NoNn1bECqq8bK2Vp5uNl6WmAUxQESDb3Xf.oQBH8UukGR2Kty', 'admin', NULL, '2023-11-17 05:26:54', '2023-11-17 05:26:54'),
(34, 'abcd', '1234567890', 'uptoload.jpg', 'dragonno005123456789@gmail.com', NULL, '$2y$10$dAPPSYYWjJumGbXA7aFiKO5.JfkAN1m7rXHm/RDerYP9BnzeUwq3S', 'admin', NULL, '2023-11-17 05:31:23', '2023-11-17 05:31:23'),
(35, 'abcd', '1234567890', 'dieu-hoa-wf-09-1.jpg', 'dragonno005123654@gmail.com', NULL, '$2y$10$WO23nHvLXP/yyA7K5krgp./7CPhW52VRSPtmgxUAGs5wMI80oiEVS', 'user', NULL, '2023-11-17 05:35:43', '2023-11-17 05:35:43'),
(36, 'abcd', '1234567890', '5-scaled.jpg', 'dragonno0052@gmail.com', NULL, '$2y$10$SFusYKfPh59QeGvjdjJISOoTlv31.80EphGFt0wGmtWoWq3RAkB0W', 'user', NULL, '2023-11-17 05:38:11', '2023-11-17 05:38:11'),
(37, 'abcd', '1234567890', 'vector-tattoo-studio-logo-template-cool-retro-styled-emblem-eps-105373395 (2).jpg', 'dragonno002@gmail.com', NULL, '$2y$10$6/uUOuVuscUla4j.nLhkBu4FAqQb0fk0xkVNF0LoKWt/CppK9If6W', 'user', NULL, '2023-11-17 08:14:32', '2023-11-17 08:14:32'),
(38, 'abcd', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'dragonno0051@gmail.com', NULL, '$2y$10$C0iEfqfm8c8xptpRO9xl2O08AS.KFOUlVy7OTA2pmmQUlJcqFHfkC', 'admin', NULL, '2023-11-17 08:22:02', '2023-11-17 08:22:02'),
(39, 'abcd123456789', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'dragonno003@gmail.com', NULL, '$2y$10$tWSsncn3Lun1B.l9FoUef.sPU97UqYjOGbFp.Wk4LMVMvmhUDjLf6', 'admin', NULL, '2023-11-17 08:23:07', '2023-11-17 08:23:07'),
(40, 'admin', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'dragonno001@gmail.com', NULL, '$2y$10$ug6X1UzhIzqI00rkX7ZIzO/bm7ZGwAJYHNiG9VvpyhNCaFOl95NI6', 'admin', NULL, '2023-11-17 08:26:17', '2023-11-17 08:26:17'),
(41, 'abcd', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'dragonno0011@gmail.com', NULL, '$2y$10$T3ly8pt6SaG/8JthphDI4er1Eu4NIGc46ggaL9w66Mhu2qcGCJdVy', 'user', NULL, '2023-11-17 08:32:40', '2023-11-17 08:32:40'),
(42, 'admin1', '1234567890', 'sunset-in-new-york-city-hinh-nen-2560x2048_33.jpg', 'admin@gmail.com', NULL, '$2y$10$CV/GKTJLyPl0hahenou9Bu48DDptJfAgeYDJX87abPAxgw7Nevb5m', 'admin', NULL, '2023-11-17 08:34:58', '2023-11-17 08:34:58'),
(43, 'abcd', '1234567890', 'dieu-hoa-wf-09-1.jpg', 'tri1@gmail.com', NULL, '$2y$10$CXBwrctEqSSAx.rdgCj.zO91FlNJh3YOmstf2JeXxsgEaDSmm71xa', 'user', NULL, '2023-11-22 23:26:32', '2023-11-22 23:26:32'),
(44, 'pham huu ky', '0111111111111111111111111', 'localhost-EStore (3) (1).jpeg', 'phamhuuky0209@gmail.com', NULL, '$2y$10$okKCH3UAJGy1My1aNMYCSuhs761jdT5P4AY/jDs6iZLLjaBhU8hB6', 'user', NULL, '2023-11-23 00:14:03', '2023-11-23 00:14:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website_visits`
--

DROP TABLE IF EXISTS `website_visits`;
CREATE TABLE IF NOT EXISTS `website_visits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `website_visits_visit_date_unique` (`visit_date`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `website_visits`
--

INSERT INTO `website_visits` (`id`, `visit_date`, `count`, `created_at`, `updated_at`) VALUES
(1, '2023-08-20', 17, '2023-08-20 08:47:19', '2023-08-20 11:13:26'),
(2, '2023-08-21', 50, '2023-08-21 00:53:43', '2023-08-21 10:42:41'),
(3, '2023-08-22', 32, '2023-08-21 20:27:31', '2023-08-22 04:50:57'),
(4, '2023-08-23', 149, '2023-08-23 00:42:48', '2023-08-23 16:33:57'),
(5, '2023-08-24', 220, '2023-08-23 17:40:42', '2023-08-24 15:06:26'),
(6, '2023-08-25', 170, '2023-08-24 17:37:11', '2023-08-25 10:58:41'),
(7, '2023-08-26', 68, '2023-08-25 18:19:31', '2023-08-26 12:25:13'),
(8, '2023-08-27', 28, '2023-08-26 23:13:56', '2023-08-27 13:53:27'),
(9, '2023-08-28', 18, '2023-08-27 17:54:34', '2023-08-28 13:20:37'),
(10, '2023-08-29', 127, '2023-08-28 17:59:08', '2023-08-29 16:49:45'),
(11, '2023-08-30', 36, '2023-08-29 18:33:12', '2023-08-30 09:05:09'),
(12, '2023-08-31', 16, '2023-08-30 18:54:04', '2023-08-31 02:38:33'),
(13, '2023-09-01', 13, '2023-08-31 19:45:39', '2023-09-01 11:44:44'),
(14, '2023-09-02', 7, '2023-09-02 01:37:52', '2023-09-02 16:04:01'),
(15, '2023-09-03', 56, '2023-09-02 17:33:36', '2023-09-03 16:21:05'),
(16, '2023-09-04', 39, '2023-09-03 19:29:51', '2023-09-04 10:38:08'),
(17, '2023-09-05', 11, '2023-09-05 05:46:24', '2023-09-05 12:44:35'),
(18, '2023-09-06', 7, '2023-09-05 19:48:27', '2023-09-06 08:53:35'),
(19, '2023-09-07', 18, '2023-09-06 18:42:13', '2023-09-07 12:09:45'),
(20, '2023-09-08', 9, '2023-09-07 21:17:45', '2023-09-08 13:23:00'),
(21, '2023-09-09', 6, '2023-09-08 17:50:09', '2023-09-09 03:24:46'),
(22, '2023-09-10', 3, '2023-09-10 01:01:49', '2023-09-10 09:29:22'),
(23, '2023-09-11', 14, '2023-09-10 18:44:09', '2023-09-11 13:47:49'),
(24, '2023-09-12', 4, '2023-09-11 23:28:44', '2023-09-12 08:37:09'),
(25, '2023-09-13', 9, '2023-09-13 02:59:23', '2023-09-13 13:06:02'),
(26, '2023-09-14', 5, '2023-09-13 17:46:29', '2023-09-14 03:42:10'),
(27, '2023-09-15', 12, '2023-09-14 21:04:21', '2023-09-15 07:32:15'),
(28, '2023-09-16', 4, '2023-09-16 02:00:46', '2023-09-16 11:04:48'),
(29, '2023-09-17', 3, '2023-09-17 01:59:30', '2023-09-17 10:43:26'),
(30, '2023-09-18', 28, '2023-09-17 18:59:06', '2023-09-18 13:47:29'),
(31, '2023-09-19', 12, '2023-09-18 18:29:08', '2023-09-19 07:13:26'),
(32, '2023-09-20', 10, '2023-09-19 18:00:56', '2023-09-20 07:09:49'),
(33, '2023-09-21', 50, '2023-09-20 18:50:23', '2023-09-21 08:39:15'),
(34, '2023-09-22', 13, '2023-09-21 21:00:43', '2023-09-22 07:33:38'),
(35, '2023-09-23', 7, '2023-09-22 23:08:59', '2023-09-23 03:19:47'),
(36, '2023-09-24', 2, '2023-09-24 00:21:30', '2023-09-24 01:26:20'),
(37, '2023-09-25', 6, '2023-09-25 09:50:18', '2023-09-25 11:41:04'),
(38, '2023-09-26', 39, '2023-09-25 18:56:00', '2023-09-26 10:12:57'),
(39, '2023-09-27', 11, '2023-09-26 17:38:02', '2023-09-27 14:53:35'),
(40, '2023-09-28', 113, '2023-09-27 17:21:19', '2023-09-28 15:52:47'),
(41, '2023-09-29', 17, '2023-09-28 18:52:20', '2023-09-29 05:58:47'),
(42, '2023-09-30', 73, '2023-09-29 19:24:46', '2023-09-30 16:50:50'),
(43, '2023-10-01', 56, '2023-09-30 19:21:37', '2023-10-01 15:35:49'),
(45, '2023-10-02', 37, '2023-10-01 18:32:41', '2023-10-02 13:27:20'),
(50, '2023-10-03', 62, '2023-10-02 20:26:57', '2023-10-03 08:30:24'),
(51, '2023-10-04', 9, '2023-10-03 18:21:49', '2023-10-04 08:01:12'),
(54, '2023-10-05', 52, '2023-10-04 18:49:13', '2023-10-05 12:37:56'),
(56, '2023-10-06', 35, '2023-10-05 17:46:40', '2023-10-06 11:14:04'),
(59, '2023-10-07', 21, '2023-10-06 17:13:20', '2023-10-07 10:54:51'),
(60, '2023-10-08', 6, '2023-10-08 02:08:15', '2023-10-08 11:47:48'),
(62, '2023-10-09', 20, '2023-10-08 18:53:24', '2023-10-09 11:26:46'),
(64, '2023-10-10', 81, '2023-10-09 18:31:36', '2023-10-10 11:29:39'),
(66, '2023-10-11', 30, '2023-10-10 20:01:25', '2023-10-11 11:24:11'),
(67, '2023-10-12', 29, '2023-10-11 18:34:41', '2023-10-12 09:38:26'),
(68, '2023-10-13', 45, '2023-10-12 18:52:07', '2023-10-13 15:24:10'),
(72, '2023-10-14', 9, '2023-10-14 00:31:15', '2023-10-14 14:58:28'),
(73, '2023-10-15', 13, '2023-10-15 05:58:03', '2023-10-15 13:21:14'),
(74, '2023-10-16', 9, '2023-10-15 18:44:23', '2023-10-16 03:02:18'),
(75, '2023-10-17', 14, '2023-10-16 18:40:31', '2023-10-17 12:20:48'),
(76, '2023-10-18', 5, '2023-10-17 23:17:40', '2023-10-18 10:08:47'),
(77, '2023-10-19', 49, '2023-10-18 17:47:31', '2023-10-19 09:44:54'),
(78, '2023-10-20', 67, '2023-10-19 18:15:57', '2023-10-20 16:52:59'),
(79, '2023-10-21', 35, '2023-10-20 18:29:06', '2023-10-21 16:17:58'),
(80, '2023-10-22', 19, '2023-10-21 22:00:29', '2023-10-22 10:36:52'),
(81, '2023-10-23', 8, '2023-10-22 18:03:23', '2023-10-23 01:50:54'),
(82, '2023-10-24', 37, '2023-10-23 18:21:17', '2023-10-24 09:51:05'),
(83, '2023-10-25', 13, '2023-10-24 19:02:03', '2023-10-25 06:41:16'),
(84, '2023-10-26', 20, '2023-10-25 20:13:44', '2023-10-26 16:53:35'),
(86, '2023-10-27', 31, '2023-10-26 18:58:23', '2023-10-27 00:02:35'),
(87, '2023-10-28', 12, '2023-10-27 18:59:53', '2023-10-28 09:34:14'),
(91, '2023-10-29', 13, '2023-10-28 18:53:11', '2023-10-29 15:49:07'),
(92, '2023-10-30', 28, '2023-10-29 18:53:49', '2023-10-30 12:09:48'),
(93, '2023-10-31', 7, '2023-10-30 18:42:04', '2023-10-31 16:00:35'),
(94, '2023-11-01', 23, '2023-10-31 18:08:37', '2023-11-01 15:51:25'),
(95, '2023-11-02', 37, '2023-11-01 19:08:19', '2023-11-02 13:13:05'),
(96, '2023-11-03', 23, '2023-11-02 20:58:00', '2023-11-03 10:05:14'),
(97, '2023-11-04', 14, '2023-11-03 20:06:15', '2023-11-04 16:13:31'),
(98, '2023-11-05', 15, '2023-11-04 18:53:48', '2023-11-05 09:55:44'),
(99, '2023-11-06', 5, '2023-11-05 18:10:18', '2023-11-06 05:03:23'),
(100, '2023-11-07', 16, '2023-11-06 18:52:41', '2023-11-07 06:00:38'),
(101, '2023-11-08', 4, '2023-11-07 18:18:39', '2023-11-08 02:20:27'),
(102, '2023-11-09', 38, '2023-11-08 18:31:42', '2023-11-09 11:23:59'),
(103, '2023-11-10', 8, '2023-11-09 17:40:55', '2023-11-10 00:34:41'),
(104, '2023-11-11', 8, '2023-11-10 19:40:51', '2023-11-11 07:42:30'),
(105, '2023-11-12', 5, '2023-11-11 18:42:10', '2023-11-12 14:46:44'),
(106, '2023-11-13', 32, '2023-11-12 18:56:20', '2023-11-13 15:34:22'),
(107, '2023-11-14', 48, '2023-11-13 18:24:00', '2023-11-14 07:38:25'),
(108, '2023-11-15', 27, '2023-11-14 18:37:22', '2023-11-15 07:13:39'),
(109, '2023-11-16', 47, '2023-11-15 17:51:34', '2023-11-16 13:21:22'),
(110, '2023-11-17', 19, '2023-11-16 18:04:56', '2023-11-17 10:13:54'),
(111, '2023-11-18', 5, '2023-11-17 22:48:39', '2023-11-18 14:03:58'),
(112, '2023-11-19', 10, '2023-11-19 01:17:07', '2023-11-19 15:03:39'),
(113, '2023-11-20', 2, '2023-11-19 20:49:23', '2023-11-20 06:07:51'),
(114, '2023-11-21', 3, '2023-11-20 19:19:00', '2023-11-20 19:56:43'),
(115, '2023-11-22', 3, '2023-11-21 19:46:59', '2023-11-22 05:00:45'),
(116, '2023-11-23', 19, '2023-11-22 18:48:54', '2023-11-23 04:21:14'),
(117, '2023-11-24', 19, '2023-11-23 17:14:20', '2023-11-24 01:32:23'),
(118, '2023-11-25', 10, '2023-11-24 19:39:03', '2023-11-25 04:54:52'),
(119, '2023-11-26', 8, '2023-11-25 20:54:25', '2023-11-26 11:18:39'),
(120, '2023-11-27', 28, '2023-11-26 19:26:42', '2023-11-27 09:23:18'),
(121, '2023-11-28', 24, '2023-11-27 17:45:37', '2023-11-28 15:11:19'),
(122, '2023-11-29', 19, '2023-11-28 18:06:32', '2023-11-29 15:12:45'),
(123, '2023-11-30', 34, '2023-11-29 17:50:51', '2023-11-30 07:45:12'),
(124, '2023-12-01', 66, '2023-11-30 19:27:36', '2023-12-01 11:58:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
