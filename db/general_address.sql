/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 21:27:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for general_address
-- ----------------------------
DROP TABLE IF EXISTS `general_address`;
CREATE TABLE `general_address` (
  `general_address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสที่อยู่',
  `general_id` int(11) DEFAULT NULL COMMENT 'รหัสบุคลล',
  `addr_no` varchar(20) DEFAULT NULL COMMENT 'บ้านเลขที่',
  `addr_moo` varchar(5) DEFAULT NULL COMMENT 'หมู่',
  `addr_alley` varchar(50) DEFAULT NULL COMMENT 'ซอย',
  `addr_street` varchar(50) DEFAULT NULL COMMENT 'ถนน',
  `province_id` int(8) DEFAULT NULL COMMENT 'จังหวัด',
  `district_id` int(8) DEFAULT NULL COMMENT 'อำเภอ',
  `subdistrict_id` int(8) DEFAULT NULL COMMENT 'ตำบล',
  `postcode` int(5) DEFAULT NULL COMMENT 'รหัสไปรษณีย์',
  PRIMARY KEY (`general_address_id`),
  KEY `address_ref_general` (`general_id`),
  CONSTRAINT `address_ref_general` FOREIGN KEY (`general_id`) REFERENCES `general_infomation` (`general_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
