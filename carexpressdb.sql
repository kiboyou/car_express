-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 09:05 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CarExpressDB`
--
CREATE DATABASE IF NOT EXISTS `carexpressdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `carexpressdb`;

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `administrateur` (
  `idadmin` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `mailadmin` varchar(100) NOT NULL,
  `passwordadmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `BilletLocations`
--

CREATE TABLE `billet` (
  `idbillet` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idreservation` int NOT NULL,
  `amounttotal` float NOT NULL,
  `locationduration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `customer` (
  `idcustomer` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `lastnamecustomer` varchar(100) NOT NULL,
  `firstnamecustomer` varchar(100) NOT NULL,
  `mailcustomer` varchar(150) NOT NULL,
  `adressecustomer` varchar(150) NULL,
  `phonecustomer` varchar(50) NULL,
  `nationnalitycustomer` varchar(100) NULL,
  `permiscustomer` varchar(100) NULL,
  `birthdaycustomer` date NULL,
  `passwordcustomer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Gestionnaires`
--

CREATE TABLE `gestionnaire` (
  `idgestionnaire` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nomgestionnaire` varchar(50) NOT NULL,
  `prenomgestionnaire` varchar(100) NOT NULL,
  `mailgestionnaire` varchar(150) NOT NULL,
  `phonegestionnaire` varchar(50) NULL,
  `passwordgestionnaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Marques`
--

CREATE TABLE `marque` (
  `idmarque` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `namemarque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Modeles`
--

CREATE TABLE `modele` (
  `idmodele` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idmarque` int NOT NULL,
  `namemodele` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Promotions`
--

CREATE TABLE `promotion` (
  `idpromotion` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titrepromotion` varchar(100) NOT NULL,
  `descriptionpromotion` varchar(255) NOT NULL,
  `datestartpromotion` date NOT NULL,
  `dateendpromotion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE `reservation` (
  `idreservation` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idclient` int NOT NULL,
  `idvoiture` varchar(100) NOT NULL,
  `datereservation` date NOT NULL,
  `debutlocation` date NOT NULL,
  `finlocation` date NOT NULL,
  `statutreservation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Voitures`
--

CREATE TABLE `voiture` (
  `matricule` varchar(100) NOT NULL PRIMARY KEY,
  `idmodele` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `rentprice` float NOT NULL,
  `disponibilite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



--
-- Constraints for dumped tables
--

--
-- Constraints for table `BilletLocations`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `fk_billet_reservation` FOREIGN KEY (`idreservation`) REFERENCES `reservation` (`idreservation`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

--
-- Constraints for table `Modeles`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `fk_modele_marque` FOREIGN KEY (`idmarque`) REFERENCES `marque` (`idmarque`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

--
-- Constraints for table `Reservations`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_customer` FOREIGN KEY (`idclient`) REFERENCES `customer` (`idcustomer`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`idvoiture`) REFERENCES `voiture` (`matricule`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

--
-- Constraints for table `Voitures`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `fk_voiture_model` FOREIGN KEY (`idmodele`) REFERENCES `modele` (`idmodele`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
