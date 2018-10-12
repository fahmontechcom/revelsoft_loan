<?php

require_once("BaseModel.php");
class PostModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getPostBy($loan_type_id="",$sort_money="",$amphur_id="",$province_id="",$post_building="",$building_id="",$post_money_start="",$post_money_end="",$burden_id="",$post_deed="",$occupation_id="",$collateral_id=""){
        
        $str_loan_type_id = '';
        $str_money = '';
        $str_amphur_id = '';
        $str_province_id = '';
        $str_post_building = '';
        $str_building_id = '';
        $str_post_money_start = '';
        $str_post_money_end = '';
        $str_burden_id = '';
        $str_post_deed = '';
        $str_occupation_id = '';
        $str_collateral_id = '';

        if($loan_type_id!=""){ 
            $str_loan_type_id = " AND tb_post.loan_type_id = '$loan_type_id' ";
        }
        if($amphur_id!=""&&$amphur_id!="all"){ 
            $str_amphur_id = " AND tb_post.amphur_id = '$amphur_id' ";
        }
        if($province_id!=""&&$province_id!="all"){ 
            $str_province_id = " AND tb_post.province_id = '$province_id' ";
        }
        if($post_building!=""){ 
            if($post_building=='all'){
                $str_post_building="";
            }else if($post_building==0){
                $str_post_building = " AND post_building = '$post_building' ";
            }else if($post_building==1){
                if($building_id=='all'){ 
                    $str_post_building = " AND post_building = '$post_building' ";
                }else{
                    $str_post_building = " AND post_building = '$post_building'
                                            AND tb_post.building_id = '$building_id'";
                }
            }
        }
        if($post_money_start!=""){ 
            $str_post_money_start = " AND tb_post.post_money >= '$post_money_start' ";
        }
        if($post_money_end!=""){ 
            $str_post_money_end = " AND tb_post.post_money <= '$post_money_end' ";
        }
        if($burden_id!=""&&$burden_id!="all"){ 
            if($burden_id=="0"){
                $str_burden_id = " AND tb_post.burden_id = '$burden_id' ";
            }else{
                $str_burden_id = " AND tb_post.burden_id != '0' ";
            }
            
        }
        if($post_deed!=""&&$post_deed!="all"){ 
            if($post_deed=="0"){
                $str_post_deed = " AND tb_post.post_deed = '$post_deed' ";
            }else{
                $str_post_deed = " AND tb_post.post_deed != '0' ";
            }
            
        }
        if($occupation_id!=""&&$occupation_id!="all"){ 
            $str_occupation_id = " AND tb_post.occupation_id = '$occupation_id' ";
        }
        if($collateral_id!=""&&$collateral_id!="all"){ 
            $str_collateral_id = " AND tb_post.collateral_id = '$collateral_id' ";
        }

        if($sort_money=="2"){
            $str_money = " ORDER BY post_money ASC ";
        }else{
            $str_money = " ORDER BY post_money DESC ";
        }
        
        $sql = "SELECT tb_post.* ,tb_member.member_name,tb_member.member_name_show,tb_member.member_profile_img,tb_member.member_verified_status ,tb_loan_type.* ,tb_property.* ,tb_burden.* ,tb_occupation.* ,tb_collateral.* ,tb_building.* ,tb_amphur.* ,tb_province.*  
        FROM tb_post  
        INNER JOIN tb_member ON tb_post.member_id = tb_member.member_id 
        INNER JOIN tb_loan_type ON tb_post.loan_type_id = tb_loan_type.loan_type_id 
        LEFT JOIN tb_property ON tb_post.property_id = tb_property.property_id 
        LEFT JOIN tb_burden ON tb_post.burden_id = tb_burden.burden_id 
        LEFT JOIN tb_occupation ON tb_post.occupation_id = tb_occupation.occupation_id 
        LEFT JOIN tb_collateral ON tb_post.collateral_id = tb_collateral.collateral_id 
        LEFT JOIN tb_building ON tb_post.building_id = tb_building.building_id 
        INNER JOIN tb_amphur ON  tb_post.amphur_id = tb_amphur.amphur_id 
        INNER JOIN tb_province ON  tb_post.province_id = tb_province.province_id  
        WHERE 1 
        $str_loan_type_id
        $str_amphur_id
        $str_province_id
        $str_post_building 
        $str_post_money_start
        $str_post_money_end
        $str_burden_id
        $str_post_deed
        $str_occupation_id
        $str_collateral_id
        $str_money 
        ";
       
    //    echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    } 
 
