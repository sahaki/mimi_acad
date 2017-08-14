/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 20:12:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_blood
-- ----------------------------
DROP TABLE IF EXISTS `config_blood`;
CREATE TABLE `config_blood` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกรุ๊ปเลือด',
  `blood_label` varchar(20) DEFAULT NULL COMMENT 'กรุ๊ปเลือด',
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บกรุ๊ปเลือด';

-- ----------------------------
-- Records of config_blood
-- ----------------------------
INSERT INTO `config_blood` VALUES ('1', 'A');
INSERT INTO `config_blood` VALUES ('2', 'B');
INSERT INTO `config_blood` VALUES ('3', 'O');
INSERT INTO `config_blood` VALUES ('4', 'AB');
