<?php
if($page=="home"){ 
    require_once("modules/home/views/index.inc.php"); 
}else if($page=="user_type"){ 
    require_once("modules/user_type/views/index.inc.php");  
}else{ 
    require_once("modules/user/views/index.inc.php");  
}
?>