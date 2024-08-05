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
INSERT INTO `data_ukm` VALUES (1,'SC/0mdnLncU3a/+T9XGl/kcyUExiejVEQnpUUUdZeGp2RE92ZUE9PQ==','rtD8THdKgrMhR8bPQqI6OHNsVDU0b2dxMDhuWWwzbEwyb0FIK2c9PQ==','519xczJf4HslZQWICNPYFUdBOXJPVEVLbE50cEtwT29nemxmdEE9PQ==','jbetO0Bn6Jnh934M5gi5j0VQNG0zSFN3a0hxWE10ZWltb0ZjMmc9PQ==','RWghhZc5yJ5U8xx5nVq1MVcrL20rekYwajR4TzBJcnU0Q01CaGc9PQ==','tYUPnKZ35b5lii3b/I3kiEJTS1h1THM2ME83cjhWWUk0M2FnMkE9PQ==');
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

-- Dump completed on 2024-08-05 14:55:06
