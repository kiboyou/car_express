-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2024 at 12:42 PM
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
-- Database: dbcarexpress
--

--
-- Dumping data for table vehicules
--

INSERT INTO vehicules (matricule, prixLocation, anneeFabrication, versionVehicule, carburant, disponibilite, imageVehicule, modele_id, categorie_id, transmission_id, created_at, updated_at) VALUES
('AB-123-CD', '40.00', 2022, 'LE', 'essence', 1, 'vehicules/ab-123-cd_20240803004958.png', 1, 2, 2, '2024-08-02 23:49:59', '2024-08-07 18:11:31'),
('GH-789-IJ', '70.00', 2023, 'XRT AWD', 'essence', 1, 'vehicules/gh-789-ij_20240803142042.webp', 9, 5, 2, '2024-08-03 13:20:42', '2024-08-03 13:20:42'),
('IJ-789-KL', '70.00', 2023, 'XLE', 'essence', 1, 'vehicules/ij-789-kl_20240803135733.webp', 3, 5, 2, '2024-08-03 12:57:33', '2024-08-03 12:57:33'),
('MN-123-OP', '30.00', 2018, 'SE Sedan', 'essence', 1, 'vehicules/mn-123-op_20240803140103.jpg', 4, 1, 1, '2024-08-03 13:01:03', '2024-08-03 13:01:03'),
('UV-789-WX', '65.00', 2019, 'SEL', 'essence', 1, 'vehicules/uv-789-wx_20240803141043.webp', 6, 5, 2, '2024-08-03 13:10:43', '2024-08-03 13:10:43'),
('YZ-123-AB', '50.00', 2024, 'SEL', 'essence', 0, 'vehicules/yz-123-ab_20240803141358.png', 7, 3, 2, '2024-08-03 13:13:58', '2024-08-03 23:52:50'),
('YZ-702-AB', '65.00', 2022, 'Limited', 'essence', 0, 'vehicules/yz-702-ab_20240803143014.webp', 11, 1, 2, '2024-08-03 13:30:14', '2024-08-04 15:42:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
