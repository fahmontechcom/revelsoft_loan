<script>
  $(document).ready(function(){
    profile_menu_choose("profile_detail");
  });
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
<div class="row"   style="background-color:#0193d7;">   
    <div class="col-lg-5 d-flex justify-content-center align-items-center">
      <div class="col d-flex justify-content-end">
        <div  style="width:7em;height:7em; border-radius: 50%!important;border: 0.2em solid white; overflow: hidden;">
          <img src="template/images/user/default.png" class="img-fluid" alt="" align="left" style="">   
        </div> 
      </div>
      <div class="col p-0">

        <h5  class="text-white ">THANA.T</h5>   
      </div>
    </div>
    <div class="col-lg-7">
      <div class="row">
        <div id="profile_detail" class="col-lg-3 profile_list" align="center" onclick="profile_menu_choose('profile_detail');" style="cursor: pointer;">  
          <div class="col-12 p-2" >
            <img  src="template/images/profile.png" class="fluid" alt=""  style="height:4em;">       
          </div>    
          <h5  class="text-white p-2">ข้อมูลส่วนตัว</h5>   
        </div>     
        <div class="col-lg-3 profile_list" align="center" onclick="" style="cursor: pointer;">  
          <div class="col-12 p-2" >
            <img  src="template/images/profile.png" class="fluid" alt=""  style="height:4em;">       
          </div>    
          <h5  class="text-white p-2">ข้อมูลส่วนตัว</h5>   
        </div>     
        <div class="col-lg-3 profile_list" align="center" onclick="" style="cursor: pointer;">  
          <div class="col-12 p-2" >
            <img  src="template/images/profile.png" class="fluid" alt=""  style="height:4em;">       
          </div>    
          <h5  class="text-white p-2">ข้อมูลส่วนตัว</h5>   
        </div>     
        <div class="col-lg-3 profile_list" align="center" onclick="" style="cursor: pointer;">  
          <div class="col-12 p-2" >
            <img  src="template/images/profile.png" class="fluid" alt=""  style="height:4em;">       
          </div>    
          <h5  class="text-white p-2">ข้อมูลส่วนตัว</h5>   
        </div>     
      </div>
    </div>
   
</div>

<div class="container" id="profile_content"></div>
<!-- <div class="row">
  <div class="col-lg-12">
    <h1>ตลาดเงินกู้ออนไลน์</h1> 
    <h1>อยากกู้ ปล่อยกู้ ปลอดภัย สะดวกรวดเร็วง่ายๆที่นี่<br>คลิกเลย!!</h1> 
  </div> 
</div> -->