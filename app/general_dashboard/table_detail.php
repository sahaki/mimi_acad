<?PHP
$dataTest = array(
	'0'=>array(
		'fullname'=>'นายมานี มีโชค',
		'age'=>'23',
		'position'=>'โกฟุตบอล',
		'data_general'=>'5',
		'data_football'=>'5',
		'data_address'=>'4',
		'data_parent'=>'3',
	),
	'1'=>array(
		'fullname'=>'นายมานี มีโชค',
		'age'=>'22',
		'position'=>'โกฟุตบอล',
		'data_general'=>'5',
		'data_football'=>'5',
		'data_address'=>'4',
		'data_parent'=>'3',
	),
	'2'=>array(
		'fullname'=>'นายมานี มีโชค',
		'age'=>'21',
		'position'=>'โกฟุตบอล',
		'data_general'=>'5',
		'data_football'=>'5',
		'data_address'=>'4',
		'data_parent'=>'3',
	)

);
?>

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
				<td rowspan="2" >ลำดับ</td>
				<td rowspan="2" >ชื่อ - สกุล</td>
				<td rowspan="2" >อายุ</td>
				<td rowspan="2" >ตำแหน่ง</td>
				<td colspan="4">ความสมบูรณ์ข้อมูล</td>
				<td rowspan="2">เครื่องมือ</td>
			</tr>
			<tr>
				<td >ทั่วไป</td>
				<td > ฟุตบอล</td>
				<td >ที่อยู่</td>
				<td >ผู้ปกครอง</td>
			</tr>
			</thead>
			<tbody>
			<?PHP

			foreach ($dataTest as $key => $val){
				echo'
				<tr class="odd gradeA">
					<td class="text-center">'.($key+1).'</td>
					<td>'.$val['fullname'].'</td>
					<td class="text-center">'.$val['age'].'</td>
					<td>'.$val['position'].'</td>
					<td class="text-center">'.$val['data_general'].'</td>
					<td class="text-center">'.$val['data_football'].'</td>
					<td class="text-center">'.$val['data_address'].'</td>
					<td class="text-center">'.$val['data_parent'].'</td>
					<td></td>
				</tr>
				';
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<!-- end panel -->



