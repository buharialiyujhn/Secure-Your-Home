
<?php


?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<?php
	// put your code here
	
	$dsn = 'mysql:host=localhost;dbname=secure_home'; 
	
	$username = 'root'; 
	
	$password = "";
	
        // creates PDO object 
	
	
	try{
		
		$db = new PDO($dsn, $username, $password);
		
		$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
		
	} catch (PDOException $ex) {
		
		echo "connection failed".$e->getMessage();
		
	

	}
	
	
	
	?>
    </body>
</html>
