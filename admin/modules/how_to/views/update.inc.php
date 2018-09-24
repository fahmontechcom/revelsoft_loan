<script>
    function check(){ 
        var how_to_detail = document.getElementById("how_to_detail").value; 
        var how_to_img = document.getElementById("how_to_img").value; 
  
        how_to_detail = $.trim(how_to_detail); 
        how_to_img = $.trim(how_to_img); 
        if(how_to_detail.length == 0){
            alert("กรุณากรอกวิธีใช้งาน");
            document.getElementById("how_to_detail").focus();
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
            $('#img_'+id).attr('src', '../img_upload/how_to/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>เพิ่มวิธีใช้งาน</h1>
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
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=how_to&action=edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group" >
                                <label>รูปภาพประกอบรายละเอียด </label>
                                <img id="img_how_to_img" src="../img_upload/how_to/<?php if($how_to['how_to_img'] != "" ){echo $how_to['how_to_img'];}else{ echo "default.png"; }?>" class="img-fluid"> 
                                <input accept=".jpg , .png" type="file" id="how_to_img" name="how_to_img" class="form-control" style="" onChange="readURL(this,'how_to_img');"  value="<?php echo $how_to['how_to_img']?>">
                            </div>
                        </div> 
                    </div>
                    <div class="row">   
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>รายละเอียด </label> 
                                <textarea id="how_to_detail" name="how_to_detail" class="form-control" style="min-height: 200px;"/><?php echo $how_to['how_to_detail']?></textarea>
                            </div>
                        </div>   
                    </div> 
                    

                    <div align="right">
                        <input type="hidden" id="how_to_id" name="how_to_id" class="form-control" value="<?PHP echo $how_to['how_to_id'];?>"> 
                        <input type="hidden" id="how_to_img_o" name="how_to_img_o" value="<?php echo  $how_to['how_to_img']; ?>" />
                         
                        <button type="button" class="btn btn-default" onclick="window.location='?content=how_to';" >ย้อนกลับ</button>
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
</script>