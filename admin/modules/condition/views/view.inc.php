<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>ระบบจัดการเงื่อนไข</h1>
     <h2>เพิ่ม ลบ เเก้ไข เงื่อนไข</h2>
     <?PHP if($menu['condition']['add']==1){ ?>
     <div align=right>
      <a href="?content=condition&action=insert">
        <input class="button" type="submit" value="เพิ่มเงื่อนไข">
      </a>
    </div>
    <?php } ?> 
  </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>เงื่อนไข</th>   
        <th>เเก้ไข</th>
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($i=0; $i < count($condition); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td> 
          <td><?php echo $condition[$i]['condition_title']; ?></td>  
          <td>
          <?PHP if($menu['condition']['edit']==1){ ?>
            <a href="?content=condition&action=update&id=<?php echo $condition[$i]['condition_id'];?>" style="font-size: 20px;">
              <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
            </a> 
          </td>
          <?php } ?>
          <td> 
          <?PHP if($menu['condition']['delete']==1){ ?>
            <a href="?content=condition&action=delete&id=<?php echo $condition[$i]['condition_id'];?>" onclick="return confirm('คุณต้องการลบเงื่อนไข : <?php echo $condition[$i]['condition_title']; ?> ?');" style="color:red; font-size: 20px;">
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

