<?php 
require_once('../models/LoanTypeModel.php');  

$path = "modules/loan_type/views/";
 
$loan_type_model = new LoanTypeModel;   

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/loan_type/";
 
$loan_type_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['loan_type']['add']==1){  
    
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'&&$menu['loan_type']['edit']==1){ 
    
    $loan_type = $loan_type_model->getLoanTypeByID($loan_type_id);  
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['loan_type']['delete']==1){  
    $loan_type = $loan_type_model->getLoanTypeByID($loan_type_id);
    $target_file = $target_dir .$loan_type['loan_type_icon'];
    if (file_exists($target_file)) {
        unlink($target_file);
    } 
    $target_file = $target_dir .$loan_type['loan_type_img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    } 
    $loan_type_model->deleteLoanTypeByID($loan_type_id); 
    ?>
    <script>window.location="index.php?content=loan_type"</script>
    <?php
    
}else if ($_GET['action'] == 'add'&&$menu['loan_type']['add']==1){
    
    $check_result = $loan_type_model->checkLoanTypeBy(trim($_POST['loan_type_name']),'');
    // echo '<pre>';
    // print_r($check_result);
    // echo '</pre>';
    if(count($check_result)<1){  
        $check = true;
        $data = [];
        $data['loan_type_name'] = $_POST['loan_type_name']; 
        $data['loan_type_icon'] = $_POST['loan_type_icon']; 
        $data['loan_type_title'] = $_POST['loan_type_title']; 
        $data['loan_type_detail'] = $_POST['loan_type_detail']; 
        $data['loan_type_img'] = $_POST['loan_type_img'];  

        
        $input_image = array("loan_type_icon", "loan_type_img");

        for($i = 0;$i<count($input_image);$i++){
            if($_FILES[$input_image[$i]]['name'] == ""){
                $data[$input_image[$i]] = ""; 
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
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        } 

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $check_result = $loan_type_model->insertLoanType($data);
            if($check_result!=false){
                ?>
                <script>window.location="index.php?content=loan_type"</script>
                <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        } 
    
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    } 

}else if ($_GET['action'] == 'edit'&&$menu['loan_type']['edit']==1){
    $loan_type_id = $_POST['loan_type_id'];
    $check_result = $loan_type_model->checkLoanTypeBy(trim($_POST['loan_type_name']),trim($_POST['loan_type_id']));
    if(count($check_result)<1&&$loan_type_id!=''){ 
        $check = true;
        $data = [];
        $data['loan_type_name'] = $_POST['loan_type_name']; 
        $data['loan_type_icon'] = $_POST['loan_type_icon']; 
        $data['loan_type_title'] = $_POST['loan_type_title']; 
        $data['loan_type_detail'] = $_POST['loan_type_detail']; 
        $data['loan_type_img'] = $_POST['loan_type_img'];  

        
        $input_image = array("loan_type_icon", "loan_type_img");

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
                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        } 

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $check_result = $loan_type_model->updateLoanTypeByID($loan_type_id,$data);
            if($check_result!=false){
                ?>
                <script>window.location="index.php?content=loan_type&action=update&id=<?PHP echo $loan_type_id;?>"</script>
                <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        } 
    
    }else{
        echo '<script>alert("ข้อมูลซ้ำ");window.history.back();</script>';
    } 
}else if ($menu['loan_type']['view']==1 ){
    $loan_type = $loan_type_model->getLoanTypeBy();
    require_once($path.'view.inc.php');
}
?>