

<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: ../Dashboard/Dashboard.php");
        die();
    }

    include '../signup/config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE user SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
				
            }
        } 
		else {
            header("Location: ../login.php");
        }
    }

    if (isset($_POST['submit'])) {
        $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM user WHERE emailAddress='{$emailAddress}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $emailAddress;
                header("Location: ../Dashboard/Dashboard.php");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Page</title>

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="../signup/css/style.css" type="text/css" media="all" />
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
                <div class="main-mockup" style="margin-left: 200px; width: 1000px;">
                    <div class="content-wthree">
                        <h2>Login Now</h2>
                        <p>Enter your email and password to login. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="emailAddress" name="emailAddress" placeholder="Enter Your Email" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password" style="margin-bottom: 2px;" required>
                            <p><a href="../signup/forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p>
                            <button name="submit" name="submit" style="background: #05335e" class="btn" type="submit">Login</button>
                        </form>
                        <div class="social-icons">
                            <p>Create Account? <a href="../signup/register.php">Register</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->
    <div class="footer">
    <p>@ Copyright Secure Your Home 2022</p>
  </div>
</body>

</html>