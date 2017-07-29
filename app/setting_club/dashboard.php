<?php
$sql ="SELECT
t1.club_id,
t1.club_name_th,
t1.club_name_en,
t1.club_name_short,
t1.club_stadium_name,
t1.club_stadium_value,
t1.club_history
FROM
config_club AS t1";

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
                <h4 class="panel-title">ข้อมูล Football Club</h4>
            </div>
            <div class="panel-body">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                    <tr>
                        <td width="5%">ลำดับ</td>
                        <td>ชื่อ club</td>
                        <td>ชื่อสนาม</td>
                        <td width="15%">ความจุ</td>
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
                        <td><?php echo $val['club_name_th']?></td>
                        <td><?php echo $val['club_stadium_name']?></td>
                        <td class="text-right"><?php echo $val['club_stadium_value']?></td>
                        <td class="text-center">
                            <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning"
                               data-toggle="modal" data-target="#myModal"
                               data-id="<?php echo $val['club_id']?>">
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
                <h4 class="modal-title">จัดการข้อมูล Football Club</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" id="club_setting" data-parsley-validate="true" name="demo-form" novalidate="">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-4 col-md-4" style="text-align: center;">
                            <?php
                            $img_path = "../../media/person_register/blank.png";
                            ?>
                            <img src="<?php echo $img_path?>?date=<?php echo date('Y-m-d')?>" width="180" style="cursor: pointer;" id="logo_img"><br>
                            <div style="margin-top:5px;">คลิกที่รูปเพื่ออัพโหลดรูปใหม่</div>
                            <input type="file" name="file_logo_img" id="file_logo_img" style="display: none;">
                            </div>
                            <div class="col-md-8 col-md-8">
                                <div class="col-md-12 col-sm-12" style="padding-right: 0;">
                                    <label>ชื่อคลับภาษาไทย</label>
                                    <input class="form-control" type="text" id="name_th" name="name_th"
                                           placeholder="ชื่อคลับภาษาไทย" value="">
                                </div>
                                <div class="col-md-12 col-sm-12" style="margin-top: 15px; padding-right: 0;">
                                    <label>ชื่อคลับภาษาอังกฤษ</label>
                                    <input class="form-control" type="text" id="name_en" name="name_en"
                                           placeholder="ชื่อคลับภาษาอังกฤษ" value="">
                                </div>
                                <div class="col-md-12 col-sm-12" style="margin-top: 15px; padding-right: 0;">
                                    <label>ชื่อย่อ</label>
                                    <input class="form-control" type="text" id="name_short" name="name_short"
                                           placeholder="ชื่อย่อ" value="">
                                </div>
                            </div>

                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-7 col-sm-7">
                                <label>ชื่อสนามเหย้า</label>
                                <input class="form-control" type="text" id="club_stadium_name" name="club_stadium_name"
                                       placeholder="ชื่อสนามเหย้า" value="">
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <label>ความจุคนในสนาม</label>
                                <input class="form-control" type="text" id="club_stadium_value" name="club_stadium_value"
                                       placeholder="ความจุคนในสนาม" value="">
                            </div>
                        </div>
                        <div class="row" style="padding: 15px 15px 0 15px;">
                            <div class="col-md-12 col-sm-12">
                                <label>ประเวัติความเป็นมาของสโมสร</label>
                                <textarea class="form-control" style="height: 150px;" name="club_history" id="club_history"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="club_id" name="club_id" value="">
                </form>
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

        $('#logo_img').on('click',function(){
            $('#file_logo_img').click();
        });

        $("#file_logo_img").change(function(){

            var file = this.files[0];
            var fileType = file["type"];
            var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];

            if ($.inArray(fileType, ValidImageTypes) < 0) {
                swal("", "ระบบไม่รองรับ ไฟล์ "+fileType, "error");
                $("#file_logo_img").val('');
            }else{
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#logo_img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        $('[data-toggle="modal"]').on('click',
            function(e) {
                if($(this).attr('data-id') == ''){
                    $('#club_id').val('');
                    $('#name_th').val('');
                    $('#name_en').val('');
                    $('#name_short').val('');
                    $('#club_stadium_name').val('');
                    $('#club_stadium_value').val('');
                    $('#club_history').val();
                    $('#logo_img').attr('src','<?php echo $img_path?>');
                }else{
                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../setting_club/ajax.get_club_data.php',
                        data: {
                            'club_id': $(this).attr('data-id')
                        },
                        success: function (data) {
                            $('#club_id').val(data.club_id);
                            $('#name_th').val(data.club_name_th);
                            $('#name_en').val(data.club_name_en);
                            $('#name_short').val(data.club_name_short);
                            $('#club_stadium_name').val(data.club_stadium_name);
                            $('#club_stadium_value').val(data.club_stadium_value);
                            $('#club_history').val(data.club_history);
                            if($.trim(data.club_logo_path)){
                                $('#logo_img').attr('src',data.club_logo_path);
                            }else{
                                $('#logo_img').attr('src','<?php echo $img_path?>');
                            }
                        }
                    });
                }
            }
        );

        $('#save_data').on('click',
            function(){
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '../setting_club/ajax.save_club.php',
                    data: new FormData($("#club_setting")[0]),
                    success: function (data) {

                        swal({
                                title: "",
                                text: "บันทึกข้อมุลเรียบร้อย",
                                type: "success",
                                confirmButtonText: "ตกลง",
                                closeOnConfirm: false
                            },
                            function(){
                                window.location = '';
                            });
                    },
                    cache: false,
                    processData: false,
                    contentType: false
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
                                url: '../setting_club/ajax.save_club.php',
                                data: {
                                    'club_id': $('#club_id').val(),
                                    'logo_path' : $('#logo_img').attr('src'),
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