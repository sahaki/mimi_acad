<?php
session_start();
include_once('include_php.php');
$sql = "SELECT
t1.config_var,
t1.config_value
FROM
config_core AS t1 WHERE t1.club_id = '{$_SESSION['user_login']['club_id']}' ";
$resulte = $mysqli->ServiceQuery($sql);
foreach ($resulte as $index => $value){
    $_SESSION['core_config'][$value['config_var']] = $value['config_value'];
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php
    include_once ('include_css.php');
    include_once ('include_js.php');
    ?>
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="header col-md-5 col-sm-6 col-xs-8" style="padding-bottom: 12px;">
                <a href="index.html" class="navbar-brand" style="margin-right: 0; padding: 8px">
                    <img src="<?php echo $_SESSION['core_config']['logo_path']?>?date=<?php echo date('Y-m-d')?>" height="55" style="float:left; margin-right: 10px;"></a>
                <h3 style="padding: 0; margin: 10px 0 0 0;"><?php echo $_SESSION['core_config']['system_name']?></h3>
                <small><?php echo $_SESSION['core_config']['company_name']?></small>
            </div>
            <!-- end mobile sidebar expand / collapse button -->
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../assets/img/user-13.jpg" alt="" />
                        <span class="hidden-xs"><?php echo $_SESSION['user_login']['full_name']?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="?page=general_dashboard">ข้อมูลนักกีฬา</a></li>
                        <li><a href="?page=setting_general">ตั้งค่าระบบ</a></li>
                        <li class="divider"></li>
                        <li><a href="login.php">ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <?php include_once('sidebar.php'); ?>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <?php include_once('content.php'); ?>
    <!-- end #content -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>