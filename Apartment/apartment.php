<?php
$msg="";
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../login/login.php");
        die();
    }
if(isset($_POST['submit']))
{


$apartmentType = $_POST['apartmentType'];
$numberOfRoom = $_POST['numberOfRoom'];
$email=$_SESSION['SESSION_EMAIL'];
// Database connection
$conn = new mysqli('localhost','root','','secure_home');
$sql1="select * from user where emailAddress='$email'";
$Sql_query1 = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($Sql_query1);
$userID=$row['userID'];
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);

} else {

          if($apartmentType!=" " && $numberOfRoom !=" "){

  $stmt = $conn->prepare("insert into apartment(apartmentType, numberOfRoom, userID) values(?, ?,?)");
  $stmt->bind_param("sii", $apartmentType, $numberOfRoom,$userID);
  $result = $stmt->execute();

  if($result)
{

  $msg= "<div style='color:green' id='success_ msg'>Apartment Added successfully...</div>";

  }
  else
  {
  $msg="<div style='color:red'  id='error_msg'>unable to insert apartment</div>";

  }
  

}
else
  {
  $msg="<div style='color:red'  id='error_msg'>Enter full details</div>";

  }
}
}

?>

<html>
<head>
    <title>Manage Apartment</title>

<link rel="stylesheet" href="apartment.css">
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

        <div class="wrapper">
          <h2>Apartment Registration</h2>
          <form Method="post"onsubmit="return validateForm()" name="form" >
            <div class="input-box">
              <input type="text" name="apartmentType" placeholder="Apartment Type" >
            </div>
            <div class="input-box">
              <input type="text" name="numberOfRoom"  placeholder="Number Of Room" >
            </div>
           
            <div>
              <button type="Submit"class= "button2" name="submit" onclick="validateForm();">Add</button>
			</div>

              <div >
              <button onclick="window.location.href='viewapartment.php'"class= "button2" style="vertical-align:middle;">
      view apartment
    </button>
            </div>
            <span><?php echo $msg ?></span>
            <script>
    function validateForm() {
  let x = document.forms["form"]["numberOfRoom"].value;
  if (x == "") {
    alert(" All fields must be filled out");
    return false;
  }
}      
   </script>     
</body>
</html>
