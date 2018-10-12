<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>รายการโพสอยากกู้</h1>   
  </div> 
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ชื่อผู้อยากกู้</th>    
        <th>หมายเลขประกาศ</th>    
        <th>ประเภทการกู้</th>    
        <th>แก้ไข</th>  
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($i=0; $i < count($post); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td>
          <td><?php echo $post[$i]['member_name']; ?></td>  
          <td><?php echo $post[$i]['post_id']; ?></td>  
          <td><?php echo $post[$i]['loan_type_name']; ?></td>   
          <td> 
          <?PHP if($menu['post']['edit']==1){ ?>
            <a href="?content=post&action=update&id=<?php echo $post[$i]['post_id'];?>" style="font-size: 20px;">
            <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
            </a> 
          <?PHP }?>
          </td>
          <td>
          <?PHP if($menu['post']['delete']==1){ ?>
            <a href="?content=post&action=delete&id=<?php echo $post[$i]['post_id'];?>" onclick="return confirm('คุณต้องการลบรายการ ?');" style="color:red; font-size: 20px;">
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

