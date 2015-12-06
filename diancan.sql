/*
 Navicat Premium Data Transfer

 Source Server         : mamp
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : diancan

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 12/05/2015 23:50:01 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(50) NOT NULL,
  `item_detail` varchar(200) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `item`
-- ----------------------------
BEGIN;
INSERT INTO `item` VALUES ('1', '番茄炒蛋', '12', '', '../views/img/1.png'), ('2', '咕咾肉', '23', ' ', '../views/img/2.png'), ('3', '脆皮红薯', '10', ' ', '../views/img/3.png'), ('4', '黄瓜炒蛋', '10', ' ', '../views/img/4.png'), ('5', '烤羊排', '58', ' ', '../views/img/5.png');
COMMIT;

-- ----------------------------
--  Table structure for `orderbiao`
-- ----------------------------
DROP TABLE IF EXISTS `orderbiao`;
CREATE TABLE `orderbiao` (
  `order_id` varchar(255) NOT NULL,
  `paixu` bigint(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`paixu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `orderbiao`
-- ----------------------------
BEGIN;
INSERT INTO `orderbiao` VALUES ('151205001', '1'), ('151205002', '2'), ('151205003', '3'), ('151205004', '4'), ('151205005', '5'), ('151205006', '6');
COMMIT;

-- ----------------------------
--  Table structure for `ordertables`
-- ----------------------------
DROP TABLE IF EXISTS `ordertables`;
CREATE TABLE `ordertables` (
  `order_id` varchar(50) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `number` int(10) NOT NULL,
  PRIMARY KEY (`order_id`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ordertables`
-- ----------------------------
BEGIN;
INSERT INTO `ordertables` VALUES ('151205001', '1', '2'), ('151205001', '3', '1'), ('151205002', '5', '5'), ('151205003', '1', '10'), ('151205004', '1', '20'), ('151205004', '3', '10'), ('151205005', '1', '10'), ('151205006', '1', '10'), ('151205006', '2', '5'), ('151205006', '3', '3'), ('151205006', '4', '2'), ('151205006', '5', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
