<?php
    if($page=="home"){ 
        require_once("modules/home/views/index.inc.php"); 
    }  
    if($page=="profile"){ 
        require_once("modules/profile/views/index.inc.php"); 
    }   
    if($page=="profile_detail"){ 
        require_once("modules/profile_detail/views/index.inc.php"); 
    }   
    if($page=="register"){ 
        require_once("modules/register/views/index.inc.php"); 
    }   
    if($page=="post"){ 
        require_once("modules/post/views/index.inc.php"); 
    }   
    if($page=="post_detail"){ 
        require_once("modules/post_detail/views/index.inc.php"); 
    }   
    if($page=="post_que_ans"){ 
        require_once("modules/post_que_ans/views/index.inc.php"); 
    }   
    // if($page=="about"){ 
    //     require_once("modules/about/views/index.inc.php"); 
    // }  
    // if($page=="promotion"){ 
    //     require_once("modules/promotion/views/index.inc.php"); 
    // }  
?>