<div class="panel panel-inverse" data-sortable-id="ui-modal-notification-1">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-warning" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
        </div>
        <h4 class="panel-title">ตั้งค่าข้อมูลเว็บไซต์</h4>
    </div>
    <div class="panel-body">
        <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" novalidate="">
            <div class="form-group">
                <legend>ข้อมูลทั่วไป</legend>
                <label class="control-label col-md-3 col-sm-3">ชื่อระบบ :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="system_name" name="system_name" placeholder="ชื่อระบบ"
                           value="<?php echo $_SESSION['core_config']['system_name']?>">
                </div>
                <label class="control-label col-md-3 col-sm-3">หน่วยงาน :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control" type="text" id="company_name" name="company_name" placeholder="หน่วยงาน"
                           value="<?php echo $_SESSION['core_config']['company_name']?>">
                </div>
                <label class="control-label col-md-3 col-sm-3">Logo :</label>
                <div class="col-md-8 col-sm-8">
                    <img src="<?php echo $_SESSION['core_config']['logo_path']?>" width="50"><br>
                    <div style="margin-top:5px;">คลิกที่รูปเพื่ออัพโหลดรูปใหม่</div>
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
                url: '../setting_general/ajax.save_general_tab.php',
                data: {
                    'system_name': $('#system_name').val(),
                    'company_name': $('#company_name').val(),
                    'height_unit': $('#height_unit').val(),
                    'weight_unit': $('#weight_unit').val()
                },
                success: function (data) {
                    swal("", "บันทึกข้อมุลเรียบร้อย", "success");
                }
            });

        });
    });
</script>