<?php
session_start();

include_once ('../main/include_php.php');
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));
$birthday = htmlspecialchars($_POST['password']);


$sql = "SELECT
t1.admin_id,
t1.username,
t1.name_th,
t1.surname_th,
t1.job_position,
t1.admin_type,
t1.club_id
FROM
config_admin_user AS t1
WHERE t1.username = '{$username}' AND t1.`password` = '{$password}'";

$result = $mysqli->ServiceQuery($sql);
foreach ($result as $index => $value) :
	$arr = $value;
endforeach;

$sql = "SELECT
t1.general_id,
t1.idcard,
t1.name_th,
t1.surname_th,
t1.club_id
FROM
general_infomation AS t1
WHERE t1.idcard = '{$username}' AND replace(t1.birth_date,'-','') = '{$birthday}'";

$result = $mysqli->ServiceQuery($sql);
foreach ($result as $index => $value) :
	$arr2 = $value;
endforeach;

if(count($arr) > 0) {
	$_SESSION['user_login']['admin_id']     = $arr['admin_id'];
	$_SESSION['user_login']['full_name']    = $arr['name_th'] . " " . $arr['surname_th'];
	$_SESSION['user_login']['job_position'] = $arr['job_position'];
	$_SESSION['user_login']['admin_type']   = $arr['admin_type'];
	$_SESSION['user_login']['club_id']      = $arr['club_id'];
	echo "success";
}elseif(count($arr2) > 0){
	$_SESSION['user_login']['admin_id']     = $arr2['general_id'];
	$_SESSION['user_login']['full_name']    = $arr2['name_th'] . " " . $arr2['surname_th'];
	$_SESSION['user_login']['job_position'] = 'นักกีฬา';
	$_SESSION['user_login']['admin_type']   = 'child';
	$_SESSION['user_login']['club_id']      = $arr2['club_id'];
	$_SESSION['user_login']['lock_id']      = 'on';
}else{
	echo "error";
}