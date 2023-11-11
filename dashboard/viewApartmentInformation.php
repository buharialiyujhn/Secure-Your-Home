
<?php

session_start();
include 'databaseConnection.php';

?>









<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->



<html>
    
    <head>
        <meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	
	<meta name="description" content="Dashboard for smart home">
	
        <meta name="keywords" content="SMART, HOME, SECURED, SECURITY, SECURED HOME">
	
        <link rel="stylesheet" href="/SecuredHomeDashboard/STYLES/viewApartmentInformation.css">
	
        <link rel="icon" href="/SecuredHomeDashboard/IMAGES/icon.jpg" type="image/jpg" size="16x16">
	
	<link rel="stylesheet" href="/SecuredHomeDashboard/FONTS/font-awesome-4.7.0/css/font-awesome.min.css">
	
	
	
        <title> Apartment Information </title>
	
	<style type="text/css">

.fieldset-auto-width {

display: inline-block;

}

</style>
    </head>
    
    
    <body>
	
	
<!--   ***************************************************************   THE HEADER SECTION ************************************************************
	
*******************************************************************  THE HEADER SECTION **************************************************************

*******************************************************************  THE HEADER SECTION ***************************************************************
-->	
                    <div id="top-header">
	
                    <header >
		
		   <img id="top-logo" src="/SecuredHomeDashboard/IMAGES/icon.jpg" alt="site logo" width="100px;">
		   
		   </header>
		    
		    <h1> SECURE YOUR HOME</h1>
		    <h3> ... Smart Security</h3>  
                    </div>
	


	
	
	

<!-- THE HORIZONTAL NAVIGATION BAR -->
	    

    
    <nav>
	    <ul>
		
		    
		    <li ><a href="Dashboard.php"> <i class='fa fa-dashboard'></i>      Dashboard</a></li>
		    <li><a href="#"> <i class='fa fa-sign-out'></i>       Sign Out</a></li>
		    <li>   <a href="viewApartmentInformation.php" class="active">  <i class='fa fa-info'></i>   View Apartment Information</a></li>
		    <li> <a href="AddApartment.php"> <i class='fa fa-home'></i>           Manage Apartment</a></li>
		    <li><a href="#"> <i class='fa fa-inbox'></i>                          Messaging</a>
			
			<div class="sub-menu-1">
			<ul>
                          <li><a href="family.html">Inbox</a></li>
                          <li><a href="vacations.html">Compose Message</a></li>
                        </ul>
			</div>
			</li>
			
			<li> <a href=""> <i class='fa fa-automobile'></i>                     Manage Devices</a></li>
          
		    
		    
		    
	        </ul>   
	    
    </nav>
	
	
       
<div id="apartmentinformation">
	
    <h1>Your Apartment Information</h1><hr>
</div>
			
			
			
			
		

<!-- THE MAIN CONTENT -->
		
<main>
    
    
    <!-- DIV TO HOLD THE LINK ITEMS OF THE ROOMS ON THE LEFT -->
	
   
	
	<!-- DYNAMICALLY GENERATE THE LIST OF ROOMS FROM THE ROOMS TABLE IN THE DATABASE AND PLACE THEM HERE  -->
        
      <div id="rooms">   
        <?php

if(isset($_GET['id'])){
    
    $user_id=$_GET['id'];
    
    try{
        
  $star="SELECT * FROM apartment WHERE Users_user_id= '$user_id'";

  $tram=$db->prepare($star);

  $tram->execute();

  $name=$tram->fetchAll();
                        
  $tram->closeCursor();


    } catch (Exception $ex) {
$error_message = $ex->getMessage(); 
	
	echo "<p>Error message: $error_message </p>";
    }
}

