<div>
    <fieldset class="curator_contrainer">
        <legend class="pull-left width-full form-legend">ข้อมูลเกี่ยวกับฟุตบอล</legend>
        <div class="row">
            <div class="col-md-12">
                <label>ตำแหน่งที่ถนัด</label>
            </div>
            <?php
            $sql = "SELECT
            t1.position_id,
            t1.position_label
            FROM
            config_position AS t1
            WHERE t1.`status` = '1'
            ORDER BY t1.orderby";
            $result = $mysqli->ServiceQuery($sql);
            foreach ($result as $index => $value):
            ?>
                <div class="col-md-3">
                    <input type="checkbox"><label style="margin-left: 10px;"><?php echo $value['position_label']?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <legend class="pull-left width-full form-legend" style="margin-top: -20px;">&nbsp;</legend>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>นักฟุตบอลที่ชอบ</label>
                    <input type="text" name="middle" placeholder="นักฟุตบอลที่ชอบ" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>สโมสรฟุตบอลต่างประเทศที่ชอบ</label>
                    <input type="text" name="middle" placeholder="สโมสรฟุตบอลต่างประเทศที่ชอบ" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>สโมสรฟุตบอลในระเทศที่ชอบ</label>
                    <input type="text" name="middle" placeholder="สโมสรฟุตบอลในระเทศที่ชอบ" class="form-control" />
                </div>
            </div>
        </div>
    </fieldset>

</div>