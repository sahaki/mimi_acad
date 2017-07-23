<div>
	<fieldset>
        <?php
        $sql = "SELECT
        t1.register_date,
        t1.birth_date,
        t1.idcard,
        t1.name_th,
        t1.surname_th,
        t1.nickname_th,
        t1.origin,
        t1.nationality,
        t1.religion,
        t1.blood_id,
        t1.height,
        t1.weight,
        t1.education_class,
        t1.school_name,
        t1.favorite_sport,
        t1.congenital_disease,
        t1.food_allergy,
        t1.img_path
        FROM
        general_infomation AS t1 WHERE general_id = '{$_GET[general_id]}'";
        $result = $mysqli->ServiceQuery($sql);
        foreach ($result as $index => $value){
            $general = $value;
        }
        if($general['register_date'] != '' && $general['register_date'] != '0000-00-00'){
	        $arr_date = explode('-',$general['register_date']);
	        $register_date = $arr_date[2].'/'.$arr_date[1].'/'.$arr_date[0];
        }else{
	        $register_date = date('d/m/Y');
        }

        if($general['birth_date'] != '' && $general['birth_date'] != '0000-00-00'){
	        $arr_date = explode('-',$general['birth_date']);
	        $birth_date = $arr_date[2].'/'.$arr_date[1].'/'.$arr_date[0];
        }else{
	        $birth_date = '';
        }
        ?>
		<legend class="pull-left width-full form-legend">ข้อมูลทั่วไป</legend>
		<!-- begin row -->
		<div class="row">
			<div class="col-md-4" style="text-align: center">
				<img src="../../media/person_register/images.jpg" width="180"><br>
                <div style="margin-top:5px;">คลิกที่รูปเพื่ออัพโหลดรูปใหม่</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>วันที่สมัคร</label>
                    <input class="form-control register_date" id="register_date" name="register_date" placeholder="วัน/เดือน/ปี"
                           tabindex="1" value="<?php echo $register_date;?>">

                    <label style="margin-top: 15px;">เลขประจำตัวประชาชน</label>
                    <input type="text" name="idcard" id="idcard" placeholder="เลขประจำตัวประชาชน" class="form-control"
                           tabindex="3" value="<?php echo $general['idcard']?>"/>

                    <label style="margin-top: 15px;">ชื่อ</label>
                    <input type="text" name="name_th" id="name_th" placeholder="ชื่อ" class="form-control"
                           tabindex="5" value="<?php echo $general['name_th']?>"/>
				</div>
			</div>
            <div class="col-md-4">
                <label>วัน เดือน ปี เกิด</label>
                <input class="form-control birth_date" id="birth_date" name="birth_date" placeholder="วัน/เดือน/ปี"
                       tabindex="2" value="<?php echo $birth_date;?>">

                <label style="margin-top: 15px;">ชื่อเล่น</label>
                <input type="text" name="nickname_th" id="nickname_th" placeholder="ชื่อเล่น" class="form-control"
                       tabindex="4" value="<?php echo $general['nickname_th']?>"/>

                <label style="margin-top: 15px;">นามสกุล</label>
                <input type="text" name="surname_th" id="surname_th" placeholder="นามสกุล" class="form-control"
                       tabindex="6" value="<?php echo $general['surname_th']?>"/>
            </div>
		</div>
        
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>เชื่อชาติ</label>
					<input type="text" name="origin" id="origin" placeholder="เชื้อชาติ" class="form-control"
                           tabindex="7" value="<?php echo $general['origin']?>"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>สัญชาติ</label>
					<input type="text" name="nationality" id="nationality" placeholder="สัญชาติ" class="form-control"
                           tabindex="8" value="<?php echo $general['nationality']?>"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>ศาสนา</label>
					<input type="text" name="religion" id="religion" placeholder="ศาสนา" class="form-control"
                           tabindex="9" value="<?php echo $general['religion']?>"/>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>หมู่โลหิต</label>
					<?php
					$sql = "SELECT
                    t1.blood_id,
                    t1.blood_label
                    FROM config_blood AS t1
                    ORDER BY t1.blood_label ASC";
					$result = $mysqli->ServiceQuery($sql);
					?>
                    <select class="form-control" name="blood_id" id="blood_id" tabindex="10">
                        <option value="">เลือก</option>
						<?php foreach ($result as $index => $value) :
                            $select = ($value['blood_id'] == $general['blood_id']) ? "selected" : "";
                            ?>
                            <option value="<?php echo $value['blood_id']?>" <?php echo $select?>><?php echo $value['blood_label']?></option>
						<?php endforeach; ?>
                    </select>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>ส่วนสูง (<?php echo $_SESSION['core_config']['height_unit']?>)</label>
					<input type="text" name="height" id="height" placeholder="ส่วนสูง" class="form-control"
                           tabindex="11" value="<?php echo $general['height']?>"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>น้ำหนัก (<?php echo $_SESSION['core_config']['weight_unit']?>)</label>
					<input type="text" name="weight" id="weight" placeholder="น้ำหนัก" class="form-control"
                           tabindex="12" value="<?php echo $general['weight']?>"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>กำลังศึกษาอยู่ระดับชั้น</label>
					<input type="text" name="education_class" id="education_class" placeholder="กำลังศึกษาอยู่ระดับชั้น" class="form-control"
                           tabindex="13" value="<?php echo $general['education_class']?>"/>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label>โรงเรียน</label>
					<input type="text" name="school_name" id="school_name" placeholder="โรงเรียน" class="form-control"
                           tabindex="14" value="<?php echo $general['school_name']?>"/>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>กีฬาที่ชอบ</label>
                    <input type="text" name="favorite_sport" id="favorite_sport" placeholder="กีฬาที่ชอบ" class="form-control"
                           tabindex="15" value="<?php echo $general['favorite_sport']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>โรคประจำตัว</label>
                    <input type="text" name="congenital_disease" id="congenital_disease" placeholder="โรคประจำตัว" class="form-control"
                           tabindex="16" value="<?php echo $general['congenital_disease']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>การแพ้อาหาร</label>
                    <input type="text" name="food_allergy" id="food_allergy" placeholder="การแพ้อาหาร" class="form-control"
                           tabindex="17"  value="<?php echo $general['food_allergy']?>"/>
                </div>
            </div>
        </div>
		<!-- end row -->
        <input type="hidden" name="general_id" id="general_id" value="<?php echo $_GET['general_id']?>">
        <div class="col-md-12" style="text-align: right; padding: 0;">
            <input type="button" id="next_tab2" class="btn btn-success" value="บันทึกข้อมูล >>" tabindex="18">
        </div>
	</fieldset>
    <script>
        $(document).ready(function(){
            var d = new Date();
            var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

            $("#register_date").datepicker({
                format: 'dd/mm/yyyy'
            });

            $("#birth_date").datepicker({
                format: 'dd/mm/yyyy'
            });

            /* Verify form keyin and save*/
            $('#next_tab2').on('click',function(){
                $.ajax({
                    dataType: "json",
                    type: 'POST',
                    url: '../general_form_keyin/ajax.save_general_tab.php',
                    data: {
                        'general_id': $('#general_id').val(),
                        'register_date': $('#register_date').val(),
                        'birth_date': $('#birth_date').val(),
                        'idcard': $('#idcard').val(),
                        'name_th': $('#name_th').val(),
                        'surname_th': $('#surname_th').val(),
                        'nickname_th': $('#nickname_th').val(),
                        'origin': $('#origin').val(),
                        'nationality': $('#nationality').val(),
                        'religion': $('#religion').val(),
                        'blood_id': $('#blood_id').val(),
                        'height': $('#height').val(),
                        'weight': $('#weight').val(),
                        'education_class': $('#education_class').val(),
                        'school_name': $('#school_name').val(),
                        'favorite_sport': $('#favorite_sport').val(),
                        'congenital_disease': $('#congenital_disease').val(),
                        'food_allergy': $('#food_allergy').val()
                    },
                    success: function (data) {
                        $('#general_id').val($.trim(data));
                        $('.panel-tab').find('li.next').find('a').click();
                    }
                });

            });
        });
    </script>
</div>