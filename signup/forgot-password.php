

<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE emailAddress='{$emailAddress}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE user SET code='{$code}' WHERE emailAddress='{$emailAddress}'");

        if ($query) {        
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
                $mail->Body    = 'Here is the verification link <b><a href="http://localhost/secure_home/signup/change-password.php?reset='.$code.'">http://localhost/secure_home/signup/change-password.php?reset='.$code.'</a></b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$emailAddress - This email address do not found.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Secure Your Home</title>

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../signup/css/style1.css">
</head>

<body>

<img src="../signup/images/logo.png" alt="Logo.png" width="70px" height="70">
<div class="menu-bar" >
    <ul>
        <li  ><a href="../index.html"> Home</a></li>
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
        <li><a href="../signup/register.php">Sign up</a></li>
        <li class="active"><a href="login.php">Login</a></li>
        <li><a href="../contactus/contactus.html">Contact Us</a></li>
    </ul>
</div>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image3.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Forgot Password</h2>
                        <p>Please enter your registered email to reset your password. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="emailAddress" name="emailAddress" placeholder="Enter Your Email" required>
                            <button name="submit" class="btn" type="submit">Send Reset Link</button>
                        </form>
                        <div class="social-icons">
                            <p>Back to! <a href="../login/login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


</body>

</html>