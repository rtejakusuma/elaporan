
DROP TABLE IF EXISTS `laporan_kenaikan_pangkat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_kenaikan_pangkat` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) DEFAULT NULL,
  `id_tipe` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_laporan`),
  CONSTRAINT `fk_inheritance_6` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_kenaikan_pangkat`
--

LOCK TABLES `laporan_kenaikan_pangkat` WRITE;
/*!40000 ALTER TABLE `laporan_kenaikan_pangkat` DISABLE KEYS */;
INSERT INTO `laporan_kenaikan_pangkat` VALUES (24,8,9,'2019-08-04 03:10:31','2019-08-04 03:10:31','2019-08-09'),(52,18,9,'2019-08-08 02:13:11','2019-08-08 02:13:11','2019-08-08');
/*!40000 ALTER TABLE `laporan_kenaikan_pangkat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ikm_opd`
--

DROP TABLE IF EXISTS `laporan_kenaikan_pangkat_opd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laporan_kenaikan_pangkat_opd` (
  `id_opd` int(11) DEFAULT NULL,
  `id_laporan` int(11) DEFAULT NULL,
  `no` float DEFAULT NULL,
  `Nama` varchar(16) DEFAULT NULL,
  `NIP` int(16) DEFAULT NULL,
  `Jabatan` varchar(16) DEFAULT NULL,
  `Instansi` varchar(16) DEFAULT NULL,
  KEY `fk_relationship_29` (`id_opd`),
  KEY `fk_relationship_28` (`id_laporan`),
  CONSTRAINT `fk_relationship_28` FOREIGN KEY (`id_laporan`) REFERENCES `laporan_kenaikan_pangkat` (`id_laporan`) ON DELETE CASCADE,
  CONSTRAINT `fk_relationship_29` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan_kenaikan_pangkat_opd`
--

LOCK TABLES `laporan_kenaikan_pangkat_opd` WRITE;
/*!40000 ALTER TABLE `ikm_opd` DISABLE KEYS */;
INSERT INTO `laporan_kenaikan_pangkat_opd` VALUES 
(144,24,1,'reza',165150700111025,'pengadministrasi umum'),
(154,24,3,'richard',165150701111025,'pengadministrasi publik' ),
(13,52,85,'Abi', 165150711111025,'pengadministrasi rakyat');
/*!40000 ALTER TABLE `laporan_kenaikan_pangkat_opd` ENABLE KEYS */;
UNLOCK TABLES;
