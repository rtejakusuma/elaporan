-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: testing
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

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
-- Table structure for table `auditor`
--

DROP TABLE IF EXISTS `auditor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditor` (
  `id_jadwal_pelaksanaan_opd` int(11) DEFAULT NULL,
  `nama_auditor` varchar(64) DEFAULT NULL,
  `jabatan` varchar(32) DEFAULT NULL,
  KEY `fk_relationship_30` (`id_jadwal_pelaksanaan_opd`),
  CONSTRAINT `fk_relationship_30` FOREIGN KEY (`id_jadwal_pelaksanaan_opd`) REFERENCES `jadwal_pelaksanaan_opd` (`id_jadwal_pelaksanaan_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditor`
--

LOCK TABLES `auditor` WRITE;
/*!40000 ALTER TABLE `auditor` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_rekap_tender`
--

DROP TABLE IF EXISTS `detail_rekap_tender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_rekap_tender` (
  `id_opd` int(11) DEFAULT NULL,
  `id_paket_kerja` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `nilai_hps` int(11) DEFAULT NULL,
  `pemenang` varchar(256) DEFAULT NULL,
  `harga_kontrak` int(11) DEFAULT NULL,
  `presentase_kontrak_thd_hps` float DEFAULT NULL,
  `ket` text DEFAULT NULL,
  KEY `fk_relationship_14` (`id_laporan`),
  KEY `fk_relationship_17` (`id_paket_kerja`),
  KEY `fk_relationship_41` (`id_opd`),
  CONSTRAINT `fk_relationship_14` FOREIGN KEY (`id_laporan`) REFERENCES `rekap_tender` (`id_laporan`),
  CONSTRAINT `fk_relationship_17` FOREIGN KEY (`id_paket_kerja`) REFERENCES `paket_kerja` (`id_paket_kerja`),
  CONSTRAINT `fk_relationship_41` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_rekap_tender`
--

LOCK TABLES `detail_rekap_tender` WRITE;
/*!40000 ALTER TABLE `detail_rekap_tender` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_rekap_tender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hasil_temuan`
--

DROP TABLE IF EXISTS `hasil_temuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasil_temuan` (
  `id_temuan` int(11) DEFAULT NULL,
  `rekomendasi` text DEFAULT NULL,
  `status_rekomendasi` char(2) DEFAULT NULL,
  `tindak_lanjut` text DEFAULT NULL,
  `status_tindak_lanjut` char(2) DEFAULT NULL,
  `catatan_bpk` text DEFAULT NULL,
  KEY `fk_relationship_25` (`id_temuan`),
  CONSTRAINT `fk_relationship_25` FOREIGN KEY (`id_temuan`) REFERENCES `temuan` (`id_temuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil_temuan`
--

LOCK TABLES `hasil_temuan` WRITE;
/*!40000 ALTER TABLE `hasil_temuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasil_temuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ikm`
--

DROP TABLE IF EXISTS `ikm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ikm` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_6` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ikm`
--

LOCK TABLES `ikm` WRITE;
/*!40000 ALTER TABLE `ikm` DISABLE KEYS */;
/*!40000 ALTER TABLE `ikm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ikm_opd`
--

DROP TABLE IF EXISTS `ikm_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ikm_opd` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `predikat` varchar(16) DEFAULT NULL,
  KEY `fk_relationship_28` (`id_laporan`),
  KEY `fk_relationship_29` (`id_opd`),
  CONSTRAINT `fk_relationship_28` FOREIGN KEY (`id_laporan`) REFERENCES `ikm` (`id_laporan`),
  CONSTRAINT `fk_relationship_29` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ikm_opd`
--

LOCK TABLES `ikm_opd` WRITE;
/*!40000 ALTER TABLE `ikm_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `ikm_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_pelaksanaan`
--

DROP TABLE IF EXISTS `jadwal_pelaksanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_pelaksanaan` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_10` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_pelaksanaan`
--

LOCK TABLES `jadwal_pelaksanaan` WRITE;
/*!40000 ALTER TABLE `jadwal_pelaksanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_pelaksanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_pelaksanaan_opd`
--

DROP TABLE IF EXISTS `jadwal_pelaksanaan_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_pelaksanaan_opd` (
  `id_jadwal_pelaksanaan_opd` int(11) NOT NULL AUTO_INCREMENT,
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `jenis_pengawasan` varchar(64) DEFAULT NULL,
  `rmp` varchar(32) DEFAULT NULL,
  `rpl` varchar(32) DEFAULT NULL,
  `output_lhp` int(11) DEFAULT NULL,
  `hari_pengawasan` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_pelaksanaan_opd`),
  KEY `fk_relationship_32` (`id_laporan`),
  KEY `fk_relationship_33` (`id_opd`),
  CONSTRAINT `fk_relationship_32` FOREIGN KEY (`id_laporan`) REFERENCES `jadwal_pelaksanaan` (`id_laporan`),
  CONSTRAINT `fk_relationship_33` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_pelaksanaan_opd`
--

LOCK TABLES `jadwal_pelaksanaan_opd` WRITE;
/*!40000 ALTER TABLE `jadwal_pelaksanaan_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_pelaksanaan_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_rb`
--

DROP TABLE IF EXISTS `jenis_rb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_rb` (
  `id_jenis_rb` int(11) NOT NULL AUTO_INCREMENT,
  `id_laporan` int(11) DEFAULT NULL,
  `rincian` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_rb`),
  KEY `fk_relationship_31` (`id_laporan`),
  CONSTRAINT `fk_relationship_31` FOREIGN KEY (`id_laporan`) REFERENCES `laporan_rb` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_rb`
--

LOCK TABLES `jenis_rb` WRITE;
/*!40000 ALTER TABLE `jenis_rb` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis_rb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `kode_kegiatan` varchar(5) DEFAULT NULL,
  `kode_program` varchar(5) NOT NULL,
  `pagu_renja` int(11) DEFAULT NULL,
  `pagu_rkpd` int(11) DEFAULT NULL,
  `pagu_ppas_draft` int(11) DEFAULT NULL,
  `pagu_ppas_final` int(11) DEFAULT NULL,
  `keluaran_indikator` varchar(64) DEFAULT NULL,
  `keluaran_target` float DEFAULT NULL,
  `keluaran_target_rkpd` float DEFAULT NULL,
  `keluaran_target_ppas_draft` float DEFAULT NULL,
  `keluaran_target_ppas_final` float DEFAULT NULL,
  `keluaran_realisasi_anggaran` int(11) DEFAULT NULL,
  `keluaran_realisasi_kinerja` float DEFAULT NULL,
  `keluaran_realisasi_fisik` float DEFAULT NULL,
  `keluaran_satuan` varchar(16) DEFAULT NULL,
  `hasil_indikator` varchar(64) DEFAULT NULL,
  `hasil_target` float DEFAULT NULL,
  `hasil_target_rkpd` float DEFAULT NULL,
  `hasil_target_ppas_draft` float DEFAULT NULL,
  `hasil_target_ppas_final` float DEFAULT NULL,
  `hasil_realisasi_anggaran` int(11) DEFAULT NULL,
  `hasil_realisasi_kinerja` float DEFAULT NULL,
  `hasil_realisasi_fisik` float DEFAULT NULL,
  `hasil_satuan` varchar(16) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `nama_kegiatan` varchar(45) DEFAULT NULL,
  KEY `fk_relationship_35` (`kode_program`),
  CONSTRAINT `fk_relationship_35` FOREIGN KEY (`kode_program`) REFERENCES `program` (`kode_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan_rb`
--

DROP TABLE IF EXISTS `kegiatan_rb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan_rb` (
  `id_program_rb` int(11) DEFAULT NULL,
  `nama_kegiatan_rb` varchar(128) DEFAULT NULL,
  `indikator_rb` varchar(128) DEFAULT NULL,
  `target_output` varchar(64) DEFAULT NULL,
  `realisasi_output` varchar(64) DEFAULT NULL,
  `target_waktu` varchar(32) DEFAULT NULL,
  `realisasi_waktu` varchar(32) DEFAULT NULL,
  `target_anggaran` int(11) DEFAULT NULL,
  `keluaran_realisasi_anggaran` int(11) DEFAULT NULL,
  `capaian` tinyint(1) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  KEY `fk_relationship_40` (`id_program_rb`),
  CONSTRAINT `fk_relationship_40` FOREIGN KEY (`id_program_rb`) REFERENCES `program_rb` (`id_program_rb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan_rb`
--

LOCK TABLES `kegiatan_rb` WRITE;
/*!40000 ALTER TABLE `kegiatan_rb` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan_rb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_opd` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_laporan`),
  KEY `fk_surat_opd` (`id_opd`),
  KEY `fk_tipesurat_dari_surat` (`id_tipe`),
  CONSTRAINT `fk_surat_opd` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`),
  CONSTRAINT `fk_tipesurat_dari_surat` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_laporan` (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_kinerja_triwulan`
--

DROP TABLE IF EXISTS `laporan_kinerja_triwulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_kinerja_triwulan` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uraian` varchar(128) DEFAULT NULL,
  `indikator_kinerja` varchar(64) DEFAULT NULL,
  `target` float DEFAULT NULL,
  `realisasi_target` int(11) DEFAULT NULL,
  `program` varchar(128) DEFAULT NULL,
  `anggaran` int(11) DEFAULT NULL,
  `keluaran_realisasi_anggaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_3` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_kinerja_triwulan`
--

LOCK TABLES `laporan_kinerja_triwulan` WRITE;
/*!40000 ALTER TABLE `laporan_kinerja_triwulan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_kinerja_triwulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan_rb`
--

DROP TABLE IF EXISTS `laporan_rb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_rb` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl` date DEFAULT NULL,
  `judul_rb` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_12` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_rb`
--

LOCK TABLES `laporan_rb` WRITE;
/*!40000 ALTER TABLE `laporan_rb` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan_rb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitoring_kelembagaan`
--

DROP TABLE IF EXISTS `monitoring_kelembagaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monitoring_kelembagaan` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_8` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitoring_kelembagaan`
--

LOCK TABLES `monitoring_kelembagaan` WRITE;
/*!40000 ALTER TABLE `monitoring_kelembagaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `monitoring_kelembagaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opd`
--

DROP TABLE IF EXISTS `opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opd` (
  `id_opd` int(11) NOT NULL AUTO_INCREMENT,
  `nama_opd` varchar(100) NOT NULL,
  `kode_emonev` varchar(16) DEFAULT NULL,
  `kode_ebud` varchar(16) DEFAULT NULL,
  `kode_ekin` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_opd`),
  UNIQUE KEY `kode_emonev_UNIQUE` (`kode_emonev`),
  UNIQUE KEY `kode_ebud_UNIQUE` (`kode_ebud`),
  UNIQUE KEY `kode_ekin_UNIQUE` (`kode_ekin`)
) ENGINE=InnoDB AUTO_INCREMENT=427 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opd`
--

LOCK TABLES `opd` WRITE;
/*!40000 ALTER TABLE `opd` DISABLE KEYS */;
INSERT INTO `opd` VALUES (1,'ADMIN',NULL,NULL,NULL),(284,'BADAN KEPEGAWAIAN DAERAH','1.18.01','40601','14'),(285,'BADAN KESATUAN BANGSA DAN POLITIK','1.23.01','40801','37'),(286,'BADAN PENANGGULANGAN BENCANA DAERAH','01.05.02','10502','36'),(287,'BADAN PENDAPATAN DAERAH','1.19.03','40202','35'),(288,'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH','1.19.01','40501','13'),(289,'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH (SKPKD)','1.19.02',NULL,NULL),(290,'BADAN PERENCANAAN PEMBANGUNAN DAERAH','1.21.01','40101','15'),(291,'BAGIAN ADMINISTRASI PEMBANGUNAN','1.16.01.06',NULL,'103'),(292,'BAGIAN ADMINISTRASI PEMERINTAHAN UMUM','1.16.01.01',NULL,'102'),(293,'BAGIAN ADMINISTRASI PEREKONOMIAN DAN KESEJAHTERAAN RAKYAT','1.16.01.05',NULL,'106'),(294,'BAGIAN HUKUM','1.16.01.04',NULL,'104'),(295,'BAGIAN ORGANISASI','1.16.01.02',NULL,'105'),(296,'BAGIAN UMUM','1.16.01.03',NULL,'101'),(297,'DINAS KEBUDAYAAN, PARIWISATA, KEPEMUDAAN DAN OLAH RAGA','1.13.01','21301','31'),(298,'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL','01.09.01','20601','33'),(299,'DINAS KESEHATAN DAN KELUARGA BERENCANA','01.02.01','10201','28'),(300,'DINAS KOMUNIKASI DAN INFORMATIKA','1.11.01','21001','27'),(301,'DINAS LINGKUNGAN HIDUP','01.08.01','20501','23'),(302,'DINAS PEKERJAAN UMUM DAN TATA RUANG','01.03.01','10301','26'),(303,'DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINTU, KOPERASI DAN USAHA MIKRO','1.12.01','21101','32'),(304,'DINAS PENDIDIKAN','1.01.01.02','10101','22'),(305,'DINAS PERDAGANGAN','02.02.01','30601','29'),(306,'DINAS PERHUBUNGAN','1.10.01','20901','24'),(307,'DINAS PERPUSTAKAAN DAN KEARSIPAN','1.14.01','21701','21'),(308,'DINAS PERTANIAN DAN KETAHANAN PANGAN','02.01.01','20301','20'),(309,'DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN','01.04.01','10401','25'),(310,'DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK','01.06.01','10601','30'),(311,'DINAS TENAGA KERJA','01.07.01','20101','34'),(312,'DPRD','1.15.02',NULL,NULL),(313,'INSPEKTORAT DAERAH','1.20.01','40301','12'),(314,'KECAMATAN KARTOHARJO','1.22.01','40902','51'),(315,'KECAMATAN KARTOHARJO','1.22.01.01',NULL,NULL),(316,'KECAMATAN MANGUHARJO','1.22.02','40901','52'),(317,'KECAMATAN MANGUHARJO','1.22.02.01',NULL,NULL),(318,'KECAMATAN TAMAN','1.22.03','40903','53'),(319,'KECAMATAN TAMAN','1.22.03.01',NULL,NULL),(320,'KELURAHAN BANJAREJO','1.22.03.04',NULL,NULL),(321,'KELURAHAN DEMANGAN','1.22.03.09',NULL,NULL),(322,'KELURAHAN JOSENAN','1.22.03.08',NULL,NULL),(323,'KELURAHAN KANIGORO','1.22.01.10',NULL,NULL),(324,'KELURAHAN KARTOHARJO','1.22.01.03',NULL,NULL),(325,'KELURAHAN KEJURON','1.22.03.07',NULL,NULL),(326,'KELURAHAN KELUN','1.22.01.09',NULL,NULL),(327,'KELURAHAN KLEGEN','1.22.01.04',NULL,NULL),(328,'KELURAHAN KUNCEN','1.22.03.05',NULL,NULL),(329,'KELURAHAN MADIUN LOR','1.22.02.07',NULL,NULL),(330,'KELURAHAN MANGUHARJO','1.22.02.02',NULL,NULL),(331,'KELURAHAN MANISREJO','1.22.03.06',NULL,NULL),(332,'KELURAHAN MOJOREJO','1.22.03.02',NULL,NULL),(333,'KELURAHAN NAMBANGAN KIDUL','1.22.02.10',NULL,NULL),(334,'KELURAHAN NAMBANGAN LOR','1.22.02.09',NULL,NULL),(335,'KELURAHAN NGEGONG','1.22.02.05',NULL,NULL),(336,'KELURAHAN ORO - ORO OMBO','1.22.01.02',NULL,NULL),(337,'KELURAHAN PANDEAN','1.22.03.03',NULL,NULL),(338,'KELURAHAN PANGONGANGAN','1.22.02.08',NULL,NULL),(339,'KELURAHAN PATIHAN','1.22.02.04',NULL,NULL),(340,'KELURAHAN PILANG BANGO','1.22.01.07',NULL,NULL),(341,'KELURAHAN REJOMULYO','1.22.01.05',NULL,NULL),(342,'KELURAHAN SOGATEN','1.22.02.03',NULL,NULL),(343,'KELURAHAN SUKOSARI','1.22.01.06',NULL,NULL),(344,'KELURAHAN TAMAN','1.22.03.10',NULL,NULL),(345,'KELURAHAN TAWANG REJO','1.22.01.08',NULL,NULL),(346,'KELURAHAN WINONGO','1.22.02.06',NULL,NULL),(347,'RUMAH SAKIT UMUM DAERAH','01.02.02','10202','17'),(348,'SATUAN POLISI PAMONG PRAJA','01.05.01','10501','16'),(349,'SD CABANG DINAS KECAMATAN KARTOHARJO','1.01.01.03',NULL,NULL),(350,'SD CABANG DINAS KECAMATAN MANGUHARJO','1.01.01.04',NULL,NULL),(351,'SD CABANG DINAS KECAMATAN TAMAN','1.01.01.05',NULL,NULL),(352,'SDN 01 DEMANGAN','1.01.01.69',NULL,NULL),(353,'SDN 01 JOSENAN','1.01.01.71',NULL,NULL),(354,'SDN 01 KANIGORO','1.01.01.30',NULL,NULL),(355,'SDN 01 KARTOHARJO','1.01.01.20',NULL,NULL),(356,'SDN 01 KLEGEN','1.01.01.23',NULL,NULL),(357,'SDN 01 MADIUN LOR','1.01.01.41',NULL,NULL),(358,'SDN 01 MANGUHARJO','1.01.01.38',NULL,NULL),(359,'SDN 01 MANISREJO','1.01.01.65',NULL,NULL),(360,'SDN 01 MOJOREJO','1.01.01.63',NULL,NULL),(361,'SDN 01 NAMBANGAN KIDUL','1.01.01.46',NULL,NULL),(362,'SDN 01 NAMBANGAN LOR','1.01.01.39',NULL,NULL),(363,'SDN 01 PANDEAN','1.01.01.60',NULL,NULL),(364,'SDN 01 PANGONGANGAN','1.01.01.54',NULL,NULL),(365,'SDN 01 REJOMULYO','1.01.01.28',NULL,NULL),(366,'SDN 01 TAMAN','1.01.01.57',NULL,NULL),(367,'SDN 01 TAWANGREJO','1.01.01.35',NULL,NULL),(368,'SDN 01 WINONGO','1.01.01.50',NULL,NULL),(369,'SDN 02 DEMANGAN','1.01.01.70',NULL,NULL),(370,'SDN 02 JOSENAN','1.01.01.72',NULL,NULL),(371,'SDN 02 KANIGORO','1.01.01.31',NULL,NULL),(372,'SDN 02 KARTOHARJO','1.01.01.21',NULL,NULL),(373,'SDN 02 KLEGEN','1.01.01.24',NULL,NULL),(374,'SDN 02 MADIUN LOR','1.01.01.42',NULL,NULL),(375,'SDN 02 MANISREJO','1.01.01.66',NULL,NULL),(376,'SDN 02 MOJOREJO','1.01.01.64',NULL,NULL),(377,'SDN 02 NAMBANGAN KIDUL','1.01.01.47',NULL,NULL),(378,'SDN 02 NAMBANGAN LOR','1.01.01.40',NULL,NULL),(379,'SDN 02 PANDEAN','1.01.01.61',NULL,NULL),(380,'SDN 02 PANGONGANGAN','1.01.01.55',NULL,NULL),(381,'SDN 02 REJOMULYO','1.01.01.29',NULL,NULL),(382,'SDN 02 TAMAN','1.01.01.58',NULL,NULL),(383,'SDN 02 TAWANGREJO','1.01.01.36',NULL,NULL),(384,'SDN 02 WINONGO','1.01.01.51',NULL,NULL),(385,'SDN 03 JOSENAN','1.01.01.73',NULL,NULL),(386,'SDN 03 KANIGORO','1.01.01.32',NULL,NULL),(387,'SDN 03 KARTOHARJO','1.01.01.22',NULL,NULL),(388,'SDN 03 KLEGEN','1.01.01.25',NULL,NULL),(389,'SDN 03 MADIUN LOR','1.01.01.43',NULL,NULL),(390,'SDN 03 MANISREJO','1.01.01.67',NULL,NULL),(391,'SDN 03 NAMBANGAN KIDUL','1.01.01.48',NULL,NULL),(392,'SDN 03 TAMAN','1.01.01.59',NULL,NULL),(393,'SDN 04 KLEGEN','1.01.01.26',NULL,NULL),(394,'SDN 04 MADIUN LOR','1.01.01.44',NULL,NULL),(395,'SDN 04 MANISREJO','1.01.01.68',NULL,NULL),(396,'SDN 04 NAMBANGAN KIDUL','1.01.01.49',NULL,NULL),(397,'SDN 05 MADIUN LOR','1.01.01.45',NULL,NULL),(398,'SDN BANJAREJO','1.01.01.62',NULL,NULL),(399,'SDN KEJURON','1.01.01.74',NULL,NULL),(400,'SDN KELUN','1.01.01.37',NULL,NULL),(401,'SDN KUNCEN','1.01.01.75',NULL,NULL),(402,'SDN NGEGONG','1.01.01.52',NULL,NULL),(403,'SDN ORO ORO OMBO','1.01.01.27',NULL,NULL),(404,'SDN PATIHAN','1.01.01.53',NULL,NULL),(405,'SDN PILANGBANGO','1.01.01.34',NULL,NULL),(406,'SDN SOGATEN','1.01.01.56',NULL,NULL),(407,'SDN SUKOSARI','1.01.01.33',NULL,NULL),(408,'SEKRETARIAT DAERAH','1.16.01','sakjane 40101','10'),(409,'SEKRETARIAT DPRD','1.17.01','40201','11'),(410,'SMP NEGERI 01','1.01.01.06',NULL,NULL),(411,'SMP NEGERI 02','1.01.01.07',NULL,NULL),(412,'SMP NEGERI 03','1.01.01.08',NULL,NULL),(413,'SMP NEGERI 04','1.01.01.09',NULL,NULL),(414,'SMP NEGERI 05','1.01.01.10',NULL,NULL),(415,'SMP NEGERI 06','1.01.01.11',NULL,NULL),(416,'SMP NEGERI 07','1.01.01.12',NULL,NULL),(417,'SMP NEGERI 08','1.01.01.13',NULL,NULL),(418,'SMP NEGERI 09','1.01.01.14',NULL,NULL),(419,'SMP NEGERI 10','1.01.01.15',NULL,NULL),(420,'SMP NEGERI 11','1.01.01.16',NULL,NULL),(421,'SMP NEGERI 12','1.01.01.17',NULL,NULL),(422,'SMP NEGERI 13','1.01.01.18',NULL,NULL),(423,'SMP NEGERI 14','1.01.01.19',NULL,NULL),(424,'WALIKOTA DAN WAKIL WALIKOTA','1.15.01',NULL,NULL),(425,'INSPEKTORAT',NULL,'40701',NULL),(426,'BADAN ADMINISTRASI PEMERINTAH UMUM',NULL,'4010104',NULL);
/*!40000 ALTER TABLE `opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paket_kerja`
--

DROP TABLE IF EXISTS `paket_kerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paket_kerja` (
  `id_paket_kerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_laporan` int(11) NOT NULL,
  `nama_paket_kerja` varchar(64) DEFAULT NULL,
  `pagu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paket_kerja`),
  KEY `fk_punya` (`id_laporan`),
  CONSTRAINT `fk_punya` FOREIGN KEY (`id_laporan`) REFERENCES `rekap_pokja` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paket_kerja`
--

LOCK TABLES `paket_kerja` WRITE;
/*!40000 ALTER TABLE `paket_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `paket_kerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelayanan_publik`
--

DROP TABLE IF EXISTS `pelayanan_publik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelayanan_publik` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_4` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelayanan_publik`
--

LOCK TABLES `pelayanan_publik` WRITE;
/*!40000 ALTER TABLE `pelayanan_publik` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelayanan_publik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelayanan_publik_opd`
--

DROP TABLE IF EXISTS `pelayanan_publik_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelayanan_publik_opd` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `indeks_pelayanan_publik` float DEFAULT NULL,
  `konversi_100` float DEFAULT NULL,
  `ket` text DEFAULT NULL,
  KEY `fk_relationship_18` (`id_laporan`),
  KEY `fk_relationship_19` (`id_opd`),
  CONSTRAINT `fk_relationship_18` FOREIGN KEY (`id_laporan`) REFERENCES `pelayanan_publik` (`id_laporan`),
  CONSTRAINT `fk_relationship_19` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelayanan_publik_opd`
--

LOCK TABLES `pelayanan_publik_opd` WRITE;
/*!40000 ALTER TABLE `pelayanan_publik_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelayanan_publik_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemantauan_tindak_lanjut`
--

DROP TABLE IF EXISTS `pemantauan_tindak_lanjut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemantauan_tindak_lanjut` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul_laporan` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_9` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemantauan_tindak_lanjut`
--

LOCK TABLES `pemantauan_tindak_lanjut` WRITE;
/*!40000 ALTER TABLE `pemantauan_tindak_lanjut` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemantauan_tindak_lanjut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permasalahan_kelembagaan`
--

DROP TABLE IF EXISTS `permasalahan_kelembagaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permasalahan_kelembagaan` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `permasalahan_kelembagaan` varchar(256) DEFAULT NULL,
  `usulan` text DEFAULT NULL,
  `dasar_hukum` text DEFAULT NULL,
  `ket` text DEFAULT NULL,
  KEY `fk_relationship_22` (`id_laporan`),
  KEY `fk_relationship_23` (`id_opd`),
  CONSTRAINT `fk_relationship_22` FOREIGN KEY (`id_laporan`) REFERENCES `monitoring_kelembagaan` (`id_laporan`),
  CONSTRAINT `fk_relationship_23` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permasalahan_kelembagaan`
--

LOCK TABLES `permasalahan_kelembagaan` WRITE;
/*!40000 ALTER TABLE `permasalahan_kelembagaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `permasalahan_kelembagaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `kode_program` varchar(5) NOT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `nama_program` varchar(128) DEFAULT NULL,
  `capaian_indikator` varchar(64) DEFAULT NULL,
  `capaian_target` float DEFAULT NULL,
  `capaian_target_rkpd` float DEFAULT NULL,
  `capaian_target_ppas_draft` float DEFAULT NULL,
  `capaian_target_ppas_final` float DEFAULT NULL,
  `capaian_realisasi_anggaran` int(11) DEFAULT NULL,
  `capaian_realisasi_kinerja` float DEFAULT NULL,
  `capaian_realisasi_fisik` float DEFAULT NULL,
  `capaian_satuan` varchar(16) DEFAULT NULL,
  `pagu_rkpd` int(11) DEFAULT NULL,
  `pagu_renja` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kode_program`),
  KEY `fk_relationship_34` (`id_laporan`),
  CONSTRAINT `fk_relationship_34` FOREIGN KEY (`id_laporan`) REFERENCES `realisasi_fisik` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_rb`
--

DROP TABLE IF EXISTS `program_rb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_rb` (
  `id_program_rb` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_rb` int(11) DEFAULT NULL,
  `nama_program_rb` varchar(128) DEFAULT NULL,
  `sasaran` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_program_rb`),
  KEY `fk_relationship_39` (`id_jenis_rb`),
  CONSTRAINT `fk_relationship_39` FOREIGN KEY (`id_jenis_rb`) REFERENCES `jenis_rb` (`id_jenis_rb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_rb`
--

LOCK TABLES `program_rb` WRITE;
/*!40000 ALTER TABLE `program_rb` DISABLE KEYS */;
/*!40000 ALTER TABLE `program_rb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realisasi_fisik`
--

DROP TABLE IF EXISTS `realisasi_fisik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realisasi_fisik` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_11` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realisasi_fisik`
--

LOCK TABLES `realisasi_fisik` WRITE;
/*!40000 ALTER TABLE `realisasi_fisik` DISABLE KEYS */;
/*!40000 ALTER TABLE `realisasi_fisik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekap_pokja`
--

DROP TABLE IF EXISTS `rekap_pokja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekap_pokja` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nama` varchar(64) DEFAULT NULL,
  `jabatan_bawah` varchar(64) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekap_pokja`
--

LOCK TABLES `rekap_pokja` WRITE;
/*!40000 ALTER TABLE `rekap_pokja` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekap_pokja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekap_tender`
--

DROP TABLE IF EXISTS `rekap_tender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekap_tender` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_2` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekap_tender`
--

LOCK TABLES `rekap_tender` WRITE;
/*!40000 ALTER TABLE `rekap_tender` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekap_tender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sotk`
--

DROP TABLE IF EXISTS `sotk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sotk` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_5` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sotk`
--

LOCK TABLES `sotk` WRITE;
/*!40000 ALTER TABLE `sotk` DISABLE KEYS */;
/*!40000 ALTER TABLE `sotk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sotk_opd`
--

DROP TABLE IF EXISTS `sotk_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sotk_opd` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `besaran` varchar(8) DEFAULT NULL,
  KEY `fk_relationship_26` (`id_opd`),
  KEY `fk_relationship_27` (`id_laporan`),
  CONSTRAINT `fk_relationship_26` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`),
  CONSTRAINT `fk_relationship_27` FOREIGN KEY (`id_laporan`) REFERENCES `sotk` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sotk_opd`
--

LOCK TABLES `sotk_opd` WRITE;
/*!40000 ALTER TABLE `sotk_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `sotk_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tatalaksana`
--

DROP TABLE IF EXISTS `tatalaksana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tatalaksana` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_7` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tatalaksana`
--

LOCK TABLES `tatalaksana` WRITE;
/*!40000 ALTER TABLE `tatalaksana` DISABLE KEYS */;
/*!40000 ALTER TABLE `tatalaksana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tatalaksana_opd`
--

DROP TABLE IF EXISTS `tatalaksana_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tatalaksana_opd` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `uji_kompetensi` float DEFAULT NULL,
  `sop` float DEFAULT NULL,
  `tata_naskah_dinas` float DEFAULT NULL,
  `pakaian_dinas` float DEFAULT NULL,
  `jam_kerja` float DEFAULT NULL,
  `jml_nilai` float DEFAULT NULL,
  `ket` text DEFAULT NULL,
  KEY `fk_relationship_20` (`id_laporan`),
  KEY `fk_relationship_21` (`id_opd`),
  CONSTRAINT `fk_relationship_20` FOREIGN KEY (`id_laporan`) REFERENCES `tatalaksana` (`id_laporan`),
  CONSTRAINT `fk_relationship_21` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tatalaksana_opd`
--

LOCK TABLES `tatalaksana_opd` WRITE;
/*!40000 ALTER TABLE `tatalaksana_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `tatalaksana_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temuan`
--

DROP TABLE IF EXISTS `temuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temuan` (
  `id_temuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_laporan` int(11) DEFAULT NULL,
  `nama_temuan` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_temuan`),
  KEY `fk_relationship_24` (`id_laporan`),
  CONSTRAINT `fk_relationship_24` FOREIGN KEY (`id_laporan`) REFERENCES `pemantauan_tindak_lanjut` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temuan`
--

LOCK TABLES `temuan` WRITE;
/*!40000 ALTER TABLE `temuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `temuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipe_laporan`
--

DROP TABLE IF EXISTS `tipe_laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipe_laporan` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_laporan` varchar(64) DEFAULT NULL,
  `kode_tipe` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipe_laporan`
--

LOCK TABLES `tipe_laporan` WRITE;
/*!40000 ALTER TABLE `tipe_laporan` DISABLE KEYS */;
INSERT INTO `tipe_laporan` VALUES (1,'Realisasi Fisik','realisasi_fisik');
/*!40000 ALTER TABLE `tipe_laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipelaporan_per_opd`
--

DROP TABLE IF EXISTS `tipelaporan_per_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipelaporan_per_opd` (
  `id_opd` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  PRIMARY KEY (`id_opd`,`id_tipe`),
  KEY `fk_tipesurat_per_opd2` (`id_tipe`),
  CONSTRAINT `fk_tipesurat_per_opd` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`),
  CONSTRAINT `fk_tipesurat_per_opd2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_laporan` (`id_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipelaporan_per_opd`
--

LOCK TABLES `tipelaporan_per_opd` WRITE;
/*!40000 ALTER TABLE `tipelaporan_per_opd` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipelaporan_per_opd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_opd` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_user_opd` (`id_opd`),
  CONSTRAINT `fk_user_opd` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin','$2y$10$xZ/LdOuXl/7Mid/amZFHPuN/AAeKXav/2YRmuFpJKpCT0R.TesCGq','2019-07-28 07:57:29','2019-07-28 07:57:29');
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

-- Dump completed on 2019-07-28 18:21:19
