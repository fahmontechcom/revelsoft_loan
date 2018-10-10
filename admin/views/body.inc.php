<?PHP
 
 
if($page=="home"&&$menu['home']['view']==1){ 
    require_once("modules/home/views/index.inc.php"); 
}else if($page=="user_type"&&$menu['user_type']['view']==1){ 
    require_once("modules/user_type/views/index.inc.php");   
}else if($page=="user"&&$menu['user']['view']==1){ 
    require_once("modules/user/views/index.inc.php");  
}else if($page=="loan_type"&&$menu['loan_type']['view']==1){ 
    require_once("modules/loan_type/views/index.inc.php");  
}else if($page=="how_to"&&$menu['how_to']['view']==1){ 
    require_once("modules/how_to/views/index.inc.php");  
}else if($page=="condition"&&$menu['condition']['view']==1){ 
    require_once("modules/condition/views/index.inc.php");  
}else if($page=="setting"&&$menu['setting']['view']==1){ 
    require_once("modules/setting/views/index.inc.php");  
}else if($page=="member"&&$menu['member']['view']==1){ 
    require_once("modules/member/views/index.inc.php");  
}else if($page=="confirm"&&$menu['confirm']['view']==1){ 
    require_once("modules/confirm/views/index.inc.php");   
}else if($page=="post_problem"&&$menu['post_problem']['view']==1){ 
    require_once("modules/post_problem/views/index.inc.php");  
}
?>