<?php 
require_once('../models/ConditionModel.php');  

$path = "modules/condition/views/";
 
$condition_model = new ConditionModel;   

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6"; 
 
$condition_id = $_GET['id'];

if ($_GET['action'] == 'insert'&&$menu['condition']['add']==1){  
    
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'&&$menu['condition']['edit']==1){ 
    
    $condition = $condition_model->getConditionByID($condition_id);  
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['condition']['delete']==1){   
    $condition_model->deleteConditionByID($condition_id); 
    ?>
    <script>window.location="index.php?content=condition"</script>
    <?php
    
}else if ($_GET['action'] == 'add'&&$menu['condition']['add']==1){
    
    $check_result = $condition_model->checkConditionBy(trim($_POST['condition_title']),'');
    // echo '<pre>';
    // print_r($check_result);
    // echo '</pre>';
    if(count($check_result)<1){   
        $data = [];
        $data['condition_title'] = $_POST['condition_title'];   
        $data['condition_detail'] = $_POST['condition_detail'];    
         
        $check_result = $condition_model->insertCondition($data);
        if($check_result!=false){
            ?>
            <script>window.location="index.php?content=condition"</script>
            <?php
        }else{
            ?>  <script> window.history.back(); </script> <?php
        } 
    
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    } 

}else if ($_GET['action'] == 'edit'&&$menu['condition']['edit']==1){
    $condition_id = $_POST['condition_id'];
    $check_result = $condition_model->checkConditionBy(trim($_POST['condition_title']),trim($_POST['condition_id']));
    if(count($check_result)<1&&$condition_id!=''){  
        $data = [];
        $data['condition_title'] = $_POST['condition_title'];   
        $data['condition_detail'] = $_POST['condition_detail'];   
        
        $input_image = array("condition_icon", "condition_img"); 

        $check_result = $condition_model->updateConditionByID($condition_id,$data);
        if($check_result!=false){
            ?>
            <script>window.location="index.php?content=condition&action=update&id=<?PHP echo $condition_id;?>"</script>
            <?php
        }else{
            ?>  <script> window.history.back(); </script> <?php
        } 
    
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    } 
}else if ($menu['condition']['view']==1 ){
    $condition = $condition_model->getConditionBy();
    require_once($path.'view.inc.php');
}
?>