<div>
    <?php
    $sql = "SELECT
    t1.addr_no,
    t1.addr_moo,
    t1.addr_alley,
    t1.addr_street,
    t1.province_id,
    t1.district_id,
    t1.subdistrict_id,
    t1.postcode
    FROM
    general_address AS t1 WHERE general_id = '{$_GET[general_id]}'";
    $result = $mysqli->ServiceQuery($sql);
    foreach ($result as $index => $value){
        $address = $value;
    }
    ?>
    <fieldset>
        <legend class="pull-left width-full form-legend">ที่อยู่ปัจจุบัน (สามารถติดต่อได้)</legend>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>บ้านเลขที่</label>
                    <input type="text" name="addr_no" id="addr_no" placeholder="บ้านเลขที่" class="form-control"
                           tabindex="1" value="<?php echo $address['addr_no']?>" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>หมู่</label>
                    <input type="text" name="addr_moo" id="addr_moo" placeholder="หมู่" class="form-control"
                           tabindex="2" value="<?php echo $address['addr_moo']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ซอย</label>
                    <input type="text" name="addr_alley" id="addr_alley" placeholder="ซอย" class="form-control"
                           tabindex="3" value="<?php echo $address['addr_alley']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ถนน</label>
                    <input type="text" name="addr_street" id="addr_street" placeholder="ถนน" class="form-control"
                           tabindex="4" value="<?php echo $address['addr_street']?>"/>
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
                    <select class="form-control" name="province" id="province" tabindex="5">
                        <option value="">เลือก</option>
                        <?php foreach ($result as $index => $value) :
                            $select = ($value['code'] == $address['province_id']) ? "selected" : "";
                            ?>
                        <option value="<?php echo $value['code']?>" <?php echo $select?>><?php echo $value['name_th']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>อำเภอ/เขต</label>
                    <?php
                    $whereProvince = ($address['province_id'] != '') ?
                        "WHERE t1.code LIKE '".substr($address['province_id'],0,2)."%'":
                        "";
                    $sql = "SELECT
                    t1.`code`,
                    t1.name_th
                    FROM config_area_district AS t1
                    {$whereProvince}
                    ORDER BY t1.name_th ASC";
                    $result = $mysqli->ServiceQuery($sql);
                    ?>
                    <select class="form-control" name="district" id="district" tabindex="6">
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
                    <select class="form-control" name="subdistrict" id="subdistrict" tabindex="7">
                        <option value="">เลือก</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" name="postcode" id="postcode" placeholder="รหัสไปรษณีย์" class="form-control"
                           tabindex="8" value="<?php echo $address['postcode']?>"/>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="text-align: right; padding: 0;">
            <input type="button" id="next_tab4" class="btn btn-success" value="บันทึกข้อมูล >>" tabindex="9">
        </div>
    </fieldset>
    <script>
        $(document).ready(function(){
            /****** Onload *******/
            if($('#province').val() != ''){
                $('#district option').each(function () {
                    if($('#province').val().substr(0,2) == $(this).val().substr(0,2)){
                        $(this).removeClass('hideobject');
                    }else if(!$(this).hasClass("hideobject")){
                        $(this).addClass('hideobject');
                    }
                });

                $('#district').val('<?php echo $address['district_id']?>');

                $.ajax({
                    dataType: "json",
                    type: 'POST',
                    url: '../general_form_keyin/ajax.subdistrict.php',
                    data: {
                        'id': '<?php echo $address['district_id']?>'
                    },
                    success: function (data) {
                        $.each( data, function( key, val ) {
                            $('#subdistrict').append('<option value=' + key+ '>' + val + '</option>');
                        });
                        $('#subdistrict').change();
                        $('#subdistrict').val('<?php echo $address['subdistrict_id']?>');
                    }
                });
            }

            /****** เลือกจังหวัด *******/
            $('#province').on('change',function(){
                $('#district').empty().append('<option value="">เลือก</option>');
                getAjaxDistrict();
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

            /* Verify form keyin and save*/
            $('#next_tab4').on('click',function(){
                if($.trim($('#general_id').val()) == ''){
                    swal('ไม่สามารถดำเนินการได้', "กรุณาบันทึกข้อมูลใน Step 1 ข้อมูลผู้สมัคร", "error");
                }else{
                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../general_form_keyin/ajax.save_address_tab.php',
                        data: {
                            'general_id': $('#general_id').val(),
                            'addr_no': $('#addr_no').val(),
                            'addr_moo': $('#addr_moo').val(),
                            'addr_alley': $('#addr_alley').val(),
                            'addr_street': $('#addr_street').val(),
                            'province_id': $('#province').val(),
                            'district_id': $('#district').val(),
                            'subdistrict_id': $('#subdistrict').val(),
                            'postcode': $('#postcode').val()
                        },
                        success: function (data) {
                            $('#general_id').val($.trim(data));
                            $('.panel-tab').find('li.next').find('a').click();
                        }
                    });
                }
            });
        });

        function getAjaxDistrict() {
            $.ajax({
                dataType: "json",
                type: 'POST',
                url: '../general_form_keyin/ajax.district.php',
                data: {
                    'id': $('#province').val()
                },
                success: function (data) {
                    $.each( data, function( key, val ) {
                        $('#district').append('<option value=' + key+ '>' + val + '</option>');
                    });
                    $('#district').change();
                }
            });
        }
        
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