<?php
require_once'apart_query.php';

if(isset($_POST['update']))
{
  if (isset($_GET['update']))
  {
   $apartId= $_GET['update'];
  }
$apartmentType= legal_input($_POST['apartmentType']);
$numberOfRoom = legal_input($_POST['numberOfRoom']);;

$result= update_apartment($conn, $apartmentType,$numberOfRoom,$apartId);
if($result)
{

  echo "Apartment updated successfully...";
 
  header("Location: viewapartment.php");
  exit();
  
} 
else{ echo "Apartment not updated successfully";
}
}

function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewaparment" content="width=device-width, initial-scale=1">
<title>View Apartment</title>
<style>
    
body{
    overflow-x: hidden;
}
* {
  box-sizing:border-box;}
.create form {
    height: 50vh;
    border: 2px solid #f1f1f1;
    padding: 30px;
    background-color: white;
    position: center;
    }
    .viewapartmant{
      width: 30%;
    float: left;
    }
input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;}
button[type=submit] {
    background-color:  #4070f4;
    color: #fff;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
label{
  font-size: 18px;;}
button[type=submit]:hover {
  background-color:#3d3c3c;}
  .form-title a, .form-title h2{
   display: inline-block;
   
  }
  .form-title a{
      text-decoration: none;
      font-size: 20px;
      background-color: blue;
      color: honeydew;
      padding: 4px 30px;
  }
 
</style>
</head>
<body>
<!--====form section start====-->
<div class="Apart-detail">
    <div class="form-title">
    <h2>Update Apartment</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
         
          <label>Apartmant Name</label>

        <?php 
        require_once'dbconfig.php';
        if (isset($_GET['update']))
        {
         $apartId = $_GET['update'];
        }
           $tbl_user=$conn->query("SELECT * FROM `apartment` WHERE apartId='$apartId'");
           $fetch=$tbl_user->fetch_array();


        ?>
<input type="text" placeholder="Apartmant Type" name="apartmentType" required value="<?php echo $fetch['apartmentType'] ?>">  
         
          <label>NumberOfRooms</label>
<input type="city" placeholder="Number Of Room" name="numberOfRoom" required value="<?php echo $fetch['numberOfRoom']?>">
          <button type="submit" name="update">update</button>
    </form>
        </div>
</div>

</body>
</html>