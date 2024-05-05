-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: carexpressdb
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE carexpressdb;

USE carexpressdb;
--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrateur` (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `usernameadmin` varchar(100) NOT NULL,
  `passwordadmin` varchar(255) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateur`
--

LOCK TABLES `administrateur` WRITE;
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` VALUES (2,'admin','$2y$10$zRFM71oZiBIGWcO6V1AiHuJ4BpK2T9YiuW0cKXwnaGfGjdYxsNl4G');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `idcustomer` int NOT NULL AUTO_INCREMENT,
  `lastnamecustomer` varchar(100) NOT NULL,
  `firstnamecustomer` varchar(100) NOT NULL,
  `mailcustomer` varchar(150) NOT NULL,
  `adressecustomer` varchar(150) DEFAULT NULL,
  `phonecustomer` varchar(50) NOT NULL,
  `nationnalitycustomer` varchar(100) DEFAULT NULL,
  `permiscustomer` varchar(100) DEFAULT NULL,
  `birthdaycustomer` date DEFAULT NULL,
  `passwordcustomer` varchar(100) NOT NULL,
  PRIMARY KEY (`idcustomer`),
  UNIQUE KEY `mailcustomer` (`mailcustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facture` (
  `idfacture` int NOT NULL AUTO_INCREMENT,
  `datefacture` date NOT NULL,
  `idreservation` int NOT NULL,
  `prixunitaire` float NOT NULL,
  `nbrejours` int NOT NULL,
  `total` float NOT NULL,
  `taxes` float NOT NULL,
  `montanttotalapayer` float NOT NULL,
  `statutfacture` varchar(50) NOT NULL,
  PRIMARY KEY (`idfacture`),
  KEY `fk_facture_reservation` (`idreservation`),
  CONSTRAINT `fk_facture_reservation` FOREIGN KEY (`idreservation`) REFERENCES `reservation` (`idreservation`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facture`
--

