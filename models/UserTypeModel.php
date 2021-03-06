<?php
require_once("BaseModel.php");
class UserTypeModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getUserTypeBy($name = ''){
        $sql = "SELECT * FROM tb_user_type WHERE user_type_name LIKE ('%$name%') 
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

    

    function getUserTypeByID($id){
        $sql = " SELECT * 
        FROM tb_user_type 
        WHERE user_type_id = '$id' 
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
    function checkUserTypeBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_user_type 
        WHERE user_type_name = '$name'  
        ";
        if($id!=''){
            $sql .= " AND user_type_id != '$id'";
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

    function insertUserType($data=[]){
        $sql = " INSERT INTO tb_user_type(
            user_type_name
            ) VALUES ('".
            $data['user_type_name']."')";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return false;
        }
    }

    function updateUserTypeByID($id,$data = []){
        $sql = " UPDATE tb_user_type SET 
        user_type_name = '".$data['user_type_name']."'
        WHERE user_type_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteUserTypeByID($id){
        $sql = " DELETE FROM tb_user_type WHERE user_type_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>