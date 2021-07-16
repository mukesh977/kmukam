-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 07:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khabarmukam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date_2` datetime DEFAULT NULL,
  `end_date_2` datetime DEFAULT NULL,
  `status_2` tinyint(1) DEFAULT 1,
  `order` int(11) DEFAULT NULL,
  `double_ad` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `section`, `position`, `slug`, `title`, `image`, `link`, `publish_date`, `end_date`, `status`, `image_2`, `link_2`, `publish_date_2`, `end_date_2`, `status_2`, `order`, `double_ad`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Below प्रमुख समाचार\r\n', 'below-highlighted-news', 'Pageutter', '1610185104-pu-long.gif', 'https://pageutter.com', '2021-02-02 14:09:25', '2021-02-25 14:09:25', 1, '1610185780-pm-long.jpg', 'https://pageutter.coms', '2021-02-03 15:12:57', '2021-02-26 15:12:57', 0, 1, 1, NULL, '2021-02-13 18:18:03'),
(2, 'home', 'Below ट्रेन्डिङ', 'below-trending', 'Pageutter', '1610186261-anmol.gif', 'https://pageutter.com', '2021-02-02 23:33:57', '2021-02-18 23:33:57', 1, '1610186296-dish.gif', 'https://pageutter.com', '2021-02-02 23:36:09', '2021-02-24 23:36:09', 0, 2, 1, NULL, '2021-02-13 18:27:09'),
(3, 'home', 'Below राजनीति', 'below-politics', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-26 16:10:52', 1, '1610185780-pm-long.jpg', 'https://pageutter.com', '2021-02-02 19:48:00', '2021-02-26 19:48:00', 0, 3, 1, NULL, '2021-02-13 14:04:28'),
(4, 'home', 'Below अर्थ व्यवसाय\r\n', 'below-economy-business', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-24 16:10:52', 0, '1610186217-bok.gif', 'https://pageutter.com', '2021-02-03 23:02:00', '2021-02-25 23:02:00', 1, 4, 1, NULL, '2021-02-13 17:17:45'),
(5, 'home', 'Below सुरक्षा', 'below-security', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-26 16:10:52', 0, '1610186217-bok.gif', 'https://pageutter.com', '2021-02-03 23:03:00', '2021-02-26 23:03:00', 1, 5, 1, NULL, '2021-02-13 17:19:05'),
(6, 'home', 'Below फिचर', 'below-feature', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-24 16:10:52', 0, '1610186296-dish.gif', 'https://pageutter.com', '2021-02-04 23:04:00', '2021-02-25 23:04:00', 1, 6, 1, NULL, '2021-02-13 17:20:41'),
(7, 'home', 'Below प्रदेश समाचार\r\n\r\n', 'below-province-news', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-24 16:10:52', 0, '1613236907-beer.gif', 'https://pageutter.com', '2021-02-03 23:06:00', '2021-02-25 23:06:00', 1, 7, 1, NULL, '2021-02-13 17:21:47'),
(8, 'home', 'Below विचार', 'below-opinion', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-23 16:10:52', 0, '1610185780-pm-long.jpg', 'https://pageutter.com', '2021-02-03 23:07:00', '2021-02-24 23:07:00', 1, 8, 1, NULL, '2021-02-13 17:22:43'),
(9, 'home', 'Below खेल', 'below-sports', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-24 16:10:52', 0, '1610188979-ed-long.gif', 'https://pageutter.com', '2021-02-02 23:08:00', '2021-02-25 23:08:00', 1, 9, 1, NULL, '2021-02-13 17:23:50'),
(10, 'home', 'Below भिडियो\r\n', 'below-video', 'Pageutter', '1613237092-tv.gif', 'https://pageutter.com', '2021-02-01 16:10:52', '2021-02-24 16:10:52', 1, '1610186261-anmol.gif', 'https://pageutter.com', '2021-02-01 20:07:00', '2021-02-19 20:07:00', 0, 10, 1, NULL, '2021-02-13 17:25:12'),
(11, 'home', 'Below मनाेरञ्जन', 'below-entertainment', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:53', '2021-02-24 16:10:53', 0, '1610186261-anmol.gif', 'https://pageutter.com', '2021-02-03 23:10:00', '2021-02-25 23:10:00', 1, 11, 1, NULL, '2021-02-13 17:25:54'),
(12, 'home', 'Below categories', 'below-categories', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:10:53', '2021-02-25 16:10:53', 0, '1610185104-pu-long.gif', 'https://pageutter.com', '2021-02-04 23:11:00', '2021-02-25 23:11:00', 1, 12, 1, NULL, '2021-02-13 17:27:04'),
(13, 'category', 'Below Header', 'below-header', 'Pageutter', '1610185640-ub-long-2.gif', 'https://pageutter.com', '2021-02-01 15:59:31', '2021-02-28 15:59:31', 1, '1610186217-bok.gif', 'https://pageutter.com', '2021-02-01 20:34:50', '2021-02-26 20:34:50', 0, 1, 1, NULL, '2021-02-13 14:57:49'),
(14, 'category', 'In-Between Category News (1st)', 'in-between-category-news-(1st)', 'Pageutter', '1610185739-pu.gif', 'https://pageutter.com', '2021-02-01 17:33:39', '2021-02-24 17:33:39', 1, '1610186614-gh.gif', NULL, '2021-02-13 23:14:41', '2021-02-13 23:14:41', 1, 2, 0, NULL, '2021-02-13 17:29:41'),
(15, 'category', 'In-Between Category News (2nd)', 'in-between-category-news-(2nd)', 'Pageutter', '1610192473-ed.gif', 'https://pageutter.com', '2021-02-01 17:33:39', '2021-02-24 17:33:39', 1, NULL, NULL, '2021-02-13 23:15:27', '2021-02-13 23:15:27', 1, 3, 0, NULL, '2021-02-13 17:30:27'),
(16, 'category', 'In-Between Category News (3rd)', 'in-between-category-news-(3rd)', 'Pageutter', '1613237463-nepatop.gif', 'https://pageutter.com', '2021-02-01 17:33:39', '2021-02-25 17:33:39', 1, NULL, NULL, '2021-02-13 23:16:03', '2021-02-13 23:16:03', 1, 4, 0, NULL, '2021-02-13 17:31:03'),
(17, 'category', 'Above Footer', 'above-footer', 'Pageutter', '1610185780-pm-long.jpg', 'https://pageutter.com', '2021-02-01 15:59:31', '2021-02-23 15:59:31', 1, '1610185640-ub-long-2.gif', 'https://pageutter.com', '2021-02-01 20:49:00', '2021-02-19 20:49:00', 0, 5, 1, NULL, '2021-02-13 15:05:17'),
(18, 'news-detail', 'Below Navbar', 'below-navbar-news-detail', 'Pageutter', '1610185640-ub-long-2.gif', 'https://pageutter.com', '2021-02-01 16:03:14', '2021-02-24 16:03:14', 1, '1610185104-pu-long.gif', 'https://pageutter.com', '2021-02-13 22:05:17', '2021-02-19 22:05:17', 0, 1, 1, NULL, '2021-02-13 17:32:59'),
(19, 'news-detail', 'Below News Title', 'below-news-title', 'Pageutter', '1610185698-nepa.gif', 'https://pageutter.com', '2021-02-01 16:04:53', '2021-02-23 16:04:53', 0, '1610185104-pu-long.gif', 'https://pageutter.com', '2021-02-02 23:18:00', '2021-02-26 23:18:00', 1, 2, 1, NULL, '2021-02-13 17:33:57'),
(20, 'news-detail', 'Above News Image (1st)', 'above-news-image-(1st)', 'Pageutter', '1610186261-anmol.gif', 'https://pageutter.com', '2021-02-01 10:27:52', '2021-02-24 10:27:52', 1, NULL, NULL, '2021-02-13 23:20:15', '2021-02-13 23:20:15', 1, 3, 0, NULL, '2021-02-13 17:35:15'),
(21, 'news-detail', 'Above News Image (2nd)', 'above-news-image-(2nd)', 'Pageutter', '1610186217-bok.gif', 'https://pageutter.com', '2021-02-02 10:27:52', '2021-02-25 10:27:52', 1, NULL, NULL, '2021-02-13 23:19:42', '2021-02-13 23:19:42', 1, 4, 0, NULL, '2021-02-13 17:34:42'),
(22, 'news-detail', 'Below News Image', 'below-news-image', 'Pageutter', '1610186178-channel.gif', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, NULL, NULL, '2021-02-13 23:21:05', '2021-02-13 23:21:05', 1, 5, 0, NULL, '2021-02-13 17:36:05'),
(23, 'news-detail', 'Between Description 1st', 'between-description-1st', 'Pageutter', '1610188946-ub.gif', 'https://pageutter.com', '2021-02-01 16:04:53', '2021-02-17 16:04:53', 1, NULL, NULL, '2021-02-13 23:24:19', '2021-02-13 23:24:19', 1, 6, 0, NULL, '2021-02-13 17:39:19'),
(24, 'news-detail', 'Between Description 2nd', 'between-description-2nd', 'Pageutter', '1610192473-ed.gif', 'https://pageutter.com', '2021-02-01 16:04:53', '2021-02-26 16:04:53', 1, NULL, NULL, '2021-02-13 23:24:35', '2021-02-13 23:24:35', 1, 7, 0, NULL, '2021-02-13 17:39:35'),
(25, 'news-detail', 'Between Description 3rd', 'between-description-3rd', 'Pageutter', '1610185739-pu.gif', 'https://pageutter.com', '2021-02-01 16:04:53', '2021-02-24 16:04:53', 1, NULL, NULL, '2021-02-13 23:24:48', '2021-02-13 23:24:48', 1, 8, 0, NULL, '2021-02-13 17:39:48'),
(26, 'news-detail', 'Below Description', 'below-description', 'Pageutter', '1613238054-tv (1).gif', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, NULL, NULL, '2021-02-13 23:25:54', '2021-02-13 23:25:54', 1, 9, 0, NULL, '2021-02-13 17:40:54'),
(27, 'news-detail', 'Below Facebook Comment', 'below-facebook-comment', 'Pageutter', '1610185640-ub-long-2.gif', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, '1610186217-bok.gif', 'https://pageutter.com', '2021-02-02 22:31:00', '2021-02-26 22:31:00', 1, 10, 0, NULL, '2021-02-13 16:46:43'),
(28, 'news-detail', 'Above ताजा उपडेट (1st)\r\n\r\n', 'above-latest-update-(1st)', 'Pageutter', '1610186062-ub-2.jpg', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, NULL, NULL, '2021-02-13 23:21:43', '2021-02-13 23:21:43', 1, 11, 0, NULL, '2021-02-13 17:36:43'),
(29, 'news-detail', 'Above ताजा उपडेट (2nd)', 'above-latest-update-(2nd)', 'Pageutter', '1613237862-plane.gif', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, NULL, NULL, '2021-02-13 23:22:42', '2021-02-13 23:22:42', 1, 12, 0, NULL, '2021-02-13 17:37:42'),
(30, 'news-detail', 'Above ताजा उपडेट (3rd)', 'above-latest-update-(3rd)', 'Pageutter', '1610192324-topup.gif', 'https://pageutter.com', '2021-02-01 10:45:21', '2021-02-24 10:45:21', 1, NULL, NULL, '2021-02-13 23:23:03', '2021-02-13 23:23:03', 1, 13, 0, NULL, '2021-02-13 17:38:03'),
(31, 'news-detail', 'Below ताजा उपडेट', 'below-latest-update', 'Pageutter', '1613237463-nepatop.gif', 'https://pageutter.com', '2021-02-01 10:39:49', '2021-02-28 10:39:49', 1, NULL, NULL, '2021-02-13 23:23:41', '2021-02-13 23:23:41', 1, 14, 0, NULL, '2021-02-13 17:38:41'),
(32, 'news-detail', 'Above छुटाउनुभयो कि?', 'above-missing-news', 'Pageutter', '1610185640-ub-long-2.gif', 'https://pageutter.com', '2021-02-02 22:39:16', '2021-02-26 22:39:16', 0, '1613238109-ub-long.gif', 'https://pageutter.com', '2021-02-03 22:44:00', '2021-02-25 22:44:00', 1, 15, 1, NULL, '2021-02-13 17:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `designation`, `email`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'नमिन डंगोल', '1611827943-ban1.jpg', 'लेखक', 'nameen017@gmail.com', 1, 1, '2021-01-28 09:59:03', '2021-02-12 17:32:13'),
(2, 'मुकेस राई', '1611827969-blog2.jpg', 'लेखक', 'mukeshrai541@gmail.com', 2, 1, '2021-01-28 09:59:29', '2021-02-12 17:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `author_social_media`
--

CREATE TABLE `author_social_media` (
  `author_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author_social_media`
--

INSERT INTO `author_social_media` (`author_id`, `name`, `social_media_icon`, `social_media_link`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'fab fa-facebook-f', 'https://facebook.com/ultrabyte', '2021-02-12 17:32:13', '2021-02-12 17:32:13'),
(1, 'twitter', 'fab fa-twitter', 'https://twitter.com/ultrabyte', '2021-02-12 17:32:13', '2021-02-12 17:32:13'),
(1, 'instagram', 'fab fa-instagram', 'https://www.instagram.com/ultrabyte', '2021-02-12 17:32:13', '2021-02-12 17:32:13'),
(2, 'facebook', 'fab fa-facebook-f', 'https://facebook.com/ultrabyte', '2021-02-12 17:33:43', '2021-02-12 17:33:43'),
(2, 'twitter', 'fab fa-twitter', 'https://twitter.com/ultrabyte', '2021-02-12 17:33:44', '2021-02-12 17:33:44'),
(2, 'instagram', 'fab fa-instagram', 'https://www.instagram.com/instagram', '2021-02-12 17:33:44', '2021-02-12 17:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title_np` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_order` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title_np`, `title_en`, `slug`, `list_order`, `status`, `meta_keyword`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'राजनीति', 'Politics', 'politics', 1, 1, 'seo keyword', 'seo title', 'seo description', '2021-02-10 06:59:51', '2021-02-12 18:59:12'),
(2, NULL, 'सुरक्षा', 'Security', 'security', 2, 1, NULL, NULL, NULL, '2021-02-10 07:00:18', '2021-02-10 07:00:18'),
(3, NULL, 'अर्थ', 'Economy', 'economy', 3, 1, NULL, NULL, NULL, '2021-02-10 07:00:39', '2021-02-10 07:00:39'),
(4, NULL, 'प्रदेश', 'Province', 'province', 4, 1, NULL, NULL, NULL, '2021-02-10 07:00:57', '2021-02-10 07:00:57'),
(5, NULL, 'समाज', 'Society', 'society', 5, 1, NULL, NULL, NULL, '2021-02-10 07:01:17', '2021-02-10 07:01:17'),
(6, NULL, 'सबाल्टर्न', 'Subaltern', 'subaltern', 6, 1, NULL, NULL, NULL, '2021-02-10 07:16:57', '2021-02-10 07:16:57'),
(7, NULL, 'बिचार', 'Opinion', 'opinion', 7, 1, NULL, NULL, NULL, '2021-02-10 07:18:58', '2021-02-10 07:18:58'),
(8, NULL, 'कला', 'Art', 'art', 8, 1, NULL, NULL, NULL, '2021-02-10 07:19:15', '2021-02-10 07:19:15'),
(9, NULL, 'खेलकुद', 'Sports', 'sports', 9, 1, NULL, NULL, NULL, '2021-02-10 07:19:29', '2021-02-10 07:19:29'),
(10, NULL, 'विदेश', 'Foreign', 'foreign', 10, 1, NULL, NULL, NULL, '2021-02-10 07:19:51', '2021-02-10 07:19:51'),
(11, NULL, 'सम्पादकीय', 'Editorial', 'editorial', 11, 1, NULL, NULL, NULL, '2021-02-10 07:20:09', '2021-02-10 07:20:09'),
(12, NULL, 'शिक्षा', 'Education', 'education', 12, 1, NULL, NULL, NULL, '2021-02-10 07:20:24', '2021-02-10 07:20:24'),
(13, NULL, 'स्वास्थ्य', 'Health', 'health', 13, 1, NULL, NULL, NULL, '2021-02-10 07:20:39', '2021-02-10 07:20:39'),
(14, NULL, 'जिवनशैली', 'Lifestyle', 'lifestyle', 14, 1, NULL, NULL, NULL, '2021-02-10 07:20:51', '2021-02-10 07:20:51'),
(15, NULL, 'धर्म / सस्कृती', 'Religion / Culture', 'religion-culture', 15, 1, NULL, NULL, NULL, '2021-02-10 07:21:52', '2021-02-10 07:21:52'),
(16, NULL, 'साहित्य', 'Literature', 'literature', 16, 1, NULL, NULL, NULL, '2021-02-10 07:25:11', '2021-02-10 07:25:11'),
(17, NULL, 'कृषि', 'Agriculture', 'agriculture', 17, 1, NULL, NULL, NULL, '2021-02-10 07:25:25', '2021-02-10 07:25:25'),
(18, NULL, 'विकास/ निर्माण', 'Development /  Construction', 'development-construction', 18, 1, NULL, NULL, NULL, '2021-02-10 07:26:08', '2021-02-10 07:26:08'),
(19, NULL, 'फाइनआर्ट', 'Fineart', 'fineart', 19, 1, NULL, NULL, NULL, '2021-02-10 07:26:22', '2021-02-10 07:26:22'),
(20, NULL, 'थिएटर', 'Theatre', 'theatre', 20, 1, NULL, NULL, NULL, '2021-02-10 07:26:34', '2021-02-10 07:26:34'),
(21, 1, 'दल', 'Team', 'team', 21, 1, NULL, NULL, NULL, '2021-02-10 07:27:15', '2021-02-10 07:27:15'),
(22, 1, 'संसद', 'Parliament', 'parliament', 22, 1, NULL, NULL, NULL, '2021-02-10 07:28:07', '2021-02-10 07:28:07'),
(23, 1, 'सरकार', 'Government', 'government', 23, 1, NULL, NULL, NULL, '2021-02-10 07:28:20', '2021-02-10 07:28:20'),
(24, 1, 'अदालत', 'Court', 'court', 24, 1, NULL, NULL, NULL, '2021-02-10 07:28:33', '2021-02-10 07:28:33'),
(25, 1, 'कुट्निती', 'Diplomacy', 'diplomacy', 25, 1, NULL, NULL, NULL, '2021-02-10 07:28:54', '2021-02-10 07:28:54'),
(26, 2, 'प्र्हरी', 'Police', 'police', 26, 1, NULL, NULL, NULL, '2021-02-10 07:29:11', '2021-02-10 07:29:11'),
(27, 2, 'सेना', 'Army', 'army', 27, 1, NULL, NULL, NULL, '2021-02-10 07:29:25', '2021-02-10 07:29:25'),
(28, 2, 'अपराध', 'Crime', 'crime', 28, 1, NULL, NULL, NULL, '2021-02-10 07:29:46', '2021-02-10 07:29:46'),
(29, 2, 'सिमाना', 'Border', 'border', 29, 1, NULL, NULL, NULL, '2021-02-10 07:29:58', '2021-02-10 07:29:58'),
(30, 2, 'सुशासन', 'Good Governance', 'good-governance', 30, 1, NULL, NULL, NULL, '2021-02-10 07:30:27', '2021-02-10 07:30:27'),
(31, 3, 'बैंक', 'Bank', 'bank', 31, 1, NULL, NULL, NULL, '2021-02-10 07:30:43', '2021-02-10 07:30:43'),
(32, 3, 'बिमा', 'Insurance', 'insurance', 32, 1, NULL, NULL, NULL, '2021-02-10 07:34:40', '2021-02-10 07:34:40'),
(33, 3, 'उधोग', 'Industry', 'industry', 33, 1, NULL, NULL, NULL, '2021-02-10 07:35:00', '2021-02-10 07:35:00'),
(34, 3, 'पयटन', 'Tourism', 'tourism', 34, 1, NULL, NULL, NULL, '2021-02-10 07:35:14', '2021-02-10 07:35:14'),
(35, 3, 'व्यापार', 'Business', 'business', 35, 1, NULL, NULL, NULL, '2021-02-10 07:35:25', '2021-02-10 07:35:25'),
(36, 3, 'शेयर', 'Share', 'share', 36, 1, NULL, NULL, NULL, '2021-02-10 07:35:35', '2021-02-10 07:35:35'),
(37, 3, 'उर्जा', 'Energy', 'energy', 37, 1, NULL, NULL, NULL, '2021-02-10 07:35:48', '2021-02-10 07:35:48'),
(38, 4, 'स्थानीय निकाय', 'Local Body', 'local-body', 38, 1, NULL, NULL, NULL, '2021-02-10 07:36:04', '2021-02-10 07:36:04'),
(39, 4, 'प्रदेश १', 'Province 1', 'province-1', 39, 1, NULL, NULL, NULL, '2021-02-10 07:36:20', '2021-02-10 07:36:20'),
(40, 4, 'प्रदेश २', 'Province 2', 'province-2', 40, 1, NULL, NULL, NULL, '2021-02-10 07:36:38', '2021-02-10 07:36:38'),
(41, 4, 'बागमती', 'Bagmati', 'bagmati', 41, 1, NULL, NULL, NULL, '2021-02-10 07:36:52', '2021-02-10 07:36:52'),
(42, 4, 'गण्डकी', 'Gandaki', 'gandaki', 42, 1, NULL, NULL, NULL, '2021-02-10 07:37:03', '2021-02-10 07:37:03'),
(43, 4, 'लुम्बिनी', 'Lumbini', 'lumbini', 43, 1, NULL, NULL, NULL, '2021-02-10 07:37:15', '2021-02-10 07:37:15'),
(44, 4, 'कर्णाली', 'Karnali', 'karnali', 44, 1, NULL, NULL, NULL, '2021-02-10 07:37:30', '2021-02-10 07:37:30'),
(45, 4, 'सुदुरपश्चिम', 'Far-western', 'far-western', 45, 1, NULL, NULL, NULL, '2021-02-10 07:37:55', '2021-02-10 07:37:55'),
(46, NULL, 'अर्थ व्यवसाय', 'Economy and Business', 'economy-and-business', 46, 1, NULL, NULL, NULL, '2021-02-11 07:51:02', '2021-02-11 07:51:02'),
(47, NULL, 'फिचर', 'Featured News', 'featured-news', 47, 1, NULL, NULL, NULL, '2021-02-11 10:08:55', '2021-02-11 10:08:55'),
(48, NULL, 'प्रविधि', 'Technology', 'technology', 48, 1, NULL, NULL, NULL, '2021-02-11 17:49:56', '2021-02-11 17:49:56'),
(49, NULL, 'भिडियो', 'Video', 'video', 49, 1, NULL, NULL, NULL, '2021-02-11 18:00:51', '2021-02-11 18:00:51'),
(50, NULL, 'मनाेरञ्जन', 'Entertainment', 'entertainment', 50, 1, NULL, NULL, NULL, '2021-02-11 18:08:38', '2021-02-11 18:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `choose_categories`
--

CREATE TABLE `choose_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choose_categories`
--

INSERT INTO `choose_categories` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'tab_1', '1', NULL, '2021-02-13 03:49:07'),
(2, 'tab_2', '4', NULL, '2021-02-13 03:49:07'),
(3, 'tab_3', '48', NULL, '2021-02-13 03:49:07'),
(4, 'tab_4', '2', NULL, '2021-02-13 03:49:07'),
(5, 'tab_5', NULL, NULL, '2021-02-11 18:40:28'),
(6, 'tab_6', NULL, NULL, '2021-02-11 18:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `settings_id` bigint(20) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`settings_id`, `section`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'company', '+९७७ ९८५१२३६५२३', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(1, 'company', '०१-४२३६५६', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(1, 'advertisement', '+९७७ ९८५१२३६५२३', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(1, 'advertisement', '०१-४२३६५६', '2021-02-12 06:21:14', '2021-02-12 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `settings_id` bigint(20) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`settings_id`, `section`, `email`, `created_at`, `updated_at`) VALUES
(1, 'company', 'khabarmukam@gmail.com', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(1, 'advertisement', 'khabarmukam@gmail.com', '2021-02-12 06:21:14', '2021-02-12 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_28_052810_create_permission_tables', 1),
(5, '2020_12_30_094154_create_categories_table', 1),
(6, '2021_01_01_093228_create_authors_table', 1),
(7, '2021_01_03_121136_create_news_table', 1),
(8, '2021_01_05_072429_create_news_categories_table', 1),
(9, '2021_01_06_105035_create_advertisements_table', 1),
(10, '2021_01_10_054056_create_choose_categories_table', 1),
(11, '2021_01_31_124707_create_news_react_emoji_table', 2),
(12, '2021_02_02_153826_create_pages_table', 3),
(13, '2021_02_02_162856_create_settings_table', 4),
(14, '2021_02_02_162918_create_emails_table', 4),
(15, '2021_02_02_162928_create_contacts_table', 4),
(16, '2021_02_02_164419_create_social_media_table', 5),
(18, '2021_02_03_073516_create_team_categories_table', 6),
(19, '2021_02_03_074640_create_teams_table', 6),
(20, '2021_02_04_043410_create_photo_features_table', 7),
(21, '2021_02_12_220745_create_author_social_media_table', 8),
(22, '2021_02_13_010650_create_seos_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_count` bigint(20) NOT NULL DEFAULT 0,
  `top_news` tinyint(1) DEFAULT NULL,
  `show_image` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `highlighted_news` tinyint(1) DEFAULT 0,
  `featured_news` tinyint(1) NOT NULL DEFAULT 0,
  `published_date` datetime NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author_id`, `title`, `caption`, `description`, `image`, `video_link`, `view_count`, `top_news`, `show_image`, `status`, `highlighted_news`, `featured_news`, `published_date`, `meta_keyword`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'किसानलाई खुसी बनाउन नयाँ बजार व्यवस्थित गर्नुपर्छ : मन्त्री अर्याल', '<p>काठमाडौं :&nbsp;कृषि तथा पशुपंक्षी विकास मन्त्री पद्माकुमारी अर्यालले किसानलाई खुसी बनाउन बजारलाई नयाँ ढंगले व्यवस्थित गर्नुपर्ने बताएकी छन । मन्त्रालय अन्तर्गत रहेका संस्थान, समितिहरुको छलफलका क्रममा आयोजीत कार्यक्रममा आफ्नो धारणा राख्दै मन्त्री अर्यालले त्यस्तो बताएकी हुुन ।</p>\r\n\r\n<p>किसानले बजारमा ल्याएको तरकारीको डोको फर्काएर लैजानुपर्ने अवस्थाको अन्त्यका निम्ती निम्ती नयाँ ढंगले बजारको व्यवस्थापन आवश्यक रहेको बताईन । &lsquo;बजारलाई नयाँ ढंगले व्यवस्थित नगरिकन किसानहरुलाई खुसी बनाउन सकिदैन । कृषि मन्त्रालयले &lsquo;उत्पादन गर बजारको व्यवस्था हामी गर्छौ&rsquo; भन्ने&rsquo;, मन्त्री अर्यालले भनिन, &lsquo;तर किसानहरुले बजारमा ल्याएको वस्तु फर्काएर लैजाने स्थिती राम्रो होइन । दुध उत्पादन ग&yen;यो सडकमा पोख्नुपर्ने यो धेरै गम्भिीर कुरा हो । मान्छेलाई निराश बनाउने ऋण थपाउने कुरा राम्रो होइन ।&rsquo;</p>\r\n\r\n<p>बजारको ग्यारेन्टी गर्ने गरी नयाँ ढंगले जानुपर्ने भन्दै उनले हिजोको परम्परावादी योजना, सोचले अब अगाडी बढ्न नसकिने बताईन । उनले भनिन, &lsquo;आजको आवश्यकताहरु पुर्ती गर्नेगरी जानुप&yen;यो । आजका समस्या के हुन ? आजका समस्या समाधान गर्न के गर्ने भन्ने हिसाबले गहन अध्ययन गरेर जाउ ।&rsquo; आफ्नो कार्यकालमा केही नयाँ गर्नेगरी जान कर्मचारीलाई निर्देशन दिँदै मन्त्री अर्यालले हिजोको नेतृत्वले जे ग&yen;यो त्यसको निरन्तरता मात्र आजको आवश्यकता नभएको बताईन । मेरो पालामा केही नयाँ चिज दिन्छु भन्ने हिसाबले अगाडी बढ्न समेत उनले आग्रह नयाँ सिस्टम बसाल्छु भन्ने ढंगले अगाडी बढ्न निर्देशन दिईन ।</p>\r\n\r\n<p>सरकारले संघीय, प्रादेशिक र स्थानीय गरी ३ खालको बजारको परिकल्पना गरेको बताउदै मन्त्री अर्यालले कस्ता बजारलाई कुन बजारमा राख्ने भन्ने ढंगले मापदण्ड बनाउन निर्देशन दिईन । &lsquo;कस्तालाई कुन बजारमा राख्ने ? तपाईहरु मापदण्ड बनाउनुस । यसलाई कार्यान्वयन गर्नेगरी जाम । किसानलाई उत्साहित बनाउन यो कार्य जरुरी छ&rsquo;, उनले भनिन, &lsquo;हाम्रो बजार हाम्रो हातमा छैन । कोभिडको बेला किसानहरुले तरकारी, फलफूल उत्पादन गरे । काठमाडौं आइपुग्दा हाम्रो बजार त अर्कैले कब्जा गरिसकेको छ । अनि किसानहरु फर्केर जाने स्थिती बन्यो । बजारको बर्गीकरण गरेर ल्याउनुस । हाम्रो बजार हाम्रो हातमा नलिई किसानहरुको हित हुदै हुदैन । योजना लिएर आउनुस । आजसम्मको तपाईहरुको अध्ययनले के भन्छ ?&rsquo; कालिमाटी, फलफूल तथा तरकारी बजारका सन्दर्भमा कर्मचारीहरुले नै बजार कब्जा गरेर बसेको भन्ने गुनासो आइरहेको भन्दै मन्त्री अर्यालले त्यसको बारेमा रिपोर्ट ल्याउन कर्मचारीलाई निर्देशन दिईन ।</p>\r\n\r\n<p>सरकारका तर्फबाट बिक्रि भएका बेर्नाबाट उत्पादन भएन भन्ने कुरा बढी उठ्ने गरेको भन्दै उनले यस सन्दर्भमा सत्यतथ्य पत्ता लगाएर रिपोर्ट दिन समेत निर्देशन दिईन । दुग्ध विकास वोर्ड र संस्थान दुईवटा निकाय रहेकाले संस्थान र वोर्डहरुको अन्तर सम्बन्धहरुलाई छुट्याएर अलग&ndash;अलग संरचना राखेर झञ्जटिलो बनाउनु भन्दा एकीकृत गर्न सकिन्छ भने यस विषयमा सोच्न समेत मन्त्री अर्यालले आग्रह गरिन ।</p>', '<p>किसानहरुले दुधको भुक्तानी नपाएको कुरा आइरहेको भन्दै उनले दिगो बजार व्यवस्थापन कसरी गर्ने भन्नेतर्फ ध्यान जान जरुरी रहेको बताईन । &lsquo;किसानहरु आफ्नो दुधको भुक्तानी किन पाएननन । कोभिडका कारणले पाएनन की अरु पनि कारण छन् । किसानलाई उत्पादन गर भन्ने तर किसानको दुधको मूल्य नदिने भन्ने कुरा राम्रो भएन&rsquo;, मन्त्री अर्यालले भनिन, &lsquo;यसको दिगो समाधान के हो ? उत्पादन रोक्नु भएन । उचित समयमा उचित मूल्य कसरी दिन सकिन्छ ? दीर्घकालिन समाधान सहित अगाडी बढ्नुपर्छ । नत्र यस्ता विषयहरु बल्झिरहन्छन् ।&rsquo;</p>', '1611915505-1609738351-br1.jpg', NULL, 38, 1, 1, 1, 1, 1, '2021-02-11 03:36:31', NULL, NULL, NULL, '2021-01-28 10:14:31', '2021-02-13 03:46:48'),
(3, 1, 'सहकारीलाई जग्गा र भवन निर्माण गर्न १५ लाखदिने घोषणा', '<p><strong>बारा :</strong>&nbsp;जिल्लाको कलैया उपमहानगरपालिका १८ स्थीत रहेको साना किसान कृषि सहकारी संस्था लिमिटेड मोतीसरको प्रथम बार्षिक साधारणसभा शनिबार मनगढवामा सम्पन्न भएको छ ।</p>\r\n\r\n<p>कलैया उपमहानगरपालिकाका नगरप्रमुख राजेशराय यादवको प्रमुख आतिथ्यतामा कार्यक्रम भएको हो । प्रमुख अतिथी समेत रहनु भएका यादवले सहकारी मार्फत कृषि क्षेत्रमा कान्ती गर्न सकिने धारणा राख्नुभयो । वहाँले महिलाहरुको अगुवाईले समाज समृद्ध हुन समय नलाग्ने भन्दै महिलाहरुले संचालनमा ल्याएको साना किसान कृषि सहकारीको विकास र सेवा विस्तारमा उपमहानगरपालिकाले सकेको सहयोग गर्ने बताउनु भयो । वहाँले मल,विल विषादी बिक्रिका लागि डिलर तथा संस्थाको भवन निर्माणका लागि १५ लाख रुपैंया बजेट दिने घोषण समेत गर्नु भएको छ ।</p>\r\n\r\n<p>यस्तै कार्यक्रममा साविक मोतीसर गाविसका भुतपुर्व अध्यक्ष धुरुव प्रसाद यादवले संस्थाको कार्यालय स्थापनाका लागि उपयूक्त स्थानमा बढिमा एककठ्ठा जमिन दिने कार्यक्रममा घोषणा गर्नु भएको छ । पूर्वजनप्रतिनी यादवले सामाजिक विकासमा महिलाको अगुवाई, स्थानिय रोजगारी सृजनामा सहकारीले खेल्न सक्ने भुमिकामा मद्द गर्न जग्गा उपलब्ध गराउन चाहेको बताउनु भयो ।</p>\r\n\r\n<p>कार्यक्रममा साना किसान कृषि सहकारी संघ प्रदेश नं.२ का सचिव एवं कलैया उपमहानगरपालिका २१का वडा अध्यक्ष पुनदेव प्रसाद रौनियारले साना किसान अभियान भरपर्दो स्थानिय संस्था भएको बताउनु भयो । धेरै महिला सदस्यहरुको सहभागिता रहेने साना किसान कार्यक्रम देशभर उत्कृष्ठ अभियानका रुपमा परिचीत रहेको भन्दै स्थानिय सरकारले हातेमालो गर्दै आफ्ना तमाम कार्यक्रमा विश्वासका साथ सहकार्य गर्नु पर्ने बताउनु भयो ।</p>\r\n\r\n<p>सभामा साना किसान कृषि सहकारी संघ लिमिटेड बाराका अध्यक्ष मिश्रिलाल सहनी, साना किसान कृषि सहकारी संस्था लिमिटेड मनहर्वाकी अध्यक्ष नयनकला खड्का, कलैया उपमहानगरपालिका १८का निमित्त वडा अध्यक्ष राजकुमार साह, सहकारी पत्रकार समाज, बाराका अध्यक्ष पुष्पराज खतिवडा, ईन्सेक प्रतिनीधि भोलानाथ पौडेल, स्थानिय समाजसेवीहरु शर्मा बैठा, परमानन्द प्रसाद गुप्ता, सुरेन्द्र चौरसिया, उमाशंकर चौरसिया,हिर्दय नारायण महत्तो, सुनैना देवी लगायत ३ दर्जनबढी स्थानिय समाजिक अगुवा तथा ४ सय बढि सदस्यहरुको सभागिता रहेको थियो ।</p>', '<p>४ सय ४६ महिला सदस्य रहेको मोतिसर साना किसानले करिब सवा करोड कारोबारबाट ३ ला ५६ हजार मुनाफा गरेको जनाएको छ । उक्त मुनाफाबाट आफ्ना सदस्यहरुलाई १० प्रतिशतका दरमा मुनाफा वितरण गर्ने सभाले निर्णय समेत गरेको छ ।</p>\r\n\r\n<p>सभाले अध्यक्ष वदन देवीको संस्थागत प्रतिवेदन, कर्मचारी परमानन्द प्रसाद चौरसियाको प्रगती एवं आय ब्याय प्रतिवेदन सुझाव सहित पारित गरेको छ ।</p>\r\n\r\n<p>कार्यक्रम संस्था अध्यक्ष बदन देवीको अध्यक्षता संचालक सारदा देवीको स्वागत एवं संचारकर्मी तथा सहकारीका सल्लाहकार अनिल गौरवको संचालनमा सम्पन्न भएको हो ।</p>', '1611915733-1610041251-16096591051609659105.jpg', NULL, 96, 1, 1, 1, 1, 1, '2021-02-11 04:07:00', 'seo keyword', 'seo title', 'seo description', '2021-01-29 10:22:16', '2021-02-13 18:47:49'),
(4, 1, 'Natural Saccos AGM | नेचुरल बचत तथा ऋण सहकारीको छलाङ हेर्नुहाेस्', '<p>Natural Saccos AGM | नेचुरल बचत तथा ऋण सहकारीको छलाङ हेर्नुहाेस्</p>', '<p>Natural Saccos AGM | नेचुरल बचत तथा ऋण सहकारीको छलाङ हेर्नुहाेस्</p>', '1612246971-16081834451608183445.jpg', '8ZrFQOY6Dxw', 10, 0, 0, 1, 1, 1, '2021-02-11 00:07:00', NULL, NULL, NULL, '2021-02-02 06:22:51', '2021-02-13 18:35:05'),
(5, 1, 'पुतलीबजारमा सहकारी बैंकको ६८ औं शाखा', '<p><strong>स्याङ्जा :</strong>&nbsp;राष्ट्रिय सहकारी बैंक लिमिटेडको ६८ औं शाखा बिहीबारदेखि स्याङ्जाको पुतलीबजारमा शुरु भएको छ । पुतलीबजार नगरपालिकाका प्रमुख सीमा क्षेत्री र सहकारी विभागका रजिष्ट्रार डा.टोकराज पाण्डेले शाखाको संयुक्त रुपमा उद्घाटन गर्नु भएको हो ।</p>\r\n\r\n<p>कार्यक्रममा बोल्दै नगर प्रमुख क्षेत्रीले समृद्ध नेपाल निर्माणका लागि सहकारी अभियानको योगदान बढाउनु पर्नेमा जोड दिनु भएको थियो । सहकारीमा रहेको पूँजिलाई उत्पादन क्षेत्रमा लगाउनका लागि राष्ट्रिय सहकारी बैंकले थपप्रभावकारी भूमिका निर्वाह गर्नु पर्नेमा जोड दिदै उहाँले त्यसमा स्थानीयतहको सक्रिय सहभागिता रहने प्रतिवद्धता व्यक्त गर्नु भयो ।</p>\r\n\r\n<p>कार्यक्रममा बोल्दै सहकारी विभागका रजिष्ट्रार डा. टोकराज पाण्डेले सहकारीको अवधारणा अनुसार सहकारीहरुले काम गर्ने हो भने गरिवीनिवारणका लागि सहकारीको भूमिका सबैभन्दा प्रभावकारी हुने धारणा राख्नुभयो । सहकारीका नाममा गलत गर्नेहरुलाई समयमै पाखा लगाउनका लागि अभियानका असल अभियन्ताहरुको सक्रियता आवश्यक रहेको उहाँको भनाइ थियो । सहकारी क्षेत्र ७३ लाखजनता आवद्ध भएको प्रभावकारी क्षेत्र भएकाले यसलाई उत्पादनमा लगाउनका लागि सहकार्यमा जोड दिनुभयो ।</p>\r\n\r\n<p>कार्यक्रममा जिल्ला सहकारी संघ स्याङ्जाका अध्यक्ष लक्ष्मपति पौडेल, बचत तथा ऋण सहकारी संघका अध्यक्ष रविन्द्र प्रसाद श्रेष्ठले सहकारीहरुको बैंक सहकारी बैंकको शाखा पुतलीबजारमा शुरु भएकाले सबै सहकारी संघ संस्थाहरुलाई सहकारी बैंकमा कारोबार गर्न आव्हान गर्नु भएको थियो ।</p>\r\n\r\n<p>कार्यक्रममा बैंकका प्रमुख कार्यकारी अधिकृत बद्रीकुमार गुरागाईले बैंकको विगत, वर्तमान र आगामी योजनाकाबारे प्रस्तुतीकरण गर्नु भएको थियो । कार्यक्रमका सहभागीहरुले सहकारी बैंकमार्फत सहकारीहरुको प्रवद्र्धनमा सबैको ऐक्यवद्धतामा जोड दिनु भएको थियो ।</p>', '<p>कार्यक्रम बैंकका अध्यक्ष के.बी.उप्रेतीको अध्यक्षता, सञ्चालक तथा गण्डकी प्रदेशका संयोजक रामबहादुर जिसीको सञ्चालन र वालिङ शाखा समन्वय उपसमितिका संयोजक पूण्य प्रसाद अर्यालको स्वागतमा सम्पन्नभएको थियो ।</p>\r\n\r\n<p>स्याङ्जाका पुतलीबजार नगरपालिका, फेदीखोला गाउँपालिका, अर्जुन चौपारी गाउँपालिका, विरुवागाउँपालिका, हरिनास गाउँपालिकालाई केन्द्रीत गरी शाखा सञ्चालन गरिएको र शाखामा उद्घाटनको दिनसम्म २० करोड बचत संकलन भएको शाखा प्रमुख पुष्पा क्षेत्रीले जानकारी दिनुभयो ।</p>', '1613187192-16131265561613126556.jpg', NULL, 0, 1, NULL, 1, 1, 1, '2021-02-08 09:17:00', NULL, NULL, NULL, '2021-02-13 03:33:14', '2021-02-13 18:25:45'),
(6, 1, 'वैदेशिक ऋण भित्र्याउँदा राष्ट्र बैंकको स्वीकृति नचाहिने', '<p>काठमाडौं :&nbsp;अब विदेशी लगानी हुने कम्पनी तथा उद्योगले वैदेशिक ऋण भित्र्याउन राष्ट्र बैंकका अनिवार्य स्विकृत लिन नपर्ने भएको छ । त्यसका लागि राष्ट्र बैंकले विदेशी लगानी तथा विदेशी ऋण व्यवस्थापन विनियमावली २०७७ यस्तो व्यवस्था गरेको हो ।</p>\r\n\r\n<p>&nbsp;<br />\r\nराष्ट्र बैंकका अनुसार &lsquo;विदेशी लगानी हुने कम्पनी तथा उद्योगमा कम्नी तथा उद्योगको दर्ता लगायतका सम्भाव्यता अध्ययन खर्च र पूर्व सञ्चालन खर्च बापतको विदशी मुद्रा इन्छुक विदेशी लगानीकर्ताले बैंकिङ प्रणाली मार्फत नेपाल पठाउन भित्र्याउन विदेशी लगानीकको पूर्व स्वीकृति वा राष्ट्र बैंकको स्वीकृति अनिवार्य हुने छैन ।&rsquo; अब भने राष्ट्र बैंकलाई लिखिच जानकारी गराए मात्रै पुग्ने छ ।</p>', '<p>विदेशी लगानी हुने कम्पनी तथा उद्योगको कायम चुक्ता पुँजीको २ प्रतिशतमा नबढने गरी लेखापरिक्षकबाट खर्च प्रमाणित गरे बमोजिम विदेशी लगानीमा गणाना गर्न सकिने छ ।</p>', '1613187308-16081749101608174910.jpg', NULL, 0, 1, NULL, 1, 1, 1, '2021-02-10 09:19:00', NULL, NULL, NULL, '2021-02-13 03:35:08', '2021-02-13 18:25:27'),
(7, 1, 'चन्द्रागिरी हिल्सको आइपिओ सूचिकृत', '<p>काठमाडौं :&nbsp;नेपाल स्टक एक्सचेन्ज (नेप्से) मा आज ( शुक्रबार) चन्द्रागिरी हिल्स लिमिटेडकाे साधारण शेयर (आइपिओ) सूचिकृत भएको छ ।</p>\r\n\r\n<p>स्टकको अनुसार कम्पनीकाे एक करोड ५३ लाख ४० हजार ९ सय १० कित्ता साधारण शेयर (आइपिओ) सूचिकृत भएको हो । नेप्सेले कम्पनीकाे पहिलो कारोबारका लागि न्युनतम ९६ रूपैयाँ ६९ पैसादेखि अधिकतम २९० रूपैयाँ ७ पैसासम्मको कारोबार रेञ्ज प्रदान गरेको छ ।</p>', '<p>कम्पनीकाे आइपिओलाई शेयर काराेबार गर्नका CGH संकेत प्रदान गरिएको छ ।</p>', '1613187404-16094928121609492812.jpg', NULL, 0, 1, 1, 1, 1, 1, '2021-02-09 09:21:00', NULL, NULL, NULL, '2021-02-13 03:36:27', '2021-02-13 18:25:10'),
(8, 1, 'संवैधानिक निकायमा नियुक्तिविरुद्ध शीतल निवासमा नागरिक अगुवाको मार्चपास', '<p><strong>काठमाडौं : </strong>नागरिक अगुवाहरूले शुक्रबार बिहान काठमाडौंमा मार्चपास गरेका छन् । राष्ट्रपति विद्यादेवी भण्डारीले अवैधानिकरुपमा संवैधानिक निकायमा नियुक्ति गरेको भन्दै त्यसको विरोधमा बृहत नागरिक आन्दोलनको आयोजनामा मार्चपास गरिएको हो ।</p>\r\n\r\n<p>नागरिक समाजका अगुवाहरुले बिहान पद्मरत्न तुलाधर निवास परिसर, लैनचौरदेखि शीतल निवासको निषेधित क्षेत्रसम्म मार्चपास गरेका हुन् । उनीहरुले राष्ट्रपति ज्यू संविधान कहाँ छ?, अवैधानिक नियुक्ति मान्दैनौं, सत्ता कब्दा मुर्दावाद, लोकतन्त्र जिन्दावाद लेखिएका पम्पलेटसहित मार्च पास गरेका थिए ।</p>\r\n\r\n<p>संवैधानिक निकायहरूमा गरिएको नियुक्ति अवैधानिक रहेको उनीहरूको भनाइ छ । नागरिक अभियन्ता पद्मरत्न तुलाधरको लैनचौरस्थित निवासबाट राष्ट्रपति कार्यालयसम्म तय गरिएको मार्चपासमा नागरिक अगुवाहरू खगेन्द्र संग्रौला, नारायण वाग्ले, युग पाठक, कृष्ण खनाल, सञ्जीव उप्रेतीलगायत सहभागी छन् । तर प्रहरीले अगाडि बढ्न नदिएपछि उनीहरू अहिले महाराजगन्ज, पानीपाेखरीमा सभा गरिरहेका छन् ।</p>', '<p>विभिन्न संवैधानिक निकायका अध्यक्ष र सदस्यका रूपमा सिफारिस गरिएकाहरूलाई बुधबार राष्ट्रपति विद्यादेवी भण्डारीले नियुक्त गरेकी थिइन् । शीतल निवासमा उनीहरुलाई शपथ ग्रहण गराइएको थियो । सरकारले गरेको सिफारिस र नियुक्ति विधिविपरीत रहेको भन्दै नेकपाकै दाहाल&ndash;नेपाल समूहलगायत दलहरूले पनि विरोध गर्दै आएका छन् ।</p>\r\n\r\n<p>नागरिक अगुवाहरुले प्रतिनिधिसभा विघटनविरुद्ध पनि प्रदर्शन गर्दै आएका छन् । केही दिनअघिको नागरिक आन्दोलनमा प्रहरीले बल प्रयोग गरेको भन्दै उनीहरु थप आन्दोलित भएका छन्&nbsp;।</p>', '1613187486-16125254291612525429.jpg', NULL, 0, 1, 1, 1, 1, 1, '2021-02-05 09:22:00', NULL, NULL, NULL, '2021-02-13 03:38:07', '2021-02-13 03:38:07'),
(9, 1, 'महामारीले प्रविधि सिकायो', '<p>दीपेन्द्र राउतसँग &lsquo;सहकारी बहस&rsquo; | महामारीले प्रविधि सिकायो | Interview with Dipendra Raut by Kajee</p>', '<p>दीपेन्द्र राउतसँग &lsquo;सहकारी बहस&rsquo; | महामारीले प्रविधि सिकायो | Interview with Dipendra Raut by Kajee</p>', '1613241565-16081833571608183357.jpg', '1xgk6Pm50NU', 0, 0, NULL, 1, 0, 0, '2021-02-14 00:24:00', NULL, NULL, NULL, '2021-02-13 18:39:27', '2021-02-13 18:39:27'),
(10, 1, 'सहकारीले उत्पादन गर्ने सामग्रीको बजार ग्यारेन्टी हामी गरिदिन्छौं', '<p>सहकारीले उत्पादन गर्ने सामग्रीको बजार ग्यारेन्टी हामी गरिदिन्छौं | Interview with KN Sharma by kajee</p>', '<p>सहकारीले उत्पादन गर्ने सामग्रीको बजार ग्यारेन्टी हामी गरिदिन्छौं | Interview with KN Sharma by kajee</p>', '1613241661-16081749101608174910.jpg', 'd1cLjG5zpFk', 0, 0, NULL, 1, 0, 0, '2021-02-10 00:25:00', NULL, NULL, NULL, '2021-02-13 18:41:02', '2021-02-13 18:41:02'),
(11, 1, 'सहकारीको ब्याजदर बजारले निर्धारण गर्नुपर्दछ', '<p>सहकारीको ब्याजदर बजारले निर्धारण गर्नुपर्दछ&nbsp;</p>', '<p>सहकारीको ब्याजदर बजारले निर्धारण गर्नुपर्दछ&nbsp;</p>', '1613241734-16081830181608183018.jpg', 'RZl81BLCTyw', 1, 0, NULL, 1, 0, 0, '2021-02-08 00:27:00', NULL, NULL, NULL, '2021-02-13 18:42:14', '2021-02-13 18:42:55'),
(12, 1, 'त्रिवेणी गाउँपालिकाको दुम्किबासमा विकू बचतको १९ औं सेवा केन्द्र', '<p><strong>गैंडाकोट :&nbsp;</strong>विकू बचत तथा ऋण सहकारी संस्थाले सोमबारदेखि विनयी त्रिवेणी गाउँपालिका&ndash;१ दुम्किबास बजारबाट एकिकृत सेवा शुभारम्भ गरेको छ ।&nbsp;</p>\r\n\r\n<p>विनयी त्रिवेणी&ndash;१ दुम्किबास बजारमा जनकल्याण सेवा केन्द्रमार्फत सेवा शुभारम्भ गरेको हो । गैंडाकोट नगरपालिका&ndash; ८ मा केन्द्रीय कार्यालय भई नवलपुर र चितवन जिल्लामा सेवा प्रवाह गरिरहेको विकू साकोस र विनयी त्रिवेणी&ndash;१ दुम्किबास बजारमा रहेको जनकल्याण बहुमुखी सहकारी संस्थाबीच एकिकरण भएको थियो ।&nbsp;</p>\r\n\r\n<p>संस्थाले यही माघ १९ गते सोमबार एक औपचारिक कार्यक्रमका बीच नयाँ सुविधायुक्त कार्यालयसहित जनकल्याण सेवा केन्द्रको समुद्धघाटन कार्यक्रम सम्पन्न गरेको हो ।</p>\r\n\r\n<p>कार्यक्रमको उद्धघाटन गर्दै विनयी त्रिवेणी गाउँपालिका उपाध्यक्ष एवं प्रमुख अतिथि मिना रानाले विकू विपन्न वर्गका सदस्यहरुको जिवनस्तर माथि उकास्न आय आर्जन सिकाउने संस्था रहेको बताउनु भयो । विकुको आगमन विनयी त्रिवेणी गाउँपालिकाको आम किसान, व्यावसायी ,मजदुर उद्यमी र यस क्षेत्रको लागि अवसर तथा गौरवको विषय भएको व्यक्त गर्दै स्थानिय सरकारको तर्फबाट पुर्ण सहयोगको प्रतिवद्धता जनाउनुभयो ।</p>\r\n\r\n<p>&nbsp;</p>', '<p>कार्यक्रमा बोल्दै &nbsp;अध्यक्ष ओम प्रसाद सापकोटाले विकू नेपालको सर्बोत्कृट बचत तथा ऋण सहकारी रहेको बताउदै नीति, विधि र प्रविधि नै विकुको सफलता भएको बताउनु भयो । ५० पैसाबाट ७ अर्ब र २६ जनाबाट ८२ हजार शेयर सदस्य पुग्नु नै ठुलो सफलता रहेको कुरा व्यक्त गर्दै संस्था राष्ट्रिय सहकारी अभियानमा सिकाइको पाठशाला तथा अन्तराष्ट्रिय सहकारीका लागि उदाहरणीय नमुना रहेको बताउनु भयो ।&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '1613241987-16122651921612265192.jpg', NULL, 0, 0, NULL, 1, 1, 1, '2021-02-08 00:30:00', NULL, NULL, NULL, '2021-02-13 18:46:29', '2021-02-13 18:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `category_id` bigint(20) NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`category_id`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(2, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(4, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(38, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(39, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(40, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(7, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(9, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(46, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(47, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(48, 3, '2021-02-13 03:28:30', '2021-02-13 03:28:30'),
(50, 3, '2021-02-13 03:28:31', '2021-02-13 03:28:31'),
(1, 8, '2021-02-13 03:41:21', '2021-02-13 03:41:21'),
(2, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(4, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(38, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(39, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(40, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(7, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(9, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(46, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(47, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(48, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(50, 8, '2021-02-13 03:41:22', '2021-02-13 03:41:22'),
(1, 1, '2021-02-13 03:46:48', '2021-02-13 03:46:48'),
(2, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(4, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(38, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(39, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(40, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(7, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(9, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(46, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(47, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(48, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(50, 1, '2021-02-13 03:46:49', '2021-02-13 03:46:49'),
(1, 7, '2021-02-13 18:25:10', '2021-02-13 18:25:10'),
(2, 7, '2021-02-13 18:25:10', '2021-02-13 18:25:10'),
(4, 7, '2021-02-13 18:25:10', '2021-02-13 18:25:10'),
(38, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(39, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(40, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(7, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(9, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(46, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(47, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(48, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(50, 7, '2021-02-13 18:25:11', '2021-02-13 18:25:11'),
(1, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(21, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(2, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(4, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(38, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(39, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(40, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(7, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(9, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(46, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(47, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(48, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(50, 6, '2021-02-13 18:25:28', '2021-02-13 18:25:28'),
(1, 5, '2021-02-13 18:25:45', '2021-02-13 18:25:45'),
(2, 5, '2021-02-13 18:25:45', '2021-02-13 18:25:45'),
(4, 5, '2021-02-13 18:25:45', '2021-02-13 18:25:45'),
(38, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(39, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(40, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(7, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(9, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(46, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(47, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(48, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(50, 5, '2021-02-13 18:25:46', '2021-02-13 18:25:46'),
(49, 4, '2021-02-13 18:35:05', '2021-02-13 18:35:05'),
(49, 9, '2021-02-13 18:39:27', '2021-02-13 18:39:27'),
(49, 10, '2021-02-13 18:41:02', '2021-02-13 18:41:02'),
(49, 11, '2021-02-13 18:42:14', '2021-02-13 18:42:14'),
(1, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(2, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(4, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(38, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(39, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(40, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(7, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(9, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(46, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(47, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(48, 12, '2021-02-13 18:46:29', '2021-02-13 18:46:29'),
(50, 12, '2021-02-13 18:46:30', '2021-02-13 18:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `news_react_emoji`
--

CREATE TABLE `news_react_emoji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `love` int(11) NOT NULL DEFAULT 0,
  `wow` int(11) NOT NULL DEFAULT 0,
  `liked` int(11) NOT NULL DEFAULT 0,
  `laugh` int(11) NOT NULL DEFAULT 0,
  `sad` int(11) NOT NULL DEFAULT 0,
  `angry` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_react_emoji`
--

INSERT INTO `news_react_emoji` (`id`, `news_id`, `love`, `wow`, `liked`, `laugh`, `sad`, `angry`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 3, 2, 2, 0, 0, NULL, '2021-02-11 05:11:03'),
(3, 3, 1, 1, 0, 0, 0, 0, NULL, '2021-02-12 09:40:49'),
(4, 4, 0, 0, 0, 0, 0, 0, '2021-02-02 06:22:51', '2021-02-02 06:22:51'),
(5, 5, 0, 0, 0, 0, 0, 0, '2021-02-13 03:33:14', '2021-02-13 03:33:14'),
(6, 6, 0, 0, 0, 0, 0, 0, '2021-02-13 03:35:09', '2021-02-13 03:35:09'),
(7, 7, 0, 0, 0, 0, 0, 0, '2021-02-13 03:36:28', '2021-02-13 03:36:28'),
(8, 8, 0, 0, 0, 0, 0, 0, '2021-02-13 03:38:07', '2021-02-13 03:38:07'),
(9, 9, 0, 0, 0, 0, 0, 0, '2021-02-13 18:39:27', '2021-02-13 18:39:27'),
(10, 10, 0, 0, 0, 0, 0, 0, '2021-02-13 18:41:02', '2021-02-13 18:41:02'),
(11, 11, 0, 0, 0, 0, 0, 0, '2021-02-13 18:42:14', '2021-02-13 18:42:14'),
(12, 12, 0, 0, 0, 0, 0, 0, '2021-02-13 18:46:30', '2021-02-13 18:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `link_name`, `title`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'हाम्रो बारेमा', 'हाम्रो बारेमा', 'about-us', '<p>काठमाडौं । नेपाल कम्युनिष्ट पार्टी नेकपाको स्थायी कमिटी बैठक आज बस्दैछ । आइतबार बसेको बैठकले शोक प्रस्ताव पारित गर्दै आजसम्मका लागि स्थगित भएको थियो । प्रधानमन्त्री तथा अध्यक्ष केपी शर्मा ओलीले पार्टीमा कुनै परामर्श नगरि संवैधानिक परिषद् सम्बन्धी अध्यादेश ल्याएपछि नेकपा भित्र नै तरंग पैदा ।</p>\r\n\r\n<p>प्रधानमन्त्री तथा नेकपाका अध्यक्ष केपी शर्मा ओलीले मुलुकको उन्नतिका लागि गरेका हरेक काममा अवरोधका कारण पार्टीको भविष्य जोगाउने अरु कुनै बिकल्प नभएपछि भारी मनका साथ आफूले ताजा जनादेश लिने निर्णय गरेको बताएका छन्। विघटित प्रतिनिधिसभाका सदस्यहरुको आज प्रधानमन्त्री निवास बालुवाटारमा आयोजित भेलालाई सम्बोधन गर्दै प्रधानमन्त्री ओलीले पार्टीका एकथरी नेताले पार्टीलाई जनताले सुम्पेको जनादेश बिर्सेर सधैं सरकारका काममा अवरोध मात्रै गरेको बताए।</p>\r\n\r\n<p>&lsquo;हामी एकता एकीकरणका काम टुङ्ग्याएर सहमतिका साथ एकताको महाधिवेशन गर्ने, विचार, संगठन र गन्तब्यमा स्पष्ट पार्टी बनाउन सक्रिय थियौं। तर, उहाँहरु एकतामा भावनात्मक सम्मानका लागि गरिएको ब्यवस्थालाई दुरुपयोग गरेर पछाडि फर्कनै नसक्नेगरी समीकरणका आधारमा पार्टीलाई चिरा पार्ने र बिग्रह, बेमेलको वतावरण निर्माण गर्न अग्रसर हुनु भयो,&rsquo; प्रधानमन्त्री ओलीले भने, &lsquo;संसद् बिघटन मेरो निजी रोजाई होइन, पार्टीको आन्दोलन र भविष्य जोगाउन अरु कुनै विकल्प नभएपछि भारी मनका साथ ताजा जनादेशका लागि जनतामा जाने निर्णय गर्नु पर्&zwj;यो।&rsquo;</p>', 'seo title', 'seo description', 'seo keyword', '2021-02-02 10:17:23', '2021-02-12 19:15:58'),
(2, 'नियम र सर्तहरू', 'नियम र सर्तहरू', 'terms-conditions', '<p>काठमाडौं । नेपाल कम्युनिष्ट पार्टी नेकपाको स्थायी कमिटी बैठक आज बस्दैछ । आइतबार बसेको बैठकले शोक प्रस्ताव पारित गर्दै आजसम्मका लागि स्थगित भएको थियो । प्रधानमन्त्री तथा अध्यक्ष केपी शर्मा ओलीले पार्टीमा कुनै परामर्श नगरि संवैधानिक परिषद् सम्बन्धी अध्यादेश ल्याएपछि नेकपा भित्र नै तरंग पैदा ।</p>\r\n\r\n<p>प्रधानमन्त्री तथा नेकपाका अध्यक्ष केपी शर्मा ओलीले मुलुकको उन्नतिका लागि गरेका हरेक काममा अवरोधका कारण पार्टीको भविष्य जोगाउने अरु कुनै बिकल्प नभएपछि भारी मनका साथ आफूले ताजा जनादेश लिने निर्णय गरेको बताएका छन्। विघटित प्रतिनिधिसभाका सदस्यहरुको आज प्रधानमन्त्री निवास बालुवाटारमा आयोजित भेलालाई सम्बोधन गर्दै प्रधानमन्त्री ओलीले पार्टीका एकथरी नेताले पार्टीलाई जनताले सुम्पेको जनादेश बिर्सेर सधैं सरकारका काममा अवरोध मात्रै गरेको बताए।</p>\r\n\r\n<p>&lsquo;हामी एकता एकीकरणका काम टुङ्ग्याएर सहमतिका साथ एकताको महाधिवेशन गर्ने, विचार, संगठन र गन्तब्यमा स्पष्ट पार्टी बनाउन सक्रिय थियौं। तर, उहाँहरु एकतामा भावनात्मक सम्मानका लागि गरिएको ब्यवस्थालाई दुरुपयोग गरेर पछाडि फर्कनै नसक्नेगरी समीकरणका आधारमा पार्टीलाई चिरा पार्ने र बिग्रह, बेमेलको वतावरण निर्माण गर्न अग्रसर हुनु भयो,&rsquo; प्रधानमन्त्री ओलीले भने, &lsquo;संसद् बिघटन मेरो निजी रोजाई होइन, पार्टीको आन्दोलन र भविष्य जोगाउन अरु कुनै विकल्प नभएपछि भारी मनका साथ ताजा जनादेशका लागि जनतामा जाने निर्णय गर्नु पर्&zwj;यो।&rsquo;</p>', NULL, NULL, NULL, '2021-02-02 10:16:10', '2021-02-12 08:08:42'),
(3, 'गोपनीयता नीति', 'गोपनीयता नीति', 'privacy-policy', '<p>काठमाडौं । नेपाल कम्युनिष्ट पार्टी नेकपाको स्थायी कमिटी बैठक आज बस्दैछ । आइतबार बसेको बैठकले शोक प्रस्ताव पारित गर्दै आजसम्मका लागि स्थगित भएको थियो । प्रधानमन्त्री तथा अध्यक्ष केपी शर्मा ओलीले पार्टीमा कुनै परामर्श नगरि संवैधानिक परिषद् सम्बन्धी अध्यादेश ल्याएपछि नेकपा भित्र नै तरंग पैदा ।</p>\r\n\r\n<p>प्रधानमन्त्री तथा नेकपाका अध्यक्ष केपी शर्मा ओलीले मुलुकको उन्नतिका लागि गरेका हरेक काममा अवरोधका कारण पार्टीको भविष्य जोगाउने अरु कुनै बिकल्प नभएपछि भारी मनका साथ आफूले ताजा जनादेश लिने निर्णय गरेको बताएका छन्। विघटित प्रतिनिधिसभाका सदस्यहरुको आज प्रधानमन्त्री निवास बालुवाटारमा आयोजित भेलालाई सम्बोधन गर्दै प्रधानमन्त्री ओलीले पार्टीका एकथरी नेताले पार्टीलाई जनताले सुम्पेको जनादेश बिर्सेर सधैं सरकारका काममा अवरोध मात्रै गरेको बताए।</p>\r\n\r\n<p>&lsquo;हामी एकता एकीकरणका काम टुङ्ग्याएर सहमतिका साथ एकताको महाधिवेशन गर्ने, विचार, संगठन र गन्तब्यमा स्पष्ट पार्टी बनाउन सक्रिय थियौं। तर, उहाँहरु एकतामा भावनात्मक सम्मानका लागि गरिएको ब्यवस्थालाई दुरुपयोग गरेर पछाडि फर्कनै नसक्नेगरी समीकरणका आधारमा पार्टीलाई चिरा पार्ने र बिग्रह, बेमेलको वतावरण निर्माण गर्न अग्रसर हुनु भयो,&rsquo; प्रधानमन्त्री ओलीले भने, &lsquo;संसद् बिघटन मेरो निजी रोजाई होइन, पार्टीको आन्दोलन र भविष्य जोगाउन अरु कुनै विकल्प नभएपछि भारी मनका साथ ताजा जनादेशका लागि जनतामा जाने निर्णय गर्नु पर्&zwj;यो।&rsquo;</p>', NULL, NULL, NULL, '2021-02-02 10:16:31', '2021-02-12 08:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create post', 'Create Post', 'web', '2021-01-28 06:39:28', '2021-01-28 06:39:28'),
(2, 'edit post', 'Edit Post', 'web', '2021-01-28 06:39:28', '2021-01-28 06:39:28'),
(3, 'delete post', 'Delete Post', 'web', '2021-01-28 06:39:28', '2021-01-28 06:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `photo_features`
--

CREATE TABLE `photo_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_features`
--

INSERT INTO `photo_features` (`id`, `title`, `image`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'title', '1611915505-1609738351-br1.jpg', 1, 1, '2021-02-03 23:26:10', '2021-02-03 23:50:08'),
(3, 'title 2', '1611915733-1610041251-16096591051609659105.jpg', 1, 2, '2021-02-03 23:53:31', '2021-02-03 23:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'web', '2021-01-28 06:34:52', '2021-01-28 06:34:52'),
(2, 'editor', 'Editor', 'web', '2021-01-28 06:34:52', '2021-01-28 06:34:52'),
(3, 'writer', 'Writer', 'web', '2021-01-28 06:36:45', '2021-01-28 06:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `section`, `meta_keyword`, `meta_title`, `meta_description`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'homepage-seo', 'seo keyword', 'seo title', 'seo description', 'title', 'description', '1613158938-n7.jpg', '2021-02-12 19:41:57', '2021-02-12 19:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_editor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company`, `address`, `google_map`, `registration_number`, `executive_publisher`, `executive_editor`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'self', 'कोटेशोर, काठमाडौं, नेपाल', '<iframe\r\n                        src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.379498145352!2d85.33221635086397!3d27.705566782708306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199ffe9d7c6b%3A0x91b3a969f305a0bc!2sMaitidevi%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1592125539289!5m2!1sen!2snp\"\r\n                        width=\"100%\" height=\"600\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"\r\n                        aria-hidden=\"false\" tabindex=\"0\"></iframe>', '209/075/76', 'राजिब थापा', 'नमिन डंगोल', 'https://www.youtube.com/channel/UCX-lBW_uNw3fbS33q5POaWw', '2021-02-02 11:11:40', '2021-02-12 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settings_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_media_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `settings_id`, `name`, `social_media_icon`, `social_media_link`, `created_at`, `updated_at`) VALUES
(57, 1, 'facebook', 'fab fa-facebook-f', 'https://facebook.com/ultrabyte', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(58, 1, 'twitter', 'fab fa-twitter', 'https://facebook.com/ultrabyte', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(59, 1, 'google', 'fab fa-instagram', 'https://facebook.com/ultrabyte', '2021-02-12 06:21:14', '2021-02-12 06:21:14'),
(60, 1, 'youtube', 'fab fa-youtube', 'https://facebook.com/ultrabyte', '2021-02-12 06:21:14', '2021-02-12 06:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `featured_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `cat_id`, `name`, `designation`, `order`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'नमिन डंगोल', 'कार्यकारी सम्पादक', 1, '1612403808-ban1.jpg', '2021-02-04 01:56:48', '2021-02-12 09:29:42'),
(2, 3, 'नमिन डंगोल', 'कार्यकारी सम्पादक', 1, '1612857782-ban2.jpg', '2021-02-09 08:03:02', '2021-02-12 09:31:44'),
(5, 1, 'राजिब थापा', 'कार्यकारी प्रकाशक', 2, '1612862735-ban1.jpg', '2021-02-09 09:25:35', '2021-02-12 09:30:04'),
(6, 1, 'सिता कुमारी', 'कार्यकारी सम्पादक', 3, '1613122244-blog2.jpg', '2021-02-12 09:30:44', '2021-02-12 09:30:44'),
(7, 1, 'मुकेश काजी', 'कार्यकारी प्रकाशक', 4, '1613122266-ban1.jpg', '2021-02-12 09:31:06', '2021-02-12 09:31:06'),
(8, 3, 'मुकेश काजी', 'कार्यकारी प्रकाशक', 5, '1613122322-choose.jpg', '2021-02-12 09:32:02', '2021-02-12 09:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `team_categories`
--

CREATE TABLE `team_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_categories`
--

INSERT INTO `team_categories` (`id`, `name`, `slug`, `order`, `created_at`, `updated_at`) VALUES
(1, 'प्रधान सम्पादक', 'category-1', 1, '2021-02-03 02:20:24', '2021-02-12 09:27:33'),
(3, 'मल्टिमिडिया', 'category-2', 2, '2021-02-03 02:23:31', '2021-02-12 09:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Namin Dangol', 'nameen017@gmail.com', NULL, '$2y$10$NY.dHBW6MoxV53ainjhfteV95QeZCZWpRRdKF/1ZqQiIMvVSJWAJu', 'bVQGGTtT1UL2HBrGT1Q8QGK3ocBMfeMFfARAcp6JPoTq38pJeyVPdVnzAGnk', '2021-01-28 06:42:52', '2021-01-28 06:42:52'),
(2, 'Mukesh Rai', 'mukeshrai541@gmail.com', NULL, '$2y$10$FCgFh2R/DGqrfM/kFhH.geKOj9Udf2BBev3CnJZ0m5cN18fvHzgFG', NULL, '2021-01-28 09:58:18', '2021-01-28 09:58:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose_categories`
--
ALTER TABLE `choose_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_react_emoji`
--
ALTER TABLE `news_react_emoji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_react_emoji_news_id_foreign` (`news_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_features`
--
ALTER TABLE `photo_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_categories`
--
ALTER TABLE `team_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3833;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `choose_categories`
--
ALTER TABLE `choose_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news_react_emoji`
--
ALTER TABLE `news_react_emoji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo_features`
--
ALTER TABLE `photo_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team_categories`
--
ALTER TABLE `team_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_react_emoji`
--
ALTER TABLE `news_react_emoji`
  ADD CONSTRAINT `news_react_emoji_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
