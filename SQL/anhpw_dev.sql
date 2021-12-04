-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2021 lúc 10:07 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `anhpw_dev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user`
--

CREATE TABLE `admin_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AnhLe', 'anhle@gmail.com', NULL, '$2y$10$7CzdQV7yB8llpETBYKVoSezaN0YNAoaKNytyh3pkbEvbbI5zJG.nO', NULL, '2021-11-22 12:52:48', '2021-11-22 12:52:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `total_discount` int(11) NOT NULL DEFAULT 0,
  `total_cost` int(11) NOT NULL DEFAULT 0,
  `total_tax` int(11) NOT NULL DEFAULT 0,
  `shipping_cost` int(11) NOT NULL DEFAULT 0,
  `payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `bill_no`, `total_price`, `total_discount`, `total_cost`, `total_tax`, `shipping_cost`, `payment`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '179be209-43d3-48b7-aebc-186c520df3f0', 2795000, 0, 2795000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 01:51:23', '2021-11-29 01:51:23'),
(2, 'fb4e9ce1-9c54-4a2d-8c74-59257e1d45a3', 778000, 0, 778000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 01:54:53', '2021-11-29 01:54:53'),
(4, '30a41046-0333-4d8e-809c-6d288a2496e2', 2795000, 0, 2795000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 04:46:09', '2021-11-29 04:46:09'),
(12, 'e274676a-ead5-4287-b775-9f32561af44e', 2795000, 0, 2795000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 07:47:47', '2021-11-29 07:47:47'),
(14, '42a9fe08-6354-446e-a0f7-930732b597b1', 3780000, 0, 3780000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 07:58:17', '2021-11-29 07:58:17'),
(15, 'b0b3a5f3-eb89-4643-8aea-cf2008c78506', 10744000, 0, 10744000, 0, 0, 'cash', NULL, 0, 0, '2021-11-29 10:14:17', '2021-11-29 10:14:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_consignees`
--

CREATE TABLE `bill_consignees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_consignees`
--

INSERT INTO `bill_consignees` (`id`, `bill_id`, `fullname`, `email`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ánh', 'anhs1@gmail.com', '092', 'BD1', 'test', '2021-11-29 01:54:55', '2021-11-29 01:54:55'),
(5, 12, 'Bi', 'bi@gmail.com', '091', 'q2', NULL, '2021-11-29 07:47:48', '2021-11-29 07:47:48'),
(7, 14, 'B', 'b@gmail.com', '091', 'q2', NULL, '2021-11-29 07:58:17', '2021-11-29 07:58:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_customers`
--

CREATE TABLE `bill_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_customers`
--

INSERT INTO `bill_customers` (`id`, `bill_id`, `fullname`, `gender`, `phone`, `email`, `province`, `district`, `address`, `note`, `zipcode`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anh', 0, '0909090', 'anh@gmail.com', 109, 10907, 'test', 'qqqqqq', '010011', 0, 0, '2021-11-29 01:51:23', '2021-11-29 01:51:23'),
(2, 2, 'Ánh', 0, '091', 'anhs@gmail.com', 711, 71101, 'BD', NULL, NULL, 0, 0, '2021-11-29 01:54:53', '2021-11-29 01:54:53'),
(4, 4, 'Anh', 0, '090', 'anh@gmail.com', 0, 0, 'qqq', NULL, NULL, 0, 0, '2021-11-29 04:46:09', '2021-11-29 04:46:09'),
(8, 12, 'Anh', 0, '090', 'a@gmail.com', 211, 21107, 'q1', NULL, NULL, 0, 0, '2021-11-29 07:47:48', '2021-11-29 07:47:48'),
(10, 14, 'A', 0, '090', 'a@gmail.com', 107, 10713, 'q1', NULL, NULL, 0, 0, '2021-11-29 07:58:17', '2021-11-29 07:58:17'),
(11, 15, 'Anh', 0, '090', 'a@gmail.com', 103, 10319, 'q1', NULL, NULL, 0, 0, '2021-11-29 10:14:19', '2021-11-29 10:14:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `channel_sale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `devices` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `channel_sale`, `devices`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 01:51:23', '2021-11-29 01:51:23'),
(2, 2, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 01:54:53', '2021-11-29 01:54:53'),
(4, 4, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 04:46:09', '2021-11-29 04:46:09'),
(12, 12, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 07:47:47', '2021-11-29 07:47:47'),
(14, 14, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 07:58:17', '2021-11-29 07:58:17'),
(15, 15, 'Website', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 1, 0, 0, '2021-11-29 10:14:18', '2021-11-29 10:14:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_invoices`
--

CREATE TABLE `bill_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxcode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_invoices`
--

INSERT INTO `bill_invoices` (`id`, `bill_id`, `company`, `taxcode`, `email`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 14, 'C', 'CCCC', 'c@gmail.com', '093', 'ccccccccccccc', NULL, '2021-11-29 07:58:17', '2021-11-29 07:58:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `published_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `priority` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `alias`, `name`, `name_seo`, `description`, `image`, `priority`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'versace', 'Versace', 'Versace', '<p>Được dẫn dắt bởi nh&agrave; thiết kế t&aacute;o bạo v&agrave; c&oacute; ảnh hưởng nhất thế giới, nh&atilde;n hiệu Versace giờ đ&acirc;y đồng nghĩa với sự cao cấp bậc nhất. V&igrave; lẽ đ&oacute;, kh&ocirc;ng hề ngạc nhi&ecirc;n khi c&aacute;c sản phẩm thời trang,&nbsp;<a href=\"https://www.thegioinuochoa.com.vn/\">nước hoa</a>&nbsp;Versace lu&ocirc;n tương xứng với những thiết kế của họ tr&ecirc;n s&agrave;n diễn - tự nhi&ecirc;n v&agrave; tao nh&atilde;, thanh lịch v&agrave; khỏe khoắn, hiện đại v&agrave; nữ t&iacute;nh, gợi cảm v&agrave; quyến rũ. Kể từ khi giới thiệu lọ&nbsp;<a href=\"https://www.thegioinuochoa.com.vn/\">nước hoa</a>&nbsp;Versace đầu ti&ecirc;n v&agrave;o năm 1981, nh&atilde;n hiệu thời trang &Yacute; n&agrave;y lu&ocirc;n bổ sung v&agrave;o bộ sưu tập&nbsp;<a href=\"https://www.thegioinuochoa.com.vn/\">nước hoa</a>&nbsp;của m&igrave;nh những sản phẩm mới để tất cả mọi người c&oacute; thể kho&aacute;c l&ecirc;n m&igrave;nh những phong c&aacute;ch của thời trang Versace: sang trọng, m&ecirc; đắm v&agrave; đầy kho&aacute;i lạc.</p>', 'http://127.0.0.1:8000/userfiles/images/brand/brand%20versace.png', 1, 1, 0, 0, '2021-11-26 04:45:39', '2021-11-26 04:45:39'),
(2, 'orising', 'Orising', 'Orising', '<p>Thương hiệu Orising ra đời năm 1998 tại &Yacute;, chuy&ecirc;n về c&aacute;c sản phẩm chăm s&oacute;c t&oacute;c tự nhi&ecirc;n v&ocirc; c&ugrave;ng được ưa chuộng. Kh&ocirc;ng l&acirc;u sau, Orising tiếp tục ra mắt d&ograve;ng sản phẩm chăm s&oacute;c da chuy&ecirc;n nghiệp mới chống l&atilde;o h&oacute;a cao cấp chứa v&agrave;ng 24K, Ectoin, Protein tơ tằm, Peptide Biomimetic&hellip; với lượng ti&ecirc;u thụ lớn, được đ&aacute;nh gi&aacute; cao tr&ecirc;n to&agrave;n thế giới. Hiện thương hiệu Orising đ&atilde; c&oacute; mặt tại hơn 40 quốc gia như Nga, Ukraine, Thổ Nhĩ Kỳ, Kazakhstan, Saudia Arabia, Kuwait, Singapore, &Uacute;c&hellip; v&agrave; đến nay l&agrave; Việt Nam (do c&ocirc;ng ty Thế Giới Nước Hoa ph&acirc;n phối độc quyền).</p>', 'http://127.0.0.1:8000/userfiles/images/brand/orising.png', 1, 1, 0, 0, '2021-11-26 06:25:22', '2021-11-26 06:25:22'),
(3, 'lange', 'Lange', 'Lange', '<p>Được th&agrave;nh lập v&agrave;o năm 2005, LANG&Eacute; PARIS l&agrave; một c&ocirc;ng ty chuy&ecirc;n về sản phẩm chăm s&oacute;c da v&agrave;&nbsp;<a href=\"https://www.thegioinuochoa.com.vn/\">nước hoa</a>&nbsp;c&oacute; nguồn gốc từ thi&ecirc;n nhi&ecirc;n với 10 d&ograve;ng sản phẩm l&agrave;m đẹp cao cấp. Tất cả c&aacute;c th&agrave;nh phần trong sản phẩm đều được lựa chọn nghi&ecirc;m ngặt nhằm mang lại kết quả tốt nhất v&agrave; được sản xuất tại Thung lũng Mỹ phẩm Ph&aacute;p (French Cosmetic Valley) &ndash; trung t&acirc;m nghi&ecirc;n cứu mỹ phẩm lớn nhất thế giới. C&aacute;c sản phẩm LANG&Eacute; PARIS được kiểm tra trong c&aacute;c điều kiện khắc nghiệt để bảo đảm to&agrave;n diện cho bạn. Đồng thời, c&aacute;c x&eacute;t nghiệm kh&ocirc;ng bao giờ được thực hiện tr&ecirc;n động vật. Việc sử dụng thường xuy&ecirc;n v&agrave; đ&uacute;ng c&aacute;ch c&aacute;c sản phẩm chăm s&oacute;c LANG&Eacute; PARIS sẽ mang lại cho bạn một l&agrave;n da tuyệt vời, khỏe mạnh.</p>', 'http://127.0.0.1:8000/userfiles/images/brand/logo_lange.png', 1, 1, 0, 0, '2021-11-26 06:35:26', '2021-11-26 06:35:26'),
(4, 'yumeisakura', 'Yumeisakura', 'Yumeisakura', '<p>Sau gần một thập kỷ c&oacute; mặt tại Việt Nam, Sakura Beauty Vietnam &ndash; Thương hiệu dược mỹ phẩm Nhật Bản đ&atilde; chiếm được cảm t&igrave;nh của h&agrave;ng triệu phụ nữ Việt nhờ c&aacute;c sản phẩm chất lượng c&ugrave;ng triết l&yacute; l&agrave;m đẹp theo phong c&aacute;ch Nhật Bản. Để đ&aacute;nh dấu chặng đường th&agrave;nh c&ocirc;ng đ&oacute;, năm 2019, Sakura Beauty Vietnam mang đến cho phụ nữ Việt một thương hiệu chăm s&oacute;c sắc đẹp to&agrave;n diện, hiện đại, trẻ trung v&agrave; thời thượng hơn mang t&ecirc;n YumeiSakura. YumeiSakura kho&aacute;c tr&ecirc;n m&igrave;nh tất cả niềm tin, kh&aacute;t vọng v&agrave; cảm x&uacute;c ẩn chứa s&acirc;u trong t&acirc;m tư phụ nữ hiện đại với th&ocirc;ng điệp &ldquo;Make Yu Up&rdquo;, mang lại n&eacute;t bừng s&aacute;ng, xinh đẹp v&agrave; rạng rỡ ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n, h&ograve;a quyện cảm x&uacute;c s&acirc;u lắng trong t&acirc;m hồn khiến người phụ nữ lu&ocirc;n tự tin thể hiện c&aacute; t&iacute;nh.</p>', 'http://127.0.0.1:8000/userfiles/images/brand/sakura.png', 1, 1, 0, 0, '2021-11-26 06:42:51', '2021-11-26 06:42:51'),
(5, 'moi', 'M.O.I', 'M.O.I', NULL, 'http://127.0.0.1:8000/userfiles/images/brand/moi.png', 1, 1, 0, 0, '2021-11-26 06:45:00', '2021-11-26 06:45:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capacities`
--

CREATE TABLE `capacities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `capacities`
--

INSERT INTO `capacities` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Eau de parfume', 1, 0, 0, '2021-11-26 03:47:48', '2021-11-26 03:47:48'),
(2, 'Eau de toilette', 1, 0, 0, '2021-11-26 03:50:39', '2021-11-26 03:50:39'),
(3, 'null', 1, 0, 0, '2021-11-26 03:50:49', '2021-11-26 03:50:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `big_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_seo`, `alias`, `description`, `image`, `big_thumb`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Perfume', 'Perfume', 'perfume', NULL, 'userfiles/images/category/2021/11/1637650909.5236.jpg', 'userfiles/images/category_big_thumb/2021/11/1637650909.5236.jpg', 1, 0, 0, '2021-11-23 06:52:42', '2021-11-23 07:01:50'),
(2, 'Comestic', 'Comestic', 'comestic', NULL, 'userfiles/images/category/2021/11/1637651288.3163.png', 'userfiles/images/category_big_thumb/2021/11/1637651288.3163.png', 1, 0, 0, '2021-11-23 07:07:05', '2021-11-23 07:08:11'),
(3, 'Accessory', 'Accessory', 'accessory', NULL, 'userfiles/images/category/2021/11/1637651266.035.jpg', 'userfiles/images/category_big_thumb/2021/11/1637651266.035.jpg', 1, 0, 0, '2021-11-23 07:07:46', '2021-11-23 07:07:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name`, `note`, `status`, `created_at`, `updated_at`) VALUES
(10101, 101, 'Quận Ba Đình', NULL, 1, NULL, NULL),
(10103, 101, 'Quận Tây Hồ', NULL, 1, NULL, NULL),
(10105, 101, 'Quận Hoàn Kiếm', NULL, 1, NULL, NULL),
(10106, 101, 'Quận Long Biên', NULL, 1, NULL, NULL),
(10107, 101, 'Quận Hai Bà Trưng', NULL, 1, NULL, NULL),
(10108, 101, 'Quận Hoàng Mai', NULL, 1, NULL, NULL),
(10109, 101, 'Quận Đống Đa', NULL, 1, NULL, NULL),
(10111, 101, 'Quận Thanh Xuân', NULL, 1, NULL, NULL),
(10113, 101, 'Quận Cầu Giấy', NULL, 1, NULL, NULL),
(10115, 101, 'Huyện Sóc Sơn', NULL, 1, NULL, NULL),
(10117, 101, 'Huyện Đông Anh', NULL, 1, NULL, NULL),
(10119, 101, 'Huyện Gia Lâm', NULL, 1, NULL, NULL),
(10123, 101, 'Huyện Thanh Trì', NULL, 1, NULL, NULL),
(10125, 101, 'Huyện Mê Linh', NULL, 1, NULL, NULL),
(10127, 101, 'Quận Hà Đông', NULL, 1, NULL, NULL),
(10129, 101, 'Thị xã Sơn Tây', NULL, 1, NULL, NULL),
(10131, 101, 'Huyện Phúc Thọ', NULL, 1, NULL, NULL),
(10133, 101, 'Huyện Đan Phượng', NULL, 1, NULL, NULL),
(10135, 101, 'Huyện Thạch Thất', NULL, 1, NULL, NULL),
(10137, 101, 'Huyện Hoài Đức', NULL, 1, NULL, NULL),
(10139, 101, 'Huyện Quốc Oai', NULL, 1, NULL, NULL),
(10141, 101, 'Huyện Thanh Oai', NULL, 1, NULL, NULL),
(10143, 101, 'Huyện Thường Tín', NULL, 1, NULL, NULL),
(10145, 101, 'Huyện Mỹ Đức', NULL, 1, NULL, NULL),
(10147, 101, 'Huyện ứng Hòa', NULL, 1, NULL, NULL),
(10149, 101, 'Huyện Phú Xuyên', NULL, 1, NULL, NULL),
(10151, 101, 'Huyện Ba Vì', NULL, 1, NULL, NULL),
(10153, 101, 'Huyện Chương Mỹ', NULL, 1, NULL, NULL),
(10301, 103, 'Quận Hồng Bàng', NULL, 1, NULL, NULL),
(10303, 103, 'Quận Ngô Quyền', NULL, 1, NULL, NULL),
(10304, 103, 'Quận Hải An', NULL, 1, NULL, NULL),
(10305, 103, 'Quận Lê Chân', NULL, 1, NULL, NULL),
(10307, 103, 'Quận Kiến An', NULL, 1, NULL, NULL),
(10309, 103, 'Quận Đồ Sơn', NULL, 1, NULL, NULL),
(10311, 103, 'Huyện Thuỷ Nguyên', NULL, 1, NULL, NULL),
(10313, 103, 'Huyện An Dương', NULL, 1, NULL, NULL),
(10315, 103, 'Huyện An Lão', NULL, 1, NULL, NULL),
(10317, 103, 'Huyện Kiến Thuỵ', NULL, 1, NULL, NULL),
(10319, 103, 'Huyện Tiên Lãng', NULL, 1, NULL, NULL),
(10321, 103, 'Huyện Vĩnh Bảo', NULL, 1, NULL, NULL),
(10323, 103, 'Huyện Cát Hải', NULL, 1, NULL, NULL),
(10325, 103, 'Huyện Bạch Long Vĩ', NULL, 1, NULL, NULL),
(10327, 103, 'Quận Dương Kinh', NULL, 1, NULL, NULL),
(10701, 107, 'Thành phố Hải Dương', NULL, 1, NULL, NULL),
(10703, 107, 'Huyện Chí Linh', NULL, 1, NULL, NULL),
(10705, 107, 'Huyện Nam Sách', NULL, 1, NULL, NULL),
(10707, 107, 'Huyện Thanh Hà', NULL, 1, NULL, NULL),
(10709, 107, 'Huyện Kinh Môn', NULL, 1, NULL, NULL),
(10711, 107, 'Huyện Kim Thành', NULL, 1, NULL, NULL),
(10713, 107, 'Huyện Gia Lộc', NULL, 1, NULL, NULL),
(10715, 107, 'Huyện Tứ Kỳ', NULL, 1, NULL, NULL),
(10717, 107, 'Huyện Cẩm Giàng', NULL, 1, NULL, NULL),
(10719, 107, 'Huyện Bình Giang', NULL, 1, NULL, NULL),
(10721, 107, 'Huyện Thanh Miện', NULL, 1, NULL, NULL),
(10723, 107, 'Huyện Ninh Giang', NULL, 1, NULL, NULL),
(10901, 109, 'Thành phố Hưng Yên', NULL, 1, NULL, NULL),
(10903, 109, 'Huyện Mỹ Hào', NULL, 1, NULL, NULL),
(10905, 109, 'Huyện Khoái Châu', NULL, 1, NULL, NULL),
(10907, 109, 'Huyện Ân Thi', NULL, 1, NULL, NULL),
(10909, 109, 'Huyện Kim Động', NULL, 1, NULL, NULL),
(10911, 109, 'Huyện Phù Cừ', NULL, 1, NULL, NULL),
(10913, 109, 'Huyện Tiên Lữ', NULL, 1, NULL, NULL),
(10915, 109, 'Huyện Văn Giang', NULL, 1, NULL, NULL),
(10917, 109, 'Huyện Văn Lâm', NULL, 1, NULL, NULL),
(10919, 109, 'Huyện Yên Mỹ', NULL, 1, NULL, NULL),
(11101, 111, 'Thành Phố Phủ Lý', NULL, 1, NULL, NULL),
(11103, 111, 'Huyện Duy Tiên', NULL, 1, NULL, NULL),
(11105, 111, 'Huyện Kim Bảng', NULL, 1, NULL, NULL),
(11107, 111, 'Huyện Lý Nhân', NULL, 1, NULL, NULL),
(11109, 111, 'Huyện Thanh Liêm', NULL, 1, NULL, NULL),
(11111, 111, 'Huyện Bình Lục', NULL, 1, NULL, NULL),
(11301, 113, 'Thành phố Nam Định', NULL, 1, NULL, NULL),
(11303, 113, 'Huyện Vụ Bản', NULL, 1, NULL, NULL),
(11305, 113, 'Huyện Mỹ Lộc', NULL, 1, NULL, NULL),
(11307, 113, 'Huyện ý Yên', NULL, 1, NULL, NULL),
(11309, 113, 'Huyện Nam Trực', NULL, 1, NULL, NULL),
(11311, 113, 'Huyện Trực Ninh', NULL, 1, NULL, NULL),
(11313, 113, 'Huyện Xuân Trường', NULL, 1, NULL, NULL),
(11315, 113, 'Huyện Giao Thủy', NULL, 1, NULL, NULL),
(11317, 113, 'Huyện Nghĩa Hưng', NULL, 1, NULL, NULL),
(11319, 113, 'Huyện Hải Hậu', NULL, 1, NULL, NULL),
(11501, 115, 'Thành phố Thái Bình', NULL, 1, NULL, NULL),
(11503, 115, 'Huyện Quỳnh Phụ', NULL, 1, NULL, NULL),
(11505, 115, 'Huyện Hưng Hà', NULL, 1, NULL, NULL),
(11507, 115, 'Huyện Thái Thụy', NULL, 1, NULL, NULL),
(11509, 115, 'Huyện Đông Hưng', NULL, 1, NULL, NULL),
(11511, 115, 'Huyện Vũ Thư', NULL, 1, NULL, NULL),
(11513, 115, 'Huyện Kiến Xương', NULL, 1, NULL, NULL),
(11515, 115, 'Huyện Tiền Hải', NULL, 1, NULL, NULL),
(11701, 117, 'Thành Phố Ninh Bình', NULL, 1, NULL, NULL),
(11703, 117, 'Thành phố Tam Điệp', NULL, 1, NULL, NULL),
(11705, 117, 'Huyện Nho Quan', NULL, 1, NULL, NULL),
(11707, 117, 'Huyện Gia Viễn', NULL, 1, NULL, NULL),
(11709, 117, 'Huyện Hoa Lư', NULL, 1, NULL, NULL),
(11711, 117, 'Huyện Yên Mô', NULL, 1, NULL, NULL),
(11713, 117, 'Huyện Yên Khánh', NULL, 1, NULL, NULL),
(11715, 117, 'Huyện Kim Sơn', NULL, 1, NULL, NULL),
(20101, 201, 'Thành phố Hà Giang', NULL, 1, NULL, NULL),
(20103, 201, 'Huyện Đồng Văn', NULL, 1, NULL, NULL),
(20105, 201, 'Huyện Mèo Vạc', NULL, 1, NULL, NULL),
(20107, 201, 'Huyện Yên Minh', NULL, 1, NULL, NULL),
(20109, 201, 'Huyện Quản Bạ', NULL, 1, NULL, NULL),
(20111, 201, 'Huyện Bắc Mê', NULL, 1, NULL, NULL),
(20113, 201, 'Huyện Hoàng Su Phì', NULL, 1, NULL, NULL),
(20115, 201, 'Huyện Vị Xuyên', NULL, 1, NULL, NULL),
(20117, 201, 'Huyện Xín Mần', NULL, 1, NULL, NULL),
(20118, 201, 'Huyện Quang Bình', NULL, 1, NULL, NULL),
(20119, 201, 'Huyện Bắc Quang', NULL, 1, NULL, NULL),
(20301, 203, 'Thành phố Cao Bằng', NULL, 1, NULL, NULL),
(20303, 203, 'Huyện Bảo Lạc', NULL, 1, NULL, NULL),
(20305, 203, 'Huyện Hà Quảng', NULL, 1, NULL, NULL),
(20307, 203, 'Huyện Thông Nông', NULL, 1, NULL, NULL),
(20309, 203, 'Huyện Trà Lĩnh', NULL, 1, NULL, NULL),
(20311, 203, 'Huyện Trùng Khánh', NULL, 1, NULL, NULL),
(20313, 203, 'Huyện Nguyên Bình', NULL, 1, NULL, NULL),
(20315, 203, 'Huyện Hoà An', NULL, 1, NULL, NULL),
(20317, 203, 'Huyện Quảng Uyên', NULL, 1, NULL, NULL),
(20318, 203, 'Huyện Phục Hoà', NULL, 1, NULL, NULL),
(20319, 203, 'Huyện Hạ Lang', NULL, 1, NULL, NULL),
(20321, 203, 'Huyện Thạch An', NULL, 1, NULL, NULL),
(20323, 203, 'Huyện Bảo Lâm', NULL, 1, NULL, NULL),
(20501, 205, 'Thành phố Lào Cai', NULL, 1, NULL, NULL),
(20505, 205, 'Huyện Mường Khương', NULL, 1, NULL, NULL),
(20507, 205, 'Huyện Bát Xát', NULL, 1, NULL, NULL),
(20509, 205, 'Huyện Bắc Hà', NULL, 1, NULL, NULL),
(20511, 205, 'Huyện Bảo Thắng', NULL, 1, NULL, NULL),
(20513, 205, 'Huyện Sa Pa', NULL, 1, NULL, NULL),
(20515, 205, 'Huyện Bảo Yên', NULL, 1, NULL, NULL),
(20519, 205, 'Huyện Văn Bàn', NULL, 1, NULL, NULL),
(20521, 205, 'Huyện Si Ma Cai', NULL, 1, NULL, NULL),
(20701, 207, 'Thành Phố Bắc Kạn', NULL, 1, NULL, NULL),
(20703, 207, 'Huyện Ba Bể', NULL, 1, NULL, NULL),
(20704, 207, 'Huyện Pác Nặm', NULL, 1, NULL, NULL),
(20705, 207, 'Huyện Ngân Sơn', NULL, 1, NULL, NULL),
(20707, 207, 'Huyện Chợ Đồn', NULL, 1, NULL, NULL),
(20709, 207, 'Huyện Na Rì', NULL, 1, NULL, NULL),
(20711, 207, 'Huyện Bạch Thông', NULL, 1, NULL, NULL),
(20713, 207, 'Huyện Chợ Mới', NULL, 1, NULL, NULL),
(20901, 209, 'Thành phố Lạng Sơn', NULL, 1, NULL, NULL),
(20903, 209, 'Huyện Tràng Định', NULL, 1, NULL, NULL),
(20905, 209, 'Huyện Văn Lãng', NULL, 1, NULL, NULL),
(20907, 209, 'Huyện Bình Gia', NULL, 1, NULL, NULL),
(20909, 209, 'Huyện Bắc Sơn', NULL, 1, NULL, NULL),
(20911, 209, 'Huyện Văn Quan', NULL, 1, NULL, NULL),
(20913, 209, 'Huyện Cao Lộc', NULL, 1, NULL, NULL),
(20915, 209, 'Huyện Lộc Bình', NULL, 1, NULL, NULL),
(20917, 209, 'Huyện Chi Lăng', NULL, 1, NULL, NULL),
(20919, 209, 'Huyện Đình Lập', NULL, 1, NULL, NULL),
(20921, 209, 'Huyện Hữu Lũng', NULL, 1, NULL, NULL),
(21101, 211, 'Thành phố Tuyên Quang', NULL, 1, NULL, NULL),
(21103, 211, 'Huyện Nà Hang', NULL, 1, NULL, NULL),
(21105, 211, 'Huyện Chiêm Hóa', NULL, 1, NULL, NULL),
(21107, 211, 'Huyện Hàm Yên', NULL, 1, NULL, NULL),
(21109, 211, 'Huyện Yên Sơn', NULL, 1, NULL, NULL),
(21111, 211, 'Huyện Sơn Dương', NULL, 1, NULL, NULL),
(21301, 213, 'Thành phố Yên Bái', NULL, 1, NULL, NULL),
(21303, 213, 'Thị xã Nghĩa Lộ', NULL, 1, NULL, NULL),
(21305, 213, 'Huyện Lục Yên', NULL, 1, NULL, NULL),
(21307, 213, 'Huyện Văn Yên', NULL, 1, NULL, NULL),
(21309, 213, 'Huyện Mù Căng Chải', NULL, 1, NULL, NULL),
(21311, 213, 'Huyện Trấn Yên', NULL, 1, NULL, NULL),
(21313, 213, 'Huyện Yên Bình', NULL, 1, NULL, NULL),
(21315, 213, 'Huyện Văn Chấn', NULL, 1, NULL, NULL),
(21317, 213, 'Huyện Trạm Tấu', NULL, 1, NULL, NULL),
(21501, 215, 'Thành phố Thái Nguyên', NULL, 1, NULL, NULL),
(21503, 215, 'Thành phố Sông Công', NULL, 1, NULL, NULL),
(21505, 215, 'Huyện Định Hóa', NULL, 1, NULL, NULL),
(21507, 215, 'Huyện Võ Nhai', NULL, 1, NULL, NULL),
(21509, 215, 'Huyện Phú Lương', NULL, 1, NULL, NULL),
(21511, 215, 'Huyện Đồng Hỷ', NULL, 1, NULL, NULL),
(21513, 215, 'Huyện Đại Từ', NULL, 1, NULL, NULL),
(21515, 215, 'Huyện Phú Bình', NULL, 1, NULL, NULL),
(21517, 215, 'Thị xã Phổ Yên', NULL, 1, NULL, NULL),
(21701, 217, 'Thành phố Việt Trì', NULL, 1, NULL, NULL),
(21703, 217, 'Thị xã Phú Thọ', NULL, 1, NULL, NULL),
(21705, 217, 'Huyện Đoan Hùng', NULL, 1, NULL, NULL),
(21707, 217, 'Huyện Hạ Hoà', NULL, 1, NULL, NULL),
(21709, 217, 'Huyện Thanh Ba', NULL, 1, NULL, NULL),
(21711, 217, 'Huyện Phù Ninh', NULL, 1, NULL, NULL),
(21713, 217, 'Huyện Cẩm Khê', NULL, 1, NULL, NULL),
(21715, 217, 'Huyện Yên Lập', NULL, 1, NULL, NULL),
(21717, 217, 'Huyện Tam Nông', NULL, 1, NULL, NULL),
(21719, 217, 'Huyện Thanh Sơn', NULL, 1, NULL, NULL),
(21720, 217, 'Huyện Tân Sơn', NULL, 1, NULL, NULL),
(21721, 217, 'Huyện Lâm Thao', NULL, 1, NULL, NULL),
(21723, 217, 'Huyện Thanh Thuỷ', NULL, 1, NULL, NULL),
(21901, 219, 'Thành Phố Vĩnh Yên', NULL, 1, NULL, NULL),
(21902, 219, 'Thị xã Phúc Yên', NULL, 1, NULL, NULL),
(21903, 219, 'Huyện Lập Thạch', NULL, 1, NULL, NULL),
(21904, 219, 'Huyện Tam Đảo', NULL, 1, NULL, NULL),
(21905, 219, 'Huyện Tam Dương', NULL, 1, NULL, NULL),
(21907, 219, 'Huyện Vĩnh Tường', NULL, 1, NULL, NULL),
(21909, 219, 'Huyện Yên Lạc', NULL, 1, NULL, NULL),
(21913, 219, 'Huyện Bình Xuyên', NULL, 1, NULL, NULL),
(21915, 219, 'Huyện Sông Lô', NULL, 1, NULL, NULL),
(22101, 221, 'Thành phố Bắc Giang', NULL, 1, NULL, NULL),
(22103, 221, 'Huyện Yên Thế', NULL, 1, NULL, NULL),
(22105, 221, 'Huyện Tân Yên', NULL, 1, NULL, NULL),
(22107, 221, 'Huyện Lục Ngạn', NULL, 1, NULL, NULL),
(22109, 221, 'Huyện Hiệp Hòa', NULL, 1, NULL, NULL),
(22111, 221, 'Huyện Lạng Giang', NULL, 1, NULL, NULL),
(22113, 221, 'Huyện Sơn Động', NULL, 1, NULL, NULL),
(22115, 221, 'Huyện Lục Nam', NULL, 1, NULL, NULL),
(22117, 221, 'Huyện Việt Yên', NULL, 1, NULL, NULL),
(22119, 221, 'Huyện Yên Dũng', NULL, 1, NULL, NULL),
(22301, 223, 'Thành phố Bắc Ninh', NULL, 1, NULL, NULL),
(22303, 223, 'Huyện Yên Phong', NULL, 1, NULL, NULL),
(22305, 223, 'Huyện Quế Võ', NULL, 1, NULL, NULL),
(22307, 223, 'Huyện Tiên Du', NULL, 1, NULL, NULL),
(22309, 223, 'Huyện Thuận Thành', NULL, 1, NULL, NULL),
(22311, 223, 'Huyện Lương Tài', NULL, 1, NULL, NULL),
(22313, 223, 'Thị xã Từ Sơn', NULL, 1, NULL, NULL),
(22315, 223, 'Huyện Gia Bình', NULL, 1, NULL, NULL),
(22501, 225, 'Thành phố Hạ Long', NULL, 1, NULL, NULL),
(22503, 225, 'Thành phố Cẩm Phả', NULL, 1, NULL, NULL),
(22505, 225, 'Thành phố Uông Bí', NULL, 1, NULL, NULL),
(22507, 225, 'Huyện Bình Liêu', NULL, 1, NULL, NULL),
(22509, 225, 'Thành Phố Móng Cái', NULL, 1, NULL, NULL),
(22511, 225, 'Huyện Hải Hà', NULL, 1, NULL, NULL),
(22513, 225, 'Huyện Tiên Yên', NULL, 1, NULL, NULL),
(22515, 225, 'Huyện Ba Chẽ', NULL, 1, NULL, NULL),
(22517, 225, 'Huyện Vân Đồn', NULL, 1, NULL, NULL),
(22519, 225, 'Huyện Hoành Bồ', NULL, 1, NULL, NULL),
(22521, 225, 'Thị xã Đông Triều', NULL, 1, NULL, NULL),
(22523, 225, 'Huyện Cô Tô', NULL, 1, NULL, NULL),
(22525, 225, 'Huyện Yên Hưng', NULL, 1, NULL, NULL),
(22527, 225, 'Huyện Đầm Hà', NULL, 1, NULL, NULL),
(30101, 301, 'Thành phố Điện Biên Phủ', NULL, 1, NULL, NULL),
(30103, 301, 'Thị xã Mường Lay', NULL, 1, NULL, NULL),
(30104, 301, 'Huyện Mường Nhé', NULL, 1, NULL, NULL),
(30111, 301, 'Huyện Mường Chà', NULL, 1, NULL, NULL),
(30113, 301, 'Huyện Tủa Chùa', NULL, 1, NULL, NULL),
(30115, 301, 'Huyện Tuần Giáo', NULL, 1, NULL, NULL),
(30117, 301, 'Huyện Điện Biên', NULL, 1, NULL, NULL),
(30119, 301, 'Huyện Điện Biên Đông', NULL, 1, NULL, NULL),
(30121, 301, 'Huyện Mường ảng', NULL, 1, NULL, NULL),
(30201, 302, 'Huyện Mường Tè', NULL, 1, NULL, NULL),
(30202, 302, 'Thành phố Lai Châu', NULL, 1, NULL, NULL),
(30203, 302, 'Huyện Phong Thổ', NULL, 1, NULL, NULL),
(30205, 302, 'Huyện Tam Đường', NULL, 1, NULL, NULL),
(30207, 302, 'Huyện Sìn Hồ', NULL, 1, NULL, NULL),
(30209, 302, 'Huyện Than Uyên', NULL, 1, NULL, NULL),
(30211, 302, 'Huyện Tân Uyên', NULL, 1, NULL, NULL),
(30301, 303, 'Thành Phố Sơn La', NULL, 1, NULL, NULL),
(30303, 303, 'Huyện Quỳnh Nhai', NULL, 1, NULL, NULL),
(30305, 303, 'Huyện Mường La', NULL, 1, NULL, NULL),
(30307, 303, 'Huyện Thuận Châu', NULL, 1, NULL, NULL),
(30309, 303, 'Huyện Bắc Yên', NULL, 1, NULL, NULL),
(30311, 303, 'Huyện Phù Yên', NULL, 1, NULL, NULL),
(30313, 303, 'Huyện Mai Sơn', NULL, 1, NULL, NULL),
(30315, 303, 'Huyện Sông Mã', NULL, 1, NULL, NULL),
(30317, 303, 'Huyện Yên Châu', NULL, 1, NULL, NULL),
(30319, 303, 'Huyện Mộc Châu', NULL, 1, NULL, NULL),
(30321, 303, 'Huyện Sốp Cộp', NULL, 1, NULL, NULL),
(30501, 305, 'Thành phố Hòa Bình', NULL, 1, NULL, NULL),
(30503, 305, 'Huyện Đà Bắc', NULL, 1, NULL, NULL),
(30505, 305, 'Huyện Mai Châu', NULL, 1, NULL, NULL),
(30507, 305, 'Huyện Kỳ Sơn', NULL, 1, NULL, NULL),
(30509, 305, 'Huyện Lương Sơn', NULL, 1, NULL, NULL),
(30510, 305, 'Huyện Cao Phong', NULL, 1, NULL, NULL),
(30511, 305, 'Huyện Kim Bôi', NULL, 1, NULL, NULL),
(30513, 305, 'Huyện Tân Lạc', NULL, 1, NULL, NULL),
(30515, 305, 'Huyện Lạc Sơn', NULL, 1, NULL, NULL),
(30517, 305, 'Huyện Lạc Thủy', NULL, 1, NULL, NULL),
(30519, 305, 'Huyện Yên Thủy', NULL, 1, NULL, NULL),
(40101, 401, 'Thành phố Thanh Hóa', NULL, 1, NULL, NULL),
(40103, 401, 'Thị xã Bỉm Sơn', NULL, 1, NULL, NULL),
(40105, 401, 'Thành phố Sầm Sơn', NULL, 1, NULL, NULL),
(40107, 401, 'Huyện Mường Lát', NULL, 1, NULL, NULL),
(40109, 401, 'Huyện Quan Hóa', NULL, 1, NULL, NULL),
(40111, 401, 'Huyện Quan Sơn', NULL, 1, NULL, NULL),
(40113, 401, 'Huyện Bá Thước', NULL, 1, NULL, NULL),
(40115, 401, 'Huyện Cẩm Thủy', NULL, 1, NULL, NULL),
(40117, 401, 'Huyện Lang Chánh', NULL, 1, NULL, NULL),
(40119, 401, 'Huyện Thạch Thành', NULL, 1, NULL, NULL),
(40121, 401, 'Huyện Ngọc Lặc', NULL, 1, NULL, NULL),
(40123, 401, 'Huyện Thường Xuân', NULL, 1, NULL, NULL),
(40125, 401, 'Huyện Như Xuân', NULL, 1, NULL, NULL),
(40127, 401, 'Huyện Như Thanh', NULL, 1, NULL, NULL),
(40129, 401, 'Huyện Vĩnh Lộc', NULL, 1, NULL, NULL),
(40131, 401, 'Huyện Hà Trung', NULL, 1, NULL, NULL),
(40133, 401, 'Huyện Nga Sơn', NULL, 1, NULL, NULL),
(40135, 401, 'Huyện Yên Định', NULL, 1, NULL, NULL),
(40137, 401, 'Huyện Thọ Xuân', NULL, 1, NULL, NULL),
(40139, 401, 'Huyện Hậu Lộc', NULL, 1, NULL, NULL),
(40141, 401, 'Huyện Thiệu Hóa', NULL, 1, NULL, NULL),
(40143, 401, 'Huyện Hoằng Hóa', NULL, 1, NULL, NULL),
(40145, 401, 'Huyện Đông Sơn', NULL, 1, NULL, NULL),
(40147, 401, 'Huyện Triệu Sơn', NULL, 1, NULL, NULL),
(40149, 401, 'Huyện Quảng Xương', NULL, 1, NULL, NULL),
(40151, 401, 'Huyện Nông Cống', NULL, 1, NULL, NULL),
(40153, 401, 'Huyện Tĩnh Gia', NULL, 1, NULL, NULL),
(40301, 403, 'Thành phố Vinh', NULL, 1, NULL, NULL),
(40303, 403, 'Thị xã Cửa Lò', NULL, 1, NULL, NULL),
(40305, 403, 'Huyện Quế Phong', NULL, 1, NULL, NULL),
(40307, 403, 'Huyện Quỳ Châu', NULL, 1, NULL, NULL),
(40309, 403, 'Huyện Kỳ Sơn', NULL, 1, NULL, NULL),
(40311, 403, 'Huyện Quỳ Hợp', NULL, 1, NULL, NULL),
(40313, 403, 'Huyện Nghĩa Đàn', NULL, 1, NULL, NULL),
(40314, 403, 'Thị xã Thái Hoà', NULL, 1, NULL, NULL),
(40315, 403, 'Huyện Tương Dương', NULL, 1, NULL, NULL),
(40317, 403, 'Huyện Quỳnh Lưu', NULL, 1, NULL, NULL),
(40319, 403, 'Huyện Tân Kỳ', NULL, 1, NULL, NULL),
(40321, 403, 'Huyện Con Cuông', NULL, 1, NULL, NULL),
(40323, 403, 'Huyện Yên Thành', NULL, 1, NULL, NULL),
(40325, 403, 'Huyện Diễn Châu', NULL, 1, NULL, NULL),
(40327, 403, 'Huyện Anh Sơn', NULL, 1, NULL, NULL),
(40329, 403, 'Huyện Đô Lương', NULL, 1, NULL, NULL),
(40331, 403, 'Huyện Thanh Chương', NULL, 1, NULL, NULL),
(40333, 403, 'Huyện Nghi Lộc', NULL, 1, NULL, NULL),
(40335, 403, 'Huyện Nam Đàn', NULL, 1, NULL, NULL),
(40337, 403, 'Huyện Hưng Nguyên', NULL, 1, NULL, NULL),
(40501, 405, 'Thành phố Hà Tĩnh', NULL, 1, NULL, NULL),
(40503, 405, 'Thị xã Hồng Lĩnh', NULL, 1, NULL, NULL),
(40505, 405, 'Huyện Nghi Xuân', NULL, 1, NULL, NULL),
(40507, 405, 'Huyện Đức Thọ', NULL, 1, NULL, NULL),
(40509, 405, 'Huyện Hương Sơn', NULL, 1, NULL, NULL),
(40511, 405, 'Huyện Can Lộc', NULL, 1, NULL, NULL),
(40513, 405, 'Huyện Thạch Hà', NULL, 1, NULL, NULL),
(40515, 405, 'Huyện Cẩm Xuyên', NULL, 1, NULL, NULL),
(40517, 405, 'Huyện Hương Khê', NULL, 1, NULL, NULL),
(40519, 405, 'Thị xã Kỳ Anh', NULL, 1, NULL, NULL),
(40521, 405, 'Huyện Vũ Quang', NULL, 1, NULL, NULL),
(40523, 405, 'Huyện Lộc Hà', NULL, 1, NULL, NULL),
(40701, 407, 'Thành phố Đồng Hới', NULL, 1, NULL, NULL),
(40703, 407, 'Huyện Tuyên Hóa', NULL, 1, NULL, NULL),
(40705, 407, 'Huyện Minh Hóa', NULL, 1, NULL, NULL),
(40707, 407, 'Huyện Quảng Trạch', NULL, 1, NULL, NULL),
(40709, 407, 'Huyện Bố Trạch', NULL, 1, NULL, NULL),
(40711, 407, 'Huyện Quảng Ninh', NULL, 1, NULL, NULL),
(40713, 407, 'Huyện Lệ Thủy', NULL, 1, NULL, NULL),
(40901, 409, 'Thành phố Đông Hà', NULL, 1, NULL, NULL),
(40903, 409, 'Thị xã Quảng Trị', NULL, 1, NULL, NULL),
(40905, 409, 'Huyện Vĩnh Linh', NULL, 1, NULL, NULL),
(40907, 409, 'Huyện Gio Linh', NULL, 1, NULL, NULL),
(40909, 409, 'Huyện Cam Lộ', NULL, 1, NULL, NULL),
(40911, 409, 'Huyện Triệu Phong', NULL, 1, NULL, NULL),
(40913, 409, 'Huyện Hải Lăng', NULL, 1, NULL, NULL),
(40915, 409, 'Huyện Hướng Hóa', NULL, 1, NULL, NULL),
(40917, 409, 'Huyện Đa Krông', NULL, 1, NULL, NULL),
(40919, 409, 'Huyện Cồn Cỏ', NULL, 1, NULL, NULL),
(41101, 411, 'Thành phố Huế', NULL, 1, NULL, NULL),
(41103, 411, 'Huyện Phong Điền', NULL, 1, NULL, NULL),
(41105, 411, 'Huyện Quảng Điền', NULL, 1, NULL, NULL),
(41107, 411, 'Thị xã Hương Trà', NULL, 1, NULL, NULL),
(41109, 411, 'Huyện Phú Vang', NULL, 1, NULL, NULL),
(41111, 411, 'Thị xã Hương Thủy', NULL, 1, NULL, NULL),
(41113, 411, 'Huyện Phú Lộc', NULL, 1, NULL, NULL),
(41115, 411, 'Huyện A Lưới', NULL, 1, NULL, NULL),
(41117, 411, 'Huyện Nam Đông', NULL, 1, NULL, NULL),
(50101, 501, 'Quận Hải Châu', NULL, 1, NULL, NULL),
(50103, 501, 'Quận Thanh Khê', NULL, 1, NULL, NULL),
(50105, 501, 'Quận Sơn Trà', NULL, 1, NULL, NULL),
(50107, 501, 'Quận Ngũ Hành Sơn', NULL, 1, NULL, NULL),
(50109, 501, 'Quận Liên Chiểu', NULL, 1, NULL, NULL),
(50111, 501, 'Huyện Hòa Vang', NULL, 1, NULL, NULL),
(50113, 501, 'Huyện Hoàng Sa', NULL, 1, NULL, NULL),
(50115, 501, 'Quận Cẩm Lệ', NULL, 1, NULL, NULL),
(50301, 503, 'Thành phố Tam Kỳ', NULL, 1, NULL, NULL),
(50302, 503, 'Huyện Phú Ninh', NULL, 1, NULL, NULL),
(50303, 503, 'Thành Phố Hội An', NULL, 1, NULL, NULL),
(50304, 503, 'Huyện Tây Giang', NULL, 1, NULL, NULL),
(50305, 503, 'Huyện Đông Giang', NULL, 1, NULL, NULL),
(50307, 503, 'Huyện Đại Lộc', NULL, 1, NULL, NULL),
(50309, 503, 'Thị xã Điện Bàn', NULL, 1, NULL, NULL),
(50311, 503, 'Huyện Duy Xuyên', NULL, 1, NULL, NULL),
(50313, 503, 'Huyện Nam Giang', NULL, 1, NULL, NULL),
(50315, 503, 'Huyện Thăng Bình', NULL, 1, NULL, NULL),
(50317, 503, 'Huyện Quế Sơn', NULL, 1, NULL, NULL),
(50318, 503, 'Huyện Nông Sơn', NULL, 1, NULL, NULL),
(50319, 503, 'Huyện Hiệp Đức', NULL, 1, NULL, NULL),
(50321, 503, 'Huyện Tiên Phước', NULL, 1, NULL, NULL),
(50323, 503, 'Huyện Phước Sơn', NULL, 1, NULL, NULL),
(50325, 503, 'Huyện Núi Thành', NULL, 1, NULL, NULL),
(50327, 503, 'Huyện Bắc Trà My', NULL, 1, NULL, NULL),
(50329, 503, 'Huyện Nam Trà My', NULL, 1, NULL, NULL),
(50501, 505, 'Thành phố Quảng Ngãi', NULL, 1, NULL, NULL),
(50503, 505, 'Huyện Lý Sơn', NULL, 1, NULL, NULL),
(50505, 505, 'Huyện Bình Sơn', NULL, 1, NULL, NULL),
(50507, 505, 'Huyện Trà Bồng', NULL, 1, NULL, NULL),
(50508, 505, 'Huyện Tây Trà', NULL, 1, NULL, NULL),
(50509, 505, 'Huyện Sơn Tịnh', NULL, 1, NULL, NULL),
(50511, 505, 'Huyện Sơn Tây', NULL, 1, NULL, NULL),
(50513, 505, 'Huyện Sơn Hà', NULL, 1, NULL, NULL),
(50515, 505, 'Huyện Tư Nghĩa', NULL, 1, NULL, NULL),
(50517, 505, 'Huyện Nghĩa Hành', NULL, 1, NULL, NULL),
(50519, 505, 'Huyện Minh Long', NULL, 1, NULL, NULL),
(50521, 505, 'Huyện Mộ Đức', NULL, 1, NULL, NULL),
(50523, 505, 'Huyện Đức Phổ', NULL, 1, NULL, NULL),
(50525, 505, 'Huyện Ba Tơ', NULL, 1, NULL, NULL),
(50701, 507, 'Thành phố Qui Nhơn', NULL, 1, NULL, NULL),
(50703, 507, 'Huyện An Lão', NULL, 1, NULL, NULL),
(50705, 507, 'Huyện Hoài Nhơn', NULL, 1, NULL, NULL),
(50707, 507, 'Huyện Hoài Ân', NULL, 1, NULL, NULL),
(50709, 507, 'Huyện Phù Mỹ', NULL, 1, NULL, NULL),
(50711, 507, 'Huyện Vĩnh Thạnh', NULL, 1, NULL, NULL),
(50713, 507, 'Huyện Phù Cát', NULL, 1, NULL, NULL),
(50715, 507, 'Huyện Tây Sơn', NULL, 1, NULL, NULL),
(50717, 507, 'Thị xã An Nhơn', NULL, 1, NULL, NULL),
(50719, 507, 'Huyện Tuy Phước', NULL, 1, NULL, NULL),
(50721, 507, 'Huyện Vân Canh', NULL, 1, NULL, NULL),
(50901, 509, 'Thành phố Tuy Hoà', NULL, 1, NULL, NULL),
(50903, 509, 'Huyện Đồng Xuân', NULL, 1, NULL, NULL),
(50905, 509, 'Thị xã Sông Cầu', NULL, 1, NULL, NULL),
(50907, 509, 'Huyện Tuy An', NULL, 1, NULL, NULL),
(50909, 509, 'Huyện Sơn Hòa', NULL, 1, NULL, NULL),
(50911, 509, 'Huyện Đông Hòa', NULL, 1, NULL, NULL),
(50912, 509, 'Huyện Tây Hoà', NULL, 1, NULL, NULL),
(50913, 509, 'Huyện Sông Hinh', NULL, 1, NULL, NULL),
(50915, 509, 'Huyện Phú Hoà', NULL, 1, NULL, NULL),
(51101, 511, 'Thành phố Nha Trang', NULL, 1, NULL, NULL),
(51103, 511, 'Huyện Vạn Ninh', NULL, 1, NULL, NULL),
(51105, 511, 'Thị xã Ninh Hòa', NULL, 1, NULL, NULL),
(51107, 511, 'Huyện Diên Khánh', NULL, 1, NULL, NULL),
(51109, 511, 'Thành phố Cam Ranh', NULL, 1, NULL, NULL),
(51111, 511, 'Huyện Khánh Vĩnh', NULL, 1, NULL, NULL),
(51113, 511, 'Huyện Khánh Sơn', NULL, 1, NULL, NULL),
(51115, 511, 'Huyện Trường Sa', NULL, 1, NULL, NULL),
(51117, 511, 'Huyện Cam Lâm', NULL, 1, NULL, NULL),
(60101, 601, 'Thành phố Kon Tum', NULL, 1, NULL, NULL),
(60103, 601, 'Huyện Đắk Glei', NULL, 1, NULL, NULL),
(60105, 601, 'Huyện Ngọc Hồi', NULL, 1, NULL, NULL),
(60107, 601, 'Huyện Đắk Tô', NULL, 1, NULL, NULL),
(60108, 601, 'Huyện Kon Rẫy', NULL, 1, NULL, NULL),
(60109, 601, 'Huyện Kon Plông', NULL, 1, NULL, NULL),
(60111, 601, 'Huyện Đắk Hà', NULL, 1, NULL, NULL),
(60113, 601, 'Huyện Sa Thầy', NULL, 1, NULL, NULL),
(60115, 601, 'Huyện Tu Mơ Rông', NULL, 1, NULL, NULL),
(60301, 603, 'Thành phố Pleiku', NULL, 1, NULL, NULL),
(60303, 603, 'Huyện KBang', NULL, 1, NULL, NULL),
(60305, 603, 'Huyện Mang Yang', NULL, 1, NULL, NULL),
(60307, 603, 'Huyện Chư Păh', NULL, 1, NULL, NULL),
(60309, 603, 'Huyện Ia Grai', NULL, 1, NULL, NULL),
(60311, 603, 'Thị xã An Khê', NULL, 1, NULL, NULL),
(60313, 603, 'Huyện Kông Chro', NULL, 1, NULL, NULL),
(60315, 603, 'Huyện Đức Cơ', NULL, 1, NULL, NULL),
(60317, 603, 'Huyện Chư Prông', NULL, 1, NULL, NULL),
(60319, 603, 'Huyện Chư Sê', NULL, 1, NULL, NULL),
(60320, 603, 'Huyện Ia Pa', NULL, 1, NULL, NULL),
(60321, 603, 'Thị xã Ayun Pa', NULL, 1, NULL, NULL),
(60323, 603, 'Huyện Krông Pa', NULL, 1, NULL, NULL),
(60325, 603, 'Huyện Đăk Đoa', NULL, 1, NULL, NULL),
(60327, 603, 'Huyện Đăk Pơ', NULL, 1, NULL, NULL),
(60329, 603, 'Huyện Phú Thiện', NULL, 1, NULL, NULL),
(60501, 605, 'Thành phố Buôn Ma Thuột', NULL, 1, NULL, NULL),
(60503, 605, 'Huyện Ea H\'leo', NULL, 1, NULL, NULL),
(60505, 605, 'Huyện Ea Súp', NULL, 1, NULL, NULL),
(60507, 605, 'Huyện Krông Năng', NULL, 1, NULL, NULL),
(60509, 605, 'Thị Xã Buôn Hồ', NULL, 1, NULL, NULL),
(60511, 605, 'Huyện Buôn Đôn', NULL, 1, NULL, NULL),
(60513, 605, 'Huyện Cư M\'gar', NULL, 1, NULL, NULL),
(60515, 605, 'Huyện Ea Kar', NULL, 1, NULL, NULL),
(60517, 605, 'Huyện M\'Đrắk', NULL, 1, NULL, NULL),
(60519, 605, 'Huyện Krông Pắc', NULL, 1, NULL, NULL),
(60523, 605, 'Huyện Krông A Na', NULL, 1, NULL, NULL),
(60525, 605, 'Huyện Krông Bông', NULL, 1, NULL, NULL),
(60531, 605, 'Huyện Lắk', NULL, 1, NULL, NULL),
(60537, 605, 'Huyện Cư Kuin', NULL, 1, NULL, NULL),
(60539, 605, 'Huyện Krông Búk', NULL, 1, NULL, NULL),
(60603, 606, 'Huyện Cư Jút', NULL, 1, NULL, NULL),
(60605, 606, 'Huyện Krông Nô', NULL, 1, NULL, NULL),
(60607, 606, 'Huyện Đắk Mil', NULL, 1, NULL, NULL),
(60609, 606, 'Huyện Đắk Song', NULL, 1, NULL, NULL),
(60611, 606, 'Huyện Đắk R\'Lấp', NULL, 1, NULL, NULL),
(60613, 606, 'Thị xã Gia Nghĩa', NULL, 1, NULL, NULL),
(60615, 606, 'Huyện Đăk Glong', NULL, 1, NULL, NULL),
(60617, 606, 'Huyện Tuy Đức', NULL, 1, NULL, NULL),
(70101, 701, 'Quận 1', NULL, 1, NULL, NULL),
(70103, 701, 'Quận 2', NULL, 1, NULL, NULL),
(70105, 701, 'Quận 3', NULL, 1, NULL, NULL),
(70107, 701, 'Quận 4', NULL, 1, NULL, NULL),
(70109, 701, 'Quận 5', NULL, 1, NULL, NULL),
(70111, 701, 'Quận 6', NULL, 1, NULL, NULL),
(70113, 701, 'Quận 7', NULL, 1, NULL, NULL),
(70115, 701, 'Quận 8', NULL, 1, NULL, NULL),
(70117, 701, 'Quận 9', NULL, 1, NULL, NULL),
(70119, 701, 'Quận 10', NULL, 1, NULL, NULL),
(70121, 701, 'Quận 11', NULL, 1, NULL, NULL),
(70123, 701, 'Quận 12', NULL, 1, NULL, NULL),
(70125, 701, 'Quận Gò Vấp', NULL, 1, NULL, NULL),
(70127, 701, 'Quận Tân Bình', NULL, 1, NULL, NULL),
(70128, 701, 'Quận Tân Phú', NULL, 1, NULL, NULL),
(70129, 701, 'Quận Bình Thạnh', NULL, 1, NULL, NULL),
(70131, 701, 'Quận Phú Nhuận', NULL, 1, NULL, NULL),
(70133, 701, 'Quận Thủ Đức', NULL, 1, NULL, NULL),
(70134, 701, 'Quận Bình Tân', NULL, 1, NULL, NULL),
(70135, 701, 'Huyện Củ Chi', NULL, 1, NULL, NULL),
(70137, 701, 'Huyện Hóc Môn', NULL, 1, NULL, NULL),
(70139, 701, 'Huyện Bình Chánh', NULL, 1, NULL, NULL),
(70141, 701, 'Huyện Nhà Bè', NULL, 1, NULL, NULL),
(70143, 701, 'Huyện Cần Giờ', NULL, 1, NULL, NULL),
(70301, 703, 'Thành phố Đà Lạt', NULL, 1, NULL, NULL),
(70303, 703, 'Thành phố Bảo Lộc', NULL, 1, NULL, NULL),
(70305, 703, 'Huyện Lạc Dương', NULL, 1, NULL, NULL),
(70307, 703, 'Huyện Đơn Dương', NULL, 1, NULL, NULL),
(70309, 703, 'Huyện Đức Trọng', NULL, 1, NULL, NULL),
(70311, 703, 'Huyện Lâm Hà', NULL, 1, NULL, NULL),
(70313, 703, 'Huyện Bảo Lâm', NULL, 1, NULL, NULL),
(70315, 703, 'Huyện Di Linh', NULL, 1, NULL, NULL),
(70317, 703, 'Huyện Đạ Huoai', NULL, 1, NULL, NULL),
(70319, 703, 'Huyện Đạ Tẻh', NULL, 1, NULL, NULL),
(70321, 703, 'Huyện Cát Tiên', NULL, 1, NULL, NULL),
(70323, 703, 'Huyện Đam Rông', NULL, 1, NULL, NULL),
(70501, 705, 'Thành phố Phan Rang-Tháp Chàm', NULL, 1, NULL, NULL),
(70503, 705, 'Huyện Ninh Sơn', NULL, 1, NULL, NULL),
(70505, 705, 'Huyện Ninh Hải', NULL, 1, NULL, NULL),
(70507, 705, 'Huyện Ninh Phước', NULL, 1, NULL, NULL),
(70509, 705, 'Huyện Bác ái', NULL, 1, NULL, NULL),
(70511, 705, 'Huyện Thuận Bắc', NULL, 1, NULL, NULL),
(70513, 705, 'Huyện Thuận Nam', NULL, 1, NULL, NULL),
(70701, 707, 'Huyện Đồng Phù', NULL, 1, NULL, NULL),
(70703, 707, 'Thị xã Phước Long', NULL, 1, NULL, NULL),
(70705, 707, 'Huyện Lộc Ninh', NULL, 1, NULL, NULL),
(70706, 707, 'Huyện Bù Đốp', NULL, 1, NULL, NULL),
(70707, 707, 'Huyện Bù Đăng', NULL, 1, NULL, NULL),
(70709, 707, 'Thị xã Bình Long', NULL, 1, NULL, NULL),
(70710, 707, 'Huyện Chơn Thành', NULL, 1, NULL, NULL),
(70711, 707, 'Thị xã Đồng Xoài', NULL, 1, NULL, NULL),
(70901, 709, 'Thành phố Tây Ninh', NULL, 1, NULL, NULL),
(70903, 709, 'Huyện Tân Biên', NULL, 1, NULL, NULL),
(70905, 709, 'Huyện Tân Châu', NULL, 1, NULL, NULL),
(70907, 709, 'Huyện Dương Minh Châu', NULL, 1, NULL, NULL),
(70909, 709, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(70911, 709, 'Huyện Hòa Thành', NULL, 1, NULL, NULL),
(70913, 709, 'Huyện Bến Cầu', NULL, 1, NULL, NULL),
(70915, 709, 'Huyện Gò Dầu', NULL, 1, NULL, NULL),
(70917, 709, 'Huyện Trảng Bàng', NULL, 1, NULL, NULL),
(71101, 711, 'Thành phố Thủ Dầu Một', NULL, 1, NULL, NULL),
(71103, 711, 'Thị xã Bến Cát', NULL, 1, NULL, NULL),
(71105, 711, 'Thị xã Tân Uyên', NULL, 1, NULL, NULL),
(71107, 711, 'Thị xã Thuận An', NULL, 1, NULL, NULL),
(71109, 711, 'Thị xã Dĩ An', NULL, 1, NULL, NULL),
(71111, 711, 'Huyện Phú Giáo', NULL, 1, NULL, NULL),
(71113, 711, 'Huyện Dầu Tiếng', NULL, 1, NULL, NULL),
(71301, 713, 'Thành phố Biên Hòa', NULL, 1, NULL, NULL),
(71302, 713, 'Thị xã Long Khánh', NULL, 1, NULL, NULL),
(71303, 713, 'Huyện Tân Phú', NULL, 1, NULL, NULL),
(71305, 713, 'Huyện Định Quán', NULL, 1, NULL, NULL),
(71307, 713, 'Huyện Vĩnh Cửu', NULL, 1, NULL, NULL),
(71308, 713, 'Huyện Trảng Bom', NULL, 1, NULL, NULL),
(71309, 713, 'Huyện Thống Nhất', NULL, 1, NULL, NULL),
(71311, 713, 'Huyện Cẩm Mỹ', NULL, 1, NULL, NULL),
(71313, 713, 'Huyện Xuân Lộc', NULL, 1, NULL, NULL),
(71315, 713, 'Huyện Long Thành', NULL, 1, NULL, NULL),
(71317, 713, 'Huyện Nhơn Trạch', NULL, 1, NULL, NULL),
(71501, 715, 'Thành phố Phan Thiết', NULL, 1, NULL, NULL),
(71503, 715, 'Huyện Tuy Phong', NULL, 1, NULL, NULL),
(71505, 715, 'Huyện Bắc Bình', NULL, 1, NULL, NULL),
(71507, 715, 'Huyện Hàm Thuận Bắc', NULL, 1, NULL, NULL),
(71509, 715, 'Huyện Hàm Thuận Nam', NULL, 1, NULL, NULL),
(71511, 715, 'Huyện Tánh Linh', NULL, 1, NULL, NULL),
(71513, 715, 'Thị xã La Gi', NULL, 1, NULL, NULL),
(71514, 715, 'Huyện Hàm Tân', NULL, 1, NULL, NULL),
(71515, 715, 'Huyện Đức Linh', NULL, 1, NULL, NULL),
(71517, 715, 'Huyện Phú Quí', NULL, 1, NULL, NULL),
(71701, 717, 'Thành phố Vũng Tàu', NULL, 1, NULL, NULL),
(71703, 717, 'Thành phố Bà Rịa', NULL, 1, NULL, NULL),
(71705, 717, 'Huyện Châu Đức', NULL, 1, NULL, NULL),
(71707, 717, 'Huyện Xuyên Mộc', NULL, 1, NULL, NULL),
(71709, 717, 'Huyện Tân Thành', NULL, 1, NULL, NULL),
(71711, 717, 'Huyện Long Điền', NULL, 1, NULL, NULL),
(71712, 717, 'Huyện Đất Đỏ', NULL, 1, NULL, NULL),
(71713, 717, 'Huyện Côn Đảo', NULL, 1, NULL, NULL),
(80101, 801, 'Thành phố Tân An', NULL, 1, NULL, NULL),
(80103, 801, 'Huyện Tân Hưng', NULL, 1, NULL, NULL),
(80105, 801, 'Huyện Vĩnh Hưng', NULL, 1, NULL, NULL),
(80107, 801, 'Huyện Mộc Hóa', NULL, 1, NULL, NULL),
(80109, 801, 'Huyện Tân Thạnh', NULL, 1, NULL, NULL),
(80111, 801, 'Huyện Thạnh Hóa', NULL, 1, NULL, NULL),
(80113, 801, 'Huyện Đức Huệ', NULL, 1, NULL, NULL),
(80115, 801, 'Huyện Đức Hòa', NULL, 1, NULL, NULL),
(80117, 801, 'Huyện Bến Lức', NULL, 1, NULL, NULL),
(80119, 801, 'Huyện Thủ Thừa', NULL, 1, NULL, NULL),
(80121, 801, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(80123, 801, 'Huyện Tân Trụ', NULL, 1, NULL, NULL),
(80125, 801, 'Huyện Cần Đước', NULL, 1, NULL, NULL),
(80127, 801, 'Huyện Cần Giuộc', NULL, 1, NULL, NULL),
(80301, 803, 'Thành phố Cao Lãnh', NULL, 1, NULL, NULL),
(80303, 803, 'Thành phố Sa Đéc', NULL, 1, NULL, NULL),
(80305, 803, 'Huyện Tân Hồng', NULL, 1, NULL, NULL),
(80307, 803, 'Huyện Hồng Ngự', NULL, 1, NULL, NULL),
(80309, 803, 'Huyện Tam Nông', NULL, 1, NULL, NULL),
(80311, 803, 'Huyện Thanh Bình', NULL, 1, NULL, NULL),
(80313, 803, 'Huyện Tháp Mười', NULL, 1, NULL, NULL),
(80315, 803, 'Huyện Cao Lãnh', NULL, 1, NULL, NULL),
(80317, 803, 'Huyện Lấp Vò', NULL, 1, NULL, NULL),
(80319, 803, 'Huyện Lai Vung', NULL, 1, NULL, NULL),
(80321, 803, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(80323, 803, 'Thị xã Hồng Ngự', NULL, 1, NULL, NULL),
(80501, 805, 'Thành phố Long Xuyên', NULL, 1, NULL, NULL),
(80503, 805, 'Thành phố Châu Đốc', NULL, 1, NULL, NULL),
(80505, 805, 'Huyện An Phú', NULL, 1, NULL, NULL),
(80507, 805, 'Thị xã Tân Châu', NULL, 1, NULL, NULL),
(80509, 805, 'Huyện Phú Tân', NULL, 1, NULL, NULL),
(80511, 805, 'Huyện Châu Phú', NULL, 1, NULL, NULL),
(80513, 805, 'Huyện Tịnh Biên', NULL, 1, NULL, NULL),
(80515, 805, 'Huyện Tri Tôn', NULL, 1, NULL, NULL),
(80517, 805, 'Huyện Chợ Mới', NULL, 1, NULL, NULL),
(80519, 805, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(80521, 805, 'Huyện Thoại Sơn', NULL, 1, NULL, NULL),
(80701, 807, 'Thành phố Mỹ Tho', NULL, 1, NULL, NULL),
(80703, 807, 'Thị xã Gò Công', NULL, 1, NULL, NULL),
(80705, 807, 'Huyện Tân Phước', NULL, 1, NULL, NULL),
(80707, 807, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(80709, 807, 'Thị xã Cai Lậy', NULL, 1, NULL, NULL),
(80711, 807, 'Huyện Chợ Gạo', NULL, 1, NULL, NULL),
(80713, 807, 'Huyện Cái Bè', NULL, 1, NULL, NULL),
(80715, 807, 'Huyện Gò Công Tây', NULL, 1, NULL, NULL),
(80717, 807, 'Huyện Gò Công Đông', NULL, 1, NULL, NULL),
(80719, 807, 'Huyện Tân Phú Đông', NULL, 1, NULL, NULL),
(80901, 809, 'Thành Phố Vĩnh Long', NULL, 1, NULL, NULL),
(80903, 809, 'Huyện Long Hồ', NULL, 1, NULL, NULL),
(80905, 809, 'Huyện Mang Thít', NULL, 1, NULL, NULL),
(80907, 809, 'Thị xã Bình Minh', NULL, 1, NULL, NULL),
(80908, 809, 'Huyện Bình Tân', NULL, 1, NULL, NULL),
(80909, 809, 'Huyện Tam Bình', NULL, 1, NULL, NULL),
(80911, 809, 'Huyện Trà ôn', NULL, 1, NULL, NULL),
(80913, 809, 'Huyện  Vũng Liêm', NULL, 1, NULL, NULL),
(81101, 811, 'Thành phố Bến Tre', NULL, 1, NULL, NULL),
(81103, 811, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(81105, 811, 'Huyện Chợ Lách', NULL, 1, NULL, NULL),
(81107, 811, 'Huyện Mỏ Cày Nam', NULL, 1, NULL, NULL),
(81108, 811, 'Huyện Mỏ Cày Bắc', NULL, 1, NULL, NULL),
(81109, 811, 'Huyện Giồng Trôm', NULL, 1, NULL, NULL),
(81111, 811, 'Huyện Bình Đại', NULL, 1, NULL, NULL),
(81113, 811, 'Huyện Ba Tri', NULL, 1, NULL, NULL),
(81115, 811, 'Huyện Thạnh Phú', NULL, 1, NULL, NULL),
(81301, 813, 'Thành phố Rạch Giá', NULL, 1, NULL, NULL),
(81303, 813, 'Huyện Kiên Lương', NULL, 1, NULL, NULL),
(81305, 813, 'Huyện Hòn Đất', NULL, 1, NULL, NULL),
(81307, 813, 'Huyện Tân Hiệp', NULL, 1, NULL, NULL),
(81309, 813, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(81311, 813, 'Huyện Giồng Riềng', NULL, 1, NULL, NULL),
(81313, 813, 'Huyện Gò Quao', NULL, 1, NULL, NULL),
(81315, 813, 'Huyện An Biên', NULL, 1, NULL, NULL),
(81317, 813, 'Huyện An Minh', NULL, 1, NULL, NULL),
(81319, 813, 'Huyện Vĩnh Thuận', NULL, 1, NULL, NULL),
(81321, 813, 'Huyện Phú Quốc', NULL, 1, NULL, NULL),
(81323, 813, 'Huyện Kiên Hải', NULL, 1, NULL, NULL),
(81325, 813, 'Thị xã Hà Tiên', NULL, 1, NULL, NULL),
(81327, 813, 'Huyện U Minh Thượng', NULL, 1, NULL, NULL),
(81503, 815, 'Quận Thốt Nốt', NULL, 1, NULL, NULL),
(81505, 815, 'Quận Ô Môn', NULL, 1, NULL, NULL),
(81519, 815, 'Quận Ninh Kiều', NULL, 1, NULL, NULL),
(81521, 815, 'Quận Bình Thuỷ', NULL, 1, NULL, NULL),
(81523, 815, 'Quận Cái Răng', NULL, 1, NULL, NULL),
(81525, 815, 'Huyện Vĩnh Thạnh', NULL, 1, NULL, NULL),
(81527, 815, 'Huyện Cờ Đỏ', NULL, 1, NULL, NULL),
(81529, 815, 'Huyện Phong Điền', NULL, 1, NULL, NULL),
(81531, 815, 'Huyện Thới Lai', NULL, 1, NULL, NULL),
(81601, 816, 'Thành phố Vị Thanh', NULL, 1, NULL, NULL),
(81603, 816, 'Huyện Châu Thành A', NULL, 1, NULL, NULL),
(81605, 816, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(81607, 816, 'Thị xã Ngã Bảy', NULL, 1, NULL, NULL),
(81608, 816, 'Huyện Phụng Hiệp', NULL, 1, NULL, NULL),
(81609, 816, 'Huyện Vị Thuỷ', NULL, 1, NULL, NULL),
(81611, 816, 'Thị xã Long Mỹ', NULL, 1, NULL, NULL),
(81701, 817, 'Thành phố Trà Vinh', NULL, 1, NULL, NULL),
(81703, 817, 'Huyện Càng Long', NULL, 1, NULL, NULL),
(81705, 817, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(81707, 817, 'Huyện Cầu Kè', NULL, 1, NULL, NULL),
(81709, 817, 'Huyện Tiểu Cần', NULL, 1, NULL, NULL),
(81711, 817, 'Huyện Cầu Ngang', NULL, 1, NULL, NULL),
(81713, 817, 'Huyện Trà Cú', NULL, 1, NULL, NULL),
(81715, 817, 'Thị xã Duyên Hải', NULL, 1, NULL, NULL),
(81901, 819, 'Thành phố Sóc Trăng', NULL, 1, NULL, NULL),
(81903, 819, 'Huyện Kế Sách', NULL, 1, NULL, NULL),
(81905, 819, 'Huyện Long Phú', NULL, 1, NULL, NULL),
(81906, 819, 'Huyện Cù Lao Dung', NULL, 1, NULL, NULL),
(81907, 819, 'Huyện Mỹ Tú', NULL, 1, NULL, NULL),
(81909, 819, 'Huyện Mỹ Xuyên', NULL, 1, NULL, NULL),
(81911, 819, 'Huyện Thạnh Trị', NULL, 1, NULL, NULL),
(81912, 819, 'Thị xã Ngã Năm', NULL, 1, NULL, NULL),
(81913, 819, 'Thị xã Vĩnh Châu', NULL, 1, NULL, NULL),
(81915, 819, 'Huyện Châu Thành', NULL, 1, NULL, NULL),
(82101, 821, 'Thành phố Bạc Liêu', NULL, 1, NULL, NULL),
(82103, 821, 'Huyện Hồng Dân', NULL, 1, NULL, NULL),
(82105, 821, 'Huyện Vĩnh Lợi', NULL, 1, NULL, NULL),
(82106, 821, 'Huyện Hoà Bình', NULL, 1, NULL, NULL),
(82107, 821, 'Thị xã Giá Rai', NULL, 1, NULL, NULL),
(82109, 821, 'Huyện Phước Long', NULL, 1, NULL, NULL),
(82111, 821, 'Huyện Đông Hải', NULL, 1, NULL, NULL),
(82301, 823, 'Thành phố Cà Mau', NULL, 1, NULL, NULL),
(82303, 823, 'Huyện Thới Bình', NULL, 1, NULL, NULL),
(82305, 823, 'Huyện U Minh', NULL, 1, NULL, NULL),
(82307, 823, 'Huyện Trần Văn Thời', NULL, 1, NULL, NULL),
(82308, 823, 'Huyện Phú Tân', NULL, 1, NULL, NULL),
(82309, 823, 'Huyện Cái Nước', NULL, 1, NULL, NULL),
(82311, 823, 'Huyện Đầm Dơi', NULL, 1, NULL, NULL),
(82312, 823, 'Huyện Năm Căn', NULL, 1, NULL, NULL),
(82313, 823, 'Huyện Ngọc Hiển', NULL, 1, NULL, NULL),
(21112, 211, 'Huyện Lâm Bình', NULL, 1, NULL, NULL),
(22528, 225, 'Thị xã Quảng Yên', NULL, 1, NULL, NULL),
(30122, 301, 'Huyện Nậm Pồ', NULL, 1, NULL, NULL),
(30212, 302, 'Huyện Nậm Nhùn', NULL, 1, NULL, NULL),
(30322, 303, 'Huyện Vân Hồ', NULL, 1, NULL, NULL),
(40338, 403, 'Thị xã Hoàng Mai', NULL, 1, NULL, NULL),
(40714, 407, 'Thị xã Ba Đồn', NULL, 1, NULL, NULL),
(60116, 601, 'Huyện Ia H\' Drai', NULL, 1, NULL, NULL),
(60330, 603, 'Huyện Chư Pưh', NULL, 1, NULL, NULL),
(70712, 707, 'Huyện Bù Gia Mập', NULL, 1, NULL, NULL),
(70713, 707, 'Huyện Phú Riềng', NULL, 1, NULL, NULL),
(70714, 707, 'Huyện Hớn Quản', NULL, 1, NULL, NULL),
(71114, 711, 'Huyện Bàu Bàng', NULL, 1, NULL, NULL),
(71115, 711, 'Huyện Bắc Tân Uyên', NULL, 1, NULL, NULL),
(80128, 801, 'Thị xã Kiến Tường', NULL, 1, NULL, NULL),
(81328, 813, 'Huyện Giang Thành', NULL, 1, NULL, NULL),
(81916, 819, 'Huyện Trần Đề', NULL, 1, NULL, NULL),
(10154, 101, 'Quận Nam Từ Liêm', NULL, 1, NULL, NULL),
(10155, 101, 'Quận Bắc Từ Liêm', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `head` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `type_id`, `head`, `name`, `name_seo`, `alias`, `route`, `content`, `url`, `icon`, `image`, `note`, `priority`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 1, NULL, 'Dashboard', 'Dashboard', 'dashboard', 'admin.dashboard', NULL, 'javascript:void(0)', 'fa fa-home', NULL, NULL, 1, 1, 0, 0, '2021-11-21 20:36:35', '2021-11-22 00:51:29'),
(2, 0, 1, 'Menu', 'Menus', 'Menus', 'menus', NULL, NULL, '/admin/menu', 'fa fa-life-ring', NULL, 'menus', 2, 1, 0, 0, '2021-11-21 20:49:00', '2021-11-21 21:34:34'),
(3, 2, 1, NULL, 'Menu Type', 'Meu Type', 'menu-type', 'menu-type.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-21 20:52:39', '2021-11-21 20:52:39'),
(5, 2, 1, NULL, 'Navigation', 'Navigation', 'navigation', NULL, NULL, '/admin/menu/navigation', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-21 21:07:17', '2021-11-21 21:36:39'),
(4, 2, 1, NULL, 'Admin', 'Admin', 'admin', NULL, NULL, '/admin/menu/admin', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-21 20:54:34', '2021-11-23 09:34:19'),
(6, 0, 1, 'Config Web', 'Config Web', 'Config Web', 'config-web', NULL, NULL, 'javascript:void(0)', 'fa fa-cogs', NULL, 'configweb', 3, 1, 0, 0, '2021-11-21 21:59:07', '2021-11-21 23:43:30'),
(7, 6, 1, NULL, 'Config', 'Config', 'config', 'setting.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-21 23:44:39', '2021-11-21 23:44:39'),
(8, 6, 1, NULL, 'Upload File', 'Upload File', 'upload-file', NULL, NULL, '/admin/ckfinder/browser', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-21 23:49:38', '2021-11-21 23:50:10'),
(9, 0, 1, 'Product', 'Product', 'Product', 'product', NULL, NULL, 'javascript:void(0)', 'fa fa-bars', NULL, 'product', 4, 1, 0, 0, '2021-11-22 00:53:35', '2021-11-22 00:53:35'),
(10, 9, 1, NULL, 'Product', 'Product', 'product', 'product.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-22 00:54:55', '2021-11-22 00:54:55'),
(11, 9, 1, NULL, 'Brand', 'Brand', 'brand', 'brand.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-22 00:55:27', '2021-11-22 00:55:27'),
(12, 9, 1, NULL, 'Category', 'Category', 'category', 'category.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-22 00:56:14', '2021-11-22 00:56:14'),
(13, 9, 1, NULL, 'Price', 'Price', 'price', 'price.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 4, 1, 0, 0, '2021-11-22 00:57:01', '2021-11-22 00:57:01'),
(14, 9, 1, NULL, 'Capacity', 'Capacity', 'capacity', 'capa.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 5, 1, 0, 0, '2021-11-22 00:57:49', '2021-11-22 00:57:49'),
(15, 0, 1, 'Location', 'Location', 'Location', 'location', NULL, NULL, 'javascript:void(0)', 'fa fa-street-view', NULL, 'location', 5, 1, 0, 0, '2021-11-22 01:33:15', '2021-11-22 01:33:15'),
(16, 15, 1, NULL, 'Province', 'Province', 'province', 'province.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-22 01:33:58', '2021-11-22 01:33:58'),
(17, 15, 1, NULL, 'District', 'District', 'district', 'district.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-22 01:34:30', '2021-11-22 01:34:30'),
(18, 0, 1, NULL, 'SEO Page', 'SEO Page', 'seo-page', 'seo-page.index', NULL, 'javascript:void(0)', 'fa fa-file', NULL, NULL, 6, 1, 0, 0, '2021-11-22 01:35:24', '2021-11-22 01:35:24'),
(19, 0, 1, 'Info', 'Info', 'Info', 'info', NULL, NULL, 'javascript:void(0)', 'fa fa-info-circle', NULL, 'info', 7, 1, 0, 0, '2021-11-22 01:39:17', '2021-11-22 01:39:17'),
(20, 0, 1, NULL, 'Revolution Slider', 'Revolution Slider', 'revolution-slider', 'revolution-slider.index', NULL, 'javascript:void(0)', 'fa fa-rss-square', NULL, NULL, 7, 1, 0, 0, '2021-11-22 02:53:48', '2021-11-22 13:02:47'),
(21, 0, 1, NULL, 'Clear Cache', 'Clear Cache', 'clear-cache-admin', 'clear-admin', NULL, 'javascript:void(0)', 'fa fa-eraser', NULL, NULL, 100, 1, 0, 0, '2021-11-22 13:28:03', '2021-11-22 13:28:03'),
(22, 2, 1, NULL, 'Top Bar', 'Top Bar', 'top-bar', NULL, NULL, '/admin/menu/topbar', NULL, NULL, NULL, 4, 1, 0, 0, '2021-11-23 03:48:59', '2021-11-23 03:48:59'),
(23, 0, 3, 'Account', 'Account', 'Account', 'account', NULL, NULL, 'javascript:void(0)', NULL, NULL, 'account', 1, 1, 0, 0, '2021-11-23 03:58:33', '2021-11-23 03:58:33'),
(24, 23, 3, NULL, 'Login', 'Login', 'login', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-23 03:59:23', '2021-11-23 03:59:23'),
(25, 23, 3, NULL, 'Signup', 'Signup', 'signup', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-23 03:59:59', '2021-11-23 03:59:59'),
(26, 23, 3, NULL, 'Your Orders', 'Your Orders', 'your-order', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-23 04:02:07', '2021-11-23 04:02:07'),
(27, 0, 3, NULL, 'Stores', 'Stores', 'store', 'store', NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-23 04:05:55', '2021-11-24 03:32:31'),
(28, 0, 3, NULL, 'Help', 'Help', 'help', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-23 04:06:21', '2021-11-23 04:06:21'),
(29, 0, 2, NULL, 'Home', 'Home', 'home', NULL, NULL, '/', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-23 06:39:53', '2021-11-23 06:39:53'),
(30, 0, 2, 'Categories', 'Categories', 'Categories', 'category', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-23 06:41:16', '2021-11-23 06:41:16'),
(31, 30, 2, NULL, 'Perfume', 'Perfume', 'perfume', NULL, NULL, '/cate/perfume', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-23 06:42:12', '2021-11-23 06:42:12'),
(32, 30, 2, NULL, 'Comestic', 'Comestic', 'comestic', NULL, NULL, '/cate/comestic', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-23 06:42:57', '2021-11-23 06:42:57'),
(33, 30, 2, NULL, 'Accessory', 'Accessory', 'accessory', NULL, NULL, '/cate/accessory', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-23 06:43:25', '2021-11-23 06:43:25'),
(34, 0, 2, NULL, 'New Arrivals', 'New Arrivals', 'new-arrival', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-23 07:20:24', '2021-11-23 07:20:24'),
(35, 0, 2, NULL, 'Contact', 'Contact', 'contact', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 5, 1, 0, 0, '2021-11-23 07:22:00', '2021-11-27 03:36:31'),
(36, 0, 2, NULL, 'Brands', 'Brands', 'brand', 'list-brand', NULL, 'javascript:void(0)', NULL, NULL, NULL, 4, 1, 0, 0, '2021-11-23 07:23:42', '2021-11-23 07:25:44'),
(37, 0, 1, 'Cart', 'Cart', 'Cart', 'cart', NULL, NULL, 'javascript:void(0)', 'fa fa-shopping-cart', NULL, 'cart', 5, 1, 0, 0, '2021-11-23 09:48:05', '2021-11-23 09:48:05'),
(38, 37, 1, NULL, 'Bill', 'Bill', 'bill', 'bill.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-23 09:49:01', '2021-11-27 14:29:01'),
(39, 37, 1, NULL, 'Bill Consignee', 'Bill Consignee', 'bill-consignee', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-23 09:49:43', '2021-11-23 09:49:43'),
(40, 37, 1, NULL, 'Bill Customer', 'Bill Customer', 'bill-customer', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-23 09:50:21', '2021-11-23 09:50:21'),
(41, 37, 1, NULL, 'Bill Invoices', 'Bill Invoices', 'bill-invoice', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 4, 1, 0, 0, '2021-11-23 09:53:01', '2021-11-23 09:53:01'),
(42, 15, 1, NULL, 'Store', 'Store', 'store', 'store.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-23 09:56:56', '2021-11-23 09:56:56'),
(43, 37, 1, NULL, 'Shipping Fee', 'Shipping Fee', 'shipping-fee', 'shipping-fee.index', NULL, 'javascript:void(0)', NULL, NULL, NULL, 5, 1, 0, 0, '2021-11-26 10:33:13', '2021-11-26 10:33:13'),
(44, 0, 1, NULL, 'Report', 'Report', 'report', NULL, NULL, 'javascript:void(0)', 'fa fa-flag', NULL, NULL, 10, 1, 0, 0, '2021-11-27 03:28:45', '2021-11-27 03:28:45'),
(45, 0, 1, 'Customer', 'Customer', 'Customer', 'customer', NULL, NULL, 'javascript:void(0)', 'fa fa-user', NULL, 'customer', 10, 1, 0, 0, '2021-11-27 03:30:38', '2021-11-27 03:30:38'),
(46, 45, 1, NULL, 'Help', 'Help', 'help', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 1, 1, 0, 0, '2021-11-27 03:31:40', '2021-11-27 03:31:40'),
(47, 45, 1, NULL, 'User', 'User', 'user', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 2, 1, 0, 0, '2021-11-27 03:32:17', '2021-11-27 03:32:17'),
(48, 45, 1, NULL, 'Comment', 'Comment', 'comment', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 3, 1, 0, 0, '2021-11-27 03:33:18', '2021-11-27 03:33:18'),
(49, 0, 2, NULL, 'Gift Card', 'Gift Card', 'gift-card', NULL, NULL, 'javascript:void(0)', NULL, NULL, NULL, 6, 1, 0, 0, '2021-11-27 03:37:01', '2021-11-27 03:37:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_types`
--

INSERT INTO `menu_types` (`id`, `name`, `alias`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 1, 0, 0, '2021-11-22 12:53:51', '2021-11-22 12:53:51'),
(2, 'Navigation', 'navigation', NULL, 1, 0, 0, '2021-11-22 12:54:00', '2021-11-22 12:54:00'),
(3, 'Topbar', 'topbar', NULL, 1, 0, 0, '2021-11-23 03:42:49', '2021-11-23 03:42:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_31_092210_create_permission_tables', 1),
(6, '2021_08_31_095718_create_admin_user', 1),
(7, '2021_09_01_093700_create_products', 1),
(8, '2021_09_01_093818_create_area_user', 1),
(9, '2021_09_01_093851_create_area_menu', 1),
(10, '2021_09_01_093918_create_area_info', 1),
(11, '2021_10_12_172036_create_product_trend_sell', 1),
(12, '2021_10_22_141824_create_slider', 1),
(13, '2021_11_05_151633_create_cache_table', 1),
(14, '2021_11_09_212926_create_shoppingcart_table', 1),
(15, '2021_11_21_211429_create_bill', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sap_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL DEFAULT 0,
  `promote` int(11) NOT NULL DEFAULT 0,
  `capa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Size',
  `capa_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prices`
--

INSERT INTO `prices` (`id`, `sap_id`, `pid`, `barcode`, `name`, `name_seo`, `sex`, `promote`, `capa`, `capa_id`, `price`, `note`, `status`, `stock`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'I00006198', 1, '8011003861224', 'Versace Eros EDP', 'Versace Eros EDP', 0, 100, '100 ml', 1, 2795000, NULL, 1, 100, 0, 0, '2021-11-26 09:52:12', '2021-11-26 09:52:12'),
(2, 'I00005975', 2, '8027375018104', 'ORISING SKINCARE ANTI-AGING SET', 'ORISING SKINCARE ANTI-AGING SET', 0, 100, '100 ml', 3, 3780000, NULL, 1, 100, 0, 0, '2021-11-26 09:53:38', '2021-11-26 11:01:16'),
(3, 'I00006162', 3, '3760128681037', 'Hydra-Protect Smooth Cream', 'Hydra-Protect Smooth Cream', 0, 100, '50 ml', 3, 1290000, NULL, 1, 100, 0, 0, '2021-11-26 09:54:32', '2021-11-26 09:54:32'),
(4, 'I00006133', 4, '8809442227493', 'Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush', 'Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush', 0, 1, '3.5g', 3, 389000, NULL, 1, 10, 0, 0, '2021-11-26 09:56:13', '2021-11-26 09:56:13'),
(5, 'I00004753', 5, '8809624502080', 'M.O.I Matte Lipstick – LOVE No. 1 First love', 'M.O.I Matte Lipstick – LOVE No. 1 First love', 0, 1, 'NA', 3, 359000, NULL, 1, 10, 0, 0, '2021-11-26 09:57:15', '2021-11-26 09:57:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_year` year(4) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incense_group` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nhóm hương',
  `styles` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Phong cách',
  `benefit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredient` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `galleries` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`galleries`)),
  `promote` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `bid`, `name`, `name_seo`, `designer`, `public_year`, `image`, `image_thumb_small`, `thumb`, `thumb_small`, `description`, `incense_group`, `styles`, `benefit`, `ingredient`, `galleries`, `promote`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Versace Eros For Men', 'Versace Eros For Men', 'Italy', 2020, 'userfiles/images/product/2021/11/1637914345.6579.png', 'userfiles/images/product_image_thumb_small/2021/11/1637914355.7417.png', 'userfiles/images/product_thumb/2021/11/1637914345.6579.png', 'null', '<p>Nếu bạn đ&atilde; quen nh&igrave;n Versace Eros như một g&atilde; trai năng động, trẻ trung, th&igrave; giờ đ&acirc;y Versace Eros EDP sẽ xuất hiện như một người đ&agrave;n &ocirc;ng đ&atilde; từng trải, vương vấn &iacute;t nhiều bụi trần trong &aacute;nh nh&igrave;n. Một sự thật rằng g&atilde; trai n&agrave;y vốn dĩ đ&atilde; rất hoang dại, nay lại c&agrave;ng th&ecirc;m l&ocirc;i cuốn bởi vẻ bụi bặm, phong trần của hắn ta.</p>\r\n\r\n<p>Giữ nguy&ecirc;n vẹn vẻ đẹp tr&aacute;ng kiệt kh&oacute; lẫn v&agrave;o đ&acirc;u được với nốt hương thanh m&aacute;t của Bạc h&agrave;, Versace Eros EDP c&ograve;n chủ &yacute; nhấn nh&aacute; n&eacute;t l&atilde;ng du với m&ugrave;i hương quen thuộc của nh&agrave; Chanh cam. Cứ như ta vừa lướt mắt qua một &aacute;nh nh&igrave;n sắc sảo nhưng kh&ocirc;ng k&eacute;m phần tinh tế, Versace Eros EDP hẳn nhi&ecirc;n rất biết c&aacute;ch lấy l&ograve;ng người.</p>\r\n\r\n<p><img alt=\"\" src=\"http://127.0.0.1:8000/storage/uploads/des_versace_eros_1637912102.jpg\" style=\"height:400px; width:600px\" /><img alt=\"\" src=\"/uploads/galleries/2021/04/uri/1619422786.5183.jpg\" /></p>\r\n\r\n<p>Nhưng ấy l&agrave; c&acirc;u chuyện của những nốt hương dạo đầu, tầng hương giữa đ&acirc;y mới ch&iacute;nh l&agrave; l&uacute;c Versace Eros c&agrave;n qu&eacute;t mọi thứ. Ấy l&agrave; khi X&ocirc; thơm đột nhi&ecirc;n xuất hiện, kho&aacute;c l&ecirc;n cho g&atilde; biết bao nhi&ecirc;u vẻ bất cần đầy nam t&iacute;nh, một kh&iacute; chất dễ d&agrave;ng khiến ta mụ mị đi v&igrave; m&ecirc; mẩn. Sự gọi mời được đẩy l&ecirc;n cao độ khi được kết hợp với nốt hương của Hoa phong lữ, kiến tạo n&ecirc;n một tổng thể m&ugrave;i hương phi&ecirc;u bồng, tuyệt nhi&ecirc;n kỳ diệu. Đừng cố n&eacute; tr&aacute;nh &aacute;nh nh&igrave;n của Versace Eros EDP, v&igrave; cuối c&ugrave;ng bạn cũng sẽ quấn qu&yacute;t lấy c&aacute;i vẻ ngọt ng&agrave;o đến t&aacute;o tợn của Vanilla quyện c&ugrave;ng Da thuộc, d&ugrave; muốn d&ugrave; kh&ocirc;ng, t&ocirc;i cũng phải cảnh b&aacute;o trước đ&acirc;y l&agrave; một hợp chất &ldquo;g&acirc;y nghiện&quot; đấy.</p>', 'Hương đầu: Bạc hà, Kẹo táo, Cam, Chanh, Quýt\r\nHương giữa: Ambroxan, Xô thơm, Phong lữ\r\nHương cuối: Vanilla, Da thuộc, Đàn hương, Vỏ cam, Tuyết tùng, Hoắc hương', 'Nam tính, Quyến rũ, Nổi bật', NULL, NULL, 'null', 100, 1, 0, 0, '2021-11-26 07:36:20', '2021-11-26 08:12:35'),
(2, 1, 2, 'ORISING SKINCARE ANTI-AGING SET', 'ORISING SKINCARE ANTI-AGING SET', NULL, NULL, 'userfiles/images/product/2021/11/1637915057.093.png', 'userfiles/images/product_image_thumb_small/2021/11/1637915058.7563.png', 'userfiles/images/product_thumb/2021/11/1637915057.093.png', '\"\"', NULL, NULL, NULL, '<p>1. ORISING SKINCARE REPAIR ACTIVE GLOBAL ANTI-AGING CARE - KEM DƯỠNG PHỤC HỒI CHỐNG L&Atilde;O H&Oacute;A TO&Agrave;N DIỆN (:<br />\r\nKem dưỡng phục hồi chống l&atilde;o h&oacute;a Orising được ứng dụng c&ocirc;ng nghệ sinh học ti&ecirc;n tiến nhất với c&aacute;c th&agrave;nh phần hoạt t&iacute;nh tự nhi&ecirc;n gi&uacute;p ngăn ngừa v&agrave; kiểm so&aacute;t qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a của da, giảm sự xuất hiện cũng như độ s&acirc;u của nếp nhăn, mang đến gương mặt tươi trẻ rạng ngời.</p>\r\n\r\n<p>2.ORISING SKINCARE FRAMBOISE WATER TONIC - NƯỚC DƯỠNG DA TINH CHẤT V&Agrave;NG V&Agrave; PH&Uacute;C BỒN TỬ (125ML):<br />\r\nNước dưỡng cho l&agrave;n da tươi mới v&agrave; khỏe mạnh. Với th&agrave;nh phần chứa chiết xuất ph&uacute;c bồn tử v&agrave; dưa hấu gi&uacute;p da chống oxy h&oacute;a, đồng thời bảo vệ v&agrave; l&agrave;m mới da.</p>\r\n\r\n<p>3. ORISING SKINCARE REVITALIZING EYE CONTOUR FLUID - TINH CHẤT T&Aacute;I TẠO DA V&Ugrave;NG MẮT (15ML):<br />\r\nVới c&aacute;c th&agrave;nh phần hoạt t&iacute;nh gi&uacute;p duy tr&igrave; độ ẩm v&agrave; t&aacute;i tạo v&ugrave;ng da mắt mỏng manh, tinh chất t&aacute;i tạo v&ugrave;ng mắt gi&uacute;p l&agrave;m mờ nếp nhăn, ngăn ngừa quầng th&acirc;m v&agrave; bọng mắt, mang đến &aacute;nh nh&igrave;n tươi trẻ.</p>', '<p>1. ORISING SKINCARE REPAIR ACTIVE GLOBAL ANTI-AGING CARE - KEM DƯỠNG PHỤC HỒI CHỐNG L&Atilde;O H&Oacute;A TO&Agrave;N DIỆN (50ML):<br />\r\nHyaluronic Acid: polymer tự nhi&ecirc;n c&oacute; thể giữ lượng nước cho cấu tr&uacute;c nền của da (c&aacute;c ph&acirc;n tử b&ecirc;n ngo&agrave;i tế b&agrave;o) lớn trong ma trận tế b&agrave;o, c&oacute; t&aacute;c dụng dưỡng ẩm mạnh.<br />\r\nHyaluronic Acid c&oacute; trọng lượng ph&acirc;n tử thấp, gi&uacute;p l&agrave;m đầy c&aacute;c nếp nhăn tức th&igrave;, trẻ h&oacute;a da v&agrave; tăng độ đ&agrave;n hồi cho da.<br />\r\nDầu jojoba: dưỡng ẩm, l&agrave;m dịu da, kh&aacute;ng vi&ecirc;m v&agrave; điều tiết lớp dầu giữ ẩm tr&ecirc;n da.<br />\r\nTinh dầu mắc ca: giữ ẩm, nu&ocirc;i dưỡng, chống l&atilde;o h&oacute;a v&agrave; bảo vệ da.<br />\r\nHoa cẩm quỳ: l&agrave;m dịu, l&agrave;m mềm v&agrave; bảo vệ da.<br />\r\nTinh dầu &ocirc; liu: shống oxy h&oacute;a, dưỡng ẩm l&agrave;m mềm<br />\r\nDầu c&aacute;m gạo: L&agrave;m mềm v&agrave; nu&ocirc;i dưỡng da, l&agrave;m chậm qu&aacute; tr&igrave;nh l&atilde;o h&oacute;a, tăng cường độ rạng rỡ của da<br />\r\nCỏ đu&ocirc;i ngựa: Phục hồi, tăng cường kho&aacute;ng chất dưỡng da khỏe mạnh.<br />\r\nNho đỏ: săn chắc da, chống oxy h&oacute;a v&agrave; bảo vệ da.<br />\r\nC&uacute;c vạn thọ: Se nhỏ lỗ ch&acirc;n l&ocirc;ng, điều tiết b&atilde; nhờn, kh&aacute;ng vi&ecirc;m.<br />\r\nC&uacute;c vạn diệp: l&agrave;m khỏe da, kh&aacute;ng vi&ecirc;m, chống ửng đỏ.<br />\r\nC&uacute;c La M&atilde;: l&agrave;m dịu da, chống mẫn đỏ<br />\r\nViệt quất: Chống oxy h&oacute;a v&agrave; c&aacute;c gốc tự do, chống việm v&agrave; tăng cường tổng hợp sợi collagen.</p>\r\n\r\n<p>2.ORISING SKINCARE FRAMBOISE WATER TONIC - NƯỚC DƯỠNG DA TINH CHẤT V&Agrave;NG V&Agrave; PH&Uacute;C BỒN TỬ (125ML):<br />\r\nC&aacute;c ph&acirc;n tử v&agrave;ng kết hợp với protein tơ tằm: T&aacute;i tạo tế b&agrave;o, chống l&atilde;o h&oacute;a, l&agrave;m dịu da v&agrave; k&iacute;ch th&iacute;ch qu&aacute; tr&igrave;nh trao đổi chất của tế b&agrave;o.<br />\r\nHyaluronic Acid: Duy tr&igrave; độ dẻo dai v&agrave; đ&agrave;n hồi cho da.<br />\r\nNước quả ph&uacute;c bồn tử: L&agrave;m tươi mới, se da v&agrave; săn chắc da. Gi&agrave;u chất chống oxy h&oacute;a gi&uacute;p chống lại c&aacute;c gốc tự do v&agrave; l&atilde;o h&oacute;a da.<br />\r\nChiết xuất dưa hấu: Bảo vệ DNA của nguy&ecirc;n b&agrave;o, chăm s&oacute;c lớp sừng tr&ecirc;n bề mặt da với chức năng r&agrave;o cản cho da.</p>\r\n\r\n<p>3. ORISING SKINCARE REVITALIZING EYE CONTOUR FLUID - TINH CHẤT T&Aacute;I TẠO DA V&Ugrave;NG MẮT (15ML):<br />\r\nCafein: Cung cấp năng lượng k&iacute;ch hoạt lại tuần ho&agrave;n, chống oxy h&oacute;a da, dưỡng ẩm.<br />\r\nTiền Vitamin B5: Giữ ẩm, l&agrave;m mềm da, kh&aacute;ng vi&ecirc;m v&agrave; k&iacute;ch th&iacute;ch sự tăng sinh tế b&agrave;o.<br />\r\nProtein Đậu N&agrave;nh: K&iacute;ch th&iacute;ch hoạt động của tế b&agrave;o v&agrave; bổ sung dưỡng chất thiết yếu duy tr&igrave; sự tươi trẻ của da<br />\r\nProtein Gạo: Giữ ẩm, l&agrave;m mềm v&agrave; nu&ocirc;i dưỡng da.</p>', '\"\"', 100, 1, 0, 0, '2021-11-26 08:16:33', '2021-11-26 08:24:18'),
(3, 2, 3, 'Hydra-Protect Smooth Cream', 'Hydra-Protect Smooth Cream', 'France', NULL, 'userfiles/images/product/2021/11/1637915499.5946.png', 'userfiles/images/product_image_thumb_small/2021/11/1637915500.13.png', 'userfiles/images/product_thumb/2021/11/1637915499.5946.png', '\"\"', NULL, NULL, NULL, '<p>Kết cấu kem lỏng nhẹ v&ocirc; c&ugrave;ng hiệu quả trong việc l&agrave;m dịu nhanh ch&oacute;ng vết bỏng r&aacute;t do dao cạo r&acirc;u g&acirc;y ra, mang lại cảm gi&aacute;c dễ chịu, thoải m&aacute;i nhờ c&aacute;c th&agrave;nh phần dưỡng ẩm, thanh lọc &amp; chống l&atilde;o h&oacute;a mạnh mẽ. Loại kem n&agrave;y được d&ugrave;ng cho da sau cạo r&acirc;u v&agrave; cả da kh&ocirc;ng cạo.<br />\r\nKem được chế tạo theo c&ocirc;ng thức đặc biệt gi&uacute;p săn chắc khu&ocirc;n mặt v&agrave; bảo vệ da khỏi những t&aacute;c động b&ecirc;n ngo&agrave;i.</p>', '<p>- Glycerin: chất giữ ẩm c&oacute; nguồn gốc thực vật.<br />\r\n- Chiết xuất l&ocirc; hội: chữa l&agrave;nh, t&aacute;i tạo, l&agrave;m mềm da, giữ ẩm v&agrave; l&agrave;m dịu da.<br />\r\n- Chiết xuất bạc h&agrave;: l&agrave;m dịu, kh&aacute;ng khuẩn, thanh lọc, l&agrave;m se da v&agrave; sảng kho&aacute;i l&agrave;n da.<br />\r\n- Chiết xuất tre: t&aacute;i tạo, t&aacute;i cấu tr&uacute;c, phục hồi da<br />\r\n- Chiết xuất cam thảo &amp; diatami:L&agrave;m dịu v&agrave; chống oxy h&oacute;a.</p>', '\"\"', 100, 1, 0, 0, '2021-11-26 08:31:40', '2021-11-26 08:31:40'),
(4, 3, 4, 'Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush', 'Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush', 'Japan', NULL, 'userfiles/images/product/2021/11/1637915914.7939.png', NULL, 'userfiles/images/product_thumb/2021/11/1637915914.7939.png', '\"\"', NULL, NULL, NULL, '<p>C&ocirc;ng nghệ chống nắng vật l&yacute; v&agrave; chống l&atilde;o ho&aacute; cho da m&ocirc;i<br />\r\nKết cấu son mượt m&agrave;, nhẹ t&ecirc;nh<br />\r\nĐộ ẩm c&ugrave;ng độ dưỡng collagen kh&ocirc;ng l&agrave;m kh&ocirc; m&ocirc;i<br />\r\nLớp kết th&uacute;c l&igrave; mịn, m&agrave;u l&ecirc;n sắc n&eacute;t<br />\r\nBền m&agrave;u suốt ng&agrave;y d&agrave;i</p>\r\n\r\n<p>L&agrave; gam son pha trộn ho&agrave;n hảo giữa sắc cam ngả sang n&acirc;u, t&ocirc;n vinh n&eacute;t ph&oacute;ng kho&aacute;ng, thanh lịch của c&ocirc; n&agrave;ng hiện đại, ph&aacute; c&aacute;ch nhưng kh&ocirc;ng k&eacute;m phần duy&ecirc;n d&aacute;ng.</p>', '<p>Exthylhexyl Methoxycinamate, Diisostearyl Malate, Caprylic, Capric Triglyiceride, Collagen Extract, Dầu Prunus Yedoensis Flower Extract, Dầu Olive, Dầu Camellia, Dầu Jojoba, Dầu Macadamia, S&aacute;p Candelilla, S&aacute;p ong&nbsp;</p>', '\"\"', 1, 1, 0, 0, '2021-11-26 08:38:36', '2021-11-26 09:57:56'),
(5, 3, 5, 'M.O.I Matte Lipstick – LOVE No. 1', 'M.O.I Matte Lipstick – LOVE No. 1', 'Korea', NULL, 'userfiles/images/product/2021/11/1637916316.9567.png', NULL, 'userfiles/images/product_thumb/2021/11/1637916316.9567.png', '\"\"', NULL, NULL, NULL, '<p>Hồng đất dạng l&igrave; được v&iacute; như thỏi son &ldquo;vạn người m&ecirc;&rdquo; v&igrave; kh&ocirc;ng qu&aacute; tương phản với l&agrave;n da, nhờ sự kết hợp h&agrave;i h&ograve;a giữa 3 m&agrave;u hồng, đỏ v&agrave; n&acirc;u. Hồng đất d&agrave;nh cho những c&ocirc; n&agrave;ng tinh tế v&igrave; mang lại một bờ m&ocirc;i tự nhi&ecirc;n gợi cảm tinh tế, nhưng vẫn to&aacute;t được n&eacute;t ngọt ng&agrave;o dịu d&agrave;ng.</p>\r\n\r\n<p>* Ưu điểm sản phẩm :<br />\r\n+ Nhẹ m&ocirc;i, dễ chịu khi d&ugrave;ng thường xuy&ecirc;n.<br />\r\n+ Chất dưỡng ẩm s&acirc;u v&agrave; gi&uacute;p m&ocirc;i mềm mượt.<br />\r\n+ M&ugrave;i vanila ngọt ng&agrave;o<br />\r\n+ B&aacute;m v&agrave; giữ m&agrave;u từ 6-8 tiếng.<br />\r\n+ Bảo vệ m&ocirc;i dưới &aacute;nh nắng tia cực t&iacute;m.<br />\r\n+ Chống l&atilde;o h&oacute;a cho m&ocirc;i.</p>', '<p>Diisostearyl Malate, Dicaprylyl Carbonate, Hydrogenated Castor Oil, Silica, Titanium Dioxide, Caprylic/Capric Triglyceride, Ceresin, Talc, Euphorbia Cerifera (Candelilla) Wax, Dimethicone/Vinyl Dimethicone Crosspolymer, Mica, Microcrystalline Wax, Mineral Oil, CI 19140, CI 77492, Sorbitan Sesquioleate, Polyethylene, CI 15850:1, Tocopheryl Acetate, CI 77491, Ultramarines, Dimethicone, Simmondsia Chinensis (Jojoba) Seed Oil, Caprylyl Glycol, Camellia Japonica Seed Oil, Argania Spinosa Kernel Oil, Fragrance, Glycerin, BHT, Caprylhydroxamic Acid.</p>', '\"\"', 1, 1, 0, 0, '2021-11-26 08:45:19', '2021-11-26 09:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_bestseller`
--

CREATE TABLE `product_bestseller` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `date_saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `counts` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` int(11) NOT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `note`, `status`, `created_at`, `updated_at`) VALUES
(101, 'Hà Nội', NULL, 1, NULL, NULL),
(103, 'Hải Phòng', NULL, 1, NULL, NULL),
(107, 'Hải Dương', NULL, 1, NULL, NULL),
(109, 'Hưng Yên', NULL, 1, NULL, NULL),
(111, 'Hà Nam', NULL, 1, NULL, NULL),
(113, 'Nam Định', NULL, 1, NULL, NULL),
(115, 'Thái Bình', NULL, 1, NULL, NULL),
(117, 'Ninh Bình', NULL, 1, NULL, NULL),
(201, 'Hà Giang', NULL, 1, NULL, NULL),
(203, 'Cao Bằng', NULL, 1, NULL, NULL),
(205, 'Lào Cai', NULL, 1, NULL, NULL),
(207, 'Bắc Cạn', NULL, 1, NULL, NULL),
(209, 'Lạng Sơn', NULL, 1, NULL, NULL),
(211, 'Tuyên Quang', NULL, 1, NULL, NULL),
(213, 'Yên Bái', NULL, 1, NULL, NULL),
(215, 'Thái Nguyên', NULL, 1, NULL, NULL),
(217, 'Phú Thọ', NULL, 1, NULL, NULL),
(219, 'Vĩnh Phúc', NULL, 1, NULL, NULL),
(221, 'Bắc Giang', NULL, 1, NULL, NULL),
(223, 'Bắc Ninh', NULL, 1, NULL, NULL),
(225, 'Quảng Ninh', NULL, 1, NULL, NULL),
(301, 'Điện Biên', NULL, 1, NULL, NULL),
(302, 'Lai Châu', NULL, 1, NULL, NULL),
(303, 'Sơn La', NULL, 1, NULL, NULL),
(305, 'Hòa Bình', NULL, 1, NULL, NULL),
(401, 'Thanh Hoá', NULL, 1, NULL, NULL),
(403, 'Nghệ An', NULL, 1, NULL, NULL),
(405, 'Hà Tĩnh', NULL, 1, NULL, NULL),
(407, 'Quảng Bình', NULL, 1, NULL, NULL),
(409, 'Quảng Trị', NULL, 1, NULL, NULL),
(411, 'Thừa Thiên - Huế', NULL, 1, NULL, NULL),
(501, 'Đà Nẵng', NULL, 1, NULL, NULL),
(503, 'Quảng Nam', NULL, 1, NULL, NULL),
(505, 'Quảng Ngãi', NULL, 1, NULL, NULL),
(507, 'Bình Định', NULL, 1, NULL, NULL),
(509, 'Phú Yên', NULL, 1, NULL, NULL),
(511, 'Khánh Hòa', NULL, 1, NULL, NULL),
(601, 'Kon Tum', NULL, 1, NULL, NULL),
(603, 'Gia Lai', NULL, 1, NULL, NULL),
(605, 'Đắc Lắk', NULL, 1, NULL, NULL),
(606, 'Đắk Nông', NULL, 1, NULL, NULL),
(701, 'TP Hồ Chí Minh', NULL, 1, NULL, NULL),
(703, 'Lâm Đồng', NULL, 1, NULL, NULL),
(705, 'Ninh Thuận', NULL, 1, NULL, NULL),
(707, 'Bình Phước', NULL, 1, NULL, NULL),
(709, 'Tây Ninh', NULL, 1, NULL, NULL),
(711, 'Bình Dương', NULL, 1, NULL, NULL),
(713, 'Đồng Nai', NULL, 1, NULL, NULL),
(715, 'Bình Thuận', NULL, 1, NULL, NULL),
(717, 'Bà Rịa - Vũng Tàu', NULL, 1, NULL, NULL),
(801, 'Long An', NULL, 1, NULL, NULL),
(803, 'Đồng Tháp', NULL, 1, NULL, NULL),
(805, 'An Giang', NULL, 1, NULL, NULL),
(807, 'Tiền Giang', NULL, 1, NULL, NULL),
(809, 'Vĩnh Long', NULL, 1, NULL, NULL),
(811, 'Bến Tre', NULL, 1, NULL, NULL),
(813, 'Kiên Giang', NULL, 1, NULL, NULL),
(815, 'Cần Thơ', NULL, 1, NULL, NULL),
(816, 'Hậu Giang', NULL, 1, NULL, NULL),
(817, 'Trà Vinh', NULL, 1, NULL, NULL),
(819, 'Sóc Trăng', NULL, 1, NULL, NULL),
(821, 'Bạc Liêu', NULL, 1, NULL, NULL),
(823, 'Cà Mau', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_products`
--

CREATE TABLE `review_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `heart` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revolution_sliders`
--

CREATE TABLE `revolution_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('SLIDE_NO_TYPE','SLIDE_WRITTER','SLIDE_BTN_WRITTER') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_writter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `revolution_sliders`
--

INSERT INTO `revolution_sliders` (`id`, `type`, `image`, `title`, `type_writter`, `btn_name`, `link`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SLIDE_WRITTER', 'http://127.0.0.1:8000/userfiles/images/rs-sliders/POD-600x300.png', NULL, 'MUA 2 TINH 1 DUY NHAT HOM NAY', NULL, '/', 1, '1', '2021-11-25 09:45:09', '2021-11-25 09:46:11'),
(2, 'SLIDE_WRITTER', 'http://127.0.0.1:8000/userfiles/images/rs-sliders/POD-TGNH.jpg', NULL, 'SALE OFF BLACK FRIDAY 20%', NULL, '/', 1, '1', '2021-11-25 09:45:12', '2021-11-25 09:45:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `page_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_robot` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seo_pages`
--

INSERT INTO `seo_pages` (`id`, `title`, `pid`, `page_name`, `seo_desc`, `seo_keyword`, `seo_robot`, `created_at`, `updated_at`) VALUES
(1, 'Home Page - ANH PW He thong nuoc  hoa chinh hang', NULL, 'home_page', 'He thong nuoc hoa chinh hang phan phoi tren toan quoc', 'nuoc hoa, chinh hang, toan quoc', 'INDEX, FOLLOW', '2021-11-24 03:37:08', '2021-11-27 03:11:51'),
(2, 'Anh PW - Store', NULL, 'store', 'He thong store chinh hang', 'store, location, showroom, workshop', 'INDEX, FOLLOW', '2021-11-24 03:38:24', '2021-11-26 07:19:44'),
(3, 'Versace Eros For Men', 1, NULL, 'Versace Eros For Men', 'versace, erors, for men', 'INDEX, FOLLOW', '2021-11-26 07:36:20', '2021-11-26 08:12:35'),
(4, 'ORISING SKINCARE ANTI-AGING SET', 2, NULL, 'orising', 'orising', 'INDEX, FOLLOW', '2021-11-26 08:16:33', '2021-11-26 08:24:18'),
(5, 'Hydra-Protect Smooth Cream', 3, NULL, 'lange', 'lange', 'INDEX, FOLLOW', '2021-11-26 08:31:40', '2021-11-26 08:31:40'),
(6, 'Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush', 4, NULL, 'sakura', 'sakura', 'INDEX, FOLLOW', '2021-11-26 08:38:36', '2021-11-26 09:57:56'),
(7, 'M.O.I Matte Lipstick – LOVE No. 1', 5, NULL, 'MOI', 'MOI', 'INDEX, FOLLOW', '2021-11-26 08:45:19', '2021-11-26 09:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_setting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('json','text','image') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `value_setting`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'socials', '[{\"facebook\":\"{\\\"icon\\\": \\\"<i class=\\\\\\\"fa fa-facebook\\\\\\\"><\\/i>\\\", \\\"class\\\": \\\"fa fa-facebook\\\", \\\"background_hover\\\": \\\"g-bg-facebook--hover\\\", \\\"link\\\":\\\"google.com\\\"}\"},{\"youtube\":\"{\\\"icon\\\": \\\"<i class=\\\\\\\"fa fa-youtube\\\\\\\"><\\/i>\\\", \\\"class\\\": \\\"fa fa-youtube\\\", \\\"background_hover\\\": \\\"g-bg-google-plus--hover\\\", \\\"link\\\":\\\"google.com\\\"}\"}]', 'json', 1, '2021-11-22 14:44:21', '2021-11-22 15:03:00'),
(2, 'phone', '0976 764 205', 'text', 1, '2021-11-23 03:16:19', '2021-11-23 03:16:19'),
(3, 'email', 'besanh123@gmail.com', 'text', 1, '2021-11-23 03:16:50', '2021-11-23 03:16:50'),
(4, 'address', '487 Huynh Tan Phat Street, 7 District', 'text', 1, '2021-11-23 03:17:34', '2021-11-23 03:17:34'),
(5, 'payment', '<li class=\"list-inline-item g-cursor-pointer mr-1\">\r\n                        <i class=\"fa fa-cc-visa\" title=\"Visa\" data-toggle=\"tooltip\" data-placement=\"top\"></i>\r\n                    </li>\r\n                    <li class=\"list-inline-item g-cursor-pointer mx-1\">\r\n                        <i class=\"fa fa-cc-paypal\" title=\"Paypal\" data-toggle=\"tooltip\" data-placement=\"top\"></i>\r\n                    </li>\r\n                    <li class=\"list-inline-item g-cursor-pointer mx-1\">\r\n                        <i class=\"fa fa-cc-mastercard\" title=\"Master Card\" data-toggle=\"tooltip\"\r\n                            data-placement=\"top\"></i>\r\n                    </li>\r\n                    <li class=\"list-inline-item g-cursor-pointer ml-1\">\r\n                        <i class=\"fa fa-cc-stripe\" title=\"Stripe\" data-toggle=\"tooltip\" data-placement=\"top\"></i>\r\n                    </li>\r\n                    <li class=\"list-inline-item g-cursor-pointer ml-1\">\r\n                        <i class=\"fa fa-cc-discover\" title=\"Discover\" data-toggle=\"tooltip\" data-placement=\"top\"></i>\r\n                    </li>\r\n                    <li class=\"list-inline-item g-cursor-pointer ml-1\">\r\n                        <i class=\"fa fa-cc-jcb\" title=\"JCB\" data-toggle=\"tooltip\" data-placement=\"top\"></i>\r\n                    </li>', 'text', 1, '2021-11-23 03:19:30', '2021-11-23 03:19:30'),
(6, 'logo', 'http://127.0.0.1:8000/userfiles/images/logo/home-2.png', 'image', 1, '2021-11-23 09:41:42', '2021-11-23 09:41:42'),
(7, 'order_msg_complete', '[{\"title\": \"Your Order Is Completed!\", \"content\": \"Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.\"}]', 'json', 1, '2021-11-27 15:06:32', '2021-11-27 15:06:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_fees`
--

CREATE TABLE `shipping_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_fees`
--

INSERT INTO `shipping_fees` (`id`, `destination`, `delivery_type`, `delivery_time`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ho Chi Minnh city', 'standard', '2-3 Working days', '15k VND', 1, '2021-11-26 10:37:19', '2021-11-26 10:38:36'),
(2, 'Ho Chi Minh city', 'next_day', 'Order before 12pm monday - thursday and receive it the next day', '15k VND', 1, '2021-11-26 10:39:09', '2021-11-26 10:39:09'),
(3, 'Ho Chi Minh city', 'saturday', 'Saturday delivery for orders placed before 12pm on friday', '20k VND', 1, '2021-11-26 10:39:37', '2021-11-26 10:39:37'),
(4, 'Ha Noi', 'standard', '3-9 Working days', '20k VND', 1, '2021-11-26 10:40:22', '2021-11-26 10:40:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:16:\"Versace Eros EDP\";s:5:\"price\";d:2795000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:16:\"Versace Eros EDP\";s:6:\"sap_id\";s:9:\"I00006198\";s:7:\"barcode\";s:13:\"8011003861224\";s:3:\"pid\";i:1;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:1;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637914345.6579.png\";s:7:\"b_alias\";s:7:\"versace\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 01:51:23', NULL),
('12', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:16:\"Versace Eros EDP\";s:5:\"price\";d:2795000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:16:\"Versace Eros EDP\";s:6:\"sap_id\";s:9:\"I00006198\";s:7:\"barcode\";s:13:\"8011003861224\";s:3:\"pid\";i:1;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:1;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637914345.6579.png\";s:7:\"b_alias\";s:7:\"versace\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 07:47:48', NULL),
('14', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"e0d5412894d529845f6dd76329e75bf1\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e0d5412894d529845f6dd76329e75bf1\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:31:\"ORISING SKINCARE ANTI-AGING SET\";s:5:\"price\";d:3780000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:31:\"ORISING SKINCARE ANTI-AGING SET\";s:6:\"sap_id\";s:9:\"I00005975\";s:7:\"barcode\";s:13:\"8027375018104\";s:3:\"pid\";i:2;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:3;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:51:\"userfiles/images/product/2021/11/1637915057.093.png\";s:7:\"b_alias\";s:7:\"orising\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 07:58:17', NULL),
('15', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{s:32:\"f7e0a7bb31a202e0116251fd2b838de9\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"f7e0a7bb31a202e0116251fd2b838de9\";s:2:\"id\";i:4;s:3:\"qty\";i:1;s:4:\"name\";s:58:\"Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush\";s:5:\"price\";d:389000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:58:\"Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush\";s:6:\"sap_id\";s:9:\"I00006133\";s:7:\"barcode\";s:13:\"8809442227493\";s:3:\"pid\";i:4;s:4:\"capa\";s:4:\"3.5g\";s:7:\"capa_id\";i:3;s:5:\"stock\";i:10;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637915914.7939.png\";s:7:\"b_alias\";s:11:\"yumeisakura\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"e0d5412894d529845f6dd76329e75bf1\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e0d5412894d529845f6dd76329e75bf1\";s:2:\"id\";i:2;s:3:\"qty\";i:2;s:4:\"name\";s:31:\"ORISING SKINCARE ANTI-AGING SET\";s:5:\"price\";d:3780000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:31:\"ORISING SKINCARE ANTI-AGING SET\";s:6:\"sap_id\";s:9:\"I00005975\";s:7:\"barcode\";s:13:\"8027375018104\";s:3:\"pid\";i:2;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:3;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:51:\"userfiles/images/product/2021/11/1637915057.093.png\";s:7:\"b_alias\";s:7:\"orising\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:16:\"Versace Eros EDP\";s:5:\"price\";d:2795000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:16:\"Versace Eros EDP\";s:6:\"sap_id\";s:9:\"I00006198\";s:7:\"barcode\";s:13:\"8011003861224\";s:3:\"pid\";i:1;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:1;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637914345.6579.png\";s:7:\"b_alias\";s:7:\"versace\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 10:14:19', NULL),
('2', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"f7e0a7bb31a202e0116251fd2b838de9\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"f7e0a7bb31a202e0116251fd2b838de9\";s:2:\"id\";i:4;s:3:\"qty\";s:1:\"2\";s:4:\"name\";s:58:\"Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush\";s:5:\"price\";d:389000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:58:\"Yumeisakura Matte Revolution Lipstick Yms14 - Orange Crush\";s:6:\"sap_id\";s:9:\"I00006133\";s:7:\"barcode\";s:13:\"8809442227493\";s:3:\"pid\";i:4;s:4:\"capa\";s:4:\"3.5g\";s:7:\"capa_id\";i:3;s:5:\"stock\";i:10;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637915914.7939.png\";s:7:\"b_alias\";s:11:\"yumeisakura\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 01:54:55', NULL),
('4', 'shopping', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"31ae27ce1626a254c4f3fc94d57a1de8\";s:2:\"id\";i:1;s:3:\"qty\";i:1;s:4:\"name\";s:16:\"Versace Eros EDP\";s:5:\"price\";d:2795000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:14:{s:7:\"taxRate\";i:0;s:7:\"isSaved\";b:0;s:8:\"discount\";i:0;s:8:\"name_seo\";s:16:\"Versace Eros EDP\";s:6:\"sap_id\";s:9:\"I00006198\";s:7:\"barcode\";s:13:\"8011003861224\";s:3:\"pid\";i:1;s:4:\"capa\";s:6:\"100 ml\";s:7:\"capa_id\";i:1;s:5:\"stock\";i:100;s:4:\"note\";N;s:8:\"bookmark\";s:0:\"\";s:5:\"image\";s:52:\"userfiles/images/product/2021/11/1637914345.6579.png\";s:7:\"b_alias\";s:7:\"versace\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:16:\"App\\Models\\Carts\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-11-29 04:46:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_providers`
--

CREATE TABLE `social_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `province_id`, `name`, `location`, `link`, `tel`, `email`, `website`, `working_time`, `image`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 701, '7 District', 'HTP', NULL, '090', 'anh@gmail.com', NULL, 'Mon - Sat: 9.30AM - 06.00PM', 'userfiles/images/stores/2021/11/1637667821.827.jpg', NULL, 1, 0, 0, '2021-11-23 11:39:59', '2021-11-23 11:46:02'),
(2, 101, 'Dong Da', 'Dong Da District', NULL, '090', 'anh@gmail.com', 'anhpw.com', 'Mon - Sat: 9.30AM - 06.00PM', '', NULL, 1, 0, 0, '2021-11-24 04:00:02', '2021-11-24 08:36:28'),
(3, 101, 'Dong Da 1', 'Dong Da District', NULL, '090', NULL, NULL, 'Mon - Sat: 9.30AM - 06.00PM', '', NULL, 1, 0, 0, '2021-11-24 04:00:02', '2021-11-24 08:31:55'),
(4, 101, 'Dong Da 2', 'Dong Da District', NULL, '090', NULL, NULL, 'Mon - Sat: 9.30AM - 06.00PM', '', NULL, 1, 0, 0, '2021-11-24 04:00:03', '2021-11-24 08:32:05'),
(5, 701, '2 District', '2 District', NULL, NULL, NULL, NULL, 'Mon - Sat: 9.30AM - 06.00PM', '', NULL, 1, 0, 0, '2021-11-24 04:00:34', '2021-11-24 04:00:34'),
(6, 701, 'District 3', 'Tran Quang Dieu', NULL, '+84948754929', 'huyenthu@gmail.com', 'minri', 'Mon - Sat: 9.30AM - 06.00PM', '', NULL, 1, 0, 0, '2021-11-24 09:17:41', '2021-11-24 09:17:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `updated_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_consignees`
--
ALTER TABLE `bill_consignees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_customers`
--
ALTER TABLE `bill_customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_invoices`
--
ALTER TABLE `bill_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `capacities`
--
ALTER TABLE `capacities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_type_id_foreign` (`type_id`);

--
-- Chỉ mục cho bảng `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_bestseller`
--
ALTER TABLE `product_bestseller`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review_products`
--
ALTER TABLE `review_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `revolution_sliders`
--
ALTER TABLE `revolution_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_fees`
--
ALTER TABLE `shipping_fees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_province_id_foreign` (`province_id`);

--
-- Chỉ mục cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_consignees`
--
ALTER TABLE `bill_consignees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bill_customers`
--
ALTER TABLE `bill_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_invoices`
--
ALTER TABLE `bill_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82314;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_bestseller`
--
ALTER TABLE `product_bestseller`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=824;

--
-- AUTO_INCREMENT cho bảng `review_products`
--
ALTER TABLE `review_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `revolution_sliders`
--
ALTER TABLE `revolution_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `shipping_fees`
--
ALTER TABLE `shipping_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
