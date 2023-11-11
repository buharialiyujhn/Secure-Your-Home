<?php
include("dbconfig.php");
require_once'room_query.php';
if(isset($_GET['delete'])){
  $RoomID= $_GET['delete'];

 $result= delete_data($conn, $RoomID);
 if($result){
  header("location: viewroom.php");
 }
  
}

?>