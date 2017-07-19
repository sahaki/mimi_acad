<?php
include_once ('../main/include_php.php');

$sql = "REPLACE INTO general_address SET";
$sql_detail = " general_id = '{$_POST[general_id]}',
addr_no = '{$_POST[addr_no]}',
addr_moo = '{$_POST[addr_moo]}',
addr_alley = '{$_POST[addr_alley]}',
addr_street = '{$_POST[addr_street]}',
province_id = '{$_POST[province_id]}',
district_id = '{$_POST[district_id]}',
subdistrict_id = '{$_POST[subdistrict_id]}',
postcode = '{$_POST[postcode]}'";

$sql .= $sql_detail;
$result = $mysqli->ServiceQuery($sql);
echo $_POST['general_id'];
