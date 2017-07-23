<?php
require_once('config/config_host.php');
require_once('common/class/mysqli.database.php'); use Database\MysqliDB; $mysqli = new MysqliDB();
############### สร้างตาราง config_position  ###############
$createTable = "CREATE TABLE IF NOT EXISTS `config_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง',
  `position_label` varchar(20) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `status` tinyint(1) DEFAULT '1' COMMENT 'เปิด/ปิดการใช้งาน',
  `orderby` int(11) DEFAULT '1' COMMENT 'เรียงลำดับ',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='ตำแหน่งในสนาม' ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_position'");

if($result->num_rows > 0){
    $textQuery = "REPLACE INTO `config_position` VALUES ('1', 'ผู้รักษาประตู', '1', '1'),
    ('2', 'กองหลัง', '1', '2'),
    ('3', 'กองกลาง', '1', '3'),
    ('4', 'กองหน้า', '1', '4'),
    ('5', 'ไม่ถนัดฟุตบอล', '1', '5')";
    $mysqli->ServiceQuery($textQuery);
    echo "==== Create Table config_position Complete ====<br>";
}

############### สร้างตาราง config_blood  ###############
$createTable = "CREATE TABLE IF NOT EXISTS `config_blood` (
  `blood_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกรุ๊ปเลือด',
  `blood_label` varchar(20) DEFAULT NULL COMMENT 'กรุ๊ปเลือด',
  PRIMARY KEY (`blood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บกรุ๊ปเลือด' ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_blood'");

if($result->num_rows > 0){
    $textQuery = "REPLACE INTO `config_blood` VALUES ('1', 'A'),
    ('2', 'B'),
    ('3', 'O'),
    ('4', 'AB')";
    $mysqli->ServiceQuery($textQuery);
    echo "==== Create Table config_blood Complete ====<br>";
}

############### สร้างตาราง config_core  ###############
$createTable = "CREATE TABLE IF NOT EXISTS `config_core` (
  `cofig_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `config_var` varchar(255) DEFAULT NULL COMMENT 'ชื่อตัวแปร',
  `config_value` varchar(255) DEFAULT NULL COMMENT 'ค่า',
  PRIMARY KEY (`cofig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_core'");

if($result->num_rows > 0){
	$textQuery = "REPLACE INTO `config_core` VALUES ('1', 'system_name', 'ระบบบริหารจัดการข้อมูลบุคคล'),
    ('2', 'company_name', 'ศูนย์ฝีกฟุตบอล'),
    ('3', 'height_unit', 'cm.'),
    ('4', 'weight_unit', 'kg.'),
    ('5', 'logo_path', '../../media/logo/logo.png')";
	$mysqli->ServiceQuery($textQuery);
	echo "==== Create Table config_core Complete ====<br>";
}

############### สร้างตาราง config_admin_user  ###############
$createTable = "CREATE TABLE IF NOT EXISTS `config_admin_user` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `username` varchar(50) DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `name_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `surname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `job_position` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่งงาน',
  `date_create` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ดูแลระบบ' ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_admin_user'");

if($result->num_rows > 0){
	$textQuery = "REPLACE INTO `config_admin_user` VALUES 
    ('1', 'test_user', '16d7a4fca7442dda3ad93c9a726597e4', 'ผู้ใช้งาน', 'เริ่มต้น', 'ผู้ดูแลระบบ', '2017-07-23')";
	$mysqli->ServiceQuery($textQuery);
	echo "==== Create Table config_admin_user Complete ====<br>";
}

############### สร้างตาราง config_area_province  ###############
include_once ("install/install_area_province.php");

############### สร้างตาราง config_area_district  ###############
include_once ("install/install_area_district.php");

############### สร้างตาราง config_area_subdistrict  ###############
include_once ("install/install_area_subdistrict.php");

############### สร้างตาราง general  ###############
include_once ("install/install_general.php");
?>
<br>Install complete <a href="app/main/">Click here</a>
