<?php
include_once ('../main/include_php.php');

if($_POST['club_id'] != '' && $_POST['club_id'] != '0'){
	$sql = "UPDATE config_club SET 
	club_name_th ='{$_POST['name_th']}',
	club_name_en ='{$_POST['name_en']}',
	club_name_short ='{$_POST['club_name_short']}',
	club_stadium_name ='{$_POST['club_stadium_name']}',
	club_stadium_value ='{$_POST['club_stadium_value']}',
	club_history ='{$_POST['club_history']}',
	club_logo_path = '{$_POST['club_logo_path']}'
	WHERE club_id ='{$_POST['club_id']}'";
}
$result = $mysqli->ServiceQuery($sql);

if($_POST['club_id'] == ''){
	echo $clubId = $mysqli->connect->insert_id;
}else{
	echo $clubId = $_POST['club_id'];
}