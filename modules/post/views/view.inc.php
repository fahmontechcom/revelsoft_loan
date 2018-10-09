<?php
  $sub_menu = 'index.php?content=post';


  ?>
  <style type="text/css">
    .select2-selection{
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
    <div class="row m-0" style="background-color:#f6f6f6;" >
        <div class="col-xl-4 p-0">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row ml-2 m-2 p-2"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;"> 
                        <div class="col-xl-12"> 
                            <div class="row pt-3 justify-content-center">
                                <h3 style="color: #0292d8;"><b>ค้นหาผู้กู้</b></h3> 
                            </div>
                            <div class="row  pt-3">
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
                        </div>
                        
                            <div class="col-xl-12">
                                <div class="row pl-4 pr-4 pt-5 pb-5 align-items-center post_form">  

                                
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
                                                            <select  class="form-control select " id="building_id"  name="building_id" onchange="" style="border-color: #ff9000!important;">  
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
                                            
                                            <button class="btn btn-login my-2 my-sm-0 m-1 pl-5 pr-5" type="submit" onclick="" >ค้นหาเลย</button>  
                                        </div>  
                                    </div>   
                                </div>  
                            </div>
                        
    
                    </div> 
                </div> 
            </div>
        </div> 
        <div class="col-xl-8 p-0">
            <div class="row m-2"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">
                <div class="w-100 p-5 m-2 d-flex justify-content-center"  style="background-color:#f6f6f6;">
                    <h5 class="m-0">BANNER</h5> 
                </div>
            </div> 
            <div class="row m-2 p-3"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">  
                <div class="mr-auto form-inline">
                    <h6 class="m-0">จำนวนการกู้ทั้งหมด <?PHP echo number_format(count($post),0, '.', ',');?> รายการ</h6> 
                </div>
                <div class="form-inline">
                    <h6 class="m-0 pr-1">เรียงโดย : </h6> 
                    <select  class="form-control select borrower_border_color" id="sort_money" onchange="sorting_money(this);" name="sort_money"   >  
                        <option <?PHP if($_POST['sort_money']==1){echo 'selected';}?> value="1">จากวงเงินมากไปน้อย</option>  
                        <option <?PHP if($_POST['sort_money']==2){echo 'selected';}?> value="2">จากวงเงินน้อยไปมาก</option>  
                    </select>    
                </div> 
            </div>
            <div class="row m-2 "  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">  
            <?PHP for($i=0;$i<count($post);$i++){
                ?>
                <div class="col-xl-12 p-0">
                    <div class="row m-2"  style="border: 1px solid rgba(0,0,0,.125);">
                        <?PHP if($post[$i]['loan_type_id']==1||$post[$i]['loan_type_id']==2){ ?>
                            <div class="col-xl-4 p-2 form-inline justify-content-center">
                                <div class="row align-items-center" style="height:250px!important;overflow:hidden;">
                                    <div class="col-xl-12">
                                        <img  src="img_upload/post/<?PHP 
                                        $check_pic=false;
                                        for($ii=5;$ii<=6&&$check_pic==false;$ii++){
                                            if($post[$i]['post_img_'.$ii]!==''){
                                                echo $post[$i]['post_img_'.$ii];
                                                $check_pic=true;
                                            } 
                                        }
                                        if($check_pic==false){
                                            echo 'default_pic.png';
                                        }
                                        ?>" class="img-fluid" style=" " alt=""  style="">
                                    </div> 
                                </div>
                            </div>
                        <?PHP }?>  
                        <?PHP if($post[$i]['loan_type_id']==3||$post[$i]['loan_type_id']==4){ ?>
                            <div class="col-xl-4 p-2 form-inline justify-content-center">
                                <div class="row align-items-center" style="height:250px!important;overflow:hidden;">
                                    <div class="col-xl-12">
                                        <img  src="img_upload/post/<?PHP 
                                        $check_pic=false;
                                        for($ii=1;$ii<=6&&$check_pic==false;$ii++){
                                            if($post[$i]['post_img_'.$ii]!==''){
                                                echo $post[$i]['post_img_'.$ii];
                                                $check_pic=true;
                                            } 
                                        }
                                        if($check_pic==false){
                                            echo 'default_pic.png';
                                        }
                                        ?>" class="img-fluid" style=" " alt=""  style="">
                                    </div>
                                </div>
                                
                            </div>
                        <?PHP }?>  
                        <div class="col-xl-4 p-2 form-inline"> 
                            <div class="row">
                                <h6 class="col-lg-6 pb-2"><b>หมวดหมู่ :</b></h6>
                                <h6 class="col-lg-6 pb-2"><?PHP echo $post[$i]['loan_type_name']?></h6>
                                <?PHP if($post[$i]['loan_type_id']==1||$post[$i]['loan_type_id']==2){ ?>
                                    <h6 class="col-lg-6 pb-2"><b>ลักษณะที่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP  
                                    if($post[$i]['post_building']==0){
                                        echo 'ที่ดินเปล่า';
                                    }else if($post[$i]['post_building']==1){
                                        echo 'มีสิ่งปลูกสร้าง ('.$post[$i]['building_name'].')';
                                    }
                                    $post[$i]['post_building']
                                    ?></h6>
                                <?PHP }?>
                                <?PHP if($post[$i]['loan_type_id']==2){ ?>
                                    <h6 class="col-lg-6 pb-2"><b>หลักประกัน/โฉนด :</b></h6>
                                        <h6 class="col-lg-6 pb-2"><?PHP  
                                        if($post[$i]['post_deed']==0){
                                            echo 'ไม่มี';
                                        }else if($post[$i]['post_deed']==1){
                                            echo 'มี (เลขที่โฉนด: '.$post['post_deed_number'].')';
                                        }
                                        $post['post_building']
                                        ?></h6>
                                <?PHP }?>
                                <h6 class="col-lg-6 pb-2"><b>วงเงินที่ต้องการ :</b></h6>
                                <h6 class="col-lg-6 pb-2"><?php echo number_format($post[$i]['post_money'],0, '.', ','); ?> บาท</h6>

                                <?PHP if($post[$i]['loan_type_id']==4){ ?>
                                    <h6 class="col-lg-6 pb-2"><b>ทรัพย์หลักประกัน :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php if($post[$i]['collateral_id']==0){echo $post[$i]['post_collateral_name'];}else if($post[$i]['collateral_id']!=''){echo $post[$i]['collateral_name'];} ?></h6>
                                <?PHP }?>

                                <?PHP if($post[$i]['loan_type_id']==3){ ?>
                                    <h6 class="col-lg-6 pb-2"><b>อาชีพ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post[$i]['occupation_name']?></h6>
                                <?PHP }?>

                                <?PHP if($post[$i]['loan_type_id']==1){ ?>
                                    <h6 class="col-lg-6 pb-2"><b>ธุรกรรมที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP
                                    if($post[$i]['post_transaction_mortgage']==1){
                                        echo 'จำนอง';
                                    }
                                    if($post[$i]['post_transaction_selling']==1){
                                        if($post[$i]['post_transaction_mortgage']==1){
                                            echo ',ขายฝาก';
                                        }else{
                                            echo 'ขายฝาก';
                                        } 
                                    }
                                    if($post[$i]['post_transaction_deposit']==1){
                                        if($post[$i]['post_transaction_mortgage']==1||$post[$i]['post_transaction_selling']==1){
                                            echo ',ฝากโฉนด';
                                        }else{
                                            echo 'ฝากโฉนด';
                                        }
                                        
                                    }
                                    ?></h6>
                                <?PHP }?>

                                <?PHP if($post[$i]['loan_type_id']==1){ ?>
                                <h6 class="col-lg-6 pb-2"><b>ภาระของทรัพย์ :</b></h6> 
                                <h6 class="col-lg-6 pb-2"><?PHP echo $post[$i]['burden_name']?></h6> 
                                <?PHP }?>

                                <h6 class="col-lg-12"><big><i class="fa fa-map-marker borrower_text_color pr-2" aria-hidden="true"></i></big><?PHP echo $post[$i]['amphur_name']?>, <?PHP echo $post[$i]['province_name']?></h6>    
                            </div>
                        </div>
                        <div class="col-xl-4 p-2 d-flex align-items-center justify-content-center">
                            <div class="row"> 
                                <div class="col-xl-12 form-inline justify-content-center">
                                    <div style="width:8em;height:8em; border-radius: 50%!important;border: 0.2em solid white; overflow: hidden;"> 
                                        <img  src="img_upload/member/<?php if($post[$i]['member_profile_img'] != "" ){echo $post[$i]['member_profile_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                    </div> 
                                    <div class="pl-2"> 
                                        <h5 ><?PHP echo $post[$i]['member_name_show']?></h5>  
                                        <h6 ><i class="fa fa-eye" aria-hidden="true"></i>???? ครั้ง</h6> 
                                        <?PHP if($post[$i]['member_verified_status']==2){?>
                                        <h3 class="m-0" ><i class="fa fa-check-circle text-success" aria-hidden="true"></i></h6>  
                                        <?PHP }?>
                                    </div> 
                                </div> 
                                <div class="col-xl-12 d-flex justify-content-center m-3">
                                    <a class="btn btn-borrower text-white" href="index.php?content=post_detail&post_id=<?PHP echo $post[$i]['post_id'];?>"><h5 class="m-0">ดูรายละเอียด</h5></a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <?PHP
            }?>
                
            </div>
        </div>   
    </div>
</form>
