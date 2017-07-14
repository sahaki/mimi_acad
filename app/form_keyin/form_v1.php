<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/custom_wizards/components.css" rel="stylesheet">
<!-- ================== END PAGE LEVEL STYLE ================== -->


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="../assets/plugins/custom_wizards/blankon.form.js"></script>
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
                        <div class="hidden" id="wizard">
                            <ol>
                                <li assss>
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
                            <?php //include_once ('general_tab.php'); ?>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <div class="hidden">
                                <fieldset>
                                    <legend class="pull-left width-full">Contact Information</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" placeholder="123-456-7890" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                        <!-- begin col-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="text" name="email" placeholder="someone@example.com" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                            <!-- begin wizard step-3 -->
                            <div class="hidden">
                                <fieldset>
                                    <legend class="pull-left width-full">Login</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <div class="controls">
                                                    <input type="text" name="username" placeholder="johnsmithy" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pasword</label>
                                                <div class="controls">
                                                    <input type="password" name="password" placeholder="Your password" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Pasword</label>
                                                <div class="controls">
                                                    <input type="password" name="password2" placeholder="Confirmed password" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-4 -->
                            <div class="hidden">
                                <div class="jumbotron m-b-0 text-center">
                                    <h1>Login Successfully</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                    <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
                                </div>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Start progress bar wizard -->
                            <div id="progress-wizard">
                                <div class="panel panel-tab rounded shadow">

                                    <!-- Start tabs heading -->
                                    <div class="panel-heading no-padding">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab3-1" data-toggle="tab">
                                                    <i class="fa fa-user"></i>
                                                    <div>
                                                        <span class="text-strong">Step 1</span>
                                                        <span>Personal</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-2" data-toggle="tab">
                                                    <i class="fa fa-file-text"></i>
                                                    <div>
                                                        <span class="text-strong">Step 2</span>
                                                        <span>Product</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-3" data-toggle="tab">
                                                    <i class="fa fa-credit-card"></i>
                                                    <div>
                                                        <span class="text-strong">Step 3</span>
                                                        <span>Payment</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3-4" data-toggle="tab">
                                                    <i class="fa fa-check-circle"></i>
                                                    <div>
                                                        <span class="text-strong">Step 4</span>
                                                        <span>Confirmation</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /.panel-heading -->
                                    <!--/ End tabs heading -->

                                    <div class="panel-sub-heading">
                                        <div class="inner-all">
                                            <div class="progress progress-striped active no-margin progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div><!-- /.panel-sub-heading -->

                                    <!-- Start tabs content -->
                                    <div class="panel-body">
                                        <form action="#" class="tab-content form-horizontal">
                                            <div class="tab-pane fade in active inner-all" id="tab3-1">
                                                <h4 class="page-header">Personal</h4>
                                                <div class="form-group">
                                                    <label class="col-sm-2">First Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2">Last Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="col-sm-2">Gender</label>
                                                    <div class="col-sm-4">
                                                        <div class="rdio rdio-theme inline mr-10">
                                                            <input checked="checked" id="male3" name="radio" type="radio">
                                                            <label for="male3">Male</label>
                                                        </div>
                                                        <div class="rdio rdio-theme inline">
                                                            <input id="female3" name="radio" type="radio">
                                                            <label for="female3">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-2">
                                                <h4 class="page-header">Product</h4>
                                                <div class="form-group">
                                                    <label class="col-sm-2">Product ID</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2">Product Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="col-sm-2">Category</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control">
                                                            <option value="">Choose One</option>
                                                            <option value="Iphone">Iphone</option>
                                                            <option value="Android">Android</option>
                                                            <option value="Blackberry">Blackberry</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-3">
                                                <h4 class="page-header">Payment</h4>
                                                <div class="form-group">
                                                    <label class="col-sm-2">Credit Card Type</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control">
                                                            <option value="">Choose Credit Card</option>
                                                            <option value="amex">American Express</option>
                                                            <option value="discover">Discover</option>
                                                            <option value="mastercard">MasterCard</option>
                                                            <option value="visa">Visa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2">Expiration</label>
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <select class="form-control">
                                                                    <option value="">Date Month</option>
                                                                    <option value="01">01 - Jan</option>
                                                                    <option value="02">02 - Feb</option>
                                                                    <option value="03">03 - Mar</option>
                                                                    <option value="04">04 - Apr</option>
                                                                    <option value="05">05 - May</option>
                                                                    <option value="06">06 - Jun</option>
                                                                    <option value="07">07 - Jul</option>
                                                                    <option value="08">08 - Aug</option>
                                                                    <option value="09">09 - Sep</option>
                                                                    <option value="10">10 - Oct</option>
                                                                    <option value="11">11 - Nov</option>
                                                                    <option value="12">12 - Dec</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="form-control">
                                                                    <option value="">Year</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="col-sm-2">Credit Card Number</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade inner-all" id="tab3-4">
                                                <h4 class="page-header">Confirmation</h4>
                                                <div class="ml-10">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                                <button type="submit" class="btn btn-success ml-10">Submit</button>
                                            </div>
                                        </form>
                                    </div><!-- /.panel-body -->
                                    <!--/ End tabs content -->

                                    <!-- Start pager -->
                                    <div class="panel-footer">
                                        <ul class="pager wizard no-margin">
                                            <li class="previous"><a href="javascript:void(0);">Previous</a></li>
                                            <li class="next"><a href="javascript:void(0);">Next</a></li>
                                        </ul>
                                    </div><!-- /.panel-footer -->
                                    <!--/ End pager -->

                                </div>
                            </div><!-- /#progress-wizard -->
                            <!--/ End progress bar wizard-->
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
