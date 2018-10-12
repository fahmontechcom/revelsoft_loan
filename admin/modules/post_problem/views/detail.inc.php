 

<div class="row">
    <div class="col-lg-6">
        <h1>รายละเอียดแจ้งประกาศไม่เหมาะสม</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div> 
</div> 
 
<div class="row " style=" " >
    
    <div class="col-lg-12  ">
        
        <div class="row " > 
            <div class="col-lg-12"> 
                <div class="row justify-content-center"> 
                    <div class="col-lg-11 p-2  ">
                    <p><h6 ><b>รายละเอียดการแจ้ง : </b><?PHP echo $post_problem['post_problem_detail']?></h6> </p>
                    
                    </div>
                </div>
            </div> 
            <div class="col-lg-12">  
                <hr> 
            </div>  
            <div class="col-lg-12"> 
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
                                    <img  src="../img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                                
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
                    if($post['loan_type_id']==3){
                    ?>
                    <div class="col-lg-11">
                        <h5><b>รูปภาพที่เกี่ยวข้องกับอาชีพ (หน้าร้าน, ทะเบียนการค้า, รถคู่ใจ, ฯลฯ)</b></h5>
                    </div>
                    
                    <div class="col-lg-12 ">
                        <div class="row">
                        <?PHP 
                        for($i=1;$i<=6;$i++){
                            if($post['post_img_'.$i]!==''){
                        ?> 
                            <div class="col-lg-4 p-2"  align="left" >  
                                <img  src="../img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                            
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
                    if($post['loan_type_id']==4){
                    ?>
                    <div class="col-lg-11">
                        <h5><b>รูปถ่ายทรัพย์หลักประกัน</b></h5>
                    </div>
                    
                    <div class="col-lg-12 ">
                        <div class="row">
                        <?PHP 
                        for($i=1;$i<=6;$i++){
                            if($post['post_img_'.$i]!==''){
                        ?> 
                            <div class="col-lg-4 p-2"  align="left" >  
                                <img  src="../img_upload/post/<?php if($post['post_img_'.$i] != "" ){echo $post['post_img_'.$i];}else{ echo "default_pic.png"; }?>" class="img-fluid" alt="" align="left" style=""> 
                            
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
        
 
    </div>
</div> 
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<script src="../template/map/js/jquery-gmaps-latlon-picker.js"></script> 