LOCK TABLES `facture` WRITE;
/*!40000 ALTER TABLE `facture` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gestionnaire` (
  `idgestionnaire` int NOT NULL AUTO_INCREMENT,
  `nomgestionnaire` varchar(50) NOT NULL,
  `prenomgestionnaire` varchar(100) NOT NULL,
  `usermanager` varchar(255) DEFAULT NULL,
  `phonegestionnaire` varchar(50) DEFAULT NULL,
  `passwordgestionnaire` varchar(255) NOT NULL,
  PRIMARY KEY (`idgestionnaire`),
  UNIQUE KEY `mailgestionnaire` (`usermanager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestionnaire`
--

LOCK TABLES `gestionnaire` WRITE;
/*!40000 ALTER TABLE `gestionnaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `gestionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marque` (
  `idmarque` int NOT NULL AUTO_INCREMENT,
  `namemarque` varchar(100) NOT NULL,
  PRIMARY KEY (`idmarque`),
  UNIQUE KEY `namemarque` (`namemarque`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `modele`
--

DROP TABLE IF EXISTS `modele`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modele` (
  `idmodele` int NOT NULL AUTO_INCREMENT,
  `idmarque` int NOT NULL,
  `namemodele` varchar(100) NOT NULL,
  PRIMARY KEY (`idmodele`),
  UNIQUE KEY `namemodele` (`namemodele`),
  KEY `fk_modele_marque` (`idmarque`),
  CONSTRAINT `fk_modele_marque` FOREIGN KEY (`idmarque`) REFERENCES `marque` (`idmarque`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotion` (
  `idpromotion` int NOT NULL AUTO_INCREMENT,
  `titrepromotion` varchar(100) NOT NULL,
  `descriptionpromotion` varchar(255) NOT NULL,
  `datestartpromotion` date NOT NULL,
  `dateendpromotion` date NOT NULL,
  PRIMARY KEY (`idpromotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `received`
--

DROP TABLE IF EXISTS `received`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `received` (
  `idrecu` int NOT NULL AUTO_INCREMENT,
  `daterecu` date NOT NULL,
  `idfacture` int DEFAULT NULL,
  `montantpaye` float NOT NULL,
  `methodepaiement` varchar(100) NOT NULL,
  `referencepaiement` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idrecu`),
  KEY `fk_recu_facture` (`idfacture`),
  CONSTRAINT `fk_recu_facture` FOREIGN KEY (`idfacture`) REFERENCES `facture` (`idfacture`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `received`
--

LOCK TABLES `received` WRITE;
/*!40000 ALTER TABLE `received` DISABLE KEYS */;
/*!40000 ALTER TABLE `received` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `idreservation` int NOT NULL,
  `idclient` int NOT NULL,
  `idvoiture` varchar(100) NOT NULL,
  `datereservation` date NOT NULL,
  `debutlocation` date NOT NULL,
  `finlocation` date NOT NULL,
  `statutreservation` varchar(100) NOT NULL,
  PRIMARY KEY (`idreservation`),
  KEY `fk_reservation_customer` (`idclient`),
  KEY `fk_reservation_voiture` (`idvoiture`),
  CONSTRAINT `fk_reservation_customer` FOREIGN KEY (`idclient`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_reservation_voiture` FOREIGN KEY (`idvoiture`) REFERENCES `voiture` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voiture` (
  `matricule` varchar(100) NOT NULL,
  `idmodele` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `vehiculepicture` varchar(100) NOT NULL,
  `rentprice` float NOT NULL,
  `disponibilite` int NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `fk_voiture_model` (`idmodele`),
  CONSTRAINT `fk_voiture_model` FOREIGN KEY (`idmodele`) REFERENCES `modele` (`idmodele`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (5,'BONI','Ange','angeboni@gmail.com',NULL,'53117212',NULL,NULL,NULL,'$2y$10$5kKsKoTDmLX60ek1uHOid.qLSVF99WRbU/BQQY3UnBadxwD/JBS6i'),(6,'Test','Test','test.test@gmail.com',NULL,'58742314',NULL,NULL,NULL,'$2y$10$ilKwFM4tcLlQ8G4otMsUqeSL1PNtHSzMOTknZFk3zjA8NrbLPge.i');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `marque`
--

LOCK TABLES `marque` WRITE;
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` VALUES (2,'BMW'),(5,'Ford'),(3,'Honda'),(4,'Mercedes-Benz'),(6,'Tesla'),(1,'Toyota');

/*!40000 ALTER TABLE `marque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `modele`
--

LOCK TABLES `modele` WRITE;
/*!40000 ALTER TABLE `modele` DISABLE KEYS */;
INSERT INTO `modele` VALUES (1,2,'Serie 1'),(2,2,'Serie 2'),(3,2,'Serie 3'),(4,2,'X1'),(5,2,'X3'),(6,2,'X5'),(7,2,'Serie 7'),(8,2,'Serie 8'),(9,2,'X7'),(10,5,'Fiesta'),(11,5,'Focus'),(12,5,'Fusion'),(13,5,'EcoSport'),(14,5,'Escape'),(15,5,'Explorer'),(16,5,'Taurus'),(17,5,'Edge'),(18,5,'Mustang'),(19,3,'Fit'),(20,3,'Civic'),(21,3,'Accord'),(22,3,'HR-V'),(23,3,'CR-V'),(24,3,'Pilot'),(25,3,'Legend'),(26,3,'NSX'),(27,3,'Clarity'),(28,4,'Classe A'),(29,4,'Classe B'),(30,4,'Classe C'),(31,4,'GLA'),(32,4,'GLC'),(33,4,'GLE'),(34,4,'S-Class'),(35,4,'E-Class'),(36,4,'G-Class'),(37,6,'Model 3'),(38,6,'Model Y'),(39,6,'Model Y Long Range'),(40,6,'Model S'),(41,6,'Model X'),(42,6,'Model X Plaid'),(43,6,'Model S Plaid'),(44,6,'Roadster'),(45,1,'Yaris'),(46,1,'Corolla'),(47,1,'Prius'),(48,1,'RAV4'),(49,1,'Highlander'),(50,1,'Land Cruiser'),(51,1,'Avalon'),(52,1,'Camry'),(53,1,'Mirai');
/*!40000 ALTER TABLE `modele` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` VALUES ('AEV232',33,'suv','auto','33_20240426183706.jpg',70000,1),('EZH873',10,'eco','auto','10_20240426183518.jpg',50000,1),('GLE289',41,'luxe','auto','41_20240426183628.jpg',100000,1),('JVX893',4,'suv','manuel','4_20240426183445.jpg',40000,1),('NWY592',1,'eco','auto','1_20240426183359.jpeg',25000,1),('QQO600',37,'luxe','auto','37_20240426183832.jpg',120000,1);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-03  8:20:30
