<?php 
date_default_timezone_set('Asia/Bangkok');
require_once('models/MemberModel.php');  
require_once('models/PropertyModel.php');  
require_once('models/BuildingModel.php');  
require_once('models/PostModel.php');  
require_once('models/PostProblemModel.php');  
require_once('models/PostQueAnsModel.php');  
// require_once('models/HomeModel.php'); 

$member_model = new MemberModel;
$property_model = new PropertyModel;
$building_model = new BuildingModel;
$post_model = new PostModel;
$post_problem_model = new PostProblemModel;
$post_que_ans_model = new PostQueAnsModel;

$path = "modules/post_detail/views/"; 
$target_dir = "img_upload/post/";

if($loan_member == ''){
    ?>
    <script>alert('กรุณา login เข้าใช้งาน'); window.location="index.php?content=home";</script>
    <?PHP
    
}else{
   
    
    if ($_GET['action'] == 'insert'){ 

    }else if ($_GET['action'] == 'update'){ 
    
    }else if ($_GET['action'] == 'delete'){ 
    
    }else if ($_GET['action'] == 'add_problem'){ 
        $data = [];
        $data['post_id'] = $_POST['post_id'];  
        $data['member_id'] = $_POST['member_id'];  
        $data['post_problem_detail'] = $_POST['post_problem_detail'];  
        $check_result = $post_problem_model->insertPostProblem($data);    
        if($check_result!=0){ 
            ?>
            <script>
                alert('ส่งเรียบร้อยแล้ว');
                window.location="index.php?content=post_detail&post_id=<?=$data['post_id']?>";
            </script>
            <?php
        }else{
            $result = "ไม่สามารถส่งได้";
            ?>
            <script>alert('<? echo $result;?>');window.history.back();</script>
            <?PHP
        } 
    }else if ($_GET['action'] == 'add_post_que_ans'){ 
        $data = [];
        $data['post_id'] = $_POST['post_id'];  
        $data['member_id'] = $_POST['member_id'];  
        $data['post_que_ans_question'] = $_POST['post_que_ans_question'];  
        $check_result = $post_que_ans_model->insertPostQueAns($data);    
        if($check_result!=0){ 
            ?>
            <script> 
                window.location="index.php?content=post_detail&post_id=<?=$data['post_id']?>#que_ans";
            </script>
            <?php
        }else{
            $result = "ไม่สามารถถามได้";
            ?>
            <script>alert('<? echo $result;?>');window.history.back();</script>
            <?PHP
        } 
        
    }else if ($_GET['action'] == 'edit'){ 
    
    }else if ($_GET['action'] == 'confirm'){ 
        
    }else {   
    
        // $post_id = $_GET['post_id']; 
        // $member = $member_model ->getMemberByID($member_id);    
        // $property = $property_model ->getPropertyBy();    
        // $building = $building_model ->getBuildingBy();    
        // $member = $member_model ->getMemberByID($member_id);   
        // echo '<pre>';
        // print_r($member);
        // echo '</pre>';
        $post = $post_model ->getPostByID($_GET['post_id']);   
        $data = [];
        $data['post_view'] = $post['post_view']+1;  
        $post_model ->updatePostByIDPostView($_GET['post_id'],$data);  
        $member = $member_model ->getMemberByID($post['member_id']);  
        $post_que_ans = $post_que_ans_model ->getPostQueAnsByPostID($post['post_id']);  
        // echo '<pre>';
        // print_r($post_que_ans);
        // echo '</pre>'; 

        $old_date=date_create($member['create_date']);//วันก่อนหน้า 
        $new_date=date_create(date("Y-m-d")); 
        $diff=date_diff($old_date,$new_date);   
        // echo '<pre>';
        // print_r($diff);
        // echo '</pre>'; 
        // echo '<pre>';
        // print_r($post);
        // echo '</pre>'; 
    
        require_once($path.'view.inc.php'); 
    }
}

?>