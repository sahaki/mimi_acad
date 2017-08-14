/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 21:27:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for general_football
-- ----------------------------
DROP TABLE IF EXISTS `general_football`;
CREATE TABLE `general_football` (
  `general_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบุคคล',
  `position_id_list` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่งที่ถนัด',
  `favorite_sportsman` varchar(100) DEFAULT NULL COMMENT 'นักกีฬาที่ชอบ',
  `favorite_inter_club` varchar(100) DEFAULT NULL COMMENT 'สโมสรที่ชอบ ต่างประเทศ',
  `favorite_thai_club` varchar(100) DEFAULT NULL COMMENT 'สโมสรที่ชอบ ในประเทศ',
  PRIMARY KEY (`general_id`),
  CONSTRAINT `football_ref_general` FOREIGN KEY (`general_id`) REFERENCES `general_infomation` (`general_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลเกี่ยวกับกีฬา';
