<?php 
require_once('../models/UserTypeModel.php'); 
require_once('../models/PageModel.php'); 
require_once('../models/UserTypePermissionModel.php'); 

$path = "modules/user_type/views/";
 
$user_type_model = new UserTypeModel; 
$user_type_permission_model = new UserTypePermissionModel; 
$page_model = new PageModel; 

 
$user_type_id = $_GET['id'];
if ($_GET['action'] == 'insert'){  
    $page = $page_model->getPageBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){ 
    
    $page = $page_model->getPageBy();
    $user_type = $user_type_model->getUserTypeByID($user_type_id);
    echo '<pre>';
    print_r($user_type_permission);
    echo '</pre>';
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){  
    $user_type_model->deleteUserTypeByID($user_type_id);
    $user_type_permission_model->deleteUserTypePermissionByID($user_type_id);
    $user_type = $user_type_model->getUserTypeBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'add'){
    $data = [];
    $data['user_type_name'] = $_POST['user_type_name']; 
    $user_type_id = $user_type_model->insertUserType($data);
    if($user_type_id!=false){
        $page = $page_model->getPageBy();
        $data_per =[];
        for($i = 0;$i<count($page);$i++){ 
    
            $data_per[$i]['user_type_id'] = $user_type_id; 
            $data_per[$i]['page_id'] = $page[$i]['page_id']; 
             
            if($_POST['user_type_permission_view_'.$page[$i]['page_id']]!=''){
                $data_per[$i]['user_type_permission_view'] = $_POST['user_type_permission_view_'.$page[$i]['page_id']]; 
            }else{
                $data_per[$i]['user_type_permission_view'] = 0; 
            }
            if($_POST['user_type_permission_add_'.$page[$i]['page_id']]!=''){
                $data_per[$i]['user_type_permission_add'] = $_POST['user_type_permission_add_'.$page[$i]['page_id']]; 
            }else{
                $data_per[$i]['user_type_permission_add'] = 0; 
            }
            if($_POST['user_type_permission_edit_'.$page[$i]['page_id']]!=''){
                $data_per[$i]['user_type_permission_edit'] = $_POST['user_type_permission_edit_'.$page[$i]['page_id']]; 
            }else{
                $data_per[$i]['user_type_permission_edit'] = 0; 
            }
            if($_POST['user_type_permission_delete_'.$page[$i]['page_id']]!=''){
                $data_per[$i]['user_type_permission_delete'] = $_POST['user_type_permission_delete_'.$page[$i]['page_id']]; 
            }else{
                $data_per[$i]['user_type_permission_delete'] = 0; 
            }

            $user_type_permission_model->insertUserTypePermission($data_per[$i]);

        } 
    }

    $user_type = $user_type_model->getUserTypeBy();
    require_once($path.'view.inc.php');

    // echo '<pre>';
    // print_r($data_per );
    // echo '</pre>';

    // foreach( $name as $key => $n ) {
    // print "The name is ".$n." and email is ".$email[$key].", thank you\n";
    // }

    // if($check_result){
    //     $user_type = $user_type_model->getUserTypeBy();
    //     require_once($path.'view.inc.php');
    // } 
    

}else if ($_GET['action'] == 'edit'){

}else{
    $user_type = $user_type_model->getUserTypeBy();
    require_once($path.'view.inc.php');
}
?>