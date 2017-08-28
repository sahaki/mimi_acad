<?php
include_once ('../main/include_php.php');

if(count($_FILES['attacth'])>0){
	for ($i=0; $i <= count($_FILES['attacth']); $i++){
		$path = $_FILES['attacth']['name'][$i];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$uploadPath = '../../media/file_attach/'.date("h-i-sa-").$_POST['general_id'].'.'.$ext;
		if(move_uploaded_file($_FILES['attacth']['tmp_name'][$i], $uploadPath)){
			$sql = "INSERT INTO general_attach SET 
			general_id='{$_POST[general_id]}',
			attach_value = '{$uploadPath}',
			attach_description = '{$_POST['description'][$i]}',
			createtime = NOW(),
			updatetime = NOW()";
			$result = $mysqli->ServiceQuery($sql);
		}
	}
}
die;