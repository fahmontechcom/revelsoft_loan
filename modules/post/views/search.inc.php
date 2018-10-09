<?php
  $sub_menu = 'index.php?content=post&action=search';


  ?>
<style type="text/css">
    .select2-selection{
        border-color: #ff9000!important;
    }
    select{
        border-color: #ff9000!important;
    }
     
</style>
  <script>

    // function post_building_check(id){
    //     if(id.checked){
    //         id.checked =false;
    //     }else{
    //         id.checked =true;
    //     } 
    // }
    function sorting_money(id){
        $(id).closest("form").submit();
    }
    
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
  </script>
<form role="form" method="post" onsubmit="" action="index.php?content=post&loan_type_id=<?=$loan_type_id?>" enctype="multipart/form-data">
 
    <div class="container pb-3"> 
        <div class="row pt-3 justify-content-center">
            <h3 class="lender_text_color"><b>อยากปล่อยกู้</b></h3> 
        </div>
        <div class="row  pt-3" > 
            
            <ul class="nav nav-tabs" style="width:100%">
                <li class="nav-item">
                    <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type_id=='1'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type_id=1"><img src="template/images/loan_type_1.png" height="20px" alt=""> โฉนดแลกเงิน</a>
                </li>
                <li class="nav-item">
                    <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type_id=='2'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type_id=2"><img src="template/images/loan_type_2.png" height="20px" alt=""> พิโกไฟแนนซ์</a>
                </li> 
                <li class="nav-item">
                    <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type_id=='3'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type_id=3"><img src="template/images/loan_type_3.png" width="20px" alt=""> นาโนไฟแนนซ์</a>
                </li> 
                <li class="nav-item">
                    <a style="color: #495057;!important" class="nav-link <?PHP if($loan_type_id=='4'){ echo 'active';}?>" href="<?PHP echo $sub_menu;?>&loan_type_id=4"><img src="template/images/loan_type_4.png" height="20px" alt=""> หลักประกันทางธุรกิจ</a>
                </li> 
            </ul>
                    
        </div> 
        <div class="row justify-content-center post_form">
            <div class="col-sm-9">
                <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center ">   
                    <div class="col-xl-12"  align="left" > 
                        <h6><b>ที่อยู่</b> </h6>  
                        <div class="pl-2"> 
                            <div class="form-group">  
                                <select  class="form-control select " id="amphur_id"  name="amphur_id" onchange="" > 
                                    <option></option>  
                                    <option value="all">ทั้งหมด</option>
                                    <?php 
                                    for($i =  0 ; $i < count($amphur) ; $i++){
                                    ?>
                                    <option <?PHP if( $amphur[$i]['amphur_id']==$_POST['amphur_id']){echo 'selected';}?> value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option> 
                                    <?
                                    }
                                    ?>
                                </select>    
                            </div> 
                            <div class="form-group">  
                                <select  class="form-control select " id="province_id" name="province_id" onchange="" >  
                                    <option></option>
                                    <option value="all">ทั้งหมด</option>
                                    <?php 
                                    for($i =  0 ; $i < count($province) ; $i++){
                                    ?>
                                    <option <?PHP if( $province[$i]['province_id']==$_POST['province_id']){echo 'selected';}?> value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                    <?
                                    }
                                    ?>
                                </select>    
                            </div>   
                        </div>    
                    </div>   
        
                    <?PHP if($loan_type_id==3){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <h6><b>อาชีพ</b> </h6>  
                            <div class="pl-2"> 
                                <div class="form-group">  
                                    <select  class="form-control select " id="occupation_id"  name="occupation_id" onchange="" > 
                                        <option></option>  
                                        <option value="all">ทั้งหมด</option>
                                        <?php 
                                            for($i =  0 ; $i < count($occupation) ; $i++){
                                            ?>
                                            <option <?PHP if( $occupation[$i]['occupation_id']==$_POST['occupation_id']){echo 'selected';}?> value="<?php echo $occupation[$i]['occupation_id']; ?>"><?php echo $occupation[$i]['occupation_name']; ?></option> 
                                            <?
                                            }
                                        ?>
                                        <option value="0">ฯลฯ</option> 
                                    </select>    
                                </div>  
                            </div>    
                        </div>  
                    <?PHP }?> 
                    <?PHP if($loan_type_id==4){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <h6><b>ทรัพย์หลักประกัน</b> </h6>  
                            <div class="pl-2"> 
                                <div class="form-group">  
                                    <select  class="form-control select " id="collateral_id"  name="collateral_id" onchange="" > 
                                    <option></option>  
                                    <option value="all">ทั้งหมด</option>
                                        <?php 
                                            for($i =  0 ; $i < count($collateral) ; $i++){
                                            ?>
                                            <option <?PHP if( $collateral[$i]['collateral_id']==$_POST['collateral_id']){echo 'selected';}?> value="<?php echo $collateral[$i]['collateral_id']; ?>"><?php echo $collateral[$i]['collateral_name']; ?></option> 
                                            <?
                                            }
                                        ?>
                                        <option value="0">อื่น ๆ </option> 
                                    </select>    
                                </div>  
                            </div>    
                        </div>  
                    <?PHP }?> 
        
                    <?PHP if($loan_type_id==1||$loan_type_id==2){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>ลักษณะที่</b></h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="post_building" id="post_building0" value="all" <?PHP if($_POST['post_building']=="all"||$_POST['post_building']==""){echo 'checked';}?> >
                                    <label class="form-check-label" for="post_building0">ทั้งหมด</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="post_building" id="post_building1" value="0" <?PHP if($_POST['post_building']=='0'){echo 'checked';}?> >
                                    <label class="form-check-label" for="post_building1">ที่ดินเปล่า</label>
                                </div>
                                <div class="form-inline "> 
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="post_building" id="post_building2" value="1" <?PHP if($_POST['post_building']=='1'){echo 'checked';}?>>
                                        <label class="form-check-label" for="post_building2">มีสิ่งปลูกสร้าง</label>
                                    </div>   
                                    <div class="pr-2"> 
                                        <div class="form-group">  
                                            <select  class="form-control select " id="building_id"  name="building_id" onchange="" >  
                                                <option value="all">ทั้งหมด</option> 
                                                <?php 
                                                    for($i =  0 ; $i < count($building) ; $i++){
                                                    ?>
                                                    <option <?PHP if($_POST['building_id']== $building[$i]['building_id']){echo 'selected';}?> value="<?php echo $building[$i]['building_id']; ?>"><?php echo $building[$i]['building_name']; ?></option>
                                                    <?
                                                    }
                                                ?>
                                            </select>    
                                        </div>   
                                    </div>      
                                </div> 
                            </div>    
                        </div>  
                    <?PHP }?> 
                    <?PHP if($loan_type_id==2){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>หลักประกัน/โฉนด</b></h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="post_deed" id="post_deed0" value="all" <?PHP if($_POST['post_deed']=="all"||$_POST['post_deed']==""){echo 'checked';}?> >
                                    <label class="form-check-label" for="post_deed0">ทั้งหมด</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="post_deed" id="post_deed1" value="0" <?PHP if($_POST['post_deed']=='0'){echo 'checked';}?> >
                                    <label class="form-check-label" for="post_deed1">ไม่มี</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="post_deed" id="post_deed2" value="1" <?PHP if($_POST['post_deed']=='1'){echo 'checked';}?> >
                                    <label class="form-check-label" for="post_deed2">มี</label>
                                </div>
                                
                            </div>    
                        </div>  
                    <?PHP }?> 
        
                    <div class="col-xl-12"  align="left" > 
                        <h6><b>เลือกวงเงิน</b> </h6>
                        <div class="form-group pl-2">  
                            <input type="number" id="post_money_start" name="post_money_start" class="form-control lender_border_color" value="<?PHP echo $_POST['post_money_start'];?>" placeholder="ตั้งแต่" style="max-width:100px;display:inline-block;"> <b>-</b>      
                            <input type="number" id="post_money_end" name="post_money_end" class="form-control lender_border_color" value="<?PHP echo $_POST['post_money_end'];?>"  placeholder="ถึง" style="max-width:100px;display:inline-block;">      
                        </div>   
                    </div>  
        
                    <?PHP if($loan_type_id==1){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>เลือกธุรกรรมที่ต้องการ</b></h6>
                                <div class="pl-2">
                                    <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="post_transaction_mortgage" name="post_transaction_mortgage" value="1" <?PHP if($_POST['post_transaction_mortgage']=='1'){ echo ' checked ';}?>  >
                                    <label class="form-check-label" for="post_transaction_mortgage">จำนอง</label>
                                    </div>
                                    <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="post_transaction_selling" name="post_transaction_selling" value="1"  <?PHP if($_POST['post_transaction_selling']=='1'){ echo ' checked ';}?>
                                    <label class="form-check-label" for="post_transaction_selling">ขายฝาก</label>
                                    </div>  
                                    <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" id="post_transaction_deposit" name="post_transaction_deposit" value="1" <?PHP if($_POST['post_transaction_deposit']=='1'){ echo ' checked ';} ?>
                                    <label class="form-check-label" for="post_transaction_deposit">ฝากโฉนด</label>
                                    </div>  
                                </div>
                            </div>    
                        </div>   
                    <?PHP }?>  
        
                    <?PHP if($loan_type_id==1){ ?>
                        <div class="col-xl-12"  align="left" > 
                            <div class="form-group"> 
                                <h6><b>ภาระของทรัพย์</b></h6>
                                <div class="pl-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id0" value="all" <?PHP if($_POST['burden_id']=="all"||($_POST['burden_id']=="")){echo 'checked';}?> >
                                        <label class="form-check-label" for="burden_id0">ทั้งหมด</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id1" value="0" <?PHP if($_POST['burden_id']=='0'){echo 'checked';}?> >
                                        <label class="form-check-label" for="burden_id1">ปลอดภาระ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="burden_id" id="burden_id2" value="1" <?PHP if($_POST['burden_id']=='1'){echo 'checked';}?> >
                                        <label class="form-check-label" for="burden_id2">ติดภาระ</label>
                                    </div> 
                                    
                                </div>
                                
                            </div>    
                        </div>    
                    <?PHP }?>  
                
                    <div class="col-xl-12"  align="center" >  
                        <div class="form-group">  
                            <input type="hidden" id="loan_type_id" name="loan_type_id" value="<?PHP echo $loan_type_id?>" >  
                            
                            <button class="btn btn-lender my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >ค้นหาเลย</button>  
                        </div>  
                    </div>   
                </div>    
                
            </div>
        </div>
            
    </div>  
     
</form>
