-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocake`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(11) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `barangay`, `fee`) VALUES
(1, 'Adrialuna', 80),
(2, 'Andres Ilagan', 50),
(3, 'Antipolo', 90),
(4, 'Apitong', 95),
(5, 'Arangin', 90),
(6, 'Aurora', 75),
(7, 'Bacungan', 50),
(8, 'Bagong Buhay', 55),
(9, 'Balite', 80),
(10, 'Bancuro', 85),
(11, 'Banuton', 75),
(12, 'Barcenga', 30),
(13, 'Bayani', 70),
(14, 'Buhangin', 50),
(15, 'Caburo', 95),
(16, 'Conception', 50),
(17, 'Dao', 80),
(18, 'Del Pillar', 75),
(19, 'Estrella', 65),
(20, 'Evangelista', 90),
(21, 'Gamao', 45),
(22, 'General Esco', 90),
(23, 'Herrera', 100),
(24, 'Inarawan', 95),
(25, 'Kalinisan', 65),
(26, 'Laguna', 60),
(27, 'Mabini', 55),
(28, 'Magtibay', 80),
(29, 'Mahabang Parang', 90),
(30, 'Malaya', 80),
(31, 'Malinao', 85),
(32, 'Malvar', 70),
(33, 'Masagana', 75),
(34, 'Masaguing', 120),
(35, 'Melgar A', 60),
(36, 'Melgar B', 65),
(37, 'Metolza', 80),
(38, 'Montelago', 110),
(39, 'Montemayor', 100),
(40, 'Motoderazo', 45),
(41, 'Mulawin', 90),
(42, 'Nag-iba I', 65),
(43, 'Nag-iba II', 70),
(44, 'Pagkakaisa', 80),
(45, 'Paitan', 75),
(46, 'Paniquian', 80),
(47, 'Pinagsabangan I', 70),
(48, 'Pinagsabangan II', 75),
(49, 'Pinahan', 80),
(50, 'Poblacion I', 60),
(51, 'Poblacion II', 65),
(52, 'Poblacion III', 70),
(53, 'Sampaguita', 65),
(54, 'San Agustin I', 80),
(55, 'San Agustin II', 85),
(56, 'San Andres', 70),
(57, 'San Antonio', 65),
(58, 'San Carlos', 90),
(59, 'San Isidro', 95),
(60, 'San Jose', 90),
(61, 'San Luis', 90),
(62, 'San Nicolas', 80),
(63, 'San Pedro', 85),
(64, 'Santa Cruz', 75),
(65, 'Santa Isabel', 70),
(66, 'Santa Maria', 60),
(67, 'Santiago', 65),
(68, 'Santo Nino', 35),
(69, 'Tagumpay', 65),
(70, 'Tigkan', 50);

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `add_ons_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `addons_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`add_ons_id`, `image`, `quantity`, `description`, `price`, `addons_status`) VALUES
(8, '1671882061649.png', 20, 'Strawberry', 190, 'Available'),
(9, '1671882028150.png', 20, 'Strawberry', 10, 'Unavailable'),
(10, '1671881950863.png', 20, 'Strawberry', 10, 'Available'),
(11, '1671881997154.png', 20, 'Strawberry', 90, 'Available'),
(12, '1671882048981.png', 20, 'Strawberry/icecrem', 100, 'Available'),
(13, '1671882076449.png', 20, 'Cherry', 10, 'Available'),
(14, '1671882091270.png', 20, 'Cherry', 20, 'Available'),
(15, '1671882113111.png', 20, 'Mango(1 slice)', 10, 'Available'),
(16, '1671882134591.png', 20, 'Mango(2 slice)', 20, 'Available'),
(17, '1671881978759.png', 20, 'Strawberry syrup', 10, 'Available'),
(18, '1671881964718.png', 20, 'Chocolate syrup', 10, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `verification_validity_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `profile_pic`, `firstname`, `lastname`, `email`, `password`, `verification_code`, `verification_validity_date`) VALUES
(7, '', 'admin', 'admin', 'admin@gmail.com', '$2y$10$WTBWHo7qOd0kX3PPhUSdLe/AICk0wipOnOmaNX2UXTW3CouVYyUVG', '387817', '2023-04-22 05:25:23 pm');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `profile` varchar(50) NOT NULL DEFAULT 'pink_user.png',
  `firstnamee` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `activation_key` text NOT NULL,
  `activation_status` int(11) NOT NULL DEFAULT 0,
  `recovery_key` text DEFAULT NULL,
  `recovery_status` int(11) NOT NULL DEFAULT 0,
  `recovery_expiration` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `profile`, `firstnamee`, `username`, `lastname`, `mobile`, `email`, `password`, `activation_key`, `activation_status`, `recovery_key`, `recovery_status`, `recovery_expiration`, `created_at`, `updated_at`) VALUES
