<script>
function check(){
    var post_problem_detail = document.getElementById("post_problem_detail").value;  
    
    post_problem_detail = $.trim(post_problem_detail);     
    

    if(post_problem_detail.length == 0){
        alert("กรุณากรอกรายละเอียด");
        document.getElementById("post_problem_detail").focus();
        return false; 
    }else{ 
        return true;    
    }
}
function post_que_ans_check(){
    var post_que_ans_question = document.getElementById("post_que_ans_question").value;  
    
    post_que_ans_question = $.trim(post_que_ans_question);     
    

    if(post_que_ans_question.length == 0){
        alert("กรุณากรอกรายละเอียด");
        document.getElementById("post_que_ans_question").focus();
        return false; 
    }else{ 
        return true;    
    }
}
$(document).on('ready', function() {
   
        $('[data-fancybox="gallery"]').fancybox({
        });
    });
</script> 
<div class="row m-0" style="background-color:#f6f6f6;" >
    <div class="col-lg-12 p-0">
        <div class="row m-2"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">
            <div class="w-100 p-5 m-2 d-flex justify-content-center"  style="background-color:#f6f6f6;">
                <h5 class="m-0">BANNER</h5> 
            </div>
        </div> 
    </div> 
    <div class="col-lg-4 p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="row ml-2 mr-2 mb-2  p-3"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;"> 
                    <div class="col-lg-12 d-flex justify-content-center pb-3">
                        <h5 class="m-0"><b>ข้อมูลผู้ลงประกาศ</b></h5>  
                    </div>
                    <div class="col-lg-12 pb-4">
                        <div class="row d-flex justify-content-center align-items-center"> 
                            <div style="width:8em;height:8em; border-radius: 50%!important;border: 0.2em solid white; overflow: hidden;"> 
                                <img id="member_profile_img_show" src="img_upload/member/<?php if($member['member_profile_img'] != "" ){echo $member['member_profile_img'];}else{ echo "default.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                            </div>  
                        </div>  
                    </div>  
                    <h5 class="col-lg-1 pb-2"><i class="fa fa-user" aria-hidden="true"></i></h5>   
                    <h5 class="col-lg-11 pb-2"><b><?PHP echo $member['member_name_show']?></b></h5>     
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-history" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2">เป็นสมาชิกมาแล้ว <?PHP echo $diff->y;?> ปี <?PHP echo $diff->m;?> เดือน</h6>     
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-clock-o" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2"><?php echo date_format(date_create($post['create_date']),"d/m/Y H.i");?> น.</h6>     
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-eye" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2">เยี่ยมชม <?php echo number_format($post['post_view'],0, '.', ','); ?> ครั้ง</h6>     
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-map-marker" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2"><?PHP echo $member['amphur_name']?>, <?PHP echo $member['province_name']?></h6>     
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-phone" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2"><?PHP echo $member['member_tel']?></h6>     
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="row ml-2 mr-2 mb-2  p-3"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">  
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-info-circle" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2">หมายเลขประกาศ : <?PHP echo $post['post_id']?></h6>   
                    <?PHP if($post['member_id']==$loan_member[0]['member_id']){?>  
                    <h6 class="col-lg-1 pb-2"><i class="fa fa-unlock" aria-hidden="true"></i></h6>   
                    <h6 class="col-lg-11 pb-2">รหัสปล่อยกู้ : <?PHP echo $post['post_finish_password']?></h6>  
                    <?PHP }?>     
                    <h6 class="col-lg-1 text-danger  m-0"><i class="fa fa-ban" aria-hidden="true" ></i></h6>   
                    
                    <h6 class="col-lg-11 m-0 "><a href="javascript:;"  data-toggle="modal" data-target="#post_problem" style="color: rgba(0,0,0,.9)!important;">แจ้งประกาศไม่เหมาะสม</a></h6>     
                </div> 
            </div> 
            <div class="col-lg-12">
                <div class="row ml-2 mr-2 mb-2 justify-content-center p-3"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;">  
                    <button class="btn btn-success"  data-toggle="modal" data-target="#post_finish">แจ้งเรื่องปล่อยกู้สำเร็จ</button> 
                </div> 
            </div> 
        </div>
    </div> 
    <div class="col-lg-8 p-0">
        
        <div class="row ml-0 mr-2 mb-2 pt-3 pb-3 pl-4 pr-4"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;"> 
            
            <div class="col-lg-12">
                <div class="row justify-content-end">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="index.php?content=post&action=update&post_id=<?PHP echo $post['post_id'];?>">แก้ไข</a>
                            <a class="dropdown-item" href="index.php?content=post&action=delete&post_id=<?PHP echo $post['post_id'];?>">ลบ</a> 
                        </div>
                    </div> 
                    <!-- <h5><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></h5>  -->
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <h5><b>รายละเอียดประกาศ</b></h5>
                    </div>
                    <div class="col-lg-10 p-2  ">
                    <?PHP if($post['loan_type_id']==1){ ?>
                        <div class="row">
                            
                            <div class="col-lg-5">
                                <div class="row">
                                    <h6 class="col-lg-6 pb-2"><b>หมวดหมู่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post['loan_type_name']?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>ลักษณะที่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP  
                                    if($post['post_building']==0){
                                        echo 'ที่ดินเปล่า';
                                    }else if($post['post_building']==1){
                                        echo 'มีสิ่งปลูกสร้าง ('.$post['building_name'].')';
                                    }
                                    $post['post_building']
                                    ?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>วงเงินที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php echo number_format($post['post_money'],0, '.', ','); ?> บาท</h6>
                                    <h6 class="col-lg-6 pb-2"><b>ธุรกรรมที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP
                                    if($post['post_transaction_mortgage']==1){
                                        echo 'จำนอง';
                                    }
                                    if($post['post_transaction_selling']==1){
                                        if($post['post_transaction_mortgage']==1){
                                            echo ',ขายฝาก';
                                        }else{
                                            echo 'ขายฝาก';
                                        } 
                                    }
                                    if($post['post_transaction_deposit']==1){
                                        if($post['post_transaction_mortgage']==1||$post['post_transaction_selling']==1){
                                            echo ',ฝากโฉนด';
                                        }else{
                                            echo 'ฝากโฉนด';
                                        }
                                        
                                    }
                                    ?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>ภาระของทรัพย์ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post['burden_name']?></h6> 
                                    <h6 class="col-lg-12"><big><i class="fa fa-map-marker borrower_text_color pr-2" aria-hidden="true"></i></big><?PHP echo $post['amphur_name']?>, <?PHP echo $post['province_name']?></h6>    
                                </div>
                            </div>
                            <div class="col-lg-7"> 
                                <h6 class=" pb-2"><b>ข้อมูลเพิ่มเติม : </b><?PHP echo $post['post_description'];?></h6>  
                            </div>
                        </div>
                    <?PHP }?>
                    <?PHP if($post['loan_type_id']==2){ ?>
                        <div class="row">
                            
                            <div class="col-lg-5">
                                <div class="row"> 
                                    <h6 class="col-lg-6 pb-2"><b>หมวดหมู่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post['loan_type_name']?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>วงเงินที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php echo number_format($post['post_money'],0, '.', ','); ?> บาท</h6>
                                    <h6 class="col-lg-6 pb-2"><b>หลักประกัน/โฉนด :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP  
                                    if($post['post_deed']==0){
                                        echo 'ไม่มี';
                                    }else if($post['post_deed']==1){
                                        echo 'มี (เลขที่โฉนด: '.$post['post_deed_number'].')';
                                    }
                                    $post['post_building']
                                    ?></h6>  
                                    <h6 class="col-lg-12"><big><i class="fa fa-map-marker borrower_text_color pr-2" aria-hidden="true"></i></big><?PHP echo $post['amphur_name']?>, <?PHP echo $post['province_name']?></h6>            
                                    <h6 class="col-lg-6 pb-2"><b>ลักษณะที่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP  
                                    if($post['post_building']==0){
                                        echo 'ที่ดินเปล่า';
                                    }else if($post['post_building']==1){
                                        echo 'มีสิ่งปลูกสร้าง ('.$post['building_name'].')';
                                    }
                                    $post['post_building']
                                    ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-7"> 
                                <h6 class=" pb-2"><b>ข้อมูลเพิ่มเติม : </b><?PHP echo $post['post_description'];?></h6>  
                            </div>
                            <div class="col-lg-12"> 
                                <h6 class=""><b>โลเคชั่น  </b></h6> 
                                <fieldset class="gllpLatlonPicker" style="width:100%;">
                                    <div style="background-color: #fff; padding:1em; font-size: 1vw;" >
                                        <div id="contact_map" class="gllpMap" style="height:400px;">Google Maps</div>
                                    </div>
                                    <input type="text" class="gllpLongitude form-control" name="location_long" value="<?PHP echo '102.13487399999997'; ?>" hidden/>
                                    <input type="text" class="gllpLatitude form-control" name="location_lat" value="<?PHP echo '14.999515'; ?>" hidden/>
                                    <input type="hidden" class="gllpZoom" value="16"/>
                                </fieldset> 
                            </div>
                        </div>
                    <?PHP }?>
                    <?PHP if($post['loan_type_id']==3){ ?>
                        <div class="row">
                            
                            <div class="col-lg-5">
                                <div class="row"> 
                                    <h6 class="col-lg-6 pb-2"><b>หมวดหมู่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post['loan_type_name']?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>วงเงินที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php echo number_format($post['post_money'],0, '.', ','); ?> บาท</h6>  
                                    <h6 class="col-lg-6 pb-2"><b>อาชีพ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php echo $post['occupation_name'];?></h6>  
                                    <h6 class="col-lg-12"><big><i class="fa fa-map-marker borrower_text_color pr-2" aria-hidden="true"></i></big><?PHP echo $post['amphur_name']?>, <?PHP echo $post['province_name']?></h6>            
                                     
                                </div>
                            </div>
                            <div class="col-lg-7"> 
                                <h6 class=" pb-2"><b>ข้อมูลเพิ่มเติม : </b><?PHP echo $post['post_description'];?></h6>  
                            </div>
                             
                        </div>
                    <?PHP }?>
                    <?PHP if($post['loan_type_id']==4){ ?>
                        <div class="row">
                            
                            <div class="col-lg-5">
                                <div class="row"> 
                                    <h6 class="col-lg-6 pb-2"><b>หมวดหมู่ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?PHP echo $post['loan_type_name']?></h6>
                                    <h6 class="col-lg-6 pb-2"><b>ทรัพย์หลักประกัน :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php if($post['collateral_id']==0){echo $post['post_collateral_name'];}else if($post['collateral_id']!=''){echo $post['collateral_name'];} ?></h6>  
                                    <h6 class="col-lg-6 pb-2"><b>วงเงินที่ต้องการ :</b></h6>
                                    <h6 class="col-lg-6 pb-2"><?php echo number_format($post['post_money'],0, '.', ','); ?> บาท</h6>  
                                    <h6 class="col-lg-12"><big><i class="fa fa-map-marker borrower_text_color pr-2" aria-hidden="true"></i></big><?PHP echo $post['amphur_name']?>, <?PHP echo $post['province_name']?></h6>            
                                     
                                </div>
                            </div>
                            <div class="col-lg-7"> 
                                <h6 class=" pb-2"><b>ข้อมูลเพิ่มเติม : </b><?PHP echo $post['post_description'];?></h6>  
                            </div>
                             
                        </div>
                    <?PHP }?>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <?PHP
                    if($post['loan_type_id']==1||$post['loan_type_id']==2){
                    ?>
                    <div class="col-lg-11">
                        <h5><b>รูปภาพที่ดิน/บ้าน</b></h5>
                    </div>
                    
        
                    <div class="col-lg-12 ">
                        <div class="row">
                            <?PHP 
                            for($i=5;$i<=6;$i++){
                                if($post['post_img_'.$i]!==''){
                            ?> 
                            <div class="col-lg-4 p-2"  align="left" >  
                                <a  data-fancybox="gallery" href="img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>"> 
                                    <img  src="img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                
                                </a>
                            </div>  
                            <?PHP
                                }
                            }
                            ?>       
                        </div>  
                    </div> 
                    <?PHP   
                    }
                    ?>
                    <?PHP
                    if($post['loan_type_id']==3||$post['loan_type_id']==4){
                    ?>
                    <div class="col-lg-11">
                        <?PHP
                        if($post['loan_type_id']==3){
                        ?>
                        <h5><b>รูปภาพที่เกี่ยวข้องกับอาชีพ (หน้าร้าน, ทะเบียนการค้า, รถคู่ใจ, ฯลฯ)</b></h5>
                        <?PHP   
                        }
                        ?>
                        <?PHP
                        if($post['loan_type_id']==4){
                        ?>
                        <h5><b>รูปถ่ายทรัพย์หลักประกัน</b></h5>
                        <?PHP   
                        }
                        ?>
                    </div>
                    
                    <div class="col-lg-12 ">
                        <div class="row">
                        <?PHP 
                        for($i=1;$i<=6;$i++){
                            if($post['post_img_'.$i]!==''){
                        ?> 
                        <div class="col-lg-4 p-2"  align="left" >  
                            <a  data-fancybox="gallery" href="img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>"> 
                                <img   src="img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                
                            </a>
                        </div>  
                        <?PHP
                            }
                        }
                        ?> 
                                
                        </div>  
                    </div> 
                    <?PHP   
                    }
                    ?> 
                    
                </div>
            </div>
            
        </div> 
        <?PHP require_once("modules/post_que_ans/views/view.inc.php");?>
    </div>
