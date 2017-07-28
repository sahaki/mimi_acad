<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="../assets/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
	                <?php echo $_SESSION['user_login']['full_name']?>
                    <small><?php echo $_SESSION['user_login']['job_position']?></small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->

        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">จัดการข้อมูล</li>

            <?php $active = (preg_match('/general_/',$_GET['page'])) ? "active" : ""; ?>
            <li class="<?php echo $active?>"><a href="?page=general_dashboard"><i class="fa fa-users"></i> <span>ข้อมูลนักกีฬา</span></a></li>

            <?php $active = (preg_match('/setting_/',$_GET['page'])) ? "active" : ""; ?>
            <li class="has-sub <?php echo $active?>">
                <a href="javascript:;"><b class="caret pull-right"></b><i class="fa fa-gears"></i> <span>ตั้งค่า</span></a>
                <ul class="sub-menu">
	                <?php $active = ($_GET['page'] == 'setting_general') ? "active" : ""; ?>
                    <li class="<?php echo $active?>"><a href="?page=setting_general"><i class="fa fa-cubes"></i> ข้อมูลทั่วไปของระบบ</a></li>
	                <?php $active = ($_GET['page'] == 'setting_admin') ? "active" : ""; ?>
                    <li class="<?php echo $active?>"><a href="?page=setting_admin"><i class="fa fa-user"></i> ผู้ดูแลลระบบ</a></li>
                    <?php $active = ($_GET['page'] == 'setting_club') ? "active" : ""; ?>
                    <li class="<?php echo $active?>"><a href="?page=setting_club"><i class="fa fa-user"></i> ข้อมูล Club</a></li>
	                <?php $active = ($_GET['page'] == 'setting_position') ? "active" : ""; ?>
                    <li class="<?php echo $active?>"><a href="?page=setting_position"><i class="fa fa-trophy"></i> ตำแหน่งในสนาม</a></li>
                </ul>
            </li>


            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>