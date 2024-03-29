/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : db_listrik

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 26/07/2019 18:46:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `blok` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_daya` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (1, '124274', 'Nanang', 'Jl.Abu', '021873453', 'nan@mail.com', '32234B', 1);
INSERT INTO `customer` VALUES (2, '384533', 'Joni', 'Jl.Semangka', '021834534', 'ss@mail.com', '3242H', 2);
INSERT INTO `customer` VALUES (3, '839457', 'Wahyu', 'Jl.Bonang', '0214432834', 'bn@mail.com', '2342HH', 2);
INSERT INTO `customer` VALUES (4, '7343458', 'Juju', 'Jl.Yuyu', '0218495435', 'uj@mail.com', '824242B', 2);

-- ----------------------------
-- Table structure for daya
-- ----------------------------
DROP TABLE IF EXISTS `daya`;
CREATE TABLE `daya`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kapasitas_daya` int(10) NULL DEFAULT NULL,
  `abodemen` int(10) NULL DEFAULT NULL,
  `admin` int(10) NULL DEFAULT NULL,
  `base_kwh` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daya
-- ----------------------------
INSERT INTO `daya` VALUES (1, 900, 1000, 1000, 1000);
INSERT INTO `daya` VALUES (2, 1300, 2000, 2500, 2700);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', 'YQ==', 1);
INSERT INTO `m_user` VALUES (9, 'kasir', 'YQ==', 2);
INSERT INTO `m_user` VALUES (10, 'joni', 'YQ==', 1);
INSERT INTO `m_user` VALUES (11, 'erik', 'YQ==', 2);

-- ----------------------------
-- Table structure for sistem
-- ----------------------------
DROP TABLE IF EXISTS `sistem`;
CREATE TABLE `sistem`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_apps` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `author` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sistem
-- ----------------------------
INSERT INTO `sistem` VALUES (1, 'Sistem Tagihan', 'CipanasSoft');

-- ----------------------------
-- Table structure for t_payment
-- ----------------------------
DROP TABLE IF EXISTS `t_payment`;
CREATE TABLE `t_payment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) NULL DEFAULT NULL,
  `last_use_kwh` int(50) NULL DEFAULT NULL,
  `current_use_kwh` int(50) NULL DEFAULT NULL,
  `used_kwh` int(50) NULL DEFAULT NULL,
  `payment` int(50) NULL DEFAULT NULL,
  `date_payment` date NULL DEFAULT NULL,
  `status` int(10) NULL DEFAULT NULL,
  `due_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_payment
-- ----------------------------
INSERT INTO `t_payment` VALUES (10, 2, 0, 100, 100, 274500, '2019-07-25', 1, '2019-07-24');
INSERT INTO `t_payment` VALUES (11, 3, 0, 100, 100, 274500, '2019-07-25', 1, '2019-07-25');
INSERT INTO `t_payment` VALUES (12, 1, 0, 180, 180, 182000, '2019-07-26', 1, '2019-07-25');
INSERT INTO `t_payment` VALUES (13, 4, 0, 100, 100, 274500, NULL, 2, '2019-07-26');

SET FOREIGN_KEY_CHECKS = 1;
