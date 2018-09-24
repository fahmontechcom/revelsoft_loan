<?php
require_once("BaseModel.php");
class LoanTypeModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getLoanTypeBy($name = ''){
        $sql = "SELECT * FROM tb_loan_type WHERE loan_type_name LIKE ('%$name%') 
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

    

    function getLoanTypeByID($id){
        $sql = " SELECT * 
        FROM tb_loan_type 
        WHERE loan_type_id = '$id' 
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
    function checkLoanTypeBy($name,$id=''){
        $sql = " SELECT * 
        FROM tb_loan_type 
        WHERE loan_type_name = '$name'  
        ";
        if($id!=''){
            $sql .= " AND loan_type_id != '$id'";
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

    function insertLoanType($data=[]){
        $sql = " INSERT INTO tb_loan_type(
            loan_type_name,
            loan_type_icon,
            loan_type_title,
            loan_type_detail,
            loan_type_img 
            ) VALUES (
                '".$data['loan_type_name']."',
                '".$data['loan_type_icon']."',
                '".$data['loan_type_title']."',
                '".$data['loan_type_detail']."',
                '".$data['loan_type_img']."'
            )";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $id = mysqli_insert_id(static::$db); 
            return $id;
        }else {
            return false;
        }
    }

    function updateLoanTypeByID($id,$data = []){
        $sql = " UPDATE tb_loan_type SET 
        loan_type_name = '".$data['loan_type_name']."', 
        loan_type_icon = '".$data['loan_type_icon']."', 
        loan_type_title = '".$data['loan_type_title']."', 
        loan_type_detail = '".$data['loan_type_detail']."', 
        loan_type_img = '".$data['loan_type_img']."' 
        WHERE loan_type_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteLoanTypeByID($id){
        $sql = " DELETE FROM tb_loan_type WHERE loan_type_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>