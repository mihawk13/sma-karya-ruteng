/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.2.38-MariaDB-cll-lve : Database - bbdb4393_smakaryaruteng
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smakaryaruteng` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `smakaryaruteng`;

/*Table structure for table `absensi` */

DROP TABLE IF EXISTS `absensi`;

CREATE TABLE `absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` bigint(20) unsigned NOT NULL,
  `periode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pulang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIK_Absen` (`nip`,`periode`,`tanggal`,`tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=1540 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `absensi` */

insert  into `absensi`(`id`,`nip`,`periode`,`tahun`,`tanggal`,`jam_masuk`,`jam_pulang`) values
('1324','9793872824980','May','2021','01','07:30','14:00'),
('1325','9785850236274','May','2021','01','07:50','13:00'),
('1326','9792626282922','May','2021','01','07:30','13:00'),
('1327','9787644139112','May','2021','01','07:30','13:00'),
('1328','9791108367614','May','2021','01','07:30','13:00'),
('1329','9790443656506','May','2021','01','07:30','13:00'),
('1330','9796956212307','May','2021','01','07:30','13:00'),
('1331','9798386907525','May','2021','01','07:30','13:00'),
('1332','9790845742920','May','2021','01','07:30','13:00'),
('1333','9793872824980','May','2021','02','07:30','13:00'),
('1334','9785850236274','May','2021','02','07:30','13:00'),
('1335','9792626282922','May','2021','02','07:30','13:00'),
('1336','9787644139112','May','2021','02','07:30','13:00'),
('1337','9791108367614','May','2021','02','07:30','13:00'),
('1338','9790443656506','May','2021','02','07:30','13:00'),
('1339','9796956212307','May','2021','02','07:30','13:00'),
('1340','9798386907525','May','2021','02','07:30','13:00'),
('1341','9790845742920','May','2021','02','07:30','13:00'),
('1342','9793872824980','May','2021','03','07:30','13:00'),
('1343','9785850236274','May','2021','03','07:30','14:00'),
('1344','9792626282922','May','2021','03','07:30','13:00'),
('1345','9787644139112','May','2021','03','07:30','13:00'),
('1346','9791108367614','May','2021','03','07:30','13:00'),
('1347','9790443656506','May','2021','03','07:30','13:00'),
('1348','9796956212307','May','2021','03','07:30','13:00'),
('1349','9798386907525','May','2021','03','07:30','13:00'),
('1350','9790845742920','May','2021','03','07:30','13:00'),
('1351','9793872824980','May','2021','04','07:30','13:00'),
('1352','9785850236274','May','2021','04','07:30','13:00'),
('1353','9792626282922','May','2021','04','07:30','13:00'),
('1354','9787644139112','May','2021','04','07:30','13:00'),
('1355','9791108367614','May','2021','04','07:30','13:00'),
('1356','9790443656506','May','2021','04','07:30','13:00'),
('1357','9796956212307','May','2021','04','07:30','13:00'),
('1358','9798386907525','May','2021','04','07:30','13:00'),
('1359','9790845742920','May','2021','04','07:30','13:00'),
('1360','9793872824980','May','2021','05','07:30','13:00'),
('1361','9785850236274','May','2021','05','07:30','13:00'),
('1362','9792626282922','May','2021','05','07:30','13:00'),
('1363','9787644139112','May','2021','05','07:30','13:00'),
('1364','9791108367614','May','2021','05','07:30','13:00'),
('1365','9790443656506','May','2021','05','07:30','13:00'),
('1366','9796956212307','May','2021','05','07:30','13:00'),
('1367','9798386907525','May','2021','05','07:30','13:00'),
('1368','9790845742920','May','2021','05','07:30','13:00'),
('1369','9793872824980','May','2021','06','07:30','13:00'),
('1370','9785850236274','May','2021','06','07:30','13:00'),
('1371','9792626282922','May','2021','06','07:30','13:00'),
('1372','9787644139112','May','2021','06','07:30','13:00'),
('1373','9791108367614','May','2021','06','07:30','13:00'),
('1374','9790443656506','May','2021','06','07:30','13:00'),
('1375','9796956212307','May','2021','06','07:30','13:00'),
('1376','9798386907525','May','2021','06','07:30','13:00'),
('1377','9790845742920','May','2021','06','07:30','13:00'),
('1378','9793872824980','May','2021','08','07:30','13:00'),
('1379','9785850236274','May','2021','08','07:30','13:00'),
('1380','9792626282922','May','2021','08','07:30','13:00'),
('1381','9787644139112','May','2021','08','07:30','13:00'),
('1382','9791108367614','May','2021','08','07:30','13:00'),
('1383','9790443656506','May','2021','08','07:30','13:00'),
('1384','9796956212307','May','2021','08','07:30','13:00'),
('1385','9798386907525','May','2021','08','07:30','13:00'),
('1386','9790845742920','May','2021','08','07:30','13:00'),
('1387','9793872824980','May','2021','09','07:30','13:00'),
('1388','9785850236274','May','2021','09','07:30','13:00'),
('1389','9792626282922','May','2021','09','07:30','13:00'),
('1390','9787644139112','May','2021','09','07:30','13:00'),
('1391','9791108367614','May','2021','09','07:30','13:00'),
('1392','9790443656506','May','2021','09','07:30','13:00'),
('1393','9796956212307','May','2021','09','07:30','13:00'),
('1394','9798386907525','May','2021','09','07:30','13:00'),
('1395','9790845742920','May','2021','09','07:30','13:00'),
('1396','9793872824980','May','2021','10','07:30','13:00'),
('1397','9785850236274','May','2021','10','07:30','13:00'),
('1398','9792626282922','May','2021','10','07:30','13:00'),
('1399','9787644139112','May','2021','10','07:30','13:00'),
('1400','9791108367614','May','2021','10','07:30','13:00'),
('1401','9790443656506','May','2021','10','07:30','13:00'),
('1402','9796956212307','May','2021','10','07:30','13:00'),
('1403','9798386907525','May','2021','10','07:30','13:00'),
('1404','9790845742920','May','2021','10','07:30','13:00'),
('1405','9793872824980','May','2021','11','07:30','13:00'),
('1406','9785850236274','May','2021','11','07:30','13:00'),
('1407','9792626282922','May','2021','11','07:30','13:00'),
('1408','9787644139112','May','2021','11','07:30','13:00'),
('1409','9791108367614','May','2021','11','07:30','13:00'),
('1410','9790443656506','May','2021','11','07:30','13:00'),
('1411','9796956212307','May','2021','11','07:30','13:00'),
('1412','9798386907525','May','2021','11','07:30','13:00'),
('1413','9790845742920','May','2021','11','07:30','13:00'),
('1414','9793872824980','May','2021','12','07:30','13:00'),
('1415','9785850236274','May','2021','12','07:30','13:00'),
('1416','9792626282922','May','2021','12','07:30','13:00'),
('1417','9787644139112','May','2021','12','07:30','13:00'),
('1418','9791108367614','May','2021','12','07:30','13:00'),
('1419','9790443656506','May','2021','12','07:30','13:00'),
('1420','9796956212307','May','2021','12','07:30','13:00'),
('1421','9798386907525','May','2021','12','07:30','13:00'),
('1422','9790845742920','May','2021','12','07:30','13:00'),
('1423','9793872824980','May','2021','13','07:30','13:00'),
('1424','9785850236274','May','2021','13','07:30','13:00'),
('1425','9792626282922','May','2021','13','07:30','13:00'),
('1426','9787644139112','May','2021','13','07:30','13:00'),
('1427','9791108367614','May','2021','13','07:30','13:00'),
('1428','9790443656506','May','2021','13','07:30','13:00'),
('1429','9796956212307','May','2021','13','07:30','13:00'),
('1430','9798386907525','May','2021','13','07:30','13:00'),
('1431','9790845742920','May','2021','13','07:30','13:00'),
('1432','9793872824980','May','2021','15','07:30','13:00'),
('1433','9785850236274','May','2021','15','07:30','13:00'),
('1434','9792626282922','May','2021','15','07:30','13:00'),
('1435','9787644139112','May','2021','15','07:30','13:00'),
('1436','9791108367614','May','2021','15','07:30','13:00'),
('1437','9790443656506','May','2021','15','07:30','13:00'),
('1438','9796956212307','May','2021','15','07:30','13:00'),
('1439','9798386907525','May','2021','15','07:30','13:00'),
('1440','9790845742920','May','2021','15','07:30','13:00'),
('1441','9793872824980','May','2021','16','07:30','13:00'),
('1442','9785850236274','May','2021','16','07:30','13:00'),
('1443','9792626282922','May','2021','16','07:30','13:00'),
('1444','9787644139112','May','2021','16','07:30','13:00'),
('1445','9791108367614','May','2021','16','07:30','13:00'),
('1446','9790443656506','May','2021','16','07:30','13:00'),
('1447','9796956212307','May','2021','16','07:30','13:00'),
('1448','9798386907525','May','2021','16','07:30','13:00'),
('1449','9790845742920','May','2021','16','07:30','13:00'),
('1450','9793872824980','May','2021','17','07:30','13:00'),
('1451','9785850236274','May','2021','17','07:30','13:00'),
('1452','9792626282922','May','2021','17','07:30','13:00'),
('1453','9787644139112','May','2021','17','07:30','13:00'),
('1454','9791108367614','May','2021','17','07:30','13:00'),
('1455','9790443656506','May','2021','17','07:30','13:00'),
('1456','9796956212307','May','2021','17','07:30','13:00'),
('1457','9798386907525','May','2021','17','07:30','13:00'),
('1458','9790845742920','May','2021','17','07:30','13:00'),
('1459','9793872824980','May','2021','18','07:30','13:00'),
('1460','9785850236274','May','2021','18','07:30','13:00'),
('1461','9792626282922','May','2021','18','07:30','13:00'),
('1462','9787644139112','May','2021','18','07:30','13:00'),
('1463','9791108367614','May','2021','18','07:30','13:00'),
('1464','9790443656506','May','2021','18','07:30','13:00'),
('1465','9796956212307','May','2021','18','07:30','13:00'),
('1466','9798386907525','May','2021','18','07:30','13:00'),
('1467','9790845742920','May','2021','18','07:30','13:00'),
('1468','9793872824980','May','2021','19','07:30','13:00'),
('1469','9785850236274','May','2021','19','07:30','13:00'),
('1470','9792626282922','May','2021','19','07:30','13:00'),
('1471','9787644139112','May','2021','19','07:30','13:00'),
('1472','9791108367614','May','2021','19','07:30','13:00'),
('1473','9790443656506','May','2021','19','07:30','13:00'),
('1474','9796956212307','May','2021','19','07:30','13:00'),
('1475','9798386907525','May','2021','19','07:30','13:00'),
('1476','9790845742920','May','2021','19','07:30','13:00'),
('1477','9793872824980','May','2021','20','07:30','13:00'),
('1478','9785850236274','May','2021','20','07:30','13:00'),
('1479','9792626282922','May','2021','20','07:30','13:00'),
('1480','9787644139112','May','2021','20','07:30','13:00'),
('1481','9791108367614','May','2021','20','07:30','13:00'),
('1482','9790443656506','May','2021','20','07:30','13:00'),
('1483','9796956212307','May','2021','20','07:30','13:00'),
('1484','9798386907525','May','2021','20','07:30','13:00'),
('1485','9790845742920','May','2021','20','07:30','13:00'),
('1486','9793872824980','May','2021','22','07:30','13:00'),
('1487','9785850236274','May','2021','22','07:30','13:00'),
('1488','9792626282922','May','2021','22','07:30','13:00'),
('1489','9787644139112','May','2021','22','07:30','13:00'),
('1490','9791108367614','May','2021','22','07:30','13:00'),
('1491','9790443656506','May','2021','22','07:30','13:00'),
('1492','9796956212307','May','2021','22','07:30','13:00'),
('1493','9798386907525','May','2021','22','07:30','13:00'),
('1494','9790845742920','May','2021','22','07:30','13:00'),
('1495','9793872824980','May','2021','23','07:30','13:00'),
('1496','9785850236274','May','2021','23','07:30','13:00'),
('1497','9792626282922','May','2021','23','07:30','13:00'),
('1498','9787644139112','May','2021','23','07:30','13:00'),
('1499','9791108367614','May','2021','23','07:30','13:00'),
('1500','9790443656506','May','2021','23','07:30','13:00'),
('1501','9796956212307','May','2021','23','07:30','13:00'),
('1502','9798386907525','May','2021','23','07:30','13:00'),
('1503','9790845742920','May','2021','23','07:30','13:00'),
('1504','9793872824980','May','2021','24','07:30','13:00'),
('1505','9785850236274','May','2021','24','07:30','13:00'),
('1506','9792626282922','May','2021','24','07:30','13:00'),
('1507','9787644139112','May','2021','24','07:30','13:00'),
('1508','9791108367614','May','2021','24','07:30','13:00'),
('1509','9790443656506','May','2021','24','07:30','13:00'),
('1510','9796956212307','May','2021','24','07:30','13:00'),
('1511','9798386907525','May','2021','24','07:30','13:00'),
('1512','9790845742920','May','2021','24','07:30','13:00'),
('1513','9793872824980','May','2021','25','07:30','13:00'),
('1514','9785850236274','May','2021','25','07:30','13:00'),
('1515','9792626282922','May','2021','25','07:30','13:00'),
('1516','9787644139112','May','2021','25','07:30','13:00'),
('1517','9791108367614','May','2021','25','07:30','13:00'),
('1518','9790443656506','May','2021','25','07:30','13:00'),
('1519','9796956212307','May','2021','25','07:30','13:00'),
('1520','9798386907525','May','2021','25','07:30','13:00'),
('1521','9790845742920','May','2021','25','07:30','13:00'),
('1522','9793872824980','May','2021','26','07:30','13:00'),
('1523','9785850236274','May','2021','26','07:30','13:00'),
('1524','9792626282922','May','2021','26','07:30','13:00'),
('1525','9787644139112','May','2021','26','07:30','13:00'),
('1526','9791108367614','May','2021','26','07:30','13:00'),
('1527','9790443656506','May','2021','26','07:30','13:00'),
('1528','9796956212307','May','2021','26','07:30','13:00'),
('1529','9798386907525','May','2021','26','07:30','13:00'),
('1530','9790845742920','May','2021','26','07:30','13:00'),
('1531','9793872824980','May','2021','27','07:30','13:00'),
('1532','9785850236274','May','2021','27','07:30','13:00'),
('1533','9792626282922','May','2021','27','07:30','13:00'),
('1534','9787644139112','May','2021','27','07:30','13:00'),
('1535','9791108367614','May','2021','27','07:30','13:00'),
('1536','9790443656506','May','2021','27','07:30','13:00'),
('1537','9796956212307','May','2021','27','07:30','13:00'),
('1538','9798386907525','May','2021','27','07:30','13:00'),
('1539','9790845742920','May','2021','27','07:30','13:00');

