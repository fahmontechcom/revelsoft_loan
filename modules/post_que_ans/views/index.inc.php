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

$path = "modules/post_que_ans/views/";  

if($loan_member == ''){
    ?>
    <script>alert('กรุณา login เข้าใช้งาน'); window.location="index.php?content=home";</script>
    <?PHP
    
}else{
   
    
    if ($_GET['action'] == 'insert'){ 

    }else if ($_GET['action'] == 'update'){ 
    
    }else if ($_GET['action'] == 'delete'){   
        
        $post_que_ans = $post_que_ans_model ->getPostQueAnsByID($_GET['id']); 
        if($post_que_ans['post_que_ans_question_member_id']==$loan_member[0]['member_id']){
            
            $post_que_ans_model->deletePostQueAnsByID($_GET['id']); 
            ?>
            <script> 
                window.location="index.php?content=post_detail&post_id=<?=$_GET['post_id']?>#que_ans";
            </script>
            <?php

        }else{
            ?>
            <script> 
                window.history.back();
            </script>
            <?php

        }   
    
    }else if ($_GET['action'] == 'add'){ 
        if($_POST['post_que_ans_type']=='que'){
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
                <script>
                    alert('<? echo $result;?>');window.history.back();
                </script>
                <?PHP
            } 

        }else if($_POST['post_que_ans_type']=='ans'){
            $data = [];
            $data['post_que_ans_id'] = $_POST['post_que_ans_id'];   
            $data['post_que_ans_answer'] = $_POST['post_que_ans_answer'];  
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            $check_result = $post_que_ans_model->updatePostQueAnsByID($_POST['post_que_ans_id'],$data);    
            if($check_result!=0){ 
                ?>
                <script> 
                    window.location="index.php?content=post_detail&post_id=<?=$_POST['post_id']?>#post_que_ans_<?PHP echo $_POST['post_que_ans_id'];?>";
                </script>
                <?php
            }else{
                $result = "ไม่สามารถตอบคำถามได้";
                ?>
                <script>
                    alert('<? echo $result;?>');window.history.back();
                </script>
                <?PHP
            } 

        }

        
    }else if ($_GET['action'] == 'edit'){  
       
        
    }else {   
        $post = $post_model ->getPostByID($_GET['post_id']);   
        $member = $member_model ->getMemberByID($post['member_id']);  
        $post_que_ans = $post_que_ans_model ->getPostQueAnsByPostID($post['post_id']);  
        
        require_once($path.'view.inc.php'); 
    }
}

?>