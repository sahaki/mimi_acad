<?php

/**
 * Created by PhpStorm.
 * User: Adisak
 * Date: 25/10/2559
 * Time: 16:07
 */
class DateThai
{

    VAR $Month = array(
        "00" => array( "F" => "" ,"l" => ""),
        "01" => array( "F" =>"มกราคม","l" => "ม.ค."),
        "02" => array( "F" =>"กุมภาพันธ์","l" => "ก.พ."),
        "03" => array( "F" =>"มีนาคม","l" => "มี.ค."),
        "04" => array( "F" =>"เมษายน","l" => "เม.ย."),
        "05" => array( "F" =>"พฤษภาคม","l" => "พ.ค"),
        "06" => array( "F" => "มิถุนายน","l" => "มิ.ย."),
        "07" => array( "F" =>"กรกฎาคม","l" => "ก.ค."),
        "08" => array( "F" =>"สิงหาคม","l" => "ส.ค."),
        "09" => array( "F" =>"กันยายน","l" => "ก.ย."),
        "10" => array( "F" =>"ตุลาคม","l" => "ต.ค."),
        "11" => array( "F" => "พฤศจิกายน","l" => "พ.ย."),
        "12" => array( "F" => "ธันวาคม", "l" => "ธ.ค.")
        );

    function getMonthofYear($date = '', $type  = "F"){

        if(empty($date) || $date == ''){
            return '';
        }

        $result = "";
        if($date !== "" && strlen($date) == 8){
           $strYear = substr($date,0,4);
           $strMount = $this->Month[substr($date, 4,2)][$type];
            $result = $strMount." ".$strYear;
        }else if(strlen($date) == 10){
            $str = explode('-', $date);
            $strYear = $str[0]+543;
            $strMount = $this->Month[$str[1]][$type];
            $result = $strMount." ".$strYear;
        }
        return $result;
    }

    function getFullYear($date = '', $type = 'F'){

        if(empty($date) || $date == ''){
            return '';
        }

        $result = "";
        if($date !== ""){
            $strYear = substr($date,0,4);
            $strMount = $this->Month[substr($date, 4,2)][$type];
            $strDate = substr($date,6,2) * 1;
            $result = $strDate." ".$strMount." ".$strYear;
        }
        return $result;
    }

    function getConvertDate($date = '', $type = 'F' ){

        if(empty($date) || $date == ''){
            return '';
        }

        $result = '';
        if(strlen($date) == 19){
            $full = explode(' ', $date);
            $str = explode('-', $full[0]);
            $time = $full[1];
            $strYear = $str[0]+543;
            $strDate = $str[2] * 1;
            $strMount = $this->Month[$str[1]][$type];
            $result = $strDate.' '.$strMount." ".$strYear." เวลา ".$time;
        }
        return $result;
    }

    function getConvertDateNonTime($date = '', $type = 'F' ){

        if(empty($date) || $date == ''){
            return '';
        }

        $result = '';
        if(strlen($date) == 19){
            $full = explode(' ', $date);
            $str = explode('-', $full[0]);
            $time = $full[1];
            $strYear = $str[0]+543;
            $strDate = $str[2] * 1;
            $strMount = $this->Month[$str[1]][$type];
            $result = $strDate.' '.$strMount." ".$strYear;
        }
        return $result;
    }



    # modify by ming 3/2/60 เพื่อแปลงค่าวันที่ ในรูปแบบ dd/mm/yyyy  ให้เป็นภาษาไทย
    function getConvertDateTothai($date = '' , $sign='' ,$typeyear='543', $showmonth = 'F', $showyear='L' ,$labelyear='' ){
        # date  รับค่า dd/mm/yyyy
        # sign = รับค่าสัญลักษณ์เพื่อทำการ explode เช่น / - ,
        # typeyear รับค่าประเภทปี //  543 = ปี คศ  //  0 คือ ปี พศ
        # $showmonth รับค่าประเภทเดือน //  F = เดือนภาษาไทย แบบเต็ม  // l = เดือนภาษาไทย แบบย่อ
        # showyear  รับค่าประเภทปี // L เพิ่อแสดงปีแบบเต็ม // S เพื่อแสดงปีแบบย่อ
        # labelyear รับค่า ป้าย แสดง คำว่า พ.ศ.

        if(empty($date) || $date == ''){
            return '';
        }

            $full = explode($sign, $date);
            $strYear = $full[2]+$typeyear;
            if($showyear == 'S'){
                $strYear = substr($strYear,2);
            }
            $strDate = $full[0] * 1;
            $strMount = $this->Month[$full[1]][$showmonth];
            $result = $strDate.' '.$strMount.' '.$labelyear.' '.$strYear;
        return $result;
    }

    public function dateEngToThai($date = '',$add=0,$dismonth="F",$disyear="F"){

        if(empty($date) || $date == '' || $date == '0000-00-00'){
            return '';
        }
        if($date!=""){
            $date=substr($date,0,10);
            list($year,$month,$day) = split('[/.-]', $date);
            $month=$this->Month[$month][$dismonth];
            if($disyear=="S"){
                $xyear=substr(($year+$add),2,2);
            }else{
                $xyear=( $year+$add);
            }
            return   ($day*1) ." " . $month." " .($xyear) ;
        }else{
            return "";
        }
    }
    /* function แปลงข้อมูลวันที่ ในรูปแบบ วว/ดด/ปีปีปีปี ให้เป็น รูปแบบ unix time ก่อนทำการบันทึก */
    public function dateThaiToSave($date){
        if($date!=""){
            $date=substr($date,0,10);
            list($day,$month,$year) = split('[/.-]', $date);
            return   ($year-543) ."-" . $month."-" .($day) ;
        }else{
            return "";
        }
    }

    /* function แปลงข้อมูลวันที่  รูปแบบ unix time ให้เป็น  ในรูปแบบ วว/ดด/ปีปีปีปี */
    public function dateEngToDatePicker($date){
        if($date!=""){
            $date=substr($date,0,10);
            list($year,$month,$day) = split('[/.-]', $date);
            return   $day ."/" . $month."/" .($year+543) ;
        }else{
            return "";
        }
    }

}