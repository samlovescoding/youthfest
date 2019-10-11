-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2019 at 01:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthfest`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `registration_number`, `created_at`, `updated_at`) VALUES
(3, 'CT Institute of Engineering  Management & Technology, Shahpur, Jalandhar', 'ctiemt_yf19', '2019-10-11 00:19:38', '2019-10-11 00:19:38'),
(4, 'CT Institute of  Technology, Shahpur, Jalandhar', 'ctit_yf19', '2019-10-11 00:20:26', '2019-10-11 00:20:26'),
(5, 'D.A.V. Institute of Engineering  & Technology, Jalandhar', 'daviet_yf19', '2019-10-11 00:20:58', '2019-10-11 17:47:14'),
(6, 'Sant Baba Bhag Singh Institute of Engineering & Technology, Jalandhar', 'sbbsiet_yf19', '2019-10-11 00:21:22', '2019-10-11 00:21:22'),
(7, 'CT Institute of Hotel Management & Catering Technology, Jalandhar', 'ctihmct_yf19', '2019-10-11 00:21:43', '2019-10-11 00:21:43'),
(8, 'St. Soldier Institute of Hotel Management & Catering Technology, Jalandhar', 'ssihmct_yf19', '2019-10-11 00:22:06', '2019-10-11 00:22:06'),
(9, 'Apeejay Institute of Management., Jalandhar', 'aim_yf19', '2019-10-11 00:22:45', '2019-10-11 00:22:45'),
(10, 'CT Institute of Management & I.T., Jalandhar', 'ctimit_yf19', '2019-10-11 00:23:11', '2019-10-11 00:23:11'),
(11, 'CT Institute of Management Studies, Shahpur, Jalandhar', 'ctims_yf19', '2019-10-11 00:23:41', '2019-10-11 00:23:41'),
(12, 'DIPS Institute of Management & Technology, Jalandhar', 'dipsimt_yf19', '2019-10-11 00:24:06', '2019-10-11 00:24:06'),
(13, 'Innocent Hearts Group of Institutions, Loharan , Jalandhar', 'ihgi_yf19', '2019-10-11 00:24:31', '2019-10-11 00:24:31'),
(14, 'KCL Institute of Management & Technology, Jalandhar', 'kclimt_yf19', '2019-10-11 00:27:09', '2019-10-11 00:27:09'),
(15, 'Satyam Institute of Management & Technology, Nakodar', 'simt_yf19', '2019-10-11 00:27:29', '2019-10-11 00:27:29'),
(16, 'S.G.T.B Institute of Management & IT,  Sanura, Jalandhar', 'sgtbimit_yf19', '2019-10-11 00:27:56', '2019-10-11 00:27:56'),
(17, 'Social Institute of Management & Technology , Jalandhar .', 'soimt_yf19', '2019-10-11 00:28:30', '2019-10-11 01:02:47'),
(18, 'St. Soldier Management & Technical Institute, Jalandhar', 'ssmti_yf19', '2019-10-11 00:28:53', '2019-10-11 00:28:53'),
(19, 'CT Institute of Pharmaceutical Sciences, Shahpur', 'ctips_yf19', '2019-10-11 00:29:19', '2019-10-11 00:29:19'),
(20, 'Soldier Institute of Pharmacy, Jalandhar', 'sip_yf19', '2019-10-11 00:29:43', '2019-10-11 00:29:43'),
(21, 'St. Soldier Institute of Engineering  and Technology, Jalandhar', 'stsiet_yf19', '2019-10-11 00:30:06', '2019-10-11 01:03:41'),
(22, 'CT Institute of Management & Technology, Shahpur,Jalandhar', 'ctimt_yf19', '2019-10-11 00:30:31', '2019-10-11 00:30:31'),
(23, 'CT Institute of Advance Management Studies, Jalandhar', 'ctiams_yf19', '2019-10-11 00:30:52', '2019-10-11 00:30:52'),
(24, 'Sant Baba Bhag Singh Post Graduate College, Khiala, Padiana', 'sbbspgc_yf19', '2019-10-11 00:31:16', '2019-10-11 00:31:16'),
(25, 'Apeejay Svran Institute of Management, Rama Mandi, Jalandhar', 'asim_yf19', '2019-10-11 00:31:40', '2019-10-11 00:31:40'),
(26, 'GORAYA COLLEGE OF TECHNICAL EDUCATION', 'gcte_yf19', '2019-10-11 00:32:02', '2019-10-11 00:32:02'),
(27, 'CT INSTITUTE OF TECHNOLOGY & RESEARCH', 'ctitr_yf19', '2019-10-11 00:32:27', '2019-10-11 00:32:27'),
(28, 'PTU REGIONAL CENTRE CTIEMT', 'pturcctiemt_yf19', '2019-10-11 00:32:51', '2019-10-11 00:32:51'),
(29, 'Lyallpur Khalsa College of Engineering', 'lkce_yf19', '2019-10-11 00:33:11', '2019-10-11 00:33:11'),
(30, 'Northern India Institute of Fashion Technology,Jalanchar', 'niift_yf19', '2019-10-11 00:33:36', '2019-10-11 00:33:36'),
(31, 'PTU Regional Centre, DAV Institute of Engineering & Technology', 'pturcdaviet_yf19', '2019-10-11 00:34:02', '2019-10-11 00:34:02'),
(32, 'PTURC-Sant Baba Bhag Singh Institute of Engineering & Technology,Jalandhar', 'pturcsbbsiet_yf19', '2019-10-11 00:34:48', '2019-10-11 00:34:48'),
(33, 'CT Institute of Architecture & Planning,Shahpur', 'ctiap_yf19', '2019-10-11 00:35:10', '2019-10-11 00:35:10'),
(34, 'SAINIK INSTITUTE,JALANDHAR', 'si_yf19', '2019-10-11 00:35:40', '2019-10-11 00:35:40'),
(35, 'Prem Chand Markand S.D.College for Women,Jalandhar', 'pcmsdcw_yf19', '2019-10-11 00:36:03', '2019-10-11 00:36:03'),
(36, 'CT Institute of Hospitality Management, Jalandhar', 'ctihm_yf19', '2019-10-11 00:36:23', '2019-10-11 00:36:23'),
(37, 'Beant College of Engineering  & Technology, Gurdaspur', 'bcet_yf19', '2019-10-11 00:36:57', '2019-10-11 00:36:57'),
(38, 'Sri Sai College of Engineering  & Technology,Badhani, Pathankot', 'sscet_yf19', '2019-10-11 00:37:15', '2019-10-11 00:37:15'),
(39, 'S. Sukhjinder Singh Engineering  & Technology College, Gurdaspur', 'sssetc_yf19', '2019-10-11 00:37:37', '2019-10-11 00:37:37'),
(40, 'Swami Sarwanand Institute of Engineering & Technology, Dinanagar', 'swsiet_yf19', '2019-10-11 00:38:06', '2019-10-11 01:03:53'),
(41, 'Swami Sarvanand Institute of Management & Technology, Dinanagar', 'ssimt_yf19', '2019-10-11 00:38:33', '2019-10-11 00:38:33'),
(42, 'VMS Institute of Management,  Batala', 'vmsim_yf19', '2019-10-11 00:38:56', '2019-10-11 00:38:56'),
(43, 'Vishwa mittar sekhri College of Pharmacy, Batala', 'vmscp_yf19', '2019-10-11 00:39:24', '2019-10-11 00:39:24'),
(44, 'Golden College of Engg & Tech, Gurdaspur', 'gcet_yf19', '2019-10-11 00:39:52', '2019-10-11 00:39:52'),
(45, 'Sri Guru Arjun Dev College of Management & Technology, Dhariwal, Gurdaspur', 'sgadcmt_yf19', '2019-10-11 00:40:20', '2019-10-11 00:40:20'),
(46, 'Golden Institute of Management & Tech. Gurdaspur', 'gimt_yf19', '2019-10-11 00:40:40', '2019-10-11 00:40:40'),
(47, 'PTURC Swami Sarvanad Institute of Engineering & Technology', 'pturcssiet_yf19', '2019-10-11 00:41:06', '2019-10-11 00:41:06'),
(48, 'Sukhjinder Institute of Science and Technology', 'sist_yf19', '2019-10-11 00:41:29', '2019-10-11 00:41:29'),
(49, 'PTURC BEANT COLLEGE OF ENGG. & TECH.', 'pturcbcet_yf19', '2019-10-11 00:41:52', '2019-10-11 00:41:52'),
(50, 'Shanti Devi Arya mahila College,Dinanagar', 'sdamc_yf19', '2019-10-11 00:42:12', '2019-10-11 00:42:12'),
(51, 'S.Sukhjinder Singh College of Pharmacy,Gurdaspur', 'ssscp_yf19', '2019-10-11 00:42:34', '2019-10-11 00:42:34'),
(52, 'Amritsar College of Engineering & Technology, Amritsar', 'acet_yf19', '2019-10-11 00:43:03', '2019-10-11 00:43:03'),
(53, 'Baba Kuma Singh Ji Engineering College, Amritsar', 'bksjec_yf19', '2019-10-11 00:43:23', '2019-10-11 00:43:23'),
(54, 'Global Institute of  Management and Emerging Technologies, Amritsar', 'gimet_yf19', '2019-10-11 00:43:43', '2019-10-11 00:43:43'),
(55, 'Khalsa College of Engineering & Technology, Amritsar', 'kcet_yf19', '2019-10-11 00:44:04', '2019-10-11 00:44:04'),
(56, 'Sai Institute of Engineering & Technology, Manawala, Amritsar', 'siet_yf19', '2019-10-11 00:44:30', '2019-10-11 00:44:30'),
(57, 'Global Institute of Management, Amritsar', 'gim_yf19', '2019-10-11 00:44:55', '2019-10-11 00:44:55'),
(59, 'Sai Institute of Management, Manawala, Amritsar.', 'simm_yf19', '2019-10-11 00:46:04', '2019-10-11 00:46:04'),
(60, 'Sidana Institute of Management & Technology, Khiala Khurd, Amritsar', 'simta_yf19', '2019-10-11 00:46:27', '2019-10-11 01:04:58'),
(61, 'Swami Satyanand College of Management & Technology , Amritsar', 'sscmt_yf19', '2019-10-11 00:46:50', '2019-10-11 00:46:50'),
(62, 'Govt. Institute of Pharmaceutical Science., Amritsar.', 'gips_yf19', '2019-10-11 00:47:12', '2019-10-11 00:47:12'),
(63, 'Khalsa College of Pharmacy,  Amritsar', 'kcp_yf19', '2019-10-11 00:47:38', '2019-10-11 00:47:38'),
(64, 'Sai Institute of Pharmaceutical Education & Res., Manawala, Amritsar', 'siper_yf19', '2019-10-11 00:47:58', '2019-10-11 00:47:58'),
(65, 'M. K. Education Societies Group of Institutions, Amritsar', 'mkesgi_yf19', '2019-10-11 00:48:21', '2019-10-11 00:48:21'),
(66, 'Satyam Institute of Management, Amritsar', 'sim_yf19', '2019-10-11 00:48:41', '2019-10-11 00:48:41'),
(67, 'Satyam Institute of Engineering & Technology, Kotla Doom, Amritsar', 'sietkd_yf19', '2019-10-11 00:48:59', '2019-10-11 00:48:59'),
(68, 'Sai School of Architecture, Manawala, Amritsar', 'ssa_yf19', '2019-10-11 00:49:19', '2019-10-11 00:49:19'),
(69, 'Guru Amar Dass College of Information Tech. and Mgt., Jandiala Guru', 'gadcitm_yf19', '2019-10-11 00:49:42', '2019-10-11 00:49:42'),
(70, 'CKD Institute of Management & Technology, Amritsar', 'ckdimta_yf19', '2019-10-11 00:50:01', '2019-10-11 01:04:18'),
(71, 'Khalsa College of Pharmacy and Technology,Amritsar', 'kcpt_yf19', '2019-10-11 00:50:22', '2019-10-11 00:50:22'),
(72, 'PTURC Khalsa College of Engineering & Technology, Amritsar', 'pturckcet_yf19', '2019-10-11 00:50:43', '2019-10-11 00:50:43'),
(73, 'Amritsar college of Hotel Management and Technology', 'achmt_yf19', '2019-10-11 00:51:01', '2019-10-11 00:51:01'),
(74, 'PTURC GLOBAL INSTITUTE OF MANAGEMENT AND EMERGING TECHNOLOGIES', 'pturcgimet_yf19', '2019-10-11 00:51:38', '2019-10-11 00:51:38'),
(75, 'RADICAL BUSINESS SCHOOL', 'rbs_yf19', '2019-10-11 00:51:55', '2019-10-11 00:51:55'),
(76, 'RADICAL TECHNICAL INSTITUTE', 'rti_yf19', '2019-10-11 00:52:13', '2019-10-11 00:52:13'),
(77, 'PTURC-Amritsar College of Engineering & Technology, Amritsar', 'pturcacet_yf19', '2019-10-11 00:52:32', '2019-10-11 00:52:32'),
(78, 'SAINIK INSTITUTE OF IT & MANAGEMENT,Amritsar', 'siitm_yf19', '2019-10-11 00:52:48', '2019-10-11 00:52:48'),
(79, 'Khalsa College of Management & Technology,Amritsar', 'kcmt_yf19', '2019-10-11 00:53:03', '2019-10-11 00:53:03'),
(80, 'BABA KUMA SINGH JI DEGREE COLLEGE,AMRITSAR', 'bksjdc_yf19', '2019-10-11 00:53:23', '2019-10-11 00:53:23'),
(81, 'Radical Business School,Amritsar', 'rbsa_yf19', '2019-10-11 00:53:40', '2019-10-11 00:53:40'),
(82, 'Satyam Institute of Pharmaceutical Sciences & Research, Kotla Doom, Amritsar', 'sipser_yf19', '2019-10-11 00:53:57', '2019-10-11 00:53:57'),
(83, 'M.K. Institute of Management, Sohian Khurd, Amritsar', 'mkim_yf19', '2019-10-11 00:54:22', '2019-10-11 00:54:22'),
(84, 'Aman Bhalla Institute of Engineering  & Technology, Jhakolari, Pathankot.', 'abietj_yf19', '2019-10-11 00:54:42', '2019-10-11 00:54:42'),
(85, 'A & M Institute of Computer & Technology, Pathankot', 'amict_yf19', '2019-10-11 00:54:58', '2019-10-11 00:54:58'),
(86, 'A & M Institute of Management & Technology, Pathankot', 'amimt_yf19', '2019-10-11 00:55:17', '2019-10-11 00:55:17'),
(87, 'Sri Sai Iqbal College of Management & Information Technology, Badhani', 'ssicmit_yf19', '2019-10-11 00:55:36', '2019-10-11 00:55:36'),
(88, 'Shri Sai College of Pharmacy,  Badhani, Pathankot', 'sscp_yf19', '2019-10-11 00:55:58', '2019-10-11 00:55:58'),
(89, 'Sukhjinder Technical Campus, Dunera, Gurdaspur', 'stc_yf19', '2019-10-11 00:56:17', '2019-10-11 00:56:17'),
(90, 'Tawi Engineering College, Shahpur Kandi,  Gurdaspur', 'tec_yf19', '2019-10-11 00:56:40', '2019-10-11 00:56:40'),
(91, 'Sri Sai School of Architecture, Badhani, Pathankot', 'sssa_yf19', '2019-10-11 00:57:14', '2019-10-11 00:57:14'),
(92, 'Sukhjinder Institute of Computer Science & Management, Dunera, Pathankot', 'sicsm_yf19', '2019-10-11 00:57:35', '2019-10-11 00:57:35'),
(93, 'Aman Bhalla Institute of Engineering & Technology', 'abiet_yf19', '2019-10-11 00:57:52', '2019-10-11 00:57:52'),
(94, 'AMAN BHALLA INSTITUTE OF MANAGEMENT', 'abim_yf19', '2019-10-11 00:58:11', '2019-10-11 00:58:11'),
(95, 'Shiv Shankar Institute of Engineering  & Tech, Patti', 'shsiet_yf19', '2019-10-11 00:58:30', '2019-10-11 01:03:26'),
(96, 'Shaheed Bhagat Singh Polytechnic & Pharmacy College, Patti', 'sbsppc_yf19', '2019-10-11 00:58:49', '2019-10-11 00:58:49'),
(97, 'CKD Institute of Management & Technology,Tarn Taran', 'ckdimt_yf19', '2019-10-11 00:59:12', '2019-10-11 00:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_length` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_participants` int(11) NOT NULL,
  `max_accomp` int(11) NOT NULL,
  `organised_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `time_length`, `max_participants`, `max_accomp`, `organised_by`, `created_at`, `updated_at`) VALUES
