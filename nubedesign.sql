-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: nubedesign
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `cuatrimestre` tinyint(3) unsigned NOT NULL,
  `duracion` tinyint(3) unsigned NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'Proceso de Diseño',1,1,8426),(2,'Teoría y Gestión de la Comunicación',1,1,4373),(3,'Historia del Diseño de Comunicación',1,1,4585),(4,'Narrativa I',1,1,8807),(5,'Taller de Diseño de Comunicación I',2,1,2285),(6,'Laboratorio I',2,1,2003),(7,'Estética',2,1,2157),(8,'Narrativa II',2,1,3780),(9,'Inglés I',3,1,2430),(10,'Laboratorio II',3,1,8808),(11,'Mercadotecnia',3,1,8756),(12,'Semiótica I',3,1,7357),(13,'Taller de Diseño de Comunicación II',4,1,9516),(14,'Laboratorio III',4,1,6511),(15,'Tecnología I',4,1,3009),(16,'Inglés II',4,1,3512),(17,'Taller de Diseño de Comunicación III',5,1,7535),(18,'Laboratorio IV',5,1,8129),(19,'Semiótica II',5,1,8049),(20,'Discurso Audiovisual I',5,1,5858),(21,'Portugués',6,1,4145),(22,'Tecnología II',6,1,2151),(23,'Ética y Deontología Profesional',6,1,6321),(24,'Taller de Práctica Profesional Obligatoria',6,1,6152),(25,'Tecnología III',7,1,1798),(26,'Taller de Diseño de Comunicación IV',7,1,7532),(27,'Discurso Audiovisual II',7,1,4268),(28,'Marketing Político y Social',7,1,6747),(29,'Seminario de Comunicación I',8,1,1934),(30,'Metodología de Investigación y Epistemología de la Comunicación',8,1,6427),(31,'Institución y Sociedad',8,1,7335),(32,'Comunicación Estratégica I',8,1,7396),(33,'Seminario de Comunicación II',9,1,4976),(34,'Diseño Social',9,1,1691),(35,'Espacio y Territorialidad',9,1,1527),(36,'Comunicación Estratégica II',9,1,1564),(37,'Gestión de las Organizaciones',10,1,2239),(38,'Dirección y Evaluación de Proyectos',10,1,5503),(39,'Planeamiento Comunicacional',10,1,1802),(40,'Taller de Tesina',10,1,9500);
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concepto`
--

DROP TABLE IF EXISTS `concepto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `concepto` (
  `idConcepto` int(11) NOT NULL AUTO_INCREMENT,
  `palabra` varchar(288) NOT NULL,
  `registro` datetime DEFAULT NULL,
  `idAsignatura` int(11) NOT NULL,
  PRIMARY KEY (`idConcepto`),
  KEY `Concepto_Asignatura_idx` (`idAsignatura`),
  CONSTRAINT `Concepto_Asignatura` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concepto`
--

LOCK TABLES `concepto` WRITE;
/*!40000 ALTER TABLE `concepto` DISABLE KEYS */;
INSERT INTO `concepto` VALUES (1,'Primera','2018-10-06 23:13:17',3),(2,'Segunda','2018-10-03 21:03:00',4),(3,'Segunda','2018-10-03 21:05:00',2),(4,'Tercera','2018-10-03 21:04:00',5),(5,'Otra','2018-10-06 22:17:00',2),(6,'cadena','2018-10-07 02:14:37',3),(7,'perpetua','2018-10-07 03:12:14',3),(8,'malas costumbres','2018-10-07 03:36:04',1),(9,'massacre','2018-10-07 03:50:29',2),(10,'punk','2018-10-07 04:00:32',3),(11,'Hola!','2018-10-07 04:10:11',2),(12,'digitalidad','2018-10-07 21:30:48',22),(13,'digitalidad','2018-10-07 21:30:52',22),(14,'digitalidad','2018-10-07 21:30:55',22),(15,'digitalidad','2018-10-07 21:30:59',22),(16,'digitalidad','2018-10-07 21:31:00',22),(17,'digitalidad','2018-10-07 21:31:00',22),(18,'digitalidad','2018-10-07 21:31:01',22),(19,'digitalidad','2018-10-07 21:31:01',22),(20,'digitalidad','2018-10-07 21:31:02',22),(21,'digitalidad','2018-10-07 21:31:02',22),(22,'digitalidad','2018-10-07 21:31:03',22);
/*!40000 ALTER TABLE `concepto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-04  6:44:09
