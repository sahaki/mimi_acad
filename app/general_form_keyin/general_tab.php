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
        t1.img_path,
        t1.club_id
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

        $img_path = (file_exists($general['img_path'])) ? $general['img_path'] : "../../media/person_register/blank.png";

        ?>
        <form id="form_general_tab" method="post">
		<legend class="pull-left width-full form-legend" style="margin-bottom: 10px;">ข้อมูลทั่วไป</legend>
		<!-- begin row -->
		<div class="row">
			<div class="col-md-4" style="text-align: center">
				<img src="<?php echo $img_path?>?date=<?php echo date('Y-m-d')?>" height="180" style="cursor: pointer;" id="person_img"><br>
                <div style="margin-top:5px;">คลิกที่รูปเพื่ออัพโหลดรูปใหม่</div>
                <input type="file" name="file_person_img" id="file_person_img" style="display: none;">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>วันที่สมัคร</label>
                    <input class="form-control register_date" id="register_date" name="register_date" placeholder="วัน/เดือน/ปี"
                           tabindex="1" value="<?php echo $register_date;?>">

                    <label style="margin-top: 15px;">เลขประจำตัวประชาชน
                        <font color="red">* <span id="war-idcard" style="font-size:9px; "></span></font>
                    </label>
                    <input type="number" name="idcard" id="idcard" placeholder="เลขประจำตัวประชาชน" class="form-control"
                        tabindex="3" value="<?php echo $general['idcard']?>"
                        onblur="checkIdcard(this.value)"/>

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

        <?php if($_SESSION['user_login']['admin_type'] == 'admin'):
	        $sql = "SELECT
            t1.club_id,
            t1.club_name_th
            FROM
            config_club AS t1
            ORDER BY t1.club_name_short";
	        $resultClub = $mysqli->ServiceQuery($sql);
            ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>สังกัด</label>
                        <select class="form-control" name="club_id" id="club_id">
                            <option value="">ไม่ระบุ</option>
                            <?php foreach($resultClub as $clubDetail) :
                                $selected = ($clubDetail['club_id'] == $general['club_id']) ? "selected" : "";
                                ?>
                                <option value="<?php echo $clubDetail['club_id']?>" <?php echo $selected?>>
                                    <?php echo $clubDetail['club_name_th']?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <input type="hidden" name="club_id" id="club_id" value="<?php echo $_SESSION['user_login']['club_id']?>">
        <?php endif; ?>

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
        </form>
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

            $('#person_img').on('click',function(){
                $('#file_person_img').click();
            });

            $("#file_person_img").change(function(){

                var file = this.files[0];
                var fileType = file["type"];
                var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];

                if ($.inArray(fileType, ValidImageTypes) < 0) {
                    swal("", "ระบบไม่รองรับ ไฟล์ "+fileType, "error");
                    $("#file_person_img").val('');
                }else{
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#person_img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            /* Verify form keyin and save*/
            $('#next_tab2').on('click',function(){
                var checkErr = 0;
                if($.trim($('#idcard').val()) == ''){
                    checkErr = 1;
                    $('#war-idcard').text('กรุณาระบุเลขประจำตัวประชาชน');
                    $('#idcard').addClass('parsley-error');
                    setTimeout(function(){$("#idcard").focus();},0);
                }else{
                    $('#war-idcard').text('');
                    $('#idcard').removeClass('parsley-error');

                }

                if(checkErr === 0){
                    var formData = new FormData($('#form_general_tab')[0]);
                    $.ajax({
                        type: 'POST',
                        async: false,
                        url: '../general_form_keyin/ajax.save_general_tab.php',
                        data: new FormData($("#form_general_tab")[0]),
                        success: function (data) {
                            $('#general_id').val($.trim(data));
                            $('.panel-tab').find('li.next').find('a').click();
                        },
                        cache: false,
                        processData: false,
                        contentType: false
                    });
                }
            });
        });

        function checkIdcard(id){
            if($.trim(id) != ''){
                var result = Script_checkID(id);
                if(result === true){
                    $.ajax({
                        dataType: "json",
                        type: 'POST',
                        url: '../general_form_keyin/ajax.get_general.php',
                        data: {
                            'general_id': '<?php echo $_GET['general_id']?>',
                            'idcard' : id
                        },
                        success: function (data) {
                            var swalText = 'พบข้อมูลเลขประจำตัวประชาชน '+data.idcard+'\n';
                            swalText = swalText+data.name_th+' '+data.surname_th+' ';
                            if(data.club_name_th != null){
                                swalText = swalText+'อยู่ภายใต้สังกัด '+data.club_name_th+'\n';
                                swalText = swalText+'หากท่านมีความประสงค์จะตำเนินการโยกย้ายข้อมูลนักเตะ กรุณาติดต่อผู้ดูแลระบบเพื่อดำเนินการ\n';
                                swal({
                                    title: "คำเตือน",
                                    text: swalText,
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "ยืนยัน"
                                },
                                function(){
                                    $("#idcard").val('');
                                    setTimeout(function(){$("#idcard").focus();},0);
                                });
                            }else{
                                swalText = swalText+'\n'+'เป็นนักเตะไม่มีสังกัด ท่านต้องการเพิ่มข้อมูลนักเดะคนนี้หรือไม่?';
                                swal({
                                    title: "คำเตือน",
                                    text: swalText,
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "ยืนยัน"
                                },
                                function(){
                                    window.location = '?page=general_form_keyin&general_id='+data.general_id;
                                });
                            }
                        }
                    });
                }else{
                    swal({
                        title: "คำเตือน",
                        text: "รูปแบบเลขบัตรจำตัวประชาชนผิด",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "ยืนยัน"
                    });
                    $('#idcard').val('');
                    setTimeout(function(){$("#idcard").focus();},0);
                }
            }
        }
    </script>
</div>