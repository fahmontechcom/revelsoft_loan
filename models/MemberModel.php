<?php

require_once("BaseModel.php");
class MemberModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getLogin($member_email, $member_password){

        $member_email = mysqli_real_escape_string(static::$db,$member_email);
        $member_password = mysqli_real_escape_string(static::$db,$member_password);

        $sql = "SELECT * 
        FROM tb_member 
        WHERE member_email = '$member_email' 
        AND member_password = '$member_password'";
         
// echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }

         
    }

    function getMemberBy($confirm_key = "",$member_name="" ,$member_email=""){
        $sql = "SELECT * 
        FROM tb_member 
        INNER JOIN tb_member_type ON tb_member.member_type_id = tb_member_type.member_type_id   
        ";
        if($confirm_key!=""){
            $sql .= " WHERE member_email_confirm_key= '$confirm_key'" ;
        }
        if($member_name!=""&&$member_email!=""){
            $sql .= " WHERE member_name= '$member_name' OR member_email= '$member_email'" ;
        } 
        
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
 
    function checkMemberBy($id = "",$member_name="" ,$member_email=""){
        $sql = "SELECT * 
        FROM tb_member   
        WHERE member_id != '$id' 
        AND (member_name= '$member_name' OR member_email= '$member_email') 
        "; 
        
        // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getMemberByMemberTypeID($id){
        $sql = " SELECT * 
        FROM tb_member 
        WHERE member_type_id = '$id' 
        AND member_verified_status = '1' 
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
    function getMemberByAllMemberTypeID($id){
        $sql = " SELECT * 
        FROM tb_member 
        WHERE member_type_id = '$id'  
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
    function getMemberByID($id){
        $sql = " SELECT * 
        FROM tb_member 
        WHERE member_id = '$id' 
        ";
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
 
    function updateMemberByIDColEmailConfirm($id,$data = []){
        $sql = "UPDATE tb_member SET  
        member_email_confirm_key = '".$data['member_email_confirm_key']."', 
        member_email_confirm_status = '".$data['member_email_confirm_status']."'  
        WHERE member_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updateMemberByMemberVerifiedStatus($id,$data = []){
        $sql = "UPDATE tb_member SET  
        member_verified_status = '".$data['member_verified_status']."' 
        WHERE member_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updateMemberByIDBusiness($id,$data = []){
        $data['member_business_name']=mysqli_real_escape_string(static::$db,$data['member_business_name']);
        $data['member_branch_name']=mysqli_real_escape_string(static::$db,$data['member_branch_name']);
        $data['member_tax_id']=mysqli_real_escape_string(static::$db,$data['member_tax_id']);
        $data['member_service_detail']=mysqli_real_escape_string(static::$db,$data['member_service_detail']); 
        $data['member_location_lat']=mysqli_real_escape_string(static::$db,$data['member_location_lat']);
        $data['member_location_long']=mysqli_real_escape_string(static::$db,$data['member_location_long']); 
        $sql = "UPDATE tb_member SET  
        member_lender_type_id = '".$data['member_lender_type_id']."', 
        member_loan_type_deed = '".$data['member_loan_type_deed']."', 
        member_loan_type_pico = '".$data['member_loan_type_pico']."', 
        member_loan_type_nano = '".$data['member_loan_type_nano']."', 
        member_loan_type_business = '".$data['member_loan_type_business']."', 
        member_business_name = '".$data['member_business_name']."', 
        member_branch_name = '".$data['member_branch_name']."', 
        member_tax_id = '".$data['member_tax_id']."',   
        member_service_detail = '".$data['member_service_detail']."',   
        member_location_lat = '".$data['member_location_lat']."',   
        member_location_long = '".$data['member_location_long']."'  
        WHERE member_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updateMemberByIDVerified($id,$data = []){
        $data['member_id_card_img']=mysqli_real_escape_string(static::$db,$data['member_id_card_img']);
        $data['member_company_certificate_img']=mysqli_real_escape_string(static::$db,$data['member_company_certificate_img']);
        $data['member_license_img']=mysqli_real_escape_string(static::$db,$data['member_license_img']);
        $sql = "UPDATE tb_member SET  
        member_id_card_img = '".$data['member_id_card_img']."',  
        member_company_certificate_img = '".$data['member_company_certificate_img']."',  
        member_license_img = '".$data['member_license_img']."'  
        member_verified_status = '".$data['member_verified_status']."'  
        WHERE member_id = '$id' ";
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    function updateMemberByID($id,$data = []){
        $data['member_type_id']=mysqli_real_escape_string(static::$db,$data['member_type_id']);
        $data['member_name']=mysqli_real_escape_string(static::$db,$data['member_name']);
        $data['member_name_show']=mysqli_real_escape_string(static::$db,$data['member_name_show']);
        $data['member_address']=mysqli_real_escape_string(static::$db,$data['member_address']); 
        $data['amphur_id']=mysqli_real_escape_string(static::$db,$data['amphur_id']);
        $data['province_id']=mysqli_real_escape_string(static::$db,$data['province_id']);
        $data['member_tel']=mysqli_real_escape_string(static::$db,$data['member_tel']);
        $data['member_email']=mysqli_real_escape_string(static::$db,$data['member_email']);
        $data['member_password']=mysqli_real_escape_string(static::$db,$data['member_password']);
        $data['member_profile_img']=mysqli_real_escape_string(static::$db,$data['member_profile_img']);
        $data['member_email_confirm_key']=mysqli_real_escape_string(static::$db,$data['member_email_confirm_key']);
        $data['member_email_confirm_status']=mysqli_real_escape_string(static::$db,$data['member_email_confirm_status']);
        $data['member_lender_type_id']=mysqli_real_escape_string(static::$db,$data['member_lender_type_id']);
        $data['member_branch_name']=mysqli_real_escape_string(static::$db,$data['member_branch_name']);
        $data['member_tax_id']=mysqli_real_escape_string(static::$db,$data['member_tax_id']);
        $data['member_service_detail']=mysqli_real_escape_string(static::$db,$data['member_service_detail']);
        $data['member_location']=mysqli_real_escape_string(static::$db,$data['member_location']);
        $data['member_id_card_img']=mysqli_real_escape_string(static::$db,$data['member_id_card_img']);
        $data['member_company_certificate_img']=mysqli_real_escape_string(static::$db,$data['member_company_certificate_img']);
        $data['member_license_img']=mysqli_real_escape_string(static::$db,$data['member_license_img']);
        $data['member_verified_status']=mysqli_real_escape_string(static::$db,$data['member_verified_status']);
        $sql = "UPDATE tb_member SET  
        member_name = '".$data['member_name']."', 
        member_name_show = '".$data['member_name_show']."',  
        member_address = '".$data['member_address']."',  
        amphur_id = '".$data['amphur_id']."', 
        province_id = '".$data['province_id']."', 
        member_tel = '".$data['member_tel']."', 
        member_email = '".$data['member_email']."', 
        member_password = '".$data['member_password']."', 
        member_profile_img = '".$data['member_profile_img']."' 
        WHERE member_id = '$id' ";
        // $sql = "UPDATE tb_member SET 
        // member_type_id = '".$data['member_type_id']."', 
        // member_name = '".$data['member_name']."', 
        // member_name_show = '".$data['member_name_show']."',  
        // member_address = '".$data['member_address']."',  
        // amphur_id = '".$data['amphur_id']."', 
        // province_id = '".$data['province_id']."',
        // member_tel = '".$data['member_tel']."',
        // member_email = '".$data['member_email']."',
        // member_password = '".$data['member_password']."',
        // member_profile_img = '".$data['member_profile_img']."',
        // member_email_confirm_key = '".$data['member_email_confirm_key']."',
        // member_email_confirm_status = '".$data['member_email_confirm_status']."', 
        // member_lender_type_id = '".$data['member_lender_type_id']."', 
        // member_branch_name = '".$data['member_branch_name']."', 
        // member_tax_id = '".$data['member_tax_id']."', 
        // member_service_detail = '".$data['member_service_detail']."', 
        // member_location = '".$data['member_location']."', 
        // member_id_card_img = '".$data['member_id_card_img']."', 
        // member_company_certificate_img = '".$data['member_company_certificate_img']."', 
        // member_license_img = '".$data['member_license_img']."', 
        // member_verified_status = '".$data['member_verified_status']."' 
        // WHERE member_id = $id ";
        // echo $sql;
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertMember($data=[]){
        $sql = " INSERT INTO tb_member(
            member_type_id,
            member_name, 
            member_name_show, 
            member_address,  
            amphur_id, 
            province_id, 
            member_tel, 
            member_email, 
            member_password, 
            member_profile_img, 
            member_email_confirm_key, 
            member_email_confirm_status, 
            member_lender_type_id, 
            member_branch_name, 
            member_tax_id, 
            member_service_detail, 
            member_location,  
            member_id_card_img,
            member_company_certificate_img, 
            member_license_img, 
            member_verified_status,
            member_loan_type_deed,
            member_loan_type_pico,
            member_loan_type_nano,
            member_loan_type_business
        ) VALUES ('".
    mysqli_real_escape_string(static::$db,$data['member_type_id'])."','".
    mysqli_real_escape_string(static::$db,$data['member_name'])."','".
    mysqli_real_escape_string(static::$db,$data['member_name_show'])."','".
    mysqli_real_escape_string(static::$db,$data['member_address'])."','". 
    mysqli_real_escape_string(static::$db,$data['amphur_id'])."','".
    mysqli_real_escape_string(static::$db,$data['province_id'])."','".
    mysqli_real_escape_string(static::$db,$data['member_tel'])."','".
    mysqli_real_escape_string(static::$db,$data['member_email'])."','".
    mysqli_real_escape_string(static::$db,$data['member_password'])."','".
    mysqli_real_escape_string(static::$db,$data['member_profile_img'])."','".
    mysqli_real_escape_string(static::$db,$data['member_email_confirm_key'])."','".
    mysqli_real_escape_string(static::$db,$data['member_email_confirm_status'])."','".
    mysqli_real_escape_string(static::$db,$data['member_lender_type_id'])."','".
    mysqli_real_escape_string(static::$db,$data['member_branch_name'])."','".
    mysqli_real_escape_string(static::$db,$data['member_tax_id'])."','".
    mysqli_real_escape_string(static::$db,$data['member_service_detail'])."','".
    mysqli_real_escape_string(static::$db,$data['member_location'])."','".
    mysqli_real_escape_string(static::$db,$data['member_id_card_img'])."','".
    mysqli_real_escape_string(static::$db,$data['member_company_certificate_img'])."','".
    mysqli_real_escape_string(static::$db,$data['member_license_img'])."','".
    mysqli_real_escape_string(static::$db,$data['member_verified_status'])."','".
    mysqli_real_escape_string(static::$db,$data['member_loan_type_deed'])."','".
    mysqli_real_escape_string(static::$db,$data['member_loan_type_pico'])."','".
    mysqli_real_escape_string(static::$db,$data['member_loan_type_nano'])."','".
    mysqli_real_escape_string(static::$db,$data['member_loan_type_business'])."'". 
        " )";
// echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteMemberByID($id){
        $sql = " DELETE FROM tb_member WHERE member_id = '$id' ";
        $result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT); 

        $sql = " DELETE FROM tb_member_business_img WHERE member_id = '$id' ";
        $result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
 
    }
}
?>