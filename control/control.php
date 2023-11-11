<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../login/login.php");
        die();
    }
    // Connect to database 
    $con = mysqli_connect("localhost","root","","secure_home");
  $id=$_SESSION['SESSION_EMAIL'];
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql1="select * from user where emailAddress='$id'";
    $Sql_query1 = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($Sql_query1);
    $userID=$row['userID'];
    $sql = "SELECT device.deviceName, devicestatus.dStatus,devicestatus.devicestatusID, devicestatus.timeActivated, devicestatus.timeDeactivated FROM devicestatus, device where userID='$userID' AND devicestatus.deviceID=device.deviceID";
    $Sql_query = mysqli_query($con,$sql);
    $devices = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
           content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="control.css">
   
    <!-- Using internal/embedded css -->
   /<!-- <style>
        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        table,th{
            border-style : solid;
            border-width : 1;
            text-align :center;
        }
        td{
            text-align :center;
        }
    </style>    -->
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
		    <li> <a href="../apartment/apartment.php"> <i class='fa fa-home'></i>Manage Apartment</a></li>
			<li class="active"> <a href="../control/control.php"> <i class='fa fa-automobile'></i>Control Devices</a></li>
		    <li><a href="../signup/logout.php"> <i class='fa fa-sign-out'></i>Sign Out</a></li>
	        </ul>   
	    
    </div>


   <!-- <h2>Device Table</h2> -->
    <table>
        <!-- TABLE TOP ROW HEADINGS-->
        <tr>
            <th>Device Name</th>
            <th>Device Status</th>
            <th>Action</th>
           
        </tr>
        <?php
  
            // Use foreach to access all the courses data
            foreach ($devices as $device) { ?>
            <tr>
                <td><?php echo $device['deviceName']; ?></td>
                <td><?php 
                        // Usage of if-else statement to translate the 
                        // tinyint status value into some common terms
                        // 0-Inactive
                        // 1-Active
                        if($device['dStatus']=="1") 
                            echo "Active";
                        else 
                            echo "Inactive";
                    ?>                          
                </td>
                <td>
                    <?php 
                    if($device['dStatus']=="1") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
"<a href=deactivate.php?devicestatusID=".$device['devicestatusID']." class='btn red'>Deactivate</a>";
                    else 
                        echo 
"<a href=activate.php?devicestatusID=".$device['devicestatusID']." class='btn green'>Activate</a>";
                    ?>
            </tr>
           <?php
                }
                // End the foreach loop 
           ?>
    </table>
</body>
  
</html>