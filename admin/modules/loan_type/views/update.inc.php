<script>
    function check(){
        var loan_type_name = document.getElementById("loan_type_name").value;
        var loan_type_icon = document.getElementById("loan_type_icon").value;
        var loan_type_title = document.getElementById("loan_type_title").value; 
        var loan_type_img = document.getElementById("loan_type_img").value; 
 
        loan_type_name = $.trim(loan_type_name);
        loan_type_icon = $.trim(loan_type_icon);
        loan_type_title = $.trim(loan_type_title); 
        loan_type_img = $.trim(loan_type_img); 
        if(loan_type_name.length == 0){
            alert("กรุณากรอกชื่อประเภทเงินกู้");
            document.getElementById("loan_type_name").focus();
            return false; 
        }else if(loan_type_title.length == 0){
            alert("กรุณากรอกหัวข้อ");
            document.getElementById("loan_type_title").focus();
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
            $('#img_'+id).attr('src', '../img_upload/loan_type/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขประเภทเงินกู้</h1>
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
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=loan_type&action=edit" enctype="multipart/form-data">
                    <div class="row">  
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>ชื่อประเภทเงินกู้ <font color="#F00"><b>*</b></font></label>
                                <input id="loan_type_name" name="loan_type_name" class="form-control"   value="<?PHP echo $loan_type['loan_type_name'];?>">
                            </div>
                        </div>   
                    </div> 

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group" >
                                <label>ไอคอน </label>
                                <img id="img_loan_type_icon" src="../img_upload/loan_type/<?php if($loan_type['loan_type_icon'] != "" ){echo $loan_type['loan_type_icon'];}else{ echo "default.png"; }?>" class="img-fluid"  > 
                                <input accept=".jpg , .png" type="file" id="loan_type_icon" name="loan_type_icon" class="form-control" style="" onChange="readURL(this,'loan_type_icon');" value="<?php echo $loan_type['loan_type_icon']?>">
                            </div>
                        </div> 
                    </div>
                    <div class="row">  
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>หัวข้อ <font color="#F00"><b>*</b></font></label>
                                <input id="loan_type_title" name="loan_type_title" class="form-control"   value="<?php echo $loan_type['loan_type_title']?>">
                            </div>
                        </div>   
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>รายละเอียด </label> 
                                <textarea id="loan_type_detail" name="loan_type_detail" class="form-control" style="min-height: 200px;"/><?php echo $loan_type['loan_type_detail']?></textarea>
                            </div>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group" >
                                <label>รูปภาพประกอบรายละเอียด </label>
                                <img id="img_loan_type_img" src="../img_upload/loan_type/<?php if($loan_type['loan_type_img'] != "" ){echo $loan_type['loan_type_img'];}else{ echo "default.png"; }?>" class="img-fluid"> 
                                <input accept=".jpg , .png" type="file" id="loan_type_img" name="loan_type_img" class="form-control" style="" onChange="readURL(this,'loan_type_img');"  value="<?php echo $loan_type['loan_type_img']?>">
                            </div>
                        </div> 
                    </div>

                    <div align="right">
                        <input type="hidden" id="loan_type_id" name="loan_type_id" class="form-control" value="<?PHP echo $loan_type['loan_type_id'];?>">
                        <input type="hidden" id="loan_type_icon_o" name="loan_type_icon_o" value="<?php echo  $loan_type['loan_type_icon']; ?>" />
                        <input type="hidden" id="loan_type_img_o" name="loan_type_img_o" value="<?php echo  $loan_type['loan_type_img']; ?>" />
                         
                        <button type="button" class="btn btn-default" onclick="window.location='?content=loan_type';" >ย้อนกลับ</button>
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
CKEDITOR.replace("loan_type_detail",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
</script>