
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
 

<nav class="navbar navbar-expand-lg navbar-light " style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);">
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
          <a class="dropdown-item" href="index.php?content=post">โพสอยากกู้</a>
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
    <?PHP 
    if($loan_member==""){  
    ?>
    <div class="form-inline my-2 my-lg-0"> 
    
        <button class="btn btn-login my-2 my-sm-0 m-1" type="button"  data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock p-1" aria-hidden="true"></i>เข้าสู่ระบบ</button>
        <button class="btn btn-register my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#modal_register" onclick="reset_member_type();">สมัครเดี๋ยวนี้</button>  
       
    </div>
    <?PHP  
    }else{
    ?>
    <div class="form-inline my-2 my-lg-0"> 
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
                <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" ></i>&nbsp;<?PHP echo $loan_member[0]['member_name_show']?>&nbsp;</a>
                <div class="dropdown-menu dropdown-menu-right ml-auto mr-auto" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?content=profile"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                </div>
            </li>   
        </ul>
    </div>
    <?PHP  
    }
    ?>
    <div class="modal fade" id="modal_register"  role="dialog" aria-labelledby="modal_registerLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none;"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                    <div id="member_type" class="container">
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
                    <div id="borrower" class="container pl-4 pr-4 pb-4" style="display:none;"> 
                        <form role="form" method="post" onsubmit="return borrower_check();" action="index.php?content=register&action=add" enctype="multipart/form-data">
                            <div class="row justify-content-center">   
                                <img  src="template/images/logo.png" height="70px" alt="">      
                            </div>     
                            <div class="row justify-content-center" style="border-color:green;">
                                <h4>สมัครสมาชิก - ผู้กู้</h4>   
                            </div>
                                
                                <div class="row justify-content-center">
                                    <div class="col-lg-7"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ชื่อ - นามสกุล <font color="#F00"><b>*</b></font></h6>
                                            <input id="borrower_member_name" name="member_name" class="form-control" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    
                                    <div class="col-lg-5"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ชื่อในระบบ <font color="#F00"><b>*</b></font></h6>
                                            <input id="borrower_member_name_show"  name="member_name_show" class="form-control" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>ที่อยู่</h6>
                                            <input id="borrower_member_address" name="member_address" class="form-control" placeholder="ที่อยู่" style="border-color: #0292d8;">   
                                        </div>    
                                    </div>    
                                    <div class="col-lg-6"  align="left" > 
                                        <div class="form-group">  
                                            <select  class="form-control select " id="borrower_amphur_id"  name="amphur_id" onchange="" style="border-color: #0292d8;">  
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
                                            <select  class="form-control select " id="borrower_province_id" name="province_id" onchange="" style="border-color: #0292d8;"> 
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
                                            <input id="borrower_member_tel" name="member_tel" class="form-control" style="border-color: #0292d8;">   
                                        </div>  
                                    </div>  
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>อีเมล <font color="#F00"><b>*</b></font></h6>
                                            <input type="email" id="borrower_member_email" name="member_email" class="form-control" style="border-color: #0292d8;">   
                                        </div>  
                                    </div>  
                                    <div class="col-lg-12"  align="left" > 
                                        <div class="form-group"> 
                                            <h6>รหัสผ่าน <font color="#F00"><b>*</b></font></h6>
                                            <input type="password" id="borrower_member_password" name="member_password" class="form-control" style="border-color: #0292d8;">   
                                        </div>     
                                    </div>   
                                    <div class="col-lg-12"  >  
                                        <div class="form-group" > 
                                            <h6>เงื่อนไข</h6> 
                                            <div class="form-group" > 
                                                <div class="p-3" style="height: 200px;overflow: auto;border: 1px solid #0292d8;border-radius: .25rem;">
                                                    <?PHP echo $condition[0]['condition_detail']?> 
                                                </div>
                                            </div>
                                            <div class="form-group" align="center"> 
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="borrower_confirm">
                                                    <label class="form-check-label" for="borrower_confirm">
                                                    ยอมรับเงื่อนไข
                                                    </label>
                                                </div> 
                                            </div> 
                                        </div>  
                                    </div>   
                                    <div class="col-lg-12"  align="center" >  
                                        <div class="form-group">
                                            <input type="hidden" id="borrower_member_type_id" name="member_type_id"  > 
                                            <button class="btn btn-login my-2 my-sm-0 m-1" type="submit"   >สมัครสมาชิก</button>  
                                        </div>  
                                    </div>       
                                </div>     
                                
                            <hr class="hr-text" data-content="หรือ">  
                            <div class="row justify-content-center"> 
                                <button class="btn btn-login my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#loginModal">facebook</button>  
                            </div> 
                        </form>
                    </div>   
                    <div id="lender" class="container pl-4 pr-4 pb-4" style="display:none;"> 
                        <form role="form" method="post" onsubmit="return lender_check();" action="index.php?content=register&action=add" enctype="multipart/form-data">
                            <div class="row justify-content-center">   
                                <img  src="template/images/logo.png" height="70px" alt="">      
                            </div>     
                            <div class="row justify-content-center" style="border-color:green;">
                                <h4>สมัครสมาชิก - ผู้ปล่อยกู้</h4>   
                            </div>
                                
                            <div class="row justify-content-center">
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>ประเภทผู้ปล่อยกู้ <font color="#F00"><b>*</b></font></h6>     
                                        <select  class="form-control " id="lender_member_lender_type_id" name="member_lender_type_id" onchange="show_header_form();" style="border-color: #fe9102;"> 
                                            <option value="">เลือกประเภท</option> 
                                            <option value="1">บุคคลธรรมดา / นายทุนทั่วไป</option> 
                                            <option value="2">ธนาคาร</option> 
                                            <option value="3">บริษัท / นิติบุคคล</option> 
                                        </select>   
                                    </div>
                                </div>   
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>ประเภทการปล่อยกู้ <font color="#F00"><b>*</b></font></h6>      
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="lender_member_loan_type_deed" name="member_loan_type_deed">
                                            <label class="form-check-label" for="lender_member_loan_type_deed">
                                            โฉนดแลกเงิน
                                            </label>
                                        </div>
                                        <div class="form-check  hide_header_loan_type">
                                            <input class="form-check-input" type="checkbox" value="1" id="lender_member_loan_type_pico" name="member_loan_type_pico">
                                            <label class="form-check-label" for="lender_member_loan_type_pico">
                                            พิโกไฟแนนซ์
                                            </label>
                                        </div>
                                        <div class="form-check hide_header_loan_type">
                                            <input class="form-check-input" type="checkbox" value="1" id="lender_member_loan_type_nano" name="member_loan_type_nano">
                                            <label class="form-check-label" for="lender_member_loan_type_nano">
                                            นาโนไฟแนนซ์
                                            </label>
                                        </div> 
                                        <div class="form-check hide_header_loan_type">
                                            <input class="form-check-input" type="checkbox" value="1" id="lender_member_loan_type_business" name="member_loan_type_business">
                                            <label class="form-check-label" for="lender_member_loan_type_business">
                                            หลักประกันทางธุรกิจ
                                            </label>
                                        </div> 
                                    </div>
                                </div>   
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>ชื่อ <font color="#F00"><b>*</b></font></h6>
                                        <input id="lender_member_name" name="member_name" class="form-control" style="border-color: #fe9102;">   
                                    </div>       
                                </div>       
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>พื้นที่ให้บริการ</h6>
                                        <input id="lender_member_address" name="member_address" placeholder="พื้นที่ให้บริการ" class="form-control" style="border-color: #fe9102;">   
                                    </div>    
                                </div>    
                                <div class="col-lg-6"  align="left" >  
                                    <div class="form-group">
                                        <select  class="form-control select amphur" id="lender_amphur_id" name="amphur_id" onchange="" style="border-color: #fe9102;">  
                                        <option></option>
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
                                        <select  class="form-control select province" id="lender_province_id" name="province_id" onchange="" style="border-color: #fe9102;">  
                                        <option></option>
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
                                        <input id="lender_member_tel" name="member_tel" class="form-control" style="border-color: #fe9102;">   
                                    </div>  
                                </div>  
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>อีเมล <font color="#F00"><b>*</b></font></h6>
                                        <input id="lender_member_email" name="member_email" class="form-control" style="border-color: #fe9102;">   
                                    </div>  
                                </div>  
                                <div class="col-lg-12"  align="left" > 
                                    <div class="form-group">
                                        <h6>รหัสผ่าน <font color="#F00"><b>*</b></font></h6>
                                        <input id="lender_member_password" name="member_password" class="form-control" style="border-color: #fe9102;">   
                                    </div>     
                                </div> 

                                <div class="col-lg-12"  >  
                                    <div class="form-group" > 
                                        <h6>เงื่อนไข</h6> 
                                        <div class="form-group" > 
                                            <div class="p-3" style="height: 200px;overflow: auto;border: 1px solid #0292d8;border-radius: .25rem;">
                                                <?PHP echo $condition[1]['condition_detail']?> 
                                            </div>
                                        </div>
                                        <div class="form-group" align="center"> 
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="lender_confirm">
                                                <label class="form-check-label" for="lender_confirm">
                                                ยอมรับเงื่อนไข
                                                </label>
                                            </div> 
                                        </div> 
                                    </div>  
                                </div>   
                                 
                                <div class="col-lg-12"  align="center" >  
                                    <div class="form-group">
                                        <input type="hidden" id="lender_member_type_id" name="member_type_id"  > 
                                        <button class="btn btn-login my-2 my-sm-0 m-1" type="submit"   >สมัครสมาชิก</button>  
                                    </div>  
                                </div>       
                            </div>     
                                
                            <hr class="hr-text" data-content="หรือ">  
                            <div class="row justify-content-center"> 
                                <button class="btn btn-login my-2 my-sm-0 m-1" type="button" data-toggle="modal" data-target="#loginModal">facebook</button>  
                            </div> 
                        </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">  
                <div class="modal-header" style="border-bottom:none;"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container pl-4 pr-4 pb-4">
                        
                    
                        <div class="row justify-content-center">   
                            <img  src="template/images/logo.png" height="50px" alt="">      
                        </div>     
                        <div class="row justify-content-center">
                            <h4>เข้าสู่ระบบ</h4>   
                        </div>     
                        <form role="form" method="post" onsubmit="return check();" action="check_login.php" enctype="multipart/form-data">
                            <div class="row justify-content-center"> 
                                <div class="col-lg-12"  align="center" >
                                    <div class="form-group"> 
                                        <input type="email" id="login_member_email" name="member_email" class="form-control" style="border-color:  #fe9102;"> 
                                    </div>
                                    <div class="form-group"> 
                                        <input type="password" id="login_member_password" name="member_password" class="form-control" style="border-color:  #fe9102;"> 
                                    </div> 
                                    <button class="btn btn-login my-2 my-sm-0 m-1" type="submit" >เข้าสู่ระบบ</button>  
                                    <hr class="hr-text" data-content="หรือ">  
                                </div>  
                            </div>     
                        </form> 
                        <hr >
                        <div class="row justify-content-center">
                            <div class="col-lg-12"  align="center" ><h5>ยังไม่ได้เป็นสมาชิก LOANMARKETO ใช่ไหม</h5></div>
                            <div class="col-lg-12"  align="center" ><button class="btn btn-register my-2 my-sm-0 m-1" type="button" onclick="register();">สมัครสมาชิก</button></div> 
                        </div>   
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
  
    
  </div>
