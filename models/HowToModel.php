<?php
require_once("BaseModel.php");
class HowToModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getHowToBy($name = ''){
        $sql = "SELECT * FROM tb_how_to  
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

    

    function getHowToByID($id){
        $sql = " SELECT * 
        FROM tb_how_to 
        WHERE how_to_id = '$id' 
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
    function checkHowToBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_how_to 
        WHERE how_to_name = '$name'  
        ";
        if($id!=''){
            $sql .= " AND how_to_id != '$id'";
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

    function insertHowTo($data=[]){
        $sql = " INSERT INTO tb_how_to( 
            how_to_detail,
            how_to_img 
            ) VALUES ( 
                '".$data['how_to_detail']."',
                '".$data['how_to_img']."'
            )";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return false;
        }
    }

    function updateHowToByID($id,$data = []){
        $sql = " UPDATE tb_how_to SET  
        how_to_detail = '".$data['how_to_detail']."', 
        how_to_img = '".$data['how_to_img']."' 
        WHERE how_to_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteHowToByID($id){
        $sql = " DELETE FROM tb_how_to WHERE how_to_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>