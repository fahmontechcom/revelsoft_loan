<?php

require_once("BaseModel.php");
class PromotionModel extends BaseModel{

    function __construct(){
        $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }

    function getPromotionBy($keyword = ""){
        $sql = "SELECT 
        *
        FROM tb_promotion 
        ORDER BY promotion_id";
        if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getPromotionMinBy($date_start = ""){
        $sql = "SELECT 
        *
        FROM tb_promotion 
        WHERE STR_TO_DATE(promotion_date_begin,'%Y-%m-%d') >= STR_TO_DATE('$date_start','%Y-%m-%d')
        ORDER BY STR_TO_DATE(promotion_date_begin,'%Y-%m-%d')  ";

        if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getPromotionByID($id){
        $sql = " SELECT * 
        FROM tb_promotion
        WHERE promotion_id = '$id' 
        ";

        if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    
    function updatePromotionByID($id,$data = []){
        $sql = " UPDATE tb_promotion SET 
        promotion_title  = '".$data['promotion_title']."',
        promotion_description='".$data['promotion_description']."', 
        promotion_tag='".$data['promotion_tag']."',
        promotion_date_begin='".$data['promotion_date_begin']."',
        promotion_date_end='".$data['promotion_date_end']."', 
        promotion_image='".$data['promotion_image']."',
        updateby='".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE promotion_id = $id "; 

        if (mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id($this->db);
        }else{
            return false;
        }


    }


    function insertPromotion($data=[]){
        $sql = " INSERT INTO tb_promotion(
        promotion_title, 
        promotion_description,  
        promotion_tag,
        promotion_image, 
        promotion_date_begin,
        promotion_date_end, 
        addby, 
        adddate
    ) VALUES ('".
    $data['promotion_title']."','".
    $data['promotion_description']."','". 
    $data['promotion_tag']."','".
    $data['promotion_image']."','". 
    $data['promotion_date_begin']."','".
    $data['promotion_date_end']."','". 
    $data['addby']."',
    NOW()) ";

    if (mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id($this->db);
    }else {
        return false;
    }
}

function deletePromotionByID($id){
    $sql = " DELETE FROM tb_promotion WHERE promotion_id = '$id' ";
    mysqli_query($this->db,$sql, MYSQLI_USE_RESULT);
}

function setPromotionView($id,$val){
    $sql = "UPDATE tb_promotion SET promotion_show = '$val' WHERE promotion_id = '$id'";
    if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
       return true;
   }
}
}
?>