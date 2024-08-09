-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2024 at 12:41 PM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcarexpress`
--

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `name`, `marque_id`, `created_at`, `updated_at`) VALUES
(1, 'Corolla', 2, '2024-07-30 10:26:25', '2024-07-30 10:26:25'),
(2, 'Camry', 2, '2024-07-30 10:27:04', '2024-07-30 10:27:04'),
(3, 'RAV4', 2, '2024-07-30 10:27:18', '2024-07-30 10:27:18'),
(4, 'Fiesta', 3, '2024-07-30 10:27:36', '2024-07-30 10:27:36'),
(5, 'Focus', 3, '2024-07-30 10:27:47', '2024-07-30 10:27:47'),
(6, 'Escape', 3, '2024-07-30 10:28:01', '2024-07-30 10:28:01'),
(7, 'Elantra', 4, '2024-07-30 10:28:21', '2024-07-30 10:28:21'),
(8, 'Sonata', 4, '2024-07-30 10:28:32', '2024-07-30 10:28:32'),
(9, 'Tucson', 4, '2024-07-30 10:28:41', '2024-07-30 10:28:41'),
(10, 'Golf', 1, '2024-07-30 10:28:57', '2024-07-30 10:28:57'),
(11, 'Passat', 1, '2024-07-30 10:29:07', '2024-07-30 10:29:07'),
(12, 'Tiguan', 1, '2024-07-30 10:29:28', '2024-07-30 10:29:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
