
  <?PHP if($member['member_email_confirm_status']!=1||$member['member_email_confirm_status']==0){ ?>
    <div class="row m-0  pt-4 pb-4" >
        <h6 >กรุณายืนยันอีเมลเพื่อเข้าใช้งานระบบ<br><br><a href="index.php?content=profile&action=email&confirm_key=<?PHP echo $member['member_email_confirm_key'];?>">>>ส่งรหัสไปยังอีเมลอีกครั้ง<<</a></h6>
        
    </div>
    <?PHP }else{ ?>
    <div class="row m-0 align-items-center pt-4 " >
        <h4><b>ข้อมูลส่วนตัว</b></h4><h6 ><i class="fa fa-file-text-o p-2" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</h6>
    </div>
    <div class="row justify-content-center align-items-center"> 
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-7"  align="left" > 
                    <div class="form-group"> 
                        <h6>ชื่อ - นามสกุล</h6>
                        <input id="profile_detail_member_name" name="member_name" class="form-control" style="border-color: #0292d8;" value="<?PHP echo $member['member_name'];?>">   
                    </div>    
                </div>  
                <div class="col-lg-5"  align="left" > 
                    <div class="form-group"> 
                        <h6>ชื่อในระบบ</h6>
                        <input id="profile_detail_member_name_show"  name="member_name_show" class="form-control" style="border-color: #0292d8;" value="<?PHP echo $member['member_name_show'];?>">   
                    </div>    
                </div>  
            </div> 
        </div>
        <div class="col-lg-3">
            <div class="row d-flex justify-content-center align-items-center"> 
                <div style="width:8em;height:8em; border-radius: 50%!important;border: 0.2em solid white; overflow: hidden;"> 
                    <img id="profile_detail_member_profile_img_show" src="img_upload/member/<?php if($member['member_profile_img'] != "" ){echo $member['member_profile_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                </div> 
                <input accept=".jpg , .png" type="file" id="profile_detail_member_profile_img" name="member_profile_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'profile_detail_member_profile_img_show');" value="">
            </div> 
        </div> 
    </div> 
    <div class="row justify-content-start"> 
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6>ที่อยู่</h6>
                        <input id="profile_detail_member_address" name="member_address" class="form-control" placeholder="ที่อยู่" style="border-color: #0292d8;" value="<?PHP echo $member['member_address'];?>">   
                    </div>    
                </div>   
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <select  class="form-control select " id="profile_detail_amphur_id"  name="amphur_id" onchange="" style="border-color: #0292d8;">  
                        <option></option>
                            <?php 
                                for($i =  0 ; $i < count($amphur) ; $i++){
                                ?>
                                <option <?php if($amphur[$i]['amphur_id'] == $member['amphur_id']){?> selected <?php }?> value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option>
                                    
                                <?
                                }
                            ?>
                        </select>    
                    </div>   
                </div>   
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <select  class="form-control select " id="profile_detail_province_id" name="province_id" onchange="" style="border-color: #0292d8;"> 
                        <option></option> 
                            <?php 
                                for($i =  0 ; $i < count($province) ; $i++){
                                ?>
                                <option <?php if($province[$i]['province_id'] == $member['province_id']){?> selected <?php }?> value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                <?
                                }
                            ?>
                        </select>    
                    </div>   
                </div>   
                <div class="col-lg-12">  
                    <div class="form-group"> 
                        <h6>เบอร์โทร</h6>
                        <input id="profile_detail_member_tel" name="member_tel" class="form-control" style="border-color: #0292d8; " value="<?PHP echo $member['member_tel'];?>">   
                    </div>   
                </div>
            </div> 
        </div> 
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12 "  align="left" > 
                    <div class="form-group"> 
                        <h6>อีเมล</h6> 
                        <input id="profile_detail_member_email" name="member_email" class="form-control" style="border-color: #0292d8;max-width:300px;display: inline-block;" value="<?PHP echo $member['member_email'];?>">      
                        <h6 style="display: inline-block;"  >ยืนยันแล้ว</h6>      
                    </div>  
                    <div class="form-group"> 
                        <h6>รหัสผ่าน</h6> 
                        <input id="profile_detail_member_password" name="member_password" class="form-control" style="border-color: #0292d8;max-width:300px;display: inline-block;"  value="<?PHP echo $member['member_password'];?>">   
                        <h6 style="display: inline-block;"  >เปลี่ยนรหัสผ่าน</h6>      
                    </div>   
                </div>  
            </div>
        </div>
            
            
        <div class="col-lg-12"  align="center" >  
            <div class="form-group">
                <input type="hidden" id="profile_detail_member_id" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                <input type="hidden" id="profile_detail_member_type_id" name="member_type_id" value="<?PHP echo $member['member_type_id'];?>" > 
                <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="button" onclick=" member_edit();" >บันทึก</button>   
                <button class="btn btn-register my-2 my-sm-0 m-1 pl-5 pr-5" type="button" onclick="" >ยกเลือก</button>  
            </div>  
        </div>       
    </div>   
    <div class="row m-0 align-items-center pt-4 pb-4" >
        <h4><b>ข้อมูลยืนยันตัวตน</b></h4><h6 ><i class="fa fa-check-circle  p-2 text-success" aria-hidden="true"></i></i>100% ยืนยันแล้ว (ยังไม่ยืนยัน,รอพิจารณา)</h6>
    </div> 
    <div class="row pb-5"> 
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-7"  align="left" > 
                    <div class="form-group"> 
                        <h6>ภาพถ่ายบัตรประชาชน</h6> 
                        <img id="member_id_card_img_show" src="img_upload/member/<?php if($member['member_id_card_img'] != "" ){echo $member['member_id_card_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                
                        <input accept=".jpg , .png" type="file" id="member_id_card_img" name="member_id_card_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_id_card_img_show');" value="">
                            
                    </div>    
                </div>   
            </div> 
        </div> 
        <div class="col-lg-12"  align="center" >  
            <div class="form-group"> 
                <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="button" onclick="" >บันทึก</button>  
            </div>  
        </div>       
    </div>    
    <?PHP } ?>
    <script>
        
    $(document).ready(function(){
        $("#profile_detail_amphur_id").select2({ 
            placeholder: "อำเภอ",
            theme: 'bootstrap4'
        });
        $("#profile_detail_province_id").select2({ 
            placeholder: "จังหวัด",
            theme: 'bootstrap4'
        });
    }); 
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#'+id).attr('src', 'img_upload/member/default.png');
        }
    }
    function member_edit(){  

        var member_name = document.getElementById("profile_detail_member_name").value;
        var member_name_show = document.getElementById("profile_detail_member_name_show").value;
        var member_profile_img = document.getElementById("profile_detail_member_profile_img").value;  
        var member_address = document.getElementById("profile_detail_member_address").value;
        var amphur_id = document.getElementById("profile_detail_amphur_id").value;
        var province_id = document.getElementById("profile_detail_province_id").value;
        var member_tel = document.getElementById("profile_detail_member_tel").value;  
        var member_email = document.getElementById("profile_detail_member_email").value;
        var member_password = document.getElementById("profile_detail_member_password").value;
        var member_id = document.getElementById("profile_detail_member_id").value;
        
        
        member_name = $.trim(member_name);   
        member_name_show = $.trim(member_name_show);   
        member_email = $.trim(member_email);   
        member_password = $.trim(member_password);   
        

        if(member_name.length == 0){
            alert("กรุณากรอกชื่อ-นามสกุล");
            document.getElementById("profile_detail_member_name").focus();
            return false;
        }else if(member_name_show.length == 0){
            alert("กรุณากรอกชื่อในระบบ");
            document.getElementById("profile_detail_member_name_show").focus();
            return false;     
        }else if(member_email.length == 0){
            alert("กรุณากรอกอีเมล");
            document.getElementById("profile_detail_member_email").focus();
            return false;     
        }else if(member_password.length == 0){
            alert("กรุณากรอกรหัสผ่าน");
            document.getElementById("profile_detail_member_password").focus();
            return false;     
        }else if(member_id.length > 0){ 
            $.post( "modules/profile_detail/views/index.inc.php",
                    {
                        member_name:member_name, 
                        member_name_show:member_name_show,
                        member_profile_img:member_profile_img,
                        member_address:member_address,
                        amphur_id:amphur_id,
                        province_id:province_id,
                        member_tel:member_tel,
                        member_email:member_email,
                        member_password:member_password,
                        member_id:member_id,
                        action:'edit'
                    }
                , function( data ) {
                    console.log(data);
                if(data=='0'){
                    alert('ไม่สามารถบันทึกข้อมูลได้'); 
                }else{ 
                    alert('บันทึกข้อมูลเรียบร้อย'); 
                    $("#profile_content").html(data);
                } 

            });
        }else{ 

        }
            
    }
  </script>     
     
 
