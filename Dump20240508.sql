CREATE DATABASE  IF NOT EXISTS `padelceika` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `padelceika`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: padelceika
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `horas`
--

DROP TABLE IF EXISTS `horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horas` (
  `idhoras` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idhoras`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas`
--

LOCK TABLES `horas` WRITE;
/*!40000 ALTER TABLE `horas` DISABLE KEYS */;
INSERT INTO `horas` VALUES (1,'10-11'),(2,'11-12'),(3,'12-13'),(4,'13-14'),(5,'14-15'),(6,'15-16'),(7,'16-17'),(8,'18-19'),(9,'19-20'),(10,'20-21'),(11,'21-22');
/*!40000 ALTER TABLE `horas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `idnews` int(11) NOT NULL AUTO_INCREMENT,
  `news_name` varchar(255) DEFAULT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_pic` varchar(255) DEFAULT NULL,
  `news_descr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idnews`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'noticia1','¿Cuáles son las claves de una pretemporada de pádel?','img_1.jpg','Cuando cada vez falta menos para el comienzo de la nueva temporada, los jugadores profesionales se encuentran en plena pretemporada. El que fuera fisioterapeuta oficial del circuito, Jordi Riba, dejo algunas claves en una entrevista al World Padel Tour so'),(2,'noticia2','adidas lanza al mercado la nueva Adipower Legend de Seba Nerone','img_2.jgp','¿Cómo es la nueva Adipower Legend?'),(3,'noticia3','Wall Breaker 375, la joya de la corona de Tecnifibre','img_3.jpg','Wall Breaker 375 es una pala de gama alta lanzada por Tecnifibre y que lleva el mejor jugador francés, Ben Tison, así como el recién fichado Fede Chiostri, ex-número 1 del circuito APT Padel Tour (ahora A1 Padel).');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pista`
--

DROP TABLE IF EXISTS `pista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pista` (
  `idpista` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepista` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpista`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pista`
--

LOCK TABLES `pista` WRITE;
/*!40000 ALTER TABLE `pista` DISABLE KEYS */;
INSERT INTO `pista` VALUES (1,'Beluga','pista1.jpg'),(2,'Tesla','pista1.jpg'),(3,'Nadal','pista1.jpg'),(4,'Federer','pista1.jpg');
/*!40000 ALTER TABLE `pista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players` (
  `idplayers` int(11) NOT NULL AUTO_INCREMENT,
  `idreserva` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `nombre_jugador` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idplayers`),
  KEY `fk_users_idx` (`iduser`),
  KEY `fk_reservas_idx` (`idreserva`),
  CONSTRAINT `fk_reservas` FOREIGN KEY (`idreserva`) REFERENCES `reservas` (`idreserva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,20,3,'Juan'),(2,22,3,'Maria'),(3,22,3,'Juan'),(4,22,3,'Lucia'),(5,22,3,'Pedro'),(6,23,3,'Pedro'),(7,24,3,'Maria'),(8,25,3,'Juan'),(9,25,3,'Pedro'),(10,25,3,'Lucia'),(11,25,3,'Maera');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `idreserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` date DEFAULT current_timestamp(),
  `fecha_reserva` date DEFAULT NULL,
  `idhora` int(11) DEFAULT NULL,
  `idpista` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idreserva`),
  KEY `fk_horas_idx` (`idhora`),
  KEY `fk_pista_idx` (`idpista`),
  KEY `fk_user_idx` (`iduser`),
  CONSTRAINT `fk_horas` FOREIGN KEY (`idhora`) REFERENCES `horas` (`idhoras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pista` FOREIGN KEY (`idpista`) REFERENCES `pista` (`idpista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,'2024-05-06','2024-05-09',1,1,1),(2,'2024-05-07','2024-05-07',2,1,1),(3,'2024-05-07','2024-05-07',3,1,1),(4,'2024-05-07','2024-05-07',4,1,1),(5,'2024-05-07','2024-05-07',5,1,1),(7,'2024-05-07','2024-05-07',7,1,1),(8,'2024-05-07','2024-05-07',8,1,1),(9,'2024-05-07','2024-05-07',9,1,1),(10,'2024-05-07','2024-05-07',10,1,1),(11,'2024-05-07','2024-05-07',11,1,1),(12,'2024-05-08','2024-05-08',4,1,3),(13,'2024-05-08','2024-05-16',3,1,3),(14,'2024-05-08','2024-05-16',3,1,3),(15,'2024-05-08','2024-05-08',2,2,3),(16,'2024-05-08','2024-05-08',2,2,3),(17,'2024-05-08','2024-05-08',2,2,3),(18,'2024-05-08','2024-05-08',4,3,3),(19,'2024-05-08','2024-05-08',4,3,3),(20,'2024-05-08','2024-05-09',2,3,3),(21,'2024-05-08','2024-05-09',2,3,3),(22,'2024-05-08','2024-05-08',2,4,3),(23,'2024-05-08','2024-05-22',6,4,3),(24,'2024-05-08','2024-05-15',3,4,3),(25,'2024-05-08','2024-05-22',8,4,3);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ricardo','1234','img_1'),(2,'arantxa','1234','img_2'),(3,'luci','1234','img_3'),(4,'sergio','1234','img_4');
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

-- Dump completed on 2024-05-08 18:48:33
