<script>
  // $(document).ready(function(){
  //   profile_menu_choose("profile_detail");
  // });
    function profile_menu_choose(id){
        // alert(id);
        if(id=="profile_detail"){
          $.post( "modules/profile_detail/views/index.inc.php",
              { 
                  member_id:'<?PHP echo $member_id;?>',
                  action:'view'
              }, 
              function( data ) {
              // $("#modal_data_member_type").html(''); 
              $("#profile_content").html(data);  
          });  
        }
    }
</script>
<?php
$sub_menu = 'index.php?content=profile';

if($_REQUEST['profile']==''){
	$profile = 'detail';
 }else{

	$profile = $_REQUEST['profile'];
 }
?>
<div class="row m-0 <?PHP if($loan_member[0]['member_type_id']==1){echo 'borrower_bg_color';}else{echo 'lender_bg_color';}?>" >   
    <div class="col-lg-5 d-flex justify-content-center align-items-center">
      <div class="col d-flex justify-content-end">
        <div class="img_member">
          <img id="img_member" src="img_upload/member/<?php if($loan_member[0]['member_profile_img'] != "" ){echo $loan_member[0]['member_profile_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style="">     
        </div> 
      </div>
      <div class="col p-0"> 
        <h5  class="text-white "><?PHP echo $loan_member[0]['member_name_show']?></h5>   
      </div>
    </div>
    <div class="col-lg-7">
      <div class="row">  
        <div id="profile_detail" class="col-lg-3  <?PHP 
          if($profile=='detail'){
            if($loan_member[0]['member_type_id']==1){
              echo 'borrower_profile_list_active';
            }else{
              echo 'lender_profile_list_active'; 
            }
          }else{
            if($loan_member[0]['member_type_id']==2){
              echo 'borrower_profile_list';
            }else{
              echo 'lender_profile_list'; 
            }
          }
        ?>" align="center"  >  
          <a href="<?PHP echo $sub_menu;?>&profile=detail" style="text-decoration: none!important;">
            <div class="col-12 p-2" >
              <img  src="template/images/profile.png" class="fluid" alt=""  style="height:4em;">       
            </div>    
            <h5  class="text-white p-2">ข้อมูลส่วนตัว</h5>   
          </a> 
        </div>   
            
      </div>
    </div>
   
</div>
<div class="container" id="profile_content">
  <?PHP  
  if($_REQUEST['profile']==''){
    $profile = 'detail';
  }else{
    $profile = $_REQUEST['profile']; 
  }
  
  if($profile=="detail"){ 
      require_once("modules/profile_detail/views/index.inc.php"); 
  }
  ?> 
</div>
<!-- <div class="row">
  <div class="col-lg-12">
    <h1>ตลาดเงินกู้ออนไลน์</h1> 
    <h1>อยากกู้ ปล่อยกู้ ปลอดภัย สะดวกรวดเร็วง่ายๆที่นี่<br>คลิกเลย!!</h1> 
  </div> 
</div> -->