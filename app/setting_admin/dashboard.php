<?php
$sql ="SELECT
t1.admin_id,
t1.username,
t1.name_th,
t1.surname_th,
t1.job_position,
t1.date_create
FROM
config_admin_user AS t1";

$result = $mysqli->ServiceQuery($sql);
?>
<!-- ================== datatable ================== -->
<link href="../assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />

<div id="content" class="content">
    <div class="row">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-success"
                       data-toggle="modal" data-target="#myModal" data-id="">
                        <i class="fa fa-plus" style="margin-top: 3px;"></i></a>
                </div>
                <h4 class="panel-title">ข้อมูลผู้ดูแลระบบ</h4>
            </div>
            <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                    <tr>
                        <td width="5%">ลำดับ</td>
                        <td>ชื่อผู้ใช้งาน</td>
                        <td>ชื่อ - สกุล</td>
                        <td>ตำแหน่ง</td>
                        <td>วันที่สร้าง</td>
                        <td width="10%">รายละเอียด</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                    $cnt = 1;
                    foreach ($result as $key => $val):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $cnt?></td>
                        <td><?php echo $val['username']?></td>
                        <td><?php echo $val['name_th']." ".$val['surname_th']?></td>
                        <td><?php echo $val['job_position']?></td>
                        <td><?php echo $val['date_create']?></td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning"
                               data-toggle="modal" data-target="#myModal"
                               data-id="<?php echo $val['admin_id']?>">
                                <i class="fa fa-folder-open" style="margin-left: 3px;"></i></a>
                        </td>
                    </tr>
                    <?php $cnt++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class=" btn btn-xs btn-icon btn-circle btn-danger"
                        data-dismiss="modal" style="float: right;">
                    <i class="fa fa-times"></i>
                </button>
                <h4 class="modal-title">จัดการข้อมูลผู้ดูแลระบบ</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-6 col-sm-6">
                                <label>ชื่อ</label>
                                <input class="form-control" type="text" id="name_th" name="name_th"
                                       placeholder="ชื่อ" value="">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label>นามสกุล</label>
                                <input class="form-control" type="text" id="surname_th" name="surname_th"
                                       placeholder="นามสกุล" value="">
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-12 col-sm-12">
                                <label>ตำแหน่ง</label>
                                <input class="form-control" type="text" id="job_position" name="job_position"
                                       placeholder="ตำแหน่ง" value="">
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-12 col-sm-12">
                                <label>Username</label>
                                <input class="form-control" type="text" id="username" name="username"
                                       placeholder="Username" value="">
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-12 col-sm-12">
                                <label>Password</label>
                                <input class="form-control" type="password" id="password" name="password"
                                       placeholder="Password" value="">
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-12 col-sm-12">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                                       placeholder="Confirm Password" value="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="admin_id" value="">
                <a href="javascript:;" class="btn btn-sm btn-success" id="save_data">บันทึกข้อมูล</a>
                <a href="javascript:;" class="btn btn-sm btn-danger" id="del_data">ลบข้อมูล</a>
            </div>
        </div>

    </div>
</div>
<!-- end Modal -->


<!-- ================== datatable ================== -->
<script src="../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../assets/plugins/DataTables/js/dataTables.responsive.js"></script>
<script src="../assets/js/table-manage-responsive.demo.min.js"></script>

<script>
    $(document).ready(function() {
        TableManageResponsive.init();

        $('[data-toggle="modal"]').on('click',
            function(e) {
                if($(this).attr('data-id') == ''){
                    $('#admin_id').val('');
                    $('#username').val('');
                    $('#name_th').val('');
                    $('#surname_th').val('');
                    $('#job_position').val('');
                    $('#password').val('');
                    $('#confirm_password').val();
                }else{
                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../setting_admin/ajax.get_user_data.php',
                        data: {
                            'admin_id': $(this).attr('data-id')
                        },
                        success: function (data) {

                            $('#admin_id').val(data.admin_id);
                            $('#username').val(data.username);
                            $('#name_th').val(data.name_th);
                            $('#surname_th').val(data.surname_th);
                            $('#job_position').val(data.job_position);
                            $('#password').val('');
                            $('#confirm_password').val('');
                        }
                    });
                }
            }
        );

        $('#save_data').on('click',
            function(){
                $.ajax({
                    type: 'POST',
                    url: '../setting_admin/ajax.save_admin.php',
                    data: {
                        'admin_id': $('#admin_id').val(),
                        'username': $('#username').val(),
                        'password': $('#password').val(),
                        'name_th': $('#name_th').val(),
                        'surname_th': $('#surname_th').val(),
                        'job_position': $('#job_position').val(),
                        'action_type' : 'modify'
                    },
                    success: function (data) {
                        swal({
                                title: "",
                                text: "บันทึกข้อมุลเรียบร้อย",
                                type: "success",
                                confirmButtonText: "ตกลง",
                                closeOnConfirm: true
                            },
                            function(){
                                window.location = '';
                            });
                    }
                });
            }
        );

        $('#del_data').on('click',
            function(){
                swal({
                        title: "ยืนยันการลบข้อมูล",
                        text: "ท่านต้องการลบข้อมูลใช่หรือไม่ ?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "ยืนยัน",
                        cancelButtonText: "ยกเลิก",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $.ajax({
                                type: 'POST',
                                url: '../setting_admin/ajax.save_admin.php',
                                data: {
                                    'admin_id': $('#admin_id').val(),
                                    'action_type' : 'delete'
                                },
                                success: function (data) {
                                    swal({
                                            title: "",
                                            text: "ลบข้อมุลเรียบร้อย",
                                            type: "success",
                                            confirmButtonText: "ตกลง",
                                            closeOnConfirm: true
                                        },
                                        function(){
                                            window.location = '';
                                        });
                                }
                            });
                        } else {
                            swal({
                                    title: "",
                                    text: "ยกเลิกการลบข้อมูล",
                                    type: "error",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                },
                                function(){
                                    $('#myModal').modal('toggle')
                                });
                        }
                    });
            }
        );
    });
</script>