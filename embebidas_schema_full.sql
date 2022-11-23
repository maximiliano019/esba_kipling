CREATE DATABASE  IF NOT EXISTS `mvc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mvc`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: mvc
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `admin_list`
--

DROP TABLE IF EXISTS `admin_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_list` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `admin_lvl` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_id_UNIQUE` (`admin_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_list`
--

LOCK TABLES `admin_list` WRITE;
/*!40000 ALTER TABLE `admin_list` DISABLE KEYS */;
INSERT INTO `admin_list` VALUES (1,8,99),(4,9,99),(10,26,99);
/*!40000 ALTER TABLE `admin_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleitemscompra`
--

DROP TABLE IF EXISTS `detalleitemscompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalleitemscompra` (
  `id_detalleItemsCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_ordenCompra` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned NOT NULL,
  `cantidad_producto` int(10) unsigned NOT NULL,
  `precioIndividualProductoSinIVA` decimal(18,2) NOT NULL,
  `precioIndividualProductoConIVA` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id_detalleItemsCompra`),
  UNIQUE KEY `id_detalleItemsCompra_UNIQUE` (`id_detalleItemsCompra`),
  KEY `FK_producto_idx` (`id_producto`),
  KEY `FK_ordenCompra_idx` (`id_ordenCompra`),
  CONSTRAINT `FK_ordenCompra` FOREIGN KEY (`id_ordenCompra`) REFERENCES `ordencompra` (`id_ordenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleitemscompra`
--

LOCK TABLES `detalleitemscompra` WRITE;
/*!40000 ALTER TABLE `detalleitemscompra` DISABLE KEYS */;
INSERT INTO `detalleitemscompra` VALUES (6,92,33,1,1500.00,1815.00),(7,92,29,2,5000.00,6050.00),(8,93,33,1,1500.00,1815.00),(9,94,31,1,300.00,363.00),(10,94,29,1,5000.00,6050.00),(11,94,32,4,200.00,242.00),(12,95,32,1,200.00,242.00),(13,96,32,1,200.00,242.00),(14,97,29,11,5000.00,6050.00);
/*!40000 ALTER TABLE `detalleitemscompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoordencompra`
--

DROP TABLE IF EXISTS `estadoordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estadoordencompra` (
  `id_estadoOrdenCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detalle_estadoOrdenCompra` varchar(45) NOT NULL DEFAULT '"REVISAR"',
  `cerrada_estadoOrdenCompra` int(11) NOT NULL,
  PRIMARY KEY (`id_estadoOrdenCompra`),
  UNIQUE KEY `id_estado_ordenCompra_UNIQUE` (`id_estadoOrdenCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoordencompra`
--

LOCK TABLES `estadoordencompra` WRITE;
/*!40000 ALTER TABLE `estadoordencompra` DISABLE KEYS */;
INSERT INTO `estadoordencompra` VALUES (1,'EN PROCESO',0),(2,'DESPACHADA',0),(3,'ENTREGADA',1),(4,'CANCELADA',1);
/*!40000 ALTER TABLE `estadoordencompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordencompra`
--

DROP TABLE IF EXISTS `ordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordencompra` (
  `id_ordenCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `insertTime_ordenCompra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_estadoOrdenCompra` int(10) unsigned NOT NULL DEFAULT '1',
  `hash_ordenCompra` varchar(50) NOT NULL DEFAULT 'Check',
  `id_usuariosEmail` varchar(45) NOT NULL,
  `dir_nombre` varchar(45) NOT NULL,
  `dir_apellido` varchar(45) NOT NULL,
  `dir_calle` varchar(45) NOT NULL,
  `dir_numeroCalle` varchar(45) DEFAULT NULL,
  `dir_piso` varchar(45) DEFAULT NULL,
  `dir_departamento` varchar(45) DEFAULT NULL,
  `dir_provincia` varchar(45) NOT NULL,
  `dir_codigopostal` varchar(45) DEFAULT NULL,
  `dir_observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ordenCompra`),
  UNIQUE KEY `id_ordenCompra_UNIQUE` (`id_ordenCompra`),
  UNIQUE KEY `hash_ordenCompra_UNIQUE` (`hash_ordenCompra`),
  KEY `idx_email` (`id_usuariosEmail`),
  KEY `FK_email_usuario_idx` (`id_usuariosEmail`),
  KEY `FK_estados_compra_idx` (`id_estadoOrdenCompra`),
  CONSTRAINT `FK_email_usuario` FOREIGN KEY (`id_usuariosEmail`) REFERENCES `usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_estados_compra` FOREIGN KEY (`id_estadoOrdenCompra`) REFERENCES `estadoordencompra` (`id_estadoOrdenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordencompra`
--

LOCK TABLES `ordencompra` WRITE;
/*!40000 ALTER TABLE `ordencompra` DISABLE KEYS */;
INSERT INTO `ordencompra` VALUES (92,'2022-08-02 04:22:45',3,'7V2jA3oXhnLNsHxY6G8dvqTiE4KUkPFbRw1zZSerypMJQ5B9m','gustavo.beer@davinci.edu.ar','Gustavo','Beer','Av. Pedro  Goyena','1242','8','a','CABA','1406','HIELO'),(93,'2022-08-02 04:55:12',2,'QFZHj8UX1L56MxotzgDb4aeO2GB9mwpTvCykhAlPf3J0WIsnK','paula@mail.net','Paula','Peyro','Chile','1234','0','0','Andina','5555','sin TACC'),(94,'2022-08-02 17:41:02',4,'FzhYX31v5aeTHtJLQbdir0KqonyIBMUflPwNmZgcGV4C7RuOE','alebronte@mail.net','Ale','Bronte','lalalal','1234','5','b','ACABA','1111','bestia'),(95,'2022-08-02 19:14:57',3,'ATJyH9nCFDXI2ud1sj7RtVzpvGqrxZONlBc8E45iKUgQfkSWw','gustavo.beer@davinci.edu.ar','Gustavo','Beer','Av. Pedro  Goyena','23153','','','CABA','1406',''),(96,'2022-08-02 23:05:30',3,'SNBXMg8rOYa0LpKZR61dVyxJishCI2GtlFwWHqojcem75n4kD','gustavo.beer@davinci.edu.ar','Gustavo','Beer','Av. Pedro  Goyena','324324','dsfsd','43242','CABA','1406','HIELO'),(97,'2022-08-03 02:18:56',1,'DNdpFXQjVzH0WtI2AGoeTvJg7MK6kif4ClEn3Sxq8wRmYa5Pu','god@mail.net','god','god','god','1','1','1','sky','123','god');
/*!40000 ALTER TABLE `ordencompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` int(10) unsigned DEFAULT NULL,
  `stock` int(10) unsigned DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (29,'Barrilito de 5 Lts Heineken','Barrilito de 5 Lts Heineken, con dispenser',5000,1,'1141download (1).jfif'),(31,'Cerverza Budweiser','Cerveza Budweiser  Lata x 500 cm3',300,491,'0533cerveza-budweiser-original-410-siempreencasa_500x.png'),(32,'Japi en lata','Lata de Cerveza Japi x 330cm3',200,479,'3820JAPI.png'),(33,'Ballantines Blended Scotch','Whisky de Malta roja por 1l',1500,0,'1937ballantines.png'),(34,'Fernet Branca','Fernet branca x 750 ml',700,194,'2549fernet.png'),(35,'Cerveza Andes Roja Lata 500 cm3','Cerveza Andes Roja Lata 500 cm3',150,0,'1342Sixpack-Andes-Roja-473ml-400x400.jpg'),(36,'Bacardi 750','Bacardi 750',1500,13,'4612Bacardi 750ml.jpg'),(37,'jkl','kj',2,1,'1542Brahma-Sixpack-473ml-400x400.jpg'),(38,'fsd','fds',221,212,'0723AHORROPACK Nampe Malbec.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `direccionID` int(11) DEFAULT '-1',
  `userLevel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `idx_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (8,'Tutelin','gustavo.beer@davinci.edu.ar','$2y$10$bQLJJGbuZbIKhqKipyzYRucEGkItufKFTafWVrU45JuJ5TEIiqexq',-1,1),(9,'Cristian Manini','kurodo@mail.net','$2y$10$4BopqqhwNLGF09dQpT5X1.4MSbbdVa3JHQ6Jzou6J9OhM4LQQl4Su',-1,1),(13,'Pau','paula@mail.net','$2y$10$/qbr1JUho7Wsqjtg9bIycOjUEMgsEip22vqzZxI2LlRgRmZDEGEyK',-1,1),(26,'admin','admin@mail.net','$2y$10$0NKjAnzvNAubld/8cONzbeOwUdoS1Ohf5S.DIdntdVtL0K8iCo5dm',NULL,NULL),(27,'god','god@mail.net','$2y$10$6DVsvcEChQrpL2SXIEEOPucQIG6rc8M7ALVNkrYuoBz9MhxlFjGe6',NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-03  2:07:10
