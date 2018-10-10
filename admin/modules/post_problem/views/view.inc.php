<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>รายการแจ้งประกาศไม่เหมาะสม</h1>   
  </div> 
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ชื่อผู้แจ้ง</th>    
        <th>หมายเลขประกาศ</th>    
        <th>ดู</th>  
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($i=0; $i < count($post_problem); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td>
          <td><?php echo $post_problem[$i]['member_name']; ?></td>   
          <td><?php echo $post_problem[$i]['post_id']; ?></td>  
          <td> 
          <?PHP if($menu['post_problem']['view']==1){ ?>
            <a href="?content=post_problem&action=detail&id=<?php echo $post_problem[$i]['post_problem_id'];?>" style="font-size: 20px;">
              <i class="fa fa-eye" aria-hidden="true" ></i>
            </a> 
          <?PHP }?>
          </td>
          <td>
          <?PHP if($menu['post_problem']['delete']==1){ ?>
            <a href="?content=post_problem&action=delete&id=<?php echo $post_problem[$i]['post_problem_id'];?>" onclick="return confirm('คุณต้องการลบรายการ ?');" style="color:red; font-size: 20px;">
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

