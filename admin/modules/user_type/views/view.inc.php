<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>ระบบจัดการประเภทผู้ใช้งาน</h1>
     <h2>เพิ่ม ลบ เเก้ไข ประเภทผู้ใช้งาน</h2>
     <div align=right>
      <a href="?content=user_type&action=insert">
        <input class="button" type="submit" value="เพิ่มประเภทผู้ใช้งาน">
      </a>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ประเภทผู้ใช้งาน</th>   
        <th>เเก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($i=0; $i < count($user_type); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td> 
          <td><?php echo $user_type[$i]['user_type_name']; ?></td>  
          <td>
            <a href="?content=user_type&action=update&id=<?php echo $user_type[$i]['user_type_id'];?>" style="font-size: 20px;">
              <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
            </a> 
          </td>
          <td>
            <a href="?content=user_type&action=delete&id=<?php echo $user_type[$i]['user_type_id'];?>" onclick="return confirm('คุณต้องการลบผู้ใช้งาน : <?php echo $user_type[$i]['user_type_name']; ?> ?');" style="color:red; font-size: 20px;">
              <i class="fa fa-times" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

