<?php
include_once ('../main/include_php.php');

$delete = "DELETE FROM general_curator WHERE general_id = '{$_POST['general_id']}' ";
$mysqli->ServiceQuery($delete);

if(count($_POST['sendData']) > 0){
    foreach ($_POST['sendData'] as $index => $value):
	    if($value[curator_name] != '') :
	        $sql = "REPLACE INTO general_curator SET
	        general_id = '{$_POST[general_id]}',
	        curator_name_th = '{$value[curator_name]}',
	        curator_surname_th = '{$value[curator_surname]}',
	        curator_tel = '{$value[curator_tel]}',
	        curator_relation = '{$value[curator_relation]}'";
	        $result = $mysqli->ServiceQuery($sql);
        endif;
    endforeach;
}
echo $_POST['general_id'];