/*Table structure for table `cuti` */

DROP TABLE IF EXISTS `cuti`;

CREATE TABLE `cuti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` bigint(20) unsigned NOT NULL,
  `periode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cuti` */

insert  into `cuti`(`id`,`nip`,`periode`,`tahun`,`awal_cuti`,`akhir_cuti`,`file`,`keterangan`) values
('1','9793872824980','May','2021','2021-05-05','2021-05-05','1620193269.png','Coba'),
('2','9793872824980','Jun','2021','2021-06-01','2021-10-31','1620197874.pdf','cuti bersalin'),
('3','9785850236274','Jun','2021','2021-06-01','2021-10-31','1620198533.pdf','cuti bersalin');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` bigint(20) unsigned NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tunjangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gaji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `gaji` */

insert  into `gaji`(`id`,`nip`,`periode`,`tanggal`,`gaji_pokok`,`bonus`,`potongan`,`tunjangan`,`total_gaji`) values
('7','9785850236274','Mei','2021-05-01','2500000','7000','510000','3150000','5147000'),
('9','9793872824980','Mei','2021-05-01','2500000','7000','22000','3000000','5485000');

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id`,`nama_jabatan`,`gaji_pokok`) values
('1','Bendahara','2000000'),
('2','Kepala Sekolah','2500000'),
('3','Guru','2500000');

