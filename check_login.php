<?php
 
session_start();
require_once('models/MemberModel.php'); 
if(isset($_POST['member_email']) && isset($_POST['member_password'])){
 
    $member_model = new MemberModel;
    $member = $member_model->getLogin($_POST['member_email'],$_POST['member_password']);
    // echo '<pre>';
    // print_r($member);
    // echo '</pre>';
    if(count($member) > 0){

        $_SESSION['loan_member'] = $member; 
        ?>
        <script> 
            window.location="index.php?content=home";
        </script>
        <?php
    }else{
        ?>
        <script> 
            alert("ไม่สามารถเข้าใช้งานได้ กรุณาตรวจสอบอีเมลหรือรหัสผ่าน!"); 
            window.location="index.php?content=home";
        </script>
        <?php
    }

}else{
    ?>
    <script> 
        window.location="index.php?content=home";
    </script>
    <?php
}


?>