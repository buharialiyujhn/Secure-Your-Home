<?php
require_once'dbconfig.php';
function display_room($conn)
{
    $query=$conn->prepare("SELECT * FROM room ") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}

function get_room($conn, $RoomID)
{
    $query=$conn->prepare("SELECT * FROM room WHERE RoomID ='$RoomID'") or die($this->conn->error);
    if($query->execute()){
        $result=$query->get_result();
        return $result;
    }
}
function delete_data($conn, $RoomID){
    $query=$conn->prepare("DELETE FROM `room` WHERE RoomID=?") or die($this->conn->error);
    $query->bind_param("i", $RoomID);
    if($query->execute()){
        
        return true;
    }
}
function update_room($conn,$roomType,$NumberOfRooms, $RoomID){
    $query=$conn->prepare("UPDATE `room` SET  roomType=?, deviceType =? WHERE `RoomID`=?") or die($this->conn->error);
    $query->bind_param("sii",$roomType,$deviceType,$RoomID);
    
    if($query->execute()){
        
        return true;
    }
}
?>