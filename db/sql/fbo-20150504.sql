-- MySQL dump 10.14  Distrib 5.5.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: fbo
-- ------------------------------------------------------
-- Server version	5.5.41-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Aircraft`
--

DROP TABLE IF EXISTS `Aircraft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aircraft` (
  `reg_number` varchar(6) NOT NULL,
  `cost` decimal(15,2) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aircraft`
--

LOCK TABLES `Aircraft` WRITE;
/*!40000 ALTER TABLE `Aircraft` DISABLE KEYS */;
INSERT INTO `Aircraft` VALUES ('',115.00,2),('N2159Q',109.00,5),('N2213W',137.00,7),('N3421E',109.00,2),('N484ER',140.00,3),('N49439',86.00,1),('N6146Q',86.00,1),('N6205J',120.00,6),('N8262S',120.00,6),('N91HL',86.00,1),('N95787',86.00,1);
/*!40000 ALTER TABLE `Aircraft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pilot`
--

DROP TABLE IF EXISTS `Pilot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pilot` (
  `username` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pilot`
--

LOCK TABLES `Pilot` WRITE;
/*!40000 ALTER TABLE `Pilot` DISABLE KEYS */;
INSERT INTO `Pilot` VALUES ('<script>alert(\"Sup.\"','<script>alert(\"Sup.\"','<script>alert(\"Sup.\"','<script>alert(\"Sup.\");</script>','$2y$10$PSAi0pweJGPavaHmHxCga.jcnFENhqG/4Pnif9OOXdMpWlmtxWBZ2',NULL),('asdf','Richard Holster','badoopbadoop','skin illumination','$2y$10$9ux5V2vlic.YyCVTP09so.FCm4IipP8bo6Jg4gUR.X.g5eHghWI3W',NULL),('ifly','Jack Ass','911','6969 Whore St','$2y$10$06m.s4ma7MT.S81QSdiKXeY39GirjzmiKytvuKNa2tj.vVW/SV6gy',0),('jdoe','abc','123123123','123 street st','$2y$10$1CPJ0YoEaTM7qqwSvl9/Ve4Ab6.BjZK6NkG5AQdHv6KWtuzeS1sA.',0),('john','johhny','2352352','123 fake st','$2y$10$ce4cndeq7WijnUEXiN3Etu9iGNFuhLlkNpZKc3KunI5fVP/701mQW',NULL),('pumpkinseed','Andrew','2622622626','123 street blvd','$2y$10$itfBE1WgIPZt5DkMsBkuQOj./yutPngY7jRJBNa8qQOnWmtkLo8o6',1),('tstank','Tyler Stank','2627246355','119 W Gorham St.','$2y$10$dzITtcyJvXOBUG3cQx53luOtxx4N9QdW8NVJebNZDMLpjV.HLK/GS',1),('tyler','Tyler','2627246355','119 W Gorham St','$2y$10$Yr8wK7D/JCjrk6w9wu.ISeiX5dXIi7v2sFz1Cf5L71a9PMDk2WR.2',0),('weht','<div>kekerino</div>','<div>kekerino</div>','<div>kekerino</div>','$2y$10$NhYuzsE/k61QEccbIiGFHubLw4mm8HzbJo.tuFPR9iwadcU.sCYNq',NULL);
/*!40000 ALTER TABLE `Pilot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rental`
--

DROP TABLE IF EXISTS `Rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Rental` (
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `reg_number` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rental`
--

LOCK TABLES `Rental` WRITE;
/*!40000 ALTER TABLE `Rental` DISABLE KEYS */;
INSERT INTO `Rental` VALUES ('2015-06-06 10:00:00','2015-06-06 14:00:00',1,'tstank','N91HL'),('2015-12-13 00:00:00','2016-01-01 01:00:00',2,'asdf','N91HL'),('2015-12-31 23:00:00','2020-01-01 00:00:00',3,'asdf','N91HL'),('2022-02-02 23:00:00','2023-01-01 13:00:00',4,'','N6146Q'),('2015-01-07 06:00:00','2015-01-16 09:00:00',5,'asdf','N95787'),('2015-01-01 00:00:00','2025-12-31 23:00:00',6,'asdf','N91HL'),('2015-01-01 00:00:00','2015-01-01 00:00:00',7,'pumpkinseed',''),('2015-01-01 14:00:00','2015-11-15 00:00:00',8,'pumpkinseed',''),('2015-01-01 00:00:00','2016-01-01 00:00:00',9,'asdf','N91HL'),('2015-01-01 00:00:00','2015-01-01 01:00:00',10,'asdf','N91HL'),('2015-06-06 15:00:00','2015-06-06 16:00:00',11,'tstank','N49439'),('2015-01-01 05:00:00','2015-01-11 05:00:00',12,'weht','N95787'),('2015-01-01 00:00:00','2015-01-01 17:00:00',13,'weht','N95787'),('2015-01-01 00:00:00','2022-01-01 00:00:00',14,'weht','N95787'),('2015-01-01 00:00:00','2025-01-01 00:00:00',15,'weht','Your M'),('2015-01-01 00:00:00','2023-01-01 00:00:00',16,'weht','<s>'),('2015-01-01 00:00:00','2020-01-01 00:00:00',17,'weht','<s>Weh');
/*!40000 ALTER TABLE `Rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Type`
--

DROP TABLE IF EXISTS `Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Type` (
  `manf` varchar(40) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `common_name` varchar(40) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Type`
--

LOCK TABLES `Type` WRITE;
/*!40000 ALTER TABLE `Type` DISABLE KEYS */;
INSERT INTO `Type` VALUES ('Cessna','152','','C152',1),('Cessna','172','Skyhawk','C172',2),('Cessna','172S','Skyhawk S','C172',3),('Piper','PA-28-140','Cherokee','PA28',4),('Piper','PA-28-181','Archer','PA28',6),('Piper','PA-28R','Arrow','PA28',7),('Piper','PA-28-161','Warrior','PA28',8);
/*!40000 ALTER TABLE `Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `can_rent`
--

DROP TABLE IF EXISTS `can_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `can_rent` (
  `username` varchar(20) DEFAULT NULL,
  `reg_number` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `can_rent`
--

LOCK TABLES `can_rent` WRITE;
/*!40000 ALTER TABLE `can_rent` DISABLE KEYS */;
INSERT INTO `can_rent` VALUES ('tstank','N49439'),('tstank','N6146Q'),('tstank','N91HL'),('tstank','N95787'),('tstank','N2159Q'),('tstank','N6205J'),('tstank','N8262S'),('asdf','N91HL'),('asdf','N49439'),('asdf','N95787'),('asdf','N6146Q'),('tyler','N2213W'),('weht','N95787');
/*!40000 ALTER TABLE `can_rent` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-04 17:08:24
