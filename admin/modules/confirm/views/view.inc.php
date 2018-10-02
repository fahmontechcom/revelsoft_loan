<div class="row">
  <div class="col-lg-12">
    <div>
     <h1>การยืนยันตัวตน</h1>  
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
    <a class="nav-link <?PHP if($member_type_id==1){ echo 'active';}?>" href="?content=confirm&member_type_id=1">ผู้กู้</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?PHP if($member_type_id==2){ echo 'active';}?>" href="?content=confirm&member_type_id=2">ผู้ปล่อยกู้</a>
  </li> 
</ul>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>ชื่อ</th>    
        <th>ดู</th>
        <th>อนุมัติ</th>
        <th>ไม่อนุมัติ</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      for($i=0; $i < count($member); $i++){
        ?>
        <tr>
          <td><?php echo $i+1; ?></td>
          <td><?php echo $member[$i]['member_name']; ?></td>   
          <td> 
          <?PHP if($menu['confirm']['edit']==1){ ?>
            <a href="?content=confirm&action=update&id=<?php echo $member[$i]['member_id'];?>" style="font-size: 20px;">
              <i class="fa fa-eye" aria-hidden="true"></i>
            </a> 
          <?PHP }?>
          </td>
          <td>
          <?PHP if($menu['confirm']['edit']==1){ ?>
            <form role="form" method="post"  action="index.php?content=confirm&action=edit" enctype="multipart/form-data">
              <input type="hidden" name="member_id" value="<?PHP echo $member[$i]['member_id']?>">
              <input type="hidden" name="member_verified_status" value="2">
                            <button class="btn btn-success" type="submit"  ><i class="fa fa-check" aria-hidden="true"></i></button> 
            </form>
          <?php } ?>
          </td>
          <td>
          <?PHP if($menu['confirm']['edit']==1){ ?>
            <form role="form" method="post"  action="index.php?content=confirm&action=edit" enctype="multipart/form-data">
              <input type="hidden" name="member_id" value="<?PHP echo $member[$i]['member_id']?>">
              <input type="hidden" name="member_verified_status" value="0">
              <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#declineModal_<?PHP echo $member[$i]['member_id']?>" ><i class="fa fa-times" aria-hidden="true"></i></button> 
              <div class="modal fade" id="declineModal_<?PHP echo $member[$i]['member_id']?>" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="declineModalLabel">หมายเหตุ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="col-lg-12"  align="left" > 
                            <div class="form-group"> 
                                <textarea rows='4' id="remark" name="remark" class="form-control" style=" "></textarea>   
                            </div>       
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
                  </div>
                </div>
              </div>              
            </form>
          <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

