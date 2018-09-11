<script>
	function check(){
		var about_slide_image = document.getElementById("about_slide_image").value;

		about_slide_image = $.trim(about_slide_image);

		if(about_slide_image.length == 0){
			alert("กรุณาเลือกรูปภาพ");
			document.getElementById("about_slide_image").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input,num) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_'+num).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_'+num).attr('src', '../img_upload/about/default.png');
		}
	}
</script>
<div class="row " style="padding:1% 0;"> 
	<div class="col-lg-12"> 
		<h1>ระบบจัดการหน้า ABOUT</h1>  
	</div>
</div>
<hr>
<div class="row " style="padding:1% 0;">  
	<!-- /.row --> 
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" method="post" action="index.php?content=about&action=edit-page" enctype="multipart/form-data">  
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
					<div align="right"> 
						
						<input type="hidden" id="updateby" name="updateby" class="form-control" value="<?=$_SESSION['user'][0][0]?>">
                    	<input type="hidden" id="page_header_image_o" name="page_header_image_o" class="form-control" value="<?php echo $page['page_header_image']?>">

						<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
						<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>
<hr> 
<div class="row " style="padding:1% 0;">  
	<!-- /.row --> 
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" method="post" action="index.php?content=about&action=edit" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12">  
							<h2>รูป header </h2>  
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>รูปภาพ </label>
								<div>
									<img id="img_2" src="../img_upload/about/<?php if($about['about_image_1'] != "") echo $about['about_image_1']; else echo "default.png"; ?>" class="img-fluid"> 
									<input accept=".jpg , .png" type="file" id="about_image_1" name="about_image_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'2');">
								</div>
							</div>
						</div> 
					</div>
					<div class="row">
						<div class="col-lg-12"> 
							<h2>content 1</h2>  
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label>หัวข้อ </label>
										<input id="about_con_1_title" name="about_con_1_title" class="form-control"  value="<?php echo $about['about_con_1_title']?>">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียดย่อหน้า 1 </label>
										<textarea id="about_con_1_description_1" name="about_con_1_description_1" class="form-control" style="min-height: 200px;"/><?php echo $about['about_con_1_description_1']?></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียดย่อหน้า 2 </label>
										<textarea id="about_con_1_description_2" name="about_con_1_description_2" class="form-control" style="min-height: 280px;"/><?php echo $about['about_con_1_description_2']?></textarea>
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
								<div class="col-lg-8">
									<div class="form-group">
										<label>หัวข้อ </label>
										<input id="about_con_2_title" name="about_con_2_title" class="form-control"  value="<?php echo $about['about_con_2_title']?>">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียดย่อหน้า 1 </label>
										<textarea id="about_con_2_description_1" name="about_con_2_description_1" class="form-control" style="min-height: 200px;"/><?php echo $about['about_con_2_description_1']?></textarea>
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
										<input id="about_con_3_title" name="about_con_3_title" class="form-control"  value="<?php echo $about['about_con_3_title']?>">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียดย่อหน้า 1 </label>
										<textarea id="about_con_3_description_1" name="about_con_3_description_1" class="form-control" style="min-height: 200px;"/><?php echo $about['about_con_3_description_1']?></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label>รายละเอียดย่อหน้า 2 </label>
										<textarea id="about_con_3_description_2" name="about_con_3_description_2" class="form-control" style="min-height: 280px;"/><?php echo $about['about_con_3_description_2']?></textarea>
									</div>
								</div> 
							</div>
						</div> 
					</div> 
					<div align="right">
						<input type="hidden" id="about_image_o_1" name="about_image_o_1" class="form-control" value="<?php echo $about['about_image_1']?>"> 
						<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
						<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>
<hr>

<div class="row"  style="padding:1% 0;"> 
	<div class="col-lg-12"> 
		<h2>รูปสไลด์</h2>  
	</div>
	<!-- /.row -->
	<div class="col-lg-12"> 
		<form role="form" method="post" onsubmit="return check();" action="index.php?content=about&action=add" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label>รูปภาพ <font color="#F00"><b>400 x 331</b></font></label>
						<div>
							<img id="img_3" src="../img_upload/about/default.png" style="max-height: 200px;" class="img-fluid"> 
							<input accept=".jpg , .png" type="file" id="about_slide_image" name="about_slide_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,'3');">
						</div>
					</div>
				</div>
			</div>
			<div> 
				<button type="submit" class="btn btn-success">เพิ่มรูปภาพ</button>
			</div>
		</form> 
	</div>
	<div class="col-lg-12"> 
		<div  style="border: 1px solid #ccc!important; border-radius: 5px; margin-top: 20px;">
			<div class="row " style="margin : 10px;">
				<? for($i = 0; $i < count($about_slide); $i++ ) {?>
				<div class="col-lg-2" > 
						<div style="text-align: center;">
							<img id="about_slide" src="../img_upload/about/<?php if($about_slide[$i]['about_slide_image'] != "") echo $about_slide[$i]['about_slide_image']; else echo "default.png" ?>" class="img-thumbnail"> 
							<a href="?content=about&action=delete&id=<? echo $about_slide[$i]['about_slide_id'] ?>" onclick="return confirm('คุณต้องการลบรูปภาพนี้ใช่หรือไม่ ?');" style="color:red; font-size: 20px;">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						</div> 
				</div>
				<? } ?>
			</div>
		</div>
	</div>
</div>
<hr>

 <script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration. 
	CKEDITOR.replace("about_con_1_description_1",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKEDITOR.replace("about_con_1_description_2",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKEDITOR.replace("about_con_2_description_1",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKEDITOR.replace("about_con_3_description_1",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
	CKEDITOR.replace("about_con_3_description_2",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	});
</script>