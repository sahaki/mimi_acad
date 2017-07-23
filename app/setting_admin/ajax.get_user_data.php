<?php
include_once ('../main/include_php.php');
$sql = "SELECT
t1.admin_id,
t1.username,
t1.`password`,
t1.name_th,
t1.surname_th,
t1.job_position
FROM
config_admin_user AS t1
WHERE t1.admin_id = '{$_POST[admin_id]}' ";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
	$arr = $value;
endforeach;
echo json_encode($arr);
?>