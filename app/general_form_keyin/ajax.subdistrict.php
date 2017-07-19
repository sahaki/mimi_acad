<?php
include_once ('../main/include_php.php');
$sql = "SELECT
t1.`code`,
t1.name_th
FROM config_area_subdistrict AS t1
WHERE SUBSTR(t1.`code`,1,4) = '".substr($_POST['id'],0,4)."'
ORDER BY t1.name_th ASC  ";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
    $arr[$value['code']] = $value['name_th'];
endforeach;
echo json_encode($arr);
?>