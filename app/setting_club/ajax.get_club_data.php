<?php
include_once ('../main/include_php.php');
$sql = "SELECT
t1.club_id,
t1.club_name_th,
t1.club_name_en,
t1.club_name_short,
t1.club_stadium_name,
t1.club_stadium_value,
t1.club_history
FROM
config_club AS t1
WHERE t1.club_id = '{$_POST[club_id]}' ";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
	$arr = $value;
endforeach;
echo json_encode($arr);
?>