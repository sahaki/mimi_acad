<div>
	<fieldset>
		<legend class="pull-left width-full form-legend">ข้อมูลทั่วไป</legend>
		<!-- begin row -->
		<div class="row">
			<div class="col-md-4" style="text-align: center">
				<img src="../../media/person_register/images.jpg">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>วันที่สมัคร</label>
                    <input class="form-control date_register" id="date_register" name="date_register" placeholder="วัน/เดือน/ปี" tabindex="1">

                    <label style="margin-top: 15px;">เลขประจำตัวประชาชน</label>
                    <input type="text" name="middle" placeholder="เลขประจำตัวประชาชน" class="form-control" tabindex="3"/>

                    <label style="margin-top: 15px;">ชื่อ</label>
                    <input type="text" name="firstname" placeholder="ชื่อ" class="form-control" tabindex="5" />
				</div>
			</div>
            <div class="col-md-4">
                <label>วัน เดือน ปี เกิด</label>
                <input class="form-control date_birthday" id="date_birthday" name="date_birthday" placeholder="วัน/เดือน/ปี" tabindex="2">

                <label style="margin-top: 15px;">ชื่อเล่น</label>
                <input type="text" name="middle" placeholder="ชื่อเล่น" class="form-control" tabindex="4"/>

                <label style="margin-top: 15px;">นามสกุล</label>
                <input type="text" name="middle" placeholder="นามสกุล" class="form-control" tabindex="6"/>
            </div>
		</div>
        
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>เชื่อชาติ</label>
					<input type="text" name="middle" placeholder="เชื้อชาติ" class="form-control" tabindex="7"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>สัญชาติ</label>
					<input type="text" name="middle" placeholder="สัญชาติ" class="form-control" tabindex="8"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>ศาสนา</label>
					<input type="text" name="middle" placeholder="ศาสนา" class="form-control" tabindex="9"/>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>หมู่โลหิต</label>
					<input type="text" name="middle" placeholder="หมู่โลหิต" class="form-control" tabindex="10"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>ส่วนสูง</label>
					<input type="text" name="middle" placeholder="ส่วนสูง" class="form-control" tabindex="11"/>
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					<label>น้ำหนัก</label>
					<input type="text" name="middle" placeholder="น้ำหนัก" class="form-control" tabindex="12"/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>กำลังศึกษาอยู่ระดับชั้น</label>
					<input type="text" name="middle" placeholder="กำลังศึกษาอยู่ระดับชั้น" class="form-control" tabindex="13"/>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label>โรงเรียน</label>
					<input type="text" name="middle" placeholder="โรงเรียน" class="form-control" tabindex="14"/>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>กีฬาที่ชอบ</label>
                    <input type="text" name="middle" placeholder="กีฬาที่ชอบ" class="form-control" tabindex="15"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>โรคประจำตัว</label>
                    <input type="text" name="middle" placeholder="โรคประจำตัว" class="form-control" tabindex="16"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>การแพ้อาหาร</label>
                    <input type="text" name="middle" placeholder="การแพ้อาหาร" class="form-control" tabindex="17"/>
                </div>
            </div>
        </div>
		<!-- end row -->
	</fieldset>
    <script>
        $(document).ready(function(){
            var d = new Date();
            var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
            $.datepicker.setDefaults($.datepicker.regional['TH']);

            $("#date_register,#date_birthday").datepicker({
                autoSize: true,
                changeMonth: true,
                changeYear: true,
            });
        });
    </script>
</div>