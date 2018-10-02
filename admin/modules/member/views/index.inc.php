<?php

require_once('../models/AmphurModel.php'); 
require_once('../models/ProvinceModel.php');     
require_once('../models/BusinessImgModel.php');    
require_once('../models/MemberModel.php'); 

$path = "modules/member/views/";


$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel;   
$business_img_model = new BusinessImgModel;  
$member_model = new MemberModel; 


date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/member/";
$member_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['member']['add']==1){ 
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'&&$menu['member']['view']==1){ 

    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    // $member = $member_model ->getMemberByID('22');   
    $member = $member_model ->getMemberByID($member_id);    
    $business_img = $business_img_model ->getBusinessImgBy($member_id);   

    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['member']['delete']==1){
    $member = $member_model->getMemberByID($member_id); 
    $input_image = array("member_profile_img", "member_id_card_img", "member_company_certificate_img", "	member_license_img"); 
    for($i = 0;$i<count($input_image);$i++){
        if($member[$input_image[$i]] != ""){
            $target_file = $target_dir .$member[$input_image[$i]];
            if (file_exists($target_file)) {
                unlink($target_file);
            }
        } 
    }
    $business_img = $business_img_model ->getBusinessImgBy($member_id);
    for($i=0;$i<count($business_img);$i++){
        $input_image = array("member_business_img_img"); 
        for($i = 0;$i<count($input_image);$i++){
            if($business_img[$input_image[$i]] != ""){
                $target_file = $target_dir .$business_img[$input_image[$i]];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } 
        } 
    }
      
    $member = $member_model->deleteMemberByID($member_id);

    $member_type_id = $member['member_type_id']; 
    $member = $member_model->getMemberByAllMemberTypeID($member_type_id);
    require_once($path.'view.inc.php');

    

}else if ($_GET['action'] == 'add'&&$menu['member']['add']==1){
     
}else if ($_GET['action'] == 'edit'&&$menu['member']['edit']==1){
   
}else if ($menu['member']['view']==1 ){
    $member_type_id = $_GET['member_type_id'];
    if($_GET['member_type_id']==''){
        $member_type_id = 1;
    } 
    $member = $member_model->getMemberByAllMemberTypeID($member_type_id);
    require_once($path.'view.inc.php');
}
?>