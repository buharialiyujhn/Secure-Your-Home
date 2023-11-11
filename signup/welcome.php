<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: login.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM user WHERE emailAddress='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['firstName'] . " <a href='logout.php'>Logout</a>";
    }
?>