

<?php
date_default_timezone_set('Asia/Bangkok');
require_once('models/AmphurModel.php'); 
require_once('models/ProvinceModel.php');  
require_once('models/MemberModel.php');  
require_once('models/ConditionModel.php');   

  
$path = "";
 
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$member_model = new MemberModel; 
$condition_model = new ConditionModel; 

if ($_GET['action'] == 'insert'){
 
}else if ($_GET['action'] == 'update'){

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){ 
    $data = [];
    $data['member_type_id'] = $_POST['member_type_id'];
    $data['member_name'] = $_POST['member_name'];
    $data['member_name_show'] = $_POST['member_name_show'];
    $data['member_address'] = $_POST['member_address'];
    $data['district_id'] = $_POST['district_id'];
    $data['amphur_id'] = $_POST['amphur_id']; 
    $data['province_id'] = $_POST['province_id']; 
    $data['member_tel'] = $_POST['member_tel']; 
    $data['member_email'] = $_POST['member_email']; 
    $data['member_password'] = $_POST['member_password']; 
    $data['member_profile_img'] = $_POST['member_profile_img']; 
    $data['member_email_confirm_key'] = $_POST['member_email_confirm_key']; 
    $data['member_email_confirm_status'] = $_POST['member_email_confirm_status']; 
    $data['member_lender_type_id'] = $_POST['member_lender_type_id']; 
    $data['member_branch_name'] = $_POST['member_branch_name']; 
    $data['member_tax_id'] = $_POST['member_tax_id']; 
    $data['member_service_detail'] = $_POST['member_service_detail']; 
    $data['member_location'] = $_POST['member_location']; 
    $data['member_id_card_img'] = $_POST['member_id_card_img']; 
    $data['member_company_certificate_img'] = $_POST['member_company_certificate_img']; 
    $data['member_license_img'] = $_POST['member_license_img']; 
    $data['member_verified_status_id'] = $_POST['member_verified_status_id']; 
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';

    // echo 'test';
    // echo "<script>console.log(".count($data).");</script>";
    $member_id = $member_model->insertMember($data);  
    // $check_result = false; 
    if($member_id!=0){ 
        $data['member_email_confirm_key'] = md5($member_id);
        $data['member_email_confirm_status'] = 0; 

        $check_result = $member_model->updateMemberByIDColEmailConfirm($member_id,$data);  
         
        require("controllers/mail/class.phpmailer.php"); 
        $mail = new PHPMailer();
        $body = '<div style="font-size:20px;" align="left"><strong>กรุณายืนยันอีเมล</strong></div>'.
                '<div>
                    <a href="#">http://'. $_SERVER['SERVER_NAME'].'/index.php?content=profile&action=confirm&confirm_key='.$data['member_email_confirm_key'] .'</a>
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
        $mail->Subject = "LOANMARKETO ถึง ".$data['member_name'];

        $mail->MsgHTML($body);

        $mail->AddAddress($data['member_email'], "Member Mail"); 
        if(!$mail->Send()) {
            $result = "ส่งอีเมลผิดพลาด : " . $mail->ErrorInfo;
            ?>
            <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
            <?PHP 
        }else{
            // $output = $purchase_order_model->updatePurchaseOrderStatusByID($purchase_order_id,$data);
            $result = "ส่งอีเมลเรียบร้อยแล้ว";
            ?>
            <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
            <?PHP
        }      
    }

}else if ($_GET['action'] == 'edit'){ 

}else if ($_GET['action'] == 'email'){
    
}else{  

}
?>