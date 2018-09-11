 <?PHP 
 require_once('models/SettingModel.php');
 
 $setting_model = new SettingModel;
 $setting = $setting_model->getSettingByID('1');
 if($_REQUEST['content']==''){
	$page = 'home';
 }else{
	$page = $_REQUEST['content']; 
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once('views/head.inc.php') ?>
</head>
<body> 
	<!-- <div class="row  justify-content-center"> -->
	<!-- <div style="max-width:2540px;overflow:hidden;"> -->
		<div class="row mg-0 pd-0 full">
			<div class="fix-body "> 
				<!-- <div id="wrapper" class="toggled"> -->
					<?php require_once('views/header.inc.php') ?>
			
					<!-- Sidebar --> 
					<!-- /#sidebar-wrapper -->
			
					<!-- Page Content -->
					<div id="page-content-wrapper" class="" style=""> 
							<div id="main-content">
								<?php require_once("views/body.inc.php"); ?>
							</div> 
					</div>
					
					<!-- /#page-content-wrapper -->
			
				<!-- </div> -->
				<!-- /#wrapper -->
			
				<!-- Menu Toggle Script --> 
				
				<?php require_once("views/footer.inc.php"); ?>    
			</div>   
		</div>
	<!-- </div> -->
	<!-- </div> -->
	 
</body>  
</html> 
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="template/slick/slick.min.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
	
    $(document).on('ready', function() {
	 
      $(".regular").slick({
        // dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
	  $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
		arrows:false
      });
	  $('.single-item').slick();
      
    }); 
	
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
 	});
 	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		focusOnSelect: true
 	});

	$('a[data-slide]').click(function(e) {
		e.preventDefault();
		var slideno = $(this).data('slide');
	$('.slider-nav').slick('slickGoTo', slideno - 1);
	});
     
</script>
 