(2, 'Classical Vocal solo', '.', '.', 1, 2, 'College', '2019-10-11 00:05:25', '2019-10-11 00:05:25'),
(3, 'Classical Instrumental Solo(Percussion)', '.', '.', 1, 2, 'College', '2019-10-11 00:06:29', '2019-10-11 00:06:29'),
(4, 'Classical Instrumental Solo(Non-Percussion)', '.', '.', 1, 2, 'College', '2019-10-11 00:07:56', '2019-10-11 00:07:56'),
(5, 'Folk Song', '.', '.', 1, 2, 'College', '2019-10-11 00:08:26', '2019-10-11 00:08:26'),
(6, 'Vaar Singing', '.', '.', 2, 2, 'College', '2019-10-11 00:08:52', '2019-10-11 00:08:52'),
(7, 'Western Vocal Solo', '.', '.', 1, 2, 'College', '2019-10-11 00:09:28', '2019-10-11 00:09:28'),
(8, 'Group Song(Indian)', '.', '.', 6, 3, 'College', '2019-10-11 00:10:16', '2019-10-11 00:10:16'),
(9, 'Group Song(Western)', '.', '.', 6, 3, 'College', '2019-10-11 00:10:51', '2019-10-11 00:10:51'),
(10, 'Group Shabad/Bhajan', '.', '.', 6, 3, 'College', '2019-10-11 00:11:33', '2019-10-11 00:11:33'),
(11, 'Light Vocal Indian', '.', '.', 1, 2, 'College', '2019-10-11 00:12:00', '2019-10-11 00:12:00'),
(12, 'Punjabi Folk Dance(Boys) Bhangra', '.', '.', 10, 5, 'College', '2019-10-11 01:07:02', '2019-10-11 01:07:02'),
(13, 'Punjabi Folk Dance(Girls) Giddha', '.', '.', 10, 1, 'College', '2019-10-11 01:08:10', '2019-10-11 01:08:10'),
(14, 'One Act Play', '.', '.', 9, 3, 'College', '2019-10-11 01:08:48', '2019-10-11 01:08:48'),
(15, 'Skit', '.', '.', 6, 3, 'College', '2019-10-11 01:09:11', '2019-10-11 01:09:11'),
(16, 'Mime', '.', '.', 6, 2, 'College', '2019-10-11 01:09:45', '2019-10-11 01:09:45'),
(17, 'Mimicry', '.', '.', 1, 0, 'College', '2019-10-11 01:10:44', '2019-10-11 01:10:44'),
(18, 'On Spot Painting', '.', '.', 1, 0, 'College', '2019-10-11 01:11:25', '2019-10-11 01:11:25'),
(19, 'Collage', '.', '.', 1, 0, 'College', '2019-10-11 01:11:48', '2019-10-11 01:11:48'),
(20, 'Poster Making', '.', '.', 1, 0, 'College', '2019-10-11 01:12:19', '2019-10-11 01:12:19'),
(21, 'Clay Modelling', '.', '.', 1, 0, 'College', '2019-10-11 01:12:42', '2019-10-11 01:12:42'),
(22, 'Cartooning', '.', '.', 1, 0, 'College', '2019-10-11 01:13:24', '2019-10-11 01:13:24'),
(23, 'Rangooli', '.', '.', 1, 0, 'College', '2019-10-11 01:13:54', '2019-10-11 01:13:54'),
(24, 'Spot Photography', '.', '.', 1, 0, 'College', '2019-10-11 01:14:19', '2019-10-11 01:14:19'),
(25, 'Mehndi', '.', '.', 1, 1, 'College', '2019-10-11 01:14:43', '2019-10-11 01:14:43'),
(26, 'Quiz', '.', '.', 3, 0, 'College', '2019-10-11 01:15:08', '2019-10-11 01:15:08'),
(27, 'Elocution', '.', '.', 1, 0, 'College', '2019-10-11 01:15:35', '2019-10-11 01:15:35'),
(28, 'Debate', '.', '.', 2, 0, 'College', '2019-10-11 01:16:01', '2019-10-11 01:16:01'),
(29, 'Poem Recitation', '.', '.', 1, 0, 'College', '2019-10-11 01:16:32', '2019-10-11 01:16:32'),
(30, 'Creative writing', '.', '.', 3, 0, 'College', '2019-10-11 01:17:15', '2019-10-11 01:17:15'),
(31, 'Other States Folk Dance(Exhibiton Event)', '.', '.', 10, 5, 'College', '2019-10-11 01:18:14', '2019-10-11 01:18:14'),
(32, 'Classical Dance', '.', '.', 1, 3, 'College', '2019-10-11 01:18:46', '2019-10-11 01:18:46'),
(33, 'International Folk Dance', '.', '.', 10, 5, 'College', '2019-10-11 01:19:22', '2019-10-11 01:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `event_relations`
--

CREATE TABLE `event_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_relations`
--

INSERT INTO `event_relations` (`id`, `event`, `student`, `created_at`, `updated_at`) VALUES
(1, 32, 1, '2019-10-11 15:26:02', '2019-10-11 15:26:02'),
(2, 2, 2, '2019-10-11 16:24:25', '2019-10-11 16:24:25'),
(3, 3, 2, '2019-10-11 16:24:25', '2019-10-11 16:24:25'),
(4, 9, 2, '2019-10-11 16:24:25', '2019-10-11 16:24:25'),
(5, 10, 2, '2019-10-11 16:24:25', '2019-10-11 16:24:25'),
(6, 2, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(7, 3, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(8, 4, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(9, 5, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(10, 7, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(11, 8, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(12, 9, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(13, 10, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(14, 11, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27'),
(15, 14, 3, '2019-10-11 18:05:27', '2019-10-11 18:05:27');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_08_021957_create_students_table', 1),
(5, '2019_10_08_022632_create_colleges_table', 1),
(6, '2019_10_08_061407_add_cover_image_to_students', 1),
(7, '2019_10_08_081308_add_college_to_user', 1),
(8, '2019_10_09_100114_create_events_table', 1),
(9, '2019_10_10_194211_add_username_to_users', 2);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_number` int(10) UNSIGNED NOT NULL,
  `university_registration` int(10) UNSIGNED NOT NULL,
  `year_of_passing` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `participating_as` enum('participant','student_accomp','accomp') COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomp_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `date_birth`, `class`, `branch`, `roll_number`, `university_registration`, `year_of_passing`, `address`, `participating_as`, `accomp_id`, `created_at`, `updated_at`, `student_photo`) VALUES
(1, 'asdasd', 'dasdasd', '2001-11-16', 'ddasdas', 'dasdas', 3443, 0, 2000, 'scsdfsdf', 'participant', 1, '2019-10-11 15:26:02', '2019-10-11 15:26:02', '1b85d0bcc553d978ef48758bd6ab209e.png'),
(2, 'Sampan', 'Sampan', '2008-10-30', 'B Tech', 'IT', 445, 1803855, 2000, 'sddsadsasd\r\ndasdasda', 'participant', 1, '2019-10-11 16:24:25', '2019-10-11 17:40:10', 'ab69816edede5d29a95258112d333151.png'),
(3, 'aaaaaaaaaaaaa', 'dasdasd', '1999-10-14', 'btech', 'it', 3443, 1803855, 2000, 'home', 'participant', 1, '2019-10-11 18:05:27', '2019-10-11 18:05:27', 'affa5a6db2a775d23f21ebb6bbed5059.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `college_id`, `username`) VALUES
(1, 'Super Admin', NULL, 2, NULL, '$2y$10$5KgKhV9A9IpFovYBgJU.nOPTjrEWr/sXiebfyfCuhj5fOIzWkyf/.', 'UoO9jKxOCm2nZ5cKOKhalycI2RGY7wrHwO52zb2gu9quk670ccKQuCEUFpNk', '2019-10-10 03:59:51', '2019-10-11 16:19:44', 3, 'superadmin'),
(4, 'CT Institute of Engineering  Management & Technology, Shahpur, Jalandhar', NULL, 1, NULL, '$2y$10$OvZHQD.FWMzJXjz/QijoTOiF24kupwg6L8mqpiuvE0eAnfxGdG3dq', NULL, '2019-10-11 16:50:51', '2019-10-11 16:50:51', 3, 'ctiemt_yf19'),
(5, 'CT Institute of  Technology, Shahpur, Jalandhar', NULL, 1, NULL, '$2y$10$o08evVXjCx.f43XgnB1pJuCjyDXwAH8IXFSRg81gc8q5npTo5jyFi', NULL, '2019-10-11 16:50:51', '2019-10-11 16:50:51', 4, 'ctit_yf19'),
(6, 'D.A.V. Institute of Engineering  & Technology, Jalandhar', NULL, 1, NULL, '$2y$10$jqJ5L7a96.O3WtvznczNXOteg2NP74F7IUoxIOtlt7XlRzqLJZwpC', NULL, '2019-10-11 16:50:51', '2019-10-11 17:50:11', 5, 'daviet_yf19'),
(7, 'Sant Baba Bhag Singh Institute of Engineering & Technology, Jalandhar', NULL, 1, NULL, '$2y$10$newGMAgKIfSsrQvMoX4Q6eorWVpw6Uw.9XNcRCe5rHBLUy.7Svyfa', NULL, '2019-10-11 16:50:51', '2019-10-11 16:50:51', 6, 'sbbsiet_yf19'),
(8, 'CT Institute of Hotel Management & Catering Technology, Jalandhar', NULL, 1, NULL, '$2y$10$ovFuzYGQciXgMZQVYDlXce1zKKZQ96jiX6MXdudpU85vsx6IlP3GG', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 7, 'ctihmct_yf19'),
(9, 'St. Soldier Institute of Hotel Management & Catering Technology, Jalandhar', NULL, 1, NULL, '$2y$10$SQws4atDm0RxKL08g1OkAOhKFRkIK/bjq0xc/472hSRdeUP37AMrS', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 8, 'ssihmct_yf19'),
(10, 'Apeejay Institute of Management., Jalandhar', NULL, 1, NULL, '$2y$10$EXl6LQnGBzvRMmkhJVGzJOX02SWmEIyVbHzSZBFUIxYfbb.guJPOm', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 9, 'aim_yf19'),
(11, 'CT Institute of Management & I.T., Jalandhar', NULL, 1, NULL, '$2y$10$WFrkq9YulCe000hPwpPnh.FR5qQVoJmCxig1u7jYsNRn7.WrlDoEu', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 10, 'ctimit_yf19'),
(12, 'CT Institute of Management Studies, Shahpur, Jalandhar', NULL, 1, NULL, '$2y$10$CeyV/vffstmF4/2XEjQB1O1C57cNUIWTyqIw7wQK1/DY/pnKMbvZu', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 11, 'ctims_yf19'),
(13, 'DIPS Institute of Management & Technology, Jalandhar', NULL, 1, NULL, '$2y$10$c8XCUwwF9pjFf3hltWki8OrC2oGUuFigZ6YKraOmYG7wUwjyJpAgu', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 12, 'dipsimt_yf19'),
(14, 'Innocent Hearts Group of Institutions, Loharan , Jalandhar', NULL, 1, NULL, '$2y$10$QHEOffXFiXEPDcx0Yd9FlenwVcT5PH63JzNloyQ3sPKH4/QdIVhbq', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 13, 'ihgi_yf19'),
(15, 'KCL Institute of Management & Technology, Jalandhar', NULL, 1, NULL, '$2y$10$E1Q/CLzOAqmQUbwvuMgZmujoSk.GGKjJxEC1LyqHFegiSOShrD0iK', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 14, 'kclimt_yf19'),
(16, 'Satyam Institute of Management & Technology, Nakodar', NULL, 1, NULL, '$2y$10$VrcETp08GXMIaz1Mjuixne0skzhhWj/awzCEkZNeD29gyOTFNpn8y', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 15, 'simt_yf19'),
(17, 'S.G.T.B Institute of Management & IT,  Sanura, Jalandhar', NULL, 1, NULL, '$2y$10$pYYU8lfYW.Y36Nt3kSePfOCs2GXO.MNFoQL0KP79GFBUoL67OdGv2', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 16, 'sgtbimit_yf19'),
(18, 'Social Institute of Management & Technology , Jalandhar .', NULL, 1, NULL, '$2y$10$kLDCwembLDpTyeD59g4ke.u1wNm.VdoKS4cnUoHa/f6P.RWjVySnq', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 17, 'soimt_yf19'),
(19, 'St. Soldier Management & Technical Institute, Jalandhar', NULL, 1, NULL, '$2y$10$N3le1NDoVKqm5v4kmS1MYuyZhINYUF9j7StfLB4Z.P1kKYByWNekG', NULL, '2019-10-11 16:50:52', '2019-10-11 16:50:52', 18, 'ssmti_yf19'),
(20, 'CT Institute of Pharmaceutical Sciences, Shahpur', NULL, 1, NULL, '$2y$10$8hZosGSsrzgPIxrx.LhaYubBmXSDJRslEF2HjR1wypCLbsshJ7AHy', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 19, 'ctips_yf19'),
(21, 'Soldier Institute of Pharmacy, Jalandhar', NULL, 1, NULL, '$2y$10$uwfHxJkN45Hv6LNTON9FWuKxbIJl/Yu7i05x57tYCJA5HYXlj1HYG', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 20, 'sip_yf19'),
(22, 'St. Soldier Institute of Engineering  and Technology, Jalandhar', NULL, 1, NULL, '$2y$10$dqQYZgeWXZDZVeFvv50NB.32wxKxZL1SG6/UGe/m658odZM34qP7e', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 21, 'stsiet_yf19'),
(23, 'CT Institute of Management & Technology, Shahpur,Jalandhar', NULL, 1, NULL, '$2y$10$TrPPYCjinVbwVyhO9XIFM.BhEJvm37MWM7mJHEpEUzCIo02LnScXC', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 22, 'ctimt_yf19'),
(24, 'CT Institute of Advance Management Studies, Jalandhar', NULL, 1, NULL, '$2y$10$RR9yxozV8RMJJkvBY5p34OyQl/CrcE6cFL7XY9uE0t5kmNvNrLB2a', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 23, 'ctiams_yf19'),
(25, 'Sant Baba Bhag Singh Post Graduate College, Khiala, Padiana', NULL, 1, NULL, '$2y$10$akGkMPNFkjSkjWiAcoS4x.gOwMT9vPPjWU1nM90ztDyWSZUcWjKl.', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 24, 'sbbspgc_yf19'),
(26, 'Apeejay Svran Institute of Management, Rama Mandi, Jalandhar', NULL, 1, NULL, '$2y$10$S3FwqMAo4uutH.7l0uW0QuWDd6OoDB.r5QCyOqK7gf60cj11lh7r6', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 25, 'asim_yf19'),
(27, 'GORAYA COLLEGE OF TECHNICAL EDUCATION', NULL, 1, NULL, '$2y$10$xWv./BZb7p3.st9tC.5Zb.iUKTs/ohTQlF5q.FfOHsNdcTUNu.RwK', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 26, 'gcte_yf19'),
(28, 'CT INSTITUTE OF TECHNOLOGY & RESEARCH', NULL, 1, NULL, '$2y$10$GZ/uXoCjMeRG63fXqCMOYe1MYQMMsGdOFGMdZ/fMDDBIGbblwBZe.', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 27, 'ctitr_yf19'),
(29, 'PTU REGIONAL CENTRE CTIEMT', NULL, 1, NULL, '$2y$10$12kGfE01kqftU9coxsXvmuOLXaP5xkzvSUAhexd0fpSrP81SaqbHK', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 28, 'pturcctiemt_yf19'),
(30, 'Lyallpur Khalsa College of Engineering', NULL, 1, NULL, '$2y$10$X0II7gZDHZYfpe7fSmuiwuGr3hxgIxLroj16ml2cyfSmS9FfZWzby', NULL, '2019-10-11 16:50:53', '2019-10-11 16:50:53', 29, 'lkce_yf19'),
(31, 'Northern India Institute of Fashion Technology,Jalanchar', NULL, 1, NULL, '$2y$10$pi8EpCnhNuzYGz0xOXdyCeZo.OxOMXXdx9jdon/qSLh9DKSuL/5iK', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 30, 'niift_yf19'),
(32, 'PTU Regional Centre, DAV Institute of Engineering & Technology', NULL, 1, NULL, '$2y$10$M3z.Xgp8xQVb4gcSuFxqFOB3W8DxvVNR2tca1ghPbxSg8R6bnGpBS', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 31, 'pturcdaviet_yf19'),
(33, 'PTURC-Sant Baba Bhag Singh Institute of Engineering & Technology,Jalandhar', NULL, 1, NULL, '$2y$10$5HvJD2HbLisIsaOo1Rxqa.X706gQhhg1R9oUPSp72I7Y4BUJyXtle', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 32, 'pturcsbbsiet_yf19'),
(34, 'CT Institute of Architecture & Planning,Shahpur', NULL, 1, NULL, '$2y$10$EGzhldeqLNDuLD2U0I608eQbKk5HUQs/0Au4oa.b9.pOTyk7nmtxm', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 33, 'ctiap_yf19'),
(35, 'SAINIK INSTITUTE,JALANDHAR', NULL, 1, NULL, '$2y$10$cvdZwX8WHljV//Q9oei9zOIMuZGUGTR5/dJfvj3IwxBrpYAYK0Fnu', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 34, 'si_yf19'),
(36, 'Prem Chand Markand S.D.College for Women,Jalandhar', NULL, 1, NULL, '$2y$10$FGWv6frttwtRa9tcL1TK9.q.via5cngUJL7QGKfaZLqPwcF/jEo.a', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 35, 'pcmsdcw_yf19'),
(37, 'CT Institute of Hospitality Management, Jalandhar', NULL, 1, NULL, '$2y$10$9r.ipR7CasbHvS0b77oCbejfZKdrtyb4.M6i2bMUAJuxkj1g1LW8y', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 36, 'ctihm_yf19'),
(38, 'Beant College of Engineering  & Technology, Gurdaspur', NULL, 1, NULL, '$2y$10$2rmQZ4iB48rxVAHPtNjngemWQqvzE1wAlzh8T.4US7TZE6TvaKaG6', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 37, 'bcet_yf19'),
(39, 'Sri Sai College of Engineering  & Technology,Badhani, Pathankot', NULL, 1, NULL, '$2y$10$hAkVus1aP1tzQw0L8WmLCOPOEkC5fFroMglGDpRLa7mcVAdc8fl2q', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 38, 'sscet_yf19'),
(40, 'S. Sukhjinder Singh Engineering  & Technology College, Gurdaspur', NULL, 1, NULL, '$2y$10$P/NS5LbZA771ah9hp9p6ae994iNuopTr2hOuCz75iUJ3.RVGyBrzW', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 39, 'sssetc_yf19'),
(41, 'Swami Sarwanand Institute of Engineering & Technology, Dinanagar', NULL, 1, NULL, '$2y$10$hk4IwWWqQJHqnrGwbvRgK.BumQghTP37XnPaCh9OAguXdjfyLIMAK', NULL, '2019-10-11 16:50:54', '2019-10-11 16:50:54', 40, 'swsiet_yf19'),
(42, 'Swami Sarvanand Institute of Management & Technology, Dinanagar', NULL, 1, NULL, '$2y$10$d1nSmjDol5YvOaJbGnGsV.wpxwgsvgU91S8SXbCIdIAUitck9UgvS', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 41, 'ssimt_yf19'),
(43, 'VMS Institute of Management,  Batala', NULL, 1, NULL, '$2y$10$29/VUrWJY0Tc9PWR3NoDy.3diVF3tD4q7uhWCRVANNGaIlre3ROA6', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 42, 'vmsim_yf19'),
(44, 'Vishwa mittar sekhri College of Pharmacy, Batala', NULL, 1, NULL, '$2y$10$71gNrG7Vb6yRkL7HLYIU6.5h//qbwfKt4Rgbp8gdNMGdmCtfghSCK', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 43, 'vmscp_yf19'),
(45, 'Golden College of Engg & Tech, Gurdaspur', NULL, 1, NULL, '$2y$10$EF1BmE6eHuiqIm8hu5/wOeAbTg8I7ooI./ja51SkfMgBIFti7Fl4m', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 44, 'gcet_yf19'),
(46, 'Sri Guru Arjun Dev College of Management & Technology, Dhariwal, Gurdaspur', NULL, 1, NULL, '$2y$10$C9/wxn95q63FIMV7SSFDXeDyXthztf62/.jla5BUZToCrMohLt7qS', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 45, 'sgadcmt_yf19'),
(47, 'Golden Institute of Management & Tech. Gurdaspur', NULL, 1, NULL, '$2y$10$Zud2s/u5xDFZBVoIfbNED.p./QyP5zZQxT0FuwZ79CIGAcBxf7dgm', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 46, 'gimt_yf19'),
(48, 'PTURC Swami Sarvanad Institute of Engineering & Technology', NULL, 1, NULL, '$2y$10$8X.Y3N6u8rhGw5KtZo0FsePq07IANJs7Q4Qf8j053zuBLh0ehTCJ6', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 47, 'pturcssiet_yf19'),
(49, 'Sukhjinder Institute of Science and Technology', NULL, 1, NULL, '$2y$10$Gmy2zd5KDZvaebCf7qXaZe2c9F85XzeY.NywTEvulExKbcGU2CTYy', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 48, 'sist_yf19'),
(50, 'PTURC BEANT COLLEGE OF ENGG. & TECH.', NULL, 1, NULL, '$2y$10$/ObKLDveNbhrbmzCjYRDE.pOS6gSgz/DcR6GmWB6rEu6TQ0JH4y/q', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 49, 'pturcbcet_yf19'),
(51, 'Shanti Devi Arya mahila College,Dinanagar', NULL, 1, NULL, '$2y$10$1saqB0Rv/OyK8r8y6YUuIuSaUTpl/xD/aRMoRl0u6Mpp8PIFLFfdS', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 50, 'sdamc_yf19'),
(52, 'S.Sukhjinder Singh College of Pharmacy,Gurdaspur', NULL, 1, NULL, '$2y$10$fJFA.x5iBHCMV18fnvqxpuc7F7WXKtokPPPbX05v.JlE39QPyJ8ye', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 51, 'ssscp_yf19'),
(53, 'Amritsar College of Engineering & Technology, Amritsar', NULL, 1, NULL, '$2y$10$rJuYEJDx8ftQKqPNWGTMZ.94Z0AtdlqlymtackrVS7ARSmv/or/Uq', NULL, '2019-10-11 16:50:55', '2019-10-11 16:50:55', 52, 'acet_yf19'),
(54, 'Baba Kuma Singh Ji Engineering College, Amritsar', NULL, 1, NULL, '$2y$10$6gmMIejEWdRpQGXwaTh7ru.Ajze.GPWkbomY7ZdTxImVGPvybmgui', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 53, 'bksjec_yf19'),
(55, 'Global Institute of  Management and Emerging Technologies, Amritsar', NULL, 1, NULL, '$2y$10$JB1YUlV1H9KvKBjWEYMDReVA.HQJmwRcZY8jrwAvgb4oXvTDzRjPi', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 54, 'gimet_yf19'),
(56, 'Khalsa College of Engineering & Technology, Amritsar', NULL, 1, NULL, '$2y$10$I3.RsG6fBdJpQMizYoB1uO1fE.Jwa4q9OD5LLiuhvS51GcpTmWEsC', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 55, 'kcet_yf19'),
(57, 'Sai Institute of Engineering & Technology, Manawala, Amritsar', NULL, 1, NULL, '$2y$10$sRWjmXuyScw1ioVYYkUp5uHgxeuYcaM2VfZ4QlTioY4hMrghSBHUK', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 56, 'siet_yf19'),
(58, 'Global Institute of Management, Amritsar', NULL, 1, NULL, '$2y$10$Hywz63Sgt0s/Uo9DM5RIQuxeAP4RE8/fX595fiLw3IYo80WLsBUwi', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 57, 'gim_yf19'),
(59, 'Sai Institute of Management, Manawala, Amritsar.', NULL, 1, NULL, '$2y$10$IQesGD6sEHTvV10aZUdC2uANxQhHbcWZ.HINIWoSWqMQMRLLJ5tyS', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 59, 'simm_yf19'),
(60, 'Sidana Institute of Management & Technology, Khiala Khurd, Amritsar', NULL, 1, NULL, '$2y$10$qLdxXNOaQBdFAS5kTXY1ZOrq4va4am9W5LMgGmKFhEtvV5cbAu8.q', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 60, 'simta_yf19'),
(61, 'Swami Satyanand College of Management & Technology , Amritsar', NULL, 1, NULL, '$2y$10$4ajzluA3ADfJsc1InKasCOdarE2CzJRFX7Tukze8u3r0eP4WxBKCO', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 61, 'sscmt_yf19'),
(62, 'Govt. Institute of Pharmaceutical Science., Amritsar.', NULL, 1, NULL, '$2y$10$4NIa1n0odaQZRJlyA5qn4.4l3y2TKFVoZU10.iZKsSMNWjqJiJuDa', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 62, 'gips_yf19'),
(63, 'Khalsa College of Pharmacy,  Amritsar', NULL, 1, NULL, '$2y$10$uKOADKZI1jhizXycrNvyBe2PBjkVZ8BdQa0aT5GOBpktYD4MTVGEm', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 63, 'kcp_yf19'),
(64, 'Sai Institute of Pharmaceutical Education & Res., Manawala, Amritsar', NULL, 1, NULL, '$2y$10$pH2iRR6gz49ZcJhBjC/6nOKzZa91q8T71G18EFCFN5B8EtBgfZ6BG', NULL, '2019-10-11 16:50:56', '2019-10-11 16:50:56', 64, 'siper_yf19'),
(65, 'M. K. Education Societies Group of Institutions, Amritsar', NULL, 1, NULL, '$2y$10$OiYjZP94plLb6fYM9mHZOujbINb8AB3kOdedl.Z4294p5aBUEwZMW', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 65, 'mkesgi_yf19'),
(66, 'Satyam Institute of Management, Amritsar', NULL, 1, NULL, '$2y$10$AKJluSgej1twbwp2Q3wAmu32Nnl8ruzH99F0kS1peatL12IWXA3NG', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 66, 'sim_yf19'),
(67, 'Satyam Institute of Engineering & Technology, Kotla Doom, Amritsar', NULL, 1, NULL, '$2y$10$ffTaIruaTQtPo7icXH8xbOe0j9wZ.piUmZbpuGQ1ActiQ7J.XKeJW', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 67, 'sietkd_yf19'),
(68, 'Sai School of Architecture, Manawala, Amritsar', NULL, 1, NULL, '$2y$10$jDNHI93TClVHLMEAUUmfl.ShBeeYS7WxrLG53swsPp3wh2yxrdIEO', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 68, 'ssa_yf19'),
(69, 'Guru Amar Dass College of Information Tech. and Mgt., Jandiala Guru', NULL, 1, NULL, '$2y$10$BrAfz.NzwjBt0q6W1zt3x.9t6EqmAtcrGOZ4j/VKq32v08Qwb.P9G', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 69, 'gadcitm_yf19'),
(70, 'CKD Institute of Management & Technology, Amritsar', NULL, 1, NULL, '$2y$10$2D.DVsdsRu/nuK2de3Rqpu1Xpk8YxLBaS67TfPqapXIGArwJFp11G', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 70, 'ckdimta_yf19'),
(71, 'Khalsa College of Pharmacy and Technology,Amritsar', NULL, 1, NULL, '$2y$10$D2e6E6eoKUhMfHRKTaFqJOOAaZLskLO6H/ZCyIYBzEOHLIzbDN/IO', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 71, 'kcpt_yf19'),
(72, 'PTURC Khalsa College of Engineering & Technology, Amritsar', NULL, 1, NULL, '$2y$10$b46yVFAOW0ArUuPKinFpDes5X0ITIqHMsmM9L7PvSs5ofyU4u1bHm', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 72, 'pturckcet_yf19'),
(73, 'Amritsar college of Hotel Management and Technology', NULL, 1, NULL, '$2y$10$Lk94OB1cAsf0WiGYcLYF.ukodDS5b3B5ZtS1Rjn3yPdrzTOeoBqH.', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 73, 'achmt_yf19'),
(74, 'PTURC GLOBAL INSTITUTE OF MANAGEMENT AND EMERGING TECHNOLOGIES', NULL, 1, NULL, '$2y$10$.sIKYC0qMKDffFNX2SNPauuXhAyS7CULI7avXELbSxHvcDQAR88i2', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 74, 'pturcgimet_yf19'),
(75, 'RADICAL BUSINESS SCHOOL', NULL, 1, NULL, '$2y$10$cjYmMjBOAUy7a0TN.mtn7.iNEjYSSzs6Q/H/Ekzp.IPh8EcPGCQc.', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 75, 'rbs_yf19'),
(76, 'RADICAL TECHNICAL INSTITUTE', NULL, 1, NULL, '$2y$10$JCUH4MySR074HxrTqSlWZOdxbYtCIP/wXh9XGfvtMVk8FQIo3GpS6', NULL, '2019-10-11 16:50:57', '2019-10-11 16:50:57', 76, 'rti_yf19'),
(77, 'PTURC-Amritsar College of Engineering & Technology, Amritsar', NULL, 1, NULL, '$2y$10$GXKKgkSO96y045x6SRmMwexZwC51qhHlFXaYXD4o/aF4ocGdbIUom', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 77, 'pturcacet_yf19'),
(78, 'SAINIK INSTITUTE OF IT & MANAGEMENT,Amritsar', NULL, 1, NULL, '$2y$10$K69JNzI/5bkGi2enPVx8ZOYaZGA2X5nJaFM1p/uK.IuSaBAZ.5INe', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 78, 'siitm_yf19'),
(79, 'Khalsa College of Management & Technology,Amritsar', NULL, 1, NULL, '$2y$10$YReTQEDyZHzFZEdRIvAVBuIBMHeD8/5hY2QeJ/JaRtbHmnInMoRKi', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 79, 'kcmt_yf19'),
(80, 'BABA KUMA SINGH JI DEGREE COLLEGE,AMRITSAR', NULL, 1, NULL, '$2y$10$ODNhHMnoD57DN8UcXMjKmOlzd2eVLAJ.wJB/lSAgqRIu0qjq2IcOm', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 80, 'bksjdc_yf19'),
(81, 'Radical Business School,Amritsar', NULL, 1, NULL, '$2y$10$Ka9o0OSRCclQJ1F6VIPrwOr1SHFjErFv5JxZ.LHYh7rHQeHjwVFpS', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 81, 'rbsa_yf19'),
(82, 'Satyam Institute of Pharmaceutical Sciences & Research, Kotla Doom, Amritsar', NULL, 1, NULL, '$2y$10$T12utB6B/M/MtJgw5dj7NOA64Cvb5EHxuEFAb65YIwRDSToKIsVzW', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 82, 'sipser_yf19'),
(83, 'M.K. Institute of Management, Sohian Khurd, Amritsar', NULL, 1, NULL, '$2y$10$jRpVl/lk6W5D8tfqsf3wWOD5d.Cmnn8dwmA4aINHJypqT3Yb2D2au', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 83, 'mkim_yf19'),
(84, 'Aman Bhalla Institute of Engineering  & Technology, Jhakolari, Pathankot.', NULL, 1, NULL, '$2y$10$n2ijQ1XloPY/kPY1PCOclueoPCJ7ul0kiydhMB6q4IKFT1KYZkjnu', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 84, 'abietj_yf19'),
(85, 'A & M Institute of Computer & Technology, Pathankot', NULL, 1, NULL, '$2y$10$PGhM6IdG0vM2mnSmiq9j.e2X5zn5SR.VLVB.a91v3a76Mh4zJQ8Fi', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 85, 'amict_yf19'),
(86, 'A & M Institute of Management & Technology, Pathankot', NULL, 1, NULL, '$2y$10$B8bq0.8WyIKz1DZ6E0/A4.I05bo1/q5nBwluAz4QLTri8opRrN8kC', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 86, 'amimt_yf19'),
(87, 'Sri Sai Iqbal College of Management & Information Technology, Badhani', NULL, 1, NULL, '$2y$10$xsS6ubDON4R2ReD/GwxfteUmpfrLMuDSE/NKHhd9qtMJKm5v0a02a', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 87, 'ssicmit_yf19'),
(88, 'Shri Sai College of Pharmacy,  Badhani, Pathankot', NULL, 1, NULL, '$2y$10$urtvyEMAQQvZwCF6Ua2jTet9V0pcOlLYqurwSEcxvRGz80lfzFAY2', NULL, '2019-10-11 16:50:58', '2019-10-11 16:50:58', 88, 'sscp_yf19'),
(89, 'Sukhjinder Technical Campus, Dunera, Gurdaspur', NULL, 1, NULL, '$2y$10$rkBp1qW74c8wZkqNvzPUP.TC6QD.2NAaAW0MvqUSemWph82PLPeK2', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 89, 'stc_yf19'),
(90, 'Tawi Engineering College, Shahpur Kandi,  Gurdaspur', NULL, 1, NULL, '$2y$10$5jwAOvbASLjScksF6d/RmeOyFmLKYFs9uqquVsQOqnGX29yYV23lG', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 90, 'tec_yf19'),
(91, 'Sri Sai School of Architecture, Badhani, Pathankot', NULL, 1, NULL, '$2y$10$VpSPShi87DHFp2gqDSuJQeKEP810ebrQGEyi236IeQs7oX8MaKJDO', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 91, 'sssa_yf19'),
(92, 'Sukhjinder Institute of Computer Science & Management, Dunera, Pathankot', NULL, 1, NULL, '$2y$10$0hXcRac4fje37.2umfJny.EumeTHq74cq2/akGep6BZicd.6Om3Cu', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 92, 'sicsm_yf19'),
(93, 'Aman Bhalla Institute of Engineering & Technology', NULL, 1, NULL, '$2y$10$Yzqf0ZoNAWU0EuPuGRjQNOOuxkvQdbyiuTYDV9VeDfDfceU8rhwb2', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 93, 'abiet_yf19'),
(94, 'AMAN BHALLA INSTITUTE OF MANAGEMENT', NULL, 1, NULL, '$2y$10$VrIG2B04K91mX1a1skGX3uWNzpKOvDQgseuqPuFQlQjOo9jRbxZne', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 94, 'abim_yf19'),
(95, 'Shiv Shankar Institute of Engineering  & Tech, Patti', NULL, 1, NULL, '$2y$10$P16Wie0o2RH2h2AQTU8aW.zcn.MGaitZ52mlVwhjG0m/A6ugUD3Ju', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 95, 'shsiet_yf19'),
(96, 'Shaheed Bhagat Singh Polytechnic & Pharmacy College, Patti', NULL, 1, NULL, '$2y$10$hQJ82ULpamOlYKXxx5zhQ.D9PHbaHzJlgqqr/iqcJ7zV6r8W5DSZ2', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 96, 'sbsppc_yf19'),
(97, 'CKD Institute of Management & Technology,Tarn Taran', NULL, 1, NULL, '$2y$10$Nik56xEklN7q7q.7iv2JdeHAag3v0ZlleflMWJZaM/hUSuRVaY1hu', NULL, '2019-10-11 16:50:59', '2019-10-11 16:50:59', 97, 'ckdimt_yf19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_relations`
--
ALTER TABLE `event_relations`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `event_relations`
--
ALTER TABLE `event_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
