-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 01:15 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carexpressdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `idadmin` int NOT NULL,
  `usernameadmin` varchar(100) NOT NULL,
  `passwordadmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`idadmin`, `usernameadmin`, `passwordadmin`) VALUES
(2, 'admin', '$2y$10$zRFM71oZiBIGWcO6V1AiHuJ4BpK2T9YiuW0cKXwnaGfGjdYxsNl4G');

-- --------------------------------------------------------

--
-- Stand-in structure for view `carView`
-- (See below for the actual view)
--
CREATE TABLE `carView` (
`disponibilite` int
,`matricule` varchar(100)
,`namecar` varchar(201)
,`nummarque` int
,`nummodele` int
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int NOT NULL,
  `lastnamecustomer` varchar(100) NOT NULL,
  `firstnamecustomer` varchar(100) NOT NULL,
  `mailcustomer` varchar(150) NOT NULL,
  `adressecustomer` varchar(150) DEFAULT NULL,
  `phonecustomer` varchar(50) NOT NULL,
  `nationnalitycustomer` varchar(100) DEFAULT NULL,
  `permiscustomer` varchar(100) DEFAULT NULL,
  `birthdaycustomer` date DEFAULT NULL,
  `statut` int NOT NULL DEFAULT '0',
  `passwordcustomer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `idfacture` int NOT NULL,
  `datefacture` date NOT NULL,
  `idreservation` varchar(255) NOT NULL,
  `prixunitaire` float NOT NULL,
  `nbrejours` int NOT NULL,
  `total` float NOT NULL,
  `taxes` float NOT NULL,
  `montanttotalapayer` float NOT NULL,
  `statutfacture` varchar(50) NOT NULL,
  `amount_advance` float NOT NULL DEFAULT '0',
  `resteapayer` float GENERATED ALWAYS AS ((`montanttotalapayer` - `amount_advance`)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Table structure for table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `idgestionnaire` int NOT NULL,
  `nomgestionnaire` varchar(50) NOT NULL,
  `prenomgestionnaire` varchar(100) NOT NULL,
  `usermanager` varchar(255) DEFAULT NULL,
  `phonegestionnaire` varchar(50) DEFAULT NULL,
  `passwordgestionnaire` varchar(255) NOT NULL,
  `addressmanager` varchar(255) NOT NULL,
  `firstlogin` int NOT NULL DEFAULT '1' COMMENT '0:no -- 1: yes',
  `statut` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Table structure for table `inventaire`
--

CREATE TABLE `inventaire` (
  `idinventory` int NOT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `rentprice` float DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `disponibilite` int DEFAULT NULL,
  `dateinventory` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Stand-in structure for view `inventory_grouped`
-- (See below for the actual view)
--
CREATE TABLE `inventory_grouped` (
`dateinventory` date
,`numinventory` bigint
,`statut` varchar(12)
,`timeinventory` time
);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `idmarque` int NOT NULL,
  `namemarque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`idmarque`, `namemarque`) VALUES
(2, 'BMW'),
(5, 'Ford'),
(3, 'Honda'),
(4, 'Mercedes-Benz'),
(6, 'Tesla'),
(1, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE `modele` (
  `idmodele` int NOT NULL,
  `idmarque` int NOT NULL,
  `namemodele` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`idmodele`, `idmarque`, `namemodele`) VALUES
(1, 2, 'Serie 1'),
(2, 2, 'Serie 2'),
(3, 2, 'Serie 3'),
(4, 2, 'X1'),
(5, 2, 'X3'),
(6, 2, 'X5'),
(7, 2, 'Serie 7'),
(8, 2, 'Serie 8'),
(9, 2, 'X7'),
(10, 5, 'Fiesta'),
(11, 5, 'Focus'),
(12, 5, 'Fusion'),
(13, 5, 'EcoSport'),
(14, 5, 'Escape'),
(15, 5, 'Explorer'),
(16, 5, 'Taurus'),
(17, 5, 'Edge'),
(18, 5, 'Mustang'),
(19, 3, 'Fit'),
(20, 3, 'Civic'),
(21, 3, 'Accord'),
(22, 3, 'HR-V'),
(23, 3, 'CR-V'),
(24, 3, 'Pilot'),
(25, 3, 'Legend'),
(26, 3, 'NSX'),
(27, 3, 'Clarity'),
(28, 4, 'Classe A'),
(29, 4, 'Classe B'),
(30, 4, 'Classe C'),
(31, 4, 'GLA'),
(32, 4, 'GLC'),
(33, 4, 'GLE'),
(34, 4, 'S-Class'),
(35, 4, 'E-Class'),
(36, 4, 'G-Class'),
(37, 6, 'Model 3'),
(38, 6, 'Model Y'),
(39, 6, 'Model Y Long Range'),
(40, 6, 'Model S'),
(41, 6, 'Model X'),
(42, 6, 'Model X Plaid'),
(43, 6, 'Model S Plaid'),
(44, 6, 'Roadster'),
(45, 1, 'Yaris'),
(46, 1, 'Corolla'),
(47, 1, 'Prius'),
(48, 1, 'RAV4'),
(49, 1, 'Highlander'),
(50, 1, 'Land Cruiser'),
(51, 1, 'Avalon'),
(52, 1, 'Camry'),
(53, 1, 'Mirai');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `idpromotion` int NOT NULL,
  `titrepromotion` varchar(100) NOT NULL,
  `descriptionpromotion` varchar(255) NOT NULL,
  `datestartpromotion` date NOT NULL,
  `dateendpromotion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `received`
--

CREATE TABLE `received` (
  `idrecu` int NOT NULL,
  `daterecu` date NOT NULL,
  `idfacture` int DEFAULT NULL,
  `montantpaye` float NOT NULL,
  `amountReste` float NOT NULL,
  `referencepaiement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` varchar(255) NOT NULL,
  `idclient` int NOT NULL,
  `idvoiture` varchar(100) NOT NULL,
  `datereservation` date NOT NULL,
  `debutlocation` date NOT NULL,
  `finlocation` date NOT NULL,
  `statutreservation` varchar(100) NOT NULL,
  `nomperson1` varchar(50) DEFAULT NULL,
  `prenomperson1` varchar(255) DEFAULT NULL,
  `addressperson1` varchar(255) DEFAULT NULL,
  `telperson1` varchar(100) DEFAULT NULL,
  `mailperson1` varchar(255) DEFAULT NULL,
  `paidby` varchar(100) NOT NULL,
  `prixlocation` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `create_facture_when_reservation_confirm` AFTER UPDATE ON `reservation` FOR EACH ROW BEGIN
    IF NEW.statutreservation = 'Confirme' THEN
        INSERT INTO facture (
            idfacture,
            datefacture,
            idreservation,
            prixunitaire,
            nbrejours,
            total,
            taxes,
            montanttotalapayer,
            statutfacture
        )
        VALUES (
            FLOOR(10000 + RAND() * 90000),
            CURRENT_DATE,
            NEW.idreservation,
            NEW.prixlocation,
            DATEDIFF(NEW.finlocation, NEW.debutlocation) + 1,
            NEW.prixlocation * (DATEDIFF(NEW.finlocation, NEW.debutlocation) + 1),
            0.10,
            NEW.prixlocation * (DATEDIFF(NEW.finlocation, NEW.debutlocation) + 1) * (1 + 0.10),
            'non payé'
        );
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservationView`
-- (See below for the actual view)
--
CREATE TABLE `reservationView` (
`addressperson1` varchar(255)
,`datereservation` date
,`debutlocation` date
,`disponibilite` int
,`finlocation` date
,`firstnamecustomer` varchar(100)
,`idclient` int
,`idreservation` varchar(255)
,`lastnamecustomer` varchar(100)
,`mailcustomer` varchar(150)
,`matricule` varchar(100)
,`namecar` varchar(201)
,`nomperson1` varchar(50)
,`paidby` varchar(100)
,`phonecustomer` varchar(50)
,`prenomperson1` varchar(255)
,`prixlocation` float
,`statutreservation` varchar(100)
,`telperson1` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `matricule` varchar(100) NOT NULL,
  `idmodele` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `vehiculepicture` varchar(100) NOT NULL,
  `rentprice` float NOT NULL,
  `disponibilite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`matricule`, `idmodele`, `categorie`, `transmission`, `vehiculepicture`, `rentprice`, `disponibilite`) VALUES
('AEV232', 33, 'suv', 'auto', '33_20240426183706.jpg', 70000, 1),
('EZH873', 10, 'eco', 'auto', '10_20240426183518.jpg', 50000, 1),
('GLE289', 41, 'luxe', 'auto', '41_20240426183628.jpg', 100000, 1),
('JVX893', 4, 'suv', 'manuel', '4_20240426183445.jpg', 40000, 1),
('NWY592', 1, 'eco', 'auto', '1_20240426183359.jpeg', 25000, 1),
('QQO600', 37, 'luxe', 'auto', '37_20240426183832.jpg', 120000, 1),
('SHI996', 53, 'eco', 'manuel', '53_20240516191924.jpg', 20000, 1);

-- --------------------------------------------------------

--
-- Structure for view `carView`
--
DROP TABLE IF EXISTS `carView`;

CREATE VIEW `carView`  AS SELECT `modele`.`idmodele` AS `nummodele`, `marque`.`idmarque` AS `nummarque`, `voiture`.`matricule` AS `matricule`, concat(`marque`.`namemarque`,' ',`modele`.`namemodele`) AS `namecar`, `voiture`.`disponibilite` AS `disponibilite` FROM ((`marque` join `modele` on((`marque`.`idmarque` = `modele`.`idmarque`))) join `voiture` on((`modele`.`idmodele` = `voiture`.`idmodele`))) ;

-- --------------------------------------------------------

--
-- Structure for view `inventory_grouped`
--
DROP TABLE IF EXISTS `inventory_grouped`;

CREATE VIEW `inventory_grouped`  AS SELECT cast(`inventaire`.`dateinventory` as date) AS `dateinventory`, cast(`inventaire`.`dateinventory` as time) AS `timeinventory`, (case when (`inventaire`.`disponibilite` = 1) then 'Disponible' else 'Indisponible' end) AS `statut`, count(0) AS `numinventory` FROM `inventaire` GROUP BY cast(`inventaire`.`dateinventory` as date), cast(`inventaire`.`dateinventory` as time), `statut` ;

-- --------------------------------------------------------

--
-- Structure for view `reservationView`
--
DROP TABLE IF EXISTS `reservationView`;

CREATE VIEW `reservationView`  AS SELECT `reservation`.`idreservation` AS `idreservation`, `reservation`.`idclient` AS `idclient`, `reservation`.`datereservation` AS `datereservation`, `reservation`.`debutlocation` AS `debutlocation`, `reservation`.`finlocation` AS `finlocation`, `reservation`.`nomperson1` AS `nomperson1`, `reservation`.`prenomperson1` AS `prenomperson1`, `reservation`.`addressperson1` AS `addressperson1`, `reservation`.`telperson1` AS `telperson1`, `reservation`.`paidby` AS `paidby`, `reservation`.`prixlocation` AS `prixlocation`, `carView`.`namecar` AS `namecar`, `customer`.`lastnamecustomer` AS `lastnamecustomer`, `customer`.`firstnamecustomer` AS `firstnamecustomer`, `customer`.`mailcustomer` AS `mailcustomer`, `customer`.`phonecustomer` AS `phonecustomer`, `reservation`.`statutreservation` AS `statutreservation`, `carView`.`disponibilite` AS `disponibilite`, `carView`.`matricule` AS `matricule` FROM ((`reservation` join `customer` on((`reservation`.`idclient` = `customer`.`idcustomer`))) join `carView` on((`reservation`.`idvoiture` = `carView`.`matricule`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`),
  ADD UNIQUE KEY `mailcustomer` (`mailcustomer`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idfacture`),
  ADD KEY `fk_facture_reservation` (`idreservation`);

--
-- Indexes for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`idgestionnaire`),
  ADD UNIQUE KEY `mailgestionnaire` (`usermanager`);

--
-- Indexes for table `inventaire`
--
ALTER TABLE `inventaire`
  ADD PRIMARY KEY (`idinventory`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`idmarque`),
  ADD UNIQUE KEY `namemarque` (`namemarque`);

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`idmodele`),
  ADD UNIQUE KEY `namemodele` (`namemodele`),
  ADD KEY `fk_modele_marque` (`idmarque`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idpromotion`);

--
-- Indexes for table `received`
--
ALTER TABLE `received`
  ADD PRIMARY KEY (`idrecu`),
  ADD KEY `fk_recu_facture` (`idfacture`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`),
  ADD KEY `fk_reservation_customer` (`idclient`),
  ADD KEY `fk_reservation_voiture` (`idvoiture`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `fk_voiture_model` (`idmodele`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `idfacture` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69402;

--
-- AUTO_INCREMENT for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `idgestionnaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventaire`
--
ALTER TABLE `inventaire`
  MODIFY `idinventory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `idmarque` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `idmodele` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idpromotion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `received`
--
ALTER TABLE `received`
  MODIFY `idrecu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_facture_reservation` FOREIGN KEY (`idreservation`) REFERENCES `reservation` (`idreservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `fk_modele_marque` FOREIGN KEY (`idmarque`) REFERENCES `marque` (`idmarque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `received`
--
ALTER TABLE `received`
  ADD CONSTRAINT `fk_recu_facture` FOREIGN KEY (`idfacture`) REFERENCES `facture` (`idfacture`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_customer` FOREIGN KEY (`idclient`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`idvoiture`) REFERENCES `voiture` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `fk_voiture_model` FOREIGN KEY (`idmodele`) REFERENCES `modele` (`idmodele`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
