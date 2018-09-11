<script>
	function check(){ 
		var promotion_title = document.getElementById("promotion_title").value;
		var promotion_description = document.getElementById("promotion_description").value; 
		var promotion_date_begin = document.getElementById("promotion_date_begin").value;
		var promotion_date_end = document.getElementById("promotion_date_end").value;
		var promotion_image = document.getElementById("promotion_image").value;

		promotion_title = $.trim(promotion_title);
		promotion_description = $.trim(promotion_description);  
		promotion_date_end = $.trim(promotion_date_end);
		promotion_date_begin = $.trim(promotion_date_begin);
		promotion_image = $.trim(promotion_image);
	 
		if(promotion_title.length == 0){
			alert("กรุณากรอกชื่อโปรโมชั่น");
			document.getElementById("promotion_title").focus();
			return false; 
		}else if(promotion_date_begin.length == 0){
			alert("กรุณากกรอกวันที่เริ่มจัดโปรโมชั่น");
			document.getElementById("promotion_date_begin").focus();
			return false;
		}else if(promotion_date_end.length == 0){
			alert("กรุณากกรอวันที่สิ้นสุดโปรโมชั่น");
			document.getElementById("promotion_date_end").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_promotion').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_promotion').attr('src', '../img_upload/promotion/default.png');
		}
	}

</script>

<div class="row">
	<div class="col-lg-6">
		<h1>แก้ไขโปรโมชั่น</h1>
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
				<form role="form" method="post" onsubmit="return check();" action="index.php?content=promotion&action=edit&promotion_id=<?PHP echo $promotion_id; ?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>ชื่อโปรโมชั่น <font color="#F00"><b>*</b></font></label> 
										<textarea id="promotion_title" name="promotion_title" class="form-control" style="min-height: 200px;"/><?=$promotion['promotion_title']; ?></textarea>
									</div>
								</div> 
							</div>
							<!-- /.row (nested) --> 
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>คำอธิบาย </label>
										<textarea id="promotion_description" name="promotion_description" class="form-control" style="min-height: 200px;"/><?=$promotion['promotion_description']; ?></textarea>
									</div>
								</div> 
							</div> 
							<!-- /.row (nested) -->
							<div class="row"> 
								<div class="col-lg-4">
									<div class="form-group">

										<label>วันที่เริมโปรโมชั่น <font color="#F00"><b>*</b></font></label>
										<input type="date" name="promotion_date_begin" id="promotion_date_begin" class="form-control" value="<?php echo $promotion['promotion_date_begin']; ?>"/>

									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">

										<label>วันที่สิ้นสุดโปรโมชั่น <font color="#F00"><b>*</b></font></label>
										<input type="date" name="promotion_date_end" id="promotion_date_end" class="form-control" value="<?php echo $promotion['promotion_date_end']; ?>"/>

									</div>
								</div>

							</div>
						</div>
						<!-- /.col-lg-9 (nested) -->

						<div class="col-lg-3">
							<div class="form-group">
								<label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
								<div>
									<img id="img_promotion" src="../img_upload/promotion/<?php if($promotion['promotion_image'] != "") echo $promotion['promotion_image']; else echo "default.png"; ?>" class="img-fluid  "> 
									<input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
								</div>
							</div>
						</div>

						<!-- /.col-lg-3 (nested) -->
					</div>
					<!-- /.row (nested) -->



					<div align="right">
						<input type="hidden" id="edit_by" name="edit_by" class="form-control" value="<?=$_SESSION['user'][0][0]?>">
						<input type="hidden" id="promotion_id" name="promotion_id" class="form-control" value="<?php echo $promotion['promotion_id']; ?>">
						<input type="hidden" id="promotion_image_o" name="promotion_image_o" class="form-control" value="<?php echo $promotion['promotion_image']; ?>">
						<button type="button" class="btn btn-default" onclick="window.location='?content=promotion';" >ย้อนกลับ</button>
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
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration. 
	CKEDITOR.replace("promotion_description",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
	CKEDITOR.replace("promotion_title",{
		filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	}); 
</script>