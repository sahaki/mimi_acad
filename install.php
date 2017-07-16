<?php
require_once('config/config_host.php');
require_once('common/class/mysqli.database.php'); use Database\MysqliDB; $mysqli = new MysqliDB();

############### สร้างตาราง config_position  ###############
$crateTable = "CREATE TABLE IF NOT EXISTS `config_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง',
  `position_label` varchar(20) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `status` tinyint(1) DEFAULT '1' COMMENT 'เปิด/ปิดการใช้งาน',
  `order` int(11) DEFAULT '1' COMMENT 'เรียงลำดับ',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='ตำแหน่งในสนาม' ";

$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_position'");

if($result->num_rows > 0){
    $textQuery = "REPLACE INTO `config_position` VALUES ('1', 'ผู้รักษาประตู', '1', '1'),
    ('2', 'กองหลัง', '1', '2'),
    ('3', 'กองกลาง', '1', '3'),
    ('4', 'กองหน้า', '1', '4'),
    ('5', 'ไม่ถนัดฟุตบอล', '1', '5')";
    $mysqli->ServiceQuery($textQuery,'on');
}
############### สร้างตาราง config_position  ###############


?>