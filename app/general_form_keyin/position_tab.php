<div>
	<?php
	$sql = "SELECT
    t1.position_id_list,
    t1.favorite_sportsman,
    t1.favorite_inter_club,
    t1.favorite_thai_club
    FROM
    general_football AS t1 WHERE general_id = '{$_GET[general_id]}'";
	$result = $mysqli->ServiceQuery($sql);
	foreach ($result as $index => $value){
		$football = $value;
	}
	$positionList = explode(',',$football['position_id_list'])
	?>
    <fieldset>
        <legend class="pull-left width-full form-legend">ข้อมูลเกี่ยวกับฟุตบอล</legend>
        <div class="row">
            <div class="col-md-12">
                <label>ตำแหน่งที่ถนัด</label>
            </div>
            <?php
            $sql = "SELECT
            t1.position_id,
            t1.position_label
            FROM
            config_position AS t1
            WHERE t1.`status` = '1'
            ORDER BY t1.orderby";
            $result = $mysqli->ServiceQuery($sql);
            foreach ($result as $index => $value):
                $checked = (in_array($value['position_id'],$positionList)) ? "checked" : "";
            ?>
                <div class="col-md-3">
                    <input type="checkbox" class="position_select" value="<?php echo $value['position_id']?>" <?php echo $checked?>>
                    <label style="margin-left: 10px;"><?php echo $value['position_label']?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <legend class="pull-left width-full form-legend" style="margin-top: -20px;">&nbsp;</legend>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>นักฟุตบอลที่ชอบ</label>
                    <input type="text" name="favorite_sportsman" id="favorite_sportsman" placeholder="นักฟุตบอลที่ชอบ"
                           class="form-control" value="<?php echo $football['favorite_sportsman']?>" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>สโมสรฟุตบอลต่างประเทศที่ชอบ</label>
                    <input type="text" name="favorite_inter_club" id="favorite_inter_club" placeholder="สโมสรฟุตบอลต่างประเทศที่ชอบ"
                           class="form-control" value="<?php echo $football['favorite_inter_club']?>"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>สโมสรฟุตบอลในระเทศที่ชอบ</label>
                    <input type="text" name="favorite_thai_club" id="favorite_thai_club" placeholder="สโมสรฟุตบอลในระเทศที่ชอบ"
                           class="form-control" value="<?php echo $football['favorite_thai_club']?>"/>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="text-align: right; padding: 0;">
            <input type="button" id="next_tab3" class="btn btn-success" value="บันทึกข้อมูลทั่วไป >>" tabindex="18">
        </div>
    </fieldset>
    <script>
        $(document).ready(function(){
            /* Verify form keyin and save*/
            $('#next_tab3').on('click',function(){
                var position_id_list = '';
                $('.position_select').each(function(){
                    if($(this).is(':checked')){
                        position_id_list = position_id_list+$(this).val()+',';
                    }
                });

                if($.trim($('#general_id').val()) == ''){
                    swal('ไม่สามารถดำเนินการได้', "กรุณาบันทึกข้อมูลใน Step 1 ข้อมูลผู้สมัคร", "error");
                }else{
                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../general_form_keyin/ajax.save_position_tab.php',
                        data: {
                            'general_id': $('#general_id').val(),
                            'position_id_list': position_id_list,
                            'favorite_sportsman': $('#favorite_sportsman').val(),
                            'favorite_inter_club': $('#favorite_inter_club').val(),
                            'favorite_thai_club': $('#favorite_thai_club').val()
                        },
                        success: function (data) {
                            $('#general_id').val($.trim(data));
                            $('.panel-tab').find('li.next').find('a').click();
                        }
                    });
                }


            });
        });
    </script>
</div>