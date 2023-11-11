<?php
include("dbconfig.php");
require_once'apart_query.php';
if(isset($_GET['delete'])){
  $apartID= $_GET['delete'];

 $result= delete_data($conn, $apartID);
 if($result){
  $_SESSION['message'] = "Address deleted!";
  header("location: viewapartment.php");
 }
  
}

?>



