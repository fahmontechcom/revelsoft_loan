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
				<!-- <div id="wrapper" class="toggled"> -->
					<?php require_once('views/header.inc.php') ?>
			
					<!-- Sidebar --> 
					<!-- /#sidebar-wrapper -->
			
					<!-- Page Content -->
					<div id="page-content-wrapper" class="" style="">  
						<?php 
						require_once("views/body.inc.php"); 
						?> 
					</div>
					
					<!-- /#page-content-wrapper -->
			
				<!-- </div> -->
				<!-- /#wrapper -->
			
				<!-- Menu Toggle Script --> 
				 
				<?php 
				require_once("views/footer.inc.php"); 
				?>    
</body>  
</html>  
 