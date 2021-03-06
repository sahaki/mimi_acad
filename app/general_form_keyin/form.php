<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/custom_wizards/components.css" rel="stylesheet">
<!-- ================== END PAGE LEVEL STYLE ================== -->


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="../assets/plugins/custom_wizards/blankon.form.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->


<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default"
                           title="back" id="goback"><i class="fa fa-angle-double-left"></i></a>

                        <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning"
                           data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <!--<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i class="fa fa-repeat"></i></a>-->
                        <!--<a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>-->
                        <?php if($_GET['general_id'] != '') : ?>
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-danger"
                           onclick="delThisdata('<?php echo $_GET['general_id']?>')"><i class="fa fa-times"></i></a>
                        <?php endif; ?>
                    </div>
                    <h4 class="panel-title">จัดการข้อมูลผู้เล่น</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Start progress bar wizard -->
                            <div id="progress-wizard">
                                <div class="panel panel-tab rounded shadow">

                                    <!-- Start tabs heading -->
                                    <div class="panel-heading no-padding">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab3-1" data-toggle="tab">
                                                    <i class="fa fa-user"></i>
                                                    <div>
                                                        <span class="text-strong">Step 1</span>
                                                        <span>ข้อมูลผู้สมัคร</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-2" data-toggle="tab">
                                                    <i class="fa fa-map-marker"></i>
                                                    <div>
                                                        <span class="text-strong">Step 2</span>
                                                        <span>ข้อมูลเกี่ยวกับฟุตบอล</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-3" data-toggle="tab">
                                                    <i class="fa fa-users"></i>
                                                    <div>
                                                        <span class="text-strong">Step 3</span>
                                                        <span>ที่อยู่ที่ติดต่อได้</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-4" data-toggle="tab">
                                                    <i class="fa fa-check-circle"></i>
                                                    <div>
                                                        <span class="text-strong">Step 4</span>
                                                        <span>ข้อมูลผู้ปกครอง</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-5" data-toggle="tab">
                                                    <i class="fa fa-check-circle"></i>
                                                    <div>
                                                        <span class="text-strong">Step 5</span>
                                                        <span>เอกสารแนบ</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.panel-heading -->
                                    <!--/ End tabs heading -->

                                    <div class="panel-sub-heading">
                                        <div class="inner-all">
                                            <div class="progress progress-striped active no-margin progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar"
                                                     aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.panel-sub-heading -->

                                    <!-- Start tabs content -->
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active inner-all" id="tab3-1">
												<?php include( "general_tab.php" ); ?>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-2">
												<?php include( "position_tab.php" ); ?>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-3">
												<?php include( "address_tab.php" ); ?>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-4">
												<?php include( "curator_tab.php" ); ?>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-5">
	                                            <?php include( "attacth_tab.php" ); ?>
                                            </div>
                                        </div>
                                    </div><!-- /.panel-body -->
                                    <!--/ End tabs content -->

                                    <!-- Start pager -->
                                    <div class="panel-footer" style="display:none;">
                                        <ul class="pager wizard no-margin">
                                            <li class="previous"><a href="javascript:void(0);">ย้อนกลับ</a></li>
                                            <li class="next"><a href="javascript:void(0);">ต่อไป</a></li>
                                        </ul>
                                    </div><!-- /.panel-footer -->
                                    <!--/ End pager -->
                                    <script>
                                        $(document).ready(function(){
                                            $('#goback').on('click',function () {
                                                swal({
                                                        title: "คำเตือน",
                                                        text: "คุณต้องการออกจากหน้านี้หรือไม่?",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText: "ยืนยัน",
                                                        cancelButtonText: "ยกเลิก",
                                                        closeOnConfirm: false
                                                    },
                                                    function(){
                                                        window.location = '?page=general_dashboard';
                                                    });
                                            })
                                        });

                                        function delThisdata(general_id){
                                            swal({
                                                    title: "คำเตือน",
                                                    text: "คุณต้องการลบข้อมูลนี้ออกจากระบบหรือไม่?",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#DD6B55",
                                                    confirmButtonText: "ยืนยัน",
                                                    cancelButtonText: "ยกเลิก",
                                                    closeOnConfirm: false
                                                },
                                                function(){
                                                    $.ajax({
                                                        type: 'POST',
                                                        async: false,
                                                        url: '../general_form_keyin/ajax.delete_general.php',
                                                        data: {'general_id':general_id},
                                                        success: function () {
                                                            window.location = '?page=general_dashboard';
                                                        }
                                                    });


                                                });
                                        }
                                    </script>
                                </div>
                            </div><!-- /#progress-wizard -->
                            <!--/ End progress bar wizard-->
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
