-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2022 at 04:40 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confident`
--

-- --------------------------------------------------------

--
-- Table structure for table `emeliyyat_novus`
--

CREATE TABLE `emeliyyat_novus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hekims`
--

CREATE TABLE `hekims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klinika_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dogum_gunu` date DEFAULT NULL,
  `tel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hekim_vezives`
--

CREATE TABLE `hekim_vezives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hekim_vezives`
--

INSERT INTO `hekim_vezives` (`id`, `ad`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Həkim', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Texnik', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `iscis`
--

CREATE TABLE `iscis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `magaza_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vezife_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dogum_gunu` date DEFAULT NULL,
  `tel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `istehsalcis`
--

CREATE TABLE `istehsalcis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `olke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `istehsalcis`
--

INSERT INTO `istehsalcis` (`id`, `ad`, `olke`, `created_at`, `updated_at`) VALUES
(1, 'İstehsalçı 1', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'İstehsalçı 2', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, 'İstehsalçı 3', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, 'İstehsalçı 4', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, 'İstehsalçı 5', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(6, 'İstehsalçı 6', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(7, 'İstehsalçı 7', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(8, 'İstehsalçı 8', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(9, 'İstehsalçı 9', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(10, 'İstehsalçı 10', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(11, 'İstehsalçı 11', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(12, 'İstehsalçı 12', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(13, 'İstehsalçı 13', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(14, 'İstehsalçı 14', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(15, 'İstehsalçı 15', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(16, 'İstehsalçı 16', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(17, 'İstehsalçı 17', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(18, 'İstehsalçı 18', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(19, 'İstehsalçı 19', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(20, 'İstehsalçı 20', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(21, 'İstehsalçı 21', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(22, 'İstehsalçı 22', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(23, 'İstehsalçı 23', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(24, 'İstehsalçı 24', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(25, 'İstehsalçı 25', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(26, 'İstehsalçı 26', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(27, 'İstehsalçı 27', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(28, 'İstehsalçı 28', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(29, 'İstehsalçı 29', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(30, 'İstehsalçı 30', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(31, 'İstehsalçı 31', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(32, 'İstehsalçı 32', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(33, 'İstehsalçı 33', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(34, 'İstehsalçı 34', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(35, 'İstehsalçı 35', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(36, 'İstehsalçı 36', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(37, 'İstehsalçı 37', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(38, 'İstehsalçı 38', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(39, 'İstehsalçı 39', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(40, 'İstehsalçı 40', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(41, 'İstehsalçı 41', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(42, 'İstehsalçı 42', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(43, 'İstehsalçı 43', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(44, 'İstehsalçı 44', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(45, 'İstehsalçı 45', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(46, 'İstehsalçı 46', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(47, 'İstehsalçı 47', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(48, 'İstehsalçı 48', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(49, 'İstehsalçı 49', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(50, 'İstehsalçı 50', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(51, 'İstehsalçı 51', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(52, 'İstehsalçı 52', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(53, 'İstehsalçı 53', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(54, 'İstehsalçı 54', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(55, 'İstehsalçı 55', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(56, 'İstehsalçı 56', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(57, 'İstehsalçı 57', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(58, 'İstehsalçı 58', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(59, 'İstehsalçı 59', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(60, 'İstehsalçı 60', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(61, 'İstehsalçı 61', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(62, 'İstehsalçı 62', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(63, 'İstehsalçı 63', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(64, 'İstehsalçı 64', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(65, 'İstehsalçı 65', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(66, 'İstehsalçı 66', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(67, 'İstehsalçı 67', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(68, 'İstehsalçı 68', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(69, 'İstehsalçı 69', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(70, 'İstehsalçı 70', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(71, 'İstehsalçı 71', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(72, 'İstehsalçı 72', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(73, 'İstehsalçı 73', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(74, 'İstehsalçı 74', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(75, 'İstehsalçı 75', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(76, 'İstehsalçı 76', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(77, 'İstehsalçı 77', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(78, 'İstehsalçı 78', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(79, 'İstehsalçı 79', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(80, 'İstehsalçı 80', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(81, 'İstehsalçı 81', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(82, 'İstehsalçı 82', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(83, 'İstehsalçı 83', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(84, 'İstehsalçı 84', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(85, 'İstehsalçı 85', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(86, 'İstehsalçı 86', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(87, 'İstehsalçı 87', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(88, 'İstehsalçı 88', 'Ölkə 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(89, 'İstehsalçı 89', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(90, 'İstehsalçı 90', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(91, 'İstehsalçı 91', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(92, 'İstehsalçı 92', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(93, 'İstehsalçı 93', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(94, 'İstehsalçı 94', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(95, 'İstehsalçı 95', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(96, 'İstehsalçı 96', 'Ölkə 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(97, 'İstehsalçı 97', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(98, 'İstehsalçı 98', 'Ölkə 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(99, 'İstehsalçı 99', 'Ölkə 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(100, 'İstehsalçı 100', 'Ölkə 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `kateqoriyas`
--

CREATE TABLE `kateqoriyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kateqoriyas`
--

INSERT INTO `kateqoriyas` (`id`, `ad`, `created_at`, `updated_at`) VALUES
(1, 'Kateqoriya 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Kateqoriya 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, 'Kateqoriya 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, 'Kateqoriya 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, 'Kateqoriya 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(6, 'Kateqoriya 6', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(7, 'Kateqoriya 7', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(8, 'Kateqoriya 8', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(9, 'Kateqoriya 9', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(10, 'Kateqoriya 10', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(11, 'Kateqoriya 11', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(12, 'Kateqoriya 12', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(13, 'Kateqoriya 13', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(14, 'Kateqoriya 14', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(15, 'Kateqoriya 15', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(16, 'Kateqoriya 16', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(17, 'Kateqoriya 17', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(18, 'Kateqoriya 18', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(19, 'Kateqoriya 19', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(20, 'Kateqoriya 20', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(21, 'Kateqoriya 21', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(22, 'Kateqoriya 22', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(23, 'Kateqoriya 23', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(24, 'Kateqoriya 24', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(25, 'Kateqoriya 25', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(26, 'Kateqoriya 26', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(27, 'Kateqoriya 27', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(28, 'Kateqoriya 28', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(29, 'Kateqoriya 29', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(30, 'Kateqoriya 30', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(31, 'Kateqoriya 31', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(32, 'Kateqoriya 32', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(33, 'Kateqoriya 33', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(34, 'Kateqoriya 34', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(35, 'Kateqoriya 35', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(36, 'Kateqoriya 36', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(37, 'Kateqoriya 37', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(38, 'Kateqoriya 38', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(39, 'Kateqoriya 39', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(40, 'Kateqoriya 40', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(41, 'Kateqoriya 41', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(42, 'Kateqoriya 42', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(43, 'Kateqoriya 43', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(44, 'Kateqoriya 44', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(45, 'Kateqoriya 45', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(46, 'Kateqoriya 46', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(47, 'Kateqoriya 47', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(48, 'Kateqoriya 48', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(49, 'Kateqoriya 49', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(50, 'Kateqoriya 50', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(51, 'Kateqoriya 51', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(52, 'Kateqoriya 52', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(53, 'Kateqoriya 53', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(54, 'Kateqoriya 54', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(55, 'Kateqoriya 55', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(56, 'Kateqoriya 56', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(57, 'Kateqoriya 57', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(58, 'Kateqoriya 58', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(59, 'Kateqoriya 59', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(60, 'Kateqoriya 60', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(61, 'Kateqoriya 61', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(62, 'Kateqoriya 62', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(63, 'Kateqoriya 63', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(64, 'Kateqoriya 64', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(65, 'Kateqoriya 65', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(66, 'Kateqoriya 66', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(67, 'Kateqoriya 67', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(68, 'Kateqoriya 68', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(69, 'Kateqoriya 69', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(70, 'Kateqoriya 70', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(71, 'Kateqoriya 71', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(72, 'Kateqoriya 72', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(73, 'Kateqoriya 73', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(74, 'Kateqoriya 74', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(75, 'Kateqoriya 75', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(76, 'Kateqoriya 76', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(77, 'Kateqoriya 77', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(78, 'Kateqoriya 78', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(79, 'Kateqoriya 79', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(80, 'Kateqoriya 80', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(81, 'Kateqoriya 81', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(82, 'Kateqoriya 82', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(83, 'Kateqoriya 83', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(84, 'Kateqoriya 84', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(85, 'Kateqoriya 85', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(86, 'Kateqoriya 86', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(87, 'Kateqoriya 87', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(88, 'Kateqoriya 88', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(89, 'Kateqoriya 89', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(90, 'Kateqoriya 90', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(91, 'Kateqoriya 91', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(92, 'Kateqoriya 92', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(93, 'Kateqoriya 93', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(94, 'Kateqoriya 94', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(95, 'Kateqoriya 95', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(96, 'Kateqoriya 96', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(97, 'Kateqoriya 97', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(98, 'Kateqoriya 98', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(99, 'Kateqoriya 99', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(100, 'Kateqoriya 100', '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `klinikas`
--

CREATE TABLE `klinikas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hekim_adi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ola bilər ki rayonda klinikaya deyil birbaşa həkimin özünə məhsul verilsin',
  `kuce_adi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xerite` text COLLATE utf8mb4_unicode_ci,
  `tel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klinikas`
