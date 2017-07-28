<?php
include_once ('../main/include_php.php');

$sql = "UPDATE config_core SET config_value = '{$_POST[system_name]}' 
WHERE config_var ='system_name' AND club_id = '{$_POST[club_id]}' ";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[company_name]}' 
WHERE config_var ='company_name' AND club_id = '{$_POST[club_id]}' ";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[height_unit]}' 
WHERE config_var ='height_unit' AND club_id = '{$_POST[club_id]}' ";
$result = $mysqli->ServiceQuery($sql);

$sql = "UPDATE config_core SET config_value = '{$_POST[weight_unit]}' 
WHERE config_var ='weight_unit' AND club_id = '{$_POST[club_id]}' ";
$result = $mysqli->ServiceQuery($sql);


if(count($_FILES['file_logo_img']['name']) > 0){
    $path = $_FILES['file_logo_img']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $imgPath = '../../media/logo/'.$_POST[club_id].'_logo.'.$ext;
    if(move_uploaded_file($_FILES['file_logo_img']['tmp_name'], $imgPath)){
        $sql = "UPDATE config_core SET config_value='{$imgPath}' WHERE config_var = 'logo_path'";
        $result = $mysqli->ServiceQuery($sql);
    }
}

echo "success";