<?php
if($_GET['page'] == 'general_form_keyin') :
    include_once( '../general_form_keyin/form.php' );
elseif($_GET['page'] == 'general_dashboard') :
	include_once('../general_dashboard/dashboard.php');
else: ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">
<?php endif; ?>