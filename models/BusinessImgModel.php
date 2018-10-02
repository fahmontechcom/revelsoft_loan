<?php

require_once("BaseModel.php");
class BusinessImgModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getBusinessImgBy($member_id){
        $sql = "SELECT * 
        FROM tb_member_business_img  
        WHERE member_id ='$member_id' 
        ORDER BY member_business_img_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getBusinessImgByID($id){
        $sql = "SELECT * 
        FROM tb_member_business_img
        WHERE member_business_img_id = '$id' 
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
    
    function insertBusinessImg($data=[]){
        $sql = " INSERT INTO tb_member_business_img( 
        member_id,
        member_business_img_img
        ) VALUES ('". 
        $data['member_id']."','". 
        $data['member_business_img_img']."'
        )";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteBusinessImgByID($id){
        $sql = " DELETE FROM tb_member_business_img WHERE member_business_img_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>