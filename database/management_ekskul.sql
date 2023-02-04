-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: management_ekskul
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ekskul`
--

DROP TABLE IF EXISTS `ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ekskul` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ekskul` varchar(225) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu') NOT NULL,
  `pukul` time NOT NULL,
  `kuota` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_ekskul` (`nama_ekskul`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekskul`
--

LOCK TABLES `ekskul` WRITE;
/*!40000 ALTER TABLE `ekskul` DISABLE KEYS */;
INSERT INTO `ekskul` VALUES (1,'Paskibra','rabu','14:00:00',30),(2,'Pramuka','sabtu','08:00:00',0),(3,'Silat','selasa','13:00:00',30),(4,'Hadroh','senin','12:00:00',30),(5,'English Club','senin','14:00:00',30),(6,'BTQ','kamis','13:00:00',100),(7,'Tahfidz','jumat','14:30:00',30),(8,'Futsal','rabu','14:00:00',30),(13,'Angklung','senin','13:00:00',30);
/*!40000 ALTER TABLE `ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan_ekskul`
--

DROP TABLE IF EXISTS `kegiatan_ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan_ekskul` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ekskul` varchar(225) NOT NULL,
  `kegiatan` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan_ekskul`
--

LOCK TABLES `kegiatan_ekskul` WRITE;
/*!40000 ALTER TABLE `kegiatan_ekskul` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan_ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelatih_users`
--

DROP TABLE IF EXISTS `pelatih_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelatih_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(125) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('pelatih') NOT NULL,
  `ekskul` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `ekskul` (`ekskul`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatih_users`
--

LOCK TABLES `pelatih_users` WRITE;
/*!40000 ALTER TABLE `pelatih_users` DISABLE KEYS */;
INSERT INTO `pelatih_users` VALUES (1,11000,'Anita Khaerunisa','$2y$10$xzNUYRTkka4mel1Yjrq2xuTZYoZJGkntcI8gdljNZPqBxIq4Ey51q','pelatih','Paskibra','2023-01-31 07:45:25'),(2,12000,'Edo Kurniawan','$2y$10$dJ35T/.MBaqz5S3rHp7ub.sWzyFmcoEheSAR98VsTuHKfmvVAYZhu','pelatih','Pramuka','2023-01-31 07:45:43'),(3,13000,'Elis','$2y$10$rxR5oQT0P2qIcEkLrBXVDeBrZXny3XgBPUuA25MelXaepPXSr5RKi','pelatih','Silat','2023-01-31 07:46:09'),(4,14000,'Nopal','$2y$10$3PV20CjnWx3rnfdxG2AY1ecrUyNHn3/uNmFi5irnpr3UqsjwFLJGG','pelatih','Hadroh','2023-01-31 07:46:23'),(5,15000,'Ms. Putri Rahmania','$2y$10$uv4y5slQx0WWHBFG4S5q6OD9dyqk1m/KBw6D84T4XDcHaHkPMhYzm','pelatih','English Club','2023-01-31 07:46:35'),(6,16000,'Bayatih','$2y$10$hAN0QSSSJSPRqCABKYuv/ui/3Qsc4anK5QU0jI9Wc9Zk3DoGOTkeC','pelatih','BTQ','2023-01-31 07:46:51'),(7,17000,'Ust. Mahfudz','$2y$10$2Zzpj/AZIs3lVq8h35muw.dEyeZkB2MuemU4UojFFwOTs1/XLNYem','pelatih','Tahfidz','2023-01-31 07:47:11'),(8,18000,'Idham Khalid','$2y$10$1GmuSuPXnESV4LGcDyZubOV4AVB..wAmzfGGYhX6EU65C8xXlHdwq','pelatih','Futsal','2023-01-31 07:47:25'),(9,19000,'Nisvi','$2y$10$TlDxXhKirwO8tLTxfsuwnO1830StV0HDoV8H22BSBt2AClbmI88nW','pelatih','Angklung','2023-01-31 07:48:41');
/*!40000 ALTER TABLE `pelatih_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran_ekskul`
--

DROP TABLE IF EXISTS `pendaftaran_ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran_ekskul` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `id_ekskul` varchar(225) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran_ekskul`
--

LOCK TABLES `pendaftaran_ekskul` WRITE;
/*!40000 ALTER TABLE `pendaftaran_ekskul` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendaftaran_ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presensi_ekskul`
--

DROP TABLE IF EXISTS `presensi_ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presensi_ekskul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `ekskul` varchar(225) NOT NULL,
  `role` enum('siswa','pelatih','staff') DEFAULT NULL,
  `tgl_presensi` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presensi_ekskul`
--

LOCK TABLES `presensi_ekskul` WRITE;
/*!40000 ALTER TABLE `presensi_ekskul` DISABLE KEYS */;
/*!40000 ALTER TABLE `presensi_ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_users`
--

DROP TABLE IF EXISTS `siswa_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(125) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('siswa') NOT NULL,
  `ekskul` varchar(125) DEFAULT NULL,
  `nilai_ekskul` enum('A','B','C','D') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_users`
--

LOCK TABLES `siswa_users` WRITE;
/*!40000 ALTER TABLE `siswa_users` DISABLE KEYS */;
INSERT INTO `siswa_users` VALUES (1,'21000','Ajin','$2y$10$eALmisSeqMOhTmQXGxLBau2VBFwblOTlK2tnS1U0mkx6BjSZvKFHS','siswa',NULL,NULL,NULL),(3,'25000','Alpi','$2y$10$6EdZWCr5VXMhO.8OxIm4q.6jP8ChePNYFAkwg3n9ewoWRo7sdXoha','siswa',NULL,NULL,NULL);
/*!40000 ALTER TABLE `siswa_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_users`
--

DROP TABLE IF EXISTS `staff_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(125) NOT NULL,
  `name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('staff') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_users`
--

LOCK TABLES `staff_users` WRITE;
/*!40000 ALTER TABLE `staff_users` DISABLE KEYS */;
INSERT INTO `staff_users` VALUES (1,'22000','Syahrin','$2y$10$bFn/PvBytUdDwEOaKcoT8.S/gTUqav.sXV.cMURG9dYrxsgTkjhq2','staff',NULL);
/*!40000 ALTER TABLE `staff_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-31 23:19:46
