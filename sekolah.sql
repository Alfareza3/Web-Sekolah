-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sekolah
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,'Ujian Tengah Semester','2025-08-22','Dilaksanakan selama 1 minggu'),(2,'Hari Kemerdekaan','2025-08-17','Upacara + lomba-lomba');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `isi` text,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,'Sunodia Resmi Buka Penerimaan Siswa Baru Tahun Ajaran 2025/2026','Admin Sunodia','SMA Kristen Sunodia membuka pendaftaran siswa baru mulai 1 Juli hingga 31 Juli 2025. Pendaftaran dilakukan secara langsung di sekolah maupun secara daring melalui website resmi. Calon siswa diminta untuk membawa dokumen seperti fotokopi raport, akta kelahiran, dan pas foto. Kepala sekolah, Bapak Yunedi, S.Kom, mengajak seluruh orang tua untuk bergabung dalam komunitas pendidikan yang berlandaskan iman, karakter, dan pengetahuan.','2025-07-01'),(2,'Sunodia Gelar Pentas Seni \"Unity in Diversity\" yang Spektakuler','Tim Jurnalistik OSIS','SMA Kristen Sunodia mengadakan Pentas Seni tahunan pada 20 Juli 2025 dengan tema \"Unity in Diversity\". Acara yang diadakan di aula sekolah menampilkan pertunjukan tari tradisional, musik modern, drama musikal, hingga pertunjukan puisi. Kegiatan ini dihadiri oleh orang tua siswa, alumni, dan masyarakat sekitar. Kepala sekolah menyampaikan bahwa kegiatan ini menjadi wadah ekspresi seni serta meningkatkan toleransi antarumat beragama.','2025-07-20'),(3,'Siswa Sunodia Juara 1 Lomba Debat Tingkat Provinsi','Pembina Ekstrakurikuler','Prestasi membanggakan diraih oleh tim debat SMA Kristen Sunodia setelah meraih juara pertama dalam Lomba Debat Pelajar se-Kalimantan Timur. Kompetisi ini diselenggarakan oleh Dinas Pendidikan dan diikuti oleh puluhan SMA dari berbagai daerah. Dalam babak final, tim Sunodia berhasil mengalahkan SMA Negeri 2 Balikpapan. Keberhasilan ini menjadi inspirasi bagi siswa lain untuk terus mengembangkan kemampuan berpikir kritis dan komunikasi.','2025-07-18');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direktori`
--

DROP TABLE IF EXISTS `direktori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direktori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kategori` enum('Guru','Murid','Staff') NOT NULL,
  `tingkat` enum('10','11','12') DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direktori`
--

LOCK TABLES `direktori` WRITE;
/*!40000 ALTER TABLE `direktori` DISABLE KEYS */;
INSERT INTO `direktori` VALUES (1,'Pete Dunham S.Pd','Guru',NULL,'Guru Sejarah','petedunham@gmail.com','Pete.jpeg'),(2,'Clive Bissel','Guru',NULL,'Guru Penjas','clivebissel@gmail.com','clive.jpeg'),(4,'Bovver S.Pd','Guru',NULL,'Guru Bahasa Inggris','bovver@gmail.com','bovver.jpeg'),(5,'Maria Sitorus','Staff',NULL,'Kepala Tata Usaha','mariasitorus@gmail.com','user-6.png'),(6,'Andi Wijaya','Staff',NULL,'Administrasi Keuangan','andiwijaya@gmail.com','user-3.png'),(7,'Nurul Hidayati','Staff',NULL,'Pustakawan','nurulhidayati@gmail.com','user-5.png'),(8,'Tommy Hatcher S.Si','Guru',NULL,'Guru Kimia','tommyhatcher@gmail.com','tommy.jpg'),(9,'Surya Kusuma','Murid','12','','','direktori.png'),(10,'Natalia Kristina','Murid','11','','','direktori.png'),(11,'Handy Sugiono','Murid','10','','handysugiono@gmail.com','direktori.png');
/*!40000 ALTER TABLE `direktori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(255) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` enum('foto','video') NOT NULL,
  `tanggal_upload` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'2.jpeg','Upacara Agustus','foto','2025-07-24'),(2,'image.png','Hari Kemerdekaan','foto','2025-07-24'),(3,'https://www.youtube.com/embed/di7fRJA-A-E?si=PfEfptZ5uo9P0wnk','17 Agustus','video','2025-07-24');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar_berita`
--

DROP TABLE IF EXISTS `komentar_berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `komentar_berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_berita` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_berita` (`id_berita`),
  CONSTRAINT `komentar_berita_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar_berita`
--

LOCK TABLES `komentar_berita` WRITE;
/*!40000 ALTER TABLE `komentar_berita` DISABLE KEYS */;
INSERT INTO `komentar_berita` VALUES (4,2,'Dimas','GOOD','2025-07-25 10:39:34'),(5,3,'Dimas','Great','2025-07-25 10:39:49'),(6,1,'Dimas','Exellent','2025-07-25 10:40:19');
/*!40000 ALTER TABLE `komentar_berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `komentar` text,
  `url` varchar(255) DEFAULT NULL,
  `waktu_submit` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (2,'Dimas','betulan@gmail.com','SLIDE AWAY','https://www.youtube.com/watch?v=3GCSUSwcDwg&list=RDH1Wbu_AF2e4&index=7','2025-07-23 03:52:36');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-25 10:42:44
