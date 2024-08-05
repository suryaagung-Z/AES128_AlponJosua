-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: aes128_alpon_josua
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

--
-- Table structure for table `data_ukm`
--

DROP TABLE IF EXISTS `data_ukm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_ukm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `diskon` varchar(255) NOT NULL,
  `ppn` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_ukm`
--

LOCK TABLES `data_ukm` WRITE;
/*!40000 ALTER TABLE `data_ukm` DISABLE KEYS */;
INSERT INTO `data_ukm` VALUES (1,'I62A9fsiuwfGrAxfXOzSt0RCZFc0OUFRMVIwT2xNdHhLN01ZRUE9PQ==','MskFEZdy9CvXCDhtOxkS6zdWUlJqRiswVWxIWm14MzBEeFdyelE9PQ==','NQPwVa5cTReYBrgBnFMjEHFsdm55cjcwVjA3Vm9SR0Q3RlR4T3c9PQ==','43Rq/5xYANtNL/AzaEav5WxMVGc3d3djYm01blQyUlhFWDQ0N1E9PQ==','5x8oB3u3+GXNVex1CNKGf1cxY3U3aWg4dDg2MkVQOU1WQ2xNT2c9PQ==','CMd0E5CHkivqaJWSYm7532hvUmk2WGJKR0FHdENSRjlaRTFMT1E9PQ==','xXyIIy2gcDI94hfhIV9AS3NkaC93Y0ZuVTk1ZytvOHJ3Z3UvbkE9PQ==','cj9Tsa6lt0P2dLmH52O692hOT2FneFNydURpajNvSmovcStqMlE9PQ==');
/*!40000 ALTER TABLE `data_ukm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secret_keys`
--

DROP TABLE IF EXISTS `secret_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secret_keys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secret_keys`
--

LOCK TABLES `secret_keys` WRITE;
/*!40000 ALTER TABLE `secret_keys` DISABLE KEYS */;
INSERT INTO `secret_keys` VALUES (1,'&mC8irZ?|*%s]Zct');
/*!40000 ALTER TABLE `secret_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'josua','josua@gmail.com','$2y$10$kmZJWbTcDoOroOWIle6FaeNAgcc8z4XjhsbYck5KRaWPPyXZOzD02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-05 20:58:19
