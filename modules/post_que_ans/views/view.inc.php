<script> 
function post_que_ans_check(){
    var post_que_ans_question = document.getElementById("post_que_ans_question").value;  
    
    post_que_ans_question = $.trim(post_que_ans_question);     
    

    if(post_que_ans_question.length == 0){
        alert("กรุณากรอกรายละเอียด");
        document.getElementById("post_que_ans_question").focus();
        return false; 
    }else{ 
        return true;    
    }
} 
function ans_click(id){
    document.getElementById("post_que_ans_id").value = id;  
     
} 
function ans_check(){
    var post_que_ans_answer = document.getElementById("post_que_ans_answer").value;  
    
    post_que_ans_answer = $.trim(post_que_ans_answer);     
    

    if(post_que_ans_answer.length == 0){
        alert("กรุณากรอกรายละเอียด");
        document.getElementById("post_que_ans_answer").focus();
        return false; 
    }else{ 
        return true;    
    }
} 
</script> 
 <?PHP 
    // echo $loan_member[0]['member_id'];
    // echo '<pre>';
    // print_r($post_que_ans);
    // echo '</pre>';
 ?>
<div id="que_ans" class="row ml-0 mr-2 mb-2 pt-3 pb-3 pl-4 pr-4"  style="box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.1);background-color:white;"> 
    
    <div class="col-lg-12">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <h5><b>คำถามเกี่ยวกับประกาศนี้ (<?PHP echo count($post_que_ans);?>)</b></h5>
            </div>  
            <div class="col-lg-12 pt-2">
                <form role="form" method="post" onsubmit="return post_que_ans_check();" action="index.php?content=post_que_ans&action=add" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">  
                            <input id="post_que_ans_question" name="post_que_ans_question" class="form-control" style="" value="">    
                        </div>
                        <div class="col-lg-2">
                            <input type="hidden"  name="post_id"  value="<?PHP echo $post['post_id'];?>"> 
                            <input type="hidden"  name="member_id" value="<?PHP echo $loan_member[0]['member_id'];?>" > 
                            <input type="hidden" name="post_que_ans_type" value="que">  
                            <button type="submit" class="btn btn-borrower">ถามคำถาม</button>
                        </div> 
                    </div>  
                </form>
            </div> 
            <?PHP for($i = 0 ; $i<count($post_que_ans);$i++){ ?>
            <div id="post_que_ans_<?PHP echo $post_que_ans[$i]['post_que_ans_id'];?>" class="col-lg-12 pt-3">
                <div class="col-lg-12 border-bottom pb-3">
                    <div class="row pt-2"> 
                        <div class="col-lg-10 form-inline"> 
                            <h5 class="m-0 p-0 borrower_bg_color d-flex justify-content-center align-items-center bg_text_qa" ><b>Q</b></h5> 
                            <div class="pl-3">
                                <h6 class="m-0"><?PHP echo $post_que_ans[$i]['post_que_ans_question'];?></h6>
                                <h6 class="m-0 text-secondary"><small>Thana.t - 2 ชั่วโมงที่แล้ว</small></h6>
                            </div> 
                        </div> 
                        <div class="col-lg-2"> 
                        <?PHP if($post_que_ans[$i]['post_que_ans_answer']==''&&$post['member_id']==$loan_member[0]['member_id']){ ?>
                        
                            <button class="btn btn-lender" onclick="ans_click(<?PHP echo $post_que_ans[$i]['post_que_ans_id'];?>);" data-toggle="modal" data-target="#answerModal"  >ตอบคำถาม</button>   
                        <?PHP }?> 
                        <?PHP if($post_que_ans[$i]['post_que_ans_question_member_id']==$loan_member[0]['member_id']){ ?>  
                            <a class="btn btn-danger" href="index.php?content=post_que_ans&action=delete&post_id=<?PHP echo $post['post_id'];?>&id=<?PHP echo $post_que_ans[$i]['post_que_ans_id'];?>" onclick="return confirm('คุณต้องการลบคำถามนี้ใช่ไหม ?');" ><i class="fa fa-times text-white" aria-hidden="true"></i></a> 
                       
                        <?PHP }?> 
                        </div>
                    </div>  
                    <?PHP if($post_que_ans[$i]['post_que_ans_answer']!=''){ ?>
                    <div class="row pt-3"> 
                        <div class="col-lg-10 form-inline">
                            <h5 class="m-0 p-0 lender_bg_color d-flex justify-content-center align-items-center bg_text_qa" ><b>A</b></h5> 
                            <div class="pl-3">
                                <h6 class="m-0"><?PHP echo $post_que_ans[$i]['post_que_ans_answer'];?></h6>
                                <h6 class="m-0 text-secondary"><small>Fahmon - 1 ชั่วโมงที่แล้ว</small></h6>
                            </div>
                        </div> 
                        <?PHP if($post['member_id']==$loan_member[0]['member_id']){ ?>
                        <div class="col-lg-2"> 
                            <form role="form" method="post" action="index.php?content=post_que_ans&action=add" enctype="multipart/form-data">   

                                <input type="hidden" name="post_que_ans_answer" value="">  
                                <input type="hidden" name="post_que_ans_id" value="<?PHP echo $post_que_ans[$i]['post_que_ans_id'];?>">  
                                <input type="hidden" name="post_id" value="<?PHP echo $post['post_id']?>">  
                                <input type="hidden" name="post_que_ans_type" value="ans">  

                                <button class="btn btn-danger" type="submit"><i class="fa fa-times" aria-hidden="true"></i></button>   

                            </form>  
                        </div>
                        <?PHP }?> 
                    </div> 
                    <?PHP }?> 
                </div> 
            </div>  
            <?PHP }?>     
        </div>
    </div>  
</div>
<div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">  
            <div class="modal-header" style="border-bottom:none;"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pl-4 pr-4 pb-4">
                            
                    <div class="row justify-content-center">
                        <h4>ตอบคำถาม</h4>   
                    </div>     
                    <form role="form" method="post" onsubmit="return ans_check();" action="index.php?content=post_que_ans&action=add" enctype="multipart/form-data">
                        <div class="row justify-content-center"> 
                            <div class="col-lg-12"  align="center" >
                                <div class="form-group"> 
                                    <textarea rows="5" id="post_que_ans_answer" name="post_que_ans_answer" class="form-control" placeholder="รายละเอียด..." style=""></textarea>
                                </div> 
                                <input type="hidden" id="post_que_ans_id" name="post_que_ans_id" >  
                                <input type="hidden" name="post_id" value="<?PHP echo $post['post_id']?>">  
                                <input type="hidden" name="post_que_ans_type" value="ans">  
                                <button class="btn btn-lender my-2 my-sm-0 m-1" type="submit" >ตอบ</button>   
                            </div>  
                        </div>     
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>