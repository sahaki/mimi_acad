<?php
if($_GET['show_ss'] == 'on'){
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
}

if(count($_SESSION['user_login']) < 1) :
   echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">';
elseif($_SESSION['user_login']['lock_id'] == 'on' && ($_GET['page'] == '' || $_GET['page'] == 'general_dashboard')):
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=?page=general_form_keyin&general_id='.$_SESSION['user_login']['admin_id'].'">';
elseif($_SESSION['user_login']['lock_id'] == 'on' && $_GET['general_id'] != $_SESSION['user_login']['admin_id']):
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=?page=general_form_keyin&general_id='.$_SESSION['user_login']['admin_id'].'">';
elseif($_GET['page'] == 'general_form_keyin') :
    include_once( '../general_form_keyin/form.php' );
elseif($_GET['page'] == 'general_dashboard') :
	include_once('../general_dashboard/dashboard.php');
elseif($_GET['page'] == 'setting_general') :
    include_once('../setting_general/form.php');
elseif($_GET['page'] == 'setting_admin') :
	include_once( '../setting_admin/dashboard.php' );
elseif($_GET['page'] == 'setting_club' && $_SESSION['user_login']['admin_type'] == 'admin') :
    include_once( '../setting_club/dashboard.php' );
elseif($_GET['page'] == 'setting_position' && $_SESSION['user_login']['admin_type'] == 'admin') :
	include_once( '../setting_position/dashboard.php' );
elseif($_SESSION['user_login']['admin_id'] != ''):
	include_once( '../setting_general/form.php' );
else:
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">';
endif;