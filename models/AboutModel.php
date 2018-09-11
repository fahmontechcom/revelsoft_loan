<?php

require_once("BaseModel.php");
class AboutModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getAboutBy(){
        $sql = "SELECT * 
        FROM tb_about ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getAboutByID($id){
        $sql = " SELECT * 
        FROM tb_about
        WHERE about_id = '$id' 
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
    
    function updateAboutByID($id,$data = []){
        $sql = " UPDATE tb_about SET 
        about_image_1 = '".$data['about_image_1']."',
        about_con_1_title = '".$data['about_con_1_title']."',
        about_con_1_description_1='".$data['about_con_1_description_1']."',
        about_con_1_description_2='".$data['about_con_1_description_2']."',
        about_con_2_title = '".$data['about_con_2_title']."',
        about_con_2_description_1='".$data['about_con_2_description_1']."', 
        about_con_3_title = '".$data['about_con_3_title']."',
        about_con_3_description_1='".$data['about_con_3_description_1']."',
        about_con_3_description_2='".$data['about_con_3_description_2']."',
        updateby = '".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE about_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertAbout($data=[]){
        
    }

    function deleteAboutByID($id){
        $sql = "DELETE FROM tb_about WHERE about_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>