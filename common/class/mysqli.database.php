<?php
/*
 * @comment class สำหรับเชื่อมต่อ database ด้วย mysqli
 * @projectCode p4
 * @tor
 * @package  core
 * @author  Kiatisak  Chansawang
 * @created  6/1/2560 13:31
 * @access  private
 * จำเป็นต้อง require_once ไฟล์ config/config_host.php
 */

namespace Database;
class MysqliDB{

    public $connect = '';

    public $timeQuery = array();

    protected $qb_wh = "";

    protected $_where = "";

    protected $or_where = "";

    protected $_set = "";

    protected $_qb = "";

    public function __construct($database = DB_NAME,$charSet = 'UTF8')
    {
        $this->connect = mysqli_connect(HOST, USER, PWD, $database);
        mysqli_set_charset($this->connect, $charSet);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function ServiceSelectDB($database = DB_DATA)
    {
        mysqli_select_db($this->connect, $database);
    }

    public function ServiceQuery($sql, $debug = '', $error = 'on')
    {
        $msc = microtime(true);
        $result = mysqli_query($this->connect, $sql);
        $msc = microtime(true) - $msc;
            # เวลาในการ query
        $this->timeQuery['scTimeQuery'] = $msc; // in seconds
        $this->timeQuery['mscTimeQuery'] = ($msc * 1000); // in millseconds

        # Debug sql
        if ($debug != '') {
            echo "<pre>";
            echo $sql;
            echo "</pre>";
        }

        # error alert
        if ($error == 'on' && mysqli_error($this->connect)) {
            echo "<hr>" . $sql . "<hr>" . mysqli_error($this->connect);
            die;
        } else {
            return $result;
        }
    }

    function Insert($table, $fields = array(), $database = '', $log = False ){

        if(count($fields) > 0){
            $setSQL = '';
            foreach ($fields AS $field => $value){
                $setSQL .= " `".$field."` = '".$value."',";
            }

            $setSQL = rtrim($setSQL, ',');

            if($database <> ''){
                $this->ServiceSelectDB($database);
            }

            if($this->ServiceQuery("INSERT INTO ".$table." SET ".$setSQL)){
                return $this->connect->insert_id;
            }else{
                echo $this->connect->error;
                exit();
            }

        }else{
            echo 'must be fields is not empty';
            exit();
        }
    }

    function Update($table, $fields = array(), $where = array(), $database = '', $log = False){

        if(empty($table)){
            echo "Please select table!";
            exit();
        }

        if(empty($fields) && count($fields) == 0){
            echo "Please set fields and values";
            exit();
        }

        if(empty($where)){
            echo "Please select where case!";
            exit();
        }

        $this->_qb = "UPDATE ".$table." SET ".$this->set($fields)." WHERE ".$this->where($where);

        if(!empty($database)){
            $this->ServiceSelectDB($database);
        }
        return $this->ServiceQuery($this->_qb);
    }

    function set($fields = array()){
        $this->_set = "";
        foreach ( $fields as $key => $value ){
            $this->_set .=  " `".$key."` = '".$value."',";
        }
        return rtrim($this->_set, ",");
    }

    function where($where = array()){
        $this->qb_wh = "";
        $where = array_change_key_case($where, CASE_LOWER);
        $this->qb_wh .=  $this->_where($where['and']);
        $this->qb_wh .=  $this->qb_wh <> "" && $this->_where($where['or']) <> "" ? " AND ".$this->_where($where['or']) : $this->_where($where['or']); ;

        return $this->qb_wh;
    }

    function _where($where_and = array()){
        $this->_where = "";
        if(is_array($where_and) == true){
            $index = 0;
            foreach( $where_and as $key => $value){
                if($index == 0){
                    $this->_where .= $this->addOperator($key, $value);
                }else{
                    $this->_where .= " AND ";
                    $this->_where .= $this->addOperator($key, $value);
                }
            $index++;
            }
        }

        return $this->_where;
    }

    function or_where($or_where = array()){
        $this->or_where = "";
        foreach($or_where as $key => $value){
            if($key == 0){
                $this->or_where .= $this->addOperator($key, $value);
                continue;
            }else{
                $this->or_where .= " OR ";
                $this->or_where .= $this->addOperator($key, $value);
            }
        }
        return $this->or_where;
    }

    function addOperator($key = '', $value = ''){
        if(is_string($key) && !empty($key)){

            $key = explode(" ", $key);


            if($key[1] == ""){

                $key[1] = "=";
            }
            return $key[0]." ".$key[1]." '".$value."' ";
        }else{
            exit();
        }
    }
}

?>
