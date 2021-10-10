-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2021 at 04:10 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enternal_hms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `details`, `created_at`, `updated_at`) VALUES
(1, '<h3><br></h3>', '2020-12-29 06:51:08', '2020-12-29 00:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` char(100) NOT NULL,
  `address` text,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `p_insert` int(11) DEFAULT '0',
  `p_update` int(11) DEFAULT '0',
  `p_delete` int(11) DEFAULT '0',
  `p_approve` int(11) DEFAULT '0',
  `image` varchar(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `address`, `role`, `status`, `p_insert`, `p_update`, `p_delete`, `p_approve`, `image`, `created_at`, `updated_at`) VALUES
(64, 'Admin', 'admin@gmail.com', '1747060854', '$2y$10$xap08zmX46fhOBvwbc4Kd.NBnsXtwEdRHZUvzmorG7CZw/UGgqgk2', 'Dhaka Bangladesh', 3, 1, 1, 1, 1, 1, 'jpg', '2021-04-30 11:02:43', '2021-05-24 19:27:53'),
(65, 'Masnun Shikdar', 'masnun@gmail.com', NULL, '$2y$10$keB4FlgHK.hpcHESw9sjMuAMENrteIqq11CW1MOL9BrPJiOzg5/k.', NULL, 3, 1, 1, 1, NULL, 1, 'png', '2021-04-30 22:27:44', '2021-06-09 02:29:15'),
(68, 'BRIG. GEN. (DR.) NURUN NAHAR F', 'nurun.nahar@gmail.com', '+880134353343', '$2y$10$Npm5oOEMmkTselgwzBvxxut3DOIlq1g2oIT1rxSwiO/hbzAO1m9xe', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '2021-04-30 22:45:48', '2021-04-30 22:45:48'),
(69, 'Dr. Tanjima Parvin', 'tanjimaparvin@gmail.com', '+880162002545', '$2y$10$z2IuuMkV/EZxAgnmB96kKuMRpDSXvwCKXxGV9cmFZ8s4.537cH1oO', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, '2021-04-30 22:48:51', '2021-04-30 22:48:51'),
(70, 'Dr. Lutfar Rahman', 'drlutfar@gmail.com', '01915353289', '$2y$10$M5j7DEC/n4eJyhaAyNj4zOsqQ6LIwrKJrUCO09Ja2Bff.KY2/Y3Z.', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-04-30 22:54:32', '2021-04-30 22:54:32'),
(71, 'Dr. Lutfar Rahman', 'drlutfar@gmail.com', '01915353289', '$2y$10$YK2Ecqnoq4lAQ6P1F9pKqu4/WUdEZeFwi09psbeSXPfyQ2AAowl9G', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-04-30 22:55:16', '2021-04-30 22:55:16'),
(72, 'mk-hospital', 'mahmudsujan490@gmail.com', '224234', '$2y$10$ylx8kBtJIVv.7hnzrsdoluNR2COvekHqpbneCH2UCh/LTS9plGrv.', NULL, 2, 1, 1, 1, 1, 1, NULL, '2021-04-30 22:59:03', '2021-04-30 22:59:03'),
(73, 'mk-hospital', 'mahmudsujan490@gmail.com', '224234', '$2y$10$o5QVh4MSutsmRK6VjrFBHuBul/CvojLyBWbqJSFRw3oBJrKMna27e', NULL, 2, 1, 1, 1, NULL, NULL, NULL, '2021-04-30 23:04:37', '2021-04-30 23:04:37'),
(74, 'mk-hospital', 'admwqin@gmail.com', '224234', '$2y$10$l2YTXSVr5SUOCNvySDY0ceNVZJj0pCFmIar9ZUfstF88ZWVvbrGWK', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-04-30 23:06:35', '2021-04-30 23:06:35'),
(75, 'Prof. Dr. Pran Gopal Datta', 'pran.golap@gmail.com', '015666669456', '$2y$10$19MYmcb7zaghkpevSfs7ku9cY7T/1.yQuHr2MeNad4g.yA1gpeVfS', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-05-01 07:05:24', '2021-05-01 07:05:24'),
(76, 'Prof. Dr. Syed Atiqul Haq', 'atik@gmail.com', '+8801916267769', '$2y$10$0kIfGNrwZEaxave4eeerj.XUWh5tGOFu9ruQMNMepjDTNPGLeGaeC', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-05-01 07:07:20', '2021-05-01 07:07:20'),
(77, 'Male Doctor Prof. Dr. M.N. Hud', 'huda.ddhmu@gmail.com', '+8809613787805', '$2y$10$D9iX7oPwvxNDwU6vy5/R7O09hGMdsN0qMWcQyVntE6HNTDNdJdeda', NULL, 2, 1, 1, 1, NULL, 1, NULL, '2021-05-01 07:11:36', '2021-05-01 07:11:36'),
(78, 'Dr. Shamim Boksha', 'shamim.nu@gmail.com', '+8801826691155', '$2y$10$UOJbvjIzaQ9pEY0Dpr1RduRm8JSF34bEFbu0n7X5tt5wNxkDp8Rmq', NULL, 2, 1, 1, 1, NULL, 1, NULL, '2021-05-01 07:13:55', '2021-05-01 07:13:55'),
(79, 'Prof. Dr. R. R. Kairy', 'kairy@gmail.com', '+8801618800088', '$2y$10$ks0Hig5QWTzav8Ws4tyu5.GPP/t.q6WYd3cSk5R4NYYHXxDWKqZhq', NULL, 2, 1, 1, 1, NULL, 1, NULL, '2021-05-01 07:15:55', '2021-05-01 07:15:55'),
(80, 'Prof. Dr. Md. Hafizur Rahman', 'hafizur@gmail.com', '+8809613787805', '$2y$10$E7RTMidqR9YtpKipzrK0Rey6MKzX7jFW7DTsPjpZW6IcBqwPPPh1q', NULL, 2, 1, 1, 1, 1, 1, NULL, '2021-05-01 07:17:04', '2021-05-01 07:17:04'),
(81, 'Prof. Lt. Col. Dr. Md. Abdul W', 'abdul.wahab.bmu@gmail.com', '10606', '$2y$10$CG6bJ.KqtaSQpuivLFnNA.x9wnbA9mn8iwiEar8yZo3zWpzqphlj.', NULL, 2, 1, 1, 1, 1, 1, NULL, '2021-05-01 07:18:07', '2021-05-01 07:18:07'),
(84, 'Dr. Atif', 'atif@gmail.com', '01915353289', '$2y$10$MvX6GKV2b4CTZrXhEUdUuewCeu4KTZMHYcdpVcvPgut6SFeLIEKd6', NULL, 2, 1, 1, 1, 1, NULL, NULL, '2021-05-02 03:43:00', '2021-05-02 03:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED DEFAULT NULL,
  `doctor_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `speciality_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `checkup_date` varchar(100) DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(100) DEFAULT 'Remarks Will Appear Here',
  `amount` float(10,2) UNSIGNED DEFAULT '0.00',
  `payment_id` tinyint(3) UNSIGNED DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `doctor_id`, `speciality_id`, `checkup_date`, `booking_date`, `remarks`, `amount`, `payment_id`, `status`, `date`, `type`, `created_at`, `updated_at`) VALUES
(193, 211, 43, 11, '2021-05-02', '2021-05-01 14:31:06', 'Paid', 1200.00, 1, 2, NULL, 0, '2021-05-02 01:31:06', '2021-05-02 01:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` text,
  `user_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `details`, `user_id`, `amount`, `status`, `date`, `created_at`, `updated_at`) VALUES
(20, 'Medicine', 204, 5000.00, 1, '2021-05-22', '2021-05-22 15:23:14', '2021-05-22 15:23:14'),
(22, 'med', 208, 20000.00, 1, '2021-05-24', '2021-05-24 19:35:26', '2021-05-24 19:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(8, 'sujan', 'sujan@gmail.com', '8909844098100', 'dhaka bangladesh', '2021-04-24 07:21:07', '2021-04-24 07:21:07'),
(9, 'sujan', 'sujan@gmail.com', '8909801298101', 'dhaka bangladesh', '2021-04-24 07:21:07', '2021-04-24 07:21:07'),
(10, 'asa', 'admin@gmail.com12', '123123123111', 'Dasher', '2021-04-24 07:21:07', '2021-04-24 07:21:07'),
(11, 'Customer 1', 'customer@gmal.com', '01915353289', 'dsD', '2021-05-22 20:34:02', '2021-05-22 20:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Digital Diagnostic Center1112', 1, '2021-04-26 17:15:54', '2021-04-27 04:15:54'),
(2, 'ASADWDD', 1, '2021-04-24 06:35:18', '2021-04-24 06:35:18'),
(5, 'ADMINISTRATION', 1, '2021-05-01 03:03:19', '2021-05-01 03:03:19'),
(6, 'FINANCE', 1, '2021-05-01 03:03:29', '2021-05-01 03:03:29'),
(7, 'HUMAN RESOURCES', 1, '2021-05-01 03:03:40', '2021-05-01 03:03:40'),
(8, 'INFORMATION TECHNOLOGY & COMMUNICATION', 1, '2021-05-01 03:03:51', '2021-05-01 03:03:51'),
(9, 'MEDICAL MAINTENANCE & ENGINEERING', 1, '2021-05-01 03:04:00', '2021-05-01 03:04:00'),
(10, 'MEDICAL RECORDS', 1, '2021-05-01 03:04:09', '2021-05-01 03:04:09'),
(11, 'DIAGNOSTIC IMAGING', 1, '2021-05-01 03:04:25', '2021-05-01 03:04:25'),
(12, 'NUTRITION AND DIETITICS', 1, '2021-05-01 03:04:32', '2021-05-01 03:04:32'),
(13, 'PHARMACY', 1, '2021-05-01 03:04:40', '2021-05-01 03:04:40'),
(14, 'CATERING AND FOOD SERVICES', 1, '2021-05-01 03:04:51', '2021-05-01 03:04:51'),
(15, 'MEDICAL SOCIAL WORK', 1, '2021-05-01 03:04:56', '2021-05-01 03:04:56'),
(16, 'PHYSIOTHERAPY', 1, '2021-05-01 03:05:05', '2021-05-01 03:05:05'),
(17, 'CENTRAL STERILIZATION UNIT', 1, '2021-05-01 03:05:33', '2021-05-01 03:05:33'),
(18, 'INPATIENT', 1, '2021-05-01 03:05:47', '2021-05-01 03:05:47'),
(19, 'OUTPATIENT', 1, '2021-05-01 03:05:54', '2021-05-01 03:05:54'),
(20, 'PSYCHIATRY', 1, '2021-05-01 03:06:00', '2021-05-01 03:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Account Executive', 1, '2021-05-01 02:36:50', '2021-05-01 02:36:50'),
(7, 'Account Manager', 1, '2021-05-01 02:36:56', '2021-05-01 02:36:56'),
(8, 'Accountant', 1, '2021-05-01 02:37:00', '2021-05-01 02:37:00'),
(9, 'Accounting Clerk', 1, '2021-05-01 02:37:05', '2021-05-01 02:37:05'),
(10, 'Accounting Manager', 1, '2021-05-01 02:37:11', '2021-05-01 02:37:11'),
(11, 'Administrative Assistant', 1, '2021-05-01 02:37:15', '2021-05-01 02:37:15'),
(12, 'Administrative Medical Assistant', 1, '2021-05-01 02:37:20', '2021-05-01 02:37:20'),
(13, 'Administrator', 1, '2021-05-01 02:37:25', '2021-05-01 02:37:25'),
(14, 'Admissions Clerk', 1, '2021-05-01 02:37:28', '2021-05-01 02:37:28'),
(15, 'Admissions Director', 1, '2021-05-01 02:37:33', '2021-05-01 02:37:33'),
(16, 'Analyst', 1, '2021-05-01 02:37:36', '2021-05-01 02:37:36'),
(17, 'Assistant Administrator', 1, '2021-05-01 02:37:43', '2021-05-01 02:37:43'),
(18, 'Assistant Admissions Director', 1, '2021-05-01 02:37:47', '2021-05-01 02:37:47'),
(19, 'Assistant Director of Nursing', 1, '2021-05-01 02:37:54', '2021-05-01 02:37:54'),
(20, 'Bereavement Coordinator', 1, '2021-05-01 02:38:04', '2021-05-01 02:38:04'),
(21, 'Billing Manager', 1, '2021-05-01 02:38:10', '2021-05-01 02:38:10'),
(22, 'Business Analyst', 1, '2021-05-01 02:38:15', '2021-05-01 02:38:15'),
(23, 'Chief Financial Officer', 1, '2021-05-01 02:38:20', '2021-05-01 02:38:20'),
(24, 'Claims Specialist', 1, '2021-05-01 02:38:27', '2021-05-01 02:38:27'),
(25, 'Clinical Coordinator, Recovery Services', 1, '2021-05-01 02:38:35', '2021-05-01 02:38:35'),
(26, 'Computer Analyst', 1, '2021-05-01 02:38:42', '2021-05-01 02:38:42'),
(27, 'Computer Programmer', 1, '2021-05-01 02:38:47', '2021-05-01 02:38:47'),
(28, 'Consultant', 1, '2021-05-01 02:38:52', '2021-05-01 02:38:52'),
(29, 'Coordinator', 1, '2021-05-01 02:38:56', '2021-05-01 02:38:56'),
(30, 'Customer Service Representative', 1, '2021-05-01 02:39:00', '2021-05-01 02:39:00'),
(31, 'Director of Nursing', 1, '2021-05-01 02:39:05', '2021-05-01 02:39:05'),
(32, 'Executive Assistant', 1, '2021-05-01 02:39:12', '2021-05-01 02:39:12'),
(33, 'Executive Director', 1, '2021-05-01 02:39:17', '2021-05-01 02:39:17'),
(34, 'Financial Analyst', 1, '2021-05-01 02:39:22', '2021-05-01 02:39:22'),
(35, 'Front Office Clerk', 1, '2021-05-01 02:39:28', '2021-05-01 02:39:28'),
(36, 'Office Assistant', 1, '2021-05-01 02:39:38', '2021-05-01 02:39:38'),
(37, 'Office Clerk', 1, '2021-05-01 02:39:42', '2021-05-01 02:39:42'),
(38, 'Office Manager', 1, '2021-05-01 02:40:15', '2021-05-01 02:40:15'),
(39, 'Operations Manager', 1, '2021-05-01 02:40:21', '2021-05-01 02:40:21'),
(40, 'Program Director', 1, '2021-05-01 02:41:05', '2021-05-01 02:41:05'),
(41, 'Program Manager', 1, '2021-05-01 02:41:13', '2021-05-01 02:41:13'),
(42, 'Project Manager', 1, '2021-05-01 02:41:31', '2021-05-01 02:41:31'),
(43, 'Receptionist', 1, '2021-05-01 02:41:49', '2021-05-01 02:41:49'),
(44, 'Recruiter', 1, '2021-05-01 02:41:54', '2021-05-01 02:41:54'),
(45, 'Recruiter', 1, '2021-05-01 02:44:22', '2021-05-01 02:44:22'),
(46, 'Sales Associate', 1, '2021-05-01 02:44:31', '2021-05-01 02:44:31'),
(47, 'Sales Manager', 1, '2021-05-01 02:46:20', '2021-05-01 02:46:20'),
(48, 'Sales Representative', 1, '2021-05-01 02:46:26', '2021-05-01 02:46:26'),
(49, 'Secretary', 1, '2021-05-01 02:46:31', '2021-05-01 02:46:31'),
(50, 'Senior Programmer Analyst', 1, '2021-05-01 02:46:39', '2021-05-01 02:46:39'),
(51, 'Social Services', 1, '2021-05-01 02:46:46', '2021-05-01 02:46:46'),
(52, 'Staffing Coordinator', 1, '2021-05-01 02:46:56', '2021-05-01 02:46:56'),
(53, 'Supervisor', 1, '2021-05-01 02:47:04', '2021-05-01 02:47:04'),
(54, 'Transcriptionist', 1, '2021-05-01 02:47:09', '2021-05-01 02:47:09'),
(55, 'Quality Coordinator', 1, '2021-05-01 02:47:33', '2021-05-01 02:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT 'jpg',
  `image` varchar(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `user_id`, `speciality_id`, `email`, `phone`, `password`, `organization`, `designation`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(34, 'BRIG. GEN. (DR.) NURUN NAHAR F', 68, 29, 'nurun.nahar@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-04-30 12:03:04', '2021-04-30 22:45:48'),
(35, 'Dr. Tanjima Parvin', 69, 30, 'tanjimaparvin@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-04-30 12:03:09', '2021-04-30 22:48:51'),
(36, 'Dr. Lutfar Rahman', 70, 31, 'drlutfar@gmail.com', NULL, NULL, NULL, NULL, 'jpg', '', 0, '2021-04-30 12:03:12', '2021-04-30 22:54:32'),
(37, 'Dr. Lutfar Rahman', 71, 32, 'drlutfar@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-04-30 12:03:15', '2021-04-30 22:55:16'),
(41, 'Prof. Dr. Pran Gopal Datta', 75, 19, 'pran.golap@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-05-01 07:05:24', '2021-05-01 07:05:24'),
(42, 'Prof. Dr. Syed Atiqul Haq', 76, 32, 'atik@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-05-01 07:07:20', '2021-05-01 07:07:20'),
(43, 'Male Doctor Prof. Dr. M.N. Hud', 77, 11, 'huda.ddhmu@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-05-01 07:11:36', '2021-05-01 07:11:36'),
(44, 'Dr. Shamim Boksha', 78, 14, 'shamim.nu@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-05-01 07:13:55', '2021-05-01 07:13:55'),
(45, 'Prof. Dr. R. R. Kairy', 79, 25, 'kairy@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 1, '2021-04-30 22:27:37', '2021-05-01 09:27:37'),
(46, 'Prof. Dr. Md. Hafizur Rahman', 80, 17, 'hafizur@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-04-30 22:27:24', '2021-05-01 09:27:24'),
(47, 'Prof. Lt. Col. Dr. Md. Abdul W', 81, 25, 'abdul.wahab.bmu@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'jpg', 0, '2021-04-30 22:27:02', '2021-05-01 09:27:02'),
(48, 'Dr. Atif', 84, 32, 'atif@gmail.com', NULL, NULL, NULL, NULL, 'jpg', 'png', 0, '2021-05-02 03:43:00', '2021-05-02 03:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(14, 'SSC', 1, '2021-04-28 03:29:14', '2021-04-28 03:29:14'),
(15, 'HSC', 0, '2021-04-27 16:45:39', '2021-04-28 03:45:39'),
(16, 'DIPLOMA', 1, '2021-04-28 03:29:14', '2021-04-28 03:29:14'),
(17, 'BSC/BBA', 1, '2021-05-01 02:48:43', '2021-05-01 02:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `religion` int(11) NOT NULL,
  `address` text NOT NULL,
  `last_education` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `maritial_status` int(11) NOT NULL,
  `image` varchar(4) NOT NULL,
  `joining_date` date NOT NULL,
  `department` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `salary` float(10,2) NOT NULL,
  `increment_details` text NOT NULL,
  `emergency_name` varchar(50) NOT NULL,
  `emergency_phone` varchar(50) NOT NULL,
  `emergency_address` text NOT NULL,
  `bank_name` varchar(155) DEFAULT NULL,
  `bank_number` varchar(155) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `slug`, `email`, `phone`, `nid`, `dob`, `gender`, `religion`, `address`, `last_education`, `result`, `maritial_status`, `image`, `joining_date`, `department`, `designation`, `salary`, `increment_details`, `emergency_name`, `emergency_phone`, `emergency_address`, `bank_name`, `bank_number`, `bank_branch`, `status`, `created_at`, `updated_at`) VALUES
(4, 'AboriginalorTorres', 'aboriginalortorres', 'admin@gmail.com', '121231', '123123', '2021-04-16', 1, 1, 'sdfsdf', 4, 1212, 2, 'jpg', '2021-04-21', 1, 4, 231232.00, 'asasdsad', 'asdad', '1212131233123', 'Dasher', 'asdads12', 'asdasdas', 'qadasdsad', 1, '2021-04-27 05:11:29', NULL),
(5, 'K M Sadat Samin', 'k-m-sadat-samin', 'kmsadat.samin.official@gmail.com', '+8801979974777', '24051122455', '1997-12-04', 1, 1, 'Mohammadpur ,Dhaka', 17, 4, 1, 'jpg', '2007-05-01', 5, 40, 25000.00, '1200', 'Mahfuza Parveen', '01946428655', 'Mohammadpur ,Dhaka', 'Datch Bangla Bank', '12256212552525525', 'Dhanmondi', 1, '2021-04-30 16:08:23', NULL),
(6, 'Zakir Nayek', 'zakir-nayek', 'hamdak.zaaakir@gmail.com', '0189656325', '2563321578', '1965-12-25', 1, 1, 'dhanmondi, dhaka', 16, 2, 1, 'jpg', '2001-10-10', 6, 34, 54000.00, '1200', 'mionoin', '01451589652', 'Mohammadpur ,Dhaka', 'Datch Bangla Bank', '21045656846846', 'Dhanmondi', 1, '2021-04-30 16:15:49', NULL),
(8, 'Imrul Sheikh', 'imrul-sheikh', 'sheikh.imrul@gmail.com', '0198745633', '7893577896', '1993-03-10', 1, 1, 'Bisankandi , Shylet', 17, 3, 1, 'jfif', '2010-01-01', 5, 49, 45000.00, '10000', 'Mahuba Hasan', '01369852656', 'Jomirboshir ,Shylet', 'United Commercial Bank', '2113213546546879756431', 'Shylet', 1, '2021-04-30 18:15:54', NULL),
(10, 'Rifat Tabassum', 'rifat-tabassum', 'rifat1995@gmail.com', '0196585669', '2142255698', '1995-08-12', 1, 1, 'ghulshan, dhaka', 17, 4, 1, 'jpg', '2015-09-01', 8, 45, 12000.00, '1000', 'Masduda akhter', '01786598659', 'Hajidanesh, Dinajpur', 'Eastern Bank', '465465423131235465', 'Dhanmondi', 1, '2021-04-30 18:16:54', NULL),
(11, 'Talukder Shathi', 'talukder-shathi', 'Shathi.99@gmail.com', '01789652366', '13254899632', '1995-04-15', 2, 1, 'Jhigatola,Dhanmondi,Dhaka', 17, 4, 2, 'jpg', '2009-01-01', 6, 47, 55000.00, '20000', 'Bomkesh', '0156985632', 'Jhigatola,Dhanmondi', 'Datch Bangla Bank', '012131256464879845', 'New Market', 1, '2021-04-30 18:23:38', NULL),
(12, 'Jalal Islam', 'jalal-islam', 'jalal.islam@gmail.com', '017895465165', '1223465489', '1995-02-12', 1, 1, 'Asshulia, Dhaka', 15, 4, 1, 'jpeg', '2011-01-10', 7, 44, 15000.00, '1000', 'Armini  Jolil', '01789562355', 'Mohammadpur ,Dhaka', 'United Commercial Bank', '023131516515616', 'Shylet', 1, '2021-04-30 18:35:05', NULL),
(13, 'Ashrafia Mohammad', 'ashrafia-mohammad', 'mohammad.123@gmail.com', '01654789655', '2152536695', '1994-01-14', 1, 1, 'Dharusalam,DHaka', 17, 3, 1, 'jpeg', '2015-01-01', 10, 36, 15000.00, '1000', 'Mohammad ALi', '0178568965', 'Darussalam, Dhaka', 'First Islami Security Bank', '754186526548', 'Dhanmondi', 1, '2021-04-30 18:39:10', NULL),
(14, 'Anwar Hossain', 'anwar-hossain', 'anwar.hossain@gmmail.com', '0145698569', '1204205642', '1992-09-16', 1, 1, 'Jharkhannd , DHaka', 17, 3, 1, 'jfif', '2001-01-10', 5, 49, 15000.00, '1200', 'Mustafiz Ahmed', '0168956899', 'Jharkhand,DHaka', 'United Commercial Bank', '0186554795', 'Shylet', 1, '2021-05-01 13:27:39', NULL),
(15, 'Anwar Hossain', 'anwar-hossain', 'anwar.hossain@gmmail.com', '0145698569', '1204205642', '1992-09-16', 1, 1, 'Jharkhannd , DHaka', 17, 3, 1, 'jpg', '2001-01-10', 5, 49, 15000.00, '1200', 'Mustafiz Ahmed', '0168956899', 'Jharkhand,DHaka', 'United Commercial Bank', '0186554795', 'Shylet', 1, '2021-05-01 13:28:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medex`
--

CREATE TABLE `medex` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dosage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strength` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medex`
--

INSERT INTO `medex` (`id`, `title`, `unit_price`, `stock`, `dosage`, `strength`, `generic`, `company`, `status`, `created_at`, `updated_at`) VALUES
(3620, 'Flexi®', '20', '350', 'Flexi: 100 mg twice daily; Flexi SR: 200 mg once daily.', 'Flexi Tablet: Box containing 10 x 10 tablets in Alu-Alu blister pack;', 'Aceclofenac', 'Squre', 1, '2021-05-01 06:09:24', '2021-05-03 15:23:39'),
(3621, 'Tylace™', '122', '150', 'Adults and children over 6 years: 1 Tablet daily', 'Initially 140 mg/kg, followed by 70 mg/kg in every 4 hours for an additional 17 doses', 'Acetylcysteine USP', 'Squre', 1, '2021-05-01 06:10:56', '2021-05-01 06:10:56'),
(3622, 'Virux®', '200', '75', 'reatment of initial herpes simplex: 200 mg 5 times daily usually for 5 days.', 'Virux® tablet : Box containing 3 x 10 tablets in blister pack.', 'Aciclovir', 'Squre', 1, '2021-05-01 06:12:21', '2021-05-01 06:12:21'),
(3623, 'Flexilax®', '300', '10', 'Flexilax® (Baclofen) should be given in divided doses preferably 3 times daily for adults and 4 time', 'Flexi Tablet: Box containing 10 x 10 tablets in Alu-Alu blister pack;', 'Baclofen Muscle Relaxant (CNS Prepar', 'Squre', 1, '2021-05-01 06:16:47', '2021-05-01 06:16:47'),
(3624, 'BenostarTM Mouthwash', '45', '91', '15 ml of Benostar mouthwash should be rinsed or gargled every 1.5–3 hours or as required, for 20-30 ', 'BenostarTM mouthwash 250 ml: Each PET bottle contains 250 ml mouthwash with a measuring cup.', 'Benzydamine Hydrochloride BP', 'Squre', 1, '2021-05-01 06:18:49', '2021-05-02 01:46:09'),
(3625, 'Eylea', '1240', '10', '00', '00', 'Regeneron Pharmaceuticals, Inc.', 'aflibercept', 1, '2021-05-01 06:21:04', '2021-05-01 06:21:04'),
(3626, 'Erwinaze', '450', '12', '00', '00', 'asparaginase Erwinia chrysanthemi', 'EUSA Pharma Inc.', 1, '2021-05-01 06:22:41', '2021-05-01 06:22:41'),
(3627, 'Acical-MX', '200', '119', '00', '00', 'Calcium Carbonate + Vitamin D3 + Multimineral', 'ACI', 1, '2021-05-01 06:31:33', '2021-05-02 03:50:16'),
(3628, 'Abaclor Capsule', '40', '2', '00', '00', 'Cefaclor Monohydrate', 'ACI', 1, '2021-05-01 06:34:07', '2021-08-12 22:53:32'),
(3629, 'Abixa Tablet', '8', '998', '00', '00', 'Memantine Hydrochloride', 'ACI', 1, '2021-05-01 06:35:14', '2021-05-02 03:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_orders`
--

CREATE TABLE `medicine_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` float(10,2) NOT NULL,
  `tax` float(10,2) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_orders`
--

INSERT INTO `medicine_orders` (`id`, `customer_id`, `total`, `tax`, `subtotal`, `date`, `created_at`, `updated_at`) VALUES
(45, 8, 695.75, 90.75, 605.00, '2021-05-01', '2021-05-02 01:46:09', '2021-05-02 01:46:09'),
(46, 9, 239.20, 31.20, 208.00, '2021-05-01', '2021-05-02 02:59:21', '2021-05-02 02:59:21'),
(47, 8, 469.20, 61.20, 408.00, '2021-05-01', '2021-05-02 03:50:16', '2021-05-02 03:50:16'),
(48, 11, 184.00, 24.00, 160.00, '2021-05-22', '2021-05-22 20:35:17', '2021-05-22 20:35:17'),
(49, 8, 184.00, 24.00, 160.00, '2021-08-12', '2021-08-12 22:53:32', '2021-08-12 22:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `stock_history` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`id`, `medicine_id`, `stock_history`, `created_at`, `updated_at`) VALUES
(7, 3620, '2021-05-01=100,2021-05-01=200,2021-05-03=50', '2021-05-03 04:23:39', '2021-05-03 10:23:39'),
(8, 3621, '2021-05-01=150', '2021-05-01 06:10:56', '2021-05-01 01:10:56'),
(9, 3622, '2021-05-01=75', '2021-05-01 06:12:21', '2021-05-01 01:12:21'),
(10, 3623, '2021-05-01=10', '2021-05-01 06:16:47', '2021-05-01 01:16:47'),
(11, 3624, '2021-05-01=100,2021-05-01=9', '2021-05-01 14:46:09', '2021-05-01 20:46:09'),
(12, 3625, '2021-05-01=10', '2021-05-01 06:21:04', '2021-05-01 01:21:04'),
(13, 3626, '2021-05-01=12', '2021-05-01 06:22:41', '2021-05-01 01:22:41'),
(14, 3627, '2021-05-01=122,2021-05-01=1,2021-05-01=2', '2021-05-01 16:50:16', '2021-05-01 22:50:16'),
(15, 3628, '2021-05-01=15,2021-05-01=5,2021-05-22=4,2021-08-12=4', '2021-08-12 11:53:32', '2021-08-12 17:53:32'),
(16, 3629, '2021-05-01=1000,2021-05-01=1,2021-05-01=1', '2021-05-01 16:50:16', '2021-05-01 22:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `medicine_id`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(100, 45, 3628, 5, 40.00, 200.00, '2021-05-02 01:46:09', '2021-05-02 01:46:09'),
(101, 45, 3624, 9, 45.00, 405.00, '2021-05-02 01:46:09', '2021-05-02 01:46:09'),
(102, 46, 3629, 1, 8.00, 8.00, '2021-05-02 02:59:21', '2021-05-02 02:59:21'),
(103, 46, 3627, 1, 200.00, 200.00, '2021-05-02 02:59:21', '2021-05-02 02:59:21'),
(104, 47, 3627, 2, 200.00, 400.00, '2021-05-02 03:50:16', '2021-05-02 03:50:16'),
(105, 47, 3629, 1, 8.00, 8.00, '2021-05-02 03:50:16', '2021-05-02 03:50:16'),
(106, 48, 3628, 4, 40.00, 160.00, '2021-05-22 20:35:17', '2021-05-22 20:35:17'),
(107, 49, 3628, 4, 40.00, 160.00, '2021-08-12 22:53:32', '2021-08-12 22:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `type`, `amount`, `user_id`, `date`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 100000.00, 207, '2021-05-01', 'Paid', 1, '2021-05-22 04:11:28', '2021-05-01 07:50:14'),
(10, 2, 99999999.99, 208, '2021-05-01', 'Paid', 1, '2021-05-22 04:11:38', '2021-05-01 07:54:47'),
(11, 1, 10000000.00, 209, '2021-05-01', 'Paid', 1, '2021-05-22 04:11:45', '2021-05-01 08:07:31'),
(12, 1, 123400.00, 210, '2021-05-01', 'Paid', 1, '2021-05-22 04:11:58', '2021-05-01 21:01:07'),
(13, 1, 7000.00, 212, '2021-05-01', NULL, 1, '2021-05-22 04:12:02', '2021-05-02 01:39:23'),
(14, 1, 7000.00, 207, '2021-05-01', 'advance', 1, '2021-05-22 04:12:06', '2021-05-02 01:41:07'),
(15, 1, 100000.00, 207, '2021-05-01', 'Advanced', 1, '2021-05-22 04:12:11', '2021-05-02 03:45:46'),
(17, 1, 5000.00, 204, '2021-05-22', 'Medicine', 1, '2021-05-22 15:23:07', '2021-05-22 15:23:07'),
(20, 2, 2000.00, 204, '2021-05-24', 'paid', 1, '2021-05-24 19:31:46', '2021-05-24 19:31:46'),
(21, 2, 2000.00, 204, '2021-05-24', 'paid', 1, '2021-05-24 19:32:00', '2021-05-24 19:32:00'),
(22, 1, 2000.00, 208, '2021-05-24', 'paid', 1, '2021-05-24 19:34:57', '2021-05-24 19:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(255) DEFAULT NULL,
  `schedule` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `details` text,
  `map` text,
  `logo` varchar(4) DEFAULT NULL,
  `ficon` varchar(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `cc`, `bcc`, `schedule`, `phone`, `address`, `details`, `map`, `logo`, `ficon`, `created_at`, `updated_at`) VALUES
(1, 'info@hms.com', 'info@hms.com', 'info@hms.com', '24/7 Hr', '7678678687', 'Dhaka Bangladesh', NULL, NULL, 'png', 'png', '2021-05-24 08:26:37', '2021-05-24 19:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Allergists/Immunologists', 1, '2021-04-30 22:34:11', '2021-04-30 22:34:11'),
(8, 'Anesthesiologists', 1, '2021-04-30 22:35:40', '2021-04-30 22:35:40'),
(9, 'Cardiologists', 1, '2021-04-30 22:35:47', '2021-04-30 22:35:47'),
(10, 'Critical Care Medicine Specialists', 1, '2021-04-30 22:36:02', '2021-04-30 22:36:02'),
(11, 'Dermatologists', 1, '2021-04-30 22:36:09', '2021-04-30 22:36:09'),
(12, 'Endocrinologists', 1, '2021-04-30 22:36:20', '2021-04-30 22:36:20'),
(13, 'Emergency Medicine Specialists', 1, '2021-04-30 22:36:30', '2021-04-30 22:36:30'),
(14, 'Gastroenterologists', 1, '2021-04-30 22:36:39', '2021-04-30 22:36:39'),
(15, 'Geriatric Medicine Specialists', 1, '2021-04-30 22:36:55', '2021-04-30 22:36:55'),
(16, 'Gynecologists\'', 1, '2021-04-30 22:37:42', '2021-04-30 22:37:42'),
(17, 'Hospice and Palliative Medicine Specialists', 1, '2021-04-30 22:38:41', '2021-04-30 22:38:41'),
(18, 'Infectious Disease Specialists', 1, '2021-04-30 22:38:52', '2021-04-30 22:38:52'),
(19, 'Internists', 1, '2021-04-30 22:39:03', '2021-04-30 22:39:03'),
(20, 'Nephrologists', 1, '2021-04-30 22:39:09', '2021-04-30 22:39:09'),
(21, 'Neurologists', 1, '2021-04-30 22:39:16', '2021-04-30 22:39:16'),
(22, 'Obstetricians and Gynecologists', 1, '2021-04-30 22:39:32', '2021-04-30 22:39:32'),
(23, 'Oncologists', 1, '2021-04-30 22:39:39', '2021-04-30 22:39:39'),
(24, 'Ophthalmologists', 1, '2021-04-30 22:39:46', '2021-04-30 22:39:46'),
(25, 'Otolaryngologists', 1, '2021-04-30 22:39:54', '2021-04-30 22:39:54'),
(26, 'Pathologists', 1, '2021-04-30 22:40:01', '2021-04-30 22:40:01'),
(27, 'Pediatricians', 1, '2021-04-30 22:40:06', '2021-04-30 22:40:06'),
(28, 'Physiatrists', 1, '2021-04-30 22:40:12', '2021-04-30 22:40:12'),
(29, 'Plastic Surgeons', 1, '2021-04-30 22:40:19', '2021-04-30 22:40:19'),
(30, 'Preventive Medicine Specialists', 1, '2021-04-30 22:40:28', '2021-04-30 22:40:28'),
(31, 'Radiologists', 1, '2021-04-30 22:40:38', '2021-04-30 22:40:38'),
(32, 'Rheumatologists', 1, '2021-04-30 22:40:52', '2021-04-30 22:40:52'),
(33, 'Urologists', 1, '2021-04-30 22:41:05', '2021-04-30 22:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$OVLFJJYQ6JuBV3JCVlxK0O1fWyrerl9XHxiu1pBpAWvfN0wdafRrW',
  `gender_id` tinyint(4) NOT NULL DEFAULT '1',
  `age` tinyint(4) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `maritial_status` int(11) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `medical_history` text,
  `relation` int(11) DEFAULT NULL,
  `guarantor_name` varchar(100) DEFAULT NULL,
  `guarantor_phone` varchar(100) DEFAULT NULL,
  `guarantor_address` varchar(100) DEFAULT NULL,
  `emergency_name` varchar(100) DEFAULT NULL,
  `emergency_phone` varchar(100) DEFAULT NULL,
  `emergency_address` varchar(100) DEFAULT NULL,
  `discharge` date DEFAULT NULL,
  `image` varchar(4) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `gender_id`, `age`, `religion`, `maritial_status`, `nid`, `medical_history`, `relation`, `guarantor_name`, `guarantor_phone`, `guarantor_address`, `emergency_name`, `emergency_phone`, `emergency_address`, `discharge`, `image`, `ward_id`, `status`, `date`, `type`, `created_at`, `updated_at`) VALUES
(204, 'Sujan123', 'sujan@gmail.com12', '12312312311112', '$2y$10$xeq9xn9yquR9hA2R0afcku/C7inE0xGirLyMGY/aS81Bem46Kdhl2', 1, 127, 1, 2, '312312312312', 'no12', 1, 'megh12', '223423412', 'Dasher12', 'megh12', '121213123312312', 'Dasher12', '2021-04-30', 'jpg', 4, 1, '2021-05-01', 2, '2021-04-22 16:36:10', '2021-04-30 21:39:12'),
(205, 'AboriginalorTorres', 'admin@gmail.com12', '12312311223111', '$2y$10$oteBWDEJAMd.e36ceNqVdu.TLNowZhIhx34Vn2UDxtmt/cN85OCqu', 1, 12, 1, 1, '123123', 'sdsdfs', 1, 'eewr', '123123', 'Dasher', 'sdfsf', 'asdasd12', 'Dasher', '2021-04-23', 'png', 4, 1, '2021-05-01', 2, '2021-04-22 21:27:06', '2021-04-23 16:59:20'),
(207, 'Kabir Hossain', 'kabir832@gmail.com', '017855966666', '$2y$10$KZM4cxKagoVJUs5iDetwIuCOfiTVPwoCqU0l5UOZQ13OFSn9X9VQS', 1, 26, 1, 1, '1234789635', 'Back Pain', 1, 'Tania Islam', '01566565896', 'Jubullapur,Dhaka', 'Tania Islam', '01566565896', 'Jubullapur,Dhaka', NULL, 'jpeg', 3, 1, '2021-05-01', 2, '2021-05-01 07:50:14', '2021-05-01 07:50:14'),
(208, 'Mahwa Akhter', 'mahuma@gmail.com', '01654546425', '$2y$10$Kvoy/shbtKXN0DanD7jJKubob0NN2YomEd9jP.CtK6RrY4Nme3tri', 2, 35, 1, 1, '1472563512', 'Ovry cys', 2, 'Akhter Ali', '01365652325', 'apan Garden City Mohammadpur,Dhaka', 'Janvi Ahmed', '019462589655', 'Japan garden City Mohammadpur', NULL, 'jpg', 4, 1, '2021-05-01', 2, '2021-05-01 07:54:47', '2021-05-01 07:54:47'),
(209, 'Sobur Khan', 'sobur.khan@gmail.com', '01649852662', '$2y$10$psV1pEB/TWI2tNFi2sR8IO8qSAKOH2/G4UebZ37qeHWUfiIzMPD8.', 1, 46, 1, 1, '1324567986', 'Overthinking', 3, 'Somia khan', '0164204204', 'Dhanmondi ,Dhaka', 'Shosmita Khan', '0169666568', 'DHanmondi ,DHaka', NULL, 'png', 7, 1, '2021-05-01', 2, '2021-05-01 08:07:31', '2021-05-01 08:07:31'),
(210, 'Alif Anjum', 'alif@gmail.com', '012222333333', '$2y$10$a5vXHpx4mt3do4QUxBGRH.PJInt/n4VdtJdilJtzQz1XaJYCVsih2', 1, 21, 1, 1, '0123654569', 'Back Pain', 2, 'Ashrafia Anjum', '0231349849849', 'Nolonka, Dhamrai', 'Araf', '01231164658', 'nolonka ,Dhamrai', NULL, 'png', 3, 1, '2021-05-01', 2, '2021-05-01 21:01:07', '2021-05-01 21:01:07'),
(211, 'Shushmita Kormokar', 'sushmita@gmail.com', '01655456321', '$2y$10$ixeFDsRYG84iv8tvDITHleNpiagdyHP2JHlO8TOi//2ho3brVmFYa', 2, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jpg', NULL, 1, '2021-05-01', 1, '2021-05-02 01:31:06', '2021-05-02 01:31:06'),
(212, 'MD. Kabir Hossain', 'kabbirs96@gmail.com', '01747060854', '$2y$10$H22SYa0/LceBhJLeu9kJy.YPFPFaB0mOzCuYZ.yo8N/tXQgret/lG', 1, 24, 1, 1, '19965714752000390', NULL, 2, 'MD. Kabir Hossain', '1747060854', '44/8, Panthapath, Dhaka', 'Ishityaq', '01915353289', '52/4', NULL, 'jpg', 3, 1, '2021-05-01', 2, '2021-05-02 01:39:23', '2021-05-02 01:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `ward-bed`
--

CREATE TABLE `ward-bed` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `charge` float(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ward-bed`
--

INSERT INTO `ward-bed` (`id`, `title`, `bed`, `charge`, `created_at`, `updated_at`) VALUES
(3, 'Ward Male', '20', 1000.00, '2021-04-30 10:05:01', '2021-04-30 21:05:01'),
(4, 'Ward Female', '20', 1000.00, '2021-04-30 10:05:23', '2021-04-30 21:05:23'),
(5, 'Single Cabin', '20', 5000.00, '2021-04-30 10:08:22', '2021-04-30 21:08:22'),
(6, 'Shared Cabin', '10', 3000.00, '2021-04-30 10:08:34', '2021-04-30 21:08:34'),
(7, 'Premium Cabin', '5', 6000.00, '2021-04-30 10:08:46', '2021-04-30 21:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medex`
--
ALTER TABLE `medex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_orders`
--
ALTER TABLE `medicine_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward-bed`
--
ALTER TABLE `ward-bed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medex`
--
ALTER TABLE `medex`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3630;

--
-- AUTO_INCREMENT for table `medicine_orders`
--
ALTER TABLE `medicine_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `ward-bed`
--
ALTER TABLE `ward-bed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