--

INSERT INTO `klinikas` (`id`, `ad`, `hekim_adi`, `kuce_adi`, `xerite`, `tel_1`, `tel_2`, `tel_3`, `fb`, `insta`, `telegram`, `wp`, `email`, `rayon_id`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Mirvari diş', 'Mirəflan Haşimli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `magazas`
--

CREATE TABLE `magazas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `magazas`
--

INSERT INTO `magazas` (`id`, `ad`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Anbar 1', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Anbar 2', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, 'Anbar 3', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, 'Anbar 4', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, 'Anbar 5', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `markas`
--

CREATE TABLE `markas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markas`
--

INSERT INTO `markas` (`id`, `ad`, `created_at`, `updated_at`) VALUES
(1, 'Model 1', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Model 2', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, 'Model 3', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, 'Model 4', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, 'Model 5', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(6, 'Model 6', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(7, 'Model 7', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(8, 'Model 8', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(9, 'Model 9', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(10, 'Model 10', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(11, 'Model 11', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(12, 'Model 12', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(13, 'Model 13', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(14, 'Model 14', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(15, 'Model 15', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(16, 'Model 16', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(17, 'Model 17', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(18, 'Model 18', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(19, 'Model 19', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(20, 'Model 20', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(21, 'Model 21', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(22, 'Model 22', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(23, 'Model 23', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(24, 'Model 24', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(25, 'Model 25', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(26, 'Model 26', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(27, 'Model 27', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(28, 'Model 28', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(29, 'Model 29', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(30, 'Model 30', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(31, 'Model 31', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(32, 'Model 32', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(33, 'Model 33', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(34, 'Model 34', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(35, 'Model 35', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(36, 'Model 36', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(37, 'Model 37', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(38, 'Model 38', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(39, 'Model 39', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(40, 'Model 40', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(41, 'Model 41', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(42, 'Model 42', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(43, 'Model 43', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(44, 'Model 44', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(45, 'Model 45', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(46, 'Model 46', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(47, 'Model 47', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(48, 'Model 48', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(49, 'Model 49', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(50, 'Model 50', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(51, 'Model 51', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(52, 'Model 52', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(53, 'Model 53', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(54, 'Model 54', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(55, 'Model 55', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(56, 'Model 56', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(57, 'Model 57', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(58, 'Model 58', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(59, 'Model 59', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(60, 'Model 60', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(61, 'Model 61', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(62, 'Model 62', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(63, 'Model 63', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(64, 'Model 64', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(65, 'Model 65', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(66, 'Model 66', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(67, 'Model 67', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(68, 'Model 68', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(69, 'Model 69', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(70, 'Model 70', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(71, 'Model 71', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(72, 'Model 72', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(73, 'Model 73', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(74, 'Model 74', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(75, 'Model 75', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(76, 'Model 76', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(77, 'Model 77', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(78, 'Model 78', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(79, 'Model 79', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(80, 'Model 80', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(81, 'Model 81', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(82, 'Model 82', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(83, 'Model 83', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(84, 'Model 84', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(85, 'Model 85', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(86, 'Model 86', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(87, 'Model 87', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(88, 'Model 88', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(89, 'Model 89', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(90, 'Model 90', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(91, 'Model 91', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(92, 'Model 92', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(93, 'Model 93', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(94, 'Model 94', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(95, 'Model 95', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(96, 'Model 96', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(97, 'Model 97', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(98, 'Model 98', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(99, 'Model 99', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(100, 'Model 100', '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `mehsuls`
--

CREATE TABLE `mehsuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL,
  `istehsalci_id` int(11) DEFAULT NULL,
  `kateqoriya_id` int(11) DEFAULT NULL,
  `marka_id` int(11) DEFAULT NULL,
  `qaime_nomresi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarix` date DEFAULT NULL,
  `vahid_id` int(11) DEFAULT NULL,
  `maya_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `topdan_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nagd_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `kredit_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qutudaki_1_malin_maya_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qutudaki_1_malin_topdan_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qutudaki_1_malin_nagd_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qutudaki_1_malin_kredit_deyeri` decimal(10,2) NOT NULL DEFAULT '0.00',
  `say` int(11) NOT NULL DEFAULT '0',
  `bir_qutusundaki_say` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mehsuls`
--

INSERT INTO `mehsuls` (`id`, `ad`, `firma_id`, `istehsalci_id`, `kateqoriya_id`, `marka_id`, `qaime_nomresi`, `tarix`, `vahid_id`, `maya_deyeri`, `topdan_deyeri`, `nagd_deyeri`, `kredit_deyeri`, `qutudaki_1_malin_maya_deyeri`, `qutudaki_1_malin_topdan_deyeri`, `qutudaki_1_malin_nagd_deyeri`, `qutudaki_1_malin_kredit_deyeri`, `say`, `bir_qutusundaki_say`, `created_at`, `updated_at`) VALUES
(1, 'Cumque sunt perspic', 3, 3, 10, 80, 'AZ006', '1976-07-02', 2, '77.00', '21.00', '62.00', '59.00', '0.00', '0.00', '0.00', '0.00', 89, 0, '2022-07-22 22:23:13', '2022-07-24 08:47:12'),
(2, 'Cumque sunt perspic', 3, 3, 41, 67, 'QN001', '1980-08-18', 1, '52.00', '23.00', '85.00', '51.00', '0.01', '0.01', '0.01', '0.01', 71, 10, '2022-07-23 01:22:51', '2022-07-23 20:01:39'),
(3, 'Cumque sunt perspic', 54, 23, 55, 15, 'Cupidatat fugiat si', '2018-09-08', 2, '77.00', '89.00', '66.00', '37.00', '0.00', '0.00', '0.00', '0.00', 63, 0, '2022-07-23 01:28:30', '2022-07-23 01:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2022_03_05_040356_create_options_table', 1),
(38, '2022_07_01_052020_create_magazas_table', 1),
(39, '2022_07_01_053956_create_vezives_table', 1),
(40, '2022_07_01_092416_create_sehers_table', 1),
(41, '2022_07_01_095321_create_rayons_table', 1),
(42, '2022_07_01_103131_create_klinikas_table', 1),
(43, '2022_07_01_115254_create_hekims_table', 1),
(44, '2022_07_03_143433_create_iscis_table', 1),
(45, '2022_07_07_110322_create_hekim_vezives_table', 1),
(46, '2022_07_07_122025_create_partnyors_table', 1),
(47, '2022_07_10_200219_create_istehsalcis_table', 1),
(48, '2022_07_10_205347_create_kateqoriyas_table', 1),
(49, '2022_07_10_205528_create_markas_table', 1),
(50, '2022_07_10_212925_create_vahids_table', 1),
(51, '2022_07_10_215103_create_emeliyyat_novus_table', 1),
(52, '2022_07_11_053559_create_mehsuls_table', 1),
(53, '2022_07_23_024144_create_satis_usulus_table', 2),
(54, '2022_07_23_025311_create_satis_table', 3),
(56, '2022_07_23_031813_create_satis_detallaris_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partnyors`
--

CREATE TABLE `partnyors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unvan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partnyors`
--

INSERT INTO `partnyors` (`id`, `ad`, `tel_1`, `tel_2`, `tel_3`, `fb`, `insta`, `telegram`, `wp`, `email`, `unvan`, `created_at`, `updated_at`) VALUES
(1, 'Firma 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Firma 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, 'Firma 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, 'Firma 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, 'Firma 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(6, 'Firma 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(7, 'Firma 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(8, 'Firma 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(9, 'Firma 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(10, 'Firma 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(11, 'Firma 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(12, 'Firma 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(13, 'Firma 13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(14, 'Firma 14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(15, 'Firma 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(16, 'Firma 16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(17, 'Firma 17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(18, 'Firma 18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(19, 'Firma 19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(20, 'Firma 20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(21, 'Firma 21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(22, 'Firma 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(23, 'Firma 23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(24, 'Firma 24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(25, 'Firma 25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(26, 'Firma 26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(27, 'Firma 27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(28, 'Firma 28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(29, 'Firma 29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(30, 'Firma 30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(31, 'Firma 31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(32, 'Firma 32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(33, 'Firma 33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(34, 'Firma 34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(35, 'Firma 35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(36, 'Firma 36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(37, 'Firma 37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(38, 'Firma 38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(39, 'Firma 39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(40, 'Firma 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(41, 'Firma 41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(42, 'Firma 42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(43, 'Firma 43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(44, 'Firma 44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(45, 'Firma 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(46, 'Firma 46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(47, 'Firma 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(48, 'Firma 48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(49, 'Firma 49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(50, 'Firma 50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(51, 'Firma 51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(52, 'Firma 52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(53, 'Firma 53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(54, 'Firma 54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(55, 'Firma 55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(56, 'Firma 56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(57, 'Firma 57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(58, 'Firma 58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(59, 'Firma 59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(60, 'Firma 60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(61, 'Firma 61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(62, 'Firma 62', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(63, 'Firma 63', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(64, 'Firma 64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(65, 'Firma 65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(66, 'Firma 66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(67, 'Firma 67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(68, 'Firma 68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(69, 'Firma 69', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(70, 'Firma 70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(71, 'Firma 71', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(72, 'Firma 72', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(73, 'Firma 73', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(74, 'Firma 74', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(75, 'Firma 75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(76, 'Firma 76', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(77, 'Firma 77', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(78, 'Firma 78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(79, 'Firma 79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(80, 'Firma 80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(81, 'Firma 81', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(82, 'Firma 82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(83, 'Firma 83', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(84, 'Firma 84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(85, 'Firma 85', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(86, 'Firma 86', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(87, 'Firma 87', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(88, 'Firma 88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(89, 'Firma 89', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(90, 'Firma 90', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(91, 'Firma 91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(92, 'Firma 92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(93, 'Firma 93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(94, 'Firma 94', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(95, 'Firma 95', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(96, 'Firma 96', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(97, 'Firma 97', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(98, 'Firma 98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(99, 'Firma 99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(100, 'Firma 100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rayons`
--

CREATE TABLE `rayons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rayons`
--

INSERT INTO `rayons` (`id`, `seher_id`, `ad`, `order_no`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ağdam', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, NULL, 'Ağdaş', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(3, NULL, 'Ağcabədi', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(4, NULL, 'Ağstafa', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(5, NULL, 'Ağsu', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(6, NULL, 'Astara', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(7, NULL, 'Babək', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(8, NULL, 'Balakən', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(9, NULL, 'Bərdə', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(10, NULL, 'Beyləqan', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(11, NULL, 'Biləsuvar', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(12, NULL, 'Cəbrayıl', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(13, NULL, 'Cəlilabad', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(14, NULL, 'Culfa', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(15, NULL, 'Daşkəsən', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(16, NULL, 'Füzuli', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(17, NULL, 'Gədəbəy', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(18, NULL, 'Goranboy', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(19, NULL, 'Göyçay', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(20, NULL, 'Göygöl', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(21, NULL, 'Hacıqabul', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(22, NULL, 'Xaçmaz', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(23, NULL, 'Xızı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(24, NULL, 'Xocalı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(25, NULL, 'Xocavənd', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(26, NULL, 'İmişli', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(27, NULL, 'İsmayıllı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(28, NULL, 'Kəlbəcər', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(29, NULL, 'Kəngərli', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(30, NULL, 'Kürdəmir', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(31, NULL, 'Qəbələ', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(32, NULL, 'Qax', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(33, NULL, 'Qazax', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(34, NULL, 'Qobustan', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(35, NULL, 'Quba', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(36, NULL, 'Qubadlı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(37, NULL, 'Qusar', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(38, NULL, 'Laçın', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(39, NULL, 'Lənkəran', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(40, NULL, 'Lerik', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(41, NULL, 'Masallı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(42, NULL, 'Neftçala', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(43, NULL, 'Oğuz', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(44, NULL, 'Ordubad', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(45, NULL, 'Saatlı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(46, NULL, 'Sabirabad', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(47, NULL, 'Sədərək', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(48, NULL, 'Salyan', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(49, NULL, 'Samux', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(50, NULL, 'Şabran', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(51, NULL, 'Şahbuz', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(52, NULL, 'Şəki', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(53, NULL, 'Şamaxı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(54, NULL, 'Şəmkir', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(55, NULL, 'Şərur', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(56, NULL, 'Şuşa', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(57, NULL, 'Siyəzən', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(58, NULL, 'Tərtər', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(59, NULL, 'Tovuz', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(60, NULL, 'Ucar', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(61, NULL, 'Yardımlı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(62, NULL, 'Yevlax', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(63, NULL, 'Zəngilan', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(64, NULL, 'Zaqatala', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(65, NULL, 'Zərdab', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(66, 1, 'Yasamal', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `satis`
--

CREATE TABLE `satis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satis_usulu_id` int(11) DEFAULT NULL,
  `musteri_novu` tinyint(4) DEFAULT NULL COMMENT '1 - hekim, 2 - texnik, 3 - klinika, 4 -firma',
  `musterinin_id` int(11) DEFAULT NULL,
  `satici_id` int(11) DEFAULT NULL,
  `ilkin_odenis` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satis_detallaris`
--

CREATE TABLE `satis_detallaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satis_id` int(11) DEFAULT NULL,
  `mehsul_id` int(11) DEFAULT NULL,
  `qutu_sayi` int(11) NOT NULL DEFAULT '0' COMMENT 'Bu kolonda yalnız qutu ilə satılan məhsulların sayı yazılır',
  `qutusunun_cari_qiymeti` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Bu kolonda yalnız qutu ilə satılan məhsulların qiyməti yazılır',
  `qutusunun_faktiki_satildigi_qiymet` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Bu kolonda yalnız qutu ilə satılan məhsulların qiyməti yazılır',
  `satis_miqdari_ededle` int(11) NOT NULL DEFAULT '0' COMMENT 'Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun sayı yazıla bilər',
  `bir_ededinin_cari_qiymeti` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun qiyməti yazıla bilər',
  `bir_ededinin_faktiki_satildigi_qiymeti` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Bu kolonda həm ədədlə, həm də qutu ilə məhsul satılarkən məhsulun qiyməti yazıla bilər',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satis_usulus`
--

CREATE TABLE `satis_usulus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satis_usulus`
--

INSERT INTO `satis_usulus` (`id`, `ad`, `created_at`, `updated_at`) VALUES
(1, 'Topdan', '2022-07-22 22:47:29', '2022-07-22 22:47:29'),
(2, 'Nağd', '2022-07-22 22:47:29', '2022-07-22 22:47:29'),
(3, 'Hissə-hissə', '2022-07-22 22:47:29', '2022-07-22 22:47:29'),
(4, 'Kredit', '2022-07-22 22:47:29', '2022-07-22 22:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `sehers`
--

CREATE TABLE `sehers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sehers`
--

INSERT INTO `sehers` (`id`, `ad`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Bakı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Gəncə', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `klinika_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vezife_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hekim_vezife_id` bigint(20) UNSIGNED DEFAULT NULL,
  `magaza_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dogum_gunu` date DEFAULT NULL,
  `tel_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - don t login, 1 - login',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `klinika_id`, `vezife_id`, `hekim_vezife_id`, `magaza_id`, `dogum_gunu`, `tel_1`, `tel_2`, `tel_3`, `fb`, `insta`, `telegram`, `wp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'avatar.jpg', 'admin@gmail.com', NULL, '$2y$10$bqgsQYpqYetefhcLsed1O.MbPgMFAbIVLRQOmQzjQZIM0Nmg4Aqzq', 'kxTqbx94AmWCxiZQUhL9EQSzqnAxaMKnE0wPSfnBZ4OJ7EIvXgvwjLFItpnF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Rahim Süleymanov', NULL, 'r@mail.ru', NULL, '$2y$10$00/jBsCn4UU4wyP/YwWw6e.gh5RodWnfvMOtRgYRln7xQHivOqRgq', 'ata3liOVopZ22JS5ziQNdVyQueo2JBftVfoX1OOepazKdMvlpRic4XPNxoGZ', 1, 1, 1, 1, '2022-01-01', '0125371722', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-07-22 22:01:33', '2022-07-22 22:01:33'),
(3, 'Aut aut delectus du', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, '2015-01-02', 'Ipsum rem eiusmod m', 'Voluptatibus qui lab', 'Ullam sed in quibusd', 'Minus labore in non', 'Lorem soluta nobis l', 'Assumenda eum in con', 'Aut et exercitation', 0, '2022-07-23 00:23:09', '2022-07-23 00:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `vahids`
--

CREATE TABLE `vahids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vahids`
--

INSERT INTO `vahids` (`id`, `ad`, `created_at`, `updated_at`) VALUES
(1, 'qutu', '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'ədəd', '2022-07-21 13:31:34', '2022-07-21 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `vezives`
--

CREATE TABLE `vezives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vezives`
--

INSERT INTO `vezives` (`id`, `ad`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 'Satıcı', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34'),
(2, 'Kreditor', 0, '2022-07-21 13:31:34', '2022-07-21 13:31:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emeliyyat_novus`
--
ALTER TABLE `emeliyyat_novus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hekims`
--
ALTER TABLE `hekims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hekim_vezives`
--
ALTER TABLE `hekim_vezives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iscis`
--
ALTER TABLE `iscis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `istehsalcis`
--
ALTER TABLE `istehsalcis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kateqoriyas`
--
ALTER TABLE `kateqoriyas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klinikas`
--
ALTER TABLE `klinikas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazas`
--
ALTER TABLE `magazas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markas`
--
ALTER TABLE `markas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mehsuls`
--
ALTER TABLE `mehsuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnyors`
--
ALTER TABLE `partnyors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rayons`
--
ALTER TABLE `rayons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satis`
--
ALTER TABLE `satis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satis_detallaris`
--
ALTER TABLE `satis_detallaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satis_usulus`
--
ALTER TABLE `satis_usulus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sehers`
--
ALTER TABLE `sehers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vahids`
--
ALTER TABLE `vahids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vezives`
--
ALTER TABLE `vezives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emeliyyat_novus`
--
ALTER TABLE `emeliyyat_novus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hekims`
--
ALTER TABLE `hekims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hekim_vezives`
--
ALTER TABLE `hekim_vezives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iscis`
--
ALTER TABLE `iscis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `istehsalcis`
--
ALTER TABLE `istehsalcis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `kateqoriyas`
--
ALTER TABLE `kateqoriyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `klinikas`
--
ALTER TABLE `klinikas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `magazas`
--
ALTER TABLE `magazas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markas`
--
ALTER TABLE `markas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mehsuls`
--
ALTER TABLE `mehsuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partnyors`
--
ALTER TABLE `partnyors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rayons`
--
ALTER TABLE `rayons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `satis`
--
ALTER TABLE `satis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satis_detallaris`
--
ALTER TABLE `satis_detallaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satis_usulus`
--
ALTER TABLE `satis_usulus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sehers`
--
ALTER TABLE `sehers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vahids`
--
ALTER TABLE `vahids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vezives`
--
ALTER TABLE `vezives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
