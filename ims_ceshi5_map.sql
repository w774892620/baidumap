/*
Navicat MySQL Data Transfer

Source Server         : linux
Source Server Version : 50724
Source Host           : 119.23.29.57:3306
Source Database       : weizanx

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-03-07 11:24:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ims_ceshi5_map
-- ----------------------------
DROP TABLE IF EXISTS `ims_ceshi5_map`;
CREATE TABLE `ims_ceshi5_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `weid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ims_ceshi5_map
-- ----------------------------
INSERT INTO `ims_ceshi5_map` VALUES ('2', '新乡县农信社合河信用社', '新乡县合河乡', '113.765463', '35.338573', '4');
INSERT INTO `ims_ceshi5_map` VALUES ('3', '新乡县农信社大块信用社', '新乡市凤泉区大块镇', '113.810432', '35.370848', '4');
INSERT INTO `ims_ceshi5_map` VALUES ('4', '新乡县农信社大召营信用社', '新乡县大召营镇', '113.785777', '35.287346', '4');
INSERT INTO `ims_ceshi5_map` VALUES ('5', '新乡市', '新乡市', '113.91269', '35.307258', '4');
INSERT INTO `ims_ceshi5_map` VALUES ('6', '新乡市新乡县', '新乡市新乡县', '113.848246', '35.220522', '4');
