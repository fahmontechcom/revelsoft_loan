<?php 
require_once('models/AboutModel.php'); 
require_once('models/AboutSlideModel.php'); 

$about_model = new AboutModel;
$about_slide_model = new AboutSlideModel;

$path = "modules/about/views/"; 

 if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');

}else if ($_GET['action'] == 'update'){ 

}else if ($_GET['action'] == 'delete'){ 

}else if ($_GET['action'] == 'add'){ 

}
else{  
    $about = $about_model->getAboutBy();
    
    $about_slide = $about_slide_model->getAboutSlideBy();
    // echo '<pre>';
    // print_r($home_slide);
    // echo '</pre>';
    require_once($path.'view.inc.php');

}
?>