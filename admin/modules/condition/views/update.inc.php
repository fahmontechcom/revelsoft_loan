<script>
    function check(){
        var condition_title = document.getElementById("condition_title").value; 
        var condition_detail = document.getElementById("condition_detail").value;  
 
        condition_title = $.trim(condition_title); 
        condition_detail = $.trim(condition_detail);  
        if(condition_title.length == 0){
            alert("กรุณากรอกชื่อเงื่อนไข");
            document.getElementById("condition_title").focus();
            return false;   
        }else{
            return true;
        }
    }

    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_'+id).attr('src', '../img_upload/condition/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขเงื่อนไข</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=condition&action=edit" enctype="multipart/form-data">
                    <div class="row">  
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>ชื่อเงื่อนไข <font color="#F00"><b>*</b></font></label>
                                <input id="condition_title" name="condition_title" class="form-control"   value="<?PHP echo $condition['condition_title'];?>">
                            </div>
                        </div>   
                    </div>  
                    <div class="row">    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>รายละเอียด </label> 
                                <textarea id="condition_detail" name="condition_detail" class="form-control" style="min-height: 200px;"/><?php echo $condition['condition_detail']?></textarea>
                            </div>
                        </div>   
                    </div>  

                    <div align="right">
                        <input type="hidden" id="condition_id" name="condition_id" class="form-control" value="<?PHP echo $condition['condition_id'];?>">
                          
                        <button type="button" class="btn btn-default" onclick="window.location='?content=condition';" >ย้อนกลับ</button>
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                    <!-- /.row (nested) -->
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script>
CKEDITOR.replace("condition_detail",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
</script>