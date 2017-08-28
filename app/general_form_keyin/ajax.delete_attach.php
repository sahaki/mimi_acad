<?php
include_once ('../main/include_php.php');

print_r($_POST);

$sql = "DELETE FROM general_attach WHERE attach_id = '{$_POST['attach_id']}'";
$result = $mysqli->ServiceQuery($sql);