    function updatePostByID($id,$data = []){ 
        $sql = "UPDATE tb_post SET    
        member_id = '".mysqli_real_escape_string(static::$db,$data['member_id'])."', 
        loan_type_id = '".mysqli_real_escape_string(static::$db,$data['loan_type_id'])."', 
        post_transaction_mortgage = '".mysqli_real_escape_string(static::$db,$data['post_transaction_mortgage'])."', 
        post_transaction_selling = '".mysqli_real_escape_string(static::$db,$data['post_transaction_selling'])."',  
        post_transaction_deposit = '".mysqli_real_escape_string(static::$db,$data['post_transaction_deposit'])."',  
        property_id = '".mysqli_real_escape_string(static::$db,$data['property_id'])."',   
        post_money = '".mysqli_real_escape_string(static::$db,$data['post_money'])."',  
        post_address = '".mysqli_real_escape_string(static::$db,$data['post_address'])."',  
        amphur_id = '".mysqli_real_escape_string(static::$db,$data['amphur_id'])."',  
        province_id = '".mysqli_real_escape_string(static::$db,$data['province_id'])."',  
        post_area_wa = '".mysqli_real_escape_string(static::$db,$data['post_area_wa'])."',  
        post_area_ngan = '".mysqli_real_escape_string(static::$db,$data['post_area_ngan'])."',  
        post_area_rai = '".mysqli_real_escape_string(static::$db,$data['post_area_rai'])."',  
        post_building = '".mysqli_real_escape_string(static::$db,$data['post_building'])."',  
        building_id = '".mysqli_real_escape_string(static::$db,$data['building_id'])."',  
        burden_id = '".mysqli_real_escape_string(static::$db,$data['burden_id'])."',  
        occupation_id = '".mysqli_real_escape_string(static::$db,$data['occupation_id'])."', 
        collateral_id = '".mysqli_real_escape_string(static::$db,$data['collateral_id'])."', 
        post_collateral_name = '".mysqli_real_escape_string(static::$db,$data['post_collateral_name'])."', 
        post_img_1 = '".mysqli_real_escape_string(static::$db,$data['post_img_1'])."', 
        post_img_2 = '".mysqli_real_escape_string(static::$db,$data['post_img_2'])."', 
        post_img_3 = '".mysqli_real_escape_string(static::$db,$data['post_img_3'])."', 
        post_img_4 = '".mysqli_real_escape_string(static::$db,$data['post_img_4'])."', 
        post_img_5 = '".mysqli_real_escape_string(static::$db,$data['post_img_5'])."', 
        post_img_6 = '".mysqli_real_escape_string(static::$db,$data['post_img_6'])."', 
        post_amount_day = '".mysqli_real_escape_string(static::$db,$data['post_amount_day'])."',  
        post_deed = '".mysqli_real_escape_string(static::$db,$data['post_deed'])."',  
        post_deed_number = '".mysqli_real_escape_string(static::$db,$data['post_deed_number'])."',  
        post_location_lat = '".mysqli_real_escape_string(static::$db,$data['post_location_lat'])."',  
        post_location_long = '".mysqli_real_escape_string(static::$db,$data['post_location_long'])."',  
        edit_date = NOW() 
        
        WHERE post_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updatePostByIDPostView($id,$data = []){ 
        $sql = "UPDATE tb_post SET    
        post_view = '".mysqli_real_escape_string(static::$db,$data['post_view'])."'   
        WHERE post_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function getPostByID($id){
        $sql = " SELECT * 
        FROM tb_post 
        INNER JOIN tb_loan_type ON tb_post.loan_type_id = tb_loan_type.loan_type_id 
        LEFT JOIN tb_property ON tb_post.property_id = tb_property.property_id 
        LEFT JOIN tb_burden ON tb_post.burden_id = tb_burden.burden_id 
        LEFT JOIN tb_occupation ON tb_post.occupation_id = tb_occupation.occupation_id 
        LEFT JOIN tb_collateral ON tb_post.collateral_id = tb_collateral.collateral_id 
        LEFT JOIN tb_building ON tb_post.building_id = tb_building.building_id 
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
        $data['post_img_1']=mysqli_real_escape_string(static::$db,$data['post_img_1']); 
        $data['post_img_2']=mysqli_real_escape_string(static::$db,$data['post_img_2']); 
        $data['post_img_3']=mysqli_real_escape_string(static::$db,$data['post_img_3']); 
        $data['post_img_4']=mysqli_real_escape_string(static::$db,$data['post_img_4']); 
        $data['post_img_5']=mysqli_real_escape_string(static::$db,$data['post_img_5']); 
        $data['post_img_6']=mysqli_real_escape_string(static::$db,$data['post_img_6']); 
        
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
            occupation_id,
            collateral_id,
            post_collateral_name,
            post_img_1,
            post_img_2,
            post_img_3,
            post_img_4,
            post_img_5,
            post_img_6,
            post_amount_day, 
            post_deed, 
            post_deed_number, 
            post_location_lat, 
            post_location_long, 
            post_finish_password, 
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
            $data['occupation_id']."','". 
            $data['collateral_id']."','". 
            $data['post_collateral_name']."','". 
            $data['post_img_1']."','". 
            $data['post_img_2']."','". 
            $data['post_img_3']."','". 
            $data['post_img_4']."','". 
            $data['post_img_5']."','". 
            $data['post_img_6']."','". 
            $data['post_amount_day']."','". 
            $data['post_deed']."','". 
            $data['post_deed_number']."','". 
            $data['post_location_lat']."','". 
            $data['post_location_long']."',". 
            $data['post_finish_password']."',". 
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
        $sql = " DELETE FROM tb_post WHERE post_id = '$id' ";  
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>