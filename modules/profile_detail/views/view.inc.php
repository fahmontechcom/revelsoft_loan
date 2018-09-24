  <script>
      $(document).ready(function(){
        $(".amphur").select2({ 
            placeholder: "อำเภอ",
            theme: 'bootstrap4'
        });
        $(".province").select2({ 
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
  </script>
            <div class="row m-0  pt-4 pb-4" >
                <h6 >กรุณายืนยันอีเมลเพื่อเข้าใช้งานระบบ<br><br><a href="">>>ส่งรหัสไปยังอีเมลอีกครั้ง<<</a></h6>
                
            </div>
            
            <div class="row m-0 align-items-center pt-4 pb-4" >
                <h4><b>ข้อมูลส่วนตัว</b></h4><h6 ><i class="fa fa-file-text-o p-2" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</h6>
            </div>
            <div class="row justify-content-center"> 
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7"  align="left" > 
                            <div class="form-group"> 
                                <h6>ชื่อ - นามสกุล</h6>
                                <input id="member_name" name="member_name" class="form-control" style="border-color: #0292d8;">   
                            </div>    
                        </div>  
                        <div class="col-lg-5"  align="left" > 
                            <div class="form-group"> 
                                <h6>ชื่อในระบบ</h6>
                                <input id="member_name_show"  name="member_name_show" class="form-control" style="border-color: #0292d8;">   
                            </div>    
                        </div> 
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6>ที่อยู่</h6>
                                <input id="member_address" name="member_address" class="form-control" placeholder="ที่อยู่" style="border-color: #0292d8;">   
                            </div>    
                        </div>   
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <select  class="form-control select amphur" id="amphur_id"  name="amphur_id" onchange="" style="border-color: #0292d8;">  
                                <option></option>
                                    <?php 
                                        for($i =  0 ; $i < count($amphur) ; $i++){
                                        ?>
                                        <option <?php if($amphur[$i]['amphur_id'] == $amphur_id){?> selected <?php }?> value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option>
                                        <?
                                        }
                                    ?>
                                </select>    
                            </div>   
                        </div>   
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <select  class="form-control select province" id="province_id" name="province_id" onchange="" style="border-color: #0292d8;"> 
                                <option></option> 
                                    <?php 
                                        for($i =  0 ; $i < count($province) ; $i++){
                                        ?>
                                        <option <?php if($province[$i]['province_id'] == $province_id){?> selected <?php }?> value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                        <?
                                        }
                                    ?>
                                </select>    
                            </div>   
                        </div>   
                    </div> 
                </div>
                <div class="col-lg-3">
                    <div class="row d-flex justify-content-center align-items-center"> 
                        <div style="width:8em;height:8em; border-radius: 50%!important;border: 0.2em solid white; overflow: hidden;"> 
                            <img id="member_profile_img_show" src="img_upload/member/<?php if($user['member_profile_img'] != "" ){echo $user['member_profile_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                        </div> 
                        <input accept=".jpg , .png" type="file" id="member_profile_img" name="member_profile_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'member_profile_img_show');" value="">
                    </div> 
                </div> 
            
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group"> 
                                <h6>เบอร์โทร</h6>
                                <input id="member_tel" name="member_tel" class="form-control" style="border-color: #0292d8;">   
                            </div>  
                        </div> 
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group"> 
                                <h6>อีเมล</h6>
                                <div>
                                    <div style="max-width:300px;display: inline-block;"> 
                                        <input id="member_email" name="member_email" class="form-control" style="border-color: #0292d8;">    
                                    </div>
                                    <div style="display: inline-block;"> 
                                        <h6 >ยืนยันแล้ว</h6>   
                                    </div>
                                </div>
                                
                            </div>  
                            <div class="form-group"> 
                                <h6>รหัสผ่าน</h6>
                                <div>
                                    <div style="max-width:300px;display: inline-block;"> 
                                        <input id="member_password" name="member_password" class="form-control" style="border-color: #0292d8;"> 
                                    </div>
                                    <div style="display: inline-block;"> 
                                        <h6 >เปลี่ยนรหัสผ่าน</h6>   
                                    </div>
                                </div>
                                     
                            </div>   
                        </div>  
                    </div>
                </div>
                 
                    
                <div class="col-lg-12"  align="center" >  
                    <div class="form-group">
                        <input type="hidden" id="member_id" name="member_id" value="<?PHP echo $member['member_id'];?>" > 
                        <input type="hidden" id="member_type_id" name="member_type_id" value="<?PHP echo $member['member_type_id'];?>" > 
                        <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="button" onclick="" >บันทึก</button>   
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
                                <img id="member_id_card_img_show" src="img_upload/member/<?php if($user['member_id_card_img'] != "" ){echo $user['member_id_card_img'];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                     
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
            
     
 
