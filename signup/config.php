<?php

$conn = mysqli_connect("localhost", "root", "", "secure_home");

if (!$conn) {
    echo "Connection Failed";
}