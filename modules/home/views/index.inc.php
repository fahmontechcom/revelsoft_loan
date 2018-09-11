<?php 
require_once('models/HomeSlideModel.php'); 

$home_slide_model = new HomeSlideModel;

$path = "modules/home/views/"; 

 if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'){
    $user_id = $_GET['id'];
    $user = $model->getUserByID($user_id);
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'){
    $user = $model->deletedUserByID($_GET['id'],$user[0][0]); 
    ?>
    <script>window.location="index.php?content=user"</script>
    <?php

}else if ($_GET['action'] == 'add'){
    

        $data = [];
        $data['user_username'] = $_POST['user_username'];
        $data['user_password'] = $_POST['user_password'];
        $data['user_firstname'] = $_POST['user_firstname'];
        $data['user_lastname'] = $_POST['user_lastname'];
        $data['user_telephone'] = $_POST['user_telephone'];
        $data['user_email'] = $_POST['user_email'];
        $data['user_address'] = $_POST['user_address'];
        // echo "<script>console.log(".count($data).");</script>";
        $user = $model->insertUser($data);

        if($user){
            ?>
            <script>window.location="index.php?content=user"</script>
            <?php
        }else{
            ?>
            <?php
        }
    
    
}else if ($_GET['action'] == 'edit'){
    
        $data = [];
        $data['user_username'] = $_POST['user_username'];
        $data['user_password'] = $_POST['user_password'];
        $data['user_firstname'] = $_POST['user_firstname'];
        $data['user_lastname'] = $_POST['user_lastname'];
        $data['user_telephone'] = $_POST['user_telephone'];
        $data['user_email'] = $_POST['user_email'];
        $data['user_address'] = $_POST['user_address'];
        
        $user = $model->updateUserByID($_POST['user_id'],$data);

        if($user){
            ?>
            <script>window.location="index.php?content=user"</script>
            <?php
        }else{

            ?>
            <?php
        }
        
    

}
else{  
    $home_slide = $home_slide_model->getHomeSlideBy();
    // echo '<pre>';
    // print_r($home_slide);
    // echo '</pre>';
    require_once($path.'view.inc.php');

}
?>