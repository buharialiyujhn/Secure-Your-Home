


<?php
session_start();
include 'databaseConnection.php';
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../login/login.php");
        die();
    }
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
	
        <link rel="stylesheet" href="../Dashboard/Dashboard.css">
	
        <link rel="icon" href="/Dashboard/IMAGES/icon.jpg" type="image/jpg" size="16x16">
	
	<link rel="stylesheet" href="/Dashboard/FONTS/font-awesome-4.7.0/css/font-awesome.min.css">
        
        <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

       <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	
	
	
        <title> Dashboard </title>
	
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
	<header id="top-header">
		<div>
		   <img id="top-logo" src="IMAGES/logo.png" alt="site logo" width="100px;">
		    
		    <h1> SECURE YOUR HOME</h1>
		    <h3> ... Smart Security</h3>  
		    
	    </div>
			   
	    
	</header>
	
	
	

<!-- THE HORIZONTAL NAVIGATION BAR -->
	    

    
    <div class="menu-bar">
	    <ul id="menulist">
		    <li class="active"><a href="Dashboard.php"> <i class='fa fa-dashboard'></i>Dashboard</a></li>
		    <li> <a href="../update/update.php"> <i class='fa fa-info'></i>Update Profile</a></li>
		    <li> <a href="../apartment/apartment.php"> <i class='fa fa-home'></i>Manage Apartment</a></li>
			<li> <a href="../control/control.php"> <i class='fa fa-automobile'></i>Control Devices</a></li>
		    <li><a href="../signup/logout.php"> <i class='fa fa-sign-out'></i>Sign Out</a></li>
	        </ul>   
	    
    </div>
	
	
       
<div id="apartmentinformation">
	
    <h1>Your Dashboard</h1><hr>
</div>
				
		

<!-- THE MAIN CONTENT -->
		
	    <div class="mytabs">
		
	
	    
	    
	    <input type="radio"  id="tabfree" name="mytabs" checked="checked">
	    
	    <label for="tabfree">Current Apartment Information</label>
	    
	    <div class="tab">
		
		<h2> Current Apartment Information </h2>
		   








     
    </body>
</html>
