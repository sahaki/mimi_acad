<link href="../assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<div id="content" class="content">
	<div class="row">
		<div class="col-md-6"><?php include_once ("table_exsum.php")?></div>
		<div class="col-md-6">pie graph</div>
	</div>
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12"><?php include_once ("table_detail.php")?></div>
	</div>
</div>


<script src="../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../assets/plugins/DataTables/js/dataTables.responsive.js"></script>
<script src="../assets/js/table-manage-responsive.demo.min.js"></script>
<script src="../assets/js/apps.min.js"></script>
<script>
	$(document).ready(function() {
		App.init();
		TableManageResponsive.init();
	});
</script>

