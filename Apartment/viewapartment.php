 
<?php
   require_once'apart_query.php';
       session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../login/login.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>view apartment</title>

<link rel="stylesheet" href="viewapartment.css">
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





<div class="table-data">
        <div class="list-title">
 <h2>View Apartment</h2>
          
            </div>

    <table id="table">



        <tr>
            <th>S.N</th>
            <th>Apartment Name</th>
            <th>Room Number</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Room</th>
        </tr>
        
<?php
            $i=1;
            
              
              $result= display_apartment($conn);
               while($fetch=$result->fetch_array())
            
               {
                  
            ?>
 
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $fetch['apartmentType']; ?></td>
<td><?php echo $fetch['numberOfRoom']; ?> </td>


<td><a class="edit_btn" href="update.php?update=<?php echo $fetch['apartId']; ?>">Edit</a></td>
<td><a class="del_btn" href="delete.php?delete=<?php echo $fetch['apartId']; ?>">Delete</a></td>
<td><a class="add_btn" href="../Room/addroom.php?apartId=<?php echo $fetch['apartId']; ?>">Add</a></td>
               
               </tr>
 <?php
 }
?>
            
            
    </table>
    </div>
</body>
</html>