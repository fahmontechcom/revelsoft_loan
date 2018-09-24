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

    

    function getUserTypePermissionByID($id){
        $sql = " SELECT * 
        FROM tb_user_type_permission 
        WHERE user_type_id = '$id' 
        ";   
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data=[];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    } 
    function getUserTypePermissionByUserID($id){
        $sql = "SELECT  
        tb_user_type_permission.menu_id,
        tb_menu.menu_name,
        tb_menu.menu_name_eng,
        tb_user_type_permission.user_type_permission_view ,
        tb_user_type_permission.user_type_permission_add,
        tb_user_type_permission.user_type_permission_edit,
        tb_user_type_permission.user_type_permission_delete
        FROM tb_user 
        LEFT JOIN tb_user_type ON tb_user.user_type_id = tb_user_type.user_type_id
        INNER JOIN tb_user_type_permission ON tb_user_type.user_type_id = tb_user_type_permission.user_type_id  
        INNER JOIN tb_menu ON tb_user_type_permission.menu_id = tb_menu.menu_id  
        WHERE user_id = '$id' 
        ";   
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
    function getUserTypePermissionByUserTypeID($id,$menu_id=''){
        $sql = " SELECT * 
        FROM tb_user_type_permission 
        WHERE user_type_id = '$id' 
        "; 
        if($menu_id!=''){
            $sql .= " AND menu_id = '$menu_id' ";
        }
        // echo $sql;
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
            menu_id,
            user_type_permission_view,
            user_type_permission_add,
            user_type_permission_edit,
            user_type_permission_delete 
            ) VALUES (
            '".$data['user_type_id']."',
            '".$data['menu_id']."',
            '".$data['user_type_permission_view']."',
            '".$data['user_type_permission_add']."',
            '".$data['user_type_permission_edit']."',
            '".$data['user_type_permission_delete']."'
            )";
            // echo $sql;
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
        menu_id = '".$data['menu_id']."',
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