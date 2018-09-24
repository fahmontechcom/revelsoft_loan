<?php
require_once('../../../models/AmphurModel.php'); 
require_once('../../../models/ProvinceModel.php');  
require_once('../../../models/MemberModel.php');  
require_once('../../../models/ConditionModel.php');   
require("../../../controllers/mail/class.phpmailer.php");
  
$path = "";
 
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$member_model = new MemberModel; 
$condition_model = new ConditionModel; 

if ($_POST['action'] == 'insert'){
 
}else if ($_POST['action'] == 'update'){

}else if ($_POST['action'] == 'delete'){ 

}else if ($_POST['action'] == 'add'){ 
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
        $data = [];
        $data['member_email_confirm_key'] = md5($member_id);
        $data['member_email_confirm_status'] = 0;
        $check_result = $member_model->updateMemberByIDColEmailConfirm($member_id,$data); 
        
        $mail = new PHPMailer();
        $body = '<div style="font-size:32px;" align="center"><strong>ยืนยันอีเมล</strong></div>'.
                '<div>
                    <a href="#">http://'. $_SERVER['SERVER_NAME'].'/revelsoft/revelsoft_loan/index.php?content=profile&action=confirm&confirm_key='.$data['member_email_confirm_key'] .'</a>
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

        $mail->AddAddress($data['member_email'], "Member Mail"); 
        if(!$mail->Send()) {
            $result = "ส่งอีเมลผิดพลาด : " . $mail->ErrorInfo;
        }else{
            $result = "ส่งอีเมลเรียบร้อยแล้ว";
        } 
        ?>
        <script>
            alert("<?php echo $result; ?>"); 
        </script>
        <?php   
        echo $member_id;
    }else{
        echo '0';
    }
    


}else if ($_POST['action'] == 'edit'){ 

}else if ($_GET['action'] == 'email'){
    $member = $model_cumember_modelstomer->getMemberByID($member_id);    
    if($invoice_id > 0){
        /******** setmail ********************************************/
        require("../../../controllers/mail/class.phpmailer.php");
        $mail = new PHPMailer();
        $body = '<div style="font-size:32px;" align="center"><strong>ยืนยันอีเมล</strong></div>'.
                '<div>
                    <a href="#">http://'. $_SERVER['SERVER_NAME'].'/revelsoft/revelsoft_loan/index.php?content=profile&action=confirm&confirm_key=</a>
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

        $mail->AddAddress($member['member_email'], "Member Mail"); //
        //$mail->AddAddress($set1, $name); // 
        if(!$mail->Send()) {
            $result = "ส่งอีเมลผิดพลาด : " . $mail->ErrorInfo;
        }else{
            // $output = $purchase_order_model->updatePurchaseOrderStatusByID($purchase_order_id,$data);
            $result = "ส่งอีเมลเรียบร้อยแล้ว";
        } 
        ?>
        <script>
            alert("<?php echo $result; ?>");
            window.history.back();
        </script>
        <?php   
    }else{
        ?>
        <script>window.history.back();</script>
        <?php
    } 
    require_once($path.'view.inc.php');  



}else{ 
    
    $condition = $condition_model ->getConditionBy();   
    $amphur = $amphur_model ->getAmphurBy();   
    $province = $province_model ->getProvinceBy();   
    // echo '<pre>';
    // print_r($condition);
    // echo '</pre>';
    require_once($path.'view.inc.php'); 
}
?>