</div>
<div class="modal fade" id="post_problem" tabindex="-1" role="dialog" aria-labelledby="post_problemLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">  
            <div class="modal-header" style="border-bottom:none;"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pl-4 pr-4 pb-4">
                            
                    <div class="row justify-content-center">
                        <h4>แจ้งประกาศไม่เหมาะสม</h4>   
                    </div>     
                    <form role="form" method="post" onsubmit="return check();" action="index.php?content=post_detail&action=add_problem" enctype="multipart/form-data">
                        <div class="row justify-content-center"> 
                            <div class="col-lg-12"  align="center" >
                                <div class="form-group"> 
                                    <textarea rows="5" id="post_problem_detail" name="post_problem_detail" class="form-control" placeholder="รายละเอียด..." style=""></textarea>
                                </div> 
                                <input type="hidden" name="post_id"  value="<?PHP echo $post['post_id'];?>"> 
                                <input type="hidden" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                                <button class="btn btn-lender my-2 my-sm-0 m-1" type="submit" >ส่ง</button>   
                            </div>  
                        </div>     
                    </form>   
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="post_finish" tabindex="-1" role="dialog" aria-labelledby="post_finishLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">  
            <div class="modal-header" style="border-bottom:none;"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pl-4 pr-4 pb-4">
                            
                    <div class="row justify-content-center">
                        <h4>แจ้งเรื่องปล่อยกู้สำเร็จ</h4>   
                    </div>  
                    <div class="row justify-content-center form-inline">  
                        <h6 class=" p-2"><i class="fa fa-user" aria-hidden="true"></i></h6>   
                        <h6 class=" p-2"><b><?PHP echo $member['member_name_show']?></b></h6>  
                
                        <h6 class=" p-2"><i class="fa fa-info-circle" aria-hidden="true"></i></h6>   
                        <h6 class=" p-2">หมายเลขประกาศ : <?PHP echo $post['post_id']?></h6>    
                    </div>      
                      
                    <form role="form" method="post" onsubmit="return check();" action="index.php?content=post_detail&action=add_problem" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-lg-12 p-2"   >
                                <h6 class="p-1">รหัสผ่านแจ้งเรื่องปล่อยกู้สำเร็จ 4 หลัก</h6> 
                                <div class="form-inline pl-2 pr-2"> 
                                    <input type="text" class="form-control m-1" id="" name="" style="width:40px;">
                                    <input type="text" class="form-control m-1" id="" name="" style="width:40px;">
                                    <input type="text" class="form-control m-1" id="" name="" style="width:40px;">
                                    <input type="text" class="form-control m-1" id="" name="" style="width:40px;">
                                </div> 
                                 
                            </div>  
                            <div class="col-lg-12 p-2"   >
                                <h6 class="p-1">จำนวนเงินให้กู้</h6> 
                                <div class="form-inline pl-2 pr-2"> 
                                    <input type="text" class="form-control " id="" name=""  > 
                                </div>  
                            </div>  
                            <div class="col-lg-12 p-2"   >
                                <h6 class="p-1">รายละเอียด</h6> 
                                <div class="form-group pl-2 pr-2"> 
                                    <input type="text" class="form-control " id="" name=""  > 
                                </div>  
                            </div>  
                            <div class="col-lg-12"   >
                                <div class="row  justify-content-center">
                                    <input type="hidden" name="post_id"  value="<?PHP echo $post['post_id'];?>"> 
                                    <input type="hidden" name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                                    <button class="btn btn-success my-2 my-sm-0 m-1 " type="submit" >แจ้งเรื่องปล่อยกู้สำเร็จ</button> 
                                </div>
                            </div> 
                             
                        </div>     
                    </form>   
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<script src="template/map/js/jquery-gmaps-latlon-picker.js"></script> 