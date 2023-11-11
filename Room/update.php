<?php
require_once'room_query.php';

if(isset($_POST['update']))
{
  if (isset($_GET['update']))
  {
   $roomId = $_GET['update'];
  }
$roomType= legal_input($_POST['roomType']);
$deviceType = legal_input($_POST['deviceType']);;

$result= update_room($conn, $roomType,$deviceType,$roomId);
if($result)
{

  echo "Room updated successfully...";
 
  header("Location: viewroom.php");
  exit();
  
} 
else{ echo "Room not updated successfully";
}
}

function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewaparment" content="width=device-width, initial-scale=1">
<title>View Room</title>
<style>
    
body{
    overflow-x: hidden;
}
* {
  box-sizing:border-box;}
.create form {
    height: 40vh;
    border: 6px solid #f1f1f1;
    padding: 20px;
    background-color: white;
    position: center;
    }
    .viewapartmant{
      width: 30%;
    float: left;
    }
input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;}
button[type=submit] {
    background-color:  #4070f4;
    color: #fff;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
label{
  font-size: 18px;;}
button[type=submit]:hover {
  background-color:#3d3c3c;}
  .form-title a, .form-title h2{
   display: inline-block;
   
  }
  .form{
  width:50%;
	height:100%;
	position:center;
	padding:10px 20px 20px 20px;
	 text-decoration: none;
   font-size: 10px;
   background-color: blue;
   color: honeydew;
  }
 
</style>
<link rel="stylesheet" href="../Dashboard/Dashboard.css">
</head>
<body>

<header id="top-header">
		<div>
		   <img id="top-logo" src="../Dashboard/IMAGES/logo.png" alt="site logo" width="100px;">
		    
		    <h1> SECURE YOUR HOME</h1>
		    <h3> ... Smart Security</h3>  
	    </div>
	</header>
<div class="menu-bar">
	    <ul id="menulist">
		    <li class="active"><a href="#"> <i class='fa fa-dashboard'></i>Dashboard</a></li>
		    <li> <a href="viewApartmentInformation.php?id=<?=$user;?>"> <i class='fa fa-info'></i>Update Profile</a></li>
		    <li> <a href="AddApartment.php"> <i class='fa fa-home'></i>Manage Apartment</a></li>
			<li> <a href=""> <i class='fa fa-automobile'></i>Control Devices</a></li>
		    <li><a href="#"> <i class='fa fa-sign-out'></i>       Sign Out</a></li>
	        </ul>   
	    
    </div>



<div class="room-detail">
    <div class="form-title">
    <h2>Update Room</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" class="form">
         
          <label>room type</label>

        <?php 
        require_once'dbconfig.php';
        if (isset($_GET['update']))
        {
         $roomId = $_GET['update'];
        }
           $tbl_user=$conn->query("SELECT * FROM `room` WHERE roomId='$roomId'");
           $tbl_user1=$conn->query("SELECT * FROM device,room WHERE room.deviceID=device.deviceID");
           $fetch=$tbl_user->fetch_array();
           $fetch1=$tbl_user1->fetch_array();

        ?>
<input type="text" placeholder="roomType" name="roomType" required value="<?php echo $fetch['roomType'] ?>">
         
          <label>device Type</label>
<input type="text" placeholder="deviceType" name="deviceType" required value="<?php echo $fetch1['deviceType'] ?>">
         
<button type="submit" name="update">update</button>
    </form>
   </div>
</div>

</body>
</html>