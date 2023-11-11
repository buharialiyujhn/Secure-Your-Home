<?php
session_start();
$id=$_SESSION['SESSION_EMAIL'];

$msg="";
$apartId=$_GET['apartId'];
$conn = new mysqli('localhost','root','','secure_home');
$sql2="select * from user where emailAddress='$id'";
$result1=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($result1);
$userID=$row['userID'];
if(isset($_POST['submit']))
{


$roomType = $_POST['roomType'];
$deviceType = $_POST['deviceType'];


// Database connection

if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} 
else {
$did=0;
	if($roomType !=" "&& !empty($deviceType)){
if($deviceType=="Temperature")
$did=1;
elseif ($deviceType=="motion detector")
$did=2;
elseif($deviceType=="light")
$did=3;
elseif($deviceType=="camera")
$did=4;
elseif($deviceType=="alarm")
$did=5;
elseif($deviceType=="shutter")
$did=6;
$stmt = $conn->prepare("insert into room(roomType,deviceID,apartId ) values(?, ?,?)");
  $stmt->bind_param("ssi", $roomType, $did,$apartId);

  $result = $stmt->execute();

  if($result){
	$sql3=("insert into devicestatus(dStatus,deviceID,userID) values(0, $did,$userID)");
	$result3=mysqli_query($conn,$sql3);
	$msg= "<div id='success_ msg'>Room Added successfully...</div>";

  }
  else
  {
	$msg="<div id='error_msg'>Enter device type</div>";

  }
}
else
{

	$msg="<div id='error_msg'>Select the room type</div>";
}
}
  

  
  $stmt->close();
  $conn->close();
  
}

?>
<!DOCTYPE html>
<html>
<head>

<style>
body{
	margin:0;
	color: blue;
	background-image:url(../Apartment/background.jpg);
	font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.room-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
	background-image:url(../Apartment/background.jpg);
}
.room-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:#fff;
}

.room-html .room-in-htm,
{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}


.room-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.room-html .room-in:checked + .tab,
{
	color: black;
	border-color:;
}
.room-form{
	min-height:100px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.room-form .group{
	margin-bottom:15px;
}
.room-form .group .label,
.room-form .group .button{
	width:100%;
	color:white;
	display:block;
}
.room-form .group .input{
	width:100%;
	color:black;
	display:block;
	border:1px solid blue;
	padding:15px 20px;
	border-radius:25px;
	background:transparent;
}


.room-form .group .button{
	border:1px solid blue;
	padding:15px 20px;
	border-radius:25px;
	background:transparent;
}

.room-form .group .label{
	color:#aaa;
	font-size:12px;
}
.room-form .group .button{
	background:#1161ee;
}



.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
.group1{
  border:none;
  background:#1161ee;
	padding:15px 20px 10px 10px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
	position:center;
	margin-left: 120px;
	margin-top: 50px;
}
#input1{

  padding: 0 1em 0 0;
  margin: 0;
  width: 100%;
  font-family: inherit;
  font-size: inherit;
  cursor: inherit;
  line-height: inherit;
  border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
	border:1px solid blue;
}



#success_msg{
	color: orange;
}
#error_msg{
	color: red;
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
		    <li ><a href="../Dashboard/Dashboard.php"> <i class='fa fa-dashboard'></i>Dashboard</a></li>
		    <li> <a href="../update/update.php"> <i class='fa fa-info'></i>Update Profile</a></li>
		    <li class="active"> <a href="apartment.php"> <i class='fa fa-home'></i>Manage Apartment</a></li>
			<li> <a href="../control/control.php"> <i class='fa fa-automobile'></i>Control Devices</a></li>
		    <li><a href="../signup/logout.php"> <i class='fa fa-sign-out'></i>Sign Out</a></li>
	        </ul>   
	    
    </div>


<div class="room-wrap">
	<div class="room-html">
	<label>	Room Detail</label>
	
    <form class="room-form" onsubmit="return validateForm()"  method="post">
		<div >
			<div class="room-in-htm">
				<div class="group">
					<label  class="label">Room Type</label>
					<input  type="text" class="input" name="roomType">
				</div>
				<div class="group">
                
					<label  class="label">Device Type</label>
					<select  type="text" class="input1" id="input1"name="deviceType">
					<option value = " " selected></option>
            <option value = "temperature">Temperature</option>
			<option value = "motion detector">motion detector</option>
			<option value = "light">Light</option>
			<option value = "camera">Camera</option>
			<option value = "alarm">Alarm</option>
			<option value = "shutter">Shutter</option>
         </select>
				</div>
                <div>
                <p>Here's the list of devices. Select any one</p>
      
      </form> 
      <br>
				<div class="group">
					<input type="submit" class="button" name="submit" value="Add">
				</div>
        <div ></br>

		<a class="group1"  href="viewroom.php">View Room</a>
				
			</div>
			
		</div>
	</div>
	<br>
<span><?php echo $msg ?></span>
<script>
   function validateForm() {
  let x = document.forms["room-form"]["roomType"].value;
  if (x == "") {
    alert(" All fields must be filled out");
    return false;
  }
}
  </script>
</body>
 </html>