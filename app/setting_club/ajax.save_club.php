<?php
include_once ('../main/include_php.php');

if($_POST['action_type'] == 'delete'){
	$sql = "DELETE FROM config_club WHERE club_id ='{$_POST['club_id']}'";
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

if($_POST['admin_id'] == ''){
	echo $mysqli->connect->insert_id;
}else{
	echo $_POST['admin_id'];
}

if(count($_FILES['file_logo_img']['name']) > 0){
    $path = $_FILES['file_logo_img']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $imgPath = '../../media/logo/'.$_POST[club_id].'_logo.'.$ext;
    if(move_uploaded_file($_FILES['file_logo_img']['tmp_name'], $imgPath)){
        $sql = "UPDATE config_club SET club_logo_path='{$imgPath}' WHERE club_id = ='{$_POST['club_id']}' ";
        $result = $mysqli->ServiceQuery($sql);
    }
}