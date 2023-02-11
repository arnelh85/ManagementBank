-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: management_bank
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Account_No` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Balance` decimal(10,2) NOT NULL,
  `BankClientID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_BankClients_Accounts` (`BankClientID`),
  CONSTRAINT `FK_BankClients_Accounts` FOREIGN KEY (`BankClientID`) REFERENCES `bankclients` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'10000000000',4200.00,1),(2,'10000000001',2780.00,2),(3,'10000000002',6200.00,3),(4,'10000000003',6000.00,4),(5,'10000000004',5520.00,5);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankclients`
--

DROP TABLE IF EXISTS `bankclients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankclients` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `FirstName` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `BirthDate` date NOT NULL,
  `PersonalID_No` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `City` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Country` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `PhoneNumber` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `BankEmployeeID` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_BankEmployees_BankClients` (`BankEmployeeID`),
  CONSTRAINT `FK_BankEmployees_BankClients` FOREIGN KEY (`BankEmployeeID`) REFERENCES `bankemployees` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankclients`
--

LOCK TABLES `bankclients` WRITE;
/*!40000 ALTER TABLE `bankclients` DISABLE KEYS */;
INSERT INTO `bankclients` VALUES (1,'Beciragic','Adnan','2000-05-08','4092567094576','Sarajevo','Bosnia and Herzegovina','Mula Mustafe Baseskije 17','061 450-764','adnan.beciragic2000@hotmail.com',1),(2,'Avramovic','Milos','2002-10-03','9053579768063','Banja Luka','Bosnia and Herzegovina','Vase Pelagica 12','066 467-245','milos.avramovic2002@hotmail.com',1),(3,'Delibegovic','Melisa','2002-08-12','3591579075408','Tuzla','Bosnia and Herzegovina','Turalibegova 10','062 356-772','melisa.delibegovic2002@hotmail.com',1),(4,'Ramic','Damira','2001-09-02','5063257855690','Zenica','Bosnia and Herzegovina','Zeljezarska 11','062 350-685','damira.ramic2001@hotmail.com',1),(5,'Ramljak','Ante','2001-10-22','6322098655096','Mostar','Bosnia and Herzegovina','Kralja Zvonimira 15','063 570-356','ante.ramljak2001@hotmail.com',NULL);
/*!40000 ALTER TABLE `bankclients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankemployee_types`
--

DROP TABLE IF EXISTS `bankemployee_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankemployee_types` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `EmployeeType` int NOT NULL,
  `Description` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankemployee_types`
--

LOCK TABLES `bankemployee_types` WRITE;
/*!40000 ALTER TABLE `bankemployee_types` DISABLE KEYS */;
INSERT INTO `bankemployee_types` VALUES (1,1,'Administrator'),(2,2,'User');
/*!40000 ALTER TABLE `bankemployee_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankemployees`
--

DROP TABLE IF EXISTS `bankemployees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankemployees` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `FirstName` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `BirthDate` date NOT NULL,
  `PersonalID_No` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `City` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Country` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `PhoneNumber` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `UserName` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Password` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `BankEmployeeTypeID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_BankEmployeeTypes_BankEmployees` (`BankEmployeeTypeID`),
  CONSTRAINT `FK_BankEmployeeTypes_BankEmployees` FOREIGN KEY (`BankEmployeeTypeID`) REFERENCES `bankemployee_types` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankemployees`
--

LOCK TABLES `bankemployees` WRITE;
/*!40000 ALTER TABLE `bankemployees` DISABLE KEYS */;
INSERT INTO `bankemployees` VALUES (1,'Hodzic','Arnel','1985-05-13','8644503511375','Gracanica','Bosnia and Herzegovina','Gornja Orahovica bb','061 904-328','arnel.hodzic1985@hotmail.com','arnel37','eyJpdiI6ImsxTHdmZWVVNlEvSDZvMGN1U2I2UHc9PSIsInZhbHVlIjoibVJRVEV0OXA3TU5LTXBSdWxoeEExUT09IiwibWFjIjoiNjBkMjFiNTNlNjY3N2M3ZGE4MjI2MDk0YzY3ZmI2NDFlZDQ2MGYzOWQ1NDg4ZDgzMzU2YmEwYzdiNGZjYmY1MyIsInRhZyI6IiJ9',1),(4,'Tahirovic','Mahir','2001-04-12','1479044679851','Zenica','Bosnia and Herzegovina','Ivana Gundulica 20','062 540-237','mahir.tahirovic2001@hotmail.com','mahir22','eyJpdiI6IkE3VHNpbjBOSzBzVXp5cGYzczhZREE9PSIsInZhbHVlIjoiQXdRU0VCUjRrY1VuVWlwZDZkM3BCWmVHQXJmdTJwekJQY01zczNncmVPTT0iLCJtYWMiOiJlZWE5OGI5NmIxMjZmZDBhMzQ0MzVlZTEwMTU3YjYwZjE0MjQ1ZTFmM2Q1NjI2NmEzMGNkNTVmYWU5ZTUzZTczIiwidGFnIjoiIn0=',2);
/*!40000 ALTER TABLE `bankemployees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issuedcards`
--

DROP TABLE IF EXISTS `issuedcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issuedcards` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CardType` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Card_No` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ExpMonth` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ExpYear` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `SecurityCode` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `PIN_Code` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ModifiedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `BankClientID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_BankClients_IssuedCards` (`BankClientID`),
  CONSTRAINT `FK_BankClients_IssuedCards` FOREIGN KEY (`BankClientID`) REFERENCES `bankclients` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issuedcards`
--

LOCK TABLES `issuedcards` WRITE;
/*!40000 ALTER TABLE `issuedcards` DISABLE KEYS */;
INSERT INTO `issuedcards` VALUES (7,'Debit Card','4456 3072 5455 7887','5','2027','257','8022','2023-02-11 17:42:20',1);
/*!40000 ALTER TABLE `issuedcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TransactionAmount` decimal(10,2) NOT NULL,
  `TransactionDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Is_Recipient` bit(1) DEFAULT b'0',
  `AccountID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Accounts_Transactions` (`AccountID`),
  CONSTRAINT `FK_Accounts_Transactions` FOREIGN KEY (`AccountID`) REFERENCES `accounts` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (9,1000.00,'2023-02-11 13:25:10',_binary '',2),(10,1000.00,'2023-02-11 13:25:10',_binary '\0',1),(11,1200.00,'2023-02-11 13:31:46',_binary '',1),(12,1200.00,'2023-02-11 13:31:46',_binary '\0',2);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'management_bank'
--
/*!50003 DROP PROCEDURE IF EXISTS `proc_delete_bankclient` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_delete_bankclient`(pBankClientID INT)
BEGIN
	DELETE FROM transactions WHERE AccountID IN (SELECT a.id FROM accounts a WHERE a.BankClientID = pBankClientID);
	DELETE FROM issuedcards WHERE BankClientID = pBankClientID;
	DELETE FROM accounts WHERE BankClientID = pBankClientID;
	DELETE FROM bankclients WHERE ID = pBankClientID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_delete_bankemployee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_delete_bankemployee`(pBankEmployeeID INT)
BEGIN
	UPDATE bankclients SET BankEmployeeID = NULL WHERE BankEmployeeID = pBankEmployeeID;
	DELETE FROM bankemployees WHERE ID = pBankEmployeeID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-11 19:02:20
