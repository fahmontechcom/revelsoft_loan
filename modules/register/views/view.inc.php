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
    function borrower_add(){
        
        var member_name = document.getElementById("member_name").value; 
        var member_name_show = document.getElementById("member_name_show").value;
        var member_address = document.getElementById("member_address").value;
        var amphur_id = document.getElementById("amphur_id").value;
        var province_id = document.getElementById("province_id").value;
        var member_tel = document.getElementById("member_tel").value;
        var member_email = document.getElementById("member_email").value;
        var member_password = document.getElementById("member_password").value;
        var member_type_id = document.getElementById("member_type_id").value;
        var confirm = document.getElementById("confirm").checked;
        
        
        member_name = $.trim(member_name);
        member_name_show = $.trim(member_name_show);
        member_address = $.trim(member_address);
        amphur_id = $.trim(amphur_id);
        province_id = $.trim(province_id);
        member_tel = $.trim(member_tel);
        member_email = $.trim(member_email);
        member_password = $.trim(member_password);
        member_type_id = $.trim(member_type_id);
        
        
        if(member_name.length == 0){
            alert("กรุณากรอก ชื่อ - นามสกุล");
            document.getElementById("member_name").focus();
        }else if(member_name_show.length == 0){
            alert("กรุณากรอกชื่อในระบบ");
            document.getElementById("member_name_show").focus();
            return false;
        }else if(member_address.length == 0){
            alert("กรุณากรอกที่อยู่");
            document.getElementById("member_address").focus();
            return false;
        }else if(amphur_id.length == 0){
            alert("กรุณาเลือกอำเภอ");
            document.getElementById("amphur_id").focus();
            return false;
        }else if(province_id.length == 0){
            alert("กรุณาเลือกอำเภอ");
            document.getElementById("province_id").focus();
            return false;
        }else if(member_tel.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_tel").focus();
            return false;
        }else if(member_email.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_email").focus();
            return false;
        }else if(member_password.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_password").focus();
            return false;
        }else if(confirm == false){
            alert("กรุณายอมรับเงื่อนไข");
            document.getElementById("confirm").focus();
            return false;
        }else{
            
            // window.history.replaceState("", "", "index.php?content=customer&customer_id="+customer_id+"");
            $.post( "modules/register/views/index.inc.php",
                    {
                        member_name : member_name,
                        member_name_show:member_name_show,
                        member_address:member_address,
                        amphur_id:amphur_id,
                        province_id:province_id,
                        member_tel:member_tel,
                        member_email:member_email,
                        member_password:member_password,
                        member_type_id:member_type_id, 
                        action:'add'
                    }
                , function( data ) {
                 console.log(data);
                 if(data!=0){
                    alert('สมัครสมาชิกเรียบร้อยแล้ว กรุณายืนยันการสมัครในอีเมลเพื่อเข้าใช้งาน LOANMARKETO');
                    // window.location="index.php?content=profile&member_id="+data;  
                    window.location="index.php?content=home"; 
                 }else{
                    alert('ไม่สามารถสมัครสมาชิกได้กรุณาสมัครใหม่');
                    window.location="index.php?content=home"; 
                 }
            });
        } 
    }

    function lender_check(){
        
        var member_name = document.getElementById("member_name").value; 
        var member_address = document.getElementById("member_address").value;
        var amphur_id = document.getElementById("amphur_id").value;
        var province_id = document.getElementById("province_id").value;
        var member_tel = document.getElementById("member_tel").value;
        var member_email = document.getElementById("member_email").value;
        var member_password = document.getElementById("member_password").value;
        
        
        member_name = $.trim(member_name); 
        member_address = $.trim(member_address);
        amphur_id = $.trim(amphur_id);
        province_id = $.trim(province_id);
        member_tel = $.trim(member_tel);
        member_email = $.trim(member_email);
        member_password = $.trim(member_password);
        
        
        if(member_name.length == 0){
            alert("กรุณากรอกชื่อ");
            document.getElementById("member_name").focus();
        }else if(member_name_show.length == 0){
            alert("กรุณากรอกชื่อในระบบ");
            document.getElementById("member_name_show").focus();
            return false;
        }else if(member_address.length == 0){
            alert("กรุณากรอกที่อยู่");
            document.getElementById("member_address").focus();
            return false;
        }else if(amphur_id.length == 0){
            alert("กรุณาเลือกอำเภอ");
            document.getElementById("amphur_id").focus();
            return false;
        }else if(province_id.length == 0){
            alert("กรุณาเลือกอำเภอ");
            document.getElementById("province_id").focus();
            return false;
        }else if(member_tel.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_tel").focus();
            return false;
        }else if(member_email.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_email").focus();
            return false;
        }else if(member_password.length == 0){
            alert("กรุณากรอกเบอร์โทร");
            document.getElementById("member_password").focus();
            return false;
        }else{
            return true;
        }
    }

