<?php
include_once ('../main/include_php.php');

if($_POST['action_type'] == 'delete'){
	$sql = "DELETE FROM config_club WHERE club_id = '{$_POST['club_id']}'";
	if(file_exists($_POST['logo_path']) && $_POST['logo_path'] != "../../media/person_register/blank.png"){
		unlink($_POST['logo_path']);
	}
	$delete = "DELETE FROM `config_core` WHERE club_id = '{$_POST['club_id']}'";
	$mysqli->ServiceQuery($delete);
}elseif($_POST['club_id'] != '' && $_POST['club_id'] != '0'){
	$sql = "UPDATE config_club SET 
	club_name_th ='{$_POST['name_th']}',
	club_name_en ='{$_POST['name_en']}',
	club_name_short ='{$_POST['club_name_short']}',
	club_stadium_name ='{$_POST['club_stadium_name']}',
	club_stadium_value ='{$_POST['club_stadium_value']}',
	club_history ='{$_POST['club_history']}'
	WHERE club_id ='{$_POST['club_id']}'";
}else{
	$sql = "INSERT INTO config_club SET 
	club_name_th ='{$_POST['name_th']}',
	club_name_en ='{$_POST['name_en']}',
	club_name_short ='{$_POST['name_short']}',
	club_stadium_name ='{$_POST['club_stadium_name']}',
	club_stadium_value ='{$_POST['club_stadium_value']}',
	club_history ='{$_POST['club_history']}' ";
}
$result = $mysqli->ServiceQuery($sql);

if($_POST['club_id'] == ''){
	echo $clubId = $mysqli->connect->insert_id;
}else{
	echo $clubId = $_POST['club_id'];
}

// Upload logo
if(count($_FILES['file_logo_img']['name']) > 0 && $clubId != ''){
    $path = $_FILES['file_logo_img']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $imgPath = '../../media/logo/'.$clubId.'_logo.'.$ext;
    if(move_uploaded_file($_FILES['file_logo_img']['tmp_name'], $imgPath)){
        $sql = "UPDATE config_club SET club_logo_path='{$imgPath}' WHERE club_id ='{$clubId}' ";
        $result = $mysqli->ServiceQuery($sql);
    }
}

// Create Core config
if($clubId != ''){
	$sql = "SELECT
	COUNT(t1.club_id) AS num
	FROM
	config_core AS t1 WHERE t1.club_id ='{$clubId}'";
	$result = $mysqli->ServiceQuery($sql);
	$result = $result->fetch_assoc();

	if($result['num'] == 0){
		$sql = "INSERT INTO config_core SET
		club_id = '{$clubId}',
		config_var ='system_name',
		config_value = 'ระบบบริหารจัดการข้อมูลบุคคล'";
		$mysqli->ServiceQuery($sql);

		$sql = "INSERT INTO config_core SET
		club_id = '{$clubId}',
		config_var ='company_name',
		config_value = '{$_POST['name_th']}'";
		$mysqli->ServiceQuery($sql);

		$sql = "INSERT INTO config_core SET
		club_id = '{$clubId}',
		config_var ='height_unit',
		config_value = 'Cm.'";
		$mysqli->ServiceQuery($sql);

		$sql = "INSERT INTO config_core SET
		club_id = '{$clubId}',
		config_var ='weight_unit',
		config_value = 'Kg.'";
		$mysqli->ServiceQuery($sql);

		$sql = "INSERT INTO config_core SET
		club_id = '{$clubId}',
		config_var ='logo_path',
		config_value = '{$imgPath}'";
		$mysqli->ServiceQuery($sql);
	}
}