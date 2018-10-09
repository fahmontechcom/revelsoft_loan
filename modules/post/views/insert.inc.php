<?php
  $sub_menu = 'index.php?content=post&action=insert';

  if($_GET['loan_type']==''){
    $loan_type = 'deed';
  }else{

    $loan_type = $_GET['loan_type'];
  }
  ?>
  <style type="text/css">
    .select2-selection{
        border-color: #0292d8!important;
    }
    select{
        border-color: #0292d8!important;
    }
     
</style>
  <script>
   $(document).ready(function(){
            $("#amphur_id").select2({ 
                placeholder: "อำเภอ",
                theme: 'bootstrap4'
            });
            $("#province_id").select2({ 
                placeholder: "จังหวัด",
                theme: 'bootstrap4'
            });
            $("#occupation_id").select2({ 
                placeholder: "เลือกอาชีพ",
                theme: 'bootstrap4'
            });
            $("#collateral_id").select2({ 
                placeholder: "เลือกทรัพย์หลักประกัน",
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
            $('#'+id).attr('src', 'img_upload/post/default_pic.png');
        }
    }
    function check(){   
    
        var loan_type_id = document.getElementById("loan_type_id").value; 
        if(loan_type_id==1){

            var property_id = document.getElementById("property_id").value; 
            var post_money = document.getElementById("post_money").value; 
            var post_address = document.getElementById("post_address").value; 
            var amphur_id = document.getElementById("amphur_id").value; 
            var province_id = document.getElementById("province_id").value;  
            var post_area_wa = document.getElementById("post_area_wa").value; 
            var post_area_ngan = document.getElementById("post_area_ngan").value; 
            var post_area_rai = document.getElementById("post_area_rai").value; 
            
            
            property_id = $.trim(property_id);    
            post_money = $.trim(post_money);    
            post_address = $.trim(post_address);       
            post_area_rai = $.trim(post_area_rai);    
            post_area_ngan = $.trim(post_area_ngan);    
            post_area_rai = $.trim(post_area_rai);    
            

            if(property_id.length == 0){
                alert("กรุณาเลือกรายละเอียดทรัพย์");
                document.getElementById("property_id").focus();
                return false;
            }else if(post_money.length == 0 ){
                alert("กรุณากรอกวงเงินที่ต้องการ");
                document.getElementById("post_money").focus();
                return false;         
            }else if(post_address.length == 0){
                alert("กรุณากรอกที่อยู่");
                document.getElementById("post_address").focus();
                return false;         
            }else if(amphur_id.length == 0){
                alert("กรุณาเลือกอำเภอ");
                document.getElementById("amphur_id").focus();
                return false;         
            }else if(province_id.length == 0){
                alert("กรุณาเลือกจังหวัด");
                document.getElementById("province_id").focus();
                return false;         
            }else if(post_area_rai.length == 0&&post_area_ngan.length == 0&&post_area_wa.length == 0){
                alert("กรุณากรอกเนื้อที่");
                document.getElementById("post_area_wa").focus();
                return false;         
            }else{ 
                return true;    
            }
        }else if(loan_type_id==2){
            
            var post_money = document.getElementById("post_money").value; 
            var post_address = document.getElementById("post_address").value; 
            var amphur_id = document.getElementById("amphur_id").value; 
            var province_id = document.getElementById("province_id").value;  
            var post_area_wa = document.getElementById("post_area_wa").value; 
            var post_area_ngan = document.getElementById("post_area_ngan").value; 
            var post_area_rai = document.getElementById("post_area_rai").value;  

            post_money = $.trim(post_money);    
            post_address = $.trim(post_address);     
            post_area_rai = $.trim(post_area_rai);    
            post_area_ngan = $.trim(post_area_ngan);    
            post_area_rai = $.trim(post_area_rai);    

            if(post_money.length == 0||post_money>50000){
                alert("กรุณากรอกวงเงินที่ต้องการ (ไม่ควรเกิน 50,000 บาท)");
                document.getElementById("post_money").focus();
                return false;         
            }else if(post_address.length == 0){
                alert("กรุณากรอกที่อยู่");
                document.getElementById("post_address").focus();
                return false;         
            }else if(amphur_id.length == 0){
                alert("กรุณาเลือกอำเภอ");
                document.getElementById("amphur_id").focus();
                return false;         
            }else if(province_id.length == 0){
                alert("กรุณาเลือกจังหวัด");
                document.getElementById("province_id").focus();
                return false;         
            }else if(post_area_rai.length == 0&&post_area_ngan.length == 0&&post_area_wa.length == 0){
                alert("กรุณากรอกเนื้อที่");
                document.getElementById("post_area_wa").focus();
                return false;         
            }else{ 
                return true;    
            }
        }else if(loan_type_id==3){
            
            var post_money = document.getElementById("post_money").value; 
            var post_address = document.getElementById("post_address").value; 
            var amphur_id = document.getElementById("amphur_id").value; 
            var province_id = document.getElementById("province_id").value;   
            var occupation_id = document.getElementById("occupation_id").value;   

            post_money = $.trim(post_money);    
            post_address = $.trim(post_address);      

            if(post_money.length == 0||post_money>100000){
                alert("กรุณากรอกวงเงินที่ต้องการ (ไม่ควรเกิน 100,000 บาท)");
                document.getElementById("post_money").focus();
                return false;    
            }else if(occupation_id.length == 0){
                alert("กรุณาเลือกอาชีพ");
                document.getElementById("occupation_id").focus();
                return false;             
            }else if(post_address.length == 0){
                alert("กรุณากรอกที่อยู่");
                document.getElementById("post_address").focus();
                return false;         
            }else if(amphur_id.length == 0){
                alert("กรุณาเลือกอำเภอ");
                document.getElementById("amphur_id").focus();
                return false;         
            }else if(province_id.length == 0){
                alert("กรุณาเลือกจังหวัด");
                document.getElementById("province_id").focus();
                return false;   
            }else{ 
                return true;    
            } 
        }else if(loan_type_id==4){
            
            var post_money = document.getElementById("post_money").value; 
            var post_address = document.getElementById("post_address").value; 
            var amphur_id = document.getElementById("amphur_id").value; 
            var province_id = document.getElementById("province_id").value;   
            var collateral_id = document.getElementById("collateral_id").value;   

            post_money = $.trim(post_money);    
            post_address = $.trim(post_address);      

            if(collateral_id.length == 0){
                alert("กรุณาเลือกทรัพย์หลักประกัน");
                document.getElementById("collateral_id").focus();
                return false;    
            }else if(post_money.length == 0){
                alert("กรุณากรอกวงเงินที่ต้องการ");
                document.getElementById("post_money").focus();
                return false;     
            }else if(post_address.length == 0){
                alert("กรุณากรอกที่อยู่");
                document.getElementById("post_address").focus();
                return false;         
            }else if(amphur_id.length == 0){
                alert("กรุณาเลือกอำเภอ");
                document.getElementById("amphur_id").focus();
                return false;         
            }else if(province_id.length == 0){
                alert("กรุณาเลือกจังหวัด");
                document.getElementById("province_id").focus();
                return false;   
            }else{ 
                return true;    
            }
        }
            
    }
  </script>
<div class="container pb-3"> 
    <div class="row pt-3 justify-content-center">
        <h3 style="color: #0292d8;"><b>อยากกู้</b></h3> 
    </div>
    <div class="row  pt-3">
        <ul class="nav nav-tabs" style="width:100%">
        <li class="nav-item">
            <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type=='deed'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type=deed"><img src="template/images/loan_type_1.png" height="25px" alt=""> โฉนดแลกเงิน</a>
        </li>
        <li class="nav-item">
            <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type=='pico'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type=pico"><img src="template/images/loan_type_2.png" height="25px" alt=""> พิโกไฟแนนซ์</a>
        </li> 
        <li class="nav-item">
            <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type=='nano'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type=nano"><img src="template/images/loan_type_3.png" width="25px" alt=""> นาโนไฟแนนซ์</a>
        </li> 
        <li class="nav-item">
            <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type=='business'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type=business"><img src="template/images/loan_type_4.png" height="25px" alt=""> หลักประกันทางธุรกิจ</a>
        </li> 
        </ul>
    </div>
    <div class="row justify-content-center post_form">
        <div class="col-sm-9">
            <?PHP 
            if($loan_type=='deed'){
            ?> 
            <form role="form" method="post" onsubmit="return check();" action="index.php?content=post&action=add" enctype="multipart/form-data">
                <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center ">  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>เลือกธุรกรรมที่ต้องการ</b></h6>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="post_transaction_mortgage" name="post_transaction_mortgage" value="1">
                        <label class="form-check-label" for="post_transaction_mortgage">จำนอง</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="post_transaction_selling" name="post_transaction_selling" value="1">
                        <label class="form-check-label" for="post_transaction_selling">ขายฝาก</label>
                        </div>  
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="post_transaction_deposit" name="post_transaction_deposit" value="1">
                        <label class="form-check-label" for="post_transaction_deposit">ฝากโฉนด</label>
                        </div>  
                    </div>    
                </div>    
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <h6><b>รายละเอียดทรัพย์</b> <font color="#F00"><b>*</b></font></h6>
                        <select  class="form-control" id="property_id"  name="property_id" onchange="" >  
                        <option value="">เลือกรายละเอียดทรัพย์</option>
                            <?php 
                                for($i =  0 ; $i < count($property) ; $i++){
                                ?>
                                <option value="<?php echo $property[$i]['property_id']; ?>"><?php echo $property[$i]['property_detail']; ?></option>
                                <?
                                }
                            ?>
                        </select>    
                    </div>   
                </div>   
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <h6><b>วงเงินที่ต้องการ</b> <font color="#F00"><b>*</b></font></h6>
                        <input type="number" min="0" id="post_money" name="post_money" min="0" class="form-control borrower_border_color">     
                    </div>   
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>ตำแหน่ง</b> <font color="#F00"><b>*</b></font></h6>
                        <input id="post_address" name="post_address" class="form-control borrower_border_color" placeholder="ที่อยู่" >   
                    </div>    
                </div>  
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <select  class="form-control select " id="amphur_id"  name="amphur_id" onchange="" >  
                        <option></option>
                            <?php 
                                for($i =  0 ; $i < count($amphur) ; $i++){
                                ?>
                                <option value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option> 
                                <?
                                }
                            ?>
                        </select>    
                    </div>   
                </div>   
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <select  class="form-control select " id="province_id" name="province_id" onchange="" > 
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
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>เนื้อที่</b> <font color="#F00"><b>*</b></font></h6>
                        <div class="form-inline">
                            <div class="pr-2"> 
                            <input type="number" min="0" step="0.01" min="0" id="post_area_wa" name="post_area_wa" class="form-control borrower_border_color"   value="" style="width:80px;">  
                            </div>  
                            <div class="pr-2"> 
                            ตรว. 
                            </div>  
                            <div class="pr-2"> 
                            <input type="number" min="0" min="0" id="post_area_ngan" name="post_area_ngan" class="form-control borrower_border_color"   value="" style="width:80px;">  
                            </div>  
                            <div class="pr-2"> 
                            งาน
                            </div>  
                            <div class="pr-2"> 
                            <input type="number" min="0" min="0" id="post_area_rai" name="post_area_rai" class="form-control borrower_border_color"   value="" style="width:80px;">  
                            </div>  
                            <div class="pr-2"> 
                            ไร่ 
                            </div>  
                            
                            
                        </div>
                    </div>    
                </div>
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>ลักษณะที่</b></h6>
                        <div class="form-inline"> 
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="post_building" id="post_building1" value="0" checked >
                            <label class="form-check-label" for="post_building1">ที่ดินเปล่า</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="post_building" id="post_building2" value="1">
                            <label class="form-check-label" for="post_building2">มีสิ่งปลูกสร้าง</label>
                            </div>   
                            <div class="pr-2"> 
                            <div class="form-group">  
                                <select  class="form-control select " id="building_id"  name="building_id" onchange="" >  
                                    <option>เลือกสิ่งปลูกสร้าง</option> 
                                    <?php 
                                        for($i =  0 ; $i < count($building) ; $i++){
                                        ?>
                                        <option value="<?php echo $building[$i]['building_id']; ?>"><?php echo $building[$i]['building_name']; ?></option>
                                        <?
                                        }
                                    ?>
                                </select>    
                            </div>   
                            </div>      
                        </div> 
                    </div>    
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>ภาระของทรัพย์</b></h6>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id0" value="0" checked >
                        <label class="form-check-label" for="burden_id0">ปลอดภาระ</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id1" value="1"  >
                        <label class="form-check-label" for="burden_id1">ติดจำนอง</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id2" value="2">
                        <label class="form-check-label" for="burden_id2">ติดขายฝาก</label>
                        </div>   
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id3" value="3">
                        <label class="form-check-label" for="burden_id3">ติดฝากโฉนด</label>
                        </div>    
                    </div>    
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>รูปภาพโฉนดด้านหน้า</b></h6> 
                        <div class="row">
                            <div class="col-lg-4">
                            <img id="post_img_1_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_1" name="post_img_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_1_show');" value="">
                            </div> 
                            <div class="col-lg-4">
                            <img id="post_img_2_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_2" name="post_img_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_2_show');" value="">
                            </div> 
                        </div>  
                    </div>    
                </div>   
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>รูปภาพโฉนดด้านหลัง</b></h6> 
                        <div class="row">
                            <div class="col-lg-4">
                            <img id="post_img_3_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_3" name="post_img_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_3_show');" value="">
                            </div> 
                            <div class="col-lg-4">
                            <img id="post_img_4_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_4" name="post_img_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_4_show');" value="">
                            </div> 
                        </div> 
                    </div>    
                </div>   
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6><b>รูปภาพที่ดิน/บ้าน</b></h6> 
                        <div class="row">
                            <div class="col-lg-4">
                            <img id="post_img_5_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_5" name="post_img_5" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_5_show');" value="">
                            </div> 
                            <div class="col-lg-4">
                            <img id="post_img_6_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                    
                            <input accept=".jpg , .png" type="file" id="post_img_6" name="post_img_6" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_6_show');" value="">
                            </div> 
                        </div> 
                    </div>    
                </div> 
                <div class="col-lg-6"  align="left" > 
                    <div class="form-group">  
                        <h6><b>ระยะเวลาของโพส</b></h6>
                        <select  class="form-control select " id="post_amount_days" name="post_amount_days" onchange="" > 
                            <option value="7">7 วัน</option> 
                            <option value="30">30 วัน</option> 
                            <option value="90">90 วัน</option> 
                            
                        </select>    
                    </div>   
                </div> 
                <div class="col-lg-12"  align="center" >  
                    <div class="form-group">  
                            <input type="hidden" id="loan_type_id" name="loan_type_id" value="1" > 
                            <input type="hidden" id="member_id" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                        <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >อยากกู้</button>  
                    </div>  
                </div>   
                </div>  
            </form>
            <?PHP
            }
            ?>
            <?PHP 
            if($loan_type=='pico'){
            ?>
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=post&action=add" enctype="multipart/form-data">
                    <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center "> 
                        
                    
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <h6><b>วงเงินที่ต้องการ (ไม่ควรเกิน 50,000 บาท) <font color="#F00"><b>*</b></font></b></h6>
                                <input type="number" min="0" id="post_money" name="post_money" class="form-control borrower_border_color"  >     
                            </div>   
                        </div>  
                        
                        <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>หลักประกัน/โฉนด</b></h6>
                            <div class="form-inline"> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="post_deed" id="post_deed1" value="0" checked>
                                    <label class="form-check-label" for="post_deed1">ไม่มี</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="post_deed" id="post_deed2" value="1">
                                    <label class="form-check-label" for="post_deed2">มี</label>
                                </div>   
                                <div class="pr-2"> 
                                    <div class="form-group">  
                                        <input id="post_deed_number" name="post_deed_number" class="form-control borrower_border_color" placeholder="เลขที่โฉนด" >   
                                    </div>   
                                </div>      
                            </div> 
                        </div>    
                        </div>  
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>ที่อยู่ <font color="#F00"><b>*</b></font></b></h6>
                                <input id="post_address" name="post_address" class="form-control borrower_border_color" placeholder="ที่อยู่"  value="<?PHP echo $member['post_address'];?>">   
                            </div>    
                        </div>    
                        <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <select  class="form-control select " id="amphur_id"  name="amphur_id" onchange="" >  
                            <option></option>
                                <?php 
                                    for($i =  0 ; $i < count($amphur) ; $i++){
                                    ?>
                                    <option value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option> 
                                    <?
                                    }
                                ?>
                            </select>    
                        </div>   
                        </div>   
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <select  class="form-control select " id="province_id" name="province_id" onchange="" > 
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
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>เนื้อที่</b> <font color="#F00"><b>*</b></font></h6>
                                <div class="form-inline">
                                <div class="pr-2"> 
                                    <input type="number" min="0" step="0.01" id="post_area_wa" name="post_area_wa" class="form-control borrower_border_color"   value="" style="width:80px;">  
                                </div>  
                                <div class="pr-2"> 
                                    ตรว. 
                                </div>  
                                <div class="pr-2"> 
                                    <input type="number" min="0" id="post_area_ngan" name="post_area_ngan" class="form-control borrower_border_color"   value="" style="width:80px;">  
                                </div>  
                                <div class="pr-2"> 
                                    งาน
                                </div>  
                                <div class="pr-2"> 
                                    <input type="number" min="0" id="post_area_rai" name="post_area_rai" class="form-control borrower_border_color"   value="" style="width:80px;">  
                                </div>  
                                <div class="pr-2"> 
                                    ไร่ 
                                </div>  
                            </div>
                        </div>      
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <h6><b>โลเคชั่น</b></h6>
                                <fieldset class="gllpLatlonPicker">
                                    <input type="text" class="gllpSearchField form-control" placeholder="ค้นหาตำแหน่ง">
                                    <input type="button" class="gllpSearchButton btn btn-primary" value="ค้นหา">
                                    <div class="gllpMap">Google Maps</div>
                                    <input type="text" class="gllpLatitude form-control" id="post_location_lat" name="post_location_lat" value="14.999515"/>
                                    <input type="text" class="gllpLongitude form-control" id="post_location_long" name="post_location_long" value="102.13487399999997"/>
                                    <input type="hidden" class="gllpZoom" value="16"/>
                                </fieldset>

                            </div>
                        </div> 
                        <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ลักษณะที่</b></h6>
                            <div class="form-inline"> 
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="post_building" id="post_building1" value="0" checked >
                                <label class="form-check-label" for="post_building1">ที่ดินเปล่า</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="post_building" id="post_building2" value="1">
                                <label class="form-check-label" for="post_building2">มีสิ่งปลูกสร้าง</label>
                                </div>   
                                <div class="pr-2"> 
                                <div class="form-group">  
                                    <select  class="form-control select " id="building_id"  name="building_id" onchange="" >  
                                        <option>เลือกสิ่งปลูกสร้าง</option> 
                                        <?php 
                                            for($i =  0 ; $i < count($building) ; $i++){
                                            ?>
                                            <option value="<?php echo $building[$i]['building_id']; ?>"><?php echo $building[$i]['building_name']; ?></option>
                                            <?
                                            }
                                        ?>
                                    </select>    
                                </div>   
                                </div>      
                            </div> 
                            
                            
                        </div>    
                        </div>  
                        <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>รูปภาพโฉนดด้านหน้า</b></h6> 
                            <div class="row">
                                <div class="col-lg-4">
                                <img id="post_img_1_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                        
                                <input accept=".jpg , .png" type="file" id="post_img_1" name="post_img_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_1_show');" value="">
                                </div> 
                                <div class="col-lg-4">
                                <img id="post_img_2_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                        
                                <input accept=".jpg , .png" type="file" id="post_img_2" name="post_img_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_2_show');" value="">
                                </div> 
                            </div>  
                        </div>    
                        </div>   
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>รูปภาพโฉนดด้านหลัง</b></h6> 
                                <div class="row">
                                    <div class="col-lg-4">
                                    <img id="post_img_3_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                            
                                    <input accept=".jpg , .png" type="file" id="post_img_3" name="post_img_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_3_show');" value="">
                                    </div> 
                                    <div class="col-lg-4">
                                    <img id="post_img_4_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                            
                                    <input accept=".jpg , .png" type="file" id="post_img_4" name="post_img_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_4_show');" value="">
                                    </div> 
                                </div> 
                            </div>    
                        </div>   
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>รูปภาพที่ดิน/บ้าน</b></h6> 
                                <div class="row">
                                    <div class="col-lg-4">
                                    <img id="post_img_5_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                            
                                    <input accept=".jpg , .png" type="file" id="post_img_5" name="post_img_5" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_5_show');" value="">
                                    </div> 
                                    <div class="col-lg-4">
                                    <img id="post_img_6_show" src="img_upload/post/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                            
                                    <input accept=".jpg , .png" type="file" id="post_img_6" name="post_img_6" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_6_show');" value="">
                                    </div> 
                                </div> 
                            </div>    
                        </div> 
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <h6><b>ระยะเวลาของโพส</b></h6>
                                <select  class="form-control select " id="post_amount_days" name="post_amount_days" onchange="" > 
                                    <option value="7">7 วัน</option> 
                                    <option value="30">30 วัน</option> 
                                    <option value="90">90 วัน</option> 
                                    
                                </select>    
                            </div>   
                        </div>   
                        <div class="col-lg-12"  align="center" >  
                            <div class="form-group">  
                                <input type="hidden" id="loan_type_id" name="loan_type_id" value="2" > 
                                <input type="hidden" id="member_id" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                                <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >อยากกู้</button>  
                            </div>  
                        </div>
                    </div> 
                </form> 
            <?PHP
            }
            ?>
            <?PHP 
            if($loan_type=='nano'){
            ?>
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=post&action=add" enctype="multipart/form-data">
                    <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center ">
                        <div class="col-lg-12 p-0">
                            <div class="col-lg-6 "  align="left" > 
                                <div class="form-group">  
                                    <h6><b>วงเงินที่ต้องการ (ไม่ควรเกิน 100,000 บาท)</b> <font color="#F00"><b>*</b></font></b></h6>
                                    <input type="number" min="0" id="post_money" name="post_money" class="form-control borrower_border_color"   >     
                                </div>   
                            </div>  
                        </div>
                        <div class="col-lg-12 p-0">
                            <div class="col-lg-6"  align="left" > 
                                <div class="form-group">  
                                <h6><b>อาชีพ</b> <font color="#F00"><b>*</b></font></b></h6>
                                <select  class="form-control select " id="occupation_id"  name="occupation_id" onchange="" >  
                                    <option value=""></option>
                                    <?php 
                                        for($i =  0 ; $i < count($occupation) ; $i++){
                                        ?>
                                        <option <?php if($occupation[$i]['occupation_id'] == $member['occupation_id']){?> selected <?php }?> value="<?php echo $occupation[$i]['occupation_id']; ?>"><?php echo $occupation[$i]['occupation_name']; ?></option>
                                            
                                        <?
                                        }
                                    ?>
                                    <option value="0">ฯลฯ</option> 
                                </select>    
                                </div>   
                            </div>  
                        </div>  
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>ที่อยู่/ที่ตั้งร้าน</b> <font color="#F00"><b>*</b></font></b></h6>
                                <input id="post_address" name="post_address" class="form-control borrower_border_color" placeholder="ที่อยู่"  value="<?PHP echo $member['post_address'];?>">   
                            </div>    
                        </div>  
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <select  class="form-control select " id="amphur_id"  name="amphur_id" onchange="" >  
                                <option></option>
                                    <?php 
                                        for($i =  0 ; $i < count($amphur) ; $i++){
                                        ?>
                                        <option   value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option>
                                            
                                        <?
                                        }
                                    ?>
                                </select>    
                            </div>   
                        </div>   
                        <div class="col-lg-6"  align="left" > 
                            <div class="form-group">  
                                <select  class="form-control select " id="province_id" name="province_id" onchange="" > 
                                <option></option> 
                                    <?php 
                                        for($i =  0 ; $i < count($province) ; $i++){
                                        ?>
                                        <option  value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                        <?
                                        }
                                    ?>
                                </select>    
                            </div>   
                        </div> 
                        <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>รูปภาพที่เกี่ยวข้องกับอาชีพ (หน้าร้าน, ทะเบียนการค้า, รถคู่ใจ, ฯลฯ)</b></h6> 
                                <div class="row">
                                <?PHP 
                                for($i=1;$i<=6;$i++){
                                ?>
                                    <div class="col-lg-4 p-2">
                                        <img id="post_img_<?=$i?>_show" src="img_upload/member/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                                
                                        <input accept=".jpg , .png" type="file" id="post_img_<?=$i?>" name="post_img_<?=$i?>" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_<?=$i?>_show');" value="">
                                    </div>
                                <?PHP
                                }
                                ?> 
                                </div>  
                            </div>    
                        </div>    
                        <div class="col-lg-12"  align="center" >  
                            <div class="form-group">  
                                <input type="hidden" id="loan_type_id" name="loan_type_id" value="3" > 
                                <input type="hidden" id="member_id" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                                <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >อยากกู้</button>  
                            </div>  
                        </div>
                    </div>
                </form> 
            <?PHP
            }
            ?>
            <?PHP 
            if($loan_type=='business'){
            ?>
            <form role="form" method="post" onsubmit="return check();" action="index.php?content=post&action=add" enctype="multipart/form-data">
                <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center ">
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ทรัพย์หลักประกัน</b> <font color="#F00"><b>*</b></font></h6> 
                            <select  class="form-control select " id="collateral_id"  name="collateral_id" onchange="" >  
                                <option></option> 
                                <?php 
                                    for($i =  0 ; $i < count($collateral) ; $i++){
                                    ?>
                                    <option  value="<?php echo $collateral[$i]['collateral_id']; ?>"><?php echo $collateral[$i]['collateral_name']; ?></option>
                                        
                                    <?
                                    }
                                ?>
                                <option value="0">อื่น ๆ ( ระบุ... )</option> 
                            </select>    
                        </div>   
                    </div> 
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <h6><b>ระบุ</b></h6>
                            <input type="text" id="post_collateral_name" name="post_collateral_name" class="form-control borrower_border_color" >     
                        </div>   
                    </div> 
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <h6><b>วงเงินที่ต้องการ</b> <font color="#F00"><b>*</b></font></h6>
                            <input type="number" min="0" id="post_money" name="post_money" class="form-control borrower_border_color" >     
                        </div>   
                    </div>  
                    <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>รูปถ่ายทรัพย์หลักประกัน</b></h6> 
                            <div class="row">
                                <?PHP 
                                for($i=1;$i<=6;$i++){
                                ?>
                                    <div class="col-lg-4 p-2">
                                        <img id="post_img_<?=$i?>_show" src="img_upload/member/default_pic.png" class="img-fluid" alt="" align="left" style=""> 
                                                
                                        <input accept=".jpg , .png" type="file" id="post_img_<?=$i?>" name="post_img_<?=$i?>" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'post_img_<?=$i?>_show');" value="">
                                    </div>
                                <?PHP
                                }
                                ?> 
                                </div>  
                        </div>    
                    </div> 
                    <div class="col-lg-12"  align="left" > 
                        <div class="form-group"> 
                            <h6><b>ที่อยู่/ที่ตั้ง</b> <font color="#F00"><b>*</b></font></h6>
                            <input id="post_address" name="post_address" class="form-control borrower_border_color" placeholder="ที่อยู่"  value="<?PHP echo $member['post_address'];?>">   
                        </div>    
                    </div>  
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <select  class="form-control select " id="amphur_id"  name="amphur_id" onchange="" >  
                            <option></option>
                                <?php 
                                    for($i =  0 ; $i < count($amphur) ; $i++){
                                    ?>
                                    <option value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option>
                                        
                                    <?
                                    }
                                ?>
                            </select>    
                        </div>   
                    </div>   
                    <div class="col-lg-6"  align="left" > 
                        <div class="form-group">  
                            <select  class="form-control select " id="province_id" name="province_id" onchange="" > 
                            <option></option> 
                                <?php 
                                    for($i =  0 ; $i < count($province) ; $i++){
                                    ?>
                                    <option  value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                    <?
                                    }
                                ?>
                            </select>    
                        </div>   
                    </div>    
                    <div class="col-lg-12"  align="center" >  
                        <div class="form-group">  
                            <input type="hidden" id="loan_type_id" name="loan_type_id" value="4" > 
                            <input type="hidden" id="member_id" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                            <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >อยากกู้</button>  
                        </div>  
                    </div>
                </div>
            </form> 
            <?PHP
            }
            ?>

   
        </div>
    </div>
</div>

 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<link rel="stylesheet" type="text/css" href="template/map/css/jquery-gmaps-latlon-picker.css"/>
<script src="template/map/js/jquery-gmaps-latlon-picker.js"></script>