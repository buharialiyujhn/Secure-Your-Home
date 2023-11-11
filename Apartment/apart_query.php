<?php
require_once'dbconfig.php';
function display_apartment($conn)
{
    $query=$conn->prepare("SELECT * FROM apartment ") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}

function get_apartment($conn, $apartId)
{
    $query=$conn->prepare("SELECT * FROM apartment WHERE apartID ='$apartId'") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}
function delete_data($conn, $apartId){
    $query=$conn->prepare("DELETE FROM `apartment` WHERE apartId=?") or die($this->conn->error);
    $query->bind_param("i", $apartId);
    if($query->execute()){
        
        return true;
    }
}
function update_apartment($conn,$apartmentType,$numberOfRoom, $apartId){
    $query=$conn->prepare("UPDATE `apartment` SET  apartmentType=?, numberOfRoom =? WHERE `apartId`=?") or die($this->conn->error);
    $query->bind_param("sii",$apartmentType,$numberOfRoom,$apartId);
    
    if($query->execute()){
        
        return true;
    }
}
?>
