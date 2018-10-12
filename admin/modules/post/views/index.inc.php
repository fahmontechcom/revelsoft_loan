<?php

require_once('../models/MemberModel.php');  
require_once('../models/PropertyModel.php');  
require_once('../models/BuildingModel.php');  
require_once('../models/PostModel.php');  
require_once('../models/OccupationModel.php');  
require_once('../models/CollateralModel.php');  
require_once('../models/AmphurModel.php');  
require_once('../models/ProvinceModel.php');  
// require_once('models/HomeModel.php'); 

$member_model = new MemberModel;
$property_model = new PropertyModel;
$building_model = new BuildingModel;
$post_model = new PostModel;
$occupation_model = new OccupationModel;
$collateral_model = new CollateralModel;
$amphur_model = new AmphurModel;
$province_model = new ProvinceModel;

$path = "modules/post/views/";
  
date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/post/";
$post_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['post']['add']==1){ 
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'&&$menu['post']['edit']==1){ 

    $post = $post_model ->getPostByID($post_id);    

    $amphur = $amphur_model ->getAmphurBy();    
    $province = $province_model ->getProvinceBy();    
    $building = $building_model ->getBuildingBy();    
    $occupation = $occupation_model->getOccupationBy(); 
    $collateral = $collateral_model->getCollateralBy();    
    $property = $property_model ->getPropertyBy();  
    $loan_type_id = $post['loan_type_id'];     
     

    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['post']['delete']==1){ 
    
    $post = $post_model->getPostByID($post_id); 
        $input_image = array(
            "post_img_1",
            "post_img_2",
            "post_img_3",
            "post_img_4",
            "post_img_5",
            "post_img_6"
        );  
        for($i = 0;$i<count($input_image);$i++){
            if($post[$input_image[$i]] != ""){
                $target_file = $target_dir .$post[$input_image[$i]];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } 
        }
        $post = $post_model->deletePostByID($post_id);
        if($post==1){
            ?>
            <script>window.location="index.php?content=post"</script>
            <?php
        }else{
            ?>
            <script>alert('ไม่สามารถลบได้');window.histoty.back();</script>
            <?php
        }

}else if ($_GET['action'] == 'add'&&$menu['post']['add']==1){
     
}else if ($_GET['action'] == 'edit'&&$menu['post']['edit']==1){
    $check = true;
        $data = [];
        $data['post_id'] = $_POST['post_id'];
        $data['member_id'] = $_POST['member_id'];
        $data['loan_type_id'] = $_POST['loan_type_id'];
        $data['post_transaction_mortgage'] = $_POST['post_transaction_mortgage'];
        $data['post_transaction_selling'] = $_POST['post_transaction_selling'];
        $data['post_transaction_deposit'] = $_POST['post_transaction_deposit'];
        $data['property_id'] = $_POST['property_id'];
        $data['post_money'] = $_POST['post_money'];
        $data['post_address'] = $_POST['post_address'];
        $data['amphur_id'] = $_POST['amphur_id'];
        $data['province_id'] = $_POST['province_id'];
        $data['post_area_wa'] = $_POST['post_area_wa'];
        $data['post_area_ngan'] = $_POST['post_area_ngan'];
        $data['post_area_rai'] = $_POST['post_area_rai'];
        $data['post_building'] = $_POST['post_building'];
        $data['building_id'] = $_POST['building_id'];
        $data['burden_id'] = $_POST['burden_id'];
        $data['post_img_1'] = $_POST['post_img_1'];
        $data['post_img_2'] = $_POST['post_img_2'];
        $data['post_img_3'] = $_POST['post_img_3'];
        $data['post_img_4'] = $_POST['post_img_4']; 
        $data['post_img_5'] = $_POST['post_img_5'];
        $data['post_img_6'] = $_POST['post_img_6'];  
        $data['post_amount_day'] = $_POST['post_amount_day']; 
        $data['post_deed'] = $_POST['post_deed']; 
        $data['post_deed_number'] = $_POST['post_deed_number']; 
        $data['post_location_lat'] = $_POST['post_location_lat']; 
        $data['post_location_long'] = $_POST['post_location_long'];  
        $data['occupation_id'] = $_POST['occupation_id'];   
        $data['collateral_id'] = $_POST['collateral_id'];   
        $data['post_collateral_name'] = $_POST['post_collateral_name'];   

        
        $input_image = array(
            "post_img_1",
            "post_img_2",
            "post_img_3",
            "post_img_4",
            "post_img_5",
            "post_img_6"
        ); 

        for($i = 0;$i<count($input_image);$i++){
            if($_FILES[$input_image[$i]]['name'] == ""){
                $data[$input_image[$i]] = $_POST[$input_image[$i].'_o'];
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
                    $target_file = $target_dir . $_POST[$input_image[$i].'_o'];
                    if (file_exists($target_file)&&$_POST[$input_image[$i].'_o']!='') {
                        unlink($target_file);
                    }
                }else{
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        }
        if($check == false){
                
            ?>
            <script>alert('<? echo $error_msg;?>');window.history.back();</script>
            <?PHP
        }else{
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $check_result = $post_model->updatePostByID($data['post_id'],$data);    
            if($check_result!=0){ 
                ?>
                <script>
                    alert('บันทึกเรียบร้อยแล้ว');
                    window.location="index.php?content=post&action=update&id=<?PHP echo $data['post_id'];?>";
                </script>
                <?php
            }else{
                $result = "ไม่สามารถบันทึก";
                ?>
                <script>alert('<? echo $result;?>');window.history.back();</script>
                <?PHP
            } 
        }
   
}else if ($menu['post']['view']==1 ){ 
    $post = $post_model->getPostBy();
    // echo '<pre>';
    // print_r($post);
    // echo '</pre>';
    require_once($path.'view.inc.php');
}
?>