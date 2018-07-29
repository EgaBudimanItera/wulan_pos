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
  PRIMARY KEY (`brngId`),
  KEY `brngId` (`brngId`),
  KEY `FK_barang` (`brngStunId`)
) ENGINE=MyISAM AUTO_INCREMENT=494 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `barang` */

/*Table structure for table `detpembelian` */

DROP TABLE IF EXISTS `detpembelian`;

CREATE TABLE `detpembelian` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbPmblId` int(11) NOT NULL,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  PRIMARY KEY (`dtpbId`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpembelian` */

insert  into `detpembelian`(`dtpbId`,`dtpbPmblId`,`dtpbBrngId`,`dtpbJumlah`,`dtpbHarga`) values (65,5,1,100,10);

/*Table structure for table `detpembelian_temp` */

DROP TABLE IF EXISTS `detpembelian_temp`;

CREATE TABLE `detpembelian_temp` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  `dtpbCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dtpbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detpembelian_temp` */

/*Table structure for table `detpenjualan` */

DROP TABLE IF EXISTS `detpenjualan`;

CREATE TABLE `detpenjualan` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjPnjlId` int(11) NOT NULL,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  PRIMARY KEY (`dtpjId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detpenjualan` */

/*Table structure for table `detpenjualan_temp` */

DROP TABLE IF EXISTS `detpenjualan_temp`;

CREATE TABLE `detpenjualan_temp` (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double DEFAULT NULL,
  `dtpjCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dtpjId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detpenjualan_temp` */

/*Table structure for table `detreturpembelian` */

DROP TABLE IF EXISTS `detreturpembelian`;

CREATE TABLE `detreturpembelian` (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbRtpbId` int(11) NOT NULL,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  PRIMARY KEY (`drpbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detreturpembelian` */

/*Table structure for table `detreturpembelian_temp` */

DROP TABLE IF EXISTS `detreturpembelian_temp`;

CREATE TABLE `detreturpembelian_temp` (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  `drpbPmblId` int(11) DEFAULT NULL,
  `drpbCreatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`drpbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detreturpembelian_temp` */

/*Table structure for table `detreturpenjualan` */

DROP TABLE IF EXISTS `detreturpenjualan`;

CREATE TABLE `detreturpenjualan` (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjRtpjId` int(11) NOT NULL,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  PRIMARY KEY (`drpjId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detreturpenjualan` */

/*Table structure for table `detreturpenjualan_temp` */

DROP TABLE IF EXISTS `detreturpenjualan_temp`;

CREATE TABLE `detreturpenjualan_temp` (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  `drpjPnjlId` int(11) DEFAULT NULL,
  `drpjCreatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`drpjId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detreturpenjualan_temp` */

/*Table structure for table `hutang` */

DROP TABLE IF EXISTS `hutang`;

CREATE TABLE `hutang` (
  `htngId` int(11) NOT NULL AUTO_INCREMENT,
  `htngTanggal` date DEFAULT NULL,
  `htngPlgnId` int(11) NOT NULL,
  `htngNoFaktur` varchar(15) NOT NULL,
  `htngKet` text,
  `htngAwal` double DEFAULT NULL,
  `htngDebet` double NOT NULL,
  `htngKredit` double NOT NULL,
  `htngAkhir` double NOT NULL,
  PRIMARY KEY (`htngId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hutang` */

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
  PRIMARY KEY (`plgnId`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pelanggan` */

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
  PRIMARY KEY (`pmblId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pembelian` */

insert  into `pembelian`(`pmblId`,`pmblNoFaktur`,`pmblTanggal`,`pmblSplrId`,`pmblKet`,`pmblTotalBeli`,`pmblSisaBayar`,`pmblUangMuka`,`pmblJatuhTempo`) values (5,'B001','2018-07-28',0,'a',1000,1000,0,'2018-08-28');

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
  PRIMARY KEY (`pnjlId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

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
  PRIMARY KEY (`ptngId`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `piutang` */

/*Table structure for table `returpembelian` */

DROP TABLE IF EXISTS `returpembelian`;

CREATE TABLE `returpembelian` (
  `rtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpbNoFaktur` varchar(40) NOT NULL,
  `rtpbTanggal` datetime DEFAULT NULL,
  `rtpbPmblId` int(11) NOT NULL,
  `rtpbKet` text NOT NULL,
  PRIMARY KEY (`rtpbId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `returpembelian` */

/*Table structure for table `returpenjualan` */

DROP TABLE IF EXISTS `returpenjualan`;

CREATE TABLE `returpenjualan` (
  `rtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpjNoFaktur` varchar(40) NOT NULL,
  `rtpjTanggal` datetime DEFAULT NULL,
  `rtpjPnjlId` int(11) NOT NULL,
  `rtpjKet` text NOT NULL,
  PRIMARY KEY (`rtpjId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `returpenjualan` */

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `stunId` int(11) NOT NULL AUTO_INCREMENT,
  `stunNama` varchar(40) NOT NULL,
  `stunSimbol` varchar(20) NOT NULL,
  PRIMARY KEY (`stunId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `satuan` */

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
  PRIMARY KEY (`stokId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `stok` */

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `supplier` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(20) DEFAULT NULL,
  `userPassword` varchar(30) DEFAULT NULL,
  `userHakAkses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
