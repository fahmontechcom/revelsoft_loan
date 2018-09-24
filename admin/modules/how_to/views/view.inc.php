<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>ระบบจัดการวิธีใช้งาน</h1>
     <h2>เพิ่ม ลบ เเก้ไข วิธีใช้งาน</h2>
     <?PHP if($menu['how_to']['add']==1){ ?>
     <div align=right>
      <a href="?content=how_to&action=insert">
        <input class="button" type="submit" value="เพิ่มวิธีใช้งาน">
      </a>
    </div>
    <?php } ?> 
  </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>วิธีใช้งาน</th>   
        <th>เเก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($i=0; $i < count($how_to); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td> 
          <td><?php echo $how_to[$i]['how_to_detail']; ?></td>  
          <td>
          <?PHP if($menu['how_to']['edit']==1){ ?>
            <a href="?content=how_to&action=update&id=<?php echo $how_to[$i]['how_to_id'];?>" style="font-size: 20px;">
              <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
            </a> 
          </td>
          <?php } ?>
          <td> 
          <?PHP if($menu['how_to']['delete']==1){ ?>
            <a href="?content=how_to&action=delete&id=<?php echo $how_to[$i]['how_to_id'];?>" onclick="return confirm('คุณต้องการลบวิธีใช้งาน ?');" style="color:red; font-size: 20px;">
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

