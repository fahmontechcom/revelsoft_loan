<!-- <div  style="background-image: url('template/images/bg.jpg'); background-repeat: no-repeat; background-size: 100% 100%;"> -->
<!-- <div class="row"  > -->
<script>
function home_slide_onclick(home_slide_image){ 
  document.getElementById("home_main_slide").src =home_slide_image;  
  // console.log(home_main_slide);
}

</script>

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
          <img id="home_main_slide" class="img-fluid" src="<?PHP if($home_slide[0]['home_slide_image']!=''){ echo 'img_upload/home/'.$home_slide[0]['home_slide_image'];}else{ echo 'template/images/slide_1.jpg';}?>" alt="" style="">
          <div class="text-slide" style=""> 
            <p>
              <span class="topic-big" style = "letter-spacing: 0.2em;">MITTRAPAP</span><br>
              <span class="view-more" style = "">PRINTING</span> 
            </p>
          </div> 
          <div class="col-lg-6 small-slide" style="">
            <section class="regular slider" >
              
              <?PHP for($i=0;$i<count($home_slide);$i++){?>
              <div>
                <img src="img_upload/home/<?PHP echo $home_slide[$i]['home_slide_image'];?>" onclick="home_slide_onclick('img_upload/home/<?PHP echo $home_slide[$i]['home_slide_image'];?>');">
              </div> 
              <?PHP }?>
            </section>
          </div> 
        </div> 
      </div>
    </div> 
  </div>
  <div class="row mg-0 content-1 d-flex align-items-center" style="">
    <div class="row  d-flex align-items-start">
      <div class="col-lg-6 col-md-5 col-sm-3">
        <div class="d-flex align-items-end flex-column topic" style = "color:white;align:right;letter-spacing: 0.1em;">
          <span>MITTRAPAP</span> 
          <span>PRINTING</span> 
          <span>1995</span>  
          <div class="" style="width:50px;"><hr style="background-color:white;height:3px; "></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-7  col-sm-9">
        <div class="col-lg-9 offset-lg-1 d-flex align-items-start flex-column" style = "color:white;">
          <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit </p>
          <p class="view-more">VIEW&nbsp;MORE&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
        </div> 
      </div>
    </div>
  </div>
  <div class="row mg-0 content-2 d-flex align-items-center" style="">
    <div class="col-lg-5 offset-lg-1 col-md-4 offset-md-1 col-sm-3 d-flex align-items-end flex-column"> 
      <div class="col-lg-10 offset-md-2 col-md-11 offset-md-1  "> 
        <img src="template/images/about.jpg" alt=""  class="img-fluid content-2-img"  style=" "> 
      </div>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-9 justify-content-start">
      <div class="col-lg-9 offset-lg-1 d-flex align-items-start flex-column" style="">
        <p class="topic-big"><span class="topic">มาตรฐาน</span>  </p> 
        <p class="topic mg-topic" style=""> 
        <span class="topic-big">มิตรภาพ</span><span>การพิมพ์</span></p> 
        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit </p> 
      </div> 
    </div>
  </div>
  <div class="row mg-0 content-3 d-flex align-items-center" style=""> 
    <div class="col-lg-5 offset-lg-7 col-md-7 offset-md-5 col-sm-9 offset-sm-3 justify-content-start">
      <div class="col-lg-12" style = " ">
        <p class="topic content-3-topic-mg" style=" "><span>งานของ</span><span class="topic-big">เรา</span></p> 
        <p class="topic mg-topic content-3-topic-mg" style=" ">
        <span class="topic-big">มิตรภาพ</span><span>การพิมพ์</span></p> 
        <p class="detail content-3-detail-mg" style=" ">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit  
        </p> 
        <p class="detail content-3-detail-mg" style=" ">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit  
        </p>   
      </div> 
    </div>
  </div> 
  <!--///////////////////////////////////////////START PRODUCT//////////////////////////////////////////////////-->
  <div class="row content-4" align="center" style=""> 
    <div class="mr-auto ml-auto product-content" style=""> 
      <div style="display: table-cell; vertical-align: middle;color:white">  
        <div class="product-item text-right product-top-item" style="">
          <p class="topic-big "style=" "> 
             <span style="">PRODUCT</span> 
          </p> 
          <p class="topic-big "style=" " onclick="slide_left();" >  
             <i class="fa fa-caret-left content-4-left" aria-hidden="true" style=""></i>  
          </p> 
        </div>
        <div class="slide-item row  align-items-center justify-content-center product-item">
          <div class="slide-item-child col-sm-7 col-6 mg-0 pd-0 product-item-img"> 
            <img src="" class="img-fluid" align="middle">
          </div>
          <div class="slide-item-child col-sm-5 col-6 mg-0 pd-0 product-item-topic">
            <p class="topic"> 
              <span class="topic-big " ></span>  
            </p>
            <p class="topic product-topic-mt-top" style="">  
              <span >รับออกแบบ</span>  
            </p>
            <p class="topic product-topic-mt-top" style=""> 
              <span class="view-more" >CONTACT&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>  
            </p> 
          </div>
        </div>   
        <div class="slide-item row  align-items-center justify-content-center product-item">
          <div class="slide-item-child col-sm-7 col-6 mg-0 pd-0 product-item-img"> 
            <img src="" class="img-fluid" align="middle">
          </div>
          <div class="slide-item-child col-sm-5 col-6 mg-0 pd-0 product-item-topic">
            <p class="topic"> 
              <span class="topic-big " ></span>  
            </p>
            <p class="topic product-topic-mt-top" style="">  
              <span >รับออกแบบ</span>  
            </p>
            <p class="topic product-topic-mt-top" style=""> 
              <span class="view-more" >CONTACT&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>  
            </p> 
          </div>
        </div>   
        <div class="slide-item row  align-items-center justify-content-center product-item">
          <div class="slide-item-child col-sm-7 col-6 mg-0 pd-0 product-item-img"> 
            <img src="" class="img-fluid" align="middle">
          </div>
          <div class="slide-item-child col-sm-5 col-6 mg-0 pd-0 product-item-topic">
            <p class="topic"> 
              <span class="topic-big " ></span>  
            </p>
            <p class="topic product-topic-mt-top" style="">  
              <span >รับออกแบบ</span>  
            </p>
            <p class="topic product-topic-mt-top" style=""> 
              <span class="view-more" >CONTACT&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>  
            </p> 
          </div>
        </div>   
        <div class="slide-item row  align-items-center justify-content-center product-item">
          <div class="slide-item-child col-sm-7 col-6 mg-0 pd-0 product-item-img"> 
            <img src="" class="img-fluid" align="middle">
          </div>
          <div class="slide-item-child col-sm-5 col-6 mg-0 pd-0 product-item-topic">
            <p class="topic"> 
              <span class="topic-big " ></span>  
            </p>
            <p class="topic product-topic-mt-top" style="">  
              <span >รับออกแบบ</span>  
            </p>
            <p class="topic product-topic-mt-top" style=""> 
              <span class="view-more" >CONTACT&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>  
            </p> 
          </div>
        </div>    
        <div class="product-item" style="" >
          <p class="topic-big" onclick="slide_right();">  
             <i class="fa fa-caret-right" aria-hidden="true"></i>  
          </p> 
        </div>      
        <div class="product-item text-left" style="">
          <p class="topic">   
             <span   align="left">ดูสินค้าทั้งหมด</span>   
          </p> 
        </div>      
      </div>
    </div>   
  </div>  
  <script>
    $(document).ready(function(){
      product_move();
    });
    var product=[
      {
        title : 'ใบปลิว', 
        url : 'template/images/product_1.png', 
      },
      {
        title : 'หนังสือ', 
        url : 'template/images/product_2.png', 
      },
      {
        title : 'นามบัตร', 
        url : 'template/images/product_3.png', 
      },
      {
        title : 'ปฏิทิน', 
        url : 'template/images/product_1.png', 
      },
      {
        title : 'โปสเตอร์', 
        url : 'template/images/product_2.png', 
      },
      {
        title : 'แผ่นพับ', 
        url : 'template/images/product_3.png', 
      },
      {
        title : 'บิลเล่ม', 
        url : 'template/images/product_1.png', 
      },
        
    ];
    var index = 0;

    function animate_move() {
      $(".slide-item-child").hide('slow', function() {
        product_move();
      })
      // $(".slide-item-child").animate({ 
      //     opacity: 0,  
      //   }, 500 , function() {
      //   product_move();
      // }); 
      // $(".slide-item-child").animate({ 
      //     opacity: 1,  
      //   }, 500  ); 
      $(".slide-item-child").show('slow');
    }

    function product_move(){
      
      var item = $(".slide-item");
      for(i =0 ;i<item.length;i++){
        if(product[index+i]!=undefined){ 
          item[i].children[0].children[0].src = product[index+i].url;
          item[i].children[1].children[0].children[0].innerText = product[index+i].title; 
          item[i].children[1].children[1].innerText = 'รับออกแบบ'; 
          // item[i].style.height = '300px';
          // item[i].children[1].children[2].innerText = 'CONTACT '; 
        }else{
          item[i].children[0].children[0].src = '';
          item[i].children[1].children[0].children[0].innerText = ''; 
          item[i].children[1].children[1].innerText = ''; 
          item[i].children[1].children[2].innerText = ''; 
          item[i].children[1].children[2].innerText = ''; 
          // item[i].style.height = '0px';
          // item[i].removeChild(item[i].childNodes[0])
          // item[i].removeChild(item[i].childNodes[1])
        }
        // console.log(product[index+i].title); 
      }
      

      console.log(item); 
    }
    function slide_left(){
      if(index-4 >= 0){
        index-=4 ;
        animate_move();
        
      } 
    }
    function slide_right(){
      if(index+4 < product.length){
        index+=4 ;
        animate_move(); 
      } 
    }
  </script>
  <!--///////////////////////////////////////////END PRODUCT//////////////////////////////////////////////////-->
  <!--///////////////////////////////////////////START PROMOTION//////////////////////////////////////////////////-->
  <div class="row content-5" align="center" style=""> 
    <div class="promotion-content d-flex justify-content-center align-items-center" style="">  
        <div class="row promotion-item" style=" word-wrap: break-word;">
          <div class="col-12">
            <p class="topic"> 
              <span class="topic-big " >PROMOTION</span>  
            </p>
          </div>
          <div class="col-12 promotion-slide-item">
            <div class="row d-flex align-items-center">
              <div class="col-2" onclick="promotion_left();">
                <p class="topic p-mt-top" style="">  
                  <i class="fa fa-caret-left" aria-hidden="true"></i>  
                </p> 
              </div>
              <div class="col-8">
                <p class="topic p-mt-top" style="">  
                  <img src="template/images/product_1.png" alt="Smiley face" class="img-fluid" align="middle"> 
                </p> 
              </div> 
              <div class="col-2" onclick="promotion_right();">
                <p class="topic p-mt-top" style="">  
                  <i class="fa fa-caret-right" aria-hidden="true"></i> 
                </p> 
              </div>
            </div>
            
          </div>
          <div class="col-12 promotion-slide-item">
            <p class="topic-big p-mt-top" style="margin-bottom:0;"> 
              <span class=" " style="">TOPICS</span>  
            </p>
          </div>
          <div class="col-12 promotion-slide-item">
            <p class="detail" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit </p> 
          </div> 
        </div>     
    </div>   
  </div> 
  <script>
    $(document).ready(function(){
      promotion_move();
    });
    var promotion=[
      {
        title : 'ใบปลิว', 
        detail : 'ใบปลิว Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_1.png', 
      },
      {
        title : 'หนังสือ', 
        detail : 'หนังสือ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_2.png', 
      },
      {
        title : 'นามบัตร', 
        detail : 'นามบัตร Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_3.png', 
      },
      {
        title : 'ปฏิทิน', 
        detail : 'ปฏิทิน Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_1.png', 
      },
      {
        title : 'โปสเตอร์', 
        detail : 'โปสเตอร์ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_2.png', 
      },
      {
        title : 'แผ่นพับ', 
        detail : 'แผ่นพับ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_3.png', 
      },
      {
        title : 'บิลเล่ม', 
        detail : 'บิลเล่ม Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_1.png', 
      },
        
    ];
    var promotion_index = 0;

    function animate_promotion_move() {
      $(".promotion-slide-item").hide('slow', function() {
        promotion_move();
      });
      // $(".promotion-slide-item-child").animate({ 
      //     opacity: 0,  
      //   }, 500 , function() {
      //   promotion_move();
      // }); 
      // $(".promotion-slide-item-child").animate({ 
      //     opacity: 1,  
      //   }, 500  ); 
      $(".promotion-slide-item").show('slow');
    }

    function promotion_move(){
      
      var promotion_item = $(".promotion-slide-item"); 
        if(promotion[promotion_index]!=undefined){ 
          promotion_item[0].children[0].children[1].children[0].children[0].src = promotion[promotion_index].url; 
          promotion_item[1].children[0].children[0].innerText = promotion[promotion_index].title; 
          promotion_item[2].children[0].innerText = promotion[promotion_index].detail; 
          // promotion_item[i].children[1].children[2].innerText = 'CONTACT '; 
        } 
        // console.log(promotion[index+i].title);  

      console.log(promotion); 
    }
    function promotion_left(){
      if(promotion_index-1 >= 0){
        promotion_index-=1 ;
        animate_promotion_move();
        
      } 
    }
    function promotion_right(){
      if(promotion_index+1 < promotion.length){
        promotion_index+=1 ;
        animate_promotion_move(); 
      } 
    }
  </script> 
  <!--///////////////////////////////////////////END PROMOTION//////////////////////////////////////////////////-->
  <!--///////////////////////////////////////////START FEEDBACK//////////////////////////////////////////////////-->
  <div class="row content-6" align="center" style=" "> 
    <div class="col-xl-6 offset-xl-6" style=""> 
      <div class="feedback-item" style="">
        <div class="row mg-0 pd-0 align-items-center">
          <div class="col-1 pd-0" onclick="feedback_left();"><i class="fa fa-angle-left topic"  aria-hidden="true"></i></div>
          <div class="col-10 pd-0">
            <p class="topic" style = "min-width:200px;"> 
                <span class="topic  " >FEEDBACK</span>  
            </p>
            <div class="topic">
              <img src="template/images/product_1.png" alt="Smiley face" class="feedback-item-img feedback-slide-item" align="middle">
            </div>  
            <p class="detail feedback-slide-item" style="text-align:left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit </p>
            <div class="row justify-content-center align-items-center" style="">
              <div class="col-3">
                <img class="img-fluid feedback-user-img feedback-slide-item" src="template/images/product_1.png" alt=""  style="">
              </div>
              <div class="col-5 pd-0" style="">
                <p class="" style="text-align:center;"><span class="feedback-slide-item">xxxxxxxxxxxxxxxxxxxxxxx</span><br><span class="feedback-slide-item">xxxxxxxxxxxxx</span></p> 
              </div>  
            </div> 
          </div>
          <div class="col-1 pd-0"  onclick="feedback_right();"><i class="fa fa-angle-right right topic" aria-hidden="true"></i></div> 
        </div>  
      </div>  
    </div>   
  </div>  
  <script>
    $(document).ready(function(){
      feedback_move();
    });
    var feedback=[
      { 
        detail : 'ใบปลิว Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_1.png', 
        cust_url : 'template/images/cust_1.jpg', 
        cust_name : 'Panya Revelsoft', 
        cust_company : 'REVELSOFT COMPANY', 
      },
      { 
        detail : 'หนังสือ Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus interdum urna. Phasellus ac lorem ut tellus ornare condimentum. Nulla facilisi. Nulla at facilisis nibh, in ultricies arcu. Fusce elementum mollis eros, vel ultricies enim consequat in. Proin diam turpis, semper vitae libero at, pulvinar eleifend lacus. Maecenas vel nisi dignissim, rutrum metus sit ', 
        url : 'template/images/product_2.png', 
        cust_url : 'template/images/cust_2.jpg', 
        cust_name : 'Santisuk Revelsoft', 
        cust_company : 'REVELSOFT COMPANY', 
      },
       
    ];
    var feedback_index = 0;

    function animate_feedback_move() {
      $(".feedback-slide-item").hide('slow', function() {
        feedback_move();
      });
      // $(".feedback-slide-item-child").animate({ 
      //     opacity: 0,  
      //   }, 500 , function() {
      //   feedback_move();
      // }); 
      // $(".feedback-slide-item-child").animate({ 
      //     opacity: 1,  
      //   }, 500  ); 
      $(".feedback-slide-item").show('slow');
    }

    function feedback_move(){
      
      var feedback_item = $(".feedback-slide-item"); 
        if(feedback[feedback_index]!=undefined){ 
          feedback_item[0].src = feedback[feedback_index].url; 
          feedback_item[1].innerText = feedback[feedback_index].detail; 
          feedback_item[2].src = feedback[feedback_index].cust_url; 
          feedback_item[3].innerText = feedback[feedback_index].cust_name; 
          feedback_item[4].innerText = feedback[feedback_index].cust_company; 
          // feedback_item[i].children[1].children[2].innerText = 'CONTACT '; 
        } 
        // console.log(feedback[index+i].title);  

      console.log(feedback_item); 
    }
    function feedback_left(){
      if(feedback_index-1 >= 0){
        feedback_index-=1 ;
        animate_feedback_move();
        
      } 
    }
    function feedback_right(){
      if(feedback_index+1 < feedback.length){
        feedback_index+=1 ;
        animate_feedback_move(); 
      } 
    }
  </script> 
  <!--///////////////////////////////////////////END FEEDBACK//////////////////////////////////////////////////-->
 
<!-- </div> -->

