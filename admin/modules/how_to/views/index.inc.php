<?php 
require_once('../models/HowToModel.php');  

$path = "modules/how_to/views/";
 
$how_to_model = new HowToModel;   

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/how_to/";
 
$how_to_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['how_to']['add']==1){   

    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'&&$menu['how_to']['edit']==1){  

    $how_to = $how_to_model->getHowToByID($how_to_id);  
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['how_to']['delete']==1){ 

    $how_to = $how_to_model->getHowToByID($how_to_id); 
    $target_file = $target_dir .$how_to['how_to_img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    } 
    $how_to_model->deleteHowToByID($how_to_id); 
    ?>
    <script>window.location="index.php?content=how_to"</script>
    <?php
    
    
}else if ($_GET['action'] == 'add'&&$menu['how_to']['add']==1){
       
    $check = true;
    $data = []; 
    $data['how_to_detail'] = $_POST['how_to_detail']; 
    $data['how_to_img'] = $_POST['how_to_img'];   
    
    $input_image = array("how_to_img");

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
                chmod($target_file, 0777);
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
        $check_result = $how_to_model->insertHowTo($data);
        if($check_result!=false){
            ?>
            <script>window.location="index.php?content=how_to"</script>
            <?php
        }else{
            ?>  <script> window.history.back(); </script> <?php
        }
    }  

}else if ($_GET['action'] == 'edit'&&$menu['how_to']['edit']==1){
    $how_to_id = $_POST['how_to_id']; 
    if($how_to_id!=''){ 
        $check = true;
        $data = []; 
        $data['how_to_detail'] = $_POST['how_to_detail']; 
        $data['how_to_img'] = $_POST['how_to_img'];   
        
        $input_image = array("how_to_img");

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
            $check_result = $how_to_model->updateHowToByID($how_to_id,$data);
            if($check_result!=false){
                ?>
                <script>window.location="index.php?content=how_to&action=update&id=<?PHP echo $how_to_id;?>"</script>
                <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        } 
    
    }  
}else if ($menu['how_to']['view']==1 ){
    $how_to = $how_to_model->getHowToBy();
    require_once($path.'view.inc.php');
}
?>