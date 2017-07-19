<div>
    <?php
    $sql = "SELECT
    t1.curator_id,
    t1.general_id,
    t1.curator_name_th,
    t1.curator_surname_th,
    t1.curator_tel,
    t1.curator_relation
    FROM
    general_curator AS t1 WHERE general_id = '{$_GET[general_id]}'";
    $result = $mysqli->ServiceQuery($sql);

    $cnt = 1;
    ?>
    <fieldset>
        <div class="curator_contrainer">
            <legend class="pull-left width-full form-legend">ผู้ปกครอง</legend>
            <?php
            if(count($result) > 0) :
            foreach ($result as $index => $value) :
            ?>
            <div class="row curator">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b><u>คนที่ <span class="run_no"><?php echo $cnt?></span></u> :</b> ชื่อ</label>
                        <input type="text" name="curator_name" placeholder="ชื่อ" class="form-control"
                               value="<?php echo $value['curator_name_th']?>"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" name="curator_surname" placeholder="นามสกุล" class="form-control"
                               value="<?php echo $value['curator_surname_th']?>"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>เบอร์ติดต่อ</label>
                        <input type="text" name="curator_tel" placeholder="เบอร์ติดต่อ" class="form-control"
                               value="<?php echo $value['curator_tel']?>"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>ความสัมพันธ์</label>
                        <input type="text" name="curator_relation" placeholder="ความสัมพันธ์" class="form-control"
                               value="<?php echo $value['curator_relation']?>"/>
                    </div>
                </div>
                <div class="col-md-1 console">
                    <?php if($cnt > 1) : ?>
                        <i class="fa fa-2x fa-minus-square delObject" style="margin-top: 30px; cursor: pointer;"></i>
                    <?php else : ?>
                        <i class="fa fa-2x fa-plus-square newObject" style="margin-top: 30px; cursor: pointer;"></i>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $cnt++;
            endforeach;
            endif;
            ?>

        </div>
        <div class="col-md-12" style="text-align: right; padding: 0;">
            <input type="button" id="next_tab5" class="btn btn-success" value="บันทึกข้อมูล >>" tabindex="9">
        </div>
    </fieldset>
    <script>
        $(document).ready(function(){
            /* Verify form keyin and save*/
            $('#next_tab5').on('click',function(){
                if($.trim($('#general_id').val()) == ''){
                    swal('ไม่สามารถดำเนินการได้', "กรุณาบันทึกข้อมูลใน Step 1 ข้อมูลผู้สมัคร", "error");
                }else{
                    var sendData = [];
                    cnt = 0;
                    $('.curator').each(function(){
                        var temp_json = {
                            "curator_name":$(this).find("input[name*='curator_name']").val(),
                            "curator_surname":$(this).find("input[name*='curator_surname']").val(),
                            "curator_tel":$(this).find("input[name*='curator_tel']").val(),
                            "curator_relation":$(this).find("input[name*='curator_relation']").val()
                        }
                        sendData[cnt] = temp_json;
                        cnt++;
                    });


                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../general_form_keyin/ajax.save_curator_tab.php',
                        data: {'sendData':sendData,'general_id':$('#general_id').val()},
                        success: function (data) {
                            window.location = '?page=general_dashboard';
                        }
                    });
                }
            });
        });

        $('.newObject').click(function () {
            $(this).closest('.curator').clone()
                .find("input:text").val("").end()
                .appendTo('.curator_contrainer')
                .find('.console').empty().append('<i class="fa fa-2x fa-minus-square delObject" style="margin-top: 30px; cursor: pointer;"></i>');
            var cnt = 1;
            $('.curator').each(function(){
                $(this).find('.run_no').text(cnt);
                cnt++;
            });
            cnt = 1;
        });

        $(document).on('click', '.delObject', function(e) {
            $(this).closest('.curator').remove();

        });
    </script>
</div>