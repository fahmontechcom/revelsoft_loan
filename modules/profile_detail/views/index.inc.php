<?php
require_once('../../../models/AmphurModel.php'); 
require_once('../../../models/ProvinceModel.php');  
require_once('../../../models/MemberModel.php');   
  
$path = "";
 
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$member_model = new MemberModel;  

if ($_POST['action'] == 'insert'){
 
}else if ($_POST['action'] == 'update'){

}else if ($_POST['action'] == 'delete'){ 

}else if ($_POST['action'] == 'add'){ 

}else if ($_POST['action'] == 'edit'){ 

}else{ 
    
    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    $member = $member_model ->getMemberByID($_POST['member_id']);   
    // echo '<pre>';
    // print_r($member);
    // echo '</pre>';
    require_once($path.'view.inc.php'); 
}
?>