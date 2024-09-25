-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 08:51 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u150229191_philex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `device_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Test@admin.com', NULL, '$2y$12$2VIpk5o7ZSnxmQ6dHRw74eT2BfTrjnM/R8Te3bIjkKh9kqqTv.pcy', NULL, NULL, NULL, '2024-06-10 13:53:39', '2024-06-10 13:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `advertisments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `advertisments` (`id`, `title`, `icon`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Slider #1', 'uploads/events/image_17180623772137747517.jpg', 1, '2024-06-11 10:19:04', '2024-06-10 23:32:57', '2024-06-11 10:19:04'),
(2, 'Slider #2', 'uploads/events/image_17180624191214057856.jpg', 1, '2024-06-11 10:19:00', '2024-06-10 23:33:39', '2024-06-11 10:19:00'),
(3, 'Slider #3', 'uploads/events/image_17180624332033353375.jpg', 1, '2024-06-11 10:18:57', '2024-06-10 23:33:53', '2024-06-11 10:18:57'),
(4, 'Slider', 'uploads/events/image_1718098617947466760.jpeg', 1, '2024-06-11 09:37:29', '2024-06-11 09:36:57', '2024-06-11 09:37:29'),
(5, 'Factory', 'uploads/events/image_17181011091263859665.jpg', 1, NULL, '2024-06-11 10:18:29', '2024-06-11 10:18:29'),
(6, 'Tadalex', 'uploads/events/image_17181012381308287980.jpg', 1, NULL, '2024-06-11 10:20:38', '2024-06-11 10:20:38'),
(7, 'duex', 'uploads/events/image_1718101248141033448.xlsx', 1, '2024-06-11 10:22:23', '2024-06-11 10:20:48', '2024-06-11 10:22:23'),
(8, 'vazatin', 'uploads/events/image_17181012641234518861.jpg', 1, NULL, '2024-06-11 10:21:04', '2024-06-11 10:21:04'),
(9, 'levotex', 'uploads/events/image_17181012751859132372.jpg', 1, NULL, '2024-06-11 10:21:15', '2024-06-11 10:21:15'),
(10, 'tuxap', 'uploads/events/image_17181012841151182242.jpg', 1, NULL, '2024-06-11 10:21:24', '2024-06-11 10:21:24'),
(11, 'veltex', 'uploads/events/image_1718101299546483552.jpg', 1, NULL, '2024-06-11 10:21:39', '2024-06-11 10:21:39'),
(12, 'test', 'uploads/events/image_17183704561906215160.jpg', 1, '2024-06-14 13:08:35', '2024-06-14 13:07:36', '2024-06-14 13:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `match_results`
--

CREATE TABLE `match_results` (
  `id` int(11) NOT NULL,
  `match_id` varchar(225) NOT NULL,
  `winner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match_results`
--

INSERT INTO `match_results` (`id`, `match_id`, `winner`, `created_at`, `updated_at`) VALUES
(1, '19032613', 'Germany', '2024-06-16 17:45:07', '2024-06-23 17:45:19'),
(2, '19045701', 'Switzerland', '2024-06-23 17:45:11', '2024-06-23 17:45:21'),
(3, '19032616', 'Spain', '2024-06-23 17:45:14', '2024-06-19 17:45:40'),
(4, '19032617', 'Italy', '2024-06-23 17:45:16', '2024-06-11 17:45:42'),
(5, '19032622', 'Draw Slovenia Denmark', '2024-06-23 17:47:46', '2024-06-23 17:47:50'),
(6, '19032623', 'England', '2024-06-10 17:47:52', '2024-06-10 17:47:54'),
(7, '19032635', 'Romania', '2024-06-10 17:47:56', '2024-06-17 17:47:57'),
(8, '19032634', 'Slovakia', '2024-06-04 17:47:59', '2024-06-03 17:48:01'),
(9, '19032629', 'France', '2024-06-06 17:48:03', '2024-06-10 17:48:04'),
(10, '19032618', 'Draw Croatia Albania', '2024-06-23 17:48:22', '2024-06-23 17:48:22'),
(11, '19032614', 'Germany', '2024-06-23 18:54:28', '2024-06-23 18:54:28'),
(12, '19045702', 'Draw Scotland Switzerland', '2024-06-23 18:59:43', '2024-06-23 18:59:43'),
(13, '19032625', 'Draw Slovenia Serbia', '2024-06-20 19:00:01', '2024-06-23 19:00:01'),
(14, '19032624', 'Draw Denmark England', '2024-06-19 19:00:01', '2024-06-11 19:00:01'),
(15, '19032619', 'Spain', '2024-06-12 19:00:49', '2024-06-19 19:00:49'),
(16, '19032636', 'Slovakia', '2024-06-19 09:48:12', '2024-06-26 09:48:14'),
(17, '19032630', 'Austria', '2024-06-23 19:01:21', '2024-06-23 19:01:21'),
(18, '19032642', 'Draw Georgia Czech Republic', '2024-06-03 09:48:00', '2024-06-10 09:48:02'),
(19, '19032643', 'Portugal', '2024-06-09 09:48:04', '2024-06-17 09:48:06'),
(20, '19032637', 'Belgium', '2024-06-12 09:48:07', '2024-06-12 09:48:09'),
(21, '19032628', 'Netherlands', '2024-06-24 11:22:23', '2024-06-24 11:22:23'),
(22, '19032631', 'Draw Netherlands France', '2024-06-24 11:25:03', '2024-06-24 11:25:03'),
(23, '19032615', 'Draw Switzerland Germany', '2024-06-24 08:42:28', '2024-06-24 08:42:28'),
(24, '19045703', 'Hungary', '2024-06-24 08:44:20', '2024-06-24 08:44:20'),
(25, '19032620', 'Draw Croatia Italy', '2024-06-25 09:24:59', '2024-06-25 09:24:59'),
(26, '19032621', 'Spain', '2024-06-25 09:25:22', '2024-06-25 09:25:22'),
(27, '19032632', 'Austria', '2024-06-26 20:56:59', '2024-06-26 20:56:59'),
(28, '19032633', 'Draw France Poland', '2024-06-26 20:58:49', '2024-06-26 20:58:49'),
(29, '19032626', 'Draw England Slovenia', '2024-06-26 21:00:34', '2024-06-26 21:00:34'),
(30, '19032627', 'Draw Denmark Serbia', '2024-06-26 21:16:59', '2024-06-26 21:16:59'),
(31, '19032638', 'Draw Slovakia Romania', '2024-06-26 21:18:42', '2024-06-26 21:18:42'),
(32, '19032639', 'Draw Ukraine Belgium', '2024-06-26 21:21:33', '2024-06-26 21:21:33'),
(33, '19032644', 'Turkey', '2024-06-26 21:22:42', '2024-06-26 21:22:42'),
(34, '19032645', 'Georgia', '2024-06-26 21:23:49', '2024-06-26 21:23:49'),
(35, '19032606', 'Switzerland', '2024-07-01 11:03:26', '2024-07-01 11:03:26'),
(36, '19032605', 'Germany', '2024-07-01 11:05:49', '2024-07-01 11:05:49'),
(37, '19032608', 'England', '2024-07-01 11:05:49', '2024-07-01 11:05:49'),
(38, '19032607', 'Spain', '2024-07-01 11:06:24', '2024-07-01 11:06:24'),
(39, '19032610', 'France', '2024-07-03 10:52:28', '2024-07-03 10:52:28'),
(40, '19032609', 'Draw Portugal Slovenia', '2024-07-03 10:52:58', '2024-07-03 10:52:58'),
(41, '19032612', 'Turkey', '2024-07-03 10:54:48', '2024-07-03 10:54:48'),
(42, '19032611', 'Netherlands', '2024-07-03 10:56:15', '2024-07-03 10:56:15'),
(44, '19032601', 'Spain', '2024-07-05 20:29:35', '2024-07-05 20:29:35'),
(45, '19032602', 'France', '2024-07-06 10:44:02', '2024-07-06 10:44:02'),
(46, '19032604', 'England', '2024-07-06 23:23:20', '2024-07-06 23:23:20'),
(47, '19032603', 'Netherlands', '2024-07-06 23:23:20', '2024-07-06 23:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_03_11_141358_create_admins_table', 1),
(14, '2024_03_20_145815_create_advertisments_table', 1),
(15, '2024_04_01_144030_create_votes_table', 1),
(16, '2024_06_04_112022_create_winners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_validation` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `file` varchar(225) DEFAULT NULL,
  `pharmacy_name` varchar(225) DEFAULT NULL,
  `government` varchar(225) DEFAULT NULL,
  `device_token` longtext DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `email_verified_at`, `is_validation`, `is_active`, `password`, `image`, `gender`, `file`, `pharmacy_name`, `government`, `device_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Noel', 'Payne', 'msarwat46@gmail.com', 'Nihil sed vero occae', NULL, 0, 0, '$2y$12$px9MzfVWR/RFzexPQYt97uIfn24Z8HQFJc7uASATkbiDvx6B068hC', NULL, 'male', NULL, '', '', NULL, NULL, '2024-06-10 13:54:33', '2024-06-10 13:54:33'),
(2, 'Leigh', 'Ewing', 'm@gmail.com', 'Fugiat veniam modi', NULL, 0, 0, '$2y$12$KKuykKIF8v4isYOJplkik.pRZ0/NdGDvRVotYw.baBvYyskdQZTF.', NULL, 'female', 'uploads/users_files/image_1718064125979911460.jpg', '', '', NULL, NULL, '2024-06-11 00:02:05', '2024-06-11 00:02:05'),
(3, 'Melinda', 'Macias', 'desidepifu@mailinator.com', 'Qui vitae sit duis', NULL, 0, 0, '$2y$12$I9hHKH5Mh1m0FU4kKjfbIeCrz9/t88xp8CPU3QPAp2Gdi/.OA/vJO', NULL, 'female', NULL, '', '', NULL, NULL, '2024-06-11 08:28:11', '2024-06-11 08:28:11'),
(4, 'Abdallah', 'Mosaad', 'abdallahmosaad110@gmail.com', '01066410518', NULL, 0, 0, '$2y$12$WacjMD3p6IfR8i7H1TidouKgaSJlZAwXAz2vtFz30uMREIInDGkpS', NULL, 'male', NULL, '', '', NULL, NULL, '2024-06-11 08:33:50', '2024-06-11 08:33:50'),
(5, 'Phillip', 'Neal', 'dygare@mailinator.com', '+1 (564) 874-5639', NULL, 0, 0, '$2y$12$agIUZkL0n3lGQLNhg6KV3OI1v3EqIn55UIPvf4lMdz26fIv55ilBO', NULL, 'male', NULL, '', '', NULL, NULL, '2024-06-11 09:35:14', '2024-06-11 09:35:14'),
(6, 'ali', 'dada', 'mr.ali.dadh@gmail.com', '07728880412', NULL, 0, 0, '$2y$12$CJ18qJkM6u56jyVCyklwtuZcXABGCO9bzZrr3DqwlVk6811iheFiW', NULL, 'male', NULL, '', '', NULL, NULL, '2024-06-11 10:04:03', '2024-06-11 10:04:03'),
(7, 'Vaughan', 'Brennan', 'qizukyfa@mailinator.com', 'Commodo illo sit la', NULL, 0, 0, '$2y$12$S39/RWquZ7A7HEX9dEuzOuMxGzqKsH9ejWto7FxTsFNzjyFI3zNRO', NULL, 'male', 'uploads/users_files/image_17181030281892191599.PNG', 'Michael Sanford', 'babil', NULL, NULL, '2024-06-11 10:50:28', '2024-06-11 10:50:28'),
(8, 'Porter', 'Sims', 'notufa@mailinator.com', '+1 (541) 921-1717', NULL, 0, 0, '$2y$12$sjAdzoCJZdtnopGtKyHrvufhAwLFiqng9iYYoaNYnMY38qRl0muhm', 'uploads/users/image_1718104233642509074.jpg', 'male', NULL, NULL, NULL, NULL, NULL, '2024-06-11 11:10:33', '2024-06-11 11:10:33'),
(9, 'Abdallah', 'Mahdy', 'abdallahmosaad@gmail.com', '01066410518', NULL, 0, 0, '$2y$12$p55yIPC.P.tihvdbwct2WOWYHgSpBjPRSFo2vO9TrGn7bahGjL7NS', NULL, 'male', 'uploads/users_files/image_171810446018467295.jpg', 'Abdallah pharmacy', 'baghdad', NULL, NULL, '2024-06-11 11:14:20', '2024-06-11 11:14:20'),
(10, 'Osamah', 'Qasim', 'osamah.qasim9@gmail.com', '07707150255', NULL, 0, 0, '$2y$12$cVqTydht.rtfcvO1mFuSzuhBs.APfWTe4fLyuGPHm8F.HA3dXV7W.', NULL, 'male', NULL, 'امنة فؤاد معارج', 'baghdad', NULL, NULL, '2024-06-11 12:14:40', '2024-06-11 12:14:40'),
(11, 'Mustafa', 'Al-Kinani', 'mustafa.fadhel.k@gmail.com', '0423663681', NULL, 0, 0, '$2y$12$VL9KDVyzGiP3YFrgkEe/mevY.ORj7iFWY0BlUV3JLq2tQXftpquKS', NULL, 'male', NULL, 'Optimal Pharmacy plus', 'baghdad', NULL, NULL, '2024-06-11 12:32:56', '2024-06-11 12:32:56'),
(12, 'Omer', 'Al-Doori', 'omersalah1982@gmail.com', '07706200143', NULL, 0, 0, '$2y$12$0z0Cr4VBz5GN9UtymUctNuK4eCDnxHeah2Cg1j8WrKeZif7ilenyS', NULL, 'male', NULL, 'عمر صلاح صديم', 'baghdad', NULL, NULL, '2024-06-11 12:37:33', '2024-06-11 12:37:33'),
(13, 'Noor', 'M', 'nooramohammed.91@gmail.com', '07705840012', NULL, 0, 0, '$2y$12$9dILczvlWPMG4VVUjURrveD5GpmSisvAetbKn6W.S0ArWkoLy5eHe', NULL, 'female', NULL, 'Noor', 'baghdad', NULL, NULL, '2024-06-11 12:50:06', '2024-06-11 12:50:06'),
(14, 'Basel', 'Omar', 'b.altaher@philexpharma.com', '96893800906', NULL, 0, 0, '$2y$12$1uo8cYo/yIs9875mbTNE8OqwYLKTt5MOVuYmLBikybCdmU6nuTY/a', NULL, 'male', NULL, 'Philex', 'baghdad', NULL, NULL, '2024-06-11 16:41:28', '2024-06-11 16:41:28'),
(15, 'Mohammad', 'Anabtawi', 'mohdanabtawi@hotmail.com', '99477607', NULL, 0, 0, '$2y$12$MoKPBl7xeqq50utrgbXfs.r8ytjZETsfHDW3y87BR2CrK5gh1vmG2', NULL, 'male', NULL, 'PHILEX pharma', 'baghdad', NULL, NULL, '2024-06-12 06:39:46', '2024-06-12 06:39:46'),
(16, 'Damon', 'Wilcox', 'duconefyt@mailinator.com', 'Consectetur magnam', NULL, 0, 0, '$2y$12$6/JrrHLcIeV9Nka4dVrBK.Esly4FT.8ZC.zmnZ/tByMX81UHaB/iO', NULL, 'female', 'uploads/users_files/image_17181923421868693964.PNG', 'Xena Noel', 'oman', NULL, NULL, '2024-06-12 11:39:02', '2024-06-12 11:39:02'),
(17, 'Abdelrahman', 'Elsehly', 'abdosehly5@gmail.com', '50173600', NULL, 0, 0, '$2y$12$1pKZC2T/3BHfDq2d271QR.if9fNJ5uVlF7P9iWX1ULuxBs.SxOwei', NULL, 'male', NULL, 'Gulfmed', 'qatar', NULL, NULL, '2024-06-13 08:15:21', '2024-06-13 08:15:21'),
(18, 'Aymen', 'Ali', 'aymantroy70@gmail.com', '٠٧٧٤٩٧١٤٤٤٣', NULL, 0, 0, '$2y$12$i7guGgVBAN.ygM11CZHq3ufyKjGjaAJ7k.GnmpcIGdiPKgGy1cmNK', NULL, 'male', NULL, 'رونق المرايا', 'baghdad', NULL, NULL, '2024-06-13 12:49:42', '2024-06-13 12:49:42'),
(19, 'Hasan', 'Azher', 'hasan.azher@outlook.com', '07717888456', NULL, 0, 0, '$2y$12$ictECYZlU/8mTX9h6kGWY.naWve1R.2Sij46r1tmHEOzFY4K06x.S', NULL, 'male', NULL, 'الروان', 'baghdad', NULL, NULL, '2024-06-13 13:04:53', '2024-06-13 13:04:53'),
(20, 'Zahra', 'M', 'zm3127561@gmail.com', '07735748292', NULL, 0, 0, '$2y$12$omCa/CQEEohbHeSlZ0/HHOtThx4lnj/UPFB6dsHopKVx/74oNeeT.', NULL, 'female', 'uploads/users_files/image_1718285738353374570.jpg', 'Anfal nasier', 'baghdad', NULL, NULL, '2024-06-13 13:35:38', '2024-06-13 13:35:38'),
(21, 'هشام', 'حمزة', 'hisham1992tv@gmail.com', '07703401619', NULL, 0, 0, '$2y$12$HKTx4IV1VLwFfKSH8Sdxj.vgDZJi75KxhLAzt5rprvD4P26ygzsZO', NULL, 'male', NULL, 'صيدلية سما الحارثية', 'baghdad', NULL, NULL, '2024-06-13 16:02:19', '2024-06-13 16:02:19'),
(22, 'Hayder', 'Lauth', 'hayderlaith77@yahoo.com', '009647901611845', NULL, 0, 0, '$2y$12$SoAU7oVg2auh9eJ5Eke.C.tsobDKhV8jXkRB9AKOL4bgwgz/Is4t2', NULL, 'male', NULL, 'مؤمنة حازم', 'baghdad', NULL, NULL, '2024-06-13 16:22:30', '2024-06-13 16:22:30'),
(23, 'Mohammed', 'Majid', 'mohammedmajida219@gmail.com', '07837661855', NULL, 0, 0, '$2y$12$1If3sv7WVRAdQSfw9Kco3Ofmzfrn4q4TBT0TrYdiPGmZVN9QHwgjW', NULL, 'male', 'uploads/users_files/image_17182990811329802965.jpg', 'اوس احمد صالح', 'baghdad', NULL, NULL, '2024-06-13 17:18:01', '2024-06-13 17:18:01'),
(24, 'Aws', 'Salam', 'awshamdani709@hotmail.com', '07817816670', NULL, 0, 0, '$2y$12$wgQQGthkK9vxoW4cMWtYr.drPc1bjcdNaVQKVt0Gs30i51m.amCTS', NULL, 'male', NULL, 'بحور العافية', 'baghdad', NULL, NULL, '2024-06-13 19:07:21', '2024-06-13 19:07:21'),
(25, 'اوس', 'سلام', 'awshamdani709@gmail.com', '07817816670', NULL, 0, 0, '$2y$12$mzXq15QsP/ArETwBiWEFs.4F831aGV1XTyyh2.MXOI875q88tqyve', NULL, 'male', NULL, 'بحور العافية', 'baghdad', NULL, NULL, '2024-06-13 19:12:03', '2024-06-13 19:12:03'),
(26, 'Ahmed', 'Almukhtar', 'tube2270@gmail.com', '07736165942', NULL, 0, 0, '$2y$12$/05lT.i67JxfDdIH3POC5.nem0FhVZZXXW1xWUcVepnhrW.pF.PWK', NULL, 'male', 'uploads/users_files/image_17183087621138329169.jpeg', 'صيدلية الفوز الجديد', 'baghdad', NULL, NULL, '2024-06-13 19:59:22', '2024-06-13 19:59:22'),
(27, 'Callie', 'Pace', 'xesijiwy@mailinator.com', '0102222222', NULL, 0, 0, '$2y$12$UL/5zfW4rERWUBcmtIGka.1YYR5AEOLnAtSYdzn4Jrf0Fh7qcVG9C', NULL, 'male', NULL, 's_pharm', 'nineveh', NULL, NULL, '2024-06-13 22:45:06', '2024-06-13 22:45:06'),
(28, 'سيف', 'سعد', 'saifsadsad1998@gmail.com', '07761666098', NULL, 0, 0, '$2y$12$JeV9JFB1Y2iDdmOSqP7Meue7X7abbT5so0paGMBYGAxmgBp8AF6bC', NULL, 'male', NULL, 'صيدلية زهره الدوره', 'baghdad', NULL, NULL, '2024-06-14 01:19:22', '2024-06-14 01:19:22'),
(29, 'Ahmed', 'Salam', 'Ahmed.salam88@gmail.com', '07800024201', NULL, 0, 0, '$2y$12$O5b46pBLY699R.HgtomfnO7WU48XEnEX.KwIt2xRX3x0Kp/CWw/76', NULL, 'male', NULL, 'ركن الزهور', 'baghdad', NULL, NULL, '2024-06-14 13:16:48', '2024-06-14 13:16:48'),
(30, 'Hussein', 'Ali', 'alih98888@gmail.com', '07764140399', NULL, 0, 0, '$2y$12$xhvRPZXACI1hInsaxS/vU.LI//cvcoB0culw/wm4wpnGk1rmViZLG', NULL, 'male', 'uploads/users_files/image_17183794521355946494.jpg', 'صيدلية النهل', 'baghdad', NULL, NULL, '2024-06-14 15:37:32', '2024-06-14 15:37:32'),
(31, 'Ali abdul', 'Sattar', 'ali55sudani@gmail.com', '009647733851542', NULL, 0, 0, '$2y$12$xCxhdIfTyl2vtVY8fdOif.InCJEhg.tJJLFTCz5cUEQI5499EfjQS', NULL, 'male', NULL, 'Ali Abdulsattar', 'baghdad', NULL, NULL, '2024-06-14 15:38:20', '2024-06-14 15:38:20'),
(32, 'Mohab', 'Mohamed', 'Mohab.fatten@kulud.com.qa', '70162284', NULL, 0, 0, '$2y$12$XWEQmxzs8sXFWxmdm/ARyuu1hlCaLgqN/9T7Rf8FZvfy6mdzCfGh2', NULL, 'male', NULL, 'Kulud Aba al Heran', 'qatar', NULL, NULL, '2024-06-15 01:07:58', '2024-06-15 01:07:58'),
(33, 'Abdullah', 'Alakayshi', 'nedved222002@yahoo.com', '079 048 07393', NULL, 0, 0, '$2y$12$UMIZeDCS09YeKKu.G79oG.DznBQyumUwUxicgiQTSlmj4NCsdtnbi', NULL, 'male', NULL, 'Nasma alalel', 'baghdad', NULL, NULL, '2024-06-15 12:26:37', '2024-06-15 12:26:37'),
(34, 'Ahmed', 'Abbas', 'ahmedabbas971@yahoo.com', '07705335172', NULL, 0, 0, '$2y$12$eiLSbGWjnlwXQgR0FtxAr.6cJRo1pf5HKmr8tFZ0HSqqwNYuM4956', NULL, 'male', 'uploads/users_files/image_1718469403745393339.jpeg', 'نادية العبيدي', 'oman', NULL, NULL, '2024-06-15 16:36:43', '2024-06-15 16:36:43'),
(35, 'Muhammad', 'Abdelwahab', 'dr_mohamed2006@yahoo.com', '33159850', NULL, 0, 0, '$2y$12$/mZGerDFDBkuyN464ARVuuI0DKr.EdQi2jJka/O3zZeKCoe3N/xhm', NULL, 'male', NULL, 'Sunlife', 'qatar', NULL, NULL, '2024-06-15 17:06:46', '2024-06-15 17:06:46'),
(36, 'Mahmoud', 'Atef', 'mahmoudatef100@yahoo.com', '66430591', NULL, 0, 0, '$2y$12$8iiTZrxSPaPGMikwVy6zweh9VAEzbUOIGjT5tZXPmy6IikZihO2l6', NULL, 'male', NULL, 'Kulud pharmacy', 'qatar', NULL, NULL, '2024-06-17 15:38:40', '2024-06-17 15:38:40'),
(37, 'Rehan', 'Malik', 'rehan_malik24@hotmail.com', '50391279', NULL, 0, 0, '$2y$12$7IsFqRtbp/K0wSkDj2scGu6K3ATdXPRVxpqLsYWAfE1V1an4CQama', NULL, 'male', NULL, 'Kulud pharmacy', 'qatar', NULL, NULL, '2024-06-19 15:22:27', '2024-06-19 15:22:27'),
(38, 'Awad', 'Ali', 'Dr.awad2018@gmail.com', '33634242', NULL, 0, 0, '$2y$12$SChHJgzehID3BJ8j.BQ9.e4GAGHqEA3Z9SxoENlshDQcpKXRvJcPi', NULL, 'male', NULL, 'Rofaidia pharmacy', 'qatar', NULL, NULL, '2024-06-19 15:26:45', '2024-06-19 15:26:45'),
(39, 'Dr Wael', 'Shams', 'Wael.shamseldeen@kulud.com.qa', '313 31309', NULL, 0, 0, '$2y$12$WR4HxPNMBDAQaZI4qdZAreGB6Nl8UhKDBrMUlvIGyzh7tWVZDdT8m', NULL, 'male', 'uploads/users_files/image_17188108501585856005.jpg', 'Kulud Royal medical center', 'qatar', NULL, NULL, '2024-06-19 15:27:30', '2024-06-19 15:27:30'),
(40, 'Tarek', 'Hegab', 'tarek8795@gmail.com', '70491079', NULL, 0, 0, '$2y$12$HF0/Z.NFR96xlBPsh6WtXOnWsYQ9w9W4f4REgg9O20c2OEmCGrPEi', NULL, 'male', NULL, 'Kulud', 'qatar', NULL, NULL, '2024-06-19 15:46:56', '2024-06-19 15:46:56'),
(41, 'Ashraf', 'Mohamed Soliman', 'elheateamy@yahoo.com', '5510 1815', NULL, 0, 0, '$2y$12$pByDp46NSSWyIPM7cjz5y.nvq9Y3r8B8YfD9ZeRTo8RuUUTgAK80O', NULL, 'male', NULL, 'Barzan pharmacy', 'qatar', NULL, NULL, '2024-06-19 15:54:10', '2024-06-19 15:54:10'),
(42, 'Taha', 'Elhusseini', 'elhosinyt@gmail.com', '50331980', NULL, 0, 0, '$2y$12$NoP29UN8XmwFz0QBB9eIguwGV8106A.baHbzcIvT0NjfgX1BbedRC', NULL, 'male', NULL, 'Kulud', 'qatar', NULL, NULL, '2024-06-19 15:55:00', '2024-06-19 15:55:00'),
(43, 'Arif', 'Syed', 'syedarif.pharma@gmail.com', '33129163', NULL, 0, 0, '$2y$12$YH1GaE39zz906DY7dDiYU.ao/cWPbZi09NO3HN.ozfRHxRBcmS.jG', NULL, 'male', NULL, 'Life Line Medical Centre Pharmacy', 'qatar', NULL, NULL, '2024-06-19 16:07:57', '2024-06-19 16:07:57'),
(44, 'Ibrahim', 'Adel', 'Ibrahim.elshatla@kulud.com.qa', '77764891', NULL, 0, 0, '$2y$12$Z7y.xhX4zTJFJuWX415t9OW0fFs0yTXXzhVKFz9Mkpt2.0WUY5q.G', NULL, 'male', NULL, 'Kulud Wakra 1', 'qatar', NULL, NULL, '2024-06-19 19:46:34', '2024-06-19 19:46:34'),
(45, 'Mohamed', 'Samir', 'elkhshab10@gmail.com', '77808735', NULL, 0, 0, '$2y$12$ZPNycS18pVRyD1aBfxcfj.oY3/k11upkcIfHevuO2W89iGBvvOGyq', NULL, 'male', NULL, 'Be well pharmacy', 'qatar', NULL, NULL, '2024-06-19 21:14:19', '2024-06-19 21:14:19'),
(46, 'Ahmed', 'Ismail', 'saladin707@yahoo.com', '55319982', NULL, 0, 0, '$2y$12$SjhNdLHjJV3XVwfGvSv7POKm7B//jWFEn.gM5yZn3AM/eT5qecMrO', NULL, 'male', NULL, 'Korean hospital pharmacy', 'qatar', NULL, NULL, '2024-06-20 08:36:43', '2024-06-20 08:36:43'),
(47, 'Mustafa', 'Mazhar', 'darshmma9@gmail.com', '90168831', NULL, 0, 0, '$2y$12$Yv6bPFPMwtc2eD/IJQcteuXlCWCbIfHy5mFtEqN5fVCWhj9kP3GTK', NULL, 'male', NULL, 'Muscat pharmacy', 'oman', NULL, NULL, '2024-06-21 22:32:30', '2024-06-21 22:32:30'),
(48, 'Syed Mohammed Khurshid', 'Usmani', 'Syedkusmani@gmail.com', '+968 92052569', NULL, 0, 0, '$2y$12$nJRiD2UI08KZ.6B9NeAnWeVufGMISpzjz5XvYz3xTrRma.xB0vP06', NULL, 'male', NULL, 'Philex Pharma', 'oman', NULL, NULL, '2024-06-22 07:58:42', '2024-06-22 07:58:42'),
(49, 'Affaque', 'Moulvi', 'affaqueim@gmail.com', '77332898', NULL, 0, 0, '$2y$12$9Cgg0JgPMIxdccIDWtZDWOEM0zmX5UXFhCHouU7j9PXvNryGunfjm', NULL, 'male', NULL, 'Avicen pharmacy', 'oman', NULL, NULL, '2024-06-22 08:13:53', '2024-06-22 08:13:53'),
(50, 'Majid', 'Malik', 'majidmalik78@yahoo.com', '96531718', NULL, 0, 0, '$2y$12$z./PTf5JEgOFDLtpc8KzVeyzBBJiNKTAGqq1BVZBz5eDv.rmgZbiO', NULL, 'male', NULL, 'Scientific Pharmacy', 'oman', NULL, NULL, '2024-06-22 08:18:41', '2024-06-22 08:18:41'),
(51, 'Tariq', 'Rasheed', 'tariqrasheed550@gmail.com', '0096897335042', NULL, 0, 0, '$2y$12$zmzCptaIVgKvkscaFWxm3O9AhJUbQ1CrlP5bPSnWPtLnd1GJj5obO', NULL, 'male', 'uploads/users_files/image_1719045495212924275.pdf', 'Belqees pharmacy', 'oman', NULL, NULL, '2024-06-22 08:38:15', '2024-06-22 08:38:15'),
(52, 'TousifAhmed', 'Dadu', 'dadutousif596@gmail.com', '93218519', NULL, 0, 0, '$2y$12$ueZkDMAQunTxhL1fgh1yS.5Zv9H8GLjQNPUiF0DRCNDtPslK1e.aW', NULL, 'male', NULL, 'IBN SINA PHARMACY LLC', 'oman', NULL, NULL, '2024-06-22 08:41:26', '2024-06-22 08:41:26'),
(53, 'Esraa', 'Hatem', 'ehatemm98@gmail.com', '96578551', NULL, 0, 0, '$2y$12$bmAuij3IJMK7L933Nh.VYuucyP3Au8n/5tZMpTvYWgQS9bW2XWv0O', NULL, 'female', 'uploads/users_files/image_17190467471560438994.jpg', 'Alexandria Pharmacy', 'oman', NULL, NULL, '2024-06-22 08:59:07', '2024-06-22 08:59:07'),
(54, 'Wasim', 'Raja', 'ph.wasimraja@gmail.com', '98539441', NULL, 0, 0, '$2y$12$5xQ5Z2ivo07lzzssocgRKOKJ5rXvbIBefL2LVF9BRO4zcK08Yrk2C', NULL, 'male', NULL, 'Asia Pharmacy', 'oman', NULL, NULL, '2024-06-22 09:04:54', '2024-06-22 09:04:54'),
(55, 'Leena', 'Khalafallah', 'Lno2leena@gmail.com', '99752465', NULL, 0, 0, '$2y$12$AH.Us6u1sDYNcfcYUNzpruztR4Gth5.7zjDHTdLBtBUYbel1hpYRW', NULL, 'female', NULL, 'Care pharmacy', 'oman', NULL, NULL, '2024-06-22 09:10:18', '2024-06-22 09:10:18'),
(56, 'Osama', 'Ahmed', 'osamah73@gmail.com', '+96894450616', NULL, 0, 0, '$2y$12$HiS1ux.EntVmPXC6xAZqzONkozqmPBuS19T0zvLrllrM/LXOescqu', NULL, 'male', 'uploads/users_files/image_1719048103794328635.jpg', 'Pharmacure', 'oman', NULL, NULL, '2024-06-22 09:21:43', '2024-06-22 09:21:43'),
(57, 'Ahmed', 'Basheer', 'yosofbasheer@gamil.com', '94119157', NULL, 0, 0, '$2y$12$cayZin6Ka1D9BOQiVdXaIuoJEipATetEaH8Sgk32RS/PcRiQsq4JG', NULL, 'male', NULL, 'Mohammed jamil pharmacy', 'oman', NULL, NULL, '2024-06-22 10:11:48', '2024-06-22 10:11:48'),
(58, 'Nawar', 'Mansoor', 'nowar.almansor@gmail.com', '07901298788', NULL, 0, 0, '$2y$12$CTykT.lFHWaM0XSbnSgytu9naL8TuHPUhL7TRYm3lKji2sfhuyI.i', NULL, 'male', 'uploads/users_files/image_1719073593449824683.jpeg', 'Wissam pharmacy', 'baghdad', NULL, NULL, '2024-06-22 16:26:33', '2024-06-22 16:26:33'),
(59, 'Nather', 'Akram', 'na.akram.1996@gmail.com', '07704366671', NULL, 0, 0, '$2y$12$isGCLT6PTT5tEx12PP04Ze6vZoG1YYC3oX8sGYQY3vC4kPL8Fwsqu', NULL, 'male', NULL, 'جوهرة العامرية', 'baghdad', NULL, NULL, '2024-06-22 17:38:41', '2024-06-22 17:38:41'),
(60, 'Abdalla', 'Bassem', 'h.abo@yahoo.com', '07710926950', NULL, 0, 0, '$2y$12$kz5dMjRlIhPM9AdKJ8y1P.XK6aQbLJAaKF.DzjDcse33f5.pAP39W', NULL, 'male', NULL, 'صيدلية جوهرة العامرية 1', 'baghdad', NULL, NULL, '2024-06-22 17:40:49', '2024-06-22 17:40:49'),
(61, 'صبري', 'عصام', 'sabri.isam.s@gmail.com', '٠٧٨٣٨٤٧٨٧٨٤', NULL, 0, 0, '$2y$12$oOpEm5axiwG9R6Qr5En2NeWyMDy8MK7T1/bkWZD8g8W.h41Nvqs5m', NULL, 'male', NULL, 'صيدلية دواء الشفاء ٢', 'baghdad', NULL, NULL, '2024-06-22 17:57:54', '2024-06-22 17:57:54'),
(62, 'Mohammed', 'Alkaisy', 'mohammedabdulhassan111@gmail.com', '07705331362', NULL, 0, 0, '$2y$12$IaQFPEbibpe48fRSJIkeNuDuOOW0jgp0OY6NPeBgFgf8OMYmeaeYC', NULL, 'male', NULL, 'Al Aaj', 'baghdad', NULL, NULL, '2024-06-22 18:03:14', '2024-06-22 18:03:14'),
(63, 'Biall', 'Mizher', 'bilal200m@yahoo.com', '009647718653181', NULL, 0, 0, '$2y$12$nBtOD11vDl3UbGQPZ04IgeRqvkMSUfYYyfygSCMGOkfwm1G2iOeOq', NULL, 'male', NULL, 'Burj alsaha pharmacy', 'baghdad', NULL, NULL, '2024-06-22 18:30:44', '2024-06-22 18:30:44'),
(64, 'Mustafa', 'Safaa', 'mustafasafaa755@gmail.com', '7812180999', NULL, 0, 0, '$2y$12$w6d4Z.WcR4e/TrlMjo8i5./3kahVUVXsRZaM/lrNLDaCbm6ovytK6', NULL, 'male', NULL, 'برج الصحه', 'baghdad', NULL, NULL, '2024-06-22 18:36:35', '2024-06-22 18:36:35'),
(65, 'Mustafa', 'Shukri', 'dr.satoofi@gmail.com', '07717721921', NULL, 0, 0, '$2y$12$aC42ctY/ochQt4kXqvVsZeUYW9vpxD6ZQaR3q984pa0WnQ8MxnBRG', NULL, 'male', NULL, 'Etr alghardinya', 'baghdad', NULL, NULL, '2024-06-22 18:42:55', '2024-06-22 18:42:55'),
(66, 'رامي', 'نعمان', 'dr.ramialfalahy@yahoo.com', '07825614350', NULL, 0, 0, '$2y$12$pLZP.Iq0VMcHL6/OT0POOuOSbKmV.FCnuh1kfDCWlyiLwqF42Y9W2', NULL, 'male', 'uploads/users_files/image_17190953581253778541.jpeg', 'صيدلية اية صباح معن', 'baghdad', NULL, NULL, '2024-06-22 22:29:18', '2024-06-22 22:29:18'),
(67, 'حسين', 'نزار', 'husseinnazar25@gmail.com', '07707962840', NULL, 0, 0, '$2y$12$DmO59t9InKAree8dT76YfODcnE5bDsMHXwZZVjPpg2l5/pKnwFqLW', NULL, 'male', 'uploads/users_files/image_17190956101820699554.jpeg', 'صيدلية بسمة الحياة', 'baghdad', NULL, NULL, '2024-06-22 22:33:30', '2024-06-22 22:33:30'),
(68, 'ABDUL SALAM', 'THOOMBATH', 'saluekd@gmail.com', '79285898', NULL, 0, 0, '$2y$12$zsFikBJWBX2XAHjRvpPEcOra9z5kdptHP71qYITCQf3MDRwRXEffu', NULL, 'male', NULL, 'AL HASHAR PHARMACY', 'oman', NULL, NULL, '2024-06-23 15:41:29', '2024-06-23 15:41:29'),
(69, 'Osama', 'Afawi', 'osama1996asa@gmail.com', '07727989579', NULL, 0, 0, '$2y$12$WOuM4O9qIg8JYlGpN5Nu/.j0nNiSKYUfZ.vxb0AP9wlDwXDmy2gh2', NULL, 'male', NULL, 'مروة كريم', 'baghdad', NULL, NULL, '2024-06-23 17:33:07', '2024-06-23 17:33:07'),
(70, 'Ali', 'Hussein', 'ali.hussein1014aw@gmail.com', '07822661058', NULL, 0, 0, '$2y$12$uer7ZeZdWVNrq0dvqpxtsez3JmUiQot9xZXBtKKwSkmWTMQQggbSO', NULL, 'male', NULL, 'انوار الوزيرية-Anwar Al-waziria', 'baghdad', NULL, NULL, '2024-06-23 17:37:14', '2024-06-23 17:37:14'),
(71, 'Ahmed', 'Imad', 'ahmed.imad.83@gmail.com', '07702070008', NULL, 0, 0, '$2y$12$hiWDYLb4t/E.lX3JA.tiFuytnjIISO3NTy2FpvVk9.KrRLOh5O7dW', NULL, 'male', NULL, 'Ameera ahmed hussain', 'oman', NULL, NULL, '2024-06-23 17:59:51', '2024-06-23 17:59:51'),
(72, 'Jashar', 'Paramboor', 'jasharparamboor@gmail.com', '66129937', NULL, 0, 0, '$2y$12$lLzkHpMzjsfxkcjfxWtAhenkCwhY2Ha5D1bMHnlQIkWkz8kk5H9fG', NULL, 'male', NULL, 'al zaeem pharmacy', 'qatar', NULL, NULL, '2024-06-23 22:33:58', '2024-06-23 22:33:58'),
(73, 'Maytham', 'Alkarkukli', 'maithammohanad1998@gmail.com', '0096895548399', NULL, 0, 0, '$2y$12$Qi.CWpCJzNDx3mfVrFhoCOz6aqJ/CpPG5bmsL4PaBfMIOjme/C/BO', NULL, 'male', NULL, 'Taiba pharmacy', 'oman', NULL, NULL, '2024-06-24 00:29:59', '2024-06-24 00:29:59'),
(74, 'ayman', 'murkaz', 'ayman3533@gmail.com', '77104902', NULL, 0, 0, '$2y$12$8H9JMqwD.z5Cwl55uLKM1enizdFJ2yzqc.pocGf/teGAsf0Dgou0e', NULL, 'male', NULL, 'sahtna pharmacy', 'qatar', NULL, NULL, '2024-06-24 08:23:01', '2024-06-24 08:23:01'),
(75, 'علي', 'حسين', 'alizahim92@yahoo.com', '07792560963', NULL, 0, 0, '$2y$12$5.6PQ5mv/5HCSMGxQ2kh5u/lOw5qhUg1K/XJnheMXJfx/vQVpA54G', NULL, 'male', 'uploads/users_files/image_1719236881558346467.jpeg', 'بانادول المركزية', 'salahaddin', NULL, NULL, '2024-06-24 13:48:01', '2024-06-24 13:48:01'),
(76, 'Sarmad', 'Waleed', 'sarmad.warkaa@gmail.com', '07701656129', NULL, 0, 0, '$2y$12$WBdWoAtcsnkq.I2.Q6rUqO4rHTHcgXSv3MIwWIu2qgjOcGuMGUFNu', NULL, 'male', NULL, 'الوركاء', 'baghdad', NULL, NULL, '2024-06-24 14:10:47', '2024-06-24 14:10:47'),
(77, 'Mohammed', 'Jomah', 'Jomah_m@yahoo.com', '07708820785', NULL, 0, 0, '$2y$12$TpDNKMyXShBxKKhb0Ebycem3lmT2TBbWYRXNrX0xNekcirsuG/hsK', NULL, 'male', NULL, 'Sales Rep.', 'baghdad', NULL, NULL, '2024-06-24 16:01:55', '2024-06-24 16:01:55'),
(78, 'اثير', 'هادي', 'atheeralazzwie@gmail.com', '07704115564', NULL, 0, 0, '$2y$12$54HyuGe4olrN7ek14dFL1.rG4N/lFQl1N/S2b86Er5XVF1/eDBmTu', NULL, 'male', NULL, 'الفيافي', 'baghdad', NULL, NULL, '2024-06-24 18:07:57', '2024-06-24 18:07:57'),
(79, 'Ammar', 'Hassan', 'sally.almudaris.sas@gmail.com', '07864438757', NULL, 0, 0, '$2y$12$WGcBsJHlhMSwsVaIoCstHuoGyyaChk3M0zEI92rKdmpUpGFTv0ZOu', NULL, 'male', 'uploads/users_files/image_1719252542787510816.jpeg', 'عمار حسن حتروش', 'baghdad', NULL, NULL, '2024-06-24 18:09:02', '2024-06-24 18:09:02'),
(80, 'Anish Vino', 'Ambrose', 'nshvn5670@gmail.com', '96571872', NULL, 0, 0, '$2y$12$8/puX8EoKvUwBUGbGvHFFexLlYMZOdYkVTUC2LvQ.HMoGFHv5ucfK', NULL, 'male', NULL, 'Al Hukma pharmacy', 'oman', NULL, NULL, '2024-06-25 08:25:33', '2024-06-25 08:25:33'),
(81, 'Ali', 'Hussein', 'ali.husseinaw1014@gmil.com', '07822661057', NULL, 0, 0, '$2y$12$BwN5GPqI6UfgnVrZrArogeE7hTrwtzCvZXxKtabcE3CadHZj9Qz12', NULL, 'male', NULL, 'انوار الوزيرية-Anwar Al-waziria', 'baghdad', NULL, NULL, '2024-06-25 11:19:57', '2024-06-25 11:19:57'),
(82, 'علي', 'ستار', 'aaiillsattar1998@gmail.com', '07730709098', NULL, 0, 0, '$2y$12$769jPvzrAseyEO5TJMz16.4yBj3VIlxyi7v..crVzWBfvSzLEd/ji', NULL, 'male', NULL, 'صيدليه موسى سالم', 'oman', NULL, NULL, '2024-06-25 13:00:14', '2024-06-25 13:00:14'),
(83, 'رفل ستار', 'الغريري', 'raffelsatar@gmail.com', '07829932075', NULL, 0, 0, '$2y$12$8wGRlYe70ik8Iby7Sx7/KO1VIWwFduEFCNXGt6m8oVk73AryvlEqq', NULL, 'male', NULL, 'صيدلية موسى سالم', 'baghdad', NULL, NULL, '2024-06-25 14:57:59', '2024-06-25 14:57:59'),
(84, 'حيدر احمد', 'محمد', 'aam22336h@gmail.com', '07762497371', NULL, 0, 0, '$2y$12$030MqrWXNuDRWZNH7Y8gL.hpIGR5YWf.AZhmR1AuPlUjuNitYP0H6', NULL, 'male', NULL, 'صيدلية موسى سالم', 'oman', NULL, NULL, '2024-06-25 15:12:36', '2024-06-25 15:12:36'),
(85, 'Samer', 'Al-Otaibi', 'samer@gulfmedqatar.com', '+974 33007111', NULL, 0, 0, '$2y$12$2LNdFLXMwYjn87fBeaQaVOJU/naJwY2z1B5T6VXN0kf3BJ/XPcBdy', NULL, 'male', NULL, 'Gulfmed', 'qatar', NULL, NULL, '2024-06-25 17:07:43', '2024-06-25 17:07:43'),
(86, 'Salima', 'Kheirani', 'dr.salima90@gmail.com', '70180743', NULL, 0, 0, '$2y$12$/44j65b55K1AW0vg1F5TqOKoaq3aC3c7txljB/WEI8BKdddCOKpre', NULL, 'female', NULL, 'Kulud Pharmacy', 'qatar', NULL, NULL, '2024-06-26 00:14:53', '2024-06-26 00:14:53'),
(87, 'امير', 'العاملي', 'ameeralamili@gmail.com', '07709415377', NULL, 0, 0, '$2y$12$.ouWT2eHXwVA.o9zRG/AQOfMuzH/Lwr0PuLYwnLrCNBRcAejtawVi', NULL, 'male', 'uploads/users_files/image_17193613671144949826.png', 'صيدلية مرمرة', 'baghdad', NULL, NULL, '2024-06-26 00:22:47', '2024-06-26 00:22:47'),
(88, 'April Dawn', 'Coloquio', 'aprilcii@ymail.com', '74460662', NULL, 0, 0, '$2y$12$CSgnhZ/YnsWZ3Dj6Za06Pu61w/xK6Dl5t3W56xVh1IJO55kgMgWC2', NULL, 'female', NULL, 'Be Well Pharmacy', 'qatar', NULL, NULL, '2024-06-26 06:53:30', '2024-06-26 06:53:30'),
(89, 'Muneer', 'Pv', 'pv.muneer@gmail.com', '98616402', NULL, 0, 0, '$2y$12$fKtR7t4kQDzyFfW3nWsz9.o0oiac3lInfm4/4nlBBYHtc.un5zL16', NULL, 'male', 'uploads/users_files/image_1719399849655213852.pdf', 'Badr Al Samaa pharmacy- Ruwi', 'oman', NULL, NULL, '2024-06-26 11:04:09', '2024-06-26 11:04:09'),
(90, 'BUSHRA', 'MOHAMMED ISMAEL', 'bushram77@gmail.com', '31618685', NULL, 0, 0, '$2y$12$q1Yc5Fv7GhLrJAeeP3f2MuNnr/R3MIW28WL6wu7hoLjQla6LJ00F2', NULL, 'male', NULL, 'WELLCARE PHARMACY', 'qatar', NULL, NULL, '2024-06-26 12:31:18', '2024-06-26 12:31:18'),
(91, 'AHMED', 'KHALIL', 'ahmedkhalilme1@gmail.com', '70242420', NULL, 0, 0, '$2y$12$LvIX/g1vBBC9cWqNzX26bumiFU.DD8iiPC95hWnXwWf4Z4wKLcrhG', NULL, 'male', 'uploads/users_files/image_1719410264359547512.PDF', 'Kulud Midmac', 'qatar', NULL, NULL, '2024-06-26 13:57:44', '2024-06-26 13:57:44'),
(92, 'Hind', 'Elamin', 'hnod109@gmail.com', '50130122', NULL, 0, 0, '$2y$12$f5rqgrCiNVCa7XcuPisUneZgQcXg/aq0lk6For6cJFAG2GsGdiLLm', NULL, 'female', NULL, 'Lychee pharmacy', 'qatar', NULL, NULL, '2024-06-26 14:48:43', '2024-06-26 14:48:43'),
(93, 'Abbas', 'Ghalb', 'aya1996f@gmail.com', '07732051888', NULL, 0, 0, '$2y$12$STnFGoUAAlJVMwNf9dPDMOt/x12nfA6hqtnalSfESvkSFUX9HHwh.', NULL, 'male', 'uploads/users_files/image_1719431326792263919.png', 'صيدلية الرمال', 'baghdad', NULL, NULL, '2024-06-26 19:48:46', '2024-06-26 19:48:46'),
(94, 'THANGARAJ', 'MUTHUKUMAR', 'hari.muthukumar@gmail.com', '70790466', NULL, 0, 0, '$2y$12$x0nrBTjUf1PHEfre6ahsTu4jXu4s0GvYBTQSncY.KdeUcZm0.rYR.', NULL, 'male', NULL, 'Kulud', 'qatar', NULL, NULL, '2024-06-26 20:44:36', '2024-06-26 20:44:36'),
(95, 'Janice', 'La Madrid', 'janicelamadrid.23@gmail.com', '74091747', NULL, 0, 0, '$2y$12$7WT2mMimhOJMKQ10QVSvCuGKE/Fm4QaJj8laczOa.UaDcDEXIehmC', NULL, 'female', NULL, 'Kulud pharmacy', 'qatar', NULL, NULL, '2024-06-26 21:25:31', '2024-06-26 21:25:31'),
(96, 'Janice', 'La Madrid', 'janice.lamadrid@kulud.com.qa', '74091747', NULL, 0, 0, '$2y$12$pSlr/8M/4bz.ssQXftqJ9.s2Cl4zVCim4oLd3vAnS1Vz149CNAmke', NULL, 'female', NULL, 'Kulud pharmacy', 'qatar', NULL, NULL, '2024-06-26 21:27:27', '2024-06-26 21:27:27'),
(97, 'Ali', 'Taha', 'ealitaha79@gmail.com', '07709898880', NULL, 0, 0, '$2y$12$a5esBZpwBjVor/DmVw7o.euKmqg8.5lClVIFueLu1hKkvdjPFjfeG', NULL, 'male', 'uploads/users_files/image_17195384181764879251.jpeg', 'Ali taha', 'baghdad', NULL, NULL, '2024-06-28 01:33:38', '2024-06-28 01:33:38'),
(98, 'Ali', 'Farouk', 'alifarouk.mj@gmail.com', '07801535555', NULL, 0, 0, '$2y$12$fcaJpWbtLJEq7L.bJOqawOunGGC4bgYs0Dnnoq1QbzlcUfUBe8wRC', NULL, 'male', NULL, 'Adan druge store', 'baghdad', NULL, NULL, '2024-06-29 11:49:58', '2024-06-29 11:49:58'),
(99, 'Ali', 'Hussein', 'ali.husseinaw1014@gmail.com', '07822661057', NULL, 0, 0, '$2y$12$fMsBIJ5oDy0VM8mExDiwvOf66OLJo2wdipMOLDEmqcuzixtql1.Zi', NULL, 'male', NULL, 'انوار الوزيرية-Anwar Al-waziria', 'baghdad', NULL, NULL, '2024-06-29 14:14:04', '2024-06-29 14:14:04'),
(100, 'Mousa', 'Salim', 'musasalim84@yahoo.com', '07707197062', NULL, 0, 0, '$2y$12$0uEFl0LR1IhL.sTnD5bxZO0R5S.iVxh0COqf6bPIWaSnmMh4csArC', NULL, 'male', NULL, 'موسى سالم', 'baghdad', NULL, NULL, '2024-06-29 17:43:52', '2024-06-29 17:43:52'),
(101, 'Hussein', 'Zaid', 'alzawy458@gmail.com', '07765223157', NULL, 0, 0, '$2y$12$uD.xM3pLU/ycGBSwqA8ED.4/Q0RDIsUe5rIs/iCjhdR.ymt49xhO.', NULL, 'male', NULL, 'Musa salim', 'baghdad', NULL, NULL, '2024-06-29 17:47:00', '2024-06-29 17:47:00'),
(102, 'Shabeerali', 'Konnola', 'ed@avicen.om', '92689521', NULL, 0, 0, '$2y$12$kmW3RY/OopgiorvtkK1qCOq9917iUypl2XLpxksUw228tdTqeq3de', NULL, 'male', NULL, 'AVICEN PHARMACY', 'oman', NULL, NULL, '2024-06-30 11:56:14', '2024-06-30 11:56:14'),
(103, 'Laith', 'Hameed', 'laith.1990@gmail.com', '07714371973', NULL, 0, 0, '$2y$12$dwjhspbV/EbptkHRTTsQouo5x07pejxn4JrqHlrI8lIl5jUCZXMsu', NULL, 'male', NULL, 'شمس الواثق', 'baghdad', NULL, NULL, '2024-07-01 15:49:08', '2024-07-01 15:49:08'),
(104, 'Murtadha', 'Mohammed', 'rmafc.1987@yahoo.com', '07702591283', NULL, 0, 0, '$2y$12$exRHvVKdih3mqfxK/kgqxO33Nwsqro.3rKEwNc.NGFInGGNFs5S.i', NULL, 'male', NULL, 'Shams alwathiq', 'baghdad', NULL, NULL, '2024-07-01 15:50:14', '2024-07-01 15:50:14'),
(105, 'hassan', 'ali', 'hassanynwa6@gmail.com', '07702700644', NULL, 0, 0, '$2y$12$IsUu6TcikXfa9uTf2eVGJui.MEaWL/vcJ4x5Hm0EgwxvTHmxuACJi', NULL, 'male', NULL, 'arez lebnan', 'baghdad', NULL, NULL, '2024-07-01 15:54:07', '2024-07-01 15:54:07'),
(106, 'Hashem', 'alkhafagi', 'hashem.1989@gmail.com', '07902831502', NULL, 0, 0, '$2y$12$P6Th8ayt2BQgj2RVqyoc1etBcEh7NGLIGZ7Xv5.D0X62tutbuWM0K', NULL, 'male', NULL, 'شمس الواثق', 'baghdad', NULL, NULL, '2024-07-01 15:59:41', '2024-07-01 15:59:41'),
(107, 'Ahmed', 'Kareem', 'Aalsaadi931@gmail.com', '07816342438', NULL, 0, 0, '$2y$12$TQqDTrnJpamkBbOC4TbW0u3Tl6TPBqY5xncBnke2Qngg6WVvM0vlG', NULL, 'male', 'uploads/users_files/image_17198499641687989339.jpg', 'صيدلية جوهرة الواثق', 'baghdad', NULL, NULL, '2024-07-01 16:06:04', '2024-07-01 16:06:04'),
(108, 'Noor', 'Salam', 'noor.salam11@yahoo.com', '07704743332', NULL, 0, 0, '$2y$12$mjDvBQX5ehvtmSEPRIhVjulohF.9Ip520jPuuXxRXvhO8ShHpGYd.', NULL, 'female', 'uploads/users_files/image_1719850601487524860.jpg', 'ارز لبنان', 'baghdad', NULL, NULL, '2024-07-01 16:16:41', '2024-07-01 16:16:41'),
(109, 'ياسر', 'محمد', 'yasirreal1@gmail.com', '7700202207', NULL, 0, 0, '$2y$12$1EBm.EmJFTpJrAz684zzZeAJm1feQZSju8a53DZ8vorXaDMJ5siHq', NULL, 'male', NULL, 'شمس الواثق', 'baghdad', NULL, NULL, '2024-07-01 16:59:47', '2024-07-01 16:59:47'),
(110, 'Thaer', 'alkutbi', 'alkutbithaer@gmail.com', '07703575753', NULL, 0, 0, '$2y$12$1Ux/XuSKDG0d94dVczRHXuCq4/HD7wieCXj3LHBqXKv5q64yKFQiy', NULL, 'male', NULL, 'صيدلية شفاء العائله', 'baghdad', NULL, NULL, '2024-07-01 17:16:09', '2024-07-01 17:16:09'),
(111, 'zain', 'Furat', 'zain.furat@gmail.com', '07700336406', NULL, 0, 0, '$2y$12$J7XD9L9dtNt6byRcPxXNvuspX0lvZA8M.Q7HO7rc81Jhnx/q15ZzO', NULL, 'male', NULL, NULL, NULL, NULL, NULL, '2024-07-02 12:20:25', '2024-07-02 12:20:25'),
(112, 'Zain', 'Alabedin', 'zain.alabdeen90@gmail.com', '07700336406', NULL, 0, 0, '$2y$12$/mTELtjWADGJ6H7qi87YuO7HAm6TbbT.bwPLTcu5sNyHtyDWsWd7S', NULL, 'male', NULL, 'نبض المستقبل', 'baghdad', NULL, NULL, '2024-07-02 12:40:48', '2024-07-02 12:40:48'),
(113, 'Ahmed', 'Salah', 'ahmed_salah196@yahoo.com', '009647709832483', NULL, 0, 0, '$2y$12$E7P8cA0cA0fSY5tk2/vMg.QTHg9HrNwpdMagQZh2O..m/k5hEJPhG', NULL, 'male', NULL, 'دعاء ضياء العطار', 'oman', NULL, NULL, '2024-07-02 16:17:30', '2024-07-02 16:17:30'),
(114, 'Samer', 'Lateef', 'deepjony188@yahoo.com', '009647718126300', NULL, 0, 0, '$2y$12$vNSm4AI.mgsYBedmPVucLOxwk2tA0.PeUppyB8C1DRsIyt4NiR4Qa', NULL, 'male', NULL, 'Arad al sawsa', 'baghdad', NULL, NULL, '2024-07-02 16:52:47', '2024-07-02 16:52:47'),
(115, 'محمود', 'شامي', 'mahmoodmaddox@hotmail.com', '07814894800', NULL, 0, 0, '$2y$12$a9P3AZzBmyA2torB4Iep/u1xXjxHFOi.GTCVL6ACaaj4FmOMdnvTG', NULL, 'male', 'uploads/users_files/image_17201766542121564044.jpeg', 'دعاء سعد عبدالمجيد', 'baghdad', NULL, NULL, '2024-07-05 10:50:54', '2024-07-05 10:50:54'),
(116, 'Mohammad', 'Nasser', 'nassermohammad89@yahoo.com', '77379170', NULL, 0, 0, '$2y$12$wnS21jnqKWhiZKwiXuFT8ujP8pVdD7I/OwOvtxe.hh4TJMRPQXyou', NULL, 'male', 'uploads/users_files/image_1720280532788261094.jpg', 'Sunlife pharmacy', 'qatar', NULL, NULL, '2024-07-06 15:42:12', '2024-07-06 15:42:12'),
(117, 'مصطفى', 'مهند', 'm.muhand88@gmail.com', '+964 770 076 8041', NULL, 0, 0, '$2y$12$hJ5bU00sR0LqLvaz4hROnOsd/CqntNapozDPwrebSjArD2/a/V.xS', NULL, 'male', NULL, 'هالة الشفاء', 'baghdad', NULL, NULL, '2024-07-07 07:18:25', '2024-07-07 07:18:25'),
(118, 'Mohammed', 'Salim', 'mohammed.s.89@gmail.com', '+964 770 772 2253', NULL, 0, 0, '$2y$12$CwHNLXwYjaEy94C8GhFT2uVM/IXKtRPhYU3uafHq.mlxfjzTx1E/y', NULL, 'male', NULL, 'عسل العافيه', 'baghdad', NULL, NULL, '2024-07-07 07:21:42', '2024-07-07 07:21:42'),
(119, 'Ali', 'Jasem', 'ali.jasim90@gmail.com', '07707278934', NULL, 0, 0, '$2y$12$UxdNUEMTT04lCBMIX3UZJuc.qMoKKjCgQpeTUJClFCHAWgmhGFzua', NULL, 'male', NULL, 'العائله', 'baghdad', NULL, NULL, '2024-07-07 12:02:09', '2024-07-07 12:02:09'),
(120, 'Haider', 'Ahmed', 'ph.haydir878@gmail.com', '+964 771 519 27250', NULL, 0, 0, '$2y$12$5mb8pKuzvMDp7LF4hZN8oeeb4g0eDpEmBYUX2rfJo0X55/7SjakIO', NULL, 'male', NULL, 'مكه المكرمه', 'baghdad', NULL, NULL, '2024-07-07 12:03:37', '2024-07-07 12:03:37'),
(121, 'علي', 'عماد', 'ph.ali767@gmail.com', '٠٧٨٠٣٤٨٧٦٥٩', NULL, 0, 0, '$2y$12$26lROtw2rS.fUcL.CwF1uuBJSLcwLktsLk21eodgXhrA0F03u4pqK', NULL, 'male', NULL, 'النورين', 'baghdad', NULL, NULL, '2024-07-08 09:03:00', '2024-07-08 09:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `Resverations`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `match_name` varchar(255) DEFAULT NULL,
  `home_participant` varchar(255) DEFAULT NULL,
  `away_participant` varchar(50) DEFAULT NULL,
  `vote` varchar(255) DEFAULT NULL,
  `match_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Resverations`
--

INSERT INTO `votes` (`id`, `user_id`, `match_name`, `home_participant`, `away_participant`, `vote`, `match_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(22, 4, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-11 09:17:50', '2024-06-11 09:17:50'),
(23, 4, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-11 09:18:01', '2024-06-11 09:18:01'),
(24, 4, 'Spain vs Croatia', 'Spain', 'Croatia', 'Draw Spain Croatia', 19032616, NULL, '2024-06-11 09:25:19', '2024-06-11 09:25:19'),
(25, 6, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-11 10:04:47', '2024-06-11 10:04:47'),
(26, 4, 'Italy vs Albania', 'Italy', 'Albania', 'Draw Italy Albania', 19032617, NULL, '2024-06-11 11:08:44', '2024-06-11 11:08:44'),
(27, 9, 'Germany vs Scotland', 'Germany', 'Scotland', 'Scotland', 19032613, NULL, '2024-06-11 11:15:32', '2024-06-11 11:15:32'),
(28, 9, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-11 11:15:46', '2024-06-11 11:15:46'),
(29, 9, 'Spain vs Croatia', 'Spain', 'Croatia', 'Croatia', 19032616, NULL, '2024-06-11 11:17:14', '2024-06-11 11:17:14'),
(30, 10, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-11 12:16:22', '2024-06-11 12:16:22'),
(31, 10, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-11 12:18:27', '2024-06-11 12:18:27'),
(32, 11, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-11 12:33:44', '2024-06-11 12:33:44'),
(33, 12, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-11 12:38:15', '2024-06-11 12:38:15'),
(34, 12, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-11 12:38:31', '2024-06-11 12:38:31'),
(35, 12, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-11 12:38:43', '2024-06-11 12:38:43'),
(36, 12, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-11 12:38:58', '2024-06-11 12:38:58'),
(37, 14, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-11 16:42:14', '2024-06-11 16:42:14'),
(38, 6, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-11 17:16:31', '2024-06-11 17:16:31'),
(39, 14, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-12 07:32:26', '2024-06-12 07:32:26'),
(40, 6, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-12 08:27:38', '2024-06-12 08:27:38'),
(41, 1, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-12 11:56:01', '2024-06-12 11:56:01'),
(42, 1, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Hungary', 19045701, NULL, '2024-06-12 11:56:14', '2024-06-12 11:56:14'),
(43, 1, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-12 12:01:19', '2024-06-12 12:01:19'),
(44, 1, 'Italy vs Albania', 'Italy', 'Albania', 'Draw Italy Albania', 19032617, NULL, '2024-06-12 12:01:32', '2024-06-12 12:01:32'),
(45, 1, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-12 12:39:27', '2024-06-12 12:39:27'),
(46, 10, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 08:10:04', '2024-06-13 08:10:04'),
(47, 17, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 08:17:08', '2024-06-13 08:17:08'),
(48, 6, 'Italy vs Albania', 'Italy', 'Albania', 'Albania', 19032617, NULL, '2024-06-13 10:12:34', '2024-06-13 10:12:34'),
(49, 10, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 11:17:25', '2024-06-13 11:17:25'),
(50, 18, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 12:51:22', '2024-06-13 12:51:22'),
(51, 19, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 13:06:15', '2024-06-13 13:06:15'),
(52, 23, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 17:19:24', '2024-06-13 17:19:24'),
(53, 23, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 17:19:30', '2024-06-13 17:19:30'),
(54, 23, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-13 17:19:39', '2024-06-13 17:19:39'),
(55, 23, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 17:19:49', '2024-06-13 17:19:49'),
(56, 23, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 17:19:53', '2024-06-13 17:19:53'),
(57, 23, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 17:19:59', '2024-06-13 17:19:59'),
(58, 23, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 17:20:04', '2024-06-13 17:20:04'),
(59, 25, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 19:13:24', '2024-06-13 19:13:24'),
(60, 25, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Hungary', 19045701, NULL, '2024-06-13 19:13:35', '2024-06-13 19:13:35'),
(61, 25, 'Spain vs Croatia', 'Spain', 'Croatia', 'Draw Spain Croatia', 19032616, NULL, '2024-06-13 19:13:52', '2024-06-13 19:13:52'),
(62, 25, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 19:14:03', '2024-06-13 19:14:03'),
(63, 25, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 19:14:08', '2024-06-13 19:14:08'),
(64, 21, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 19:27:43', '2024-06-13 19:27:43'),
(65, 21, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-13 19:27:57', '2024-06-13 19:27:57'),
(66, 21, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 19:28:11', '2024-06-13 19:28:11'),
(67, 21, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 19:28:45', '2024-06-13 19:28:45'),
(68, 26, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 20:00:46', '2024-06-13 20:00:46'),
(69, 26, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-13 20:01:02', '2024-06-13 20:01:02'),
(70, 26, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 20:01:13', '2024-06-13 20:01:13'),
(71, 26, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 20:01:29', '2024-06-13 20:01:29'),
(72, 22, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-13 21:32:52', '2024-06-13 21:32:52'),
(73, 22, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Draw Hungary Switzerland', 19045701, NULL, '2024-06-13 21:33:05', '2024-06-13 21:33:05'),
(74, 22, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-13 21:33:16', '2024-06-13 21:33:16'),
(75, 22, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-13 21:33:25', '2024-06-13 21:33:25'),
(76, 28, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-14 01:23:10', '2024-06-14 01:23:10'),
(77, 28, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-14 01:23:34', '2024-06-14 01:23:34'),
(78, 28, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-14 01:24:30', '2024-06-14 01:24:30'),
(79, 28, 'Spain vs Croatia', 'Spain', 'Croatia', 'Draw Spain Croatia', 19032616, NULL, '2024-06-14 01:26:09', '2024-06-14 01:26:09'),
(80, 17, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Hungary', 19045701, NULL, '2024-06-14 13:10:00', '2024-06-14 13:10:00'),
(81, 17, 'Spain vs Croatia', 'Spain', 'Croatia', 'Croatia', 19032616, NULL, '2024-06-14 13:10:17', '2024-06-14 13:10:17'),
(82, 17, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-14 13:10:30', '2024-06-14 13:10:30'),
(83, 29, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-14 13:19:08', '2024-06-14 13:19:08'),
(84, 29, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-14 13:19:24', '2024-06-14 13:19:24'),
(85, 29, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-14 13:19:37', '2024-06-14 13:19:37'),
(86, 29, 'Italy vs Albania', 'Italy', 'Albania', 'Draw Italy Albania', 19032617, NULL, '2024-06-14 13:27:33', '2024-06-14 13:27:33'),
(87, 31, 'Germany vs Scotland', 'Germany', 'Scotland', 'Germany', 19032613, NULL, '2024-06-14 15:40:31', '2024-06-14 15:40:31'),
(88, 31, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-14 15:40:47', '2024-06-14 15:40:47'),
(89, 31, 'Spain vs Croatia', 'Spain', 'Croatia', 'Draw Spain Croatia', 19032616, NULL, '2024-06-14 15:40:59', '2024-06-14 15:40:59'),
(90, 31, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-14 15:41:12', '2024-06-14 15:41:12'),
(91, 18, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-14 19:28:42', '2024-06-14 19:28:42'),
(92, 18, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-14 19:28:58', '2024-06-14 19:28:58'),
(93, 18, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-14 19:29:27', '2024-06-14 19:29:27'),
(94, 21, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-14 21:30:56', '2024-06-14 21:30:56'),
(95, 21, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-14 21:31:10', '2024-06-14 21:31:10'),
(96, 21, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-14 21:31:24', '2024-06-14 21:31:24'),
(97, 17, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-14 23:31:21', '2024-06-14 23:31:21'),
(98, 17, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Draw Slovenia Denmark', 19032622, NULL, '2024-06-14 23:31:37', '2024-06-14 23:31:37'),
(99, 17, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-14 23:32:09', '2024-06-14 23:32:09'),
(100, 25, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-15 00:16:34', '2024-06-15 00:16:34'),
(101, 25, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-15 00:16:48', '2024-06-15 00:16:48'),
(102, 25, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Draw Slovenia Denmark', 19032622, NULL, '2024-06-15 00:17:01', '2024-06-15 00:17:01'),
(103, 32, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-15 01:09:37', '2024-06-15 01:09:37'),
(104, 32, 'Spain vs Croatia', 'Spain', 'Croatia', 'Spain', 19032616, NULL, '2024-06-15 01:09:55', '2024-06-15 01:09:55'),
(105, 32, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-15 01:10:08', '2024-06-15 01:10:08'),
(106, 33, 'Hungary vs Switzerland', 'Hungary', 'Switzerland', 'Switzerland', 19045701, NULL, '2024-06-15 12:27:13', '2024-06-15 12:27:13'),
(107, 33, 'Spain vs Croatia', 'Spain', 'Croatia', 'Draw Spain Croatia', 19032616, NULL, '2024-06-15 12:27:25', '2024-06-15 12:27:25'),
(108, 33, 'Italy vs Albania', 'Italy', 'Albania', 'Italy', 19032617, NULL, '2024-06-15 12:27:35', '2024-06-15 12:27:35'),
(109, 34, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-15 16:40:55', '2024-06-15 16:40:55'),
(110, 34, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-15 16:41:10', '2024-06-15 16:41:10'),
(111, 34, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-15 16:41:36', '2024-06-15 16:41:36'),
(112, 35, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-15 17:09:20', '2024-06-15 17:09:20'),
(113, 35, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-15 17:09:40', '2024-06-15 17:09:40'),
(114, 35, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-15 17:09:53', '2024-06-15 17:09:53'),
(115, 18, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-15 17:37:53', '2024-06-15 17:37:53'),
(116, 18, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-15 17:38:07', '2024-06-15 17:38:07'),
(117, 18, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-15 17:52:23', '2024-06-15 17:52:23'),
(118, 10, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Poland', 19032628, NULL, '2024-06-15 19:57:51', '2024-06-15 19:57:51'),
(119, 10, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-15 19:58:04', '2024-06-15 19:58:04'),
(120, 10, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-15 19:58:18', '2024-06-15 19:58:18'),
(121, 31, 'Poland vs Netherlands', 'Poland', 'Netherlands', 'Netherlands', 19032628, NULL, '2024-06-16 08:27:48', '2024-06-16 08:27:48'),
(122, 31, 'Slovenia vs Denmark', 'Slovenia', 'Denmark', 'Denmark', 19032622, NULL, '2024-06-16 08:27:59', '2024-06-16 08:27:59'),
(123, 31, 'Serbia vs England', 'Serbia', 'England', 'England', 19032623, NULL, '2024-06-16 08:28:09', '2024-06-16 08:28:09'),
(124, 25, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-16 15:09:53', '2024-06-16 15:09:53'),
(125, 25, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-16 15:10:03', '2024-06-16 15:10:03'),
(126, 25, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Draw Romania Ukraine', 19032635, NULL, '2024-06-16 15:10:12', '2024-06-16 15:10:12'),
(127, 10, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Romania', 19032635, NULL, '2024-06-16 18:12:16', '2024-06-16 18:12:16'),
(128, 10, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Slovakia', 19032634, NULL, '2024-06-16 18:12:33', '2024-06-16 18:12:33'),
(129, 10, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-16 18:12:45', '2024-06-16 18:12:45'),
(130, 34, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Ukraine', 19032635, NULL, '2024-06-16 20:55:06', '2024-06-16 20:55:06'),
(131, 34, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-16 20:55:19', '2024-06-16 20:55:19'),
(132, 34, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-16 20:55:30', '2024-06-16 20:55:30'),
(133, 30, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Ukraine', 19032635, NULL, '2024-06-16 21:12:00', '2024-06-16 21:12:00'),
(134, 30, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-16 21:12:21', '2024-06-16 21:12:21'),
(135, 30, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-16 21:12:34', '2024-06-16 21:12:34'),
(136, 31, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Draw Romania Ukraine', 19032635, NULL, '2024-06-17 11:02:29', '2024-06-17 11:02:29'),
(137, 31, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-17 11:02:40', '2024-06-17 11:02:40'),
(138, 31, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-17 11:02:50', '2024-06-17 11:02:50'),
(139, 18, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Ukraine', 19032635, NULL, '2024-06-17 12:41:10', '2024-06-17 12:41:10'),
(140, 18, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-17 12:41:31', '2024-06-17 12:41:31'),
(141, 18, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-17 12:41:42', '2024-06-17 12:41:42'),
(142, 21, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Draw Romania Ukraine', 19032635, NULL, '2024-06-17 12:55:06', '2024-06-17 12:55:06'),
(143, 21, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-17 12:55:16', '2024-06-17 12:55:16'),
(144, 21, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-17 12:55:25', '2024-06-17 12:55:25'),
(145, 36, 'Romania vs Ukraine', 'Romania', 'Ukraine', 'Ukraine', 19032635, NULL, '2024-06-17 15:39:36', '2024-06-17 15:39:36'),
(146, 36, 'Belgium vs Slovakia', 'Belgium', 'Slovakia', 'Belgium', 19032634, NULL, '2024-06-17 15:39:49', '2024-06-17 15:39:49'),
(147, 36, 'Austria vs France', 'Austria', 'France', 'France', 19032629, NULL, '2024-06-17 15:40:04', '2024-06-17 15:40:04'),
(148, 31, 'Croatia vs Albania', 'Croatia', 'Albania', 'Croatia', 19032618, NULL, '2024-06-18 12:06:57', '2024-06-18 12:06:57'),
(149, 31, 'Germany vs Hungary', 'Germany', 'Hungary', 'Germany', 19032614, NULL, '2024-06-18 12:07:10', '2024-06-18 12:07:10'),
(150, 31, 'Scotland vs Switzerland', 'Scotland', 'Switzerland', 'Switzerland', 19045702, NULL, '2024-06-18 12:07:38', '2024-06-18 12:07:38'),
(151, 21, 'Germany vs Hungary', 'Germany', 'Hungary', 'Germany', 19032614, NULL, '2024-06-18 16:09:39', '2024-06-18 16:09:39'),
(152, 21, 'Croatia vs Albania', 'Croatia', 'Albania', 'Croatia', 19032618, NULL, '2024-06-18 16:09:50', '2024-06-18 16:09:50'),
(153, 21, 'Scotland vs Switzerland', 'Scotland', 'Switzerland', 'Switzerland', 19045702, NULL, '2024-06-18 16:11:02', '2024-06-18 16:11:02'),
(154, 17, 'Croatia vs Albania', 'Croatia', 'Albania', 'Albania', 19032618, NULL, '2024-06-19 13:26:53', '2024-06-19 13:26:53'),
(155, 17, 'Germany vs Hungary', 'Germany', 'Hungary', 'Germany', 19032614, NULL, '2024-06-19 13:27:08', '2024-06-19 13:27:08'),
(156, 17, 'Scotland vs Switzerland', 'Scotland', 'Switzerland', 'Switzerland', 19045702, NULL, '2024-06-19 13:27:23', '2024-06-19 13:27:23'),
(157, 38, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 15:27:42', '2024-06-19 15:27:42'),
(158, 38, 'Spain vs Italy', 'Spain', 'Italy', 'Spain', 19032619, NULL, '2024-06-19 15:27:56', '2024-06-19 15:27:56'),
(159, 38, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Draw Slovenia Serbia', 19032625, NULL, '2024-06-19 15:28:10', '2024-06-19 15:28:10'),
(160, 40, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Serbia', 19032625, NULL, '2024-06-19 15:54:09', '2024-06-19 15:54:09'),
(161, 40, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 15:54:32', '2024-06-19 15:54:32'),
(162, 40, 'Spain vs Italy', 'Spain', 'Italy', 'Spain', 19032619, NULL, '2024-06-19 15:54:52', '2024-06-19 15:54:52'),
(163, 42, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Slovenia', 19032625, NULL, '2024-06-19 15:56:05', '2024-06-19 15:56:05'),
(164, 42, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 15:56:16', '2024-06-19 15:56:16'),
(165, 42, 'Spain vs Italy', 'Spain', 'Italy', 'Spain', 19032619, NULL, '2024-06-19 15:56:27', '2024-06-19 15:56:27'),
(166, 41, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Serbia', 19032625, NULL, '2024-06-19 15:56:35', '2024-06-19 15:56:35'),
(167, 41, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 15:57:00', '2024-06-19 15:57:00'),
(168, 41, 'Spain vs Italy', 'Spain', 'Italy', 'Draw Spain Italy', 19032619, NULL, '2024-06-19 15:57:14', '2024-06-19 15:57:14'),
(169, 43, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Serbia', 19032625, NULL, '2024-06-19 16:10:02', '2024-06-19 16:10:02'),
(170, 43, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 16:10:15', '2024-06-19 16:10:15'),
(171, 43, 'Spain vs Italy', 'Spain', 'Italy', 'Spain', 19032619, NULL, '2024-06-19 16:10:33', '2024-06-19 16:10:33'),
(172, 25, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 17:16:34', '2024-06-19 17:16:34'),
(173, 25, 'Spain vs Italy', 'Spain', 'Italy', 'Spain', 19032619, NULL, '2024-06-19 17:16:49', '2024-06-19 17:16:49'),
(174, 25, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Slovenia', 19032625, NULL, '2024-06-19 17:23:09', '2024-06-19 17:23:09'),
(175, 44, 'Spain vs Italy', 'Spain', 'Italy', 'Italy', 19032619, NULL, '2024-06-19 19:47:51', '2024-06-19 19:47:51'),
(176, 44, 'Denmark vs England', 'Denmark', 'England', 'Denmark', 19032624, NULL, '2024-06-19 19:48:13', '2024-06-19 19:48:13'),
(177, 44, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Slovenia', 19032625, NULL, '2024-06-19 19:48:31', '2024-06-19 19:48:31'),
(178, 45, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Serbia', 19032625, NULL, '2024-06-19 21:15:10', '2024-06-19 21:15:10'),
(179, 45, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-19 21:16:05', '2024-06-19 21:16:05'),
(180, 45, 'Spain vs Italy', 'Spain', 'Italy', 'Italy', 19032619, NULL, '2024-06-19 21:16:16', '2024-06-19 21:16:16'),
(181, 46, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Serbia', 19032625, NULL, '2024-06-20 08:37:48', '2024-06-20 08:37:48'),
(182, 46, 'Denmark vs England', 'Denmark', 'England', 'Denmark', 19032624, NULL, '2024-06-20 08:38:02', '2024-06-20 08:38:02'),
(183, 46, 'Spain vs Italy', 'Spain', 'Italy', 'Italy', 19032619, NULL, '2024-06-20 08:38:23', '2024-06-20 08:38:23'),
(184, 21, 'Slovenia vs Serbia', 'Slovenia', 'Serbia', 'Draw Slovenia Serbia', 19032625, NULL, '2024-06-20 13:45:22', '2024-06-20 13:45:22'),
(185, 21, 'Denmark vs England', 'Denmark', 'England', 'England', 19032624, NULL, '2024-06-20 13:45:35', '2024-06-20 13:45:35'),
(186, 21, 'Spain vs Italy', 'Spain', 'Italy', 'Draw Spain Italy', 19032619, NULL, '2024-06-20 13:45:50', '2024-06-20 13:45:50'),
(187, 38, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Ukraine', 19032636, NULL, '2024-06-20 15:12:37', '2024-06-20 15:12:37'),
(188, 38, 'Poland vs Austria', 'Poland', 'Austria', 'Austria', 19032630, NULL, '2024-06-20 15:12:51', '2024-06-20 15:12:51'),
(189, 38, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-20 15:13:04', '2024-06-20 15:13:04'),
(190, 44, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Ukraine', 19032636, NULL, '2024-06-20 15:31:49', '2024-06-20 15:31:49'),
(191, 44, 'Poland vs Austria', 'Poland', 'Austria', 'Poland', 19032630, NULL, '2024-06-20 15:32:03', '2024-06-20 15:32:03'),
(192, 44, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-20 15:32:22', '2024-06-20 15:32:22'),
(193, 6, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-20 20:24:32', '2024-06-20 20:24:32'),
(194, 6, 'Poland vs Austria', 'Poland', 'Austria', 'Poland', 19032630, NULL, '2024-06-20 20:24:50', '2024-06-20 20:24:50'),
(195, 40, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Draw Slovakia Ukraine', 19032636, NULL, '2024-06-20 21:05:25', '2024-06-20 21:05:25'),
(196, 40, 'Poland vs Austria', 'Poland', 'Austria', 'Poland', 19032630, NULL, '2024-06-20 21:05:40', '2024-06-20 21:05:40'),
(197, 40, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-20 21:05:53', '2024-06-20 21:05:53'),
(198, 25, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Slovakia', 19032636, NULL, '2024-06-20 21:38:06', '2024-06-20 21:38:06'),
(199, 25, 'Poland vs Austria', 'Poland', 'Austria', 'Austria', 19032630, NULL, '2024-06-20 21:38:18', '2024-06-20 21:38:18'),
(200, 25, 'Netherlands vs France', 'Netherlands', 'France', 'Draw Netherlands France', 19032631, NULL, '2024-06-20 21:38:30', '2024-06-20 21:38:30'),
(201, 10, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Draw Slovakia Ukraine', 19032636, NULL, '2024-06-20 22:17:52', '2024-06-20 22:17:52'),
(202, 10, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Draw Slovakia Ukraine', 19032636, NULL, '2024-06-20 22:17:52', '2024-06-20 22:17:52'),
(203, 10, 'Poland vs Austria', 'Poland', 'Austria', 'Austria', 19032630, NULL, '2024-06-20 22:18:08', '2024-06-20 22:18:08'),
(204, 10, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-20 22:18:24', '2024-06-20 22:18:24'),
(205, 21, 'Slovakia vs Ukraine', 'Slovakia', 'Ukraine', 'Ukraine', 19032636, NULL, '2024-06-21 12:46:36', '2024-06-21 12:46:36'),
(206, 21, 'Poland vs Austria', 'Poland', 'Austria', 'Draw Poland Austria', 19032630, NULL, '2024-06-21 12:47:04', '2024-06-21 12:47:04'),
(207, 21, 'Netherlands vs France', 'Netherlands', 'France', 'France', 19032631, NULL, '2024-06-21 12:47:19', '2024-06-21 12:47:19'),
(208, 21, 'Belgium vs Romania', 'Belgium', 'Romania', 'Belgium', 19032637, NULL, '2024-06-21 16:26:04', '2024-06-21 16:26:04'),
(209, 21, 'Turkey vs Portugal', 'Turkey', 'Portugal', 'Portugal', 19032643, NULL, '2024-06-21 16:26:19', '2024-06-21 16:26:19'),
(210, 21, 'Georgia vs Czech Republic', 'Georgia', 'Czech Republic', 'Czech Republic', 19032642, NULL, '2024-06-21 16:26:34', '2024-06-21 16:26:34'),
(211, 25, 'Turkey vs Portugal', 'Turkey', 'Portugal', 'Portugal', 19032643, NULL, '2024-06-21 20:39:22', '2024-06-21 20:39:22'),
(212, 25, 'Belgium vs Romania', 'Belgium', 'Romania', 'Belgium', 19032637, NULL, '2024-06-21 20:39:34', '2024-06-21 20:39:34'),
(213, 25, 'Georgia vs Czech Republic', 'Georgia', 'Czech Republic', 'Czech Republic', 19032642, NULL, '2024-06-21 20:39:52', '2024-06-21 20:39:52'),
(214, 47, 'Belgium vs Romania', 'Belgium', 'Romania', 'Belgium', 19032637, NULL, '2024-06-21 22:33:06', '2024-06-21 22:33:06'),
(215, 49, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Switzerland', 19032615, NULL, '2024-06-22 08:17:17', '2024-06-22 08:17:17'),
(216, 49, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 08:17:30', '2024-06-22 08:17:30'),
(217, 50, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Switzerland', 19032615, NULL, '2024-06-22 08:20:44', '2024-06-22 08:20:44'),
(218, 50, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 08:21:02', '2024-06-22 08:21:02'),
(219, 52, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 08:42:11', '2024-06-22 08:42:11'),
(220, 52, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 08:42:25', '2024-06-22 08:42:25'),
(221, 54, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 09:05:54', '2024-06-22 09:05:54'),
(222, 54, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 09:06:07', '2024-06-22 09:06:07'),
(223, 56, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 09:24:05', '2024-06-22 09:24:05'),
(224, 56, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 09:24:18', '2024-06-22 09:24:18'),
(225, 40, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 12:54:03', '2024-06-22 12:54:03'),
(226, 40, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 12:54:20', '2024-06-22 12:54:20'),
(227, 17, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 13:42:22', '2024-06-22 13:42:22'),
(228, 17, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 13:42:41', '2024-06-22 13:42:41'),
(229, 21, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 14:53:50', '2024-06-22 14:53:50'),
(230, 21, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 14:54:58', '2024-06-22 14:54:58'),
(231, 58, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 16:31:27', '2024-06-22 16:31:27'),
(232, 58, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Draw Scotland Hungary', 19045703, NULL, '2024-06-22 16:32:17', '2024-06-22 16:32:17'),
(233, 44, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 16:59:27', '2024-06-22 16:59:27'),
(234, 44, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 16:59:57', '2024-06-22 16:59:57'),
(235, 59, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 17:40:06', '2024-06-22 17:40:06'),
(236, 59, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 17:40:22', '2024-06-22 17:40:22'),
(237, 60, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 17:42:39', '2024-06-22 17:42:39'),
(238, 60, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 17:42:55', '2024-06-22 17:42:55'),
(239, 25, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 17:55:44', '2024-06-22 17:55:44'),
(240, 25, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Draw Scotland Hungary', 19045703, NULL, '2024-06-22 17:59:41', '2024-06-22 17:59:41'),
(241, 61, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 18:00:10', '2024-06-22 18:00:10'),
(242, 61, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Scotland', 19045703, NULL, '2024-06-22 18:00:28', '2024-06-22 18:00:28'),
(243, 10, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Switzerland', 19032615, NULL, '2024-06-22 18:28:27', '2024-06-22 18:28:27'),
(244, 64, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 18:37:58', '2024-06-22 18:37:58'),
(245, 64, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 18:38:32', '2024-06-22 18:38:32'),
(246, 65, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 18:45:17', '2024-06-22 18:45:17'),
(247, 65, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Hungary', 19045703, NULL, '2024-06-22 18:45:31', '2024-06-22 18:45:31'),
(248, 66, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 22:30:00', '2024-06-22 22:30:00'),
(249, 63, 'Switzerland vs Germany', 'Switzerland', 'Germany', 'Germany', 19032615, NULL, '2024-06-22 22:42:20', '2024-06-22 22:42:20'),
(250, 63, 'Scotland vs Hungary', 'Scotland', 'Hungary', 'Draw Scotland Hungary', 19045703, NULL, '2024-06-22 22:42:34', '2024-06-22 22:42:34'),
(251, 25, 'Croatia vs Italy', 'Croatia', 'Italy', 'Draw Croatia Italy', 19032620, NULL, '2024-06-23 00:53:53', '2024-06-23 00:53:53'),
(252, 25, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 00:54:02', '2024-06-23 00:54:02'),
(253, 52, 'Croatia vs Italy', 'Croatia', 'Italy', 'Italy', 19032620, NULL, '2024-06-23 04:46:43', '2024-06-23 04:46:43'),
(254, 52, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 04:46:54', '2024-06-23 04:46:54'),
(255, 38, 'Croatia vs Italy', 'Croatia', 'Italy', 'Italy', 19032620, NULL, '2024-06-23 15:42:27', '2024-06-23 15:42:27'),
(256, 38, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 15:42:39', '2024-06-23 15:42:39'),
(257, 68, 'Croatia vs Italy', 'Croatia', 'Italy', 'Italy', 19032620, NULL, '2024-06-23 15:43:25', '2024-06-23 15:43:25'),
(258, 68, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 15:43:41', '2024-06-23 15:43:41'),
(259, 10, 'Croatia vs Italy', 'Croatia', 'Italy', 'Croatia', 19032620, NULL, '2024-06-23 17:28:15', '2024-06-23 17:28:15'),
(260, 69, 'Croatia vs Italy', 'Croatia', 'Italy', 'Croatia', 19032620, NULL, '2024-06-23 17:34:38', '2024-06-23 17:34:38'),
(261, 69, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 17:34:48', '2024-06-23 17:34:48'),
(262, 70, 'Croatia vs Italy', 'Croatia', 'Italy', 'Draw Croatia Italy', 19032620, NULL, '2024-06-23 17:39:14', '2024-06-23 17:39:14'),
(263, 70, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 17:39:34', '2024-06-23 17:39:34'),
(264, 71, 'Croatia vs Italy', 'Croatia', 'Italy', 'Croatia', 19032620, NULL, '2024-06-23 18:01:29', '2024-06-23 18:01:29'),
(265, 71, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 18:01:45', '2024-06-23 18:01:45'),
(266, 21, 'Croatia vs Italy', 'Croatia', 'Italy', 'Italy', 19032620, NULL, '2024-06-23 20:10:41', '2024-06-23 20:10:41'),
(267, 21, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 20:10:55', '2024-06-23 20:10:55'),
(268, 10, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 20:20:57', '2024-06-23 20:20:57'),
(269, 65, 'Croatia vs Italy', 'Croatia', 'Italy', 'Croatia', 19032620, NULL, '2024-06-23 22:00:08', '2024-06-23 22:00:08'),
(270, 65, 'Albania vs Spain', 'Albania', 'Spain', 'Spain', 19032621, NULL, '2024-06-23 22:00:21', '2024-06-23 22:00:21'),
(271, 63, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 00:07:17', '2024-06-24 00:07:17'),
(272, 63, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 00:07:29', '2024-06-24 00:07:29'),
(273, 63, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 00:07:42', '2024-06-24 00:07:42'),
(274, 63, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 00:07:57', '2024-06-24 00:07:57'),
(275, 73, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 00:32:54', '2024-06-24 00:32:54'),
(276, 73, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 00:33:12', '2024-06-24 00:33:12'),
(277, 73, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 00:33:24', '2024-06-24 00:33:24'),
(278, 73, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 00:33:36', '2024-06-24 00:33:36'),
(279, 74, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 08:24:17', '2024-06-24 08:24:17'),
(280, 74, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 08:24:23', '2024-06-24 08:24:23'),
(281, 74, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 08:24:29', '2024-06-24 08:24:29'),
(282, 74, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 08:50:27', '2024-06-24 08:50:27'),
(283, 17, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 10:44:30', '2024-06-24 10:44:30'),
(284, 17, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 10:45:34', '2024-06-24 10:45:34'),
(285, 17, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 10:45:34', '2024-06-24 10:45:34'),
(286, 17, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 10:46:00', '2024-06-24 10:46:00'),
(287, 17, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Serbia', 19032627, NULL, '2024-06-24 10:46:11', '2024-06-24 10:46:11'),
(288, 75, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 13:49:21', '2024-06-24 13:49:21'),
(289, 75, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 13:49:39', '2024-06-24 13:49:39'),
(290, 75, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 13:50:02', '2024-06-24 13:50:02'),
(291, 75, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Draw Denmark Serbia', 19032627, NULL, '2024-06-24 13:50:17', '2024-06-24 13:50:17'),
(292, 68, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 13:58:47', '2024-06-24 13:58:47'),
(293, 68, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 13:59:01', '2024-06-24 13:59:01'),
(294, 68, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 13:59:17', '2024-06-24 13:59:17'),
(295, 68, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Draw Denmark Serbia', 19032627, NULL, '2024-06-24 13:59:33', '2024-06-24 13:59:33'),
(296, 76, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 14:11:55', '2024-06-24 14:11:55'),
(297, 76, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 14:12:18', '2024-06-24 14:12:18'),
(298, 76, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 14:12:32', '2024-06-24 14:12:32'),
(299, 76, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 14:12:46', '2024-06-24 14:12:46'),
(300, 77, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 16:04:28', '2024-06-24 16:04:28'),
(301, 77, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 16:04:28', '2024-06-24 16:04:28'),
(302, 77, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 16:04:40', '2024-06-24 16:04:40'),
(303, 77, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 16:05:13', '2024-06-24 16:05:13'),
(304, 77, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Serbia', 19032627, NULL, '2024-06-24 16:05:28', '2024-06-24 16:05:28'),
(305, 79, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 18:13:16', '2024-06-24 18:13:16'),
(306, 79, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 18:13:57', '2024-06-24 18:13:57'),
(307, 79, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 18:14:26', '2024-06-24 18:14:26'),
(308, 79, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 18:14:43', '2024-06-24 18:14:43'),
(309, 21, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Netherlands', 19032632, NULL, '2024-06-24 21:02:15', '2024-06-24 21:02:15'),
(310, 21, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 21:02:28', '2024-06-24 21:02:28'),
(311, 21, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Denmark', 19032627, NULL, '2024-06-24 21:02:40', '2024-06-24 21:02:40'),
(312, 21, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 21:02:45', '2024-06-24 21:02:45'),
(313, 25, 'Netherlands vs Austria', 'Netherlands', 'Austria', 'Austria', 19032632, NULL, '2024-06-24 23:51:22', '2024-06-24 23:51:22'),
(314, 25, 'France vs Poland', 'France', 'Poland', 'France', 19032633, NULL, '2024-06-24 23:51:32', '2024-06-24 23:51:32'),
(315, 25, 'England vs Slovenia', 'England', 'Slovenia', 'England', 19032626, NULL, '2024-06-24 23:51:38', '2024-06-24 23:51:38'),
(316, 25, 'Denmark vs Serbia', 'Denmark', 'Serbia', 'Draw Denmark Serbia', 19032627, NULL, '2024-06-24 23:51:46', '2024-06-24 23:51:46'),
(317, 75, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Draw Slovakia Romania', 19032638, NULL, '2024-06-25 07:00:50', '2024-06-25 07:00:50'),
(318, 75, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Draw Ukraine Belgium', 19032639, NULL, '2024-06-25 07:01:04', '2024-06-25 07:01:04'),
(319, 75, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Draw Czech Republic Turkey', 19032644, NULL, '2024-06-25 07:01:19', '2024-06-25 07:01:19'),
(320, 75, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 07:01:38', '2024-06-25 07:01:38'),
(321, 74, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 07:14:44', '2024-06-25 07:14:44'),
(322, 74, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 07:14:55', '2024-06-25 07:14:55'),
(323, 74, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 07:32:00', '2024-06-25 07:32:00'),
(324, 74, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-25 07:32:12', '2024-06-25 07:32:12'),
(325, 80, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Czech Republic', 19032644, NULL, '2024-06-25 08:26:35', '2024-06-25 08:26:35'),
(326, 80, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 08:26:56', '2024-06-25 08:26:56'),
(327, 80, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 08:27:11', '2024-06-25 08:27:11'),
(328, 80, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-25 08:27:28', '2024-06-25 08:27:28'),
(329, 4, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-25 10:47:23', '2024-06-25 10:47:23'),
(330, 4, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Ukraine', 19032639, NULL, '2024-06-25 10:47:41', '2024-06-25 10:47:41'),
(331, 4, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Draw Czech Republic Turkey', 19032644, NULL, '2024-06-25 10:47:53', '2024-06-25 10:47:53'),
(332, 4, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 10:48:06', '2024-06-25 10:48:06'),
(333, 81, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-25 11:21:16', '2024-06-25 11:21:16'),
(334, 81, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 11:21:28', '2024-06-25 11:21:28'),
(335, 81, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 11:22:13', '2024-06-25 11:22:13'),
(336, 81, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 11:22:42', '2024-06-25 11:22:42'),
(337, 82, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-25 13:01:20', '2024-06-25 13:01:20'),
(338, 82, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 13:01:44', '2024-06-25 13:01:44'),
(339, 82, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 13:02:01', '2024-06-25 13:02:01'),
(340, 82, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 13:02:15', '2024-06-25 13:02:15'),
(341, 83, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-25 14:59:32', '2024-06-25 14:59:32'),
(342, 83, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 14:59:47', '2024-06-25 14:59:47'),
(343, 83, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 15:00:25', '2024-06-25 15:00:25'),
(344, 83, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 15:00:58', '2024-06-25 15:00:58'),
(345, 84, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-25 15:14:24', '2024-06-25 15:14:24'),
(346, 84, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 15:14:36', '2024-06-25 15:14:36'),
(347, 84, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 15:14:57', '2024-06-25 15:14:57'),
(348, 85, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-25 17:09:33', '2024-06-25 17:09:33'),
(349, 85, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Ukraine', 19032639, NULL, '2024-06-25 17:09:52', '2024-06-25 17:09:52'),
(350, 85, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 17:10:07', '2024-06-25 17:10:07'),
(351, 85, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Draw Georgia Portugal', 19032645, NULL, '2024-06-25 17:10:23', '2024-06-25 17:10:23'),
(352, 65, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-25 17:58:00', '2024-06-25 17:58:00'),
(353, 65, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 17:58:14', '2024-06-25 17:58:14'),
(354, 65, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-25 17:58:25', '2024-06-25 17:58:25'),
(355, 65, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 17:58:37', '2024-06-25 17:58:37'),
(356, 79, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-25 18:04:05', '2024-06-25 18:04:05'),
(357, 79, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Czech Republic', 19032644, NULL, '2024-06-25 18:04:50', '2024-06-25 18:04:50'),
(358, 79, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-25 18:05:06', '2024-06-25 18:05:06'),
(359, 79, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Draw Slovakia Romania', 19032638, NULL, '2024-06-25 18:05:28', '2024-06-25 18:05:28'),
(360, 89, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-26 11:07:20', '2024-06-26 11:07:20'),
(361, 89, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-26 11:07:35', '2024-06-26 11:07:35'),
(362, 89, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Draw Czech Republic Turkey', 19032644, NULL, '2024-06-26 11:07:51', '2024-06-26 11:07:51'),
(363, 89, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-26 11:08:04', '2024-06-26 11:08:04'),
(364, 91, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Draw Slovakia Romania', 19032638, NULL, '2024-06-26 13:59:00', '2024-06-26 13:59:00'),
(365, 91, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-26 13:59:10', '2024-06-26 13:59:10'),
(366, 91, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Draw Czech Republic Turkey', 19032644, NULL, '2024-06-26 13:59:30', '2024-06-26 13:59:30'),
(367, 91, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-26 13:59:40', '2024-06-26 13:59:40'),
(368, 92, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-26 14:50:20', '2024-06-26 14:50:20'),
(369, 92, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-26 14:50:27', '2024-06-26 14:50:27'),
(370, 92, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-26 14:52:42', '2024-06-26 14:52:42'),
(371, 92, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-26 14:53:50', '2024-06-26 14:53:50'),
(372, 92, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-26 14:54:07', '2024-06-26 14:54:07'),
(373, 21, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Romania', 19032638, NULL, '2024-06-26 15:54:38', '2024-06-26 15:54:38'),
(374, 21, 'Ukraine vs Belgium', 'Ukraine', 'Belgium', 'Belgium', 19032639, NULL, '2024-06-26 15:54:49', '2024-06-26 15:54:49'),
(375, 21, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Draw Czech Republic Turkey', 19032644, NULL, '2024-06-26 15:55:04', '2024-06-26 15:55:04'),
(376, 21, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Portugal', 19032645, NULL, '2024-06-26 15:55:09', '2024-06-26 15:55:09'),
(377, 6, 'Czech Republic vs Turkey', 'Czech Republic', 'Turkey', 'Turkey', 19032644, NULL, '2024-06-26 19:50:17', '2024-06-26 19:50:17'),
(378, 6, 'Georgia vs Portugal', 'Georgia', 'Portugal', 'Draw Georgia Portugal', 19032645, NULL, '2024-06-26 19:51:53', '2024-06-26 19:51:53'),
(379, 93, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-26 20:10:09', '2024-06-26 20:10:09'),
(380, 93, 'Slovakia vs Romania', 'Slovakia', 'Romania', 'Slovakia', 19032638, NULL, '2024-06-26 20:10:10', '2024-06-26 20:10:10'),
(381, 94, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Italy', 19032606, NULL, '2024-06-26 20:48:16', '2024-06-26 20:48:16'),
(382, 94, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-26 20:48:31', '2024-06-26 20:48:31'),
(383, 25, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-26 20:58:42', '2024-06-26 20:58:42'),
(384, 25, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Italy', 19032606, NULL, '2024-06-26 20:58:47', '2024-06-26 20:58:47'),
(385, 96, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Switzerland', 19032606, NULL, '2024-06-26 21:29:35', '2024-06-26 21:29:35'),
(386, 96, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-26 21:29:54', '2024-06-26 21:29:54'),
(387, 93, 'Germany vs Denmark', 'Germany', 'Denmark', 'Denmark', 19032605, NULL, '2024-06-27 21:35:01', '2024-06-27 21:35:01'),
(388, 93, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Italy', 19032606, NULL, '2024-06-27 21:35:14', '2024-06-27 21:35:14'),
(389, 68, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Draw Switzerland Italy', 19032606, NULL, '2024-06-28 08:09:37', '2024-06-28 08:09:37'),
(390, 68, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-28 08:09:50', '2024-06-28 08:09:50'),
(391, 79, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Draw Switzerland Italy', 19032606, NULL, '2024-06-28 18:01:16', '2024-06-28 18:01:16'),
(392, 79, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-28 18:01:26', '2024-06-28 18:01:26'),
(393, 82, 'Switzerland vs Italy', 'Switzerland', 'Italy', 'Switzerland', 19032606, NULL, '2024-06-28 20:11:55', '2024-06-28 20:11:55'),
(394, 82, 'Germany vs Denmark', 'Germany', 'Denmark', 'Germany', 19032605, NULL, '2024-06-28 20:12:10', '2024-06-28 20:12:10'),
(395, 98, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 11:51:39', '2024-06-29 11:51:39'),
(396, 98, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 11:51:51', '2024-06-29 11:51:51'),
(397, 99, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 14:15:18', '2024-06-29 14:15:18'),
(398, 99, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 14:15:49', '2024-06-29 14:15:49'),
(399, 21, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 17:13:32', '2024-06-29 17:13:32'),
(400, 21, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 17:13:37', '2024-06-29 17:13:37'),
(401, 100, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 17:46:10', '2024-06-29 17:46:10'),
(402, 100, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 17:46:21', '2024-06-29 17:46:21'),
(403, 101, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 17:48:14', '2024-06-29 17:48:14'),
(404, 101, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 17:48:41', '2024-06-29 17:48:41'),
(405, 25, 'England vs Slovakia', 'England', 'Slovakia', 'Draw England Slovakia', 19032608, NULL, '2024-06-29 20:36:10', '2024-06-29 20:36:10'),
(406, 25, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 20:36:20', '2024-06-29 20:36:20'),
(407, 17, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-29 21:18:28', '2024-06-29 21:18:28');
INSERT INTO `votes` (`id`, `user_id`, `match_name`, `home_participant`, `away_participant`, `vote`, `match_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(408, 17, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-29 21:18:39', '2024-06-29 21:18:39'),
(409, 82, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-30 01:49:09', '2024-06-30 01:49:09'),
(410, 82, 'Spain vs Georgia', 'Spain', 'Georgia', 'Spain', 19032607, NULL, '2024-06-30 01:49:22', '2024-06-30 01:49:22'),
(411, 102, 'England vs Slovakia', 'England', 'Slovakia', 'England', 19032608, NULL, '2024-06-30 11:57:35', '2024-06-30 11:57:35'),
(412, 102, 'Spain vs Georgia', 'Spain', 'Georgia', 'Georgia', 19032607, NULL, '2024-06-30 12:00:05', '2024-06-30 12:00:05'),
(413, 81, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 14:34:03', '2024-06-30 14:34:03'),
(414, 81, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 14:34:42', '2024-06-30 14:34:42'),
(415, 83, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 14:47:07', '2024-06-30 14:47:07'),
(416, 83, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 14:47:22', '2024-06-30 14:47:22'),
(417, 21, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 16:28:31', '2024-06-30 16:28:31'),
(418, 21, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 16:28:40', '2024-06-30 16:28:40'),
(419, 6, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 17:25:52', '2024-06-30 17:25:52'),
(420, 6, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 17:26:03', '2024-06-30 17:26:03'),
(421, 25, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 18:25:34', '2024-06-30 18:25:34'),
(422, 25, 'France vs Belgium', 'France', 'Belgium', 'Draw France Belgium', 19032610, NULL, '2024-06-30 18:25:49', '2024-06-30 18:25:49'),
(423, 10, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 18:39:59', '2024-06-30 18:39:59'),
(424, 10, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 18:40:13', '2024-06-30 18:40:13'),
(425, 79, 'France vs Belgium', 'France', 'Belgium', 'Draw France Belgium', 19032610, NULL, '2024-06-30 20:15:20', '2024-06-30 20:15:20'),
(426, 79, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 20:18:59', '2024-06-30 20:18:59'),
(427, 82, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-06-30 21:02:38', '2024-06-30 21:02:38'),
(428, 82, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-06-30 21:02:56', '2024-06-30 21:02:56'),
(429, 100, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 07:41:28', '2024-07-01 07:41:28'),
(430, 100, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 07:41:39', '2024-07-01 07:41:39'),
(431, 102, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 12:38:37', '2024-07-01 12:38:37'),
(432, 102, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 12:38:49', '2024-07-01 12:38:49'),
(433, 103, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 15:50:10', '2024-07-01 15:50:10'),
(434, 103, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 15:50:26', '2024-07-01 15:50:26'),
(435, 104, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 15:50:52', '2024-07-01 15:50:52'),
(436, 104, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 15:51:05', '2024-07-01 15:51:05'),
(437, 105, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 15:55:03', '2024-07-01 15:55:03'),
(438, 105, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 15:55:18', '2024-07-01 15:55:18'),
(439, 108, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 16:20:41', '2024-07-01 16:20:41'),
(440, 108, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 16:20:53', '2024-07-01 16:20:53'),
(441, 110, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Portugal', 19032609, NULL, '2024-07-01 17:16:53', '2024-07-01 17:16:53'),
(442, 110, 'France vs Belgium', 'France', 'Belgium', 'France', 19032610, NULL, '2024-07-01 17:17:05', '2024-07-01 17:17:05'),
(443, 109, 'France vs Belgium', 'France', 'Belgium', 'Draw France Belgium', 19032610, NULL, '2024-07-01 17:28:59', '2024-07-01 17:28:59'),
(444, 109, 'Portugal vs Slovenia', 'Portugal', 'Slovenia', 'Slovenia', 19032609, NULL, '2024-07-01 17:29:17', '2024-07-01 17:29:17'),
(445, 21, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-01 21:47:19', '2024-07-01 21:47:19'),
(446, 21, 'Austria vs Turkey', 'Austria', 'Turkey', 'Austria', 19032612, NULL, '2024-07-01 21:47:30', '2024-07-01 21:47:30'),
(447, 82, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-01 21:51:51', '2024-07-01 21:51:51'),
(448, 82, 'Austria vs Turkey', 'Austria', 'Turkey', 'Austria', 19032612, NULL, '2024-07-01 21:52:07', '2024-07-01 21:52:07'),
(449, 17, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-01 23:46:10', '2024-07-01 23:46:10'),
(450, 17, 'Austria vs Turkey', 'Austria', 'Turkey', 'Turkey', 19032612, NULL, '2024-07-01 23:46:22', '2024-07-01 23:46:22'),
(451, 63, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 01:50:44', '2024-07-02 01:50:44'),
(452, 63, 'Austria vs Turkey', 'Austria', 'Turkey', 'Turkey', 19032612, NULL, '2024-07-02 01:50:55', '2024-07-02 01:50:55'),
(453, 112, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 12:41:28', '2024-07-02 12:41:28'),
(454, 112, 'Austria vs Turkey', 'Austria', 'Turkey', 'Turkey', 19032612, NULL, '2024-07-02 12:41:41', '2024-07-02 12:41:41'),
(455, 68, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 13:58:29', '2024-07-02 13:58:29'),
(456, 68, 'Austria vs Turkey', 'Austria', 'Turkey', 'Draw Austria Turkey', 19032612, NULL, '2024-07-02 13:58:41', '2024-07-02 13:58:41'),
(457, 100, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 14:50:16', '2024-07-02 14:50:16'),
(458, 100, 'Austria vs Turkey', 'Austria', 'Turkey', 'Turkey', 19032612, NULL, '2024-07-02 14:50:26', '2024-07-02 14:50:26'),
(459, 102, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 14:51:28', '2024-07-02 14:51:28'),
(460, 102, 'Austria vs Turkey', 'Austria', 'Turkey', 'Turkey', 19032612, NULL, '2024-07-02 14:52:05', '2024-07-02 14:52:05'),
(461, 81, 'Romania vs Netherlands', 'Romania', 'Netherlands', 'Netherlands', 19032611, NULL, '2024-07-02 15:15:41', '2024-07-02 15:15:41'),
(462, 81, 'Austria vs Turkey', 'Austria', 'Turkey', 'Draw Austria Turkey', 19032612, NULL, '2024-07-02 15:15:54', '2024-07-02 15:15:54'),
(463, 93, 'Spain vs Germany', 'Spain', 'Germany', 'Germany', 19032601, NULL, '2024-07-02 17:45:09', '2024-07-02 17:45:09'),
(464, 93, 'Portugal vs France', 'Portugal', 'France', 'Portugal', 19032602, NULL, '2024-07-02 17:45:24', '2024-07-02 17:45:24'),
(465, 6, 'Spain vs Germany', 'Spain', 'Germany', 'Germany', 19032601, NULL, '2024-07-02 19:47:39', '2024-07-02 19:47:39'),
(466, 6, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-02 19:47:48', '2024-07-02 19:47:48'),
(467, 21, 'Spain vs Germany', 'Spain', 'Germany', 'Germany', 19032601, NULL, '2024-07-02 20:19:17', '2024-07-02 20:19:17'),
(468, 21, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-02 20:19:29', '2024-07-02 20:19:29'),
(469, 17, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-03 12:35:30', '2024-07-03 12:35:30'),
(470, 17, 'Portugal vs France', 'Portugal', 'France', 'Portugal', 19032602, NULL, '2024-07-03 12:35:42', '2024-07-03 12:35:42'),
(471, 52, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-03 14:14:48', '2024-07-03 14:14:48'),
(472, 52, 'Portugal vs France', 'Portugal', 'France', 'Portugal', 19032602, NULL, '2024-07-03 14:15:01', '2024-07-03 14:15:01'),
(473, 25, 'Spain vs Germany', 'Spain', 'Germany', 'Germany', 19032601, NULL, '2024-07-04 05:36:28', '2024-07-04 05:36:28'),
(474, 25, 'Portugal vs France', 'Portugal', 'France', 'Portugal', 19032602, NULL, '2024-07-04 05:38:18', '2024-07-04 05:38:18'),
(475, 100, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-04 08:14:12', '2024-07-04 08:14:12'),
(476, 100, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-04 08:14:24', '2024-07-04 08:14:24'),
(477, 81, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-04 17:10:07', '2024-07-04 17:10:07'),
(478, 81, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-04 17:10:07', '2024-07-04 17:10:07'),
(479, 81, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-04 17:10:07', '2024-07-04 17:10:07'),
(480, 81, 'Spain vs Germany', 'Spain', 'Germany', 'Draw Spain Germany', 19032601, NULL, '2024-07-04 17:10:20', '2024-07-04 17:10:20'),
(481, 102, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-05 01:48:01', '2024-07-05 01:48:01'),
(482, 102, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-05 01:48:13', '2024-07-05 01:48:13'),
(483, 115, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-05 10:54:09', '2024-07-05 10:54:09'),
(484, 115, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-05 10:54:27', '2024-07-05 10:54:27'),
(485, 79, 'Spain vs Germany', 'Spain', 'Germany', 'Spain', 19032601, NULL, '2024-07-05 13:16:14', '2024-07-05 13:16:14'),
(486, 79, 'Portugal vs France', 'Portugal', 'France', 'France', 19032602, NULL, '2024-07-05 13:16:28', '2024-07-05 13:16:28'),
(487, 21, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-05 17:11:26', '2024-07-05 17:11:26'),
(488, 21, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-05 17:11:39', '2024-07-05 17:11:39'),
(489, 6, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-05 17:35:00', '2024-07-05 17:35:00'),
(490, 6, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-05 17:35:11', '2024-07-05 17:35:11'),
(491, 25, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-05 21:31:47', '2024-07-05 21:31:47'),
(492, 25, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Turkey', 19032603, NULL, '2024-07-05 21:31:59', '2024-07-05 21:31:59'),
(493, 102, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-06 01:35:59', '2024-07-06 01:35:59'),
(494, 102, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 01:36:12', '2024-07-06 01:36:12'),
(495, 100, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-06 05:37:12', '2024-07-06 05:37:12'),
(496, 100, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 05:37:23', '2024-07-06 05:37:23'),
(497, 52, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-06 07:01:47', '2024-07-06 07:01:47'),
(498, 52, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Draw Netherlands Turkey', 19032603, NULL, '2024-07-06 07:02:04', '2024-07-06 07:02:04'),
(499, 79, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-06 10:18:30', '2024-07-06 10:18:30'),
(500, 79, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 10:18:43', '2024-07-06 10:18:43'),
(501, 82, 'England vs Switzerland', 'England', 'Switzerland', 'Switzerland', 19032604, NULL, '2024-07-06 11:06:50', '2024-07-06 11:06:50'),
(502, 82, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 11:07:10', '2024-07-06 11:07:10'),
(503, 81, 'England vs Switzerland', 'England', 'Switzerland', 'Switzerland', 19032604, NULL, '2024-07-06 14:20:39', '2024-07-06 14:20:39'),
(504, 81, 'England vs Switzerland', 'England', 'Switzerland', 'Switzerland', 19032604, NULL, '2024-07-06 14:20:39', '2024-07-06 14:20:39'),
(505, 81, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Draw Netherlands Turkey', 19032603, NULL, '2024-07-06 14:21:02', '2024-07-06 14:21:02'),
(506, 116, 'England vs Switzerland', 'England', 'Switzerland', 'England', 19032604, NULL, '2024-07-06 15:44:02', '2024-07-06 15:44:02'),
(507, 116, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 15:44:20', '2024-07-06 15:44:20'),
(508, 17, 'England vs Switzerland', 'England', 'Switzerland', 'Switzerland', 19032604, NULL, '2024-07-06 18:35:22', '2024-07-06 18:35:22'),
(509, 17, 'Netherlands vs Turkey', 'Netherlands', 'Turkey', 'Netherlands', 19032603, NULL, '2024-07-06 18:35:40', '2024-07-06 18:35:40'),
(510, 21, 'Spain vs France', 'Spain', 'France', 'France', 19032599, NULL, '2024-07-07 01:53:26', '2024-07-07 01:53:26'),
(511, 117, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-07 07:19:00', '2024-07-07 07:19:00'),
(512, 100, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-07 07:21:04', '2024-07-07 07:21:04'),
(513, 118, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-07 07:22:24', '2024-07-07 07:22:24'),
(514, 6, 'Spain vs France', 'Spain', 'France', 'France', 19032599, NULL, '2024-07-07 08:11:29', '2024-07-07 08:11:29'),
(515, 79, 'Spain vs France', 'Spain', 'France', 'France', 19032599, NULL, '2024-07-07 08:27:36', '2024-07-07 08:27:36'),
(516, 23, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-07 17:41:18', '2024-07-07 17:41:18'),
(517, 82, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-08 17:05:25', '2024-07-08 17:05:25'),
(518, 17, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-08 17:37:14', '2024-07-08 17:37:14'),
(519, 102, 'Spain vs France', 'Spain', 'France', 'Spain', 19032599, NULL, '2024-07-09 02:48:20', '2024-07-09 02:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vote_id` bigint(20) UNSIGNED NOT NULL,
  `match_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `match_results`
--
ALTER TABLE `match_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `Resverations`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_user_id_foreign` (`user_id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winners_user_id_foreign` (`user_id`),
  ADD KEY `winners_vote_id_foreign` (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `advertisments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_results`
--
ALTER TABLE `match_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `Resverations`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Resverations`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `winners_vote_id_foreign` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
