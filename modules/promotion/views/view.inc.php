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
                <div class="detail" align="center">PRINTING</div>   
              </div>
            </div> 
          </div>  
        </div> 
      </div>
    </div> 
  </div>    

   <?php 
  for($i = 0;$i<count($promotion);$i++){
  ?>
  <div class="row d-flex <?PHP if($i>0){echo 'white';}?> <?PHP if($i%2==0){ echo 'flex-row-reverse';}else{echo 'flex-row';}?>  align-items-center  <?PHP echo 'item-'.($i+1);?>" style=" word-wrap: break-word;<?PHP if($i==2){ echo 'margin-top:7%';}?><?PHP if(count($promotion)==($i+1)&&$i!=3){ echo 'padding-bottom: 200px;';}?>">
    <div class="col-md-6 ">
      <img src="<?php  echo $target_dir.$promotion[$i]['promotion_image'];  ?>" class="img-fluid" align="middle">
    </div>
    <div class="col-md-6" style="">
      <div class="col-12 d-flex  " style="justify-self: center; margin: 3em 0">
        <div class="d-flex align-items-end flex-column topic-big" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
          <div align="right">MITTRAPAP<br>PROMOTION</div>  
        </div>
      </div> 

      <div class="row mg-0 d-flex align-items-center" style="padding-left:3em;padding-right:3em">
        <div class="col-12  ">
          <p class="detail" style="text-align:left;"><?PHP echo $promotion[$i]['promotion_description']; ?></p> 
        </div>  
        <?PHP if($i%2==0){?>
        <div class="col-12 d-flex justify-content-center" style="padding:5% 0;"> 
          <button type="button" class="btn btn-light topic-small" style="letter-spacing: 0.1em;" >CONTACT</button> 
        </div>  
        <div class="col-12  "  >
          <div class="d-flex align-items-end flex-column topic" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
            <div align="center" >หมดเขต<br>วว/ดด/ปปปป</div>  
          </div>
        </div> 
        <?PHP }else{?>
        <div class="col-12 d-flex  " style="padding:0 10%;">
          <div class="" style="  margin-right: auto;">
            <div align="center">
              <button type="button" class="btn btn-light topic-small" style="margin:17% 0;letter-spacing: 0.1em;">CONTACT</button> 
              <div  style=" line-height: 100%;letter-spacing: 0.1em;" class="topic" align="center">หมดเขต<br>วว/ดด/ปปปป</div>  
            </div>  
          </div>
        </div>
        <?PHP }?>
        
      </div>
      
    </div> 
  </div> 
  <?php
  }
  ?>