?>

          <div id="room_devices_link">
              <ul>
         
      <?php foreach($name as $names){?>
		
	<li ><a href="#" id="apartmentRooms" onclick="toggleClock()"> <?php echo $names['apartment_type'];?></a></li>
      <?php }?>
		  
     
     </ul>   
              
          </div>     
     
         
         
         
		
          
	    
    </div>
    
        <script>
             function toggleClock(){
                 
                 var roomType = '<?= $names["apartment_type"]?>';
                 
                
    // get the link
    var myClock = document.getElementById(roomType);

    // get the current value of the clock's display property
    var displaySetting = myClock.style.display;

    if (displaySetting === 'block') {
      // clock is visible. hide it
      myClock.style.display = 'none';
     
    }
    else {
      // clock is hidden. show it
      myClock.style.display = 'block';
      
    }
  }
            
        </script>
    
    
    
    
     <!-- DIV TO HOLD THE CONTENT OF THE ROOMS (DEVICES) ON THE RIGHT SIDE -->
     <div id="duplex">
	How to insert data from one table to another table in PHP?
Follow the below Steps:

    Open XAMPP server and start Apache and MySQL.
    Open your browser and type “localhost/phpmyadmin”. Create a database named “geeks_database”
    Now create a table named table1 with 4 columns and click on save.
    Now open the SQL column in the database server and insert records into it.

7 avr. 2021

Insert data from one table to another table using PHP
https://www.geeksforgeeks.org › insert-data-from-one-tab...
Search for: How to insert data from one table to another table in PHP?    
	
    </div>
     
     
     
     <div id="studio">
	This is a collection of small samples demonstrating various parts of the WebRTC APIs. The code for all samples are available in the GitHub repository.

Most of the samples use adapter.js, a shim to insulate apps from spec changes and prefix differences.

https://webrtc.org/getting-started/testing lists command line flags useful for development and testing with Chrome.

Patches and issues welcome! See CONTRIBUTING.md for instructions.

Warning: It is highly recommended to use headphones when testing these samples, as it will otherwise risk loud audio feedback on your system.

getUserMedia():
Access media devices

Basic getUserMedia demo
Use getUserMedia with canvas
Use getUserMedia with canvas and CSS filters
Choose camera resolution
Audio-only getUserMedia() output to local audio element
Audio-only getUserMedia() displaying volume
Record stream
Screensharing with getDisplayMedia
Control camera pan, tilt, and zoom
Control exposure
	
    </div>
</main>







<!<!-- 


/*  ***************************************************************   THE FOOTER SECTION *************************************************************/
	
/*******************************************************************  THE FOOTER SECTION ************************************************************/

/*******************************************************************  THE FOOTER SECTION ********************************************************/




-->


	

	
	
    


<div class="footer-container">
    
    <div class="footer">
	
	<div class="footer-heading footer-1">
	    
	    <h2> Meet us</h2>
	    
	    <a href=""></a>
            <a href="">Private Policy</a>
            <a href="">Site Map</a>
            <a href="">Our Mission</a>
            <a href="">Our Vision</a>
            <a href="">About Us </a>
	    <a href="">Our Team </a>
		
	    
	</div>
	
	
	
	<div class="footer-heading footer-2">
	    
	    <h2> Contact Us</h2>
	    
	    <a href=""></a>
            <a href="">Inquiry</a>
            <a href="">See Jobs</a>
            <a href="">Send us an Email</a>
            <a href="">Our Phone</a>
            <a href="">Our Address</a>
		
	    
	</div>
	
	
	<div class="footer-heading footer-3">
	    
	   <p <h2> Social Media</h2>
	    
	    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="">	<i class="fa fa-twitter-square" aria-hidden="true"></i> </a>
            <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            <a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
            
		
	    
	</div>
	
	
	<div class="footer-email-form">
	    
	    <h2> Join Our Newsletter</h2>
	    
	    <input type="email" placeholder="Enter your Email address" id="footer-email">
	    
	    <input type="submit" value="Sign Up"  id="footer-email-btn">
            
		
	    
	</div>
	    
	
	<div class="footer-copyright">
	    
	    
	    
	    <p>Copyright &copy;2022-2024 by The Smart Minds, ISEP, Paris, France. All rights reserved</p>
		
	    
	</div>
	
	
    </div>
	    
	
	
</div> 
    
    
     
    </body>
</html>
