<?php
include_once ('../main/include_php.php');

$sql = "DELETE FROM general_curator WHERE general_id = '{$_POST['general_id']}'";
$result = $mysqli->ServiceQuery($sql);

$sql = "DELETE FROM general_address WHERE general_id = '{$_POST['general_id']}'";
$result = $mysqli->ServiceQuery($sql);

$sql = "DELETE FROM general_football WHERE general_id = '{$_POST['general_id']}'";
$result = $mysqli->ServiceQuery($sql);

$sql = "DELETE FROM general_infomation WHERE general_id = '{$_POST['general_id']}'";
$result = $mysqli->ServiceQuery($sql);

echo $_POST['general_id'];
