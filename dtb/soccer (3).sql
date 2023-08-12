-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2023 lúc 11:48 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `soccer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(10) UNSIGNED NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_thumbnails` varchar(255) DEFAULT NULL,
  `categories_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_thumbnails`, `categories_status`, `created_at`, `updated_at`) VALUES
(2, 'Shirts', 'images/products/Shirts/Shirts.jpg', 'active', '2023-08-10 05:04:37', '2023-08-10 05:04:37'),
(3, 'Shorts', 'images/products/Shorts/shorts1.webp', 'active', '2023-08-10 23:22:09', '2023-08-10 23:22:09'),
(5, 'Caps', 'images/products/Caps/capblack.webp', 'active', '2023-08-11 08:38:39', '2023-08-11 08:38:39'),
(6, 'Stockings', 'images/products/Stockings/stockingblack.webp', 'active', '2023-08-11 08:44:39', '2023-08-11 08:44:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(13, 'xssas', 'asas', 'sasas', 'asasas', '2023-08-11 22:43:51', '2023-08-11 22:43:51'),
(14, 'dsdsa', 'phuhoang136@gmail.com', 'asas', 'asasa', '2023-08-11 22:44:43', '2023-08-11 22:44:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `matches`
--

CREATE TABLE `matches` (
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` int(10) UNSIGNED NOT NULL,
  `away_team_id` int(10) UNSIGNED NOT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `home_goals` int(11) NOT NULL DEFAULT 0,
  `away_goals` int(11) NOT NULL DEFAULT 0,
  `result` enum('Lose','Draw','Win','Not Started') NOT NULL DEFAULT 'Not Started',
  `league` enum('PremierLeague','FA','CommunityShield') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `matches`
--

INSERT INTO `matches` (`match_id`, `home_team_id`, `away_team_id`, `venue`, `date`, `home_goals`, `away_goals`, `result`, `league`, `created_at`, `updated_at`) VALUES
(1, 19, 24, NULL, '2023-09-30 00:00:00', 1, 0, 'Win', 'PremierLeague', NULL, '2023-08-11 01:59:01'),
(2, 19, 26, NULL, '2023-10-07 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(3, 19, 22, NULL, '2023-12-01 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(4, 19, 25, NULL, '2023-10-05 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(5, 19, 20, NULL, '2023-09-26 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(6, 19, 23, NULL, '2023-09-30 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(7, 19, 21, NULL, '2023-12-26 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(8, 24, 26, NULL, '2023-10-28 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(9, 24, 22, NULL, '2023-11-27 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(10, 24, 25, NULL, '2023-11-16 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(11, 24, 20, NULL, '2023-09-18 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(12, 24, 23, NULL, '2023-08-19 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(13, 24, 21, NULL, '2023-08-23 00:00:00', 0, 0, 'Draw', 'PremierLeague', NULL, '2023-08-11 20:37:03'),
(14, 26, 22, NULL, '2023-11-18 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(15, 26, 25, NULL, '2023-08-14 00:00:00', 2, 0, 'Win', 'PremierLeague', NULL, '2023-08-11 23:34:29'),
(16, 26, 20, NULL, '2023-08-04 00:00:00', 1, 0, 'Win', 'PremierLeague', NULL, '2023-08-11 01:32:59'),
(17, 26, 23, NULL, '2023-12-22 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(18, 26, 21, NULL, '2023-12-29 00:00:00', 0, 5, 'Lose', 'PremierLeague', NULL, '2023-08-11 20:37:22'),
(19, 22, 25, NULL, '2023-12-16 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(20, 22, 20, NULL, '2023-12-04 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(21, 22, 23, NULL, '2023-11-01 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(22, 22, 21, NULL, '2023-10-28 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(23, 25, 20, NULL, '2023-11-20 00:00:00', 3, 3, 'Draw', 'PremierLeague', NULL, '2023-08-11 20:38:49'),
(24, 25, 23, NULL, '2023-11-24 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(25, 25, 21, NULL, '2023-11-24 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(26, 20, 23, NULL, '2023-11-21 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(27, 20, 21, NULL, '2023-08-13 00:00:00', 1, 0, 'Win', 'PremierLeague', NULL, '2023-08-11 10:32:30'),
(28, 23, 21, NULL, '2023-12-17 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(29, 20, 19, NULL, '2023-10-18 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(30, 20, 21, NULL, '2023-10-21 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(31, 20, 24, NULL, '2023-08-05 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(32, 20, 25, NULL, '2023-10-15 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(33, 20, 23, NULL, '2023-09-22 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(34, 20, 26, NULL, '2023-08-16 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(35, 20, 22, NULL, '2023-11-04 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(36, 19, 21, NULL, '2023-08-21 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(37, 19, 24, NULL, '2023-11-10 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(38, 19, 25, NULL, '2023-11-27 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(39, 19, 23, NULL, '2023-08-10 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(40, 19, 26, NULL, '2023-09-22 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(41, 19, 22, NULL, '2023-08-04 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(42, 21, 24, NULL, '2023-11-16 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(43, 21, 25, NULL, '2023-11-22 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(44, 21, 23, NULL, '2023-11-06 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(45, 21, 26, NULL, '2023-09-27 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(46, 21, 22, NULL, '2023-10-05 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(47, 24, 25, NULL, '2023-11-09 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(48, 24, 23, NULL, '2023-11-08 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(49, 24, 26, NULL, '2023-08-21 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(50, 24, 22, NULL, '2023-10-23 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(51, 25, 23, NULL, '2023-11-26 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(52, 25, 26, NULL, '2023-11-30 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(53, 25, 22, NULL, '2023-09-22 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(54, 23, 26, NULL, '2023-08-02 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(55, 23, 22, NULL, '2023-08-15 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(56, 26, 22, NULL, '2023-08-23 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(57, 24, 26, NULL, '2023-09-01 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(58, 24, 25, NULL, '2023-10-07 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(59, 24, 21, NULL, '2023-08-19 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(60, 24, 20, NULL, '2023-10-13 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(61, 24, 22, NULL, '2023-09-18 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(62, 24, 19, NULL, '2023-11-19 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(63, 24, 23, NULL, '2023-09-12 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(64, 26, 25, NULL, '2023-10-15 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(65, 26, 21, NULL, '2023-08-08 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(66, 26, 20, NULL, '2023-09-04 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(67, 26, 22, NULL, '2023-10-14 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(68, 26, 19, NULL, '2023-11-24 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(69, 26, 23, NULL, '2023-08-03 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(70, 25, 21, NULL, '2023-09-12 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(71, 25, 20, NULL, '2023-08-15 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(72, 25, 22, NULL, '2023-10-06 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(73, 25, 19, NULL, '2023-12-13 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(74, 25, 23, NULL, '2023-09-20 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(75, 21, 20, NULL, '2023-11-11 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(76, 21, 22, NULL, '2023-11-24 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(77, 21, 19, NULL, '2023-08-15 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(78, 21, 23, NULL, '2023-09-01 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(79, 20, 22, NULL, '2023-11-30 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(80, 20, 19, NULL, '2023-09-23 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(81, 20, 23, NULL, '2023-12-25 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(82, 22, 19, NULL, '2023-08-02 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(83, 22, 23, NULL, '2023-09-09 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(84, 19, 23, NULL, '2023-10-20 00:00:00', 0, 0, 'Not Started', 'PremierLeague', NULL, NULL),
(85, 21, 26, NULL, '2023-10-29 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(86, 21, 22, NULL, '2023-09-24 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(87, 21, 25, NULL, '2023-12-20 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(88, 21, 19, NULL, '2023-11-23 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(89, 21, 23, NULL, '2023-10-25 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(90, 21, 24, NULL, '2023-11-12 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(91, 21, 20, NULL, '2023-12-01 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(92, 26, 22, NULL, '2023-09-30 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(93, 26, 25, NULL, '2023-10-26 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(94, 26, 19, NULL, '2023-08-31 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(95, 26, 23, NULL, '2023-08-22 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(96, 26, 24, NULL, '2023-11-18 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(97, 26, 20, NULL, '2023-08-21 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(98, 22, 25, NULL, '2023-12-13 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(99, 22, 19, NULL, '2023-08-04 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(100, 22, 23, NULL, '2023-08-14 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(101, 22, 24, NULL, '2023-12-04 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(102, 22, 20, NULL, '2023-11-07 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(103, 25, 19, NULL, '2023-12-29 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(104, 25, 23, NULL, '2023-11-06 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(105, 25, 24, NULL, '2023-12-19 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(106, 25, 20, NULL, '2023-11-26 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(107, 19, 23, NULL, '2023-11-03 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(108, 19, 24, NULL, '2023-09-28 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(109, 19, 20, NULL, '2023-12-10 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(110, 23, 24, NULL, '2023-09-04 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(111, 23, 20, NULL, '2023-11-16 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL),
(112, 24, 20, NULL, '2023-08-02 00:00:00', 0, 0, 'Not Started', 'FA', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `match_plays`
--

CREATE TABLE `match_plays` (
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `match_date` date NOT NULL,
  `match_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_08_08_034717_create_users_table', 2),
(14, '2023_08_09_070102_create_tournaments_table', 3),
(15, '2023_08_09_070857_create_teams_table', 4),
(16, '2023_07_13_122224_create_contacts_table', 5),
(17, '2023_07_01_174211_create_categories_table', 6),
(18, '2023_07_03_112652_create_products_table', 6),
(19, '2023_07_04_193718_create_shipping_details_table', 6),
(20, '2023_07_06_163632_create_payments_table', 6),
(21, '2023_07_06_163748_create_orders_table', 6),
(22, '2023_07_06_180319_create_order_details_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_status`, `shipping_id`, `payment_id`, `user_id`, `order_total`, `created_at`, `updated_at`) VALUES
(26, 'inactive', 39, '33', '2', 35090000, '2023-08-12 02:30:27', '2023-08-12 02:30:27'),
(27, 'inactive', 39, '34', '2', 35090000, '2023-08-12 02:30:39', '2023-08-12 02:30:39'),
(28, 'active', 40, '35', '8', 35392500, '2023-08-12 02:37:15', '2023-08-12 02:37:15'),
(29, 'active', 41, '36', '2', 70180182, '2023-08-12 02:44:48', '2023-08-12 02:44:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_model` varchar(255) NOT NULL,
  `products_price` int(11) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `products_id`, `products_model`, `products_price`, `products_quantity`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 'Áo CR7 có dính mồ hôi', 29000000, 5, '2023-08-11 21:27:36', '2023-08-11 21:27:36'),
(2, 12, 1, 'Áo CR7 có dính mồ hôi', 29000000, 2, '2023-08-11 21:28:14', '2023-08-11 21:28:14'),
(3, 13, 1, 'Áo CR7 có dính mồ hôi', 29000000, 10, '2023-08-11 21:31:12', '2023-08-11 21:31:12'),
(4, 14, 1, 'Áo CR7 có dính mồ hôi', 29000000, 10, '2023-08-11 21:32:21', '2023-08-11 21:32:21'),
(5, 15, 1, 'Áo CR7 có dính mồ hôi', 29000000, 10, '2023-08-11 21:32:30', '2023-08-11 21:32:30'),
(6, 16, 1, 'Áo CR7 có dính mồ hôi', 29000000, 13, '2023-08-12 00:57:42', '2023-08-12 00:57:42'),
(7, 16, 2, 'Shorts', 250000, 1, '2023-08-12 00:57:42', '2023-08-12 00:57:42'),
(8, 17, 1, 'Áo CR7 có dính mồ hôi', 29000000, 13, '2023-08-12 00:57:43', '2023-08-12 00:57:43'),
(9, 17, 2, 'Shorts', 250000, 1, '2023-08-12 00:57:43', '2023-08-12 00:57:43'),
(10, 18, 1, 'Áo CR7 có dính mồ hôi', 29000000, 10, '2023-08-12 01:04:36', '2023-08-12 01:04:36'),
(11, 19, 1, 'Áo CR7 có dính mồ hôi', 29000000, 15, '2023-08-12 01:20:05', '2023-08-12 01:20:05'),
(12, 20, 1, 'Áo CR7 có dính mồ hôi', 29000000, 3, '2023-08-12 01:23:40', '2023-08-12 01:23:40'),
(13, 21, 1, 'Áo CR7 có dính mồ hôi', 29000000, 3, '2023-08-12 01:24:11', '2023-08-12 01:24:11'),
(14, 22, 1, 'Áo CR7 có dính mồ hôi', 29000000, 3, '2023-08-12 01:24:18', '2023-08-12 01:24:18'),
(15, 23, 1, 'Áo CR7 có dính mồ hôi', 29000000, 6, '2023-08-12 01:25:41', '2023-08-12 01:25:41'),
(16, 24, 1, 'Áo CR7 có dính mồ hôi', 29000000, 12, '2023-08-12 01:28:23', '2023-08-12 01:28:23'),
(17, 25, 1, 'Áo CR7 có dính mồ hôi', 29000000, 12, '2023-08-12 01:28:28', '2023-08-12 01:28:28'),
(18, 26, 1, 'Áo CR7 có dính mồ hôi', 29000000, 1, '2023-08-12 02:30:27', '2023-08-12 02:30:27'),
(19, 27, 1, 'Áo CR7 có dính mồ hôi', 29000000, 1, '2023-08-12 02:30:39', '2023-08-12 02:30:39'),
(20, 28, 1, 'Áo CR7 có dính mồ hôi', 29000000, 1, '2023-08-12 02:37:15', '2023-08-12 02:37:15'),
(21, 28, 2, 'Shorts', 250000, 1, '2023-08-12 02:37:15', '2023-08-12 02:37:15'),
(22, 29, 8, 'Nike Basic Cap', 150, 1, '2023-08-12 02:44:48', '2023-08-12 02:44:48'),
(23, 29, 1, 'Áo CR7 có dính mồ hôi', 29000000, 2, '2023-08-12 02:44:48', '2023-08-12 02:44:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(2, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(3, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(4, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(5, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(6, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(7, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(8, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(9, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(10, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(11, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(12, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(13, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(14, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(15, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(16, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(17, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(18, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(19, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(20, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(21, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(22, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(23, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(24, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(25, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(26, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(27, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(28, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(29, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(30, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(31, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(32, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(33, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(34, 'Credit/Debit Card Payment', 'inactive', NULL, NULL),
(35, 'Cash on delivery (COD)', 'inactive', NULL, NULL),
(36, 'Cash on delivery (COD)', 'inactive', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `players`
--

CREATE TABLE `players` (
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `player_photo` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'Unknown',
  `birthday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `biography` varchar(2000) NOT NULL,
  `club_number` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `clean_sheets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `player_photo`, `nationality`, `team_id`, `position`, `birthday`, `created_at`, `updated_at`, `biography`, `club_number`, `goals`, `assists`, `clean_sheets`) VALUES
(25, 'Aaron Ramsdale', 'Aaron_Ramsdale.png', 'England.png', 20, 'Goalkeeper', '1998-05-14', '2023-08-10 08:39:38', '2023-08-10 08:39:38', 'Aaron Christopher Ramsdale (born 14 May 1998) is an English professional footballer who plays as a goalkeeper for Premier League club Arsenal and the England national team.  Ramsdale began his senior club career playing for Sheffield United and signed for AFC Bournemouth in 2017. Following successive loans to Chesterfield and AFC Wimbledon, Ramsdale played a season with Bournemouth and re-joined Sheffield United in a transfer worth an initial £18 million. In 2021, Ramsdale signed for Arsenal in a club record transfer worth up to £30 million, becoming their most expensive goalkeeper.', 1, 0, 1, 36),
(26, 'Matt Turner', 'Matt_Turner.png', 'United_States.png', 20, 'Goalkeeper', '1994-06-24', '2023-08-10 08:43:01', '2023-08-10 08:43:01', 'From his very first days in the sport, the New Jersey-born keeper has repeatedly had to prove people wrong, and frequently overcome barriers and hurdles in his path. But he says all those setbacks and tough times only served to make him the player he is now, and led him to making his dream move to Arsenal, and becoming his country’s No. 1 at the World Cup.', 30, 0, 0, 0),
(27, 'Alex Rúnarsson', 'Rúnar_Alex_Rúnarsson.png', 'Iceland.png', 20, 'Goalkeeper', '1995-02-18', '2023-08-10 08:44:58', '2023-08-10 08:44:58', 'Iceland international keeper Alex kept clean sheets in half of his four Europa League games last season, as well as remaining unbeaten after coming off the bench for his Premier League debut away to Wolves in February 2021.  Arsenal won all four Europa League games he played during his debut season, after signing from French Ligue 1 side Dijon.  Previously with Reykjavik in his home country and Nordsjaelland in Denmark, Alex – who is excellent with the ball at his feet – has been a full international since making his debut in November 2017, aged 22. This season he is on loan to Belgian side OH Leuven.', 13, 0, 0, 0),
(28, 'Kieran Tierney', 'Kieran_Tierney.png', 'Scotland.png', 20, 'Defend', '1997-06-05', '2023-08-10 08:46:51', '2023-08-10 08:46:51', 'Already a firm fans’ favourite, Kieran has underlined his status as one of the best young defenders on the continent during his first two years at the club.  Signing from boyhood club Celtic – where he won four Scottish Premier League titles, two Scottish FA Cups and two Scottish League Cups all before the age of 22 – Kieran soon settled into life in London.', 3, 3, 8, 19),
(29, 'William Saliba', 'William_Saliba.png', 'France.png', 20, 'Defend', '2001-03-24', '2023-08-10 08:47:52', '2023-08-10 08:47:52', 'Promising young defender William spent the second half of last season back on loan in France, where he impressed for Nice, and is back in Ligue 1 this term, at Marseille.  The imposing right-footed centre back made 20 league appearances for Nice, winning their Player of the Month award in January 2021.  He started the last campaign as an unused sub for the Community Shield win over Liverpool, but had not made his Gunners debut by the time this season started.  The France youth international has played all his football in his home country, having joined from Saint-Etienne in 2019.', 2, 2, 1, 11),
(30, 'Gabriel Magalhães', 'Gabriel_Magalhães.png', 'Brazil.png', 20, 'Defend', '1997-12-19', '2023-08-10 08:48:49', '2023-08-10 08:48:49', 'Gabriel slotted seamlessly into the Gunners defence during his first season in London, impressing with his combativeness and composure in the back line, and contributing some important goals too.  In fact he netted on his debut, away to Fulham on the opening day of the season, and was named Arsenal.com Player of the Month for September, October and November - reward for an explosive start to his career.', 6, 10, 0, 32),
(32, 'Ben White', 'Ben_White.png', 'England.png', 20, 'Defend', '1997-08-10', '2023-08-10 08:50:02', '2023-08-10 08:50:02', 'Joining the Brighton & Hove Albion academy aged 16, he made his senior debut in August 2016, aged 18, before spending a season on loan to Newport County in League Two in 2017/18. The second half of the following campaign was spent on loan to Peterborough United in League One before another successful temporary switch followed – playing every game as he helped Leeds United win the 2019/20 Championship title, winning their Young Player of the Season Award in the process and also being named in the PFA Championship Team of the Year.', 4, 2, 5, 33),
(33, 'Jakub Kiwior', 'Jakub_Kiwior.png', 'Poland.png', 20, 'Defend', '2000-02-15', '2023-08-10 08:51:17', '2023-08-10 08:51:17', 'Jakub spent his youth career at Polish club GKS Tychy and then in Belgium with Anderlecht before moving to Slovakian side FK Zeleziarne Podbrezova as an 18-year-old.  After spending a season there, Jakub moved to MSK Zilina where he made 46 appearances. During his two seasons with the Slovakian club, he helped them to a runners-up finish in the league in his first campaign, and the Slovakian Cup final the following year.', 15, 1, 0, 1),
(34, 'Buyako Saka', 'Bukayo_Saka.png', 'England.png', 20, 'Middlefield', '2001-09-05', '2023-08-10 08:53:19', '2023-08-10 08:53:19', 'Arsenal’s Player of the Season for 2020/21, Bukayo continued to make great strides forward last term, confirming his status as one of the hottest young prospects in European football.  He notched seven goals in all competitions, and the same number of assists – no player had more for us last season. A hugely versatile player, Bukayo can play at full back but is usually deployed as a wide forward, using his pace and trickery to devastating effect.', 7, 31, 26, 32),
(35, 'Emile Smith Rowe', 'Emile_Smith_Rowe.png', 'England.png', 20, 'Middlefield', '2000-07-28', '2023-08-10 08:54:23', '2023-08-10 08:54:23', 'An immensely gifted, creative midfielder, Emile made massive strides last season and become an increasingly influential part of the team as the campaign wore on.  A product of the Hale End academy, Emile joined Arsenal when he was 10 and played ahead of his age group as he progressed through the system. He made his first-team debut early in 2018/19, aged 18, and netted his first goal just two weeks later.', 10, 12, 8, 34),
(36, 'Jorginho', 'Jorginho.png', 'Italy.png', 20, 'Middlefield', '1991-12-20', '2023-08-10 08:55:58', '2023-08-10 08:55:58', 'The Italian international joined us from Chelsea on deadline day in January 2023, adding a vast amount of experience of both club and international football to our squad.  In addition to making nearly 500 club appearances during his career, he has been a regular in the Italy national team squad for more than five years, making 46 appearances and winning Euro 2020 with his country.', 20, 21, 6, 6),
(37, 'Martin Ødegaard', 'Martin_Ødegaard.png', 'Norway.png', 20, 'Middlefield', '1998-12-17', '2023-08-10 08:57:08', '2023-08-10 08:57:08', 'Having enjoyed a highly-productive loan spell with us in the second half of last season, Martin made his switch from Real Madrid permanent in the summer.  A highly creative, technical attacking midfielder, Martin is most comfortable in the No. 10 role but can also play in deeper central midfield or out wide. Something of a child prodigy, the Norway international made his senior debut for Stromgodset aged 15, then signed for Madrid shortly afterwards and became their youngest-ever player, making his debut aged 16 years and 157 days.', 8, 23, 13, 65),
(38, 'Thomas Partey', 'Thomas_Partey.png', 'Cote_D’Ivoire.png', 20, 'Middlefield', '1993-06-13', '2023-08-10 08:58:14', '2023-08-10 08:58:14', 'Soon after arriving from Atletico Madrid just before the transfer deadline, the Ghanaian was making his mark in the Premier League – being named Man of the Match in the 1-0 win at Old Trafford.  A combative ball-winner with the ability to dominate games, Thomas lifted the Europa League and European Super Cup, and also played in the 2016 Champions League final for his previous club. During five stellar seasons in the Spanish capital, he earned a reputation as one of the league’s outstanding players.', 5, 5, 3, 42),
(39, 'Eddie Nketiah', 'Eddie_Nketiah.png', 'England.png', 20, 'Striker', '1995-05-30', '2023-08-10 08:59:30', '2023-08-10 08:59:30', 'Once again, Eddie weighed in with a number of valuable goals last season, demonstrating his striker’s instincts in both the Premier League and Europa League.  He scored a crucial late winner at home to West Ham in September, and an even later equaliser against Fulham in April, as well as three goals in Europe.', 14, 14, 3, 10),
(40, 'Gabriel Jesus', 'Gabriel_Jesus.png', 'Brazil.png', 20, 'Striker', '1997-04-03', '2023-08-10 09:00:37', '2023-08-10 09:00:37', 'A dynamic forward with a wealth of Premier League experience, Gabriel joined in the summer to reunite with Mikel Arteta, who had coached him at previous club Manchester City.  The striker, who can also play in a deeper role or on the flank, won four Premier League titles during a glittering five-and-a-half-year career with City, as well as one FA Cup, three League Cups and he played in the 2020/21 Champions League final.', 9, 69, 35, 18),
(41, 'Scott Carson', 'Scott_Carson.png', 'England.png', 19, 'Goalkeeper', '1985-09-03', '2023-08-10 09:10:40', '2023-08-11 23:31:06', 'The former England international goalkeeper signed a one-year contract extension with the Club in May 2023, keeping him at the club until the summer of 2024.   Former England international goalkeeper Scott Carson signed another season-long loan deal with Manchester City in September 2020, having originally arrived on a season-long loan deal on deadline day of the August 2019 transfer window.', 22, 5, 3333, 308),
(42, 'Stefan Ortega', 'Stefan_Ortega.png', 'Germany.png', 19, 'Goalkeeper', '1992-11-06', '2023-08-10 09:11:54', '2023-08-10 09:11:54', 'Stefan joined the Club on a free transfer in July 2022 after his contract at Arminia Bielefeld expired.  The experienced German bolsters City’s goalkeeping options and wears the No. 18 shirt.  He started all but one of Arminia Bielefeld’s Bundesliga matches last term.  In total, he made 220 appearances across two different spells at a team he joined as a youngster in 2007. He made his first-team debut four years later, helping them win promotion to 2. Bundesliga in 2013.', 18, 0, 0, 2),
(43, 'Zack Steffen', 'Zack_Steffen.png', 'United_States.png', 19, 'Goalkeeper', '1995-04-02', '2023-08-10 09:13:21', '2023-08-10 09:13:21', 'Regarded as one of the outstanding goalkeeping talents in America, Zach Steffen joined City in the summer of 2019 on a four-year deal from American side Columbus Crew SC.  Voted the MLS Allstate Goalkeeper of the Year 2018 after keeping 10 clean sheets, Zack subsequently spent the 2019/20 season on loan with German side Fortuna Dusseldorf.', 1, 0, 0, 1),
(44, 'Aymeric Laporte', 'Aymeric_Laporte.png', 'Spain.png', 19, 'Defend', '1994-05-27', '2023-08-10 09:15:13', '2023-08-10 09:15:13', 'Aymeric Laporte was a January 2018 acquisition who signed from Athletic Bilbao midway through Pep Guardiola’s second season.  The then 23-year-old arrived with a reputation as one of Europe’s most promising defenders.  Left-footed and recognised for his calmness, strength and passing ability, his consistency in City\'s defensive line was rewarded with a contract extension in February 2019, which ties him to the Club until 2025.', 14, 8, 3, 50),
(45, 'John Stones', 'Jonh_Stones.png', 'England.png', 19, 'Defend', '1994-05-28', '2023-08-10 09:16:34', '2023-08-10 09:16:34', 'A product of Barnsley’s academy, John Stones built a reputation of an assured ball-playing centre-half with Everton before signing for City in August 2016.  Already an England international, the defender penned a six-year deal to become the eighth arrival of the summer 2016 transfer window and since then, has won every domestic honour available.', 5, 8, 2, 70),
(46, 'Kyle Walker', 'Kyle_Walker.png', 'England.png', 19, 'Defend', '1990-05-28', '2023-08-10 09:17:27', '2023-08-10 09:17:27', 'Kyle Walker was City’s third signing of summer 2017, arriving on a five-year deal from Tottenham Hotspur.  Taking the number two shirt, the England international has made the right-back slot his own and won six trophies in his first two seasons.  A product of the Sheffield United academy, he spent time on loan at Northampton Town before returning to Bramall Lane and impressing in the final few games of the 2008/09 season.', 2, 8, 32, 124),
(47, 'Nathan Aké', 'Nathan_Aké.png', 'Netherlands.png', 19, 'Defend', '1995-02-18', '2023-08-10 09:18:40', '2023-08-10 09:18:40', 'Nathan Ake was Manchester City’s second signing of summer 2020, arriving on a five-year deal which keeps him at the Club until 2025.  The 28-year-old defender joined from Bournemouth, where he made 109 appearances in three seasons.  Ake played predominantly at centre-half for the Cherries, but is capable of playing left-back and started his career as a holding midfielder.', 6, 16, 6, 44),
(48, 'Rúben Dias', 'Rúben_Dias.png', 'Portugal.png', 19, 'Defend', '1997-05-14', '2023-08-10 09:19:32', '2023-08-10 09:19:32', 'The 2020/21 Premier League Player of the Season, Football Writer’s Player of the Year and Etihad Player of the Season: Ruben Dias.  When the defender joined City in September 2020, aged 23, fans weren\'t sure what to expect of the latest edition.   Nicknamed \'Ruby\', the Portugal international began his senior career at Benfica, progressing from the youth team to their B side in 2015.', 3, 3, 4, 34),
(49, 'Bernardo Silva', 'Bernardo_Silva.png', 'Portugal.png', 19, 'Middlefield', '1994-08-10', '2023-08-10 09:20:45', '2023-08-10 09:20:45', 'City signed Bernardo Silva in July 2017 after he helped Monaco to the Ligue 1 title and a hugely impressive run to the Champions League semi-finals.  Blessed with balance, guile and great technique the Portuguese midfielder is a threat both centrally and out wide and earned the nickname ‘Bubblegum’ due to the manner in which the ball sticks to his feet on mazy dribbles.', 20, 33, 33, 33),
(50, 'Jack Grealish', 'Jack_Grealish.png', 'England.png', 19, 'Striker', '1995-09-10', '2023-08-10 09:21:48', '2023-08-10 09:21:48', 'Jack Grealish joined City from Aston Villa for a British-record fee having established himself as one of the Premier League’s finest midfield technicians.  Coming through the ranks at his boyhood club, Grealish was first given a taste of senior football whilst on loan at then-League One outfit Notts County, grabbing five goals and seven assists in 37 appearances across the 2013/14 campaign.', 10, 23, 26, 19),
(51, 'Kalvin Phillips', 'Kalvin_Phillips.png', 'England.png', 19, 'Middlefield', '1995-12-02', '2023-08-10 09:22:34', '2023-08-10 09:22:34', 'Kalvin Phillips spent the first 12 years of his football career as a Leeds United player, progressing from the junior teams through the ranks until he made his debut against Wolves in April 2015 aged 19.  He then marked his senior home debut by scoring a goal in a 2-1 defeat to Cardiff that same month – realising a boyhood dream of scoring at Elland Road.', 4, 1, 3, 10),
(52, 'Kevin De Bruyne', 'Kevin_De_Bruyne.png', 'Belgium.png', 19, 'Middlefield', '1991-06-28', '2023-08-10 09:23:32', '2023-08-10 09:23:32', 'A highly rated youngster who has developed into one of the finest midfielders in the game, City secured Kevin De Bruyne’s services in the summer of 2015.  Known as one of the continent’s assist kings, he arrived with a huge reputation, but after just one full season in Manchester it was evident that it was more than justified.', 17, 64, 102, 22),
(53, 'Rodri', 'Rodri.png', 'Spain.png', 19, 'Middlefield', '1996-06-22', '2023-08-10 09:24:21', '2023-08-10 09:24:21', 'Rodrigo, the then 23-year-old Spanish midfielder, joined from Atletico Madrid and became Pep Guardiola’s second signing of the summer on 4 July 2019.   The defensively minded midfielder is most at home sitting in front of the back four, where Rodrigo has earned a reputation as one of Europe’s most exciting prospects.', 16, 14, 12, 26),
(54, 'Erling Haaland', 'Erling_Haaland.png', 'Norway.png', 19, 'Striker', '2000-07-21', '2023-08-10 09:25:17', '2023-08-10 09:25:17', 'Erling Haaland joined City from Borussia Dortmund in July 2022, after penning a five-year deal which keeps him at the Etihad Stadium until the summer of 2027.  The son of former City player Alfie, Haaland junior is widely regarded as one of Europe’s best strikers and arrived at the Club with a formidable goalscoring reputation following impressive spells at Molde FK, Red Bull Salzburg and Dortmund.', 9, 38, 8, 10),
(55, 'Julián Álvarez', 'Julián_Álvarez.png', 'Argentina.png', 19, 'Striker', '2000-01-31', '2023-08-10 09:26:32', '2023-08-10 09:26:32', 'Julian Alvarez joined City on his 22nd birthday.  The Argentinian forward had already collected five senior international caps for his country before signing his five-and-a-half-year deal in January 2022.  He remained with River Plate on loan until the summer of 2022 before moving to Manchester.', 19, 9, 0, 5),
(58, 'Matej Kovár', 'Matej_Kovár.png', 'Ukraine.png', 21, 'Goalkeeper', '2000-05-17', '2023-08-10 09:42:24', '2023-08-10 09:42:24', 'Giant keeper who was on loan with Swindon Town in the 2020/21 season and is spending this term with Sparta Prague on a similar basis.', 40, 0, 0, 0),
(59, 'Tom Heaton', 'Tom_Heaton.png', 'England.png', 21, 'Goalkeeper', '1986-04-15', '2023-08-10 09:43:30', '2023-08-10 09:43:30', 'Becoming one of a select group of United players to enjoy two spells in M16, he admitted to enjoying \"an incredible feeling\" upon making the decision to return to Old Trafford.   Heaton began his United story in 2002, when he joined the club as a trainee, and made many appearances for our youth teams before making the decision to go in search of regular first-team football.', 22, 0, 0, 28),
(60, 'Harry Maguire', 'Harry_Maguire.png', 'England.png', 21, 'Defend', '1993-03-05', '2023-08-10 09:45:15', '2023-08-10 09:45:15', 'The Sheffield-born star came through the youth system at his hometown club Sheffield United. A resilient and tough-tackling defender, Maguire progressed into the first team at the age of 18 and made his debut for the Blades against Cardiff City in April 2011.  The early signs of Harry’s quality were clear to see. Despite being introduced as a half-time substitute in that Championship clash with the Bluebirds, the then-teenager was named Man of the Match.', 5, 11, 8, 56),
(61, 'Lisandro Martínez', 'Lisandro_Martínez.png', 'Argentina.png', 21, 'Defend', '1998-01-18', '2023-08-10 09:46:17', '2023-08-10 09:46:17', 'Lisandro Martinez’s formative footballing years were spent at Argentinian sides Club Urquiza and Club Libertad, where he was spotted by Argentina Primera Division side Newell’s Old Boys. Martinez moved to Newell’s Old Boys in 2014 and was handed his senior debut for the side in June 2017 against Godoy Cruz, proving to be his only appearance for the club.', 6, 1, 0, 8),
(62, 'Raphaël Varane', 'Raphaël_Varane.png', 'France.png', 21, 'Defend', '1993-04-25', '2023-08-10 09:47:19', '2023-08-10 09:47:19', 'With three La Liga titles, four Champions League trophies, a World Cup winners’ medal and numerous other honours on his CV, it’s easy to forget that the quick and classy ball-playing centre-back is still only 28.  But then Varane has always been experienced beyond his years. Born in April 1993, he signed his first professional contract at boyhood club Lens just after turning 17, on the back of an impressive season playing with older team-mates at Under-19 level.', 19, 1, 1, 13),
(63, 'Tyrell Malacia', 'Tyrell_Malacia.png', 'Netherlands.png', 21, 'Defend', '1999-08-17', '2023-08-10 09:48:33', '2023-08-10 09:48:33', 'Aged just nine, Malacia joined the youth system of successful Eredivisie side Feyenoord. The defender continued his development with the Dutch side, and was awarded his first professional contract in 2015, at the age of 15.  Two years later, the full-back made his senior debut for Feyenoord. Malacia played the full 90 minutes as the Dutch side overcame Italian giants Napoli 2-1 in the Champions League.', 12, 0, 0, 6),
(64, 'Victor Lindelöf', 'Victor_Lindelöf.png', 'Sweden.png', 21, 'Defend', '1994-07-17', '2023-08-10 09:49:33', '2023-08-10 09:49:33', 'In June 2015, he scored in the penalty shoot-out in the European Under-21 Championship final to help earn his country a notable first international triumph.  Lindelof had only been introduced to the squad as a late call-up but performed with distinction at right-back, earning a place in UEFA\'s Team of the Tournament. It helped provide added impetus to his club career as he forced his way into the senior Benfica side and enjoyed experience in the domestic top flight and Champions League.', 2, 3, 4, 43),
(66, 'Casemiro', 'Casemiro.png', 'Brazil.png', 21, 'Middlefield', '1992-02-23', '2023-08-10 09:53:14', '2023-08-10 09:53:14', 'A Brazil international and a five-time Champions League winner, he rocks up to M16 with an elite winning mentality in tow, plus some of the keenest defensive midfield skills around. Aggressive and imposing, his thirst for interceptions, tackles and breaking up play have been lighting up the Bernabeu for years, and the club honoured him with the farewell message: \'Thank you, legend.\'', 18, 4, 3, 55),
(67, 'Christian Eriksen', 'Christian_Eriksen.png', 'Denmark.png', 21, 'Middlefield', '1992-02-14', '2023-08-10 09:54:09', '2023-08-10 09:54:09', 'A Denmark international, the former Ajax, Tottenham Hotspur, Inter Milan and Brentford joined United in July 2022 with a reputation as a talented midfielder who can carve defences open at will.  Having come through the youth set-ups of Middelfart G&BK and Odense Boldklub before joining Ajax in 2008, Eriksen made his first senior appearance in football in 2010 after he was promoted to the Dutch outfit\'s first-team.', 14, 53, 74, 40),
(68, 'Bruno Fernandes', 'Bruno_Fernandes.png', 'Portugal.png', 21, 'Middlefield', '1994-09-08', '2023-08-10 09:55:32', '2023-08-10 09:55:32', 'While the likes of Cristiano Ronaldo and Nani made their names in Portugal, Fernandes spent the first five years of his career in Italy.  A youth product at Boavista, the midfielder signed for Serie B club in Novara in August 2012, at the age of 17. Initially suffering from homesickness, he eventually grew into his new environment, teaching himself Italian and helping the Blues to fifth position, before joining Udinese in Italy\'s top tier.', 8, 44, 33, 54),
(69, 'Fred', 'Fred.png', 'Brazil.png', 21, 'Middlefield', '1993-03-05', '2023-08-10 09:56:50', '2023-08-10 09:56:50', 'As a youngster, Fred spent time at Atletico Mineiro and Porto Alegre in his native Brazil, before his rise into professional football really took off when he made the switch to Internacional in 2010. During his successful two-year spell at Estádio Beira-Rio, the dynamic midfielder won back-to-back local state championships, as well as the Recopa Sudamericana.', 17, 8, 7, 26),
(70, 'Donny van de Beek', 'FredDonny_van_de_Beek.png', 'Netherlands.png', 21, 'Middlefield', '1997-04-18', '2023-08-10 09:57:58', '2023-08-10 09:57:58', 'It was at his boyhood club that van de Beek made his name on the world scene, as part of the thrilling Ajax side that reached the 2018/19 Champions League semi-finals. Though joining United at the relatively tender age of 23, his Ajax education meant he already possessed a polished all-round game and a wealth of experience.', 34, 3, 1, 5),
(71, 'Anthony Martial', 'Anthony_Martial.png', 'France.png', 21, 'Striker', '1996-12-05', '2023-08-10 09:59:14', '2023-08-10 09:59:14', 'Martial began his career in the junior ranks of CO Les Ulis, where Henry and ex-Red Patrice Evra both started their illustrious careers. At the age of 14, he joined Lyon and became a regular for the France youth sides, earning a reputation as one of Europe’s hottest prospects. His excellent potential was so obvious that Monaco paid €5million for his signature in a transfer that rocked French football.', 9, 62, 28, 46),
(72, 'Marcus Rashford', 'Marcus_Rashford.png', 'England.png', 21, 'Striker', '1997-10-31', '2023-08-10 10:00:11', '2023-08-10 10:00:11', 'The homegrown youth product has already come such a long way in a short time and having the happy knack of scoring on his debuts has helped. He netted twice against Midtjylland when thrust into the spotlight in a Europa League tie and followed it up with a brace against Arsenal on his Premier League bow.', 10, 76, 37, 42),
(73, 'Antony', 'quay.png', 'Brazil.png', 21, 'Striker', '2000-02-24', '2023-08-10 10:01:19', '2023-08-10 10:01:19', 'Eight years later, in 2018, the then 18-year-old won the J League Challenge competition with his youth team and went on to be named the player of the tournament, prompting his senior team breakthrough.   That same year, the Brazilian signed a contract with Sao Paulo\'s first team and made his official debut on 15 November 2018.', 21, 4, 2, 5),
(74, 'Kepa Arrizabalaga', 'Kepa.png', 'Spain.png', 22, 'Goalkeeper', '1994-10-03', '2023-08-10 10:05:30', '2023-08-10 10:05:30', 'Kepa Arrizabalaga signed for Chelsea from Athletic Bilbao in August 2018. Quick and agile, Kepa possesses fantastic reflexes and developed his all-round game since establishing himself as Athletic Bilbao’s first-choice keeper. A great shot-stopper, he is confident with the ball at his feet and capable of playing out from the back.', 1, 0, 0, 35),
(75, 'Lucas Bergström', 'Lucas_Bergström.png', 'Finland.png', 22, 'Goalkeeper', '2002-09-05', '2023-08-10 10:10:31', '2023-08-10 10:10:31', 'Lucas Bergstrom is a goalkeeper who signed from Turun Palloseura in his native Finland during the 2018/19 season. He completed a successful loan spell in League One with Peterborough United in the first half of the 2022/23 season, before returning to Chelsea in January.  Following his return to the club that season, he featured for Mark Robinson\'s Under-21s side.  The 6ft 6in goalkeeper makes quality saves and is comfortable with the ball at his feet. He travelled to the USA in the summer of 2023 as part of the men\'s first team pre-season.', 47, 0, 0, 0),
(76, 'Marcus Bett', 'Marcus_Bettinelli.png', 'England.png', 22, 'Goalkeeper', '1992-05-24', '2023-08-10 10:11:39', '2023-08-10 10:11:39', 'Marcus Bettinelli joined Chelsea in July 2021. He arrived, having been out of contract at Fulham, to add strength to our goalkeeping resources following the departure of Willy Caballero.  The 6ft 4in keeper spent over a decade at Craven Cottage, making 120 appearances for the Whites, and also represented the England Under-21 team earlier in his career.', 13, 0, 0, 0),
(77, 'Ben Chilwell', 'Ben_Chilwell.png', 'England.png', 22, 'Defend', '1996-12-21', '2023-08-10 10:12:54', '2023-08-10 10:12:54', 'Ben Chilwell became a Blue on 26 August 2020 when the left-back signed a five-year contract. The England international joined us from Leicester City, the club where he began his professional career. An England international who likes to attack from left-back, contributing with assists and the occasional goal, Chilwell is equally adept at the defensive side of the game. He is a modern full-back in every sense of the phrase, combining athleticism and energy up and down the flank with excellent technique and the ability to recover with pace in defensive transition.', 21, 12, 17, 39),
(78, 'Benoît Badiashile', 'Benoît_Badiashile.png', 'France.png', 22, 'Defend', '2001-03-26', '2023-08-10 10:13:50', '2023-08-10 10:13:50', 'Benoit Badiashile completed a permanent transfer to Chelsea from Monaco in January 2023, signing a seven-and-a-half-year contract at Stamford Bridge. At 6ft 4in, Badiashile is a dominant defender in the air but equally comfortable with the ball at his feet, capable of playing short passes out from the back or switching the play with longer diagonals. His blistering speed is a key attribute and he has experience in both a back four and back three at club level.', 4, 1, 0, 4),
(79, 'Marc Cucurella', 'Marc_Cucurella.png', 'Spain.png', 22, 'Defend', '1998-07-22', '2023-08-10 10:14:45', '2023-08-10 10:14:45', 'Marc Cucurella joined Chelsea on a six-year contract in August 2022. The versatile defender arrived just weeks after his 24th birthday following an impressive debut season in the Premier League with Brighton, during which time he made 38 appearances in all competitions and scored his only goal in their penultimate home game against Manchester United.', 32, 1, 3, 12),
(80, 'Thiago Silva', 'Thiago_Silva.png', 'Brazil.png', 22, 'Defend', '1984-09-22', '2023-08-10 10:15:45', '2023-08-10 10:15:45', 'Chelsea completed the signing of one of the biggest names in world football in August 2020, with Thiago Silva joining on an initial one-year contract, which was later extended more than once. Thiago Silva has long been acknowledged as one of the world’s most accomplished and successful defenders, winning silverware in Brazil, Italy, France, now England and at international level, in addition to a long list of individual honours.', 6, 5, 2, 26),
(81, 'Trevoh Chalobah', 'Trevoh_Chalobah.png', 'England.png', 22, 'Defend', '1999-07-05', '2023-08-10 10:16:37', '2023-08-10 10:16:37', 'Trevoh Chalobah signed for Chelsea as an Under-9 and came through the Academy to progress to the men\'s first team, as his older brother Nathaniel had done. Having progressed through the youth ranks he made his initial breakthrough into senior football in 2018, with the first of three loan spells, before being brought back to Chelsea as part of Thomas Tuchel\'s squad for the start of the 2021/22 season, where he made an instant impact with a mixture of composure and passion at the back.', 14, 3, 1, 13),
(82, 'Chukwuemeka', 'Carney_Chukwuemeka.png', 'England.png', 22, 'Middlefield', '2003-10-20', '2023-08-10 10:19:35', '2023-08-10 10:19:35', 'Carney Chukwuemeka joined Chelsea on a six-year contract in August 2022. The midfield all-rounder, considered one of the brightest talents in the country, signed from Aston Villa having that summer helped England to glory at the European Under-19 Championship, scoring in the final against Israel.', 30, 0, 1, 1),
(83, 'Conor Gallagher', 'Conor_Gallagher.png', 'England.png', 22, 'Middlefield', '2000-02-06', '2023-08-10 10:20:54', '2023-08-10 10:20:54', 'Conor Gallagher is a local boy who played mostly wide during his Under-16 season and as a central midfield player in his earlier schoolboy years. It was in the latter role he has established himself as a senior professional, growing into an intelligent box-to-box midfielder with a knack for arriving in the opposition penalty area to create and score goals.', 23, 13, 6, 7),
(84, 'Enzo Fernández', 'Enzo_Fernández.png', 'Argentina.png', 22, 'Middlefield', '2001-01-17', '2023-08-10 10:21:58', '2023-08-10 10:21:58', 'Enzo Fernandez joined Chelsea from Benfica at the end of the January transfer window in 2023, signing a contract with the Blues until 2031. That was shortly after he had become a World Cup winner with Argentina in Qatar, having also caught the eye with a string of impressive performances for Benfica during his debut campaign in Europe.  Fernandez was initially a defensive-minded player, but possesses the technical ability to operate as a playmaker and the athleticism to support attacks and go box-to-box, becoming regarded as a complete midfielder.', 5, 0, 2, 6),
(85, 'Hakim Ziyech', 'Hakim_Ziyech.png', 'Morocco.png', 22, 'Middlefield', '1993-03-19', '2023-08-10 10:22:58', '2023-08-10 10:22:58', 'Hakim Ziyech completed his move to Chelsea from Ajax in July 2020, becoming eligible to represent the club from the start of the 2020/21 season. He had previously agreed to join the club on a five-year contract in February, making him the club’s first Moroccan international. The predominantly left-footed attacking midfielder caught the eye with his performances cutting in from the right wing at Ajax, but can also operate as a more traditional winger on the left or through the middle behind a striker.', 22, 6, 9, 7),
(86, 'Mykhailo Mudryk', 'Mykhailo_Mudryk.png', 'Ukraine.png', 22, 'Middlefield', '2001-01-05', '2023-08-10 10:24:26', '2023-08-10 10:24:26', 'Mykhailo Mudryk completed a move from Shakhtar Donetsk to Chelsea in January 2023. The Ukrainian international turned 22 a couple of weeks before putting pen to paper on his eight-and-a-half year contract with the Blues.  A skillful player with plenty of pace, Mudryk quickly built a reputation as one of the most dangerous attacking players in Europe in one-v-one situations during his time with Shakhtar Donetsk. Primarily a wide player, he featured on both wings in Ukraine, but many of his best performances have come when cutting in from the left onto his preferred right foot.', 15, 0, 2, 2),
(87, 'Armando Broja', 'Armando_Broja.png', 'Albania.png', 22, 'Striker', '2001-09-10', '2023-08-10 10:25:36', '2023-08-10 10:25:36', 'Armando Broja is an attacking player who signed for our Academy at the end of his Under-9 season. He has always played as an attacker, sometimes wide but mostly centrally, and scored many goals throughout his schoolboy years. Although born in England, Broja is a full international with Albania.', 18, 7, 0, 3),
(88, 'Raheem Sterling', 'Raheem_Sterling.png', 'England.png', 22, 'Striker', '1994-12-08', '2023-08-10 10:26:50', '2023-08-10 10:26:50', 'England forward Raheem Sterling joined Chelsea from Manchester City on 13 July 2022, signing a five-year contract at Stamford Bridge. A direct dribbler who thrives in any position across the front three or just behind a central striker, Sterling utilises a perfect combination of skill, speed and timing to torment defenders, whether with the ball at his feet or with his consistently productive runs in behind.', 17, 115, 59, 35),
(89, 'Adrián', 'Adrián.png', 'Spain.png', 23, 'Goalkeeper', '1987-01-03', '2023-08-10 10:42:24', '2023-08-10 10:42:24', 'Liverpool FC signed experienced goalkeeper Adrian on a free transfer in August 2019 and he played 11 games as the Premier League was won in his debut season.  The Spaniard joined the Reds after six years in the top flight with West Ham United, for whom he made a total of 150 appearances before embarking on a new chapter on Merseyside.', 13, 0, 0, 38),
(90, 'Alisson', 'Alisson.png', 'Brazil.png', 23, 'Goalkeeper', '1992-10-02', '2023-08-10 10:43:16', '2023-08-10 10:43:16', 'Alisson Becker has cemented his position as one of world football\'s most formidable goalkeepers since joining Liverpool FC in 2018.  He arrived at Anfield from AS Roma and was integral to the Champions League and Premier League triumphs in 2019 and 2020 respectively.', 1, 1, 3, 78),
(91, 'Caoimhín Kelleher', 'Caoimhín_Kelleher.png', 'Ireland.png', 23, 'Goalkeeper', '1998-11-23', '2023-08-10 10:44:23', '2023-08-10 10:44:23', 'Caoimhin Kelleher is a goalkeeper who has built a reputation as a penalty-shootout specialist since joining Liverpool FC in the summer of 2015.  The Republic of Ireland international switched to the Reds from Ringmahon Rangers and progressed through the ranks at the Academy up to senior-team duties, where he has won four shootouts - the most of any \'keeper in the club\'s history.', 62, 0, 0, 2),
(93, 'Andrew Robertson', 'Andrew_Robertson.png', 'Scotland.png', 23, 'Defend', '1994-03-11', '2023-08-10 10:47:48', '2023-08-10 10:47:48', 'Andy Robertson emerged from amateur football to become a Premier League and Champions League winner with Liverpool FC and the captain of Scotland.  Now firmly established as one of the world\'s premier full-backs, Robertson was still playing part-time for Queen\'s Park in his native Glasgow as recently as 2013.', 26, 8, 57, 76),
(94, 'Ibrahima Konaté', 'Ibrahima_Konaté.png', 'France.png', 23, 'Defend', '1999-05-25', '2023-08-10 10:48:50', '2023-08-10 10:48:50', 'Centre-back Ibrahima Konate bolstered Jürgen Klopp\'s defensive ranks when he joined Liverpool FC ahead of the 2021-22 season.  The France international agreed a move to the Reds from RB Leipzig after four seasons with the Bundesliga club in which he played almost a century of games in domestic and European competition.', 5, 0, 0, 11),
(95, 'Joe Gomez', 'Joe_Gomez.png', 'England.png', 23, 'Defend', '1997-05-23', '2023-08-10 10:49:36', '2023-08-10 10:49:36', 'A classy defender who can play anywhere across the backline, Joe Gomez has overcome serious injury setbacks to win a series of major honours with Liverpool FC.  Signed as an 18-year-old from Charlton Athletic in the summer of 2015, he has since featured for the Reds at centre-back, right-back and left-back.', 2, 0, 4, 41),
(96, 'Virgil van Dijk', 'Virgil_Van_Dijk.png', 'Netherlands.png', 23, 'Defend', '1991-07-08', '2023-08-10 10:50:25', '2023-08-10 10:50:25', 'Virgil van Dijk has established himself as one of the finest defenders in world football since joining Liverpool FC in January 2018 and is now club captain.  The powerful Netherlands international, who combines a graceful reading of the game with a dominant physical skillset, has helped the Reds lift every major trophy available to date.', 4, 20, 5, 93),
(97, 'Konstantino', 'Konstantinos_Tsimikas.png', 'GR.png', 23, 'Defend', '1996-05-12', '2023-08-10 10:51:55', '2023-08-10 10:51:55', 'Left-back Kostas Tsimikas brought title-winning and Champions League experience to Liverpool FC when he joined the club in August 2020.  The Greece international made the move to Merseyside after 86 appearances in all competitions for Olympiacos, with whom he won the domestic title in 2019-20.', 21, 0, 6, 4),
(98, 'Alexis Mac Allister', 'Alexis_Mac_Allister.png', 'Argentina.png', 23, 'Middlefield', '1998-12-24', '2023-08-10 10:55:08', '2023-08-10 10:55:08', 'World Cup winner Alexis Mac Allister arrived at Liverpool FC in the summer of 2023 from Brighton & Hove Albion.  The midfielder claimed the No.10 shirt upon his arrival to Anfield, occupying the squad number last taken by Sadio Mane after signing a long-term deal.', 10, 16, 5, 2),
(99, 'Curtis Jones', 'Curtis_Jones.png', 'England.png', 23, 'Middlefield', '2001-01-30', '2023-08-10 10:56:00', '2023-08-10 10:56:00', 'Curtis Jones is a versatile and talented midfield player who has progressed from Liverpool FC\'s Academy to the senior team.  The Scouser has been with the club since U9 level and is now firmly established in Jürgen Klopp\'s squad. He signed a new long-term contract in November 2022.', 17, 6, 4, 6),
(100, 'Harvey Elliott', 'Harvey_Elliott.png', 'England.png', 23, 'Middlefield', '2003-04-04', '2023-08-10 10:57:28', '2023-08-10 10:57:28', 'Boyhood fan Harvey Elliott has become an established member of the Liverpool FC squad since joining during the summer of 2019.  The versatile, attack-minded Elliott moved to the club after a breakthrough season with Fulham in which he made three senior appearances for the Cottagers.', 19, 1, 2, 3),
(101, 'Thiago Alcântara', 'Thiago_Alcântara.png', 'Spain.png', 23, 'Middlefield', '1991-04-11', '2023-08-10 10:58:28', '2023-08-10 10:58:28', 'Thiago Alcantara brought his wealth of experience at the elite level of European football to Liverpool FC when he signed a long-term deal in September 2020.  The Spain international completed a move from Bayern Munich, with whom he\'d lifted the Champions League the previous month to seal a 2019-20 treble with the German giants.', 6, 2, 4, 6),
(102, 'Tyler Morton', 'Tyler_Morton.png', 'England.png', 23, 'Middlefield', '2002-10-31', '2023-08-10 10:59:33', '2023-08-10 10:59:33', 'Tyler Morton is an all-action midfielder who signed a new long-term contract with Liverpool FC in January 2023 after emerging through the youth ranks.  He has been at the Academy since the age of seven and progressed to earn opportunities with the senior team.', 80, 0, 0, 0),
(103, 'Cody Gakpo', 'gakpo.png', 'Netherlands.png', 23, 'Striker', '1999-05-07', '2023-08-10 11:02:16', '2023-08-10 11:02:16', 'Liverpool FC added the reigning Dutch Footballer of the Year to their squad with the signing of versatile forward Cody Gakpo in January 2023.  Gakpo set out on his journey towards the professional game by trialling with PSV Eindhoven at the age of six, beginning a development that would see him blossom into a leading figure for club and country.', 18, 7, 2, 9),
(104, 'Mohamed Salah', 'Mohamed_Salah.png', 'Egypt.png', 23, 'Striker', '1992-06-15', '2023-08-10 11:03:20', '2023-08-10 11:03:20', 'Mohamed Salah is one of the world\'s best and most prolific forwards and a serial winner with Liverpool FC since arriving at Anfield in the summer of 2017.  The Egyptian has been an unstoppable scorer following his transfer from AS Roma and has collected medals in the Premier League, Champions League, FIFA Club World Cup, Emirates FA Cup, UEFA Super Cup, Carabao Cup and FA Community Shield.', 11, 139, 59, 50),
(105, 'Alphonse Areola', 'Alphonse_Areola.png', 'France.png', 24, 'Goalkeeper', '1993-02-27', '2023-08-10 11:07:32', '2023-08-10 11:07:32', 'France international Alphonse Areola was an ever-present as West Ham United won the UEFA Europa Conference League in June 2023.  A serial trophy winner with Paris Saint-Germain, Real Madrid and his country, the Parisian came through at France\'s famed Clairefontaine national football centre, before featuring for some of Europe\'s biggest clubs.  After a season with Fulham, Areola moved to West Ham in 2021 and has been the Club\'s regular cup competition goalkeeper, helping the Irons reach the UEFA Europa League semi-finals in 2021/22 before lifting the Conference League trophy the following season.', 23, 0, 0, 9),
(106, 'Lukasz Fabianski', 'Lukasz_Fabianski.png', 'Poland.png', 24, 'Goalkeeper', '1985-04-18', '2023-08-10 11:08:33', '2023-08-10 11:08:33', 'Polish goalkeeper Łukasz Fabiański joined West Ham United from Swansea City in June 2018, winning the Hammer of the Year award at the end of his first season in east London.  Capped 57 times by his country between 2006-21, a veteran of five major international tournaments and voted Polish Footballer of the Year in 2019, Fabiański was a Polish League title winner with Legia Warsaw as a 20-year-old before moving to English football with Arsenal in 2007.', 1, 0, 2, 89),
(107, 'Aaron Cresswell', 'Aaron_Cresswell.png', 'England.png', 24, 'Defend', '1989-12-15', '2023-08-10 11:10:04', '2023-08-10 11:10:04', 'Popular, committed and reliable, Aaron Cresswell has become an established Premier League performer and full England international since joining West Ham United from Ipswich Town in July 2014.  Born in Liverpool, Cresswell began his career with Tranmere Rovers before moving to Portman Road in 2011. He then enjoyed three outstanding seasons in the Championship with the Tractor Boys, making nearly 150 appearances and earning Player of the Year honours in 2012.', 3, 10, 30, 63),
(108, 'Angelo Ogbonna', 'Angelo_Ogbonna.png', 'Italy.png', 24, 'Defend', '1988-05-23', '2023-08-10 11:11:12', '2023-08-10 11:11:12', 'The central defender started his career with Torino before moving across the city and winning back-to-back Serie A titles with Juventus.  A UEFA Euro 2012 runner-up and Euro 2016 squad member, Ogbonna established himself as a fans\' favourite with a number of memorable goals and performances and, at the age of 35, was part of the squad which won the UEFA Europa Conference League in 2023.', 21, 8, 1, 43),
(109, 'Ben Johnson', 'Ben_Johnson.png', 'England.png', 24, 'Defend', '2000-01-24', '2023-08-10 11:12:07', '2023-08-10 11:12:07', 'Ben Johnson has thrived since being converted from a winger into an attack-minded full-back as a teenage schoolboy.  A two-footed and versatile defender, Johnson has been with West Ham United since the age of seven and featured regularly in every age-group side he has featured in, impressing with his maturity, athleticism and work ethic.', 2, 2, 0, 30),
(110, 'Kurt Zouma', 'Kurt_Zouma.png', 'France.png', 24, 'Defend', '1994-10-27', '2023-08-10 11:12:52', '2023-08-10 11:12:52', 'West Ham United signed France international Kurt Zouma from Chelsea in August 2021.  The central defender accumulated two Premier League titles, one UEFA Champions’ League winner\'s medal and one EFL Cup winner\'s medal during a seven-year career with the west London club.', 4, 12, 4, 56),
(111, 'Vladimír Coufal', 'Vladimír_Coufal.png', 'cz.png', 24, 'Defend', '1992-08-22', '2023-08-10 11:18:12', '2023-08-10 11:18:12', 'Vladimír Coufal is a committed, whole-hearted and versatile full-back who has become a true favourite among the Claret and Blue Army since arriving from Slavia Prague in October 2020.  A Czech Republic international, Coufal won two Czech titles and one Czech Cup in his homeland, made his senior debut for his country against Qatar in 2017 and featured for his country at UEFA Euro 2020.', 5, 2, 15, 25),
(112, 'Nikola Vlašić', 'Nikola_Vlasic.png', 'Croatia.png', 24, 'Middlefield', '1997-10-04', '2023-08-10 11:21:50', '2023-08-10 11:21:50', 'Nikola Vlašić says last Sunday’s Emirates FA Cup third round win over Leeds United will help West Ham United when the two clubs clash in the Premier League this weekend.  The Hammers negotiated Marcelo Bielsa’s unique playing style, which sees his players mark man-to-man and press all over the pitch, with Vlašić heavily involved in Manuel Lanzini’s opening goal in the hosts’ 2-0 victory at London Stadium.', 6, 6, 3, 30),
(113, 'Flynn Downes', 'Flynn_Downes.png', 'England.png', 24, 'Middlefield', '1999-01-20', '2023-08-10 11:23:26', '2023-08-10 11:23:26', 'Central midfielder Flynn Downes joined West Ham United in July 2022.  The Essex-born player grew up a Hammers supporter but began his own career with Ipswich Town, spending 15 years with the Suffolk club, making 99 first-team appearances and becoming one of the Tractor Boys\' youngest-ever captains.', 12, 0, 0, 7),
(114, 'Lucas Paquetá', 'Lucas_Paquetá.png', 'Brazil.png', 24, 'Defend', '1997-08-27', '2023-08-10 11:24:16', '2023-08-10 11:24:16', 'An outstanding talent able to play in a variety of midfield roles, Paquetá won the Copa América with Brazil in 2019 and scored for his country at the FIFA World Cup finals in 2022, and starred for Flamengo in his home city of Rio de Janeiro, Italian club AC Milan and Lyon.', 10, 4, 3, 4),
(115, 'Pablo Fornals', 'Pablo_Fornals.png', 'Spain.png', 24, 'Middlefield', '1996-02-22', '2023-08-10 11:25:09', '2023-08-10 11:25:09', 'A creative, technically-gifted playmaker with a relentless work-rate, Fornals joined the Hammers from Villarreal, and has since gone on to become a real favourite in east London for his whole-hearted displays and important goals, most notably the unforgettable individual strike which took the Irons through to the 2023 UEFA Europa Conference League final.', 8, 16, 13, 10),
(116, 'Tomás Soucek', 'Tomás_Soucek.png', 'cz.png', 24, 'Middlefield', '1995-02-27', '2023-08-10 11:26:52', '2023-08-10 11:26:52', 'West Ham United signed Czech Republic international Tomáš Souček from Slavia Prague on an initial loan deal until the end of the 2019/20 season in late January 2020, with an option to make the transfer permanent in the summer.  The towering central midfielder won two Czech First League titles and two Czech Cups during an outstanding career in his homeland that also saw him excel in the UEFA Champions League and UEFA Europa League for Slavia.', 22, 25, 10, 12),
(117, 'Maxwel Cornet', 'Maxwel_Cornet.png', 'Cote_D’Ivoire.png', 24, 'Striker', '1996-09-27', '2023-08-10 11:28:49', '2023-08-10 11:28:49', 'The Ivory Coast – nicknamed The Elephants – international winger initially did just that, registering five assists in four UEFA Europa Conference League ties and scoring a dramatic late Premier League equaliser at Chelsea that was wrongly disallowed, only for misfortune to strike on his first Premier League start in Claret and Blue.', 17, 9, 1, 15),
(118, 'Michail Antonio', 'Michail_Antonio.png', 'Jamaica.png', 24, 'Striker', '1990-03-28', '2023-08-10 11:30:02', '2023-08-10 11:30:02', 'Michail Antonio has emerged as a Premier League star since joining from Championship club Nottingham Forest in September 2015.  The south Londoner has worked his way up from non-league, through the EFL and finally to the Premier League, where he has become West Ham United\'s all-time leading goalscorer.', 9, 61, 30, 25),
(119, 'Divin Mubama', 'Divin_Mubama.png', 'England.png', 24, 'Striker', '2004-10-25', '2023-08-10 11:32:48', '2023-08-10 11:32:48', 'Divin Mubama revealed he is constantly learning from his West Ham United teammates after scoring his third goal in as many pre-season games as the Hammers rounded off their Australia tour in style with a 3-2 victory over Tottenham Hotspur at Optus Stadium.  Mubama expertly glanced Emerson Palmieri’s cross in to the far corner to double the Hammers’ lead in Perth, after Danny Ings had opened the scoring with a stooping header just minutes earlier.', 72, 0, 0, 3),
(120, 'ưewerwer', 'Iceland.png', 'Jamaica.png', 19, 'Defend', '2222-02-12', '2023-08-11 12:36:19', '2023-08-11 12:36:19', 'Martin Ødegaard (born 17 December 1998) is a Norwegian professional footballer who plays as a midfielder for and captains both Premier League club Arsenal and the Norway national team. Considered one of the best midfielders in the world, he is known for his technique, dribbling ability, vision and range of passing.', 99, 1, 1, 1);
INSERT INTO `players` (`player_id`, `player_name`, `player_photo`, `nationality`, `team_id`, `position`, `birthday`, `created_at`, `updated_at`, `biography`, `club_number`, `goals`, `assists`, `clean_sheets`) VALUES
(121, 'hehe duoc roi', 'Iceland.png', 'Croatia.png', 19, 'Striker', '2222-02-22', '2023-08-11 12:58:51', '2023-08-11 19:54:18', 'hôh young defender William spent the second half of last season back on loan in France, where he impressed for Nice, and is back in Ligue 1 this term, at Marseille.  The imposing right-footed centre back made 20 league appearances for Nice, winning their Player of the Month award in January 2021.  He started the last campaign as an unused sub for the Community Shield win over Liverpool, but had not made his Gunners debut by the time this season started.  The France youth international has played all his football in his home country, having joined from Saint-Etienne in 2019.', 44, 8, 8, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `products_id` int(10) UNSIGNED NOT NULL,
  `products_model` varchar(255) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `products_price` varchar(255) NOT NULL,
  `products_material` varchar(255) NOT NULL,
  `products_size` varchar(255) NOT NULL,
  `products_style` varchar(255) NOT NULL,
  `products_maxload` varchar(255) NOT NULL,
  `products_thumbnails` text DEFAULT NULL,
  `products_gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`products_gallery`)),
  `products_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`products_id`, `products_model`, `categories_id`, `products_price`, `products_material`, `products_size`, `products_style`, `products_maxload`, `products_thumbnails`, `products_gallery`, `products_status`, `created_at`, `updated_at`) VALUES
(1, 'Áo CR7 có dính mồ hôi', 2, '29000000', 'Cotton', 'XL', 'Nike Red & Green Jersey', '80', 'images/products/Shirts/Cristiano Ronaldo Portugal National Team Fanatics Authentic Autographed 2022-23 Nike Red & Green Jersey1/CR7SHIRTBODY.jpg', '[\"images\\/products\\/Shirts\\/Cristiano Ronaldo Portugal National Team Fanatics Authentic Autographed 2022-23 Nike Red & Green Jersey1\\/cr7shirts.png\"]', 'active', '2023-08-10 05:15:32', '2023-08-10 09:07:54'),
(2, 'Shorts', 3, '250000', 'Cotton', 'L', 'Black & Green', '65', 'images/products/Shorts/Shorts/logo new.jpg', '[\"images\\/products\\/Shorts\\/Shorts\\/logo long new.jpg\"]', 'active', '2023-08-10 23:27:17', '2023-08-12 01:32:24'),
(8, 'Nike Basic Cap', 3, '150', 'Cotton', 'Free', 'Nike Black', '0', 'images/products/Shorts/Nike Basic Cap/logo new.jpg', '[\"images\\/products\\/Shorts\\/Nike Basic Cap\\/logo long new.jpg\"]', 'active', '2023-08-12 01:32:53', '2023-08-12 01:32:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_details`
--

CREATE TABLE `shipping_details` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_full_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone_number` varchar(10) NOT NULL,
  `shipping_province` varchar(255) NOT NULL,
  `shipping_district` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_details`
--

INSERT INTO `shipping_details` (`shipping_id`, `shipping_full_name`, `shipping_email`, `shipping_phone_number`, `shipping_province`, `shipping_district`, `created_at`, `updated_at`) VALUES
(1, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận 6', '2023-08-10 10:05:12', '2023-08-10 10:05:12'),
(2, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận 6', '2023-08-10 10:05:50', '2023-08-10 10:05:50'),
(3, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-10 10:14:20', '2023-08-10 10:14:20'),
(4, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Nhà Bè', '2023-08-10 10:15:23', '2023-08-10 10:15:23'),
(5, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-10 10:15:42', '2023-08-10 10:15:42'),
(6, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-11 04:24:07', '2023-08-11 04:24:07'),
(7, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Thanh Xuân', '2023-08-11 04:34:18', '2023-08-11 04:34:18'),
(8, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Gò Vấp', '2023-08-11 04:34:33', '2023-08-11 04:34:33'),
(9, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Gò Vấp', '2023-08-11 04:38:08', '2023-08-11 04:38:08'),
(10, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Ba Đình', '2023-08-11 04:42:58', '2023-08-11 04:42:58'),
(11, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Nam Từ Liêm', '2023-08-11 04:48:51', '2023-08-11 04:48:51'),
(12, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 04:58:12', '2023-08-11 04:58:12'),
(13, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 04:58:59', '2023-08-11 04:58:59'),
(14, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 05:01:59', '2023-08-11 05:01:59'),
(15, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 05:03:13', '2023-08-11 05:03:13'),
(16, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 05:06:36', '2023-08-11 05:06:36'),
(17, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-11 05:48:12', '2023-08-11 05:48:12'),
(18, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Thanh Xuân', '2023-08-11 06:03:13', '2023-08-11 06:03:13'),
(19, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Thanh Xuân', '2023-08-11 06:09:24', '2023-08-11 06:09:24'),
(20, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Cầu Giấy', '2023-08-11 08:10:54', '2023-08-11 08:10:54'),
(21, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Bình Chánh', '2023-08-11 20:58:37', '2023-08-11 20:58:37'),
(22, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Hóc Môn', '2023-08-11 21:09:33', '2023-08-11 21:09:33'),
(23, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Bắc Từ Liêm', '2023-08-11 21:13:57', '2023-08-11 21:13:57'),
(24, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-11 21:23:27', '2023-08-11 21:23:27'),
(25, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-11 21:28:11', '2023-08-11 21:28:11'),
(26, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Tây Hồ', '2023-08-11 21:31:08', '2023-08-11 21:31:08'),
(27, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Nhà Bè', '2023-08-11 21:32:16', '2023-08-11 21:32:16'),
(28, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hồ Chí Minh', 'Quận Nhà Bè', '2023-08-12 00:29:47', '2023-08-12 00:29:47'),
(29, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Bắc Từ Liêm', '2023-08-12 00:57:38', '2023-08-12 00:57:38'),
(30, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Tây Hồ', '2023-08-12 01:04:33', '2023-08-12 01:04:33'),
(31, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Ba Đình', '2023-08-12 01:17:18', '2023-08-12 01:17:18'),
(32, 'tri bui', 'tribui1990@gmail.com', '0909600981', 'Hà Nội', 'Nam Từ Liêm', '2023-08-12 01:17:49', '2023-08-12 01:17:49'),
(33, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Nam Từ Liêm', '2023-08-12 01:19:42', '2023-08-12 01:19:42'),
(34, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Nam Từ Liêm', '2023-08-12 01:20:01', '2023-08-12 01:20:01'),
(35, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Tây Hồ', '2023-08-12 01:23:30', '2023-08-12 01:23:30'),
(36, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Tây Hồ', '2023-08-12 01:23:58', '2023-08-12 01:23:58'),
(37, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Tây Hồ', '2023-08-12 01:25:37', '2023-08-12 01:25:37'),
(38, 'tribui', 'tribui1990@gmail.com', '0799996769', 'Hà Nội', 'Tây Hồ', '2023-08-12 01:28:20', '2023-08-12 01:28:20'),
(39, 'trungquan@admin.com', 'trungquan@admin.com', '1231231231', 'Hà Nội', 'Long Biên', '2023-08-12 02:28:43', '2023-08-12 02:28:43'),
(40, 'a@a.com123123', 'a@a.com123123', '1212122121', 'Hà Nội', 'Long Biên', '2023-08-12 02:37:13', '2023-08-12 02:37:13'),
(41, 'trungquan@admin.com', 'trungquan@admin.com', '1111111111', 'Hà Nội', 'Bắc Từ Liêm', '2023-08-12 02:44:46', '2023-08-12 02:44:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teams`
--

CREATE TABLE `teams` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isPremierLeague` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `isFA` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `isCommunityShield` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `slug`, `isPremierLeague`, `isFA`, `isCommunityShield`, `logo`, `created_at`, `updated_at`) VALUES
(19, 'Manchester City', 'manchester-city', 'Active', 'Active', 'Inactive', '1.png', '2023-08-09 12:01:22', '2023-08-11 01:58:47'),
(20, 'Arsenal', 'arsenal', 'Active', 'Active', 'Active', '5.png', '2023-08-09 12:01:33', '2023-08-09 12:01:33'),
(21, 'Manchester United', 'manchester-united', 'Active', 'Active', 'Inactive', '6.png', '2023-08-09 12:01:54', '2023-08-09 12:01:54'),
(22, 'Chelsea', 'chelsea', 'Active', 'Active', 'Inactive', '3.png', '2023-08-09 12:02:34', '2023-08-09 12:02:34'),
(23, 'Liverpool', 'liverpool', 'Active', 'Active', 'Inactive', '2.png', '2023-08-09 12:02:59', '2023-08-09 12:02:59'),
(24, 'Westham', 'westham', 'Active', 'Active', 'Inactive', '7.png', '2023-08-09 12:03:15', '2023-08-09 12:03:15'),
(25, 'Aston Villa', 'aston-villa', 'Active', 'Active', 'Inactive', '8.png', '2023-08-09 12:03:33', '2023-08-09 12:03:33'),
(26, 'Tottenham', 'tottenham', 'Active', 'Active', 'Inactive', '4.png', '2023-08-09 12:03:51', '2023-08-09 12:03:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tournaments`
--

CREATE TABLE `tournaments` (
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tournaments`
--

INSERT INTO `tournaments` (`tournament_id`, `name`, `country`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Premier League', 'England', '2022-08-06', '2023-04-17', NULL, NULL),
(2, 'FA', 'England', '0000-00-00', '0000-00-00', NULL, NULL),
(3, 'Community Shield', 'England', '0000-00-00', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` enum('Admin','Moderator','Member') NOT NULL DEFAULT 'Member',
  `user_status` enum('Active','Banned','Inactive') NOT NULL DEFAULT 'Active',
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_role`, `user_status`, `user_email`, `user_phone`, `user_password`, `user_address`, `created_at`, `updated_at`) VALUES
(2, 'trungquan@admin.com', 'Admin', 'Active', 'trungquan@admin.com', '1', '$2y$10$an4LaOW/0kh0eeIvN7SNBuNB3huth.WTcSbAqTTHRkKbm13hx/Z4i', NULL, '2023-08-09 00:19:14', '2023-08-09 00:19:14'),
(4, '012', 'Admin', 'Inactive', 'phuhoang136@gmail.com', NULL, '$2y$10$dm8NLmeth8bJBcBsvHFUh.qN1V.ZS6r0L.se1OmDdLyzugVgCWdI.', NULL, '2023-08-10 23:59:59', '2023-08-11 11:46:18'),
(5, 'Phu', 'Member', 'Active', 'phu136@gmail.com', NULL, '$2y$10$3rxzzv26.QfKiVkZhVzgZeKSVTv26Vo7Y7Mx8u2l6QQx17osvrIzS', NULL, '2023-08-11 19:12:12', '2023-08-11 19:12:12'),
(6, 'trungquan@admin.com123', 'Member', 'Active', 'trungquan@admin.com123', NULL, '$2y$10$b3.ziGurxNupwH11aRlzhuVmfYjEbwrxoKdNfhgyGcSrsHjbRn.0.', NULL, '2023-08-12 00:43:53', '2023-08-12 00:43:53'),
(8, 'a@a.com123123', 'Member', 'Active', 'a@a.com123123', '1212122121', '$2y$10$1u1MvjHVhNaKJ8fmxObiQeU0lsi8rA9DfnYGGAzfhLQ80PtKdYrby', NULL, '2023-08-12 02:36:53', '2023-08-12 02:36:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `products_categories_id_foreign` (`categories_id`);

--
-- Chỉ mục cho bảng `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Chỉ mục cho bảng `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournament_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`),
  ADD UNIQUE KEY `users_user_phone_unique` (`user_phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `players`
--
ALTER TABLE `players`
  MODIFY `player_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournament_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
