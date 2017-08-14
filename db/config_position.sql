/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-16 19:24:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_position
-- ----------------------------
DROP TABLE IF EXISTS `config_position`;
CREATE TABLE IF EXISTS `config_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง',
  `position_label` varchar(20) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `status` tinyint(1) DEFAULT '1' COMMENT 'เปิด/ปิดการใช้งาน',
  `order` int(11) DEFAULT '1' COMMENT 'เรียงลำดับ',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='ตำแหน่งในสนาม';

-- ----------------------------
-- Records of config_position
-- ----------------------------
INSERT INTO `config_position` VALUES ('1', 'ผู้รักษาประตู', '1', '1');
INSERT INTO `config_position` VALUES ('2', 'กองหลัง', '1', '2');
INSERT INTO `config_position` VALUES ('3', 'กองกลาง', '1', '3');
INSERT INTO `config_position` VALUES ('4', 'กองหน้า', '1', '4');
INSERT INTO `config_position` VALUES ('5', 'ไม่ถนัดฟุตบอล', '1', '5');
