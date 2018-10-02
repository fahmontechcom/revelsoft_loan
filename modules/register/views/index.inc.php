

<?php
date_default_timezone_set('Asia/Bangkok'); 
require_once('models/MemberModel.php');      
  
$path = "modules/register/views/";  
 
$member_model = new MemberModel; 
$condition_model = new ConditionModel; 

if ($_GET['action'] == 'insert'){
 
}else if ($_GET['action'] == 'update'){

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){
    $check_result =$member_model->getMemberBy("",$_POST['member_name'],$_POST['member_email']);
    if(count($check_result)>0){ 
        $result = "ไม่สามารถบันทึกข้อมูลได้ ชื่อหรืออีเมลซ้ำ กรุณาสมัครใหม่";
        ?>
        <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
        <?PHP
    }else{
        $data = [];
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
        $data['member_loan_type_deed'] = $_POST['member_loan_type_deed'];  
        $data['member_loan_type_pico'] = $_POST['member_loan_type_pico'];  
        $data['member_loan_type_nano'] = $_POST['member_loan_type_nano'];  
        $data['member_loan_type_business'] = $_POST['member_loan_type_business'];   
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    
        
        $member_id = $member_model->insertMember($data);   
        if($member_id!=0){ 
            $data['member_email_confirm_key'] = md5($member_id);
            $data['member_email_confirm_status'] = 0; 
    
            $check_result = $member_model->updateMemberByIDColEmailConfirm($member_id,$data);  
    
            for($i = 0 ; $i<count($data['loan_type_id']);$i++){
                $check_result = $member_model->updateMemberByIDColEmailConfirm($member_id,$data);  
            }
             
            require("controllers/mail/class.phpmailer.php"); 
            $mail = new PHPMailer();
            $body = '<div style="font-size:20px;" align="left"><strong>กรุณายืนยัน</strong></div>'.
                    '<div>
                        <a href="http://'. $_SERVER['SERVER_NAME'] .'/support/loan/index.php?content=register&action=confirm&confirm_key='.$data['member_email_confirm_key'] .'">http://'. $_SERVER['SERVER_NAME'] .'/support/loan/index.php?content=register&action=confirm&confirm_key='.$data['member_email_confirm_key'] .'</a>
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
                $result = "ไม่สามารถส่งอีเมลยืนยันได้กรุณา login เข้าใช้งานเพื่อส่งอีเมลอีกครั้ง";
                ?>
                 <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
                 <?PHP 
            }else{ 
                $result = "กรุณาตรวจสอบอีเมลของท่านเพื่อยืนยันการใช้งาน";
                ?>
                 <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
                 <?PHP
            }      
        }else{
            $result = "ไม่สามารถบันทึกข้อมูลได้กรุณาสมัครใหม่";
                ?>
                 <script>alert('<? echo $result;?>');window.location="index.php?content=home";</script>
                 <?PHP
        } 
    }

    
    
}else if ($_GET['action'] == 'edit'){ 

}else if ($_GET['action'] == 'email'){ 
    $confirm_key = $_GET['confirm_key'];
    $member = $member_model ->getMemberBy($confirm_key);  
    if(count($member)>0){
        require("controllers/mail/class.phpmailer.php"); 
        $mail = new PHPMailer();
        $body = '<div style="font-size:20px;" align="left"><strong>กรุณายืนยันอีเมล</strong></div>'.
                '<div>
                    <a href="http://'. $_SERVER['SERVER_NAME'] .'/support/loan/index.php?content=register&action=confirm&confirm_key='.$member[0]['member_email_confirm_key'] .'">http://'. $_SERVER['SERVER_NAME'] .'/support/loan/index.php?content=register&action=confirm&confirm_key='.$member[0]['member_email_confirm_key'] .'</a>
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
        $mail->Subject = "LOANMARKETO ถึง ".$member[0]['member_name'];

        $mail->MsgHTML($body);

        $mail->AddAddress($member[0]['member_email'], "Member Mail"); 
        if(!$mail->Send()) {
            $result = "ไม่สามารถส่งอีเมลยืนยันได้กรุณา login เข้าใช้งานเพื่อส่งอีเมลอีกครั้ง";
            ?>
             <script>alert('<? echo $result;?>');window.location="index.php?content=profile";</script>
             <?PHP 
        }else{ 
            $result = "กรุณาตรวจสอบอีเมลของท่านเพื่อยืนยันการใช้งาน";
            ?>
             <script>alert('<? echo $result;?>');window.location="index.php?content=profile";</script>
             <?PHP
        }       
    }else{
        $result = "ส่งอีเมลผิดพลาด! " ;
        echo '<script>alert('.$result.');window.location="index.php?content=home";</script>';
    }
}else if ($_GET['action'] == 'confirm'){ 
    $confirm_key = $_GET['confirm_key'];
    $member = $member_model ->getMemberBy($confirm_key);   
    // echo '<pre>';
    // print_r($member);
    // echo '</pre>';
    if(count($member)>0){ 
        $data = [];
        $data['member_email_confirm_key'] = $member[0]['member_email_confirm_key'];
        $data['member_email_confirm_status'] = 1;
        $check_result = $member_model->updateMemberByIDColEmailConfirm($member[0]['member_id'],$data);  
        if($check_result!=0){
            // $member_id =$member[0]['member_id']; 
            // require_once($path.'view.inc.php');
            ?>
            <script>
                alert('ยืนยันอีเมลเรียบร้อยแล้ว กรุณา login เข้าใช้งาน');
                window.location="index.php?content=home";
            </script>
            <?PHP
        }
    } 
}else{  

}
?>