(3, 'pink_user.png', '', 'ralph3', '', '', 'arevalocristin20@gmail.com', '$2y$10$WTBWHo7qOd0kX3PPhUSdLe/AICk0wipOnOmaNX2UXTW3CouVYyUVG', '13f617a98f8c5667ff8721ab52025406d87638b607cfe317a864b62d95a19f41b24bd0f98fb465dcb0c0b6a5792c974374e6', 1, '36fbbf74cc7686114eb6eca46f0b3c47039d2de397bcc80a8c59eedcc8d5425aa25b1dbdad5de09fd489f09cef88c4aea31f', 1, '2023-03-03 13:23:13', '2023-02-28 18:32:26', '2023-02-28 18:32:26'),
(6, 'pink_user.png', '', 'khristine', '', '', 'khristinebueno70@gmail.com', '$2y$10$TdpBGAueGKKVap9KCi0SIOQajZSb4yunoyRutcmevNzUa05wwKN9u', 'e4b5e45605aec4195e9c0ffb8c0215c74a1104ef05502b843c5c181b0ddb89c21bdf423f579d4626d5f1967702c6a6eb5cc1', 1, 'b940a4b5f5a60e8af29b0251536756ff325de133e7c337478d844206f4820b2adb4ccd87ca93e6f237d45552f35726340481', 1, '2023-03-01 14:38:10', '2023-02-28 21:19:31', '2023-02-28 21:19:31'),
(7, 'pink_user.png', '', 'khristine', '', '', 'buenokhristine10@gmail.com', '$2y$10$qN/xruXj.d91LGWWSLo/2O5eYijxKe0WkSdzyag/Gfe3oTeiCcKNC', '76745bc51366c926a4d65e3c22ba19190787dbc57e6fb5d5018ae18eb41cab899609c40488cb228d9b502ebc829edba2b207', 0, '210d9ad4161059793a4f09d95e984feab8672340005aa11928804a2379ea0b838b8f944765edc8e517a4e006acf405caa781', 1, '2023-03-01 15:18:38', '2023-02-28 23:18:16', '2023-02-28 23:18:16'),
(8, 'pink_user.png', '', 'Reika Tabernero', '', '', 'taberneroreika@gmail.com', '$2y$10$MEB3OrenHqBGP7Jpk4nqBewfPsdXlz0IwbswN3aT2EjSuhZeymW3q', 'd07525a262b46c6faf82cb65b06476ae68ea726b7dfec738f71dc32a75f2ef9ada4fcda2ca5c315e1f624be0d7d8fd179f48', 1, '924aed504b787b536b853a4cf57144f110b959237cfe213aa644ef9caebcb0c1a34fdb1d005751676a02154bc1d3e1d398d9', 0, '2023-03-09 05:03:23', '2023-03-08 12:58:46', '2023-03-08 12:58:46'),
(9, 'pink_user.png', '', 'Jechel', '', '', 'ramirezjechel23@gmail.com', '$2y$10$6/Ntk7CGguxn8yyBKURqjOaBnWO.JjSV0T6pgmjVM3vQao4dmY2Aq', '881c1c1886efd5d805d1edd0bd50ddde06115859ad009be91b283aa2a5aca7bd6d1fa68c44db4a4c742db8e558610a4fa973', 0, NULL, 0, NULL, '2023-03-23 22:20:25', '2023-03-23 22:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `biller_details`
--

CREATE TABLE `biller_details` (
  `biller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `municipality` varchar(200) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `delivery_method` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biller_details`
--

INSERT INTO `biller_details` (`biller_id`, `user_id`, `firstname`, `lastname`, `email`, `mobile`, `municipality`, `barangay`, `street`, `delivery_method`, `date`, `payment_method`, `created_at`, `updated_at`) VALUES
(120, 20, 'Jechel', 'Ramirez', 'ramirezjechel23@gmail.com', '09222222222', 'Naujan', 'Aurora', 'Sitio Masagana', 'Home Delivery', '2023-05-20 00:00:00', 'COD', '2023-05-10 03:57:56', '2023-05-10 03:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `occasion` varchar(200) NOT NULL,
  `flavor` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_check` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `rated` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `occasion`, `flavor`, `price`, `quantity`, `total_price`, `product_id`, `user_id`, `is_check`, `order_code`, `rated`, `created_at`, `updated_at`) VALUES
(145, 'Valentine', 'Chocolate', '350.00', 1, '350.00', 57, 39, '', '20230428B402', 'no', '2023-04-28 06:08:33', '2023-05-06 05:12:29'),
(146, 'Christmas', 'Vanilla', '350.00', 1, '350.00', 28, 39, '', '20230428B402', 'no', '2023-04-28 06:08:50', '2023-05-06 05:12:29'),
(148, 'Birthday', 'Mango', '350.00', 1, '350.00', 9, 39, '', '202305026623', 'no', '2023-05-02 02:34:09', '2023-05-06 05:12:29'),
(149, 'Graduation', 'Mango', '350.00', 1, '350.00', 63, 39, '', '20230502B05A', 'no', '2023-05-02 02:47:48', '2023-05-06 05:12:29'),
(150, 'Christmas', 'Mocha', '400.00', 1, '400.00', 32, 39, '', '20230502EB82', 'no', '2023-05-02 02:53:06', '2023-05-06 05:12:29'),
(152, 'Birthday', 'Avocado', '450.00', 1, '450.00', 16, 39, '', '20230501FB3E', 'no', '2023-05-01 10:42:17', '2023-05-06 05:12:29'),
(154, 'Graduation', 'Mango', '350.00', 1, '350.00', 63, 39, '', '20230501FBCD', 'no', '2023-05-01 11:09:06', '2023-05-06 05:12:29'),
(155, 'Halloween', 'Black Forest', '300.00', 1, '300.00', 41, 39, '', '20230501FBCD', 'no', '2023-05-01 11:14:38', '2023-05-06 05:12:29'),
(156, 'New Year', 'Banana', '300.00', 1, '300.00', 50, 39, '', '20230502AE06', 'no', '2023-05-02 13:55:25', '2023-05-06 05:12:29'),
(157, 'Valentine', 'Chocolate', '350.00', 1, '350.00', 57, 39, '', '202305027698', 'no', '2023-05-02 14:03:19', '2023-05-06 05:12:29'),
(158, 'Wedding', 'Cookies', '400.00', 1, '400.00', 76, 39, '', '', 'no', '2023-05-02 15:13:32', '2023-05-06 05:12:29'),
(159, 'Wedding', 'Vanilla', '300.00', 1, '300.00', 56, 20, '', '2023050602BE', 'yes', '2023-05-06 05:04:10', '2023-05-06 06:51:25'),
(160, 'Valentine', 'Dark Chocolate', '300.00', 1, '300.00', 67, 20, '', '20230506C2A5', 'yes', '2023-05-06 05:14:05', '2023-05-06 07:23:55'),
(161, 'New Year', 'Blue Velvet', '300.00', 1, '300.00', 48, 20, '', '20230506F33A', 'yes', '2023-05-06 05:15:01', '2023-05-06 07:31:44'),
(162, 'Halloween', 'Orange', '300.00', 1, '300.00', 43, 20, '', '20230506EA53', 'yes', '2023-05-06 05:15:54', '2023-05-10 03:42:16'),
(163, 'Birthday', 'Strawberry', '350.00', 1, '350.00', 12, 20, '', '20230506858D', 'yes', '2023-05-06 05:28:50', '2023-05-06 07:10:20'),
(164, 'Graduation', 'Strawberry', '300.00', 1, '300.00', 65, 20, '', '20230506A5A4', 'yes', '2023-05-06 05:29:35', '2023-05-06 07:16:05'),
(165, 'Graduation', 'Strawberry', '300.00', 1, '300.00', 65, 20, '', '202305076EBF', '', '2023-05-06 13:01:13', '2023-05-07 02:44:35'),
(166, 'Wedding', 'Milk', '300.00', 1, '300.00', 75, 20, '', '202305076EBF', 'no', '2023-05-07 02:43:51', '2023-05-10 03:41:34'),
(167, 'Christmas', 'Cookies & Cream', '300.00', 1, '300.00', 33, 20, '', '202305075EC4', '', '2023-05-07 02:44:58', '2023-05-07 02:45:29'),
(168, 'Christening', 'Vanilla', '350.00', 1, '350.00', 22, 20, '', '20230510271D', '', '2023-05-07 07:52:14', '2023-05-10 03:12:33'),
(169, 'Christening', 'Avocado', '450.00', 1, '450.00', 26, 20, '', '20230510497D', '', '2023-05-10 03:46:34', '2023-05-10 03:47:34'),
(170, 'Graduation', 'Blue Velvet', '300.00', 1, '300.00', 64, 20, '', '20230510D219', '', '2023-05-10 03:56:53', '2023-05-10 03:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `cat_image` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `cat_image`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(3, '1_20230318_200057_0000.png', 'Birthday', 'Available', '2023-02-24 14:18:44', '2023-05-10 08:27:30'),
(4, '8_20230318_200057_0007.png', 'Wedding', 'Available', '2023-02-24 14:33:11', '2023-05-10 08:27:47'),
(5, '4_20230318_200057_0003.png', 'Christening', 'Available', '2023-02-24 14:36:01', '2023-05-10 08:27:59'),
(6, '7_20230318_200057_0006.png', 'Graduation', 'Available', '2023-02-24 14:36:45', '2023-05-10 08:28:10'),
(7, '3_20230318_200057_0002.png', 'Valentine', 'Available', '2023-02-24 14:37:01', '2023-05-10 08:28:19'),
(8, '5_20230318_200057_0004.png', 'Halloween', 'Available', '2023-02-24 14:37:22', '2023-05-10 08:28:28'),
(9, '6_20230318_200057_0005.png', 'Christmas', 'Available', '2023-02-24 14:37:59', '2023-05-10 08:28:46'),
(10, '2_20230318_200057_0001.png', 'New Year', 'Available', '2023-02-24 14:38:16', '2023-05-10 08:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `biller_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `downpayment` int(11) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `refund` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `stat` varchar(200) NOT NULL DEFAULT 'Pending',
  `reason` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_id`, `biller_id`, `total_price`, `downpayment`, `shipping_fee`, `balance`, `refund`, `items`, `order_code`, `stat`, `reason`, `image`, `payment`, `created_at`) VALUES
(9, 20, 16, '900.00', 0, 0, 0, 0, 2, '202301136DEF', 'Cancelled', 'Buy later', '', '', '2023-01-14 05:11:45'),
(10, 21, 17, '600.00', 0, 0, 0, 0, 2, '2023011520D5', 'Processing', '', '', '', '2023-01-15 11:12:48'),
(11, 21, 18, '250.00', 0, 0, 0, 0, 1, '202301152A14', 'Cancelled', 'Not enough money', '', '', '2023-01-15 11:15:19'),
(12, 24, 19, '500.00', 0, 0, 0, 0, 1, '20230119AB73', 'Delivered', '', '', '', '2023-01-19 10:20:00'),
(13, 25, 20, '800.00', 0, 0, 0, 0, 2, '20230119A875', 'Completed', '', '', '', '2023-01-19 10:41:38'),
(14, 22, 21, '1290.00', 0, 0, 0, 0, 1, '202301199023', 'Pending', '', '', '', '2023-01-19 11:33:44'),
(15, 26, 0, '400.00', 0, 0, 0, 0, 1, '2023021811A7', 'Pending', '', '', '', '2023-02-18 06:42:16'),
(16, 26, 22, '400.00', 0, 0, 0, 0, 1, '202302186637', 'Shipped', '', '', '', '2023-02-18 06:54:15'),
(17, 20, 27, '1010.00', 505, 0, 555, 0, 2, '202303292C61', 'Cancelled', 'Will change order', '', '', '2023-03-29 11:04:59'),
(18, 20, 28, '300.00', 150, 0, 200, 75, 1, '202303294EC3', 'Cancelled', 'Will change order', '', '', '2023-03-29 11:09:59'),
(20, 20, 30, '300.00', 150, 0, 200, 150, 1, '202303290FB9', 'Completed', 'Buy later', '', '', '2023-03-29 11:41:53'),
(21, 20, 45, '300.00', 150, 0, 200, 0, 1, '2023032990E2', 'Cancelled', 'Changed of mind', 'Screenshot (23).png', '', '2023-03-29 13:15:07'),
(23, 21, 57, '300.00', 150, 0, 200, 0, 1, '20230329DDED', 'Pending', '', '', 'Downpayment', '2023-03-29 14:33:32'),
(24, 20, 58, '500.00', 250, 0, 300, 125, 1, '202303294CEC', 'Cancelled', 'Will change order', '', 'Downpayment', '2023-03-29 16:00:15'),
(25, 21, 79, '350.00', 175, 0, 225, 0, 1, '202304018AB6', 'Pending', '', 'Denim midi-skirt.png', 'Downpayment', '2023-04-01 14:24:20'),
(26, 21, 88, '300.00', 150, 0, 200, 0, 1, '202304019579', 'Delivered', '', 'Denim Mini Skirt.png', 'Downpayment', '2023-04-01 15:48:19'),
(27, 21, 89, '400.00', 200, 0, 250, 0, 1, '202304018000', 'Completed', '', 'Bohoo Long Sleeve Oversized.png', 'Downpayment', '2023-04-01 15:49:47'),
(28, 21, 90, '350.00', 175, 0, 225, 0, 1, '202304021E49', 'Completed', '', 'Layered Tutu.png', 'Downpayment', '2023-04-10 13:03:29'),
(30, 27, 98, '690.00', 345, 0, 395, 0, 1, '202304153BF7', 'Pending', '', '336646125_584831723669264_3324298248148676463_n.jpg', 'Downpayment', '2023-04-16 04:23:39'),
(31, 27, 99, '350.00', 175, 0, 225, 0, 1, '2023041662C7', 'Pending', '', '336646125_584831723669264_3324298248148676463_n.jpg', 'Downpayment', '2023-04-16 05:01:41'),
(32, 27, 100, '300.00', 150, 0, 200, 0, 1, '20230416FB48', 'Completed', '', '336646125_584831723669264_3324298248148676463_n.jpg', 'Fullpayment', '2023-04-16 07:40:28'),
(33, 35, 101, '350.00', 175, 0, 225, 0, 1, '20230422988C', 'Completed', '', 'user.png', 'Fullpayment', '2024-04-22 01:02:45'),
(34, 35, 101, '350.00', 175, 0, 225, 0, 1, '202304229834', 'Completed', '', 'user.png', 'Fullpayment', '2025-04-22 01:02:45'),
(35, 35, 101, '350.00', 175, 0, 225, 0, 1, '2023042265466', 'Completed', '', 'user.png', 'Fullpayment', '2025-04-22 01:02:45'),
(36, 39, 102, '700.00', 350, 0, 400, 175, 2, '20230428B402', 'Completed', 'Changed of mind', '03.png', 'Downpayment', '2023-04-28 06:19:22'),
(37, 39, 103, '350.00', 175, 0, 225, 175, 1, '202305026623', 'Cancelled', 'Changed of mind', '02.png', 'Downpayment', '2023-05-02 02:35:44'),
(38, 39, 104, '350.00', 175, 0, 225, 0, 1, '20230502B05A', 'Completed', '', '04.png', 'Fullpayment', '2023-05-02 02:49:50'),
(39, 39, 105, '400.00', 200, 0, 250, 0, 1, '20230502EB82', 'Completed', '', '111111111111.png', 'Fullpayment', '2023-05-02 02:53:47'),
(40, 39, 106, '450.00', 225, 0, 275, 0, 1, '20230501FB3E', 'Pending', '', '3F2 Bueno Khristine.jpg', 'Downpayment', '2023-05-01 10:50:35'),
(41, 39, 107, '650.00', 325, 0, 375, 0, 2, '20230501FBCD', 'Completed', '', 'BookTitleCollage-768x432.jpg', 'Downpayment', '2023-05-01 11:15:29'),
(42, 39, 108, '300.00', 150, 0, 200, 0, 1, '20230502AE06', 'Pending', '', 'CHAPTER1.1.docx', 'Downpayment', '2023-05-02 13:58:58'),
(43, 39, 109, '350.00', 175, 0, 225, 0, 1, '202305027698', 'Pending', '', 'CHAPTER-III-edited (2).docx', 'Downpayment', '2023-05-02 15:07:57'),
(44, 20, 110, '300.00', 150, 0, 200, 0, 1, '2023050602BE', 'Completed', '', '03.png', 'Downpayment', '2023-05-06 05:05:46'),
(45, 20, 111, '300.00', 150, 0, 200, 0, 1, '20230506C2A5', 'Completed', '', '04.png', 'Downpayment', '2023-05-06 05:14:48'),
(46, 20, 112, '300.00', 150, 0, 200, 0, 1, '20230506F33A', 'Completed', '', '123.png', 'Downpayment', '2023-05-06 05:15:37'),
(47, 20, 113, '300.00', 150, 0, 200, 0, 1, '20230506EA53', 'Completed', '', '05.png', 'Downpayment', '2023-05-06 05:16:27'),
(48, 20, 114, '350.00', 175, 0, 225, 0, 1, '20230506858D', 'Completed', '', '12.png', 'Downpayment', '2023-05-06 05:29:22'),
(49, 20, 115, '300.00', 150, 0, 200, 0, 1, '20230506A5A4', 'Completed', '', '123.png', 'Downpayment', '2023-05-06 05:30:05'),
(50, 20, 116, '600.00', 300, 0, 350, 0, 2, '202305076EBF', 'Completed', '', '123456.png', 'Downpayment', '2023-05-07 02:44:35'),
(51, 20, 117, '300.00', 150, 0, 200, 0, 1, '202305075EC4', 'Pending', '', '04.png', 'Downpayment', '2023-05-07 02:45:29'),
(52, 20, 118, '350.00', 175, 0, 245, 0, 1, '20230510271D', 'Confirmed', '', '01.png', 'Downpayment', '2023-05-10 03:12:33'),
(53, 20, 119, '450.00', 225, 0, 300, 0, 1, '20230510497D', 'Pending', '', '04.png', 'Downpayment', '2023-05-10 03:47:34'),
(54, 20, 120, '300.00', 150, 75, 225, 0, 1, '20230510D219', 'Pending', '', '03.png', 'Downpayment', '2023-05-10 03:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_mname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_fname`, `customer_mname`, `customer_lname`, `customer_address`, `customer_contact`, `customer_email`, `customer_country`) VALUES
(1, 'Kevin', 'Felix', 'Caluag', 'Bago General Tinio NE', '09261364720', 'kfc202510@gmail.com', 'Phil'),
(2, 'asdas', 'dasd', 'asdas', 'asdasd', 'dasdas', 'dasdas', 'dasd');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `smtp_host` varchar(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_secure` varchar(10) NOT NULL,
  `smtp_port` varchar(10) NOT NULL,
  `smtp_charset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`smtp_host`, `smtp_username`, `smtp_password`, `smtp_secure`, `smtp_port`, `smtp_charset`) VALUES
('smtp.gmail.com', 'mindoroptiedo@gmail.com', 'ofglvlvjfjdeutsd', 'ssl', '465', 'UTF-8');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback`, `rate`, `user_id`, `prod_id`) VALUES
(1, 'hhsgjhsgd', 0, 21, 12),
(2, 'masarapppp', 3, 21, 32),
(3, '', 3, 27, 8),
(4, '', 4, 35, 9),
(5, 'tuyftkuhijkl 988876', 5, 39, 28),
(10, 'one', 1, 20, 56),
(11, 'It\'s good. I\'ll buy again next time', 4, 20, 12),
(12, 'two star for this cakee', 2, 20, 65),
(13, 'So sweet!!!!!', 5, 20, 67),
(14, 'Worth the priceee', 5, 20, 48),
(15, 'Delicious. Will buy again later.', 4, 20, 43);

-- --------------------------------------------------------

--
-- Table structure for table `flavor`
--

CREATE TABLE `flavor` (
  `flavor_id` int(11) NOT NULL,
  `flavor_image` varchar(200) NOT NULL,
  `flavor` varchar(200) NOT NULL,
  `flavor_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flavor`
--

INSERT INTO `flavor` (`flavor_id`, `flavor_image`, `flavor`, `flavor_status`) VALUES
(1, '20230318_203541_0010.png', 'Vanilla', 'Available'),
(2, '20230318_203541_0009.png', 'Chocolate', 'Available'),
(3, '20230318_203541_0007.png', 'Banana', 'Available'),
(4, '20230318_203541_0002.png', 'Strawberry', 'Available'),
(5, '20230318_203541_0003.png', 'Mango', 'Available'),
(6, '20230318_203541_0004.png', 'Blueberry', 'Available'),
(7, '20230318_203541_0008.png', 'Red Velvet', 'Available'),
(8, '20230318_203541_0005.png', 'Avocado', 'Available'),
(9, '20230318_203541_0006.png', 'Melon', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `totalAmount` double NOT NULL,
  `payable` double NOT NULL,
  `change` double NOT NULL,
  `remarks` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `occasion` varchar(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `flavor` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `availability` varchar(200) NOT NULL,
  `is_customized` int(11) NOT NULL DEFAULT 0,
  `userid` int(11) NOT NULL DEFAULT 0,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `cat_id`, `image`, `occasion`, `product_name`, `flavor`, `price`, `stock`, `status`, `availability`, `is_customized`, `userid`, `message`, `created_at`, `updated_at`) VALUES
(157, 'cakeval1', 7, 0x315f32303233303331385f3230303035375f303030302e706e67, 'Valentine', 'fgv', 'Vanilla', '123.00', 150, 'Available', 'Pre Order', 0, 0, NULL, '2023-05-12 16:51:43', '2023-05-13 15:50:18'),
(158, 'cakegrad1', 6, 0x706578656c732d6672616e636573636f2d756e6761726f2d323332353434362e6a7067, 'Graduation', 'fgv', 'Vanilla', '123.00', 120, 'Available', 'Pre Order', 0, 0, NULL, '2023-05-12 16:51:43', '2023-05-13 15:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile` varchar(200) NOT NULL DEFAULT 'pink_user.png',
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mcp` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `birthdate` int(11) NOT NULL,
  `birthmonth` varchar(50) NOT NULL,
  `birthyear` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `verification_validity_date` varchar(60) DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `firstname`, `lastname`, `mcp`, `brgy`, `age`, `gender`, `mobile`, `birthdate`, `birthmonth`, `birthyear`, `email`, `password`, `confirm_password`, `verification_code`, `verification_validity_date`, `is_verified`, `create_at`) VALUES
(20, 'jj.JPG', 'Jechel', 'Ramirez', '', '', 21, 'Female', '09222222222', 0, '', 0, 'ramirezjechel23@gmail.com', '$2y$10$Ux6DQChW/u4nL/v1CSElLur5RKCZzIffJ1hR7XlNNEIRofNYOQ/oC', '', '802654', '2023-05-06 01:07:46 pm', 1, '2022-12-27 11:55:41'),
(21, 'Turtleneck Top.png', 'Kathy', 'Bernardo', '', '', 21, 'Female', '09333333333', 0, '', 0, 'kath@gmail.com', '$2y$10$J8Itdv2sQLceOLxJe8Jtj.kZCPzP6TLW7GYdE/NT8yojj8KlT45IW', '', '464060', '2023-05-10 08:55:32 pm', 0, '2022-12-30 13:22:40'),
(22, 'pink_user.png', 'John', 'Smith', '', '', 0, '', '09000000000', 0, '', 0, 'user@gmail.com', '$2y$10$xHS2Rk/BnrQtXKTvEE0fM.f4R/vW3j7ldLYJ4um0HtwXMEiT5ZR.e', '', '0', NULL, 0, '2023-01-03 05:37:42'),
(24, 'pink_user.png', 'Khristine', 'Bueno', '', '', 0, '', '09876787878', 0, '', 0, 'khristinebueno@gmail.com', '$2y$10$ygCc8m71CxMKdfMaeM3t/urRhTd/FKz0aSHgTxnA4Rk0.N/JYAgBS', '', '0', NULL, 0, '2023-01-16 03:37:48'),
(25, 'pink_user.png', 'Ana', 'Smith', '', '', 0, '', '0989990909', 0, '', 0, 'ana@gmail.com', '$2y$10$qqb5XTJDKQ.PbTy.AV537OVAqKEi7Igd.VazWkxBbsTpgqQ3Q2t4a', '', '0', NULL, 0, '2023-01-19 10:36:09'),
(26, 'pink_user.png', 'Tommy', 'Cabrera', '', '', 0, '', '09898787877', 0, '', 0, 'tom@gmail.com', '$2y$10$DAEWmNgl3SnRKMBBF52RB.KXwetitSa0vrw8oQDUC9rlJFZoAmgKO', '', '', NULL, 0, '2023-02-18 06:40:42'),
(39, 'pink_user.png', 'Cristin', 'Arevalo', '', '', 0, '', '09635241497', 0, '', 0, 'arevalocristin20@gmail.com', '$2y$10$4t49Av0Q3tVM5ftQX1DrzuhlquJZJZh9LlMW3kv2C.QjaA69x/j4W', '', '614748', '2023-04-28 02:40:31 pm', 1, '2023-04-24 10:57:17'),
(40, 'pink_user.png', 'khristine', 'bueno', '', '', 0, '', '45687566', 0, '', 0, '', '$2y$10$WE9HF2elWd/ahZhCcL/diu/pyeNlIn8pudoiQvLN29HXdPAZrBxiy', '', '', NULL, 0, '2023-05-02 12:14:11'),
(41, 'pink_user.png', 'khristine', 'bueno', '', '', 0, '', '45687566', 0, '', 0, '', '$2y$10$UKBzip9ZLH7kZZtG.T9ci.64XUbKdl6.sCv.eeZSnOrzxNygluSfe', '', '', NULL, 0, '2023-05-02 12:14:43'),
(42, 'pink_user.png', 'khristine', 'bueno', '', '', 0, '', '45687566', 0, '', 0, 'erer@gmail.com', '$2y$10$nZ6FQlqoxMhAcRbd7lfeWu6/egNUeQ0Cc.Sfez.biWsiAJrKj9b8O', '', '', NULL, 0, '2023-05-02 12:15:27'),
(43, 'pink_user.png', 'qwe', 'bueno', '', '', 0, '', '45687566', 0, '', 0, 'santos@gmail.com', '$2y$10$W.P/H6tlT0mN8h64xMEKCutQXoSWGwWQpdcjJEG3AA0SoaZ4OMI9C', '', '', NULL, 0, '2023-05-02 12:31:28'),
(44, 'pink_user.png', 'jc', 'jc', '', '', 0, '', '09878767656', 0, '', 0, 'jc@gmail.com', '$2y$10$BFZ076xa.OFGGKRyYdBAvOW.FV50X2SldMk4jNe5Jyq0aHB.CZEAC', '', '', NULL, 0, '2023-05-02 12:34:38'),
(45, 'pink_user.png', 'dan', 'dan', 'Naujan', 'Estrella', 23, 'Male', '09878767656', 0, '', 0, 'dan@gmail.com', '\n$2y$10$WTBWHo7qOd0kX3PPhUSdLe/AICk0wipOnOmaNX2UXTW3CouVYyUVG', '\n$2y$10$WTBWHo7qOd0kX3PPhUSdLe/AICk0wipOnOmaNX2UXT', '563024', '2023-05-02 09:45:07 pm', 0, '2023-05-02 13:39:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`add_ons_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biller_details`
--
ALTER TABLE `biller_details`
  ADD PRIMARY KEY (`biller_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `flavor`
--
ALTER TABLE `flavor`
  ADD PRIMARY KEY (`flavor_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`),
  ADD KEY `prod_id_f` (`product_id`),
  ADD KEY `pos_cus_id_f` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `add_ons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `biller_details`
--
ALTER TABLE `biller_details`
  MODIFY `biller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `flavor`
--
ALTER TABLE `flavor`
  MODIFY `flavor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `pos_cus_id_f` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_id_f` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
