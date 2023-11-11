<?php
if(isset($_POST['submit']))
{


$apartmentName = $_POST['apartmentName'];
$numberOfRoom = $_POST['numberOfRooms'];

// Database connection
$conn = new mysqli('localhost','root','','secure_home');
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into apartment(apartmentName, numberOfRooms) values(?, ?)");
  $stmt->bind_param("si", $apartmentName, $numberOfRoom);
  $execval = $stmt->execute();
  echo $execval;
  echo "Apartment Added successfully...";
  $stmt->close();
  $conn->close();
}
}
?>