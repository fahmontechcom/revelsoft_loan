<script type="text/javascript">

function readURL(input,num) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_'+num).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_'+num).attr('src', '../img_upload/promotion/default.png');
		}
	}
</script>
<div class="row " style="padding:1% 0;"> 
	<div class="col-lg-12"> 
		<h1>ระบบจัดการหน้า PROMOTION</h1>  
	</div>
</div>
<hr>
<div class="row " style="padding:1% 0;">  
	<!-- /.row --> 
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" method="post" action="index.php?content=promotion&action=edit-page" enctype="multipart/form-data">  
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

<div align=right>

	<a href="?content=promotion&action=insert">
		<input class="button" type="submit" value="เพิ่ม">
	</a>

</div>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th style="width:10%;">รูป</th>  
			<th>ชื่อโปรโมชั่น</th>  
			<th style="width:30%;">คำอธิบาย</th>
			<th>วันหมดเขต</th>
			<!-- <th>สถานที่จัดกิจกรรม</th> -->
			<!-- <th>แสดง</th> -->
			<th>เเก้ไข</th>
			<th>ลบ</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		for($i=0; $i < count($promotion); $i++){
			?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td>
					<div align="center">
						<img src="../img_upload/promotion/<?php if($promotion[$i]['promotion_image'] != "") echo $promotion[$i]['promotion_image']; else echo "default.png" ?>" height="72" width="auto"/>  
					</div>
				</td>
				<td>
					<div align="center"> 
						<?php echo $promotion[$i]['promotion_title']; ?>
					</div>
				</td>
				<td><?php echo $promotion[$i]['promotion_description']; ?></td>
				<td><?php echo $promotion[$i]['promotion_date_begin']; ?> ถึง <?php echo $promotion[$i]['promotion_date_end']; ?></td>
				<!-- <td>
					<?php echo $promotion[$i]['promotion_location'];  ?>
				</td> -->
				<!-- <td>
					<?php if($promotion[$i]['promotion_show'] == 1) {?> <a href="?content=promotion&action=see&id=<?php echo $promotion[$i]['promotion_id'];?>&val=0" style="color:blue; font-size: 20px;"> 
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
					<?php } ?>
					<?php if($promotion[$i]['promotion_show'] == 0) {?> <a href="?content=promotion&action=see&id=<?php echo $promotion[$i]['promotion_id'];?>&val=1" style="color:gray; font-size: 20px;" > 
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
					<?php } ?>
				</td> -->
				<td>
					<a href="?content=promotion&action=update&id=<?php echo $promotion[$i]['promotion_id'];?>" style="font-size: 20px;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a> 
				</td>
				<td>
					<a href="?content=promotion&action=delete&id=<?php echo $promotion[$i]['promotion_id'];?>" onclick="return confirm('You want to delete promotion : <?php echo $promotion[$i]['promotion_title']; ?>');" style="color:red; font-size: 20px;">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>  
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
 
