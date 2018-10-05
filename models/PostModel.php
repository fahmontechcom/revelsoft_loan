<?php

require_once("BaseModel.php");
class PostModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getPostByID($id){
        $sql = " SELECT * 
        FROM tb_post 
        INNER JOIN tb_loan_type ON tb_post.loan_type_id = tb_loan_type.loan_type_id 
        LEFT JOIN tb_property ON tb_post.property_id = tb_property.property_id 
        LEFT JOIN tb_burden ON tb_post.burden_id = tb_burden.burden_id 
        LEFT JOIN tb_occupation ON tb_post.occupation_id = tb_occupation.occupation_id 
        INNER JOIN tb_amphur ON  tb_post.amphur_id = tb_amphur.amphur_id 
        INNER JOIN tb_province ON  tb_post.province_id = tb_province.province_id 
        WHERE post_id = '$id' 
        ";
// echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
 

    function insertPost($data=[]){

        
        $data['property_id']=mysqli_real_escape_string(static::$db,$data['property_id']);
        $data['post_money']=mysqli_real_escape_string(static::$db,$data['post_money']);
        $data['post_address']=mysqli_real_escape_string(static::$db,$data['post_address']); 
        $data['post_area_wa']=mysqli_real_escape_string(static::$db,$data['post_area_wa']); 
        $data['post_area_ngan']=mysqli_real_escape_string(static::$db,$data['post_area_ngan']); 
        $data['post_area_rai']=mysqli_real_escape_string(static::$db,$data['post_area_rai']); 
        $data['post_building']=mysqli_real_escape_string(static::$db,$data['post_building']); 
        $data['post_deed_front_img_1']=mysqli_real_escape_string(static::$db,$data['post_deed_front_img_1']); 
        $data['post_deed_front_img_2']=mysqli_real_escape_string(static::$db,$data['post_deed_front_img_2']); 
        $data['post_deed_back_img_1']=mysqli_real_escape_string(static::$db,$data['post_deed_back_img_1']); 
        $data['post_deed_back_img_2']=mysqli_real_escape_string(static::$db,$data['post_deed_back_img_2']); 
        $data['post_building_img_1']=mysqli_real_escape_string(static::$db,$data['post_building_img_1']); 
        $data['post_building_img_2']=mysqli_real_escape_string(static::$db,$data['post_building_img_2']); 
        $data['post_location_lat']=mysqli_real_escape_string(static::$db,$data['post_location_lat']); 
        $data['post_location_long']=mysqli_real_escape_string(static::$db,$data['post_location_long']); 
        
        
        $sql = " INSERT INTO tb_post(
            member_id,
            loan_type_id,
            post_transaction_mortgage,
            post_transaction_selling, 
            post_transaction_deposit, 
            property_id,  
            post_money, 
            post_address, 
            amphur_id, 
            province_id, 
            post_area_wa, 
            post_area_ngan, 
            post_area_rai, 
            post_building, 
            building_id, 
            burden_id, 
            post_deed_front_img_1, 
            post_deed_front_img_2,  
            post_deed_back_img_1,
            post_deed_back_img_2, 
            post_building_img_1, 
            post_building_img_2, 
            post_occupation_img_1,
            post_occupation_img_2,
            post_occupation_img_3,
            post_occupation_img_4,
            post_occupation_img_5,
            post_occupation_img_6,
            post_amount_day, 
            post_deed, 
            post_deed_number, 
            post_location_lat, 
            post_location_long, 
            create_date 
        ) VALUES ('". 
            $data['member_id']."','".
            $data['loan_type_id']."','".
            $data['post_transaction_mortgage']."','".
            $data['post_transaction_selling']."','". 
            $data['post_transaction_deposit']."','". 
            $data['property_id']."','".  
            $data['post_money']."','". 
            $data['post_address']."','". 
            $data['amphur_id']."','". 
            $data['province_id']."','". 
            $data['post_area_wa']."','". 
            $data['post_area_ngan']."','". 
            $data['post_area_rai']."','". 
            $data['post_building']."','". 
            $data['building_id']."','". 
            $data['burden_id']."','". 
            $data['post_deed_front_img_1']."','". 
            $data['post_deed_front_img_2']."','".  
            $data['post_deed_back_img_1']."','".
            $data['post_deed_back_img_2']."','". 
            $data['post_building_img_1']."','". 
            $data['post_building_img_2']."','". 
            $data['post_occupation_img_1']."','". 
            $data['post_occupation_img_2']."','". 
            $data['post_occupation_img_3']."','". 
            $data['post_occupation_img_4']."','". 
            $data['post_occupation_img_5']."','". 
            $data['post_occupation_img_6']."','". 
            $data['post_amount_day']."','". 
            $data['post_deed']."','". 
            $data['post_deed_number']."','". 
            $data['post_location_lat']."','". 
            $data['post_location_long']."',". 
            "NOW()". 
        " )";
// echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deletePostByID($id){
        $sql = " DELETE FROM tb_member WHERE member_id = '$id' ";
        $result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT); 

        $sql = " DELETE FROM tb_member_business_img WHERE member_id = '$id' ";
        $result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
 
    }
}
?>