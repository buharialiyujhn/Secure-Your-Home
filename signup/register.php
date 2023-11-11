
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../Dashboard/Dashboard.php");
        die();
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    include 'config.php';
    $msg = "";

    if (isset($_POST['submit'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        $code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE emailAddress='{$emailAddress}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$emailAddress} - This email address has been already exists.</div>";
        } 
		else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO user (firstName,lastName, emailAddress, password, code) VALUES ('{$firstName}','{$lastName}', '{$emailAddress}', '{$password}', '{$code}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'buharialiyujhn@gmail.com';                     //SMTP username
                        $mail->Password   = 'cqydwwfdncgstvzp';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('buharialiyujhn@gmail.com');
                        $mail->addAddress($emailAddress);

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'no reply';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/secure_home/login/login.php/?verification='.$code.'">http://localhost/secure_home/login/login.php/?verification='.$code.'</a></b>';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Secure Your Home </title>
   
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="stylesheet" href="css/style1.css">
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
<img src="images/logo.png" alt="Logo.png" width="70px" height="70">
<div class="menu-bar" >
    <ul>
        <li class="active" ><a href="../index.html"> Home</a></li>
        <li><a href="#">About</a>
        <div class="sub-menu-1" style="z-index:1;">
        <ul>
            <li><a href="../aboutus/aboutus.html">Mission</a></li>
            <li><a href="#">Vision</a></li>
            <li><a href="#">Team</a></li>

        </ul>

        </div>
        </li>
        <li><a href="#">Services</a>
            <div class="sub-menu-1" style="z-index:1;">
                <ul>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
                </div>
        </li>
        <li><a href="register.php">Sign up</a></li>
        <li><a href="../login/login.php">Login</a></li>
        <li><a href="../contactus/contactus.html">Contact Us</a></li>
    </ul>
</div>
<div class="dcontainer" >
    <!-- form section start -->
    <section class="w3l-mockup-form" >
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid" >
                <div class="main-mockup" style="margin-left: 200px; width: 1000px;">

                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Fill in the following form to register. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="firstName" name="firstName" placeholder="First Name" value="<?php if (isset($_POST['submit'])) { echo $firstName; } ?>" required>
							<input type="text" class="lastName" name="lastName" placeholder="Last Name" value="<?php if (isset($_POST['submit'])) { echo $lastName; } ?>" required>
                            <input type="email" class="emailAddress" name="emailAddress" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $emailAddress; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" style="background: #05335e" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account? <a href="../login/login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

</div>
<div class="footer">
    <p>@ Copyright Secure Your Home 2022</p>
  </div>
</body>

</html>