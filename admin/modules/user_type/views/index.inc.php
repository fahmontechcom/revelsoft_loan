<?php 
require_once('../models/UserTypeModel.php'); 
require_once('../models/MenuModel.php'); 
require_once('../models/UserTypePermissionModel.php'); 

$path = "modules/user_type/views/";
 
$user_type_model = new UserTypeModel; 
$user_type_permission_model = new UserTypePermissionModel; 
$menu_model = new MenuModel; 

 
$user_type_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['user_type']['add']==1){  
    $menu = $menu_model->getMenuBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'&&$menu['user_type']['edit']==1){ 
    
    $menu = $menu_model->getMenuBy();
    $user_type = $user_type_model->getUserTypeByID($user_type_id);
    $user_type_permission = $user_type_permission_model->getUserTypePermissionByID($user_type_id);
    // echo '<pre>';
    // print_r($user_type_permission);
    // echo '</pre>';
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'&&$menu['user_type']['delete']==1){  
    $user_type_permission_model->deleteUserTypePermissionByID($user_type_id);
    $user_type_model->deleteUserTypeByID($user_type_id);
    $user_type = $user_type_model->getUserTypeBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'add'&&$menu['user_type']['add']==1){
    
    $check_result = $user_type_model->checkUserTypeBy(trim($_POST['user_type_name']),'');
    // echo '<pre>';
    // print_r($check_result);
    // echo '</pre>';
    if(count($check_result)<1){
        $data = [];
        $data['user_type_name'] = $_POST['user_type_name']; 
        $user_type_id = $user_type_model->insertUserType($data);
        if($user_type_id!=false){
            $menu = $menu_model->getMenuBy();
            $data_per =[];
            for($i = 0;$i<count($menu);$i++){ 
        
                $data_per[$i]['user_type_id'] = $user_type_id; 
                $data_per[$i]['menu_id'] = $menu[$i]['menu_id']; 
                 
                if($_POST['user_type_permission_view_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_view'] = $_POST['user_type_permission_view_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_view'] = 0; 
                }
                if($_POST['user_type_permission_add_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_add'] = $_POST['user_type_permission_add_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_add'] = 0; 
                }
                if($_POST['user_type_permission_edit_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_edit'] = $_POST['user_type_permission_edit_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_edit'] = 0; 
                }
                if($_POST['user_type_permission_delete_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_delete'] = $_POST['user_type_permission_delete_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_delete'] = 0; 
                }
    
                $user_type_permission_model->insertUserTypePermission($data_per[$i]);
    
            } 
        } 
        ?>
        <script>window.location="index.php?content=user_type"</script>
        <?php
        
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    }
    
    

}else if ($_GET['action'] == 'edit'&&$menu['user_type']['edit']==1){
    $user_type_id = $_POST['user_type_id'];
    $check_result = $user_type_model->checkUserTypeBy(trim($_POST['user_type_name']),trim($_POST['user_type_id']));
    if(count($check_result)<1){
        // echo $user_type_id;
        $data = [];
        $data['user_type_name'] = $_POST['user_type_name']; 
        $user_type_model->updateUserTypeByID($user_type_id,$data);
        if($user_type_id!=false){
            $menu = $menu_model->getMenuBy();
            $data_per =[];
            for($i = 0;$i<count($menu);$i++){ 

                $data_per[$i]['user_type_id'] = $user_type_id; 
                $data_per[$i]['menu_id'] = $menu[$i]['menu_id']; 
                $data_per[$i]['user_type_permission_id'] = $_POST['user_type_permission_id_'.$menu[$i]['menu_id']]; 
                if($_POST['user_type_permission_view_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_view'] = $_POST['user_type_permission_view_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_view'] = 0; 
                }
                if($_POST['user_type_permission_add_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_add'] = $_POST['user_type_permission_add_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_add'] = 0; 
                }
                if($_POST['user_type_permission_edit_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_edit'] = $_POST['user_type_permission_edit_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_edit'] = 0; 
                }
                if($_POST['user_type_permission_delete_'.$menu[$i]['menu_id']]!=''){
                    $data_per[$i]['user_type_permission_delete'] = $_POST['user_type_permission_delete_'.$menu[$i]['menu_id']]; 
                }else{
                    $data_per[$i]['user_type_permission_delete'] = 0; 
                }
                if($data_per[$i]['user_type_permission_id']>0){
                    $user_type_permission_model->updateUserTypePermissionByID($data_per[$i]['user_type_permission_id'],$data_per[$i]);
                }else{
                    $user_type_permission_model->insertUserTypePermission($data_per[$i]);
                }
                // echo '<pre>';
                // print_r($data_per[$i]);
                // echo '</pre>';

            } 
        } 
        ?>
        <script>window.location="index.php?content=user_type&action=update&id=<?PHP echo $user_type_id;?>"</script>
        <?php
    
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    } 
}else if ($menu['user_type']['view']==1 ){
    $user_type = $user_type_model->getUserTypeBy();
    require_once($path.'view.inc.php');
}
?>