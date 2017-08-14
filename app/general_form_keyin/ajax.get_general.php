<?php
include_once ('../main/include_php.php');
$sql = "SELECT
t1.general_id,
t1.idcard,
t2.club_id,
t2.club_name_th,
t1.name_th,
t1.surname_th
FROM
general_infomation AS t1
LEFT JOIN config_club AS t2 ON t1.club_id = t2.club_id
WHERE t1.idcard = '{$_POST['idcard']}'";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
    $arr = $value;
endforeach;
echo json_encode($arr);
?>