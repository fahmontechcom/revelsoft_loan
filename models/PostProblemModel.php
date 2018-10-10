<?php
require_once("BaseModel.php");
class PostProblemModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getPostProblemBy($name = ''){
        $sql = "SELECT * FROM tb_post_problem  
                INNER JOIN tb_member ON tb_post_problem.member_id=tb_member.member_id 
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

    

    function getPostProblemByID($id){
        $sql = " SELECT * 
        FROM tb_post_problem 
        WHERE problem_id = '$id' 
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
    function checkPostProblemBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_post_problem 
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

    function insertPostProblem($data=[]){
        $sql = " INSERT INTO tb_post_problem( 
            post_id,
            member_id, 
            post_problem_detail, 
            post_problem_date
            ) VALUES ( 
            '".mysqli_real_escape_string(static::$db,$data['post_id'])."',
            '".mysqli_real_escape_string(static::$db,$data['member_id'])."',
            '".mysqli_real_escape_string(static::$db,$data['post_problem_detail'])."',
            NOW() 
            )";
            echo $sql;
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return 0;
        }
    }

    function updatePostProblemByID($id,$data = []){
        $sql = " UPDATE tb_post_problem SET  
        problem_detail = '".$data['problem_detail']."', 
        problem_img = '".$data['problem_img']."' 
        WHERE problem_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deletePostProblemByID($id){
        $sql = " DELETE FROM tb_post_problem WHERE problem_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>