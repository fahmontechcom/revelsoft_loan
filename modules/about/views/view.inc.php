<!-- <div  style="background-image: url('template/images/bg.jpg'); background-repeat: no-repeat; background-size: 100% 100%;"> -->
<!-- <div class="row"  > -->

  <div class="row mg-0  d-flex align-items-center" >
    <div class="col-md-1 icon-social-top" style=""> 
        <div class="icon-social-top-pd" style="">
          <i class="fa fa-facebook-square" aria-hidden="true"></i>
        </div>
        <div class="icon-social-top-pd" style="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </div>
        <div class="icon-social-top-pd" style="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </div> 
    </div>
    <div class="col-md-11 pd-0 mg-0">
      <div class="row pd-0 mg-0">  
        <div class="col-lg-12 pd-0 mg-0" style=""> 
          
          <img id="about_main_slide" class="img-fluid" src="<?PHP if($about[0]['about_image_1']!=''){ echo 'img_upload/about/'.$about[0]['about_image_1'];}else{ echo 'template/images/slide_1.jpg';}?>" alt="" style="">
          <div id="about_main_slide_text" class="text-slide" style="">   
            <div class="col-12 d-flex  " style="justify-self: center;">
              <div class="d-flex align-items-end flex-column " style="display: block !important; letter-spacing: 0.1em; margin-left:  auto;">
                <div class="topic-big" align="center" style="letter-spacing: 0.2em;">MITTRAPAP</div> 
                <div align="center">PRINTING</div>   
              </div>
            </div> 
          </div>  
        </div> 
      </div>
    </div> 
  </div> 
  <div class="row  d-flex align-items-start about-content-1">
    <div class="col-lg-6" style="">
      <div class="d-flex align-items-end justify-content-center flex-column topic-big content-1-topic" style = "">
        <div align="right"><?PHP echo $about[0]['about_con_1_title'];?></div>  
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="col-lg-9 offset-lg-1 d-flex align-items-start flex-column" style = "color:white;">
          <p class="detail"><?PHP echo $about[0]['about_con_1_description_1'];?></p>
          <p class="detail"><?PHP echo $about[0]['about_con_1_description_2'];?></p>
          
        </div> 
      </div>
    </div>

  </div> 
  <!--///////////////////////////////////////////START VISION//////////////////////////////////////////////////-->
  <div class="col-lg-6  ">
  <div class="row d-flex  justify-content-end  vision"   style=""> 
    <div class="vision-content d-flex justify-content-center align-items-center" style="">  
      <div class="row vision-item  d-flex align-items-center" style=" word-wrap: break-word;">
        <div class="col-12 d-flex  " style="justify-self: center;">
          <div class="d-flex align-items-end flex-column topic" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
            <div align="right"><?PHP echo $about[0]['about_con_2_title'];?></div>  
          </div>
        </div> 
        <div class="col-12 promotion-slide-item">
          <p class="detail" style="text-align:left;"><?PHP echo $about[0]['about_con_2_description_1'];?></p> 
        </div> 
      </div> 
    </div>    
  </div>
</div>  
<!--///////////////////////////////////////////END VISION//////////////////////////////////////////////////-->
<!--///////////////////////////////////////////START FACTORY//////////////////////////////////////////////////-->
<div class="row mg-0 factory d-flex align-items-center" style=""> 
  <div class="col-lg-5 offset-lg-7  justify-content-start">
    <div class="col-lg-12" style=" ">
      <div class="col-12 d-flex factory-topic" style="">
        <div class="d-flex align-items-end flex-column topic" style="display: block !important;line-height: 100%;letter-spacing: 0.1em;">
          <div align="right"><?PHP echo $about[0]['about_con_3_title'];?></div>   
        </div>
      </div> 
      <p class="detail" style=""><?PHP echo $about[0]['about_con_3_description_1'];?></p> 
      <p class="detail" style=""><?PHP echo $about[0]['about_con_3_description_2'];?></p>   
    </div> 
  </div> 
</div> 

<div class="col-lg-7 offset-lg-5 factory-slide" style="  ">
  <section class="regular slider">  
    <?PHP for($i=0;$i<count($about_slide);$i++){?>
      <div>
        <img src="img_upload/about/<?PHP echo $about_slide[$i]['about_slide_image'];?>"  >
      </div> 
    <?PHP }?>
  </section> 
</div>
<!--///////////////////////////////////////////END FACTORY//////////////////////////////////////////////////-->

 
 
<!-- </div> -->

<script> 
</script> 