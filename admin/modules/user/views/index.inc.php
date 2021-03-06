<?php
require_once('../models/UserModel.php');
require_once('../models/UserTypeModel.php');
require_once('../models/UserStatusModel.php');

$path = "modules/user/views/";

$user_model = new UserModel;
$user_type_model = new UserTypeModel;
$user_status_model = new UserStatusModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/user/";
$user_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['user']['add']==1){
    $user_type = $user_type_model->getUserTypeBy();
    $user_status = $user_status_model->getUserStatusBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'&&$menu['user']['edit']==1){
    $user_type = $user_type_model->getUserTypeBy();
    $user_status = $user_status_model->getUserStatusBy();
    $user = $user_model->getUserByID($user_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'&&$menu['user']['delete']==1){
    $user = $user_model->getUserByID($user_id);
    $target_file = $target_dir .$user['user_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $user = $user_model->deleteUserById($user_id);
    ?>
    <script>window.location="index.php?content=user"</script>
    <?php

}else if ($_GET['action'] == 'add'&&$menu['user']['add']==1){
    if(isset($_POST['user_firstname'])){
        $check = true;
        $data = [];
        $data['user_status_id'] = trim($_POST['user_status_id']);
        $data['user_type_id'] = trim($_POST['user_type_id']);
        $data['user_firstname'] = trim($_POST['user_firstname']);
        $data['user_image'] = trim($_POST['user_image']);
        $data['user_lastname'] = trim($_POST['user_lastname']);
        $data['user_phone'] = trim($_POST['user_phone']);
        $data['user_email'] = trim($_POST['user_email']);
        $data['user_facebook'] = trim($_POST['user_facebook']);
        $data['user_line'] = trim($_POST['user_line']);
        $data['user_address'] = trim($_POST['user_address']);
        $data['user_province'] = trim($_POST['user_province']);
        $data['user_amphur'] = trim($_POST['user_amphur']);
        $data['user_district'] = trim($_POST['user_district']);
        $data['user_zipcode'] = trim($_POST['user_zipcode']);
        $data['user_username'] = trim($_POST['user_username']);
        $data['user_password'] = trim($_POST['user_password']);
        $data['addby'] = $user[0][0];

        if($_FILES['user_image']['name'] == ""){
            $data['user_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["user_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
                $data['user_image'] = $date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $user = $user_model->insertUser($data);

            if($user){
                ?> <script>window.location="index.php?content=user"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'edit'&&$menu['user']['edit']==1){
    if(isset($_POST['user_id'])){
        $check = true;
        $data = [];
        $data['user_status_id'] = trim($_POST['user_status_id']);
        $data['user_type_id'] = trim($_POST['user_type_id']);
        $data['user_firstname'] = trim($_POST['user_firstname']);
        $data['user_lastname'] = trim($_POST['user_lastname']);
        $data['user_image'] = trim($_POST['user_image']);
        $data['user_phone'] = trim($_POST['user_phone']);
        $data['user_email'] = trim($_POST['user_email']);
        $data['user_facebook'] = trim($_POST['user_facebook']);
        $data['user_line'] = trim($_POST['user_line']);
        $data['user_address'] = trim($_POST['user_address']);
        $data['user_province'] = trim($_POST['user_province']);
        $data['user_amphur'] = trim($_POST['user_amphur']);
        $data['user_district'] = trim($_POST['user_district']);
        $data['user_zipcode'] = trim($_POST['user_zipcode']);
        $data['user_username'] = trim($_POST['user_username']);
        $data['user_password'] = trim($_POST['user_password']);
        $data['updateby'] = $user[0][0];

        if($_FILES['user_image']['name'] == ""){
            $data['user_image'] = $_POST['user_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["user_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["user_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {

                $data['user_image'] = $date.'-'.strtolower(basename($_FILES["user_image"]["name"]));

                $target_file = $target_dir . $_POST['user_image_o'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        
        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $user = $user_model->updateUserByID($_POST['user_id'],$data);

            if($user){
                ?> <script>window.location="index.php?content=user"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($menu['user']['view']==1 ){
    $user = $user_model->getUserBy($_GET['name'],$_GET['position'],$_GET['email']);
    require_once($path.'view.inc.php');
}
?>