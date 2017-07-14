<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="../assets/js/form-wizards.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
        <li class="active">Wizards</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">ข้อมูลนักกีฬา <small>เพิ่มข้อมูลนักกีฬา</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Form Wizards</h4>
                </div>
                <div class="panel-body">
                    <form action="http://seantheme.com/" method="POST">
                        <div id="wizard">
                            <ol>
                                <li>
                                    Identification
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
                                </li>
                                <li>
                                    Contact Information
                                    <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
                                </li>
                                <li>
                                    Login
                                    <small>Phasellus lacinia placerat neque pretium condimentum.</small>
                                </li>
                                <li>
                                    Completed
                                    <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
                                </li>
                            </ol>
                            <!-- begin wizard step-1 -->
                            <?php include_once ('general_tab.php'); ?>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <?php include_once ('curator_tab.php'); ?>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-4 -->
                            <div>
                                <div class="jumbotron m-b-0 text-center">
                                    <h1>Login Successfully</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                    <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
                                </div>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>