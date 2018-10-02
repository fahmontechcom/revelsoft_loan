<?php
require_once('models/AmphurModel.php'); 
require_once('models/ProvinceModel.php');  
require_once('models/MemberModel.php');   
require_once('models/BusinessImgModel.php');   
date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
  
$path = "";
 
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$member_model = new MemberModel;  
$business_img_model = new BusinessImgModel;  

$target_dir = "img_upload/member/";

if ($_GET['action'] == 'insert'){
 
}else if ($_GET['action'] == 'update'){

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){ 

}else if ($_GET['action'] == 'add_business_img'){ 
    $target_dir = "img_upload/member_business_img/";
    $check = true;
    $data = []; 
    $data['member_id'] = $_POST['member_id'];
    if($_FILES['member_business_img_img']['name'] == ""){
        $data['member_business_img_img'] = "";
    }else {
        $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['member_business_img_img']['name']));
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
            $check = false;
        }else if ($_FILES['member_business_img_img']["size"] > 5000000) {
            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
            $check = false;
        }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
            $check = false;
        }else if (move_uploaded_file($_FILES['member_business_img_img']["tmp_name"], $target_file)) {
            $data['member_business_img_img'] = $date.'-'.strtolower(basename($_FILES['member_business_img_img']['name']));
        } else {
            $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
            $check = false;
        }
        if($check == false){
        ?>  <script>  alert('<?php echo $error_msg; ?>'); window.location="index.php?content=profile"; </script>  <?php
        }else{
            $result = $business_img_model->insertBusinessImg($data);
            ?> <script>window.location="index.php?content=profile"; </script> <?php
        }
    }

    
}else if ($_GET['action'] == 'delete_business_img'){ 
    $target_dir = "img_upload/member_business_img/";
    $business_img = $business_img_model->getBusinessImgByID($_GET['id']);
    $target_file = $target_dir .$business_img['member_business_img_img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
	$business_img = $business_img_model->deleteBusinessImgByID($_GET['id']);
    ?> <script>window.location="index.php?content=profile"; </script> <?php
}else if ($_GET['action'] == 'edit'){  
    $check_result =$member_model->checkMemberBy($_POST['member_id'],$_POST['member_name'],$_POST['member_email']);
    if(count($check_result)>0){ 
        $result = "ไม่สามารถบันทึกข้อมูลได้ ชื่อหรืออีเมลซ้ำ";
        ?>
        <script>alert('<? echo $result;?>');window.location="index.php?content=profile";</script>
        <?PHP
    }else{
        $check = true;
        $error_msg = '';
        $data = [];
        $data['member_id'] = $_POST['member_id'];
        $data['member_type_id'] = $_POST['member_type_id'];
        $data['member_name'] = $_POST['member_name'];
        $data['member_name_show'] = $_POST['member_name_show'];
        if($data['member_type_id']==2){
            $data['member_name_show'] = $_POST['member_name'];
        }
        $data['member_address'] = $_POST['member_address']; 
        $data['amphur_id'] = $_POST['amphur_id']; 
        $data['province_id'] = $_POST['province_id']; 
        $data['member_tel'] = $_POST['member_tel']; 
        $data['member_email'] = $_POST['member_email']; 
        $data['member_password'] = $_POST['member_password']; 
        $data['member_profile_img'] = $_POST['member_profile_img']; 
    
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $input_image = array("member_profile_img"); 

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
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        } 

        if($check == false){
            ?>
            <script>
                alert('ไม่สามารถบันทึกข้อมูลได้!');
                window.history.back();
            </script>
            <?php
        }else{
            
            $check_result = $member_model->updateMemberByID($_POST['member_id'],$data);   
            if($check_result!=0){ 
                ?>
                <script>
                    alert('บันทึกเรียบร้อยแล้ว');
                    window.location="index.php?content=profile";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('ไม่สามารถบันทึกข้อมูลได้!');
                    window.history.back();
                </script>
                <?php
            } 
        }   
    }
}else if ($_GET['action'] == 'edit_business'){  
     
     
        $check = true;
        $error_msg = '';
        $data = [];
        $data['member_id'] = $_POST['member_id'];  
        $data['member_lender_type_id'] = $_POST['member_lender_type_id']; 
        $data['member_loan_type_deed'] = $_POST['member_loan_type_deed']; 
        $data['member_loan_type_pico'] = $_POST['member_loan_type_pico']; 
        $data['member_loan_type_nano'] = $_POST['member_loan_type_nano']; 
        $data['member_loan_type_business'] = $_POST['member_loan_type_business']; 
        $data['member_business_name'] = $_POST['member_business_name']; 
        $data['member_branch_name'] = $_POST['member_branch_name']; 
        $data['member_tax_id'] = $_POST['member_tax_id']; 
        $data['member_service_detail'] = $_POST['member_service_detail']; 
        $data['member_location_lat'] = $_POST['member_location_lat']; 
        $data['member_location_long'] = $_POST['member_location_long'];  
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';  
            
        $check_result = $member_model->updateMemberByIDBusiness($_POST['member_id'],$data);   
        if($check_result!=0){ 
            ?>
            <script>
                alert('บันทึกเรียบร้อยแล้ว');
                window.location="index.php?content=profile";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('ไม่สามารถบันทึกข้อมูลได้!');
                window.history.back();
            </script>
            <?php
        } 
     
}else if ($_GET['action'] == 'verified'){  
    $check = true;
    $error_msg = '';
    $data = []; 
    $data['member_id'] = $_POST['member_id'];  
    $data['member_id_card_img'] = $_POST['member_id_card_img'];   
    $data['member_company_certificate_img'] = $_POST['member_company_certificate_img'];   
    $data['member_license_img'] = $_POST['member_license_img'];   
    $data['member_verified_status'] = '1';   
    $input_image = array("member_id_card_img","member_company_certificate_img","member_license_img"); 

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
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
    } 

    if($check == false){
        ?>
        <script>
            alert('<?php echo $error_msg;?>');
            window.history.back();
        </script>
        <?php
    }else{
        
        $check_result = $member_model->updateMemberByIDVerified($_POST['member_id'],$data);   
        if($check_result!=0){ 
            ?>
            <script>
                alert('บันทึกเรียบร้อยแล้ว');
                window.location="index.php?content=profile&member_id=<?=$data['member_id']?>";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('<?php echo $error_msg;?>');
                window.history.back();
            </script>
            <?php
        } 
    }   
}else{ 
    
    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    // $member = $member_model ->getMemberByID('22');   
    $member = $member_model ->getMemberByID($loan_member[0]['member_id']);    
    $business_img = $business_img_model ->getBusinessImgBy($loan_member[0]['member_id']);    
    // echo '<pre>';
    // print_r($member);
    // echo '</pre>';
    require_once($path.'view.inc.php'); 
}
?>