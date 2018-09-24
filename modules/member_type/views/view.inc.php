<!-- <div class="modal-header">
    <h5 class="modal-title" id="loageModalLabel">Modal title</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div> -->
<script>
    function member_type_choose(id){
        // alert(id);
        $.post( "modules/register/views/index.inc.php",
            { 
                member_type_id:id,
                action:'view'
            }, 
            function( data ) {
            // $("#modal_data_member_type").html(''); 
            $("#modal_data_member_type").html(data); 
        }); 
    }
</script>
<div class="modal-body">
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
<!-- <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
</div> -->