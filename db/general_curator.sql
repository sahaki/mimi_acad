/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 21:27:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for general_curator
-- ----------------------------
DROP TABLE IF EXISTS `general_curator`;
CREATE TABLE `general_curator` (
  `curator_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ผู้ปกครอง',
  `general_id` int(11) DEFAULT NULL COMMENT 'รหัสบุคคล',
  `curator_name_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `curator_surname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `curator_tel` varchar(50) DEFAULT NULL COMMENT 'เบอร์โทร',
  `carator_relation` varchar(50) DEFAULT NULL COMMENT 'ความสัมพันธ์',
  PRIMARY KEY (`curator_id`),
  KEY `curator_ref_general` (`general_id`),
  CONSTRAINT `curator_ref_general` FOREIGN KEY (`general_id`) REFERENCES `general_infomation` (`general_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ปกครอง';
