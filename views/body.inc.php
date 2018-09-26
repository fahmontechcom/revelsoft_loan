<?php
    if($page=="home"){ 
        require_once("modules/home/views/index.inc.php"); 
    }  
    if($page=="profile"){ 
        require_once("modules/profile/views/index.inc.php"); 
    }   
    if($page=="register"){ 
        require_once("modules/register/views/index.inc.php"); 
    }   
    // if($page=="about"){ 
    //     require_once("modules/about/views/index.inc.php"); 
    // }  
    // if($page=="promotion"){ 
    //     require_once("modules/promotion/views/index.inc.php"); 
    // }  
?>