<?php

ob_start(); // output buffering on hobe
session_start();

$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost", "root", "", "foodbuzz"); // connnection variable foodbuzz- server er nam

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
// else {
//     echo "connected<br>";
// }

?>