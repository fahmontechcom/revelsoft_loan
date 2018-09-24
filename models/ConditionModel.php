<?php
require_once("BaseModel.php");
class ConditionModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getConditionBy($name = ''){
        $sql = "SELECT * FROM tb_condition WHERE condition_title LIKE ('%$name%') 
        ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    

    function getConditionByID($id){
        $sql = " SELECT * 
        FROM tb_condition 
        WHERE condition_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    } 
    function checkConditionBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_condition 
        WHERE condition_title = '$name'  
        ";
        if($id!=''){
            $sql .= " AND condition_id != '$id'";
        }
// echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data=[];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    } 

    function insertCondition($data=[]){
        $sql = " INSERT INTO tb_condition(
            condition_title, 
            condition_detail
            ) VALUES ('".
            mysqli_real_escape_string(static::$db,$data['condition_title'])."','".
            mysqli_real_escape_string(static::$db,$data['condition_detail'])."' 
            )"; 
            // echo '<script>console.log('.$sql.');</script>';
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return false;
        }
    }

    function updateConditionByID($id,$data = []){
        $sql = " UPDATE tb_condition SET  
        condition_title = '".mysqli_real_escape_string(static::$db,$data['condition_title'])."', 
        condition_detail = '".mysqli_real_escape_string(static::$db,$data['condition_detail'])."'  
        WHERE condition_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteConditionByID($id){
        $sql = " DELETE FROM tb_condition WHERE condition_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>