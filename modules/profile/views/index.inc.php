<?php 

require_once('models/MemberModel.php');  
// require_once('models/HomeModel.php'); 

$member_model = new MemberModel;

$path = "modules/profile/views/"; 

 if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'){ 

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){ 
    
}else if ($_GET['action'] == 'edit'){ 

}else if ($_GET['action'] == 'confirm'){ 
    $confirm_key = $_GET['confirm_key'];
    $member = $member_model ->getMemberBy($confirm_key);   
    if(count($member)>0){
        $member = $member_model ->getMemberBy($confirm_key); 
        $data = [];
        $data['member_email_confirm_key'] = $member[0]['member_email_confirm_key'];
        $data['member_email_confirm_status'] = 1;
        $check_result = $member_model->updateMemberByIDColEmailConfirm($member_id,$data);  
        if($check_result!=0){
            $member_id = $_GET['member_id']; 
            require_once($path.'view.inc.php');
        }
    }
}else{  
   $member_id = $_GET['member_id']; 
    require_once($path.'view.inc.php');

}
?>