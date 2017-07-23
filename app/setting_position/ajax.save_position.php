<?php
include_once ('../main/include_php.php');

if($_POST['action_type'] == 'delete'){
	$sql = "DELETE FROM config_position WHERE position_id ='{$_POST['position_id']}'";
}elseif($_POST['position_id'] != ''){
	$sql = "UPDATE config_position SET position_label = '{$_POST[position_label]}' 
	WHERE position_id ='{$_POST['position_id']}'";
}else{
	$sql = "INSERT INTO config_position SET position_label = '{$_POST[position_label]}'";
}
$result = $mysqli->ServiceQuery($sql);

if($_POST['position_id'] == ''){
	echo $mysqli->connect->insert_id;
}else{
	echo $_POST['position_id'];
}