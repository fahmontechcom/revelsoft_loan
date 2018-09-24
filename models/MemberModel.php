<?php

require_once("BaseModel.php");
class MemberModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getLogin($username, $password){

        $username = static::$db->real_escape_string($username);
        $password = static::$db->real_escape_string($password);

        if ($result = mysqli_query(static::$db,"SELECT member_id, member_status_id, tb_member.member_type_id, member_firstname, member_image
            FROM tb_member LEFT JOIN tb_member_type ON tb_member.member_type_id = tb_member_type.member_type_id
            WHERE member_membername = '$username' 
            AND member_password = '$password'", MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $data[] = $row;
            } 
            $result->close();
            return $data;
        }
    }

    function getMemberBy($confirm_key = ""){
        $sql = "SELECT * 
        FROM tb_member   
        ";
        if($confirm_key!=""){
            $sql .= " WHERE member_email_confirm_key= '$confirm_key'" ;
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
        WHERE member_id = $id ";
        
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
        $data['member_verified_status_id']=mysqli_real_escape_string(static::$db,$data['member_verified_status_id']);
        $sql = "UPDATE tb_member SET 
        member_status_id = '".$data['member_status_id']."', 
        member_type_id = '".$data['member_type_id']."', 
        member_name = '".$data['member_name']."',  
        member_image = '".$data['member_image']."', 
        member_phone = '".$data['member_phone']."', 
        member_email = '".$data['member_email']."', 
        member_facebook = '".$data['member_facebook']."',
        member_line = '".$data['member_line']."',
        member_address = '".$data['member_address']."',
        member_province = '".$data['member_province']."',
        member_amphur = '".$data['member_amphur']."',
        member_district = '".$data['member_district']."',
        member_zipcode = '".$data['member_zipcode']."', 
        member_membername = '".$data['member_membername']."', 
        member_password = '".$data['member_password']."' 
        WHERE member_id = $id ";
        
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
            member_verified_status_id
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
    mysqli_real_escape_string(static::$db,$data['member_verified_status_id'])."'". 
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
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>