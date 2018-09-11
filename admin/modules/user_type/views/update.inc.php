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
                for($i=0; $i < count($page); $i++){   
                        // $p =$page[$i]['page_id'];  
                        $user_type_permission = $user_type_permission_model->getUserTypePermissionByUserTypeID($user_type_id,$page[$i]['page_id']);
                        echo '<pre>';
                        print_r($user_type_permission);
                        echo '</pre>';
                ?>
                    <tr>
                        <td><?php echo $i+1; ?></td> 
                        <td><?php echo $page[$i]['page_name']; ?></td>  
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" name="user_type_permission_view_<?PHP echo $page[$i]['page_id'];?>" <?PHP if($user_type_permission['user_type_permission_view']==1){ echo 'checked';}?>> 
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" name="user_type_permission_add_<?PHP echo $page[$i]['page_id'];?>" <?PHP if($user_type_permission['user_type_permission_add']==1){ echo 'checked';}?>>  
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" name="user_type_permission_edit_<?PHP echo $page[$i]['page_id'];?>" <?PHP if($user_type_permission['user_type_permission_edit']==1){ echo 'checked';}?>>  
                        </td> 
                        <td> 
                            <input class=""  style="align:center;" type="checkbox" value="1" name="user_type_permission_delete_<?PHP echo $page[$i]['page_id'];?>" <?PHP if($user_type_permission['user_type_permission_delete']==1){ echo 'checked';}?>>  
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
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
<!-- /.row (nested) -->
</form>