</nav>
<script> 
    function show_header_form(){
        var lender_member_lender_type_id = document.getElementById("lender_member_lender_type_id").value;
        var divsToHide = document.getElementsByClassName("hide_header_loan_type"); 
        if(lender_member_lender_type_id==1){ 
            //divsToHide is an array
            for(var i = 0; i < divsToHide.length; i++){ 
                divsToHide[i].style.display = "none"; // depending on what you're doing
            }
        }else{
            for(var i = 0; i < divsToHide.length; i++){ 
                divsToHide[i].style.display = "block"; // depending on what you're doing
            }
        }
    }
     
    function register(){
        $('#loginModal').modal('hide');
        $('#modal_register').modal('show');
    }

    $(document).ready(function(){
        $("#lender_amphur_id").select2({ 
            placeholder: "อำเภอ",
            theme: 'bootstrap4'
        });
        $("#lender_province_id").select2({ 
            placeholder: "จังหวัด",
            theme: 'bootstrap4'
        });
        $("#borrower_amphur_id").select2({ 
            placeholder: "อำเภอ",
            theme: 'bootstrap4'
        });
        $("#borrower_province_id").select2({ 
            placeholder: "จังหวัด",
            theme: 'bootstrap4'
        });
        
    }); 
    function member_type_choose(id){
        if(id==1){
            document.getElementById("borrower_member_type_id").value = id;   
            document.getElementById("borrower").style.display = "block"; 
        }else if(id==2){
            document.getElementById("lender_member_type_id").value = id;   
            document.getElementById("lender").style.display = "block"; 
        }
        document.getElementById("member_type").style.display = "none";
    } 
    function reset_member_type(){
        document.getElementById("borrower").style.display = "none"; 
        document.getElementById("lender").style.display = "none"; 
        document.getElementById("member_type").style.display = "block";
    }
    function borrower_check(){  
    
        var member_name = document.getElementById("borrower_member_name").value;
        var member_name_show = document.getElementById("borrower_member_name_show").value; 
        var member_email = document.getElementById("borrower_member_email").value;
        var member_password = document.getElementById("borrower_member_password").value; 
        var member_password = document.getElementById("borrower_member_password").value; 
        var member_password = document.getElementById("borrower_member_password").value; 
        var confirm = document.getElementById('borrower_confirm').checked;
        
        member_name = $.trim(member_name);   
        member_name_show = $.trim(member_name_show);   
        member_email = $.trim(member_email);   
        member_password = $.trim(member_password);    

        if(member_name.length == 0){
            alert("กรุณากรอกชื่อ-นามสกุล");
            document.getElementById("borrower_member_name").focus();
            return false;
        }else if(member_name_show.length == 0){
            alert("กรุณากรอกชื่อในระบบ");
            document.getElementById("borrower_member_name_show").focus();
            return false;     
        }else if(member_email.length == 0){
            alert("กรุณากรอกอีเมล");
            document.getElementById("borrower_member_email").focus();
            return false;     
        }else if(member_password.length == 0){
            alert("กรุณากรอกรหัสผ่าน");
            document.getElementById("borrower_member_password").focus();
            return false;     
        }else if(confirm == false){
            alert("กรุณายอมรับเงื่อนไข");
            document.getElementById("borrower_confirm").focus();
            return false;     
        }else{ 
            return true;    
        }
            
    }
    function lender_check(){   
    
        var lender_member_name = document.getElementById("lender_member_name").value; 
        var lender_member_email = document.getElementById("lender_member_email").value;
        var lender_member_password = document.getElementById("lender_member_password").value;  
        var lender_confirm = document.getElementById('lender_confirm').checked;
        var lender_member_lender_type_id = document.getElementById("lender_member_lender_type_id").value; 
        var lender_member_loan_type_deed = document.getElementById("lender_member_loan_type_deed").checked; 
        var lender_member_loan_type_pico = document.getElementById("lender_member_loan_type_pico").checked; 
        var lender_member_loan_type_nano = document.getElementById("lender_member_loan_type_nano").checked; 
        var lender_member_loan_type_business = document.getElementById("lender_member_loan_type_business").checked; 
        
        lender_member_name = $.trim(lender_member_name);    
        lender_member_email = $.trim(lender_member_email);   
        lender_member_password = $.trim(lender_member_password); 

        if(lender_member_lender_type_id.length == 0){
            alert("กรุณาเลือกประเภท");
            document.getElementById("lender_member_lender_type_id").focus();
            return false;     
        }else if(lender_member_loan_type_deed == false&&lender_member_loan_type_pico == false&&lender_member_loan_type_nano == false&&lender_member_loan_type_business == false){
            alert("กรุณาเลือกประเภทการปล่อยกู้");
            document.getElementById("lender_member_loan_type_deed").focus();
            return false; 
        }else if(lender_member_name.length == 0){
            alert("กรุณากรอกชื่อ");
            document.getElementById("lender_member_name").focus();
            return false; 
        }else if(lender_member_email.length == 0){
            alert("กรุณากรอกอีเมล");
            document.getElementById("lender_member_email").focus();
            return false;     
        }else if(lender_member_password.length == 0){
            alert("กรุณากรอกรหัสผ่าน");
            document.getElementById("lender_member_password").focus();
            return false;     
        }else if(lender_confirm == false){
            alert("กรุณายอมรับเงื่อนไข");
            document.getElementById("lender_confirm").focus();
            return false;    
        }else{ 
            return true;    
        }
            
    }
    function refresh(){
        location.reload();
    }

    function error(){
        alert("Can not login. Please check your username and password."); 
    }

    function check(){
        var user = document.getElementById("login_member_email").value;
        var pass = document.getElementById("login_member_password").value;
        if(user == ""){
            alert("กรุณากรอกอีเมล");
            document.getElementById("login_member_email").focus();
            return false;
        }else if (pass == ''){
            alert("กรุณากรอกรหัสผ่าน");
            document.getElementById("login_member_password").focus();
            return false;
        }
        return true;
    }
 </script>
 
            
            
		