</script> 
<?PHP if($_POST['member_type_id']==1){?>
    <div id="borrower" class="modal-body p-5" > 
        <div class="row justify-content-center">   
            <img  src="template/images/logo.png" height="70px" alt="">      
        </div>     
        <div class="row justify-content-center" style="border-color:green;">
            <h4>สมัครสมาชิก - ผู้กู้</h4>   
        </div>
               
            <div class="row justify-content-center">
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
            
                
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6>เบอร์โทร</h6>
                        <input id="member_tel" name="member_tel" class="form-control" style="border-color: #0292d8;">   
                    </div>  
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6>อีเมล</h6>
                        <input type="email" id="member_email" name="member_email" class="form-control" style="border-color: #0292d8;">   
                    </div>  
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group"> 
                        <h6>รหัสผ่าน</h6>
                        <input type="password" id="member_password" name="member_password" class="form-control" style="border-color: #0292d8;">   
                    </div>     
                </div>   
                <div class="col-lg-12"  >  
                    <div class="form-group" > 
                        <h6>เงื่อนไข</h6> 
                        <div class="form-group" > 
                            <div class="p-3" style="height: 110px;overflow: auto;border: 1px solid #0292d8;border-radius: .25rem;">
                                <?PHP echo $condition[0]['condition_detail']?> 
                            </div>
                        </div>
                        <div class="form-group" align="center"> 
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="confirm">
                                <label class="form-check-label" for="confirm">
                                ยอมรับเงื่อนไข
                                </label>
                            </div> 
                        </div> 
                    </div>  
                </div>   
                <div class="col-lg-12"  align="center" >  
                    <div class="form-group">
                        <input type="hidden" id="member_type_id" name="member_type_id" value="<?PHP echo $_POST['member_type_id'];?>" > 
                        <button class="btn btn-login my-2 my-sm-0 m-1" type="button" onclick="borrower_add();" >สมัครสมาชิก</button>  
                    </div>  
                </div>       
            </div>     
            
        <hr class="hr-text" data-content="หรือ">  
        <div class="row justify-content-center"> 
            <button class="btn btn-login my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#loageModal">facebook</button>  
        </div> 
    </div>
<?PHP }?> 
<?PHP if($_POST['member_type_id']==2){ ?>
    <div id="lender" class="modal-body p-5" >
        <div class="row justify-content-center">   
            <img  src="template/images/logo.png" height="50px" alt="">      
        </div>     
        <div class="row justify-content-center" style="border-color:green;">
            <h4>สมัครสมาชิก - ผู้ปล่อยกู้</h4>   
        </div>    
        <form role="form" id="lender_form" method="post" onsubmit="return lender_check();" action="index.php?content=register&action=add" enctype="multipart/form-data">       
            <div class="row justify-content-center">
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>ประเภทผู้ปล่อยกู้</h6>     
                        <select  class="form-control " id="member_loan_type_id" name="member_loan_type_id" onchange="" style="border-color: #fe9102;"> 
                            <option  value="">บุคคลธรรมดา / นายทุนทั่วไป</option> 
                            <option  value="">ธนาคาร</option> 
                            <option  value="">บริษัท / นิติบุคคล</option> 
                        </select>   
                    </div>
                </div>   
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>ประเภทการปล่อยกู้</h6>      
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            โฉนดแลกเงิน
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                            พิโกไฟแนนซ์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                            นาโนไฟแนนซ์
                            </label>
                        </div> 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                            <label class="form-check-label" for="defaultCheck4">
                            หลักประกันทางธุรกิจ
                            </label>
                        </div> 
                    </div>
                </div>   
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>ชื่อ</h6>
                        <input id="member_name" name="member_name" class="form-control" style="border-color: #fe9102;">   
                    </div>       
                </div>       
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>พื้นที่ให้บริการ</h6>
                        <input id="member_address" name="member_address" placeholder="พื้นที่ให้บริการ" class="form-control" style="border-color: #fe9102;">   
                    </div>    
                </div>    
                <div class="col-lg-6"  align="left" >  
                    <div class="form-group">
                        <select  class="form-control select amphur" id="amphur_id" name="amphur_id" onchange="" style="border-color: #fe9102;">  
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
                        <select  class="form-control select province" id="province_id" name="province_id" onchange="" style="border-color: #fe9102;">  
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
        
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>เบอร์โทร</h6>
                        <input id="member_tel" name="member_tel" class="form-control" style="border-color: #fe9102;">   
                    </div>  
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>อีเมล</h6>
                        <input id="member_email" name="member_email" class="form-control" style="border-color: #fe9102;">   
                    </div>  
                </div>  
                <div class="col-lg-12"  align="left" > 
                    <div class="form-group">
                        <h6>รหัสผ่าน</h6>
                        <input id="member_password" name="member_password" class="form-control" style="border-color: #fe9102;">   
                    </div>     
                </div>     
                <div class="col-lg-12"  align="center" >  
                    <div class="form-group">
                        <input type="hidden" id="member_type_id" name="member_type_id" value="<?PHP echo $_POST['member_type_id'];?>" >   
                        <button class="btn btn-register my-2 my-sm-0 m-1" type="button"  style=" " >สมัครสมาชิก</button>   
                    </div>  
                </div>  
            </div>     
        </form>  
    </div>
<?PHP }?>

 