<?php
include_once ('../main/include_php.php');

if($_POST['action_type'] == 'delete'){
    $sql = "DELETE FROM config_admin_user WHERE admin_id ='{$_POST['admin_id']}'";
}elseif($_POST['admin_id'] != ''){
    $password = ($_POST['password'] != '') ? "`password` ='".md5($_POST['password'])."'," : "";

    $sql = "UPDATE config_admin_user SET 
	username ='{$_POST['username']}',
	{$password}
	admin_type = '{$_POST['admin_type']}}',
	name_th ='{$_POST['name_th']}',
	surname_th ='{$_POST['surname_th']}',
	job_position ='{$_POST['job_position']}'
	WHERE admin_id ='{$_POST['admin_id']}'";
}else{
    $sql = "INSERT INTO config_admin_user SET 
	username ='{$_POST['username']}',
	`password` ='".md5($_POST['password'])."',
	admin_type = '{$_POST['admin_type']}}',
	name_th ='{$_POST['name_th']}',
	surname_th ='{$_POST['surname_th']}',
	job_position ='{$_POST['job_position']}',
	date_create = '".date('Y-m-d')."' ";
}
$result = $mysqli->ServiceQuery($sql);

if($_POST['admin_id'] == ''){
    echo $mysqli->connect->insert_id;
}else{
    echo $_POST['admin_id'];
}