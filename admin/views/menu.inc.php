<?PHP
require_once('../models/MenuModel.php');  
require_once('../models/UserTypePermissionModel.php');  
$menu_model = new MenuModel;
$user_type_permission_model = new UserTypePermissionModel;
$menu_list = $menu_model->getMenuBy();
$user_permission = $user_type_permission_model->getUserTypePermissionByUserID($user[0][0]);

// echo '<pre>';
// print_r($user_permission);
// echo '</pre>';
$menu = [];
for($i = 0 ; $i < count($menu_list); $i++){

    $menu_name_eng = $menu_list[$i]['menu_name_eng'];  
    $id = '1';   
    $action = 'view';  
    $menu[$menu_list[$i]['menu_name_eng']][$action] = count(array_filter($user_permission, function ($var) use ($menu_name_eng,$action,$id) { 
        return ($var['menu_name_eng'] == trim($menu_name_eng)&&$var['user_type_permission_'.$action] ==$id); 
    }));      
    $action = 'add';  
    $menu[$menu_list[$i]['menu_name_eng']][$action] = count(array_filter($user_permission, function ($var) use ($menu_name_eng,$action,$id) { 
        return ($var['menu_name_eng'] == trim($menu_name_eng)&&$var['user_type_permission_'.$action] ==$id); 
    }));      
    $action = 'edit';  
    $menu[$menu_list[$i]['menu_name_eng']][$action] = count(array_filter($user_permission, function ($var) use ($menu_name_eng,$action,$id) { 
        return ($var['menu_name_eng'] == trim($menu_name_eng)&&$var['user_type_permission_'.$action] ==$id); 
    }));      
    $action = 'delete';  
    $menu[$menu_list[$i]['menu_name_eng']][$action] = count(array_filter($user_permission, function ($var) use ($menu_name_eng,$action,$id) { 
        return ($var['menu_name_eng'] == trim($menu_name_eng)&&$var['user_type_permission_'.$action] ==$id); 
    }));      
}
// echo '<pre>';
// print_r($menu);
// echo '</pre>';
 

?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <!-- <li class="logo">
            <div align="center"> 
              <img src="../template/images/logo.png" class="img-responsive" width="96px" > 
          </div>
        </li> -->
        <li>
            <div style="padding-top: 32px; text-indent: 0px;" align="center">
                <span class="brand-line-one">LOANMARKETO</span><br>
                <!-- <span class="brand-line-second">Mittraphp Bakery</span> -->
            </div>
        </li> 
        <?PHP if($menu['condition']['view']==1){ ?>
        <li>
            <a href="?content=condition">
                <div <?php if($page=="condition"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">เงื่อนไข</span>
                </div>
            </a>
        </li>  
        <?PHP }?>
        <?PHP if($menu['how_to']['view']==1){ ?>
        <li>
            <a href="?content=how_to">
                <div <?php if($page=="how_to"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">วิธีใช้งาน</span>
                </div>
            </a>
        </li>  
        <?PHP }?>
        <?PHP if($menu['loan_type']['view']==1){ ?>
        <li>
            <a href="?content=loan_type">
                <div <?php if($page=="loan_type"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">ประเภทเงินกู้</span>
                </div>
            </a>
        </li>  
        <?PHP }?>
        <?PHP if($menu['home']['view']==1){ ?>
        <li>
            <a href="?content=home">
                <div <?php if($page=="home"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">หน้าแรก</span>
                </div>
            </a>
        </li>  
        <?PHP }?>
        <?PHP if($menu['post_problem']['view']==1){ ?>
        <li>
            <a href="?content=post_problem">
                <div <?php if($page=="post_problem"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">แจ้งประกาศ</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        <?PHP if($menu['confirm']['view']==1){ ?>
        <li>
            <a href="?content=confirm">
                <div <?php if($page=="confirm"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">การยืนยัน</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        <?PHP if($menu['member']['view']==1){ ?>
        <li>
            <a href="?content=member">
                <div <?php if($page=="member"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">สมาชิก</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        <?PHP if($menu['user']['view']==1){ ?>
        <li>
            <a href="?content=user">
                <div <?php if($page=="user"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">ผู้ใช้งาน</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        
        <?PHP if($menu['user_type']['view']==1){ ?>
        <li>
            <a href="?content=user_type">
                <div <?php if($page=="user_type"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">ประเภทผู้ใช้งาน</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        <?PHP if($menu['setting']['view']==1){ ?>
        <li>
            <a href="?content=setting">
                <div <?php if($page=="setting"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-user" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">ตั้งค่า</span>
                </div>
            </a>
        </li> 
        <?PHP }?>
        <!-- <li>
            <a href="?content=setting">
                <div <?php if($page=="setting"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                    <i class="fa fa-gears" style="font-size:24px"></i>
                    <span style="padding:5px; font-size:15px; ">ตั้งค่า</span>
                </div>
            </a>
        </li>  -->
    </ul>
</div>