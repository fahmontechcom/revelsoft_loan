<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>ระบบจัดการประเภทเงินกู้</h1>
     <h2>เพิ่ม ลบ เเก้ไข ประเภทเงินกู้</h2>
     <?PHP if($menu['loan_type']['add']==1){ ?>
     <div align=right>
      <a href="?content=loan_type&action=insert">
        <input class="button" type="submit" value="เพิ่มประเภทเงินกู้">
      </a>
    </div>
    <?php } ?> 
  </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ประเภทเงินกู้</th>   
        <th>เเก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($i=0; $i < count($loan_type); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td> 
          <td><?php echo $loan_type[$i]['loan_type_name']; ?></td>  
          <td>
          <?PHP if($menu['loan_type']['edit']==1){ ?>
            <a href="?content=loan_type&action=update&id=<?php echo $loan_type[$i]['loan_type_id'];?>" style="font-size: 20px;">
              <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
            </a> 
          </td>
          <?php } ?>
          <td> 
          <?PHP if($menu['loan_type']['delete']==1){ ?>
            <a href="?content=loan_type&action=delete&id=<?php echo $loan_type[$i]['loan_type_id'];?>" onclick="return confirm('คุณต้องการลบประเภทเงินกู้ : <?php echo $loan_type[$i]['loan_type_name']; ?> ?');" style="color:red; font-size: 20px;">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          <?php } ?> 
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

