
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
        function member_check(){  
    
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
            }else{ 
                return true;    
            }
                
        }
        function business_img_check(){
            var member_business_img_img = document.getElementById("member_business_img_img").value;

            member_business_img_img = $.trim(member_business_img_img);

            if(member_business_img_img.length == 0){
                alert("กรุณาเลือกรูปภาพ");
                document.getElementById("member_business_img_img").focus();
                return false;
            }else{
                return true;
            }
        }
        function business_check(){  
    
            var profile_detail_member_lender_type_id = document.getElementById("profile_detail_member_lender_type_id").value;
            var profile_detail_member_loan_type_deed = document.getElementById("profile_detail_member_loan_type_deed").checked;
            var profile_detail_member_loan_type_pico = document.getElementById("profile_detail_member_loan_type_pico").checked;  
            var profile_detail_member_loan_type_nano = document.getElementById("profile_detail_member_loan_type_nano").checked;
            var profile_detail_member_loan_type_business = document.getElementById("profile_detail_member_loan_type_business").checked; 
             
    
            if(profile_detail_member_lender_type_id.length == 0){
                alert("กรุณาเลือกประเภท");
                document.getElementById("profile_detail_member_lender_type_id").focus();
                return false;     
            }else if(profile_detail_member_loan_type_deed == false&&profile_detail_member_loan_type_pico == false&&profile_detail_member_loan_type_nano == false&&profile_detail_member_loan_type_business == false){
                alert("กรุณาเลือกประเภทการปล่อยกู้");
                document.getElementById("profile_detail_member_loan_type_deed").focus();
                return false;      
            }else{ 
                return true;    
            }
                
        }
        function show_form(){
            var profile_detail_member_lender_type_id = document.getElementById("profile_detail_member_lender_type_id").value;
            var divsToHide = document.getElementsByClassName("hide_loan_type"); 
            if(profile_detail_member_lender_type_id==1){ 
                document.getElementById("profile_detail_member_loan_type_deed").checked = false;
                document.getElementById("profile_detail_member_loan_type_pico").checked = false;
                document.getElementById("profile_detail_member_loan_type_nano").checked = false;
                document.getElementById("profile_detail_member_loan_type_business").checked = false;
                document.getElementById("profile_detail_member_business_name").value = '';
                document.getElementById("profile_detail_member_branch_name").value = '';
                document.getElementById("profile_detail_member_tax_id").value = '';
                document.getElementById("profile_detail_member_service_detail").value = '';
                document.getElementById("profile_detail_member_location_lat").value = '';
                document.getElementById("profile_detail_member_location_long").value = '';
                document.getElementById("business").style.display = 'none';
                document.getElementById("business_img").style.display = 'none';
                document.getElementById("company").style.display = 'none';
                for(var i = 0; i < divsToHide.length; i++){ 
                    divsToHide[i].style.display = "none"; // depending on what you're doing
                }
            }else{
                document.getElementById("business").style.display = 'flex';
                document.getElementById("business_img").style.display = 'flex';
                document.getElementById("company").style.display = 'block';
                for(var i = 0; i < divsToHide.length; i++){ 
                    divsToHide[i].style.display = "block"; // depending on what you're doing
                }
            }
        }
      </script>   

    <!-- ********************  กู้ ******************************* -->
  <?PHP if($loan_member[0]['member_email_confirm_status']==0){ ?>
    <div class="row m-0  pt-4 pb-4" >
        <h6 >กรุณายืนยันอีเมลเพื่อเข้าใช้งานระบบ<br><br><a href="index.php?content=register&action=email&confirm_key=<?PHP echo $member['member_email_confirm_key'];?>">>>ส่งรหัสไปยังอีเมลอีกครั้ง<<</a></h6>
        
    </div>
    <?PHP }else if($loan_member[0]['member_type_id']==1){ ?>
    <div class="row m-0 align-items-center pt-4 " >
        <h4><b>ข้อมูลส่วนตัว</b></h4><h6 ><i class="fa fa-file-text-o p-2" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</h6>
    </div>
    <form role="form" method="post" onsubmit="return member_check();" action="index.php?content=profile_detail&action=edit" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center"> 
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-7"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ชื่อ - นามสกุล</b></h6>
                            <input id="profile_detail_member_name" name="member_name" class="form-control borrower_border_color"  value="<?PHP echo $member['member_name'];?>">   
                        </div>    
                    </div>  
                    <div class="col-lg-5"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ชื่อในระบบ</b></h6>
                            <input id="profile_detail_member_name_show"  name="member_name_show" class="form-control borrower_border_color"  value="<?PHP echo $member['member_name_show'];?>">   
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
                            <h6><b>ที่อยู่</b></h6>
                            <input id="profile_detail_member_address" name="member_address" class="form-control borrower_border_color" placeholder="ที่อยู่"  value="<?PHP echo $member['member_address'];?>">   
                        </div>    
                    </div>   
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <select  class="form-control select " id="profile_detail_amphur_id"  name="amphur_id" onchange="" >  
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
                            <select  class="form-control select " id="profile_detail_province_id" name="province_id" onchange="" > 
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
                            <h6><b>เบอร์โทร</b></h6>
                            <input id="profile_detail_member_tel" name="member_tel" class="form-control borrower_border_color" style=" " value="<?PHP echo $member['member_tel'];?>">   
                        </div>   
                    </div>
                </div> 
            </div> 
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12 "  align="left" > 
                        <div class="form-group"> 
                            <h6><b>อีเมล</b></h6> 
                            <input id="profile_detail_member_email" name="member_email" class="form-control borrower_border_color" style="max-width:300px;display: inline-block;" value="<?PHP echo $member['member_email'];?>">      
                            <h6 style="display: inline-block;"  >ยืนยันแล้ว</h6>      
                        </div>  
                        <div class="form-group"> 
                            <h6><b>รหัสผ่าน</b></h6> 
                            <input id="profile_detail_member_password" name="member_password" class="form-control borrower_border_color" style="max-width:300px;display: inline-block;"  value="<?PHP echo $member['member_password'];?>">   
                            <h6 style="display: inline-block;"  >เปลี่ยนรหัสผ่าน</h6>      
                        </div>   
                    </div>  
                </div>
            </div>
                
                
            <div class="col-lg-12"  align="center" >  
                <div class="form-group">
                    <input type="hidden" id="member_profile_img_o" name="member_profile_img_o" value="<?php echo  $member['member_profile_img'] ?>" />
                    <input type="hidden" id="profile_detail_member_id" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    <input type="hidden" id="profile_detail_member_type_id" name="member_type_id" value="<?PHP echo $member['member_type_id'];?>" > 
                    <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" >บันทึก</button>   
                    <button class="btn btn-register my-2 my-sm-0 m-1 pl-5 pr-5" type="reset" onclick="" >ยกเลิก</button>  
                </div>  
            </div>       
        </div>   
    </form>
    <div class="row m-0 align-items-center pt-4 pb-4" >
        <h4><b>ข้อมูลยืนยันตัวตน</b></h4><h6 ><i class="fa fa-check-circle  p-2 text-success" aria-hidden="true"></i></i>100% ยืนยันแล้ว (ยังไม่ยืนยัน,รอพิจารณา)</h6>
    </div> 
    <form role="form" method="post" onsubmit="return member_check();" action="index.php?content=profile_detail&action=verified" enctype="multipart/form-data">
        <div class="row pb-5"> 
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-7"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ภาพถ่ายบัตรประชาชน</b></h6> 
                            <img id="member_id_card_img_show" src="img_upload/member/<?php if($member['member_id_card_img'] != "" ){echo $member['member_id_card_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                            <?PHP if($member['member_verified_status']!=2){?>
                            <input accept=".jpg , .png" type="file" id="member_id_card_img" name="member_id_card_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_id_card_img_show');" value="">
                            <?PHP }?>
                        </div>    
                    </div>   
                </div> 
            </div> 
           <?PHP if($member['member_verified_status']!=2){?>
            <div class="col-lg-12"  align="center" >  
                <div class="form-group"> 
                    <input type="hidden" id="member_id_card_img_o" name="member_id_card_img_o" value="<?php echo  $member['member_id_card_img'] ?>" />
                    <input type="hidden" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >บันทึก</button>  
                </div>  
            </div>    
            <?PHP }?>   
        </div>    
    </form> 
    <!-- ***************************  ปล่อยกู้  **************************** -->
    <?PHP }else if($loan_member[0]['member_type_id']==2){ ?>
    <div class="row m-0 align-items-center pt-4 " >
        <h4><b>ข้อมูลส่วนตัว</b></h4><h6 ><i class="fa fa-file-text-o p-2" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</h6>
    </div>
    <form role="form" method="post" onsubmit="return member_check();" action="index.php?content=profile_detail&action=edit" enctype="multipart/form-data">
        <div class="row justify-content-center align-items-center"> 
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ชื่อ</b></h6>
                            <input id="profile_detail_member_name" name="member_name" class="form-control lender_border_color"  value="<?PHP echo $member['member_name'];?>">   
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
                            <h6><b>ที่อยู่</b></h6>
                            <input id="profile_detail_member_address" name="member_address" class="form-control lender_border_color" placeholder="ที่อยู่"  value="<?PHP echo $member['member_address'];?>">   
                        </div>    
                    </div>   
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <select  class="form-control select " id="profile_detail_amphur_id"  name="amphur_id" onchange="" >  
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
                            <select  class="form-control select " id="profile_detail_province_id" name="province_id" onchange="" > 
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
                            <h6><b>เบอร์โทร</b></h6>
                            <input id="profile_detail_member_tel" name="member_tel" class="form-control lender_border_color" style=" " value="<?PHP echo $member['member_tel'];?>">   
                        </div>   
                    </div>
                </div> 
            </div> 
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-12 "  align="left" > 
                        <div class="form-group"> 
                            <h6><b>อีเมล</b></h6> 
                            <input id="profile_detail_member_email" name="member_email" class="form-control lender_border_color" style="max-width:300px;display: inline-block;" value="<?PHP echo $member['member_email'];?>">      
                            <h6 style="display: inline-block;"  >ยืนยันแล้ว</h6>      
                        </div>  
                        <div class="form-group"> 
                            <h6><b>รหัสผ่าน</b></h6> 
                            <input id="profile_detail_member_password" name="member_password" class="form-control lender_border_color" style="max-width:300px;display: inline-block;"  value="<?PHP echo $member['member_password'];?>">   
                            <h6 style="display: inline-block;"  >เปลี่ยนรหัสผ่าน</h6>      
                        </div>   
                    </div>  
                </div>
            </div>
                
                
            <div class="col-lg-12"  align="center" >  
                <div class="form-group">
                    <input type="hidden" name="member_profile_img_o" value="<?php echo  $member['member_profile_img'] ?>" />
                    <input type="hidden" id="profile_detail_member_id" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    <input type="hidden" id="profile_detail_member_type_id" name="member_type_id" value="<?PHP echo $member['member_type_id'];?>" > 
                    <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" >บันทึก</button>   
                    <button class="btn btn-register my-2 my-sm-0 m-1 pl-5 pr-5" type="reset" onclick="" >ยกเลิก</button>  
                </div>  
            </div>       
        </div>   
    </form>
    <div class="row m-0 align-items-center pt-4 pb-4" >
        <h4><b>ข้อมูลธุรกิจ</b></h4><h6 ><i class="fa fa-file-text-o p-2" aria-hidden="true"></i>แก้ไขข้อมูลธุรกิจ</h6>
    </div>
    <form role="form" method="post" onsubmit="return business_check();" action="index.php?content=profile_detail&action=edit_business" enctype="multipart/form-data">
        <div class="row pb-5"> 
            <div class="col-lg-4"  align="left" > 
                <div class="form-group">
                    <h6><b>ประเภทผู้ปล่อยกู้</b> <font color="#F00"><b>*</b></font></h6>     
                    <select  class="form-control " id="profile_detail_member_lender_type_id" name="member_lender_type_id" onchange="show_form();" style="border-color: #fe9102;"> 
                        <option  value="">เลือกประเภท</option> 
                        <option <?PHP if($member['member_lender_type_id']==1){echo 'selected';}?>  value="1">บุคคลธรรมดา / นายทุนทั่วไป</option> 
                        <option <?PHP if($member['member_lender_type_id']==2){echo 'selected';}?> value="2">ธนาคาร</option> 
                        <option <?PHP if($member['member_lender_type_id']==3){echo 'selected';}?> value="3">บริษัท / นิติบุคคล</option> 
                    </select>   
                </div>
            </div>   
            <div class="col-lg-12"  align="left" > 
                <div class="form-group"> 
                    <h6><b>ประเภทการปล่อยกู้</b> <font color="#F00"><b>*</b></font></h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="profile_detail_member_loan_type_deed" name="member_loan_type_deed" <?PHP if($member['member_loan_type_deed']==1){echo 'checked';}?>>
                        <label class="form-check-label" for="profile_detail_member_loan_type_deed">
                        โฉนดแลกเงิน
                        </label>
                    </div>
                    <div class="form-check hide_loan_type">
                        <input class="form-check-input" type="checkbox" value="1" id="profile_detail_member_loan_type_pico" name="member_loan_type_pico" <?PHP if($member['member_loan_type_pico']==1){echo 'checked';}?>>
                        <label class="form-check-label" for="profile_detail_member_loan_type_pico">
                        พิโกไฟแนนซ์
                        </label>
                    </div>
                    <div class="form-check hide_loan_type">
                        <input class="form-check-input" type="checkbox" value="1" id="profile_detail_member_loan_type_nano" name="member_loan_type_nano" <?PHP if($member['member_loan_type_nano']==1){echo 'checked';}?>>
                        <label class="form-check-label" for="profile_detail_member_loan_type_nano">
                        นาโนไฟแนนซ์
                        </label>
                    </div> 
                    <div class="form-check hide_loan_type">
                        <input class="form-check-input" type="checkbox" value="1" id="profile_detail_member_loan_type_business" name="member_loan_type_business" <?PHP if($member['member_loan_type_business']==1){echo 'checked';}?>>
                        <label class="form-check-label" for="profile_detail_member_loan_type_business">
                        หลักประกันทางธุรกิจ
                        </label>
                    </div> 
                </div>    
            </div>    
            <div id="business" class="row m-0" style="<?PHP if($member['member_lender_type_id']==1){echo "display:none";}?>">
                <div class="col-lg-4"  align="left" > 
                    <div class="form-group">
                        <h6><b>ชื่อบริษัท</b></h6>
                        <input id="profile_detail_member_business_name" name="member_business_name" class="form-control" style="border-color: #fe9102;">   
                    </div>       
                </div>
                <div class="col-lg-4"  align="left" > 
                    <div class="form-group">
                        <h6><b>สาขา</b></h6>
                        <input id="profile_detail_member_branch_name" name="member_branch_name" class="form-control" style="border-color: #fe9102;">   
                    </div>       
                </div>
                <div class="col-lg-4"  align="left" > 
                    <div class="form-group">
                        <h6><b>เลขประจำตัวผู้เสียภาษี</b></h6>
                        <input id="profile_detail_member_tax_id" name="member_tax_id" class="form-control" style="border-color: #fe9102;">   
                    </div>       
                </div>
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6><b>บริการ</b></h6>
                        <textarea rows="4" id="profile_detail_member_service_detail" name="member_service_detail" class="form-control" style="border-color: #fe9102;"></textarea>   
                    </div>       
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                    <h6><b>โลเคชั่น</b></h6>
                        <fieldset class="gllpLatlonPicker">
                            <input type="text" class="gllpSearchField form-control" placeholder="ค้นหาตำแหน่ง">
                            <input type="button" class="gllpSearchButton btn btn-primary" value="ค้นหา">
                            <div class="gllpMap">Google Maps</div>
                            <input type="text" class="gllpLatitude form-control" id="profile_detail_member_location_lat" name="member_location_lat" value="14.999515"/>
                            <input type="text" class="gllpLongitude form-control" id="profile_detail_member_location_long" name="member_location_long" value="102.13487399999997"/>
                            <input type="hidden" class="gllpZoom" value="16"/>
                        </fieldset>

                    </div>
                </div> 
            </div> 
            <div class="col-lg-12"  align="center" >  
                <div class="form-group">  
                    <input type="hidden" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >บันทึก</button>  
                    <button class="btn btn-register my-2 my-sm-0 m-1 pl-5 pr-5" type="reset" onclick="" >ยกเลิก</button>  
                </div>  
            </div>        
        </div>    
    </form> 
    <form  role="form" method="post" onsubmit="return business_img_check();"  action="index.php?content=profile_detail&action=add_business_img" enctype="multipart/form-data" >
        <div class="row" id="business_img"  style="<?PHP if($member['member_lender_type_id']==1){echo "display:none";}?>">
            <div class="col-lg-4">
                <div class="form-group">
                    <h6><b>รูปภาพธุรกิจ</b></h6>
                    <div> 
                        <img id="member_business_img_show" src="img_upload/member_business_img/<?php if($business_img['member_business_img_img'] != "" ){echo $business_img['member_business_img_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style="">  
                        
                        <input accept=".jpg , .png" type="file" id="member_business_img_img" name="member_business_img_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_business_img_show');" value="">
                        <button type="submit" class="btn btn-success">เพิ่มรูปภาพ</button>
                        <input type="hidden" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    </div>
                </div>
            </div> 
            <?PHP if(count($business_img)>0){?>
            <div style="border: 1px solid #ccc!important; border-radius: 5px; margin-top: 20px;">
                <div class="row " style="margin : 10px;">
                    <? for($i = 0; $i < count($business_img); $i++ ) {?>
                    <div class="col-lg-2" > 
                            <div style="text-align: center;">
                                <img  src="img_upload/member_business_img/<?php if($business_img[$i]['member_business_img_img'] != "") echo $business_img[$i]['member_business_img_img']; else echo "default.png" ?>" class="img-thumbnail"> 
                                <a href="?content=profile_detail&action=delete_business_img&id=<? echo $business_img[$i]['member_business_img_id'] ?>" onclick="return confirm('คุณต้องการลบรูปภาพนี้ใช่หรือไม่ ?');" style="color:red; font-size: 20px;">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div> 
                    </div>
                    <? } ?>
                </div>
            </div>
            <?PHP }?>
        </div> 
    </form> 
    
    <div class="row m-0 align-items-center pt-4 pb-4" >
        <h4><b>ข้อมูลยืนยันตัวตน</b></h4><h6 ><i class="fa fa-check-circle  p-2 text-success" aria-hidden="true"></i></i>100% ยืนยันแล้ว (ยังไม่ยืนยัน,รอพิจารณา)</h6>
    </div> 
    <form role="form" method="post" action="index.php?content=profile_detail&action=verified" enctype="multipart/form-data">
        <div class="row pb-5"> 
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-7"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ภาพถ่ายบัตรประชาชน</b></h6> 
                            <img id="member_id_card_img_show" src="img_upload/member/<?php if($member['member_id_card_img'] != "" ){echo $member['member_id_card_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                            <?PHP if($member['member_verified_status']!=2){?>     
                            <input accept=".jpg , .png" type="file" id="member_id_card_img" name="member_id_card_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_id_card_img_show');" value="">
                            <?PHP }?>  
                        </div>    
                    </div>   
                </div> 
            </div> 
            <div id="company" style="width:100%; <?PHP if($member['member_lender_type_id']==1){echo 'display:none';}?>">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>หนังสือรับรองบริษัท</b></h6> 
                                <img id="member_company_certificate_img_show" src="img_upload/member/<?php if($member['member_company_certificate_img'] != "" ){echo $member['member_company_certificate_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                <?PHP if($member['member_verified_status']!=2){?>     
                                <input accept=".jpg , .png" type="file" id="member_company_certificate_img" name="member_company_certificate_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_company_certificate_img_show');" value="">
                                <?PHP }?> 
                            </div>    
                        </div>   
                    </div> 
                </div> 
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>ใบอนุญาต</b></h6> 
                                <img id="member_license_img_show" src="img_upload/member/<?php if($member['member_license_img'] != "" ){echo $member['member_license_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                <?PHP if($member['member_verified_status']!=2){?>        
                                <input accept=".jpg , .png" type="file" id="member_license_img" name="member_license_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_license_img_show');" value="">
                                <?PHP }?>   
                            </div>    
                        </div>   
                    </div> 
                </div> 
            </div>
            <?PHP if($member['member_verified_status']!=2){?>
            <div class="col-lg-12"  align="center" >  
                <div class="form-group"> 
                    <input type="hidden" id="member_id_card_img_o" name="member_id_card_img_o" value="<?php echo  $member['member_id_card_img'] ?>" />
                    <input type="hidden" id="member_company_certificate_img_o" name="member_company_certificate_img_o" value="<?php echo  $member['member_company_certificate_img'] ?>" />
                    <input type="hidden" id="member_license_img_o" name="member_license_img_o" value="<?php echo  $member['member_license_img'] ?>" />
                    <input type="hidden" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                    <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >บันทึก</button>  
                </div>  
            </div>  
            <?PHP }?>     
        </div>    
    </form> 
    <?PHP } ?>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<link rel="stylesheet" type="text/css" href="template/map/css/jquery-gmaps-latlon-picker.css"/>
<script src="template/map/js/jquery-gmaps-latlon-picker.js"></script>
  
     
 
