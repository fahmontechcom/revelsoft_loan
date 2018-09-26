<?php
require_once('models/AmphurModel.php'); 
require_once('models/ProvinceModel.php');  
require_once('models/MemberModel.php');   
  
$path = "";
 
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$member_model = new MemberModel;  

$target_dir = "img_upload/how_to/";

if ($_POST['action'] == 'insert'){
 
}else if ($_POST['action'] == 'update'){

}else if ($_POST['action'] == 'delete'){ 

}else if ($_POST['action'] == 'add'){ 

}else if ($_POST['action'] == 'edit'){  
    $check = true;
    $data = [];
    $data['member_id'] = $_POST['member_id'];
    $data['member_type_id'] = $_POST['member_type_id'];
    $data['member_name'] = $_POST['member_name'];
    $data['member_name_show'] = $_POST['member_name_show'];
    $data['member_address'] = $_POST['member_address']; 
    $data['amphur_id'] = $_POST['amphur_id']; 
    $data['province_id'] = $_POST['province_id']; 
    $data['member_tel'] = $_POST['member_tel']; 
    $data['member_email'] = $_POST['member_email']; 
    $data['member_password'] = $_POST['member_password']; 
    $data['member_profile_img'] = $_POST['member_profile_img']; 
    $data['member_email_confirm_key'] = $_POST['member_email_confirm_key']; 
    $data['member_email_confirm_status'] = $_POST['member_email_confirm_status']; 
    $data['member_lender_type_id'] = $_POST['member_lender_type_id']; 
    $data['member_branch_name'] = $_POST['member_branch_name']; 
    $data['member_tax_id'] = $_POST['member_tax_id']; 
    $data['member_service_detail'] = $_POST['member_service_detail']; 
    $data['member_location'] = $_POST['member_location']; 
    $data['member_id_card_img'] = $_POST['member_id_card_img']; 
    $data['member_company_certificate_img'] = $_POST['member_company_certificate_img']; 
    $data['member_license_img'] = $_POST['member_license_img']; 
    $data['member_verified_status_id'] = $_POST['member_verified_status_id'];    
    
    $input_image = array("member_profile_img");

    for($i = 0;$i<count($input_image);$i++){
        if($_FILES[$input_image[$i]]['name'] == ""){
            $data[$input_image[$i]] = ""; 
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES[$input_image[$i]]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES[$input_image[$i]]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES[$input_image[$i]]["tmp_name"], $target_file)) { 
                $data[$input_image[$i]] = $date.'-'.strtolower(basename($_FILES[$input_image[$i]]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
    } 

    if($check == false){
        echo '0';
    }else{
        
        $check_result = $member_model->updateMemberByID($_POST['member_id'],$data);   
        if($check_result!=0){ 
            $amphur = $amphur_model ->getAmphurBy();   
            $province = $province_model ->getProvinceBy();      
            $member = $member_model ->getMemberByID($_POST['member_id']);    
            echo '<pre>';
            print_r($member);
            echo '</pre>';
            require_once($path.'view.inc.php'); 
        }else{
            echo '0';
        } 
    }  
}else{ 
    
    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    // $member = $member_model ->getMemberByID('22');   
    $member = $member_model ->getMemberByID($_POST['member_id']);    
    echo '<pre>';
    print_r($member);
    echo '</pre>';
    require_once($path.'view.inc.php'); 
}
?>