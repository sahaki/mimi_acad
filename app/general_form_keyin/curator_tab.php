<div>
    <fieldset class="curator_contrainer">
        <legend class="pull-left width-full form-legend">ผู้ปกครอง</legend>
        <div class="row curator">
            <div class="col-md-3">
                <div class="form-group">
                    <label><b><u>คนที่ 1</u> :</b> ชื่อ</label>
                    <input type="text" name="middle" placeholder="ชื่อ" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>นามสกุล</label>
                    <input type="text" name="middle" placeholder="นามสกุล" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>เบอร์ติดต่อ</label>
                    <input type="text" name="middle" placeholder="เบอร์ติดต่อ" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>ความสัมพันธ์</label>
                    <input type="text" name="middle" placeholder="ความสัมพันธ์" class="form-control" />
                </div>
            </div>
            <div class="col-md-1 console">
                <i class="fa fa-2x fa-plus-square newObject" style="margin-top: 30px; cursor: pointer;"></i>
            </div>
        </div>
    </fieldset>
    <script>
        $('.newObject').click(function () {
            $(this).closest('.curator').clone().appendTo('.curator_contrainer').find('.console').empty().append('<i class="fa fa-2x fa-minus-square delObject" style="margin-top: 30px; cursor: pointer;"></i>');
        });

        $(document).on('click', '.delObject', function(e) {
            $(this).closest('.curator').remove();
        });
    </script>
</div>