<?php
require_once("BaseModel.php");
class UserTypePermissionModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getUserTypePermissionBy($name = ''){
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

    

    function getUserTypePermissionByUserTypeID($id,$page_id=''){
        $sql = " SELECT * 
        FROM tb_user_type_permission 
        WHERE user_type_id = '$id' 
        "; 
        if($page_id!=''){
            $sql .= " AND page_id = '$page_id' ";
        }
        echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data=[];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    } 

    function insertUserTypePermission($data=[]){
        $sql = " INSERT INTO tb_user_type_permission(
            user_type_id,
            page_id,
            user_type_permission_view,
            user_type_permission_add,
            user_type_permission_edit,
            user_type_permission_delete 
            ) VALUES (
            '".$data['user_type_id']."',
            '".$data['page_id']."',
            '".$data['user_type_permission_view']."',
            '".$data['user_type_permission_add']."',
            '".$data['user_type_permission_edit']."',
            '".$data['user_type_permission_delete']."'
            )";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return false;
        }
    }

    function updateUserTypePermissionByID($id,$data = []){
        $sql = " UPDATE tb_user_type_permission SET 
        user_type_id = '".$data['user_type_id']."',
        page_id = '".$data['page_id']."',
        user_type_permission_view = '".$data['user_type_permission_view']."',
        user_type_permission_add = '".$data['user_type_permission_add']."',
        user_type_permission_edit = '".$data['user_type_permission_edit']."',
        user_type_permission_delete = '".$data['user_type_permission_delete']."' 
        WHERE user_type_permission_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteUserTypePermissionByID($id){
        $sql = " DELETE FROM tb_user_type_permission WHERE user_type_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>