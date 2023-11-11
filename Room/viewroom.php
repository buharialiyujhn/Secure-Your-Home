
<?php
   require_once'room_query.php';
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
<title>view room</title>
<style>
      body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: linear-gradient(to top, #ccc9cc 0%, #e1e1e9 100%);
    background-position-x: right;
}

     table, td, th {  
      border: 1px solid #ddd;
      text-align: left;
      border: 1px solid;
     padding: 10px;
    }
    
    table {
      border-collapse: collapse;
      max-width: 100%;
     width:50%;
     
    }
    .table-data{
      
      width:65%;
      float: right;
    }
   
    
    td {
  text-align: center;
  height: 50px;
  vertical-align: bottom;
}
.table,th {
  text-align: left;
}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
} 
.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;

} 
.a{
        display: inline-block;
        background-color: #7b38d8;
        padding: 20px;
        width: 200px;
        color: #ffffff;
        text-align: center;
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



<div class="table-data">
        <div class="list-title">
 <h2>View Room</h2>
          
   </div>

    <table id="table">



        <tr>
            <th>S.N</th>
            <th>roomType</th>
            <th>deviceType</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
<?php
    $sql1="select * from device, room where room.deviceID=device.deviceID";
    $Sql_query1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($Sql_query1);
    $deviceType=$row['deviceType'];
    $i=1;     
      $result= display_room($conn);
               while($fetch=$result->fetch_array())
            
   {
                  
   ?>
 
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $fetch['roomType']; ?></td>
<td><?php echo $deviceType ?> </td>
<td><a class="edit_btn " href="update.php?update=<?php echo $fetch['roomId']; ?>">Edit</a></td>
<td><a class="del_btn" href="delete.php?delete=<?php echo $fetch['roomId']; ?>">Delete</a></td>
</tr> 

<?php
 }
?>      
    </table>
    </div>
</body
</html>