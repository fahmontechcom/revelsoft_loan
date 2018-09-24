<?php

require_once("BaseModel.php");
class PageModel extends BaseModel{

    function __construct(){
        $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
    }

    function getPageBy(){
        $sql = "SELECT * 
        FROM tb_page ";
        if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getPageByID($id){
        $sql = " SELECT * 
        FROM tb_page
        WHERE page_id = '$id' 
        ";

        if ($result = mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    
    function updatePageByID($id,$data = []){
        $sql = " UPDATE tb_page SET 
        page_name = '".$data['page_name']."',
        page_title = '".$data['page_title']."',
        page_header_image='".$data['page_header_image']."',
        page_header_1='".$data['page_header_1']."',
        page_header_2='".$data['page_header_2']."',
        page_detail='".$data['page_detail']."',
        page_tag='".$data['page_tag']."' 
        WHERE page_id = $id "; 

        if (mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
            return true;
        }else {
            return false;
        }
    }

    function insertPage($data=[]){
        $sql = " INSERT INTO tb_page(
        page_name,
        page_title,
        page_header_image,
        page_header_1,
        page_header_2,
        page_detail,
        page_tag 
    ) VALUES ('".
    $data['page_name']."','".
    $data['page_title']."','".
    $data['page_header_image']."','".
    $data['page_header_1']."','". 
    $data['page_header_2']."','".
    $data['page_detail']."','".
    $data['page_tag']."') ";
    if (mysqli_query($this->db,$sql, MYSQLI_USE_RESULT)) {
        return mysqli_insert_id($this->db);
   }else {
        return false;
    }
}


function deletePageByID($id){
    $sql = "DELETE FROM tb_page WHERE page_id = '$id' ";
    mysqli_query($this->db,$sql, MYSQLI_USE_RESULT);
}




}
?>