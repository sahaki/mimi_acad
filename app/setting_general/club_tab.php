<?php
$sql = "SELECT
t1.club_id,
t1.club_name_th,
t1.club_name_en,
t1.club_name_short,
t1.club_stadium_name,
t1.club_stadium_value,
t1.club_history,
t1.club_logo_path
FROM
config_club AS t1
WHERE t1.club_id = '{$_SESSION['user_login']['club_id']}' ";
$result = $mysqli->ServiceQuery($sql);
?>
<?php
foreach ($result as $index => $value) :
	$arr = $value;
endforeach;
?>
<div class="panel panel-inverse" data-sortable-id="ui-modal-notification-1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
        </div>
        <h4 class="panel-title">ตั้งค่าข้อมูลเว็บไซต์</h4>
    </div>
    <div class="panel-body">
        <form class="form-horizontal form-bordered" id="general_setting" data-parsley-validate="true" name="demo-form" novalidate="">
            <div class="form-group">
                <legend>ข้อมูลทั่วไป</legend>
                <label class="control-label col-md-3 col-sm-3">ชื่อระบบ :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="system_name" name="system_name" placeholder="ชื่อระบบ"
                           value="<?php echo $_SESSION['core_config']['system_name']?>">
                </div>
                <label class="control-label col-md-3 col-sm-3">ชื่อคลับภาษาไทย :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="company_name" name="company_name" placeholder="หน่วยงาน"
                           value="<?php echo $_SESSION['core_config']['company_name']?>">
                </div>

                <label class="control-label col-md-3 col-sm-3">ชื่อคลับภาษาอังกฤษ :</label>
                <div class="col-md-8 col-sm-8">
                <input class="form-control" type="text" id="name_en" name="name_en"
                       placeholder="ชื่อคลับภาษาอังกฤษ" value="<?php echo $arr['club_name_en']?>">
                </div>

                <label class="control-label col-md-3 col-sm-3">ชื่อย่อ :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="name_short" name="name_short"
                           placeholder="ชื่อย่อ" value="<?php echo $arr['club_name_short']?>">
                </div>

                <label class="control-label col-md-3 col-sm-3">ชื่อสนามเหย้า :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="club_stadium_name" name="club_stadium_name"
                           placeholder="ชื่อสนามเหย้า" value="<?php echo $arr['club_stadium_name']?>">
                </div>

                <label class="control-label col-md-3 col-sm-3">ความจุคนในสนาม :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="club_stadium_value" name="club_stadium_value"
                           placeholder="ความจุคนในสนาม" value="<?php echo $arr['club_stadium_value']?>">
                </div>

                <label class="control-label col-md-3 col-sm-3">ความจุคนในสนาม :</label>
                <div class="col-md-8 col-sm-8">
                    <textarea class="form-control" style="height: 150px;" name="club_history" id="club_history"><?php echo $arr['club_history']?></textarea>
                </div>

                <label class="control-label col-md-3 col-sm-3">Logo :</label>
                <div class="col-md-8 col-sm-8">
                    <img src="<?php echo $_SESSION['core_config']['logo_path']?>?date=<?php echo date('Y-m-d')?>" width="50" id="img_logo" style="cursor: pointer"><br>
                    <div style="margin-top:5px;">คลิกที่รูปเพื่ออัพโหลดรูปใหม่</div>
                    <input type="file" name="file_logo_img" id="file_logo_img" style="display: none;">
                </div>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <legend>ฟอร์มบันทึกข้อมูล</legend>
                <label class="control-label col-md-3 col-sm-3">ส่วนสูง :</label>
                <div class="col-md-8 col-sm-8">
                    <div class="col-md-2" style="margin: 0; padding: 0;">
                        <input class="form-control" type="text" id="height_unit" name="height_unit" placeholder="ส่วนสูง"
                               value="<?php echo $_SESSION['core_config']['height_unit']?>">
                    </div>
                </div>

                <label class="control-label col-md-3 col-sm-3">น้ำหนัก :</label>
                <div class="col-md-8 col-sm-8">
                    <div class="col-md-2" style="margin: 0; padding: 0;">
                        <input class="form-control" type="text" id="weight_unit" name="weight_unit" placeholder="น้ำหนัก"
                               value="<?php echo $_SESSION['core_config']['weight_unit']?>">
                    </div>
                </div>

                <input type="hidden" id="club_id" name="club_id"
                       value="<?php echo $_SESSION['user_login']['club_id']?>">
                <label class="control-label col-md-3 col-sm-3"></label>
                <div class="col-md-6 col-sm-6">
                    <input type="button" id="save_data" class="btn btn-success" value="บันทึกข้อมูล">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#save_data').on('click',function(){
            $.ajax({
                type: 'POST',
                async: false,
                url: '../setting_general/ajax.save_general_tab.php',
                data: new FormData($("#general_setting")[0]),
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

            $.ajax({
                type: 'POST',
                url: '../setting_general/ajax.save_club.php',
                data: {
                    'club_id': $('#club_id').val(),
                    'name_th': $('#company_name').val(),
                    'name_en': $('#name_en').val(),
                    'club_name_short': $('#name_short').val(),
                    'club_stadium_name': $('#club_stadium_name').val(),
                    'club_stadium_value': $('#club_stadium_value').val(),
                    'club_history': $('#club_history').val()
                }
            });
        });

        $('#img_logo').on('click',function(){
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
                    $('#img_logo').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>