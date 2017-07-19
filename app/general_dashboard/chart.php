<?php
/**
 * Created by PhpStorm.
 * User: Mring
 * Date: 18/7/2560
 * Time: 21:33
 */
?>
<!-- ================== chart ================== -->
<link href="../assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
<link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
<link href="../assets/plugins/morris/morris.css" rel="stylesheet" />


<div class="widget-chart with-sidebar bg-black">
    <div class="widget-chart-content">
        <h4 class="chart-title">
            สถิติตำแหน่งผู้เล่นทั้งหมด
            <small>ประจำปี 2560 </small>
        </h4>
        <div id="visitors-line-chart" class="morris-inverse" style="height: 260px;width: 580px"></div>
    </div>

</div>

<!-- ================== chart ================== -->
<script src="../assets/plugins/morris/raphael.min.js"></script>
<script src="../assets/plugins/morris/morris.js"></script>
<script src="../assets/js/apps.min.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });

    var getMonthName=function(e){
        var t=[];t[0]="January";t[1]="February";t[2]="March";t[3]="April";t[4]="May";t[5]="Jun";t[6]="July";t[7]="August";t[8]="September";t[9]="October";t[10]="November";t[11]="December";
        return t[e]};
    var getDate=function(e){
        var t=new Date(e);
        var n=t.getDate();
        var r=t.getMonth()+1;
        var i=t.getFullYear();
        if(n<10){n="0"+n}if(r<10){r="0"+r}t=i+"-"+r+"-"+n;
        return t};
    var e="#0D888B";var t="#00ACAC";var n="#3273B1";var r="#348FE2";
    var i="rgba(0,0,0,0.6)";var s="rgba(255,255,255,0.4)";
    window.m = Morris.Line({
        element: 'visitors-line-chart',
        data:[{
            x:"2014-02-01",
            y:60,z:30},
            {x:"2014-03-01",y:70,z:40},
            {x:"2014-04-01",y:40,z:10},
            {x:"2014-05-01",y:100,z:70},
            {x:"2014-06-01",y:40,z:10},
            {x:"2014-07-01",y:80,z:50},
            {x:"2014-08-01",y:70,z:40}],

        xkey:"x",ykeys:["y","z"],
        xLabelFormat:function(e){
            e=getMonthName(e.getMonth());
            return e.toString()},
        labels:["Page Views","Unique Visitors"],
        lineColors:[e,n],pointFillColors:[t,r],
        lineWidth:"2px",pointStrokeColors:[i,i],
        resize:true,gridTextFamily:"Open Sans",
        gridTextColor:s,
        gridTextWeight:"normal",
        gridTextSize:"11px",
        gridLineColor:"rgba(0,0,0,0.5)",
        hideHover:"auto"
    });
</script>