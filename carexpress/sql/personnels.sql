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
-- Dumping data for table personnels
--

INSERT INTO personnels (id, lastname, firstname, email, phone, username, password, role, created_at, updated_at, statut, firstlogin) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '21653117212', 'admin', '$2y$12$AABIiXoendWb2u3wGB6UYe6h3s1ow9KNm9BETAInBXWfv0S9/Fdtu', 'administrateur', '2024-07-31 00:25:38', '2024-08-07 15:11:02', 'actif', 0),
(3, 'BONI', 'Ange Ulrich', 'ulrichange151@gmail.com', '21653117212', 'boni.ange001', '$2y$12$L/A1EeNOxadkstzhk1zNouGKgX2tv5fodhUSDtdk40jZPJLnUchz6', 'manager', '2024-08-06 00:49:15', '2024-08-07 15:11:45', 'actif', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
