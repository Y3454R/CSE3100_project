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
$item_name="";
if(isset($_POST['publish_review'])) {
    $item_name = $_POST['item_name'];
    /*test (successful) */
    echo "$item_name";
}


?>