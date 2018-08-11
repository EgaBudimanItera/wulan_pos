/*
 Navicat Premium Data Transfer

 Source Server         : lokal
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : wulan_simpos

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 11/08/2018 23:19:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `brngId` int(11) NOT NULL AUTO_INCREMENT,
  `brngKode` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `brngNama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `brngStunId` int(11) NOT NULL,
  `brngHpp` double NOT NULL DEFAULT 0,
  `brngHargaJual` double NOT NULL DEFAULT 0,
  `brngStokAkhir` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`brngId`) USING BTREE,
  INDEX `brngId`(`brngId`) USING BTREE,
  INDEX `FK_barang`(`brngStunId`) USING BTREE,
  CONSTRAINT `FK_barang` FOREIGN KEY (`brngStunId`) REFERENCES `satuan` (`stunId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (1, 'B001', 'Rantai Motor', 1, 20000, 30000, 332);
INSERT INTO `barang` VALUES (2, 'B002', 'Oli', 1, 30000, 40000, 140);
INSERT INTO `barang` VALUES (3, 'B003', 'Roda', 2, 35000, 50000, 50);
INSERT INTO `barang` VALUES (4, 'B004', 'Baut', 2, 2000, 3500, 1200);

-- ----------------------------
-- Table structure for bayarpiutang
-- ----------------------------
DROP TABLE IF EXISTS `bayarpiutang`;
CREATE TABLE `bayarpiutang`  (
  `byrpId` int(11) NOT NULL AUTO_INCREMENT,
  `byrpNoFaktur` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `byrpPlgnId` int(11) NULL DEFAULT NULL,
  `byrpTanggal` date NULL DEFAULT NULL,
  `byrpTotalBayar` double NULL DEFAULT NULL,
  `byrpKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`byrpId`) USING BTREE,
  INDEX `FK_bayarpiutang`(`byrpPlgnId`) USING BTREE,
  CONSTRAINT `FK_bayarpiutang` FOREIGN KEY (`byrpPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for bayarutang
-- ----------------------------
DROP TABLE IF EXISTS `bayarutang`;
CREATE TABLE `bayarutang`  (
  `byruId` int(11) NOT NULL AUTO_INCREMENT,
  `byruNoFaktur` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `byruTanggal` date NULL DEFAULT NULL,
  `byruSplrId` int(11) NULL DEFAULT NULL,
  `byruTotalBayar` double NULL DEFAULT NULL,
  `byruKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`byruId`) USING BTREE,
  INDEX `FK_bayarutang`(`byruSplrId`) USING BTREE,
  CONSTRAINT `FK_bayarutang` FOREIGN KEY (`byruSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cash
-- ----------------------------
DROP TABLE IF EXISTS `cash`;
CREATE TABLE `cash`  (
  `cashId` int(11) NOT NULL AUTO_INCREMENT,
  `cashTanggal` date NULL DEFAULT NULL,
  `cashNoFaktur` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cashKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cashAwal` double NULL DEFAULT NULL,
  `cashDebet` double NOT NULL,
  `cashKredit` double NOT NULL,
  `cashAkhir` double NOT NULL,
  PRIMARY KEY (`cashId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for detbayarpiutang
-- ----------------------------
DROP TABLE IF EXISTS `detbayarpiutang`;
CREATE TABLE `detbayarpiutang`  (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypByrpId` int(11) NOT NULL,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  PRIMARY KEY (`dbypId`) USING BTREE,
  INDEX `FK_detbayarpiutang`(`dbypByrpId`) USING BTREE,
  CONSTRAINT `FK_detbayarpiutang` FOREIGN KEY (`dbypByrpId`) REFERENCES `bayarpiutang` (`byrpId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detbayarpiutang_temp
-- ----------------------------
DROP TABLE IF EXISTS `detbayarpiutang_temp`;
CREATE TABLE `detbayarpiutang_temp`  (
  `dbypId` int(11) NOT NULL AUTO_INCREMENT,
  `dbypPnjlId` int(11) NOT NULL,
  `dbypBayar` double NOT NULL,
  `dbypCreatedBy` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dbypId`) USING BTREE,
  INDEX `FK_detbayarpiutang_temp`(`dbypPnjlId`) USING BTREE,
  CONSTRAINT `FK_detbayarpiutang_temp` FOREIGN KEY (`dbypPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detbayarutang
-- ----------------------------
DROP TABLE IF EXISTS `detbayarutang`;
CREATE TABLE `detbayarutang`  (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuByruId` int(11) NOT NULL,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  PRIMARY KEY (`dbyuId`) USING BTREE,
  INDEX `FK_detbayarutang`(`dbyuByruId`) USING BTREE,
  CONSTRAINT `FK_detbayarutang` FOREIGN KEY (`dbyuByruId`) REFERENCES `bayarutang` (`byruId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detbayarutang_temp
-- ----------------------------
DROP TABLE IF EXISTS `detbayarutang_temp`;
CREATE TABLE `detbayarutang_temp`  (
  `dbyuId` int(11) NOT NULL AUTO_INCREMENT,
  `dbyuPmblId` int(11) NOT NULL,
  `dbyuBayar` double NOT NULL,
  `dbyuCreatedBy` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dbyuId`) USING BTREE,
  INDEX `FK_detbayarutang_temp`(`dbyuPmblId`) USING BTREE,
  CONSTRAINT `FK_detbayarutang_temp` FOREIGN KEY (`dbyuPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detpembelian
-- ----------------------------
DROP TABLE IF EXISTS `detpembelian`;
CREATE TABLE `detpembelian`  (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbPmblId` int(11) NOT NULL,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double NULL DEFAULT NULL,
  `dtpbDiskon` double NULL DEFAULT 0,
  PRIMARY KEY (`dtpbId`) USING BTREE,
  INDEX `FK_detpembelian`(`dtpbBrngId`) USING BTREE,
  INDEX `FK_detpembelian1`(`dtpbPmblId`) USING BTREE,
  CONSTRAINT `FK_detpembelian` FOREIGN KEY (`dtpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detpembelian1` FOREIGN KEY (`dtpbPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detpembelian
-- ----------------------------
INSERT INTO `detpembelian` VALUES (1, 1, 1, 200, 20000, 0);
INSERT INTO `detpembelian` VALUES (2, 1, 2, 100, 30000, 0);
INSERT INTO `detpembelian` VALUES (3, 1, 3, 20, 35000, 0);
INSERT INTO `detpembelian` VALUES (4, 1, 4, 200, 2000, 0);
INSERT INTO `detpembelian` VALUES (5, 2, 1, 100, 20000, 0);
INSERT INTO `detpembelian` VALUES (6, 3, 1, 10, 20000, 0);

-- ----------------------------
-- Table structure for detpembelian_temp
-- ----------------------------
DROP TABLE IF EXISTS `detpembelian_temp`;
CREATE TABLE `detpembelian_temp`  (
  `dtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpbBrngId` int(11) NOT NULL,
  `dtpbJumlah` int(11) NOT NULL,
  `dtpbHarga` double NULL DEFAULT NULL,
  `dtpbDiskon` double NULL DEFAULT 0,
  `dtpbCreatedBy` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'admin',
  PRIMARY KEY (`dtpbId`) USING BTREE,
  INDEX `FK_detpembelian_temp`(`dtpbBrngId`) USING BTREE,
  CONSTRAINT `FK_detpembelian_temp` FOREIGN KEY (`dtpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detpenjualan
-- ----------------------------
DROP TABLE IF EXISTS `detpenjualan`;
CREATE TABLE `detpenjualan`  (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjPnjlId` int(11) NOT NULL,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double NULL DEFAULT NULL,
  `dtpjDiskon` double NULL DEFAULT NULL,
  PRIMARY KEY (`dtpjId`) USING BTREE,
  INDEX `FK_detpenjualan`(`dtpjBrngId`) USING BTREE,
  INDEX `FK_detpenjualan1`(`dtpjPnjlId`) USING BTREE,
  CONSTRAINT `FK_detpenjualan` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detpenjualan1` FOREIGN KEY (`dtpjPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detpenjualan
-- ----------------------------
INSERT INTO `detpenjualan` VALUES (1, 20, 1, 3, 30000, NULL);
INSERT INTO `detpenjualan` VALUES (2, 20, 1, 2, 30000, NULL);
INSERT INTO `detpenjualan` VALUES (3, 20, 1, 3, 30000, NULL);

-- ----------------------------
-- Table structure for detpenjualan_temp
-- ----------------------------
DROP TABLE IF EXISTS `detpenjualan_temp`;
CREATE TABLE `detpenjualan_temp`  (
  `dtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `dtpjBrngId` int(11) NOT NULL,
  `dtpjJumlah` int(11) NOT NULL,
  `dtpjHarga` double NULL DEFAULT NULL,
  `dtpjCreatedBy` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dtpjId`) USING BTREE,
  INDEX `FK_detpenjualan_temp`(`dtpjBrngId`) USING BTREE,
  CONSTRAINT `FK_detpenjualan_temp` FOREIGN KEY (`dtpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detreturpembelian
-- ----------------------------
DROP TABLE IF EXISTS `detreturpembelian`;
CREATE TABLE `detreturpembelian`  (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbRtpbId` int(11) NOT NULL,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  PRIMARY KEY (`drpbId`) USING BTREE,
  INDEX `FK_detreturpembelian`(`drpbBrngId`) USING BTREE,
  INDEX `FK_detreturpembelian1`(`drpbRtpbId`) USING BTREE,
  CONSTRAINT `FK_detreturpembelian` FOREIGN KEY (`drpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detreturpembelian1` FOREIGN KEY (`drpbRtpbId`) REFERENCES `returpembelian` (`rtpbId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detreturpembelian_temp
-- ----------------------------
DROP TABLE IF EXISTS `detreturpembelian_temp`;
CREATE TABLE `detreturpembelian_temp`  (
  `drpbId` int(11) NOT NULL AUTO_INCREMENT,
  `drpbBrngId` int(11) NOT NULL,
  `drpbJumlah` int(11) NOT NULL,
  `drpbPmblId` int(11) NULL DEFAULT NULL,
  `drpbCreatedby` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`drpbId`) USING BTREE,
  INDEX `FK_detreturpembelian_temp`(`drpbBrngId`) USING BTREE,
  CONSTRAINT `FK_detreturpembelian_temp` FOREIGN KEY (`drpbBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detreturpenjualan
-- ----------------------------
DROP TABLE IF EXISTS `detreturpenjualan`;
CREATE TABLE `detreturpenjualan`  (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjRtpjId` int(11) NOT NULL,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  PRIMARY KEY (`drpjId`) USING BTREE,
  INDEX `FK_detreturpenjualan`(`drpjBrngId`) USING BTREE,
  INDEX `FK_detreturpenjualan1`(`drpjRtpjId`) USING BTREE,
  CONSTRAINT `FK_detreturpenjualan` FOREIGN KEY (`drpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detreturpenjualan1` FOREIGN KEY (`drpjRtpjId`) REFERENCES `returpenjualan` (`rtpjId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for detreturpenjualan_temp
-- ----------------------------
DROP TABLE IF EXISTS `detreturpenjualan_temp`;
CREATE TABLE `detreturpenjualan_temp`  (
  `drpjId` int(11) NOT NULL AUTO_INCREMENT,
  `drpjBrngId` int(11) NOT NULL,
  `drpjJumlah` int(11) NOT NULL,
  `drpjPnjlId` int(11) NULL DEFAULT NULL,
  `drpjCreatedby` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`drpjId`) USING BTREE,
  INDEX `FK_detreturpenjualan_temp`(`drpjBrngId`) USING BTREE,
  CONSTRAINT `FK_detreturpenjualan_temp` FOREIGN KEY (`drpjBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hutang
-- ----------------------------
DROP TABLE IF EXISTS `hutang`;
CREATE TABLE `hutang`  (
  `htngId` int(11) NOT NULL AUTO_INCREMENT,
  `htngTanggal` date NULL DEFAULT NULL,
  `htngSplrId` int(11) NOT NULL,
  `htngNoFaktur` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `htngKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `htngAwal` double NULL DEFAULT NULL,
  `htngDebet` double NOT NULL,
  `htngKredit` double NOT NULL,
  `htngAkhir` double NOT NULL,
  PRIMARY KEY (`htngId`) USING BTREE,
  INDEX `FK_hutang`(`htngSplrId`) USING BTREE,
  CONSTRAINT `FK_hutang` FOREIGN KEY (`htngSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hutang
-- ----------------------------
INSERT INTO `hutang` VALUES (1, '2018-08-05', 2, 'T001-02-099', 'Pembelian Barang', 0, 0, 4000000, 4000000);
INSERT INTO `hutang` VALUES (2, '2018-08-24', 2, 'a', 'Pembelian Barang', 4000000, 0, 2000000, 6000000);

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `plgnId` int(11) NOT NULL AUTO_INCREMENT,
  `plgnKode` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plgnNama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plgnNamaKontak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `plgnTelp1` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plgnTelp2` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `plgnAlamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `plgnPiutang` double NULL DEFAULT NULL,
  PRIMARY KEY (`plgnId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 'P001', 'Non Tetap', '-', '000', '000', '-', 0);
INSERT INTO `pelanggan` VALUES (2, 'P002', 'CV Aqila', 'ibu Aqila', '08570000', '000000', 'Jalan Malabar', 390000);
INSERT INTO `pelanggan` VALUES (3, 'P003', 'PT Buruh', 'Bapak Diki', '08550000', '000000', 'Jalan Alam Elok', 0);

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `pmblId` int(11) NOT NULL AUTO_INCREMENT,
  `pmblNoFaktur` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pmblTanggal` date NULL DEFAULT NULL,
  `pmblSplrId` int(11) NOT NULL,
  `pmblKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pmblTotalBeli` double NULL DEFAULT NULL,
  `pmblSisaBayar` double NULL DEFAULT NULL,
  `pmblUangMuka` double NULL DEFAULT NULL,
  `pmblJatuhTempo` date NULL DEFAULT NULL,
  `pmblDiskon` double NULL DEFAULT NULL,
  `pmblOngkir` double NULL DEFAULT NULL,
  PRIMARY KEY (`pmblId`) USING BTREE,
  INDEX `FK_pembelian`(`pmblSplrId`) USING BTREE,
  CONSTRAINT `FK_pembelian` FOREIGN KEY (`pmblSplrId`) REFERENCES `supplier` (`splrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES (1, 'T001-02-099', '2018-08-05', 2, 'Beli untuk Modal', 8100000, 4000000, 4000000, '2018-09-04', 100000, 0);
INSERT INTO `pembelian` VALUES (2, 'a', '2018-08-24', 2, 'aa', 2000000, 2000000, 0, '2018-09-23', 0, 0);
INSERT INTO `pembelian` VALUES (3, 'rrr', '2018-08-11', 1, 'aaa', 200000, 0, 200000, '2018-09-10', 0, 0);

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `pnjlId` int(11) NOT NULL AUTO_INCREMENT,
  `pnjlNoFaktur` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pnjlTanggal` datetime(0) NULL DEFAULT NULL,
  `pnjlPlgnId` int(11) NOT NULL,
  `pnjlKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pnjlTotalJual` double NULL DEFAULT NULL,
  `pnjlSisaBayar` double NULL DEFAULT NULL,
  `pnjlUangMuka` double NULL DEFAULT NULL,
  `pnjlJatuhTempo` date NULL DEFAULT NULL,
  `pnjlDiskon` double NULL DEFAULT NULL,
  `pnjlOngkir` double NULL DEFAULT NULL,
  PRIMARY KEY (`pnjlId`) USING BTREE,
  INDEX `FK_penjualan`(`pnjlPlgnId`) USING BTREE,
  CONSTRAINT `FK_penjualan` FOREIGN KEY (`pnjlPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES (10, '555', '2018-08-07 00:00:00', 2, 'ttt', 150000, 150000, 0, '2018-09-06', NULL, NULL);
INSERT INTO `penjualan` VALUES (20, '4444', '2018-08-11 00:00:00', 2, '44', 240000, 240000, 0, '2018-09-10', NULL, NULL);

-- ----------------------------
-- Table structure for piutang
-- ----------------------------
DROP TABLE IF EXISTS `piutang`;
CREATE TABLE `piutang`  (
  `ptngId` int(11) NOT NULL AUTO_INCREMENT,
  `ptngTanggal` date NULL DEFAULT NULL,
  `ptngPlgnId` int(11) NOT NULL,
  `ptngNoFaktur` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ptngKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ptngAwal` double NULL DEFAULT NULL,
  `ptngDebet` double NOT NULL,
  `ptngKredit` double NOT NULL,
  `ptngAkhir` double NOT NULL,
  PRIMARY KEY (`ptngId`) USING BTREE,
  INDEX `FK_piutang`(`ptngPlgnId`) USING BTREE,
  CONSTRAINT `FK_piutang` FOREIGN KEY (`ptngPlgnId`) REFERENCES `pelanggan` (`plgnId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of piutang
-- ----------------------------
INSERT INTO `piutang` VALUES (5, '2018-08-11', 2, '4444', 'Penjualan Barang', 300000, 240000, 0, 540000);
INSERT INTO `piutang` VALUES (6, '2018-08-11', 2, '4444', 'Penjualan Barang', 540000, 240000, 0, 780000);
INSERT INTO `piutang` VALUES (7, '2018-08-07', 2, '555', 'Hapus Penjualan Barang', 540000, 0, 150000, 390000);
INSERT INTO `piutang` VALUES (8, '2018-08-11', 2, '4444', 'Hapus Penjualan Barang', 780000, 0, 240000, 540000);

-- ----------------------------
-- Table structure for returpembelian
-- ----------------------------
DROP TABLE IF EXISTS `returpembelian`;
CREATE TABLE `returpembelian`  (
  `rtpbId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpbNoFaktur` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rtpbTanggal` datetime(0) NULL DEFAULT NULL,
  `rtpbPmblId` int(11) NOT NULL,
  `rtpbSplrId` int(11) NULL DEFAULT NULL,
  `rtpbKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rtpbNilai` double NULL DEFAULT NULL,
  `rtpbStatus` enum('T','K') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`rtpbId`) USING BTREE,
  INDEX `FK_returpembelian1`(`rtpbPmblId`) USING BTREE,
  CONSTRAINT `FK_returpembelian1` FOREIGN KEY (`rtpbPmblId`) REFERENCES `pembelian` (`pmblId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for returpenjualan
-- ----------------------------
DROP TABLE IF EXISTS `returpenjualan`;
CREATE TABLE `returpenjualan`  (
  `rtpjId` int(11) NOT NULL AUTO_INCREMENT,
  `rtpjNoFaktur` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rtpjTanggal` datetime(0) NULL DEFAULT NULL,
  `rtpjPnjlId` int(11) NOT NULL,
  `rtpjPlgnId` int(11) NULL DEFAULT NULL,
  `rtpjKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rtpjNilai` double NULL DEFAULT NULL,
  `rtpjStatus` enum('T','K') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`rtpjId`) USING BTREE,
  INDEX `FK_returpenjualan1`(`rtpjPnjlId`) USING BTREE,
  CONSTRAINT `FK_returpenjualan1` FOREIGN KEY (`rtpjPnjlId`) REFERENCES `penjualan` (`pnjlId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan`  (
  `stunId` int(11) NOT NULL AUTO_INCREMENT,
  `stunNama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stunSimbol` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`stunId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES (1, 'Buah', 'Bh');
INSERT INTO `satuan` VALUES (2, 'Unit', 'Unit');
INSERT INTO `satuan` VALUES (3, 'Kilogram', 'Kg');
INSERT INTO `satuan` VALUES (4, 'Meter', 'm');
INSERT INTO `satuan` VALUES (5, 'Paket', 'Pak');

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok`  (
  `stokId` int(11) NOT NULL AUTO_INCREMENT,
  `stokTanggal` date NULL DEFAULT NULL,
  `stokBrngId` int(11) NOT NULL,
  `stokNoFaktur` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stokKet` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `stokAwal` int(11) NULL DEFAULT NULL,
  `stokMasuk` int(11) NOT NULL,
  `stokKeluar` int(11) NOT NULL,
  `stokAkhir` int(11) NOT NULL,
  PRIMARY KEY (`stokId`) USING BTREE,
  INDEX `FK_stok`(`stokBrngId`) USING BTREE,
  CONSTRAINT `FK_stok` FOREIGN KEY (`stokBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stok
-- ----------------------------
INSERT INTO `stok` VALUES (0, '2018-08-24', 1, 'a', 'Pembelian Barang', 230, 100, 0, 330);
INSERT INTO `stok` VALUES (1, '2018-08-05', 1, 'T001-02-099', 'Pembelian Barang', 30, 200, 0, 230);
INSERT INTO `stok` VALUES (2, '2018-08-05', 2, 'T001-02-099', 'Pembelian Barang', 40, 100, 0, 140);
INSERT INTO `stok` VALUES (3, '2018-08-05', 3, 'T001-02-099', 'Pembelian Barang', 30, 20, 0, 50);
INSERT INTO `stok` VALUES (4, '2018-08-05', 4, 'T001-02-099', 'Pembelian Barang', 1000, 200, 0, 1200);
INSERT INTO `stok` VALUES (5, '2018-08-11', 1, 'rrr', 'Pembelian Barang', 330, 10, 0, 340);
INSERT INTO `stok` VALUES (6, '2018-08-11', 1, '4444', 'Penjualan Barang', 340, 0, 3, 337);
INSERT INTO `stok` VALUES (7, '2018-08-11', 1, '4444', 'Penjualan Barang', 337, 0, 2, 335);
INSERT INTO `stok` VALUES (8, '2018-08-11', 1, '4444', 'Penjualan Barang', 335, 0, 3, 332);

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `splrId` int(11) NOT NULL AUTO_INCREMENT,
  `splrKode` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `splrNama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `splrAlamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `splrTelp1` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `splrTelp2` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `splrHutang` double NULL DEFAULT NULL,
  PRIMARY KEY (`splrId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (1, 'S001', 'Toko Ahmad', 'Jalan Tikur', '09888', '000', 0);
INSERT INTO `supplier` VALUES (2, 'S002', 'PT Abadi', 'Jalan Damar', '00999', '0990', 6000000);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userPassword` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userHakAkses` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Triggers structure for table bayarpiutang
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_bayarpiutang`;
delimiter ;;
CREATE TRIGGER `insert_bayarpiutang` AFTER INSERT ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       if jdata=0 then
        set cashawal=0;
       else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal+new.byrpTotalBayar;
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=new.byrpPlgnId);
       set piutangakhir=piutangawal-new.byrpTotalBayar;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.byrpTanggal,new.byrpNoFaktur,'Pembayaran Piutang',cashawal,new.byrpTotalBayar,0,cashakhir);
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit)
        values(new.byrpTanggal,new.byrpPlgnId,new.byrpNoFaktur,'Pembayaran Piutang',piutangawal,0,new.byrpTotalBayar,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang-new.byrpTotalBayar where plgnId=new.byrpPlgnId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table bayarpiutang
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_bayarpiutang`;
delimiter ;;
CREATE TRIGGER `delete_bayarpiutang` AFTER DELETE ON `bayarpiutang` FOR EACH ROW BEGIN
       declare piutangawal double;
       declare piutangakhir double;
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       if jdata=0 then
        set cashawal=0;
       else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal-old.byrpTotalBayar;
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=old.byrpPlgnId);
       set piutangakhir=piutangawal+old.byrpTotalBayar;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.byrpTanggal,old.byrpNoFaktur,'Hapus Pembayaran Piutang',cashawal,0,old.byrpTotalBayar,cashakhir);
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit) values(old.byrpTanggal,old.byrpPlgnId,old.byrpNoFaktur,'Hapus Pembayaran Piutang',piutangawal,old.byrpTotalBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang+old.byrpTotalBayar where plgnId=old.byrpPlgnId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table bayarutang
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_bayarutang`;
delimiter ;;
CREATE TRIGGER `insert_bayarutang` AFTER INSERT ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
      declare cashawal double;
      declare cashakhir double;
      declare jdata int;
      set jdata=(select count(*) from cash);
      if jdata=0 then
        set cashawal=0;
      else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
      end if;
      set cashakhir=cashawal-new.byruTotalBayar;
      set hutangawal=(select splrHutang from supplier where splrId=new.byruSplrId);
      set hutangakhir=hutangawal-new.byruTotalBayar;
  
      insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.byruTanggal,new.byruNoFaktur,'Bayar Utang',cashawal,0,new.byruTotalBayar,cashakhir);
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir)
        values(new.byruTanggal,new.byruSplrId,new.byruNoFaktur,'Pembayaran Hutang',hutangawal,new.byruTotalBayar,0,hutangakhir);
      update supplier set splrHutang=splrHutang-new.byruTotalBayar where splrId=new.byruSplrId;  
	
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table bayarutang
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_bayarutang`;
delimiter ;;
CREATE TRIGGER `delete_bayarutang` AFTER DELETE ON `bayarutang` FOR EACH ROW BEGIN
      declare hutangawal double;
      declare hutangakhir double;
      declare cashawal double;
      declare cashakhir double;
      declare jdata int;
      set jdata=(select count(*) from cash);
      if jdata=0 then
        set cashawal=0;
      else
        set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
      end if;
      set cashakhir=cashawal+old.byruTotalBayar;
      set hutangawal=(select splrHutang from supplier where splrId=old.byruSplrId);
      set hutangakhir=hutangawal+old.byruTotalBayar;
  
      insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.byruTanggal,old.byruNoFaktur,'Hapus Bayar Utang',cashawal,old.byruTotalBayar,0,cashakhir);
      insert into hutang(htngTanggal,htngSplrId,htngNoFaktur,htngKet,htngAwal,htngDebet,htngKredit,htngAkhir)
      values(old.byruTanggal,old.byruSplrId,old.byruNoFaktur,'Hapus Pembahayaran Hutang',hutangawal,0,old.byruTotalBayar,hutangakhir);
      update supplier set splrHutang=splrHutang+oldbyruTotalBayar where splrId=old.byruSplrId; 
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detbayarpiutang
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detbayarpiutang`;
delimiter ;;
CREATE TRIGGER `insert_detbayarpiutang` AFTER INSERT ON `detbayarpiutang` FOR EACH ROW BEGIN
     update penjualan set pnjlSisaBayar=pnjlSisaBayar-new.dbypBayar where pnjlId=new.dbypPnjlId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detbayarpiutang
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detbayarpiutang`;
delimiter ;;
CREATE TRIGGER `delete_detbayarpiutang` AFTER DELETE ON `detbayarpiutang` FOR EACH ROW BEGIN
	update penjualan set pnjlSisaBayar=pnjlSisaBayar+old.dbypBayar where pnjlId=old.dbypPnjlId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detbayarutang
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detbayarutang`;
delimiter ;;
CREATE TRIGGER `insert_detbayarutang` AFTER INSERT ON `detbayarutang` FOR EACH ROW BEGIN
	update pembelian set pmblSisaBayar=pmblSisaBayar-new.dbyuBayar where pmblId=new.dbyuPmblId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detbayarutang
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detbayarutang`;
delimiter ;;
CREATE TRIGGER `delete_detbayarutang` AFTER DELETE ON `detbayarutang` FOR EACH ROW BEGIN
      update pembelian set pmblSisaBayar=pmblSisaBayar+old.dbyuBayar where pmblId=old.dbyuPmblId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detpembelian`;
delimiter ;;
CREATE TRIGGER `insert_detpembelian` AFTER INSERT ON `detpembelian` FOR EACH ROW BEGIN
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detpembelian`;
delimiter ;;
CREATE TRIGGER `delete_detpembelian` AFTER DELETE ON `detpembelian` FOR EACH ROW BEGIN
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detpenjualan`;
delimiter ;;
CREATE TRIGGER `insert_detpenjualan` AFTER INSERT ON `detpenjualan` FOR EACH ROW BEGIN
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detpenjualan`;
delimiter ;;
CREATE TRIGGER `delete_detpenjualan` AFTER DELETE ON `detpenjualan` FOR EACH ROW BEGIN
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detreturpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detreturpembelian`;
delimiter ;;
CREATE TRIGGER `insert_detreturpembelian` AFTER INSERT ON `detreturpembelian` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir-new.drpbJumlah
        where brngId=new.drpbBrngId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detreturpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detreturpembelian`;
delimiter ;;
CREATE TRIGGER `delete_detreturpembelian` AFTER DELETE ON `detreturpembelian` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir+old.drpbJumlah
        where brngId=old.drpbBrngId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detreturpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_detreturpenjualan`;
delimiter ;;
CREATE TRIGGER `insert_detreturpenjualan` AFTER INSERT ON `detreturpenjualan` FOR EACH ROW BEGIN
     update barang set brngStokAkhir=brngStokAkhir+new.drpjJumlah
        where brngId=new.drpjBrngId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detreturpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_detreturpenjualan`;
delimiter ;;
CREATE TRIGGER `delete_detreturpenjualan` AFTER DELETE ON `detreturpenjualan` FOR EACH ROW BEGIN
      update barang set brngStokAkhir=brngStokAkhir-old.drpjJumlah
        where brngId=old.drpjBrngId;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_pembelian`;
delimiter ;;
CREATE TRIGGER `insert_pembelian` AFTER INSERT ON `pembelian` FOR EACH ROW BEGIN
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
       set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal-new.pmblUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.pmblTanggal,new.pmblNoFaktur,'Pembelian Barang dengan Tunai',cashawal,0,new.pmblUangMuka,cashakhir);
       
     end;
     end if;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_pembelian`;
delimiter ;;
CREATE TRIGGER `delete_pembelian` AFTER DELETE ON `pembelian` FOR EACH ROW BEGIN
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
       set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal+old.pmblUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.pmblTanggal,old.pmblNoFaktur,'Hapus Pembelian Barang dengan Tunai',cashawal,old.pmblUangMuka,0,cashakhir);
       
      end;
      end if;
	
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table penjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_penjualan`;
delimiter ;;
CREATE TRIGGER `insert_penjualan` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
     if new.pnjlSisaBayar>0 then
     begin  
       declare piutangawal double;
       declare piutangakhir double;
       
       set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=new.pnjlPlgnId order by ptngTanggal desc  limit 1);
       set piutangakhir=piutangawal+new.pnjlSisaBayar;
  
       insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir)
       values(new.pnjlTanggal,new.pnjlPlgnId,new.pnjlNoFaktur,'Penjualan Barang',piutangawal,new.pnjlSisaBayar,0,piutangakhir);
       update pelanggan set plgnPiutang=plgnPiutang+new.pnjlSisaBayar where plgnId=new.pnjlPlgnId;
     end;
     elseif new.pnjlSisaBayar=0 then
     begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal+new.pnjlUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(new.pnjlTanggal,new.pnjlNoFaktur,'Penjualan Barang dengan Tunai',cashawal,new.pnjlUangMuka,0,cashakhir);
       
     end;
     end if;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table penjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_penjualan`;
delimiter ;;
CREATE TRIGGER `delete_penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
     if old.pnjlSisaBayar>0 then
     begin  
      declare piutangawal double;
      declare piutangakhir double;
       
      set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=old.pnjlPlgnId order by ptngTanggal desc limit 1);
      set piutangakhir=piutangawal-old.pnjlSisaBayar;
  
      insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngAkhir) values(old.pnjlTanggal,old.pnjlPlgnId,old.pnjlNoFaktur,'Hapus Penjualan Barang',piutangawal,0,old.pnjlSisaBayar,piutangakhir);
      update pelanggan set plgnPiutang=plgnPiutang-old.pnjlSisaBayar where plgnId=old.pnjlPlgnId;
     end;
     elseif old.pnjlSisaBayar=0 then
     begin
       declare cashawal double;
       declare cashakhir double;
       declare jdata int;
       set jdata=(select count(*) from cash);
       if jdata=0 then
         set cashawal=0;
       else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
       end if;
       set cashakhir=cashawal-old.pnjlUangMuka;
       insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	values(old.pnjlTanggal,old.pnjlNoFaktur,'Hapus Penjualan Barang dengan Tunai',cashawal,0,old.pnjlUangMuka,cashakhir);
     end;
     end if;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table returpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_returpembelian`;
delimiter ;;
CREATE TRIGGER `insert_returpembelian` AFTER INSERT ON `returpembelian` FOR EACH ROW BEGIN
      if new.rtpbStatus='T' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;
        set cashakhir=cashawal+new.rtpbNilai;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=new.rtpbPmblId);
        set totalbeliakhir=totalbeliawal-new.rtpbNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(new.rtpbTanggal,new.rtpbNoFaktur,'Retur Pembelian Kas',cashawal,new.rtpbNilai,0,cashakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=new.rtpbPmblId;
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table returpembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_returpembelian`;
delimiter ;;
CREATE TRIGGER `delete_returpembelian` AFTER DELETE ON `returpembelian` FOR EACH ROW BEGIN
     if old.rtpbStatus='T' then
      begin
        declare totalbeliawal double;
        declare totalbeliakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;
        set cashakhir=cashawal-old.rtpbNilai;
        set totalbeliawal =(select pmblTotalBeli from pembelian where pmblId=old.rtpbPmblId);
        set totalbeliakhir=totalbeliawal+old.rtpbNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(old.rtpbTanggal,old.rtpbNoFaktur,'Hapus Retur Pembelian Kas',cashawal,0,old.rtpbNilai,cashakhir);
        update pembelian set pmblTotalBeli=totalbeliakhir,pmblUangMuka=totalbeliakhir where pmblId=old.rtpbPmblId;
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
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table returpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `insert_returpenjualan`;
delimiter ;;
CREATE TRIGGER `insert_returpenjualan` AFTER INSERT ON `returpenjualan` FOR EACH ROW BEGIN
      if new.rtpjStatus='T' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;
        set cashakhir=cashawal-new.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=new.rtpjPnjlId);
        set totaljualakhir=totaljualawal-new.rtpjNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(new.rtpjTanggal,new.rtpjNoFaktur,'Retur Penjualan Kas',cashawal,0,new.rtpjNilai,cashakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=new.rtpjPnjlId;
      end;
      elseif new.rtpjStatus='K' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare piutangawal double;
        declare piutangakhir double;
        set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=new.rtpjPlgnId);
        set piutangakhir=piutangawal-new.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=new.rtpjPnjlId);
        set totaljualakhir=totaljualawal-new.rtpjNilai;
        insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit)
        values(new.rtpjTanggal,new.rtpjPlgnId,new.rtpjNoFaktur,'Retur Penjualan Kredit',piutangawal,0,new.rtpjNilai,piutangakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=new.rtpjPnjlId;
      end;
      end if;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table returpenjualan
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_returpenjualan`;
delimiter ;;
CREATE TRIGGER `delete_returpenjualan` AFTER DELETE ON `returpenjualan` FOR EACH ROW BEGIN
     if old.rtpjStatus='T' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare cashawal double;
        declare cashakhir double;
        declare jdata int;
        set jdata=(select count(*) from cash);
        if jdata=0 then
         set cashawal=0;
        else
         set cashawal=(select cashAkhir from cash order by cashId desc limit 1);
        end if;
        set cashakhir=cashawal+old.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=old.rtpjPnjlId);
        set totaljualakhir=totaljualawal+old.rtpjNilai;
        insert into cash(cashTanggal,cashNoFaktur,cashKet,cashAwal,cashDebet,cashKredit,cashAkhir) 
	 values(old.rtpjTanggal,old.rtpjNoFaktur,'Retur Penjualan Kas',cashawal,old.rtpjNilai,0,cashakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=old.rtpjPnjlId;
      end;
      elseif old.rtpjStatus='K' then
      begin
        declare totaljualawal double;
        declare totaljualakhir double;
        declare piutangawal double;
        declare piutangakhir double;
        set piutangawal=(select ptngAkhir from piutang where ptngPlgnId=old.rtpjPlgnId);
        set piutangakhir=piutangawal+old.rtpjNilai;
        set totaljualawal =(select pnjlTotalJual from penjualan where pnjlId=old.rtpjPnjlId);
        set totaljualakhir=totaljualawal+old.rtpjNilai;
        insert into piutang(ptngTanggal,ptngPlgnId,ptngNoFaktur,ptngKet,ptngAwal,ptngDebet,ptngKredit,ptngKredit)
        values(old.rtpjTanggal,old.rtpjPlgnId,old.rtpjNoFaktur,'Retur Penjualan Kredit',piutangawal,old.rtpjNilai,0,piutangakhir);
        update penjualan set pnjlTotalJual=totaljualakhir,pnjlUangMuka=totaljualakhir where pnjlId=old.rtpjPnjlId;
      end;
      end if;
    END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
