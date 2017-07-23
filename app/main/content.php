<?php
if(count($_SESSION['user_login']) < 1) :
?>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">
<?php
elseif($_GET['page'] == 'general_form_keyin') :
    include_once( '../general_form_keyin/form.php' );
elseif($_GET['page'] == 'general_dashboard') :
	include_once('../general_dashboard/dashboard.php');
elseif($_GET['page'] == 'setting_general') :
    include_once('../setting_general/form.php');
elseif($_GET['page'] == 'setting_admin') :
	include_once( '../setting_admin/dashboard.php' );
elseif($_GET['page'] == 'setting_position') :
	include_once( '../setting_position/dashboard.php' );
else: ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">
<?php endif; ?>