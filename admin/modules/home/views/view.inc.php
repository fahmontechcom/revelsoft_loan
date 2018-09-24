<script>
	function check(){
		var home_slide_image = document.getElementById("home_slide_image").value;

		home_slide_image = $.trim(home_slide_image);

		if(home_slide_image.length == 0){
			alert("กรุณาเลือกรูปภาพ");
			document.getElementById("home_slide_image").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input,index) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_'+index).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_'+index).attr('src', '../img_upload/home/default.png');
		}
	}
</script>
<div class="row " style="padding:1% 0;"> 
	<div class="col-lg-12"> 
		<h1>ระบบจัดการหน้า HOME</h1>  
	</div>
</div>
<hr>
<div class="row " style="padding:1% 0;">  
	<!-- /.row --> 
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" method="post" action="index.php?content=home&action=edit-page" enctype="multipart/form-data">  
					<div class="row">
                        <div class="col-lg-9">
                            <div class="row">
								<div class="col-lg-12"> 
									<h2>ตั้งค่าหน้า</h2>  
								</div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อหน้า <font color="#F00"><b>*</b></font></label>
                                        <input id="page_name" name="page_name" class="form-control" value="<?php echo $page['page_name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ป้ายกำกับ </label>
                                        <input id="page_tag" name="page_tag" class="form-control"  value="<?php echo $page['page_tag']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อแสดงประจำหน้า </label>
                                        <input id="page_title" name="page_title" class="form-control" value="<?php echo $page['page_title']?>">
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อใหญ่ประจำหน้า </label>
                                        <input id="page_header_1" name="page_header_1" class="form-control"  value="<?php echo $page['page_header_1']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียดประจำหน้า </label>
                                        <input id="page_header_2" name="page_header_2" class="form-control" value="<?php echo $page['page_header_2']?>">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.col-lg-9 (nested) -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพประจำหน้า </label>
                                <div>
                                    <img id="img_1" src="../img_upload/page/<?php if($page['page_header_image'] != "") echo $page['page_header_image']; else echo "default.png"; ?>" class="img-fluid  "> 
                                    <input accept=".jpg , .png" type="file" id="page_header_image" name="page_header_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'1');">
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-3 (nested) -->
                    </div>   
					<?PHP if($menu['home']['edit']==1){ ?>
					<div align="right"> 
						
						<input type="hidden" id="updateby" name="updateby" class="form-control" value="<?=$_SESSION['user'][0][0]?>">
                    	<input type="hidden" id="page_header_image_o" name="page_header_image_o" class="form-control" value="<?php echo $page['page_header_image']?>">

						<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
						<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
					</div>
					<?PHP }?>
				</form>
			</div>
		</div>
	</div> 
</div>
<hr> 
<!-- /.row -->  
<div class="row " style="padding:1% 0;">  
	<!-- /.row --> 
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" method="post" action="index.php?content=home&action=edit" enctype="multipart/form-data"> 
					<div class="row">
						<div class="col-lg-12"> 
							<h2>content 1</h2>  
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label>หัวข้อ </label>
										<input id="home_content_1_title" name="home_content_1_title" class="form-control"  value="<?php echo $home['home_content_1_title']?>">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียด</label>
										<textarea id="home_content_1_detail" name="home_content_1_detail" class="form-control" style="min-height: 200px;"/><?php echo $home['home_content_1_detail']?></textarea>
									</div>
								</div>  
							</div>
						</div> 
					</div> 
					<div class="row">
						<div class="col-lg-12"> 
							<h2>content 2</h2>  
						</div>
						<div class="col-lg-9">
							<div class="row"> 
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียด</label>
										<textarea id="home_content_2_detail" name="home_content_2_detail" class="form-control" style="min-height: 200px;"/><?php echo $home['home_content_2_detail']?></textarea>
									</div>
								</div> 
							</div>
						</div> 
					</div>   
					<div class="row">
						<div class="col-lg-12"> 
							<h2>content 3</h2>  
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label>หัวข้อ </label>
										<input id="home_content_3_title" name="home_content_3_title" class="form-control"  value="<?php echo $home['home_content_3_title']?>">
									</div>
								</div> 
							</div>
						</div> 
					</div> 
					<div class="row">
						<div class="col-lg-12"> 
							<h2>content 4</h2>  
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label>หัวข้อ </label>
										<input id="home_content_4_title" name="home_content_4_title" class="form-control"  value="<?php echo $home['home_content_4_title']?>">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียด</label>
										<textarea id="home_content_4_detail" name="home_content_4_detail" class="form-control" style="min-height: 200px;"/><?php echo $home['home_content_4_detail']?></textarea>
									</div>
								</div>  
							</div>
						</div> 
					</div> 
					<?PHP if($menu['home']['edit']==1){ ?>
					<div align="right"> 
						<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
						<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
					</div>
					<?PHP }?>
				</form>
			</div>
		</div>
	</div> 
</div>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration. 
	CKEDITOR.replace("home_content_1_detail",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
	CKEDITOR.replace("home_content_2_detail",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
	CKEDITOR.replace("home_content_4_detail",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
	// CKEDITOR.config.fontSize_sizes = "8px/8px;8pt/8pt;9px/9px;9pt/9pt;10px/10px;10pt/10pt;11px/11px;11pt/11pt;12px/12px;12pt/12pt;14px/14px;14pt/14pt;16px/16px;16pt/16pt;18px/18px;18pt/18pt;20px/20px;20pt/20pt;22px/22px/22pt/22pt;24px/24px;24pt/24pt;26px/26px;26pt/26pt;28px/28px;28pt/28pt;36px/36px;36pt/36pt;48px/48px;48pt/48pt;72px/72px;72pt/72pt;";
</script>