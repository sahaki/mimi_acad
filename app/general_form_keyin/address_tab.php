<div>
    <fieldset>
        <legend class="pull-left width-full form-legend">ที่อยู่ปัจจุบัน (สามารถติดต่อได้)</legend>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>บ้านเลขที่</label>
                    <input type="text" name="middle" placeholder="บ้านเลขที่" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>หมู่</label>
                    <input type="text" name="middle" placeholder="หมู่" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ซอย</label>
                    <input type="text" name="middle" placeholder="ซอย" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ถนน</label>
                    <input type="text" name="middle" placeholder="ถนน" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>จังหวัด</label>
                    <?php
                    $sql = "SELECT
                    t1.`code`,
                    t1.name_th
                    FROM config_area_province AS t1
                    ORDER BY t1.name_th ASC";
                    $result = $mysqli->ServiceQuery($sql);
                    ?>
                    <select class="form-control" name="province" id="province">
                        <option value="">เลือก</option>
                        <?php foreach ($result as $index => $value) : ?>
                        <option value="<?php echo $value['code']?>"><?php echo $value['name_th']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>อำเภอ/เขต</label>
                    <?php
                    $sql = "SELECT
                    t1.`code`,
                    t1.name_th
                    FROM config_area_district AS t1
                    ORDER BY t1.name_th ASC";
                    $result = $mysqli->ServiceQuery($sql);
                    ?>
                    <select class="form-control" name="district" id="district">
                        <option value="">เลือก</option>
                        <?php foreach ($result as $index => $value) : ?>
                            <option value="<?php echo $value['code']?>" class="hideobject"><?php echo $value['name_th']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ตำบล/แขวง</label>
                    <?php
                    $sql = "SELECT
                    t1.`code`,
                    t1.name_th
                    FROM config_area_subdistrict AS t1
                    ORDER BY t1.name_th ASC";
                    $result = $mysqli->ServiceQuery($sql);
                    ?>
                    <select class="form-control" name="subdistrict" id="subdistrict">
                        <option value="">เลือก</option>
                        <?php foreach ($result as $index => $value) : ?>
                            <option value="<?php echo $value['code']?>" class="hideobject"><?php echo $value['name_th']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" name="postcode" id="postcode" placeholder="รหัสไปรษณีย์" class="form-control" />
                </div>
            </div>
        </div>
    </fieldset>
    <script>
        $(document).ready(function(){
            /****** เลือกจังหวัด *******/
            $('#province').on('change',function(){
                $('#district').val('');
                $('#subdistrict').empty().append('<option value="">เลือก</option>');
                $('#district option').each(function () {
                    if($('#province').val().substr(0,2) == $(this).val().substr(0,2)){
                        $(this).removeClass('hideobject');
                    }else if(!$(this).hasClass("hideobject")){
                        $(this).addClass('hideobject');
                    }
                });
            });

            /****** เลือกอำเภอ*******/
            $('#district').on('change',function(){
                $('#subdistrict').empty().append('<option value="">เลือก</option>');
                getAjaxSubDistrict();
            });
        });
        
        function getAjaxSubDistrict() {
            $.ajax({
                dataType: "json",
                type: 'POST',
                url: '../general_form_keyin/ajax.subdistrict.php',
                data: {
                    'id': $('#district').val()
                },
                success: function (data) {
                    $.each( data, function( key, val ) {
                        $('#subdistrict').append('<option value=' + key+ '>' + val + '</option>');
                    });
                    $('#subdistrict').change();
                }
            });
        }
    </script>
</div>