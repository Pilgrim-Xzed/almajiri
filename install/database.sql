-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 01:01 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowdfunding`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_uses`
--

CREATE TABLE `about_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_uses`
--

INSERT INTO `about_uses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'WE ARE NOBILITY', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dfasdf dfsadf dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2018-02-11 04:57:32', '2018-03-14 23:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$qkhRS.MjcGzUBTB1Nz.OXOkyZDxvRsIV/.3yWz8dKBi/FSlveoqx2', '0z1gNAuXjiKtAHy8fFHDzAQboKAqIyLxGV2L78Q8VpxMUmthy0RavGaPHkFa', '2018-01-17 00:22:09', '2018-03-11 23:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Title 1', 'vRnBByPrJPztHVIiqbJWaV3jsBVUtO8vp4FQ01gF.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.', '2018-02-06 00:19:20', '2018-03-17 00:19:16'),
(12, 'Title 2', 'ys2YHaiIGXuUMilELGtDYb1n854NEsSIyUNuYd5E.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.<br></div></div>', '2018-03-14 06:41:27', '2018-03-17 00:18:58'),
(14, 'Title 3', 'QDdQnT5vgW6m4cSEZC8ubw9VBo9tIZ3EI5HDg4Rc.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.<br></div></div>', '2018-03-14 06:55:42', '2018-03-17 00:18:38'),
(15, 'Title 4', 'OUBltrYIQhMKkxmqXHAPXyD3MfEM6j5KFDksZgf6.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"https://i.imgur.com/o30YJmR.jpg\" width=\"270\"><br><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:27:43', '2018-03-17 00:18:16'),
(16, 'Title 5', 'DSmVMKOZLoBCh2LRfcUqUDQVGD5aQPYS9AehVkvT.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:28:01', '2018-03-17 00:17:52'),
(17, 'Title 6', '2iVCFQM7b75n7QWsWUg2fJgcM05KSp7at98xfBgq.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:28:27', '2018-03-17 00:17:28'),
(18, 'Title 7', 'sTeMtgjk30DkuDYTCGaktk3zMPwJySX4fJmKhS4d.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:28:46', '2018-03-17 00:17:08'),
(19, 'Title 8', 'AuumzA0jiLDODMMDo71apDYkV6QZ5OtWRVnGfQK0.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:29:05', '2018-03-17 00:16:49'),
(20, 'Title 9', 'r4tQ2FhbUVgWzf3mxKytQQSsQspgmvBkAytFzYyZ.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:29:33', '2018-03-17 00:02:53'),
(21, 'Title 10', 'PpqbXb6VRc2qCZqjevHFfIU0c60Y0cFPOG7WTZcu.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:29:40', '2018-03-16 23:54:14'),
(22, 'Title 11', 'obY3J0SrkgAtrGG7VtmzwcostgJjsoBR8KQbRoXX.jpeg', 'dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.&nbsp;<div><div>dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data. dummy data.</div></div>', '2018-03-14 07:30:12', '2018-03-16 23:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`, `image`, `description`, `goal`, `created_at`, `updated_at`) VALUES
(1, 'DONATE FOR WATER', 'GB4NtRkheWq9GlJReHkWaUsSjEgW7nHLXsT5TqBY.jpeg', '<p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum is a dummy text that is mainly used by the printing and design industry. It is intended to show how the type will look before the end product is available.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500:s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum dummy texts was available for many years on adhesive sheets in different sizes and typefaces from a company called Letraset.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">When computers came along, Aldus included lorem ipsum in its PageMaker publishing software, and you now see it wherever designers, content designers, art directors, user interface developers and web designer are at work.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">They use it daily when using programs such as Adobe Photoshop, Paint Shop Pro, Dreamweaver, FrontPage, PageMaker, FrameMaker, Illustrator, Flash, Indesign etc.</p>', '5000', '2018-03-19 01:40:17', '2018-03-19 01:40:17'),
(2, 'DONATE FOR EDUCATION', 'zMhKu3ddSxN74B2xG1jajq7TsnAq7gfcOJyMjjQC.jpeg', '<p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum is a dummy text that is mainly used by the printing and design industry. It is intended to show how the type will look before the end product is available.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500:s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum dummy texts was available for many years on adhesive sheets in different sizes and typefaces from a company called Letraset.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">When computers came along, Aldus included lorem ipsum in its PageMaker publishing software, and you now see it wherever designers, content designers, art directors, user interface developers and web designer are at work.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">They use it daily when using programs such as Adobe Photoshop, Paint Shop Pro, Dreamweaver, FrontPage, PageMaker, FrameMaker, Illustrator, Flash, Indesign etc.</p>', '1000', '2018-03-19 02:24:31', '2018-03-19 02:24:31'),
(3, 'DONATE FOR BLOOD', 'ugGY41hjikmYCOv3HBPVq1oIMK045GA5NqkYdft5.jpeg', '<p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum is a dummy text that is mainly used by the printing and design industry. It is intended to show how the type will look before the end product is available.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500:s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Lorem Ipsum dummy texts was available for many years on adhesive sheets in different sizes and typefaces from a company called Letraset.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">When computers came along, Aldus included lorem ipsum in its PageMaker publishing software, and you now see it wherever designers, content designers, art directors, user interface developers and web designer are at work.</p><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">They use it daily when using programs such as Adobe Photoshop, Paint Shop Pro, Dreamweaver, FrontPage, PageMaker, FrameMaker, Illustrator, Flash, Indesign etc.</p>', '800', '2018-03-19 03:39:07', '2018-03-19 03:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `cause_donors`
--

CREATE TABLE `cause_donors` (
  `id` int(10) UNSIGNED NOT NULL,
  `cause_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cause_donors`
--

INSERT INTO `cause_donors` (`id`, `cause_id`, `amount`, `currency`, `name`, `email`, `phone`, `description`, `track_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, '1000', '$', 'Bkash', 'm@gmail.com', '01222222222', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt ut labore et dolore magna aliqua.', 'xHi3eVVbePnsUTBG', 1, '2018-03-20 06:47:21', '2018-03-20 06:49:23'),
(8, 1, '500', '$', 'Mr A', 'shormi@gmail.com', '+0123456978', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt ut labore et dolore magna aliqua.', 'uX8eFJ1b1hpiRbAX', 1, '2018-03-20 06:47:49', '2018-03-20 06:49:29'),
(9, 1, '1000', '$', 'mishu', 'mutasim.ewu@gmail.com', '01302044332', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt ut labore et dolore magna aliqua.', 'GLJtL8oBzVMsxFfS', 1, '2018-03-20 06:48:28', '2018-03-20 06:49:33'),
(10, 1, '1000', '$', 'Mutasim Billah', 'mutasim.ewu@gmail.com', '01222222222', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt ut labore et dolore magna aliqua.', 'bj3Mfub5txiudXla', 1, '2018-03-20 06:48:53', '2018-03-20 06:49:39'),
(12, 3, '100', '$', 'Mutasim Billah', 'shormi@gmail.com', '01302044332', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt ut labore et dolore magna aliqua.', 'gzG0GOnMeHz7j2sR', 1, '2018-03-20 07:13:59', '2018-03-20 07:14:25'),
(15, 3, '12', '$', NULL, NULL, NULL, NULL, '6f0Z4B0ipKdzJagc', 0, '2018-03-22 02:37:54', '2018-03-22 02:37:54'),
(16, 3, '123', '$', NULL, NULL, NULL, NULL, '4tHMTFiZNp0hGBsM', 0, '2018-03-22 02:38:02', '2018-03-22 02:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `script` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `mobile`, `location`, `script`, `created_at`, `updated_at`) VALUES
(1, 'support@thesoftking.com', '+0123456789', 'Uttara, Dhaka', '<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5a896961d7591465c707c4c7/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>', '2018-02-07 23:37:13', '2018-02-18 07:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `gateway_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prove` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `try` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `gateway_id`, `prove`, `note`, `status`, `created_at`, `updated_at`, `amount`, `currency_text`, `unique_key`, `bcid`, `bcam`, `try`) VALUES
(111, '10', NULL, NULL, '1', '2018-03-20 06:47:21', '2018-03-20 06:49:23', '1000', 'USD', 'xHi3eVVbePnsUTBG', NULL, '0', '0'),
(112, '10', NULL, NULL, '1', '2018-03-20 06:47:49', '2018-03-20 06:49:29', '500', 'USD', 'uX8eFJ1b1hpiRbAX', NULL, '0', '0'),
(113, '10', NULL, NULL, '1', '2018-03-20 06:48:28', '2018-03-20 06:49:33', '1000', 'USD', 'GLJtL8oBzVMsxFfS', NULL, '0', '0'),
(114, '10', NULL, NULL, '1', '2018-03-20 06:48:53', '2018-03-20 06:49:39', '1000', 'USD', 'bj3Mfub5txiudXla', NULL, '0', '0'),
(116, '10', NULL, NULL, '1', '2018-03-20 07:13:59', '2018-03-20 07:14:25', '100', 'USD', 'gzG0GOnMeHz7j2sR', NULL, '0', '0'),
(117, '10', NULL, 'hey', '2', '2018-03-22 01:55:03', '2018-03-22 01:55:14', '500', 'USD', 'kZJ1xYKx9RjmdHMe', NULL, '0', '0'),
(118, '10', 'RMJgOwIptdtOdDzwv0kDPLm55YTdqGf5NajmW339.jpeg', 'd', '2', '2018-03-22 01:58:00', '2018-03-22 01:58:20', '1000', 'USD', '3sqn95oBPyHsx9JA', NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

CREATE TABLE `donates` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donates`
--

INSERT INTO `donates` (`id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 10.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-03-22 00:57:37', '2018-03-22 00:57:37'),
(2, 25.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-03-22 00:57:54', '2018-03-22 00:57:54'),
(3, 50.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-03-22 00:58:00', '2018-03-22 00:58:00'),
(4, 100.00, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-03-22 00:58:06', '2018-03-22 01:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `sms` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`id`, `sender`, `email`, `sms`, `created_at`, `updated_at`) VALUES
(1, 'mutasim.ewu@gmail.com', '<div>&nbsp;</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"https://i.imgur.com/NOymaLT.png\" width=\"220\"></div><div><br></div><div><span style=\"background-color: rgb(255, 255, 255);\"><br></span></div><span style=\"background-color: rgb(255, 255, 255);\">hi,<span style=\"\" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 13px;\"=\"\">{{name}}</span></span><div><span style=\"background-color: rgb(255, 255, 255);\"><br></span><div><span style=\"background-color: rgb(255, 255, 255);\"><span style=\"\" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 13px;\"=\"\">{{message}}</span></span></div></div>', NULL, '2018-02-08 03:40:01', '2018-03-10 01:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organize_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `topic`, `location`, `start_date`, `end_date`, `time`, `organize_by`, `email`, `phone`, `address`, `website`, `description`, `created_at`, `updated_at`) VALUES
(1, 'FEED A HUNGRY CHILD', 'ZksObDhZxrr4lS1oNqbW2LWVyNNZlbZLwzGvDzak.jpeg', 'Children around the world are not enrolled in school', '3570-Uttara,Dhaka,Bangladesh', '2018-03-22', '2018-03-25', '08:00 A.M', 'Example', 'Example@thesoftking.Com', '(+880) 00 0000', '3570-Uttara,Dhaka,Bangladesh', 'http://www.thesoftking.com', '<p style=\" font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Corem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisl turpis, tempus nec egestas ac, molestie vel eros. Vestibulum convallis tincidunt tempus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut dui libero, bibendum vel risus in, tincidunt accumsan felis. Mauris ullamcorper est posuere hendrerit consectetur. Donec iaculis tincidunt enim, sit amet maximus justo. Fusce sollicitudin, justo a bibendum mollis, ipsum nisi porta orci, sit amet lobortis ex nisl quis enim. Pellentesque consequat feugiat sem quis dictum. Mauris blandit, mi convallis tincidunt imperdiet, eros mi fermentum lacus, at sodales nibh urna quis purus. Aenean eleifend tincidunt eros, in tempus diam facilisis in. Suspendisse congue metus non mi efficitur, id faucibus nulla facilisis. Donec et efficitur purus. Phasellus et neque ac lacus sagittis bibendum.</p><blockquote style=\"padding: 22px; margin-top: 28px; margin-bottom: 28px; border-left-color: rgb(238, 238, 238); background-color: rgb(155, 154, 153); color: rgba(255, 255, 255, 0.9); overflow: hidden; border-radius: 3px; background-clip: padding-box;\">Dused pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor ucnibh. Nullam mollis. Ut justo.</blockquote><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Nunc pulvinar consectetur nisi, in eleifend odio euismod ac. Cras egestas nibh sit amet mi pellentesque vestibulum. Aliquam porta, orci eget dignissim cursus, ex risus consectetur risus, eu tempus metus sapien ut eros. Donec sit amet lorem nisi. Curabitur non massa tincidunt, maximus arcu id, condimentum mauris. Curabitur faucibus magna sed vulputate iaculis. In hac habitasse platea dictumst. Cras quis condimentum justo. Etiam auctor ante ante. Curabitur facilisis, dui quis sollicitudin dapibus, felis massa gravida nunc, bibendum pellentesque odio purus consequat libero.</p>', '2018-03-18 05:16:40', '2018-03-18 05:51:49'),
(6, 'CHARITY FOR EDUCATION', 'zP5ucJ2YZ66ul7eZYqUK3ziduIMbVZhqFFE4upeR.jpeg', 'Children around the world are not enrolled in school', '3570-Uttara,Dhaka,Bangladesh', '2018-04-19', '2018-05-24', '10:00 A.M', 'Example', 'Example@thesoftking.Com', '(+880) 00 0000', '3570-Uttara,Dhaka,Bangladesh', 'Http://www.thesoftking.Com', '<p style=\" font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Corem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisl turpis, tempus nec egestas ac, molestie vel eros. Vestibulum convallis tincidunt tempus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut dui libero, bibendum vel risus in, tincidunt accumsan felis. Mauris ullamcorper est posuere hendrerit consectetur. Donec iaculis tincidunt enim, sit amet maximus justo. Fusce sollicitudin, justo a bibendum mollis, ipsum nisi porta orci, sit amet lobortis ex nisl quis enim. Pellentesque consequat feugiat sem quis dictum. Mauris blandit, mi convallis tincidunt imperdiet, eros mi fermentum lacus, at sodales nibh urna quis purus. Aenean eleifend tincidunt eros, in tempus diam facilisis in. Suspendisse congue metus non mi efficitur, id faucibus nulla facilisis. Donec et efficitur purus. Phasellus et neque ac lacus sagittis bibendum.</p><blockquote style=\"padding: 22px; margin-top: 28px; margin-bottom: 28px; border-left-color: rgb(238, 238, 238); background-color: rgb(155, 154, 153); color: rgba(255, 255, 255, 0.9); overflow: hidden; border-radius: 3px; background-clip: padding-box;\">Dused pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor ucnibh. Nullam mollis. Ut justo.</blockquote><p style=\"margin-bottom: 10px; font-size: 16px; color: rgb(115, 114, 113); line-height: 24px; background-color: rgb(249, 249, 249);\">Nunc pulvinar consectetur nisi, in eleifend odio euismod ac. Cras egestas nibh sit amet mi pellentesque vestibulum. Aliquam porta, orci eget dignissim cursus, ex risus consectetur risus, eu tempus metus sapien ut eros. Donec sit amet lorem nisi. Curabitur non massa tincidunt, maximus arcu id, condimentum mauris. Curabitur faucibus magna sed vulputate iaculis. In hac habitasse platea dictumst. Cras quis condimentum justo. Etiam auctor ante ante. Curabitur facilisis, dui quis sollicitudin dapibus, felis massa gravida nunc, bibendum pellentesque odio purus consequat libero.</p>', '2018-03-18 07:17:54', '2018-03-18 07:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_apps`
--

CREATE TABLE `facebook_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_apps`
--

INSERT INTO `facebook_apps` (`id`, `app_id`, `created_at`, `updated_at`) VALUES
(1, '<script></script>', '2018-03-14 05:53:20', '2018-03-14 06:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(1, '© 2018 TheSoftKing. All rights reserved.', '<span style=\"color: rgb(255, 255, 255); font-family: Roboto, sans-serif; font-size: 16px; text-align: center; background-color: rgb(66, 71, 91);\">consectetur adipisicing elit quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span><br>', NULL, '2018-02-18 07:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conversion_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `title`, `color`, `currency_text`, `currency_symbol`, `conversion_rate`, `created_at`, `updated_at`) VALUES
(1, 'THESOFTKING', '15bee1', 'USD', '$', '1', '2018-02-05 23:21:05', '2018-03-19 01:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `getways`
--

CREATE TABLE `getways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fix_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `getways`
--

INSERT INTO `getways` (`id`, `name`, `gateimg`, `fix_charge`, `percent_charge`, `rate`, `val1`, `val2`, `val3`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', 'x9Z1b06Xi4sArSabQYd6eaoGc6ZKNdVFQPjlCrfB.png', '0.5', '2.5', '74', 'rexrifat636@gmail.com', NULL, NULL, 'BDT', '1', NULL, '2018-02-19 05:23:20'),
(2, 'Perfect Money', 'oYcNiGFbZ7IjzLYPYYdam7bQ2gdappTtDJqNGxCH.png', '2', '1', '80', 'U5220203', 'reg4e54h1grt1j', NULL, 'BDT', '1', NULL, '2018-02-19 05:23:35'),
(3, 'BitCoin', 'Zlp9fuyKAANubJwotHLO80TPoC57p4VysL1dHYOO.png', '1', '0.5', '81', 'API2', 'XPUB1', NULL, 'BDT', '1', NULL, '2018-02-19 23:43:45'),
(4, 'Stripe', 'NHuLMDN3nVYaKYIGKCKOFIVM34GddFfZHKeWK4Ts.png', '3', '3', '85', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, 'BDT', '1', NULL, '2018-02-19 05:25:04'),
(5, 'Skrill', '4kGDlQhdD5l7Y7g3UyO4qEHNwGr62gvvzpmSzesf.jpeg', '3', '3', '85', 'support@globeskill.com', 'jabali2006', NULL, 'BDT', '1', NULL, '2018-02-19 23:44:02'),
(6, 'Coingate', '6Mmjpa07EMZhAOg7Clwm42l6nH9bDTCaxgGL6Dyy.jpeg', '3', '3', '85', '1257', '8wbQIWcXyRu1AHiJqtEhTY', 'Hr7LqFM83aJsZgbIVkoUW2Q4cGvlB05n', 'bdt', '1', NULL, '2018-02-19 23:45:14'),
(7, 'Coin Payment', 'rTjdQmZGIChhhSJi6J83G9biqq0hAPQW5AsCWGjA.jpeg', '0', '0', '78', 'db1d9f12444e65c921604e289a281c56', 'db1d9f12444e65c921604e289a281c56', NULL, 'bdt', '1', NULL, '2018-02-19 23:45:04'),
(8, 'Block IO', 'y5cG6urAVTo7vQFPQlpRjcML01vFIiIK8Du4HeuV.jpeg', '0', '0', '78', '482e-c7fe-9ddb-ac5a', 'asd123456', NULL, 'bdt', '1', NULL, '2018-02-19 23:45:31'),
(10, 'Bkash', 'a8QsnF9KzoZLBrSWREqMgpvOjU8k56h2zOwshqCA.png', '0', '1.85', '78', 'Bkash Agent no.: +0123456789', NULL, NULL, 'bdt', '1', '2018-02-19 23:46:45', '2018-02-19 23:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `heading_sections`
--

CREATE TABLE `heading_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `cause` longtext COLLATE utf8mb4_unicode_ci,
  `volunteer` longtext COLLATE utf8mb4_unicode_ci,
  `be_volunteer` longtext COLLATE utf8mb4_unicode_ci,
  `who_talk` longtext COLLATE utf8mb4_unicode_ci,
  `event` longtext COLLATE utf8mb4_unicode_ci,
  `blog` longtext COLLATE utf8mb4_unicode_ci,
  `sponsor` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heading_sections`
--

INSERT INTO `heading_sections` (`id`, `cause`, `volunteer`, `be_volunteer`, `who_talk`, `event`, `blog`, `sponsor`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et magna aliqua.', '2018-03-22 04:27:27', '2018-03-22 04:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `logoicons`
--

CREATE TABLE `logoicons` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logoicons`
--

INSERT INTO `logoicons` (`id`, `logo`, `fav`, `breadcrumb`, `created_at`, `updated_at`) VALUES
(1, 'dQea4KA1yjoqZ2LimBthhspDZBmyrZAPSMP3aFta.png', 'faRWwrFSNFei4sAvuOJBnxr6Hw37cWqHErLOkXhS.png', '8tbdNJa0dtyOvHGTJ8Mdlg0QJeER3BXJqK7EF03p.jpeg', NULL, '2018-03-14 01:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `menu_managements`
--

CREATE TABLE `menu_managements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_01_13_065452_create_sliders_table', 1),
(5, '2018_01_13_111227_create_logoicons_table', 1),
(6, '2018_01_13_131345_create_footers_table', 1),
(7, '2018_01_15_070132_create_generalsettings_table', 1),
(8, '2018_01_17_054712_create_getways_table', 1),
(9, '2018_01_17_055543_create_deposits_table', 1),
(10, '2018_01_17_062001_create_admins_table', 1),
(11, '2018_01_17_062002_create_admin_password_resets_table', 1),
(13, '2018_01_28_052453_create_about_contact_imgs_table', 1),
(20, '2018_01_14_091635_create_contacts_table', 5),
(23, '2018_01_15_080053_create_emailtemplates_table', 7),
(24, '2018_02_11_051208_create_our_services_table', 8),
(25, '2018_01_27_141741_create_testimonials_table', 9),
(26, '2018_01_14_065729_create_socials_table', 10),
(28, '2018_02_11_101710_create_about_uses_table', 12),
(29, '2018_01_11_063617_create_menu_managements_table', 13),
(30, '2018_02_14_100613_create_transactions_table', 14),
(32, '2018_02_17_052758_create_discount_vendors_table', 16),
(33, '2018_02_17_093411_create_packages_table', 17),
(34, '2018_02_26_091909_create_cards_table', 18),
(35, '2018_02_26_125714_create_shipments_table', 19),
(36, '2018_02_14_112404_create_withdraws_table', 20),
(37, '2018_03_05_094206_create_channels_table', 20),
(38, '2018_03_10_055046_create_reg_packs_table', 21),
(41, '2018_02_06_074844_create_facebook_apps_table', 23),
(42, '2018_03_14_113948_create_sponsors_table', 23),
(43, '2018_02_06_050703_create_blogs_table', 24),
(44, '2018_03_15_060254_create_our_histories_table', 25),
(45, '2018_03_15_084638_create_who_wes_table', 26),
(46, '2018_03_03_143424_create_subscriberrs_table', 27),
(47, '2018_03_17_085324_create_volunteers_table', 28),
(48, '2018_03_18_102745_create_events_table', 29),
(49, '2018_03_19_060008_create_causes_table', 30),
(50, '2018_03_20_113331_create_cause_donors_table', 31),
(51, '2018_03_22_063517_create_donates_table', 32),
(52, '2018_03_22_100316_create_heading_sections_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `our_histories`
--

CREATE TABLE `our_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_histories`
--

INSERT INTO `our_histories` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, '2017', '<p>Pellentesque mollis eros quis massa interdum porta et vel nisi. Duis vel viverra quam. Etiam molestie odio lacus, vulputate feugiat tortor condimentum eu.</p>\r\n<p>Etiam hendrerit maximus urna a lobortis. Etiam commodo metus volutpat, tempor diam sit amet, suscipit eros. Morbi laoreet sodales turpis, sit amet fermentum orci ultrices non.</p>', '2018-03-15 00:35:46', '2018-03-15 00:35:46'),
(2, '2018', '<p>Pellentesque mollis eros quis massa interdum porta et vel nisi. Duis vel viverra quam. Etiam molestie odio lacus, vulputate feugiat tortor condimentum eu.</p>\r\n<p>Etiam hendrerit maximus urna a lobortis. Etiam commodo metus volutpat, tempor diam sit amet, suscipit eros. Morbi laoreet sodales turpis, sit amet fermentum orci ultrices non.</p>', '2018-03-15 00:36:11', '2018-03-15 00:46:48'),
(5, '2019', '<p>Pellentesque mollis eros quis massa interdum porta et vel nisi. Duis vel viverra quam. Etiam molestie odio lacus, vulputate feugiat tortor condimentum eu.</p>\r\n<p>Etiam hendrerit maximus urna a lobortis. Etiam commodo metus volutpat, tempor diam sit amet, suscipit eros. Morbi laoreet sodales turpis, sit amet fermentum orci ultrices non.</p>', '2018-03-15 00:59:22', '2018-03-15 00:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `status`, `created_at`) VALUES
('mutasim.ewu@gmail.com', 'VO6SBmrfV7tf5UiD73DzuO0lmn9vfT', 0, '2018-02-28 00:16:15'),
('mutasim.ewu@gmail.com', 'S22GwxwkqhoptNVtGMOVfqajYjDpcy', 0, '2018-03-11 22:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `bold_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_text` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `bold_text`, `small_text`, `image`, `created_at`, `updated_at`) VALUES
(9, 'We Can Spread Love  By Donate!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'lHPY5ZACN7MNqDslFptjHBPyuggqlCqzBAMUmUni.jpeg', '2018-03-13 06:08:57', '2018-03-13 06:08:57'),
(10, 'We Can Spread Love  By Donate!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'HWqk93osfQgN3pMF4MOtkg3YyGd9ds6WHCK6Ikpw.jpeg', '2018-03-13 06:09:18', '2018-03-13 06:09:18'),
(11, 'We Can Spread Love  By Donate!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'SFTg1cWKDOUowuWrRNz3SIxnavhJCUugEP4djowJ.jpeg', '2018-03-13 06:09:46', '2018-03-13 06:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-facebook', '#', '2018-02-11 01:07:40', '2018-02-11 01:07:40'),
(2, 'fa fa-twitter', '#', '2018-02-11 01:09:33', '2018-02-11 01:09:33'),
(3, 'fa fa-behance', '#', '2018-02-11 01:09:53', '2018-02-11 01:09:53'),
(4, 'fa fa-instagram', '#', '2018-02-11 01:10:27', '2018-02-11 01:10:27'),
(5, 'fa fa-pinterest', '#', '2018-02-11 01:10:49', '2018-02-11 01:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(9, 'OsHuIW8D4nu1MDV2uXamIhMwzE0d8qxcFwyMqkXf.png', 'https://themeforest.net/', '2018-03-14 06:15:23', '2018-03-14 06:15:23'),
(10, 'boZfXDUVA5WZ0W2VD44nQVKo0Bd44uKCooWpnTjg.png', 'https://codecanyon.net/', '2018-03-14 06:15:36', '2018-03-14 06:15:36'),
(11, 'AMLehs7Ra9zdgNoZcsxmT5jVHP9HEWWGZpiTmcKI.png', 'http://www.google.com', '2018-03-14 06:15:59', '2018-03-14 06:15:59'),
(12, 'Jd8gjOVAFNvReGn4pcJ2ehLqJYEYEAKPTqGnie9V.png', 'http://www.google.com', '2018-03-14 06:16:13', '2018-03-14 06:16:13'),
(13, '3L0HFm3M7PHRtwnNsjVS3zvIVQjVsC1ovOpTJNwQ.png', 'http://www.google.com', '2018-03-14 06:16:20', '2018-03-14 06:16:20'),
(14, 'vxPRjrJMnNG3WI2MFWjsQu5MENMyWwkyGmBi7ZWM.png', 'http://www.google.com', '2018-03-14 06:16:26', '2018-03-14 06:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscriberrs`
--

CREATE TABLE `subscriberrs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriberrs`
--

INSERT INTO `subscriberrs` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Zahangir Pial', 'pialneel@gmail.com', '2018-03-17 01:15:54', '2018-03-17 01:15:54'),
(2, 'Mutasim Billah', 'mutasim.ewu@gmail.com', '2018-03-17 01:16:17', '2018-03-17 01:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `company`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Doue', 'MiTQMYZjHnC9fuzlH6IjpBg8cpYeybM48lePSuIl.jpeg', 'Lorem Company', 'consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-02-11 00:46:06', '2018-03-13 23:58:04'),
(2, 'Travis hannon', 'O6KkCTlHmpfxoYKEWEi2WYwBE6ARizxT0lJkwowG.jpeg', 'Infotech company', 'consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-02-11 00:47:01', '2018-03-13 23:58:11'),
(3, 'Dev Robin', 'ECRWOSb1V2HkCbQhqH1piVP1JlyVBy05OJfXyPsh.jpeg', 'King company', 'consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2018-02-11 00:48:49', '2018-03-13 23:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `balance`, `phone`, `address`, `city`, `zip_code`, `image`, `refer_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'user', 'mutasim.ewu@gmail.com', '$2y$10$BGae4/Z0V9ZrxnuScXGw/.37P0geuJJBKpKzn8T87DGzLd0Ox50v6', '1740180577.33', '+0123456789', 'Uttara', 'Dhaka', '1230', 'dW0RG0FWeOLc4dOKh0FOCbZIG6XBwBu0WClU6l1I.png', NULL, 'CIw3okWifpLbx8mv1l2xQNcbdpPrl76eeQglP6rNyO9W3BP5Y4iC3Hh71U3D', '2018-02-06 03:56:14', '2018-03-11 22:50:25'),
(7, 'Mutasim', 'Billah', 'uncanny', 'mullobodh@gmail.com', '$2y$10$beKAa6s2Ohh37N5Xj.fDf.GD3jED.Jwrd9ykT.Fg0aIUQ.aMqTwQG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'u4y6a7stD8eeHlrceg9mlnxOcm9YcZlQnOycGzhS4qMdbAe3KLrl3cVZQr9a', '2018-03-11 05:11:46', '2018-03-11 05:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ln` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `fname`, `lname`, `image`, `email`, `phone`, `address`, `profession`, `fb`, `tw`, `ln`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Meera', 'Desuza', 'ym8flOEdOHKc04DZSuvYE2jpWfT3V0VXV6rEtze9.jpeg', 'meera@thesoftking.com', '+0123456978', 'USA', 'Doctor', 'http://facebook.com', 'http://twitter.com', 'https://www.linkedin.com/', 'Hi, i\'m a Doctor By Profession.', 1, '2018-03-17 04:46:40', '2018-03-18 04:19:49'),
(4, 'Melva E.', 'Daley', 'rKjXeIXGsCP0l0r0t06FPYeEj2KYcL8bgHn9oAFy.jpeg', 'MelvaEDaley@teleworm.us', '+0970-6740098', 'Lillesäter Kullberg 93\r\n980 44  NATTAVAARABY', 'Instrumentation technician', 'http://facebook.com', 'http://twitter.com', 'https://www.linkedin.com/', 'Hi, I\'m a Teacher.', 1, '2018-03-17 04:50:39', '2018-03-17 04:50:39'),
(7, 'mutasim', 'Billah', 'hKBZkZ5k1RPaev6WswtmYrwUGHMKgDg2oB6FCDgZ.jpeg', 'mutasim.ewu@gmail.com', '+0123456978', 'Uttara', 'Soft Engineer', NULL, NULL, NULL, 'hi', 1, '2018-03-18 04:09:56', '2018-03-18 04:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `who_wes`
--

CREATE TABLE `who_wes` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_wes`
--

INSERT INTO `who_wes` (`id`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'fa-usd', 'DONATION', 'Lorem ipsum dolor sit\r\namet,consectetur\r\nadipisicing elit,sed do', '2018-03-15 03:26:51', '2018-03-15 03:26:51'),
(3, 'fa-users', 'VOLUNTEERS', 'Lorem ipsum dolor sit\r\namet,consectetur\r\nadipisicing elit,sed do', '2018-03-15 03:27:20', '2018-03-15 03:27:20'),
(4, 'fa-bar-chart', 'FUNDRAISE', 'Lorem ipsum dolor sit\r\namet,consectetur\r\nadipisicing elit,sed do', '2018-03-15 03:27:49', '2018-03-15 03:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_uses`
--
ALTER TABLE `about_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_donors`
--
ALTER TABLE `cause_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donates`
--
ALTER TABLE `donates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_apps`
--
ALTER TABLE `facebook_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getways`
--
ALTER TABLE `getways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heading_sections`
--
ALTER TABLE `heading_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logoicons`
--
ALTER TABLE `logoicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_managements`
--
ALTER TABLE `menu_managements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_histories`
--
ALTER TABLE `our_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriberrs`
--
ALTER TABLE `subscriberrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_wes`
--
ALTER TABLE `who_wes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_uses`
--
ALTER TABLE `about_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cause_donors`
--
ALTER TABLE `cause_donors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `donates`
--
ALTER TABLE `donates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facebook_apps`
--
ALTER TABLE `facebook_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `getways`
--
ALTER TABLE `getways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `heading_sections`
--
ALTER TABLE `heading_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logoicons`
--
ALTER TABLE `logoicons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_managements`
--
ALTER TABLE `menu_managements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `our_histories`
--
ALTER TABLE `our_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscriberrs`
--
ALTER TABLE `subscriberrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `who_wes`
--
ALTER TABLE `who_wes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
