<?php
  
    // Connect to database 
    $con=mysqli_connect("localhost","root","","secure_home");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['devicestatusID'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $device_id=$_GET['devicestatusID'];
        $t = date('Y-d-m H:i:s',time());
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        //$sql="UPDATE `courses` SET  `status`=0 WHERE id='$course_id'";
          $sql="UPDATE `devicestatus` SET `dStatus`=0, timeActivated='$t' WHERE devicestatusID='$device_id'";
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    header('location: control.php');
?>