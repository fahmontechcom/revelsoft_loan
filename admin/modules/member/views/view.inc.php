<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>รายการสมาชิก</h1>  
     <?PHP 
     if($_GET['member_type_id']!=''){ 
       $member_type_id = $_GET['member_type_id'];
     }else{
      $member_type_id = 1;
     }
     ?>
  </div>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link <?PHP if($member_type_id==1){ echo 'active';}?>" href="?content=member&member_type_id=1">ผู้กู้</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?PHP if($member_type_id==2){ echo 'active';}?>" href="?content=member&member_type_id=2">ผู้ปล่อยกู้</a>
  </li> 
</ul>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ชื่อ</th>    
        <th>ยืนยันตัวตน</th>    
        <th>ดู</th>  
        <th>ลบ</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      for($i=0; $i < count($member); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td>
          <td><?php echo $member[$i]['member_name']; ?></td>   
          <td><?php if($member[$i]['member_verified_status']==2){echo 'ยืนยันแล้ว';}else if($member[$i]['member_verified_status']==1){echo 'กำลังรอพิจารณา';}else{echo 'ยังไม่ยืนยัน';} ?></td>   
          <td> 
          <?PHP if($menu['member']['view']==1){ ?>
            <a href="?content=member&action=update&id=<?php echo $member[$i]['member_id'];?>" style="font-size: 20px;">
              <i class="fa fa-eye" aria-hidden="true" ></i>
            </a> 
          <?PHP }?>
          </td>
          <td>
          <?PHP if($menu['member']['delete']==1){ ?>
            <a href="?content=member&action=delete&id=<?php echo $member[$i]['member_id'];?>" onclick="return confirm('คุณต้องการลบสมาชิก : <?php echo $member[$i]['member_name']; ?> ?');" style="color:red; font-size: 20px;">
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

