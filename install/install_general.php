<?php
// ข้อมูลบุคคล
$dropTable = "DROP TABLE IF EXISTS `general_infomation`;";
$mysqli->ServiceQuery($dropTable);

$crateTable = "CREATE TABLE IF NOT EXISTS `general_infomation` (
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
  `img_path` varchar(50) DEFAULT NULL COMMENT 'path รูป',
  `club_id` varchar(50) DEFAULT NULL COMMENT 'รหัส club',
  PRIMARY KEY (`general_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลบุคคล ทั่วไป' ";
$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'general_infomation'");
if($result->num_rows > 0){
    echo "==== Create Table general_infomation Complete ====<br>";
}

$createTrigger = "DROP TRIGGER IF EXISTS `on_general_delete`";
$mysqli->ServiceQuery($createTrigger);

$createTrigger = "CREATE TRIGGER `on_general_delete` BEFORE DELETE ON `general_infomation` FOR EACH ROW BEGIN
    DELETE FROM general_football WHERE general_id = OLD.general_id;
    DELETE FROM general_address WHERE general_id = OLD.general_id;
    DELETE FROM general_curator WHERE general_id = OLD.general_id;
END";
$mysqli->ServiceQuery($createTrigger);

$dropTable = "DROP TABLE IF EXISTS `general_address`;";
$mysqli->ServiceQuery($dropTable);

$crateTable = "CREATE TABLE IF NOT EXISTS `general_address` (
  `general_id` int(11) NOT NULL COMMENT 'รหัสบุคลล',
  `addr_no` varchar(20) DEFAULT NULL COMMENT 'บ้านเลขที่',
  `addr_moo` varchar(5) DEFAULT NULL COMMENT 'หมู่',
  `addr_alley` varchar(50) DEFAULT NULL COMMENT 'ซอย',
  `addr_street` varchar(50) DEFAULT NULL COMMENT 'ถนน',
  `province_id` int(8) DEFAULT NULL COMMENT 'จังหวัด',
  `district_id` int(8) DEFAULT NULL COMMENT 'อำเภอ',
  `subdistrict_id` int(8) DEFAULT NULL COMMENT 'ตำบล',
  `postcode` int(5) DEFAULT NULL COMMENT 'รหัสไปรษณีย์',
  PRIMARY KEY (`general_id`),
  KEY `address_ref_general` (`general_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลที่อยู่'";

$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'general_address'");
if($result->num_rows > 0){
    echo "==== Create Table general_address Complete ====<br>";
}

$dropTable = "DROP TABLE IF EXISTS `general_curator`;";
$mysqli->ServiceQuery($dropTable);

$crateTable = "CREATE TABLE IF NOT EXISTS `general_curator` (
  `curator_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ผู้ปกครอง',
  `general_id` int(11) DEFAULT NULL COMMENT 'รหัสบุคคล',
  `curator_name_th` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `curator_surname_th` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `curator_tel` varchar(50) DEFAULT NULL COMMENT 'เบอร์โทร',
  `curator_relation` varchar(50) DEFAULT NULL COMMENT 'ความสัมพันธ์',
  PRIMARY KEY (`curator_id`),
  KEY `curator_ref_general` (`general_id`),
  CONSTRAINT `curator_ref_general` FOREIGN KEY (`general_id`) REFERENCES `general_infomation` (`general_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อมูลผู้ปกครอง'";

$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'general_curator'");
if($result->num_rows > 0){
    echo "==== Create Table general_curator Complete ====<br>";
}

$dropTable = "DROP TABLE IF EXISTS `general_football`;";
$mysqli->ServiceQuery($dropTable);

$crateTable = "CREATE TABLE IF NOT EXISTS `general_football` (
  `general_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบุคคล',
  `position_id_list` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่งที่ถนัด',
  `favorite_sportsman` varchar(100) DEFAULT NULL COMMENT 'นักกีฬาที่ชอบ',
  `favorite_inter_club` varchar(100) DEFAULT NULL COMMENT 'สโมสรที่ชอบ ต่างประเทศ',
  `favorite_thai_club` varchar(100) DEFAULT NULL COMMENT 'สโมสรที่ชอบ ในประเทศ',
  PRIMARY KEY (`general_id`),
  CONSTRAINT `football_ref_general` FOREIGN KEY (`general_id`) REFERENCES `general_infomation` (`general_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลเกี่ยวกับกีฬา'";

$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'general_football'");
if($result->num_rows > 0){
    echo "==== Create Table general_football Complete ====<br>";
}