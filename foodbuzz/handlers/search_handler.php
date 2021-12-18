<?php

require 'config/config.php';
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: index.php");
}

if(isset($_POST['search'])) {
    $district = strtolower($_POST['district_name']);
    $price = $_POST['price'];
    $meal_type = $_POST['meal_type'];
    header("Location:result.php?district=$district&price=$price&meal_type=$meal_type");
}

?>