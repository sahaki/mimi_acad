<?PHP
$sql = "SELECT
t1.general_id,
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
general_infomation AS t1";
$result = $mysqli->ServiceQuery($sql);

function getAge($then) {
	$then_ts = strtotime($then);
	$then_year = date('Y', $then_ts);
	$age = date('Y') - $then_year;
	if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
	return $age;
}
?>

<!-- ================== datatable ================== -->
<link href="../assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />

<!-- begin panel -->
<div class="panel panel-inverse">
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="?page=general_form_keyin" class="btn btn-sm btn-icon btn-circle btn-success" ><i class="fa fa-plus"></i></a>
		</div>
		<h4 class="panel-title">รายชื่อนักกีฬา</h4>
	</div>
	<div class="panel-body">
		<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
			<thead>
			<tr>
				<td>ลำดับ</td>
                <td>เลขประจำตัวประชาชน</td>
				<td>ชื่อ - สกุล</td>
                <td>ชื่อเล่น</td>
				<td>อายุ</td>
				<td>ตำแหน่งที่ถนัด</td>
				<td>โรงเรียน</td>
				<td>รายละเอียด</td>
			</tr>
			</thead>
			<tbody>
			<?PHP
            $cnt = 1;
			foreach ($result as $key => $val){
			    $idcard = (trim($val['idcard']) != '') ? $val['idcard'] : 'ไม่ระบุ';
				$fullname = (trim($val['name_th'].' '.$val['surname_th']) != '') ? $val['name_th'].' '.$val['surname_th'] : 'ไม่ระบุ';
                $nickname = (trim($val['nickname_th']) != '') ? $val['nickname_th'] : 'ไม่ระบุ';
				$age = (trim($val['birth_date']) != '') ? getAge($val['birth_date']) : 'ไม่ระบุ';
				$schoolname = (trim($val['school_name']) != '') ? $val['school_name'] : 'ไม่ระบุ';

                echo'
				<tr class="odd gradeA">
					<td class="text-center">'.($cnt).'</td>
					<td class="text-center">'.$idcard.'</td>
					<td>'.$fullname.'</td>
					<td>'.$nickname.'</td>
					<td class="text-center">'.$age.'</td>
					<td>-</td>
					<td>'.$schoolname.'</td>
					<td class="text-center">
					<a href="?page=general_form_keyin&general_id='.$val['general_id'].'" class="btn btn-sm btn-icon btn-circle btn-warning">
					<i class="fa fa-folder-open" style="margin-left: 3px;"></i></a>
					</td>

				</tr>
				';
				$cnt++;
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<!-- end panel -->


<!-- ================== datatable ================== -->
<script src="../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../assets/plugins/DataTables/js/dataTables.responsive.js"></script>
<script src="../assets/js/table-manage-responsive.demo.min.js"></script>

<script>
	$(document).ready(function() {
		TableManageResponsive.init();
	});
</script>


