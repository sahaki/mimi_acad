/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-28 13:32:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_club
-- ----------------------------
DROP TABLE IF EXISTS `config_club`;
CREATE TABLE `config_club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส club',
  `club_name_th` varchar(255) DEFAULT NULL COMMENT 'ชื่อสโมสรภาษาไทย',
  `club_name_en` varchar(255) DEFAULT NULL COMMENT 'ชื่อสโมสรภาษาอังกฤษ',
  `club_name_short` varchar(255) DEFAULT NULL COMMENT 'ชื่อย่อสโมสร',
  `club_stadium_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสนาม',
  `club_stadium_value` varchar(255) DEFAULT NULL COMMENT 'ความจุสนาม',
  `club_history` text COMMENT 'ประวัติ',
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลสโมสร';

-- ----------------------------
-- Records of config_club
-- ----------------------------
