<div>
    <?php
    $sql = "SELECT
    t1.attach_id,
    t1.general_id,
    t1.attach_value,
    t1.attach_description,
    t1.updatetime
    FROM
    general_attach AS t1
    WHERE t1.general_id = '{$_GET[general_id]}'";
    $result = $mysqli->ServiceQuery($sql);

    $cnt = 1;
    ?>
    <style>
        .delAttach, .delUploadAttach{
            color:#d9534f;
        }
    </style>
    <form id="form_attacth_tab" method="post">
    <fieldset>
        <div class="curator_contrainer">
            <legend class="pull-left width-full form-legend">เอกสารหลักฐาน</legend>
            <br>
            <?php
            if(count($result) > 0) :
            $cnt=1;
            foreach ($result as $index => $value) :
            ?>
            <div class="col-md-12 upload-list"
                 style="font-size:15px; margin-bottom:15px; border-bottom: 1px solid #e2e7eb">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-6"><span><?php echo $cnt?>. </span>
                        <a href="<?php echo $value['attach_value']?>" target="_blank"><?php echo $value['attach_description']?></a>
                        <input type="hidden" name="attach_id[]" class="attach-id" value="<?php echo $value['attach_id']?>">
                    </div>
                    <div class="col-md-1"><i class="fa fa-2x fa-minus-square delUploadAttach"
                                             style="cursor: pointer;"></i></div>
                </div>
            </div>
            <?php
            $cnt++;
            endforeach;
            endif;
            ?>

            <div class="row attacth-box" style="margin-top: 15px;">
                <div class="col-md-12">
                    <span class="btn btn-inverse fileinput-button">
                        <i class="fa fa-plus"></i>
                        <span>Add files...</span>
                    </span>
                    <font color="red">* ขนาดไฟล์ ไม่เกิน 5MB</font>

                    <input type="file" id="upload_attacth" name="upload_attacth" style="display:none;">
                </div>

                <div class="col-md-12" id="file-box"
                     style="font-size:15px; margin:30px 0 15px 0; border-bottom: 1px solid #e2e7eb">
                </div>
            </div>


        </div>
        <div class="col-md-12" style="text-align: right; padding: 0;">
            <input type="hidden" name="general_id" id="attach_general_id" value="<?php echo $_GET['general_id']?>">
            <input type="button" id="next_tab6" class="btn btn-success" value="บันทึกข้อมูล >>" tabindex="9">
        </div>
    </fieldset>
    </form>
    <script>
        $(document).ready(function(){
            /* Verify form keyin and save*/
            $('#next_tab6').on('click',function(){
                if($.trim($('#general_id').val()) == ''){
                    swal('ไม่สามารถดำเนินการได้', "กรุณาบันทึกข้อมูลใน Step 1 ข้อมูลผู้สมัคร", "error");
                }else{
                    var checkErr = 0;
                    $('.upload-object').each(function () {
                        if($.trim($(this).find('.attach-description').val()) == ''){
                            checkErr = 1;
                            $(this).find('.attach-description').addClass('parsley-error');
                        }else{
                            $(this).find('.attach-description').addClass('removeClass');
                        }
                    });


                    if(checkErr === 0){
                        $.ajax({
                            type: 'POST',
                            async: false,
                            url: '../general_form_keyin/ajax.save_attach_tab.php',
                            data: new FormData($("#form_attacth_tab")[0]),
                            success: function (data) {
                                $('.panel-tab').find('li.next').find('a').click();
                            },
                            cache: false,
                            processData: false,
                            contentType: false
                        });
                    }
                }
            });


            /****** upload object function control ******/
            $('.fileinput-button').on('click',function(){
                $('#upload_attacth').click();
            });

            $('#upload_attacth').bind('change', function() {
                var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
                /* calculate file size */
                var maximumSize = 5*1024*1024;
                var fSize = this.files[0].size;
                i=0;while(fSize>900){fSize/=1024;i++;}
                fSize = (Math.round(fSize*100)/100)+' '+fSExt[i];

                if(this.files[0].size > maximumSize){
                    swal('ไม่สามารเลือกไฟล์ได้', "ขนาดไฟล์ใหญ่เกินกว่าที่กำหนด", "error");
                    document.getElementById("upload_attacth").value = "";
                }else{
                    /* clone and modify object */
                    var clone = $(this).clone();

                    var numItems = ($('.upload-object').length)+1;
                    clone.attr('class', 'upload-object-child');
                    clone.attr('id', 'attacth'+numItems);
                    clone.attr('name', 'attacth[]');
                    /*clone.css('display', 'block');*/

                    /* get file upload name */
                    var fullPath = $(this).val();
                    if (fullPath) {
                        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                        var filename = fullPath.substring(startIndex);
                        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                            filename = filename.substring(1);
                        }
                    }

                    /* create upload object */
                    var boxIdname = 'attacth'+numItems+'-box';
                    var htmlTxt = '<div class="row upload-object" style="margin-top: 10px;"><div class="col-md-6">' +
                    '<span>รายการที่ <span class="numItems">'+numItems+'</span></span> : <span>'+filename+' ขนาด '+fSize+'</span><br>' +
                    '<span>คำอธิบาย</span> : <font color="red">* <span id="war-description" style="font-size:11px; ">ท่านไม่สามารถทำการแก้ไขคำอธิบายหลังจากทำการบันทึกข้อมูลแล้ว</span></font><br>' +
                    '<input type="text" name="description[]" class="attach-description form-control">' +
                    '<div id="'+boxIdname+'"></div></div>' +
                    '<div class="col-md-1"><i class="fa fa-2x fa-minus-square delAttach" style="margin-top: 45px; cursor: pointer;"></i></div></div>';
                    $('#file-box').append(htmlTxt);
                    $('#'+boxIdname).append(clone);
                }

            });
        });

        /* Delete upoload object */
        $(document).on('click', '.delAttach', function(e) {
            $(this).closest('.upload-object').remove();
            refreshUploadObject();

        });

        $(document).on('click', '.delUploadAttach', function(e) {
            var object = $(this);
            attach_id = object.closest('.upload-list').find('.attach-id').val();
            label = object.closest('.upload-list').find('a').text();

            swal({
                    title: "คำเตือน",
                    text: "คุณต้องการลบข้อมูล "+label+" ออกจากระบบหรือไม่?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                    closeOnConfirm: true
                },
                function(){
                    $.ajax({
                        type: 'POST',
                        async: false,
                        url: '../general_form_keyin/ajax.delete_attach.php',
                        data: {'attach_id': attach_id},
                        success: function () {
                            object.closest('.upload-list').remove();
                        }
                    });
                });
        });


        /* Refresh Number list of upload object */
        function refreshUploadObject(){
            var cnt = 1
            $('.upload-object').each(function () {
                $(this).find('.numItems').text(cnt);
                $(this).find('.upload-object-child').attr('id', 'attacth'+cnt);
                cnt++;
            });
        }
    </script>
</div>