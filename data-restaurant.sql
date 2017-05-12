-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurant
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `BookingTime` datetime NOT NULL,
  `NumberOfSeats` tinyint(4) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`),
  CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (15,18,'2017-01-01 12:00:00',0,'2017-05-12 10:39:12');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meal` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Photo` varchar(30) NOT NULL,
  `QuantityInStock` tinyint(4) NOT NULL,
  `BuyPrice` float NOT NULL,
  `SalePrice` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal`
--

LOCK TABLES `meal` WRITE;
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` VALUES (0,'charlotte','La charlotte est un type de dessert moulé de forme cylindrique ou tronconique, d&apos;environ 10 cm de hauteur formé d&apos;une croûte faite de biscuits à la cuillère','charlotte.jpg',15,7.5,15),(1,'Coca-Cola','Mmmm, le Coca-Cola avec 10 morceaux de sucres et tout plein de caféine !','coca.jpg',72,0.6,3),(2,'Bagel Thon','Notre bagel est constitué d\'un pain moelleux avec des grains de sésame et du thon albacore, accompagné de feuilles de salade fraîche du jour  et d\'une sauce renversante :-)','bagel_thon.jpg',18,2.75,5.5),(3,'Bacon Cheeseburger','Ce délicieux cheeseburger contient un steak haché viande française de 150g ainsi que d\'un buns grillé juste comme il faut, le tout accompagné de frites fraîches maison !','bacon_cheeseburger.jpg',14,6,12.5),(4,'Carrot Cake','Le carrot cake maison ravira les plus gourmands et les puristes : tous les ingrédients sont naturels !\r\nÀ consommer sans modération','carrot_cake.jpg',9,3,6.75),(5,'Donut Chocolat','Les donuts sont fabriqués le matin même et sont recouvert d\'une délicieuse sauce au chocolat !','chocolate_donut.jpg',16,3,6.2),(6,'Dr. Pepper','Son goût sucré avec de l\'amande vous ravira !','drpepper.jpg',53,0.5,2.9),(7,'Milkshake','Notre milkshake bien crémeux contient des morceaux d\'Oréos et est accompagné de crème chantilly et de smarties en guise de topping. Il éblouira vos papilles !','milkshake.jpg',12,2,5.35),(8,'glace','meilleur dessert au monde','image.jpg',10,1.1,2.2);
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `TotalAmount` float DEFAULT NULL,
  `TaxRate` float NOT NULL,
  `TaxAmount` float DEFAULT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,2,NULL,20,NULL,'2016-04-06 15:27:29',NULL),(2,2,NULL,20,NULL,'2016-04-06 15:28:47',NULL),(3,2,81,20,16.2,'2016-04-06 15:29:04','2016-04-06 15:29:04'),(4,2,117,20,23.4,'2016-04-06 15:29:18','2016-04-06 15:29:18');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Order_Id` int(11) NOT NULL,
  `Meal_Id` int(11) NOT NULL,
  `QuantityOrdered` tinyint(4) NOT NULL,
  `PriceEach` float NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Order_Id` (`Order_Id`),
  KEY `Meal_Id` (`Meal_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderline`
--

LOCK TABLES `orderline` WRITE;
/*!40000 ALTER TABLE `orderline` DISABLE KEYS */;
INSERT INTO `orderline` VALUES (1,3,4,12,6.75),(2,4,4,12,6.75),(3,4,1,12,3);
/*!40000 ALTER TABLE `orderline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `BirthDate` date DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `City` varchar(40) DEFAULT NULL,
  `ZipCode` char(5) DEFAULT NULL,
  `Phone` char(20) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `LastLoginTimestamp` datetime DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
  (2,'Alan','DEDOBBELER','contact@ad-creatif.com','$2y$11$de1ea993e285775c1bcdduMAGqjxB2Qz1091ijvKe4mxmD5w/d9yC','2016-04-06','60 rue de Garches','Nanterre','92000','0695546125','2016-04-06 15:26:52',NULL,NULL,0),
  (17,'poil','poil','poil','$2y$11$38804bef9f95bdabffabfODopoBbNKShc7uvdXTl6qasvSvrrsuSO','1917-01-01','poil','poil','poil','poil','2017-05-12 10:29:35',NULL,'poil',0),
  (18,'admin','admin','admin','$2y$11$33f4b987dd04d798fd60bu4W5Y02MrzmEiTQlFp1VXNtyoz.6YytS','1917-01-01','admin','admin','admin','admin','2017-05-12 10:30:57',NULL,'admin',1),
  (19,'test','test','test<script>','$2y$11$4ce8c0a850e7f0184f31aujNJpGs.9FFigg54qIQx2xVSxts9Kdpi','1917-01-01','test','test','test','test','2017-05-12 10:31:19',NULL,'test',0),
  (20,'','','','$2y$11$b05bf808ef8fe9a646a24ukOLO1Y0pWyHc4XzLqKcE5YcllYfI1DW','1917-01-01','','','','','2017-05-12 10:50:37',NULL,'',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-12 12:12:21
