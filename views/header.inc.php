
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
<script>
    function member_type(){
        // alert(debt_id);
        $.post( "modules/member_type/views/index.inc.php",
            { 
                action:'view'
            }, 
            function( data ) {
            $("#modal_data_member_type").html(data); 
        }); 
    }

</script> 

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
        <button class="btn btn-register my-2 my-sm-0 m-1" type="button" onclick="member_type();"  data-toggle="modal" data-target="#modal_member_type">สมัครเดี๋ยวนี้</button>
        
        <!-- <div class="modal fade" id="modal_member_type" tabindex="-1" role="dialog" aria-labelledby="modal_member_typeTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div id="modal_data_member_type" class="modal-content">
                    
                </div>
            </div>
        </div> -->

       
    </div>
    <div class="modal fade" id="modal_member_type"  role="dialog" aria-labelledby="modal_member_typeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id="modal_data_member_type" class="modal-content">
            
                
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
                                    <input id="member_username" name="member_username" class="form-control" style="border-color:  #fe9102;"> 
                                </div>
                                <div class="form-group"> 
                                    <input type="password" id="member_password" name="member_password" class="form-control" style="border-color:  #fe9102;"> 
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

 
            
            
		


