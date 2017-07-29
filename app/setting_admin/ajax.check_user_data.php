<?php
session_start();
include_once ('../main/include_php.php');
$sql = "SELECT
t1.admin_id
FROM
config_admin_user AS t1
WHERE t1.username = '{$_POST[username]}' ";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
	$arr = $value;
endforeach;
echo json_encode($arr);
?>