/*Table structure for table `lama_masa_kerja` */

DROP TABLE IF EXISTS `lama_masa_kerja`;

CREATE TABLE `lama_masa_kerja` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pegawai` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lama_masa_kerja` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values
('1','2014_10_12_000000_create_users_table','1'),
('2','2014_10_12_100000_create_password_resets_table','1'),
('3','2019_08_19_000000_create_failed_jobs_table','1'),
('4','2021_04_04_045700_create_pegawai_table','1'),
('5','2021_04_06_233043_create_jabatan_table','1'),
('6','2021_04_06_233234_create_absensi_table','1'),
('7','2021_04_06_233510_create_cuti_table','1'),
('8','2021_04_06_233616_create_potongan_table','1'),
('9','2021_04_06_233728_create_tunjangan_table','1'),
('10','2021_04_06_233901_create_lama_masa_kerja_table','1'),
('11','2021_04_06_234109_create_gaji_table','1');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id`,`nip`,`jabatan`,`nama`,`jk`,`tgl_lahir`,`alamat`,`tgl_mulai`,`telp`,`no_rekening`) values
('1','1234567896352','Bendahara','Afin Duru','Perempuan','1987-09-09','Karot,NTT','2007-03-06','081339089187','06548832'),
('2','9793872824980','Bendahara','Apolonia meo','Perempuan','1990-02-20','Dk. Pahlawan No. 676, Padang 97666, Gorontalo','2014-02-20','(+62) 780 0753 6298','6011656729596620'),
('3','9785850236274','Guru','Densiana Tridini Dei','Perempuan','1992-05-19','Kar0t, sondeng','2018-02-01','(+62) 568 4660 584','4532997565224009'),
('4','9792626282922','Guru','Ni Wayan Purniasih','Laki-Laki','1990-02-20','Kpg. Dahlia No. 778, Administrasi Jakarta Utara 42259, Sumsel','2021-02-20','0646 9364 6742','4929312496367219'),
('5','9787644139112','Guru','Desiana Alexandra','Perempuan','1990-02-20','Gg. Bagonwoto  No. 834, Manggarai','2021-02-20','(+62) 941 4383 6890','4929333117915905'),
('6','9791108367614','Guru','Efrem saputra','Laki-Laki','1990-02-20','Kpg. Taman No. 10, Boawae','2010-02-20','(+62) 994 2864 091','5123711155014791'),
('7','9790443656506','Guru','Emanuela mandat','Perempuan','1990-02-20','Jr. Salak No. 266, Cancar','2021-02-20','022 7250 7288','4532135609786101'),
('8','9796956212307','Guru','Alexandro haven','Laki-Laki','1990-02-04','Jr. Suharso No. 119, Mataram 77860, Jateng','2012-02-20','0866 742 694','4556821170613987'),
('9','9798386907525','Guru','Robertus Duru','Laki-Laki','1990-02-20','Jln wae ces, karot','2017-02-20','(+62) 494 3428 751','4980039282669'),
('10','9790845742920\r\n','Guru','Valeriani Lasa','Perempuan','1990-02-20','Jr. Bappenas No. 861, Borong','2019-02-20','(+62) 714 1549 633','4532388348723709'),
('11','256488665323696','Kepala Sekolah','Kepala Sekolah','Laki-Laki','1981-12-16','Cokorda','2007-01-01','081234656856','312652353'),
('13','4321567896352','Bendahara','Ifan','Perempuan','1990-02-20','Panjer','2021-02-20','08123456789','06548832'),
('14','43456768798809','Kepala Sekolah','Ni Wayan Purniasih','Perempuan','1987-12-09','ruteng tenda','1999-02-01','081234765987','123789354');

/*Table structure for table `potongan` */

DROP TABLE IF EXISTS `potongan`;

CREATE TABLE `potongan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` bigint(20) unsigned NOT NULL,
  `pot_simpan_pinjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pot_konsumsi_wajib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_duka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `potongan` */

