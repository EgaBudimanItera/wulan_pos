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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `barang` */

insert  into `barang`(`brngId`,`brngKode`,`brngNama`,`brngStunId`,`brngHpp`,`brngHargaJual`,`brngStokAkhir`) values (1,'B001','Rantai Motor',1,20000,30000,330),(2,'B002','Oli',1,30000,40000,140),(3,'B003','Roda',2,35000,50000,50),(4,'B004','Baut',2,2000,3500,1200);

/*Table structure for table `bayarpiutang` */

DROP TABLE IF EXISTS `bayarpiutang`;

CREATE TABLE `bayarpiutang` (
  `byrpId` int(11) NOT NULL AUTO_INCREMENT,
  `byrpNoFaktur` varchar(20) DEFAULT NULL,
  `byrpPlgnId` int(11) DEFAULT NULL,
  `byrpTanggal` date DEFAULT NULL,
  `byrpTotalBayar` double DEFAULT NULL,
  `byrpKet` text,
  PRIMARY KEY (`byrpId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bayarpiutang` */

/*Table structure for table `bayarutang` */

DROP TABLE IF EXISTS `bayarutang`;

CREATE TABLE `bayarutang` (
  `byruId` int(11) NOT NULL AUTO_INCREMENT,
  `byruNoFaktur` varchar(20) DEFAULT NULL,
  `byruTanggal` date DEFAULT NULL,
  `byruSplrId` int(11) DEFAULT NULL,
  `byruTotalBayar` double DEFAULT NULL,
  `byruKet` text,
  PRIMARY KEY (`byruId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bayarutang` */

/*Table structure for table `detbayarpiutang` */

DROP TABLE IF EXISTS `detbayarpiutang`;

CREATE TABLE `detbayarpiutang` (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypByrpId` int(11) NOT NULL,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  PRIMARY KEY (`dbypId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detbayarpiutang` */

/*Table structure for table `detbayarpiutang_temp` */

DROP TABLE IF EXISTS `detbayarpiutang_temp`;

CREATE TABLE `detbayarpiutang_temp` (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  `dbypCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dbypId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detbayarpiutang_temp` */

/*Table structure for table `detbayarutang` */

DROP TABLE IF EXISTS `detbayarutang`;

CREATE TABLE `detbayarutang` (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuByruId` int(11) NOT NULL,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  PRIMARY KEY (`dbyuId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detbayarutang` */

/*Table structure for table `detbayarutang_temp` */

DROP TABLE IF EXISTS `detbayarutang_temp`;

CREATE TABLE `detbayarutang_temp` (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  `dbyuCreatedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dbyuId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detbayarutang_temp` */

/*Table structure for table `detpembelian` */

DROP TABLE IF EXISTS `detpembelian`;

CREATE TABLE `detpembelian` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbPmblId` int(11) NOT NULL,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  `dtpbDiskon` double DEFAULT '0',
  PRIMARY KEY (`dtpbId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detpembelian` */

insert  into `detpembelian`(`dtpbId`,`dtpbPmblId`,`dtpbBrngId`,`dtpbJumlah`,`dtpbHarga`,`dtpbDiskon`) values (1,1,1,200,20000,0),(2,1,2,100,30000,0),(3,1,3,20,35000,0),(4,1,4,200,2000,0),(5,2,1,100,20000,0);

/*Table structure for table `detpembelian_temp` */

DROP TABLE IF EXISTS `detpembelian_temp`;

CREATE TABLE `detpembelian_temp` (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double DEFAULT NULL,
  `dtpbDiskon` double DEFAULT '0',
  `dtpbCreatedBy` varchar(50) DEFAULT 'admin',
  PRIMARY KEY (`dtpbId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `htngSplrId` int(11) NOT NULL,
  `htngNoFaktur` varchar(15) NOT NULL,
  `htngKet` text,
  `htngAwal` double DEFAULT NULL,
  `htngDebet` double NOT NULL,
  `htngKredit` double NOT NULL,
  `htngAkhir` double NOT NULL,
  PRIMARY KEY (`htngId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hutang` */

insert  into `hutang`(`htngId`,`htngTanggal`,`htngSplrId`,`htngNoFaktur`,`htngKet`,`htngAwal`,`htngDebet`,`htngKredit`,`htngAkhir`) values (1,'2018-08-05',2,'T001-02-099','Pembelian Barang',0,0,4000000,4000000),(2,'2018-08-24',2,'a','Pembelian Barang',4000000,0,2000000,6000000);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`plgnId`,`plgnKode`,`plgnNama`,`plgnNamaKontak`,`plgnTelp1`,`plgnTelp2`,`plgnAlamat`,`plgnPiutang`) values (1,'P001','Non Tetap','-','000','000','-',0),(2,'P002','CV Aqila','ibu Aqila','08570000','000000','Jalan Malabar',0),(3,'P003','PT Buruh','Bapak Diki','08550000','000000','Jalan Alam Elok',0);

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
  PRIMARY KEY (`pmblId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pembelian` */

insert  into `pembelian`(`pmblId`,`pmblNoFaktur`,`pmblTanggal`,`pmblSplrId`,`pmblKet`,`pmblTotalBeli`,`pmblSisaBayar`,`pmblUangMuka`,`pmblJatuhTempo`,`pmblDiskon`,`pmblOngkir`) values (1,'T001-02-099','2018-08-05',2,'Beli untuk Modal',8100000,4000000,4000000,'2018-09-04',100000,0),(2,'a','2018-08-24',2,'aa',2000000,2000000,0,'2018-09-23',0,0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `piutang` */

/*Table structure for table `returpembelian` */

DROP TABLE IF EXISTS `returpembelian`;

CREATE TABLE `returpembelian` (
  `rtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpbNoFaktur` varchar(40) NOT NULL,
  `rtpbTanggal` datetime DEFAULT NULL,
  `rtpbPmblId` int(11) NOT NULL,
  `rtpbKet` text NOT NULL,
  `rtpbNilai` double DEFAULT NULL,
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
  `rtpjNilai` double DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `satuan` */

insert  into `satuan`(`stunId`,`stunNama`,`stunSimbol`) values (1,'Buah','Bh'),(2,'Unit','Unit'),(3,'Kilogram','Kg'),(4,'Meter','m'),(5,'Paket','Pak');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `stok` */

insert  into `stok`(`stokId`,`stokTanggal`,`stokBrngId`,`stokNoFaktur`,`stokKet`,`stokAwal`,`stokMasuk`,`stokKeluar`,`stokAkhir`) values (1,'2018-08-05',1,'T001-02-099','Pembelian Barang',30,200,0,230),(2,'2018-08-05',2,'T001-02-099','Pembelian Barang',40,100,0,140),(3,'2018-08-05',3,'T001-02-099','Pembelian Barang',30,20,0,50),(4,'2018-08-05',4,'T001-02-099','Pembelian Barang',1000,200,0,1200),(0,'2018-08-24',1,'a','Pembelian Barang',230,100,0,330);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `supplier` */

insert  into `supplier`(`splrId`,`splrKode`,`splrNama`,`splrAlamat`,`splrTelp1`,`splrTelp2`,`splrHutang`) values (1,'S001','Toko Ahmad','Jalan Tikur','09888','000',0),(2,'S002','PT Abadi','Jalan Damar','00999','0990',6000000);

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

/* Trigger structure for table `bayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_bayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_bayarpiutang` AFTER INSERT ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=new.byrpPlgnId);
       set piutangakhir=piutangawal-new.byrpTotalBayar;
  
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit) values(new.byrpTanggal,new.byrpPlgnId,new.byrpNoFaktur,'Pembayaran Piutang',piutangawal,0,new.byrpTotalBayar,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang-new.byrpTotalBayar where plgnId=new.byrpPlgnId;
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarpiutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_bayarpiutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_bayarpiutang` AFTER DELETE ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=old.byrpPlgnId);
       set piutangakhir=piutangawal+old.byrpTotalBayar;
  
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit) values(old.byrpTanggal,old.byrpPlgnId,old.byrpNoFaktur,'Hapus Pembayaran Piutang',piutangawal,old.byrpTotalBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang+old.byrpTotalBayar where plgnId=old.byrpPlgnId;
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `insert_bayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `insert_bayarutang` AFTER INSERT ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
       
      set hutangawal=(select splrHutang from supplier where splrId=new.byruSplrId);
      set hutangakhir=hutangawal-new.byruTotalBayar;
  
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) values(new.byruTanggal,new.byruSplrId,new.byruNoFaktur,'Pembahayaran Hutang',hutangawal,new.byruTotalBayar,0,hutangakhir);
      update supplier set splrHutang=splrHutang-new.byruTotalBayar where splrId=new.byruSplrId;  
    END */$$


DELIMITER ;

/* Trigger structure for table `bayarutang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_bayarutang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_bayarutang` AFTER DELETE ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
       
      set hutangawal=(select splrHutang from supplier where splrId=old.byruSplrId);
      set hutangakhir=hutangawal+old.byruTotalBayar;
  
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir)
      values(old.byruTanggal,old.byruSplrId,old.byruNoFaktur,'Hapus Pembahayaran Hutang',hutangawal,0,old.byruTotalBayar,hutangakhir);
      update supplier set splrHutang=splrHutang+oldbyruTotalBayar where splrId=old.byruSplrId; 
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
     end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `pembelian` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_pembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_pembelian` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
       
      set hutangawal=(select splrHutang from supplier where splrId=old.pmblSplrId);
      set hutangakhir=hutangawal-old.pmblSisaBayar;
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir) 
      values(old.pmblTanggal,old.pmblSplrId,old.pmblNoFaktur,'Hapus Pembelian Barang',hutangawal,old.pmblSisaBayar,0,hutangakhir);
      update supplier set splrHutang=splrHutang-old.pmblSisaBayar where splrId=old.pmblSplrId;
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
       
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=new.pnjlPlgnId);
       set piutangakhir=piutangawal+new.pnjlSisaBayar;
  
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit) values(new.pnjlTanggal,new.pnjlPlgnId,new.pnjlNoFaktur,'Penjualan Barang',piutangawal,new.pnjlSisaBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang+new.pnjlSisaBayar where plgnId=new.pnjlPlgnId;
     end;
     end if;
    END */$$


DELIMITER ;

/* Trigger structure for table `penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_penjualan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
      declare piutangawal double;
      declare piutangakhir double;
       
      set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=old.pnjlPlgnId);
      set piutangakhir=piutangawal-old.pnjlSisaBayar;
  
      insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit) values(old.pnjlTanggal,old.pnjlPlgnId,old.pnjlNoFaktur,'Hapus Penjualan Barang',piutangawal,0,old.pnjlSisaBayar,piutangakhir);
      update pelanggan set plgnPiutang=plgnPiutang-old.pnjlSisaBayar where plgnId=old.pnjlPlgnId;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
