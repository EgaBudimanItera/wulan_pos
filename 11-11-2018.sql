/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - wulan_simpos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`wulan_simpos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wulan_simpos`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `noakun` varchar(10) NOT NULL,
  `namaakun` varchar(20) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  PRIMARY KEY (`noakun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`noakun`,`namaakun`,`saldo`) values ('1110','kas',-77852500);

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `brngId` int(11) NOT NULL AUTO_INCREMENT,
  `brngKode` varchar(10) NOT NULL,
  `brngNama` varchar(50) NOT NULL,
  `brngStunId` int(11) NOT NULL,
  `brngHpp` double NOT NULL DEFAULT '0',
  `brngHargaJual` double NOT NULL DEFAULT '0',
  `brngStokAkhir` int(11) NOT NULL DEFAULT '0',
  `brngGambar` text,
  PRIMARY KEY (`brngId`),
  KEY `brngId` (`brngId`),
  KEY `FK_barang` (`brngStunId`),
  CONSTRAINT `FK_barang` FOREIGN KEY (`brngStunId`) REFERENCES `satuan` (`stunId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `barang` */

insert  into `barang`(`brngId`,`brngKode`,`brngNama`,`brngStunId`,`brngHpp`,`brngHargaJual`,`brngStokAkhir`,`brngGambar`) values (1,'PAK001','PALA AKI JUMBO KUNING',1,100000,15000,100,'IMG_20180928_160342-min.jpg'),(2,'MRM001','MINYAK REM PRESTONE MERAH 1000ML',1,60000,75000,12,'IMG_20180928_155938-min1.jpg'),(3,'BAUT001','MUR TOPI 14MM AK 10XP1.25',1,500,1000,1990,'IMG_20181003_143021-min1.jpg'),(4,'MRM002','MINYAK REM PRESTONE PUTIH 1000ML',1,60000,75000,24,'prestone2.jpg'),(5,'GM001','GEMUK ROTARY BEARING BLUE 400GR HI-TEMP LITIUM',1,35000,45000,117,'IMG_20180928_154820-min1.jpg'),(6,'MRM003','MINYAK REM MK MERAH 1000ML DOT3',1,47000,55000,60,'IMG_20180928_155920-min1.jpg'),(7,'MRM004','MINYAK REM KTB 1000ML ML-151003 DOT3',1,73500,82500,0,'IMG_20180928_155951-min1.jpg'),(8,'FLS001','FUEL/F BWH FUSO TI SF-1002 SAKURA ME-072970',1,34000,42500,5,'IMG_20181003_140849-min1.jpg'),(9,'FLO001','OLI/F HO7D C-1304 SAKURA 15607-1731',1,67000,80000,50,'IMG_20181003_141204-min1.jpg'),(10,'RTG001','RING TEMBAGA NOZZLE SPECIA SN-081',1,2000,3500,0,'IMG_20181003_142942-min1.jpg'),(11,'FLA001','FLASHER SIGN HO7C SH 81980-1360',1,45000,60000,31,'IMG_20181003_143422-min1.jpg'),(12,'BSP001','BOSPER C/D PANJANG OHK MW-030499',1,10000,16000,32,'IMG_20181003_144444-min1.jpg'),(13,'EKC001','ENGKOL KACA CANTER SPECIA PK-201',1,4500,10000,39,'IMG_20181003_144408-min1.jpg'),(14,'KR001','FIBER REM DPN FIG SPECIA PG-021',1,2000,4500,90,'IMG_20181003_144109-min1.jpg'),(15,'KR002','KARET REM BLKG PS120 SC-80023 SEIKEN JPG',1,5000,8000,980,'IMG_20181003_142841-min1.jpg');

/*Table structure for table `bayarpiutang` */

DROP TABLE IF EXISTS `bayarpiutang`;

CREATE TABLE `bayarpiutang` (
  `byrpId` int(11) NOT NULL AUTO_INCREMENT,
  `byrpNoFaktur` varchar(20) DEFAULT NULL,
  `byrpPlgnId` int(11) DEFAULT NULL,
  `byrpTanggal` date DEFAULT NULL,
  `byrpTotalBayar` double DEFAULT NULL,
  `byrpKet` text,
  PRIMARY KEY (`byrpId`),
  KEY `FK_bayarpiutang` (`byrpPlgnId`),
  CONSTRAINT `FK_bayarpiutang` FOREIGN KEY (`byrpPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bayarpiutang` */

insert  into `bayarpiutang`(`byrpId`,`byrpNoFaktur`,`byrpPlgnId`,`byrpTanggal`,`byrpTotalBayar`,`byrpKet`) values (1,'BP11180001',2,'2018-10-12',195000,''),(2,'BP11180002',3,'2018-10-15',72500,'');

/*Table structure for table `bayarutang` */

DROP TABLE IF EXISTS `bayarutang`;

CREATE TABLE `bayarutang` (
  `byruId` int(11) NOT NULL AUTO_INCREMENT,
  `byruNoFaktur` varchar(20) DEFAULT NULL,
  `byruTanggal` date DEFAULT NULL,
  `byruSplrId` int(11) DEFAULT NULL,
  `byruTotalBayar` double DEFAULT NULL,
  `byruKet` text,
  PRIMARY KEY (`byruId`),
  KEY `FK_bayarutang` (`byruSplrId`),
  CONSTRAINT `FK_bayarutang` FOREIGN KEY (`byruSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `bayarutang` */

insert  into `bayarutang`(`byruId`,`byruNoFaktur`,`byruTanggal`,`byruSplrId`,`byruTotalBayar`,`byruKet`) values (1,'BU11180001','2018-10-15',1,50500000,''),(2,'BU11180002','2018-10-16',2,14400000,''),(3,'BU11180003','2018-10-17',3,7020000,''),(4,'BU11180004','2018-11-01',8,1200000,''),(5,'BU11180005','2018-11-07',9,5000000,'');

/*Table structure for table `cash` */

DROP TABLE IF EXISTS `cash`;

CREATE TABLE `cash` (
  `cashId` int(11) NOT NULL AUTO_INCREMENT,
  `cashTanggal` date DEFAULT NULL,
  `cashNoFaktur` varchar(15) NOT NULL,
  `cashKet` text,
  `cashAwal` double DEFAULT NULL,
  `cashDebet` double NOT NULL,
  `cashKredit` double NOT NULL,
  `cashAkhir` double NOT NULL,
  PRIMARY KEY (`cashId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `cash` */

insert  into `cash`(`cashId`,`cashTanggal`,`cashNoFaktur`,`cashKet`,`cashAwal`,`cashDebet`,`cashKredit`,`cashAkhir`) values (1,'2018-10-15','BU11180001','Bayar Utang',0,0,50500000,-50500000),(2,'2018-10-16','BU11180002','Bayar Utang',-50500000,0,14400000,-64900000),(3,'2018-10-17','BU11180003','Bayar Utang',-64900000,0,7020000,-71920000),(4,'2018-11-01','BU11180004','Bayar Utang',-71920000,0,1200000,-73120000),(5,'2018-11-07','BU11180005','Bayar Utang',-73120000,0,5000000,-78120000),(6,'2018-10-12','BP11180001','Pembayaran Piutang',-78120000,195000,0,-77925000),(7,'2018-10-15','BP11180002','Pembayaran Piutang',-77925000,72500,0,-77852500);

/*Table structure for table `detbayarpiutang` */

DROP TABLE IF EXISTS `detbayarpiutang`;

CREATE TABLE `detbayarpiutang` (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypByrpId` int(11) NOT NULL,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  PRIMARY KEY (`dbypId`),
  KEY `FK_detbayarpiutang` (`dbypByrpId`),
  CONSTRAINT `FK_detbayarpiutang` FOREIGN KEY (`dbypByrpId`) REFERENCES `bayarpiutang` (`byrpId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detbayarpiutang` */

insert  into `detbayarpiutang`(`dbypId`,`dbypByrpId`,`dbypPnjlId`,`dbypBayar`) values (1,1,2,195000),(2,2,3,72500);

/*Table structure for table `detbayarpiutang_temp` */

DROP TABLE IF EXISTS `detbayarpiutang_temp`;

CREATE TABLE `detbayarpiutang_temp` (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  `dbypCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dbypId`),
  KEY `FK_detbayarpiutang_temp` (`dbypPnjlId`),
  CONSTRAINT `FK_detbayarpiutang_temp` FOREIGN KEY (`dbypPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detbayarpiutang_temp` */

/*Table structure for table `detbayarutang` */

DROP TABLE IF EXISTS `detbayarutang`;

CREATE TABLE `detbayarutang` (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuByruId` int(11) NOT NULL,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  PRIMARY KEY (`dbyuId`),
  KEY `FK_detbayarutang` (`dbyuByruId`),
  CONSTRAINT `FK_detbayarutang` FOREIGN KEY (`dbyuByruId`) REFERENCES `bayarutang` (`byruId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detbayarutang` */

insert  into `detbayarutang`(`dbyuId`,`dbyuByruId`,`dbyuPmblId`,`dbyuBayar`) values (1,1,1,50500000),(2,2,2,14400000),(3,3,3,7020000),(4,4,8,1200000),(5,5,9,5000000);

/*Table structure for table `detbayarutang_temp` */

DROP TABLE IF EXISTS `detbayarutang_temp`;

CREATE TABLE `detbayarutang_temp` (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  `dbyuCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dbyuId`),
  KEY `FK_detbayarutang_temp` (`dbyuPmblId`),
  CONSTRAINT `FK_detbayarutang_temp` FOREIGN KEY (`dbyuPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detbayarutang_temp` */

/*Table structure for table `detorderpenjualan` */

DROP TABLE IF EXISTS `detorderpenjualan`;

CREATE TABLE `detorderpenjualan` (
  `dopjId` int(11) NOT NULL AUTO_INCREMENT,
  `dopjOpnjId` int(11) NOT NULL,
  `dopjBrngId` int(11) NOT NULL,
  `dopjJumlah` int(11) NOT NULL,
  `dopjHarga` double DEFAULT NULL,
  `dopjDiskon` double DEFAULT NULL,
  PRIMARY KEY (`dopjId`),
  KEY `FK_detpenjualan` (`dopjBrngId`),
  KEY `FK_detpenjualan1` (`dopjOpnjId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detorderpenjualan` */

/*Table structure for table `detorderpenjualan_temp` */

DROP TABLE IF EXISTS `detorderpenjualan_temp`;

CREATE TABLE `detorderpenjualan_temp` (
  `dopjId` int(11) NOT NULL AUTO_INCREMENT,
  `dopjBrngId` int(11) NOT NULL,
  `dopjJumlah` int(11) NOT NULL,
  `dopjHarga` double DEFAULT NULL,
  `dopjDiskon` double DEFAULT NULL,
  `dopjCreatedBy` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`dopjId`),
  KEY `FK_detpenjualan` (`dopjBrngId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detorderpenjualan_temp` */

/*Table structure for table `detpembelian` */

DROP TABLE IF EXISTS `detpembelian`;

CREATE TABLE `detpembelian` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbPmblId` int(11) NOT NULL,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  `dtpbDiskon` double DEFAULT '0',
  PRIMARY KEY (`dtpbId`),
  KEY `FK_detpembelian` (`dtpbBrngId`),
  KEY `FK_detpembelian1` (`dtpbPmblId`),
  CONSTRAINT `FK_detpembelian` FOREIGN KEY (`dtpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detpembelian1` FOREIGN KEY (`dtpbPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpembelian` */

insert  into `detpembelian`(`dtpbId`,`dtpbPmblId`,`dtpbBrngId`,`dtpbJumlah`,`dtpbHarga`,`dtpbDiskon`) values (1,1,1,500,100000,0),(2,1,3,1000,500,0),(3,2,2,120,60000,0),(4,2,4,120,60000,0),(5,3,5,120,35000,0),(6,3,6,60,47000,0),(7,4,11,30,45000,0),(8,5,7,120,73500,0),(9,6,8,50,34000,0),(10,6,9,50,67000,0),(11,7,10,1000,2000,0),(12,7,13,40,4500,0),(13,7,14,100,2000,0),(14,8,12,120,10000,0),(15,9,15,1000,5000,0);

/*Table structure for table `detpembelian_temp` */

DROP TABLE IF EXISTS `detpembelian_temp`;

CREATE TABLE `detpembelian_temp` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  `dtpbDiskon` double DEFAULT '0',
  `dtpbCreatedBy` varchar(50) DEFAULT 'admin',
  PRIMARY KEY (`dtpbId`),
  KEY `FK_detpembelian_temp` (`dtpbBrngId`),
  CONSTRAINT `FK_detpembelian_temp` FOREIGN KEY (`dtpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpembelian_temp` */

/*Table structure for table `detpenjualan` */

DROP TABLE IF EXISTS `detpenjualan`;

CREATE TABLE `detpenjualan` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjPnjlId` int(11) NOT NULL,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  `dtpjDiskon` double DEFAULT NULL,
  PRIMARY KEY (`dtpjId`),
  KEY `FK_detpenjualan` (`dtpjBrngId`),
  KEY `FK_detpenjualan1` (`dtpjPnjlId`),
  CONSTRAINT `FK_detpenjualan` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detpenjualan1` FOREIGN KEY (`dtpjPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpenjualan` */

insert  into `detpenjualan`(`dtpjId`,`dtpjPnjlId`,`dtpjBrngId`,`dtpjJumlah`,`dtpjHarga`,`dtpjDiskon`) values (1,1,1,2,15000,NULL),(2,1,3,5,1000,NULL),(3,1,2,1,75000,NULL),(4,2,11,2,60000,NULL),(5,2,4,1,75000,NULL),(6,3,8,1,42500,NULL),(7,3,1,2,15000,NULL),(8,4,14,10,4500,NULL),(9,4,8,5,42500,NULL),(10,5,12,10,16000,NULL),(11,5,15,10,8000,NULL),(12,5,5,3,45000,NULL),(13,5,6,2,55000,NULL),(14,6,13,1,10000,NULL),(15,6,12,4,16000,NULL),(16,6,15,10,8000,NULL);

/*Table structure for table `detpenjualan_temp` */

DROP TABLE IF EXISTS `detpenjualan_temp`;

CREATE TABLE `detpenjualan_temp` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  `dtpjCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dtpjId`),
  KEY `FK_detpenjualan_temp` (`dtpjBrngId`),
  CONSTRAINT `FK_detpenjualan_temp` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpenjualan_temp` */

/*Table structure for table `detreturpembelian` */

DROP TABLE IF EXISTS `detreturpembelian`;

CREATE TABLE `detreturpembelian` (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbRtpbId` int(11) NOT NULL,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  `drpbHarga` double DEFAULT NULL,
  PRIMARY KEY (`drpbId`),
  KEY `FK_detreturpembelian` (`drpbBrngId`),
  KEY `FK_detreturpembelian1` (`drpbRtpbId`),
  CONSTRAINT `FK_detreturpembelian` FOREIGN KEY (`drpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detreturpembelian1` FOREIGN KEY (`drpbRtpbId`) REFERENCES `returpembelian` (`rtpbId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detreturpembelian` */

insert  into `detreturpembelian`(`drpbId`,`drpbRtpbId`,`drpbBrngId`,`drpbJumlah`,`drpbHarga`) values (1,1,1,5,NULL),(2,2,11,1,NULL);

/*Table structure for table `detreturpembelian_temp` */

DROP TABLE IF EXISTS `detreturpembelian_temp`;

CREATE TABLE `detreturpembelian_temp` (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  `drpbPmblId` int(11) DEFAULT NULL,
  `drpbHarga` double DEFAULT NULL,
  `drpbCreatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`drpbId`),
  KEY `FK_detreturpembelian_temp` (`drpbBrngId`),
  CONSTRAINT `FK_detreturpembelian_temp` FOREIGN KEY (`drpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detreturpembelian_temp` */

/*Table structure for table `detreturpenjualan` */

DROP TABLE IF EXISTS `detreturpenjualan`;

CREATE TABLE `detreturpenjualan` (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjRtpjId` int(11) NOT NULL,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  `drpjHarga` double DEFAULT NULL,
  PRIMARY KEY (`drpjId`),
  KEY `FK_detreturpenjualan` (`drpjBrngId`),
  KEY `FK_detreturpenjualan1` (`drpjRtpjId`),
  CONSTRAINT `FK_detreturpenjualan` FOREIGN KEY (`drpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detreturpenjualan1` FOREIGN KEY (`drpjRtpjId`) REFERENCES `returpenjualan` (`rtpjId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detreturpenjualan` */

insert  into `detreturpenjualan`(`drpjId`,`drpjRtpjId`,`drpjBrngId`,`drpjJumlah`,`drpjHarga`) values (1,1,11,1,NULL),(2,2,6,2,NULL);

/*Table structure for table `detreturpenjualan_temp` */

DROP TABLE IF EXISTS `detreturpenjualan_temp`;

CREATE TABLE `detreturpenjualan_temp` (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  `drpjPnjlId` int(11) DEFAULT NULL,
  `drpjHarga` double DEFAULT NULL,
  `drpjCreatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`drpjId`),
  KEY `FK_detreturpenjualan_temp` (`drpjBrngId`),
  CONSTRAINT `FK_detreturpenjualan_temp` FOREIGN KEY (`drpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detreturpenjualan_temp` */

/*Table structure for table `hutang` */

DROP TABLE IF EXISTS `hutang`;

CREATE TABLE `hutang` (
  `htngId` int(11) NOT NULL AUTO_INCREMENT,
  `htngTanggal` date DEFAULT NULL,
  `htngSplrId` int(11) NOT NULL,
  `htngNoFaktur` varchar(15) NOT NULL,
  `htngKet` text,
  `htngAwal` double DEFAULT NULL,
  `htngDebet` double NOT NULL,
  `htngKredit` double NOT NULL,
  `htngAkhir` double NOT NULL,
  PRIMARY KEY (`htngId`),
  KEY `FK_hutang` (`htngSplrId`),
  CONSTRAINT `FK_hutang` FOREIGN KEY (`htngSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `hutang` */

insert  into `hutang`(`htngId`,`htngTanggal`,`htngSplrId`,`htngNoFaktur`,`htngKet`,`htngAwal`,`htngDebet`,`htngKredit`,`htngAkhir`) values (1,'2018-10-15',1,'BU11180001','Pembayaran Hutang',0,50500000,50500000,0),(2,'2018-10-16',2,'BU11180002','Pembayaran Hutang',0,14400000,14400000,0),(3,'2018-10-17',3,'BU11180003','Pembayaran Hutang',0,7020000,7020000,0),(4,'2018-11-01',8,'BU11180004','Pembayaran Hutang',0,1200000,1200000,0),(5,'2018-11-07',9,'BU11180005','Pembayaran Hutang',0,5000000,5000000,0);

/*Table structure for table `orderpenjualan` */

DROP TABLE IF EXISTS `orderpenjualan`;

CREATE TABLE `orderpenjualan` (
  `opnjId` int(11) NOT NULL AUTO_INCREMENT,
  `opnjNoFaktur` varchar(40) NOT NULL,
  `opnjTanggal` datetime DEFAULT NULL,
  `opnjPlgnId` int(11) NOT NULL,
  `opnjKet` text NOT NULL,
  `opnjTotalOrder` double DEFAULT NULL,
  `opnjStatusOrder` enum('Order','Sales') DEFAULT 'Order',
  `opnjPnjlId` int(11) DEFAULT NULL,
  PRIMARY KEY (`opnjId`),
  KEY `FK_penjualan` (`opnjPlgnId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orderpenjualan` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `plgnId` int(11) NOT NULL AUTO_INCREMENT,
  `plgnKode` varchar(10) NOT NULL,
  `plgnNama` varchar(50) NOT NULL,
  `plgnNamaKontak` varchar(50) DEFAULT NULL,
  `plgnTelp1` varchar(12) NOT NULL,
  `plgnTelp2` varchar(12) DEFAULT NULL,
  `plgnAlamat` text,
  `plgnPiutang` double DEFAULT NULL,
  `plgnNik` varchar(30) DEFAULT NULL,
  `plgnNamaUser` varchar(40) DEFAULT NULL,
  `plgnPassword` varchar(30) DEFAULT NULL,
  `plgnEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`plgnId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`plgnId`,`plgnKode`,`plgnNama`,`plgnNamaKontak`,`plgnTelp1`,`plgnTelp2`,`plgnAlamat`,`plgnPiutang`,`plgnNik`,`plgnNamaUser`,`plgnPassword`,`plgnEmail`) values (1,'P001','CV Langkah Prima','-','0','0','-',0,'-','langkahprima','202cb962ac59075b964b07152d234b','-'),(2,'P002','WTL','-','0','0','-',-195000,'-','wtl','202cb962ac59075b964b07152d234b','-'),(3,'P003','Gunawan Arifin','-','0','0','-',-72500,'-','gunawanarifin','202cb962ac59075b964b07152d234b','-'),(4,'P004','PT. TELADAN LANGGENG JAYA','-','0','0','-',257500,'-','teladanlanggeng','202cb962ac59075b964b07152d234b','-'),(5,'P005','CV. Tiga Tata Niaga','-','0','0','-',485000,'-','Tiga Tata Niaga','202cb962ac59075b964b07152d234b','-'),(6,'P006','Tunai','-','0','0','0',154000,'-','tunai','202cb962ac59075b964b07152d234b','-');

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `pmblId` int(11) NOT NULL AUTO_INCREMENT,
  `pmblNoFaktur` varchar(40) NOT NULL,
  `pmblTanggal` date DEFAULT NULL,
  `pmblSplrId` int(11) NOT NULL,
  `pmblKet` text NOT NULL,
  `pmblTotalBeli` double DEFAULT NULL,
  `pmblSisaBayar` double DEFAULT NULL,
  `pmblUangMuka` double DEFAULT NULL,
  `pmblJatuhTempo` date DEFAULT NULL,
  `pmblDiskon` double DEFAULT NULL,
  `pmblOngkir` double DEFAULT NULL,
  PRIMARY KEY (`pmblId`),
  KEY `FK_pembelian` (`pmblSplrId`),
  CONSTRAINT `FK_pembelian` FOREIGN KEY (`pmblSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pembelian` */

insert  into `pembelian`(`pmblId`,`pmblNoFaktur`,`pmblTanggal`,`pmblSplrId`,`pmblKet`,`pmblTotalBeli`,`pmblSisaBayar`,`pmblUangMuka`,`pmblJatuhTempo`,`pmblDiskon`,`pmblOngkir`) values (1,'011431','2018-10-01',1,'',50500000,0,0,'2018-10-31',0,0),(2,'PJ001811003','2018-10-04',2,'',14400000,0,0,'2018-11-03',0,0),(3,'20-PJ181100357','2018-10-05',3,'',7020000,0,0,'2018-11-04',0,0),(4,'SH00564','2018-10-06',4,'',1350000,1350000,0,'2018-11-05',0,0),(5,'272875','2018-10-17',5,'',8820000,8820000,0,'2018-11-16',0,0),(6,'08765','2018-10-19',6,'',5050000,5050000,0,'2018-11-18',0,0),(7,'\'G9875','2018-10-24',7,'',2380000,2380000,0,'2018-11-23',0,0),(8,'D0765','2018-10-27',8,'',1200000,0,0,'2018-11-26',0,0),(9,'976553','2018-10-30',9,'',5000000,0,0,'2018-11-29',0,0);

/*Table structure for table `pembelian_copy` */

DROP TABLE IF EXISTS `pembelian_copy`;

CREATE TABLE `pembelian_copy` (
  `pmblId` int(11) NOT NULL AUTO_INCREMENT,
  `pmblNoFaktur` varchar(40) NOT NULL,
  `pmblTanggal` date DEFAULT NULL,
  `pmblSplrId` int(11) NOT NULL,
  `pmblKet` text NOT NULL,
  `pmblTotalBeli` double DEFAULT NULL,
  `pmblSisaBayar` double DEFAULT NULL,
  `pmblUangMuka` double DEFAULT NULL,
  `pmblJatuhTempo` date DEFAULT NULL,
  `pmblDiskon` double DEFAULT NULL,
  `pmblOngkir` double DEFAULT NULL,
  PRIMARY KEY (`pmblId`),
  KEY `FK_pembelian` (`pmblSplrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian_copy` */

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `pnjlId` int(11) NOT NULL AUTO_INCREMENT,
  `pnjlNoFaktur` varchar(40) NOT NULL,
  `pnjlTanggal` datetime DEFAULT NULL,
  `pnjlPlgnId` int(11) NOT NULL,
  `pnjlKet` text NOT NULL,
  `pnjlTotalJual` double DEFAULT NULL,
  `pnjlSisaBayar` double DEFAULT NULL,
  `pnjlUangMuka` double DEFAULT NULL,
  `pnjlJatuhTempo` date DEFAULT NULL,
  `pnjlDiskon` double DEFAULT NULL,
  `pnjlOngkir` double DEFAULT NULL,
  PRIMARY KEY (`pnjlId`),
  KEY `FK_penjualan` (`pnjlPlgnId`),
  CONSTRAINT `FK_penjualan` FOREIGN KEY (`pnjlPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `penjualan` */

insert  into `penjualan`(`pnjlId`,`pnjlNoFaktur`,`pnjlTanggal`,`pnjlPlgnId`,`pnjlKet`,`pnjlTotalJual`,`pnjlSisaBayar`,`pnjlUangMuka`,`pnjlJatuhTempo`,`pnjlDiskon`,`pnjlOngkir`) values (1,'PJ11180001','2018-10-02 00:00:00',1,'',110000,110000,0,'2018-11-01',NULL,NULL),(2,'PJ11180002','2018-10-10 00:00:00',2,'',150000,0,150000,'2018-11-09',NULL,NULL),(3,'PJ11180003','2018-10-13 00:00:00',3,'',72500,0,0,'2018-11-12',NULL,NULL),(4,'PJ11180004','2018-10-18 00:00:00',4,'',257500,257500,0,'2018-11-17',NULL,NULL),(5,'PJ11180005','2018-10-20 00:00:00',5,'',391000,485000,391000,'2018-11-19',NULL,NULL),(6,'PJ11180006','2018-10-25 00:00:00',6,'',154000,154000,0,'2018-11-24',NULL,NULL);

/*Table structure for table `piutang` */

DROP TABLE IF EXISTS `piutang`;

CREATE TABLE `piutang` (
  `ptngId` int(11) NOT NULL AUTO_INCREMENT,
  `ptngTanggal` date DEFAULT NULL,
  `ptngPlgnId` int(11) NOT NULL,
  `ptngNoFaktur` varchar(15) NOT NULL,
  `ptngKet` text,
  `ptngAwal` double DEFAULT NULL,
  `ptngDebet` double NOT NULL,
  `ptngKredit` double NOT NULL,
  `ptngAkhir` double NOT NULL,
  PRIMARY KEY (`ptngId`),
  KEY `FK_piutang` (`ptngPlgnId`),
  CONSTRAINT `FK_piutang` FOREIGN KEY (`ptngPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `piutang` */

insert  into `piutang`(`ptngId`,`ptngTanggal`,`ptngPlgnId`,`ptngNoFaktur`,`ptngKet`,`ptngAwal`,`ptngDebet`,`ptngKredit`,`ptngAkhir`) values (1,'2018-10-18',4,'PJ11180004','Penjualan Barang',0,257500,0,257500),(2,'2018-10-20',5,'PJ11180005','Penjualan Barang',0,485000,0,485000),(3,'2018-10-25',6,'PJ11180006','Penjualan Barang',0,154000,0,154000),(4,'1970-01-01',2,'RJ11180001','Retur Penjualan Kredit',0,45000,45000,0),(5,'1970-01-01',5,'RJ11180002','Retur Penjualan Kredit',485000,0,94000,391000),(6,'2018-10-12',2,'BP11180001','Pembayaran Piutang',0,195000,195000,0),(7,'2018-10-15',3,'BP11180002','Pembayaran Piutang',0,72500,72500,0);

/*Table structure for table `returpembelian` */

DROP TABLE IF EXISTS `returpembelian`;

CREATE TABLE `returpembelian` (
  `rtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpbNoFaktur` varchar(40) NOT NULL,
  `rtpbTanggal` datetime DEFAULT NULL,
  `rtpbPmblId` int(11) NOT NULL,
  `rtpbSplrId` int(11) DEFAULT NULL,
  `rtpbKet` text NOT NULL,
  `rtpbNilai` double DEFAULT NULL,
  `rtpbStatus` enum('T','K') DEFAULT NULL,
  PRIMARY KEY (`rtpbId`),
  KEY `FK_returpembelian1` (`rtpbPmblId`),
  CONSTRAINT `FK_returpembelian1` FOREIGN KEY (`rtpbPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `returpembelian` */

insert  into `returpembelian`(`rtpbId`,`rtpbNoFaktur`,`rtpbTanggal`,`rtpbPmblId`,`rtpbSplrId`,`rtpbKet`,`rtpbNilai`,`rtpbStatus`) values (1,'RB11180001','1970-01-01 00:00:00',1,1,'',500000,'K'),(2,'RB11180002','1970-01-01 00:00:00',4,4,'',45000,'K');

/*Table structure for table `returpenjualan` */

DROP TABLE IF EXISTS `returpenjualan`;

CREATE TABLE `returpenjualan` (
  `rtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpjNoFaktur` varchar(40) NOT NULL,
  `rtpjTanggal` datetime DEFAULT NULL,
  `rtpjPnjlId` int(11) NOT NULL,
  `rtpjPlgnId` int(11) DEFAULT NULL,
  `rtpjKet` text NOT NULL,
  `rtpjNilai` double DEFAULT NULL,
  `rtpjStatus` enum('T','K') DEFAULT NULL,
  PRIMARY KEY (`rtpjId`),
  KEY `FK_returpenjualan1` (`rtpjPnjlId`),
  CONSTRAINT `FK_returpenjualan1` FOREIGN KEY (`rtpjPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `returpenjualan` */

insert  into `returpenjualan`(`rtpjId`,`rtpjNoFaktur`,`rtpjTanggal`,`rtpjPnjlId`,`rtpjPlgnId`,`rtpjKet`,`rtpjNilai`,`rtpjStatus`) values (1,'RJ11180001','1970-01-01 00:00:00',2,2,'',45000,'K'),(2,'RJ11180002','1970-01-01 00:00:00',5,5,'',94000,'K');

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `stunId` int(11) NOT NULL AUTO_INCREMENT,
  `stunNama` varchar(40) NOT NULL,
  `stunSimbol` varchar(20) NOT NULL,
  PRIMARY KEY (`stunId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `satuan` */

insert  into `satuan`(`stunId`,`stunNama`,`stunSimbol`) values (1,'Unit','Unit'),(2,'Kilogram','Kg');

/*Table structure for table `stok` */

DROP TABLE IF EXISTS `stok`;

CREATE TABLE `stok` (
  `stokId` int(11) NOT NULL AUTO_INCREMENT,
  `stokTanggal` date DEFAULT NULL,
  `stokBrngId` int(11) NOT NULL,
  `stokNoFaktur` varchar(15) NOT NULL,
  `stokKet` text,
  `stokAwal` int(11) DEFAULT NULL,
  `stokMasuk` int(11) NOT NULL,
  `stokKeluar` int(11) NOT NULL,
  `stokAkhir` int(11) NOT NULL,
  PRIMARY KEY (`stokId`),
  KEY `FK_stok` (`stokBrngId`),
  CONSTRAINT `FK_stok` FOREIGN KEY (`stokBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `stok` */

insert  into `stok`(`stokId`,`stokTanggal`,`stokBrngId`,`stokNoFaktur`,`stokKet`,`stokAwal`,`stokMasuk`,`stokKeluar`,`stokAkhir`) values (1,'2018-10-18',14,'PJ11180004','Penjualan Barang',100,0,10,90),(2,'2018-10-18',8,'PJ11180004','Penjualan Barang',10,0,5,5),(3,'2018-10-20',12,'PJ11180005','Penjualan Barang',46,0,10,36),(4,'2018-10-20',15,'PJ11180005','Penjualan Barang',1000,0,10,990),(5,'2018-10-20',5,'PJ11180005','Penjualan Barang',120,0,3,117),(6,'2018-10-20',6,'PJ11180005','Penjualan Barang',60,0,2,58),(7,'2018-10-25',13,'PJ11180006','Penjualan Barang',40,0,1,39),(8,'2018-10-25',12,'PJ11180006','Penjualan Barang',36,0,4,32),(9,'2018-10-25',15,'PJ11180006','Penjualan Barang',990,0,10,980);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `splrId` int(11) NOT NULL AUTO_INCREMENT,
  `splrKode` varchar(10) NOT NULL,
  `splrNama` varchar(50) NOT NULL,
  `splrAlamat` text,
  `splrTelp1` varchar(12) DEFAULT NULL,
  `splrTelp2` varchar(12) DEFAULT NULL,
  `splrHutang` double DEFAULT NULL,
  PRIMARY KEY (`splrId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `supplier` */

insert  into `supplier`(`splrId`,`splrKode`,`splrNama`,`splrAlamat`,`splrTelp1`,`splrTelp2`,`splrHutang`) values (1,'S001','Mitra Mandiri Motor','-','0','0',-50500000),(2,'S002','Autochem','-','0','0',-14400000),(3,'S003','PT. Dirgaputra Ekapratama','-','0','0',-7020000),(4,'S004','Sinar Harapan','-','0','0',0),(5,'S005','Lautan Berlian','-','0','0',0),(6,'S006','Global Auto','-','0','0',0),(7,'S007','Specia','-','0','0',0),(8,'S008','OHK','-','0','0',-1200000),(9,'S009','Timur Raya','-','0','0',-5000000);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(20) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  `userHakAkses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userId`,`userNama`,`userPassword`,`userHakAkses`) values (25,'gudang','gudang','Gudang'),(26,'penjualan','penjualan','Penjualan'),(27,'keuangan','keuangan','Keuangan'),(28,'pimpinan','pimpinan','Pimpinan'),(29,'pembelian','pembelian','Pembelian');

/* Trigger structure for table `bayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_bayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_bayarpiutang` AFTER INSERT ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       /*set jdata=(select count(*) from cash);
       if jdata=0 then
        set cashawal=0;
       else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashAwal=(select saldo from akun where noakun='1110');
       set cashakhir=cashawal+new.byrpTotalBayar;
       set piutangawal=(select plgnPiutang from pelanggan where plgnId=new.byrpPlgnId);
       set piutangakhir=piutangawal-new.byrpTotalBayar;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.byrpTanggal,new.byrpNoFaktur,'Pembayaran Piutang',cashawal,new.byrpTotalBayar,0,cashakhir);
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
        values(new.byrpTanggal,new.byrpPlgnId,new.byrpNoFaktur,'Pembayaran Piutang',piutangawal,0,new.byrpTotalBayar,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang-new.byrpTotalBayar where plgnId=new.byrpPlgnId;
       update akun set saldo=cashakhir where noakun='1110';
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_bayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_bayarpiutang` AFTER DELETE ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       /*if jdata=0 then
        set cashawal=0;
       else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashAwal=(select saldo from akun where noakun='1110');
       set cashakhir=cashawal-old.byrpTotalBayar;
       set piutangawal=(select plgnPiutang from pelanggan where plgnId=old.byrpPlgnId);
       set piutangakhir=piutangawal+old.byrpTotalBayar;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.byrpTanggal,old.byrpNoFaktur,'Hapus Pembayaran Piutang',cashawal,0,old.byrpTotalBayar,cashakhir);
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
 values(old.byrpTanggal,old.byrpPlgnId,old.byrpNoFaktur,'Hapus Pembayaran Piutang',piutangawal,old.byrpTotalBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang+old.byrpTotalBayar where plgnId=old.byrpPlgnId;
       update akun set saldo=cashakhir where noakun='1110';
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_bayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_bayarutang` AFTER INSERT ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
      declare cashawal double;
      declare cashakhir double;
      declare jdata int;
      set jdata=(select count(*) from cash);
      /*if jdata=0 then
        set cashawal=0;
      else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
      end if;*/
      set cashAwal=(select saldo from akun where noakun='1110');
      set cashakhir=cashawal-new.byruTotalBayar;
      set hutangawal=(select splrHutang from supplier where splrId=new.byruSplrId);
      set hutangakhir=hutangawal-new.byruTotalBayar;
  
      insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.byruTanggal,new.byruNoFaktur,'Bayar Utang',cashawal,0,new.byruTotalBayar,cashakhir);
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir)
        values(new.byruTanggal,new.byruSplrId,new.byruNoFaktur,'Pembayaran Hutang',hutangawal,new.byruTotalBayar,0,hutangakhir);
      update supplier set splrHutang=splrHutang-new.byruTotalBayar where splrId=new.byruSplrId;  
      update akun set saldo=cashakhir where noakun='1110';
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_bayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_bayarutang` AFTER DELETE ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
      declare cashawal double;
      declare cashakhir double;
      declare jdata int;
      set jdata=(select count(*) from cash);
      /*if jdata=0 then
        set cashawal=0;
      else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
      end if;*/
      set cashAwal=(select saldo from akun where noakun='1110');
      set cashakhir=cashawal+old.byruTotalBayar;
      set hutangawal=(select splrHutang from supplier where splrId=old.byruSplrId);
      set hutangakhir=hutangawal+old.byruTotalBayar;
  
      insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.byruTanggal,old.byruNoFaktur,'Hapus Bayar Utang',cashawal,old.byruTotalBayar,0,cashakhir);
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir)
      values(old.byruTanggal,old.byruSplrId,old.byruNoFaktur,'Hapus Pembahayaran Hutang',hutangawal,0,old.byruTotalBayar,hutangakhir);
      update supplier set splrHutang=splrHutang+old.byruTotalBayar where splrId=old.byruSplrId; 
      update akun set saldo=cashakhir where noakun='1110';
    END */$$


DELIMITER ;

/* Trigger structure for table `detbayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detbayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detbayarpiutang` AFTER INSERT ON `detbayarpiutang` FOR EACH ROW BEGIN
     update penjualan set pnjlSisaBayar=pnjlSisaBayar-new.dbypBayar where pnjlId=new.dbypPnjlId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detbayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detbayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detbayarpiutang` AFTER DELETE ON `detbayarpiutang` FOR EACH ROW BEGIN
	update penjualan set pnjlSisaBayar=pnjlSisaBayar+old.dbypBayar where pnjlId=old.dbypPnjlId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detbayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detbayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detbayarutang` AFTER INSERT ON `detbayarutang` FOR EACH ROW BEGIN
	update pembelian set pmblSisaBayar=pmblSisaBayar-new.dbyuBayar where pmblId=new.dbyuPmblId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detbayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detbayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detbayarutang` AFTER DELETE ON `detbayarutang` FOR EACH ROW BEGIN
      update pembelian set pmblSisaBayar=pmblSisaBayar+old.dbyuBayar where pmblId=old.dbyuPmblId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detpembelian` AFTER INSERT ON `detpembelian` FOR EACH ROW BEGIN
     declare stokawal int;
     declare stokakhir int;
     declare tanggal date;
     declare nofaktur varchar(100);
     set stokawal=(select brngStokAkhir from barang where brngId=new.dtpbBrngId);
     set stokakhir=stokawal+new.dtpbJumlah;
     set tanggal=(select pmblTanggal from pembelian where pmblId=new.dtpbPmblId );
     set nofaktur=(select pmblNoFaktur from pembelian where pmblId=new.dtpbPmblId );
     insert into stok(stokTanggal,stokBrngId,stokNoFaktur,stokKet,stokAwal,stokMasuk,stokKeluar,stokAkhir) values(tanggal,new.dtpbBrngId,nofaktur,'Pembelian Barang',stokawal,new.dtpbJumlah,0,stokakhir);
     update barang set brngStokAkhir=brngStokAkhir+new.dtpbJumlah where brngId=new.dtpbBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detpembelian` AFTER DELETE ON `detpembelian` FOR EACH ROW BEGIN
     declare stokawal int;
     declare stokakhir int;
     declare tanggal date;
     declare nofaktur varchar(100);
     set stokawal=(select brngStokAkhir from barang where brngId=old.dtpbBrngId);
     set stokakhir=stokawal-old.dtpbJumlah;
     set tanggal=(select pmblTanggal from pembelian where pmblId=old.dtpbPmblId );
     set nofaktur=(select pmblNoFaktur from pembelian where pmblId=old.dtpbPmblId );
     insert into stok(stokTanggal,stokBrngId,stokNoFaktur,stokKet,stokAwal,stokMasuk,stokKeluar,stokAkhir) values(tanggal,old.dtpbBrngId,nofaktur,'Hapus Pembelian Barang',stokawal,0,old.dtpbJumlah,stokakhir);
     update barang set brngStokAkhir=brngStokAkhir-old.dtpbJumlah where brngId=old.dtpbBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detpenjualan` AFTER INSERT ON `detpenjualan` FOR EACH ROW BEGIN
     declare stokawal int;
     declare stokakhir int;
     declare tanggal date;
     declare nofaktur varchar(100);
     set stokawal=(select brngStokAkhir from barang where brngId=new.dtpjBrngId);
     set stokakhir=stokawal-new.dtpjJumlah;
     set tanggal=(select pnjlTanggal from penjualan where pnjlId=new.dtpjPnjlId);
     set nofaktur=(select pnjlNoFaktur from penjualan where pnjlId=new.dtpjPnjlId);
     insert into stok(stokTanggal,stokBrngId,stokNoFaktur,stokKet,stokAwal,stokMasuk,stokKeluar,stokAkhir) values(tanggal,new.dtpjBrngId,nofaktur,'Penjualan Barang',stokawal,0,new.dtpjJumlah,stokakhir);
     update barang set brngStokAkhir=brngStokAkhir-new.dtpjJumlah where brngId=new.dtpjBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detpenjualan` AFTER DELETE ON `detpenjualan` FOR EACH ROW BEGIN
     declare stokawal int;
     declare stokakhir int;
     declare tanggal date;
     declare nofaktur varchar(100);
     set stokawal=(select brngStokAkhir from barang where brngId=old.dtpjBrngId);
     set stokakhir=stokawal+old.dtpjJumlah;
     set tanggal=(select pnjlTanggal from penjualan where pnjlId=old.dtpjPnjlId);
     set nofaktur=(select pnjlNoFaktur from penjualan where pnjlId=old.dtpjPnjlId);
     insert into stok(stokTanggal,stokBrngId,stokNoFaktur,stokKet,stokAwal,stokMasuk,stokKeluar,stokAkhir) values(tanggal,old.dtpjBrngId,nofaktur,'Hapus Penjualan Barang',stokawal,old.dtpjJumlah,0,stokakhir);
     update barang set brngStokAkhir=brngStokAkhir-old.dtpjJumlah where brngId=old.dtpjBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detreturpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detreturpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detreturpembelian` AFTER INSERT ON `detreturpembelian` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir-new.drpbJumlah
        where brngId=new.drpbBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detreturpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detreturpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detreturpembelian` AFTER DELETE ON `detreturpembelian` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir+old.drpbJumlah
        where brngId=old.drpbBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detreturpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_detreturpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_detreturpenjualan` AFTER INSERT ON `detreturpenjualan` FOR EACH ROW BEGIN
     update barang set brngStokAkhir=brngStokAkhir+new.drpjJumlah
        where brngId=new.drpjBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `detreturpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_detreturpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_detreturpenjualan` AFTER DELETE ON `detreturpenjualan` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir-old.drpjJumlah
        where brngId=old.drpjBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `pembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_pembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_pembelian` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
     /* pmblSisaBayar*/
     if new.pmblSisaBayar>0 then
     begin  
       declare hutangawal double;
       declare hutangakhir double;
       
       set hutangawal=(select splrHutang from supplier where splrId=new.pmblSplrId);
       set hutangakhir=hutangawal+new.pmblSisaBayar;
  
       insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) 
	values(new.pmblTanggal,new.pmblSplrId,new.pmblNoFaktur,'Pembelian Barang',hutangawal,0,new.pmblSisaBayar,hutangakhir);
       update supplier set splrHutang=splrHutang+new.pmblSisaBayar where splrId=new.pmblSplrId;
     end;
     elseif new.pmblSisaBayar=0 then
     begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       
       set cashAwal=(select saldo from akun where noakun='1110');
       /*set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashakhir=cashawal-new.pmblUangMuka;
       
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.pmblTanggal,new.pmblNoFaktur,'Pembelian Barang dengan Tunai',cashawal,0,new.pmblUangMuka,cashakhir);
       update akun set saldo=cashakhir where noakun='1110';
     end;
     end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `pembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_pembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_pembelian` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
      if old.pmblSisaBayar>0 then
      begin
        declare hutangawal double;
        declare hutangakhir double;
       
        set hutangawal=(select splrHutang from supplier where splrId=old.pmblSplrId);
        set hutangakhir=hutangawal-old.pmblSisaBayar;
        insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) 
         values(old.pmblTanggal,old.pmblSplrId,old.pmblNoFaktur,'Hapus Pembelian Barang',hutangawal,old.pmblSisaBayar,0,hutangakhir);
        update supplier set splrHutang=splrHutang-old.pmblSisaBayar where splrId=old.pmblSplrId;
      end;
      elseif old.pmblSisaBayar=0 then
      begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set cashAwal=(select saldo from akun where noakun='1110');
       /*set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashakhir=cashawal+old.pmblUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.pmblTanggal,old.pmblNoFaktur,'Hapus Pembelian Barang dengan Tunai',cashawal,old.pmblUangMuka,0,cashakhir);
       update akun set saldo=cashakhir where noakun='1110';
      end;
      end if;
	
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_penjualan` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
     if new.pnjlSisaBayar>0 then
     begin  
       declare piutangawal double;
       declare piutangakhir double;
       
       set piutangawal=(select plgnPiutang from pelanggan where plgnId=new.pnjlPlgnId);
       set piutangakhir=piutangawal+new.pnjlSisaBayar;
  
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
       values(new.pnjlTanggal,new.pnjlPlgnId,new.pnjlNoFaktur,'Penjualan Barang',piutangawal,new.pnjlSisaBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=piutangakhir where plgnId=new.pnjlPlgnId;
     end;
     elseif new.pnjlSisaBayar=0 then
     begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       /*set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashAwal=(select saldo from akun where noakun='1110');
       set cashakhir=cashawal+new.pnjlUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.pnjlTanggal,new.pnjlNoFaktur,'Penjualan Barang dengan Tunai',cashawal,new.pnjlUangMuka,0,cashakhir);
       update akun set saldo=cashakhir where noakun='1110';
     end;
     end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
     if old.pnjlSisaBayar>0 then
     begin  
      declare piutangawal double;
      declare piutangakhir double;
       
      set piutangawal=(select plgnPiutang from pelanggan where plgnId=old.pnjlPlgnId);
      set piutangakhir=piutangawal-old.pnjlSisaBayar;
  
      insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir) 
      values(old.pnjlTanggal,old.pnjlPlgnId,old.pnjlNoFaktur,'Hapus Penjualan Barang',piutangawal,0,old.pnjlSisaBayar,piutangakhir);
      update pelanggan set plgnPiutang=plgnPiutang-old.pnjlSisaBayar where plgnId=old.pnjlPlgnId;
     end;
     elseif old.pnjlSisaBayar=0 then
     begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       /*if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;*/
       set cashAwal=(select saldo from akun where noakun='1110');
       set cashakhir=cashawal-old.pnjlUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.pnjlTanggal,old.pnjlNoFaktur,'Hapus Penjualan Barang dengan Tunai',cashawal,0,old.pnjlUangMuka,cashakhir);
       update akun set saldo=cashakhir where noakun='1110';
     end;
     end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `returpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_returpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_returpembelian` AFTER INSERT ON `returpembelian` FOR EACH ROW BEGIN
      if new.rtpbStatus='T' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        /*if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;*/
        set cashAwal=(select saldo from akun where noakun='1110');
        set cashakhir=cashawal+new.rtpbNilai;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=new.rtpbPmblId);
        set totalbeliakhir=totalbeliawal-new.rtpbNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(new.rtpbTanggal,new.rtpbNoFaktur,'Retur Pembelian Kas',cashawal,new.rtpbNilai,0,cashakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=new.rtpbPmblId;
        update akun set saldo=cashakhir where noakun='1110';
      end;
      elseif new.rtpbStatus='K' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare hutangawal double;
        declare hutangakhir double;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=new.rtpbPmblId);
        set totalbeliakhir=totalbeliawal-new.rtpbNilai;
	
       
        set hutangawal=(select splrHutang from supplier where splrId=new.rtpbSplrId);
        set hutangakhir=hutangawal-new.rtpbNilai;
  
        insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) 
	 values(new.rtpbTanggal,new.rtpbSplrId,new.rtpbNoFaktur,'Retur Pembelian Barang',hutangawal,new.rtpbNilai,0,hutangakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=new.rtpbPmblId;
      end;
      end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `returpembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_returpembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_returpembelian` AFTER DELETE ON `returpembelian` FOR EACH ROW BEGIN
     if old.rtpbStatus='T' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        /*if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;*/
        set cashAwal=(select saldo from akun where noakun='1110');
        set cashakhir=cashawal-old.rtpbNilai;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=old.rtpbPmblId);
        set totalbeliakhir=totalbeliawal+old.rtpbNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(old.rtpbTanggal,old.rtpbNoFaktur,'Hapus Retur Pembelian Kas',cashawal,0,old.rtpbNilai,cashakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=old.rtpbPmblId;
        update akun set saldo=cashakhir where noakun='1110';
      end;
      elseif old.rtpbStatus='K' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare hutangawal double;
        declare hutangakhir double;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=old.rtpbPmblId);
        set totalbeliakhir=totalbeliawal+old.rtpbNilai;
	
       
        set hutangawal=(select splrHutang from supplier where splrId=old.rtpbSplrId);
        set hutangakhir=hutangawal+old.rtpbNilai;
  
        insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) 
	 values(old.rtpbTanggal,old.rtpbSplrId,old.rtpbNoFaktur,'Hapus Retur Pembelian Barang',hutangawal,0,old.rtpbNilai,hutangakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=old.rtpbPmblId;
      end;
      end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `returpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_returpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_returpenjualan` AFTER INSERT ON `returpenjualan` FOR EACH ROW BEGIN
      if new.rtpjStatus='T' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        /*if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;*/
        set cashAwal=(select saldo from akun where noakun='1110');
        set cashakhir=cashawal-new.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=new.rtpjPnjlId);
        set totaljualakhir=totaljualawal-new.rtpjNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(new.rtpjTanggal,new.rtpjNoFaktur,'Retur Penjualan Kas',cashawal,0,new.rtpjNilai,cashakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=new.rtpjPnjlId;
        update akun set saldo=cashakhir where noakun='1110';
      end;
      elseif new.rtpjStatus='K' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare piutangawal double;
        declare piutangakhir double;
        set piutangawal=(select plgnPiutang from pelanggan where plgnId=new.rtpjPlgnId);
        set piutangakhir=piutangawal-new.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=new.rtpjPnjlId);
        set totaljualakhir=totaljualawal-new.rtpjNilai;
        insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
        values(new.rtpjTanggal,new.rtpjPlgnId,new.rtpjNoFaktur,'Retur Penjualan Kredit',piutangawal,0,new.rtpjNilai,piutangakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=new.rtpjPnjlId;
      end;
      end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `returpenjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_returpenjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_returpenjualan` AFTER DELETE ON `returpenjualan` FOR EACH ROW BEGIN
     if old.rtpjStatus='T' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        /*if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;*/
        set cashAwal=(select saldo from akun where noakun='1110');
        set cashakhir=cashawal+old.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=old.rtpjPnjlId);
        set totaljualakhir=totaljualawal+old.rtpjNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(old.rtpjTanggal,old.rtpjNoFaktur,'Retur Penjualan Kas',cashawal,old.rtpjNilai,0,cashakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=old.rtpjPnjlId;
        update akun set saldo=cashakhir where noakun='1110';
      end;
      elseif old.rtpjStatus='K' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare piutangawal double;
        declare piutangakhir double;
        set piutangawal=(select plgnPiutang from pelanggan where plgnId=old.rtpjPlgnId);
        set piutangakhir=piutangawal+old.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=old.rtpjPnjlId);
        set totaljualakhir=totaljualawal+old.rtpjNilai;
        insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
        values(old.rtpjTanggal,old.rtpjPlgnId,old.rtpjNoFaktur,'Retur Penjualan Kredit',piutangawal,old.rtpjNilai,0,piutangakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=old.rtpjPnjlId;
      end;
      end if;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
