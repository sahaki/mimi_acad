<?php
$crateTable = "CREATE TABLE IF NOT EXISTS `config_area_province` (
  `code` int(8) NOT NULL DEFAULT '0' COMMENT 'รหัสพื้นที่',
  `name_th` varchar(255) NOT NULL COMMENT 'ชื่อไทย',
  `name_eng` varchar(255) DEFAULT NULL COMMENT 'ชื่ออังกฤษ',
  `area_type` enum('SUBDISTRICT','DISTRICT','PROVINCE') DEFAULT NULL COMMENT 'ประเภทของพื้นที่',
  `update_date` date DEFAULT NULL COMMENT 'วันที่อัพเดทจาก Dopa',
  PRIMARY KEY (`code`),
  KEY `index_1` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='ตารางเก็บข้อมูลพื้นที่ จังหวัด' ";

$mysqli->ServiceQuery($crateTable);
$result = $mysqli->ServiceQuery("SHOW TABLES LIKE 'config_area_province'");

if($result->num_rows > 0){
    $textQuery = "REPLACE INTO `config_area_province` VALUES ('10000000', 'กรุงเทพมหานคร', 'Bangkok', 'PROVINCE', '2013-04-22'),
    ('11000000', 'สมุทรปราการ', 'Samut Prakan', 'PROVINCE', '2013-04-22'),
    ('12000000', 'นนทบุรี', 'Nonthaburi', 'PROVINCE', '2013-04-22'),
    ('13000000', 'ปทุมธานี', 'Pathum Thani', 'PROVINCE', '2013-04-22'),
    ('14000000', 'พระนครศรีอยุธยา', 'Phranakhon Si Ayutthaya', 'PROVINCE', '2013-04-22'),
    ('15000000', 'อ่างทอง', 'Ang Thong', 'PROVINCE', '2013-04-22'),
    ('16000000', 'ลพบุรี', 'Lopburi', 'PROVINCE', '2013-04-22'),
    ('17000000', 'สิงห์บุรี', 'Singburi', 'PROVINCE', '2013-04-22'),
    ('18000000', 'ชัยนาท', 'Chainat', 'PROVINCE', '2013-04-22'),
    ('19000000', 'สระบุรี', 'Saraburi', 'PROVINCE', '2013-04-22'),
    ('20000000', 'ชลบุรี', 'Chonburi', 'PROVINCE', '2013-04-22'),
    ('21000000', 'ระยอง', 'Rayong', 'PROVINCE', '2013-04-22'),
    ('22000000', 'จันทบุรี', 'Chanthaburi', 'PROVINCE', '2013-04-22'),
    ('23000000', 'ตราด', 'Trat', 'PROVINCE', '2013-04-22'),
    ('24000000', 'ฉะเชิงเทรา', 'Chachoengsao', 'PROVINCE', '2013-04-22'),
    ('25000000', 'ปราจีนบุรี', 'Prachinburi', 'PROVINCE', '2013-04-22'),
    ('26000000', 'นครนายก', 'Nakhon Nayok', 'PROVINCE', '2013-04-22'),
    ('27000000', 'สระแก้ว', 'Sa Kaeo', 'PROVINCE', '2013-04-22'),
    ('30000000', 'นครราชสีมา', 'Nakhon Ratchasima', 'PROVINCE', '2013-04-22'),
    ('31000000', 'บุรีรัมย์', 'Burirum', 'PROVINCE', '2013-04-22'),
    ('32000000', 'สุรินทร์', 'Surin', 'PROVINCE', '2013-04-22'),
    ('33000000', 'ศรีสะเกษ', 'Sisaket', 'PROVINCE', '2013-04-22'),
    ('34000000', 'อุบลราชธานี', 'Ubon Ratchathani', 'PROVINCE', '2013-04-22'),
    ('35000000', 'ยโสธร', 'Yasothon', 'PROVINCE', '2013-04-22'),
    ('36000000', 'ชัยภูมิ', 'Chaiyaphum', 'PROVINCE', '2013-04-22'),
    ('37000000', 'อำนาจเจริญ', 'Amnat Charoen', 'PROVINCE', '2013-04-22'),
    ('38000000', 'บึงกาฬ', 'Bueng Kan', 'PROVINCE', '2013-04-22'),
    ('39000000', 'หนองบัวลำภู', 'Non Bua Lam Phu', 'PROVINCE', '2013-04-22'),
    ('40000000', 'ขอนแก่น', 'Khon Kaen', 'PROVINCE', '2013-04-22'),
    ('41000000', 'อุดรธานี', 'Udon Thani', 'PROVINCE', '2013-04-22'),
    ('42000000', 'เลย', 'Loei', 'PROVINCE', '2013-04-22'),
    ('43000000', 'หนองคาย', 'Nong Khai', 'PROVINCE', '2013-04-22'),
    ('44000000', 'มหาสารคาม', 'Maha Sarakham', 'PROVINCE', '2013-04-22'),
    ('45000000', 'ร้อยเอ็ด', 'Roi Et', 'PROVINCE', '2013-04-22'),
    ('46000000', 'กาฬสินธุ์', 'Kalasin', 'PROVINCE', '2013-04-22'),
    ('47000000', 'สกลนคร', 'Sakon Nakhon', 'PROVINCE', '2013-04-22'),
    ('48000000', 'นครพนม', 'Nakhon Phanom', 'PROVINCE', '2013-04-22'),
    ('49000000', 'มุกดาหาร', 'Mukdahan', 'PROVINCE', '2013-04-22'),
    ('50000000', 'เชียงใหม่', 'Chiang Mai', 'PROVINCE', '2013-04-22'),
    ('51000000', 'ลำพูน', 'Lamphun', 'PROVINCE', '2013-04-22'),
    ('52000000', 'ลำปาง', 'Lampang', 'PROVINCE', '2013-04-22'),
    ('53000000', 'อุตรดิตถ์', 'Uttaradit', 'PROVINCE', '2013-04-22'),
    ('54000000', 'แพร่', 'Phrae', 'PROVINCE', '2013-04-22'),
    ('55000000', 'น่าน', 'Nan', 'PROVINCE', '2013-04-22'),
    ('56000000', 'พะเยา', 'Phayao', 'PROVINCE', '2013-04-22'),
    ('57000000', 'เชียงราย', 'Chiang Rai', 'PROVINCE', '2013-04-22'),
    ('58000000', 'แม่ฮ่องสอน', 'Mae Hong Son', 'PROVINCE', '2013-04-22'),
    ('60000000', 'นครสวรรค์', 'Nakhon Sawan', 'PROVINCE', '2013-04-22'),
    ('61000000', 'อุทัยธานี', 'Uthai Thani', 'PROVINCE', '2013-04-22'),
    ('62000000', 'กำแพงเพชร', 'Kamphaeng Phet', 'PROVINCE', '2013-04-22'),
    ('63000000', 'ตาก', 'Tak', 'PROVINCE', '2013-04-22'),
    ('64000000', 'สุโขทัย', 'Sukhothai', 'PROVINCE', '2013-04-22'),
    ('65000000', 'พิษณุโลก', 'Phitsanulok', 'PROVINCE', '2013-04-22'),
    ('66000000', 'พิจิตร', 'Phichit', 'PROVINCE', '2013-04-22'),
    ('67000000', 'เพชรบูรณ์', 'Phetchabun', 'PROVINCE', '2013-04-22'),
    ('70000000', 'ราชบุรี', 'Ratchaburi', 'PROVINCE', '2013-04-22'),
    ('71000000', 'กาญจนบุรี', 'Khanchanaburi', 'PROVINCE', '2013-04-22'),
    ('72000000', 'สุพรรณบุรี', 'Suphanburi', 'PROVINCE', '2013-04-22'),
    ('73000000', 'นครปฐม', 'Nakhon Pathom', 'PROVINCE', '2013-04-22'),
    ('74000000', 'สมุทรสาคร', 'Samut Sakhon', 'PROVINCE', '2013-04-22'),
    ('75000000', 'สมุทรสงคราม', 'Samut Songkhram', 'PROVINCE', '2013-04-22'),
    ('76000000', 'เพชรบุรี', 'Phetchaburi', 'PROVINCE', '2013-04-22'),
    ('77000000', 'ประจวบคีรีขันธ์', 'Prachuap Khirikhan', 'PROVINCE', '2013-04-22'),
    ('80000000', 'นครศรีธรรมราช', 'Nakhon Sie Thammarat', 'PROVINCE', '2013-04-22'),
    ('81000000', 'กระบี่', 'Krabi', 'PROVINCE', '2013-04-22'),
    ('82000000', 'พังงา', 'Phang Nga', 'PROVINCE', '2013-04-22'),
    ('83000000', 'ภูเก็ต', 'Phuket', 'PROVINCE', '2013-04-22'),
    ('84000000', 'สุราษฎร์ธานี', 'Surat Thani', 'PROVINCE', '2013-04-22'),
    ('85000000', 'ระนอง', 'Ranong', 'PROVINCE', '2013-04-22'),
    ('86000000', 'ชุมพร', 'Chumphon', 'PROVINCE', '2013-04-22'),
    ('90000000', 'สงขลา', 'Songkhla', 'PROVINCE', '2013-04-22'),
    ('91000000', 'สตูล', 'Satun', 'PROVINCE', '2013-04-22'),
    ('92000000', 'ตรัง', 'Trang', 'PROVINCE', '2013-04-22'),
    ('93000000', 'พัทลุง', 'Phatthalung', 'PROVINCE', '2013-04-22'),
    ('94000000', 'ปัตตานี', 'Pattani', 'PROVINCE', '2013-04-22'),
    ('95000000', 'ยะลา', 'Uttaradit', 'PROVINCE', '2013-04-22'),
    ('96000000', 'นราธิวาส', 'Narathiwat', 'PROVINCE', '2013-04-22')";
    $mysqli->ServiceQuery($textQuery);
    echo "==== Create Table config_area_province Complete ====<br>";
}