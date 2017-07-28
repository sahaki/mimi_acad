<?php
session_start();
unset($_SESSION['user_login']);
include_once('include_php.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php
    include_once ('include_css.php');
    include_once ('include_js.php');
    ?>
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login bg-black animated fadeInDown">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <img src="../../media/logo/league.png" width="50" style="float: left; margin-right: 10px;">
                <h4>ระบบบริหารจัดการข้อมูลบุคคล</h4>
                <small>Version 1.0.1</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <form action="" method="POST" class="margin-bottom-0">
                <div class="form-group m-b-20">
                    <input type="text" id="username" class="form-control input-lg" placeholder="Username"/>
                </div>
                <div class="form-group m-b-20">
                    <input type="password" id="password" class="form-control input-lg" placeholder="Password" />
                </div>
                <div class="login-buttons">
                    <button type="button" id="bt_login" class="btn btn-success btn-block btn-lg">Sign me in</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end login -->
</div>
<!-- end page container -->
<script>
    $(document).ready(function() {
        App.init();

        $('#bt_login').on('click',function(){
            var checkErr = 0;
            if($.trim($('#username').val()) == ''){
                $('#username').addClass('parsley-error');
                checkErr = 1;
            }else{
                $('#username').removeClass('parsley-error');
            }

            if($.trim($('#password').val()) == ''){
                $('#password').addClass('parsley-error');
                checkErr = 1;
            }else{
                $('#password').removeClass('parsley-error');
            }

            if(checkErr === 1){
                return false;
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'ajax.login.php',
                    data: {
                        'username': $('#username').val(),
                        'password': $('#password').val()
                    },
                    success: function (data) {
                        if($.trim(data) == 'error'){
                            swal({
                                    title: "พบข้อผิดพลาด!",
                                    text: "Username หรือ Password อาจจะไม่ถูกต้อง",
                                    type: "error",
                                    confirmButtonText: "ตกลง",
                                    closeOnConfirm: true
                                });
                        }else{
                            window.location = 'index.php?page=general_dashboard';
                        }
                    }
                });
            }

        });
    });
</script>
</body>
</html>
