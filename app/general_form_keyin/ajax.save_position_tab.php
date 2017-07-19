<?php
include_once ('../main/include_php.php');

$sql = "REPLACE INTO general_football SET";
$sql_detail = " general_id = '{$_POST[general_id]}',
position_id_list = '{$_POST[position_id_list]}',
favorite_sportsman = '{$_POST[favorite_sportsman]}',
favorite_inter_club = '{$_POST[favorite_inter_club]}',
favorite_thai_club = '{$_POST[favorite_thai_club]}'";

$sql .= $sql_detail;
$result = $mysqli->ServiceQuery($sql);
echo $_POST['general_id'];
