-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2023 at 08:24 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regiolgv_epaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `epapers`
--

CREATE TABLE `epapers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `is_publish` int(11) NOT NULL DEFAULT '1',
  `qty` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `epapers`
--

INSERT INTO `epapers` (`id`, `title`, `image`, `extra1`, `map_id`, `datetime`, `is_publish`, `qty`, `created_at`, `updated_at`) VALUES
(92, NULL, '1656621048_0.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:49', '2022-07-01 01:30:49'),
(93, NULL, '1656621049_1.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:50', '2022-07-01 01:30:50'),
(94, NULL, '1656621050_2.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:50', '2022-07-01 01:30:50'),
(95, NULL, '1656621050_3.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:51', '2022-07-01 01:30:51'),
(96, NULL, '1656621051_4.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:51', '2022-07-01 01:30:51'),
(97, NULL, '1656621051_5.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:52', '2022-07-01 01:30:52'),
(98, NULL, '1656621052_6.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:52', '2022-07-01 01:30:52'),
(99, NULL, '1656621052_7.jpg', NULL, NULL, '2022-07-01 00:00:00', 1, NULL, '2022-07-01 01:30:53', '2022-07-01 01:30:53'),
(100, 'Front Page', '1656709100_0.jpg', NULL, 'imgmap202272114948', '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:21', '2022-07-03 18:16:53'),
(101, '2', '1656709101_1.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:21', '2022-07-02 01:58:21'),
(102, '3', '1656709101_2.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:22', '2022-07-02 01:58:22'),
(103, '4', '1656709102_3.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:22', '2022-07-02 01:58:22'),
(104, '5', '1656709102_4.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:23', '2022-07-02 01:58:23'),
(105, '6', '1656709103_5.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:23', '2022-07-02 01:58:23'),
(106, '7', '1656709103_6.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:24', '2022-07-02 01:58:24'),
(107, '8', '1656709104_7.jpg', NULL, NULL, '2022-07-02 00:00:00', 1, NULL, '2022-07-02 01:58:24', '2022-07-02 01:58:24'),
(109, NULL, '1656796467_1.jpg', NULL, 'imgmap202273172913', '2022-07-03 00:00:00', 1, 2, '2022-07-03 02:14:28', '2022-07-03 18:05:04'),
(110, NULL, '1656796468_2.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 3, '2022-07-03 02:14:28', '2022-07-03 18:05:15'),
(111, NULL, '1656796468_3.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 4, '2022-07-03 02:14:29', '2022-07-03 18:05:18'),
(112, NULL, '1656796469_4.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 5, '2022-07-03 02:14:29', '2022-07-03 18:05:21'),
(113, NULL, '1656796469_5.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 6, '2022-07-03 02:14:30', '2022-07-03 18:05:25'),
(114, NULL, '1656796470_6.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 7, '2022-07-03 02:14:30', '2022-07-03 18:05:32'),
(115, NULL, '1656796470_7.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 8, '2022-07-03 02:14:31', '2022-07-03 18:05:37'),
(117, 'Front Page', '1656851960_0.jpg', NULL, NULL, '2022-07-03 00:00:00', 1, 1, '2022-07-03 17:39:20', '2022-07-03 18:05:41'),
(130, '1', '1656880060_0.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 1, '2022-07-04 01:27:40', '2022-07-04 01:27:40'),
(131, '2', '1656880060_1.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 2, '2022-07-04 01:27:41', '2022-07-04 01:27:41'),
(132, '3', '1656880061_2.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 3, '2022-07-04 01:27:41', '2022-07-04 01:27:41'),
(133, '4', '1656880061_3.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 4, '2022-07-04 01:27:42', '2022-07-04 01:27:42'),
(134, '5', '1656880062_4.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 5, '2022-07-04 01:27:42', '2022-07-04 01:27:42'),
(135, '6', '1656880062_5.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 6, '2022-07-04 01:27:43', '2022-07-04 01:27:43'),
(136, '7', '1656880063_6.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 7, '2022-07-04 01:27:43', '2022-07-04 01:27:43'),
(137, '8', '1656880063_7.jpg', NULL, NULL, '2022-07-04 00:00:00', 1, 8, '2022-07-04 01:27:44', '2022-07-04 01:27:44'),
(138, '1', '1656965504_0.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 1, '2022-07-05 01:11:44', '2022-07-05 01:11:44'),
(139, '2', '1656965504_1.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 2, '2022-07-05 01:11:45', '2022-07-05 01:11:45'),
(140, '3', '1656965505_2.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 3, '2022-07-05 01:11:45', '2022-07-05 01:11:45'),
(141, '4', '1656965505_3.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 4, '2022-07-05 01:11:46', '2022-07-05 01:11:46'),
(142, '5', '1656965506_4.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 5, '2022-07-05 01:11:46', '2022-07-05 01:11:46'),
(143, '6', '1656965506_5.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 6, '2022-07-05 01:11:47', '2022-07-05 01:11:47'),
(144, '7', '1656965507_6.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 7, '2022-07-05 01:11:48', '2022-07-05 01:11:48'),
(145, '8', '1656965508_7.jpg', NULL, NULL, '2022-07-05 00:00:00', 1, 8, '2022-07-05 01:11:48', '2022-07-05 01:11:48'),
(146, '1', '1657051128_0.jpg', NULL, NULL, '2022-07-06 00:00:00', 1, 1, '2022-07-06 00:58:48', '2022-07-06 00:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `epapers`
--
ALTER TABLE `epapers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epapers`
--
ALTER TABLE `epapers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2061;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
