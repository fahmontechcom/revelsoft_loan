<?php 
require_once('models/PromotionModel.php');  
 

$path = "modules/promotion/views/"; 

$promotion_model = New PromotionModel;

$target_dir = "img_upload/promotion/";

 if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'){ 

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){ 

}
else{  
    // $about = $about_model->getAboutBy();
    
	$promotion = $promotion_model->getPromotionBy(); 
    // echo '<pre>';
    // print_r($home_slide);
    // echo '</pre>';
    require_once($path.'view.inc.php');

}
?>