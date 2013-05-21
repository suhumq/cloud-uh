# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.29)
# Database: cloud_uh
# Generation Time: 2013-05-21 08:48:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table backcashflows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `backcashflows`;

CREATE TABLE `backcashflows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `backcashflows` WRITE;
/*!40000 ALTER TABLE `backcashflows` DISABLE KEYS */;

INSERT INTO `backcashflows` (`id`, `code`, `name`, `group`, `flag`)
VALUES
	(22,'400','Hutang Usaha','account payable',0),
	(23,'401','Hutang Gaji','account payable',0),
	(24,'402','Hutang Karyawan','account payable',0),
	(25,'403','Pph 21 Dan 25','account payable',0),
	(26,'800','Perlengkapan Haji','cost of goods sold (haji)',0),
	(27,'801','Manasik Haji','cost of goods sold (haji)',0),
	(28,'802','Spj & Perjalanan Dinas','cost of goods sold (haji)',0),
	(29,'803','Transport Antar Jemput','cost of goods sold (haji)',0),
	(30,'804','Konsumsi Antar Jemput Jamaah','cost of goods sold (haji)',0),
	(31,'805','Handling Airport Tax ','cost of goods sold (haji)',0),
	(32,'806','Airport Tax & Fiskal','cost of goods sold (haji)',0),
	(33,'807','Bpih U/Depag Pusat','cost of goods sold (haji)',0),
	(34,'808','Administrasi U/Depag Pusat','cost of goods sold (haji)',0),
	(35,'809','Pengurusan Dok.O/Partner Kerjasama','cost of goods sold (haji)',0),
	(36,'810','Royalti Oleh Partner Kerjasama','cost of goods sold (haji)',0),
	(37,'811','Ticket Penerbangan','cost of goods sold (haji)',0),
	(38,'812','Land Arrangement','cost of goods sold (haji)',0),
	(39,'813','Cadangan Haji','cost of goods sold (haji)',0),
	(40,'814','Fee Pembimbing ','cost of goods sold (haji)',0),
	(41,'815','Fee Agent','cost of goods sold (haji)',0),
	(42,'816','Bank Garansi','cost of goods sold (haji)',0),
	(43,'817','Kesehatan Jamaah','cost of goods sold (haji)',0),
	(44,'818','Pengembalian Pembatalan Haji','cost of goods sold (haji)',0),
	(45,'819','Cetak Booklet & Foto Haji','cost of goods sold (haji)',0),
	(46,'900','Perlengkapan Umroh','cost of goods sold (umroh)',0),
	(47,'901','Manasik Umroh','cost of goods sold (umroh)',0),
	(48,'902','Transport Antar Jemput','cost of goods sold (umroh)',0),
	(49,'903','Spj & Perjalanan Dinas','cost of goods sold (umroh)',0),
	(50,'904','Konsumsi Antar Jemput Jamaah','cost of goods sold (umroh)',0),
	(51,'905','Handling Airport Tax Umroh','cost of goods sold (umroh)',0),
	(52,'906','Airport Tax & Fiskal','cost of goods sold (umroh)',0),
	(53,'907','Pembuatan Mahram','cost of goods sold (umroh)',0),
	(54,'908','Pembuatan Pasport & Penambahan Nama','cost of goods sold (umroh)',0),
	(55,'909','Asuransi Penerbangan','cost of goods sold (umroh)',0),
	(56,'910','Ticket Penerbangan Umroh','cost of goods sold (umroh)',0),
	(57,'911','Land Arrangement Jed To Jed','cost of goods sold (umroh)',0),
	(58,'912','La Tour Tambahan','cost of goods sold (umroh)',0),
	(59,'913','Pengurusan Visa','cost of goods sold (umroh)',0),
	(60,'914','Royalti Partner Kerjasama','cost of goods sold (umroh)',0),
	(61,'915','Cadangan Umroh','cost of goods sold (umroh)',0),
	(62,'916','Lrpu','cost of goods sold (umroh)',0),
	(63,'917','Pengembalian Pembatalan Umroh','cost of goods sold (umroh)',0),
	(64,'918','Fee Agent','cost of goods sold (umroh)',0),
	(65,'919','Fee Pembimbing','cost of goods sold (umroh)',0),
	(66,'920','Fee Ticket','cost of goods sold (umroh)',0),
	(67,'921','Uang Saku Leader','cost of goods sold (umroh)',0),
	(68,'922','Cetak Booklet Umroh','cost of goods sold (umroh)',0),
	(69,'1000','Biaya Penjualan','expense (penjualan)',0),
	(70,'1001','Biaya Pos, Paket & Materai','expense (penjualan)',0),
	(71,'1002','Biaya Percetakan','expense (penjualan)',0),
	(72,'820','Lain-Lain Haji','cost of goods sold',0),
	(73,'923','Lain-Lain Umroh','cost of goods sold (umroh)',0),
	(74,'1003','Biaya Promosi','expense (penjualan)',0),
	(75,'1004','Biaya Spj & Perjalanan Dinas','expense (penjualan)',0),
	(76,'1005','Biaya Bank','expense (penjualan)',0),
	(77,'1006','Biaya Jamuan Rapat, Pertemuan Dll','expense (penjualan)',0),
	(78,'1007','Biaya Dokumentasi','expense (penjualan)',0),
	(79,'1008','Biaya Kendaraan Inventaris Kantor','expense (penjualan)',0),
	(80,'1009','Biaya Silaturahmi','expense (penjualan)',0),
	(81,'1010','Biaya Lain-Lain','expense (penjualan)',0),
	(82,'1100','Biaya Gaji Direksi','expense (adm & umum)',0),
	(83,'1101','Tunjangan Direksi','expense (adm & umum)',0),
	(84,'1102','Thr Direksi','expense (adm & umum)',0),
	(85,'1103','Gaji Staff','expense (adm & umum)',0),
	(86,'1104','Tunjangan Staff','expense (adm & umum)',0),
	(87,'1105','Thr Staff','expense (adm & umum)',0),
	(88,'1106','Bonus Umroh & Haji','expense (adm & umum)',0),
	(89,'1107','Biaya Lembur','expense (adm & umum)',0),
	(90,'1108','Biaya Atk','expense (adm & umum)',0),
	(91,'1109','Biaya Rtk','expense (adm & umum)',0),
	(92,'1110','Biaya Foto Copy, Jilid Dll','expense (adm & umum)',0),
	(93,'1111','Biaya Transport, Bensin, & Parkir','expense (adm & umum)',0),
	(94,'1112','Biaya Telpon, Hp, Dan Speedy','expense (adm & umum)',0),
	(95,'1113','Biaya Listrik','expense (adm & umum)',0),
	(96,'1114','Biaya Surat Kabar','expense (adm & umum)',0),
	(97,'1115','Biaya Perizinan Kantor','expense (adm & umum)',0),
	(98,'1116','Biaya Perawatan Kantor','expense (adm & umum)',0),
	(99,'1117','Biaya Iuran Organisasi','expense (adm & umum)',0),
	(100,'1118','Biaya Jasa & Sumbangan','expense (adm & umum)',0),
	(101,'1119','Biaya Bingkisan','expense (adm & umum)',0),
	(102,'1120','Biaya Seragam Direksi & Staff','expense (adm & umum)',0),
	(103,'1121','Biaya Pajak','expense (adm & umum)',0),
	(104,'1122','Biaya Sewa Gedung','expense (adm & umum)',0),
	(105,'1123','Biaya Rekruitment','expense (adm & umum)',0),
	(106,'1124','Thr Depag','expense (adm & umum)',0),
	(107,'1125','Kasbon','expense (adm & umum)',0),
	(108,'1126','Biaya Pembuatan Pasport','expense (adm & umum)',0),
	(109,'1127','Biaya Vaksin','expense (adm & umum)',0),
	(110,'1128','Biaya Konsultan Pajak','expense (adm & umum)',0),
	(111,'1129','Bagi Hasil','expense (adm & umum)',0),
	(112,'1130','Biaya Operasional Ke Jakarta','expense (adm & umum)',0),
	(113,'1131','Biaya Penggantian Pengobatan','expense (adm & umum)',0),
	(114,'1132','Biaya Administrasi Bank','expense (adm & umum)',0),
	(115,'1133','Biaya Pengamanan','expense (adm & umum)',0);

/*!40000 ALTER TABLE `backcashflows` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
