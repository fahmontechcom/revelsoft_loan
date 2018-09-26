
<!-- <nav class="navbar navbar-expand-lg navbar-light" style=" ">  
         
    <a id=""  class="navbar-brand " style="" href="index.php?content=home" >       
        <div class="row align-items-center">
            <div class=" " align="center" style="display: inline-block;">  
                <img  src="template/images/logo.png" height="50px" alt=""> 
            </div>   
            <div class=" " align="center" style="display: inline-block;">  
                <h4><b>LOANMARKETO</b></h4> 
                <h6>อยากกู้ ปล่อยกู้ ง่ายๆที่นี่</h6>   
            </div>   
        </div>              
    </a>  
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
       
</nav> -->


<?PHP 
require_once('models/AmphurModel.php'); 
require_once('models/ProvinceModel.php');  
require_once('models/ConditionModel.php');  
$amphur_model = new AmphurModel; 
$province_model = new ProvinceModel; 
$condition_model = new ConditionModel; 
$condition = $condition_model ->getConditionBy();   
$province = $province_model ->getProvinceBy();   
$amphur = $amphur_model ->getAmphurBy();   
?>
 

<nav class="navbar navbar-expand-lg navbar-light ">
    <a id=""  class="navbar-brand " style="" href="index.php?content=home" >       
        <div class="row align-items-center">
            <div class=" " align="center" style="display: inline-block;">  
                <img  src="template/images/logo.png" height="50px" alt=""> 
            </div>   
            <div class=" " align="center" style="display: inline-block;">  
                <h4 ><b style="color:#fe9102;" >LOAN</b><b style="color:#0292d8;">MARKETO</b></h4>  
                <h6>อยากกู้ ปล่อยกู้ ง่ายๆที่นี่</h6>   
            </div>   
        </div>              
    </a>  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  justify-content-center" id="navbarSupportedContent" style=" ">
    <ul class="navbar-nav ml-auto mr-auto">
      <li class="nav-item active ml-auto mr-auto">
        <a class="nav-link" href="#">รายชื่อผู้ให้กู้</a>
      </li> 
      <li class="nav-item dropdown ml-auto mr-auto">
        <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">อยากกู้
        </a>
        <div class="dropdown-menu ml-auto mr-auto" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown ml-auto mr-auto">
        <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">อยากให้กู้
        </a>
        <div class="dropdown-menu ml-auto mr-auto" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> 
      <li class="nav-item ml-auto mr-auto">
        <a class="nav-link" href="#">ข่าวสาร</a>
      </li> 
    </ul>
    <div class="form-inline my-2 my-lg-0"> 
    
        <button class="btn btn-login my-2 my-sm-0 m-1" type="button"  data-toggle="modal" data-target="#loageModal"><i class="fa fa-lock p-1" aria-hidden="true"></i>เข้าสู่ระบบ</button>
        <button class="btn btn-register my-2 my-sm-0 m-1" type="button"   data-toggle="modal" data-target="#modal_register" >สมัครเดี๋ยวนี้</button>  
       
    </div>
    
    <div class="modal fade" id="modal_register"  role="dialog" aria-labelledby="modal_registerLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body"> 
                    <form role="form" method="post" onsubmit="return check();" action="index.php?content=profile&action=add" enctype="multipart/form-data">
                        
                        <div id="member_type">
                            <div class="row justify-content-center">   
                                <img  src="template/images/logo.png" height="70px" alt="">      
                            </div>     
                            <div class="row justify-content-center mt-3" style="border-color:green;">
                                <h3>คุณคือใคร ?</h3>   
                            </div>     
                            <div class="row justify-content-center mt-3" >
                                <div class="col m-2 member_type_list" align="center" onclick="member_type_choose('1');" style="cursor: pointer;"> 
                                    <h3 class="m-4">ผู้กู้</h3>     
                                    <div class="col-12">
                                        <img  src="template/images/member_type_1.png" class="fluid" alt="" height="140px">       
                                    </div>    
                                    <h5  class="gray mt-5">ฉันต้องการเงิน</h5>   
                                </div>
                                <div class="col m-2 member_type_list" align="center"  onclick="member_type_choose('2');" style="cursor: pointer;">
                                    <h3 class="m-4">ผู้ปล่อยกู้</h3>  
                                    <div class="col-12">
                                        <img  src="template/images/member_type_2.png" class="fluid" alt="" height="140px">       
                                    </div> 
                                    <h5 class="gray mt-5">ฉันต้องการปล่อยกู้</h5>   
                                </div>
                            </div>    
                        </div>
                        <div id="register" class="p-5" style="display:none;"> 
                            <div class="row justify-content-center">   
                                <img  src="template/images/logo.png" height="70px" alt="">      
                            </div>     
                            <div class="row justify-content-center" style="border-color:green;">
                                <h4>สมัครสมาชิก - ผู้กู้</h4>   
                            </div>
                                
                                <div class="row justify-content-center">
                                    <div class="col-lg-7"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ชื่อ - นามสกุล</h6>
                                            <input id="member_name" name="member_name" class="form-control" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    
                                    <div class="col-lg-5"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ชื่อในระบบ</h6>
                                            <input id="member_name_show"  name="member_name_show" class="form-control" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ที่อยู่</h6>
                                            <input id="member_address" name="member_address" class="form-control" placeholder="ที่อยู่" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    <div class="col-lg-6"  align="left" > 
                                        <div class="form-group">  
                                            <select  class="form-control select " id="header_amphur_id"  name="amphur_id" onchange="" style="border-color: #0292d8;">  
                                            <option value="">อำเภอ</option>
                                                <?php 
                                                    for($i =  0 ; $i < count($amphur) ; $i++){
                                                    ?>
                                                    <option <?php if($amphur[$i]['amphur_id'] == $amphur_id){?> selected <?php }?> value="<?php echo $amphur[$i]['amphur_id']; ?>"><?php echo $amphur[$i]['amphur_name']; ?></option>
                                                    <?
                                                    }
                                                ?>
                                            </select>    
                                        </div>   
                                    </div>   
                                    <div class="col-lg-6"  align="left" > 
                                        <div class="form-group">  
                                            <select  class="form-control select " id="header_province_id" name="province_id" onchange="" style="border-color: #0292d8;"> 
                                            <option value="">จังหวัด</option>
                                                <?php 
                                                    for($i =  0 ; $i < count($province) ; $i++){
                                                    ?>
                                                    <option <?php if($province[$i]['province_id'] == $province_id){?> selected <?php }?> value="<?php echo $province[$i]['province_id']; ?>"><?php echo $province[$i]['province_name']; ?></option>
                                                    <?
                                                    }
                                                ?>
                                            </select>    
                                        </div>   
                                    </div>   
                                
                                    
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>เบอร์โทร</h6>
                                            <input id="member_tel" name="member_tel" class="form-control" style="border-color: #0292d8;">   
                                        </div>  
                                    </div>  
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>อีเมล</h6>
                                            <input type="email" id="member_email" name="member_email" class="form-control" style="border-color: #0292d8;">   
                                        </div>  
                                    </div>  
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>รหัสผ่าน</h6>
                                            <input type="password" id="member_password" name="member_password" class="form-control" style="border-color: #0292d8;">   
                                        </div>     
                                    </div>   
                                    <div class="col-lg-12"  >  
                                        <div class="form-group" > 
                                            <h6>เงื่อนไข</h6> 
                                            <div class="form-group" > 
                                                <div class="p-3" style="height: 110px;overflow: auto;border: 1px solid #0292d8;border-radius: .25rem;">
                                                    <?PHP echo $condition[0]['condition_detail']?> 
                                                </div>
                                            </div>
                                            <div class="form-group" align="center"> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="confirm">
                                                    <label class="form-check-label" for="confirm">
                                                    ยอมรับเงื่อนไข
                                                    </label>
                                                </div> 
                                            </div> 
                                        </div>  
                                    </div>   
                                    <div class="col-lg-12"  align="center" >  
                                        <div class="form-group">
                                            <input type="hidden" id="member_type_id" name="member_type_id" value="<?PHP echo $_POST['member_type_id'];?>" > 
                                            <button class="btn btn-login my-2 my-sm-0 m-1" type="submit"   >สมัครสมาชิก</button>  
                                        </div>  
                                    </div>       
                                </div>     
                                
                            <hr class="hr-text" data-content="หรือ">  
                            <div class="row justify-content-center"> 
                                <button class="btn btn-login my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#loageModal">facebook</button>  
                            </div> 
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loageModal" tabindex="-1" role="dialog" aria-labelledby="loageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="loageModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <div class="row justify-content-center">   
                        <img  src="template/images/logo.png" height="50px" alt="">      
                    </div>     
                    <div class="row justify-content-center">
                        <h4>เข้าสู่ระบบ</h4>   
                    </div>     
                    <form role="form" method="post" onsubmit="return check();" action="index.php?content=login" enctype="multipart/form-data">   
                        <div class="row justify-content-center"> 
                            <div class="col-lg-12"  align="center" >
                                <div class="form-group"> 
                                    <input id="login_member_username" name="member_username" class="form-control" style="border-color:  #fe9102;"> 
                                </div>
                                <div class="form-group"> 
                                    <input type="password" id="login_member_password" name="member_password" class="form-control" style="border-color:  #fe9102;"> 
                                </div> 
                                <button class="btn btn-login my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#loageModal">เข้าสู่ระบบ</button>  
                                <hr class="hr-text" data-content="หรือ">  
                            </div>  
                        </div>     
                    </form> 
                    <hr >
                    <div class="row justify-content-center">
                        <div class="col-lg-12"  align="center" ><h5>ยังไม่ได้เป็นสมาชิก LOANMARKETO ใช่ไหม</h5></div>
                        <div class="col-lg-12"  align="center" ><button class="btn btn-register my-2 my-sm-0 m-1" type="button">สมัครสมาชิก</button></div> 
                    </div>  
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div class="form-inline my-2 my-lg-0"> 
        <ul class="navbar-nav ml-auto mr-auto"> 
            <li class="nav-item dropdown ml-auto mr-auto">
                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"  ></i></a>
                <div class="dropdown-menu dropdown-menu-right ml-auto mr-auto" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown ml-auto mr-auto">
                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" ></i>&nbsp;ปัญญา&nbsp;</a>
                <div class="dropdown-menu dropdown-menu-right ml-auto mr-auto" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>   
        </ul>
    </div> -->
  </div>
</nav>
<script> 

    $(document).ready(function(){
        $("#header_amphur_id").select2({ 
            placeholder: "อำเภอ",
            theme: 'bootstrap4'
        });
        $("#header_province_id").select2({ 
            placeholder: "จังหวัด",
            theme: 'bootstrap4'
        });
        
    }); 
    function member_type_choose(id){
        document.getElementById("member_type_id").value = id;   
        document.getElementById("register").style.display = "block";
        document.getElementById("member_type").style.display = "none";
    } 
 </script>
 
            
            
		


