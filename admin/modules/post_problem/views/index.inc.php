<?php

require_once('../models/AmphurModel.php'); 
require_once('../models/ProvinceModel.php');     
require_once('../models/BusinessImgModel.php');    
require_once('../models/PostProblemModel.php'); 
require_once('../models/MemberModel.php'); 
require_once('../models/PostModel.php'); 

$path = "modules/post_problem/views/";


$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel;   
$business_img_model = new BusinessImgModel;  
$post_problem_model = new PostProblemModel; 
$member_model = new MemberModel; 
$post_model = new PostModel; 


date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/post_problem/";
$post_problem_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['post_problem']['add']==1){ 
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'detail'&&$menu['post_problem']['view']==1){ 

    $post = $post_model ->getPostByID($post_problem_id);   
    $member = $member_model ->getMemberByID($post['member_id']);    
    $old_date=date_create($member['create_date']);  
    $new_date=date_create(date("Y-m-d")); 
    $diff=date_diff($old_date,$new_date);    

    $post_problem = $post_problem_model ->getPostProblemByID($post_problem_id);     
    require_once($path.'detail.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['post_problem']['delete']==1){
    $post_problem = $post_problem_model->getPostProblemByID($post_problem_id); 
    $input_image = array("post_problem_profile_img", "post_problem_id_card_img", "post_problem_company_certificate_img", "post_problem_license_img"); 
    for($i = 0;$i<count($input_image);$i++){
        if($post_problem[$input_image[$i]] != ""){
            $target_file = $target_dir .$post_problem[$input_image[$i]];
            if (file_exists($target_file)) {
                unlink($target_file);
            }
        } 
    }
    
    // echo '<pre>';
    // print_r($business_img);
    // echo '</pre>';
    $business_img = $business_img_model ->getBusinessImgBy($post_problem_id);
    for($i=0;$i<count($business_img);$i++){ 
         
            if($business_img[$i]["post_problem_business_img_img"] != ""){
                $target_dir = "../img_upload/post_problem_business_img/";
                $target_file = $target_dir .$business_img[$i]["post_problem_business_img_img"];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } 
         
    }
      
    $post_problem = $post_problem_model->deletePostProblemByID($post_problem_id);

    $post_problem_type_id = $post_problem['post_problem_type_id']; 
    $post_problem = $post_problem_model->getPostProblemByAllPostProblemTypeID($post_problem_type_id);
    require_once($path.'view.inc.php');

    

}else if ($_GET['action'] == 'add'&&$menu['post_problem']['add']==1){
     
}else if ($_GET['action'] == 'edit'&&$menu['post_problem']['edit']==1){
   
}else if ($menu['post_problem']['view']==1 ){ 
    $post_problem = $post_problem_model->getPostProblemBy();
    echo '<pre>';
    print_r($post_problem);
    echo '</pre>';
    require_once($path.'view.inc.php');
}
?>