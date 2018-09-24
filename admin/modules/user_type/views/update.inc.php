<script>
    function check(){
        var user_type_name = document.getElementById("user_type_name").value;
        
        
        user_type_name = $.trim(user_type_name);
        
        
        if(user_type_name.length == 0){
            alert("กรุณากรอกประเภทผู้ใช้งาน");
            document.getElementById("user_type_name").focus();
            return false;
        }else{
            return true;
        }
    }


</script>
<div class="row">
    <!-- <div class="col-lg-2">
                                    
    </div> -->
    <div class="col-lg-6">
        <h1>แก้ไขประเภทผู้ใช้งาน</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<form role="form" method="post" onsubmit="return check();" action="index.php?content=user_type&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <!-- <div class="col-lg-2">
                                    
                                </div> -->
                                <input type="hidden"  id="user_type_id" name="user_type_id" value="<?php echo $user_type['user_type_id'] ?>" />
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>ประเภทผู้ใช้งาน <font color="#F00"><b>*</b></font></label>
                                        <input id="user_type_name" name="user_type_name" class="form-control" value="<?PHP echo $user_type['user_type_name'];?>">
                                        <p class="help-block">Example : ผู้ดูแลระบบ </p>
                                    </div>
                                </div>
                                                            
                            </div> 
                        </div> 
                    </div>   
                </div> 
            </div> 
        </div> 
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h1>สิทธิ์การใช้งาน</h1>
                <!-- <h2>เพิ่ม ลบ เเก้ไข ประเภทผู้ใช้งาน</h2> --> 
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>เมนู</th>   
                        <th style="width:10%">ดู</th>   
                        <th style="width:10%">เพิ่ม</th>   
                        <th style="width:10%">แก้ไข</th>   
                        <th style="width:10%">ลบ</th>    
                    </tr>
                </thead>
                <tbody>
                <?php 
                for($i=0; $i < count($menu); $i++){   
                        // $p =$menu[$i]['menu_id'];  
                        $user_type_permission = $user_type_permission_model->getUserTypePermissionByUserTypeID($user_type_id,$menu[$i]['menu_id']);
                        // echo '<pre>';
                        // print_r($user_type_permission);
                        // echo '</pre>';
                ?>
                    <tr>
                        <input type="hidden"  name="user_type_permission_id_<?PHP echo $menu[$i]['menu_id'];?>" value="<?php if($user_type_permission['user_type_permission_id']!=''){echo $user_type_permission['user_type_permission_id'];}  ?>" />
                        <td><?php echo $i+1; ?></td> 
                        <td><?php echo $menu[$i]['menu_name']; ?></td>  
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" id="user_type_permission_view_<?PHP echo $menu[$i]['menu_id'];?>" name="user_type_permission_view_<?PHP echo $menu[$i]['menu_id'];?>" <?PHP if($user_type_permission['user_type_permission_view']==1){ echo 'checked';}?> onclick="oncheck('<?PHP echo $menu[$i]['menu_id'];?>','view');"> 
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" id="user_type_permission_add_<?PHP echo $menu[$i]['menu_id'];?>" name="user_type_permission_add_<?PHP echo $menu[$i]['menu_id'];?>" <?PHP if($user_type_permission['user_type_permission_add']==1){ echo 'checked';}?>  onclick="oncheck('<?PHP echo $menu[$i]['menu_id'];?>','add');">  
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" id="user_type_permission_edit_<?PHP echo $menu[$i]['menu_id'];?>" name="user_type_permission_edit_<?PHP echo $menu[$i]['menu_id'];?>" <?PHP if($user_type_permission['user_type_permission_edit']==1){ echo 'checked';}?> onclick="oncheck('<?PHP echo $menu[$i]['menu_id'];?>','edit');">  
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" id="user_type_permission_delete_<?PHP echo $menu[$i]['menu_id'];?>" name="user_type_permission_delete_<?PHP echo $menu[$i]['menu_id'];?>" <?PHP if($user_type_permission['user_type_permission_delete']==1){ echo 'checked';}?> onclick="oncheck('<?PHP echo $menu[$i]['menu_id'];?>','delete');">  
                        </td> 
                    </tr>
                    
                <?php 
                } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div align="right" style="margin:3% 0;">
        <button type="button" class="btn btn-default" onclick="window.location='?content=user_type';" >ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
<!-- /.row (nested) -->
</form>
<script>
function oncheck(id,action) { 
   if(document.getElementById('user_type_permission_'+action+'_'+id).checked==true){
        document.getElementById('user_type_permission_view_'+id).checked = true;
   }
   if(document.getElementById('user_type_permission_view_'+id).checked==false){
        document.getElementById('user_type_permission_add_'+id).checked = false;
        document.getElementById('user_type_permission_edit_'+id).checked = false;
        document.getElementById('user_type_permission_delete_'+id).checked = false;
   }
}
</script>