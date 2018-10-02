<?php

require_once('../models/AmphurModel.php'); 
require_once('../models/ProvinceModel.php');     
require_once('../models/BusinessImgModel.php');    
require_once('../models/MemberModel.php'); 

$path = "modules/confirm/views/";


$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel;   
$business_img_model = new BusinessImgModel;  
$member_model = new MemberModel; 


date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "../img_upload/member/";
$member_id = $_GET['id'];
if ($_GET['action'] == 'insert'&&$menu['confirm']['add']==1){ 
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'&&$menu['confirm']['edit']==1){ 

    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    // $member = $member_model ->getMemberByID('22');   
    $member = $member_model ->getMemberByID($member_id);    
    $business_img = $business_img_model ->getBusinessImgBy($member_id);   

    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'delete'&&$menu['confirm']['delete']==1){
   

}else if ($_GET['action'] == 'add'&&$menu['confirm']['add']==1){
     
}else if ($_GET['action'] == 'edit'&&$menu['confirm']['edit']==1){
    if(isset($_POST['member_id'])){ 
        $data = [];
        $data['member_verified_status'] = $_POST['member_verified_status'];  
         
        $check_result = $member_model->updateMemberByMemberVerifiedStatus($_POST['member_id'],$data);
        $member = $member_model ->getMemberByID($_POST['member_id']);  
        if($check_result){
            if($_POST['member_verified_status']==2){
                require("../controllers/mail/class.phpmailer.php"); 
                $mail = new PHPMailer();
                $body = '<div style="font-size:20px;" align="left"><strong>คุณได้ยืนยันตัวตนเรียบร้อยแล้ว</strong></div>';
                    
        
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->Host = "mail.revelsoft.co.th"; // SMTP server
                $mail->Port = 587; 
                $mail->Username = "support@revelsoft.co.th"; // account SMTP
                $mail->Password = "revelsoft1234@"; //  SMTP
        
                $mail->SetFrom("support@revelsoft.co.th", "Revelsoft.co.th");
                $mail->AddReplyTo("support@revelsoft.co.th","Revelsoft.co.th");
                $mail->Subject = "LOANMARKETO ถึง ".$member['member_name'];
        
                $mail->MsgHTML($body);
        
                $mail->AddAddress($member['member_email'], "Member Mail"); 
                if(!$mail->Send()) {
                    $result = "ไม่สามารถส่งอีเมลได้";
                    ?>
                     <script>alert('<? echo $result;?>');window.location="index.php?content=confirm&member_type_id=<?PHP echo $_GET['member_type_id'];?>"</script>
                     <?PHP 
                }else{ 
                    $result = "ส่งอีเมลเรียบร้อย";
                    ?>
                     <script>alert('<? echo $result;?>');window.location="index.php?content=confirm&member_type_id=<?PHP echo $_GET['member_type_id'];?>"</script>
                     <?PHP
                }  
            }else if($_POST['member_verified_status']==0){
                require("../controllers/mail/class.phpmailer.php"); 
                $mail = new PHPMailer();
                $body = '<div style="font-size:20px;" align="left"><strong>ไม่สามารถยืนยันตัวตนได้กรุณาตรวจสอบข้อมูล</strong></div> 
                         <div style="font-size:16px;> 
                            <div>
                            <strong>หมายเหตุ</strong>
                            </div>
                            <div>'.$_POST['remark'].'</div>
                        </div>';
                    
        
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->Host = "mail.revelsoft.co.th"; // SMTP server
                $mail->Port = 587; 
                $mail->Username = "support@revelsoft.co.th"; // account SMTP
                $mail->Password = "revelsoft1234@"; //  SMTP
        
                $mail->SetFrom("support@revelsoft.co.th", "Revelsoft.co.th");
                $mail->AddReplyTo("support@revelsoft.co.th","Revelsoft.co.th");
                $mail->Subject = "LOANMARKETO ถึง ".$member['member_name'];
        
                $mail->MsgHTML($body);
        
                $mail->AddAddress($member['member_email'], "Member Mail"); 
                if(!$mail->Send()) {
                    $result = "ไม่สามารถส่งอีเมลได้";
                    ?>
                     <script>alert('<? echo $result;?>');window.location="index.php?content=confirm&member_type_id=<?PHP echo $_GET['member_type_id'];?>"</script>
                     <?PHP 
                }else{ 
                    $result = "ส่งอีเมลเรียบร้อย";
                    ?>
                     <script>alert('<? echo $result;?>');window.location="index.php?content=confirm&member_type_id=<?PHP echo $_GET['member_type_id'];?>"</script>
                     <?PHP
                }   
            }
            
        }else{
            ?>  <script> window.history.back(); </script> <?php
        }
         
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($menu['confirm']['view']==1 ){
    // $member = $member_model->getMemberBy();
    $member_type_id = $_GET['member_type_id'];
    if($_GET['member_type_id']==''){
        $member_type_id = 1;
    } 
    $member = $member_model->getMemberByMemberTypeID($member_type_id);
    require_once($path.'view.inc.php');
}
?>