insert  into `potongan`(`id`,`nip`,`pot_simpan_pinjam`,`pot_konsumsi_wajib`,`uang_duka`) values
('1','9785850236274','50000','5000','5000'),
('2','9787644139112','5000','50000','5000'),
('3','9793872824980','10000','5000','7000'),
('4','9790443656506','5000','3000','0');

/*Table structure for table `tunjangan` */

DROP TABLE IF EXISTS `tunjangan`;

CREATE TABLE `tunjangan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengabdian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `istri_suami` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tunjangan` */

insert  into `tunjangan`(`id`,`nip`,`fungsional`,`jabatan`,`pengabdian`,`istri_suami`,`anak`) values
('1','9785850236274','1000000','1000000','1000000','0','0'),
('2','256488665323696','750000','750000','1000000','200000','80000'),
('3','1234567896352','750000','750000','1000000','200000','80000');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`pegawai_id`,`remember_token`,`created_at`,`updated_at`) values
('1','bendahara','$2y$10$cUByWGqzY1SKreIS2XMKjebdBvA5YbE2zKYkvECKX2yifr9pSLmKq','1',NULL,'2021-05-05 04:31:41','2021-05-13 11:02:07'),
('2','anto','$2y$10$qahPmC5OaK9kkfHlB1KxKuwBJ4H.NY1r5Ioc5t6wcclE0L6gj7XW2','2',NULL,'2021-05-05 05:31:55','2021-05-07 10:56:02'),
('3','kepsek','$2y$10$TMn7sfMFwykAoviuV1LNTeWWCTfYIs.JKtc0PaBq8mjxBM5nka/gS','11',NULL,'2021-05-05 05:32:45','2021-05-05 05:32:45'),
('4','indy','$2y$10$vh6MyQBeOluI9ubcI/dZaOHURSlE9ay1j5R0kObKPaxzkkpqK6zKm','3',NULL,'2021-05-05 07:07:35','2021-05-07 09:49:34'),
('5','yenda','$2y$10$pZ1VP2Uox3gjW3Vuj26HFuTJvdllW8tu9Ycrw2eP.en0u.qowbZzW','7',NULL,'2021-05-07 10:56:53','2021-05-07 10:56:53'),
('6','desi','$2y$10$vqXA2PxGH.Ab77bua0LHYOXMnIntMeBisTKKuGL5/MNPJl10zY7vy','5',NULL,'2021-05-13 11:03:12','2021-05-13 11:03:12'),
('7','afin','$2y$10$frLBfijOeqjywxRQ54/NhuFnOZbSzH1iGrn4WmvYAZoiEH8B/Wtby','13',NULL,'2021-05-22 04:15:11','2021-05-22 04:15:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
