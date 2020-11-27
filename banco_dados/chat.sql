-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: chat
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `amigos`
--

DROP TABLE IF EXISTS `amigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_de` varchar(200) NOT NULL,
  `email_para` varchar(200) NOT NULL,
  `mensagens` text NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amigos`
--

LOCK TABLES `amigos` WRITE;
/*!40000 ALTER TABLE `amigos` DISABLE KEYS */;
INSERT INTO `amigos` VALUES (1,'samuel@gmail.com','fr@gmail.com','Opa camarada, como Ã© que vai?','King.jpg'),(2,'fr@gmail.com','samuel@gmail.com','D boas, e tu meu vÃ©i?','elfo.jpg');
/*!40000 ALTER TABLE `amigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` VALUES (1,'Samuelico','Opa','samuel@gmail.com',NULL,'18:44:14','::1'),(2,'Samuelico','Como vÃ£o meus amigos','samuel@gmail.com',NULL,'18:44:35','::1'),(3,'Samuelico','Tudo bÃ£o','samuel@gmail.com',NULL,'18:44:44','::1'),(4,'Denilson','Eae meu chapa','denis@gmail.com',NULL,'18:46:09','::1'),(5,'Samuelico','opa','samuel@gmail.com','elfo.jpg','19:27:06','::1'),(6,'opa','hey oh','samuquinha@gmail.com',NULL,'11:33:54','::1');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderador`
--

DROP TABLE IF EXISTS `moderador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderador`
--

LOCK TABLES `moderador` WRITE;
/*!40000 ALTER TABLE `moderador` DISABLE KEYS */;
INSERT INTO `moderador` VALUES (1,'Yara','yara@gmail.com','123'),(2,'Samuel Edson Ribeiro Sampaio','samueledsonmoder@gmail.com','123'),(3,'sas','sa@gmail.com','123'),(4,'wewqeq','eqeqw@gmail.com','2131231'),(5,'dqwdqwdq','dqdw@gmail.com','123'),(6,'q342342','eqewqwe@gmail.com','123'),(7,'sla','sla@gmail.com','123');
/*!40000 ALTER TABLE `moderador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(200) DEFAULT NULL,
  `nomeusuario` varchar(200) NOT NULL,
  `pais` varchar(250) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `motivo` text NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (2,'Sarasa','Sarasa','PaÃ­s da AmÃ©rica do Sul','M','sa@gmail.com','Fica dando Dicas de Hacker','kratos.jpg');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacao`
--

DROP TABLE IF EXISTS `solicitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_de` varchar(100) NOT NULL,
  `email_para` varchar(100) NOT NULL,
  `amigo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacao`
--

LOCK TABLES `solicitacao` WRITE;
/*!40000 ALTER TABLE `solicitacao` DISABLE KEYS */;
INSERT INTO `solicitacao` VALUES (1,'samuel@gmail.com','fr@gmail.com',1),(2,'samuquinha@gmail.com','samuel@gmail.com',0);
/*!40000 ALTER TABLE `solicitacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomecompleto` varchar(200) DEFAULT NULL,
  `nomeusuario` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Samuel Edson Ribeiro Sampaio','Samuelico','Brasil','M','samuel@gmail.com','$2y$10$mPXzCjpgpP1xB0OAfjd0N.26t6hxxvOmYi0Dd2PjmWNkxRG59Uy5S','elfo.jpg'),(2,'Denis','Denilson','Argentina','M','denis@gmail.com','$2y$10$8d5uBxB5Sy/E6n.ejne.2u2o6NUuLRlmCm1lN0WG3kPVw3.cWJH5O',NULL),(4,'opa','Sei la','Argentina','M','samuquinh@gmail.com','$2y$10$4PX1NlhYXvJ7u8YiW/v7j.L3BeT9AP7fH7ERU7vdeg14hiKpeuFdW',NULL);
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

-- Dump completed on 2020-11-27 11:38:40
