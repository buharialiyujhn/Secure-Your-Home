<?php
 $hostname = "localhost";
 $username = "root";
 $passwordd = "";
 $databaseName = "secure_home";

$connect = mysqli_connect($hostname,$username,$passwordd, $databaseName);
session_start();
$id =  $_SESSION['SESSION_EMAIL'];
if (isset($_POST["submit"])) {

   

 
    $firstName=mysqli_real_escape_string($connect,$_POST["firstName"]);
    $lastName =mysqli_real_escape_string($connect,$_POST["lastName"]);

    $age=mysqli_real_escape_string($connect,$_POST["age"]);
    $phoneNumber =mysqli_real_escape_string($connect,$_POST["phoneNumber"]);
    $emailAddress =mysqli_real_escape_string($connect,$_POST["emailAddress"]);
    $streetName =mysqli_real_escape_string($connect,$_POST["streetName"]);
    $city =mysqli_real_escape_string($connect,$_POST["city"]);
    $state =mysqli_real_escape_string($connect,$_POST["state"]);
      $postalCode =mysqli_real_escape_string($connect,$_POST["postalCode"]);
    

      
        $photo_name = mysqli_real_escape_string($connect, $_FILES["file"]["name"]);
        $photo_tmp_name = $_FILES["file"]["tmp_name"];
        $photo_size = $_FILES["file"]["size"];
        $photo_new_name = rand() . $photo_name;

    if ($photo_size > 5242880) {
        
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
    $sql = "UPDATE `user` SET `firstName`='".$firstName."',`lastName`='".$lastName."',`age`='".$age."',`phoneNumber`='".$phoneNumber."',`streetName`='".$streetName."',`city`='".$city."',`state`='".$state."',`postalCode`='".$postalCode."',`photo`='".$photo_new_name."' WHERE `emailAddress`='".$id."'";
    $result = mysqli_query($connect, $sql);

    if($result){
        echo "<script>alert('Profile Updated  .');</script>";
        move_uploaded_file($photo_tmp_name, "photouploads/" . $photo_new_name);
        }
        else{
        echo "<script>alert('Profile not Updated  .');</script>";
        }
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="update.css">
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
		    <li class="active"> <a href="update.php"> <i class='fa fa-info'></i>Update Profile</a></li>
		    <li> <a href="../apartment/apartment.php"> <i class='fa fa-home'></i>Manage Apartment</a></li>
			<li > <a href="../control/control.php"> <i class='fa fa-automobile'></i>Control Devices</a></li>
		    <li><a href="../signup/logout.php"> <i class='fa fa-sign-out'></i>Sign Out</a></li>
	        </ul>   
	    
    </div>

    <div class="profile-page">
    <div class="wrapper">
        <h2>Profile</h2>
        <form action="", method="POST" enctype="multipart/form-data">

        <?php 
       
       $sql2 = "SELECT * FROM user WHERE emailAddress='$id'";
       $result2 = mysqli_query($connect,$sql2);
       if (mysqli_num_rows($result2) > 0) {
       $row = mysqli_fetch_assoc($result2);
       }
        ?> 
        

         <div class="inputbox">
                
                <input type="text" id="firstName" value="<?php echo $row["firstName"];?> " name="firstName" placeholder="First Name"  required>
            </div>
            <div class="inputbox">
                
                <input type="text" id="lastName" value="<?php echo $row["lastName"];?> " name="lastName" placeholder="Last Name"   required>
            </div>
            
            <div class="inputbox">
                
                <input type="text" id="emailAddress" name="emailAddress" value="<?php echo $row["emailAddress"];?> " placeholder="Email" required>
            </div>
            <div class="inputbox">
               
                <input type="date" id="age" name="age" value="<?php echo $row["age"];?> " placeholder="Age"  >
            </div>
            <div class="inputbox">
                
                <input type="text" id="phoneNumber" value="<?php echo $row["phoneNumber"];?> " name="phoneNumber" placeholder="Phone Number"  required>
            </div>
          
            <div class="inputbox">
                
                <input type="text" id="streetName" value="<?php echo $row["streetName"];?> "  name="streetName" placeholder="Street Name"  required>
            </div>
            <div class="inputbox">
               
                <input type="city" id="city" value="<?php echo $row["city"];?> " name="city" placeholder="City"  required>
            </div>
             <div class="inputbox">
               
                <input type="state" id="state" value="<?php echo $row["state"];?> " name="state" placeholder="state"  required>
            </div>
            <div class="inputbox">
                
                <input type="postalCode" value="<?php echo $row["postalCode"];?> " id="postalCode" name="postalCode" placeholder="Postal Code"  required>
            </div>
            <div class="inputbox">
                <label for="Photo">Photo</label>
                <input type="file"  accept="image/*"  name="file" >
            </div>
            <img src="photouploads/<?php echo $row["photo"];?> " width="150px" height="150px" alt="" />
     
           

            <div >
            <button type="submit" name="submit" class="btn">Upadate profile</button>
            </div>
            </form>
    </div>
    </div>
    
</body>

</html>

