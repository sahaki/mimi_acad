<?php
include_once ('../main/include_php.php');

if($_POST['general_id'] != ''){
	$sql = "UPDATE general_infomation SET";
	$sql_where = " WHERE general_id = '{$_POST[general_id]}'";
}else{
	$sql = "INSERT INTO general_infomation SET";
	$sql_where = "";
}

$register_date = date('Y-m-d');
if($_POST['register_date'] != ''){
	$arr_date = explode('/',$_POST['register_date']);
	$register_date = $arr_date[2].'-'.$arr_date[1].'-'.$arr_date[0];
}

$birth_date= null;
if($_POST['birth_date'] != ''){
	$arr_date = explode('/',$_POST['birth_date']);
	$birth_date = $arr_date[2].'-'.$arr_date[1].'-'.$arr_date[0];
}


$sql_detail = " general_id = '{$_POST[general_id]}',
register_date = '{$register_date}',
birth_date = '{$birth_date}',
idcard = '{$_POST[idcard]}',
name_th = '{$_POST[name_th]}',
surname_th = '{$_POST[surname_th]}',
nickname_th = '{$_POST[nickname_th]}',
origin = '{$_POST[origin]}',
nationality = '{$_POST[nationality]}',
religion = '{$_POST[religion]}',
blood_id = '{$_POST[blood_id]}',
height = '{$_POST[height]}',
weight = '{$_POST[weight]}',
education_class = '{$_POST[education_class]}',
school_name = '{$_POST[school_name]}',
favorite_sport = '{$_POST[favorite_sport]}',
congenital_disease = '{$_POST[congenital_disease]}',
food_allergy = '{$_POST[food_allergy]}'";

$sql .= $sql_detail.$sql_where;
$result = $mysqli->ServiceQuery($sql);

if($_POST['general_id'] == ''){
	echo $mysqli->connect->insert_id;
}else{
	echo $_POST['general_id'];
}
