<?php
include_once ('../main/include_php.php');


$sql = "UPDATE config_core SET config_value = '{$_POST[system_name]}' 
WHERE config_var ='system_name'";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[company_name]}' 
WHERE config_var ='company_name'";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[height_unit]}' 
WHERE config_var ='height_unit'";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[weight_unit]}' 
WHERE config_var ='weight_unit'";
$result = $mysqli->ServiceQuery($sql);

echo "success";