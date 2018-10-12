<?php
require_once("BaseModel.php");
class PostQueAnsModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getPostQueAnsBy($name = ''){
        $sql = "SELECT * FROM tb_post_que_ans  
                INNER JOIN tb_member ON tb_post_que_ans.member_id=tb_member.member_id 
        ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    

    function getPostQueAnsByID($id){
        $sql = " SELECT * 
        FROM tb_post_que_ans 
        WHERE post_que_ans_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    } 

    function getPostQueAnsByPostID($id){
        $sql = " SELECT * 
        FROM tb_post_que_ans 
        WHERE post_id = '$id' 
        ORDER BY post_que_ans_id DESC 
        ";
// echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    } 

    function checkPostQueAnsBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_post_que_ans 
        WHERE problem_name = '$name'  
        ";
        if($id!=''){
            $sql .= " AND problem_id != '$id'";
        }
// echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data=[];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    } 

    function insertPostQueAns($data=[]){
        $sql = " INSERT INTO tb_post_que_ans( 
            post_id,
            post_que_ans_question_member_id, 
            post_que_ans_question, 
            post_que_ans_question_date
            ) VALUES ( 
            '".mysqli_real_escape_string(static::$db,$data['post_id'])."',
            '".mysqli_real_escape_string(static::$db,$data['member_id'])."',
            '".mysqli_real_escape_string(static::$db,$data['post_que_ans_question'])."',
            NOW() 
            )";
            // echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return 0;
        }
    }

    function updatePostQueAnsByID($id,$data = []){
        $sql = " UPDATE tb_post_que_ans SET  
        post_que_ans_answer = '".mysqli_real_escape_string(static::$db,$data['post_que_ans_answer'])."', 
        post_que_ans_answer_date = NOW()  
        WHERE post_que_ans_id = '$id' 
        ";
        // echo $sql;
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deletePostQueAnsByID($id){
        $sql = " DELETE FROM tb_post_que_ans WHERE post_que_ans_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>