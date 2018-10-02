<?php 
date_default_timezone_set('Asia/Bangkok');
require_once('models/MemberModel.php');  
// require_once('models/HomeModel.php'); 

$member_model = new MemberModel;

$path = "modules/profile/views/"; 

if ($_GET['action'] == 'insert'){ 

}else if ($_GET['action'] == 'update'){ 

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){
    
}else if ($_GET['action'] == 'edit'){ 

}else if ($_GET['action'] == 'confirm'){ 
     

}else if ($loan_member != ''){   

    $member_id = $_GET['member_id']; 
    // $member = $member_model ->getMemberByID($member_id);   
    // echo '<pre>';
    // print_r($member);
    // echo '</pre>';
    require_once($path.'view.inc.php'); 
}
?>