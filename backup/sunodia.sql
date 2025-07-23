-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sunodia
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `konten` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,'SMA Kristen Sunodia Gelar Ibadah Awal Tahun Ajaran','Humas','image.png','SMA Kristen Sunodia Samarinda mengadakan ibadah syukur untuk mengawali tahun ajaran baru 2025/2026. Acara ini dihadiri oleh seluruh guru, siswa, dan orang tua murid, dengan harapan agar proses belajar-mengajar diberkati dan berjalan lancar.','2025-07-15'),(2,'Sunodia Raih Juara Umum Lomba Sains Tingkat Kota','Admin Sekolah','image.png','SMA Kristen Sunodia berhasil meraih Juara Umum dalam Lomba Sains se-Kota Samarinda. Tim Sunodia menyabet medali emas di bidang Biologi, Fisika, dan Matematika. Ini membuktikan kualitas akademik sekolah yang terus meningkat.','2025-06-20'),(3,'Kegiatan Bakti Sosial Sunodia di Panti Asuhan','Osis Sunodia','image.png','OSIS SMA Kristen Sunodia mengadakan kegiatan bakti sosial ke Panti Asuhan Kasih Ibu. Para siswa memberikan bantuan sembako, alat tulis, serta mengadakan kegiatan bersama anak-anak panti. Kegiatan ini menjadi bentuk nyata kepedulian sosial Sunodia.','2025-05-30');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` enum('foto','video') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_upload` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'image.png','Piala Olimpiade Sains Nasional','foto','2025-06-01'),(2,'image.png','Upacara Bendera Hari Senin','foto','2025-06-08'),(3,'image.png','Perayaan Hari Pendidikan Nasional','foto','2025-06-12'),(4,'image.png','Foto Kelas 12 IPA','foto','2025-06-18'),(5,'image.png','Penghargaan Guru Inspiratif','foto','2025-06-25'),(6,'https://www.youtube.com/watch?v=Hv0Mmka8cR8','SEKOLAH KRISTEN SUNODIA SAMARINDA','video','2025-07-18');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` int NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'Andi Pranata',1234567890,'Laki-laki','Samarinda','1985-04-12','user-3.png'),(2,'Maria Kristina',1234567891,'Perempuan','Balikpapan','1987-07-05','user-5.png'),(3,'Benjamin Halim',1234567892,'Laki-laki','Samarinda','1980-09-21','user-8.png');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Komentar` text COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (3,'Mr Amba','carifred@hotmail.fr','ok','https://www.youtube.com/watch?v=3r-qDvD3F3c&list=RD1w7OgIMMRc4&index=9','2025-07-18 08:11:45');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `murid`
--

DROP TABLE IF EXISTS `murid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `murid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nis` int NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `murid`
--

LOCK TABLES `murid` WRITE;
/*!40000 ALTER TABLE `murid` DISABLE KEYS */;
INSERT INTO `murid` VALUES (1,'Jonathan Siregar',100001,'Laki-laki','Samarinda','2007-01-15','image.png'),(2,'Cynthia Wijaya',100002,'Perempuan','Balikpapan','2007-03-22','image.png'),(3,'Michael Tan',100003,'Laki-laki','Samarinda','2006-12-02','image.png'),(4,'Agnes Monica',100004,'Perempuan','Tenggarong','2007-07-19','image.png'),(5,'Daniel Manurung',100005,'Laki-laki','Bontang','2006-09-10','image.png'),(6,'Nathania Grace',100006,'Perempuan','Samarinda','2007-05-30','image.png'),(7,'Samuel Liem',100007,'Laki-laki','Samarinda','2006-08-11','image.png'),(8,'Jessica Tania',100008,'Perempuan','Balikpapan','2007-04-05','image.png'),(9,'Felix Hartono',100009,'Laki-laki','Samarinda','2006-11-18','image.png'),(10,'Amanda Yosephine',100010,'Perempuan','Bontang','2007-06-27','image.png');
/*!40000 ALTER TABLE `murid` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-23  9:48:14
