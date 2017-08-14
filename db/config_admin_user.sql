/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-28 11:44:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `config_admin_user`;
CREATE TABLE `config_admin_user` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `username` varchar(50) DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `club_id` int(11) DEFAULT NULL COMMENT 'รหัส club',
  `name_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `surname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `job_position` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่งงาน',
  `admin_type` enum('club','admin') DEFAULT 'club' COMMENT 'ประเภทผู้ใช้งาน',
  `date_create` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ดูแลระบบ';

-- ----------------------------
-- Records of config_admin_user
-- ----------------------------
INSERT INTO `config_admin_user` VALUES ('1', 'test_user', '16d7a4fca7442dda3ad93c9a726597e4', null, 'ผู้ใช้งาน', 'เริ่มต้น', 'ผู้ดูแลระบบ', 'club', '2017-07-23');
