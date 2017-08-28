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
            <li class="<?php echo $active?>"><a href="?page=general_dashboard"><i class="fa fa-users"></i> <span>แก้ไขข้อมูลส่วนตัว</span></a></li>



            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>