<!--  
  <?php 
  if($promotion[0]!=""){
  ?>
    <div class="row d-flex flex-row-reverse align-items-center item-1" style=" word-wrap: break-word;<?PHP if(count($promotion)==1){ echo 'padding-bottom: 200px;';}?>">
      <div class="col-md-6 ">
        <img src="<?php  echo $target_dir.$promotion[0]['promotion_image'];  ?>" class="img-fluid" align="middle">
      </div>
      <div class="col-md-6">
        <div class="col-12 d-flex  " style="justify-self: center; margin: 3em 0">
          <div class="d-flex align-items-end flex-column topic-big" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
            <div align="right">MITTRAPAP<br>PROMOTION</div>  
          </div>
        </div> 

        <div class="row mg-0 d-flex align-items-center" style="padding-left:3em;padding-right:3em">
          <div class="col-12  ">
            <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
            <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
          </div>  
          <div class="col-12 d-flex justify-content-center" style="padding:5% 0;"> 
            <button type="button" class="btn btn-light topic-small" style="letter-spacing: 0.1em;" >CONTACT</button> 
          </div>  
          <div class="col-12  "  >
            <div class="d-flex align-items-end flex-column topic" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
              <div align="center" >หมดเขต<br>วว/ดด/ปปปป</div>  
            </div>
          </div> 
        </div>
        
      </div> 
    </div> 
  <?php
  }
  ?> 
    <?php 
  if($promotion[1]!=""){
  ?>
  <div class="row d-flex flex-row align-items-center white item-2" style=" word-wrap: break-word;<?PHP if(count($promotion)==2){ echo 'padding-bottom: 200px;';}?>">
    <div class="col-md-6">
      <img src="<?php  echo $target_dir.$promotion[1]['promotion_image'];  ?>" class="img-fluid" align="middle">
    </div>
    <div class="col-md-6">
      <div class="col-12 d-flex  " style="justify-self: center; margin: 3em 0">
        <div class="d-flex align-items-end flex-column topic-big" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
          <div align="right"><?php  echo $promotion[1]['promotion_title'];  ?></div>  
        </div>
      </div> 

      <div class="row mg-0 d-flex align-items-center" style="padding:0 3em;">
        <div class="col-12  ">
          <p class="detail" style="text-align:left;"><?php  echo $promotion[1]['promotion_description'];  ?></p> 
            
        <div class="col-12 d-flex  " style="padding:0 10%;">
          <div class="" style="  margin-right: auto;">
            <div align="center">
              <button type="button" class="btn btn-light topic-small" style="margin:17% 0;letter-spacing: 0.1em;">CONTACT</button> 
              <div  style=" line-height: 100%;letter-spacing: 0.1em;" class="topic" align="center">หมดเขต<br>วว/ดด/ปปปป</div>  
          </div>  
          </div>
        </div>
      </div>
       
    </div>
  </div> 
  <?php
  }
  ?> 
  <?php 
  if($promotion[2]!=""){
  ?>
  <div class="row d-flex flex-row-reverse align-items-center white item-3" style=" word-wrap: break-word; margin-top:7%;<?PHP if(count($promotion)==3){ echo 'padding-bottom: 200px;';}?>">
    <div class="col-md-6">
      <img src="<?php  echo $target_dir.$promotion[2]['promotion_image'];  ?>" class="img-fluid" align="middle">
    </div>
    <div class="col-md-6">
      <div class="col-12 d-flex  " style="justify-self: center; margin: 3em 0">
        <div class="d-flex align-items-end flex-column topic-big" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
          <div align="right">MITTRAPAP<br>PROMOTION</div>  
        </div>
      </div> 

      <div class="row mg-0 d-flex align-items-center" style="padding-left:3em;padding-right:3em">
        <div class="col-12  ">
          <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
          <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
        </div>  
        <div class="col-12 d-flex justify-content-center" style="padding:5% 0;"> 
          <button type="button" class="btn btn-light topic-small" style="letter-spacing: 0.1em;" >CONTACT</button> 
        </div>  
        <div class="col-12  "  >
          <div class="d-flex align-items-end flex-column topic" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
            <div align="center" >หมดเขต<br>วว/ดด/ปปปป</div>  
          </div>
        </div> 
      </div>
       
    </div>
    
  </div> 
  <?php
  }
  ?> 
  <?php 
  if($promotion[3]!=""){
  ?>
  <div class="row d-flex flex-row align-items-center white item-4" style=" word-wrap: break-word;<?PHP if(count($promotion)==4){ echo 'padding-bottom: 200px;';}?> ">
    <div class="col-md-6">
      <img src="<?php  echo $target_dir.$promotion[3]['promotion_image'];  ?>" class="img-fluid" align="middle">
    </div>
    <div class="col-md-6">
      <div class="col-12 d-flex  " style="justify-self: center; margin: 3em 0">
        <div class="d-flex align-items-end flex-column topic-big" style="display: block !important;line-height: 100%;letter-spacing: 0.1em; margin: 0 auto;">
          <div align="right">MITTRAPAP<br>PROMOTION</div>  
        </div>
      </div> 

      <div class="row mg-0 d-flex align-items-center" style="padding:0 3em;">
        <div class="col-12  ">
          <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
          <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit</p> 
        </div>   
        <div class="col-12 d-flex  " style="padding:0 10%;">
          <div class="" style="  margin-right: auto;">
            <div align="center">
              <button type="button" class="btn btn-light topic-small" style="margin:17% 0;letter-spacing: 0.1em;">CONTACT</button> 
              <div  style=" line-height: 100%;letter-spacing: 0.1em;" class="topic" align="center">หมดเขต<br>วว/ดด/ปปปป</div>  
          </div>  
          </div>
        </div>
      </div>
       
    </div>
  </div> 
  <?php
  }
  ?>  -->
  