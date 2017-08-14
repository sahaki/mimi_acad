/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : academe

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-17 21:24:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for general_infomation
-- ----------------------------
DROP TABLE IF EXISTS `general_infomation`;
CREATE TABLE `general_infomation` (
  `general_id` int(13) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบุคคล',
  `register_date` date DEFAULT NULL COMMENT 'วันที่ลงทะเบียน',
  `birth_date` date DEFAULT NULL COMMENT 'วันเกิด',
  `idcard` varchar(13) DEFAULT NULL COMMENT 'เลขประจำตัวประชาชน',
  `name_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `surname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `nickname_th` varchar(20) DEFAULT NULL COMMENT 'ชื่อเล่น',
  `origin` varchar(20) DEFAULT NULL COMMENT 'เชื้อชาติ',
  `nationality` varchar(20) DEFAULT NULL COMMENT 'สัญชาติ',
  `religion` varchar(20) DEFAULT NULL COMMENT 'ศาสนา',
  `blood_id` varchar(10) DEFAULT NULL COMMENT 'กรุ๊บเลือด',
  `height` double DEFAULT NULL COMMENT 'ส่วนสูง',
  `weight` double DEFAULT NULL COMMENT 'น้ำหนัก',
  `education_class` varchar(50) DEFAULT NULL COMMENT 'ระดับการศึกษา',
  `school_name` varchar(50) DEFAULT NULL COMMENT 'โรงเรียน',
  `favorite_sport` varchar(50) DEFAULT NULL COMMENT 'กีฬาที่ชอบ',
  `congenital_disease` varchar(50) DEFAULT NULL COMMENT 'โรคประจำตัว',
  `food_allergy` varchar(50) DEFAULT NULL COMMENT 'แพ้อาหาร',
  PRIMARY KEY (`general_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลบุคคล ทั่วไป';
