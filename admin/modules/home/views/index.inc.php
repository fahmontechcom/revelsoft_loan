<?php
require_once('../models/HomeSlideModel.php');
require_once('../models/PageModel.php');

$path = "modules/home/views/"; 

$home_slide_model = new HomeSlideModel;
$page_model = new PageModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/home/"; 
$target_page = "../img_upload/page/";
 
$home_slide_id = $_GET['id'];

if ($_GET['action'] == 'delete'){
    $home_slide = $home_slide_model->getHomeSlideByID($home_slide_id);
    $target_file = $target_dir .$home_slide['home_slide_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
	$home_slide = $home_slide_model->deleteHomeSlideByID($home_slide_id);
    ?> <script>window.location="index.php?content=home"; </script> <?php
}else if ($_GET['action'] == 'edit-page'){

    if(isset($_POST['page_name'])){
        $check = true;
        $data = [];
        $data['page_name'] = $_POST['page_name'];
        $data['page_title'] = $_POST['page_title'];
        $data['page_header_image'] = $_POST['page_header_image'];
        $data['page_header_1'] = $_POST['page_header_1'];
        $data['page_header_2'] = $_POST['page_header_2'];
        $data['page_detail'] = $_POST['page_detail'];
        $data['page_tag'] = $_POST['page_tag'];


        if($_FILES['page_header_image']['name'] == ""){
            $data['page_header_image'] = $_POST['page_header_image_o'];
        }else {
            $target_file = $target_page .$date.'-'.strtolower(basename($_FILES["page_header_image"]["name"]));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["page_header_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["page_header_image"]["tmp_name"], $target_file)) {

                $data['page_header_image'] = $date.'-'.strtolower(basename($_FILES["page_header_image"]["name"]));

                $target_file = $target_page . $_POST['page_header_image_o'];
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
            $check_result = $page_model->updatePageByID('1',$data);

            if($check_result){


                ?> <script>window.location="index.php?content=home"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'add'){
     
        $check = true;
        $data = []; 
        
        if($_FILES['home_slide_image']['name'] == ""){
            $data['home_slide_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['home_slide_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['home_slide_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['home_slide_image']["tmp_name"], $target_file)) {
                $data['home_slide_image'] = $date.'-'.strtolower(basename($_FILES['home_slide_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.location="index.php?content=home"; </script>  <?php
        }else{
            $result = $home_slide_model->insertHomeSlide($data);
            ?> <script>window.location="index.php?content=home"; </script> <?php
        }
     
}else{
    $page = $page_model->getPageByID('1');
    $home_slide = $home_slide_model->getHomeSlideBy();
	require_once($path.'view.inc.php');
}
?>