<?php
require_once('config/config_host.php');
require_once('common/class/mysqli.database.php'); use Database\MysqliDB; $mysqli = new MysqliDB();
############### สร้างตาราง config_position  ###############
$dropTable = "DROP TABLE IF EXISTS `config_position`;";
$mysqli->ServiceQuery($dropTable);

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
$dropTable = "DROP TABLE IF EXISTS `config_blood`;";
$mysqli->ServiceQuery($dropTable);

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
$dropTable = "DROP TABLE IF EXISTS `config_core`;";
$mysqli->ServiceQuery($dropTable);

$createTable = "CREATE TABLE IF NOT EXISTS `config_core` (
  `cofig_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `club_id` int(11) DEFAULT NULL COMMENT 'รหัส club',
  `config_var` varchar(255) DEFAULT NULL COMMENT 'ชื่อตัวแปร',
  `config_value` varchar(255) DEFAULT NULL COMMENT 'ค่า',
  PRIMARY KEY (`cofig_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_core'");

if($result->num_rows > 0){
	$textQuery = "REPLACE INTO `config_core` VALUES ('1', '0', 'system_name', 'ระบบบริหารจัดการข้อมูลบุคคล'),
    ('2', '0', 'company_name', 'ศูนย์ฝีกฟุตบอล'),
    ('3', '0', 'height_unit', 'cm.'),
    ('4', '0', 'weight_unit', 'kg.'),
    ('5', '0', 'logo_path', '../../media/logo/logo.png')";
	$mysqli->ServiceQuery($textQuery);
	echo "==== Create Table config_core Complete ====<br>";
}

############### สร้างตาราง config_admin_user  ###############
$dropTable = "DROP TABLE IF EXISTS `config_admin_user`;";
$mysqli->ServiceQuery($dropTable);

$createTable = "CREATE TABLE IF NOT EXISTS `config_admin_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ดูแลระบบ' ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_admin_user'");

if($result->num_rows > 0){
	$textQuery = "REPLACE INTO `config_admin_user` VALUES 
    ('1', 'admin_user', '16d7a4fca7442dda3ad93c9a726597e4', '0', 'ผู้ใช้งาน', 'เริ่มต้น', 'ผู้ดูแลระบบ','admin', '2017-07-23')";
	$mysqli->ServiceQuery($textQuery);
	echo "==== Create Table config_admin_user Complete ====<br>";
}


############### สร้างตาราง config_club  ###############
$dropTable = "DROP TABLE IF EXISTS `config_club`;";
$mysqli->ServiceQuery($dropTable);

$createTable = "CREATE TABLE IF NOT EXISTS `config_club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส club',
  `club_name_th` varchar(100) DEFAULT NULL COMMENT 'ชื่อสโมสรภาษาไทย',
  `club_name_en` varchar(100) DEFAULT NULL COMMENT 'ชื่อสโมสรภาษาอังกฤษ',
  `club_name_short` varchar(100) DEFAULT NULL COMMENT 'ชื่อย่อสโมสร',
  `club_stadium_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อสนาม',
  `club_stadium_value` varchar(100) DEFAULT NULL COMMENT 'ความจุสนาม',
  `club_history` text COMMENT 'ประวัติ',
  `club_logo_path` varchar(100) DEFAULT NULL COMMENT 'Path รูป',
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลสโมสร' ";

$mysqli->ServiceQuery($createTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_club'");

if($result->num_rows > 0){
    $createTrigger = "CREATE TRIGGER `delete_club` BEFORE DELETE ON `config_club`
    FOR EACH ROW BEGIN
    DELETE FROM `config_core` WHERE club_id = OLD.club_id;
    END";
    $mysqli->ServiceQuery($createTrigger);
    echo "==== Create Table config_club Complete ====<br>";
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
