<?php
$sql ="SELECT
t1.position_id,
t1.position_label
FROM
config_position AS t1
WHERE t1.`status` = '1'
ORDER BY t1.orderby ASC";

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
                       data-toggle="modal" data-target="#myModal" data-id=""><i class="fa fa-plus" style="margin-top: 3px;"></i></a>
                </div>
                <h4 class="panel-title">ข้อมูลตำแหน่งผู้เล่นในสนาม</h4>
            </div>
            <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                    <tr>
                        <td width="5%">ลำดับ</td>
                        <td>ตำแหน่ง</td>
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
                        <td><?php echo $val['position_label']?></td>
                        <td class="text-center">
                        <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning"
                           data-toggle="modal" data-target="#myModal"
                           data-id="<?php echo $val['position_id']?>" data-value="<?php echo $val['position_label']?>">
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
                <h4 class="modal-title">จัดการข้อมูลตำแหน่งในสนาม</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3">ชื่อตำแหน่ง</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="position_label" name="position_label"
                                   placeholder="ชื่อตำแหน่ง" value="">
                            <input type="hidden" name="position_id" id="position_id" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
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
                    $('#position_id').val('');
                    $('#position_label').val('');
                }else{
                    $('#position_id').val($(this).attr('data-id'));
                    $('#position_label').val($(this).attr('data-value'));
                }
            }
        );

        $('#save_data').on('click',
            function(){
                $.ajax({
                    type: 'POST',
                    url: '../setting_position/ajax.save_position.php',
                    data: {
                        'position_id': $('#position_id').val(),
                        'position_label': $('#position_label').val(),
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
                            url: '../setting_position/ajax.save_position.php',
                            data: {
                                'position_id': $('#position_id').val(),
                                'position_label': $('#position_label').val(),
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